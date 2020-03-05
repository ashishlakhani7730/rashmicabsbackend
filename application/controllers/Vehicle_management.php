<?php ob_start(); defined('BASEPATH') OR exit('No direct script access allowed');

class Vehicle_management extends CI_Controller 
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
		$data['vehicle_list']=$this->db->get('vehicle_detail')->result();
		
		$this->load->view('manage_vehicle',$data);
		}	
	}
	
	public function add_vehicle()
	{
		$data['category'] = $this->db->get('vehicle_category_detail')->result();
		
		$this->load->view('add_vehicle',$data);
	}
	
	public function insert_vehicle()
	{
		$data = array( 'v_name'         => $this->input->post('v_name'),
					   'v_category_id'  => $this->input->post('cat_id'),
					   'v_seat_number'  => $this->input->post('v_seat_num'),
					   'v_status'       => 1
					  );					  
		
		$this->db->insert('vehicle_detail',$data);
				
		$this->db->query("update vehicle_detail set vehicle_id=CONCAT('RCVH".date('y').date('m')."',LPAD(LAST_INSERT_ID(), 2, '0')) where id=LAST_INSERT_ID()");
		
		redirect(site_url('index.php/Vehicle_management'));
	}
	
	public function vehicle_status()
	{
	
		$vehicle_status_id = $this->input->post('vehicle_status_id');
		
		$this->General_data->change_status('vehicle_detail','v_status',$vehicle_status_id);
		
		redirect(site_url('index.php/Vehicle_management'), 'refresh');	
	
	}
	
	public function vehicle_delete()
	{
	
		$vehicle_delete_id = $this->input->post('vehicle_delete_id');
		
		$this->db->delete('vehicle_detail',array('id'=>$vehicle_delete_id));
		
		redirect(site_url('index.php/Vehicle_management'), 'refresh');	
	
	}
	
	public function get_data_edit_vehicle()	
	{
		$vehicle_edit_id = $this->input->post('vehicle_edit_id');
		
		$data['category'] = $this->db->get('vehicle_category_detail')->result();
		
		$data['edit_vehicle'] = $this->db->get_where('vehicle_detail',array('id'=>$vehicle_edit_id))->row();		
		
		$this->load->view('edit_vehicle',$data);
	}
	
	public function update_vehicle()
	{
		$vehicle_update_id = $this->input->post('vehicle_update_id');
		
		$data = array( 'v_name'         => $this->input->post('v_name'),
					   'v_category_id'  => $this->input->post('cat_id'),
					   'v_seat_number'  => $this->input->post('v_seat_num')					   
					  );							  
				
		$this->db->where('id',$vehicle_update_id)
				 ->update('vehicle_detail',$data);
		
		
		redirect(site_url('index.php/Vehicle_management'));
		
		
	
	}
}
?>