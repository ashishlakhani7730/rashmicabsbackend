<?php ob_start(); defined('BASEPATH') OR exit('No direct script access allowed');

class Passenger_management extends CI_Controller 
{
	
	 function __construct()
    {
        parent::__construct();
        $this->load->model('General_data');
		 $this->load->model('Sms_email');
		
		

    }
	
	 
	public function index()
	{
		
		$user = $this->session->has_userdata('user');
		if(empty($user)){
			redirect('index.php/Login');
		}else {
		$passenger_data['passenger_list'] = $this->db->get('passenger_list')->result();
		
		$this->load->view('header');
		$this->load->view('manage_passenger',$passenger_data);
		$this->load->view('footer');
		}
	
	}
	
	
	public function add_passenger()
	{
		$passenger_data['state'] = $this->db->get('state')->result();
		
		$this->load->view('header');
		$this->load->view('add_passenger',$passenger_data);
		$this->load->view('footer');
	
	}
	
	
	public function insert_passenger()
	{
	
		$passenger_detail_data =  $this->input->post(NULL, TRUE);
		date_default_timezone_set('Asia/Kolkata');
		
		$passenger_contact=$this->db->get_where('passenger_list',array('p_contact'=>$passenger_detail_data['contact_no']))->row();
		$passenger_email=$this->db->get_where('passenger_list',array('p_email_id'=>$passenger_detail_data['email_id']))->row();
		$passenger_gst=$this->db->get_where('passenger_list',array('p_gst_number'=>$passenger_detail_data['gst_number']))->row();
		
		if(!empty($passenger_contact)){
			$msg['error'] = "Contact Number already exist";
			$this->session->set_flashdata('error',$msg);
			redirect(site_url('index.php/Passenger_management/add_passenger'));
		}else if(!empty($passenger_email)){
			$msg['error'] = "Email ID already exist";
			$this->session->set_flashdata('error',$msg);
			redirect(site_url('index.php/Passenger_management/add_passenger'));
		}else if(!empty($passenger_detail_data['gst_number']) && !empty($passenger_gst)){
			$msg['error'] = "GST No. already exist";
			$this->session->set_flashdata('error',$msg);
			redirect(site_url('index.php/Passenger_management/add_passenger'));
		}else{
				
			$passenger_detail_array = array(
						'p_full_name'=>$passenger_detail_data['f_name']." ".$passenger_detail_data['l_name'],
						'p_f_name'=>$passenger_detail_data['f_name'],
						'p_l_name'=>$passenger_detail_data['l_name'],
						'p_contact'=>$passenger_detail_data['contact_no'],
						'p_contact_2'=>$passenger_detail_data['contact_no_2'],
						'p_email_id'=>$passenger_detail_data['email_id'],
						'p_gender'=>$passenger_detail_data['gender'],
						'p_address'=>$passenger_detail_data['address'],
						'p_area'=>$passenger_detail_data['area'],
						'p_state'=>$passenger_detail_data['state'],
						'p_city'=>$passenger_detail_data['city'],
						'p_password'=>md5($passenger_detail_data['contact_no']),
						'p_gst_number'=>$passenger_detail_data['gst_number'],
						'p_status'=>1,
						'p_joining_date_time'=>date("Y-m-d H:i:s"),
						'p_created_by'=>1					
						);		
			
			
			$this->db->insert('passenger_list',$passenger_detail_array);
			
			$get_last_id=$this->db->insert_id();
			
			$this->General_data->update_id('passenger_list','RCP'.date('Y').date('m'),'p_id');
			
			$this->General_data->uploadImage('./uploads/passenger_profile',$get_last_id,'RCP','passenger_list','p_profile');
			
			
			//sms and email
			
			$passenger_details=$this->db->get_where('passenger_list',array('id'=>$get_last_id))->row();
			
			//sms
			$mobile_no=$passenger_details->p_contact;
						
			//Dear Customer, Welcome to RASHMI CABS, We are gujrat's leader for inter-city taxi travel. We have created your account on RASHMI CABS You can now login and update your profile for faster bookings. UserId : rashmitravels007@gmail.com  Password : 45123  
	
			//$message = 'Dear '.$passenger_details->p_full_name.', Welcome to Rashmi Cabs! We are excited to have you on board with us. To book a Cab, please go to download Rashmi Cabs mobile app from Android Play Store goo.gl/12232FkZdYZ. Call us on +91 9974 23 4111 for any help.';
			
			$message="Dear ".$passenger_details->p_full_name.", Welcome to RASHMI CABS, We are gujarat's leader for inter-city taxi travel. We have created your account on RASHMI CABS You can now login and update your profile for faster bookings. UserId : ".$passenger_details->p_email_id."  Password : ".$passenger_details->p_contact.". Call us on +91 9974 23 4111 for any help.";
						
			$this->Sms_email->send_sms($mobile_no,$message);
			
			//send email
			$to      = $passenger_details->p_email_id;
			$subject = 'Rashmi Cabs';
					
			$data['passenger_details']=$passenger_details;
			//$data['message']='Welcome to Rashmi Cabs! We are excited to have you on board with us. To book a Cab, please go to download Rashmi Cabs mobile app from Android Play Store goo.gl/12232FkZdYZ. Call us on +91 9974 23 4111 for any help.';
					
			$message_mail = $this->load->view('mail_passenger_register',$data,true);
			
			$this->Sms_email->send_email($to, $subject, $message_mail);
			
			
			redirect(base_url().'index.php/Passenger_management');
		}
	}
	
	
	public function view_passenger($passenger_id=NULL)
	{
		 $this->output->set_header('Last-Modified:'.gmdate('D, d M Y H:i:s').'GMT');
          $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate');
          $this->output->set_header('Cache-Control: post-check=0, pre-check=0',false);
          $this->output->set_header('Pragma: no-cache');
		$passenger_detail_data =  $this->input->post(NULL, TRUE);
    	if(isset($passenger_detail_data['btn_p_view']))
		{
			$passenger_data['passenger_data'] = $this->db->get_where('passenger_list',array('id'=>$passenger_detail_data['btn_p_view']))->row();
		} else
		{
			$passenger_data['passenger_data'] = $this->db->get_where('passenger_list',array('id'=>$passenger_id))->row();
		}

		//print_r($passenger_data);exit;		
		$this->load->view('header');
		$this->load->view('view_passenger',$passenger_data);
		$this->load->view('footer');
	
	}
	
	public function edit_passenger()
	{
		 $this->output->set_header('Last-Modified:'.gmdate('D, d M Y H:i:s').'GMT');
          $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate');
          $this->output->set_header('Cache-Control: post-check=0, pre-check=0',false);
          $this->output->set_header('Pragma: no-cache');
		$passenger_detail_data =  $this->input->post(NULL,TRUE);		
		$passenger_data['state'] = $this->db->get('state')->result();

		
			$passenger_data['passenger_data'] = $this->db->get_where('passenger_list',array('id'=>$passenger_detail_data['btn_p_edit']))->row();
		
				
		$this->load->view('header');
		$this->load->view('edit_passenger',$passenger_data);
		$this->load->view('footer');
		
	
	}
	
	
	public function update_passenger()
	{
		$passenger_detail_data =  $this->input->post(NULL, TRUE);
		date_default_timezone_set('Asia/Kolkata');
		
		$passenger_contact=$this->db->get_where('passenger_list',array('id!='=>$this->input->post('btn_edit_passenger'),'p_contact'=>$passenger_detail_data['contact_no']))->row();
		$passenger_email=$this->db->get_where('passenger_list',array('id!='=>$this->input->post('btn_edit_passenger'),'p_email_id'=>$passenger_detail_data['email_id']))->row();
		$passenger_gst=$this->db->get_where('passenger_list',array('id!='=>$this->input->post('btn_edit_passenger'),'p_gst_number'=>$passenger_detail_data['gst_number']))->row();
		
		if(!empty($passenger_contact)){
			$msg['error'] = "Contact Number already exist";
			$this->session->set_flashdata('error',$msg);
			$passenger_data['state'] = $this->db->get('state')->result();
			$passenger_data['passenger_data'] = $this->db->get_where('passenger_list',array('id'=>$passenger_detail_data['btn_edit_passenger']))->row();
					
			$this->load->view('header');
			$this->load->view('edit_passenger',$passenger_data);
			$this->load->view('footer');
		}else if(!empty($passenger_email)){
			$msg['error'] = "Email ID already exist";
			$this->session->set_flashdata('error',$msg);
			$passenger_data['state'] = $this->db->get('state')->result();
			$passenger_data['passenger_data'] = $this->db->get_where('passenger_list',array('id'=>$passenger_detail_data['btn_edit_passenger']))->row();
					
			$this->load->view('header');
			$this->load->view('edit_passenger',$passenger_data);
			$this->load->view('footer');
		}else if(!empty($passenger_detail_data['gst_number']) && !empty($passenger_gst)){
			$msg['error'] = "GST No. already exist";
			$this->session->set_flashdata('error',$msg);
			$passenger_data['state'] = $this->db->get('state')->result();
			$passenger_data['passenger_data'] = $this->db->get_where('passenger_list',array('id'=>$passenger_detail_data['btn_edit_passenger']))->row();
					
			$this->load->view('header');
			$this->load->view('edit_passenger',$passenger_data);
			$this->load->view('footer');
		}else{
				
			$passenger_detail_array = array(
						'p_full_name'=>$passenger_detail_data['f_name']." ".$passenger_detail_data['l_name'],
						'p_f_name'=>$passenger_detail_data['f_name'],
						'p_l_name'=>$passenger_detail_data['l_name'],
						'p_contact'=>$passenger_detail_data['contact_no'],
						'p_contact_2'=>$passenger_detail_data['contact_no_2'],
						'p_email_id'=>$passenger_detail_data['email_id'],
						'p_gender'=>$passenger_detail_data['gender'],
						'p_address'=>$passenger_detail_data['address'],
						'p_area'=>$passenger_detail_data['area'],
						'p_state'=>$passenger_detail_data['state'],
						'p_city'=>$passenger_detail_data['city'],
						'p_gst_number'=>$passenger_detail_data['gst_number'],
						'p_updated_date_time'=>date("Y-m-d H:i:s"),
						'p_updated_by'=>1	
						);
			
			
			
			
			$this->db->where('id',$this->input->post('btn_edit_passenger'));
			
			$this->db->update('passenger_list',$passenger_detail_array);
			
			$this->General_data->uploadImage('./uploads/passenger_profile',$this->input->post('btn_edit_passenger'),'EZTP','passenger_list','p_profile');
			
			
			redirect(base_url().'index.php/Passenger_management');
		}
		
	}
	
	public function reset_password()
	{

		if($this->input->post('passenger_id')!="" )
		{		
				$contact_no = $this->db->get_where('passenger_list',array('id'=>$this->input->post("passenger_id")))->row()->p_contact;
				
				$pw = array('p_password'=>md5($contact_no));	
				$passenger_id = $this->input->post("passenger_id");
				$this->db->where('id',$this->input->post("passenger_id"))->update('passenger_list',$pw);
				$message="Your new password for passenger app is ".$contact_no; 
				$this->Sms_email->send_sms($contact_no,$message);
					
				
				redirect(base_url().'index.php/Passenger_management/view_passenger/'.$passenger_id);
		}
	}
	
	public function passenger_status_change()
	{
		$passenger_detail_data =  $this->input->post(NULL, TRUE);
		
		$this->General_data->change_status('passenger_list','p_status',$passenger_detail_data['btn_active']);
		redirect('index.php/Passenger_management/view_passenger/'.$passenger_detail_data['btn_active']);
	}
	
	public function delete_passenger()
	{
		$this->db->delete('passenger_list',array('id'=>$this->input->post('btn_p_delete')));
		
		redirect(base_url().'index.php/Passenger_management');
	}
	
	public function passenger_trips_list(){
		
		
		$this->db->select('booking_list.*,package_type.package_sub_type,package_type.package_type,city_detail.c_name');
		$this->db->from('booking_list');
		$this->db->join('package_type','package_type.id=booking_list.b_type');
		$this->db->join('city_detail','city_detail.id=booking_list.b_from_city');
		$this->db->where(array('booking_list.b_p_id'=>$_POST['btn_p_trips']));
		$this->db->order_by("booking_list.b_from_date","DESC");
		$this->db->order_by("booking_list.b_from_time","DESC");
		$booking_data['booking_list'] = $this->db->get()->result();
		
		$booking_data['passenger_data'] = $this->db->get_where('passenger_list',array('id'=>$_POST['btn_p_trips']))->row();
		//echo "<pre>";
		//print_r($booking_data); exit;
		$this->load->view('passenger_booking_list',$booking_data);
	}
	
	public function passenger_helpdesk_support()
	{
		 $this->General_data->check_login();
		 
		 $this->db->select('*');
		 $this->db->from('helpdesk_support');
		 $this->db->where('hs_type=1 AND (hs_sender_id='.$_POST['passenger_id'].' AND hs_receiver_id=0) OR (hs_sender_id=0 AND hs_receiver_id='.$_POST['passenger_id'].')');
		 $data['helpdesk_support']=$this->db->get()->result();
		 
		 $data['passenger_id']=$_POST['passenger_id'];
		 //echo "<pre>";print_r($data);echo "</pre>";exit;
		 
		 $this->load->view('passenger_helpdesk_support',$data);
	}
	public function insert_passenger_helpdesk_support(){
		$this->General_data->check_login();
		
		$post=$this->input->post(NULL, TRUE);
		date_default_timezone_set('Asia/Kolkata');
		
		//echo "<pre>"; print_r($post);echo "</pre>";exit;
		
		
			$array= array(
					
					'hs_type' => 1,
					'hs_sender_id' =>0,
					'hs_receiver_id' => $post['passenger_id'],
					'hs_message'=>$post['message'],
					'hs_send_date' => date('Y-m-d'),
					'hs_send_time' => date('H:i:s'),
					'hs_created_by' => $this->session->userdata('user')->id,
					'hs_created_datetime' => date('Y-m-d H:i:s')
								
					
			);
			
			$this->db->insert('helpdesk_support',$array);
			$get_last_id=$this->db->insert_id();
			$this->General_data->update_id('helpdesk_support','RCHS','hs_id');
			
			
			
			//redirect(site_url('index.php/Agent_driver_management'));
		
	}
	
}
