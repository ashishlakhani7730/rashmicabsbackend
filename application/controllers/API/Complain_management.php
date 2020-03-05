<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Complain_management extends CI_Controller 
{
	
	function __construct()
    {
        parent::__construct();
        $this->load->model('General_data');
	    $this->load->model('Sms_email');
	}
	
	 
	public function SendComplain()
	{
		
		date_default_timezone_set('Asia/Kolkata');
		
		if(isset($_POST['passenger_id']) && isset($_POST['booking_id']) && isset($_POST['complain_msg'])){
			
			$get_user=$this->db->get_where('passenger_list',array('id'=>$_POST['passenger_id']))->row();
			
		
			if(!empty($get_user)){
			
				$booking=$this->db->get_where('booking_list',array('id'=>$_POST['booking_id'], 'b_p_id'=>$_POST['passenger_id']))->row();
				
				if(!empty($booking)){
				
					if($booking->b_complain_msg==''){
				
						$array=array(
							'b_complain_msg'=>$_POST['complain_msg'],
							'b_complain_datetime'=>date('Y-m-d H:i:s')	
						);
						
						$this->db->where('id',$_POST['booking_id']);
						$this->db->update('booking_list',$array);
						
						$response=array('success'=>'success','message'=>'Successfully Send Complain');
					}else{
						$response=array('success'=>'error','message'=>'Complain already send');
					}
				
				}else{
					$response=array('success'=>'error', 'message'=>'Invalid booking ID');
				}
			
			}else{
				$response=array('success'=>'error', 'message'=>'Invalid passenger id');
			}
			
		}else{
			$response=array('success'=>'error','message'=>'Parameter Missing');
		}
		echo json_encode($response);
	
	}
	
	public function PassengerComplainList()
	{
		
		date_default_timezone_set('Asia/Kolkata');
		
		if(isset($_POST['passenger_id'])){
			
			$get_user=$this->db->get_where('passenger_list',array('id'=>$_POST['passenger_id']))->row();
			
		
			if(!empty($get_user)){
			
				$booking=$this->db->order_by('b_complain_datetime','desc')->get_where('booking_list',array('b_p_id'=>$_POST['passenger_id'], 'b_complain_msg!=' => ''))->result();
				
				$data = array();
				$i=0;
				foreach($booking as $row){
					$data[$i] = $row;
					
					$agent=$this->db->get_where('agent_detail',array('id'=>$row->b_agent_id))->row();
					
					$data[$i]->a_full_name='';
					$data[$i]->a_contact_no1='';
					if(!empty($agent)){
						$data[$i]->a_full_name=$agent->a_full_name;
						$data[$i]->a_contact_no1=$agent->a_contact_no1;
					}
					
					$i++;
				}
				
				
				$response=array('success'=>'success','message'=>'Successfully Get Complain List','total'=>count($data), 'complain_list'=>$data);
				
			
			}else{
				$response=array('success'=>'error', 'message'=>'Invalid passenger id');
			}
			
		}else{
			$response=array('success'=>'error','message'=>'Parameter Missing');
		}
		echo json_encode($response);
	
	}
	
	
	public function AgentComplainList()
	{
		
		date_default_timezone_set('Asia/Kolkata');
		
		if(isset($_POST['agent_id'])){
			
			$agent=$this->db->get_where('agent_detail',array('id'=>$_POST['agent_id']))->row();
			
		
			if(!empty($agent)){
			
				$booking=$this->db->order_by('b_complain_datetime','desc')->get_where('booking_list',array('b_agent_id'=>$_POST['agent_id'], 'b_complain_msg!=' => ''))->result();
				
				$data = array();
				$i=1;
				foreach($booking as $row){
					$data[$i] = $row;
					
					$agent=$this->db->get_where('agent_detail',array('id'=>$row->b_agent_id))->row();
					
					$data[$i]->a_full_name='';
					$data[$i]->a_contact_no1='';
					if(!empty($agent)){
						$data[$i]->a_full_name=$agent->a_full_name;
						$data[$i]->a_contact_no1=$agent->a_contact_no1;
					}
					
					$i++;
				}
				
				
				$response=array('success'=>'success','message'=>'Successfully Get Complain List','total'=>count($data), 'complain_list'=>$data);
				
			
			}else{
				$response=array('success'=>'error', 'message'=>'Invalid agent id');
			}
			
		}else{
			$response=array('success'=>'error','message'=>'Parameter Missing');
		}
		echo json_encode($response);
	
	}
	
	public function ReadComplain()
	{
		
		date_default_timezone_set('Asia/Kolkata');
		
		if(isset($_POST['agent_id']) && isset($_POST['booking_id'])){
			
			$agent=$this->db->get_where('agent_detail',array('id'=>$_POST['agent_id']))->row();
			
		
			if(!empty($agent)){
			
				$booking=$this->db->get_where('booking_list',array('id'=>$_POST['booking_id'], 'b_agent_id'=>$_POST['agent_id']))->row();
				
				if(!empty($booking)){
				
					if($booking->b_complain_status==0){
				
						$array=array(
							'b_complain_status'=>1,
							'b_complain_read_datetime'=>date('Y-m-d H:i:s')	
						);
						
						$this->db->where('id',$_POST['booking_id']);
						$this->db->update('booking_list',$array);
						
						$response=array('success'=>'success','message'=>'Successfully Read Complain');
					}else{
						$response=array('success'=>'error','message'=>'Complain already read');
					}
				
				}else{
					$response=array('success'=>'error', 'message'=>'Invalid booking ID');
				}
			
			}else{
				$response=array('success'=>'error', 'message'=>'Invalid agent id');
			}
			
		}else{
			$response=array('success'=>'error','message'=>'Parameter Missing');
		}
		echo json_encode($response);
	
	}
}
