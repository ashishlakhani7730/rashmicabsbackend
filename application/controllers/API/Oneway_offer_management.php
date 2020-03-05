<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Oneway_offer_management extends CI_Controller 
{
	
	function __construct()
    {
        parent::__construct();
        $this->load->model('General_data');
	    $this->load->model('Sms_email');
	}
	
	public function VehicleCategoryList(){
	
		if(isset($_POST['agent_id'])){
			$agent_detail=$this->db->get_where('agent_detail',array('id'=>$_POST['agent_id']))->row();
		
			if(!empty($agent_detail)){
				$this->db->select('vehicle_category_detail.*');
				$this->db->from('vehicle_category_detail');
				$this->db->join('vehicle_list','vehicle_list.vehicle_category_id=vehicle_category_detail.id');
				$this->db->where(array('vehicle_list.agent_id'=>$_POST['agent_id'],'vehicle_list.v_status'=>1));
				$this->db->group_by('vehicle_list.vehicle_category_id');
				$vehicle_category=$this->db->get()->result();
				
				
				$data=array();
				$i=1;
				$total=0;
				foreach($vehicle_category as $row){
					$data[$i]=$row;
					
					//$total=$i;
					
					$i++;
				}
		
				$response=array('success'=>'success' ,'message'=>'Successfully Get Vehicle Category List','total'=>count($data), 'vehicle_category_list'=>$data);
			}else{
				$response=array('success'=>'error','message'=>'Invalid Agent ID');
			}
			
		}else{
			$response=array('success'=>'error','message'=>'Parameter Missing');
		}
		
		echo json_encode($response);
	}
	public function VehicleTypeList()
	{
		date_default_timezone_set('Asia/Kolkata');
		
		if(isset($_POST['agent_id']) && isset($_POST['vehicle_category_id'])){
		
			$agent_detail=$this->db->get_where('agent_detail',array('id'=>$_POST['agent_id']))->row();
		
			if(!empty($agent_detail)){
		
				$this->db->select('vehicle_detail.*,vehicle_list.id as vehicle_list_id, vehicle_list.v_register_no');
				$this->db->from('vehicle_detail');
				$this->db->join('vehicle_list','vehicle_list.vehicle_detail_id=vehicle_detail.id');
				$this->db->where(array('vehicle_detail.v_category_id'=>$_POST['vehicle_category_id'], 'vehicle_list.agent_id'=>$_POST['agent_id']));
				//$this->db->group_by('vehicle_list.vehicle_category_id');
				$vehicle_detail=$this->db->get()->result();
			
				$data=array();
				$i=1;
				$total=0;
				foreach($vehicle_detail as $row){
					$data[$i]=$row;
					
					//$total=$i;
					
					$i++;
				}
				
				$response=array('success'=>'success' ,'message'=>'Successfully Get Vehicle Type List','total'=>count($data), 'vehicle_type_list'=>$data);
			}else{
				$response=array('success'=>'error','message'=>'Invalid Agent ID');
			}
			
		}else{
			$response=array('success'=>'error','message'=>'Parameter Missing');
		}
		echo json_encode($response);
	}
	public function CityList(){
		$city_detail = $this->db->get('city_detail')->result();
		
		$data=array();
		$i=1;
		$total=0;
		foreach($city_detail as $row){
			$data[$i]=$row;
			
			//$total=$i;
			
			$i++;
		}
		
		$response=array('success'=>'success' ,'message'=>'Successfully Get City List','total'=>count($data), 'city_list'=>$data);
		
		echo json_encode($response);
	}
	public function CreateOnewayOffer()
	{
		date_default_timezone_set('Asia/Kolkata');
		
		if(isset($_POST['agent_id']) && isset($_POST['vehicle_category_id']) && isset($_POST['vehicle_type_id']) && isset($_POST['first_city_id']) && isset($_POST['second_city_id']) && isset($_POST['third_city_id']) && isset($_POST['valid_date']) && isset($_POST['valid_from_time']) && isset($_POST['valid_to_time']) && isset($_POST['vehicle_list_id'])){
		
			$agent_detail=$this->db->get_where('agent_detail',array('id'=>$_POST['agent_id']))->row();
		
			if(!empty($agent_detail)){
				$vehicle_category_detail = $this->db->get_where('vehicle_category_detail',array('id'=>$_POST['vehicle_category_id']))->row();
				if(!empty($vehicle_category_detail)){
					
					$vehicle_detail = $this->db->get_where('vehicle_detail',array('id'=>$_POST['vehicle_type_id']))->row();
					
					if(!empty($vehicle_detail)){
					
						$array = array( 
									   
									   'oo_vc_id'			=>$_POST['vehicle_category_id'],
									   'oo_vt_id'			=>$_POST['vehicle_type_id'],
									   'oo_first_city'		=>$_POST['first_city_id'],
									   'oo_second_city'		=>$_POST['second_city_id'],
									   'oo_third_city'		=>$_POST['third_city_id'],
									   'oo_agent_id'		=>$_POST['agent_id'],
									   'oo_vehicle_id'		=>$_POST['vehicle_list_id'],			
									   'oo_km_rate'			=>$vehicle_category_detail->category_oneway_offer_km_rate,
									   'oo_hr_rate'			=>$vehicle_category_detail->category_oneway_offer_hr_rate,
									   'oo_valid_date'		=>date('Y-m-d',strtotime($_POST['valid_date'])),
									   'oo_valid_from_time'	=>date('H:i:s',strtotime($_POST['valid_from_time'])),
									   'oo_valid_to_time'	=>date('H:i:s',strtotime($_POST['valid_to_time'])),		  
									   'oo_status'			=>1,
									   'oo_created_type' 	=>1,
					   				   'oo_created_by'    	=>$_POST['agent_id'],
									   'oo_created_date_time'=>date('Y-m-d H:i:s')
						);
						
						
						$this->db->insert('oneway_offer_detail',$array);
						$get_last_id=$this->db->insert_id();
						$this->General_data->update_id('oneway_offer_detail','RCOO'.date('y').date('m'),'oo_id');
							
							
						$response=array('success'=>'success' ,'message'=>'Successfully Created');
					}else{
						$response=array('success'=>'error','message'=>'Invalid Vehicle Type');
					}
				}else{
					$response=array('success'=>'error','message'=>'Invalid Vehicle Category');
				}
			}else{
				$response=array('success'=>'error','message'=>'Invalid Agent ID');
			}
			
		}else{
			$response=array('success'=>'error','message'=>'Parameter Missing');
		}
		echo json_encode($response);
		
	}
	public function ToCityListForSearch(){
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
			
			$j=1;
			for($i=0;$i<count($cities);$i++){
				$city = $this->db->get_where('city_detail',array('id'=>$cities[$i]))->row();
					
				$data[$j]=$city;
				
				$total=count($cities);
				$j++;
			}
			
			$response=array('success'=>'success' ,'message'=>'Successfully Get To City List','total'=>$total, 'to_city_list'=>$data);
		}else{
			$response=array('success'=>'error','message'=>'Parameter Missing');
		}
		echo json_encode($response);
	}
	
	public function GetOnewayOfferList()
	{
		date_default_timezone_set('Asia/Kolkata');
		if(isset($_POST['from_city']) && isset($_POST['b_to_city_id']) && isset($_POST['from_date']) )
		{			
			$data =$this->db->get_where('oneway_offer_detail',array('oo_first_city'=>$this->input->post('from_city'),'oo_second_city'=>$this->input->post('b_to_city_id'),'oo_valid_date'=>date('Y-m-d',strtotime($this->input->post('from_date'))),'oo_status'=>1))->result();
			
			
			$data2 = $this->db->get_where('oneway_offer_detail',array('oo_first_city'=>$this->input->post('from_city'),'oo_third_city'=>$this->input->post('b_to_city_id'),'oo_valid_date'=>date('Y-m-d',strtotime($this->input->post('from_date'))),'oo_status'=>1))->result();
				
			
			$data3 = $this->db->get_where('oneway_offer_detail',array('oo_second_city'=>$this->input->post('from_city'),'oo_third_city'=>$this->input->post('b_to_city_id'),'oo_valid_date'=>date('Y-m-d',strtotime($this->input->post('from_date'))),'oo_status'=>1))->result();
			//echo '<tr  class="cablisthead"><th width="30%">Vehicle Category-Type</th><th>SEAT</th><th > Rate per Km.</th><th >Estimated Package Rate</th><th ></th></tr>';
		
		
		
			$from_city = $this->db->get_where('city_detail',array('id'=>$this->input->post('from_city')))->row();
			$from_city = $from_city->c_name." , ".$from_city->c_state;
						
			$to_city = $this->db->get_where('city_detail',array('id'=>$this->input->post('b_to_city_id')))->row();
			$to_city = $to_city->c_name." , ".$to_city->c_state;
			
				
			$total_distance_km = $this->General_data->distance($from_city, $to_city);			
				
			$total_time = $this->General_data->time_interval($from_city, $to_city);
				
			$total_time = $total_time + 2;	
				// echo $from_city;
				 
				// echo $total_distance_km;
		
				//exit;
				
			$i=1;
			$total=0;	
		
			$package_detail=array();
				
			foreach($data as $d)
			{
				
				
				$no_of_seats = $this->db->get_where('vehicle_detail',array('id'=>$d->oo_vt_id))->row()->v_seat_number;
				
				
				date_default_timezone_set('Asia/Kolkata');

       			$date = new DateTime($this->input->post('from_time'));
        
				$km_rate = $d->oo_km_rate * $total_distance_km;
		
			
				$total_estimated_rate =  $km_rate ;
				
				
				//echo '<tr class="cablisting"><th width="30%">'.$this->db->get_where('vehicle_category_detail',array('id'=>$d->oo_vc_id))->row()->category_name.'<br>'.$vehicle_name = $this->db->get_where('vehicle_detail',array('v_category_id'=>$d->oo_vc_id))->row()->v_name.'</th><th >'.$no_of_seats.'</th><th> Rs. '.$d->oo_km_rate.'</th><th><button type="button" class="btn btn-info popovers" rel="popover" data-trigger="hover"  data-total-distance="'.number_format($total_distance_km).'" data-rate-per-km="'.$d->oo_km_rate.'" data-rate-per-hr="'.$d->oo_hr_rate.'"  data-total-time="'.$total_time.'" data-estimated-rate="'.number_format($total_estimated_rate).'" >Rs. '.number_format($total_estimated_rate).'</button></th><th > <a href="javascript:;" class="btn yellow-crusta button-next" onclick="book_oneway_offer('.$d->id.','.$total_distance_km.','.$total_estimated_rate.','.$total_time.')" ><i class="fa fa-cab"></i> BOOK CAB </a></th></tr>';
				
				$package_detail[$i]['category_name'] = $this->db->get_where('vehicle_category_detail',array('id'=>$d->oo_vc_id))->row()->category_name;		
				$package_detail[$i]['vehicle_name'] = $this->db->get_where('vehicle_detail',array('v_category_id'=>$d->oo_vc_id))->row()->v_name;	
				$package_detail[$i]['no_of_seats'] = $no_of_seats;
				$package_detail[$i]['p_id'] = $d->id;
				//$package_detail[$i]['total_days'] = $total_days;
				$package_detail[$i]['total_distance_km'] = $total_distance_km;
				$package_detail[$i]['p_extra_km_rate'] = $d->oo_km_rate;
				$package_detail[$i]['p_extra_hr_rate'] = $d->oo_hr_rate;
				$package_detail[$i]['total_time'] = $total_time;
				$package_detail[$i]['total_estimated_rate'] = $total_estimated_rate;
				$package_detail[$i]['valid_from_time'] = $d->oo_valid_from_time;
				$package_detail[$i]['valid_to_time'] = $d->oo_valid_to_time;
				
				$vehicle_list=$this->db->get_where('vehicle_list',array('id'=>$d->oo_vehicle_id))->row();
				
				$package_detail[$i]['v_profile_pic'] = '';
				$package_detail[$i]['v_profile_pic_path'] = '';
				/*if(!empty($vehicle_list) && !empty($vehicle_list->v_profile_pic)){
					$package_detail[$i]['v_profile_pic'] = $vehicle_list->v_profile_pic;
					$package_detail[$i]['v_profile_pic_path'] = base_url().'uploads/vehicle/profile_pic/'.$vehicle_list->v_profile_pic; 
				}else{*/
					$category=$this->db->get_where('vehicle_category_detail',array('id'=>$d->oo_vc_id))->row();
						if(!empty($d->oo_vc_id) && !empty($category) && !empty($category->c_profile_pic)){
							$package_detail[$i]['v_profile_pic'] = $category->c_profile_pic;
							$package_detail[$i]['v_profile_pic_path'] = base_url().'uploads/category/profile_pic/'.$category->c_profile_pic;
						}
						else
						{
							if(!empty($vehicle_list) && !empty($vehicle_list->v_profile_pic)){
								$package_detail[$i]['v_profile_pic'] = $vehicle_list->v_profile_pic;
								$package_detail[$i]['v_profile_pic_path'] = base_url().'uploads/vehicle/profile_pic/'.$vehicle_list->v_profile_pic; 
							}
						}
				//}
				
				
		
				//$total=$i;
				$i++;
		
			} 
		
		
		
			foreach($data2 as $d)
			{
				
				
				$no_of_seats = $this->db->get_where('vehicle_detail',array('id'=>$d->oo_vt_id))->row()->v_seat_number;
				
				
				date_default_timezone_set('Asia/Kolkata');

        		$date = new DateTime($this->input->post('from_time'));
        
				$km_rate = $d->oo_km_rate * $total_distance_km;
		
			
				$total_estimated_rate =  $km_rate ;
				
				
				//echo '<tr class="cablisting"><th width="30%">'.$this->db->get_where('vehicle_category_detail',array('id'=>$d->oo_vc_id))->row()->category_name.'<br>'.$vehicle_name = $this->db->get_where('vehicle_detail',array('id'=>$d->oo_vt_id))->row()->v_name.'</th><th >'.$no_of_seats.'</th><th> Rs. '.$d->oo_km_rate.'</th><th><button type="button" class="btn btn-info popovers" rel="popover" data-trigger="hover"  data-total-distance="'.number_format($total_distance_km).'" data-rate-per-km="'.$d->oo_km_rate.'" data-rate-per-hr="'.$d->oo_hr_rate.'" data-total-time="'.$total_time.'"  data-estimated-rate="'.number_format($total_estimated_rate).'" >Rs. '.number_format($total_estimated_rate).'</button></th><th > <a href="javascript:;" class="btn yellow-crusta button-next" onclick="book_oneway_offer('.$d->id.','.$total_distance_km.','.$total_estimated_rate.')" ><i class="fa fa-cab"></i> BOOK CAB </a></th></tr>';
				
				$package_detail[$i]['category_name'] = $this->db->get_where('vehicle_category_detail',array('id'=>$d->oo_vc_id))->row()->category_name;		
				$package_detail[$i]['vehicle_name'] = $this->db->get_where('vehicle_detail',array('v_category_id'=>$d->oo_vc_id))->row()->v_name;	
				$package_detail[$i]['no_of_seats'] = $no_of_seats;
				$package_detail[$i]['p_id'] = $d->id;
				//$package_detail[$i]['total_days'] = $total_days;
				$package_detail[$i]['total_distance_km'] = $total_distance_km;
				$package_detail[$i]['p_extra_km_rate'] = $d->oo_km_rate;
				$package_detail[$i]['p_extra_hr_rate'] = $d->oo_hr_rate;
				$package_detail[$i]['total_time'] = $total_time;
				$package_detail[$i]['total_estimated_rate'] = $total_estimated_rate;
				$package_detail[$i]['valid_from_time'] = $d->oo_valid_from_time;
				$package_detail[$i]['valid_to_time'] = $d->oo_valid_to_time;
				
				$vehicle_list=$this->db->get_where('vehicle_list',array('id'=>$d->oo_vehicle_id))->row();
				
				$package_detail[$i]['v_profile_pic'] = '';
				$package_detail[$i]['v_profile_pic_path'] = '';
				/*if(!empty($vehicle_list) && !empty($vehicle_list->v_profile_pic)){
					$package_detail[$i]['v_profile_pic'] = $vehicle_list->v_profile_pic;
					$package_detail[$i]['v_profile_pic_path'] = base_url().'uploads/vehicle/profile_pic/'.$vehicle_list->v_profile_pic; 
				}else{*/
					$category=$this->db->get_where('vehicle_category_detail',array('id'=>$d->oo_vc_id))->row();
					if(!empty($d->oo_vc_id) && !empty($category) && !empty($category->c_profile_pic)){
						$package_detail[$i]['v_profile_pic'] = $category->c_profile_pic;
						$package_detail[$i]['v_profile_pic_path'] = base_url().'uploads/category/profile_pic/'.$category->c_profile_pic;
					}
					else
					{
						if(!empty($vehicle_list) && !empty($vehicle_list->v_profile_pic)){
							$package_detail[$i]['v_profile_pic'] = $vehicle_list->v_profile_pic;
							$package_detail[$i]['v_profile_pic_path'] = base_url().'uploads/vehicle/profile_pic/'.$vehicle_list->v_profile_pic; 
						}
					}
				//}
				
				
				//$total=$i;
				$i++;
		
			} 
			
			foreach($data3 as $d)
			{
				
				
				$no_of_seats = $this->db->get_where('vehicle_detail',array('id'=>$d->oo_vt_id))->row()->v_seat_number;
				
				
				date_default_timezone_set('Asia/Kolkata');

        		$date = new DateTime($this->input->post('from_time'));
        
				$km_rate = $d->oo_km_rate * $total_distance_km;
		
			
				$total_estimated_rate =  $km_rate ;
				
				
				//echo '<tr class="cablisting"><th width="30%">'.$this->db->get_where('vehicle_category_detail',array('id'=>$d->oo_vc_id))->row()->category_name.'<br>'.$vehicle_name = $this->db->get_where('vehicle_detail',array('id'=>$d->oo_vt_id))->row()->v_name.'</th><th >'.$no_of_seats.'</th><th> Rs. '.$d->oo_km_rate.'</th><th><button type="button" class="btn btn-info popovers" rel="popover" data-trigger="hover"  data-total-distance="'.number_format($total_distance_km).'" data-rate-per-km="'.$d->oo_km_rate.'" data-rate-per-hr="'.$d->oo_hr_rate.'" data-total-time="'.$total_time.'"  data-estimated-rate="'.number_format($total_estimated_rate).'" >Rs. '.number_format($total_estimated_rate).'</button></th><th > <a href="javascript:;" class="btn yellow-crusta button-next" onclick="book_oneway_offer('.$d->id.','.$total_distance_km.','.$total_estimated_rate.')" ><i class="fa fa-cab"></i> BOOK CAB </a></th></tr>';
				
				$package_detail[$i]['category_name'] = $this->db->get_where('vehicle_category_detail',array('id'=>$d->oo_vc_id))->row()->category_name;		
				$package_detail[$i]['vehicle_name'] = $this->db->get_where('vehicle_detail',array('v_category_id'=>$d->oo_vc_id))->row()->v_name;	
				$package_detail[$i]['no_of_seats'] = $no_of_seats;
				$package_detail[$i]['p_id'] = $d->id;
				//$package_detail[$i]['total_days'] = $total_days;
				$package_detail[$i]['total_distance_km'] = $total_distance_km;
				$package_detail[$i]['p_extra_km_rate'] = $d->oo_km_rate;
				$package_detail[$i]['p_extra_hr_rate'] = $d->oo_hr_rate;
				$package_detail[$i]['total_time'] = $total_time;
				$package_detail[$i]['total_estimated_rate'] = $total_estimated_rate;
				$package_detail[$i]['valid_from_time'] = $d->oo_valid_from_time;
				$package_detail[$i]['valid_to_time'] = $d->oo_valid_to_time;
				
				$vehicle_list=$this->db->get_where('vehicle_list',array('id'=>$d->oo_vehicle_id))->row();
				
				$package_detail[$i]['v_profile_pic'] = '';
				$package_detail[$i]['v_profile_pic_path'] = '';
				/*if(!empty($vehicle_list) && !empty($vehicle_list->v_profile_pic)){
					$package_detail[$i]['v_profile_pic'] = $vehicle_list->v_profile_pic;
					$package_detail[$i]['v_profile_pic_path'] = base_url().'uploads/vehicle/profile_pic/'.$vehicle_list->v_profile_pic; 
				}else{*/
					$category=$this->db->get_where('vehicle_category_detail',array('id'=>$d->oo_vc_id))->row();
						if(!empty($d->oo_vc_id) && !empty($category) && !empty($category->c_profile_pic)){
							$package_detail[$i]['v_profile_pic'] = $category->c_profile_pic;
							$package_detail[$i]['v_profile_pic_path'] = base_url().'uploads/category/profile_pic/'.$category->c_profile_pic;
						}
						else
						{
							if(!empty($vehicle_list) && !empty($vehicle_list->v_profile_pic)){
								$package_detail[$i]['v_profile_pic'] = $vehicle_list->v_profile_pic;
								$package_detail[$i]['v_profile_pic_path'] = base_url().'uploads/vehicle/profile_pic/'.$vehicle_list->v_profile_pic; 
							}
						}
				//}
				
				
				//$total=$i;
				$i++;
		
			} 
				
				
			$response=array('success'=>'success' ,'message'=>'Successfully Get To Package List','total'=>count($package_detail), 'package_list'=>$package_detail);
		}else{
			$response=array('success'=>'error','message'=>'Parameter Missing');
		}
		echo json_encode($response);
		
	}
	public function OnewayOfferList()
	{
		date_default_timezone_set('Asia/Kolkata');
		if(isset($_POST['agent_id']))
		{			
			$agent_detail=$this->db->get_where('agent_detail',array('id'=>$_POST['agent_id']))->row();
		
			if(!empty($agent_detail)){
				$oneway_offer_detail =$this->db->order_by('id','desc')->get_where('oneway_offer_detail',array('oo_agent_id'=>$_POST['agent_id']))->result();
				
				
					
				$i=1;
				$total=0;	
			
				$data=array();
					
				foreach($oneway_offer_detail as $row)
				{
					
					$date1 = new DateTime($row->oo_valid_date." ".$row->oo_valid_to_time);
					$date2 = new DateTime();

					$diff = $date2->diff($date1);
					
					if(( $diff->invert == 0) || ($diff->d == 1 && $diff->invert == 1 &&  $diff->h < 6)){ 
						
					$data[$i]=$row;
						
				
					if($diff->d > 1 && $diff->invert == 1 && $diff->h < 6 ){ 
						$row->oo_status = -1;
					}
					


					$category=$this->db->get_where('vehicle_category_detail',array('id'=>$row->oo_vc_id))->row();
					if(!empty($category)){
						$data[$i]->vehicle_category_name = $category->category_name;		
					}else{
						$data[$i]->vehicle_category_name = '';
					}
					$vehicle_type=$this->db->get_where('vehicle_detail',array('v_category_id'=>$row->oo_vc_id))->row();
					if(!empty($vehicle_type)){
						$data[$i]->vehicle_type_name = $vehicle_type->v_name;		
					}else{
						$data[$i]->vehicle_type_name = '';
					}
					
					$first_city = $this->db->get_where('city_detail',array('id'=>$row->oo_first_city))->row();
					if(!empty($first_city)){
						$data[$i]->first_city_name = $first_city->c_name;		
					}else{
						$data[$i]->first_city_name = '';
					}
					
					$second_city = $this->db->get_where('city_detail',array('id'=>$row->oo_second_city))->row();
					if(!empty($second_city)){
						$data[$i]->second_city_name = $second_city->c_name;		
					}else{
						$data[$i]->second_city_name = '';
					}
					
					$third_city = $this->db->get_where('city_detail',array('id'=>$row->oo_third_city))->row();
					if(!empty($third_city)){
						$data[$i]->third_city_name = $third_city->c_name;		
					}else{
						$data[$i]->third_city_name = '';
					}
					
					$vehicle_list=$this->db->get_where('vehicle_list',array('id'=>$row->oo_vehicle_id))->row();
				
					$data[$i]->v_profile_pic = '';
					$data[$i]->v_profile_pic_path = '';
					/*if(!empty($vehicle_list) && !empty($vehicle_list->v_profile_pic)){
						$data[$i]->v_profile_pic = $vehicle_list->v_profile_pic;
						$data[$i]->v_profile_pic_path = base_url().'uploads/vehicle/profile_pic/'.$vehicle_list->v_profile_pic; 
					}else{*/
						
						$category=$this->db->get_where('vehicle_category_detail',array('id'=>$row->oo_vc_id))->row();
						if(!empty($row->oo_vc_id) && !empty($category) && !empty($category->c_profile_pic)){
							$data[$i]->v_profile_pic = $category->c_profile_pic;
							$data[$i]->v_profile_pic_path = base_url().'uploads/category/profile_pic/'.$category->c_profile_pic;
						}
						else
						{
							if(!empty($vehicle_list) && !empty($vehicle_list->v_profile_pic)){
								$data[$i]->v_profile_pic = $vehicle_list->v_profile_pic;
								$data[$i]->v_profile_pic_path = base_url().'uploads/vehicle/profile_pic/'.$vehicle_list->v_profile_pic; 
							}
						}
					//}
					
					//$total=$i;
					$i++;
					}
				} 
			
				$response=array('success'=>'success' ,'message'=>'Successfully Get To Oneway Offer List','total'=>count($data), 'oneway_offer_list'=>$data);
				
			}else{
				$response=array('success'=>'error','message'=>'Invalid Agent ID');
			}
		}else{
			$response=array('success'=>'error','message'=>'Parameter Missing');
		}
		echo json_encode($response);
		
	}
	public function OnewayOfferDetail()
	{
		date_default_timezone_set('Asia/Kolkata');
		if(isset($_POST['oneway_offer_id']))
		{			
			$oneway_offer_detail =$this->db->get_where('oneway_offer_detail',array('id'=>$_POST['oneway_offer_id']))->row();
				
			if(!empty($oneway_offer_detail))
			{
					
				$category=$this->db->get_where('vehicle_category_detail',array('id'=>$oneway_offer_detail->oo_vc_id))->row();
				if(!empty($category)){
					$oneway_offer_detail->vehicle_category_name = $category->category_name;		
				}else{
					$oneway_offer_detail->vehicle_category_name = '';
				}
				$vehicle_type=$this->db->get_where('vehicle_detail',array('v_category_id'=>$oneway_offer_detail->oo_vc_id))->row();
				if(!empty($vehicle_type)){
					$oneway_offer_detail->vehicle_type_name = $vehicle_type->v_name;		
				}else{
					$oneway_offer_detail->vehicle_type_name = '';
				}
					
				$first_city = $this->db->get_where('city_detail',array('id'=>$oneway_offer_detail->oo_first_city))->row();
				if(!empty($first_city)){
					$oneway_offer_detail->first_city_name = $first_city->c_name;		
				}else{
					$oneway_offer_detail->first_city_name = '';
				}
					
				$second_city = $this->db->get_where('city_detail',array('id'=>$oneway_offer_detail->oo_second_city))->row();
				if(!empty($second_city)){
					$oneway_offer_detail->second_city_name = $second_city->c_name;		
				}else{
					$oneway_offer_detail->second_city_name = '';
				}
				
				$third_city = $this->db->get_where('city_detail',array('id'=>$oneway_offer_detail->oo_third_city))->row();
				if(!empty($third_city)){
					$oneway_offer_detail->third_city_name = $third_city->c_name;		
				}else{
					$oneway_offer_detail->third_city_name = '';
				}
				
				$vehicle_list=$this->db->get_where('vehicle_list',array('id'=>$oneway_offer_detail->oo_vehicle_id))->row();
				
				$oneway_offer_detail->v_profile_pic = '';
				$oneway_offer_detail->v_profile_pic_path = '';
				if(!empty($vehicle_list) && !empty($vehicle_list->v_profile_pic)){
					$oneway_offer_detail->v_profile_pic = $vehicle_list->v_profile_pic;
					$oneway_offer_detail->v_profile_pic_path = base_url().'uploads/vehicle/profile_pic/'.$vehicle_list->v_profile_pic; 
				}else{
					$category=$this->db->get_where('vehicle_category_detail',array('id'=>$oneway_offer_detail->oo_vc_id))->row();
					if(!empty($oneway_offer_detail->oo_vc_id) && !empty($category) && !empty($category->c_profile_pic)){
						$oneway_offer_detail->v_profile_pic = $category->c_profile_pic;
						$oneway_offer_detail->v_profile_pic_path = base_url().'uploads/category/profile_pic/'.$category->c_profile_pic;
					}
				}
					
					
				$response=array('success'=>'success' ,'message'=>'Successfully Get To Oneway Offer Details', 'oneway_offer_detail'=>$oneway_offer_detail);
					
			}else{
				$response=array('success'=>'error','message'=>'Invalid Oneway Offer ID');
			}
			
		}else{
			$response=array('success'=>'error','message'=>'Parameter Missing');
		}
		echo json_encode($response);
		
	}
	public function EditOnewayOffer()
	{
		date_default_timezone_set('Asia/Kolkata');
		
		if(isset($_POST['agent_id']) && isset($_POST['oneway_offer_id']) && isset($_POST['valid_date']) && isset($_POST['valid_from_time']) && isset($_POST['valid_to_time'])){
		
			$agent_detail=$this->db->get_where('agent_detail',array('id'=>$_POST['agent_id']))->row();
		
			if(!empty($agent_detail)){
			
				$oneway_offer_detail =$this->db->get_where('oneway_offer_detail',array('id'=>$_POST['oneway_offer_id']))->row();
				
				if(!empty($oneway_offer_detail))
				{
								
					$array = array( 
									   
									   'oo_valid_date'		=>date('Y-m-d',strtotime($_POST['valid_date'])),
									   'oo_valid_from_time'	=>date('H:i:s',strtotime($_POST['valid_from_time'])),
									   'oo_valid_to_time'	=>date('H:i:s',strtotime($_POST['valid_to_time'])),		  
									   'oo_updated_type' 	=>1,
					   				   'oo_updated_by'    	=>$_POST['agent_id'],
									   'oo_updated_date_time'=>date('Y-m-d H:i:s')
					);
							
					$this->db->where('id',$_POST['oneway_offer_id']);		
					$this->db->update('oneway_offer_detail',$array);
								
								
					$response=array('success'=>'success' ,'message'=>'Successfully Updated');
					
				}else{
					$response=array('success'=>'error','message'=>'Invalid Oneway Offer ID');
				}
				
			}else{
				$response=array('success'=>'error','message'=>'Invalid Agent ID');
			}
			
		}else{
			$response=array('success'=>'error','message'=>'Parameter Missing');
		}
		echo json_encode($response);
		
	}
	public function DeleteOnewayOffer()
	{
		date_default_timezone_set('Asia/Kolkata');
		if(isset($_POST['oneway_offer_id']))
		{			
			$oneway_offer_detail =$this->db->get_where('oneway_offer_detail',array('id'=>$_POST['oneway_offer_id']))->row();
				
			if(!empty($oneway_offer_detail))
			{
					
				$this->db->where('id', $_POST['oneway_offer_id']);
				$this->db->delete('oneway_offer_detail');	
					
				$response=array('success'=>'success' ,'message'=>'Successfully Deleted');
				
			}else{
				$response=array('success'=>'error','message'=>'Invalid Oneway Offer ID');
			}
				
			
		}else{
			$response=array('success'=>'error','message'=>'Parameter Missing');
		}
		echo json_encode($response);
		
	}
}
