<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

	public function index()
	{
		//echo date('jS M Y h:i A');exit;
		$user = $this->session->has_userdata('user');
		if(empty($user)){
			redirect('index.php/Login');
		}else { 
			//TODAY DATA
			$this->load->helper('url');		
			$todaydate = date('Y-m-d');

			$this->db->select('booking_list.*,package_type.package_sub_type,package_type.package_type,city_detail.c_name');
			$this->db->from('booking_list');
			$this->db->join('package_type','package_type.id=booking_list.b_type');
			$this->db->join('city_detail','city_detail.id=booking_list.b_from_city');
			$this->db->where("DATE(booking_list.b_booking_date_time) =", date("Y-m-d"));
			$this->db->where("booking_list.b_status", 1);
			//$this->db->where(array('booking_list.b_status'=>1, 'booking_list.b_from_date'=>date('Y-m-d')));
			$data['tot_pending_booking']=count($this->db->get()->result());

			$this->db->select('booking_list.*,package_type.package_sub_type,package_type.package_type,city_detail.c_name');
			$this->db->from('booking_list');
			$this->db->join('package_type','package_type.id=booking_list.b_type');
			$this->db->join('city_detail','city_detail.id=booking_list.b_from_city');
			$this->db->where("DATE(booking_list.b_booking_date_time) =", date("Y-m-d"));
			$this->db->where("booking_list.b_status", 3);
			//$this->db->where(array('booking_list.b_status>='=>3, 'booking_list.b_from_date'=>date('Y-m-d')));
			$data['tot_confirm_booking']=count($this->db->get()->result());

			$data['tot_booking_inquiry']=count($this->db->get_where('booking_inquiry',array('bi_plan_date'=>date('Y-m-d')))->result());
			$data['tot_booking_list']=count($this->db->where("DATE(booking_list.b_booking_date_time) =", date('Y-m-d'))->from('booking_list')->get()->result());

			$this->db->select('booking_request_list.*,package_type.package_sub_type,package_type.package_type,city_detail.c_name AS fromcity,cd.c_name AS tocity');
			$this->db->from('booking_request_list');
			$this->db->join('package_type','package_type.id=booking_request_list.b_type');
			$this->db->join('city_detail','city_detail.id=booking_request_list.b_from_city');
			$this->db->join('city_detail cd','cd.id=booking_request_list.b_to_city');
			//$this->db->where('booking_request_list.b_booking_date_time', $todaydate);
			$this->db->where('package_type.id',1);
			$this->db->where('booking_request_list.b_status', 2);
			$this->db->where('DATE(booking_request_list.b_from_date)', date("Y-m-d"));
			

			$data['oneway_request']=count($this->db->get()->result());
			//echo "<pre>"; 
			//print_r($data); exit;

			$data['booking_inquiry']=$this->db->select("*")->from('booking_inquiry')->order_by('bi_created_datetime', 'DESC')->limit('20')->get()->result();
			//echo "<pre>"; 
			//print_r($data['booking_inquiry']); exit;
				
			$todaydate= date("Y-m-d"); 
			$after20= date("Y-m-d", strtotime('+20 days')); 

			 
			$this->db->select("ood.*,ag.a_full_name as agentname, brl.b_pk_id, brl.b_pickup_point, brl.b_drop_point, bl.b_status");
			$this->db->from("oneway_offer_detail ood");
			$this->db->join("agent_detail ag","ag.id = ood.oo_agent_id","left");
			$this->db->join("booking_request_list brl","brl.b_pk_id = ood.id","left");
			$this->db->join("booking_list bl","bl.b_pk_id = ood.id","left");
			//$this->db->where("brl.b_status",2);
			$this->db->where('ood.oo_status', 1);
			$this->db->where("DATE(ood.oo_valid_date) >=", $todaydate);
			$this->db->where("DATE(ood.oo_valid_date) <=", $after20);
			$this->db->order_by("ood.oo_valid_date","ASC");
			$this->db->order_by("ood.oo_valid_from_time","ASC");
			$this->db->order_by("ood.oo_valid_to_time","ASC");
			$this->db->group_by('ood.id');
			$query = $this->db->get();
			$data['agent_posts'] = $query->result();

			//echo "<pre>"; 
			//print_r($data['agent_posts']); exit;

			$this->db->select('booking_request_list.*,package_type.package_sub_type,package_type.package_type,city_detail.c_name AS fromcity,cd.c_name AS tocity');
			$this->db->from('booking_request_list');
			$this->db->join('package_type','package_type.id=booking_request_list.b_type');
			$this->db->join('city_detail','city_detail.id=booking_request_list.b_from_city');
			$this->db->join('city_detail cd','cd.id=booking_request_list.b_to_city');
			//$this->db->where('booking_request_list.b_booking_date_time', $todaydate);
			$this->db->where('package_type.id',1);
			$this->db->where('booking_request_list.b_status', 2);
			$this->db->where("DATE(booking_request_list.b_from_date) >=", $todaydate);
			$this->db->where("DATE(booking_request_list.b_from_date) <=", $after20);
			$data['customer_requested'] = $this->db->get()->result();

			$data['passenger_list'] = $this->db->select("*")->from('passenger_list')->order_by('p_joining_date_time', 'DESC')->limit('20')->get()->result();

			$data['agent_list']=$this->db->select("*")->from('agent_detail')->order_by('a_joining_date_time', 'DESC')->limit('20')->get()->result();

			$this->db->select('driver_detail.*,agent_detail.a_full_name');
			$this->db->from('driver_detail');
			$this->db->limit('20');
			$this->db->order_by('d_created_datetime', 'DESC');
			$this->db->join('agent_detail','agent_detail.id=driver_detail.agent_id');
			$data['driver_detail']=$this->db->get()->result();

			$this->db->select('vehicle_list.*,agent_detail.a_full_name,vehicle_category_detail.category_name,vehicle_detail.v_name');
			$this->db->from('vehicle_list');
			$this->db->limit('20');
			$this->db->order_by('v_created_datetime', 'DESC');
			$this->db->join('agent_detail','agent_detail.id=vehicle_list.agent_id');
			$this->db->join('vehicle_category_detail','vehicle_category_detail.id=vehicle_list.vehicle_category_id');
			$this->db->join('vehicle_detail','vehicle_detail.id=vehicle_list.vehicle_detail_id');
			$data['vehicle_list']=$this->db->get()->result();

			$this->db->select('helpdesk_support.*, agent_detail.a_full_name, agent_detail.id as agentid');
			$this->db->join('agent_detail', 'agent_detail.id=helpdesk_support.hs_sender_id');
		 	$this->db->from('helpdesk_support');
		 	$this->db->where('hs_type',2);
		 	$this->db->order_by('hs_created_datetime', 'DESC');
		 	$this->db->limit('20');
		 	//$this->db->where('DATE(hs_created_datetime)', date("Y-m-d"));
		 	$data['helpdesk_support_agent']=$this->db->get()->result();
		 	// echo "<pre>";
		 	// print_r($data['helpdesk_support_agent']); 

		 	$this->db->select('helpdesk_support.*, passenger_list.p_full_name, passenger_list.id as customerid');
			$this->db->join('passenger_list', 'passenger_list.id=helpdesk_support.hs_sender_id');
		 	$this->db->from('helpdesk_support');
		 	$this->db->where('hs_type',1);
		 	$this->db->order_by('hs_created_datetime', 'DESC');
		 	$this->db->limit('20');
		 	//$this->db->where('DATE(hs_created_datetime)', date("Y-m-d"));
		 	$data['helpdesk_support_customer']=$this->db->get()->result();
		 	// print_r($data['helpdesk_support_customer']); exit; 
		 	// Unpaid invoice list 
		 	$this->db->select('booking_list.*,package_type.package_sub_type,package_type.package_type,city_detail.c_name, agent_detail.a_full_name, invoice.balance');
			$this->db->from('booking_list');
			$this->db->join('package_type','package_type.id=booking_list.b_type');
	    	$this->db->join('city_detail','city_detail.id=booking_list.b_from_city');
	    	$this->db->join('agent_detail','agent_detail.id=booking_list.b_agent_id');
	    	$this->db->join('invoice','invoice.id=booking_list.b_invoice_id');
			$this->db->where('invoice.balance >', '0');
			// $this->db->where('booking_list.b_status', '5');
			//$this->db->where('booking_list.b_from_date',date('Y-m-d'));
			$this->db->order_by('booking_list.b_booking_date_time', 'DESC');
		 	$this->db->limit('20');
			$data['unpaid_invoices'] = $this->db->get()->result();

			//echo "<pre>"; 
			//print_r($data['unpaid_invoices']); exit;
			
			// customer complains 
			$this->db->select('booking_list.*, agent_detail.a_full_name');
			$this->db->from('booking_list');
			$this->db->join('agent_detail','agent_detail.id=booking_list.b_agent_id');
			$this->db->where('booking_list.b_complain_msg !=', "");
			$this->db->order_by('booking_list.b_complain_datetime', 'DESC');
		 	$this->db->limit('20');
			$data['complaints'] = $this->db->get()->result();

			// echo "<pre>";
			// print_r($data['complaints']); exit;

			$this->load->view('header');
			$this->load->view('dashboard',$data);

		}
	
	}
	/*public function PendingBookingList(){
		$this->db->select('booking_list.*,package_type.package_sub_type,package_type.package_type,city_detail.c_name');
		$this->db->from('booking_list');
		$this->db->join('package_type','package_type.id=booking_list.b_type');
		$this->db->join('city_detail','city_detail.id=booking_list.b_from_city');
		$this->db->where(array('booking_list.b_status'=>1, 'booking_list.b_from_date'=>date('Y-m-d')));
		$booking_data['pending_booking_list'] = $this->db->get()->result();
		$this->load->view('dashboard_booking_list',$booking_data);
		
	}
	public function ConfirmBookingList(){
		$this->db->select('booking_list.*,package_type.package_sub_type,package_type.package_type,city_detail.c_name');
		$this->db->from('booking_list');
		$this->db->join('package_type','package_type.id=booking_list.b_type');
		$this->db->join('city_detail','city_detail.id=booking_list.b_from_city');
		$this->db->where(array('booking_list.b_status>='=>3, 'booking_list.b_from_date'=>date('Y-m-d')));
		$booking_data['pending_booking_list'] = $this->db->get()->result();
		
		$this->load->view('dashboard_booking_list',$booking_data);
		
	}
	public function OnewayOfferList(){
		$data['oneway_offer_list']=$this->db->get_where('oneway_offer_detail',array('oo_valid_date'=>date('Y-m-d')))->result();
		$this->load->view('dashboard_oneway_offer_list',$data);
	}
	public function BookingInquiryList()
	{
		$data['booking_inquiry']=$this->db->get_where('booking_inquiry',array('bi_plan_date'=>date('Y-m-d')))->result();
		$this->load->view('dashboard_booking_inquiry',$data);
	} */
	public function fetch_data()
	{
		$post= $this->input->post(); 

		if($post['temp'] == '1')
		{
			$todaydate = date('Y-m-d');
			$this->db->select('booking_list.*,package_type.package_sub_type,package_type.package_type,city_detail.c_name');
			$this->db->from('booking_list');
			$this->db->join('package_type','package_type.id=booking_list.b_type');
			$this->db->join('city_detail','city_detail.id=booking_list.b_from_city');
			$this->db->where("DATE(booking_list.b_booking_date_time) =", date("Y-m-d"));
			$this->db->where("booking_list.b_status", 1);
			//$this->db->where(array('booking_list.b_status'=>1, 'booking_list.b_from_date'=>date('Y-m-d')));
			$data['tot_pending_booking']=count($this->db->get()->result());

			$this->db->select('booking_list.*,package_type.package_sub_type,package_type.package_type,city_detail.c_name');
			$this->db->from('booking_list');
			$this->db->join('package_type','package_type.id=booking_list.b_type');
			$this->db->join('city_detail','city_detail.id=booking_list.b_from_city');
			$this->db->where("DATE(booking_list.b_booking_date_time) =", date("Y-m-d"));
			$this->db->where("booking_list.b_status", 3);
			//$this->db->where(array('booking_list.b_status>='=>3, 'booking_list.b_from_date'=>date('Y-m-d')));
			$data['tot_confirm_booking']=count($this->db->get()->result());


			$data['tot_booking_inquiry']=count($this->db->get_where('booking_inquiry',array('DATE(bi_created_datetime)'=>date('Y-m-d')))->result());

			$data['tot_booking_list']=count($this->db->where("DATE(booking_list.b_booking_date_time) =", date('Y-m-d'))
									->from('booking_list')->get()->result());

			$this->db->select('booking_request_list.*,package_type.package_sub_type,package_type.package_type,city_detail.c_name AS fromcity,cd.c_name AS tocity');
			$this->db->from('booking_request_list');
			$this->db->join('package_type','package_type.id=booking_request_list.b_type');
			$this->db->join('city_detail','city_detail.id=booking_request_list.b_from_city');
			$this->db->join('city_detail cd','cd.id=booking_request_list.b_to_city');
			//$this->db->where('booking_request_list.b_booking_date_time', $todaydate);
			$this->db->where('package_type.id',1);
			$this->db->where('booking_request_list.b_status', 2);
			$this->db->where('DATE(booking_request_list.b_from_date)', date("Y-m-d"));

			$data['oneway_request']=count($this->db->get()->result());
		}
		else if($post['temp'] == '2')
		{
			 $yesterday = date('Y-m-d', strtotime("-1 days"));
			 $todaydate = date('Y-m-d');

			$this->db->select('booking_list.*,package_type.package_sub_type,package_type.package_type,city_detail.c_name');
			$this->db->from('booking_list');
			$this->db->join('package_type','package_type.id=booking_list.b_type');
			$this->db->join('city_detail','city_detail.id=booking_list.b_from_city');
			$this->db->where("DATE(booking_list.b_booking_date_time) =", date('Y-m-d', strtotime($yesterday)));
			$this->db->where("booking_list.b_status", 1);
			//$this->db->where(array('booking_list.b_status'=>1, 'booking_list.b_from_date'=>date('Y-m-d', strtotime($yesterday))));
			$data['tot_pending_booking']=count($this->db->get()->result());

			$this->db->select('booking_list.*,package_type.package_sub_type,package_type.package_type,city_detail.c_name');
			$this->db->from('booking_list');
			$this->db->join('package_type','package_type.id=booking_list.b_type');
			$this->db->join('city_detail','city_detail.id=booking_list.b_from_city');
			$this->db->where("DATE(booking_list.b_booking_date_time) =", date('Y-m-d', strtotime($yesterday)));
			$this->db->where("booking_list.b_status", 3);
			//$this->db->where(array('booking_list.b_status>='=>3, 'booking_list.b_from_date'=>date('Y-m-d', strtotime($yesterday))));
			$data['tot_confirm_booking']=count($this->db->get()->result());

			$data['tot_booking_inquiry']=count($this->db->get_where('booking_inquiry',array('DATE(bi_created_datetime)'=>date('Y-m-d', strtotime($yesterday))))->result());

			$data['tot_booking_list']=count($this->db->where("DATE(booking_list.b_booking_date_time) =", date('Y-m-d', strtotime($yesterday)))
									->from('booking_list')->get()->result());


			$this->db->select('booking_request_list.*,package_type.package_sub_type,package_type.package_type,city_detail.c_name AS fromcity,cd.c_name AS tocity');
			$this->db->from('booking_request_list');
			$this->db->join('package_type','package_type.id=booking_request_list.b_type');
			$this->db->join('city_detail','city_detail.id=booking_request_list.b_from_city');
			$this->db->join('city_detail cd','cd.id=booking_request_list.b_to_city');
			//$this->db->where('booking_request_list.b_booking_date_time', $todaydate);
			$this->db->where('package_type.id',1);
			$this->db->where('booking_request_list.b_status', 2);
			$this->db->where('DATE(booking_request_list.b_booking_date_time)',  date('Y-m-d', strtotime($yesterday)));


			$data['oneway_request']=count($this->db->get()->result());
			
			//echo "<pre>"; 
			//print_r($data); exit; 
		}
		else if($post['temp'] == '3')
		{
			 $last7day = date('Y-m-d', strtotime("-7 days"));
		 	 $todaydate = date('Y-m-d');

		 	 $this->db->select('booking_list.*,package_type.package_sub_type,package_type.package_type,city_detail.c_name');
			$this->db->from('booking_list');
			$this->db->join('package_type','package_type.id=booking_list.b_type');
			$this->db->join('city_detail','city_detail.id=booking_list.b_from_city');
			$this->db->where('booking_list.b_status', 1);
			$this->db->where("DATE(booking_list.b_booking_date_time) >=", $last7day);
			$this->db->where("DATE(booking_list.b_booking_date_time) <=", $todaydate);
			//$this->db->where('booking_list.b_from_date >=', $last7day);
			//$this->db->where('booking_list.b_from_date <=', $todaydate);
			$data['tot_pending_booking']=count($this->db->get()->result());


			$this->db->select('booking_list.*,package_type.package_sub_type,package_type.package_type,city_detail.c_name');
			$this->db->from('booking_list');
			$this->db->join('package_type','package_type.id=booking_list.b_type');
			$this->db->join('city_detail','city_detail.id=booking_list.b_from_city');
			$this->db->where('booking_list.b_status', 3);
			$this->db->where("DATE(booking_list.b_booking_date_time) >=", $last7day);
			$this->db->where("DATE(booking_list.b_booking_date_time) <=", $todaydate);
			//$this->db->where('booking_list.b_from_date >=', $last7day);
			//$this->db->where('booking_list.b_from_date <=', $todaydate);
			$data['tot_confirm_booking']=count($this->db->get()->result());
			


			$data['tot_booking_inquiry']=count($this->db->select("*")
										->where('DATE(bi_created_datetime) >=', $last7day)
										->where('DATE(bi_created_datetime) <=', $todaydate )
										->from('booking_inquiry')->get()->result());


			$data['tot_booking_list']=count($this->db->select("*")->where("DATE(booking_list.b_booking_date_time) >=", $last7day)
									->where("DATE(booking_list.b_booking_date_time) <=", $todaydate)->from('booking_list')->get()->result());


			$this->db->select('booking_request_list.*,package_type.package_sub_type,package_type.package_type,city_detail.c_name AS fromcity,cd.c_name AS tocity');
			$this->db->from('booking_request_list');
			$this->db->join('package_type','package_type.id=booking_request_list.b_type');
			$this->db->join('city_detail','city_detail.id=booking_request_list.b_from_city');
			$this->db->join('city_detail cd','cd.id=booking_request_list.b_to_city');
			//$this->db->where('booking_request_list.b_booking_date_time', $todaydate);
			$this->db->where('package_type.id',1);
			$this->db->where('booking_request_list.b_status', 2);
			$this->db->where('DATE(booking_request_list.b_from_date) >=', $last7day);
			$this->db->where('DATE(booking_request_list.b_from_date) <=', $todaydate);


			$data['oneway_request']=count($this->db->get()->result());


			//echo "<pre>"; 
			//print_r($data); exit; 
		}
		else if($post['temp'] == '4')
		{
			$last30day = date('Y-m-d', strtotime("-30 days"));
		 	$todaydate = date('Y-m-d');
		 	 $this->db->select('booking_list.*,package_type.package_sub_type,package_type.package_type,city_detail.c_name');
			$this->db->from('booking_list');
			$this->db->join('package_type','package_type.id=booking_list.b_type');
			$this->db->join('city_detail','city_detail.id=booking_list.b_from_city');
			$this->db->where('booking_list.b_status', 1);
			$this->db->where("DATE(booking_list.b_booking_date_time) >=", $last30day);
			$this->db->where("DATE(booking_list.b_booking_date_time) <=", $todaydate);
			//$this->db->where('booking_list.b_from_date >=', $last30day);
			//$this->db->where('booking_list.b_from_date <=', $todaydate);
			$data['tot_pending_booking']=count($this->db->get()->result());
			

			$this->db->select('booking_list.*,package_type.package_sub_type,package_type.package_type,city_detail.c_name');
			$this->db->from('booking_list');
			$this->db->join('package_type','package_type.id=booking_list.b_type');
			$this->db->join('city_detail','city_detail.id=booking_list.b_from_city');
			$this->db->where('booking_list.b_status', 3);
			$this->db->where("DATE(booking_list.b_booking_date_time) >=", $last30day);
			$this->db->where("DATE(booking_list.b_booking_date_time) <=", $todaydate);
			//$this->db->where('booking_list.b_from_date >=', $last30day);
			//$this->db->where('booking_list.b_from_date <=', $todaydate);
			$data['tot_confirm_booking']=count($this->db->get()->result());


			$data['tot_booking_inquiry']=count($this->db->select("*")
										->where('DATE(bi_created_datetime) >=', $last30day)
										->where('DATE(bi_created_datetime) <=', $todaydate )
										->from('booking_inquiry')->get()->result());


			$data['tot_booking_list']=count($this->db->select("*")
									->where("DATE(booking_list.b_booking_date_time) >=", $last30day)
									->where("DATE(booking_list.b_booking_date_time) <=", $todaydate)
									->from('booking_list')->get()->result());

			$this->db->select('booking_request_list.*,package_type.package_sub_type,package_type.package_type,city_detail.c_name AS fromcity,cd.c_name AS tocity');
			$this->db->from('booking_request_list');
			$this->db->join('package_type','package_type.id=booking_request_list.b_type');
			$this->db->join('city_detail','city_detail.id=booking_request_list.b_from_city');
			$this->db->join('city_detail cd','cd.id=booking_request_list.b_to_city');
			//$this->db->where('booking_request_list.b_booking_date_time', $todaydate);
			$this->db->where('package_type.id',1);
			$this->db->where('booking_request_list.b_status', 2);
			$this->db->where('DATE(booking_request_list.b_booking_date_time) >=', $last30day);
			$this->db->where('DATE(booking_request_list.b_booking_date_time) <=', $todaydate);


			$data['oneway_request']=count($this->db->get()->result());

		}
		else if($post['temp'] == '5')
		{
			 
			$todaydate = date('Y-m-d');
			$next7day = date('Y-m-d', strtotime("+7 days"));
		 	
		 	 $this->db->select('booking_list.*,package_type.package_sub_type,package_type.package_type,city_detail.c_name');
			$this->db->from('booking_list');
			$this->db->join('package_type','package_type.id=booking_list.b_type');
			$this->db->join('city_detail','city_detail.id=booking_list.b_from_city');
			$this->db->where('booking_list.b_status', 1);
			$this->db->where("DATE(booking_list.b_booking_date_time) <=", $next7day);
			$this->db->where("DATE(booking_list.b_booking_date_time) >=", $todaydate);
			//$this->db->where('booking_list.b_from_date >=', $last30day);
			//$this->db->where('booking_list.b_from_date <=', $todaydate);
			$data['tot_pending_booking']=count($this->db->get()->result());
			

			$this->db->select('booking_list.*,package_type.package_sub_type,package_type.package_type,city_detail.c_name');
			$this->db->from('booking_list');
			$this->db->join('package_type','package_type.id=booking_list.b_type');
			$this->db->join('city_detail','city_detail.id=booking_list.b_from_city');
			$this->db->where('booking_list.b_status', 3);
			$this->db->where("DATE(booking_list.b_booking_date_time) <=", $next7day);
			$this->db->where("DATE(booking_list.b_booking_date_time) >=", $todaydate);
			//$this->db->where('booking_list.b_from_date >=', $last30day);
			//$this->db->where('booking_list.b_from_date <=', $todaydate);
			$data['tot_confirm_booking']=count($this->db->get()->result());


			$data['tot_booking_inquiry']=count($this->db->select("*")
										->where('DATE(bi_created_datetime) <=', $next7day)
										->where('DATE(bi_created_datetime) >=', $todaydate )
										->from('booking_inquiry')->get()->result());

			$data['tot_booking_list']=count($this->db->select("*")
									->where("DATE(booking_list.b_booking_date_time) <=", $next7day)
									->where("DATE(booking_list.b_booking_date_time) >=", $todaydate)
									->from('booking_list')->get()->result());

			$this->db->select('booking_request_list.*,package_type.package_sub_type,package_type.package_type,city_detail.c_name AS fromcity,cd.c_name AS tocity');
			$this->db->from('booking_request_list');
			$this->db->join('package_type','package_type.id=booking_request_list.b_type');
			$this->db->join('city_detail','city_detail.id=booking_request_list.b_from_city');
			$this->db->join('city_detail cd','cd.id=booking_request_list.b_to_city');
			//$this->db->where('booking_request_list.b_booking_date_time', $todaydate);
			$this->db->where('package_type.id',1);
			$this->db->where('booking_request_list.b_status', 2);
			$this->db->where('DATE(booking_request_list.b_from_date) <=', $next7day);
			$this->db->where('DATE(booking_request_list.b_from_date) >=', $todaydate);


			$data['oneway_request']=count($this->db->get()->result());

		
		}
		 //echo "<pre>";
		 //print_r($data); exit;
		echo '<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                            <a class="dashboard-stat dashboard-stat-v2 blue" href="#">
                                <div class="visual">
                                    <i class="fa fa-comments"></i>
                                </div>
                                <div class="details">
                                    <div class="number">
                                        <span data-counter="counterup" data-value="'.$data["tot_booking_list"].'">'.$data["tot_booking_list"].'</span>
                                    </div>
                                    <div class="desc">Total Bookings </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                            <a class="dashboard-stat dashboard-stat-v2 red" href="#">
                                <div class="visual">
                                    <i class="fa fa-bar-chart-o"></i>
                                </div>
                                <div class="details">
                                    <div class="number">
                                        <span data-counter="counterup" data-value="'.$data['tot_pending_booking'].'">'.$data['tot_pending_booking'].'</span>
                                    </div>
                                    <div class="desc">Pending Bookings</div>
                                </div>
                            </a>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                            <a class="dashboard-stat dashboard-stat-v2 green" href="#">
                                <div class="visual">
                                    <i class="fa fa-shopping-cart"></i>
                                </div>
                                <div class="details">
                                   <div class="number">
                                        <span data-counter="counterup" data-value="'.$data['tot_confirm_booking'].'">'.$data['tot_confirm_booking'].'</span>
                                    </div>
                                    <div class="desc">Complate Bookings</div>
                                </div>
                            </a>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                            <a class="dashboard-stat dashboard-stat-v2 purple" href="#">
                                <div class="visual">
                                    <i class="fa fa-globe"></i>
                                </div>
                                <div class="details">
                                   <div class="number">
                                        <span data-counter="counterup" data-value="'.$data['oneway_request'].'">'.$data['oneway_request'].'</span>
                                    </div>
                                    <div class="desc">Oneway Request</div>
                                </div>
                            </a>
                        </div>';
	}
	public function fetch_booking()
	{
		$post= $this->input->post(); 

		if($post['temp'] == '1')
		{
			$todaydate = date('Y-m-d');
			$booking_inquiry = $this->db->select("*")->from('booking_inquiry')->order_by('bi_created_datetime', 'DESC')->limit('20')->get()->result();
			
		}/*
		else if($post['temp'] == '2')
		{
			 $tommorrow = date('Y-m-d', strtotime("+1 days"));
			 $todaydate = date('Y-m-d');

		 	 $booking_inquiry = $this->db->select("*")->where('DATE(bi_created_datetime)', $tommorrow )->from('booking_inquiry')->get()->result();
			//echo "<pre>"; 
			//print_r($data); exit; 
		}
		else if($post['temp'] == '3')
		{
			 $next7 = date('Y-m-d', strtotime("+7 days"));
			 $todaydate = date('Y-m-d');

		 	 $booking_inquiry = $this->db->select("*")->where('DATE(bi_created_datetime) >=', $todaydate )->where('DATE(bi_created_datetime) <=', $next7 )->from('booking_inquiry')->get()->result();
			//echo "<pre>"; 
			//print_r($data); exit; 
		} */
			if(count($booking_inquiry)){

				foreach($booking_inquiry as $booking){

						echo '<!-- BEGIN: LIST -->
							<div class="mt-comments">
                                                <div class="mt-comment">
                                                    
                                                    <div class="mt-comment-body">
                                                	<form action="'.base_url().'index.php/BookingInquiry_management/edit_booking_enquiry" method="post">
                                                        <div class="mt-comment-info">
                                                            <span class="mt-comment-author">'.$booking->bi_name.'</span>
                                                            <span class="mt-comment-date">'.date("d-m-Y", strtotime($booking->bi_plan_date)).'</span>
                                                        </div>
                                                        <div class="mt-comment-text"> ID:'.$booking->bi_id.'</div>
                                                        <div class="mt-comment-text"> Date:'.date("d-m-Y", strtotime($booking->bi_plan_date)).'</div>
                                                         <div class="mt-comment-text"> Contact:'.$booking->bi_mobile.' </div>
                                                        <div class="mt-comment-text"> Route:'.$booking->bi_from_city.' -'.$booking->bi_to_city.'</div>

                                                        <button type="submit" value="'.$booking->id.'" name="id" class="btn btn-outline green btn-sm">View</button>
                                                    </div>
                                                </div>
                                                </div>
                                                <!-- END: LIST -->'; 

				}

			}
			else
			{
				echo '<!-- BEGIN: LIST -->
                                            <div class="mt-comments">
                                                <div class="mt-comment">
                                                   NO RECORDS FOUND.
                                                </div>
                                                </div>
                                            <!-- END: LIST -->'; 
			}
	}

	public function fetch_onewayagent()
	{
		
	
		$post= $this->input->post(); 

		if($post['temp'] == '1')
		{
			$todaydate= date("Y-m-d"); 
			$after20= date("Y-m-d", strtotime('+20 days')); 
			$this->db->select("ood.*,ag.a_full_name as agentname, brl.b_pk_id, brl.b_pickup_point, brl.b_drop_point, bl.b_status");
			$this->db->from("oneway_offer_detail ood");
			$this->db->join("agent_detail ag","ag.id = ood.oo_agent_id","left");
			$this->db->join("booking_request_list brl","brl.b_pk_id = ood.id","left");
			$this->db->join("booking_list bl","bl.b_pk_id = ood.id","left");
			//$this->db->where("brl.b_status",2);
			$this->db->where('ood.oo_status', 1);
			$this->db->where("DATE(ood.oo_valid_date) >=", $todaydate);
			$this->db->where("DATE(ood.oo_valid_date) <=", $after20);
			$this->db->order_by("ood.oo_valid_date","ASC");
			$this->db->order_by("ood.oo_valid_from_time","ASC");
			$this->db->order_by("ood.oo_valid_to_time","ASC");
			$this->db->group_by('ood.id');
			$query = $this->db->get();

			$agent_posts = $query->result();

			//echo "<pre>"; 
			//print_r($agent_posts); exit; 
			
		}
		// else if($post['temp'] == '2')
		// {
		// 	$tommorrow = date("Y-m-d", strtotime(' +1 days')); 
		// 	$this->db->select("ood.*,ag.a_full_name as agentname, brl.b_pk_id, brl.b_pickup_point, brl.b_drop_point, bl.b_status");
		// 	$this->db->from("oneway_offer_detail ood");
		// 	$this->db->join("agent_detail ag","ag.id = ood.oo_agent_id","left");
		// 	$this->db->join("booking_request_list brl","brl.b_pk_id = ood.id","left");
		// 	$this->db->join("booking_list bl","bl.b_pk_id = ood.id","left");
		// 	//$this->db->where("brl.b_status",2);
		// 	$this->db->where('ood.oo_status', 1);
		// 	$this->db->where("DATE(ood.oo_created_date_time) =", $tommorrow);
		// 	$this->db->order_by("ood.oo_valid_date","ASC");
		// 	$this->db->order_by("ood.oo_valid_from_time","ASC");
		// 	$this->db->order_by("ood.oo_valid_to_time","ASC");
		// 	$this->db->group_by('ood.id');

		// 	$query = $this->db->get();

		// 	$agent_posts = $query->result();
		// 	//echo "<pre>"; 
		// 	//print_r($agent_posts); exit; 
		// }
		// else if($post['temp'] == '3')
		// {
		// 	 $next7days = date("Y-m-d", strtotime(' +7 days')); 


		// 	$this->db->select("ood.*,ag.a_full_name as agentname, brl.b_pk_id, brl.b_pickup_point, brl.b_drop_point, bl.b_status");
		// 	$this->db->from("oneway_offer_detail ood");
		// 	$this->db->join("agent_detail ag","ag.id = ood.oo_agent_id","left");
		// 	$this->db->join("booking_request_list brl","brl.b_pk_id = ood.id","left");
		// 	$this->db->join("booking_list bl","bl.b_pk_id = ood.id","left");
		// 	//$this->db->where("brl.b_status",2);
		// 	$this->db->where('ood.oo_status', 1);
		// 	$this->db->where("DATE(ood.oo_created_date_time) <=", $next7days);
		// 	$this->db->where("DATE(ood.oo_created_date_time) >=", date("Y-m-d"));
		// 	$this->db->order_by("ood.oo_valid_date","ASC");
		// 	$this->db->order_by("ood.oo_valid_from_time","ASC");
		// 	$this->db->order_by("ood.oo_valid_to_time","ASC");
		// 	$this->db->group_by('ood.id');

		// 	$query = $this->db->get();

		// 	$agent_posts = $query->result();
		// 	//echo "<pre>"; 
		// 	//print_r($agent_posts); exit; 
		// }
		if(count($agent_posts))
		{
			foreach($agent_posts as $posts)
			{
				 if($posts->b_status != 1) { if($posts->oo_status != 1) 
				 {
				 	$current_status = '<span class="label label-sm label-danger"> INACTIVE </span>';
				 }
				 else if($posts->oo_status == 1)
				 {
				 	$current_status = '<span class="label label-sm label-info" >ACTIVE  </span>';
				 }
				 else
				 {
				 	$current_status = '<span class="label label-sm label-success"> BOOKED </span>';
				 }

				 $route = $this->db->get_where('city_detail',array('id'=>$posts->oo_first_city))->row()->c_name." - ".$this->db->get_where('city_detail',array('id'=>$posts->oo_second_city))->row()->c_name; 

				 if(!empty($posts->oo_third_city)){ 

				 		$this->db->get_where('city_detail',array('id'=>$posts->oo_third_city))->row()->c_name;

				 		$route = $route.' - '.$this->db->get_where('city_detail',array('id'=>$posts->oo_third_city))->row()->c_name;
				 }

				echo '<!-- BEGIN: LIST -->
                                            <div class="mt-comments">
                                                <div class="mt-comment">
                                                    <a href="'.base_url().'index.php/Oneway_offer_management">
                                                    <div class="mt-comment-body">
                                                        <div class="mt-comment-info">
                                                            <span class="mt-comment-author">'.$posts->agentname .'</span>
                                                            <span class="mt-comment-date">'.date("d-m-Y H:i:s", strtotime($posts->oo_valid_date)) .'</span>
                                                        </div>
                                                        <div class="mt-comment-text"> Offer ID: '.$posts->oo_id . '</div>
                                                      	<div class="mt-comment-text">'.$route.' </div>
                                                        <div class="mt-comment-text"> Expiry: '. date("d-m-Y", strtotime($posts->oo_valid_date)).' '. $posts->oo_valid_to_time .' </div><span class="label label-sm label-success ">'.$current_status.'
                                                       </span></div></a>
                                                	</div>
                                                
                                                </div>
                                            <!-- END:LIST -->';
         	}
		
		} 
		}	
		else
		{
			echo '<!-- BEGIN: LIST -->
                                            <div class="mt-comments">
                                                <div class="mt-comment">
                                                   NO RECORDS FOUND.
                                                </div>
                                                </div>
                                            <!-- END: LIST -->'; 
		}
			
	
	}

	public function fetch_onewaycust()
	{
	
		$post= $this->input->post(); 

		if($post['temp'] == '1')
		{
			$todaydate= date("Y-m-d"); 
			$after20= date("Y-m-d", strtotime('+20 days'));
			
			$this->db->select('booking_request_list.*,package_type.package_sub_type,package_type.package_type,city_detail.c_name AS fromcity,cd.c_name AS tocity');
			$this->db->from('booking_request_list');
			$this->db->join('package_type','package_type.id=booking_request_list.b_type');
			$this->db->join('city_detail','city_detail.id=booking_request_list.b_from_city');
			$this->db->join('city_detail cd','cd.id=booking_request_list.b_to_city');
			//$this->db->where('booking_request_list.b_booking_date_time', $todaydate);
			$this->db->where('package_type.id',1);
			$this->db->where('booking_request_list.b_status', 2);
			$this->db->where("DATE(booking_request_list.b_from_date) >=", $todaydate);
			$this->db->where("DATE(booking_request_list.b_from_date) <=", $after20);

			$customer_requested = $this->db->get()->result();

			//echo "<pre>";
			//print_r($customer_requested); exit; 
		}
		// else if($post['temp'] == '2')
		// {
		// 	$tommorrow = date("Y-m-d", strtotime(' +1 days'));

		// 	$this->db->select('booking_request_list.*,package_type.package_sub_type,package_type.package_type,city_detail.c_name AS fromcity,cd.c_name AS tocity');
		// 	$this->db->from('booking_request_list');
		// 	$this->db->join('package_type','package_type.id=booking_request_list.b_type');
		// 	$this->db->join('city_detail','city_detail.id=booking_request_list.b_from_city');
		// 	$this->db->join('city_detail cd','cd.id=booking_request_list.b_to_city');
		// 	//$this->db->where('booking_request_list.b_booking_date_time', $todaydate);
		// 	$this->db->where('package_type.id',1);
		// 	$this->db->where('booking_request_list.b_status', 2);
		// 	$this->db->where('DATE(booking_request_list.b_booking_date_time)',$tommorrow);

		// 	$customer_requested = $this->db->get()->result();

		// 	//echo "<pre>"; 
		// 	//print_r($customer_requested); exit; 
		// }
		// else if($post['temp'] == '3')
		// {
		// 	$next7days = date("Y-m-d", strtotime(' +7 days')); 

		// 	$this->db->select('booking_request_list.*,package_type.package_sub_type,package_type.package_type,city_detail.c_name AS fromcity,cd.c_name AS tocity');
		// 	$this->db->from('booking_request_list');
		// 	$this->db->join('package_type','package_type.id=booking_request_list.b_type');
		// 	$this->db->join('city_detail','city_detail.id=booking_request_list.b_from_city');
		// 	$this->db->join('city_detail cd','cd.id=booking_request_list.b_to_city');
		// 	//$this->db->where('booking_request_list.b_booking_date_time', $todaydate);
		// 	$this->db->where('package_type.id',1);
		// 	$this->db->where('booking_request_list.b_status', 2);
		// 	$this->db->where("DATE(booking_request_list.b_booking_date_time) <=", $next7days);
		// 	$this->db->where("DATE(booking_request_list.b_booking_date_time) >=", date("Y-m-d"));
			

		// 	$customer_requested = $this->db->get()->result();
		// 	//echo "<pre>"; 
		// 	//print_r($customer_requested); exit;
		// }
		if(count($customer_requested))
		{
			foreach ($customer_requested as $request) {
				
				echo ' <!-- BEGIN: LIST -->
                                            <div class="mt-comments">
                                                <div class="mt-comment">
                                                    <a href="'.base_url().'index.php/Oneway_offer_management/booking_request/URV/'.$request->id.'">
                                                    <div class="mt-comment-body">
                                                        <div class="mt-comment-info">
                                                            <span class="mt-comment-author">'.$request->b_id .' - '. $request->b_p_name .'</span>
                                                            <span class="mt-comment-date">'. date("d-m-y h:i", strtotime($request->b_from_date)).'</span>
                                                        </div>
                                                        <div class="mt-comment-text"> Offer ID: '.$request->b_package_id  .' </div>
                                                        <div class="mt-comment-text">'. $request->fromcity.' - '. $request->tocity.'</div> 
                                                    </div></a>
                                                </div>
                                                </div>
                                            <!-- END: LIST -->';
			}
		}
		else
		{
			echo '<!-- BEGIN: LIST -->
                                            <div class="mt-comments">
                                                <div class="mt-comment">
                                                   NO RECORDS FOUND.
                                                </div>
                                                </div>
                                            <!-- END: LIST -->';
		}
	
	} 

	public function fetch_hscust()
	{
		$post= $this->input->post(); 

		if($post['temp'] == '1')
		{

			$this->db->select('helpdesk_support.*, passenger_list.p_full_name, passenger_list.id as customerid');
			$this->db->join('passenger_list', 'passenger_list.id=helpdesk_support.hs_sender_id');
		 	$this->db->from('helpdesk_support');
		 	$this->db->where('hs_type',1);
		 	$this->db->order_by('hs_created_datetime', 'DESC');
		 	$this->db->limit('20');
		 	//$this->db->where('DATE(hs_created_datetime)', date("Y-m-d"));
		 	$helpdesk_support_customer = $this->db->get()->result();

		}
		/*else if($post['temp'] == '2')
		{
			$yesterday = date("Y-m-d", strtotime(' -1 days')); 
			$this->db->select('helpdesk_support.*, passenger_list.p_full_name');
			$this->db->join('passenger_list', 'passenger_list.id=helpdesk_support.hs_sender_id');
		 	$this->db->from('helpdesk_support');
		 	$this->db->where('hs_type',1);
		 	$this->db->where('DATE(hs_created_datetime) >=', $yesterday);
		 	$this->db->where('DATE(hs_created_datetime) <=', date("Y-m-d"));
		 	$helpdesk_support_customer = $this->db->get()->result();
			
		}
		else if($post['temp'] == '3')
		{
			$last7days = date("Y-m-d", strtotime(' -7 days')); 
			$this->db->select('helpdesk_support.*, passenger_list.p_full_name');
			$this->db->join('passenger_list', 'passenger_list.id=helpdesk_support.hs_sender_id');
		 	$this->db->from('helpdesk_support');
		 	$this->db->where('hs_type',1);
		 	$this->db->where('DATE(hs_created_datetime) >=', $last7days);
		 	$this->db->where('DATE(hs_created_datetime) <=', date("Y-m-d"));
		 	$helpdesk_support_customer = $this->db->get()->result();
			
		} */
		if(count($helpdesk_support_customer))
		{
			foreach ($helpdesk_support_customer as $support) {
				if($support->hs_status == 0)
				{
					$status='<span class="label label-sm label-danger ">Unread</span>';
				}
				else
				{
					$status='<span class="label label-sm label-success ">read</span>';
				}
				echo '<li class="in">
                                                <form action="'.base_url().'index.php/Passenger_management/passenger_helpdesk_support" method="post">
                                                <div class="message">
                                                    <span class="arrow"> </span>
                                                    '.$support->p_full_name.' 
                                                    <span class="datetime"> at '.date("d-m-Y H:i:s", strtotime($support->hs_created_datetime)).' </span>
                                                    <span class="body"> '.$support->hs_message.' </span>
                                                   '.$status.'
                                                   <button type="submit" value="'.$support->customerid.'" name="agent_id" class="btn btn-outline green btn-sm">View</button>
                                                </div>
                                                
                                                </form>
                                            </li>';
			}
		}
		else
		{
			echo '<li class="in">
                       NO RECORDS FOUND. 
                  </li>';
		}
	}
	public function fetch_hsagent()
	{
		$post= $this->input->post(); 

		if($post['temp'] == '1')
		{

			$this->db->select('helpdesk_support.*, agent_detail.a_full_name, agent_detail.id as agentid');
			$this->db->join('agent_detail', 'agent_detail.id=helpdesk_support.hs_sender_id');
		 	$this->db->from('helpdesk_support');
		 	$this->db->where('hs_type',2);
		 	//$this->db->where('DATE(hs_created_datetime)', date("Y-m-d"));
		 	$this->db->order_by('hs_created_datetime', 'DESC');
		 	$this->db->limit('20');
		 	$helpdesk_support_agent = $this->db->get()->result();

		}
		/*else if($post['temp'] == '2')
		{
			$yesterday = date("Y-m-d", strtotime(' -1 days')); 
			$this->db->select('helpdesk_support.*, agent_detail.a_full_name');
			$this->db->join('agent_detail', 'agent_detail.id=helpdesk_support.hs_sender_id');
		 	$this->db->from('helpdesk_support');
		 	$this->db->where('hs_type',2);
		 	$this->db->where('DATE(hs_created_datetime) >=', $yesterday);
		 	$this->db->where('DATE(hs_created_datetime) <=', date("Y-m-d"));
		 	$helpdesk_support_agent = $this->db->get()->result();
			
		}
		else if($post['temp'] == '3')
		{
			$last7days = date("Y-m-d", strtotime(' -7 days'));
			$this->db->select('helpdesk_support.*, agent_detail.a_full_name');
			$this->db->join('agent_detail', 'agent_detail.id=helpdesk_support.hs_sender_id');
		 	$this->db->from('helpdesk_support');
		 	$this->db->where('hs_type',2);
		 	$this->db->where('DATE(hs_created_datetime) >=', $last7days);
		 	$this->db->where('DATE(hs_created_datetime) <=', date("Y-m-d"));
		 	$helpdesk_support_agent = $this->db->get()->result();
			
		}*/
		if(count($helpdesk_support_agent))
		{
			foreach ($helpdesk_support_agent as $support) {
				if($support->hs_status == 0)
				{
					$status='<span class="label label-sm label-danger ">Unread</span>';
				}
				else
				{
					$status='<span class="label label-sm label-success ">read</span>';
				}
				echo '<li class="in">
                                                <form action="'.base_url().'index.php/Agent_management/agent_helpdesk_support" method="post">
                                                <div class="message">
                                                    <span class="arrow"> </span>
                                                    '.$support->a_full_name.' 
                                                    <span class="datetime"> at '.date("d-m-Y H:i:s", strtotime($support->hs_created_datetime)).' </span>
                                                    <span class="body"> '.$support->hs_message.' </span>
                                                   '.$status.'
                                                     <button type="submit" value="'.$support->agentid.'" name="agent_id" class="btn btn-outline green btn-sm">View</button>
                                                </div>
                                              
                                                </form>
                                            </li>';
			}
		}
		else
		{
			echo '<li class="in">
                       NO RECORDS FOUND. 
                  </li>';
		}
	}
	public function fetch_upinvoice()
	{
		$post= $this->input->post(); 

		if($post['temp'] == '1')
		{
			$this->db->select('booking_list.*,package_type.package_sub_type,package_type.package_type,city_detail.c_name, agent_detail.a_full_name, invoice.balance');
			$this->db->from('booking_list');
			$this->db->join('package_type','package_type.id=booking_list.b_type');
	    	$this->db->join('city_detail','city_detail.id=booking_list.b_from_city');
	    	$this->db->join('agent_detail','agent_detail.id=booking_list.b_agent_id');
	    	$this->db->join('invoice','invoice.id=booking_list.b_invoice_id');
			$this->db->where('invoice.balance >', '0');
			// $this->db->where('booking_list.b_status', '5');
			//$this->db->where('booking_list.b_from_date',date('Y-m-d'));
			$this->db->order_by('booking_list.b_booking_date_time', 'DESC');
		 	$this->db->limit('20');
			$unpaid_invoices= $this->db->get()->result();


		}
		/*else if($post['temp'] == '2')
		{
			$tommorrow = date("Y-m-d", strtotime(' +1 days')); 
			$this->db->select('booking_list.*,package_type.package_sub_type,package_type.package_type,city_detail.c_name, agent_detail.a_full_name');
			$this->db->from('booking_list');
			$this->db->join('package_type','package_type.id=booking_list.b_type');
	    	$this->db->join('city_detail','city_detail.id=booking_list.b_from_city');
	    	$this->db->join('agent_detail','agent_detail.id=booking_list.b_agent_id');
	    	$this->db->where('booking_list.b_from_date ', $tommorrow);
			//$this->db->where('booking_list.b_from_date >=',date('Y-m-d'));
			$unpaid_invoices= $this->db->get()->result();
			
		}
		else if($post['temp'] == '3')
		{
			$next7days = date("Y-m-d", strtotime(' +7 days'));
			$this->db->select('booking_list.*,package_type.package_sub_type,package_type.package_type,city_detail.c_name, agent_detail.a_full_name');
			$this->db->from('booking_list');
			$this->db->join('package_type','package_type.id=booking_list.b_type');
	    	$this->db->join('city_detail','city_detail.id=booking_list.b_from_city');
	    	$this->db->join('agent_detail','agent_detail.id=booking_list.b_agent_id');
	    	$this->db->where('booking_list.b_from_date <=', $next7days);
			$this->db->where('booking_list.b_from_date >=',date('Y-m-d'));
			$unpaid_invoices= $this->db->get()->result();
			
		} */
		if(count($unpaid_invoices))
		{
			foreach ($unpaid_invoices as $invoice) {
				// $b_inv= $this->db->get_where('invoice',array('id'=>$invoice->b_invoice_id))->row();
				// if(count($b_inv)){ $balance= $b_inv->balance;  }else{  $balance = 0; }
				// $due= 0;
				// if($invoice->b_status == 5){
    //                  if($balance > 0 )
    //                  	{
    //                  		$due = 0;
    //                  	}
    //                  	else
    //                  	{ 
    //                  		$due= 1; 
    //                  	} 
    //                  }
    //                  else if($invoice->b_status == 6)
    //                  {
    //                      if($balance > 0)
    //                      {
    //                         $due= 1; 
    //                      }
    //                      else
    //                      {
    //                         $due= 0;
    //                      }
    //                   }
    //              if($due == 1)
    //              {

				echo '<!-- BEGIN: Actions -->
                                            <div class="mt-actions">
                                                <div class="mt-action">
                                                    
                                                    <div class="mt-action-body">
                                                        <div class="mt-action-row">
                                                            <div class="mt-action-info ">
                                                               
                                                                <div class="mt-action-details ">
                                                                    <span class="mt-action-author">'.$invoice->b_p_name.'</span>
                                                                    <p class="mt-action-desc">ID: '.$invoice->b_id.'</p>
                                                                    <p class="mt-action-desc">Amount: Rs. '. $invoice->balance.'</p>
                                                                </div>
                                                            </div>
                                                            <div class="mt-action-datetime ">
                                                                <span class="mt-action-date">'. date("d-m-Y", strtotime($invoice->b_booking_date_time)) .'</span>
                                                               
                                                            </div>
                                                            <div class="mt-action-buttons ">
                                                                <div class="btn-group btn-group">
                                                                  <form action="'. base_url().'index.php/Invoice_view" method="post">

                                                                    <button type="submit" name="ticket_id" value="'.$invoice->b_invoice_id.'" class="btn btn-outline green btn-sm">View</button>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                </div>
                                            <!-- END: Actions -->';
               // }
                // else{
                // 	echo '<!-- BEGIN: Actions -->
                //                             <div class="mt-actions">
                //                                 <div class="mt-action">
                                                    
                //                                     <div class="mt-action-body">
                //                                         <div class="mt-action-row">
                //                                             NO RECORDS FOUND. 
                //                                             </div>
                //                                         </div>
                //                                     </div>
                //                                 </div>
                //                                 </div>
                //                             <!-- END: Actions -->';

                //                        break; 
                // }
			}
		}
		else
		{

			echo '<!-- BEGIN: Actions -->
                                            <div class="mt-actions">
                                                <div class="mt-action">
                                                    
                                                    <div class="mt-action-body">
                                                        <div class="mt-action-row">
                                                            NO RECORDS FOUND. 
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                </div>
                                            <!-- END: Actions -->';
		}
	}
	public function fetch_complain()
	{
		$post= $this->input->post(); 

		if($post['temp'] == '1')
		{
			
			$this->db->select('booking_list.*, agent_detail.a_full_name');
			$this->db->from('booking_list');
			$this->db->join('agent_detail','agent_detail.id=booking_list.b_agent_id');
			$this->db->where('booking_list.b_complain_msg !=', "");
			$this->db->order_by('booking_list.b_complain_datetime', 'DESC');
		 	$this->db->limit('20');

			$complaints = $this->db->get()->result();

		}
		/*else if($post['temp'] == '2')
		{
			$yesterday = date("Y-m-d", strtotime(' +1 days')); 
			$this->db->select('booking_list.*, agent_detail.a_full_name');
			$this->db->from('booking_list');
			$this->db->join('agent_detail','agent_detail.id=booking_list.b_agent_id');
			$this->db->where('booking_list.b_from_date', $yesterday);
			$complaints = $this->db->get()->result();
			
		}
		else if($post['temp'] == '3')
		{
			$last7days = date("Y-m-d", strtotime(' -7 days'));
			$this->db->select('booking_list.*, agent_detail.a_full_name');
			$this->db->from('booking_list');
			$this->db->join('agent_detail','agent_detail.id=booking_list.b_agent_id');
			$this->db->where('booking_list.b_from_date >=', $last7days);
			$this->db->where('booking_list.b_from_date <=', date('Y-m-d'));
			$complaints = $this->db->get()->result();
			
		} */
		if(count($complaints))
		{
			foreach ($complaints as $compl) {
				if($compl->b_complain_status == 0)
				{
					$status='<span class="label label-sm label-danger ">unread</span>';
				}
				else
				{
					$status='<span class="label label-sm label-success ">read</span>';
				}
				
                 

				echo '<!-- BEGIN: LIST -->
                                            <div class="mt-comments">
                                                <div class="mt-comment">
                                                
                                                    <div class="mt-comment-body">
                                                    <form action="'.base_url().'index.php/Local_view" method="post">
                                                        <div class="mt-comment-info">
                                                            <span class="mt-comment-author">'.$compl->b_p_name.'</span>
                                                            <span class="mt-comment-date">'. date("d-m-Y H:i:s", strtotime($compl->b_booking_date_time)) .'</span>
                                                        </div>
                                                        <div class="mt-comment-text"> ID: '. $compl->b_id .'</div>
                                                        <div class="mt-comment-text"> Trip Date : '. date("d/m/Y", strtotime($compl->b_from_date)) .'</div>
                                                         <div class="mt-comment-text"> Agent : '. $compl->a_full_name .' </div>'.$status.'
                                                         <button type="submit" value="'.$compl->id.'" name="local_view_id" class="btn btn-outline green btn-sm">View</button>
                                                         </form>
                                                    </div>
                                                    
                                                </div>
                                                </div>
                                            <!-- END: LIST -->';
                
			}
		}
		else
		{
			echo ' <!-- BEGIN: LIST -->
                                            <div class="mt-comments">
                                                <div class="mt-comment">
                                                   NO RECORDS FOUND.
                                                </div>
                                                </div>
                                            <!-- END: LIST -->';
		}
	}
}
?>