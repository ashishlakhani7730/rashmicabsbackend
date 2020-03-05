<?php ob_start(); defined('BASEPATH') OR exit('No direct script access allowed');

class Vehicle_category_management extends CI_Controller 
{
	
	 function __construct()
    {
        parent::__construct();
		$this->load->model('state_city_model');		
        $this->load->model('General_data');
    }
	
		 
	public function index()
	{
		$user = $this->session->has_userdata('user');
		if(empty($user)){
			redirect('index.php/Login');
		}else {
		$data['category_list']=$this->db->get('vehicle_category_detail')->result();
		
		$this->load->view('manage_category',$data);	
		}
	}
	
	public function add_category()
	{		
		$this->load->view('add_category');	
	}
	
	public function insert_category()
	{
		$data = array('category_name' =>$this->input->post('cat_n'),'category_oneway_offer_km_rate'=>$this->input->post('cat_oo_km_rate'),'category_oneway_offer_hr_rate'=>$this->input->post('cat_oo_hr_rate'),'description'=>$this->input->post('description'));
						
		$this->db->insert('vehicle_category_detail',$data);
		
		$get_last_id=$this->db->insert_id();
		$this->General_data->uploadImage('./uploads/category/profile_pic',$get_last_id,'RCCG','vehicle_category_detail','c_profile_pic');
		
		$this->db->query("update vehicle_category_detail set category_id=CONCAT('RCCG".date('y').date('m')."',LPAD(LAST_INSERT_ID(), 2, '0')) where id=LAST_INSERT_ID()");
		
		
		
		redirect(site_url('index.php/Vehicle_category_management'));
	}
	
	public function category_delete()
	{
	
		$category_delete_id = $this->input->post('category_delete_id');
		
		$this->db->delete('vehicle_category_detail',array('id'=>$category_delete_id));
		
		redirect(site_url('index.php/Vehicle_category_management'), 'refresh');	
	
	}
	
	public function get_data_edit_category()	
	{
		$category_edit_id = $this->input->post('category_edit_id');
		
		$data['edit_category'] = $this->db->get_where('vehicle_category_detail',array('id'=>$category_edit_id))->row();		
		
		$this->load->view('edit_category',$data);
	}
	
	public function update_category()	
	{
		$category_update_id = $this->input->post('category_update_id');
		
		$data = array('category_name' =>$this->input->post('cat_n'),'category_oneway_offer_km_rate'=>$this->input->post('cat_oo_km_rate'),'category_oneway_offer_hr_rate'=>$this->input->post('cat_oo_hr_rate'),'description'=>$this->input->post('description'));
						
		$this->db->where('id',$category_update_id)->update('vehicle_category_detail',$data);
		
		$this->General_data->uploadImage('./uploads/category/profile_pic',$category_update_id,'RCCG','vehicle_category_detail','c_profile_pic');
		
		redirect(site_url('index.php/Vehicle_category_management'));
	}
}?>
	