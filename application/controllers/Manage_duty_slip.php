<?php 

class Manage_duty_slip extends CI_Controller
{
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
    public function index()
	{
		
		$user = $this->session->has_userdata('user');
		if(empty($user)){
			redirect('Login');
		}else{
           
           		$data['duty_slip']= $this->db->select("*")->order_by('ds_id', 'DESC')->from("duty_slip")->get()->result(); 
           		// echo "<pre>";
           		// print_r($data); exit; 
				$this->load->view('manage_dutyslip', $data);
			}
		
	}
}