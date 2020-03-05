<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Passenger_management extends CI_Controller 
{
	
	function __construct()
    {
        parent::__construct();
        $this->load->model('General_data');
	    $this->load->model('Sms_email');
	}
	
	 
	public function PassengerRegister()
	{
		
		date_default_timezone_set('Asia/Kolkata');
		
		if(isset($_POST['first_name']) && isset($_POST['last_name']) && isset($_POST['email_id']) && isset($_POST['contact_no']) && isset($_POST['password'])){
		
			$passenger_contact=$this->db->get_where('passenger_list',array('p_contact'=>$_POST['contact_no']))->row();
			$passenger_email=$this->db->get_where('passenger_list',array('p_email_id'=>$_POST['email_id']))->row();
		
			if(empty($passenger_email)){
				if(empty($passenger_contact)){
					
					$passenger_detail_array = array(
								'p_type'=>'Online',
								'p_full_name'=>$_POST['first_name']." ".$_POST['last_name'],
								'p_f_name'=>$_POST['first_name'],
								'p_l_name'=>$_POST['last_name'],
								'p_contact'=>$_POST['contact_no'],
								//'p_contact_2'=>$_POST['contact_no_2'],
								'p_email_id'=>$_POST['email_id'],
								//'p_state'=>$_POST['state'],
								//'p_city'=>$_POST['city'],
								'p_gender'=>'2',
								'p_password'=>md5($_POST['password']),
								'p_status'=>1,
								'p_joining_date_time'=>date("Y-m-d H:i:s"),
								'p_created_by'=>-1					
					);		
					
					
					$this->db->insert('passenger_list',$passenger_detail_array);
					$get_last_id=$this->db->insert_id();
					$this->General_data->update_id('passenger_list','RCP'.date('Y').date('m'),'p_id');
					
					
					//sms and email
					
					$passenger_details=$this->db->get_where('passenger_list',array('id'=>$get_last_id))->row();
					
					//sms
					$mobile_no=$passenger_details->p_contact;
								
					$message="Dear ".$passenger_details->p_full_name.", Welcome to RASHMI CABS, We are gujarat's leader for inter-city taxi travel. We have created your account on RASHMI CABS You can now login and update your profile for faster bookings. UserId : ".$passenger_details->p_email_id."  Password : ".$passenger_details->p_contact.". Call us on +91 9974 23 4111 for any help.";
								
					$this->Sms_email->send_sms($mobile_no,$message);
					
					//send email
					$to      = $passenger_details->p_email_id;
					$subject = 'Rashmi Cabs';
							
					$data['passenger_details']=$passenger_details;
					$data['password']=$_POST['password'];
							
					$message_mail = $this->load->view('mail_passenger_register',$data,true);
					
					$this->Sms_email->send_email($to, $subject, $message_mail);
					
					$response=array('success'=>'success','message'=>'Successfully Registered', 'passenger_details'=>$passenger_details);
				
				}else{
					$response=array('success'=>'error', 'message'=>'Contact No. Already Exist');
				}
				
			}else{
				$response=array('success'=>'error', 'message'=>'Email ID Already Exist');
			}
		}else{
			$response=array('success'=>'error','message'=>'Parameter Missing');
		}
		echo json_encode($response);
	
	}
	
	public function StateList(){
		$state=$this->db->get('state')->result();
		
		$data=array();
		$i=1;
		$total=0;
		foreach($state as $i=> $row){
			$data[$i]=$row;
			
			//$total=$i;
			
			//$i++;
		}
		
		$response=array('success'=>'success' ,'message'=>'Successfully Get State List','total'=>count($data), 'state_list'=>$data);
		
		echo json_encode($response);
	}
	public function CityList()
	{
		
		date_default_timezone_set('Asia/Kolkata');
		
		if(isset($_POST['state'])){
		
			$cities=$this->db->get_where('cities',array('state'=>$_POST['state']))->result();
		
			$data=array();
			$i=1;
			$total=0;
			foreach($cities as $i=> $row){
				$data[$i]=$row;
				
				//$total=$i;
				
				//$i++;
			}
			
			$response=array('success'=>'success' ,'message'=>'Successfully Get City List','total'=>count($data), 'city_list'=>$data);
			
		}else{
			$response=array('success'=>'error','message'=>'Parameter Missing');
		}
		echo json_encode($response);
	
	}
	
	public function PassengerLogin()
	{
		
		
		
		if(isset($_POST['username']) && isset($_POST['password'])){
		
			$username=$_POST['username'];
			$password=$_POST['password'];
			
			$get_user=$this->db->get_where('passenger_list',array('p_email_id'=>$_POST['username'],'p_password'=>md5($_POST['password'])))->row();
			
			if(empty($get_user)){
				$get_user=$this->db->get_where('passenger_list',array('p_contact'=>$_POST['username'],'p_password'=>md5($_POST['password'])))->row();
			}
			
			if(!empty($get_user)){
				if($get_user->p_status!=1){
					$response=array('success'=>'error','message'=>'Inactive User');
				}else{
					$response=array('success'=>'success','message'=>'Successfully Login', 'passenger_details'=>$get_user);
				}
			}else{
				$response=array('success'=>'error','message'=>'Invalid username and password');
			}
		}else{
			$response=array('success'=>'error','message'=>'Parameter Missing');
		}
		echo json_encode($response);
	}
	
	public function ForgetPassword()
	{
		
		date_default_timezone_set('Asia/Kolkata');
		
		if(isset($_POST['username'])){
		
			$get_user=$this->db->get_where('passenger_list',array('p_email_id'=>$_POST['username']))->row();
			
			if(empty($get_user)){
				$get_user=$this->db->get_where('passenger_list',array('p_contact'=>$_POST['username']))->row();
			}
		
			if(!empty($get_user)){
			
				$length = 4;
				$password = substr(str_shuffle("0123456789"), 0, $length);
			
				$array=array(
							'p_password' => md5($password),
							'p_updated_date_time'=>date("Y-m-d H:i:s"),
							
				);
						
				$this->db->where('id',$get_user->id);
				$this->db->update('passenger_list',$array);
				
				//sms and email
					
				$passenger_details=$this->db->get_where('passenger_list',array('id'=>$get_user->id))->row();
					
				//sms
				$mobile_no=$passenger_details->p_contact;
								
				$message="Dear ".$passenger_details->p_full_name.", Your new password for Rashmi Cabs's Account is:  UserId : ".$passenger_details->p_email_id."  Password : ".$password.". Call us on +91 9974 23 4111 for any help.";
								
				$this->Sms_email->send_sms($mobile_no,$message);
					
										
				//send email
				$to      = $passenger_details->p_email_id;
				$subject = 'Rashmi Cabs';
							
				$data['passenger_details']=$passenger_details;
				$data['password']=$password;
							
				$message_mail = $this->load->view('mail_passenger_forget_password',$data,true);
					
				$this->Sms_email->send_email($to, $subject, $message_mail);
				
				$response=array('success'=>'success','message'=>'Successfully Changed');
			
				
			}else{
				$response=array('success'=>'error', 'message'=>'Invalid data');
			}
				
			
		}else{
			$response=array('success'=>'error','message'=>'Parameter Missing');
		}
		echo json_encode($response);
	
	}
	
	public function PassengerDetails()
	{
		
		date_default_timezone_set('Asia/Kolkata');
		
		if(isset($_POST['passenger_id'])){
		
			$get_user=$this->db->get_where('passenger_list',array('id'=>$_POST['passenger_id']))->row();
			
		
			if(!empty($get_user)){
			
					$get_user->p_profile_path='';
					if(!empty($get_user->p_profile)){
						$get_user->p_profile_path=base_url().'uploads/passenger_profile/'.$get_user->p_profile;
					}
				
					$response=array('success'=>'success','message'=>'Successfully Found Passenger Details', 'passenger_details'=>$get_user);
				
				
				
			}else{
				$response=array('success'=>'error', 'message'=>'Data not Found');
			}
		}else{
			$response=array('success'=>'error','message'=>'Parameter Missing');
		}
		echo json_encode($response);
	}
	public function PassengerEdit()
	{
		
		date_default_timezone_set('Asia/Kolkata');
		if(isset($_POST['isweb']) && isset($_POST['first_name']) && isset($_POST['last_name']) && isset($_POST['email_id']) && isset($_POST['contact_no']) && isset($_POST['contact_no_2']) && isset($_POST['passenger_id']) && isset($_POST['state']) && isset($_POST['city']))		{			$passenger_detail_array = array(									'p_full_name'=>$_POST['first_name']." ".$_POST['last_name'],									'p_f_name'=>$_POST['first_name'],									'p_l_name'=>$_POST['last_name'],									'p_contact'=>$_POST['contact_no'],									'p_contact_2'=>$_POST['contact_no_2'],									'p_email_id'=>$_POST['email_id'],									'p_state'=>$_POST['state'],									'p_city'=>$_POST['city'],									'p_updated_date_time'=>date("Y-m-d H:i:s"),																		);			$this->db->where('id',$_POST['passenger_id']);			$this->db->update('passenger_list',$passenger_detail_array);						$passenger_details=$this->db->get_where('passenger_list',array('id'=>$_POST['passenger_id']))->row();			$response=array('success'=>'success','message'=>'Successfully Updated from book time in web application', 'passenger_details'=>$passenger_details);								}
		else if(isset($_POST['first_name']) && isset($_POST['last_name']) && isset($_POST['email_id']) && isset($_POST['contact_no']) && isset($_POST['contact_no_2']) && isset($_POST['passenger_id']) && isset($_POST['state']) && isset($_POST['city'])){
			
			$passenger_detail=$this->db->get_where('passenger_list',array('id'=>$_POST['passenger_id']))->row();
			
			if(!empty($passenger_detail)){
		
				$passenger_contact=$this->db->get_where('passenger_list',array('id!='=>$_POST['passenger_id'],'p_contact'=>$_POST['contact_no']))->row();
				$passenger_email=$this->db->get_where('passenger_list',array('id!='=>$_POST['passenger_id'],'p_email_id'=>$_POST['email_id']))->row();
			
				if(empty($passenger_email)){
					if(empty($passenger_contact)){
						
						$passenger_detail_array = array(
									'p_full_name'=>$_POST['first_name']." ".$_POST['last_name'],
									'p_f_name'=>$_POST['first_name'],
									'p_l_name'=>$_POST['last_name'],
									'p_contact'=>$_POST['contact_no'],
									'p_contact_2'=>$_POST['contact_no_2'],
									'p_email_id'=>$_POST['email_id'],
									'p_state'=>$_POST['state'],
									'p_city'=>$_POST['city'],
									'p_updated_date_time'=>date("Y-m-d H:i:s"),
									'p_gst_number' => $_POST['p_gst_number'],
												
						);		
						
						$this->db->where('id',$_POST['passenger_id']);
						$this->db->update('passenger_list',$passenger_detail_array);
						
						
						$passenger_details=$this->db->get_where('passenger_list',array('id'=>$_POST['passenger_id']))->row();
						
						$response=array('success'=>'success','message'=>'Successfully Updated', 'passenger_details'=>$passenger_details);
					
					}else{
						$response=array('success'=>'error', 'message'=>'Contact No. Already Exist');
					}
					
				}else{
					$response=array('success'=>'error', 'message'=>'Email ID Already Exist');
				}
			}else{
					$response=array('success'=>'error', 'message'=>'Invalid ID');
			}
		}else{
			$response=array('success'=>'error','message'=>'Parameter Missing');
		}
		echo json_encode($response);
	
	}
	public function PassengerEditProfile()
	{
		
		date_default_timezone_set('Asia/Kolkata');
		
		if(isset($_POST['passenger_id']) && isset($_POST['profile_image'])){
			
			$passenger_detail=$this->db->get_where('passenger_list',array('id'=>$_POST['passenger_id']))->row();
			
			if(!empty($passenger_detail)){
		
				
				$user_id = $_POST['passenger_id'];
				$img = $_POST['profile_image'];
				$img = str_replace('data:image/png;base64,', '', $img);
				$img = str_replace(' ', '+', $img);
				$data = base64_decode($img);
				$name = $passenger_detail->p_id.'.jpg';
				//$name = uniqid() . '.jpg';
				$file = "uploads/passenger_profile/" . $name;
				$success = file_put_contents($file, $data);
				//print $success ? $file : 'Unable to save the file.';
				$this->db->where('id',$user_id);
				$this->db->update('passenger_list',array('p_profile' => $name));
									
						
				$passenger_details=$this->db->get_where('passenger_list',array('id'=>$_POST['passenger_id']))->row();
				
				$passenger_details->p_profile_path='';
				if(!empty($passenger_details->p_profile)){
					$passenger_details->p_profile_path=base_url().'uploads/passenger_profile/'.$passenger_details->p_profile;
				}
						
				$response=array('success'=>'success','message'=>'Successfully Updated', 'passenger_details'=>$passenger_details);
					
					
			}else{
					$response=array('success'=>'error', 'message'=>'Invalid ID');
			}
		}else{
			$response=array('success'=>'error','message'=>'Parameter Missing');
		}
		echo json_encode($response);
	
	}
	public function PassengerChangePassword(){
	
		date_default_timezone_set('Asia/Kolkata');
		
		if(isset($_POST['old_password']) && isset($_POST['new_password']) && isset($_POST['passenger_id'])){
		
						
			$passenger_detail=$this->db->get_where('passenger_list',array('id'=>$_POST['passenger_id']))->row();
			
			if(!empty($passenger_detail)){
			
				$passenger_pass=$this->db->get_where('passenger_list',array('id'=>$_POST['passenger_id'], 'p_password'=>md5($_POST['old_password'])))->row();
				
				if(!empty($passenger_pass)){
					
						$array=array(
							'p_password' => md5($_POST['new_password']),
							'p_updated_date_time'=>date("Y-m-d H:i:s"),
							
						);
						
						$this->db->where('id',$_POST['passenger_id']);
						$this->db->update('passenger_list',$array);
						
						
						$passenger_details=$this->db->get_where('passenger_list',array('id'=>$_POST['passenger_id']))->row();
						
						$response=array('success'=>'success','message'=>'Successfully Updated', 'passenger_details'=>$passenger_details);
					
					
					
				}else{
					$response=array('success'=>'error', 'message'=>'Invalid Old Password');
				}
			}else{
					$response=array('success'=>'error', 'message'=>'Invalid ID');
			}
		}else{
			$response=array('success'=>'error','message'=>'Parameter Missing');
		}
		echo json_encode($response);
	}
	public function HelpDeskSupportMessages()
	{
		
		date_default_timezone_set('Asia/Kolkata');
		
		if(isset($_POST['passenger_id'])){
		
			$get_user=$this->db->get_where('passenger_list',array('id'=>$_POST['passenger_id']))->row();
			
		
			if(!empty($get_user)){
			
				$this->db->select('*');
				$this->db->from('helpdesk_support');
				$this->db->where('hs_type=1 AND(hs_sender_id='.$_POST['passenger_id'].' AND hs_receiver_id=0) OR (hs_sender_id=0 AND hs_receiver_id='.$_POST['passenger_id'].')');
				$helpdesk_support=$this->db->get()->result();
				
				$data=array();
				$i=0;
				foreach($helpdesk_support as $row){
				
					$data[$i]['id']=$row->id;
									
					$data[$i]['hs_sender_id']=$row->hs_sender_id;
					$data[$i]['hs_receiver_id']=$row->hs_receiver_id;
					$data[$i]['hs_message_type']=0;	
					if(!empty($row->hs_sender_id)){
						$data[$i]['hs_message_type']=1;
					}else if(!empty($row->hs_receiver_id)){
						$data[$i]['hs_message_type']=2;
					}
					$data[$i]['hs_message']=$row->hs_message;
					$data[$i]['hs_send_date']=date('d/m/Y',strtotime($row->hs_send_date));
					$data[$i]['hs_send_time']=date('h:i A',strtotime($row->hs_send_time));
					
					$i++;
					
				}
					
				
				$response=array('success'=>'success','message'=>'Successfully Found', 'total_messages'=>count($data), 'helpdesk_support_messages'=>$data);
				
				
				
			}else{
				$response=array('success'=>'error', 'message'=>'Invalid Passenger id');
			}
		}else{
			$response=array('success'=>'error','message'=>'Parameter Missing');
		}
		echo json_encode($response);
	}
	public function SendHelpDeskSupport()
	{
		
		date_default_timezone_set('Asia/Kolkata');
		
		if(isset($_POST['passenger_id']) && isset($_POST['message'])){
		
			$get_user=$this->db->get_where('passenger_list',array('id'=>$_POST['passenger_id']))->row();
			
		
			if(!empty($get_user)){
					
					$array= array(
					
							'hs_type' => 1,
							'hs_sender_id' =>$_POST['passenger_id'],
							'hs_receiver_id' => 0,
							'hs_message'=>$_POST['message'],
							'hs_send_date' => date('Y-m-d'),
							'hs_send_time' => date('H:i:s'),
							'hs_created_datetime' => date('Y-m-d H:i:s')
										
							
					);
					
					$this->db->insert('helpdesk_support',$array);
					$get_last_id=$this->db->insert_id();
					$this->General_data->update_id('helpdesk_support','RCHS','hs_id');
				
					$response=array('success'=>'success','message'=>'Successfully send');
				
				
				
			}else{
				$response=array('success'=>'error', 'message'=>'Invalid Passenger id');
			}
		}else{
			$response=array('success'=>'error','message'=>'Parameter Missing');
		}
		echo json_encode($response);
	}
}
