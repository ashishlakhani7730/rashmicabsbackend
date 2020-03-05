<?php defined('BASEPATH') OR exit('No direct script access allowed');



class Oneway_offer_booking extends CI_Controller 

{

	

	function __construct()

    {

        parent::__construct();

        $this->load->model('General_data');

	    $this->load->model('Sms_email');

	}

	

	public function to_city_list(){

		date_default_timezone_set('Asia/Kolkata');

		

		if(isset($_POST['b_from_city'])){

		

			$data=array();

			$i=1;

			$total=0;

			

			$second_cities = $this->db->get_where('oneway_offer_detail',array('oo_first_city'=>$this->input->post('b_from_city')))->result();

		

			$cities =array();		

			foreach($second_cities as $sc)

			{

				if(!in_array($sc->oo_second_city, $cities))

					$cities[] = $sc->oo_second_city;

				

				if($sc->oo_third_city != 0)

				{

					if(!in_array($sc->oo_third_city, $cities))

					$cities[] = $sc->oo_third_city;

				}

			}		

					

			$third_cities = $this->db->get_where('oneway_offer_detail',array('oo_second_city'=>$this->input->post('b_from_city')))->result();

			

			foreach($third_cities as $tc)

			{

				if($tc->oo_third_city != 0)

				{

					if(!in_array($tc->oo_third_city, $cities))

					$cities[] = $tc->oo_third_city;

				}

			}

			

			//$j=1;

			for($i=0;$i<count($cities);$i++){

				$city = $this->db->get_where('city_detail',array('id'=>$cities[$i]))->row();

					

				$data[$i]=$city;

				

				$total=count($cities);

				//$j++;

			}

			

			$response=array('success'=>'success' ,'message'=>'Successfully Get To City List','total'=>$total, 'to_city_list'=>$data);

		}else{

			$response=array('success'=>'error','message'=>'Parameter Missing');

		}

		echo json_encode($response);

	}

	

	public function get_available_package()

	{

		date_default_timezone_set('Asia/Kolkata');

		if(isset($_POST['from_city']) && isset($_POST['b_to_city_id']) && isset($_POST['from_date']) )

		{			

			//$data =$this->db->get_where('oneway_offer_detail',array('oo_first_city'=>$this->input->post('from_city'),'oo_second_city'=>$this->input->post('b_to_city_id'),'oo_valid_date'=>date('Y-m-d',strtotime($this->input->post('from_date')))))->result();

			//ashish change - 30/10/2018
			$this->db->select("odd.*,ad.a_full_name");
			$this->db->from("oneway_offer_detail odd");
			$this->db->join("agent_detail ad","ad.id = odd.oo_agent_id");
			$this->db->where("odd.oo_first_city",$this->input->post('from_city')); 
			$this->db->where("odd.oo_second_city",$this->input->post('b_to_city_id')); 
			$this->db->where("odd.oo_valid_date",date('Y-m-d',strtotime($this->input->post('from_date'))));
			$this->db->where('odd.id NOT IN (SELECT `b_pk_id` FROM `booking_list`)', NULL, FALSE);
			
			$data = $this->db->get()->result();

			

			

			//$data2 = $this->db->get_where('oneway_offer_detail',array('oo_first_city'=>$this->input->post('from_city'),'oo_third_city'=>$this->input->post('b_to_city_id'),'oo_valid_date'=>date('Y-m-d',strtotime($this->input->post('from_date')))))->result();
			$this->db->select("odd.*,ad.a_full_name");
			$this->db->from("oneway_offer_detail odd");
			$this->db->join("agent_detail ad","ad.id = odd.oo_agent_id");
			$this->db->where("odd.oo_first_city",$this->input->post('from_city')); 
			$this->db->where("odd.oo_third_city",$this->input->post('b_to_city_id')); 
			$this->db->where("odd.oo_valid_date",date('Y-m-d',strtotime($this->input->post('from_date'))));
			$this->db->where('odd.id NOT IN (SELECT `b_pk_id` FROM `booking_list`)', NULL, FALSE);
			
			$data2 = $this->db->get()->result();
				

		    //$data3 = $this->db->get_where('oneway_offer_detail',array('oo_second_city'=>$this->input->post('from_city'),'oo_third_city'=>$this->input->post('b_to_city_id'),'oo_valid_date'=>date('Y-m-d',strtotime($this->input->post('from_date')))))->result();
			$this->db->select("odd.*,ad.a_full_name");
			$this->db->from("oneway_offer_detail odd");
			$this->db->join("agent_detail ad","ad.id = odd.oo_agent_id");
			$this->db->where("odd.oo_second_city",$this->input->post('from_city')); 
			$this->db->where("odd.oo_third_city",$this->input->post('b_to_city_id')); 
			$this->db->where("odd.oo_valid_date",date('Y-m-d',strtotime($this->input->post('from_date'))));
			$this->db->where('odd.id NOT IN (SELECT `b_pk_id` FROM `booking_list`)', NULL, FALSE);
			
			$data3 = $this->db->get()->result();

			//echo '<tr  class="cablisthead"><th width="30%">Vehicle Category-Type</th><th>SEAT</th><th > Rate per Km.</th><th >Estimated Package Rate</th><th ></th></tr>';

		

		

		
		
			$from_city = $this->db->get_where('city_detail',array('id'=>$this->input->post('from_city')))->row();

			$from_city = $from_city->c_name." , ".$from_city->c_state;

						

			$to_city = $this->db->get_where('city_detail',array('id'=>$this->input->post('b_to_city_id')))->row();

			$to_city = $to_city->c_name." , ".$to_city->c_state;

			

				

			$total_distance_km = $this->General_data->distance($from_city, $to_city);			

				

			$total_time = $this->General_data->time_interval($from_city, $to_city);

				

			$total_time = $total_time + 1;	

				// echo $from_city;

				 

				// echo $total_distance_km;

		

				//exit;
	
		$taxdetail2 = $this->db->get_where('tax_detail',array('t_status'=>1))->result();	
		
		foreach($taxdetail2 as $t)
		{
			$tax[] = $t->t_name.'  '.$t->t_value.'%';
		}
		
		$final_tax = implode(" , ",$tax);

			$i=1;

			$total=0;
		
			//$final_tax = implode(" , ",$tax);

			$package_detail=array();
			
			
			foreach($data as $d)
			{

				

				$detail = new stdClass();

				$no_of_seats = $this->db->get_where('vehicle_detail',array('id'=>$d->oo_vt_id))->row()->v_seat_number;

				

				

				date_default_timezone_set('Asia/Kolkata');



        		$date = new DateTime($this->input->post('from_time'));

        

				$km_rate = $d->oo_km_rate * $total_distance_km;

		

			

				$total_estimated_rate =  $km_rate ;

				

				

				//echo '<tr class="cablisting"><th width="30%">'.$this->db->get_where('vehicle_category_detail',array('id'=>$d->oo_vc_id))->row()->category_name.'<br>'.$vehicle_name = $this->db->get_where('vehicle_detail',array('id'=>$d->oo_vt_id))->row()->v_name.'</th><th >'.$no_of_seats.'</th><th> Rs. '.$d->oo_km_rate.'</th><th><button type="button" class="btn btn-info popovers" rel="popover" data-trigger="hover"  data-total-distance="'.number_format($total_distance_km).'" data-rate-per-km="'.$d->oo_km_rate.'" data-rate-per-hr="'.$d->oo_hr_rate.'" data-total-time="'.$total_time.'"  data-estimated-rate="'.number_format($total_estimated_rate).'" >Rs. '.number_format($total_estimated_rate).'</button></th><th > <a href="javascript:;" class="btn yellow-crusta button-next" onclick="book_oneway_offer('.$d->id.','.$total_distance_km.','.$total_estimated_rate.')" ><i class="fa fa-cab"></i> BOOK CAB </a></th></tr>';

				

				$detail->category_name = $this->db->get_where('vehicle_category_detail',array('id'=>$d->oo_vc_id))->row()->category_name;		

				$detail->vehicle_name = $this->db->get_where('vehicle_detail',array('v_category_id'=>$d->oo_vc_id))->row()->v_name;	

				//$detail['v_description'] = $this->db->get_where('vehicle_category_detail',array('id'=>$d->p_v_category))->row()->description;
				
				$detail->no_of_seats = $no_of_seats;

				$detail->p_id = $d->id;

				//$detail['total_days'] = $total_days;

				$detail->total_distance_km = $total_distance_km;

				$detail->p_extra_km_rate = $d->oo_km_rate;

				$detail->p_extra_hr_rate = $d->oo_hr_rate;

				$detail->total_time = $total_time;

				$detail->total_estimated_rate = $total_estimated_rate;

				$detail->valid_from_time = $d->oo_valid_from_time;

				$detail->valid_to_time = $d->oo_valid_to_time;
				
				$detail->total_advance_rate = 0;
				
				$detail->final_tax = "Additional Gov. Tax GST, Toll, Parking, State Tax Charge will be remain."; //$final_tax;

				$vehicle_list=$this->db->get_where('vehicle_list',array('id'=>$d->oo_vehicle_id))->row();

				

				$detail->v_profile_pic = '';

				$detail->v_profile_pic_path = '';

				/*if(!empty($vehicle_list) && !empty($vehicle_list->v_profile_pic)){

					$detail['v_profile_pic'] = $vehicle_list->v_profile_pic;

					$detail['v_profile_pic_path'] = base_url().'uploads/vehicle/profile_pic/'.$vehicle_list->v_profile_pic; 

				}else{*/

					$vehicle_category=$this->db->get_where('vehicle_category_detail',array('id'=>$d->oo_vc_id))->row();

					if(!empty($d->oo_vc_id) && !empty($vehicle_category) && !empty($vehicle_category->c_profile_pic)){

						$detail->v_profile_pic=$vehicle_category->c_profile_pic;

						$detail->v_profile_pic_path =base_url().'uploads/category/profile_pic/'.$vehicle_category->c_profile_pic;

					}
					else
					{
						/*if(!empty($vehicle_list) && !empty($vehicle_list->v_profile_pic)){

							$detail['v_profile_pic'] = $vehicle_list->v_profile_pic;

							$detail['v_profile_pic_path'] = base_url().'uploads/vehicle/profile_pic/'.$vehicle_list->v_profile_pic; 

						}*/
					}

				//}

				
				$package_detail[] = $detail;
				
				
				$total=$i;

				$i++;

		

			}

			foreach($data2 as $d)
			{

				

				$detail = new stdClass();

				$no_of_seats = $this->db->get_where('vehicle_detail',array('id'=>$d->oo_vt_id))->row()->v_seat_number;

				

				

				date_default_timezone_set('Asia/Kolkata');



        		$date = new DateTime($this->input->post('from_time'));

        

				$km_rate = $d->oo_km_rate * $total_distance_km;

		

			

				$total_estimated_rate =  $km_rate ;

				

				

				//echo '<tr class="cablisting"><th width="30%">'.$this->db->get_where('vehicle_category_detail',array('id'=>$d->oo_vc_id))->row()->category_name.'<br>'.$vehicle_name = $this->db->get_where('vehicle_detail',array('id'=>$d->oo_vt_id))->row()->v_name.'</th><th >'.$no_of_seats.'</th><th> Rs. '.$d->oo_km_rate.'</th><th><button type="button" class="btn btn-info popovers" rel="popover" data-trigger="hover"  data-total-distance="'.number_format($total_distance_km).'" data-rate-per-km="'.$d->oo_km_rate.'" data-rate-per-hr="'.$d->oo_hr_rate.'" data-total-time="'.$total_time.'"  data-estimated-rate="'.number_format($total_estimated_rate).'" >Rs. '.number_format($total_estimated_rate).'</button></th><th > <a href="javascript:;" class="btn yellow-crusta button-next" onclick="book_oneway_offer('.$d->id.','.$total_distance_km.','.$total_estimated_rate.')" ><i class="fa fa-cab"></i> BOOK CAB </a></th></tr>';

				

				$detail->category_name = $this->db->get_where('vehicle_category_detail',array('id'=>$d->oo_vc_id))->row()->category_name;		

				$detail->vehicle_name = $this->db->get_where('vehicle_detail',array('v_category_id'=>$d->oo_vc_id))->row()->v_name;	

				//$detail['v_description'] = $this->db->get_where('vehicle_category_detail',array('id'=>$d->p_v_category))->row()->description;
				
				$detail->no_of_seats = $no_of_seats;

				$detail->p_id = $d->id;

				//$detail['total_days'] = $total_days;

				$detail->total_distance_km = $total_distance_km;

				$detail->p_extra_km_rate = $d->oo_km_rate;

				$detail->p_extra_hr_rate = $d->oo_hr_rate;

				$detail->total_time = $total_time;

				$detail->total_estimated_rate = $total_estimated_rate;

				$detail->valid_from_time = $d->oo_valid_from_time;

				$detail->valid_to_time = $d->oo_valid_to_time;
				
				$detail->total_advance_rate = 0;
				
				$detail->final_tax = "Additional Gov. Tax GST, Toll, Parking, State Tax Charge will be remain."; //$final_tax;

				$vehicle_list=$this->db->get_where('vehicle_list',array('id'=>$d->oo_vehicle_id))->row();

				

				$detail->v_profile_pic = '';

				$detail->v_profile_pic_path = '';

				/*if(!empty($vehicle_list) && !empty($vehicle_list->v_profile_pic)){

					$detail['v_profile_pic'] = $vehicle_list->v_profile_pic;

					$detail['v_profile_pic_path'] = base_url().'uploads/vehicle/profile_pic/'.$vehicle_list->v_profile_pic; 

				}else{*/

					$vehicle_category=$this->db->get_where('vehicle_category_detail',array('id'=>$d->oo_vc_id))->row();

					if(!empty($d->oo_vc_id) && !empty($vehicle_category) && !empty($vehicle_category->c_profile_pic)){

						$detail->v_profile_pic=$vehicle_category->c_profile_pic;

						$detail->v_profile_pic_path =base_url().'uploads/category/profile_pic/'.$vehicle_category->c_profile_pic;

					}
					else
					{
						/*if(!empty($vehicle_list) && !empty($vehicle_list->v_profile_pic)){

							$detail['v_profile_pic'] = $vehicle_list->v_profile_pic;

							$detail['v_profile_pic_path'] = base_url().'uploads/vehicle/profile_pic/'.$vehicle_list->v_profile_pic; 

						}*/
					}

				//}

				
				$package_detail[] = $detail;
				
				
				$total=$i;

				$i++;

		

			}

			foreach($data3 as $d)
			{

				

				$detail = new stdClass();

				$no_of_seats = $this->db->get_where('vehicle_detail',array('id'=>$d->oo_vt_id))->row()->v_seat_number;

				

				

				date_default_timezone_set('Asia/Kolkata');



        		$date = new DateTime($this->input->post('from_time'));

        

				$km_rate = $d->oo_km_rate * $total_distance_km;

		

			

				$total_estimated_rate =  $km_rate ;

				

				

				//echo '<tr class="cablisting"><th width="30%">'.$this->db->get_where('vehicle_category_detail',array('id'=>$d->oo_vc_id))->row()->category_name.'<br>'.$vehicle_name = $this->db->get_where('vehicle_detail',array('id'=>$d->oo_vt_id))->row()->v_name.'</th><th >'.$no_of_seats.'</th><th> Rs. '.$d->oo_km_rate.'</th><th><button type="button" class="btn btn-info popovers" rel="popover" data-trigger="hover"  data-total-distance="'.number_format($total_distance_km).'" data-rate-per-km="'.$d->oo_km_rate.'" data-rate-per-hr="'.$d->oo_hr_rate.'" data-total-time="'.$total_time.'"  data-estimated-rate="'.number_format($total_estimated_rate).'" >Rs. '.number_format($total_estimated_rate).'</button></th><th > <a href="javascript:;" class="btn yellow-crusta button-next" onclick="book_oneway_offer('.$d->id.','.$total_distance_km.','.$total_estimated_rate.')" ><i class="fa fa-cab"></i> BOOK CAB </a></th></tr>';

				

				$detail->category_name = $this->db->get_where('vehicle_category_detail',array('id'=>$d->oo_vc_id))->row()->category_name;		

				$detail->vehicle_name = $this->db->get_where('vehicle_detail',array('v_category_id'=>$d->oo_vc_id))->row()->v_name;	

				//$detail['v_description'] = $this->db->get_where('vehicle_category_detail',array('id'=>$d->p_v_category))->row()->description;
				
				$detail->no_of_seats = $no_of_seats;

				$detail->p_id = $d->id;

				//$detail['total_days'] = $total_days;

				$detail->total_distance_km = $total_distance_km;

				$detail->p_extra_km_rate = $d->oo_km_rate;

				$detail->p_extra_hr_rate = $d->oo_hr_rate;

				$detail->total_time = $total_time;

				$detail->total_estimated_rate = $total_estimated_rate;

				$detail->valid_from_time = $d->oo_valid_from_time;

				$detail->valid_to_time = $d->oo_valid_to_time;
				
				$detail->total_advance_rate = 0;
				
				$detail->final_tax = "Additional Gov. Tax GST, Toll, Parking, State Tax Charge will be remain."; //$final_tax;

				$vehicle_list=$this->db->get_where('vehicle_list',array('id'=>$d->oo_vehicle_id))->row();

				

				$detail->v_profile_pic = '';

				$detail->v_profile_pic_path = '';

				/*if(!empty($vehicle_list) && !empty($vehicle_list->v_profile_pic)){

					$detail['v_profile_pic'] = $vehicle_list->v_profile_pic;

					$detail['v_profile_pic_path'] = base_url().'uploads/vehicle/profile_pic/'.$vehicle_list->v_profile_pic; 

				}else{*/

					$vehicle_category=$this->db->get_where('vehicle_category_detail',array('id'=>$d->oo_vc_id))->row();

					if(!empty($d->oo_vc_id) && !empty($vehicle_category) && !empty($vehicle_category->c_profile_pic)){

						$detail->v_profile_pic=$vehicle_category->c_profile_pic;

						$detail->v_profile_pic_path =base_url().'uploads/category/profile_pic/'.$vehicle_category->c_profile_pic;

					}
					else
					{
						/*if(!empty($vehicle_list) && !empty($vehicle_list->v_profile_pic)){

							$detail['v_profile_pic'] = $vehicle_list->v_profile_pic;

							$detail['v_profile_pic_path'] = base_url().'uploads/vehicle/profile_pic/'.$vehicle_list->v_profile_pic; 

						}*/
					}


				//}

				
				$package_detail[] = $detail;
				
				
				$total=$i;

				$i++;

		

			}
			
			
			$tid = intval(1);	

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
	
	public function request_oneway_offer_booking()
	{
			$payment_id = "";

			$booking_detail_data =  $this->input->post(NULL, TRUE);
			
			// here validation check for time between from and to.
			// here used exit(); becouse in another way to call this controller function thats why.
			date_default_timezone_set('Asia/Kolkata');
			$trip_start_time = date('H:i:s',strtotime($booking_detail_data['b_from_time']));
		
			$this->db->select("oo_id,oo_valid_from_time,oo_valid_to_time");
			$this->db->from("oneway_offer_detail");
			$this->db->where("id", $booking_detail_data['package_id']);
			$this->db->where("(oo_valid_from_time <= '$trip_start_time' AND oo_valid_to_time >= '$trip_start_time')");
	
		
			$query = $this->db->get();
			$ids = $query->result();
		
			if(empty($ids))
			{
				$this->db->reset_query();
				$this->db->select("oo_id,oo_valid_from_time,oo_valid_to_time");
				$this->db->from("oneway_offer_detail");
				$this->db->where("id", $booking_detail_data['package_id']);
				
				$query2 = $this->db->get();
				$ids2 = $query2->row_array();
				
				$res = array(
					   "error" => 1,
					   "message" => "Please Select Trip Start Time Between ".date('h:i A',strtotime($ids2['oo_valid_from_time']))." TO ".date('h:i A',strtotime($ids2['oo_valid_to_time']))
					   );
				echo json_encode($res);
				exit();
			}
			
			
      	$oneway_offer_detail = $this->db->get_where('oneway_offer_detail',array('id'=>$booking_detail_data['package_id']))->row_array();
		
		//here we add booking taxtype for booking process.
		$taxget = $this->db->select("id")->from("tax_detail")->where("t_status",1)->get()->result();
		foreach($taxget as $key => $value)
		$taxarr[] = $value->id;
			
		$finaltax = implode(",",$taxarr);
			
		$booking_request_detail_array = array(

			'b_pk_id'=>$booking_detail_data['package_id'],
                                                         
			'b_package_id'=>$oneway_offer_detail['oo_id'],
                                                         
			'b_vc_category_id'=>$oneway_offer_detail['oo_vc_id'],
                                                         
			'b_vehicle_id'=>$oneway_offer_detail['oo_vt_id'],
                                                         
			'b_agent_id'=>$oneway_offer_detail['oo_agent_id'],
                                                         
			'b_vc_id'=>$oneway_offer_detail['oo_vc_id'], 
                                                         
			'b_type'=>1,                                 
                                                         
			'b_ac_non_ac'=>0,                            
                                                         
			'b_from_city'=>$booking_detail_data['b_from_city'],
                                                         
			'b_to_city'=>$booking_detail_data['b_to_city_id'],
                                                         
			'b_from_date'=>date('Y-m-d',strtotime($oneway_offer_detail['oo_valid_date'])),
                                                         
			'b_from_time'=>date('H:i:s',strtotime($booking_detail_data['b_from_time'])),
                                                         
			'b_oo_valid_from_time'=>date('H:i:s',strtotime($booking_detail_data['valid_from_time'])),
                                                         
			'b_oo_valid_to_time'=>date('H:i:s',strtotime($booking_detail_data['valid_to_time'])),
                                                         
			'b_p_id'=>$booking_detail_data['b_p_id'],    
                                                         
			'b_p_name'=>$booking_detail_data['b_p_name'],
                                                         
			'b_p_contact'=>$booking_detail_data['b_p_contact'],
                                                         
			'b_pickup_point'=>$booking_detail_data['b_pickup_point'],
                                                         
			'b_drop_point'=>$booking_detail_data['b_drop_point'],			
                                                         
			'b_payment_type'=>$booking_detail_data['b_payment_type'],
                                                         
			'b_advance'=>$booking_detail_data['b_advance'],
                                                         
			'b_pk_driver_allowance'=>0,			         
                                                         
			'b_pk_discount'=>0,			                 
                                                         
			'b_pk_discount_type'=>0,                     
                                                         
			'b_pk_rate'=>$booking_detail_data['total_estimated_rate'],                              
                                                         
			'b_pk_rate_per_km'=>$oneway_offer_detail['oo_km_rate'],
                                                         
			'b_pk_rate_per_hour'=>$oneway_offer_detail['oo_hr_rate'],
                                                         
			'b_pk_min_km'=>$booking_detail_data['total_estimated_distance'],
                                                         
			'b_pk_min_hour'=>$booking_detail_data['total_estimated_time'],
                                                         
			'b_total_hour'=>$booking_detail_data['total_estimated_time'],
                                                         
			'b_pk_night_charge'=>0,                      
                                                         
			'b_chargeable_km'=>0,                        
                                                         
			'b_estimated_distance'=>$booking_detail_data['total_estimated_distance'],
			                                             
			'b_estimated_rate'=> $booking_detail_data['total_estimated_rate'],
                                                         
			'b_night_charge_status'=>0,                  
                                                         
			'b_self_travel_status'=>$booking_detail_data['b_self_travel_status'],
                                                         
			'b_remarks'=>$booking_detail_data['b_remarks'],
                                                         
			'b_booking_date_time'=>date("Y-m-d H:i:s"),  
                                                         
			'b_payment_id'=>$booking_detail_data['payment_id'],
                                                         
			'b_source_status'=>1,                  
			
			'b_tax_type' => $finaltax,
                                                         
			'b_status'=>2 // for pending request         
                                                         
		);                                               
		                                                 
		$this->db->insert('booking_request_list',$booking_request_detail_array);
		                                                 
		$get_last_id=$this->db->insert_id();             
                                                         
		$this->load->model('General_data');              
		// RCBRI - rashmi cab booking request ID.        
		$this->General_data->update_id('booking_request_list','RCBRI','b_id');	
		                                                 
		$res = ($this->db->affected_rows() != 1) ? false : true;
		//echo $res;                                     
		if($res)                                         
		{                                                
		   //$result = array("error"=>0,"message"=>"Your Request Submited Successfully","booking_ref_no"=>"RCBRI".$get_last_id);
		   $result = array("error"=>0,"message"=>"RCBRI".$get_last_id);
		}                                                
		else                                             
		{                                                
			$result = array("error"=>1,"message"=>"Somthing Went To Wrong In Oneway Offer Request!");
		}                                                
		                                                 
		echo json_encode($result);                       
	}  
	
	/* not used here...
	public function oneway_offer_request_list()
	{
		$passenger_id = $this->input->post("passenger_id");
		if(isset($passenger_id) && $passenger_id != '')
		{
			
			$this->db->select('booking_request_list.b_id,booking_request_list.b_from_date,booking_request_list.b_from_time,booking_request_list.b_status,package_type.package_sub_type,package_type.package_type,city_detail.c_name AS fromcity,cd.c_name AS tocity,v.v_name,vc.category_name');

			$this->db->from('booking_request_list');

			$this->db->join('package_type','package_type.id=booking_request_list.b_type');

			$this->db->join('city_detail','city_detail.id=booking_request_list.b_from_city');
			
			$this->db->join('city_detail cd','cd.id=booking_request_list.b_to_city');
			
			$this->db->join('vehicle_detail v','v.id = booking_request_list.b_vehicle_id');
			
			$this->db->join('vehicle_category_detail vc','vc.id = booking_request_list.b_vc_category_id');

			$this->db->where('package_type.id',1);
			
			$this->db->where('booking_request_list.b_p_id',$passenger_id);
			
			$query = $this->db->get();
			
			$request_detail=array();
			
			if ($query->num_rows()) {
				$response['success'] = 'success'; 
				$response['message'] = 'Successfully Get To Onewayoffer Requestlist'; 
				
				foreach($query->result() as $index => $details)
				{
					$request_detail[$index]['request_id'] = $details->b_id;
					$request_detail[$index]['status'] = $details->b_status;
					$request_detail[$index]['route'] = $details->fromcity."-".$details->tocity;
					$request_detail[$index]['package'] = $details->package_sub_type;
					$request_detail[$index]['car_type'] = $details->category_name;
					$request_detail[$index]['car_name'] = $details->v_name;
					$request_detail[$index]['date'] = $details->b_from_date;
					$request_detail[$index]['time'] = date('h:i a',strtotime($details->b_from_time));
				}
				
				$response['request_list'] = $request_detail;
			}
			else
			{
				$response['success'] = 'success'; 
				$response['message'] = 'No Any Request Found'; 
				$response['request_list'] = $request_detail;
			}	
		}
		else
		{
			$response['error'] = '1';                
                                                         
			$response['message'] = 'Filed Are Missing';   
		}
		
		$this->output->set_content_type('application/json');
		$this->output->set_output(json_encode($response));
	}
    */
	
	public function confirm_oneway_offer_booking()       
                                                         
    {                                                    
                                                         
		//	echo "controoler call"; exit;                
                                                         
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
                                                         
		                                                 
                                                         
		date_default_timezone_set('Asia/Kolkata');       
                                                         
                                                         
                                                         
      	$oneway_offer_detail = $this->db->get_where('oneway_offer_detail',array('id'=>$booking_detail_data['package_id']))->row_array();
                                                         
		                                                 
                                                         
		//$city_route_list = $this->db->get_where('city_route_list',array('cr_from_city'=>$booking_detail_data['b_from_city'],'cr_to_city'=>$booking_detail_data['b_to_city_id']))->row_array();
                                                         
		                                                 
                                                         
		                                                 
                                                         
		$booking_detail_array = array(                   
                                                         
			'b_pk_id'=>$booking_detail_data['package_id'],
                                                         
			'b_package_id'=>$oneway_offer_detail['oo_id'],
                                                         
			'b_vc_category_id'=>$oneway_offer_detail['oo_vc_id'],
                                                         
			'b_vehicle_id'=>$oneway_offer_detail['oo_vt_id'],
                                                         
			'b_agent_id'=>$oneway_offer_detail['oo_agent_id'],
                                                         
			'b_vc_id'=>$oneway_offer_detail['oo_vc_id'], 
                                                         
			'b_type'=>1,                                 
                                                         
			'b_ac_non_ac'=>0,                            
                                                         
			'b_from_city'=>$booking_detail_data['b_from_city'],
                                                         
			'b_to_city'=>$booking_detail_data['b_to_city_id'],
                                                         
			'b_from_date'=>date('Y-m-d',strtotime($oneway_offer_detail['oo_valid_date'])),
                                                         
			'b_from_time'=>date('H:i:s',strtotime($booking_detail_data['b_from_time'])),
                                                         
			'b_oo_valid_from_time'=>date('H:i:s',strtotime($booking_detail_data['valid_from_time'])),
                                                         
			'b_oo_valid_to_time'=>date('H:i:s',strtotime($booking_detail_data['valid_to_time'])),
                                                         
			'b_p_id'=>$booking_detail_data['b_p_id'],    
                                                         
			'b_p_name'=>$booking_detail_data['b_p_name'],
                                                         
			'b_p_contact'=>$booking_detail_data['b_p_contact'],
                                                         
			'b_pickup_point'=>$booking_detail_data['b_pickup_point'],
                                                         
			'b_drop_point'=>$booking_detail_data['b_drop_point'],			
                                                         
			'b_payment_type'=>$booking_detail_data['b_payment_type'],
                                                         
			'b_advance'=>$booking_detail_data['b_advance'],
                                                         
			'b_pk_driver_allowance'=>0,			         
                                                         
			'b_pk_discount'=>0,			                 
                                                         
			'b_pk_discount_type'=>0,                     
                                                         
			'b_pk_rate'=>$booking_detail_data['total_estimated_rate'],                              
                                                         
			'b_pk_rate_per_km'=>$oneway_offer_detail['oo_km_rate'],
                                                         
			'b_pk_rate_per_hour'=>$oneway_offer_detail['oo_hr_rate'],
                                                         
			'b_pk_min_km'=>$booking_detail_data['total_estimated_distance'],
                                                         
			'b_pk_min_hour'=>$booking_detail_data['total_estimated_time'],
                                                         
			'b_total_hour'=>$booking_detail_data['total_estimated_time'],
                                                         
			'b_pk_night_charge'=>0,                      
                                                         
			'b_chargeable_km'=>0,                        
                                                         
			'b_estimated_distance'=>$booking_detail_data['total_estimated_distance'],
			                                             
			'b_estimated_rate'=> $booking_detail_data['total_estimated_rate'],
                                                         
			'b_night_charge_status'=>0,                  
                                                         
			'b_self_travel_status'=>$booking_detail_data['b_self_travel_status'],
                                                         
			'b_remarks'=>$booking_detail_data['b_remarks'],
                                                         
			'b_booking_date_time'=>date("Y-m-d H:i:s"),  
                                                         
			'b_payment_id'=>$booking_detail_data['payment_id'],
                                                         
			'b_source_status'=>1,                        
                                                         
			'b_status'=>1                                
                                                         
		);                                               
                                                         
		                                                 
                                                         
		//echo "<pre>";print_r($booking_detail_array);echo"</pre>"; //exit;
                                                         
		                                                 
                                                         
		$this->db->insert('booking_list',$booking_detail_array);
                                                         
		$get_last_id=$this->db->insert_id();             
                                                         
		$this->load->model('General_data');              
                                                         
		$this->General_data->update_id('booking_list','RCOWB','b_id');		
                                                         
	                                                     
                                                         
		                                                 
                                                         
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
                                                         
		                                                 
                                                         
		//to agent                                       
                                                         
		                                                 
                                                         
		$agent_details=$this->db->get_where('agent_detail',array('id'=>$booking_details->b_agent_id))->row();
                                                         
		                                                 
                                                         
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
                                                         
		                                                 
                                                         
		                                                 
                                                         
		$response['success'] = 'success';                
                                                         
		$response['message'] = $booking_details->b_id;   
                                                         
		                                                 
                                                         
		                                                 
                                                         
		echo json_encode($response);                     
                                                         
	}                                                    
                                                         
	                                                     
                                                         
}                                                        
                                                         
                                                         