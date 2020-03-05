<?php defined('BASEPATH') OR exit('No direct script access allowed');



class Ajax_common extends CI_Controller

{



		 function __construct()

		{

			parent::__construct();

			$this->load->model('state_city_model');	

			$this->load->model('General_data');	

			$this->load->helper('date');

			date_default_timezone_set('Asia/Kolkata');

		}



	

	public function fetch_city()

	{

	

	 $state_detail = $this->input->post(NULL,TRUE);

	

	

		$c =$this->db->get_where('cities',array('state'=> $state_detail['state_name']))->result();

		

		$string= "";

		foreach($c as $data)

		{

			$string.="<option value='".$data->city_name."'>$data->city_name</option>";

		}

		echo $string;

	}

	

	public function fetch_vehicle_type()

	{

		$vehicle_detail = $this->input->post(NULL,TRUE);

	

	

		$v =$this->db->get_where('vehicle_detail',array('v_category_id'=> $vehicle_detail['v_c_id']))->result();

		

		$string= "";

		foreach($v as $data)

		{

			$string.="<option value='".$data->id."'>$data->v_name</option>";

		}

		echo $string;

	}

	

	public function get_city_by_state() 

			{						

					 if (isset($_POST) && isset($_POST['state_name'])) 

					{

						$state = $_POST['state_name'];						

						

						$arrCities = $this->state_city_model->get_cities_from_state($state);

						

						foreach ($arrCities as $cities)

						{

							$arrFinal[$cities->city_name] = $cities->city_name;

						}  

						

						if(isset($_POST['city']))

							$sel=$_POST['city'];

						else

							$sel='';

						

						print form_dropdown('city_name',$arrFinal,$sel);

					}				 

    }

	

	public function get_sub_package() 

	{	

						

		 if (isset($_POST) && isset($_POST['sel_p'])) 

		{

			$sel_p = $_POST['sel_p'];				

			

			 $query = $this->db->query("SELECT * FROM package_type WHERE package_type_id = '{$sel_p}'");

					  

			 $data = $query->result();

			

			foreach ($data as $sub_type)

			{

				if($sub_type->id != 1)

					$arrFinal[$sub_type->id] = $sub_type->package_sub_type;

			}  

			

			print form_dropdown('sub_p_type',$arrFinal);

		}	

	}

	

	public function fetch_package_cities()

	{		

		$data =$this->db->get('city_detail')->result();		

		

		

		$string= " <option value='' selected>select sub type</option>";

		foreach($data as $d)

		{			

						

			$package_cities =$this->db->get_where('package_detail',array('p_sub_type'=>$this->input->post('sub_p_id'),'p_v_category'=>$this->input->post('v_c_id'),'p_from_city'=>$d->id))->row();

						

			//print_r($package_cities);exit;

			if($this->input->post('sub_p_id') != 2)

			{

				if(!empty($package_cities))

				{

					$package_exist = "disabled";

				}

				else

				{

					$package_exist = "";

				}

			}

			else

			{

				$package_exist = "";

			}

			$string.="<option value='$d->id' ".$package_exist.">$d->c_name</option>";

		}

		echo $string;

	}

	

	public function get_to_cities()

	{		

		$data =$this->db->get('city_detail')->result();		

		

		

		$string= " <option value='' selected>select sub type</option>";

		foreach($data as $d)

		{	

		

			if($d->id != $this->input->post('city_id'))

			{	

				$package_cities =$this->db->get_where('package_detail',array('p_sub_type'=>$this->input->post('sub_p_id'),'p_v_category'=>$this->input->post('v_c_id'),'p_from_city'=>$this->input->post('city_id'),'p_to_city'=>$d->id))->row();

				

				//print_r($package_cities);exit;

				

				if(!empty($package_cities))

				{

					$package_exist = "disabled";

				}

				else

				{

					$package_exist = "";

				}

				

				$string.="<option value='$d->id' ".$package_exist.">$d->c_name</option>";

			}

		}

		echo $string;

	}

	

	

	public function check_email()

	{		

		$get_status=$this->db->get_where('passenger_list',array('p_email_id'=>$this->input->post('p_email_id')));

		

		if($get_status->num_rows()>0)

		{

			echo "found";

		}

		else

		{

			echo "not found";

		}

	}
	//this function added by ashish-23-7-2019.
	public function update_invoice_offer()
	{
		$data=$this->input->post(null,true);

		

		date_default_timezone_set('Asia/Kolkata');

		$this->db->select('booking_list.*,package_type.package_sub_type,package_type.package_type,package_type.id,city_detail.c_name,payment_type.payment_name');

		$this->db->from('booking_list');

		$this->db->join('package_type','package_type.id=booking_list.b_type');

		$this->db->join('city_detail','city_detail.id=booking_list.b_from_city');

		$this->db->join('payment_type','payment_type.id=booking_list.b_payment_type');

		$this->db->where('booking_list.id',$data['id']);

		$booking_data = $this->db->get()->row();

		if($data['b_tax_type'] != '')
		{
			$booking_data->b_tax_type = $data['b_tax_type'];
		}

		date_default_timezone_set('Asia/Kolkata');		

		

		$chargeable_km = 0;

		$passanger = $this->db->get_where('passenger_list', array('id' => $booking_data->b_p_id))->row();

		$rent_cards_detail = $this->db->get_where('rent_cards', array('id' => $booking_data->b_rent_card_id))->row();

		//print_r($rent_cards_detail);exit;

			
		// for used total day count only and add the invoice table column called total_days.
		if($rent_cards_detail->r_start_date == $rent_cards_detail->r_return_date) //|| $booking_data->b_type == 2) 

		{

			$total_days = 1; 

		}

		else

		{

		 

			$d1=date('Y-m-d',strtotime($rent_cards_detail->r_start_date));

			$d2=date('Y-m-d',strtotime($rent_cards_detail->r_return_date));

				 

			$date1 = date_create($d1);

			$date2 = date_create($d2);				

				

			$diff =date_diff($date1,$date2);

				

			$total_days =  $diff->format("%a");

				

			$date = new DateTime($rent_cards_detail->r_start_time);

				

			$dt2=$date->format('G');

				

		 	if($dt2<=21)

			{

				$total_days = $total_days + 1;

			}

			$date2 = new DateTime($rent_cards_detail->r_return_time);

									 

			$dt3=$date2->format('G');

				  

			if($dt3<5)

			{

				$total_days = $total_days - 1;

			}

		}	

		$extra_km = $data['ex_km'] - $booking_data->b_pk_min_km; //ex_km = total_km  100-40 = 60

		$extra_hr = $data['ex_hr'] - $booking_data->b_pk_min_hour;//ex_hr = total_hr  11-4 = 7

				

				

		if($data['ex_km'] <= $booking_data->b_pk_min_km)//min_km = 40

		{

			$km_price = 0;				

		}

		else

		{

			$km_price = $extra_km * $booking_data->b_pk_rate_per_km; //60 * 10 = 600

		}

			

		if($data['ex_hr'] <= $booking_data->b_pk_min_hour)//min_hr = 4

		{

			$hour_price = 0 ; // 0

		}

		else

		{

			$hour_price = $extra_hr * $booking_data->b_pk_rate_per_hour; //7 * 50 = 350

		}

			

		$total_price = $booking_data->b_pk_rate + $km_price + $hour_price; // 1000 + 600 + 350 = 1950

			

				

		if($booking_data->b_pk_discount_type==0)

		{

			$discount = ($booking_data->b_pk_discount * $total_price)/100; //(1950 * 20 )/100 = 390

		}

		else

		{

			$discount = $booking_data->b_pk_discount;

		}

		

		$total_amount = $total_price - round($discount); // 1950 - 390 = 1560

			

		if($booking_data->b_night_charge_status == 1)

		{

			$total_amount = $total_amount + $data['night_charge'];

			$night_charge_rate = $data['night_charge']; 

		}

		else

		{

			$night_charge_rate = 0;

				

		}

		if($booking_data->b_drop_night_charge_status == 1)

		{

				

			$total_amount = $total_amount + $data['drop_night_charge'];

			$drop_night_charge_rate = $data['drop_night_charge']; 

		}

		else

		{

			$drop_night_charge_rate = 0; 				

		}

		

		$i=0;

		

		$total_amount = $total_amount+ $data['other'];

			

		//echo $booking_data->b_tax_type; exit;

					

		if($booking_data->b_tax_type != "")

		{				 

			$tax_arr = explode(',',$booking_data->b_tax_type);

									

			$final_tax_rate = array();

			$final_tax_percentage = array();

			$final_tax_name = array();				

						

			foreach($tax_arr as $tr)

			{

				$tax_name = $this->db->get_where('tax_detail',array('id'=>$tr))->row()->t_name;

				$tax_percentage = $this->db->get_where('tax_detail',array('id'=>$tr))->row()->t_value;

				$tax_rate = ($total_amount * $tax_percentage)/100;	

				$final_tax_percentage[] = $tax_percentage; 

				$final_tax_rate[] = round($tax_rate); 

				$final_tax_name[] = $tax_name;							

			}

								

			foreach($final_tax_rate as $tv)		 

			{

				$i = $i +  round($tv);	

			}

					

			$invoice_tax_percentage = implode($final_tax_percentage,',');

	

			$invoice_tax_rate = implode($final_tax_rate,',');

					

			$invoice_tax_name = implode($final_tax_name,',');

			

		}

		else

		{

			$invoice_tax_percentage = 0;

	

			$invoice_tax_rate = 0;

			

			$invoice_tax_name = "";

		}

		

		$total_amount = $total_amount + $i; // 1560 + 78 = 1638

		

		$total_amount = $total_amount + $data['parking'] + $data['toll'] + $data['border_tax'] ;

									

			/*if($booking_data->b_payment_type == 1)

			{

			$online_pay_charge_rate = ($online_pay_charge->opc_value * $booking_data->b_advance)/100;	//(3 * 3012.626)/100 = 90.37878

			}

			else

			{

			$online_pay_charge_rate = 0;

			$online_pay_charge->opc_value = 0;

			

			}

			

			$total_amount = $total_amount + round($online_pay_charge_rate); // 3012.626 + 90.37878 = 3103.00478*/

			

		$vehicle_cat = $this->db->get_where('vehicle_category_detail',array('id'=>$booking_data->b_vc_id))->row()->category_name;

			

		$vehicle_type = $this->db->get_where('vehicle_detail',array('v_category_id'=>$booking_data->b_vc_id))->row()->v_name;			

					

		$advance = $booking_data->b_advance;

			

		$new_invoice = array(

				'package_id'=>$data['service_code'],

				'ticket_id'=>0,

				'passenger_id'=>$passanger->id,

				'passenger_name'=>$passanger->p_full_name,

				'passenger_email_id'=>$passanger->p_email_id,

				'passenger_contact'=>$passanger->p_contact,

				'passenger_address'=>$passanger->p_address,

				'vehicle_cat'=>$vehicle_cat,

				'vehicle_type'=>$vehicle_type,

				'vehicle_plate_no'=>$booking_data->b_vehicle_number,

				'type'=>$booking_data->package_type,

				'sub_type'=>$booking_data->package_sub_type,

				'base_price'=>$data['base_price'],

				'min_km'=>$data['min_km'],

				'min_hr'=>$data['min_hr'],

				'rate_per_km'=>$booking_data->b_pk_rate_per_km,

				'rate_per_hr'=>$booking_data->b_pk_rate_per_hour,

				'trip_start_date'=>date('Y-m-d',strtotime($booking_data->b_from_date)),

				'advance_pay'=>$booking_data->b_advance,
				
				'total_days'=>$total_days,

				'driver_allowance'=>'0',

				'extra_km'=>$data['ex_km'],

				'extra_hr'=>$data['ex_hr'],

				'night_charge'=>$night_charge_rate,

				'drop_night_charge'=>$drop_night_charge_rate,

				'parking_charge'=>$data['parking'],

				'toll_charge'=>$data['toll'],

				'border_tax'=>$data['border_tax'],

				'other_charge'=>$data['other'],

				'discount'=>$discount,

				'discount_type'=>$booking_data->b_pk_discount_type,

				'tax_type'=>$booking_data->b_tax_type,

				'tax_value'=>$invoice_tax_rate,

				'tax_name' =>$invoice_tax_name,

				'tax_percentage'=>$invoice_tax_percentage,

				//'online_pay_charge_value'=>$online_pay_charge_rate,

				//'online_pay_charge_percentage'=>$online_pay_charge->opc_value,

				'payment_type'=>$booking_data->b_payment_type,

				'total_amount'=>$total_amount - $advance,

				'paid_amount'=>0,

				'balance'=>$total_amount - $advance ,

				'agent_commission'=>$data['agent_commission']

			);

					

				//echo "<pre>";print_r($new_invoice); exit;

		$this->db->insert('invoice',$new_invoice);

				



		$get_last_id=$this->db->insert_id();

		$inserted_invoice_id = $this->db->insert_id(); //used for updating booking list

				

		$this->db->where('id',$inserted_invoice_id);

		$this->db->update('invoice',array('invoice_id'=>$booking_data->b_id,'invoice_created_date_time'=>date('Y-m-d H:i:s')));		

				

		$array=array(

                                'b_total_km' =>$data['ex_km'],

                                'b_total_hour' =>$data['ex_hr'],

                    			'b_invoice_id'=>$inserted_invoice_id,			

                                'b_complete_trip_status'  =>1,

                    			'b_status'=>5

        );

		

        $this->db->where('id',$data['id']);

        $this->db->update('booking_list',$array);

		

		// add in agent wallet transaction

		

		if(!empty($data['agent_commission'])){

		

			$tran_array= array(

						'awt_agent_id' =>$booking_data->b_agent_id,

						'awt_type' => $data['tran_type'],

						'awt_booking_id' =>$booking_data->id,

						'awt_booking_number' =>$booking_data->b_id,

						'awt_date' => date('Y-m-d'),

						'awt_time' => date('H:i:s'),

						'awt_created_by' => $this->session->userdata('user')->id,

						'awt_created_datetime' => date('Y-m-d H:i:s')

			);

			

			$this->General_data->agent_wallet_transaction($tran_array,$data['agent_commission']);

		}

		

		

		

			

        if(empty($array))

		{

            echo "<div class='col-md-12'><p style='color:red; '><strong> Something Went Wrong. </strong></p></div>";

        }

		else

		{

            echo "<div class='col-md-12'><p style='color:green; '><strong> Successfully Completed Invoice !</strong></p></div>";

        }

	}
	public function update_invoice()

    {

		

        $data=$this->input->post(null,true);
		//echo "<pre>";print_r($data); exit;
		date_default_timezone_set('Asia/Kolkata');

		$this->db->select('booking_list.*,package_type.package_sub_type,package_type.package_type,package_type.id,city_detail.c_name,payment_type.payment_name');

		$this->db->from('booking_list');

		$this->db->join('package_type','package_type.id=booking_list.b_type');

		$this->db->join('city_detail','city_detail.id=booking_list.b_from_city');

		$this->db->join('payment_type','payment_type.id=booking_list.b_payment_type');

		$this->db->where('booking_list.id',$data['id']);

		$booking_data = $this->db->get()->row();

		if($data['b_tax_type'] != '')
		{
			$booking_data->b_tax_type = $data['b_tax_type'];
		}

		

		date_default_timezone_set('Asia/Kolkata');		

		

		$chargeable_km = 0;

		$passanger = $this->db->get_where('passenger_list', array('id' => $booking_data->b_p_id))->row();

		$rent_cards_detail = $this->db->get_where('rent_cards', array('id' => $booking_data->b_rent_card_id))->row();

			

		//print_r($rent_cards_detail);exit;

			

		if($rent_cards_detail->r_start_date == $rent_cards_detail->r_return_date) //|| $booking_data->b_type == 2) 

		{

			$total_days = 1; 

		}

		else

		{

		 

			$d1=date('Y-m-d',strtotime($rent_cards_detail->r_start_date));

			$d2=date('Y-m-d',strtotime($rent_cards_detail->r_return_date));

				 

			$date1 = date_create($d1);

			$date2 = date_create($d2);				

				

			$diff =date_diff($date1,$date2);

				

			$total_days =  $diff->format("%a");

				

			$date = new DateTime($rent_cards_detail->r_start_time);

				

			$dt2=$date->format('G');

				

		 	if($dt2<=21)

			{

				$total_days = $total_days + 1;

			}

			$date2 = new DateTime($rent_cards_detail->r_return_time);

									 

			$dt3=$date2->format('G');

				  

			if($dt3<5)

			{

				$total_days = $total_days - 1;

			}

		}

		//echo  $total_days; exit;

		if($booking_data->b_type == 2)

		{

		

			if( ($booking_data->b_pk_min_km * $total_days ) > $booking_data->b_estimated_distance)

			{

				if($booking_data->b_pk_discount_type==0)

				{

					$discount = ($booking_data->b_pk_min_km * $total_days * $booking_data->b_pk_discount)/100;

					$chargeable_km = ($booking_data->b_pk_min_km * $total_days);

						

				}

				else

				{

					$chargeable_km = ($booking_data->b_pk_min_km * $total_days)- ($booking_data->b_pk_discount);

					$discount = $booking_data->b_pk_discount;

				}

					

				$km_rate = ($booking_data->b_pk_min_km * $total_days ) * $booking_data->b_pk_rate_per_km;

			}

			else

			{

				if($booking_data->b_pk_discount_type==0)

				{

					$discount = ($booking_data->b_estimated_distance * $booking_data->b_pk_discount)/100;

					$chargeable_km = ($booking_data->b_estimated_distance);

							

				}

				else

				{							

					$discount = $booking_data->b_pk_discount;

					$chargeable_km = ($booking_data->b_estimated_distance)- ($booking_data->b_pk_discount);

				}

				

				$km_rate = $booking_data->b_estimated_distance * $booking_data->b_pk_rate_per_km;

			}

		}

		else

		{

			if(($booking_data->b_pk_min_km * $total_days ) > $data['ex_km'])

			{

				$km_rate = ($booking_data->b_pk_min_km * $total_days)  * ($booking_data->b_pk_rate_per_km) ;

			}

			else

			{

				$km_rate =  ($data['ex_km'] * $booking_data->b_pk_rate_per_km);

			 

			}

		}

		 

		$total_estimated_rate = $km_rate;	 

		

		

		if($booking_data->b_type != 2)

		{

	

			if($booking_data->b_pk_discount_type==0)

			{

				$discount = ($booking_data->b_pk_discount * $total_estimated_rate)/100; //(2930 * 3 )/100 = 87.9

			}

			else

			{

				$discount = $booking_data->b_pk_discount;

			}

		

		}

		

		if($booking_data->b_type == 2)

		{

				

			$km_rate = $chargeable_km * $booking_data->b_pk_rate_per_km;

				

			if($data['ex_km'] > $chargeable_km)

			{

				 $extra_km =$data['ex_km'] - $chargeable_km;

				 $extra_km_rate = $extra_km * $booking_data->b_pk_rate_per_km;

				 $km_rate = $km_rate + $extra_km_rate;

			}

					

			$total_estimated_rate = $km_rate;
		}

			

		

			

		$data['base_price'] = $total_estimated_rate; 

			

		if($booking_data->b_type == 2)

		{

			$total_estimated_rate = $total_estimated_rate - $discount;

		}

		else

		{				

			$total_estimated_rate = $total_estimated_rate - $discount; //9000 - 25 = 8975

		}

		

		$total_amount = $total_estimated_rate;

			

		if($booking_data->b_night_charge_status == 1)

		{

			

			$total_amount = $total_amount + $data['night_charge'] ;

			$night_charge_rate = $data['night_charge']; 

		}

		else

		{

			$night_charge_rate = 0;

				

		}

		if($booking_data->b_drop_night_charge_status == 1)

		{

				

			$total_amount = $total_amount + $data['drop_night_charge'];

			$drop_night_charge_rate = $data['drop_night_charge']; 

		}

		else

		{

			$drop_night_charge_rate = 0; 				

		}

		

		$total_amount = $total_amount + $data['other']  + ($total_days *$booking_data->b_pk_driver_allowance);

		

		$i=0;

			

		if($booking_data->b_tax_type != "")

		{				 

			$tax_arr = explode(',',$booking_data->b_tax_type);

								

			$final_tax_rate = array();

			$final_tax_percentage = array();

			$final_tax_name = array();				

					

			foreach($tax_arr as $tr)

			{

				$tax_name = $this->db->get_where('tax_detail',array('id'=>$tr))->row()->t_name;

				$tax_percentage = $this->db->get_where('tax_detail',array('id'=>$tr))->row()->t_value;

				$tax_rate = ($total_amount * $tax_percentage)/100;	

				$final_tax_percentage[] = $tax_percentage; 

				$final_tax_rate[] = round($tax_rate); 

				$final_tax_name[] = $tax_name;							

			}

							

			foreach($final_tax_rate as $tv)		 

			{

				$i = $i +  round($tv);	

			}

				

			$invoice_tax_percentage = implode($final_tax_percentage,',');



			$invoice_tax_rate = implode($final_tax_rate,',');

				

			$invoice_tax_name = implode($final_tax_name,',');

		}

		else

		{

			$invoice_tax_percentage = 0;



			$invoice_tax_rate = 0;

		

			$invoice_tax_name = "";

		}

		

		$total_amount = $total_amount + $i; 

		

		$total_amount = $total_amount + $data['parking'] + $data['toll'] + $data['border_tax'];

			

			

			/*if($booking_data->b_payment_type == 1)

			{

			$online_pay_charge_rate = ($online_pay_charge->opc_value * $booking_data->b_advance)/100;	//(3 * 3012.626)/100 = 90.37878

			}

			else

			{

			$online_pay_charge_rate = 0;

			$online_pay_charge->opc_value = 0;

			

			}

			

			$total_amount = $total_amount + round($online_pay_charge_rate); // 3012.626 + 90.37878 = 3103.00478*/

			

		$vehicle_cat = $this->db->get_where('vehicle_category_detail',array('id'=>$booking_data->b_vc_id))->row()->category_name;

			

		$vehicle_type = $this->db->get_where('vehicle_detail',array('v_category_id'=>$booking_data->b_vc_id))->row()->v_name;			

					

		$advance = $booking_data->b_advance;			

			

		$new_invoice = array(

				'package_id'=>$data['service_code'],

				'ticket_id'=>0,

				'passenger_id'=>$passanger->id,

				'passenger_name'=>$passanger->p_full_name,

				'passenger_email_id'=>$passanger->p_email_id,

				'passenger_contact'=>$passanger->p_contact,

				'passenger_address'=>$passanger->p_address,

				'vehicle_cat'=>$vehicle_cat,

				'vehicle_type'=>$vehicle_type,

				'vehicle_plate_no'=>$booking_data->b_vehicle_number,

				'type'=>$booking_data->package_type,

				'sub_type'=>$booking_data->package_sub_type,

				'base_price'=>$data['base_price'],

				'min_km'=>$data['min_km'],

				'min_hr'=>$data['min_hr'],

				'rate_per_km'=>$booking_data->b_pk_rate_per_km,

				'rate_per_hr'=>$booking_data->b_pk_rate_per_hour,

				'trip_start_date'=>date('Y-m-d',strtotime($booking_data->b_from_date)),

				'advance_pay'=>$booking_data->b_advance,

				'total_days'=>$total_days,

				'driver_allowance'=>$booking_data->b_pk_driver_allowance,

				'extra_km'=>$data['ex_km'],

				'extra_hr'=>$data['ex_hr'],  

				'chargeable_km'=>$chargeable_km,

				'night_charge'=>$night_charge_rate,

				'drop_night_charge'=>$drop_night_charge_rate,

				'parking_charge'=>$data['parking'],

				'toll_charge'=>$data['toll'],

				'border_tax'=>$data['border_tax'],

				'other_charge'=>$data['other'],

				'discount'=>$discount,

				'discount_type'=>$booking_data->b_pk_discount_type,

				'tax_type'=>$booking_data->b_tax_type,

				'tax_value'=>$invoice_tax_rate,

				'tax_name' =>$invoice_tax_name,

				'tax_percentage'=>$invoice_tax_percentage,

				//'online_pay_charge_value'=>$online_pay_charge_rate,

				//'online_pay_charge_percentage'=>$online_pay_charge->opc_value,

				'payment_type'=>$booking_data->b_payment_type,

				'total_amount'=>$total_amount - $advance,

				'paid_amount'=>0,

				'balance'=>$total_amount - $booking_data->b_advance,

				'agent_commission'=>$data['agent_commission']

				 );

					

				//echo "<pre>"; print_r($new_invoice); exit;

		$this->db->insert('invoice',$new_invoice);

				



		$get_last_id=$this->db->insert_id();

		$inserted_invoice_id = $this->db->insert_id(); //used for updating booking list

				

		$this->db->where('id',$inserted_invoice_id);

		$this->db->update('invoice',array('invoice_id'=>$booking_data->b_id,'invoice_created_date_time'=>date('Y-m-d H:i:s')));		

				

		$array=array(

                                'b_total_km' =>$data['ex_km'],

                                'b_total_hour' =>$data['ex_hr'],

                    			'b_invoice_id'=>$inserted_invoice_id,			

                                'b_complete_trip_status'  =>1,

                    			'b_status'=>5

                            );

		

        $this->db->where('id',$data['id']);

        $this->db->update('booking_list',$array);

		

		// add in agent wallet transaction

		

		if(!empty($data['agent_commission'])){

		

			$tran_array= array(

						'awt_agent_id' =>$booking_data->b_agent_id,

						'awt_type' => $data['tran_type'],

						'awt_booking_id' =>$booking_data->id,

						'awt_booking_number' =>$booking_data->b_id,

						'awt_date' => date('Y-m-d'),

						'awt_time' => date('H:i:s'),

						'awt_created_by' => $this->session->userdata('user')->id,

						'awt_created_datetime' => date('Y-m-d H:i:s')

			);

			

			$this->General_data->agent_wallet_transaction($tran_array,$data['agent_commission']);

		}

		

			

        if(empty($array))

		{

            echo "<div class='col-md-12'><p style='color:red; '><strong> Something Went Wrong. </strong></p></div>";

        }

		else

		{

            echo "<div class='col-md-12'><p style='color:green; '><strong> Successfully Completed Invoice !</strong></p></div>";

        }

    }

	

	public function get_vehicle_data()

	{

	

	 	$post = $this->input->post(NULL,TRUE);

	

			

		/*$vehicle_category_detail =$this->db->get('vehicle_category_detail')->result();*/

		

		$this->db->select('vehicle_category_detail.*');

		$this->db->from('vehicle_category_detail');

		$this->db->join('vehicle_list','vehicle_list.vehicle_category_id=vehicle_category_detail.id');

		$this->db->where(array('vehicle_list.agent_id'=>$post['agent_id']));

		$this->db->group_by('vehicle_list.vehicle_category_id');

		$vehicle_category_detail=$this->db->get()->result();

		

		//echo "<pre>";print_r($vehicle_category_detail);echo "</pre>";exit;

		

		$string= "<option value='' selected>Select Option</option> ";

		foreach($vehicle_category_detail as $data)

		{

			if(isset($_POST['cat_id']) && $_POST['cat_id']==$data->id)

				$sel='selected';

			else 

				$sel='';

			$string.="<option value='".$data->id."' ".$sel.">".$data->category_name."</option>";

		}

		echo $string;

	}

	public function get_vehicle_type_data()

	{

	

	 	$post = $this->input->post(NULL,TRUE);

	

			

		/*$vehicle_detail = $this->db->get_where('vehicle_detail',array('v_category_id'=>$post['cat_id']))->result();*/

		

		$this->db->select('vehicle_detail.*,vehicle_list.id as vehicle_list_id, vehicle_list.v_register_no');

		$this->db->from('vehicle_detail');

		$this->db->join('vehicle_list','vehicle_list.vehicle_detail_id=vehicle_detail.id');

		$this->db->where(array('vehicle_detail.v_category_id'=>$post['cat_id'], 'vehicle_list.agent_id'=>$post['agent_id'], 'vehicle_list.v_status'=>1));

		//$this->db->group_by('vehicle_list.vehicle_category_id');

		$vehicle_detail=$this->db->get()->result();

		

		//echo "<pre>";print_r($vehicle_detail);echo "</pre>";exit;

		

		$string= "<option value='' selected>Select Option</option> ";

		foreach($vehicle_detail as $data)

		{

			if(isset($_POST['vehicle_id']) && $_POST['vehicle_id']==$data->id)

				$sel='selected';

			else 

				$sel='';

			$string.="<option value='".$data->id."' data-vehicle_list_id='".$data->vehicle_list_id."' data-v_register_no='".$data->v_register_no."' ".$sel.">".$data->v_name." - ".$data->v_register_no."</option>";

			

		}

		echo $string;

	}

	

	public function get_driver_data()

	{

	

	 	$post = $this->input->post(NULL,TRUE);

	

			

		$driver_detail = $this->db->get_where('driver_detail',array('agent_id'=>$post['agent_id'], 'd_status'=>1))->result();

		

		

		$string= "<option value='' selected>Select Option</option> ";

		foreach($driver_detail as $data)

		{

			if(isset($_POST['assign_driver_id']) && $_POST['assign_driver_id']==$data->id)

				$sel='selected';

			else 

				$sel='';

			

			$string.="<option value='".$data->id."' data-d_full_name='".$data->d_full_name."' data-d_contact_no1='".$data->d_contact_no1."' ".$sel.">".$data->d_full_name."</option>";

			

		}

		echo $string;

	}

}

?>