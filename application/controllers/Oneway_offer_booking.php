<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Oneway_offer_booking extends CI_Controller 
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

		

		$data['passenger_list'] = $this->db->get('passenger_list')->result();

		 				

		$this->load->view('oneway',$data);

		}

	}

	public function fetch_available_city_routes()

	{

				

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

		

		$i=0;

		

		//echo "<pre>";print_r($cities);echo "</pre>";exit;

		

		/*echo "<option value=''>Select City</option>";

		foreach($cities as $c)

		{

			echo "<option value='".$c->cr_to_city."'>".$this->db->get_where('city_detail',array('id'=>$c[$i]))->row()->c_name."</option>";

			$i++;

		}*/

		

		echo "<option value=''>Select City</option>";

		for($i=0;$i<count($cities);$i++){

			echo "<option value='".$cities[$i]."'>".$this->db->get_where('city_detail',array('id'=>$cities[$i]))->row()->c_name."</option>";

		}

	

	}

	

	public function add_passenger()

	{

		

		$data=$this->input->post(NULL,true);





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

		

			$passenger_detail = $this->db->get('passenger_list')->result();

				

				foreach($passenger_detail as $list)

				{

					

					echo "<option value='".$list->id."' p_full_name='".$list->p_full_name."' p_contact='".$list->p_contact."'>".$list->p_full_name." ".$list->p_contact."</option>";

					

					

				}

				

		}

		else

		{

			echo "<div class='col-md-12'>

									<p style='color:green; '><strong>Successfully Added Passanger !</strong></p>

								</div>";

		}

		

	}

	

	public function get_available_package()

	{

			

			date_default_timezone_set('Asia/Kolkata');		

			
			//old query
			//$data =$this->db->get_where('oneway_offer_detail',array('oo_first_city'=>$this->input->post('package_city'),'oo_second_city'=>$this->input->post('b_to_city_id'),'oo_valid_date'=>date('Y-m-d',strtotime($this->input->post('from_date')))))->result();
			
			//ashish change - 18/10/2018
			$this->db->select("odd.*,ad.a_full_name");
			$this->db->from("oneway_offer_detail odd");
			$this->db->join("agent_detail ad","ad.id = odd.oo_agent_id");
			$this->db->where("odd.oo_first_city",$this->input->post('package_city')); 
			$this->db->where("odd.oo_second_city",$this->input->post('b_to_city_id')); 
			$this->db->where("odd.oo_valid_date",date('Y-m-d',strtotime($this->input->post('from_date'))));
			$this->db->where('odd.id NOT IN (SELECT `b_pk_id` FROM `booking_list`)', NULL, FALSE);
			
			$data = $this->db->get()->result();
			
			//echo "<pre>";print_r($data); exit;
			
			//old query
			//$data2 = $this->db->get_where('oneway_offer_detail',array('oo_first_city'=>$this->input->post('package_city'),'oo_third_city'=>$this->input->post('b_to_city_id'),'oo_valid_date'=>date('Y-m-d',strtotime($this->input->post('from_date')))))->result();
	
			//ashish change - 18/10/2018
			$this->db->select("odd.*,ad.a_full_name");
			$this->db->from("oneway_offer_detail odd");
			$this->db->join("agent_detail ad","ad.id = odd.oo_agent_id");
			$this->db->where("odd.oo_first_city",$this->input->post('package_city')); 
			$this->db->where("odd.oo_third_city",$this->input->post('b_to_city_id')); 
			$this->db->where("odd.oo_valid_date",date('Y-m-d',strtotime($this->input->post('from_date'))));
			$this->db->where('odd.id NOT IN (SELECT `b_pk_id` FROM `booking_list`)', NULL, FALSE);
			
			$data2 = $this->db->get()->result();
			
			//used for second city to thried city search one way offer cab.
			$this->db->select("odd.*,ad.a_full_name");
			$this->db->from("oneway_offer_detail odd");
			$this->db->join("agent_detail ad","ad.id = odd.oo_agent_id");
			$this->db->where("odd.oo_second_city",$this->input->post('package_city')); 
			$this->db->where("odd.oo_third_city",$this->input->post('b_to_city_id')); 
			$this->db->where("odd.oo_valid_date",date('Y-m-d',strtotime($this->input->post('from_date'))));
			$this->db->where('odd.id NOT IN (SELECT `b_pk_id` FROM `booking_list`)', NULL, FALSE);
			
			$data3 = $this->db->get()->result();
				

					

		echo '<tr  class="cablisthead"><th width="30%">Vehicle Category-Type</th><th>Agent</th><th>SEAT</th><th > Rate per Km.</th><th >Estimated Package Rate</th><th ></th></tr>';

		

		

		

				$from_city = $this->db->get_where('city_detail',array('id'=>$this->input->post('package_city')))->row();

				$from_city = $from_city->c_name." , ".$from_city->c_state;

						

				$to_city = $this->db->get_where('city_detail',array('id'=>$this->input->post('b_to_city_id')))->row();

				$to_city = $to_city->c_name." , ".$to_city->c_state;

			

				

				$total_distance_km = $this->General_data->distance($from_city, $to_city);			

				

				$total_time = $this->General_data->time_interval($from_city, $to_city);

				

				$total_time = $total_time + 1;	

				// echo $from_city;

				 

				// echo $total_distance_km;

		

				//exit;

		$taxdetail = $this->db->get_where('tax_detail',array('t_status'=>1))->result();	
		
		foreach($taxdetail as $t)
		{
			$tax[] = $t->t_name.'  '.$t->t_value.'%';
		}
		
		$final_tax = implode(" , ",$tax);

		foreach($data as $key => $d)

		{

				

				

		$no_of_seats = $this->db->get_where('vehicle_detail',array('id'=>$d->oo_vt_id))->row()->v_seat_number;

				

				

		date_default_timezone_set('Asia/Kolkata');



        $date = new DateTime($this->input->post('from_time'));

        

		$km_rate = $d->oo_km_rate * $total_distance_km;

		

			

			$total_estimated_rate =  $km_rate ;

				

				

		echo '<tr class="cablisting"><th width="30%">'.$this->db->get_where('vehicle_category_detail',array('id'=>$d->oo_vc_id))->row()->category_name.'<br>'.$vehicle_name = $this->db->get_where('vehicle_detail',array('v_category_id'=>$d->oo_vc_id))->row()->v_name.'<br><b style="color:red">Valid Time - '.date("h:i A",strtotime($d->oo_valid_from_time)).' To '.date("h:i A",strtotime($d->oo_valid_to_time)).'</th><th>'.$data[$key]->a_full_name.'</th><th >'.$no_of_seats.'</th><th> Rs. '.$d->oo_km_rate.'</th><th>

		

		

		<button type="button" class="btn btn-info popovers" rel="popover" data-trigger="hover"  data-total-distance="'.number_format($total_distance_km).'" data-rate-per-km="'.$d->oo_km_rate.'" data-rate-per-hr="'.$d->oo_hr_rate.'"  data-total-time="'.$total_time.'" data-tax="'.$final_tax.'" data-estimated-rate="'.number_format($total_estimated_rate).'" >Rs. '.number_format($total_estimated_rate).'</button>

		

		

		</th><th > <a href="javascript:;" class="btn yellow-crusta button-next" onclick="book_oneway_offer('.$d->id.','.$total_distance_km.','.$total_estimated_rate.','.$total_time.')" ><i class="fa fa-cab"></i> BOOK CAB </a></th></tr>';

		

		

		} 

		
		

		

		foreach($data2 as $keys => $d)

		{

				

				

		$no_of_seats = $this->db->get_where('vehicle_detail',array('id'=>$d->oo_vt_id))->row()->v_seat_number;

				

				

		date_default_timezone_set('Asia/Kolkata');



        $date = new DateTime($this->input->post('from_time'));

        

		$km_rate = $d->oo_km_rate * $total_distance_km;

		

			

			$total_estimated_rate =  $km_rate ;

				

				

		echo '<tr class="cablisting"><th width="30%">'.$this->db->get_where('vehicle_category_detail',array('id'=>$d->oo_vc_id))->row()->category_name.'<br>'.$vehicle_name = $this->db->get_where('vehicle_detail',array('id'=>$d->oo_vt_id))->row()->v_name.'<br><b style="color:red">Valid Time - '.date("h:i A",strtotime($d->oo_valid_from_time)).' To '.date("h:i A",strtotime($d->oo_valid_to_time)).'</th><th>'.$data2[$keys]->a_full_name.'</th><th >'.$no_of_seats.'</th><th> Rs. '.$d->oo_km_rate.'</th><th>

		

		

		<button type="button" class="btn btn-info popovers" rel="popover" data-trigger="hover"  data-total-distance="'.number_format($total_distance_km).'" data-rate-per-km="'.$d->oo_km_rate.'" data-rate-per-hr="'.$d->oo_hr_rate.'" data-total-time="'.$total_time.'"  data-tax="'.$final_tax.'" data-estimated-rate="'.number_format($total_estimated_rate).'" >Rs. '.number_format($total_estimated_rate).'</button>

		

		

		</th><th > <a href="javascript:;" class="btn yellow-crusta button-next" onclick="book_oneway_offer('.$d->id.','.$total_distance_km.','.$total_estimated_rate.')" ><i class="fa fa-cab"></i> BOOK CAB </a></th></tr>';

		

		

		} 
		
		foreach($data3 as $keys => $d)

		{

				

				

		$no_of_seats = $this->db->get_where('vehicle_detail',array('id'=>$d->oo_vt_id))->row()->v_seat_number;

				

				

		date_default_timezone_set('Asia/Kolkata');



        $date = new DateTime($this->input->post('from_time'));

        

		$km_rate = $d->oo_km_rate * $total_distance_km;

		

			

			$total_estimated_rate =  $km_rate ;

				

				

		echo '<tr class="cablisting"><th width="30%">'.$this->db->get_where('vehicle_category_detail',array('id'=>$d->oo_vc_id))->row()->category_name.'<br>'.$vehicle_name = $this->db->get_where('vehicle_detail',array('id'=>$d->oo_vt_id))->row()->v_name.'<br><b style="color:red">Valid Time - '.date("h:i A",strtotime($d->oo_valid_from_time)).' To '.date("h:i A",strtotime($d->oo_valid_to_time)).'</th><th>'.$data3[$keys]->a_full_name.'</th><th >'.$no_of_seats.'</th><th> Rs. '.$d->oo_km_rate.'</th><th>

		

		

		<button type="button" class="btn btn-info popovers" rel="popover" data-trigger="hover"  data-total-distance="'.number_format($total_distance_km).'" data-rate-per-km="'.$d->oo_km_rate.'" data-rate-per-hr="'.$d->oo_hr_rate.'" data-total-time="'.$total_time.'"  data-tax="'.$final_tax.'" data-estimated-rate="'.number_format($total_estimated_rate).'" >Rs. '.number_format($total_estimated_rate).'</button>

		

		

		</th><th > <a href="javascript:;" class="btn yellow-crusta button-next" onclick="book_oneway_offer('.$d->id.','.$total_distance_km.','.$total_estimated_rate.')" ><i class="fa fa-cab"></i> BOOK CAB </a></th></tr>';

		

		

		}

		

		}

		

		

		public function selected_package_detail()

	{

	

		date_default_timezone_set('Asia/Kolkata');		

			

		$offer_data =$this->db->get_where('oneway_offer_detail',array('id'=>$this->input->post('package_id')))->row();

		$this->db->select('package_detail.*,package_type.package_sub_type,package_type.package_type,vehicle_detail.v_name');
		$this->db->from('package_detail');
		$this->db->join('package_type','package_type.id=package_detail.p_sub_type');
		$this->db->join('vehicle_detail','vehicle_detail.v_category_id=package_detail.p_v_category');
		$this->db->where('package_detail.id',$this->input->post('package_id'));
		
		$package_data = $this->db->get()->row();

		

		$vehicle_category_name = $this->db->get_where('vehicle_category_detail',array('id'=>$offer_data->oo_vc_id))->row()->category_name;

		

		$detail[1]='<tr><td >Vehicle Category</td><td>'.$vehicle_category_name.'</td></tr><tr><td>Total Distance</td><td> '.$this->input->post("total_distance").'</td></tr><tr ><td >Rate Per Km.</td><td  >Rs. '.$offer_data->oo_km_rate.'</td></tr><tr ><td >Rate Per hr.</td><td>Rs. '.$offer_data->oo_hr_rate.'</td></tr>';

		
		$this->db->select("*")->from("tax_detail")->where("t_status",1);
		$que = $this->db->get();
		$tax = $que->result();
		
		foreach($tax as $t)
		{
			$taxs[] = $t->t_name.'  '.$t->t_value.'%';
		}
		
		$final_tax = implode(" , ",$taxs);

		$detail[2]='<tr><td>Estimated Total </td><td>Rs. '. $this->input->post("total_estimated_rate").'</td></tr><tr><td>Additional Tax </td><td>Additional Gov. Tax GST, Toll, Parking, State Tax Charge will be remain.</td></tr>'; 

		

		$detail[3]= $offer_data->oo_valid_from_time;

		$detail[4] = $offer_data->oo_valid_to_time;

		$detail[5] = $this->input->post("total_estimated_rate");

		$detail[6] = $package_data->p_min_hr;
             echo json_encode($detail);            	

	}

	// when click on tab book cab then first request goes to book this cab from admin side.
	// after admin dicide to which person confirm booking.
	// here only code for request added.
	public function request_oneway_offer_booking()
	{
			$payment_id = "";

			$booking_detail_data =  $this->input->post(NULL, TRUE);
			
			// here validation check for time between from and to.
			// here used exit(); becouse in another way to call this controller function thats why.
			$trip_start_time = date('H:i:s',strtotime($booking_detail_data['b_from_time']));
		
			$this->db->select("oo_id,oo_valid_from_time,oo_valid_to_time");
			$this->db->from("oneway_offer_detail");
			$this->db->where("id", $booking_detail_data['package_id']);
			$this->db->where("(oo_valid_from_time <= '$trip_start_time' AND oo_valid_to_time >= '$trip_start_time')");
	
		
			$query = $this->db->get();
			$ids = $query->result();
		
			if(empty($ids))
			{
				$this->db->select("oo_id,oo_valid_from_time,oo_valid_to_time");
				$this->db->from("oneway_offer_detail");
				$this->db->where("id", $booking_detail_data['package_id']);
				
				$query2 = $this->db->get();
				$ids2 = $query2->result();
				
				$res = array(
					   "error" => 1,
					   "message" => "Please Select Trip Start Time Between ".date('h:i A',strtotime($ids2[0]->oo_valid_from_time))." TO ".date('h:i A',strtotime($ids2[0]->oo_valid_to_time))
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
			
			'b_estimated_rate'=>$booking_detail_data['total_estimated_rate'],

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

			'b_chargeable_km'=>$booking_detail_data['chargeable_km'],

			'b_estimated_distance'=>$booking_detail_data['total_estimated_distance'],

			'b_night_charge_status'=>$booking_detail_data['b_night_charge_status'],

			'b_self_travel_status'=>$booking_detail_data['b_self_travel_status'],

			'b_remarks'=>$booking_detail_data['b_remarks'],

			'b_booking_date_time'=>date("Y-m-d H:i:s"),

			'b_payment_id'=>$payment_id,

			'b_source_status'=>1,
			
			'b_tax_type' => $finaltax,

			'b_status'=>2 //for pending.

		);
		//echo "<pre>"; print_r($booking_request_detail_array); exit;
		$this->db->insert('booking_request_list',$booking_request_detail_array);
		
		$get_last_id=$this->db->insert_id();

		$this->load->model('General_data');
		// RCBRI - rashmi cab booking request ID.
		$this->General_data->update_id('booking_request_list','RCBRI','b_id');	
		
		$res = ($this->db->affected_rows() != 1) ? false : true;
		//echo $res;
		if($res)
		{
		   $result = array("error"=>0,"message"=>"Your Request Submited Successfully");
		}
		
		echo json_encode($res);
	}
	
	//right now this function code is not working for one way offer only - after ashish change.16-17/10/2018.
	public function confirm_oneway_offer_booking()

    {
	
	//	echo "controoler call"; exit;

		$booking_detail_data =  $this->session->userdata('back_booking_data');

		
		date_default_timezone_set('Asia/Kolkata');
		
		if(!empty($booking_detail_data))

		{

			$payment_id = $_GET['payment_id'];

		

		}else

		{

			$payment_id = "";

			$booking_detail_data =  $this->input->post(NULL, TRUE);
			
			// here validation check for time between from and to.
			// here used exit(); becouse in another way to call this controller function thats why.
			$trip_start_time = date('H:i:s',strtotime($booking_detail_data['b_from_time']));
		
			$this->db->select("oo_id,oo_valid_from_time,oo_valid_to_time");
			$this->db->from("oneway_offer_detail");
			$this->db->where("id", $booking_detail_data['package_id']);
			$this->db->where("(oo_valid_from_time <= '$trip_start_time' AND oo_valid_to_time >= '$trip_start_time')");
	
		
			$query = $this->db->get();
			$ids = $query->result();
		
			if(empty($ids))
			{
				$this->db->select("oo_id,oo_valid_from_time,oo_valid_to_time");
				$this->db->from("oneway_offer_detail");
				$this->db->where("id", $booking_detail_data['package_id']);
				
				$query2 = $this->db->get();
				$ids2 = $query2->result();
				
				$res = array(
					   "error" => 1,
					   "message" => "Please Select Trip Start Time Between ".date('h:i A',strtotime($ids2[0]->oo_valid_from_time))." TO ".date('h:i A',strtotime($ids2[0]->oo_valid_to_time))
					   );
				echo json_encode($res);
				exit();
			}
			
			//print_r($ids); 
			//echo $trip_start_time;

		}
	
		

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

			'b_pk_rate'=>0,

			'b_pk_rate_per_km'=>$oneway_offer_detail['oo_km_rate'],

			'b_pk_rate_per_hour'=>$oneway_offer_detail['oo_hr_rate'],

			'b_pk_min_km'=>$booking_detail_data['total_estimated_distance'],

			'b_pk_min_hour'=>$booking_detail_data['total_estimated_time'],

			'b_total_hour'=>$booking_detail_data['total_estimated_time'],

			'b_pk_night_charge'=>0,

			'b_chargeable_km'=>$booking_detail_data['chargeable_km'],

			'b_estimated_distance'=>$booking_detail_data['total_estimated_distance'],

			'b_night_charge_status'=>$booking_detail_data['b_night_charge_status'],

			'b_self_travel_status'=>$booking_detail_data['b_self_travel_status'],

			'b_remarks'=>$booking_detail_data['b_remarks'],

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

	

		

		/*$this->db->select('booking_list.*,booking_type.sub_type_name,booking_type.type_name,city_list.c_name,payment_type.pt_name');

			$this->db->from('booking_list');

			$this->db->join('booking_type','booking_type.id=booking_list.b_type');

			$this->db->join('city_detail','city_detail.id=booking_list.b_from_city');

			$this->db->join('payment_type','payment_type.id=booking_list.b_payment_type');

			$this->db->where('booking_list.id',$get_last_id);

			$booking_details = $this->db->get()->row();

		

				

		$msg['success'] = 'Last booking reference : '.$booking_details->b_id;

		$this->session->set_flashdata('success',$msg);*/

		

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

	}
}