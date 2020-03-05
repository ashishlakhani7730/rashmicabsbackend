<?php ob_start(); defined('BASEPATH') OR exit('No direct script access allowed');

class Tax_management extends CI_Controller 
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
		$data['tax_list']=$this->db->get('tax_detail')->result();
		
		$this->load->view('manage_tax',$data);	
		}
	}
	
	public function add_tax()
	{
		$this->load->view('add_tax');
	}
	
	public function insert_tax()
	{
		$data = array( 't_name'   => $this->input->post('tax_n'),
					   't_value'  => $this->input->post('tax_v'),
					   't_status' => 1
					  );					  
		
		$this->db->insert('tax_detail',$data);
				
		$this->db->query("update tax_detail set tax_id=CONCAT('RCTX".date('y').date('m')."',LPAD(LAST_INSERT_ID(), 2, '0')) where id=LAST_INSERT_ID()");
		
		redirect(site_url('index.php/Tax_management'));
	}
	
	public function tax_status()
	{
	
		$tax_status_id = $this->input->post('tax_status_id');
		
		$this->General_data->change_status('tax_detail','t_status',$tax_status_id);
		
		redirect(site_url('index.php/Tax_management'), 'refresh');	
	
	}
	
	public function tax_delete()
	{
	
		$tax_delete_id = $this->input->post('tax_delete_id');
		
		$this->db->delete('tax_detail',array('id'=>$tax_delete_id));
		
		redirect(site_url('index.php/Tax_management'), 'refresh');	
	
	}
	
	public function get_data_edit_tax()	
	{
		$tax_edit_id = $this->input->post('tax_edit_id');
		
		$data['edit_tax'] = $this->db->get_where('tax_detail',array('id'=>$tax_edit_id))->row();		
		
		$this->load->view('edit_tax',$data);
	}
	
	public function update_tax()
	{
		$tax_update_id = $this->input->post('tax_update_id');
		
		$data = array( 't_name'   => $this->input->post('tax_n'),
					   't_value'  => $this->input->post('tax_v'),
					   't_status' => 1
					  );					  
				
		$this->db->where('id',$tax_update_id)
				 ->update('tax_detail',$data);
		
		
		redirect(site_url('index.php/Tax_management'));
		
		
	
	}
}
?>