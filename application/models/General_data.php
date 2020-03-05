<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class General_data extends CI_Model
{
	public function update_id($table_name,$id_prefix,$id_name)
	{
		$get_last_id = $this->db->insert_id();
		
			
			if($get_last_id<=9)
			{
				$new_id=$id_prefix.'0'.$get_last_id;
			}
			else
			{
				$new_id=$id_prefix.$get_last_id;
			}   
			$this->db->where('id',$get_last_id);
			$this->db->update($table_name,array($id_name=>$new_id));
		
		
	}
	
	public function uploadImage($upload_path,$get_last_id,$id_prefix,$table_name,$image_field){
			
		
		$config['allowed_types'] = 'gif|jpg|png|jpeg'; 				
		$config['upload_path']   = $upload_path;
		$config['overwrite'] = TRUE;
		
		if($get_last_id<=9)
		{ 	
		$config['file_name'] = $id_prefix.'0'.$get_last_id;
		}
		else
		{
		$config['file_name'] = $id_prefix.$get_last_id;
		}
		
		  
		 $this->load->library('upload', $config);
		
		 $this->upload->initialize($config);		 
		
		 if($this->upload->do_upload($image_field))
		 {
		 	
		 	$this->db->where('id',$get_last_id);
			$this->db->update($table_name,array($image_field=>$this->upload->data('file_name')));
		 } 
		/* else
		 {
		  echo $this->upload->display_errors(); 
		 }
	*/
	
	}


	public function uploadImage2($upload_path,$get_last_id,$id_prefix,$table_name,$image_field, $image){
			
		// when image field and image name are different
		$config['allowed_types'] = 'gif|jpg|png|jpeg'; 				
		$config['upload_path']   = $upload_path;
		$config['overwrite'] = TRUE;
		
		if($get_last_id<=9)
		{ 	
		$config['file_name'] = $id_prefix.'0'.$get_last_id;
		}
		else
		{
		$config['file_name'] = $id_prefix.$get_last_id;
		}
		
		  
		 $this->load->library('upload', $config);
		
		 $this->upload->initialize($config);		 
		
		 if($this->upload->do_upload($image))
		 {
		 	
		 	$this->db->where('id',$get_last_id);
			$this->db->update($table_name,array($image_field=>$this->upload->data('file_name')));
		 } 
		/* else
		 {
		  echo $this->upload->display_errors(); 
		 }
	*/
	
	}
	
	public function change_status($table_name,$status_field,$id)
	{
	
		$get_status = $this->db->get_where($table_name,array('id'=>$id))->row_array();
		if($get_status[$status_field] == 1)
		{
			$update_data = array($status_field=>0);
		
		}
		else
		{
			$update_data = array($status_field=>1);
		}
			
		$this->db->where('id',$id);
		$this->db->update($table_name,$update_data);
	
	}
	
	public function delete_data($table_name,$id)
	{
		$this->db->delete($table_name,array('id'=>$id));
	
	}
	
	public function update_data($table_name,$id,$update_array)
	{
		$this->db->where('id',$id);
		$this->db->update($table_name,$update_array);
	
	}
	
	public function source_status($s_type)
	{
		if($s_type == 1)
		{
			return "BACK";
		}
		if($s_type == 2)
		{
			return "FRONT";
		}
		if($s_type == 3)
		{
			return "WEB";
		}
		if($s_type == 4)
		{
			return "ANDROID";
		}
		if($s_type == 5)
		{
			return "IOS";
		}
	
	}
	
	function distance($from_city,$to_city)
	{
       // echo $from_city;
       // echo $to_city;
        
        
        
	    $from = urlencode($from_city);
		$to = urlencode($to_city);
		
		$arrContextOptions=array(
			"ssl"=>array(
				"verify_peer"=>false,
				"verify_peer_name"=>false,
			),
		); 

		$data = file_get_contents("https://maps.googleapis.com/maps/api/distancematrix/json?origins=".$from."&destinations=".$to."&mode=driving&language=en-EN&sensor=false&key=AIzaSyCiwIrp3iYRK3PkyU0ZAj90gWWaAYDKQDA", false , stream_context_create($arrContextOptions));
		
		//$data = file_get_contents("https://maps.googleapis.com/maps/api/distancematrix/json?origins=".$from."&destinations=".$to."&mode=driving&language=en-EN&sensor=false&key=AIzaSyCiwIrp3iYRK3PkyU0ZAj90gWWaAYDKQDA");
		
		$data = json_decode($data);
		
		
	
	//	print_r($data);
		
		$time = 0;
		$distance = round( ($data->rows[0]->elements[0]->distance->value) / 1000);
		
		
		
		
		
	/*	foreach($data->rows[0]->elements as $road) {
			$time += $road->duration->text;
			$distance += $road->distance->text;
		}
		echo "To: ".$data->destination_addresses[0];
		echo "<br/>";
		echo "From: ".$data->origin_addresses[0];
		echo "<br/>";
		echo "Time: ".$time." hours";
		echo "<br/>"; */
		return $distance;
   
		  
			
	}
	
	function time_interval($from_city,$to_city)
	{
       // echo $from_city;
       // echo $to_city;
        
        
        
	   $from = urlencode($from_city);
		$to = urlencode($to_city);
		
		$arrContextOptions=array(
			"ssl"=>array(
				"verify_peer"=>false,
				"verify_peer_name"=>false,
			),
		);
		
		$data = file_get_contents("https://maps.googleapis.com/maps/api/distancematrix/json?origins=".$from."&destinations=".$to."&mode=driving&language=en-EN&sensor=false&key=AIzaSyCiwIrp3iYRK3PkyU0ZAj90gWWaAYDKQDA", false , stream_context_create($arrContextOptions));
		
		//$data = file_get_contents("https://maps.googleapis.com/maps/api/distancematrix/json?origins=".$from."&destinations=".$to."&mode=driving&language=en-EN&sensor=false&key=AIzaSyCiwIrp3iYRK3PkyU0ZAj90gWWaAYDKQDA");
		
		$data = json_decode($data);
		
		
	
	//	print_r($data);
		
		
		$time = round( ($data->rows[0]->elements[0]->duration->value) /3600);
		
		
		
		
		
	/*	foreach($data->rows[0]->elements as $road) {
			$time += $road->duration->text;
			$distance += $road->distance->text;
		}
		echo "To: ".$data->destination_addresses[0];
		echo "<br/>";
		echo "From: ".$data->origin_addresses[0];
		echo "<br/>";
		echo "Time: ".$time." hours";
		echo "<br/>"; */
		return $time;
   
		  
			
	}
	
	public function get_all_airport($city_lat,$city_long)
	{
		$city_lat = urlencode($city_lat);
		$city_long = urlencode($city_long);
		
		$data = file_get_contents("http://api.geonames.org/findNearbyJSON?lat=".$city_lat."&lng=".$city_long."&fcode=AIRP&radius=25&maxRows=100&username=ezeetaxi");
		
		
		$data = json_decode($data);
		print_r($data);		
	
		return $data;
		
	}
	
	public function check_unique_data($table_name,$field,$value)
	{
		$get_status=$this->db->get_where($table_name,array($field=>$value));
		
		if($get_status->num_rows()>0)
		{
			return "found";
		}
		else
		{
			return "not found";
		}
	}
	public function check_login(){
		$user = $this->session->has_userdata('user');
		if(empty($user)){
			redirect('index.php/Login');
		}
	}
	public function agent_wallet_transaction($array,$amount)
	{
		$last_balance=$this->db->select('*')->order_by('id',"desc")->limit(1)->get_where('agent_wallet_transaction',array('awt_agent_id'=>$array['awt_agent_id']))->row();
			
		if($array['awt_type']==1 || $array['awt_type']==4){
			$array['awt_debit']=$amount;
			if(!empty($last_balance)){
				$array['awt_closing_balance']=$last_balance->awt_closing_balance-$amount;
			}else{
				$array['awt_closing_balance']=0-$amount;
			}
		}else if($array['awt_type']==2 || $array['awt_type']==3){
			$array['awt_credit']=$amount;
			if(!empty($last_balance)){
				$array['awt_closing_balance']=$last_balance->awt_closing_balance+$amount;
			}else{
				$array['awt_closing_balance']=$amount;
			}
		}
		//echo "<pre>"; print_r($array);echo "</pre>";exit;
		$this->db->insert('agent_wallet_transaction',$array);
		$get_last_id=$this->db->insert_id();
		$this->General_data->update_id('agent_wallet_transaction','RCAWT','awt_id');
		
		$update_array=array('a_wallet_balance'=>$array['awt_closing_balance']);
													
		$this->db->where('id',$array['awt_agent_id']);
		$this->db->update('agent_detail',$update_array);
	}
}