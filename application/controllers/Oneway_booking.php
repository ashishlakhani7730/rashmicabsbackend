<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Oneway_booking extends CI_Controller 
{	
	function __construct()
    {
        parent::__construct();
		$this->load->model('state_city_model');		
        $this->load->model('General_data');
		$this->load->model('Sms_email');
		$this->load->library('session');
		date_default_timezone_set('Asia/Kolkata');
    }	
		 
	public function index()
	{	
		$user = $this->session->has_userdata('user');
		if(empty($user)){
			redirect('index.php/Login');
		}else {
		$data['city_list'] = $this->db->get('city_detail')->result();
		
		$data['all_city'] = $this->db->get('cities')->result();
		
		$data['payment_type'] = $this->db->get('payment_type')->result();
		
		$this->db->select("*");
		$this->db->from("passenger_list");
		$this->db->where("p_status","1");
		
		$query = $this->db->get();
		
		
		$data['passenger_list'] = $query->result();
		 				
		$this->load->view('oneway',$data);
		}
	}
	public function fetch_available_city_routes()
	{
				
		//$cities = $this->db->get_where('city_route_list',array('cr_from_city'=>$this->input->post('b_from_city')))->result();
		$cities = $this->db->group_by('p_to_city')->get_where('package_detail',array('p_from_city'=>$this->input->post('b_from_city')))->result();
		
		echo "<option value=''>Select City</option>";
		foreach($cities as $c)
		{
		    if(!empty($c->p_to_city)){
		        echo "<option value='".$c->p_to_city."'>".$this->db->get_where('city_detail',array('id'=>$c->p_to_city))->row()->c_name."</option>";
		    }       
			//echo "<option value='".$c->cr_to_city."'>".$this->db->get_where('city_detail',array('id'=>$c->cr_to_city))->row()->c_name."</option>";
		    
		}
	
	}
	
	public function add_passenger()
	{
		
		$data=$this->input->post(NULL,true);
		
		$passenger_contact=$this->db->get_where('passenger_list',array('p_contact'=>$data['mobile']))->row();
		$passenger_email=$this->db->get_where('passenger_list',array('p_email_id'=>$data['email']))->row();
		
		if(!empty($passenger_contact)){
			$response['success'] = "error";
			$response['message'] = "Contact Number already exist";
			
		}else if(!empty($passenger_email)){
			$response['success'] = "error";
			$response['message'] = "Email ID already exist";
			
		}else{


			$array=array(
				'p_type'        =>'Walk-in/Retail',
				'p_full_name'   => $data['name'],
				'p_f_name'      => $data['name'],
				'p_contact'     => $data['mobile'],
				'p_email_id'    => $data['email'],
				'p_city'        => $data['city'],
				'p_gender'      => $data['gender'],
				'p_password'    => md5($data['mobile']),
				'p_status'      =>1,
				'p_joining_date_time'=>date("Y-m-d H:i:s")
			);
			
			//print_r($array); 
			
			$this->db->insert('passenger_list',$array);
			
			$get_last_id=$this->db->insert_id();
			
			$this->load->model('General_data');
			
			$this->General_data->update_id('passenger_list','RCP'.date('Y').date('m'),'p_id');
			
			
			
			
			//sms and email
			
			$passenger_details=$this->db->get_where('passenger_list',array('id'=>$get_last_id))->row();
			
			//sms
			$mobile_no=$passenger_details->p_contact;
						
			//$message = 'Dear '.$passenger_details->p_full_name.', Welcome to Rashmi Cabs! We are excited to have you on board with us. To book a Cab, please go to download Rashmi Cabs mobile app from Android Play Store goo.gl/12232FkZdYZ. Call us on +91 9974 23 4111 for any help.';
			
			//$message="Dear ".$passenger_details->p_full_name.", Welcome to RASHMI CABS, We are gujarat's leader for inter-city taxi travel. We have created your account on RASHMI CABS You can now login and update your profile for faster bookings. UserId : ".$passenger_details->p_email_id."  Password : ".$passenger_details->p_contact.". Call us on +91 9974234111 for any help.";
			$message = "Welcome to Rashmi Cabs, manage your trip throgh our mobile application www.rashmicabs.com, use your id:".$passenger_details->p_email_id." and password:".$passenger_details->p_contact.".";
			
			$this->Sms_email->send_sms($mobile_no,$message);
			
			//send email
			$to      = $passenger_details->p_email_id;
			$subject = 'Rashmi Cabs';
					
			$data['passenger_details']=$passenger_details;
			//$data['message']='Welcome to Rashmi Cabs! We are excited to have you on board with us. To book a Cab, please go to download Rashmi Cabs mobile app from Android Play Store goo.gl/12232FkZdYZ. Call us on +91 9974 23 4111 for any help.';
					
			$message_mail = $this->load->view('mail_passenger_register',$data,true);
			
			$this->Sms_email->send_email($to, $subject, $message_mail);
			
			
			if(!empty($array))
			{
				$string='';
				$passenger_detail = $this->db->get('passenger_list')->result();
					
					foreach($passenger_detail as $list)
					{
						
						if($list->id==$get_last_id)
							$sel='selected';
						else
							$sel='';
							
						$string .=  "<option value='".$list->id."' p_full_name='".$list->p_full_name."' p_contact='".$list->p_contact."' ".$sel.">".$list->p_full_name." ".$list->p_contact."</option>";
						
						
					}
					$response['success'] = "success";
					$response['message'] =  $string;
			}
			else
			{
				$response['success'] = "error";
				$response['message'] =  "<div class='col-md-12'><p style='color:green; '><strong>Successfully Added Passanger !</strong></p></div>";
			}
		}
		echo json_encode($response);
	}
	
	public function get_available_package()
	{
					
		$data =$this->db->order_by('p_extra_km_rate','ASC')->get_where('package_detail',array('p_sub_type'=>$this->input->post('sub_type_id'),'p_from_city'=>$this->input->post('package_city'),'p_to_city'=>$this->input->post('b_to_city_id')))->result();
			
		echo '<tr  class="cablisthead"><th width="30%">Vehicle Category-Type</th><th>SEAT</th><th > Rate per Km.</th><th >Estimated Package Rate</th><th ></th></tr>';
		
		//print_r($data);//exit;
		
				$from_city = $this->db->get_where('city_detail',array('id'=>$this->input->post('package_city')))->row();
				$from_city = $from_city->c_name." , ".$from_city->c_state;
						
				$to_city = $this->db->get_where('city_detail',array('id'=>$this->input->post('b_to_city_id')))->row();
				$to_city = $to_city->c_name." , ".$to_city->c_state;
			
				
				$total_distance_km = round($this->General_data->distance($from_city, $to_city));	
				
				//$city_route_list = $this->db->get_where('city_route_list',array('cr_from_city'=>$this->input->post('package_city'),'cr_to_city'=>$this->input->post('b_to_city_id')))->row();		
			
				 
		
		foreach($data as $d)
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

        $date = new DateTime($this->input->post('from_time'));
        $dt2=$date->format('G');	
		
		if($dt2==24 or $dt2==1 or $dt2==2 or $dt2==3 or $dt2==4 or $dt2==5 or $dt2==0 )
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
		
		 	$total_days = 1;
			
		if(($d->p_min_km * $total_days ) > $total_distance_km)
		{
			$estimate_fare_rate = ($d->p_min_km * $total_days) * ($d->p_extra_km_rate);
		}
		else
		{
			$estimate_fare_rate = ($total_distance_km) * ($d->p_extra_km_rate);	
		}
		
		$estimate_fare_rate=$d->p_rate;
		
		/*if($city_route_list->cr_discount_type==0)
		{
			$discount = $city_route_list->cr_discount." %";
			$discount_convert =  ($estimate_fare_rate * $city_route_list->cr_discount)/100;
			$discount_show = $discount_convert." (".$discount.")";
		}
		else
		{
			$discount = "Rs. ".$city_route_list->cr_discount;
			$discount_convert = $city_route_list->cr_discount;
			$discount_show = $discount_convert;
		}*/
		
		
		if($d->p_discount_type==0)
		{
			$discount = $d->p_discount." %";
			$discount_convert =  ($estimate_fare_rate * $d->p_discount)/100;
			$discount_show = $discount_convert." (".$discount.")";
		}
		else
		{
			$discount = "Rs. ".$d->p_discount;
			$discount_convert = $d->p_discount;
			$discount_show = $discount_convert;
		}
		 
				/*if( ($d->p_min_km * $total_days ) > $total_distance_km)
				{
						if($d->p_discount_type==0)
						{
							$chargeable_km = ($d->p_min_km * $total_days)- (($d->p_min_km * $total_days *$d->p_discount)/100);
							$discount = $d->p_discount." %";
						}
						else
						{
							$chargeable_km = ($d->p_min_km * $total_days)- ($d->p_discount);
							$discount = "Rs. ".$d->p_discount;
						}
				 }
				 else
				 {
					  if($d->p_discount_type==0)
						{
							$chargeable_km = ($total_distance_km)- (($total_distance_km * $d->p_discount)/100);
							$discount = $d->p_discount." %";
						}
						else
						{
							$chargeable_km = ($total_distance_km) - ($d->p_discount);
							$discount = "Rs. ".$d->p_discount;
						}
				 }*/
				 
		    $km_rate = $estimate_fare_rate;
		
			
			$total_estimated_rate =  $km_rate - $discount_convert;
				
		 
		  if($d->p_advance_type==0)
		  {
			  $total_advance_rate =  ($d->p_advance * $total_estimated_rate)/100;
		  }
		  else
		  {
			$total_advance_rate = $d->p_advance;
		  }
		  
		  
		 $total_estimated_rate = $total_estimated_rate + $night + ($total_days *$d->p_driver_allowance);
		
		
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
				
		echo '<tr class="cablisting"><th width="30%">'.$this->db->get_where('vehicle_category_detail',array('id'=>$d->p_v_category))->row()->category_name.'<br>'.$vehicle_name = $this->db->get_where('vehicle_detail',array('v_category_id'=>$d->p_v_category))->row()->v_name.'</th><th >'.$no_of_seats.'</th><th> Rs. '.$d->p_extra_km_rate.'</th><th><button type="button" class="btn btn-info popovers" rel="popover" data-trigger="hover" data-total-days="'.$total_days.'" data-total-distance="'.number_format($total_distance_km).'" data-discount="'.$discount_show.'" data-estimate-fare-rate="'.number_format($estimate_fare_rate).'" data-min-km="'.number_format($total_days * $d->p_min_km).'" data-rate-per-km="'.$d->p_extra_km_rate.'" data-min-hr="'.$d->p_min_hr.'" data-rate-per-hr="'.$d->p_extra_hr_rate.'" data-night-charge="'.number_format($night).'" data-driver-allowance="'.number_format($total_days * $d->p_driver_allowance).'" data-tax="'.$final_tax.'" data-driver-allowance-per-day="'.$d->p_driver_allowance.'" data-estimated-rate="'.number_format($total_estimated_rate).'" data-advance="'.number_format($total_advance_rate).'">Rs. '.number_format($total_estimated_rate).'</button><input type="hidden" id="availabe_advance" value="'.number_format($total_advance_rate).'"/><input type="hidden" id="available_night_charge_status" value="'.$night_charge_status.'"/></th><th > <a href="javascript:;" class="btn yellow-crusta button-next" onclick="book_package('.$d->id.','.$total_advance_rate.','.$total_distance_km.','.$estimate_fare_rate.','.$total_days.','.$total_estimated_rate.')" ><i class="fa fa-cab"></i> BOOK CAB </a></th></tr>';
		
		unset($tax);
		} 
		
		}	
		
	public function selected_package_detail()
	{
	
		$this->db->select('package_detail.*,package_type.package_sub_type,package_type.package_type,vehicle_detail.v_name');
		$this->db->from('package_detail');
		$this->db->join('package_type','package_type.id=package_detail.p_sub_type');
		$this->db->join('vehicle_detail','vehicle_detail.v_category_id=package_detail.p_v_category');
		$this->db->where('package_detail.id',$this->input->post('package_id'));
		
		$package_data = $this->db->get()->row();
		
		//print_r($package_data);exit;		
		
		//$city_route_list = $this->db->get_where('city_route_list',array('cr_from_city'=>$package_data->p_from_city,'cr_to_city'=>$this->input->post('b_to_city_id')))->row();
		
		
		date_default_timezone_set('Asia/Kolkata');

        $date = new DateTime($this->input->post('b_from_time'));
        $dt2=$date->format('G');	
		
		if($dt2==24 or $dt2==1 or $dt2==2 or $dt2==3 or $dt2==4 or $dt2==5 or $dt2==0)
		{
			$night=$package_data->p_night_charge;
			$n='';
        }
		else
		{
			$night=0;
			$n='<span class="text-danger">Not Applied</span>';
        }		
		if($package_data->p_ac_status==1)
		{
			$ac_non_ac="AC";
		}
		else
		{
			$ac_non_ac="NON-AC";
		}
		
		/*if($city_route_list->cr_discount_type!=0)
		{
			$discount="Rs ".$city_route_list->cr_discount;
		}
		else
		{
			$discount=$city_route_list->cr_discount." %";
		}*/
		
		if($package_data->p_discount_type!=0)
		{
			$discount="Rs ".$package_data->p_discount;
		}
		else
		{
			$discount=$package_data->p_discount." %";
		}
		
		if($package_data->p_tax_on_package != 0)
		{
				 $tax_arr = explode(',',$package_data->p_tax_on_package);
				 
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
		
		$vahicle_category_name = $this->db->get_where('vehicle_category_detail',array('id'=>$package_data->p_v_category))->row()->category_name;
		
		//$detail[1]='<tr><td >Vehicle Category</td><td>'.$vahicle_category_name.'</td></tr><tr><td >AC/NON-AC</td><td>'.$ac_non_ac.'</td></tr><tr><td>Total Distance</td><td> '.$this->input->post("total_distance").'</td></tr><tr><td>Estimated Rate</td><td> '.$this->input->post("chargeable_km").'</td></tr><tr ><td >Rate Per Km.</td><td  >Rs. '.$package_data->p_extra_km_rate.'</td></tr><tr ><td >Minimum Km</td><td>'.($package_data->p_min_km * $this->input->post("total_days")).'km ('.$package_data->p_min_km.' x '.$this->input->post("total_days").' days).</td></tr>';
		
		
		//$detail[2]='<tr ><td >Night Charge</td><td  >Rs. '.$night.'</td></tr><tr ><td >Driver Allowance</td><td  >Rs. '.$package_data->p_driver_allowance.'</td></tr><tr><td >Discount</td><td> '.$discount.'</td></tr><tr><td>Other Charge</td><td>Rs. 00</td></tr><tr><td>Estimated Total </td><td>Rs. '. $this->input->post("total_estimated_rate").'</td></tr><tr><td>Additional Tax</td><td>'.$final_tax.'</td></tr>'; 
		
		$detail[1]='<tr><td >Vehicle Category</td><td>'.$vahicle_category_name.'</td></tr><tr><td >AC/NON-AC</td><td>'.$ac_non_ac.'</td></tr><tr><td>Total Distance</td><td> '.$this->input->post("total_distance").'</td></tr><tr><td>Estimated Rate</td><td> '.$this->input->post("chargeable_km").'</td></tr><tr ><td >Rate Per Km.</td><td  >Rs. '.$package_data->p_extra_km_rate.'</td></tr><tr ><td >Minimum Km</td><td>'.($package_data->p_min_km * $this->input->post("total_days")).'km </td></tr><tr ><td >Rate Per Hr.</td><td  > Rs. '.$package_data->p_extra_hr_rate.'</td></tr><tr ><td >Minimum Hr.</td><td>'.$package_data->p_min_hr.' Hr.</td></tr>';
		
		
		$detail[2]='<tr><td >Discount</td><td> '.$discount.'</td></tr><tr><td>Other Charge</td><td>Rs. 00</td></tr><tr><td>Estimated Total </td><td>Rs. '. $this->input->post("total_estimated_rate").'</td></tr><tr><td>Additional Tax</td><td>Additional Gov. Tax GST, Toll, Parking, State Tax Charge will be remain.</td></tr>'; 
		
		
             echo json_encode($detail);            	
	}
	
	public function confirm_oneway_booking()
    {
	//	echo "controoler call"; exit;
		$booking_detail_data =  $this->session->userdata('back_booking_data');
		
		if(!empty($booking_detail_data))
		{
			$payment_id = $_GET['payment_id'];
		
		}else
		{
			$payment_id = "";
			$booking_detail_data =  $this->input->post(NULL, TRUE);
		}
		
		//print_r($booking_detail_data);exit;

		
		date_default_timezone_set('Asia/Kolkata');

      	$package_detail = $this->db->get_where('package_detail',array('id'=>$booking_detail_data['package_id']))->row_array();
		
		//$city_route_list = $this->db->get_where('city_route_list',array('cr_from_city'=>$booking_detail_data['b_from_city'],'cr_to_city'=>$booking_detail_data['b_to_city_id']))->row_array();
		
		
		
		
		$booking_detail_array = array(
			'b_pk_id'=>$booking_detail_data['package_id'],
			'b_package_id'=>$package_detail['package_id'],
			'b_vc_id'=>$package_detail['p_v_category'],
			'b_type'=>$package_detail['p_sub_type'],
			'b_ac_non_ac'=>$package_detail['p_ac_status'],
			'b_from_city'=>$booking_detail_data['b_from_city'],
			'b_to_city'=>$booking_detail_data['b_to_city_id'],
			'b_from_date'=>date('Y-m-d',strtotime($booking_detail_data['b_from_date'])),
			'b_from_time'=>date('H:i:s',strtotime($booking_detail_data['b_from_time'])),		
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
			//'b_pk_discount'=>$city_route_list['cr_discount'],			
			//'b_pk_discount_type'=>$city_route_list['cr_discount_type'],
			'b_pk_rate'=>$package_detail['p_rate'],
			'b_pk_rate_per_km'=>$package_detail['p_extra_km_rate'],
			'b_pk_rate_per_hour'=>$package_detail['p_extra_hr_rate'],
			'b_pk_min_km'=>$package_detail['p_min_km'],
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
			'b_payment_id'=>$payment_id,
			'b_source_status'=>1,
			'b_status'=>1
		);
		
		//echo "<pre>";print_r($booking_detail_array);echo"</pre>"; //exit;
		
		$this->db->insert('booking_list',$booking_detail_array);
		$get_last_id=$this->db->insert_id();
		$this->load->model('General_data');
		$this->General_data->update_id('booking_list','RCOWB','b_id');		
	
		$booking_details = $this->db->get_where('booking_list',array('id'=>$get_last_id))->row();
		
		$msg['success'] = 'Last booking reference : '.$booking_details->b_id;
		$this->session->set_flashdata('success',$msg);
		
		//sms and email
		
		$this->db->select('booking_list.*,package_type.package_type,package_type.package_sub_type,city_detail.c_name,payment_type.payment_name');
		$this->db->from('booking_list');
		$this->db->join('package_type','package_type.id=booking_list.b_type');
		$this->db->join('city_detail','city_detail.id=booking_list.b_from_city');
		$this->db->join('payment_type','payment_type.id=booking_list.b_payment_type');
		$this->db->where('booking_list.id',$get_last_id);
		$booking_details = $this->db->get()->row();
		
		
		//send sms
		//$message = 'Dear '.$booking_details->b_p_name.', We have received your booking for '.$booking_details->b_id.', Pick up Date: '.date('d/m/Y',strtotime($booking_details->b_from_date)).', Pick up time: '.date('h:i A',strtotime($booking_details->b_from_time)).', Pick up City: '.$booking_details->c_name.', Trip Type: '.$booking_details->package_type.' '.$booking_details->package_sub_type.'. We will send you the driver details 2-4 hours before start of the trip. We look forward to having you on board. Call Rashmi Cabs on +91 9974 23 4111 for any help.';
		
		$message = 'Hey '.$booking_details->b_p_name.', Your booking with '.$booking_details->b_id.' has been received for '.date('jS M Y',strtotime($booking_details->b_from_date)).', '.date('h:i A',strtotime($booking_details->b_from_time)).'. from '.$booking_details->c_name.'. We look forward to having you onboard. Call Rashmi Cabs on +91 9974234111 for any help.';
		
		$mobile_no = $booking_details->b_p_contact;
		
		$this->Sms_email->send_sms($mobile_no,$message);
		
		$passenger_details=$this->db->get_where('passenger_list',array('id'=>$booking_details->b_p_id))->row();
		
		if($booking_details->b_self_travel_status != 1)
		{
			$mobile_no_2=$passenger_details->p_contact;
			
			//$message_2 = 'Dear '.$passenger_details->p_full_name.', We have received your booking for '.$booking_details->b_id.', Pick up Date: '.date('d/m/Y',strtotime($booking_details->b_from_date)).', Pick up time: '.date('h:i A',strtotime($booking_details->b_from_time)).', Pick up City: '.$booking_details->c_name.', Trip Type: '.$booking_details->package_type.' '.$booking_details->package_sub_type.'. We will send you the driver details 2-4 hours before start of the trip. We look forward to having you on board. Call Rashmi Cabs on +91 9974 23 4111 for any help.';
			
			$message_2 = 'Hey '.$passenger_details->p_full_name.', Your booking with '.$booking_details->b_id.' has been received for '.date('jS M Y',strtotime($booking_details->b_from_date)).', '.date('h:i A',strtotime($booking_details->b_from_time)).'. from '.$booking_details->c_name.'. We look forward to having you onboard. Call Rashmi Cabs on +91 9974234111 for any help.';
			
			$this->Sms_email->send_sms($mobile_no_2,$message_2);
				
		}
		
		
		//send email
		$to      = $passenger_details->p_email_id;
		$subject = 'Rashmi Cabs';
		
		$data['booking_details']=$booking_details;
		$data['passenger_details']=$passenger_details;
		$data['total_estimated_rate']=$booking_detail_data['total_estimated_rate'];
		//$data['message']='We have received your booking for '.$booking_details->b_id.', Pick up Date: '.date('d/m/Y',strtotime($booking_details->b_from_date)).', Pick up time: '.date('h:i A',strtotime($booking_details->b_from_time)).', Pick up City: '.$booking_details->c_name.', Trip Type: '.$booking_details->package_type.' '.$booking_details->package_sub_type.'. We will send you the driver details 2-4 hours before start of the trip. We look forward to having you on board. Call Rashmi Cabs on +91 9974 23 4111 for any help.';
		
 		$message_mail = $this->load->view('mail_booking_confirm',$data,true);
		
		$this->Sms_email->send_email($to, $subject, $message_mail);
		
		
	}
	
}
?>