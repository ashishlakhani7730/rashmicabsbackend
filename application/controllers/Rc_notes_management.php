<?php ob_start(); defined('BASEPATH') OR exit('No direct script access allowed');

class Rc_notes_management extends CI_Controller 
{	
	 function __construct()
    {
        parent::__construct();
		$this->load->model('state_city_model');		
        $this->load->model('General_data');
		$this->load->library('session');
    }	
		 
	public function index()
	{	
		$user = $this->session->has_userdata('user');
		if(empty($user)){
			redirect('index.php/Login');
		}else {
		$data['rc_notes_list'] = $this->db->get('rc_notes')->result();
					
		$this->load->view('manage_rc_notes',$data);
		}	
	}
	
	public function add_rc_notes()
	{		
		
		$this->load->view('add_rc_notes');	
	}
	
	public function insert_rc_notes()
	{
		
		
		$data1 = array( 
					   'rc_title'			=>$this->input->post('title'),		  
					   'rc_description'		=>$this->input->post('description'),
					   'rc_created_date_time'=>date('Y-m-d H:i:s')
					   );
		
		
		$merged_data =$data1;
		
		$this->db->insert('rc_notes',$merged_data);
		
		//$this->db->query("update oneway_offer_detail set oo_id=CONCAT('RCOO".date('y').date('m')."',LPAD(LAST_INSERT_ID(), 2, '0')) where id=LAST_INSERT_ID()");
		
		$msg['success'] = "Package added successfully!";
		
        $this->session->set_flashdata('success',$msg);
				
		redirect(site_url('index.php/Rc_notes_management'));
		
	}
	
	
	public function delete_rc_notes()
	{
		$oneway_offer_dlt_id = $this->input->post('rc_notes_dlt_id');
		
		$this->db->where('id',$oneway_offer_dlt_id)->delete('rc_notes');
		
		redirect(site_url('index.php/Rc_notes_management'),'refresh');
	}
	
	
}
?>