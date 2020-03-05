<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Report_management extends CI_Controller 
{
	
	 function __construct()
    {
        parent::__construct();
		$this->load->model('state_city_model');		
        $this->load->model('General_data');
    }
	
		 
	public function BookingReports()
	{
		$user = $this->session->has_userdata('user');
		if(empty($user)){
			redirect('index.php/Login');
		}else{
			$post=$this->input->post(NULL,TRUE);
			//echo "<pre>";print_r($post);echo "</pre>";exit;
			if(isset($post['from_date']) && isset($post['to_date']) && isset($post['booking_type'])){
				$this->db->select('booking_list.*,package_type.package_sub_type,package_type.package_type,city_detail.c_name');
				$this->db->from('booking_list');
				$this->db->join('package_type','package_type.id=booking_list.b_type');
				$this->db->join('city_detail','city_detail.id=booking_list.b_from_city');
				$this->db->where('booking_list.b_from_date>=',date('Y-m-d',strtotime($post['from_date'])));
				$this->db->where('booking_list.b_from_date<=',date('Y-m-d',strtotime($post['to_date'])));
				if($post['booking_type']!=0){
					$this->db->where('package_type.id',$post['booking_type']);
				}
				$data['booking_list'] = $this->db->get()->result();
			}else{
				$data['booking_list'] =array();
			}
			$this->load->view('booking_reports',$data);
		}	
	}		public function BookingReportsOfSearch()	{		$user = $this->session->has_userdata('user');				$flag = 0;		if(empty($user)){			redirect('index.php/Login');		}else {			if($this->input->post())			{				 if($this->input->post('bookingno') == '' && $this->input->post('cstno') == '')				 {												$data["booking_list"] = '';						$data["error"] = "Please Enter Booking Number Or Customer Mobile Number";				 }				 else				 {					$booking = $this->input->post('bookingno');					$cstno = $this->input->post('cstno');										$this->db->select('booking_list.*,package_type.package_sub_type,package_type.package_type,city_detail.c_name')->from('booking_list')->join('package_type','package_type.id=booking_list.b_type')->join('city_detail','city_detail.id=booking_list.b_from_city')->where("(booking_list.b_id = '$booking' OR booking_list.b_p_contact = '$cstno')")->order_by("booking_list.b_from_date","DESC")->order_by("booking_list.b_from_time","ASC");										$data["booking_list"] = $this->db->get()->result();									 }												$this->load->view('search_all_booking',$data);			}			else			{				$data["booking_list"] = "";				$this->load->view('search_all_booking',$data);			}		}	}
	
	public function AgentsReports()
	{
		$user = $this->session->has_userdata('user');
		if(empty($user)){
			redirect('index.php/Login');
		}else{
			$post=$this->input->post(NULL,TRUE);
			//echo "<pre>";print_r($post);echo "</pre>";exit;
			if(isset($post['from_date']) && isset($post['to_date']) && isset($post['agents'])){
				$this->db->select('booking_list.*,package_type.package_sub_type,package_type.package_type,city_detail.c_name');
				$this->db->from('booking_list');
				$this->db->join('package_type','package_type.id=booking_list.b_type');
				$this->db->join('city_detail','city_detail.id=booking_list.b_from_city');
				$this->db->where('booking_list.b_from_date>=',date('Y-m-d',strtotime($post['from_date'])));
				$this->db->where('booking_list.b_from_date<=',date('Y-m-d',strtotime($post['to_date'])));
				if($post['agents']!=0){
					$this->db->where('booking_list.b_agent_id',$post['agents']);
				}
				$data['booking_list'] = $this->db->get()->result();
			}else{
				$data['booking_list'] =array();
			}
			$this->load->view('agents_reports',$data);
		}	
	}
	public function PassengersReports()
	{
		$user = $this->session->has_userdata('user');
		if(empty($user)){
			redirect('index.php/Login');
		}else{
			$post=$this->input->post(NULL,TRUE);
			//echo "<pre>";print_r($post);echo "</pre>";exit;
			if(isset($post['from_date']) && isset($post['to_date']) && isset($post['passenger_id'])){
				$this->db->select('booking_list.*,package_type.package_sub_type,package_type.package_type,city_detail.c_name');
				$this->db->from('booking_list');
				$this->db->join('package_type','package_type.id=booking_list.b_type');
				$this->db->join('city_detail','city_detail.id=booking_list.b_from_city');
				$this->db->where('booking_list.b_from_date>=',date('Y-m-d',strtotime($post['from_date'])));
				$this->db->where('booking_list.b_from_date<=',date('Y-m-d',strtotime($post['to_date'])));
				if($post['passenger_id']!=0){
					$this->db->where('booking_list.b_p_id',$post['passenger_id']);
				}
				$data['booking_list'] = $this->db->get()->result();
			}else{
				$data['booking_list'] =array();
			}
			$this->load->view('passengers_reports',$data);
		}	
	}
	
	public function OtherReports()
	{
		$user = $this->session->has_userdata('user');
		if(empty($user)){
			redirect('index.php/Login');
		}else{
			$post=$this->input->post(NULL,TRUE);
			//echo "<pre>";print_r($post);echo "</pre>";exit;
			if(isset($post['from_date']) && isset($post['to_date']) && isset($post['type']) && isset($post['other_id'])){
				$this->db->select('booking_list.*,package_type.package_sub_type,package_type.package_type,city_detail.c_name');
				$this->db->from('booking_list');
				$this->db->join('package_type','package_type.id=booking_list.b_type');
				$this->db->join('city_detail','city_detail.id=booking_list.b_from_city');
				$this->db->where('booking_list.b_from_date>=',date('Y-m-d',strtotime($post['from_date'])));
				$this->db->where('booking_list.b_from_date<=',date('Y-m-d',strtotime($post['to_date'])));
				if($post['other_id']!=0){
					if($post['type']==1){
						$this->db->where('booking_list.b_source_status',$post['other_id']);
					}else if($post['type']==2){
						$this->db->where('booking_list.b_from_city',$post['other_id']);
					}
				}
				$data['booking_list'] = $this->db->get()->result();
				
			}else{
				$data['booking_list'] =array();
			}
			//echo $this->session->flashdata('error');exit;
			$this->load->view('other_reports',$data);
		}	
	}
	public function fetch_other_type()
	{
		$post=$this->input->post(NULL, TRUE);
		
		echo "<option value='0' selected='selected'>All</option>";
		if($post['type']==1){
			echo "<option value='1' >Back Side</option><option value='4'>Android App</option><option value='5'>IOS App</option>";
		}else if($post['type']==2){
		
			$city_list = $this->db->get('city_detail')->result();
            foreach($city_list as $c)
            {
				echo "<option value='".$c->id."'>".$c->c_name."</option>";
			}
		}
	}
}
?>