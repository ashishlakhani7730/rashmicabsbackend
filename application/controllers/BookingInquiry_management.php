<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BookingInquiry_management extends CI_Controller 
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
		$this->General_data->check_login();
		
		$data['booking_inquiry']=$this->db->get('booking_inquiry')->result();
		
		$this->load->view('manage_booking_inquiry',$data);
	}
	
	
	public function add_booking_enquiry()
	{
		 $this->General_data->check_login();
		 $data['vehicle_category'] = $this->db->get('vehicle_category_detail')->result();
		 $this->load->view('add_booking_inquiry',$data);	
	}
	
	public function insert_booking_enquiry(){
		$this->General_data->check_login();
		
		$post=$this->input->post(NULL, TRUE);
		date_default_timezone_set('Asia/Kolkata');
		
		//echo "<pre>"; print_r($post);echo "</pre>";exit;
		
		
		
			$array= array(
					
					'bi_name' => $post['name'],
					'bi_mobile' => $post['mobile'],
					'bi_from_city' => $post['from_city'],
					'bi_to_city' => $post['to_city'],
					'bi_vc_id'=>$post['category_id'],
					'bi_vc_name'=>$post['category_name'],
					'bi_plan_date' => date('Y-m-d',strtotime($post['plan_date'])),
					'bi_plan_time' => date('H:i:s',strtotime($post['plan_time'])),
					'bi_open_notes' => $post['open_notes'],
					'bi_created_by' => $this->session->userdata('user')->id,
					'bi_created_datetime' => date('Y-m-d H:i:s')
								
					
			);
			
			$this->db->insert('booking_inquiry',$array);
			$get_last_id=$this->db->insert_id();
			$this->General_data->update_id('booking_inquiry','RCBI','bi_id');
			
			
			
			redirect(site_url('index.php/BookingInquiry_management'));
		
	}
	public function edit_booking_enquiry()
	{
		 $this->General_data->check_login();
		 $data['vehicle_category'] = $this->db->get('vehicle_category_detail')->result();
		 $data['booking_inquiry']=$this->db->get_where('booking_inquiry',array('id'=>$_POST['id']))->row();
		 $this->load->view('edit_booking_inquiry',$data);	
	}
	
	
	
	public function agent_vehicle_status()
	{
		$this->General_data->check_login();
		
		$post=$this->input->post(NULL, TRUE);
		date_default_timezone_set('Asia/Kolkata');
		
		$vehicle_list_status=$this->db->get_where('vehicle_list',array('id'=>$post['agent_vehicle_id']))->row()->v_status;
		
		
		
		if($vehicle_list_status==1)
			$array=array('v_status'=>0);
		else
			$array=array('v_status'=>1);
				
		$this->db->where('id',$post['agent_vehicle_id']);
		$this->db->update('vehicle_list',$array);
			
				
		
	}
	public function delete_booking_enquiry()
	{
		$this->General_data->check_login();
		
		$post=$this->input->post(NULL, TRUE);
		date_default_timezone_set('Asia/Kolkata');
		
		
		
		$this->db->where('id',$post['id']);
		$this->db->delete('booking_inquiry');
		
		
				
		redirect(site_url('index.php/BookingInquiry_management'));
	}
}
?>