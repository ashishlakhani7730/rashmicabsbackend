<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class Agent_management extends CI_Controller 

{

	

	 function __construct()

    {

        parent::__construct();

		$this->load->model('state_city_model');		

        $this->load->model('General_data');

		$this->load->model('Sms_email');

    }

	

		 

	public function index()

	{

		$user = $this->session->has_userdata('user');

		if(empty($user)){

			redirect('index.php/Login');

}else {

		$data['agent_list']=$this->db->get('agent_detail')->result();

		

		$this->load->view('manage_agents',$data);

		}	

	}

	

	public function view_agent()
	{	
		//used for calling when Manage Oneway Offer page.
		if($this->uri->segment("3") != "" && $this->uri->segment("3") == "MOO")
		{
			$id = $this->uri->segment("4");
			$data['agent_view']=$this->db->get_where('agent_detail',array('id'=>$id))->row();

		

			$this->load->view('agent_view',$data);
		}
		else if($this->input->post()) //post from index function view file.
		{
			$id=$this->input->post('agent_view_id');
			$data['agent_view']=$this->db->get_where('agent_detail',array('id'=>$id))->row();

		

			$this->load->view('agent_view',$data);
		}
		else // error give when direct hit url.
		{
			$data["heading"] = "Please Try Agian";
			$data["message"] = "<a href='".base_url()."index.php/Dashboard' >GO TO HOME</a>";
			$this->load->view('errors/html/error_404',$data);
		}

	}	

	

	public function add_agent()

	{

		 $data['state'] = $this->state_city_model->get_unique_states();	

		 	

		 $this->load->view('add_agent',$data);	

	}

	

	

	public function insert_agent()

	{

	

		date_default_timezone_set('Asia/Kolkata');



		/*$image_name= array ('user_image1','user_image2','user_image3','a_driving_lic_back','a_other_docs2','a_other_docs3');

			

		$image_array = array ('image1','image2','image3','a_driving_lic_back','a_other_docs2','a_other_docs3');			

		

		$config['upload_path']   =   "./uploads/Agent_Image";

		 

		$config['allowed_types'] =   "gif|jpg|jpeg|png"; 					

	

		$this->load->library('upload', $config);

		$img = array();			

		$i=1;

		

			foreach( $image_array as $image_a)

			{

			

					 if ( $this->upload->do_upload($image_a))

					 {						

							 $data = array('upload_data' => $this->upload->data());

							 $b = $this->upload->data();																		

							 $img[$i] = $b['file_name'];

							 $i++;											

					 }			

					 else

					 {

							$this->load->view('add_agent');								

					 } 

				 

			}  

		

		*/		

		$agent_contact=$this->db->get_where('agent_detail',array('a_contact_no1' => $this->input->post('contact_no')))->row();

		$agent_email=$this->db->get_where('agent_detail',array('a_email_id' => $this->input->post('email')))->row();

		

		if(!empty($agent_contact)){

			$msg['error'] = "Contact Number already exist";

			$this->session->set_flashdata('error',$msg);

			redirect(site_url('index.php/Agent_management/add_agent'));

		}

		else{

			$data = array (

						'a_full_name'	   =>$this->input->post('first_name')." ".$this->input->post('last_name'),
						'a_f_name'         =>$this->input->post('first_name'),
						'a_l_name'         =>$this->input->post('last_name'),
						'a_contact_no1'    =>$this->input->post('contact_no'),
						'a_contact_no2'    =>$this->input->post('sec_contact_no'),
						'a_email_id'       =>$this->input->post('email'),
						//'a_imei_no'       =>$this->input->post('imei_no'),
						'a_bsns_name'      =>$this->input->post('bsns_name'),
						'a_bsns_contact_no'=>$this->input->post('bsns_contact_no'),
						'a_bsns_email_id'  =>$this->input->post('bsns_email'),
						'a_pan_no'         =>$this->input->post('pan_no'),
						'a_gst_no'         =>$this->input->post('gst_no'),
						'a_bnk_name'       =>$this->input->post('bank_name'),
						'a_ac_name'        =>$this->input->post('account_name'),
						'a_ac_no'          =>$this->input->post('account_no'),
						'a_ifsc'           =>$this->input->post('ifsc_code'),
						'a_address'        =>$this->input->post('address'),
						'a_area'           =>$this->input->post('area'),
						'a_zipcode'        =>$this->input->post('zipcode'),
						'a_state'          =>$this->input->post('state_name'),
						'a_city'           =>$this->input->post('city_name'),
						'a_pswd'           =>md5($this->input->post('contact_no')),
						'a_joining_date_time'=>date("Y-m-d H:i:s"),
						'a_created_by' => $this->session->userdata('user')->id,
						'a_status'		   =>1,
						//'user_image1'	   =>$img[1],
						//'user_image2'	   =>$img[2],
						//'user_image3'	   =>$img[3],
						//'a_driving_lic_back'=>$img[4],
						//'a_other_docs2'    =>$img[5],
						//'a_other_docs3'    =>$img[6]

						);

			$this->db->insert('agent_detail',$data);
			$get_last_id=$this->db->insert_id();

			$this->db->query("update agent_detail set agent_id=CONCAT('RCAG".date('y').date('m')."',LPAD(LAST_INSERT_ID(), 2, '0')) where id=LAST_INSERT_ID()");

			

			$this->General_data->uploadImage('./uploads/Agent_Image/profile_pic',$get_last_id,'RCAG','agent_detail','user_image1');

			$this->General_data->uploadImage('./uploads/Agent_Image/driving_lic_front',$get_last_id,'RCAG','agent_detail','user_image2');

			$this->General_data->uploadImage('./uploads/Agent_Image/driving_lic_back',$get_last_id,'RCAG','agent_detail','a_driving_lic_back');

			$this->General_data->uploadImage('./uploads/Agent_Image/other_docs1',$get_last_id,'RCAG','agent_detail','user_image3');

			$this->General_data->uploadImage('./uploads/Agent_Image/other_docs2',$get_last_id,'RCAG','agent_detail','a_other_docs2');

			$this->General_data->uploadImage('./uploads/Agent_Image/other_docs3',$get_last_id,'RCAG','agent_detail','a_other_docs3');

			

			//sms and email

			

			$agent_details=$this->db->get_where('agent_detail',array('id'=>$get_last_id))->row();

			

			//sms

			$mobile_no=$agent_details->a_contact_no1;

						

			//$message = 'Dear '.$agent_details->a_full_name.', Welcome to Rashmi Cabs! We are excited to have you on board with us. Call us on +91 9974234111 for any help.';

			$message="Dear ".$agent_details->a_full_name.", Welcome to RASHMI CABS, We are gujarat's leader for inter-city taxi travel. We have created your account on RASHMI CABS You can now login and update your profile for faster bookings. UserId : ".$agent_details->a_email_id."  Password : ".$this->input->post('contact_no').". Call us on +91 9974234111 for any help.";

						

			$this->Sms_email->send_sms($mobile_no,$message);

			

			//send email

			$to      = $agent_details->a_email_id;

			$subject = 'Rashmi Cabs';

			$data['agent_details']=$agent_details;

			//$data['message']='Welcome to Rashmi Cabs! We are excited to have you on board with us. Call us on +91 9974 23 4111 for any help.';

			$data['password']=$this->input->post('password');

			$message_mail = $this->load->view('mail_agent_register',$data,true);

			$this->Sms_email->send_email($to, $subject, $message_mail);			

			return redirect(site_url('index.php/Agent_management'));

			

		}	

	}

	

	public function agent_status()

	{

		

		$agent_detail_data =  $this->input->post(NULL, TRUE);

		

		$this->General_data->change_status('agent_detail','a_status',$agent_detail_data['id']);

		

	}

	

	public function agent_delete()

	{

		$agent_id = $this->input->post('agent_id');

		

		$agent_detail = $this->db->get_where('agent_detail',array('id'=>$agent_id))->row();

	

		$this->db->delete('agent_detail',array('id'=>$agent_id));

		

		unlink(realpath('uploads/Agent_Image/profile_pic/'.$agent_detail->user_image1));

		unlink(realpath('uploads/Agent_Image/driving_lic_front/'.$agent_detail->user_image2));

		unlink(realpath('uploads/Agent_Image/driving_lic_back/'.$agent_detail->a_driving_lic_back));

		unlink(realpath('uploads/Agent_Image/other_docs1/'.$agent_detail->user_image3));

		unlink(realpath('uploads/Agent_Image/other_docs2/'.$agent_detail->a_other_docs2));

		unlink(realpath('uploads/Agent_Image/other_docs3/'.$agent_detail->a_other_docs3));

			

		return redirect(site_url('index.php/Agent_management'));		

	}

	

	public function get_data_edit_agent()

	{

		$agent_id = $this->input->post('agent_id');

		

		$data['edit_agent'] = $this->db->get_where('agent_detail',array('id'=>$agent_id))->row();

		

		$data['state'] = $this->state_city_model->get_unique_states();	

		

		$this->load->view('edit_agent',$data);

			

	}

	public function delete_img()
	{
		echo "<pre>"; print_r($this->input->get()); exit;
		//unlink('path/to/file.jpg');
	}

	public function update_agent()

	{

		$agent_id = $this->input->post('agent_id');

		

		date_default_timezone_set('Asia/Kolkata');

		

	

		/*$image_name= array ('user_image1','user_image2','user_image3','a_driving_lic_back','a_other_docs2','a_other_docs3');

			

		$image_array = array ('image1','image2','image3','a_driving_lic_back','a_other_docs2','a_other_docs3');

						

		

		$config['upload_path']   =   "./uploads/Agent_Image";

		 

		$config['allowed_types'] =   "gif|jpg|jpeg|png"; 					

	

		$this->load->library('upload', $config);	

		$img = array();			

		$i=1;

		

		$agent_image_detail = $this->db->get_where('agent_detail',array('id'=>$agent_id))->row();

			

		$img[1] =$agent_image_detail->user_image1;	

		$img[2] =$agent_image_detail->user_image2;

		$img[3] =$agent_image_detail->user_image3;	

		$img[4] =$agent_image_detail->a_driving_lic_back;	

		$img[5] =$agent_image_detail->a_other_docs2;

		$img[6] =$agent_image_detail->a_other_docs3;	

		

			foreach( $image_array as $image_a)

			{

			

					 if ( $this->upload->do_upload($image_a))

					{						

							 $data = array('upload_data' => $this->upload->data());

							 $b = $this->upload->data();																		

							 $img[$i] = $b['file_name'];

							 $i++;											

					}			

					else

					{

							$this->load->view('edit_agent');								

					} 

				

			}  */

			

		$agent_contact=$this->db->get_where('agent_detail',array('id!='=>$agent_id, 'a_contact_no1' => $this->input->post('contact_no')))->row();

		$agent_email=$this->db->get_where('agent_detail',array('id!='=>$agent_id, 'a_email_id' => $this->input->post('email')))->row();

		

		if(!empty($agent_contact)){

			$msg['error'] = "Contact Number already exist";

			$this->session->set_flashdata('error',$msg);

			$data['edit_agent'] = $this->db->get_where('agent_detail',array('id'=>$agent_id))->row();

			$data['state'] = $this->state_city_model->get_unique_states();	

			$this->load->view('edit_agent',$data);

		}else{

		

		

			$data = array (

					'a_full_name'	  =>$this->input->post('first_name')." ".$this->input->post('last_name'),

					'a_f_name'        =>$this->input->post('first_name'),

					'a_l_name'        =>$this->input->post('last_name'),

					'a_contact_no1'   =>$this->input->post('contact_no'),

					'a_contact_no2'   =>$this->input->post('sec_contact_no'),

					'a_email_id'      =>$this->input->post('email'),

					//'a_imei_no'      =>$this->input->post('imei_no'),

					'a_bsns_name'     =>$this->input->post('bsns_name'),

					'a_bsns_contact_no'=>$this->input->post('bsns_contact_no'),

					'a_bsns_email_id' =>$this->input->post('bsns_email'),

					'a_pan_no'        =>$this->input->post('pan_no'),

					'a_gst_no'        =>$this->input->post('gst_no'),

					'a_bnk_name'      =>$this->input->post('bank_name'),

					'a_ac_name'       =>$this->input->post('account_name'),

					'a_ac_no'         =>$this->input->post('account_no'),

					'a_ifsc'          =>$this->input->post('ifsc_code'),

					'a_address'       =>$this->input->post('address'),

					'a_area'          =>$this->input->post('area'),

					'a_zipcode'       =>$this->input->post('zipcode'),

					'a_state'         =>$this->input->post('state_name'),

					'a_city'          =>$this->input->post('city_name'),				

					'a_updated_date_time'=>date("Y-m-d H:i:s"),

					'a_updated_by' => $this->session->userdata('user')->id,

					//'user_image1'	  =>$img[1],

					//'user_image2'	  =>$img[2],

					//'user_image3'	  =>$img[3],

					//'a_driving_lic_back'=>$img[4],

					//'a_other_docs2'    =>$img[5],

					//'a_other_docs3'    =>$img[6]

					 );

	

			$this->db->where('id',$agent_id)

					 ->update('agent_detail',$data);

					 

			/*if($this->input->post('pasword')!="")

			{		

				$pw = array ('a_pswd'=>md5($this->input->post('password')));	

						

				$this->db->where('id',$agent_id)

						 ->update('agent_detail',$pw);

			}*/

			

			$this->General_data->uploadImage('./uploads/Agent_Image/profile_pic',$agent_id,'RCAG','agent_detail','user_image1');

			$this->General_data->uploadImage('./uploads/Agent_Image/driving_lic_front',$agent_id,'RCAG','agent_detail','user_image2');

			$this->General_data->uploadImage('./uploads/Agent_Image/driving_lic_back',$agent_id,'RCAG','agent_detail','a_driving_lic_back');

			$this->General_data->uploadImage('./uploads/Agent_Image/other_docs1',$agent_id,'RCAG','agent_detail','user_image3');

			$this->General_data->uploadImage('./uploads/Agent_Image/other_docs2',$agent_id,'RCAG','agent_detail','a_other_docs2');

			$this->General_data->uploadImage('./uploads/Agent_Image/other_docs3',$agent_id,'RCAG','agent_detail','a_other_docs3');

			

			return redirect(site_url('index.php/Agent_management'));

		}

		

	}

	public function reset_password()
	{
		if($this->input->post('agent_id')!="" )
		{		
				$contact_no = $this->db->get_where('agent_detail',array('id'=>$this->input->post("agent_id")))->row()->a_contact_no1;
				
				$pw = array('a_pswd'=>md5($contact_no));	

				$this->db->where('id',$this->input->post("agent_id"))->update('agent_detail',$pw);
				$message="Your new password for agent app is ".$contact_no; 
				$this->Sms_email->send_sms($contact_no,$message);
				redirect(site_url('index.php/Agent_management/view_agent/MOO/'.$this->input->post('agent_id')));
		}
	}

	

	public function agent_trips_list(){

		

		

		$this->db->select('booking_list.*,package_type.package_sub_type,package_type.package_type,city_detail.c_name');

		$this->db->from('booking_list');

		$this->db->join('package_type','package_type.id=booking_list.b_type');

		$this->db->join('city_detail','city_detail.id=booking_list.b_from_city');

		$this->db->where(array('booking_list.b_agent_id'=>$_POST['btn_a_trips']));

		$this->db->order_by("booking_list.b_from_date","DESC");
		$this->db->order_by("booking_list.b_from_time","DESC");

		$booking_data['booking_list'] = $this->db->get()->result();

		

		$booking_data['agent_view']=$this->db->get_where('agent_detail',array('id'=>$_POST['btn_a_trips']))->row();

		

		$this->load->view('agent_booking_list',$booking_data);

	}

	public function agent_helpdesk_support()

	{

		 $this->General_data->check_login();

		 

		 $this->db->select('*');

		 $this->db->from('helpdesk_support');

		 $this->db->where('hs_type=2 AND (hs_sender_id='.$_POST['agent_id'].' AND hs_receiver_id=0) OR (hs_sender_id=0 AND hs_receiver_id='.$_POST['agent_id'].')');

		 $data['helpdesk_support']=$this->db->get()->result();

		 

		 $data['agent_id']=$_POST['agent_id'];

		 //echo "<pre>";print_r($data);echo "</pre>";exit;

		 

		 $this->load->view('agent_helpdesk_support',$data);

	}

	public function insert_agent_helpdesk_support(){

		$this->General_data->check_login();

		

		$post=$this->input->post(NULL, TRUE);

		date_default_timezone_set('Asia/Kolkata');

		

		//echo "<pre>"; print_r($post);echo "</pre>";exit;

		

		

			$array= array(

					

					'hs_type' => 2,

					'hs_sender_id' =>0,

					'hs_receiver_id' => $post['agent_id'],

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

	public function add_wallet_balance(){

		//$this->General_data->check_login();

		

		$post=$this->input->post(NULL, TRUE);

		date_default_timezone_set('Asia/Kolkata');

		

		//echo "<pre>"; print_r($post);echo "</pre>";exit;

		

		$array= array(

					'awt_agent_id' =>$post['agent_id'],

					'awt_type' => $post['withdraw_deposit'],

					'awt_notes' => $post['notes'],

					'awt_date' => date('Y-m-d',strtotime($post['date'])),

					'awt_time' => date('H:i:s'),

					'awt_created_by' => $this->session->userdata('user')->id,

					'awt_created_datetime' => date('Y-m-d H:i:s')

								

					

		);

		

		$this->General_data->agent_wallet_transaction($array,$post['amount']);

		

		

	}

	public function wallet_transaction(){

		$this->General_data->check_login();

		

		$data['agent_view']=$this->db->get_where('agent_detail',array('id'=>$this->input->post('agent_id')))->row();

		

		$data['wallet_transaction']=$this->db->order_by('id','desc')->get_where('agent_wallet_transaction',array('awt_agent_id'=>$this->input->post('agent_id')))->result();

		

		$this->load->view('agent_wallet_transaction',$data);

	}

}

?>