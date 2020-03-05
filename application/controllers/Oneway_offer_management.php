<?php ob_start(); defined('BASEPATH') OR exit('No direct script access allowed');



class Oneway_offer_management extends CI_Controller 

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
		
		//used for today request only.
		$this->db->select("ood.*,ag.a_full_name as agentname,ag.a_contact_no1,brl.b_pk_id,bl.b_status");
		$this->db->from("oneway_offer_detail ood");
		$this->db->join("agent_detail ag","ag.id = ood.oo_agent_id","left");
		$this->db->join("booking_request_list brl","brl.b_pk_id = ood.id","left");
		$this->db->join("booking_list bl","bl.b_pk_id = ood.id","left");
		$this->db->where("brl.b_status",2);
		$this->db->where("brl.b_from_date", "CURDATE()",FALSE);
		$this->db->order_by("ood.oo_valid_date","DESC");
		$this->db->order_by("ood.oo_valid_from_time","DESC");
		$this->db->order_by("ood.oo_valid_to_time","DESC");
		$this->db->group_by('ood.id');
		
		$query = $this->db->get();
		
		$data['today_request'] = $query->result();
		
		//used for today tommorrow only.
		$this->db->select("ood.*,ag.a_full_name as agentname,ag.a_contact_no1,brl.b_pk_id,bl.b_status");
		$this->db->from("oneway_offer_detail ood");
		$this->db->join("agent_detail ag","ag.id = ood.oo_agent_id","left");
		$this->db->join("booking_request_list brl","brl.b_pk_id = ood.id","left");
		$this->db->join("booking_list bl","bl.b_pk_id = ood.id","left");
		$this->db->where("brl.b_status",2);
		$this->db->where("brl.b_from_date", "CURDATE() + INTERVAL 1 DAY",FALSE);
		$this->db->order_by("ood.oo_valid_date","DESC");
		$this->db->order_by("ood.oo_valid_from_time","DESC");
		$this->db->order_by("ood.oo_valid_to_time","DESC");
		$this->db->group_by('ood.id');
		
		$query = $this->db->get();
		
		$data['tommorrow_request'] = $query->result();
		
		//used for today request only.
		$this->db->select("ood.*,ag.a_full_name as agentname,ag.a_contact_no1,brl.b_pk_id,bl.b_status");
		$this->db->from("oneway_offer_detail ood");
		$this->db->join("agent_detail ag","ag.id = ood.oo_agent_id","left");
		$this->db->join("booking_request_list brl","brl.b_pk_id = ood.id","left");
		$this->db->join("booking_list bl","bl.b_pk_id = ood.id","left");
		$this->db->where("ood.oo_valid_date", "CURDATE()",FALSE);
		$this->db->where("ood.id NOT IN (select b_pk_id from booking_request_list)", NULL, FALSE);
		$this->db->where("ood.id NOT IN (select b_pk_id from booking_list)", NULL, FALSE);
		$this->db->order_by("ood.oo_valid_date","DESC");
		$this->db->order_by("ood.oo_valid_from_time","DESC");
		$this->db->order_by("ood.oo_valid_to_time","DESC");
		$this->db->group_by('ood.id');
		
		$query = $this->db->get();
		
		//echo  $this->db->last_query(); exit;
		$data['today_request_open'] = $query->result();
		
		//used for today tommorrow only.
		$this->db->select("ood.*,ag.a_full_name as agentname,ag.a_contact_no1,brl.b_pk_id,bl.b_status");
		$this->db->from("oneway_offer_detail ood");
		$this->db->join("agent_detail ag","ag.id = ood.oo_agent_id","left");
		$this->db->join("booking_request_list brl","brl.b_pk_id = ood.id","left");
		$this->db->join("booking_list bl","bl.b_pk_id = ood.id","left");
		$this->db->where("ood.oo_valid_date", "CURDATE() + INTERVAL 1 DAY",FALSE);
		$this->db->where("ood.id NOT IN (select b_pk_id from booking_request_list)", NULL, FALSE);
		$this->db->where("ood.id NOT IN (select b_pk_id from booking_list)", NULL, FALSE);
		$this->db->order_by("ood.oo_valid_date","DESC");
		$this->db->order_by("ood.oo_valid_from_time","DESC");
		$this->db->order_by("ood.oo_valid_to_time","DESC");
		$this->db->group_by('ood.id');
		
		$query = $this->db->get();
		
		$data['tommorrow_request_open'] = $query->result();
		
		//echo "<pre>"; print_r($data); exit;
		//old get data.
		//$data['oneway_offer_list'] = $this->db->get('oneway_offer_detail')->result();
		
			if($this->input->get("all_list") == "all_list"){
			
				$this->db->select("ood.*,ag.a_full_name as agentname,ag.a_contact_no1,brl.b_pk_id,bl.b_status");
				$this->db->from("oneway_offer_detail ood");
				$this->db->join("agent_detail ag","ag.id = ood.oo_agent_id","left");
				$this->db->join("booking_request_list brl","brl.b_pk_id = ood.id","left");
				$this->db->join("booking_list bl","bl.b_pk_id = ood.id","left");
				$this->db->order_by("ood.oo_valid_date","DESC");
				$this->db->order_by("ood.oo_valid_from_time","DESC");
				$this->db->order_by("ood.oo_valid_to_time","DESC");
				$this->db->group_by('ood.id');
				
				$query = $this->db->get();
				 
				$data['oneway_offer_list'] = $query->result();
			}
			else if($this->input->get("all_list") == "search_list")
			{
				$fromdate = date('Y-m-d',strtotime($this->input->post('from_date')));
				$todate = date('Y-m-d',strtotime($this->input->post('to_date')));
				$this->db->select("ood.*,ag.a_full_name as agentname,ag.a_contact_no1,brl.b_pk_id,bl.b_status");
				$this->db->from("oneway_offer_detail ood");
				$this->db->join("agent_detail ag","ag.id = ood.oo_agent_id","left");
				$this->db->join("booking_request_list brl","brl.b_pk_id = ood.id","left");
				$this->db->join("booking_list bl","bl.b_pk_id = ood.id","left");
				$this->db->where('ood.oo_valid_date >=', $fromdate);
				$this->db->where('ood.oo_valid_date <=', $todate);
				$this->db->order_by("ood.oo_valid_date","DESC");
				$this->db->order_by("ood.oo_valid_from_time","DESC");
				$this->db->order_by("ood.oo_valid_to_time","DESC");
				$this->db->group_by('ood.id');
				
				$query = $this->db->get();
				 
				// echo $this->db->last_query(); exit;
				$data['oneway_offer_list'] = $query->result();
			}
			
		// use for all request oneway offer.	
		$this->db->select("ood.*,ag.a_full_name as agentname,ag.a_contact_no1,brl.b_pk_id,bl.b_status");
		$this->db->from("oneway_offer_detail ood");
		$this->db->join("agent_detail ag","ag.id = ood.oo_agent_id","left");
		$this->db->join("booking_request_list brl","brl.b_pk_id = ood.id","left");
		$this->db->join("booking_list bl","bl.b_pk_id = ood.id","left");
		$this->db->where("brl.b_status",2);
		$this->db->order_by("ood.oo_valid_date","DESC");
		$this->db->order_by("ood.oo_valid_from_time","DESC");
		$this->db->order_by("ood.oo_valid_to_time","DESC");
		$this->db->group_by('ood.id');
		
		$query = $this->db->get();
		
		$data['all_request'] = $query->result();
		
		
		$this->db->select("ood.*,ag.a_full_name as agentname,ag.a_contact_no1,brl.b_pk_id,bl.b_status");
		$this->db->from("oneway_offer_detail ood");
		$this->db->join("agent_detail ag","ag.id = ood.oo_agent_id","left");
		$this->db->join("booking_request_list brl","brl.b_pk_id = ood.id","left");
		$this->db->join("booking_list bl","bl.b_pk_id = ood.id","left");
		$this->db->where("ood.id NOT IN (select b_pk_id from booking_request_list)", NULL, FALSE);
		$this->db->where("ood.id NOT IN (select b_pk_id from booking_list)", NULL, FALSE);
		$this->db->order_by("ood.oo_valid_date","DESC");
		$this->db->order_by("ood.oo_valid_from_time","DESC");
		$this->db->order_by("ood.oo_valid_to_time","DESC");
		$this->db->group_by('ood.id');
		
		$query = $this->db->get();
		
		//echo  $this->db->last_query(); exit;
		$data['all_open'] = $query->result();
			
			$this->load->view('manage_oneway_offer',$data);
		}
	}
	
	

	public function booking_request()
	{
		if($this->uri->segment("3") != '' && $this->uri->segment("3") == "URV" && $this->uri->segment("4") != '')
		{
			$cid = $this->uri->segment("4");
			
			$this->db->select('booking_request_list.*,package_type.package_sub_type,package_type.package_type,city_detail.c_name AS fromcity,cd.c_name AS tocity');

			$this->db->from('booking_request_list');

			$this->db->join('package_type','package_type.id=booking_request_list.b_type');

			$this->db->join('city_detail','city_detail.id=booking_request_list.b_from_city');
			
			$this->db->join('city_detail cd','cd.id=booking_request_list.b_to_city');

			$this->db->where('package_type.id',1);
			
			$this->db->where('b_pk_id',$cid);

			$data['oneway_offer_request_list'] = $this->db->get()->result();
			
			$this->load->view("oneway_offer_request_view",$data);
		}
		else
		{
			$data["heading"] = "Please Try Agian";
			$data["message"] = "<a href='".base_url()."index.php/Dashboard' >GO TO HOME</a>";
			$this->load->view('errors/html/error_404',$data);
		}
		
	}
	
	//start addedby - ashish lakhani.
	public function confirm_offer_booking()
	{
		$eid = $this->uri->segment("4");
		
		$this->db->select("*");
		$this->db->from("booking_request_list");
		$this->db->where("id",$eid);
		
		$data["record"] = $this->db->get()->result();
		$this->load->view("confirm_offer_booking",$data);
	}
	
	public function accept_one_request()
	{
		//print_r($this->input->post()); exit;
		if($this->input->post() && $this->input->post("oneway_request_id") != '' && $this->input->post("offer_cab_id") != '')
		{
	
			$trip_start_time = date('H:i:s',strtotime($this->input->post('ptime')));
		
			$this->db->select("oo_id,oo_valid_from_time,oo_valid_to_time");
			$this->db->from("oneway_offer_detail");
			$this->db->where("id", $this->input->post('offer_cab_id'));
			$this->db->where("(oo_valid_from_time <= '$trip_start_time' AND oo_valid_to_time >= '$trip_start_time')");
	
		
			$query = $this->db->get();
			$ids = $query->result();
		
			if(empty($ids))
			{
				$res1 = array();
				
				$this->db->select("oo_id,oo_valid_from_time,oo_valid_to_time");
				$this->db->from("oneway_offer_detail");
				$this->db->where("id", $this->input->post('offer_cab_id'));
				
				$query2 = $this->db->get();
				$ids_s = $query2->result();
				
				//print_r($ids_s); exit;
				
				$res1["code"] = 0;
				$res1["message"] = "Please Select Trip Start Time Between ".date('h:i A',strtotime($ids_s[0]->oo_valid_from_time))." TO ".date('h:i A',strtotime($ids_s[0]->oo_valid_to_time));
			
				echo json_encode($res1);
				exit();
			}
			
				$accept = intval(1);
				$id = array("id"=>$this->input->post("oneway_request_id"));
				$acceptdata =  array("b_status"=>$accept);
				
				$this->db->set('modify_date', 'NOW()', FALSE);
				$this->db->where($id);
				$this->db->update("booking_request_list",$acceptdata);
				
				//$updateaccept = ($this->db->affected_rows() != 1) ? false : true;  
				$this->db->reset_query();
				
				
				$reject = intval(7);
					
				$ids = $this->input->post("offer_cab_id");
				$rejectdata =  array("b_status"=>$reject);
				
				$this->db->set('modify_date', 'NOW()', FALSE);
				$this->db->where("(b_pk_id = '$ids' AND b_status != '$accept')");
				$this->db->update("booking_request_list",$rejectdata);
				
				$this->db->reset_query();
				
				$updatedetail = array(
					"b_p_name" => $this->input->post("name"),
					"b_p_contact" => $this->input->post("mobile"),
					"b_pickup_point" => $this->input->post("pickup"),
					"b_drop_point" => $this->input->post("drop"),
					"b_advance" => $this->input->post("advance"),
					"b_payment_type" => $this->input->post("ptype"),
					"b_remarks" => $this->input->post("note"),
					"b_from_time" => date('H:i:s',strtotime($this->input->post("ptime")))
				);
				//echo "<pre>"; print_r($updatedetail); exit;
				$detail_id = array(
								"id" => $this->input->post("oneway_request_id")
							);
							
				$this->db->set('modify_date', 'NOW()', FALSE);
				$this->db->where($detail_id);
				$this->db->update("booking_request_list",$updatedetail);
	
				$res2 = array(
								"code" => 1,
								"message" => "Your Request Accept Successfully"
					   );
					   
				//echo json_encode($res2);
		}
			$this->confirm_booking();
	}
	
	public function confirm_booking()
	{
		//$this->db->query("INSERT booking_list b_id,b_package_id,b_pk_id,b_vc_id,b_type,b_ac_non_ac,b_from_city,b_to_city,b_from_date,b_from_time,b_oo_valid_from_time,b_oo_valid_to_time,b_to_date,b_p_id,b_p_name,b_p_contact,b_p_email_id,b_pickup_point,b_drop_point,b_payment_type,b_remarks,b_tax_type,b_advance,b_estimated_rate,b_estimated_distance,b_chargeable_km,b_night_charge_status,b_self_travel_status,b_pk_night_charge,b_drop_night_charge_status,b_drop_night_charge,b_pk_driver_allowance,b_pk_discount,b_pk_discount_type,b_pk_rate,b_pk_rate_per_km,b_pk_rate_per_hour,b_pk_min_km,b_pk_min_hour,b_total_km,b_total_hour,b_agent_id,b_vc_category_id,b_vehicle_id,b_driver_name,b_driver_contact,b_vehicle_number,b_cab_assign_type,b_cab_assign_by,b_assign_date_time,b_assign_owner_id,b_assign_driver_id,b_assign_vehicle_id,b_complete_trip_status,b_rent_card_id,b_rent_card_status,b_invoice_id,b_expense_id,b_booking_date_time,b_source_status,b_updated_by,b_updated_by_type,b_updated_date_time,b_cancel_type,b_cancelled_by,b_cancelled_by_type,b_cancel_note,b_cancel_date_time,b_status,b_payment_id,b_complain_msg,b_complain_datetime,b_complain_status,b_complain_read_datetime,created_date,modify_date SELECT FROM booking_request_list where id ='".intval($this->input->post("oneway_request_id"))."'");
		
		$this->db->select("`b_id`, `b_package_id`, `b_pk_id`, `b_vc_id`, `b_type`, `b_ac_non_ac`, `b_from_city`, `b_to_city`, `b_from_date`, `b_from_time`, `b_oo_valid_from_time`, `b_oo_valid_to_time`, `b_to_date`, `b_p_id`, `b_p_name`, `b_p_contact`, `b_p_email_id`, `b_pickup_point`, `b_drop_point`, `b_payment_type`, `b_remarks`, `b_tax_type`, `b_advance`, `b_estimated_rate`, `b_estimated_distance`, `b_chargeable_km`, `b_night_charge_status`, `b_self_travel_status`, `b_pk_night_charge`, `b_drop_night_charge_status`, `b_drop_night_charge`, `b_pk_driver_allowance`, `b_pk_discount`, `b_pk_discount_type`, `b_pk_rate`, `b_pk_rate_per_km`, `b_pk_rate_per_hour`, `b_pk_min_km`, `b_pk_min_hour`, `b_total_km`, `b_total_hour`, `b_agent_id`, `b_vc_category_id`, `b_vehicle_id`, `b_driver_name`, `b_driver_contact`, `b_vehicle_number`, `b_cab_assign_type`, `b_cab_assign_by`, `b_assign_date_time`, `b_assign_owner_id`, `b_assign_driver_id`, `b_assign_vehicle_id`, `b_complete_trip_status`, `b_rent_card_id`, `b_rent_card_status`, `b_invoice_id`, `b_expense_id`, `b_booking_date_time`, `b_source_status`, `b_updated_by`, `b_updated_by_type`, `b_updated_date_time`, `b_cancel_type`, `b_cancelled_by`, `b_cancelled_by_type`, `b_cancel_note`, `b_cancel_date_time`, `b_status`, `b_payment_id`, `b_complain_msg`, `b_complain_datetime`, `b_complain_status`, `b_complain_read_datetime`, `created_date`, `modify_date`");
		$this->db->from("booking_request_list");
		$this->db->where("id",intval($this->input->post("oneway_request_id")));
		$query = $this->db->get();
		$qres = $query->result();
		
		$this->db->set('oo_status','2'); //here status 2 for confirm pakage booking.  
		$this->db->where('id', $qres[0]->b_pk_id); //which row want to upgrade  
		$this->db->update('oneway_offer_detail');
		
		//echo $this->db->last_query();
		//echo "<pre>"; print_r($qres); exit;
		foreach ($qres as $row) {
			$this->db->insert('booking_list',$row);
		}
		
		
		$get_last_id = $this->db->insert_id();
		
		//comment for not set new booking id its same as request id only.
		
		//$this->load->model('General_data');

		//$this->General_data->update_id('booking_list','RCOWB','b_id');
		
		$now = date('Y-m-d H:i:s');
		$this->db->set('b_booking_date_time',$now);
		$this->db->where("id",$get_last_id);
		$this->db->update('booking_list');
		
		$this->db->select('booking_list.*,package_type.package_type,package_type.package_sub_type,city_detail.c_name,payment_type.payment_name');

		$this->db->from('booking_list');

		$this->db->join('package_type','package_type.id=booking_list.b_type');

		$this->db->join('city_detail','city_detail.id=booking_list.b_from_city');

		$this->db->join('payment_type','payment_type.id=booking_list.b_payment_type');

		$this->db->where('booking_list.id',$get_last_id);

		$booking_details = $this->db->get()->row();
		
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

		$data['total_estimated_rate']=$booking_details->b_estimated_rate;

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
		
		if($get_last_id)
		{
			$res["code"] = 1;
			$res["booking"] = $get_last_id;
			$res["msg"] = "Your Booking Is Successfully";
		}
		else
		{
			$res["code"] = 0;
			$res["msg"] = "Somthing Went To Wrong Please Try Agian!";
		}
		
		echo json_encode($res);
	}
	//end -ashish lakhani.
	public function add_oneway_offer()

	{		

		$data['package_type'] = $this->db->select('*')->group_by('package_type_id')->get('package_type')->result();	

		

		$data['vehicle_category'] = $this->db->get('vehicle_category_detail')->result();

		

		$data['city_list'] = $this->db->get('city_detail')->result();

		

		$data['agent_list'] = $this->db->get('agent_detail')->result();

		

		$data['tax_list'] = $this->db->get('tax_detail')->result();

		

		$this->load->view('add_oneway_offer',$data);	

	}

	

	public function insert_oneway_offer()

	{

		//echo "<pre>";print_r($_POST);echo "</pre>";exit;

		

		$vc_detail = $this->db->get_where('vehicle_category_detail',array('id'=>$this->input->post('v_c_id')))->row();

		

		

		

		$data1 = array( 

					   

					   'oo_vc_id'			=>$this->input->post('v_c_id'),

					   'oo_vt_id'			=>$this->input->post('v_t_id'),

					   'oo_first_city'		=>$this->input->post('f_city_name'),

					   'oo_second_city'		=>$this->input->post('s_city_name'),

					   'oo_third_city'		=>$this->input->post('t_city_name'),

					   'oo_agent_id'		=>$this->input->post('agent_id'),

					   'oo_vehicle_id'		=>$this->input->post('vehicle_list_id'),	

					   'oo_km_rate'			=>$vc_detail->category_oneway_offer_km_rate,

					   'oo_hr_rate'			=>$vc_detail->category_oneway_offer_hr_rate,

					   'oo_valid_date'		=>date('Y-m-d',strtotime($this->input->post('valid_date'))),

					   'oo_valid_from_time'	=>date('H:i:s',strtotime($this->input->post('valid_from_time'))),

					   'oo_valid_to_time'	=>date('H:i:s',strtotime($this->input->post('valid_to_time'))),		  

					   'oo_status'			=>1,

					   'oo_created_type' 	=>0,

					   'oo_created_by'    	=>$this->session->userdata('user')->id,

					   'oo_created_date_time'=>date('Y-m-d H:i:s')

					   );

		

		

		$merged_data =$data1;

		

		$this->db->insert('oneway_offer_detail',$merged_data);

		

		$this->db->query("update oneway_offer_detail set oo_id=CONCAT('RCOO".date('y').date('m')."',LPAD(LAST_INSERT_ID(), 2, '0')) where id=LAST_INSERT_ID()");

		

		$msg['success'] = "Package added successfully!";

		

        $this->session->set_flashdata('success',$msg);

				

		redirect(site_url('index.php/Oneway_offer_management'));

		

	}

	

	public function oneway_offer_status()

	{

	

		$oneway_offer_status_id = $this->input->post('oneway_offer_status_id');

		

		$this->General_data->change_status('oneway_offer_detail','oo_status',$oneway_offer_status_id);

		

		redirect(site_url('index.php/Oneway_offer_management'));	

	

	}

	

	public function get_data_edit_oneway_offer()	

	{

		$oneway_offer_edit_id = $this->input->post('oneway_offer_edit_id');

		

		$data['vehicle_category'] = $this->db->get('vehicle_category_detail')->result();

		

		$data['city_list'] = $this->db->get('city_detail')->result();

		

		$data['tax_list'] = $this->db->get('tax_detail')->result();	

		

		$data['edit_oneway_offer'] = $this->db->get_where('oneway_offer_detail',array('id'=>$oneway_offer_edit_id))->row();		

		

		$this->load->view('edit_oneway_offer',$data);

	}

	

	public function update_oneway_offer()

	{

		$update_oneway_offer_id = $this->input->post('update_oneway_offer_id');

		

	

		$data1 = array( 

					   

					   'oo_valid_date'		=>date('Y-m-d',strtotime($this->input->post('valid_date'))),

					   'oo_valid_from_time'	=>date('H:i:s',strtotime($this->input->post('valid_from_time'))),

					   'oo_valid_to_time'	=>date('H:i:s',strtotime($this->input->post('valid_to_time'))),		  

					   'oo_updated_date_time'=>date('Y-m-d H:i:s')		   

					   );		

		

		

		$merged_data = $data1;

		

		$this->db->where('id',$update_oneway_offer_id)->update('oneway_offer_detail',$merged_data);		

		

		redirect(site_url('index.php/Oneway_offer_management'));

		

	}

	

	public function delete_oneway_offer()

	{

		$oneway_offer_dlt_id = $this->input->post('oneway_offer_dlt_id');

		

		$this->db->where('id',$oneway_offer_dlt_id)->delete('oneway_offer_detail');

		

		redirect(site_url('index.php/Oneway_offer_management'),'refresh');

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