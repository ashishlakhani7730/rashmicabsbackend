<?php defined('BASEPATH') OR exit('No direct script access allowed');
define('BACKUP_DIR', './uploads/invoice' ) ;

class Multicity_view extends CI_Controller 
{	
	 function __construct()
    {
        parent::__construct();
        header('Last-Modified:'.gmdate('D, d M Y H:i:s').'GMT');
		header('Cache-Control: no-cache, must-revalidate, max-age=0');
		header('Cache-Control: post-check=0, pre-check=0',false);
		header('Pragma: no-cache');
		$this->load->model('state_city_model');		
        $this->load->model('General_data');
		$this->load->model('Sms_email');
		$this->load->library('session');
		date_default_timezone_set('Asia/Kolkata');
    }	
		 
	public function index()
	{
		if($this->uri->segment(3))
		{
			$multicity_view_id	= $this->uri->segment(3);
			//echo $multicity_view_id; exit;
		}
		else
		{
			$multicity_view_id	= $this->input->post('multicity_view_id');
			//echo $multicity_view_id; exit;
		}
		
		$this->db->select('booking_list.*,package_type.package_type,package_type.package_sub_type,city_detail.c_name,payment_type.payment_name,vehicle_category_detail.category_name');
		$this->db->from('booking_list');
		$this->db->join('package_type','package_type.id=booking_list.b_type');
		$this->db->join('city_detail','city_detail.id=booking_list.b_from_city');
		$this->db->join('vehicle_category_detail','vehicle_category_detail.id=booking_list.b_vc_id');
		$this->db->join('payment_type','payment_type.id=booking_list.b_payment_type');
		$this->db->where('booking_list.id',$multicity_view_id);
		$multicity_data['multicity_data'] = $this->db->get()->row();	
		 
		$p_id = $multicity_data['multicity_data']->b_p_id; 
		
		$multicity_data['passanger_data'] = $this->db->get_where('passenger_list',array('id'=>$p_id))->row();
		
		$multicity_data['agent_data'] = $this->db->get_where('agent_detail',array('a_status'=>1))->result();
		
		$multicity_data['v_category_data'] = $this->db->get('vehicle_category_detail')->result();
		
		$multicity_data['rent_card_details_data'] = $this->db->get_where('rent_cards',array('id'=>$multicity_data['multicity_data']->b_rent_card_id))->row();
		
		$multicity_data['generate_invoice']=$this->db->get_where('invoice',array('id'=>$multicity_data['multicity_data']->b_invoice_id))->row_array();		
		
		
		if(empty($multicity_data['rent_card_details_data']))
			{
				$multicity_data['total_trip_hours'] = 0;
				$total_days = 1;
			}
			else
			{
				$start_dateTime = date($multicity_data['multicity_data']->b_from_date.' '.$multicity_data['multicity_data']->b_from_time);
   				$return_dateTime = date($multicity_data['rent_card_details_data']->r_return_date.' '.$multicity_data['rent_card_details_data']->r_return_time);
		
				$date1 = new DateTime($start_dateTime);
				$date2 = new DateTime($return_dateTime);
			
				$diff = $date2->diff($date1);
		 
				if($diff->i<30)
				{
				$multicity_data['total_trip_hours'] = $diff->h + ($diff->d * 24 ); 
				}
				else
				{
				$multicity_data['total_trip_hours'] = $diff->h + ($diff->d * 24 ) + 1; 
				}
				
				if($multicity_data['multicity_data']->package_type == 'OUTSTATION')
				{
		
				
					if($multicity_data['rent_card_details_data']->r_start_date == $multicity_data['rent_card_details_data']->r_return_date ) 
					 {
						$total_days = 1; 
						
					 }
					 else
					 {
					 
					 $date1 = date_create(date('Y-m-d',strtotime($multicity_data['rent_card_details_data']->r_start_date)));
					 $date2 = date_create(date('Y-m-d',strtotime($multicity_data['rent_card_details_data']->r_return_date)));
					 
							$diff =date_diff($date1,$date2);
							
							$total_days =  $diff->format("%a"); 
								
							$date = new DateTime($multicity_data['rent_card_details_data']->r_start_time);
							$dt2=$date->format('G');
							
							if($dt2<=21)
							{
								$total_days = $total_days + 1;
							}
							
							 $date2 = new DateTime($multicity_data['rent_card_details_data']->r_return_time);
									 
							 $dt3=$date2->format('G');
							  
							if($dt3<5)
							{
								$total_days = $total_days - 1;
							}		
							
					 } 
				 }
				 else
				 {
				  $total_days = 1;
				 }

				
			}						$multicity_data['SGST'] = $this->db->get_where('tax_detail',array('t_name'=>'SGST'))->row();				$multicity_data['CGST'] = $this->db->get_where('tax_detail',array('t_name'=>'CGST'))->row();				$multicity_data['IGST'] = $this->db->get_where('tax_detail',array('t_name'=>'IGST'))->row();
			$multicity_data['total_days'] = $total_days;
		
		//echo"<pre>";print_r($multicity_data); echo"</pre>";exit;	
				
		$this->load->view('multicity_booking_view',$multicity_data);
		
	}
	public function get_city_by_state() 
	{						
		 if (isset($_POST) && isset($_POST['cat_id'])) 
		{
			$category = $_POST['cat_id'];						
			
			$arrcat = $this->db->get_where('vehicle_detail',array('v_category_id'=>$category))->result();
			
			
			
			foreach ($arrcat as $vehicles)
			{
				$arrFinal[$vehicles->id] = $vehicles->v_name;
			}  
			
			print form_dropdown('city_name',$arrFinal);
		}				 
    }
	
	public function update_booking()
	{
	
		$data = $this->input->post(null,true);
		
		//print_r($data);exit;
		
		$booking_data = $this->db->get_where('booking_list',array('id'=>$data['editid']))->row();
				
		date_default_timezone_set('Asia/Kolkata');

        $date = new DateTime($this->input->post('time'));
		
		
        $dt2=$date->format('G');	
		
		if($dt2==24 or $dt2==1 or $dt2==2 or $dt2==3 or $dt2==4 or $dt2==0  or $dt2==23)
		{
			$night=$booking_data->b_pk_night_charge;
			$n='';
			$night_charge_status=1;
        }
		else
		{
			$night=0;
			$n='<span class="text-danger">Not Applied</span>';
			$night_charge_status=0;
        }
		
		$date1 = date_create(date('Y-m-d',strtotime($this->input->post('date'))));
		
		
		$date2 = date_create(date('Y-m-d',strtotime($this->input->post('to_date'))));
					
				
		$diff = date_diff($date1,$date2);
		
		
				
		$total_days =  $diff->format("%a");
				
			if($dt2<=21)
			{
				$total_days = $total_days + 1;
			}
				
		$chargeable_km=0;
			
		$discount = "";
			
		 if( ($booking_data->b_pk_min_km * $total_days ) > $booking_data->b_estimated_distance)
		 {
				 $km_rate = ($booking_data->b_pk_min_km * $total_days * $booking_data->b_pk_rate_per_km);
		 }
		 else
		 {
				 $km_rate = ($booking_data->b_estimated_distance * $booking_data->b_pk_rate_per_km) ;
		 
		 }
			
		$total_estimated_rate =  $km_rate ;
	  
	  
		$total_estimated_rate = $total_estimated_rate + $night + ($total_days *$booking_data->b_pk_driver_allowance);
		 
	
		$array = array(		'b_p_name'              =>$data['name'],
							'b_p_contact'           =>$data['mobile'],
							'b_pickup_point'        =>$data['pickup'],
							'b_drop_point'          =>$data['drop'],
							'b_from_date'           =>date('Y-m-d',strtotime($data['date'])),
							'b_to_date'             =>date('Y-m-d',strtotime($data['to_date'])),
							'b_from_time'           =>date('H:i:s',strtotime($data['time'])),
							'b_estimated_rate'      =>$total_estimated_rate,
							'b_chargeable_km'       =>$chargeable_km,
							'b_night_charge_status' =>$night_charge_status,							
							'b_updated_date_time'   =>date('Y-m-d H:i:s'),							
							'b_status'              =>1);							
							
		echo"<pre>";print_r($array); echo"</pre>"; 
		
		$id = $data['editid'];
				
		//echo $id; exit;
		
		$this->db->where("id",$id);
		$this->db->update("booking_list",$array);		
		
		//sms and email
		
		$this->db->select('booking_list.*,package_type.package_type,package_type.package_sub_type,city_detail.c_name,payment_type.payment_name');
		$this->db->from('booking_list');
		$this->db->join('package_type','package_type.id=booking_list.b_type');
		$this->db->join('city_detail','city_detail.id=booking_list.b_from_city');
		$this->db->join('payment_type','payment_type.id=booking_list.b_payment_type');
		$this->db->where('booking_list.id',$data['editid']);
		$booking_details = $this->db->get()->row();
		
		
		//send sms
		
		$message = 'Hey '.$booking_details->b_p_name.', Your booking with '.$booking_details->b_id.' has been modified for '.date('jS M Y',strtotime($booking_details->b_from_date)).', '.date('h:i A',strtotime($booking_details->b_from_time)).'. from '.$booking_details->c_name.'. We look forward to having you onboard. Call Rashmi Cabs on +91 9974234111 for any help.';
		
		$mobile_no = $booking_details->b_p_contact;
		
		$this->Sms_email->send_sms($mobile_no,$message);
		
		$passenger_details=$this->db->get_where('passenger_list',array('id'=>$booking_details->b_p_id))->row();
		
		if($booking_details->b_self_travel_status != 1)
		{
			$mobile_no_2=$passenger_details->p_contact;
			
			$message_2 = 'Hey '.$passenger_details->p_full_name.', Your booking with '.$booking_details->b_id.' has been modified for '.date('jS M Y',strtotime($booking_details->b_from_date)).', '.date('h:i A',strtotime($booking_details->b_from_time)).'. from '.$booking_details->c_name.'. We look forward to having you onboard. Call Rashmi Cabs on +91 9974234111 for any help.';
			
			$this->Sms_email->send_sms($mobile_no_2,$message_2);
				
		}
		
		
		//send email
		$to      = $passenger_details->p_email_id;
		$subject = 'Rashmi Cabs';
		
		$data['booking_details']=$booking_details;
		$data['passenger_details']=$passenger_details;
		$data['total_estimated_rate']=$total_estimated_rate;
				
 		$message_mail = $this->load->view('mail_booking_modify',$data,true);
		
		$this->Sms_email->send_email($to, $subject, $message_mail);
		
		
		//sms to agent
		
		if(!empty($booking_details->b_agent_id)){
		
			$agent_details=$this->db->get_where('agent_detail',array('id'=>$booking_details->b_agent_id))->row();
		
			$agent_mobile_no = $agent_details->a_contact_no1;
			
			$agent_message = 'Dear '.$agent_details->a_full_name.', Booking Modify alert = '.$booking_details->b_id.' = '.$booking_details->package_type.' '.$booking_details->package_sub_type.' = '.$booking_details->b_p_name.' = '.$booking_details->b_p_contact.' = Pickup@'.$booking_details->b_pickup_point.' - '.date('jS M Y',strtotime($booking_details->b_from_date)).', '.date('h:i A',strtotime($booking_details->b_from_time)).' == Assign driver & car details soon as possible. Team Rashmi Cabs.';;
			
			$this->Sms_email->send_sms($agent_mobile_no,$agent_message);	
		
		
		}
		
			if(empty($array))
			{
				echo "<div class='col-md-12'>
										<p style='color:red; '><strong>Something Went Wrong.</strong></p>
									</div>";
			}
			else
			{
				echo "<div class='col-md-12'>
										<p style='color:green; '><strong>Successfully update Passanger !</strong></p>
									</div>";
			}
		
	}
	public function modify_booking_package()
    {
		$booking_detail_data =  $this->input->post(NULL, TRUE); 
		
		//print_r($booking_detail_data);exit;
		
		date_default_timezone_set('Asia/Kolkata');

      $package_detail=$this->db->get_where('package_detail',array('id'=>$booking_detail_data['package_id']))->row_array();
		
		$booking_detail_array = array(
			'b_pk_id'=>$booking_detail_data['package_id'],
			'b_package_id'=>$package_detail['package_id'],
			'b_vc_id'=>$package_detail['p_v_category'],
			'b_ac_non_ac'=>$package_detail['p_ac_status'],
			'b_pk_discount'=>$package_detail['p_discount'],
			'b_pk_discount_type'=>$package_detail['p_discount_type'],
			'b_pk_rate'=>$package_detail['p_rate'],
			'b_pk_rate_per_km'=>$package_detail['p_extra_km_rate'],
			'b_pk_rate_per_hour'=>$package_detail['p_extra_hr_rate'],
			'b_pk_min_km'=>$package_detail['p_min_km'],
			'b_pk_min_hour'=>$package_detail['p_min_hr'],
			'b_pk_night_charge'=>$package_detail['p_night_charge'],
			'b_estimated_rate'=>$booking_detail_data['total_estimated_rate'],			
			'b_status'=>1
		);
		
		$this->db->where('id',$booking_detail_data['booking_id']);
		$this->db->update('booking_list',$booking_detail_array);
		
		
		//sms and email
		
		$this->db->select('booking_list.*,package_type.package_type,package_type.package_sub_type,city_detail.c_name,payment_type.payment_name');
		$this->db->from('booking_list');
		$this->db->join('package_type','package_type.id=booking_list.b_type');
		$this->db->join('city_detail','city_detail.id=booking_list.b_from_city');
		$this->db->join('payment_type','payment_type.id=booking_list.b_payment_type');
		$this->db->where('booking_list.id',$booking_detail_data['booking_id']);
		$booking_details = $this->db->get()->row();
		
		
		//send sms
		$message = 'Hey '.$booking_details->b_p_name.', Your booking with '.$booking_details->b_id.' has been upgraded for '.date('jS M Y',strtotime($booking_details->b_from_date)).', '.date('h:i A',strtotime($booking_details->b_from_time)).'. from '.$booking_details->c_name.'. We look forward to having you onboard. Call Rashmi Cabs on +91 9974234111 for any help.';
		
		$mobile_no = $booking_details->b_p_contact;
		
		$this->Sms_email->send_sms($mobile_no,$message);
		
		$passenger_details=$this->db->get_where('passenger_list',array('id'=>$booking_details->b_p_id))->row();
		
		if($booking_details->b_self_travel_status != 1)
		{
			$mobile_no_2=$passenger_details->p_contact;
			
			$message_2 = 'Hey '.$passenger_details->p_full_name.', Your booking with '.$booking_details->b_id.' has been upgraded for '.date('jS M Y',strtotime($booking_details->b_from_date)).', '.date('h:i A',strtotime($booking_details->b_from_time)).'. from '.$booking_details->c_name.'. We look forward to having you onboard. Call Rashmi Cabs on +91 9974234111 for any help.';
			
			$this->Sms_email->send_sms($mobile_no_2,$message_2);
				
		}
		
		
		//send email
		$to      = $passenger_details->p_email_id;
		$subject = 'Rashmi Cabs';
		
		$data['booking_details']=$booking_details;
		$data['passenger_details']=$passenger_details;
		$data['total_estimated_rate']=$booking_detail_data['total_estimated_rate'];
		
		
 		$message_mail = $this->load->view('mail_booking_package_upgrade',$data,true);
		
		$this->Sms_email->send_email($to, $subject, $message_mail);
		
		/*$this->db->select('booking_list.*,booking_type.sub_type_name,booking_type.type_name,city_list.c_name,payment_type.pt_name');
			$this->db->from('booking_list');
			$this->db->join('booking_type','booking_type.id=booking_list.b_type');
			$this->db->join('city_list','city_list.id=booking_list.b_from_city');
			$this->db->join('payment_type','payment_type.id=booking_list.b_payment_type');
			$this->db->where('booking_list.id',$booking_detail_data['booking_id']);
			$booking_details = $this->db->get()->row();
		
		
		if($booking_details->b_assign_driver_id !=0)
		{
			$get_lnc_no = $this->db->get_where('driver_list',array('id'=>$booking_details->b_assign_driver_id))->row()->d_lnc_no;
			
			$this->db->where('d_lnc_no',$get_lnc_no );
			$this->db->update('driver_list',array('d_assigned_status'=>0));
		}
		
		if($booking_details->b_assign_vehicle_id !=0)
		{
			$register_no = $this->db->get_where('vehicle_list',array('id'=>$booking_details->b_assign_vehicle_id))->row()->v_register_no;
			$this->db->where('v_register_no',$register_no);
			$this->db->update('vehicle_list',array('v_assigned_status'=>0));
		}*/
	}
	
	public function cancel_booking()
	{
		
		$this->load->model('General_data');
		
		$cancel_booking = array(	'b_status'=>0,
									'b_cancelled_by'=>$this->session->userdata('user')->id,
									'b_cancel_type'=>$this->input->post('cancel_type'),
									'b_cancel_date_time'=>date('Y-m-d H:i:s',strtotime($this->input->post('cancel_date')." ".$this->input->post('cancel_time'))),
									'b_cancel_note'=>$this->input->post('cancel_note')
									);
									
		//print_r($cancel_booking);exit;							
		$this->General_data->update_data('booking_list',$this->input->post('id'),$cancel_booking);
		
		$this->db->select('booking_list.*,package_type.package_type,package_type.package_sub_type,city_detail.c_name,payment_type.payment_name');
		$this->db->from('booking_list');
		$this->db->join('package_type','package_type.id=booking_list.b_type');
		$this->db->join('city_detail','city_detail.id=booking_list.b_from_city');
		$this->db->join('payment_type','payment_type.id=booking_list.b_payment_type');
		$this->db->where('booking_list.id',$this->input->post('id'));
		$booking_details = $this->db->get()->row();
			
			
		date_default_timezone_set('Asia/Kolkata');
		
		$pickup_dateTime = date($booking_details->b_from_date.' '.$booking_details->b_from_time);
   		
		$date1 = new DateTime($pickup_dateTime);
		$date2 = new DateTime();
 	
		$diff = $date2->diff($date1);
 
		
		$total_hours_difference = $diff->h + ($diff->d * 24); 
		if($total_hours_difference <=24)
		{
			$refund_time = 'Within 48 Hours';
			$advance_return = 0;
		}
		else
		{
			$refund_time = 'Before 48 Hours';
			$advance_return = $booking_details->b_advance;
		}
		
		
		//$message = 'Dear '.$booking_details->b_p_name.', Thank you for booking with us Rashmi Cabs your Ref #'.$booking_details->b_id.' was cancelled '.$refund_time.', hence your refund amount is Rs.'.$advance_return.' and will be processed in 7 Business Days..';
		
		$message = "Dear ".$booking_details->b_p_name.", We regret to inform the cancellation of your booking ".$booking_details->b_id.". We'd have loved to serve you. Call Rashmi Cabs on +91 9974234111 for any help.";
		
		
		$mobile_no=$booking_details->b_p_contact;
		
		
		$this->Sms_email->send_sms($mobile_no,$message);
		
		$passenger_details=$this->db->get_where('passenger_list',array('id'=>$booking_details->b_p_id))->row();
		
		if($booking_details->b_self_travel_status != 1)
		{
			$mobile_no_2=$passenger_details->p_contact;
			
			//$message_2 = 'Dear '.$passenger_details->p_full_name.', Thank you for booking with us Rashmi Cabs your Ref #'.$booking_details->b_id.' was cancelled '.$refund_time.', hence your refund amount is Rs.'.$advance_return.' and will be processed in 7 Business Days..';
			
			$message_2 = "Dear ".$passenger_details->p_full_name.", We regret to inform the cancellation of your booking ".$booking_details->b_id.". We'd have loved to serve you. Call Rashmi Cabs on +91 9974234111 for any help.";
		
		
			
			$this->Sms_email->send_sms($mobile_no_2,$message_2);
		}
		
		//send email
		$to      = $passenger_details->p_email_id;
		$subject = 'Rashmi Cabs';
		
		$data['booking_details']=$booking_details;
		$data['passenger_details']=$passenger_details;
		$data['message']='Thank you for booking with us Rashmi Cabs your Ref #'.$booking_details->b_id.' was cancelled '.$refund_time.', hence your refund amount is Rs.'.$advance_return.' and will be processed in 7 Business Days..';
		
 		$message_mail = $this->load->view('mail_booking_cancel',$data,true);
		
		$this->Sms_email->send_email($to, $subject, $message_mail);
		
		//to agent
		
		if(!empty($booking_details->b_agent_id)){
		
			//sms
		
			$agent_details=$this->db->get_where('agent_detail',array('id'=>$booking_details->b_agent_id))->row();
		
			$agent_mobile_no = $agent_details->a_contact_no1;
			
			//DEAR AGENT = CANCELLATION ALERT=CRN1234567 DUTY WITH RAHUL 9974586007=7:15 AM 2/2/18 HAS BEEN CANCELLED PLZ NOTE
			
			$agent_message = 'Dear '.$agent_details->a_full_name.', Cancellation alert = '.$booking_details->b_id.' duty with '.$booking_details->b_p_name.'  '.$booking_details->b_p_contact.' = '.date('jS M Y',strtotime($booking_details->b_from_date)).' has been cancelled plz note. Team Rashmi Cabs.';
			
			$this->Sms_email->send_sms($agent_mobile_no,$agent_message);	
			
			//send email
			$to      = $agent_details->a_email_id;
			$subject = 'Rashmi Cabs';
			
			$data['booking_details']=$booking_details;
			$data['passenger_details']=$passenger_details;
			$data['agent_details']=$agent_details;
						
			$message_mail = $this->load->view('mail_booking_cancel_agent',$data,true);
			
			$this->Sms_email->send_email($to, $subject, $message_mail);
		
		
		}
		
		//to driver
		if(!empty($booking_details->b_assign_driver_id)){
		
			//send sms
			$driver_mobile_no = $booking_details->b_driver_contact;
					
			$driver_message = 'DEAR '.$booking_details->b_driver_name.', Cancellation alert = '.$booking_details->b_id.' duty with '.$booking_details->b_p_name.'  '.$booking_details->b_p_contact.' = '.date('jS M Y',strtotime($booking_details->b_from_date)).' has been cancelled plz note. Team Rashmi Cabs.';
					
			$this->Sms_email->send_sms($driver_mobile_no,$driver_message);	
		}
		
		redirect("index.php/Multicity_view/index/".$this->input->post('id'));
	}
	public function assign_cab()
	{
		$assign_data = $this->input->post(NULL,TRUE);
		
		$cab_assign_status=$this->db->get_where('booking_list',array('id'=>$assign_data['id']))->row()->b_status;
		$agent_already_assign=$this->db->get_where('booking_list',array('id'=>$assign_data['id']))->row()->b_agent_id;
		$vehicle_already_assign=$this->db->get_where('booking_list',array('id'=>$assign_data['id']))->row()->b_vehicle_id;
		$driver_already_assign=$this->db->get_where('booking_list',array('id'=>$assign_data['id']))->row()->b_assign_driver_id;
						
		$multicity_data = array(  'b_agent_id'         =>$this->input->post('agent_id'),
								  'b_vc_category_id'   =>$this->input->post('cat_id'),
								  'b_vehicle_id'       =>$this->input->post('vehicle_id'),
								  'b_driver_name'      =>$this->input->post('driver_id'),
								  'b_driver_contact'   =>$this->input->post('driver_number_id'),
								  'b_vehicle_number'   =>$this->input->post('vehicle_number'),
								  'b_assign_driver_id' =>$this->input->post('assign_driver_id'),
								  'b_assign_vehicle_id' =>$this->input->post('vehicle_list_id'),
								  //'b_status' 		   =>4,
								  'b_cab_assign_by'	   =>$this->session->userdata('user')->id,
								  'b_assign_date_time' =>date('Y-m-d H:i:s') );
								  
		if(!empty($this->input->post('agent_id')) && !empty($this->input->post('cat_id')) && !empty($this->input->post('vehicle_id')) && !empty($this->input->post('assign_driver_id')) && !empty($this->input->post('vehicle_list_id')))
		{
			$multicity_data['b_status']=4;
		}else if($cab_assign_status!=4){
			$multicity_data['b_status']=2;
		}
		
		$this->db->where('id',$assign_data['id']);
		$this->db->update('booking_list',$multicity_data);	
		
		//sms and email
		$this->db->select('booking_list.*,package_type.package_type,package_type.package_sub_type,city_detail.c_name,payment_type.payment_name');
		$this->db->from('booking_list');
		$this->db->join('package_type','package_type.id=booking_list.b_type');
		$this->db->join('city_detail','city_detail.id=booking_list.b_from_city');
		$this->db->join('payment_type','payment_type.id=booking_list.b_payment_type');
		$this->db->where('booking_list.id',$assign_data['id']);
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
				/*
				//send email
				
				$to      = $driver_details->d_email_id;
				$subject = 'Rashmi Cabs';
				
				$data['booking_details']=$booking_details;
				$data['passenger_details']=$passenger_details;
				$data['driver_details']=$driver_details;
						
				$message_mail = $this->load->view('mail_booking_vehicle_driver_assign_to_driver',$data,true);
				
				$this->Sms_email->send_email($to, $subject, $message_mail);		*/
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
		
	}
	public function fetch_rent_card()
	{
		$id=$this->input->post('view_id');
		
		
		$rent_card_id = $this->db->get_where('booking_list',array('id'=>$id))->row_array();
			
			if($rent_card_id['b_rent_card_id'] != 0)
			{
				$rent_card_data = $this->db->get_where('rent_cards',array('id'=>$rent_card_id['b_rent_card_id']))->row_array();
			}
			else
			{
			
				$rent_card_data="no data";
			}
			
			if($rent_card_data['r_return_date']=='1970-01-01')
			{
				$rent_card_data['r_return_date'] = "";
			}
			else
			{
				$rent_card_data['r_return_date'] = date("m/d/Y", strtotime($rent_card_data['r_return_date']));
			}
			
			if($rent_card_data['r_return_time']=='00:00:00')
			{
				$rent_card_data['r_return_time'] = "";
			}
			else
			{
				$rent_card_data['r_return_time'] = date("h:i A", strtotime($rent_card_data['r_return_time']));
			}
			
			echo json_encode($rent_card_data);
	
	}
	public function generate_invoice()
    {
        $data=$this->input->post(null,true);
		
		//print_r($data);exit;
		
        $da=$this->db->get_where('booking_list',array('id'=>$data['edit']))->row_array();
        //echo $data['my'];exit;
		
			$paid_balance = $this->db->get_where('invoice',array('id'=>$da['b_invoice_id']))->row_array();
			
			if($data['pay_type']==1)
			{
			
				$invoice_paid = array(
						'route'    =>$data['Last_city'],
						'paid_amount'=>$data['pay_amount']+$paid_balance['paid_amount'],												'gen_payment_type' =>$data['payment_type'],												'full_payment' => 1,
						'invoice_created_date_time'=>date('Y-m-d H:i:s'),
						'balance'=>$paid_balance['total_amount'] - ($data['pay_amount'] + $paid_balance['paid_amount'])
						);
						
				$this->db->where('id',$da['b_invoice_id']);
				$this->db->update('invoice',$invoice_paid);
			
				$this->db->where('id',$this->input->post('edit'));
				$this->db->update('booking_list',array('b_status'=>6));
			}
			
			if($data['pay_type']==2)
			{
				$extra_discount = $paid_balance['total_amount'] - ($paid_balance['paid_amount'] + $data['pay_amount']);
				$invoice_paid = array(
					'extra_discount' =>$extra_discount ,
					'route'    =>$data['Last_city'],
					'paid_amount'=>$paid_balance['total_amount'] - $extra_discount,										'gen_payment_type' =>$data['payment_type'],											'full_payment' => 9,
					'invoice_created_date_time'=>date('Y-m-d H:i:s'),
					'balance'=>0
					);
					
				$this->db->where('id',$da['b_invoice_id']);
				$this->db->update('invoice',$invoice_paid);
				
				$this->db->where('id',$this->input->post('edit'));
				$this->db->update('booking_list',array('b_status'=>6));
				
				//sms and email
				$this->db->select('booking_list.*,package_type.package_type,package_type.package_sub_type,city_detail.c_name,payment_type.payment_name');
				$this->db->from('booking_list');
				$this->db->join('package_type','package_type.id=booking_list.b_type');
				$this->db->join('city_detail','city_detail.id=booking_list.b_from_city');
				$this->db->join('payment_type','payment_type.id=booking_list.b_payment_type');
				$this->db->where('booking_list.id',$this->input->post('edit'));
				$booking_details = $this->db->get()->row();
				
				$mobile_no = $booking_details->b_p_contact;
				
				$message = 'Dear '.$booking_details->b_p_name.', Thank you for booking with us Rashmi Cabs your Ref #'.$booking_details->b_id.' Hope you had a wonderful trip. Invoice has been emailed to your registered email id.';
				
				$this->Sms_email->send_sms($mobile_no,$message);
				
				$passenger_details=$this->db->get_where('passenger_list',array('id'=>$booking_details->b_p_id))->row();
				
				if($booking_details->b_self_travel_status != 1)
				{
					$mobile_no_2=$passenger_details->p_contact;
					
					$message_2 = 'Dear '.$passenger_details->p_full_name.', Thank you for booking with us Rashmi Cabs your Ref #'.$booking_details->b_id.' Hope you had a wonderful trip. Invoice has been emailed to your registered email id.';
					
					$this->Sms_email->send_sms($mobile_no_2,$message_2);
						
				}
				
				//send email
				$this->InvoiceMail($da['b_invoice_id']); //send invoice id
				
			}
	}
	public function InvoiceMail($id)
	{
		//$id = 52;
		   
		//echo $id; exit;		   
	
		   
		$data['invoice'] = $this->db->get_where('invoice',array('id'=>$id))->row();
		   
		$rent_card_id = $this->db->get_where('booking_list',array('b_invoice_id'=>$id))->row()->b_rent_card_id;
			
		$data['rent_card'] = $this->db->get_where('rent_cards',array('id'=>$rent_card_id))->row();
			
		$booking_details = $this->db->get_where('booking_list',array('b_invoice_id'=>$id))->row();
		   
		if($booking_details->b_ac_non_ac==1)
		{
			$data['ac_non_ac'] =  ' AC';
		}
		else
		{
			$data['ac_non_ac'] =  ' NON AC';
		}
		
		$data['booking_details'] = $this->db->get_where('booking_list',array('b_invoice_id'=>$id))->row();
		$data['passenger_details']=$this->db->get_where('passenger_list',array('id'=>$data['booking_details']->b_p_id))->row();
			
		
		$invoice_template=$this->load->view('invoice_view_pdf',$data,true);
		//echo $invoice_template;
			
			
		//generate pdf
		if (!file_exists(BACKUP_DIR)) mkdir(BACKUP_DIR , 0755) ;
        if (!is_writable(BACKUP_DIR)) chmod(BACKUP_DIR , 0755) ;
			
		$pdfFilePath = BACKUP_DIR."/invoice.pdf";
	 
		//load mPDF library
		$this->load->library('m_pdf');
	 
		//generate the PDF from the given html
		$this->m_pdf->pdf->WriteHTML($invoice_template);
	 
		//download it.
		$this->m_pdf->pdf->Output($pdfFilePath, "F");  
			
					
		$data['message']='Thank you for booking with us Rashmi Cabs your Ref #'.$data['booking_details']->b_id.' Hope you had a wonderful trip. <br> Please Check Attachment Invoice File';
					
		$body = $this->load->view('mail_booking_trip_complete',$data,true);
		//echo $message_mail;exit;
			
			
		$filename= "invoice.pdf";
		$my_path = BACKUP_DIR . '/';
				
		$file = $my_path.$filename;
		$file_size = filesize($file);
		$handle = fopen($file, "r");
		$content = fread($handle, $file_size);
		fclose($handle);
	
		$content = chunk_split(base64_encode($content));
		$uid = md5(uniqid(time()));
		$name = basename($file);
		$eol = PHP_EOL;
		   
			   
		   
		$to      = $data['passenger_details']->p_email_id;
		$subject = 'Rashmi Cabs';
				
		$from_name = "Rashmi Cabs";
		$from_mail = 'rashmicabs@gmail.com';
		$replyto = "rashmicabs@gmail.com";
			
		// Basic headers
		$header = "From: ".$from_name." <".$from_mail.">".$eol;
		$header .= "Reply-To: ".$replyto.$eol;
		$header .= "MIME-Version: 1.0\r\n";
		$header .= "Content-Type: multipart/mixed; boundary=\"".$uid."\"";
			
		// Put everything else in $message
		//$message = "--".$uid.$eol;
		//$message .= "Content-Transfer-Encoding: 7bit".$eol.$eol;
		$message .= "--".$uid.$eol;
		$message .= "Content-Type: text/html; charset=ISO-8859-1".$eol;
		$message .= "Content-Transfer-Encoding: 8bit".$eol.$eol;
		$message .= $body.$eol;
		$message .= "--".$uid.$eol;
		$message .= "Content-Type: application/octet-stream; name=\"".$filename."\"".$eol;
		$message .= "Content-Transfer-Encoding: base64".$eol;
		$message .= "Content-Disposition: attachment".$eol.$eol;
		$message .= $content.$eol;
		$message .= "--".$uid."--";
							
		mail($to, $subject, $message, $header);
		
	}
}
?>