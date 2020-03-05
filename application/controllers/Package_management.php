<?php ob_start(); defined('BASEPATH') OR exit('No direct script access allowed');

class Package_management extends CI_Controller 
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
		$data['package_list'] = $this->db->get('package_detail')->result();
					
		$this->load->view('manage_package',$data);
		}	
	}
	
	public function add_package()
	{		
		$data['package_type'] = $this->db->select('*')->group_by('package_type_id')->get('package_type')->result();	
		
		$data['vehicle_category'] = $this->db->get('vehicle_category_detail')->result();
		
		$data['city_list'] = $this->db->get('city_detail')->result();
		
		//$data['tax_list'] = $this->db->get('tax_detail')->result();
		
		$this->load->view('add_package',$data);	
	}
	
	public function insert_package()
	{
		if($this->input->post('tax_on_package') != "")
		{
			$tax_array = implode(',',$this->input->post('tax_on_package'));
		}
		else
		{
			$tax_array="";
		}
		
		$discount_status = $this->input->post('discount_name');
		
		$advance_status = $this->input->post('package_name');
		
		if($this->input->post('sub_p_type') == 2)
		{
			$to_city = $this->input->post('to_city_name');
			$night_charge = 0;
			$driver_allowance = 0;
		}
		else
		{
			$to_city = 0;
			$night_charge = $this->input->post('night_charge');
			$driver_allowance = $this->input->post('driver_allowance');
		}
		
		$data1 = array( 
					   'p_type'    			=> $this->input->post('p_type'),
					   'p_sub_type'			=>$this->input->post('sub_p_type'),
					   'p_v_category'		=>$this->input->post('v_c_type'),
					   'p_from_city'		=>$this->input->post('city_name'),
					   'p_to_city'		=>$to_city,
					   'p_rate'				=>$this->input->post('rate'),
					   'p_min_km'			=>$this->input->post('min_km'),
					   'p_min_hr'			=>$this->input->post('min_hr'),
					   'p_extra_km_rate'	=>$this->input->post('extra_km_rate'),
					   'p_extra_hr_rate'	=>$this->input->post('extra_hr_rate'),
					   'p_night_charge'	    =>$night_charge,
					   'p_driver_allowance' =>$driver_allowance,					  		  
					   'p_ac_status' 		=>$this->input->post('ac_status'),					  
					   'p_tax_on_package'   =>$tax_array,
					   'p_status'			=>1
					  
					   
					   );
		
		if($discount_status==1)
		{
		
			$data2 = array ( 'p_discount'         =>$this->input->post('discount'),
							 'p_discount_type'    =>1
							);
								 
		}
		else
		{
		
			$data2 = array ( 'p_discount'         =>$this->input->post('discount'),
							 'p_discount_type'	   =>0
						    );
								 
		}
		if($advance_status==1)
		{
		
			$data3 = array ( 'p_advance'		  =>$this->input->post('advance'),
							 'p_advance_type'     =>1)	;
								 
		}
		else
		{
		
			$data3 = array ( 'p_advance'		  =>$this->input->post('advance'),
						     'p_advance_type'     =>0)	;
								 
		}
		
		$merged_data = array_merge($data1,$data2,$data3);
		
		$this->db->insert('package_detail',$merged_data);
		
		$this->db->query("update package_detail set package_id=CONCAT('RCPK".date('y').date('m')."',LPAD(LAST_INSERT_ID(), 2, '0')) where id=LAST_INSERT_ID()");
		
		$msg['success'] = "Package added successfully!";
		
        $this->session->set_flashdata('success',$msg);
				
		redirect(site_url('index.php/Package_management'));
		
	}
	
	public function package_status()
	{
	
		$package_status_id = $this->input->post('package_status_id');
		
		$this->General_data->change_status('package_detail','p_status',$package_status_id);
		
		redirect(site_url('index.php/Package_management'));	
	
	}
	
	public function get_data_edit_package()	
	{
		$package_edit_id = $this->input->post('package_edit_id');
		
		$data['package_type'] = $this->db->select('*')->group_by('package_type_id')->get('package_type')->result();	
		
		$data['vehicle_category'] = $this->db->get('vehicle_category_detail')->result();
		
		$data['city_list'] = $this->db->get('city_detail')->result();
		
		$data['tax_list'] = $this->db->get('tax_detail')->result();	
		
		$data['edit_package'] = $this->db->get_where('package_detail',array('id'=>$package_edit_id))->row();		
		
		$this->load->view('edit_package',$data);
	}
	
	public function update_package()
	{
		$update_package_id = $this->input->post('update_package_id');
		
		if($this->input->post('tax_on_package') != "")
		{
			$tax_array = implode(',',$this->input->post('tax_on_package'));
		}
		else
		{
			$tax_array="";
		}
		
		$discount_status = $this->input->post('discount_name');
		
		$advance_status = $this->input->post('package_name');
		
		if($this->input->post('sub_p_type') == 2)
		{
			$to_city = $this->input->post('to_city_name');
			$night_charge = 0;
			$driver_allowance = 0;
		}
		else
		{
			$to_city = 0;
			$night_charge = $this->input->post('night_charge');
			$driver_allowance = $this->input->post('driver_allowance');
		}

		
		$data1 = array( 
					   'p_type'    			=> $this->input->post('p_type'),
					   'p_sub_type'			=>$this->input->post('sub_p_type'),
					   'p_v_category'		=>$this->input->post('v_c_type'),
					   'p_from_city'		=>$this->input->post('city_name'),
					   'p_to_city'		    =>$to_city,
					   'p_rate'				=>$this->input->post('rate'),
					   'p_min_km'			=>$this->input->post('min_km'),
					   'p_min_hr'			=>$this->input->post('min_hr'),
					   'p_extra_km_rate'	=>$this->input->post('extra_km_rate'),
					   'p_extra_hr_rate'	=>$this->input->post('extra_hr_rate'),
					   'p_night_charge'	    =>$night_charge,
					   'p_driver_allowance' =>$driver_allowance, 
					   'p_ac_status' 		=>$this->input->post('ac_status'),			  
					   'p_tax_on_package'   =>$tax_array,
					   'p_status'			=>1				   
					   );		
		
		if($discount_status==1)
		{		
			$data2 = array ( 'p_discount'         =>$this->input->post('discount'),
							 'p_discount_type'    =>1
							);								 
		}
		else
		{		
			$data2 = array ( 'p_discount'         =>$this->input->post('discount'),
							 'p_discount_type'	   =>0
						    );								 
		}
		
		if($advance_status==1)
		{		
			$data3 = array ( 'p_advance'		  =>$this->input->post('advance'),
							 'p_advance_type'     =>1);								 
		}
		else
		{		
			$data3 = array ( 'p_advance'		  =>$this->input->post('advance'),
						     'p_advance_type'     =>0);								 
		}
		
		$merged_data = array_merge($data1,$data2,$data3);
		
		$this->db->where('id',$update_package_id)->update('package_detail',$merged_data);		
		
		redirect(site_url('index.php/Package_management'));
		
	}
	
	public function delete_package()
	{
		$package_dlt_id = $this->input->post('package_dlt_id');
		
		$this->db->where('id',$package_dlt_id)->delete('package_detail');
		
		redirect(site_url('index.php/Package_management'),'refresh');
	}
	
	public function copy_package()
	{
		$package_copy_id = $this->input->post('package_copy_id');
		
		$data['package_detail'] = $this->db->get_where('package_detail',array('id'=>$package_copy_id))->row();
		
		$data['city_registered_list'] =	$this->db->get_where('package_detail',array('p_sub_type'=>$data['package_detail']->p_sub_type,'p_v_category'=>$data['package_detail']->p_v_category))->result();						
		
		$data['city_list'] = $this->db->get('city_detail')->result();
		
		$data['tax_list'] = $this->db->get('tax_detail')->result();	
		
		$data['edit_package'] = $this->db->get_where('package_detail',array('id'=>$package_copy_id))->row();
		
		$this->load->view('copy_package',$data);		
	}		 
 
}
?>