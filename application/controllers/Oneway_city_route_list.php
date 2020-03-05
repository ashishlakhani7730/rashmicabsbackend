<?php ob_start(); defined('BASEPATH') OR exit('No direct script access allowed');

class Oneway_city_route_list extends CI_Controller 
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
		$data['city_route_list'] = $this->db->get('city_route_list')->result();
				
		$this->load->view('manage_city_route',$data);	
		}
		
	}
	
	public function add_city_route()
	{
		$data['city_list'] = $this->db->get('city_detail')->result();
		
		$this->load->view('add_city_route',$data);	
	}
	
	public function fetch_destination_city()
	{
		$data = $this->db->get_where('city_detail',array('id!='=>$this->input->post('source_city_id')))->result();
		
		$string= " <option></option>";
		
		foreach($data as $d)
		{
			if(isset($_POST['dest_city_id']) && $this->input->post('dest_city_id')==$d->id)
				$sel='selected';
			else
				$sel='';
			
			$string.="<option value='$d->id' ".$sel.">$d->c_name</option>";
		}
		echo $string;
		

	}
	public function insert_city_route()
	{
	
		$city_detail_data =  $this->input->post(NULL, TRUE);
		
		$city_route_list=$this->db->get_where('city_route_list',array('cr_from_city'=>$city_detail_data['source_city'],'cr_to_city'=>$city_detail_data['destination_city']))->row();
		
		if(!empty($city_route_list)){
		
			
			$msg['error'] = "This City route already exist";
			$this->session->set_flashdata('error',$msg);
			redirect(site_url('index.php/Oneway_city_route_list/add_city_route'));
			
		}else{
		
			$city_detail_array = array('cr_from_city'=>$city_detail_data['source_city'],'cr_to_city'=>$city_detail_data['destination_city']);
			
			if(isset($city_detail_data['discount_name'])){
				$city_detail_array['cr_discount']=$city_detail_data['discount'];
				$city_detail_array['cr_discount_type']=$city_detail_data['discount_name'];
			}else{
				$city_detail_array['cr_discount']=$city_detail_data['discount'];
				$city_detail_array['cr_discount_type']=0;
			}
			
			$this->db->insert('city_route_list',$city_detail_array);
			$this->load->model('General_data');
			$this->General_data->update_id('city_route_list','RCCTR','cr_id');
			
			redirect(base_url().'index.php/Oneway_city_route_list');
		}
	}
	
	
	public function delete_city_route()
	{
		$cr_delete_id = $this->input->post('cr_delete_id');
		
		$this->db->where('id',$cr_delete_id)
				 ->delete('city_route_list');
				 
		redirect(base_url().'index.php/Oneway_city_route_list');	
	}
	
	public function update_city_route()
	{
		$data['city_list'] = $this->db->get('city_detail')->result();
		$data['city_route_list'] =$this->db->get_where('city_route_list',array('id'=>$this->input->post('cr_id')))->row();
		$this->load->view('edit_city_route',$data);	
	}
	
	public function edit_city_route()
	{
	
		$city_detail_data =  $this->input->post(NULL, TRUE);
		
		$city_route_list=$this->db->get_where('city_route_list',array('id!='=>$city_detail_data['cr_id'],'cr_from_city'=>$city_detail_data['source_city'],'cr_to_city'=>$city_detail_data['destination_city']))->row();
		
		if(!empty($city_route_list)){
		
			
			$msg['error'] = "This City route already exist";
			$this->session->set_flashdata('error',$msg);
			
			$data['city_list'] = $this->db->get('city_detail')->result();
			$data['city_route_list'] =$this->db->get_where('city_route_list',array('id'=>$city_detail_data['cr_id']))->row();
			$this->load->view('edit_city_route',$data);
			
		}else{
		
			$city_detail_array = array('cr_from_city'=>$city_detail_data['source_city'],'cr_to_city'=>$city_detail_data['destination_city']);
			
			if(isset($city_detail_data['discount_name'])){
				$city_detail_array['cr_discount']=$city_detail_data['discount'];
				$city_detail_array['cr_discount_type']=$city_detail_data['discount_name'];
			}else{
				$city_detail_array['cr_discount']=$city_detail_data['discount'];
				$city_detail_array['cr_discount_type']=0;
			}
			
			$this->db->where('id',$city_detail_data['cr_id']);
			$this->db->update('city_route_list',$city_detail_array);
			
			
			redirect(base_url().'index.php/Oneway_city_route_list');
		}
	}
}
?>