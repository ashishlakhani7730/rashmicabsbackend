<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Backup extends CI_Controller {

	public function index()
	{
		$this->load->model('General_data');
		$this->General_data->check_login();
		$this->load->dbutil();

        $prefs = array(     
                'format'      => 'zip',             
                'filename'    => 'rashmicabs_db.sql'
              );

		$backup = $this->dbutil->backup($prefs); 

        $db_name = 'rashmicabs-backup-on-'. date("d-m-Y-H-i-s") .'.zip';
        $save = 'backup/'.$db_name;
		
        $this->load->helper('file');
        write_file($save, $backup); 
		
        $this->load->helper('download');
		
        force_download($db_name, $backup);
		
		$msg['success'] = "Backup generated!";
		$this->session->set_flashdata('success',$msg);
		redirect(site_url('Dashboard'));
	}
	
	
	
}
