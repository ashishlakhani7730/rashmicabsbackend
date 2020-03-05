<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Roundtrip_booking extends CI_Controller 
{
	
	function __construct()
    {
        parent::__construct();
        $this->load->model('General_data');
	    $this->load->model('Sms_email');
	}
	
	 
	
	
	public function get_package_data()
	{
		if(isset($_POST['from_city']) && isset($_POST['b_to_city']) && isset($_POST['from_date']) && isset($_POST['to_date']) && isset($_POST['start_time'])){	
	
			$all_to_city = explode(' - ',$this->input->post('b_to_city'));
			  
			$this->load->model('General_data');
			   
			$total_distance_km = 0;
			 
			$last_city="";		 
				
			for($i=0;$i<count($all_to_city);$i++)
			{
				if($i==0)
				{
					$from_city = $this->db->get_where('city_detail',array('id'=>$this->input->post('from_city')))->row();
					$from_city = $from_city->c_name." , ".$from_city->c_state;
				}
				else
				{
					$from_city = $all_to_city[$i-1];
				}
							
				$to_city = $all_to_city[$i];					
							
				$total_distance_km =  $total_distance_km  +  $this->General_data->distance($from_city, $to_city);
							
				$last_city = $to_city;
						
			}
						
			$total_distance_km = 2 * $total_distance_km;
			
						
			$data = $this->db->order_by('p_extra_km_rate','ASC')->get_where('package_detail',array('p_sub_type'=>3,'p_from_city'=>$this->input->post('from_city')))->result();	
			$i=1;
			$total=0;	
		
			$package_detail=array();	
			
			
			foreach($data as $i => $d)
			{
				$max_seats = $this->db->select_max('v_seat_number')->get_where('vehicle_detail',array('v_category_id'=>$d->p_v_category))->row();
							
				$min_seats = $this->db->select_min('v_seat_number')->get_where('vehicle_detail',array('v_category_id'=>$d->p_v_category))->row();
					
					
				if($max_seats == $min_seats)
				{
					$no_of_seats = $max_seats->v_seat_number;
				}
					
				else
				{
					$no_of_seats=$min_seats->v_seat_number.' - '.$max_seats->v_seat_number;	
				}			
					
					
				date_default_timezone_set('Asia/Kolkata');
		
				$date = new DateTime($this->input->post('start_time'));
				
				$dt2 = $date->format('G');
				
				if($dt2==24 or $dt2==1 or $dt2==2 or $dt2==3 or $dt2==4 or $dt2==5 or $dt2==0)
				{
					$night=$d->p_night_charge;
					$n='';
					$night_charge_status=1;			
				}
				else
				{
					$night=0;
					$n='<span class="text-danger">Not Applied</span>';
					$night_charge_status=0;
				}
					
				$date1 = date_create(date('Y-m-d',strtotime($this->input->post('from_date'))));
				$date2 = date_create(date('Y-m-d',strtotime($this->input->post('to_date'))));			
				
				$diff = date_diff($date1,$date2);
					
				$total_days =  $diff->format("%a");
					
					
				if($dt2<=21)
				{
					$total_days = $total_days + 1;
				}				
								
				$chargeable_km=0;
				
				$discount = "";
				
				if(($d->p_min_km * $total_days ) > $total_distance_km)
				{
					$estimate_fare_rate = ($d->p_min_km * $total_days) * ($d->p_extra_km_rate);
				}
				else
				{
					$estimate_fare_rate = ($total_distance_km) * ($d->p_extra_km_rate);	
				}
				
				if($d->p_discount_type==0)
				{
					$discount = $d->p_discount."%";
					$discount_convert =  ($estimate_fare_rate * $d->p_discount)/100;
					$discount_show = $discount_convert." (".$discount.")";
					}
				else
				{
					$discount = "Rs. ".$d->p_discount;
					$discount_convert = $d->p_discount;
					$discount_show = $discount_convert;
				}
	
			
				$km_rate = $estimate_fare_rate;
			
				
				$total_estimated_rate =  $km_rate - $discount_convert ;
					
			 
				if($d->p_advance_type==0)
				{
					$total_advance_rate =  ($d->p_advance * $total_estimated_rate)/100;
				}
				else
				{
					$total_advance_rate = $d->p_advance;
				}
			  
			  
				$total_estimated_rate = $total_estimated_rate + $night + ($total_days *$d->p_driver_allowance);
				
				$tax=array();
			
				if($d->p_tax_on_package != 0)
				{
					$tax_arr = explode(',',$d->p_tax_on_package);
					 
					foreach($tax_arr as $ar)
					{
						$tax[] = $this->db->get_where('tax_detail',array('id'=>$ar))->row()->t_name.'  '.$this->db->get_where('tax_detail',array('id'=>$ar))->row()->t_value.'%';
					}
					$final_tax = implode(" , ",$tax);
				}
				else
				{
					$final_tax = 'Tax Not Applicable';		
				}
			
					
				//echo '<tr class="cablisting"><th width="30%">'.$this->db->get_where('vehicle_category_detail',array('id'=>$d->p_v_category))->row()->category_name.'<br>'.$vehicle_name = $this->db->get_where('vehicle_detail',array('v_category_id'=>$d->p_v_category))->row()->v_name.'</th><th >'.$no_of_seats.'</th><th> Rs. '.$d->p_extra_km_rate.'</th><th><button type="button" class="btn btn-info popovers" rel="popover" data-trigger="hover" data-total-days="'.$total_days.'" data-total-distance="'.number_format($total_distance_km).'" data-discount="'.$discount_show.'" data-estimate-fare-rate="'.number_format($estimate_fare_rate).'" data-min-km="'.number_format($total_days * $d->p_min_km).'" data-rate-per-km="'.$d->p_extra_km_rate.'" data-night-charge="'.number_format($night).'" data-driver-allowance="'.number_format($total_days * $d->p_driver_allowance).'" data-tax="'.$final_tax.'" data-driver-allowance-per-day="'.$d->p_driver_allowance.'" data-estimated-rate="'.number_format($total_estimated_rate).'" data-advance="'.number_format($total_advance_rate).'">Rs. '.number_format($total_estimated_rate).'</button><input type="hidden" id="availabe_advance" value="'.number_format($total_advance_rate).'"/><input type="hidden" id="available_night_charge_status" value="'.$night_charge_status.'"/></th><th > <a href="javascript:;" class="btn yellow-crusta button-next" onclick="book_package('.$d->id.','.$total_advance_rate.','.$total_distance_km.','.$estimate_fare_rate.','.$total_days.','.$total_estimated_rate.')" ><i class="fa fa-cab"></i> BOOK CAB </a></th></tr>';
		
				$package_detail[$i]['category_name'] = $this->db->get_where('vehicle_category_detail',array('id'=>$d->p_v_category))->row()->category_name;		
				$package_detail[$i]['vehicle_name'] = $this->db->get_where('vehicle_detail',array('v_category_id'=>$d->p_v_category))->row()->v_name;	
				$package_detail[$i]['v_description'] = $this->db->get_where('vehicle_category_detail',array('id'=>$d->p_v_category))->row()->description;
				$package_detail[$i]['no_of_seats'] = $no_of_seats;
				$package_detail[$i]['p_id'] = $d->id;
				$package_detail[$i]['total_days'] = $total_days;
				$package_detail[$i]['total_distance_km'] = $total_distance_km;
				$package_detail[$i]['discount'] = $discount_show;
				$package_detail[$i]['estimate_fare_rate'] = $estimate_fare_rate;
				$package_detail[$i]['p_min_km'] = $total_days * $d->p_min_km;
				$package_detail[$i]['p_extra_km_rate'] = $d->p_extra_km_rate;
				$package_detail[$i]['p_min_hr'] = $d->p_min_hr;
				$package_detail[$i]['p_extra_hr_rate'] = $d->p_extra_hr_rate;
				$package_detail[$i]['night_charge'] = $night;
				$package_detail[$i]['night_charge_status'] = $night_charge_status;
				$package_detail[$i]['p_driver_allowance'] = $total_days * $d->p_driver_allowance;
				$package_detail[$i]['driver_allowance_per_day'] = $d->p_driver_allowance;
				$package_detail[$i]['chargeable_km'] = $estimate_fare_rate;
				$package_detail[$i]['final_tax'] = "Additional Gov. Tax GST, Toll, Parking, State Tax Charge will be remain.";//$final_tax;
				$package_detail[$i]['total_estimated_rate'] = $total_estimated_rate;
				$package_detail[$i]['total_advance_rate'] = $total_advance_rate;
				
				
				$package_detail[$i]['v_profile_pic'] = '';
				$package_detail[$i]['v_profile_pic_path'] = '';
				$vehicle_category=$this->db->get_where('vehicle_category_detail',array('id'=>$d->p_v_category))->row();
				if(!empty($d->p_v_category) && !empty($vehicle_category) && !empty($vehicle_category->c_profile_pic)){
					$package_detail[$i]['v_profile_pic']=$vehicle_category->c_profile_pic;
					$package_detail[$i]['v_profile_pic_path'] =base_url().'uploads/category/profile_pic/'.$vehicle_category->c_profile_pic;
				}
				
				
				
				//$total=$i;
				//$i++;
				
			} 
			$tid = intval(4);	

			$this->db->select("*");
			$this->db->from("booking_terms");
			$this->db->where("id",$tid);
			$query = $this->db->get();
			$treams = $query->result();
			
			$response=array('success'=>'success' ,'message'=>'Successfully Get To Package List','total'=>count($package_detail), 'package_list'=>$package_detail,'pakageterms'=>$treams[0]->package_terms,'termsandcondition'=>$treams[0]->terms_and_conditions,'privacypolicy'=>$treams[0]->privacy_policy,'cancellationterms'=>$treams[0]->cancellation_terms);
		}else{
			$response=array('success'=>'error','message'=>'Parameter Missing');
		}
		$this->output->set_content_type('application/json');
		$this->output->set_output(json_encode($response));
	}
	public function confirm_outstation_booking()
    {
		
		/*$booking_detail_data =  $this->session->userdata('back_booking_data');
		
		if(!empty($booking_detail_data))
		{
			$payment_id = $_GET['payment_id'];
		
		}else
		{
			$payment_id = "";
			$booking_detail_data =  $this->input->post(NULL, TRUE);
		}*/
		
		$booking_detail_data =  $this->input->post(NULL, TRUE);
		
		//print_r($booking_detail_data);exit;

		date_default_timezone_set('Asia/Kolkata');

      	$package_detail = $this->db->get_where('package_detail',array('id'=>$booking_detail_data['package_id']))->row_array();	
		
		$date1 = date_create(date('Y-m-d',strtotime($this->input->post('b_from_date'))));
		$date2 = date_create(date('Y-m-d',strtotime($this->input->post('b_to_date'))));			
		$diff = date_diff($date1,$date2);
		$total_days =  $diff->format("%a");
		
		//$minkm = $package_detail['p_min_km'] * ($total_days + 1);
		
		$booking_detail_array = array(
			'b_pk_id'=>$booking_detail_data['package_id'],
			'b_package_id'=>$package_detail['package_id'],
			'b_vc_id'=>$package_detail['p_v_category'],
			'b_type'=>$package_detail['p_sub_type'],
			'b_ac_non_ac'=>$package_detail['p_ac_status'],
			'b_from_city'=>$booking_detail_data['b_from_city'],
			'b_to_city'=>$booking_detail_data['b_to_city'],
			'b_from_date'=>date('Y-m-d',strtotime($booking_detail_data['b_from_date'])),
			'b_from_time'=>date('H:i:s',strtotime($booking_detail_data['b_from_time'])),
			'b_to_date'=>date('Y-m-d',strtotime($booking_detail_data['b_to_date'])),
			'b_p_id'=>$booking_detail_data['b_p_id'],
			'b_p_name'=>$booking_detail_data['b_p_name'],
			'b_p_contact'=>$booking_detail_data['b_p_contact'],
			'b_pickup_point'=>$booking_detail_data['b_pickup_point'],
			'b_drop_point'=>$booking_detail_data['b_drop_point'],			
			'b_payment_type'=>$booking_detail_data['b_payment_type'],
			'b_advance'=>$booking_detail_data['b_advance'],
			'b_pk_driver_allowance'=>$package_detail['p_driver_allowance'],			
			'b_pk_discount'=>$package_detail['p_discount'],			
			'b_pk_discount_type'=>$package_detail['p_discount_type'],
			'b_pk_rate'=>$package_detail['p_rate'],
			'b_pk_rate_per_km'=>$package_detail['p_extra_km_rate'],
			'b_pk_rate_per_hour'=>$package_detail['p_extra_hr_rate'],
			'b_pk_min_km'=>$package_detail['p_min_km'], // 300 * 2days = 600
			'b_pk_min_hour'=>$package_detail['p_min_hr'],
			'b_pk_night_charge'=>$package_detail['p_night_charge'],
			'b_chargeable_km'=>$booking_detail_data['chargeable_km'],
			'b_estimated_distance'=>$booking_detail_data['total_estimated_distance'],
			'b_estimated_rate'=> $booking_detail_data['total_estimated_rate'],
			'b_night_charge_status'=>$booking_detail_data['b_night_charge_status'],
			'b_self_travel_status'=>$booking_detail_data['b_self_travel_status'],
			'b_remarks'=>$booking_detail_data['b_remarks'],
			'b_tax_type'=>$package_detail['p_tax_on_package'],
			'b_booking_date_time'=>date("Y-m-d H:i:s"),
			'b_payment_id'=>$booking_detail_data['payment_id'],
			'b_source_status'=>1,
			'b_status'=>1
		);
		
		//echo "<pre>";print_r($booking_detail_array);echo"</pre>"; 
		
		$this->db->insert('booking_list',$booking_detail_array);
		$get_last_id=$this->db->insert_id();
		$this->load->model('General_data');
		$this->General_data->update_id('booking_list','RCRTP','b_id');
		
		
		$booking_details = $this->db->get_where('booking_list',array('id'=>$get_last_id))->row();
		
		//$msg['success'] = 'Last booking reference : '.$booking_details->b_id;
		//$this->session->set_flashdata('success',$msg);
		
		
		//sms and email
		
		$this->db->select('booking_list.*,package_type.package_type,package_type.package_sub_type,city_detail.c_name,payment_type.payment_name');
		$this->db->from('booking_list');
		$this->db->join('package_type','package_type.id=booking_list.b_type');
		$this->db->join('city_detail','city_detail.id=booking_list.b_from_city');
		$this->db->join('payment_type','payment_type.id=booking_list.b_payment_type');
		$this->db->where('booking_list.id',$get_last_id);
		$booking_details = $this->db->get()->row();
		
		
		//send sms
		$message = 'Hey '.$booking_details->b_p_name.', Your booking with '.$booking_details->b_id.' has been received for '.date('jS M Y',strtotime($booking_details->b_from_date)).', '.date('h:i A',strtotime($booking_details->b_from_time)).'. from '.$booking_details->c_name.'. We look forward to having you onboard. Call Rashmi Cabs on +91 9974234111 for any help.';
		
		$mobile_no = $booking_details->b_p_contact;
		
		$this->Sms_email->send_sms($mobile_no,$message);
		
		$passenger_details=$this->db->get_where('passenger_list',array('id'=>$booking_details->b_p_id))->row();
		
		if($booking_details->b_self_travel_status != 1)
		{
			$mobile_no_2=$passenger_details->p_contact;
			
			$message_2 = 'Hey '.$passenger_details->p_full_name.', Your booking with '.$booking_details->b_id.' has been received for '.date('jS M Y',strtotime($booking_details->b_from_date)).', '.date('h:i A',strtotime($booking_details->b_from_time)).'. from '.$booking_details->c_name.'. We look forward to having you onboard. Call Rashmi Cabs on +91 9974234111 for any help.';
			
			$this->Sms_email->send_sms($mobile_no_2,$message_2);
				
		}
		
		
		//send email
		$to      = $passenger_details->p_email_id;
		$subject = 'Rashmi Cabs';
		
		$data['booking_details']=$booking_details;
		$data['passenger_details']=$passenger_details;
		$data['total_estimated_rate']=$booking_detail_data['total_estimated_rate'];
		
		$message_mail = $this->load->view('mail_booking_confirm',$data,true);
		
		$this->Sms_email->send_email($to, $subject, $message_mail);
		
		
		$response['success'] = 'success';
		$response['message'] = $booking_details->b_id;
		
		
		echo json_encode($response);
		
    } 
	
}
