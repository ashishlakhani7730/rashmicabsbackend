<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function index()
	{

		$user = $this->session->has_userdata('user');
		if(empty($user)){
			$this->load->view('login');
		}else {
			redirect(base_url().'index.php/Dashboard');
		}
	}
	public function login_admin()
	{
		$email=$this->input->post('email');
		$pass=$this->input->post('password');
		
		
		
	//	$user_data = $this->db->get_where('admin_login',array('user_name' => $email, 'password' => md5($pass)))->row();
	
    	$user_data = $this->db->get_where('user_detail',array('u_email_id' => $email, 'u_password' => md5($pass)))->row();


		if(empty($user_data)){
			$msg['danger'] = 'Sorry your username and password is not match !';
			$this->session->set_flashdata('danger',$msg);
				
			redirect('index.php/Login');
		}else{

			$this->session->set_userdata('user',$user_data);
			$use=  $this->session->userdata('user');
			redirect(base_url().'index.php/Dashboard');
		}

	}
	public function logout()
	{
		$this->session->unset_userdata('user');
		$this->session->sess_destroy();
		redirect('index.php/Login');
	}
}
?>
