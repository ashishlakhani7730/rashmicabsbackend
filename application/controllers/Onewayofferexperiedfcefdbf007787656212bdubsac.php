<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Onewayofferexperiedfcefdbf007787656212bdubsac extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
    } 
	
	public function index() 
	{
		//$data2 = "\n DATETIME -";
			
		//write_file(FCPATH.'crondata/cronsavedata2.txt', $data2, 'a');
		if($this->uri->segment(3) == "vqTUKJFpHwNvVRGcnJ7231b3mwJ4FoldeGAK")
		{
			//write_file(FCPATH.'crondata/cronsavedata2.txt', $data2, 'a');
			//echo FCPATH; exit;
			date_default_timezone_set('Asia/Kolkata');
			
			$nowdate = date('Y-m-d');
			$nowtime = date('H:i:s');

			$sql = "SELECT ood.id FROM oneway_offer_detail ood WHERE ood.oo_valid_date < '$nowdate' AND ood.oo_valid_to_time > '$nowtime' AND NOT EXISTS(SELECT brl.id FROM booking_request_list brl WHERE ood.id = brl.b_pk_id) AND NOT EXISTS(SELECT bl.id FROM booking_list bl WHERE ood.id = bl.b_pk_id)";
			//echo $sql; exit;
			//write_file(FCPATH.'crondata/cronsavedata2.txt', $sql, 'a'); exit;
			$query = $this->db->query($sql);
			
			$getitem = $query->result();
			
			foreach($getitem as $experid)
			{
				$this->db->where("id",$experid->id);
				$this->db->delete("oneway_offer_detail");
				
				$data = "\n DATETIME - ".$nowdate." ".$nowtime."DELETE ID FROM oneway_offer_detail table id is -".$experid->id."\n";
			
				write_file(FCPATH.'crondata/cronsavedata.txt', $data, 'a');
			}
			
			$sql2 = "SELECT ood.id FROM oneway_offer_detail ood WHERE ood.oo_valid_date < '$nowdate' AND ood.oo_valid_to_time > '$nowtime' AND EXISTS(SELECT brl.id FROM booking_request_list brl WHERE ood.id = brl.b_pk_id) AND NOT EXISTS(SELECT bl.id FROM booking_list bl WHERE ood.id = bl.b_pk_id)";
		
			$query2 = $this->db->query($sql2);
			
			$getitem2 = $query2->result();
			
			foreach($getitem2 as $experid2)
			{
				$status = array("oo_status"=>0);
				
				$this->db->set('oo_updated_date_time', 'NOW()', FALSE);
				$this->db->where("id",$experid2->id);
				$this->db->update("oneway_offer_detail",$status);
				
				$data2 = "\n DATETIME - ".$nowdate." ".$nowtime."INACTIVE ID FROM oneway_offer_detail table id is -".$experid2->id."\n";
			
				write_file(FCPATH.'crondata/cronsavedata2.txt', $data2, 'a');
			}
		
			echo "DONE!";
		}
		else
		{
			echo "CI STATE EROOR 2002 - PLEASE TRY AFTER SOME TIME JOB IS RUNNING STATE!!!";
		}
	}
	
	public function tokenazied()
	{
	//$data = "hello";
	//write_file(FCPATH.'crondata/cronsavedata2.txt', $data, 'a');
		if($this->uri->segment(3) != "" && $this->uri->segment(3) == "vqTUKJFpHwNvVRGcnJ71b3mwJ4FoldeGAK")
		{
			$token = "vqTUKJFpHwNvVRGcnJ7231b3mwJ4FoldeGAK";
			redirect("index.php/Onewayofferexperiedfcefdbf007787656212bdubsac/index/".$token);
		}
		else
		{
			echo "CI STATE EROOR - PLEASE TRY AFTER SOME TIME JOB IS RUNNING STATE!!!";
		}
	}
}