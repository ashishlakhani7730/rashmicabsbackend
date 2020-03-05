<?php defined('BASEPATH') OR exit('No direct script access allowed');

class CreateInvoice extends CI_Controller {
    
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
            $data = $this->input->post(NULL,TRUE);
			//echo "<pre>";print_r($data);echo "</pre>";exit;
			if(empty($data)){
				$this->load->view('create_invoice');
			}else{
				$data['detail']=$data;
				$this->load->view('view_invoice',$data);
			}
		}
	}
	
} ?>