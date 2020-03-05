<?php defined('BASEPATH') OR exit('No direct script access allowed');

class CreateDutySlip extends CI_Controller {
    
     function __construct()
    {
        parent::__construct();
        header('Last-Modified:'.gmdate('D, d M Y H:i:s').'GMT');
		header('Cache-Control: no-cache, must-revalidate, max-age=0');
		header('Cache-Control: post-check=0, pre-check=0',false);
		header('Pragma: no-cache');
	    $this->load->model('State_city_model');		
        $this->load->model('General_data');
		$this->load->library('session');
		date_default_timezone_set('Asia/Kolkata');
		
		
    }
    private function _flashandredirect($success,$successMsg,$failureMsg, $temp)
	{
		if($success){

		$this->session->set_flashdata('feedback',$successMsg);
		$this->session->set_flashdata('feedback_class','alert alert-dismissible alert-success');			
		}
		else
		{
			$this->session->set_flashdata('feedback',$failureMsg);
			$this->session->set_flashdata('feedback_class','alert alert-dismissible alert-danger');
		}
		return redirect('index.php/'.$temp);
	}
	public function index()
	{
		
		$user = $this->session->has_userdata('user');
		if(empty($user)){
			redirect('Login');
		}else{
            $data = $this->input->post(NULL,TRUE);
			//echo "<pre>";print_r($data);echo "</pre>";exit;
			if(empty($data)){
				$this->load->view('create_rent_card');
			}else{
				$data['detail']=$data;
				$this->load->view('create_rent_card');
			}
		}
	}
	
	public function store_dutyslip()
	{
		$post= $this->input->post(); 
		$dsdate = $post['ds_date']; 
		//$returndate= $post['ds_return_datetime'];
		// echo "<pre>";
		// print_r($post); exit;
		//$post['ds_journey_datetime']= date('Y-m-d H:i:s', strtotime($journeydate));
		$post['ds_date']= date('Y-m-d H:i:s', strtotime($dsdate));
		$post['ds_created_datetime']= date('Y-m-d H:i:s');  
		unset($post['submit']);
		$this->_flashandredirect($this->db->insert('duty_slip',$post), "Duty Slip Added successfully", "failed to add try again", 'Manage_duty_slip');
		
	} 
	public function view_duty_Slip()
	{
		$post= $this->input->post(); 

		$data['dutyslip']= $this->db->select("*")->from('duty_slip')->where('ds_id', $post['dsid'])->get()->row();
		$this->load->view('view_rent_card', $data); 
	}
	public function edit_duty_Slip()
	{
		$post= $this->input->post(); 

		$data['dutyslip']= $this->db->select("*")->from('duty_slip')->where('ds_id', $post['dsid'])->get()->row();
		$this->load->view('edit_rent_card', $data); 
	}
	public function update_dutyslip()
	{
		$post= $this->input->post(); 
		$dsdate = $post['ds_date'];
		$dsid= $post['dsid'];  
		//$returndate= $post['ds_return_datetime'];
		// echo "<pre>";
		// print_r($post); exit;
		//$post['ds_journey_datetime']= date('Y-m-d H:i:s', strtotime($journeydate));
		$post['ds_date']= date('Y-m-d H:i:s', strtotime($dsdate));
		//$post['ds_return_datetime']= date('Y-m-d H:i:s', strtotime($returndate));
		//$post['ds_created_datetime']= date('Y-m-d H:i:s');  
		unset($post['submit']);
		unset($post['dsid']);
		$this->_flashandredirect($this->db->where('ds_id', $dsid)->update('duty_slip',$post), "Duty Slip Updated successfully", "failed to Update try again", 'Manage_duty_slip');
		
	} 
	public function delete_duty_Slip()
	{
		$post= $this->input->post(); 

		$this->_flashandredirect($this->db->delete('duty_slip', ['ds_id'=>$post['delid']]), "Duty Slip Deleted successfully", "failed to delete try again", 'Manage_duty_slip');
		
	}

} ?>