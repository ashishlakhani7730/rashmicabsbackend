<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Account_details extends CI_Controller
{
     public function __construct()
	    {
	        parent::__construct();
	       $this->load->model('State_city_model');
	       
	    }    
	 
	public function index()
	{
		$user = $this->session->has_userdata('user');
		if(empty($user)){
			redirect('index.php/Login');
		}else {
		$this->load->helper('url');	
		
	
		
		$user_id = $this->session->userdata('user')->id;
		
		echo $user_id; 
		
		$data['edit_user'] = $this->db->get_where('user_detail',array('id'=>$user_id))->row();
		
		$data['state'] = $this->State_city_model->get_unique_states();
		
		
	
		$this->load->view('account_details',$data);
		
		}
	
	}
}
?>