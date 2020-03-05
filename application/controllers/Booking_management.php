<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Booking_management extends CI_Controller 
{	
	 function __construct()
    {
        parent::__construct();
		$this->load->model('state_city_model');		
        $this->load->model('General_data');
		$this->load->library('session');
    }	
		 
	public function index()
	{
		$user = $this->session->has_userdata('user');
		if(empty($user)){
			redirect('index.php/Login');
		}else {	
		/*				
		$this->db->select('booking_list.*,package_type.package_sub_type,package_type.package_type,city_detail.c_name');
		$this->db->from('booking_list');
		$this->db->join('package_type','package_type.id=booking_list.b_type');
		$this->db->join('city_detail','city_detail.id=booking_list.b_from_city');
		$this->db->where('package_type.id',3);*/
		
		$this->db->select('booking_list.*,package_type.package_sub_type,package_type.package_type,city_detail.c_name');
		$this->db->from('booking_list');
		$this->db->join('package_type','package_type.id=booking_list.b_type');
		$this->db->join('city_detail','city_detail.id=booking_list.b_from_city');
		$this->db->where('package_type.id',3);
		$this->db->where("booking_list.`b_invoice_id` = (SELECT id FROM invoice WHERE id = booking_list.`b_invoice_id` AND `balance` > 0)");
		$this->db->where("booking_list.`b_status` !=",6);
		$this->db->where("booking_list.b_from_date BETWEEN CURDATE() - INTERVAL 2 DAY AND CURDATE()");
		$this->db->order_by("booking_list.b_status","ASC");
		$this->db->order_by("booking_list.b_from_date","ASC");
		$this->db->order_by("booking_list.b_from_time","ASC");
		
		$outstation_booking_list1 = $this->db->get()->result();
		
		$this->db->select('booking_list.*,package_type.package_sub_type,package_type.package_type,city_detail.c_name');
		$this->db->from('booking_list');
		$this->db->join('package_type','package_type.id=booking_list.b_type');
		$this->db->join('city_detail','city_detail.id=booking_list.b_from_city');
		$this->db->where('package_type.id',3);
		$this->db->where("booking_list.`b_status` !=",6);
		$this->db->where("booking_list.b_from_date BETWEEN CURDATE() AND CURDATE() + INTERVAL 10 DAY");
		$this->db->order_by("booking_list.b_status","ASC");
		$this->db->order_by("booking_list.b_from_date","ASC");
		$this->db->order_by("booking_list.b_from_time","ASC");
		
		$outstation_booking_list2 = $this->db->get()->result();
		
		$booking_data['outstation_booking_list'] = array_merge($outstation_booking_list1,$outstation_booking_list2);
		
		/*
		$this->db->select('booking_list.*,package_type.package_sub_type,package_type.package_type,city_detail.c_name');
		$this->db->from('booking_list');
		$this->db->join('package_type','package_type.id=booking_list.b_type');
		$this->db->join('city_detail','city_detail.id=booking_list.b_from_city');
		$this->db->where('package_type.id',4);*/
		
		$this->db->select('booking_list.*,package_type.package_sub_type,package_type.package_type,city_detail.c_name');
		$this->db->from('booking_list');
		$this->db->join('package_type','package_type.id=booking_list.b_type');
		$this->db->join('city_detail','city_detail.id=booking_list.b_from_city');
		$this->db->where('package_type.id',4);
		$this->db->where("booking_list.`b_invoice_id` = (SELECT id FROM invoice WHERE id = booking_list.`b_invoice_id` AND `balance` > 0)");
		$this->db->where("booking_list.`b_status` !=",6);
		$this->db->where("booking_list.b_from_date BETWEEN CURDATE() - INTERVAL 2 DAY AND CURDATE()");
		$this->db->order_by("booking_list.b_status","ASC");
		$this->db->order_by("booking_list.b_from_date","ASC");
		$this->db->order_by("booking_list.b_from_time","ASC");
		
		$multicity_booking_list1 = $this->db->get()->result();
		
		$this->db->select('booking_list.*,package_type.package_sub_type,package_type.package_type,city_detail.c_name');
		$this->db->from('booking_list');
		$this->db->join('package_type','package_type.id=booking_list.b_type');
		$this->db->join('city_detail','city_detail.id=booking_list.b_from_city');
		$this->db->where('package_type.id',4);
		$this->db->where("booking_list.`b_status` !=",6);
		$this->db->where("booking_list.b_from_date BETWEEN CURDATE() AND CURDATE() + INTERVAL 10 DAY");
		$this->db->order_by("booking_list.b_status","ASC");
		$this->db->order_by("booking_list.b_from_date","ASC");
		$this->db->order_by("booking_list.b_from_time","ASC");
		
		$multicity_booking_list2 = $this->db->get()->result();
		
		$booking_data['multicity_booking_list'] = array_merge($multicity_booking_list1,$multicity_booking_list2);
		
		/*
		$this->db->select('booking_list.*,package_type.package_sub_type,package_type.package_type,city_detail.c_name');
		$this->db->from('booking_list');
		$this->db->join('package_type','package_type.id=booking_list.b_type');
		$this->db->join('city_detail','city_detail.id=booking_list.b_from_city');
		$this->db->where('package_type.package_type_id',3);*/
		$lid = array('5', '6', '7');
		$this->db->select('booking_list.*,package_type.package_sub_type,package_type.package_type,city_detail.c_name');
		$this->db->from('booking_list');
		$this->db->join('package_type','package_type.id=booking_list.b_type');
		$this->db->join('city_detail','city_detail.id=booking_list.b_from_city');
		$this->db->where_in('package_type.id',$lid);
		$this->db->where("booking_list.`b_invoice_id` = (SELECT id FROM invoice WHERE id = booking_list.`b_invoice_id` AND `balance` > 0)");
		$this->db->where("booking_list.`b_status` !=",6);
		$this->db->where("booking_list.b_from_date BETWEEN CURDATE() - INTERVAL 2 DAY AND CURDATE()");
		$this->db->order_by("booking_list.b_status","ASC");
		$this->db->order_by("booking_list.b_from_date","ASC");
		$this->db->order_by("booking_list.b_from_time","ASC");
		
		$local_booking_list1 = $this->db->get()->result();
		
		$this->db->select('booking_list.*,package_type.package_sub_type,package_type.package_type,city_detail.c_name');
		$this->db->from('booking_list');
		$this->db->join('package_type','package_type.id=booking_list.b_type');
		$this->db->join('city_detail','city_detail.id=booking_list.b_from_city');
		$this->db->where_in('package_type.id',$lid);
		$this->db->where("booking_list.`b_status` !=",6);
		$this->db->where("booking_list.b_from_date BETWEEN CURDATE() AND CURDATE() + INTERVAL 10 DAY");
		$this->db->order_by("booking_list.b_status","ASC");
		$this->db->order_by("booking_list.b_from_date","ASC");
		$this->db->order_by("booking_list.b_from_time","ASC");
		
		$local_booking_list2 = $this->db->get()->result();
		
		$booking_data['local_booking_list'] = array_merge($local_booking_list1,$local_booking_list2);
		
		/*
		$this->db->select('booking_list.*,package_type.package_sub_type,package_type.package_type,city_detail.c_name');
		$this->db->from('booking_list');
		$this->db->join('package_type','package_type.id=booking_list.b_type');
		$this->db->join('city_detail','city_detail.id=booking_list.b_from_city');
		$this->db->where('package_type.id',2);*/
		
		$this->db->select('booking_list.*,package_type.package_sub_type,package_type.package_type,city_detail.c_name');
		$this->db->from('booking_list');
		$this->db->join('package_type','package_type.id=booking_list.b_type');
		$this->db->join('city_detail','city_detail.id=booking_list.b_from_city');
		$this->db->where('package_type.id',2);
		$this->db->where("booking_list.`b_invoice_id` = (SELECT id FROM invoice WHERE id = booking_list.`b_invoice_id` AND `balance` > 0)");
		$this->db->where("booking_list.`b_status` !=",6);
		$this->db->where("booking_list.b_from_date BETWEEN CURDATE() - INTERVAL 2 DAY AND CURDATE()");
		$this->db->order_by("booking_list.b_status","ASC");
		$this->db->order_by("booking_list.b_from_date","ASC");
		$this->db->order_by("booking_list.b_from_time","ASC");
		
		$oneway_booking_list1 = $this->db->get()->result();
		
		$this->db->select('booking_list.*,package_type.package_sub_type,package_type.package_type,city_detail.c_name');
		$this->db->from('booking_list');
		$this->db->join('package_type','package_type.id=booking_list.b_type');
		$this->db->join('city_detail','city_detail.id=booking_list.b_from_city');
		$this->db->where('package_type.id',2);
		$this->db->where("booking_list.`b_status` !=",6);
		$this->db->where("booking_list.b_from_date BETWEEN CURDATE() AND CURDATE() + INTERVAL 10 DAY");
		$this->db->order_by("booking_list.b_status","ASC");
		$this->db->order_by("booking_list.b_from_date","ASC");
		$this->db->order_by("booking_list.b_from_time","ASC");
		
		$oneway_booking_list2 = $this->db->get()->result();
		
		$booking_data['oneway_booking_list'] = array_merge($oneway_booking_list1,$oneway_booking_list2);
		
		/*
		$this->db->select('booking_list.*,package_type.package_sub_type,package_type.package_type,city_detail.c_name');
		$this->db->from('booking_list');
		$this->db->join('package_type','package_type.id=booking_list.b_type');
		$this->db->join('city_detail','city_detail.id=booking_list.b_from_city');
		$this->db->where('package_type.id',1);*/
		
		
		$this->db->select('booking_list.*,package_type.package_sub_type,package_type.package_type,city_detail.c_name');
		$this->db->from('booking_list');
		$this->db->join('package_type','package_type.id=booking_list.b_type');
		$this->db->join('city_detail','city_detail.id=booking_list.b_from_city');
		$this->db->where('package_type.id',1);
		$this->db->where("booking_list.`b_invoice_id` = (SELECT id FROM invoice WHERE id = booking_list.`b_invoice_id` AND `balance` > 0)");
		$this->db->where("booking_list.`b_status` !=",6);
		$this->db->where("booking_list.b_from_date BETWEEN CURDATE() - INTERVAL 2 DAY AND CURDATE()");
		$this->db->order_by("booking_list.b_status","ASC");
		$this->db->order_by("booking_list.b_from_date","ASC");
		$this->db->order_by("booking_list.b_from_time","ASC");
		
		$oneway_offer_booking_list1 = $this->db->get()->result();
		
		$this->db->select('booking_list.*,package_type.package_sub_type,package_type.package_type,city_detail.c_name');
		$this->db->from('booking_list');
		$this->db->join('package_type','package_type.id=booking_list.b_type');
		$this->db->join('city_detail','city_detail.id=booking_list.b_from_city');
		$this->db->where('package_type.id',1);
		$this->db->where("booking_list.`b_status` !=",6);
		$this->db->where("booking_list.b_from_date BETWEEN CURDATE() AND CURDATE() + INTERVAL 10 DAY");
		$this->db->order_by("booking_list.b_status","ASC");
		$this->db->order_by("booking_list.b_from_date","ASC");
		$this->db->order_by("booking_list.b_from_time","ASC");
		
		$oneway_offer_booking_list2 = $this->db->get()->result();
		
		$booking_data['oneway_offer_booking_list'] = array_merge($oneway_offer_booking_list1,$oneway_offer_booking_list2);
		
		
		// -- first four tab result --
		$this->db->select('booking_list.*,package_type.package_sub_type,package_type.package_type,city_detail.c_name');
		$this->db->from('booking_list');
		$this->db->join('package_type','package_type.id=booking_list.b_type');
		$this->db->join('city_detail','city_detail.id=booking_list.b_from_city');
		$this->db->where('booking_list.b_status',1);
		$this->db->where("booking_list.b_from_date BETWEEN CURDATE() AND CURDATE() + INTERVAL 10 DAY");
		$this->db->order_by("booking_list.b_from_date","ASC");
		$this->db->order_by("booking_list.b_from_time","ASC");
		$booking_data['pending_booking_list'] = $this->db->get()->result();
		
		$this->db->select('booking_list.*,package_type.package_sub_type,package_type.package_type,city_detail.c_name');
		$this->db->from('booking_list');
		$this->db->join('package_type','package_type.id=booking_list.b_type');
	    $this->db->join('city_detail','city_detail.id=booking_list.b_from_city');
		$this->db->where('booking_list.b_from_date',date('Y-m-d',strtotime("-1 days")));
		$booking_data['yesterday_list'] = $this->db->get()->result();
		
	    $this->db->select('booking_list.*,package_type.package_sub_type,package_type.package_type,city_detail.c_name');
		$this->db->from('booking_list');
		$this->db->join('package_type','package_type.id=booking_list.b_type');
	    $this->db->join('city_detail','city_detail.id=booking_list.b_from_city');
		$this->db->where('booking_list.b_from_date',date('Y-m-d'));
		$booking_data['today_list'] = $this->db->get()->result();
		
		
		$this->db->select('booking_list.*,package_type.package_sub_type,package_type.package_type,city_detail.c_name');
		$this->db->from('booking_list');
		$this->db->join('package_type','package_type.id=booking_list.b_type');
	    $this->db->join('city_detail','city_detail.id=booking_list.b_from_city');
		$this->db->where('booking_list.b_from_date',date('Y-m-d',strtotime("+1 days")));
		$booking_data['tomorrow_list'] = $this->db->get()->result();
		
    	//echo"<pre>";print_r($booking_data);echo"<pre>";exit;
		
		$this->load->view('manage_bookings',$booking_data);	
		}
	}
	
	public function delete_booking()
	{
		$user = $this->session->has_userdata('user');
		if(empty($user)){
			redirect('index.php/Login');
		}else {
			//echo "<pre>"; print_r($this->input->post()); exit;
		    $this -> db -> where('id', $this->input->post("delete_id"));
			$this -> db -> delete('booking_list');
			
			redirect('index.php/Booking_management');
		}
	}
	
}