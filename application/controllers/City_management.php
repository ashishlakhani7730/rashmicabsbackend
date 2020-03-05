<?php ob_start(); defined('BASEPATH') OR exit('No direct script access allowed');

class City_management extends CI_Controller 
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
		$data['city_list'] = $this->db->get('city_detail')->result();
		
		$this->load->view('manage_city',$data);
		}	
	}
	
	public function add_city_data()
	{
		$data['state'] = $this->state_city_model->get_unique_states();	
		
		$this->load->view('add_city',$data);	
	}
	
	public function insert_city()
	{
		$data = array(
						'c_name'      =>$this->input->post('city_name'),
						'c_state'     =>$this->input->post('state_name'),
						'c_lattitude' =>$this->input->post('lattitude'),
						'c_longitude' =>$this->input->post('longitude'),
						'c_status'    =>1
						
						);
						
		$this->db->insert('city_detail',$data);
		
		$this->db->query("update city_detail set city_id=CONCAT('RCCT".date('y').date('m')."',LPAD(LAST_INSERT_ID(), 2, '0')) where id=LAST_INSERT_ID()");
		
		redirect(site_url('index.php/City_management'));
	
	
	}
	
	public function city_status()
	{
	
		$city_detail_data =  $this->input->post('city_status_id');
		
		$this->General_data->change_status('city_detail','c_status',$city_detail_data);
		
		redirect(site_url('index.php/City_management'),'refresh');
		
	}
	
	public function city_delete()
	{
	
		$city_delete_id = $this->input->post('city_dlt_btn');
	
		$this->db->delete('city_detail',array('id'=>$city_delete_id));
			
	    redirect(site_url('index.php/City_management'));	
			
	}
	
	public function get_data_edit_city()
	{
	
		$city_edit_id = $this->input->post('city_edit_id');
		
		$data['edit_city_data'] = $this->db->get_where('city_detail',array('id'=>$city_edit_id))->row();
		
		$data['state'] = $this->state_city_model->get_unique_states();	
		
		$this->load->view('edit_city',$data);
	
	}
	
	public function update_city()
	{
		$city_update_id = $this->input->post('city_update_id'); 
		
		$data = array(
						'c_name'      =>$this->input->post('city_name'),
						'c_state'     =>$this->input->post('state_name'),
						'c_lattitude' =>$this->input->post('lattitude'),
						'c_longitude' =>$this->input->post('longitude')
						);
						
		$this->db->where('id',$city_update_id)
				 ->update('city_detail',$data);
		
		redirect(site_url('index.php/City_management'));
	
	}
	
	public function add_city_route()
	{
	
	}
	
	
}
?>