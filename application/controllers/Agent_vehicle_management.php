<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Agent_vehicle_management extends CI_Controller 
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
		
		$this->db->select('vehicle_list.*,agent_detail.a_full_name,vehicle_category_detail.category_name,vehicle_detail.v_name');
		$this->db->from('vehicle_list');
		$this->db->join('agent_detail','agent_detail.id=vehicle_list.agent_id');
		$this->db->join('vehicle_category_detail','vehicle_category_detail.id=vehicle_list.vehicle_category_id');
		$this->db->join('vehicle_detail','vehicle_detail.id=vehicle_list.vehicle_detail_id');
		$data['vehicle_list']=$this->db->get()->result();
		
		$this->load->view('manage_agent_vehicle',$data);
	}
	
	public function view_agent_vehicle()
	{	
		$this->General_data->check_login();
		
		$this->db->select('vehicle_list.*,agent_detail.a_full_name,agent_detail.a_contact_no1,agent_detail.a_email_id,vehicle_category_detail.category_name,vehicle_detail.v_name');
		$this->db->from('vehicle_list');
		$this->db->join('agent_detail','agent_detail.id=vehicle_list.agent_id');
		$this->db->join('vehicle_category_detail','vehicle_category_detail.id=vehicle_list.vehicle_category_id');
		$this->db->join('vehicle_detail','vehicle_detail.id=vehicle_list.vehicle_detail_id');
		$this->db->where('vehicle_list.id',$this->input->post('agent_vehicle_id'));
		$data['vehicle_list']=$this->db->get()->row();
		
		$this->load->view('agent_vehicle_view',$data);	
	}	
	public function get_vehicle_category() 
	{						
		 if (isset($_POST) && isset($_POST['vehicle_category_id'])) 
		{
			$category = $_POST['vehicle_category_id'];						
			
			$arrcat = $this->db->get_where('vehicle_detail',array('v_category_id'=>$category))->result();
			
			foreach ($arrcat as $vehicles)
			{
				$arrFinal[$vehicles->id] = $vehicles->v_name;
			}
			
			if(isset($_POST['vehicle_detail_id']))
				$sel=$_POST['vehicle_detail_id'];
			else
				$sel='';  
			
			print form_dropdown('city_name',$arrFinal,$sel);
		}				 
    }
	public function add_agent_vehicle()
	{
		 $this->General_data->check_login();
		 $data['agent_detail'] = $this->db->get_where('agent_detail',array('a_status'=>1))->result();
		 $data['vehicle_category'] = $this->db->get('vehicle_category_detail')->result();
		 $this->load->view('add_agent_vehicle',$data);	
	}
	
	public function insert_agent_vehicle(){
		$this->General_data->check_login();
		
		$post=$this->input->post(NULL, TRUE);
		date_default_timezone_set('Asia/Kolkata');
		
		//echo "<pre>"; print_r($post);echo "</pre>";exit;
		
		$vehicle_register_no=$this->db->get_where('vehicle_list',array('v_register_no' => $post['v_register_no']))->row();
		
		if(!empty($vehicle_register_no)){
			$msg['error'] = "Vehicle Register No. already exist";
			$this->session->set_flashdata('error',$msg);
			redirect(site_url('index.php/Agent_vehicle_management/add_agent_vehicle'));
		}else{
		
			$array= array(
					
					'agent_id' => $post['agent_id'],
					'vehicle_category_id' => $post['vehicle_category_id'],
					'vehicle_detail_id' => $post['vehicle_detail_id'],
					'v_insurance_expire_date' => date('Y-m-d',strtotime($post['v_insurance_expire_date'])),
					'v_register_no' => $post['v_register_no'],
					'v_reg_date' => date('Y-m-d'),
					'v_reg_time' => date('H:i:s'),
					'v_status'=>0,
					'v_created_by' => $this->session->userdata('user')->id,
					'v_created_datetime' => date('Y-m-d H:i:s')
								
					
			);
			
			$this->db->insert('vehicle_list',$array);
			$get_last_id=$this->db->insert_id();
			$this->General_data->update_id('vehicle_list','RCV','vehicle_id');
			
			$this->General_data->uploadImage('./uploads/vehicle/profile_pic',$get_last_id,'RCV','vehicle_list','v_profile_pic');
			$this->General_data->uploadImage('./uploads/vehicle/insurance',$get_last_id,'RCV','vehicle_list','v_insurance');
			$this->General_data->uploadImage('./uploads/vehicle/other_docs1',$get_last_id,'RCV','vehicle_list','v_other_docs1');
			$this->General_data->uploadImage('./uploads/vehicle/other_docs2',$get_last_id,'RCV','vehicle_list','v_other_docs2');
			$this->General_data->uploadImage('./uploads/vehicle/other_docs3',$get_last_id,'RCV','vehicle_list','v_other_docs3');
			
			redirect(site_url('index.php/Agent_vehicle_management'));
		}
	}
	public function edit_agent_vehicle()
	{
		 $this->General_data->check_login();
		 $data['agent_detail'] = $this->db->get_where('agent_detail',array('a_status'=>1))->result();
		 $data['vehicle_category'] = $this->db->get('vehicle_category_detail')->result();
		 $data['vehicle_list'] = $this->db->get_where('vehicle_list',array('id'=>$this->input->post('agent_vehicle_id')))->row();
		 $this->load->view('edit_agent_vehicle',$data);	
	}
	
	public function update_agent_vehicle()
	{
		$this->General_data->check_login();
		
		$post=$this->input->post(NULL, TRUE);
		date_default_timezone_set('Asia/Kolkata');
		
		//echo "<pre>"; print_r($post);echo "</pre>";exit;
		
		$vehicle_register_no=$this->db->get_where('vehicle_list',array('id!='=>$post['agent_vehicle_id'],'v_register_no' => $post['v_register_no']))->row();
		
		if(!empty($vehicle_register_no)){
			$msg['error'] = "Vehicle Register No. already exist";
			$this->session->set_flashdata('error',$msg);
			$data['agent_detail'] = $this->db->get_where('agent_detail',array('a_status'=>1))->result();
		 	$data['vehicle_category'] = $this->db->get('vehicle_category_detail')->result();
		 	$data['vehicle_list'] = $this->db->get_where('vehicle_list',array('id'=>$this->input->post('agent_vehicle_id')))->row();
		 	$this->load->view('edit_agent_vehicle',$data);	
		}else{
		
		
			$array= array(
					
					'agent_id' => $post['agent_id'],
					'vehicle_category_id' => $post['vehicle_category_id'],
					'vehicle_detail_id' => $post['vehicle_detail_id'],
					'v_insurance_expire_date' => date('Y-m-d',strtotime($post['v_insurance_expire_date'])),
					'v_register_no' => $post['v_register_no'],
					'v_updated_by' => $this->session->userdata('user')->id,
					'v_updated_datetime' => date('Y-m-d H:i:s')
								
					
			);
			
			$this->db->where('id',$post['agent_vehicle_id']);
			$this->db->update('vehicle_list',$array);
					
			$this->General_data->uploadImage('./uploads/vehicle/profile_pic',$post['agent_vehicle_id'],'RCV','vehicle_list','v_profile_pic');
			$this->General_data->uploadImage('./uploads/vehicle/insurance',$post['agent_vehicle_id'],'RCV','vehicle_list','v_insurance');
			$this->General_data->uploadImage('./uploads/vehicle/other_docs1',$post['agent_vehicle_id'],'RCV','vehicle_list','v_other_docs1');
			$this->General_data->uploadImage('./uploads/vehicle/other_docs2',$post['agent_vehicle_id'],'RCV','vehicle_list','v_other_docs2');
			$this->General_data->uploadImage('./uploads/vehicle/other_docs3',$post['agent_vehicle_id'],'RCV','vehicle_list','v_other_docs3');
			
			
			$this->db->select('vehicle_list.*,agent_detail.a_full_name,agent_detail.a_contact_no1,agent_detail.a_email_id,vehicle_category_detail.category_name,vehicle_detail.v_name');
			$this->db->from('vehicle_list');
			$this->db->join('agent_detail','agent_detail.id=vehicle_list.agent_id');
			$this->db->join('vehicle_category_detail','vehicle_category_detail.id=vehicle_list.vehicle_category_id');
			$this->db->join('vehicle_detail','vehicle_detail.id=vehicle_list.vehicle_detail_id');
			$this->db->where('vehicle_list.id',$this->input->post('agent_vehicle_id'));
			$data['vehicle_list']=$this->db->get()->row();
			
			$this->load->view('agent_vehicle_view',$data);
		}
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
	public function agent_vehicle_delete()
	{
		$this->General_data->check_login();
		
		$post=$this->input->post(NULL, TRUE);
		date_default_timezone_set('Asia/Kolkata');
		
		$vehicle_list=$this->db->get_where('vehicle_list',array('id'=>$post['agent_vehicle_id']))->row();
		
		$this->db->where('id',$post['agent_vehicle_id']);
		$this->db->delete('vehicle_list');
		
		unlink(realpath('uploads/vehicle/profile_pic/'.$vehicle_list->v_profile_pic));
		unlink(realpath('uploads/vehicle/insurance/'.$vehicle_list->v_insurance));
		unlink(realpath('uploads/vehicle/other_docs1/'.$vehicle_list->v_other_docs1));
		unlink(realpath('uploads/vehicle/other_docs2/'.$vehicle_list->v_other_docs2));
		unlink(realpath('uploads/vehicle/other_docs3/'.$vehicle_list->v_other_docs3));
				
		redirect(site_url('index.php/Agent_vehicle_management'));
	}
}
?>