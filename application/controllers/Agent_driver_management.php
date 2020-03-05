<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Agent_driver_management extends CI_Controller 
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
		
		$this->db->select('driver_detail.*,agent_detail.a_full_name');
		$this->db->from('driver_detail');
		$this->db->join('agent_detail','agent_detail.id=driver_detail.agent_id');
		$data['driver_detail']=$this->db->get()->result();
		
		$this->load->view('manage_agent_driver',$data);
	}
	
	public function view_agent_driver()
	{	
		$this->General_data->check_login();
		
		$this->db->select('driver_detail.*,agent_detail.a_full_name,agent_detail.a_contact_no1,agent_detail.a_email_id');
		$this->db->from('driver_detail');
		$this->db->join('agent_detail','agent_detail.id=driver_detail.agent_id');
		$this->db->where('driver_detail.id',$this->input->post('agent_driver_id'));
		$data['driver_detail']=$this->db->get()->row();
		
		$this->load->view('agent_driver_view',$data);	
	}	
	
	public function add_agent_driver()
	{
		 $this->General_data->check_login();
		 $data['state'] = $this->state_city_model->get_unique_states();	
		 $data['agent_detail'] = $this->db->get_where('agent_detail',array('a_status'=>1))->result();
		 $this->load->view('add_agent_driver',$data);	
	}
	
	public function insert_agent_driver(){
		$this->General_data->check_login();
		
		$post=$this->input->post(NULL, TRUE);
		date_default_timezone_set('Asia/Kolkata');
		
		//echo "<pre>"; print_r($post);echo "</pre>";exit;
		
		$driver_contact=$this->db->get_where('driver_detail',array('d_contact_no1' => $post['d_contact_no1']))->row();
		$driver_mail=$this->db->get_where('driver_detail',array('d_email_id' => $post['d_email_id']))->row();
		
		if(!empty($driver_contact)){
			$msg['error'] = "Contact Number already exist";
			$this->session->set_flashdata('error',$msg);
			redirect(site_url('index.php/Agent_driver_management/add_agent_driver'));
		} else{
		
			$array= array(
					
					'agent_id' => $post['agent_id'],
					'd_full_name' => $post['d_f_name']." ".$post['d_l_name'],
					'd_f_name' => $post['d_f_name'],
					'd_l_name' => $post['d_l_name'],
					'd_contact_no1' => $post['d_contact_no1'],
					'd_contact_no2' => $post['d_contact_no2'],
					'd_email_id' => $post['d_email_id'],
					'd_address' => $post['d_address'],
					'd_area' => $post['d_area'],
					'd_zipcode' => $post['d_zipcode'],
					'd_state' => $post['d_state'],
					'd_status'=> 0,
					'd_city' => $post['d_city'],
					'd_reg_date' => date('Y-m-d'),
					'd_reg_time' => date('H:i:s'),
					'd_created_type'=> 1,
					'd_created_by' => $this->session->userdata('user')->id,
					'd_created_datetime' => date('Y-m-d H:i:s')
								
					
			);
			
			$this->db->insert('driver_detail',$array);
			$get_last_id=$this->db->insert_id();
			$this->General_data->update_id('driver_detail','RCD','driver_id');
			
			$this->General_data->uploadImage('./uploads/driver/profile_pic',$get_last_id,'RCD','driver_detail','d_profile_pic');
			$this->General_data->uploadImage('./uploads/driver/driving_lic_front',$get_last_id,'RCD','driver_detail','d_driving_lic_front');
			$this->General_data->uploadImage('./uploads/driver/driving_lic_back',$get_last_id,'RCD','driver_detail','d_driving_lic_back');
			$this->General_data->uploadImage('./uploads/driver/other_docs1',$get_last_id,'RCD','driver_detail','d_other_docs1');
			$this->General_data->uploadImage('./uploads/driver/other_docs2',$get_last_id,'RCD','driver_detail','d_other_docs2');
			$this->General_data->uploadImage('./uploads/driver/other_docs3',$get_last_id,'RCD','driver_detail','d_other_docs3');
			
			redirect(site_url('index.php/Agent_driver_management'));
		}
	}
	public function edit_agent_driver()
	{
		 $this->General_data->check_login();
		 $data['state'] = $this->state_city_model->get_unique_states();	
		 $data['agent_detail'] = $this->db->get_where('agent_detail',array('a_status'=>1))->result();
		 $data['driver_detail'] = $this->db->get_where('driver_detail',array('id'=>$this->input->post('agent_driver_id')))->row();
		 $this->load->view('edit_agent_driver',$data);	
	}
	
	public function update_agent_driver()
	{
		$this->General_data->check_login();
		
		$post=$this->input->post(NULL, TRUE);
		date_default_timezone_set('Asia/Kolkata');
		
		//echo "<pre>"; print_r($post);echo "</pre>";exit;
		
		$driver_contact=$this->db->get_where('driver_detail',array('id!='=>$post['agent_driver_id'], 'd_contact_no1' => $post['d_contact_no1']))->row();
		
		
		if(!empty($driver_contact)){
			$msg['error'] = "Contact Number already exist";
			$this->session->set_flashdata('error',$msg);
			$data['state'] = $this->state_city_model->get_unique_states();	
		 	$data['agent_detail'] = $this->db->get_where('agent_detail',array('a_status'=>1))->result();
			$data['driver_detail'] = $this->db->get_where('driver_detail',array('id'=>$post['agent_driver_id']))->row();
		 	$this->load->view('edit_agent_driver',$data);	
		}else{
		
		
			$array= array(
					
					'agent_id' => $post['agent_id'],
					'd_full_name' => $post['d_f_name']." ".$post['d_l_name'],
					'd_f_name' => $post['d_f_name'],
					'd_l_name' => $post['d_l_name'],
					'd_contact_no1' => $post['d_contact_no1'],
					'd_contact_no2' => $post['d_contact_no2'],
					'd_email_id' => $post['d_email_id'],
					'd_address' => $post['d_address'],
					'd_area' => $post['d_area'],
					'd_zipcode' => $post['d_zipcode'],
					'd_state' => $post['d_state'],
					'd_city' => $post['d_city'],
					'd_updated_type' => 1,
					'd_updated_by' => $this->session->userdata('user')->id,
					'd_updated_datetime' => date('Y-m-d H:i:s')
								
					
			);
			
			
			
			$this->db->where('id',$post['agent_driver_id']);
			$this->db->update('driver_detail',$array);
					
			$this->General_data->uploadImage('./uploads/driver/profile_pic',$post['agent_driver_id'],'RCD','driver_detail','d_profile_pic');
			$this->General_data->uploadImage('./uploads/driver/driving_lic_front',$post['agent_driver_id'],'RCD','driver_detail','d_driving_lic_front');
			$this->General_data->uploadImage('./uploads/driver/driving_lic_back',$post['agent_driver_id'],'RCD','driver_detail','d_driving_lic_back');
			$this->General_data->uploadImage('./uploads/driver/other_docs1',$post['agent_driver_id'],'RCD','driver_detail','d_other_docs1');
			$this->General_data->uploadImage('./uploads/driver/other_docs2',$post['agent_driver_id'],'RCD','driver_detail','d_other_docs2');
			$this->General_data->uploadImage('./uploads/driver/other_docs3',$post['agent_driver_id'],'RCD','driver_detail','d_other_docs3');
			
			
			$this->db->select('driver_detail.*,agent_detail.a_full_name,agent_detail.a_contact_no1,agent_detail.a_email_id');
			$this->db->from('driver_detail');
			$this->db->join('agent_detail','agent_detail.id=driver_detail.agent_id');
			$this->db->where('driver_detail.id',$post['agent_driver_id']);
			$data['driver_detail']=$this->db->get()->row();
			
			$this->load->view('agent_driver_view',$data);	
		}
	}
	
	public function agent_driver_status()
	{
		$this->General_data->check_login();
		
		$post=$this->input->post(NULL, TRUE);
		date_default_timezone_set('Asia/Kolkata');
		
		$driver_detail_status=$this->db->get_where('driver_detail',array('id'=>$post['agent_driver_id']))->row()->d_status;
		
		
		
		if($driver_detail_status==1)
			$array=array('d_status'=>0);
		else
			$array=array('d_status'=>1);
				
		$this->db->where('id',$post['agent_driver_id']);
		$this->db->update('driver_detail',$array);
			
				
		/*$this->db->select('driver_detail.*,agent_detail.a_full_name,agent_detail.a_contact_no1,agent_detail.a_email_id');
		$this->db->from('driver_detail');
		$this->db->join('agent_detail','agent_detail.id=driver_detail.agent_id');
		$this->db->where('driver_detail.id',$post['agent_driver_id']);
		$data['driver_detail']=$this->db->get()->row();
		
		//echo "<pre>"; print_r($data);echo "</pre>";exit;
		
		$this->load->view('agent_driver_view',$data);	*/
	}
	public function agent_driver_delete()
	{
		$this->General_data->check_login();
		
		$post=$this->input->post(NULL, TRUE);
		date_default_timezone_set('Asia/Kolkata');
		
		$driver_detail=$this->db->get_where('driver_detail',array('id'=>$post['agent_driver_id']))->row();
		
		$this->db->where('id',$post['agent_driver_id']);
		$this->db->delete('driver_detail');
		
		unlink(realpath('uploads/driver/profile_pic/'.$driver_detail->d_profile_pic));
		unlink(realpath('uploads/driver/driving_lic_front/'.$driver_detail->d_driving_lic_front));
		unlink(realpath('uploads/driver/driving_lic_back/'.$driver_detail->d_driving_lic_back));
		unlink(realpath('uploads/driver/other_docs1/'.$driver_detail->d_other_docs1));
		unlink(realpath('uploads/driver/other_docs2/'.$driver_detail->d_other_docs2));
		unlink(realpath('uploads/driver/other_docs3/'.$driver_detail->d_other_docs3));
				
		redirect(site_url('index.php/Agent_driver_management'));
	}
}
?>