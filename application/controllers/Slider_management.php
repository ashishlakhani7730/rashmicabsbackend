<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Slider_management extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
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
		$data['slider']=$this->db->get('slider')->result();
		
		$this->load->view('manage_slider',$data);
		
	}
	public function AddSlider()
	{
		$this->General_data->check_login();
		
		$this->load->view('add_slider');
		
	}
	public function insert_slider()
	{
		$this->General_data->check_login();
		date_default_timezone_set('Asia/Kolkata');
		
		$post=$this->input->post(NULL,TRUE);
		//echo "<pre>";print_r($post);echo "</pre>";exit;
		
		$array=array(
			's_created_by'=>$this->session->userdata('user')->id,
			's_created_datetime'=>date('Y-m-d H:i:s')
		);
		
		$this->db->insert('slider',$array);
		$get_last_id = $this->db->insert_id();
		$this->General_data->update_id('slider','RCS','s_id');
		
		$this->General_data->uploadImage('./uploads/slider/cover_image/',$get_last_id,'RCS','slider','s_cover_image');
		
		
		$msg['success'] = "Successfully Added";
		$this->session->set_flashdata('success',$msg);
		redirect(site_url('index.php/Slider_management'));
	}
	public function EditSlider(){
		$this->General_data->check_login();
		$data['slider']=$this->db->get_where('slider',array('id'=>$_POST['id']))->row();
		
		$this->load->view('edit_slider',$data);
		
	}
	
	public function update_slider()
	{
		$this->General_data->check_login();
		date_default_timezone_set('Asia/Kolkata');
		
		$post=$this->input->post(NULL,TRUE);
		
		$array=array(
			's_updated_by'=>$this->session->userdata('user')->id,
			's_updated_datetime'=>date('Y-m-d H:i:s')
		);
		
		
		$this->db->where('id',$post['id']);
		$this->db->update('slider',$array);
		
		$this->General_data->uploadImage('./uploads/slider/cover_image/',$post['id'],'RCS','slider','s_cover_image');
		
		$msg['success'] = "Successfully Updated ";
		$this->session->set_flashdata('success',$msg);
		redirect(site_url('index.php/Slider_management'));
	}
	public function StatusSlider(){
		$this->General_data->check_login();
		date_default_timezone_set('Asia/Kolkata');
		
		$slider_status=$this->db->get_where('slider',array('id'=>$_POST['id']))->row()->s_status;
		
		if($slider_status==1)
			$array=array('s_status'=>0);
		else
			$array=array('s_status'=>1);
			
		$this->db->where('id',$_POST['id']);
		$this->db->update('slider',$array);
		
		$msg['success'] = "Successfully Changed Status ";
		$this->session->set_flashdata('success',$msg);
		redirect(site_url('index.php/Slider_management'));
	}
	public function DeleteSlider(){
		$this->General_data->check_login();
		date_default_timezone_set('Asia/Kolkata');
		
		$slider=$this->db->get_where('slider',array('id'=>$_POST['id']))->row();
		
		$this->db->where('id',$_POST['id']);
		$this->db->delete('slider');
		
		unlink(realpath('uploads/slider/cover_image/'.$slider->s_cover_image));
		
		
		$msg['success'] = "Successfully Deleted ";
		$this->session->set_flashdata('success',$msg);
		redirect(site_url('index.php/Slider_management'));
	}
}
