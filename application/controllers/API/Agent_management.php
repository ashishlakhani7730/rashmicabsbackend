<?php defined('BASEPATH') OR exit('No direct script access allowed');



class Agent_management extends CI_Controller 

{

	

	function __construct()

    {

        parent::__construct();

        $this->load->model('General_data');

	    $this->load->model('Sms_email');

	}

	

	 

	public function AgentRegister()
	
	{

		

		date_default_timezone_set('Asia/Kolkata');

		

		if(isset($_POST['first_name']) && isset($_POST['last_name']) && isset($_POST['email_id']) && isset($_POST['contact_no']) && isset($_POST['password'])){

		

			$agent_contact=$this->db->get_where('agent_detail',array('a_contact_no1' => $_POST['contact_no']))->row();

			$agent_email=$this->db->get_where('agent_detail',array('a_email_id' => $_POST['email_id']))->row();

		

			if(empty($agent_email)){

				if(empty($agent_contact)){

					

					$agent_detail_array = array(

								'a_full_name'	   =>$_POST['first_name']." ".$_POST['last_name'],

								'a_f_name'         =>$_POST['first_name'],

								'a_l_name'         =>$_POST['last_name'],

								'a_contact_no1'    =>$_POST['contact_no'],

								'a_email_id'       =>$_POST['email_id'],

								'a_pswd'           =>md5($_POST['password']),

								'a_joining_date_time'=>date("Y-m-d H:i:s"),

								'a_status'		   =>1,

											

					);		

					

					

					$this->db->insert('agent_detail',$agent_detail_array);

					$get_last_id=$this->db->insert_id();

					$this->General_data->update_id('agent_detail','RCAG'.date('y').date('m'),'agent_id');

					

					

					//sms and email

			

					$agent_details=$this->db->get_where('agent_detail',array('id'=>$get_last_id))->row();

					

					//sms

					$mobile_no=$agent_details->a_contact_no1;

								

					//$message = 'Dear '.$agent_details->a_full_name.', Welcome to Rashmi Cabs! We are excited to have you on board with us. Call us on +91 9974234111 for any help.';

					$message="Dear ".$agent_details->a_full_name.", Welcome to RASHMI CABS, We are gujarat's leader for inter-city taxi travel. We have created your account on RASHMI CABS You can now login and update your profile for faster bookings. UserId : ".$agent_details->a_email_id."  Password : ".$_POST['password'].". Call us on +91 9974234111 for any help.";

								

					$this->Sms_email->send_sms($mobile_no,$message);

					

					//send email

					$to      = $agent_details->a_email_id;

					$subject = 'Rashmi Cabs';

							

					$data['agent_details']=$agent_details;

					//$data['message']='Welcome to Rashmi Cabs! We are excited to have you on board with us. Call us on +91 9974 23 4111 for any help.';

					$data['password']=$_POST['password'];

							

					//$message_mail = $this->load->view('mail_agent_register',$data,true);

					

					//$this->Sms_email->send_email($to, $subject, $message_mail);

					

					$response=array('success'=>'success','message'=>'Successfully Registered', 'agent_details'=>$agent_details);

				

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

		foreach($state as $row){

			$data[$i]=$row;

			

			//$total=$i;

			

			$i++;

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

			foreach($cities as $row){

				$data[$i]=$row;

				

				//$total=$i;

				

				$i++;

			}

			

			$response=array('success'=>'success' ,'message'=>'Successfully Get City List','total'=>count($data), 'city_list'=>$data);

			

		}else{

			$response=array('success'=>'error','message'=>'Parameter Missing');

		}

		echo json_encode($response);

	

	}

	

	public function AgentLogin()

	{

		

		

		

		if(isset($_POST['username']) && isset($_POST['password'])){

		

			$username=$_POST['username'];

			$password=$_POST['password'];

			

			/*if(isset($_POST['imei_no'])){

				$imei_no=$_POST['imei_no'];

			}else{

				$imei_no="";

			}*/

			

			$get_user=$this->db->get_where('agent_detail',array('a_email_id'=>$_POST['username'],'a_pswd'=>md5($_POST['password'])))->row();

			

			if(empty($get_user)){

				$get_user=$this->db->get_where('agent_detail',array('a_contact_no1'=>$_POST['username'],'a_pswd'=>md5($_POST['password'])))->row();

			}

			

			if(!empty($get_user)){

				if($get_user->a_status!=1){

					$response=array('success'=>'error','message'=>'Inactive User');

				}else{

				

					/*if($get_user->a_imei_no==''){

						

						$this->db->where('id',$get_user->id);

						$this->db->update('agent_detail',array('a_imei_no'=>$imei_no));*/

					

						$get_user=$this->db->get_where('agent_detail',array('id'=>$get_user->id))->row();

						if(!empty($get_user->user_image1)){

							$get_user->profile_pic_path=base_url()."uploads/Agent_Image/profile_pic/".$get_user->user_image1;

						}else{

							$get_user->profile_pic_path="";

						}

						$response=array('success'=>'success','message'=>'Successfully Login', 'agent_details'=>$get_user);

				/*	}else {

						if($get_user->a_imei_no==$imei_no){

							$get_user=$this->db->get_where('agent_detail',array('id'=>$get_user->id))->row();

							if(!empty($get_user->user_image1)){

								$get_user->profile_pic_path=base_url()."uploads/Agent_Image/profile_pic/".$get_user->user_image1;

							}else{

								$get_user->profile_pic_path="";

							}

							$response=array('success'=>'success','message'=>'Successfully Login', 'agent_details'=>$get_user);

						}else{

							$response=array('success'=>'error','message'=>'Invalid IMEI Number');

						}

					}*/

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

		

			$get_user=$this->db->get_where('agent_detail',array('a_email_id'=>$_POST['username']))->row();

			

			if(empty($get_user)){

				$get_user=$this->db->get_where('agent_detail',array('a_contact_no1'=>$_POST['username']))->row();

			}

		

			if(!empty($get_user)){

			

				$length = 4;

				$password = substr(str_shuffle("0123456789"), 0, $length);

			

				$array=array(

							'a_pswd' => md5($password),

							'a_updated_date_time'=>date("Y-m-d H:i:s"),

							

				);

						

				$this->db->where('id',$get_user->id);

				$this->db->update('agent_detail',$array);

				

				//sms and email

					

				$agent_details=$this->db->get_where('agent_detail',array('id'=>$get_user->id))->row();

					

				//sms

				$mobile_no=$agent_details->a_contact_no1;

								

				$message="Dear ".$agent_details->a_full_name.", Your new password for Rashmi Cabs's Account is:  UserId : ".$agent_details->a_email_id."  Password : ".$password.". Call us on +91 9974 23 4111 for any help.";

								

				$this->Sms_email->send_sms($mobile_no,$message);

					

										

				//send email

				$to      = $agent_details->a_email_id;

				$subject = 'Rashmi Cabs';

							

				$data['agent_details']=$agent_details;

				$data['password']=$password;

							

				$message_mail = $this->load->view('mail_agent_forget_password',$data,true);

					

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

	

	public function AgentDetails()

	{

		

		date_default_timezone_set('Asia/Kolkata');

		

		if(isset($_POST['agent_id'])){

		

			$get_user=$this->db->get_where('agent_detail',array('id'=>$_POST['agent_id']))->row();

			

		

			if(!empty($get_user)){

					if(!empty($get_user->user_image1)){

						$get_user->profile_pic_path=base_url()."uploads/Agent_Image/profile_pic/".$get_user->user_image1;

					}else{

						$get_user->profile_pic_path="";

					}

					

					if(!empty($get_user->user_image2)){

						$get_user->driving_lic_front_path=base_url()."uploads/Agent_Image/driving_lic_front/".$get_user->user_image2;

					}else{

						$get_user->driving_lic_front_path="";

					}

					

					if(!empty($get_user->a_driving_lic_back)){

						$get_user->driving_lic_back_path=base_url()."uploads/Agent_Image/driving_lic_back/".$get_user->a_driving_lic_back;

					}else{

						$get_user->driving_lic_back_path="";

					}

					

					if(!empty($get_user->user_image3)){

						$get_user->other_docs1_path=base_url()."uploads/Agent_Image/other_docs1/".$get_user->user_image3;

					}else{

						$get_user->other_docs1_path="";

					}

					

					if(!empty($get_user->a_other_docs2)){

						$get_user->other_docs2_path=base_url()."uploads/Agent_Image/other_docs2/".$get_user->a_other_docs2;

					}else{

						$get_user->other_docs2_path="";

					}

					

					if(!empty($get_user->a_other_docs3)){

						$get_user->other_docs3_path=base_url()."uploads/Agent_Image/other_docs3/".$get_user->a_other_docs3;

					}else{

						$get_user->other_docs3_path="";

					}

				

					$response=array('success'=>'success','message'=>'Successfully Found Agent Details', 'agent_details'=>$get_user);

				

				

				

			}else{

				$response=array('success'=>'error', 'message'=>'Data not Found');

			}

		}else{

			$response=array('success'=>'error','message'=>'Parameter Missing');

		}

		echo json_encode($response);

	}

	public function AgentEdit()

	{

		

		date_default_timezone_set('Asia/Kolkata');

		

		if(isset($_POST['first_name']) && isset($_POST['last_name']) && isset($_POST['email_id']) && isset($_POST['contact_no']) && isset($_POST['contact_no_2']) && isset($_POST['agent_id']) && isset($_POST['state']) && isset($_POST['city'])){

			

			$agent_detail=$this->db->get_where('agent_detail',array('id'=>$_POST['agent_id']))->row();

			

			if(!empty($agent_detail)){

		

				$agent_contact=$this->db->get_where('agent_detail',array('id!='=>$_POST['agent_id'],'a_contact_no1'=>$_POST['contact_no']))->row();

				$agent_email=$this->db->get_where('agent_detail',array('id!='=>$_POST['agent_id'],'a_email_id'=>$_POST['email_id']))->row();

			

				if(empty($agent_email)){

					if(empty($agent_contact)){

						

						$agent_detail_array = array(

									'a_full_name'	   =>$_POST['first_name']." ".$_POST['last_name'],

									'a_f_name'         =>$_POST['first_name'],

									'a_l_name'         =>$_POST['last_name'],

									'a_contact_no1'    =>$_POST['contact_no'],

									'a_contact_no2'    =>$_POST['contact_no_2'],

									'a_email_id'       =>$_POST['email_id'],

									'a_state'=>$_POST['state'],

									'a_city'=>$_POST['city'],

									'a_updated_date_time'=>date("Y-m-d H:i:s"),

												

						);		

						

						$this->db->where('id',$_POST['agent_id']);

						$this->db->update('agent_detail',$agent_detail_array);

						

						

						$agent_details=$this->db->get_where('agent_detail',array('id'=>$_POST['agent_id']))->row();

						

						if(!empty($agent_details->user_image1)){

    						$agent_details->profile_pic_path=base_url()."uploads/Agent_Image/profile_pic/".$agent_details->user_image1;

    					}else{

    						$agent_details->profile_pic_path="";

    					}

						

						$response=array('success'=>'success','message'=>'Successfully Updated', 'agent_details'=>$agent_details);

					

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

	public function AgentEditProfile()

	{

		

		date_default_timezone_set('Asia/Kolkata');

		

		if(isset($_POST['agent_id']) && isset($_POST['profile_image'])){

			

			$agent_detail=$this->db->get_where('agent_detail',array('id'=>$_POST['agent_id']))->row();

			

			if(!empty($agent_detail)){

		

				

				$user_id = $_POST['agent_id'];

				$img = $_POST['profile_image'];

				$img = str_replace('data:image/png;base64,', '', $img);

				$img = str_replace(' ', '+', $img);

				$data = base64_decode($img);

				$name = 'RCAG'.$agent_detail->id.'.jpg';

				//$name = uniqid() . '.jpg';

				$file = "uploads/Agent_Image/profile_pic/" . $name;

				$success = file_put_contents($file, $data);

				//print $success ? $file : 'Unable to save the file.';

				$this->db->where('id',$user_id);

				$this->db->update('agent_detail',array('user_image1' => $name));

									

						

				$agent_details=$this->db->get_where('agent_detail',array('id'=>$_POST['agent_id']))->row();

						

				$response=array('success'=>'success','message'=>'Successfully Updated', 'agent_details'=>$agent_details);

					

					

			}else{

					$response=array('success'=>'error', 'message'=>'Invalid ID');

			}

		}else{

			$response=array('success'=>'error','message'=>'Parameter Missing');

		}

		echo json_encode($response);

	

	}

	public function AgentChangePassword(){

	

		date_default_timezone_set('Asia/Kolkata');

		

		if(isset($_POST['old_password']) && isset($_POST['new_password']) && isset($_POST['agent_id'])){

		

						

			$agent_detail=$this->db->get_where('agent_detail',array('id'=>$_POST['agent_id']))->row();

			

			if(!empty($agent_detail)){

			

				$agent_pass=$this->db->get_where('agent_detail',array('id'=>$_POST['agent_id'], 'a_pswd'=>md5($_POST['old_password'])))->row();

				

				if(!empty($agent_pass)){

					

						$array=array(

							'a_pswd' => md5($_POST['new_password']),

							'a_updated_date_time'=>date("Y-m-d H:i:s"),

							

						);

						

						$this->db->where('id',$_POST['agent_id']);

						$this->db->update('agent_detail',$array);

						

						

						$agent_details=$this->db->get_where('agent_detail',array('id'=>$_POST['agent_id']))->row();

						

						$response=array('success'=>'success','message'=>'Successfully Updated', 'agent_details'=>$agent_details);

					

					

					

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

	

	public function AgentEditDOCS()
	{

		if($_SERVER['REQUEST_METHOD']=='POST'){

			if(isset($_POST['agent_id']) && isset($_FILES['doc_image']) && isset($_POST['doc_type'])){				

				$agent_id=$_POST['agent_id'];
				$agent_detail=$this->db->get_where('agent_detail',array('id'=>$agent_id))->row();				
				$docs_type=$_POST['doc_type'];

				if(!empty($agent_detail)){

					if($docs_type==1)
					{
						$upload_path = 'uploads/Agent_Image/profile_pic/';

						$docs_field='user_image1';
					}

					else if($docs_type==2)
					{
						$upload_path = 'uploads/Agent_Image/driving_lic_front/';

						$docs_field='user_image2';
					}

					else if($docs_type==3)
					{
						$upload_path = 'uploads/Agent_Image/driving_lic_back/';

						$docs_field='a_driving_lic_back';
					}

					else if($docs_type==4)
					{
						$upload_path = 'uploads/Agent_Image/other_docs1/';

						$docs_field='user_image3';
					}

					else if($docs_type==5)
					{
						$upload_path = 'uploads/Agent_Image/other_docs2/';

						$docs_field='a_other_docs2';
					}

					else if($docs_type==6)
					{
						$upload_path = 'uploads/Agent_Image/other_docs3/';

						$docs_field='a_other_docs3';
					}

					

					if(empty($this->General_data->uploadImage2($upload_path,$agent_detail->id,'RCAG','agent_detail',$docs_field,'doc_image')))
					{
						$agent_details=$this->db->get_where('agent_detail',array('id'=>$agent_detail->id))->row();

						$response=array('success'=>'success','message'=>'Successfully Updated', 'agent_details'=>$agent_details);
					}
					else
					{
						$response=array('success'=>'error', 'message'=>"Not uploaded. try again..");
					}

				}else{

					$response=array('success'=>'error', 'message'=>'Invalid ID');

				}

				

			}else{

				$response=array('success'=>'error','message'=>'Parameter Missing');

			}

			echo json_encode($response);

		}

	

	}

	public function AgentEditBusinessDetail()

	{

		

		date_default_timezone_set('Asia/Kolkata');

		

		if(isset($_POST['agent_id']) && isset($_POST['business_name']) && isset($_POST['business_contact_no']) && isset($_POST['business_email']) && isset($_POST['pan_no']) && isset($_POST['gst_no']) && isset($_POST['bank_name']) && isset($_POST['account_name']) && isset($_POST['account_no']) && isset($_POST['ifsc_code']) && isset($_POST['address']) && isset($_POST['area']) && isset($_POST['zipcode']) && isset($_POST['state']) && isset($_POST['city'])){

			

			$agent_detail=$this->db->get_where('agent_detail',array('id'=>$_POST['agent_id']))->row();

			

			if(!empty($agent_detail)){

		

				$agent_detail_array = array(

									'a_bsns_name'      =>$_POST['business_name'],

									'a_bsns_contact_no'=>$_POST['business_contact_no'],

									'a_bsns_email_id'  =>$_POST['business_email'],

									'a_pan_no'         =>$_POST['pan_no'],

									'a_gst_no'         =>$_POST['gst_no'],

									'a_bnk_name'       =>$_POST['bank_name'],

									'a_ac_name'        =>$_POST['account_name'],

									'a_ac_no'          =>$_POST['account_no'],

									'a_ifsc'           =>$_POST['ifsc_code'],

									'a_address'        =>$_POST['address'],

									'a_area'           =>$_POST['area'],

									'a_zipcode'        =>$_POST['zipcode'],

									'a_state'          =>$_POST['state'],

									'a_city'           =>$_POST['city'],				

									'a_updated_date_time'=>date("Y-m-d H:i:s"),

												

				);		

					

				$this->db->where('id',$_POST['agent_id']);

				$this->db->update('agent_detail',$agent_detail_array);

						

						

				$agent_details=$this->db->get_where('agent_detail',array('id'=>$_POST['agent_id']))->row();

				

				$response=array('success'=>'success','message'=>'Successfully Updated', 'agent_details'=>$agent_details);

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

		

		if(isset($_POST['agent_id'])){

		

			$get_user=$this->db->get_where('agent_detail',array('id'=>$_POST['agent_id']))->row();

			

		

			if(!empty($get_user)){

			

				$this->db->select('*');

				$this->db->from('helpdesk_support');

				$this->db->where('hs_type=2 AND(hs_sender_id='.$_POST['agent_id'].' AND hs_receiver_id=0) OR (hs_sender_id=0 AND hs_receiver_id='.$_POST['agent_id'].')');

				$helpdesk_support=$this->db->get()->result();

				

				$data=array();

				$i=1;

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

					

				

				$response=array('success'=>'success','message'=>'Successfully Found ', 'total_messages'=>count($data), 'helpdesk_support_messages'=>$data);

				

				

				

			}else{

				$response=array('success'=>'error', 'message'=>'Invalid agent id');

			}

		}else{

			$response=array('success'=>'error','message'=>'Parameter Missing');

		}

		echo json_encode($response);

	}

	public function SendHelpDeskSupport()

	{

		

		date_default_timezone_set('Asia/Kolkata');

		

		if(isset($_POST['agent_id']) && isset($_POST['message'])){

		

			$get_user=$this->db->get_where('agent_detail',array('id'=>$_POST['agent_id']))->row();

			

		

			if(!empty($get_user)){

					

					$array= array(

					

							'hs_type' => 2,

							'hs_sender_id' =>$_POST['agent_id'],

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

				$response=array('success'=>'error', 'message'=>'Invalid agent id');

			}

		}else{

			$response=array('success'=>'error','message'=>'Parameter Missing');

		}

		echo json_encode($response);

	}

	

	public function AddDriver()

	{

		

		date_default_timezone_set('Asia/Kolkata');

		

		if(isset($_POST['first_name']) && isset($_POST['last_name']) && isset($_POST['email_id']) && isset($_POST['contact_no']) && isset($_POST['contact_no_2']) && isset($_POST['agent_id']) && isset($_POST['address']) && isset($_POST['area']) && isset($_POST['zipcode']) && isset($_POST['state']) && isset($_POST['city'])){

			

			$agent_detail=$this->db->get_where('agent_detail',array('id'=>$_POST['agent_id']))->row();

			

			if(!empty($agent_detail)){

		

				$driver_contact=$this->db->get_where('driver_detail',array('d_contact_no1' => $_POST['contact_no']))->row();

			

				if(empty($driver_contact)){

					

						

					$array= array(

					

							'agent_id' => $_POST['agent_id'],

							'd_full_name' => $_POST['first_name']." ".$_POST['last_name'],

							'd_f_name' => $_POST['first_name'],

							'd_l_name' => $_POST['last_name'],

							'd_contact_no1' => $_POST['contact_no'],

							'd_contact_no2' => $_POST['contact_no_2'],

							'd_email_id' => $_POST['email_id'],

							'd_address' => $_POST['address'],

							'd_area' => $_POST['area'],

							'd_zipcode' => $_POST['zipcode'],

							'd_state' => $_POST['state'],

							'd_city' => $_POST['city'],

							'd_reg_date' => date('Y-m-d'),

							'd_reg_time' => date('H:i:s'),
							'd_status' => 0,
							'd_created_type'=> 1,

							'd_created_by' => $_POST['agent_id'],

							'd_created_datetime' => date('Y-m-d H:i:s')

										

							

					);

					

					$this->db->insert('driver_detail',$array);

					$get_last_id=$this->db->insert_id();

					$this->General_data->update_id('driver_detail','RCD','driver_id');

						

						

					$driver_detail=$this->db->get_where('driver_detail',array('id'=>$get_last_id))->row();

						

					$response=array('success'=>'success','message'=>'Successfully Created', 'driver_detail'=>$driver_detail);

					

					

					

				}else{

					$response=array('success'=>'error', 'message'=>'Contact No. Already Exist');

				}

			}else{

					$response=array('success'=>'error', 'message'=>'Invalid agent ID');

			}

		}else{

			$response=array('success'=>'error','message'=>'Parameter Missing');

		}

		echo json_encode($response);

	

	}

	public function DriverList()

	{

		

		date_default_timezone_set('Asia/Kolkata');

		

		if(isset($_POST['agent_id'])){

			

			$agent_detail=$this->db->get_where('agent_detail',array('id'=>$_POST['agent_id']))->row();

			

			if(!empty($agent_detail)){

		

				$driver_detail=$this->db->order_by('id','desc')->get_where('driver_detail',array('agent_id' => $_POST['agent_id']))->result();

				

				$data=array();

				$i=1;

				

				foreach($driver_detail as $row){

				

					$data[$i]=$row;

					

					$data[$i]->d_profile_pic_path='';

					if(!empty($row->d_profile_pic)){

						$data[$i]->d_profile_pic_path=base_url().'uploads/driver/profile_pic/'.$row->d_profile_pic;

					}

					$data[$i]->d_driving_lic_front_path='';

					if(!empty($row->d_driving_lic_front)){

						$data[$i]->d_driving_lic_front_path=base_url().'uploads/driver/driving_lic_front/'.$row->d_driving_lic_front;

					}

					$data[$i]->d_driving_lic_back_path='';

					if(!empty($row->d_driving_lic_back)){

						$data[$i]->d_driving_lic_back_path=base_url().'uploads/driver/driving_lic_back/'.$row->d_driving_lic_back;

					}

					$data[$i]->d_other_docs1_path='';

					if(!empty($row->d_other_docs1)){

						$data[$i]->d_other_docs1_path=base_url().'uploads/driver/other_docs1/'.$row->d_other_docs1;

					}

					$data[$i]->d_other_docs2_path='';

					if(!empty($row->d_other_docs2)){

						$data[$i]->d_other_docs2_path=base_url().'uploads/driver/other_docs2/'.$row->d_other_docs2;

					}

					$data[$i]->d_other_docs3_path='';

					if(!empty($row->d_other_docs3)){

						$data[$i]->d_other_docs3_path=base_url().'uploads/driver/other_docs3/'.$row->d_other_docs3;

					}

					

					$i++;

				}

			

				

						

				$response=array('success'=>'success','message'=>'Successfully Get data', 'total'=>count($data), 'driver_list'=>$data);

				

			}else{

					$response=array('success'=>'error', 'message'=>'Invalid agent ID');

			}

		}else{

			$response=array('success'=>'error','message'=>'Parameter Missing');

		}

		echo json_encode($response);

	

	}

	public function DriverDetail()

	{

		

		date_default_timezone_set('Asia/Kolkata');

		

		if(isset($_POST['driver_id'])){

			

			$driver_detail=$this->db->get_where('driver_detail',array('id' => $_POST['driver_id']))->row();

			

			if(!empty($driver_detail)){

				

				

				$driver_detail->d_profile_pic_path='';

				if(!empty($driver_detail->d_profile_pic)){

					$driver_detail->d_profile_pic_path=base_url().'uploads/driver/profile_pic/'.$driver_detail->d_profile_pic;

				}

				$driver_detail->d_driving_lic_front_path='';

				if(!empty($driver_detail->d_driving_lic_front)){

					$driver_detail->d_driving_lic_front_path=base_url().'uploads/driver/driving_lic_front/'.$driver_detail->d_driving_lic_front;

				}

				$driver_detail->d_driving_lic_back_path='';

				if(!empty($driver_detail->d_driving_lic_back)){

					$driver_detail->d_driving_lic_back_path=base_url().'uploads/driver/driving_lic_back/'.$driver_detail->d_driving_lic_back;

				}

				$driver_detail->d_other_docs1_path='';

				if(!empty($driver_detail->d_other_docs1)){

					$driver_detail->d_other_docs1_path=base_url().'uploads/driver/other_docs1/'.$driver_detail->d_other_docs1;

				}

				$driver_detail->d_other_docs2_path='';

				if(!empty($driver_detail->d_other_docs2)){

					$driver_detail->d_other_docs2_path=base_url().'uploads/driver/other_docs2/'.$driver_detail->d_other_docs2;

				}

				$driver_detail->d_other_docs3_path='';

				if(!empty($driver_detail->d_other_docs3)){

					$driver_detail->d_other_docs3_path=base_url().'uploads/driver/other_docs3/'.$driver_detail->d_other_docs3;

				}

				$response=array('success'=>'success','message'=>'Successfully Get Driver Detail', 'driver_detail'=>$driver_detail);

				

			}else{

				$response=array('success'=>'error', 'message'=>'Invalid Driver ID');

			}

		}else{

			$response=array('success'=>'error','message'=>'Parameter Missing');

		}

		echo json_encode($response);

	

	}

	public function EditDriver()

	{

		

		date_default_timezone_set('Asia/Kolkata');

		

		if(isset($_POST['driver_id']) && isset($_POST['first_name']) && isset($_POST['last_name']) && isset($_POST['email_id']) && isset($_POST['contact_no']) && isset($_POST['contact_no_2']) && isset($_POST['agent_id']) && isset($_POST['address']) && isset($_POST['area']) && isset($_POST['zipcode']) && isset($_POST['state']) && isset($_POST['city'])){

			

			$agent_detail=$this->db->get_where('agent_detail',array('id'=>$_POST['agent_id']))->row();

			

			if(!empty($agent_detail)){

			

				$driver_detail=$this->db->get_where('driver_detail',array('id' => $_POST['driver_id']))->row();

			

				if(!empty($driver_detail)){

		

					$driver_contact=$this->db->get_where('driver_detail',array('id!='=>$_POST['driver_id'], 'd_contact_no1' => $_POST['contact_no']))->row();

				

					if(empty($driver_contact)){

						

							

						$array= array(

						

								'agent_id' => $_POST['agent_id'],

								'd_full_name' => $_POST['first_name']." ".$_POST['last_name'],

								'd_f_name' => $_POST['first_name'],

								'd_l_name' => $_POST['last_name'],

								'd_contact_no1' => $_POST['contact_no'],

								'd_contact_no2' => $_POST['contact_no_2'],

								'd_email_id' => $_POST['email_id'],

								'd_address' => $_POST['address'],

								'd_area' => $_POST['area'],

								'd_zipcode' => $_POST['zipcode'],

								'd_state' => $_POST['state'],

								'd_city' => $_POST['city'],

								'd_reg_date' => date('Y-m-d'),

								'd_reg_time' => date('H:i:s'),

								'd_updated_type' => 1,

								'd_updated_by' => $_POST['agent_id'],

								'd_updated_datetime' => date('Y-m-d H:i:s')

											

								

						);

						

						$this->db->where('id',$_POST['driver_id']);

						$this->db->update('driver_detail',$array);

							

							

						$driver_detail=$this->db->get_where('driver_detail',array('id'=>$_POST['driver_id']))->row();

						

						$driver_detail->d_profile_pic_path='';

						if(!empty($driver_detail->d_profile_pic)){

							$driver_detail->d_profile_pic_path=base_url().'uploads/driver/profile_pic/'.$driver_detail->d_profile_pic;

						}

						$driver_detail->d_driving_lic_front_path='';

						if(!empty($driver_detail->d_driving_lic_front)){

							$driver_detail->d_driving_lic_front_path=base_url().'uploads/driver/driving_lic_front/'.$driver_detail->d_driving_lic_front;

						}

						$driver_detail->d_driving_lic_back_path='';

						if(!empty($driver_detail->d_driving_lic_back)){

							$driver_detail->d_driving_lic_back_path=base_url().'uploads/driver/driving_lic_back/'.$driver_detail->d_driving_lic_back;

						}

						$driver_detail->d_other_docs1_path='';

						if(!empty($driver_detail->d_other_docs1)){

							$driver_detail->d_other_docs1_path=base_url().'uploads/driver/other_docs1/'.$driver_detail->d_other_docs1;

						}

						$driver_detail->d_other_docs2_path='';

						if(!empty($driver_detail->d_other_docs2)){

							$driver_detail->d_other_docs2_path=base_url().'uploads/driver/other_docs2/'.$driver_detail->d_other_docs2;

						}

						$driver_detail->d_other_docs3_path='';

						if(!empty($driver_detail->d_other_docs3)){

							$driver_detail->d_other_docs3_path=base_url().'uploads/driver/other_docs3/'.$driver_detail->d_other_docs3;

						}						

							

						$response=array('success'=>'success','message'=>'Successfully Updated', 'driver_detail'=>$driver_detail);

						

						

						

					}else{

						$response=array('success'=>'error', 'message'=>'Contact No. Already Exist');

					}

				}else{

					$response=array('success'=>'error', 'message'=>'Invalid Driver ID');

				}

			}else{

					$response=array('success'=>'error', 'message'=>'Invalid agent ID');

			}

		}else{

			$response=array('success'=>'error','message'=>'Parameter Missing');

		}

		echo json_encode($response);

	

	}

	public function DriverEditDOCS()
	{
		if($_SERVER['REQUEST_METHOD']=='POST'){

			if(isset($_POST['driver_id']) && isset($_FILES['doc_image']) && isset($_POST['doc_type'])){				
				
				$driver_id = $_POST['driver_id'];
				$driver_detail=$this->db->get_where('driver_detail',array('id'=>$driver_id))->row();
				$docs_type=$_POST['doc_type'];

				if(!empty($driver_detail)){
		
					if($docs_type==1)
					{
						$upload_path = 'uploads/driver/profile_pic/';

						$docs_field='d_profile_pic';
					}
					else if($docs_type==2)
					{

						$upload_path = 'uploads/driver/driving_lic_front/';

						$docs_field='d_driving_lic_front';

					}
					else if($docs_type==3)
					{

						$upload_path = 'uploads/driver/driving_lic_back/';

						$docs_field='d_driving_lic_back';

					}
					else if($docs_type==4)
					{

						$upload_path = 'uploads/driver/other_docs1/';

						$docs_field='d_other_docs1';

					}
					else if($docs_type==5)

					{

						$upload_path = 'uploads/driver/other_docs2/';

						$docs_field='d_other_docs2';

					}

					else if($docs_type==6)

					{

						$upload_path = 'uploads/driver/other_docs3/';

						$docs_field='d_other_docs3';

					}

					if(empty($this->General_data->uploadImage2($upload_path,$driver_detail->id,'RCD','driver_detail',$docs_field,'doc_image')))
					{
						$driver_detail=$this->db->get_where('driver_detail',array('id'=>$driver_detail->id))->row();

						$response=array('success'=>'success','message'=>'Successfully Updated', 'driver_detail'=>$driver_detail);
					}
					else
					{
						$response=array('success'=>'error', 'message'=>"Not uploaded. try again..");
					}


				}else{

					$response=array('success'=>'error', 'message'=>'Invalid driver ID');

				}

				

			}else{

				$response=array('success'=>'error','message'=>'Parameter Missing');

			}

			echo json_encode($response);

		}

	

	}

	public function DeleteDriver()

	{

		

		date_default_timezone_set('Asia/Kolkata');

		

		if(isset($_POST['driver_id'])){

			

			$driver_detail=$this->db->get_where('driver_detail',array('id' => $_POST['driver_id']))->row();

			

			if(!empty($driver_detail)){

				

				$this->db->where('id',$_POST['driver_id']);

				$this->db->delete('driver_detail');

				

				if(!empty($driver_detail->d_profile_pic)){

					unlink(realpath('uploads/driver/profile_pic/'.$driver_detail->d_profile_pic));

				}

				if(!empty($driver_detail->d_driving_lic_front)){

					unlink(realpath('uploads/driver/driving_lic_front/'.$driver_detail->d_driving_lic_front));

				}

				if(!empty($driver_detail->d_driving_lic_back)){

					unlink(realpath('uploads/driver/driving_lic_back/'.$driver_detail->d_driving_lic_back));

				}

				if(!empty($driver_detail->d_other_docs1)){

					unlink(realpath('uploads/driver/other_docs1/'.$driver_detail->d_other_docs1));

				}

				if(!empty($driver_detail->d_other_docs2)){

					unlink(realpath('uploads/driver/other_docs2/'.$driver_detail->d_other_docs2));

				}

				if(!empty($driver_detail->d_other_docs3)){

					unlink(realpath('uploads/driver/other_docs3/'.$driver_detail->d_other_docs3));

				}

				

				

				$response=array('success'=>'success','message'=>'Successfully Deleted');

				

			}else{

				$response=array('success'=>'error', 'message'=>'Invalid Driver ID');

			}

		}else{

			$response=array('success'=>'error','message'=>'Parameter Missing');

		}

		echo json_encode($response);

	

	}

	public function AddVehicle()

	{

		

		date_default_timezone_set('Asia/Kolkata');

		

		if(isset($_POST['vehicle_category_id']) && isset($_POST['vehicle_type_id']) && isset($_POST['insurance_expire_date']) && isset($_POST['register_no']) && isset($_POST['agent_id'])){

			

			$agent_detail=$this->db->get_where('agent_detail',array('id'=>$_POST['agent_id']))->row();

			

			if(!empty($agent_detail)){

		

				$vehicle_register_no=$this->db->get_where('vehicle_list',array('v_register_no' => $_POST['register_no']))->row();

			

				if(empty($vehicle_register_no)){

					

						

					$array= array(

					

							'agent_id' => $_POST['agent_id'],

							'vehicle_category_id' => $_POST['vehicle_category_id'],

							'vehicle_detail_id' => $_POST['vehicle_type_id'],

							'v_insurance_expire_date' => date('Y-m-d',strtotime($_POST['insurance_expire_date'])),

							'v_register_no' => $_POST['register_no'],

							'v_reg_date' => date('Y-m-d'),

							'v_reg_time' => date('H:i:s'),
							'v_status' => 0, 

							'v_created_type' => 1,

							'v_created_by' => $_POST['agent_id'],

							'v_created_datetime' => date('Y-m-d H:i:s')

										

							

					);

					

					$this->db->insert('vehicle_list',$array);

					$get_last_id=$this->db->insert_id();

					$this->General_data->update_id('vehicle_list','RCV','vehicle_id');

						

						

					$vehicle_detail=$this->db->get_where('vehicle_list',array('id'=>$get_last_id))->row();

						

					$response=array('success'=>'success','message'=>'Successfully Created', 'vehicle_detail'=>$vehicle_detail);

					

					

					

				}else{

					$response=array('success'=>'error', 'message'=>'Vehicle Register No. already exist');

				}

			}else{

					$response=array('success'=>'error', 'message'=>'Invalid agent ID');

			}

		}else{

			$response=array('success'=>'error','message'=>'Parameter Missing');

		}

		echo json_encode($response);

	

	}

	public function VehicleList()

	{

		

		date_default_timezone_set('Asia/Kolkata');

		

		if(isset($_POST['agent_id'])){

			

			$agent_detail=$this->db->get_where('agent_detail',array('id'=>$_POST['agent_id']))->row();

			

			if(!empty($agent_detail)){

		

				$vehicle_list=$this->db->order_by('id','desc')->get_where('vehicle_list',array('agent_id' => $_POST['agent_id']))->result();

				

				$data=array();

				$i=1;

				

				foreach($vehicle_list as $row){

				

					$data[$i]=$row;

					

					$data[$i]->vehicle_category_name='';

					$vehicle_category=$this->db->get_where('vehicle_category_detail',array('id'=>$row->vehicle_category_id))->row();

					if(!empty($row->vehicle_category_id) && !empty($vehicle_category)){

						$data[$i]->vehicle_category_name=$vehicle_category->category_name;

					}

					$data[$i]->vehicle_detail_name='';

					$vehicle_detail=$this->db->get_where('vehicle_detail',array('id'=>$row->vehicle_detail_id))->row();

					if(!empty($row->vehicle_detail_id) && !empty($vehicle_detail)){

						$data[$i]->vehicle_detail_name=$vehicle_detail->v_name;

					}

					

					$data[$i]->v_profile_pic_path='';

					if(!empty($row->v_profile_pic)){

						$data[$i]->v_profile_pic_path=base_url().'uploads/vehicle/profile_pic/'.$row->v_profile_pic;

					}

					$data[$i]->v_insurance_path='';

					if(!empty($row->v_insurance)){

						$data[$i]->v_insurance_path=base_url().'uploads/vehicle/insurance/'.$row->v_insurance;

					}

					$data[$i]->v_other_docs1_path='';

					if(!empty($row->v_other_docs1)){

						$data[$i]->v_other_docs1_path=base_url().'uploads/vehicle/other_docs1/'.$row->v_other_docs1;

					}

					$data[$i]->v_other_docs2_path='';

					if(!empty($row->v_other_docs2)){

						$data[$i]->v_other_docs2_path=base_url().'uploads/vehicle/other_docs2/'.$row->v_other_docs2;

					}

					$data[$i]->v_other_docs3_path='';

					if(!empty($row->v_other_docs3)){

						$data[$i]->v_other_docs3_path=base_url().'uploads/vehicle/other_docs3/'.$row->v_other_docs3;

					}

					

					$i++;

				}

			

				

						

				$response=array('success'=>'success','message'=>'Successfully Get data', 'total'=>count($data), 'vehicle_list'=>$data);

				

			}else{

					$response=array('success'=>'error', 'message'=>'Invalid agent ID');

			}

		}else{

			$response=array('success'=>'error','message'=>'Parameter Missing');

		}

		echo json_encode($response);

	

	}

	public function VehicleDetail()

	{

		

		date_default_timezone_set('Asia/Kolkata');

		

		if(isset($_POST['vehicle_id'])){

			

			$vehicle_list=$this->db->get_where('vehicle_list',array('id' => $_POST['vehicle_id']))->row();

			

			if(!empty($vehicle_list)){

			

				$vehicle_list->vehicle_category_name='';

				$vehicle_category=$this->db->get_where('vehicle_category_detail',array('id'=>$vehicle_list->vehicle_category_id))->row();

				if(!empty($vehicle_list->vehicle_category_id) && !empty($vehicle_category)){

					$vehicle_list->vehicle_category_name=$vehicle_category->category_name;

				}

				$vehicle_list->vehicle_detail_name='';

				$vehicle_detail=$this->db->get_where('vehicle_detail',array('id'=>$vehicle_list->vehicle_detail_id))->row();

				if(!empty($vehicle_list->vehicle_detail_id) && !empty($vehicle_detail)){

					$vehicle_list->vehicle_detail_name=$vehicle_detail->v_name;

				}

				

				

				$vehicle_list->v_profile_pic_path='';

				if(!empty($vehicle_list->v_profile_pic)){

					$vehicle_list->v_profile_pic_path=base_url().'uploads/vehicle/profile_pic/'.$vehicle_list->v_profile_pic;

				}

				$vehicle_list->v_insurance_path='';

				if(!empty($vehicle_list->v_insurance)){

					$vehicle_list->v_insurance_path=base_url().'uploads/vehicle/insurance/'.$vehicle_list->v_insurance;

				}

				$vehicle_list->v_other_docs1_path='';

				if(!empty($vehicle_list->v_other_docs1)){

					$vehicle_list->v_other_docs1_path=base_url().'uploads/vehicle/other_docs1/'.$vehicle_list->v_other_docs1;

				}

				$vehicle_list->v_other_docs2_path='';

				if(!empty($vehicle_list->v_other_docs2)){

					$vehicle_list->v_other_docs2_path=base_url().'uploads/vehicle/other_docs2/'.$vehicle_list->v_other_docs2;

				}

				$vehicle_list->v_other_docs3_path='';

				if(!empty($vehicle_list->v_other_docs3)){

					$vehicle_list->v_other_docs3_path=base_url().'uploads/vehicle/other_docs3/'.$vehicle_list->v_other_docs3;

				}

				

				$response=array('success'=>'success','message'=>'Successfully Get Vehicle Detail', 'vehicle_detail'=>$vehicle_list);

				

			}else{

				$response=array('success'=>'error', 'message'=>'Invalid Vehicle ID');

			}

		}else{

			$response=array('success'=>'error','message'=>'Parameter Missing');

		}

		echo json_encode($response);

	

	}

	public function EditVehicle()

	{

		

		date_default_timezone_set('Asia/Kolkata');

		

		if(isset($_POST['vehicle_id']) && isset($_POST['vehicle_category_id']) && isset($_POST['vehicle_type_id']) && isset($_POST['insurance_expire_date']) && isset($_POST['register_no']) && isset($_POST['agent_id'])){

			

			$agent_detail=$this->db->get_where('agent_detail',array('id'=>$_POST['agent_id']))->row();

			

			if(!empty($agent_detail)){

			

				$vehicle_list=$this->db->get_where('vehicle_list',array('id' => $_POST['vehicle_id']))->row();

			

				if(!empty($vehicle_list)){

		

					$vehicle_register_no=$this->db->get_where('vehicle_list',array('id!='=>$_POST['vehicle_id'], 'v_register_no' => $_POST['register_no']))->row();

			

					if(empty($vehicle_register_no)){

						

							

						$array= array(

						

								'agent_id' => $_POST['agent_id'],

								'vehicle_category_id' => $_POST['vehicle_category_id'],

								'vehicle_detail_id' => $_POST['vehicle_type_id'],

								'v_insurance_expire_date' => date('Y-m-d',strtotime($_POST['insurance_expire_date'])),

								'v_register_no' => $_POST['register_no'],

								'v_reg_date' => date('Y-m-d'),

								'v_reg_time' => date('H:i:s'),

								'v_updated_type' => 1,

								'v_updated_by' => $_POST['agent_id'],

								'v_updated_datetime' => date('Y-m-d H:i:s')

											

								

						);

						

						$this->db->where('id',$_POST['vehicle_id']);

						$this->db->update('vehicle_list',$array);

							

							

						$vehicle_list=$this->db->get_where('vehicle_list',array('id' => $_POST['vehicle_id']))->row();

			

						$vehicle_list->v_profile_pic_path='';

						if(!empty($vehicle_list->v_profile_pic)){

							$vehicle_list->v_profile_pic_path=base_url().'uploads/vehicle/profile_pic/'.$vehicle_list->v_profile_pic;

						}

						$vehicle_list->v_insurance_path='';

						if(!empty($vehicle_list->v_insurance)){

							$vehicle_list->v_insurance_path=base_url().'uploads/vehicle/insurance/'.$vehicle_list->v_insurance;

						}

						$vehicle_list->v_other_docs1_path='';

						if(!empty($vehicle_list->v_other_docs1)){

							$vehicle_list->v_other_docs1_path=base_url().'uploads/vehicle/other_docs1/'.$vehicle_list->v_other_docs1;

						}

						$vehicle_list->v_other_docs2_path='';

						if(!empty($vehicle_list->v_other_docs2)){

							$vehicle_list->v_other_docs2_path=base_url().'uploads/vehicle/other_docs2/'.$vehicle_list->v_other_docs2;

						}

						$vehicle_list->v_other_docs3_path='';

						if(!empty($vehicle_list->v_other_docs3)){

							$vehicle_list->v_other_docs3_path=base_url().'uploads/vehicle/other_docs3/'.$vehicle_list->v_other_docs3;

						}			

							

						$response=array('success'=>'success','message'=>'Successfully Updated', 'vehicle_detail'=>$vehicle_list);

						

						

						

					}else{

						$response=array('success'=>'error', 'message'=>'Vehicle Register No. already exist');

					}

				}else{

					$response=array('success'=>'error', 'message'=>'Invalid Vehicle ID');

				}

			}else{

					$response=array('success'=>'error', 'message'=>'Invalid agent ID');

			}

		}else{

			$response=array('success'=>'error','message'=>'Parameter Missing');

		}

		echo json_encode($response);

	

	}

	public function VehicleEditDOCS()

	{
		if($_SERVER['REQUEST_METHOD']=='POST'){

			//checking the required parameters from the request 

			if(isset($_POST['vehicle_id']) && isset($_FILES['doc_image']) && isset($_POST['doc_type'])){				
				
				$vehicle_id = $_POST['vehicle_id'];
				$vehicle_list=$this->db->get_where('vehicle_list',array('id'=>$vehicle_id))->row();
				$docs_type=$_POST['doc_type'];

				if(!empty($vehicle_list)){
					if($docs_type==1)
					{

						$upload_path = 'uploads/vehicle/profile_pic/';

						$docs_field='v_profile_pic';

					}

					else if($docs_type==2)
					{

						$upload_path = 'uploads/vehicle/insurance/';

						$docs_field='v_insurance';

					}

					else if($docs_type==3)
					{

						$upload_path = 'uploads/vehicle/other_docs1/';

						$docs_field='v_other_docs1';

					}

					else if($docs_type==4)

					{

						$upload_path = 'uploads/vehicle/other_docs2/';

						$docs_field='v_other_docs2';

					}

					else if($docs_type==5)

					{

						$upload_path = 'uploads/vehicle/other_docs3/';

						$docs_field='v_other_docs3';

					}

					if(empty($this->General_data->uploadImage2($upload_path,$vehicle_list->id,'RCD','vehicle_list',$docs_field,'doc_image')))
					{
						$vehicle_list=$this->db->get_where('vehicle_list',array('id'=>$vehicle_id))->row();

						$response=array('success'=>'success','message'=>'Successfully Updated', 'vehicle_detail'=>$vehicle_list);
					}
					else
					{
						$response=array('success'=>'error', 'message'=>"Not uploaded. try again..");
					}


				}else{

					$response=array('success'=>'error', 'message'=>'Invalid Vehicle ID');

				}

				

			}else{

				$response=array('success'=>'error','message'=>'Parameter Missing');

			}

			echo json_encode($response);

		}

	

	}

	public function DeleteVehicle()

	{

		

		date_default_timezone_set('Asia/Kolkata');

		

		if(isset($_POST['vehicle_id'])){

			

			$vehicle_list=$this->db->get_where('vehicle_list',array('id'=>$_POST['vehicle_id']))->row();

			

			if(!empty($vehicle_list)){

				

				$this->db->where('id',$_POST['vehicle_id']);

				$this->db->delete('vehicle_list');

				

				if(!empty($vehicle_list->v_profile_pic)){

					unlink(realpath('uploads/vehicle/profile_pic/'.$vehicle_list->v_profile_pic));

				}

				if(!empty($vehicle_list->v_insurance)){

					unlink(realpath('uploads/vehicle/insurance/'.$vehicle_list->v_insurance));

				}

				if(!empty($vehicle_list->v_other_docs1)){

					unlink(realpath('uploads/vehicle/other_docs1/'.$vehicle_list->v_other_docs1));

				}

				if(!empty($vehicle_list->v_other_docs2)){

					unlink(realpath('uploads/vehicle/other_docs2/'.$vehicle_list->v_other_docs2));

				}

				if(!empty($vehicle_list->v_other_docs3)){

					unlink(realpath('uploads/vehicle/other_docs3/'.$vehicle_list->v_other_docs3));

				}

				

				$response=array('success'=>'success','message'=>'Successfully Deleted');

				

			}else{

				$response=array('success'=>'error', 'message'=>'Invalid Vehicle ID');

			}

		}else{

			$response=array('success'=>'error','message'=>'Parameter Missing');

		}

		echo json_encode($response);

	

	}

	public function TripList(){

	

		date_default_timezone_set('Asia/Kolkata');

		

		if(isset($_POST['agent_id'])){

		

			$agent_detail=$this->db->get_where('agent_detail',array('id'=>$_POST['agent_id']))->row();

			

			if(!empty($agent_detail)){

		

				$data=array();

				$i=1;

				$total=0;

				

				$this->db->select('booking_list.*,package_type.package_sub_type,package_type.package_type,city_detail.c_name,payment_type.payment_name');

				$this->db->from('booking_list');

				$this->db->join('package_type','package_type.id=booking_list.b_type');

				$this->db->join('city_detail','city_detail.id=booking_list.b_from_city');

				$this->db->join('payment_type','payment_type.id=booking_list.b_payment_type');

				$this->db->where('booking_list.b_agent_id',$_POST['agent_id']);
				
				//$this->db->order_by('booking_list.b_from_date','DESC');
				
				$this->db->order_by('booking_list.id','DESC');

				$booking__list = $this->db->get()->result();

				foreach($booking__list as $b){

				

					$data[$i]=$b;

					$data[$i]->b_route = $b->c_name;


					if(($b->b_type == '3') || ($b->b_type == '4'))

					{

						$data[$i]->b_route = $b->c_name." - ".$b->b_to_city;

					}

					

					if($b->b_type == '1' || $b->b_type == '2')

					{

						$to_city = $this->db->get_where('city_detail',array('id'=>$b->b_to_city))->row()->c_name;

						$data[$i]->b_route = $b->c_name." - ".$to_city;

					}

					

					$data[$i]->vehicle_category_name='';

					$vehicle_category=$this->db->get_where('vehicle_category_detail',array('id'=>$b->b_vc_category_id))->row();

					if(!empty($b->b_vc_category_id) && !empty($vehicle_category)){

						$data[$i]->vehicle_category_name=$vehicle_category->category_name;

					}
					
					$description = $this->db->get_where('vehicle_category_detail',array('id'=>$b->b_vc_id))->row()->description;
					$data[$i]->description='';
				
					if($description){
						$data[$i]->description = $description;
					}

					$data[$i]->vehicle_detail_name='';

					$vehicle_detail=$this->db->get_where('vehicle_detail',array('id'=>$b->b_vehicle_id))->row();

					if(!empty($b->b_vehicle_id) && !empty($vehicle_detail)){

						$data[$i]->vehicle_detail_name=$vehicle_detail->v_name;

					}

					

					$rent_card_details_data = $this->db->get_where('rent_cards',array('id'=>$b->b_rent_card_id))->row();

					

					$data[$i]->r_return_date='';

					$data[$i]->r_return_time='';

					if(!empty($rent_card_details_data)){

						$data[$i]->r_return_date=$rent_card_details_data->r_return_date;

						$data[$i]->r_return_time=$rent_card_details_data->r_return_time;

					}
					
					$rent_card = $this->db->get_where('rent_cards',array('id'=>$b->b_rent_card_id))->row();
					$data[$i]->rent_card=array();
					
					if(!empty($rent_card)){
						$data[$i]->rent_card=$rent_card;
					}
					
					

					

					if($b->b_invoice_id!=0)

					{

						$invoice = $this->db->get_where('invoice',array('id'=>$b->b_invoice_id))->row();

						$data[$i]->invoice_detail = $invoice;

					}

					else

					{

						$data[$i]->invoice_detail = "";

						

					}

					

					

					//$total=$i;

					$i++;

					

				}

				

				$response=array('success'=>'success' ,'message'=>'Successfully Get Trip List','total'=>count($data), 'trip_list'=>$data);

			}else{

				$response=array('success'=>'error','message'=>'Invalid Agent Id');

			}

			

		}else{

			$response=array('success'=>'error','message'=>'Parameter Missing');

		}

		echo json_encode($response);

	}

	

	public function TripDetails(){

		date_default_timezone_set('Asia/Kolkata');

		if(isset($_POST['booking_id'])){			

			$this->db->select('booking_list.*,package_type.package_sub_type,package_type.package_type,city_detail.c_name,payment_type.payment_name, passenger_list.p_full_name passenger_name, p_contact passenger_contact');

			$this->db->from('booking_list');

			$this->db->join('package_type','package_type.id=booking_list.b_type');

			$this->db->join('city_detail','city_detail.id=booking_list.b_from_city');

			$this->db->join('payment_type','payment_type.id=booking_list.b_payment_type');

			$this->db->join('passenger_list','passenger_list.id = booking_list.b_p_id');

			$this->db->where('booking_list.id',$_POST['booking_id']);

			$b = $this->db->get()->row();
			/* ashish -19/7/19
			if($b->package_sub_type == "LOCAL" || $b->package_sub_type=="ONEWAY") {

				$b->minimum_km =$b->b_pk_min_km." Km";
			}
			else
			{

				$pickup_dateTime = date($b->b_from_date.' '.$b->b_from_time);

				$date1 = new DateTime($pickup_dateTime);

				$date2 = new DateTime();

				$diff = $date2->diff($date1) ;
				
				// added by ashish-16/7/19.
				if($b->package_type == "LOCAL" || $b->package_sub_type=="ONEWAY" || $b->package_sub_type=="ONEWAY OFFER") {
					$b->minimum_km = $b->b_pk_min_km ." KM";
				}
				else
				{
					$b->minimum_km = $b->b_pk_min_km ." KM (".$b->b_pk_min_km." Km X ".($diff->d)." days)";
				}
				//$b->minimum_km = $b->b_pk_min_km ." KM (".$b->b_pk_min_km." Km X ".($diff->d)." days)";
			}*/
			if($b->package_type == "LOCAL" || $b->package_sub_type=="ONEWAY" || $b->package_sub_type=="ONEWAY OFFER") {

				$b->minimum_km = $b->b_pk_min_km." Km";
			}
			else
			{
				$date1=date_create($b->b_from_date);
				$date2=date_create($b->b_to_date);
				$diff=date_diff($date1,$date2);
				
				if($diff->d <= 0)
				{
					$diff->d = 1;
				}
				
				$b->minimum_km = ($b->b_pk_min_km * ($diff->d + 1)) ." KM (".$b->b_pk_min_km." Km X ".($diff->d + 1)." days)";
				
			}
			

			$data=$b;
			
			$gstno = $this->db->get_where('passenger_list',array('id'=>$b->b_p_id))->row()->p_gst_number;
			$data->gst_no = "N/A";
			
			if($gstno){
				$data->gst_no = $gstno;
			}

			$data->b_route = $b->c_name;

			if(($b->b_type == '3') || ($b->b_type == '4'))

			{

			    $data->b_route = $b->c_name." - ".$b->b_to_city;

			}

				

			if($b->b_type == '1' || $b->b_type == '2')

			{

			    $to_city = $this->db->get_where('city_detail',array('id'=>$b->b_to_city))->row()->c_name;

				$data->b_route = $b->c_name." - ".$to_city;

			}

			$data->vehicle_category_name='';

			$vehicle_category=$this->db->get_where('vehicle_category_detail',array('id'=>$b->b_vc_category_id))->row();

			if(!empty($b->b_vc_category_id) && !empty($vehicle_category)){

				$data->vehicle_category_name=$vehicle_category->category_name;

			}
			
			$description = $this->db->get_where('vehicle_category_detail',array('id'=>$b->b_vc_id))->row()->description;
			$data->description='';
				
			if($description){
				$data->description = $description;
			}
			
			$data->vehicle_detail_name='';

			$vehicle_detail=$this->db->get_where('vehicle_detail',array('id'=>$b->b_vehicle_id))->row();

			if(!empty($b->b_vehicle_id) && !empty($vehicle_detail)){

				$data->vehicle_detail_name=$vehicle_detail->v_name;

			}

			

			$rent_card_details_data = $this->db->get_where('rent_cards',array('id'=>$b->b_rent_card_id))->row();

					

			$data->r_return_date='';

			$data->r_return_time='';

			if(!empty($rent_card_details_data)){

				$data->r_return_date=$rent_card_details_data->r_return_date;

				$data->r_return_time=$rent_card_details_data->r_return_time;

			}
			
			$rent_card = $this->db->get_where('rent_cards',array('id'=>$b->b_rent_card_id))->row();
			$data->rent_card=array();
			
			if(!empty($rent_card)){
				$data->rent_card=$rent_card;
			}

				

			if($b->b_invoice_id!=0)

			{

				$invoice = $this->db->get_where('invoice',array('id'=>$b->b_invoice_id))->row();

				$data->invoice_detail = $invoice;

				

				$invoice_data=array();


				if($invoice->type=="LOCAL" || $invoice->sub_type=="ONEWAY") {

					$min_km = $invoice->min_km;

					$invoice_data['minimum_km_name']="MINIMUM KM (".$min_km." Km)"; 
					$min_km_rate = $invoice->base_price; 

				}else{

					$min_km = $invoice->min_km * $invoice->total_days;

					$invoice_data['minimum_km_name']="MINIMUM KM (".number_format($min_km)." x ".$invoice->rate_per_km." Km)";

					$min_km_rate = ($invoice->min_km * $invoice->total_days) * $invoice->rate_per_km; 

					//echo number_format($min_km_rate);

				}

				

				 

				$invoice_data['minimum_km_value'] = number_format($min_km_rate);

				

				if($min_km < $invoice->extra_km) {

					$extra_km = $invoice->extra_km - $min_km;

					$invoice_data['extra_km_name']="EXTRA KM (".$extra_km." x ".$invoice->rate_per_km.")";

					$extra_km_rate = $extra_km * $invoice->rate_per_km;

					$invoice_data['extra_km_value']=number_format($extra_km_rate);

				}else{

					$invoice_data['extra_km_name']="EXTRA KM";

					$extra_km_rate = 0;

					$invoice_data['extra_km_value']='N/A';

				}

				

					

				if(($invoice->type=="LOCAL" || $invoice->sub_type=="ONEWAY" || $invoice->sub_type=="ONEWAY OFFER") && $invoice->min_hr < $invoice->extra_hr) {

					$extra_hr = $invoice->extra_hr - $invoice->min_hr;

					$invoice_data['extra_hour_name']="EXTRA HOUR (".$extra_hr." x ".$invoice->rate_per_hr.")";

					$extra_hr_rate = $extra_hr * $invoice->rate_per_hr; 

					$invoice_data['extra_hour_value'] = number_format($extra_hr_rate);

				} else { 

					

					$invoice_data['extra_hour_name']="EXTRA HOUR ";

					$extra_hr_rate = 0;

					$invoice_data['extra_hour_value'] = number_format($extra_hr_rate); 

				

				} 

				

				if($invoice->type=="LOCAL" || $invoice->sub_type=="ONEWAY") {

					$invoice_data['driver_allowance_name']="DRIVER ALLOWANCE";

					$driver_allow = $invoice->driver_allowance=0; 

					$invoice_data['driver_allowance_value'] = "N/A";

				}else{

					$invoice_data['driver_allowance_name']="DRIVER ALLOWANCE";

					if($invoice->driver_allowance !=0) { 

						$driver_allow = $invoice->driver_allowance * $invoice->total_days; 

						$invoice_data['driver_allowance_value'] = number_format($driver_allow);

					} else { 

						$driver_allow = $invoice->driver_allowance=0; 

						$invoice_data['driver_allowance_value'] = "N/A";

					}

				}

				

				

				

				$night_charge_name ="NIGHT CHARGE";

				

				if($invoice->night_charge!=0 && $invoice->drop_night_charge != 0) {

					$night_charge_name .= "( PICKUP + DROP )";

				}else if($invoice->night_charge!=0){

					$night_charge_name .= "( PICKUP )";

				}else if($invoice->drop_night_charge!=0){

					$night_charge_name .= "( DROP )";

				}

				$invoice_data['night_charge_name']=$night_charge_name;

				

				if($night_charge = $invoice->night_charge==0 && $invoice->drop_night_charge == 0) {

					 $invoice_data['night_charge_value']="N/A"; 

					 $night_charge=0;$drop_night_charge=0;

				} else {

					$night_charge = $invoice->night_charge;  

					$drop_night_charge = $invoice->drop_night_charge; 

					$invoice_data['night_charge_value']= $invoice->night_charge+$invoice->drop_night_charge; 

				}

				

				$invoice_data['other_charge_name']="OTHER CHARGE";

				if($invoice->other_charge !=0){ 

					$other_charge = $invoice->other_charge; 

					$invoice_data['other_charge_value']=$other_charge;

				}else{ 

					$other_charge = $invoice->other_charge = 0 ; 

					$invoice_data['other_charge_value']='N/A';

				}

				

				$invoice_data['discount_name']="Discount";

				if($invoice->discount!=0){ 

					$invoice_data['discount_value'] = $invoice->discount;

				} else { 

					$invoice_data['discount_value'] =  "N/A"; 

					$invoice->discount=0; 

				}

				

				$tax_value = explode(',',$invoice->tax_value);

				$tax_percentage = explode(',',$invoice->tax_percentage);

				$tax_name = explode(',',$invoice->tax_name); 

			

				

				if($invoice->tax_name != "" || $invoice->tax_name != 0 )

				{

					$j=1;

					$invoice_data['tot_tax']=count($tax_value);

					for($i=0; $i<sizeof($tax_value); $i++) 

					{

						$invoice_data['tax'][$j]['tax_name'] = $tax_name[$i]."  ".round($tax_percentage[$i],2)."%";

						$invoice_data['tax'][$j]['tax_value'] = round($tax_value[$i],2);

						$j++;

					}  

				}

				

				$invoice_data['total_base_fare_name']="TOTAL BASE FARE";

				

				$tax_value = explode(',',$invoice->tax_value);

				$i=0;

				foreach($tax_value as $tv)

				{

					$i = $i + $tv;

				}

									 

				$fare_amount =  $min_km_rate + $extra_km_rate + $extra_hr_rate - $invoice->discount	+ $i + $drop_night_charge + $driver_allow + $night_charge + $other_charge;

				$invoice_data['total_base_fare_value']=number_format($fare_amount);	 

				

				$invoice_data['toll_charge_name']="TOLL CHARGE";

				if($toll_charge = $invoice->toll_charge==0) {

					$invoice_data['toll_charge_value']= "N/A";

					$toll_charge=0;

				} else {

					$toll_charge = $invoice->toll_charge;

					$invoice_data['toll_charge_value']=$invoice->toll_charge;

				}

				

				$invoice_data['parking_charge_name']="PARKING CHARGE";

				if($parking_charge = $invoice->parking_charge==0) {

					$invoice_data['parking_charge_value']= "N/A";

					$parking_charge=0;

				} else {

					$parking_charge = $invoice->parking_charge;

					$invoice_data['parking_charge_value']=$parking_charge;

				}

				

				$invoice_data['border_tax_name']="BORDER TAX ";

				if($invoice->border_tax !=0){ 

					$border_tax = $invoice->border_tax ; 

					$invoice_data['border_tax_value']=$border_tax;

				} else {

					$border_tax = $invoice->border_tax ; 

					$invoice_data['border_tax_value']='N/A';

				} 

				

				$invoice_data['total_other_charage_name']="TOTAL OTHER CHARGES";

				

				$other_charges =  $toll_charge +  $parking_charge + $border_tax ; 

				$invoice_data['total_other_charage_value'] = number_format($other_charges);

				

				$grand_total = $fare_amount+$other_charges;

				$invoice_data['grand_total']= number_format($grand_total);

				

				$invoice_data['advance']= 0;

				if( ($invoice->advance_pay + round($invoice->paid_amount,2))!=$grand_total) { 

					$advanced = $invoice->advance_pay + round($invoice->paid_amount,2); 

					$invoice_data['advance']=  number_format($advanced);

				}

				

				$advanced = $invoice->advance_pay + round($invoice->paid_amount,2);

				

				$invoice_data['total_due']= 0;

				$invoice_data['extra_discount']= 0;

				if($grand_total-$advanced) { 

					if($invoice->balance != 0) {

						$invoice_data['total_due']= number_format($grand_total-$advanced); 

					} else { 

				 		$invoice_data['extra_discount']=number_format($grand_total-$advanced); 

					}	

				}

				$data->invoice_data=$invoice_data;

				

				

			}

			else

			{

				$data->invoice_detail = "";

				$data->invoice_data = "";

				

			}

				

			$response=array('success'=>'success' ,'message'=>'Successfully Get Trip Details', 'trip_details'=>$data);

		}else{

			$response=array('success'=>'error','message'=>'Parameter Missing');

		}

		echo json_encode($response);

	}

	public function VehicleCategoryListForCabAssign(){

	

		date_default_timezone_set('Asia/Kolkata');

		

		if(isset($_POST['agent_id'])){

		

			$agent_detail=$this->db->get_where('agent_detail',array('id'=>$_POST['agent_id']))->row();

			

			if(!empty($agent_detail)){

			

				$this->db->select('vehicle_category_detail.*');

				$this->db->from('vehicle_category_detail');

				$this->db->join('vehicle_list','vehicle_list.vehicle_category_id=vehicle_category_detail.id');

				$this->db->where(array('vehicle_list.agent_id'=>$_POST['agent_id']));

				$this->db->group_by('vehicle_list.vehicle_category_id');

				$vehicle_category_detail=$this->db->get()->result();

				

				//echo "<pre>";print_r($vehicle_category_detail);echo "</pre>";exit;

				

				$data=array();

				$i=1;

				$total=0;

				foreach($vehicle_category_detail as $row)

				{

					

					$data[$i]=$row;

					

					$i++;

				}

				

		

				

				

				$response=array('success'=>'success' ,'message'=>'Successfully Get Vehicle Category List', 'total'=>count($data), 'vehicle_category_list'=>$data);

			}else{

				$response=array('success'=>'error','message'=>'Invalid Agent Id');

			}

			

		}else{

			$response=array('success'=>'error','message'=>'Parameter Missing');

		}

		echo json_encode($response);

	}

	public function VehicleListForCabAssign(){

	

		date_default_timezone_set('Asia/Kolkata');

		

		if(isset($_POST['agent_id']) && isset($_POST['vehicle_category_id'])){

		

			$agent_detail=$this->db->get_where('agent_detail',array('id'=>$_POST['agent_id']))->row();

			

			if(!empty($agent_detail)){

			

				$this->db->select('vehicle_detail.*,vehicle_list.id as vehicle_list_id, vehicle_list.v_register_no, vehicle_list.v_status vehicle_status');

				$this->db->from('vehicle_detail');

				$this->db->join('vehicle_list','vehicle_list.vehicle_detail_id=vehicle_detail.id');

				$this->db->where(array('vehicle_detail.v_category_id'=>$_POST['vehicle_category_id'], 'vehicle_list.agent_id'=>$_POST['agent_id']));

				//$this->db->group_by('vehicle_list.vehicle_category_id');

				$vehicle_detail=$this->db->get()->result();

				

				

				

				$data=array();

				$i=1;

				$total=0;

				foreach($vehicle_detail as $row)
				{

					$data[$i]=$row;

					$i++;

				}
				

				$response=array('success'=>'success' ,'message'=>'Successfully Get Vehicle List', 'total'=>count($data), 'vehicle_list'=>$data);

			}else{

				$response=array('success'=>'error','message'=>'Invalid Agent Id');

			}

			

		}else{

			$response=array('success'=>'error','message'=>'Parameter Missing');

		}

		echo json_encode($response);

	}

	public function DriverListForDriverAssign(){

	

		date_default_timezone_set('Asia/Kolkata');

		

		if(isset($_POST['agent_id'])){

		

			$agent_detail=$this->db->get_where('agent_detail',array('id'=>$_POST['agent_id']))->row();

			

			if(!empty($agent_detail)){

			

				$driver_detail = $this->db->get_where('driver_detail',array('agent_id'=>$_POST['agent_id']))->result();

				//echo "<pre>";print_r($vehicle_category_detail);echo "</pre>";exit;

				

				$data=array();

				$i=1;

				$total=0;

				foreach($driver_detail as $row)

				{

					

					$data[$i]=$row;

					

					$i++;

				}

				

		

				

				

				$response=array('success'=>'success' ,'message'=>'Successfully Get Driver List', 'total'=>count($data), 'driver_list'=>$data);

			}else{

				$response=array('success'=>'error','message'=>'Invalid Agent Id');

			}

			

		}else{

			$response=array('success'=>'error','message'=>'Parameter Missing');

		}

		echo json_encode($response);

	}

	public function AssignDriverCab(){

	

		date_default_timezone_set('Asia/Kolkata');

		

		if(isset($_POST['agent_id']) && isset($_POST['vehicle_category_id']) && isset($_POST['vehicle_id']) && isset($_POST['driver_name']) && isset($_POST['driver_contact']) && isset($_POST['vehicle_number']) && isset($_POST['driver_id']) && isset($_POST['vehicle_list_id']) && isset($_POST['booking_id'])){

		

			$agent_detail=$this->db->get_where('agent_detail',array('id'=>$_POST['agent_id']))->row();

			

			if(!empty($agent_detail)){

			

				//sms and email

				$this->db->select('booking_list.*,package_type.package_type,package_type.package_sub_type,city_detail.c_name,payment_type.payment_name');

				$this->db->from('booking_list');

				$this->db->join('package_type','package_type.id=booking_list.b_type');

				$this->db->join('city_detail','city_detail.id=booking_list.b_from_city');

				$this->db->join('payment_type','payment_type.id=booking_list.b_payment_type');

				$this->db->where('booking_list.id',$_POST['booking_id']);

				$booking_details = $this->db->get()->row();

				

				if(!empty($booking_details)){

				

					if($booking_details->b_status<=4){

			

						$cab_assign_status=$this->db->get_where('booking_list',array('id'=>$_POST['booking_id']))->row()->b_status;

						$agent_already_assign=$this->db->get_where('booking_list',array('id'=>$_POST['booking_id']))->row()->b_agent_id;

						$vehicle_already_assign=$this->db->get_where('booking_list',array('id'=>$_POST['booking_id']))->row()->b_vehicle_id;

						$driver_already_assign=$this->db->get_where('booking_list',array('id'=>$_POST['booking_id']))->row()->b_assign_driver_id;

								

						$roundtrip_data = array(  'b_agent_id'         =>$_POST['agent_id'],

												  'b_vc_category_id'   =>$_POST['vehicle_category_id'],

												  'b_vehicle_id'       =>$_POST['vehicle_id'],

												  'b_driver_name'      =>$_POST['driver_name'],

												  'b_driver_contact'   =>$_POST['driver_contact'],

												  'b_vehicle_number'   =>$_POST['vehicle_number'],

												  'b_assign_driver_id' =>$_POST['driver_id'],

												  'b_assign_vehicle_id' =>$_POST['vehicle_list_id'],

												  'b_status' 		   =>4,

												  'b_cab_assign_type' =>1,

												  'b_cab_assign_by'	   =>$_POST['agent_id'],

												  'b_assign_date_time' =>date('Y-m-d H:i:s')

											);

						

						if(!empty($_POST['agent_id']) && !empty($_POST['vehicle_category_id']) && !empty($_POST['vehicle_id']) && !empty($_POST['driver_id']) && !empty($_POST['vehicle_list_id']))

						{

							$roundtrip_data['b_status']=4;

						}else if($cab_assign_status!=4){

							$roundtrip_data['b_status']=2;

						}

												  

						// print_r($roundtrip_data);exit;

						$this->db->where('id',$_POST['booking_id']);

						$this->db->update('booking_list',$roundtrip_data);

						

						//sms and email

						$this->db->select('booking_list.*,package_type.package_type,package_type.package_sub_type,city_detail.c_name,payment_type.payment_name');

						$this->db->from('booking_list');

						$this->db->join('package_type','package_type.id=booking_list.b_type');

						$this->db->join('city_detail','city_detail.id=booking_list.b_from_city');

						$this->db->join('payment_type','payment_type.id=booking_list.b_payment_type');

						$this->db->where('booking_list.id',$_POST['booking_id']);

						$booking_details = $this->db->get()->row();

						

						

						

						$this->db->select('vehicle_detail.*,vehicle_category_detail.category_name');

						$this->db->from('vehicle_detail');

						$this->db->join('vehicle_category_detail','vehicle_category_detail.id=vehicle_detail.v_category_id');

						$this->db->where('vehicle_detail.id',$booking_details->b_vehicle_id);

						$vehicle_details = $this->db->get()->row();

						

						$agent_details=$this->db->get_where('agent_detail',array('id'=>$booking_details->b_agent_id))->row();

						

						

						if(!empty($booking_details->b_agent_id) && !empty($booking_details->b_vc_category_id) && !empty($booking_details->b_vehicle_id) && !empty($booking_details->b_assign_driver_id) && !empty($booking_details->b_assign_vehicle_id))

						{

						

							if($vehicle_already_assign!=$booking_details->b_vehicle_id || $driver_already_assign!=$booking_details->b_assign_driver_id){

						

								//to passenger

								$mobile_no = $booking_details->b_p_contact;

								

								//$message = 'Dear '.$booking_details->b_p_name.', Thank you for booking with us Rashmi Cabs your Ref #'.$booking_details->b_id.' Our Driver : '.$booking_details->b_driver_name.' Mobile #'.$booking_details->b_driver_contact.' will pick you up in #'.$vehicle_details->v_name.' plate number #'.$booking_details->b_vehicle_number;

								

								if($cab_assign_status<4){

									

									$message = 'Say Hi to your driver '.$booking_details->b_driver_name.'['.$booking_details->b_driver_contact.'] for '.$booking_details->b_id.'. '.$vehicle_details->v_name.' - '.$booking_details->b_vehicle_number.' to pick up you @'.date('jS M Y',strtotime($booking_details->b_from_date)).', '.date('h:i A',strtotime($booking_details->b_from_time)).'. from '.$booking_details->c_name.'. Call Rashmi Cabs on +91 9974234111 for any help.';

								

								}else{

									

									$message = 'Say Hi to your new driver '.$booking_details->b_driver_name.'['.$booking_details->b_driver_contact.'] for '.$booking_details->b_id.'. '.$vehicle_details->v_name.' - '.$booking_details->b_vehicle_number.' to pick up you @'.date('jS M Y',strtotime($booking_details->b_from_date)).', '.date('h:i A',strtotime($booking_details->b_from_time)).'. from '.$booking_details->c_name.'. Call Rashmi Cabs on +91 9974234111 for any help.';

								

								}

								

								$this->Sms_email->send_sms($mobile_no,$message);

								

								$passenger_details=$this->db->get_where('passenger_list',array('id'=>$booking_details->b_p_id))->row();

								

								if($booking_details->b_self_travel_status != 1)

								{

									$mobile_no_2=$passenger_details->p_contact;

									

									//$message_2 = 'Dear '.$passenger_details->p_full_name.', Thank you for booking with us Rashmi Cabs your Ref #'.$booking_details->b_id.' Our Driver : '.$booking_details->b_driver_name.' Mobile #'.$booking_details->b_driver_contact.' will pick you up in #'.$vehicle_details->v_name.' plate number #'.$booking_details->b_vehicle_number;

									

									if($cab_assign_status<4){

									

										$message_2 = 'Say Hi to your driver '.$booking_details->b_driver_name.'['.$booking_details->b_driver_contact.'] for '.$booking_details->b_id.'. '.$vehicle_details->v_name.' - '.$booking_details->b_vehicle_number.' to pick up you @'.date('jS M Y',strtotime($booking_details->b_from_date)).', '.date('h:i A',strtotime($booking_details->b_from_time)).'. from '.$booking_details->c_name.'. Call Rashmi Cabs on +91 9974234111 for any help.';

									

									}else{

										

										$message_2 = 'Say Hi to your new driver '.$booking_details->b_driver_name.'['.$booking_details->b_driver_contact.'] for '.$booking_details->b_id.'. '.$vehicle_details->v_name.' - '.$booking_details->b_vehicle_number.' to pick up you @'.date('jS M Y',strtotime($booking_details->b_from_date)).', '.date('h:i A',strtotime($booking_details->b_from_time)).'. from '.$booking_details->c_name.'. Call Rashmi Cabs on +91 9974234111 for any help.';

									

									}

									

									$this->Sms_email->send_sms($mobile_no_2,$message_2);

										

								}

								

								//send email

								$to      = $passenger_details->p_email_id;

								$subject = 'Rashmi Cabs';

								

								$data['booking_details']=$booking_details;

								$data['passenger_details']=$passenger_details;

								$data['message']='Thank you for booking with us Rashmi Cabs your Ref #'.$booking_details->b_id.' Our Driver : '.$booking_details->b_driver_name.' Mobile #'.$booking_details->b_driver_contact.' will pick you up in #'.$vehicle_details->v_name.' plate number #'.$booking_details->b_vehicle_number;

								

								$message_mail = $this->load->view('mail_booking_vehicle_driver_assign',$data,true);

								

								$this->Sms_email->send_email($to, $subject, $message_mail);

							}

							

							if($driver_already_assign!=$booking_details->b_assign_driver_id){

								//to driver

								

								$driver_details=$this->db->get_where('driver_detail',array('id'=>$booking_details->b_assign_driver_id))->row();

								

								//send sms

								$driver_mobile_no = $booking_details->b_driver_contact;

								

								//Hello Driver,Passenger:<SOHIL PADHIYAR> <MOBILE NO>,Pickup:<PICKUP ADDRESS>, Time: <PICKUP TIME>. Team Rashmi Cabs.

								//$driver_message = 'Hello '.$booking_details->b_driver_name.', '.$booking_details->b_id.' for Passenger: '.$booking_details->b_p_name.' - '.$booking_details->b_p_contact.' pickup from '.$booking_details->b_pickup_point.', @'.date('jS M Y',strtotime($booking_details->b_from_date)).', '.date('h:i A',strtotime($booking_details->b_from_time)).'. Team Rashmi Cabs.';

								

								//DEAR DRIVER=PLZ CONTACT MT RAHUL 9974586007 FOR YOUR DUTY LOCAL 8/80=PICKUP@PANWADI BHAVNAGAR 7:30 2/2/18===PLS SURE CAR IS CLEAN

								$driver_message = 'DEAR '.$booking_details->b_driver_name.', Plz contact '.$booking_details->b_p_name.' '.$booking_details->b_p_contact.' for your duty '.$booking_details->package_type.' '.$booking_details->package_sub_type.' = Pickup@'.$booking_details->b_pickup_point.' - '.date('jS M Y',strtotime($booking_details->b_from_date)).', '.date('h:i A',strtotime($booking_details->b_from_time)).' === Plz sure car is clean. Team Rashmi Cabs.';

								

								$this->Sms_email->send_sms($driver_mobile_no,$driver_message);	

								

								//send email

								

								/*$to      = $driver_details->d_email_id;

								$subject = 'Rashmi Cabs';

								

								$data['booking_details']=$booking_details;

								$data['passenger_details']=$passenger_details;

								$data['driver_details']=$driver_details;

										

								$message_mail = $this->load->view('mail_booking_vehicle_driver_assign_to_driver',$data,true);

								

								$this->Sms_email->send_email($to, $subject, $message_mail);	*/

							}

						}

						

						//to agent

						

						if($agent_already_assign != $booking_details->b_agent_id){

						

							//sms

							$agent_mobile_no = $agent_details->a_contact_no1;

							

							//DEAR AGENT BOOKING ALERT=CRN1234567=LOCAL 8/80=MR RAHUL=9974586007=PICKUP@PANWADI BHAVNAGAR-7AM=2/3/18==ASSIGN DRIVER & CAR DETAILS SOON AS POSSIBLE

							

							$agent_message = 'Dear '.$agent_details->a_full_name.', Booking alert = '.$booking_details->b_id.' = '.$booking_details->package_type.' '.$booking_details->package_sub_type.' = '.$booking_details->b_p_name.' = '.$booking_details->b_p_contact.' = Pickup@'.$booking_details->b_pickup_point.' - '.date('jS M Y',strtotime($booking_details->b_from_date)).', '.date('h:i A',strtotime($booking_details->b_from_time)).' == Assign driver & car details soon as possible. Team Rashmi Cabs.';

							

							$this->Sms_email->send_sms($agent_mobile_no,$agent_message);	

							

							//send email

							

							$to      = $agent_details->a_email_id;

							$subject = 'Rashmi Cabs';

							

							$data['booking_details']=$booking_details;

							$data['passenger_details']=$passenger_details;

							$data['agent_details']=$agent_details;

									

							$message_mail = $this->load->view('mail_booking_vehicle_driver_assign_to_agent',$data,true);

							

							$this->Sms_email->send_email($to, $subject, $message_mail);

						

						

						}

				

										

						$response=array('success'=>'success' ,'message'=>'Successfully Assign Driver/Cabs');

					}else{

						$response=array('success'=>'error','message'=>'Driver/Cab can not change');

					}

					

				}else{

					$response=array('success'=>'error','message'=>'Invalid Booking Id');

				}

			}else{

				$response=array('success'=>'error','message'=>'Invalid Agent Id');

			}

			

		}else{

			$response=array('success'=>'error','message'=>'Parameter Missing');

		}

		echo json_encode($response);

	}

	public function WalletTransaction(){

	

		date_default_timezone_set('Asia/Kolkata');

		

		if(isset($_POST['agent_id'])){

		

			$agent_detail=$this->db->get_where('agent_detail',array('id'=>$_POST['agent_id']))->row();

			

			if(!empty($agent_detail)){

			

				$wallet_tran=$this->db->order_by('id','desc')->get_where('agent_wallet_transaction',array('awt_agent_id'=>$_POST['agent_id']))->result();

				

				$data=array();

				$i=1;

				$total=0;

				foreach($wallet_tran as $row)

				{

					

					$data[$i]=$row;

					

					$i++;

				}

				

		

				

				

				$response=array('success'=>'success' ,'message'=>'Successfully Agent Transaction List', 'total'=>count($data), 'tran_list'=>$data);

			}else{

				$response=array('success'=>'error','message'=>'Invalid Agent Id');

			}

			

		}else{

			$response=array('success'=>'error','message'=>'Parameter Missing');

		}

		echo json_encode($response);

	}

	public function VehicleCategoryList(){

	

		if(isset($_POST['agent_id'])){

			$agent_detail=$this->db->get_where('agent_detail',array('id'=>$_POST['agent_id']))->row();

		

			if(!empty($agent_detail)){

				$vehicle_category=$this->db->get('vehicle_category_detail')->result();

				

				

				$data=array();

				$i=1;

				$total=0;

				foreach($vehicle_category as $row){

					$data[$i]=$row;

					

					//$total=$i;

					

					$i++;

				}

		

				$response=array('success'=>'success' ,'message'=>'Successfully Get Vehicle Category List','total'=>count($data), 'vehicle_category_list'=>$data);

			}else{

				$response=array('success'=>'error','message'=>'Invalid Agent ID');

			}

			

		}else{

			$response=array('success'=>'error','message'=>'Parameter Missing');

		}

		

		echo json_encode($response);

	}

	public function VehicleTypeList()

	{

		date_default_timezone_set('Asia/Kolkata');

		

		if(isset($_POST['agent_id']) && isset($_POST['vehicle_category_id'])){

		

			$agent_detail=$this->db->get_where('agent_detail',array('id'=>$_POST['agent_id']))->row();

		

			if(!empty($agent_detail)){

		

				$vehicle_detail=$this->db->get_where('vehicle_detail',array('v_category_id'=>$_POST['vehicle_category_id']))->result();

			

				$data=array();

				$i=1;

				$total=0;

				foreach($vehicle_detail as $row){

					$data[$i]=$row;

					

					//$total=$i;

					

					$i++;

				}

				

				$response=array('success'=>'success' ,'message'=>'Successfully Get Vehicle Type List','total'=>count($data), 'vehicle_type_list'=>$data);

			}else{

				$response=array('success'=>'error','message'=>'Invalid Agent ID');

			}

			

		}else{

			$response=array('success'=>'error','message'=>'Parameter Missing');

		}

		echo json_encode($response);

	}

}

