<?php ob_start(); defined('BASEPATH') OR exit('No direct script access allowed');

class User_management extends CI_Controller 
{
	function __construct()
    {
        parent::__construct();
		$this->load->model('State_city_model');		
        $this->load->model('General_data');
    }
	
		 
	public function index()
	{
		$user = $this->session->has_userdata('user');
if(empty($user)){
			redirect('index.php/Login');
		}else {
		$data['user_list']=$this->db->get('user_detail')->result();
		
		$this->load->view('manage_user',$data);	
	    }
	}
	
	public function add_user()
	{
		 $data['state'] = $this->State_city_model->get_unique_states();	
		 	
		 $this->load->view('add_user',$data);	
	}	
	public function insert_user()
	{
				date_default_timezone_set('Asia/Kolkata');
				
				
				$config['upload_path']   =   "./uploads/User_image";
				 
				$config['allowed_types'] =   "gif|jpg|jpeg|png"; 					
			
				$this->upload->initialize($config);		
					
					 if ( $this->upload->do_upload('user_image'))
					{						
							 $data = array('upload_data' => $this->upload->data());
							 $uploaded_image = $this->upload->data();																		
							 $user_image = $uploaded_image['file_name'];
																	
					}			
					else
					{
							$this->load->view('add_agent');								
					}
							
					$data = array (
										'u_full_name'	  =>$this->input->post('f_name')." ".$this->input->post('l_name'),
										'u_f_name'        =>$this->input->post('f_name'),
										'u_l_name'        =>$this->input->post('l_name'),
										'u_role'          =>$this->input->post('user_role'),
										'u_contact_no1'   =>$this->input->post('contact_no1'),
										'u_contact_no2'   =>$this->input->post('contact_no2'),
										'u_email_id'      =>$this->input->post('email'),
										'u_state'         =>$this->input->post('state_name'),
										'u_city'          =>$this->input->post('city_name'),
										'u_password'      =>md5($this->input->post('password')),
										'u_image'         =>$user_image,
										'u_status'        =>1,
										'u_created_date_time'=>date('Y-m-d H:i:s'),
										'u_created_by'=>$this->session->userdata('user')->id
									);
									
				//echo "<pre>";print_r($data); echo"</pre>"; exit;
								
				$this->db->insert('user_detail',$data);
		
				$this->db->query("update user_detail set user_id=CONCAT('RCUR".date('y').date('m')."',LPAD(LAST_INSERT_ID(), 2, '0')) where id=LAST_INSERT_ID()");
					
				return redirect(site_url('index.php/User_management'));
	}
	
	public function user_status()
	{
	
		$user_detail_data =  $this->input->post('user_status_id');
		
		//print_r($city_detail_data);exit;
		
		$this->General_data->change_status('user_detail','u_status',$user_detail_data);
		
		redirect(site_url('index.php/User_management'),'refresh');
		
	}
	
	public function user_delete()
	{
	
		$agent_delete_id = $this->input->post('user_dlt_btn');
	
		$this->db->delete('user_detail',array('id'=>$agent_delete_id));
			
		return redirect(site_url('index.php/User_management'));	
			
	}
	
	public function get_data_edit_user()
	{
		$user_id = $this->input->post('user_edit_id');
		
		$data['edit_user'] = $this->db->get_where('user_detail',array('id'=>$user_id))->row();
		
		$data['state'] = $this->State_city_model->get_unique_states();
		
		$this->load->view('edit_user',$data);
	}
	
	public function update_user()
	{
		date_default_timezone_set('Asia/Kolkata');
	
		$user_id = $this->input->post('user_update_id');
		
		$config['upload_path']   =   "./uploads/User_image";
				 
		$config['allowed_types'] =   "gif|jpg|jpeg|png"; 					
	
		$this->upload->initialize($config);	
		
		$user_image_detail = $this->db->get_where('user_detail',array('id'=>$user_id))->row();
		
		$user_image = $user_image_detail->u_image;		
			
			 if ( $this->upload->do_upload('user_image'))
			{						
					 $data = array('upload_data' => $this->upload->data());
					 $uploaded_image = $this->upload->data();																		
					 $user_image = $uploaded_image['file_name'];
															
			}			
			else
			{
					$this->load->view('add_agent');								
			}
			
			$data = array (
								'u_full_name'	  =>$this->input->post('f_name')." ".$this->input->post('l_name'),
								'u_f_name'        =>$this->input->post('f_name'),
								'u_l_name'        =>$this->input->post('l_name'),
								'u_role'          =>$this->input->post('user_role'),
								'u_contact_no1'   =>$this->input->post('contact_no1'),
								'u_contact_no2'   =>$this->input->post('contact_no2'),
								'u_email_id'      =>$this->input->post('email'),
								'u_state'         =>$this->input->post('state_name'),
								'u_city'          =>$this->input->post('city_name'),									
								'u_image'         =>$user_image,
								'u_updated_date_time'=>date('Y-m-d H:i:s'),
								'u_updated_by'=>$this->session->userdata('user')->id
							);
							
				$this->db->where('id',$user_id)
						->update('user_detail',$data);
							
				if($this->input->post('pasword')!="")
				{		
					$pw = array ('u_password' => md5($this->input->post('password')),);	
							
					$this->db->where('id',$user_id)
							 ->update('user_detail',$pw);
				}
				
		return redirect(site_url('index.php/User_management'));	
	}
} 
?>