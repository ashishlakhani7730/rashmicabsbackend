<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
    <link href="//fonts.googleapis.com/css?family=Oswald:400,300,700" rel="stylesheet" type="text/css" />
<title>Untitled Document</title>
</head>
<style>
@import url('https://fonts.googleapis.com/css?family=Saira+Semi+Condensed');
body{
font-family: 'Saira Semi Condensed', sans-serif !important;
}
table {
    border-collapse: collapse;
}



</style>	
<body>
<table width="100%" border="0" cellpadding="5" cellspacing="5" >
  <tr>
    <td colspan="2">
	<table width="100%" border="0" style="border:none;" >
	 <tr>
        <td width="50%" colspan="2" style="padding:10px;"  ><img src="<?php echo base_url();?>assets/global/img/rc_print_logo.png" width="260px"></td>
        <td width="50%" colspan="2" align="right"><strong>Duty Slip: #<?php echo $rent_cards->r_id; ?></strong><br>Email: info@rashmicabs.com<br>Contact: +91 9726 34 7007 <br>Web: www.rashmicabs.com</td>
      </tr>
	</table>
	</td>
  </tr>
  <tr>
    <td colspan="2">
	<?php $passenger = $this->db->get_where('passenger_list',array('id'=>$booking_data->b_p_id))->row();  ?>
	<table width="100%" border="1" >
	 <tr bgcolor="#EEEEEE" style="color:#000; font-size:16px; font-weight:700">
        <td colspan="4" align="center">120, Madhav Hill, Waghawadi Road, Bhavnagar - 364001, Gujarat, India</td>
      </tr>
      <tr bgcolor="#CCCCCC" style="color:#000; font-size:16px; font-weight:700">
        <td colspan="2" width="50%">Customer Details  </td>
        <td colspan="2" width="50%">Car Details  </td>
      </tr>
      <tr >
        <td width="25%" style="color:#000; font-size:14px; font-weight:700">Full Name:</td>
        <td width="25%" style="color:#000; font-size:14px; font-weight:500text-transform: uppercase;"><?php if(!empty($passenger)){ echo $passenger->p_full_name; }?></td>
        <td width="25%" style="color:#000; font-size:14px; font-weight:700">Traveller Name:</td>
        <td width="25%" style="color:#000; font-size:14px; font-weight:500; text-transform: uppercase;"><?php echo $booking_data->b_p_name;?></td>
      </tr>
      <tr bgcolor="#EEEEEE">
        <td width="25%" style="color:#000; font-size:14px; font-weight:700">Email: </td>
        <td width="25%" style="color:#000; font-size:14px; font-weight:500"><?php if(!empty($passenger)){echo $passenger->p_email_id;}?></td>
        <td width="25%" style="color:#000; font-size:14px; font-weight:700">Driver Name:</td>
        <td width="25%" style="color:#000; font-size:14px; font-weight:500; text-transform: uppercase;"><?php echo $booking_data->b_driver_name;?></td>
      </tr>
	   <tr >
        <td width="25%" style="color:#000; font-size:14px; font-weight:700">Mobile: </td>
        <td width="25%" style="color:#000; font-size:14px; font-weight:500"><?php if(!empty($passenger)){echo $passenger->p_contact;}?></td>
        <td width="25%" style="color:#000; font-size:14px; font-weight:700">Driver Contact:  </td>
        <td width="25%" style="color:#000; font-size:14px; font-weight:500"> <?php echo $booking_data->b_driver_contact;?></td>
      </tr>
	  
	   <tr bgcolor="#EEEEEE">
        <td width="25%" style="color:#000; font-size:14px; font-weight:700">City: </td>
        <td width="25%" style="color:#000; font-size:14px; font-weight:500"><?php if(!empty($passenger)){echo $passenger->p_city;}?></td>
        <td width="25%" style="color:#000; font-size:14px; font-weight:700">Cab Category Type: </td>
        <td width="25%" style="color:#000; font-size:14px; font-weight:500"><?php  echo $this->db->get_where('vehicle_category_detail',array('id'=>$booking_data->b_vc_id))->row()->category_name;?></td>
      </tr>
	   <tr>
        <td width="25%" style="color:#000; font-size:14px; font-weight:700">Reffered By: </td>
        <td width="25%" style="color:#000; font-size:14px; font-weight:500"><?php echo $rent_cards->r_reffered_by;?></td>
        <td width="25%" style="color:#000; font-size:14px; font-weight:700"> Car No./Modal:  </td>
        <td width="25%" style="color:#000; font-size:14px; font-weight:500"><?php echo $booking_data->b_vehicle_number;?>/<?php echo $this->db->get_where('vehicle_detail',array('id'=>$booking_data->b_vehicle_id))->row()->v_name;?></td>
      </tr>
	   <tr bgcolor="#CCCCCC" style="color:#000; font-size:16px; font-weight:700">
        <td colspan="2" width="50%">Booking Details   </td>
        <td colspan="2" width="50%">Payment Details   </td>
      </tr>
	   <tr >
        <td width="25%" style="color:#000; font-size:14px; font-weight:700">Package:</td>
        <td width="25%" style="color:#000; font-size:14px; font-weight:500"><?php echo $booking_data->package_type;?> - <?php echo $booking_data->package_sub_type; ?></td>
		<?php if($rent_cards->r_return_date=='1970-01-01' || $rent_cards->r_return_time==0 || $rent_cards->r_return_date=='1970-01-01' || $rent_cards->r_return_time==0)
                              {
                                  
                                 $min_km =  $booking_data->b_pk_min_km;
								 $total_days = "";
                                  
                              }
                              else
                              {
                                 if($rent_cards->r_start_date == $rent_cards->r_return_date ) 
                                 {
                                   	 $total_days = 1; 
									
                                    
                                 }
                                 else
                                 {								  
									  $d1=date('Y-m-d',strtotime($rent_cards->r_start_date));
									  $d2=date('Y-m-d',strtotime($rent_cards->r_return_date));
					   
									   $date1 = date_create($d1);
									   $date2 = date_create($d2);				
									  
									  $diff =date_diff($date1,$date2);
									  
									  
									  
									  $total_days =  $diff->format("%a");
									  
									  $date = new DateTime($rent_cards->r_start_time);
									 
									  $dt2=$date->format('G');
									  
									  if($dt2<=21)
									  {
										  $total_days = $total_days + 1;
									  }
									  
									  $date2 = new DateTime($rent_cards->r_return_time);
									 
									  $dt3=$date2->format('G');
									  
									  if($dt3<5)
									  {
										  $total_days = $total_days - 1;
									  }
                                 }
                                      
                                $min_km =  $booking_data->b_pk_min_km * $total_days;
                                
                            }
							//echo '   '.$total_days;
                          ?>
        <td width="25%" style="color:#000; font-size:14px; font-weight:700">Driver Allowance: <?php echo " (".$booking_data->b_pk_driver_allowance."/Day )"; ?> </td>
        <td width="25%" style="color:#000; font-size:14px; font-weight:500">Rs. <?php echo $booking_data->b_pk_driver_allowance*$total_days; ?> </td>
      </tr>
      <tr bgcolor="#EEEEEE">
        <td width="25%" style="color:#000; font-size:14px; font-weight:700">Travel Route:</td>
        <td width="25%" style="color:#000; font-size:14px; font-weight:500"><?php echo $booking_data->c_name ?>
								 <?php if($booking_data->package_sub_type == 'ROUNDTRIP' || $booking_data->package_sub_type == 'MULTICITY')
								 {
										  echo "-";
										  echo $booking_data->b_to_city; 
								 } 
								 if($booking_data->package_sub_type == 'ONEWAY')
								 { 
										  echo "-"; 
										  echo $this->db->get_where('city_detail',array('id'=>$booking_data->b_to_city))->row()->c_name;
								 } ?></td>
		 <?php // if($booking_data->package_sub_type == 'ROUNDTRIP' || $booking_data->package_sub_type == 'MULTICITY' ) { ?>
		  <?php if($booking_data->package_type == 'LOCAL'){ ?>
        <td width="25%" style="color:#000; font-size:14px; font-weight:700">Minimum Km <?php echo $booking_data->b_pk_min_km; ?></td>
		<?php } else {?>
		<td width="25%" style="color:#000; font-size:14px; font-weight:700">Minimum Km <?php echo $min_km." (".$booking_data->b_pk_min_km."/Day )"; ?></td>
		 <?php } ?>	
        <td width="25%" style="color:#000; font-size:14px; font-weight:500">Rs.<?php echo $booking_data->b_pk_rate_per_km;?>/Km.</td>
      </tr>
	   
	   <tr>
        <td width="25%" style="color:#000; font-size:14px; font-weight:700">Payment Mode:</td>
        <td width="25%" style="color:#000; font-size:14px; font-weight:500"><?php echo $this->db->get_where('payment_type',array('id'=>$booking_data->b_payment_type))->row()->payment_name;?></td>
        <td width="25%" style="color:#000; font-size:14px; font-weight:700">Minimum <?php echo $booking_data->b_pk_min_hour; ?>  Hour: </td>
        <td width="25%" style="color:#000; font-size:14px; font-weight:500">Rs. <?php echo $booking_data->b_pk_rate_per_hour;?>/HR:</td>
      </tr>
	  <tr  bgcolor="#EEEEEE">
        <td width="25%" style="color:#000; font-size:14px; font-weight:700">Package Rate:</td>
        <td width="25%" style="color:#000; font-size:14px; font-weight:500">Rs.<?php echo $booking_data->b_pk_rate;?></td>
        <td width="25%" style="color:#000; font-size:14px; font-weight:700">Toll Charges:  </td>
        <td width="25%" style="color:#000; font-size:14px; font-weight:500"></td>
      </tr>
	   <tr>
		<td width="25%" style="color:#000; font-size:14px; font-weight:700">Advance Paid:</td>
		<td width="25%" style="color:#000; font-size:14px; font-weight:500">Rs. <?php echo $booking_data->b_advance; ?></td>
							 
		<td width="25%" style="color:#000; font-size:14px; font-weight:700">Other Charges:  </td>
		<td width="25%" style="color:#000; font-size:14px; font-weight:500"></td>
							  
	 </tr>
	</table>
	
	</td>
  </tr>
  <tr>
  <td><br></td>
  </tr>
  <tr>
   <td>
	<table width="100%" border="1" >
	 <tr bgcolor="#CCCCCC" style="color:#000; font-size:16px; font-weight:700">
        <td  width="25%" colspan="6">Duty Perticulers (Kms./Days) </td>
       
		
      </tr>
	  <tr align="left">
        <td style="color:#000; font-size:14px; font-weight:700">Start Date &amp; Time</td>
        <td  style="color:#000; font-size:14px; font-weight:700" >Start Kms.</td>
		<td  style="color:#000; font-size:14px; font-weight:700" >End Date &amp; Time</td>
		<td  style="color:#000; font-size:14px; font-weight:700" >End Kms.</td>
		<td  style="color:#000; font-size:14px; font-weight:700" >Total Kms.</td>
		<td  style="color:#000; font-size:14px; font-weight:700" >Extra Kms.</td>
       
      </tr>
	  <tr >
        <td  style="color:#000; font-size:14px; font-weight:700"><?php echo date('d/m/Y',strtotime($rent_cards->r_start_date));?><br /><?php echo date('h:i A',strtotime($rent_cards->r_start_time));?> <br /></td>
        <td  style="color:#000; font-size:14px; font-weight:700" ><?php if($rent_cards->r_start_km != 0)
									  { 
										  echo $rent_cards->r_start_km." KM";
									  } else{
										   echo "";
									  }?></td>
		<td  style="color:#000; font-size:14px; font-weight:700" ><?php if($rent_cards->r_return_date=='1970-01-01' || $rent_cards->r_return_time==0)
								 {
										  echo "";
								  }
								  else
								  {
										  echo date('d/m/Y',strtotime($rent_cards->r_return_date));?><br /><?php echo date('h:i A',strtotime($rent_cards->r_return_time));
								  }?></td>
		<td  style="color:#000; font-size:14px; font-weight:700" ><?php if($rent_cards->r_return_km != 0)
									  { 
										  echo $rent_cards->r_return_km." KM";
									  } else{
										   echo "";
									  }?></td>
		<td  style="color:#000; font-size:14px; font-weight:700" ><?php if($rent_cards->r_return_km !=0 && $rent_cards->r_start_km !=0)
									  {
										  if($rent_cards->r_return_km - $rent_cards->r_start_km !=0)
										  { 
											  echo $rent_cards->r_return_km-$rent_cards->r_start_km." Km"; 
										  }
									  }
									  else
									  {
										   echo "";
									  }?></td>
		<td  style="color:#000; font-size:14px; font-weight:700" ><?php if($rent_cards->r_return_km !=0 && $rent_cards->r_start_km !=0)
							  
									  { 
										$total_km = $rent_cards->r_return_km-$rent_cards->r_start_km;
										//$min_km =	$booking_data->b_pk_min_km;
										
											  if($total_km > $min_km)
											  {
												  echo "Extra ";
												  echo $total_km-$min_km." Km";
											  }
									  }
											  else
											  {
												  echo "";
											  }
									  
							  
									  ?></td>
       
      </tr>
	  
	</table>

	</td>
  </tr>
   <tr>
   <td>
	<table width="100%" border="0" >
	 <tr  style="color:#000; font-size:16px; font-weight:700">
        <td  width="25%" align="left">Customers Signature<br />After Checking The Opening Kms.</td>
		 <td  width="25%" align="right">Customers Signature<br />After Checking The Closing Kms. </td>
       
		
      </tr>
	  <tr align="left">
        <td style="color:#000; font-size:14px; font-weight:700"><br /></td>
       
		
       
      </tr>
	  <tr >
        <td  style="color:#000; font-size:14px; font-weight:700">Other Notes <br /><?php echo $rent_cards->r_other_details;?></br><?php echo " <strong>Booking Notes:</strong>"; echo"<br>"; echo $booking_data->c_name;
				  
										//if($booking_data->b_type == '1' || $booking_data->b_type == '2' || $booking_data->b_type == '3' || $booking_data->b_type == '4')
									  	//{
										  	if($booking_data->b_type == '2')
										  	{
										  		$to_city = $this->db->get_where('city_detail',array('id'=>$booking_data->b_to_city))->row();
										  		echo " - ".$to_city->c_name;
										  	}
										  	else
										  	{
												if($booking_data->b_type != '5')
						  
										  			echo " - ".$booking_data->b_to_city;
										  	}
										  	
								  			echo "</br> Pickup Point :".$booking_data->b_pickup_point;	
								  			echo "</br> Drop Point :".$booking_data->b_drop_point;		
										  
										  	$date = new DateTime($booking_data->b_from_time);
										  	$dt2=$date->format('G');
										  
										   	if($booking_data->b_from_date == $booking_data->b_to_date ) 
										  	{
										  		$total_days = 1; 
										  	}
										  	else
										  	{
											  	$date1 = date_create(date('Y-m-d',strtotime($booking_data->b_from_date)));
											  	$date2 = date_create(date('Y-m-d',strtotime($booking_data->b_to_date)));
												
												$diff =date_diff($date1,$date2);
												  
											  
											  
											  	$total_days =  $diff->format("%a"); 
										  
											  
											  
											  	if($dt2<=21)
											  	{
												  	$total_days = $total_days + 1;
											  	}
				  							}					
										  
										  	echo "</br> Duration :".date('d-m-Y',strtotime($booking_data->b_from_date));
										  	if($booking_data->b_to_date != '0000-00-00'){echo " - ".date('d-m-Y',strtotime($booking_data->b_to_date))."   (".$total_days." Days)";}
										  	echo "</br>Booking Remarks : ".$booking_data->b_remarks;										
										//}
										   ?></td>
        <td  style="color:#000; font-size:14px; font-weight:700" ><strong>Notes:</strong><br>
												<ul type="1">
													<li>Minimum 300 km / day average.</li>
													<li>Driver Allowance 250  / day extra.</li>
													<li>Time and Km counting office to office</li>
													<li>Toll Parking Stat Tax Charges Extra.</li>
													<li>If Car not running 10 min then AC off by driver. </li>
													<li>Full Day Means 600 hrs to 2300 hrs and 300 kms for all car.</li>
													<li>Due to any reason if Customer cancel his/her program, then customer has to pay cancellation charges.</li>
													<li>Subject to Bhavnagar Jurisdiction</li>

	
		
												</ul></td>
	
       
      </tr>
	  
	</table>

	</td>
  </tr>
</table>

</body>
</html>
