<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bookingterms extends CI_Controller 
{	
	 function __construct()
    {
        parent::__construct();
		$this->load->library('session');

    }
	
	public function offerterms($id = '') {
		$user = $this->session->has_userdata('user');
		if(empty($user)){
			redirect('index.php/Login');
		} else {
			$data = array();
			$this->db->select('*');
			$this->db->from('booking_terms');
			$this->db->where('Id', $id);
			$data['data'] = $this->db->get()->row();
			$this->load->view('terms/offertemas', $data);
		}
	}

	public function onewayterms($id = '') {
		$user = $this->session->has_userdata('user');
		if(empty($user)){
			redirect('index.php/Login');
		} else {
			$data = array();
			$this->db->select('*');
			$this->db->from('booking_terms');
			$this->db->where('Id', $id);
			$data['data'] = $this->db->get()->row();
			$this->load->view('terms/onewayterms', $data);
		}
	}

	public function multicity($id = '') {
		$user = $this->session->has_userdata('user');
		if(empty($user)){
			redirect('index.php/Login');
		} else {
			$data = array();
		 	$this->db->select('*');
			$this->db->from('booking_terms');
			$this->db->where('Id', $id);
			$data['data'] = $this->db->get()->row();
			$this->load->view('terms/multicity', $data);
		}
	}

	public function roundtrip($id = '') {
		$user = $this->session->has_userdata('user');
		if(empty($user)){
			redirect('index.php/Login');
		} else {
			$data = array();
			$this->db->select('*');
			$this->db->from('booking_terms');
			$this->db->where('Id', $id);
			$data['data'] = $this->db->get()->row();
			$this->load->view('terms/roundtrip', $data);
		}
	}

	public function localpackage($id = '') {
		$user = $this->session->has_userdata('user');
		if(empty($user)){
			redirect('index.php/Login');
		} else {
			$data = array();
			$this->db->select('*');
			$this->db->from('booking_terms');
			$this->db->where('Id', $id);
			$data['data'] = $this->db->get()->row();
			$this->load->view('terms/localpackage', $data);
		}
	}

	public function offerterms_update() {
	//print_r($this->input->post()); exit;
		$update_data = array(
			'package_terms' => $this->input->post("packageterms"),
			'terms_and_conditions' => $this->input->post("termsandcon"),
			'privacy_policy' => $this->input->post("ppolicy"),
			'cancellation_terms' => $this->input->post("crules"),
			'created_type' => 0,
			'created_by' => $this->session->userdata('user')->id,
			'created_date_time' => date('Y-m-d H:i:s'),
			'updated_type' => 0,
			'updated_by' => $this->session->userdata('user')->id,
			'updated_date_time' => date('Y-m-d H:i:s'),
		);
		$this->db->where('Id',1);
		$this->db->update('booking_terms', $update_data);
		if ($this->db->affected_rows() > 0) {
			redirect('index.php/bookingterms/offerterms/1');
		}

	}

	public function onewayterms_update() {
		$update_data = array(
			'package_terms' => $this->input->post("packageterms"),
			'terms_and_conditions' => $this->input->post("termsandcon"),
			'privacy_policy' => $this->input->post("ppolicy"),
			'cancellation_terms' => $this->input->post("crules"),
			'created_type' => 0,
			'created_by' => $this->session->userdata('user')->id,
			'created_date_time' => date('Y-m-d H:i:s'),
			'updated_type' => 0,
			'updated_by' => $this->session->userdata('user')->id,
			'updated_date_time' => date('Y-m-d H:i:s'),
		);
		$this->db->where('Id',2);
		$this->db->update('booking_terms', $update_data);
		if ($this->db->affected_rows() > 0) {
			redirect('index.php/bookingterms/onewayterms/2');
		}
	}

	public function multicity_update() {
		$update_data = array(
			'package_terms' => $this->input->post("packageterms"),
			'terms_and_conditions' => $this->input->post("termsandcon"),
			'privacy_policy' => $this->input->post("ppolicy"),
			'cancellation_terms' => $this->input->post("crules"),
			'created_type' => 0,
			'created_by' => $this->session->userdata('user')->id,
			'created_date_time' => date('Y-m-d H:i:s'),
			'updated_type' => 0,
			'updated_by' => $this->session->userdata('user')->id,
			'updated_date_time' => date('Y-m-d H:i:s'),
		);
		$this->db->where('Id',3);
		$this->db->update('booking_terms', $update_data);
		if ($this->db->affected_rows() > 0) {
			redirect('index.php/bookingterms/multicity/3');
		}
	}

	public function roundtrip_update() {
		$update_data = array(
			'package_terms' => $this->input->post("packageterms"),
			'terms_and_conditions' => $this->input->post("termsandcon"),
			'privacy_policy' => $this->input->post("ppolicy"),
			'cancellation_terms' => $this->input->post("crules"),
			'created_type' => 0,
			'created_by' => $this->session->userdata('user')->id,
			'created_date_time' => date('Y-m-d H:i:s'),
			'updated_type' => 0,
			'updated_by' => $this->session->userdata('user')->id,
			'updated_date_time' => date('Y-m-d H:i:s'),
		);
		$this->db->where('Id',4);
		$this->db->update('booking_terms', $update_data);
		if ($this->db->affected_rows() > 0) {
			redirect('index.php/bookingterms/roundtrip/4');
		}
	}

	public function localpackage_update() {
		$update_data = array(
			'package_terms' => $this->input->post("packageterms"),
			'terms_and_conditions' => $this->input->post("termsandcon"),
			'privacy_policy' => $this->input->post("ppolicy"),
			'cancellation_terms' => $this->input->post("crules"),
			'created_type' => 0,
			'created_by' => $this->session->userdata('user')->id,
			'created_date_time' => date('Y-m-d H:i:s'),
			'updated_type' => 0,
			'updated_by' => $this->session->userdata('user')->id,
			'updated_date_time' => date('Y-m-d H:i:s'),
		);
		$this->db->where('Id',5);
		$this->db->update('booking_terms', $update_data);
		if ($this->db->affected_rows() > 0) {
			redirect('index.php/bookingterms/localpackage/5');
		}
	}
	
}
?>