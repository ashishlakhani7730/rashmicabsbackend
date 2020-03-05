<?php defined('BASEPATH') OR exit('No direct script access allowed');
  
  if($booking_details->b_ac_non_ac == 1)
  {
  	$ac_non_ac_package = 'AC';
  }
  else
  {
  	$ac_non_ac_package = 'NON AC';
  }
  
  
  $route = $booking_details->c_name;
									
	if($booking_details->b_type == 4 )
	{
	$to_city = $this->db->get_where('city_list',array('id'=>$booking_details->b_to_city))->row();
	$route = $route." - ".$to_city->c_name;
	}
	else
	{
    if($booking_details->b_type == 5 || $booking_details->b_type == 6 )
    {
	$route = $route. " - ".$booking_details->b_to_city;
    }
        
    }
								
								 
	
$to      = $passenger_details->p_email_id;
$subject = 'EzeeTaxi Cabs ';
 $message_mail =  '
<html> 

<body class="body" style="padding:0 !important; margin:0 !important; display:block !important; background:#1e1e1e; -webkit-text-size-adjust:none">

	<table width="100%" border="0" cellspacing="0" cellpadding="0" bgcolor="#373435">
		<tr>
			<td align="center" valign="top">
				<!-- Top -->
				<table width="100%" border="0" cellspacing="0" cellpadding="0" style="background:url("http://ezeetaxi.com/app/assets/mailimg/bgheader.png") repeat; height:45px;"  >
					<tr>
						<td align="center" valign="top">
							<table width="600" border="0" cellspacing="0" cellpadding="0" class="mobile-shell">
								<tr>
									<td class="td" style="font-size:0pt; line-height:0pt; padding:0; margin:0; font-weight:normal; width:600px; min-width:600px; Margin:0" width="600">
										<table width="100%" border="0" cellspacing="0" cellpadding="0">
											<tr>
												<td class="content-spacing" style="font-size:0pt; line-height:0pt; text-align:left" width="20"></td>
												<td>
													<table width="100%" border="0" cellspacing="0" cellpadding="0" class="spacer" style="font-size:0pt; line-height:0pt; text-align:center; width:100%; min-width:100%"><tr><td height="10" class="spacer" style="font-size:0pt; line-height:0pt; text-align:center; width:100%; min-width:100%">&nbsp;</td></tr></table>

													
													<table width="100%" border="0" cellspacing="0" cellpadding="0" class="spacer" style="font-size:0pt; line-height:0pt; text-align:center; width:100%; min-width:100%"><tr><td height="10" class="spacer" style="font-size:0pt; line-height:0pt; text-align:center; width:100%; min-width:100%">&nbsp;</td></tr></table>

												</td>
												<td class="content-spacing" style="font-size:0pt; line-height:0pt; text-align:left" width="20"></td>
											</tr>
										</table>
									</td>
								</tr>
							</table>
						</td>
					</tr>
				</table>
				<!-- END Top -->

				<table width="600" border="0" cellspacing="0" cellpadding="0" class="mobile-shell">
					<tr>
						<td class="td" style="font-size:0pt; line-height:0pt; padding:0; margin:0; font-weight:normal; width:600px; min-width:600px; Margin:0" width="600">
							<!-- Header -->
							<table bgcolor="#fff" width="100%" border="0" cellspacing="0" cellpadding="0">
								<tr>
									<td class="content-spacing" style="font-size:0pt; line-height:0pt; text-align:left" width="20"></td>
									<td>
										<table width="100%" border="0" cellspacing="0" cellpadding="0" class="spacer" style="font-size:0pt; line-height:0pt; text-align:center; width:100%; min-width:100%"><tr><td height="30" class="spacer" style="font-size:0pt; line-height:0pt; text-align:center; width:100%; min-width:100%">&nbsp;</td></tr></table>

										<div class="img-center" style="font-size:0pt; line-height:0pt; text-align:center"><a href="#" target="_blank"><img src="https://ezeetaxi.com/app/assets/mailimg/logo.png" border="0" width="203px" height="auto" alt="ezee taxi" /></a></div>
										<table width="100%" border="0" cellspacing="0" cellpadding="0" class="spacer" style="font-size:0pt; line-height:0pt; text-align:center; width:100%; min-width:100%"><tr><td height="30" class="spacer" style="font-size:0pt; line-height:0pt; text-align:center; width:100%; min-width:100%">&nbsp;</td></tr></table>


										
									</td>
									<td class="content-spacing" style="font-size:0pt; line-height:0pt; text-align:left" width="20"></td>
								</tr>
							</table>
							<!-- END Header -->

							<!-- Main -->
							<table width="100%" border="0" cellspacing="0" cellpadding="0">
								<tr>
									<td>
										<!-- Head -->
										<table width="100%" border="0" cellspacing="0" cellpadding="0" bgcolor="#CFA00F">
											<tr>
												<td>
													<table width="100%" border="0" cellspacing="0" cellpadding="0">
														<tr>
															
															<td>
																<table width="100%" border="0" cellspacing="0" cellpadding="0">
																	<tr>
																		
																	</tr>
																</table>
																<table width="100%" border="0" cellspacing="0" cellpadding="0" class="spacer" style="font-size:0pt; line-height:0pt; text-align:center; width:100%; min-width:100%"><tr><td height="24" class="spacer" style="font-size:0pt; line-height:0pt; text-align:center; width:100%; min-width:100%">&nbsp;</td></tr></table>

															</td>
															
														</tr>
													</table>
													<table width="100%" border="0" cellspacing="0" cellpadding="0">
														<tr>
															
															<td class="img" style="font-size:0pt; line-height:0pt; text-align:left" width="10"></td>
															<td>
																<table width="100%" border="0" cellspacing="0" cellpadding="0" class="spacer" style="font-size:0pt; line-height:0pt; text-align:center; width:100%; min-width:100%"><tr><td height="15" class="spacer" style="font-size:0pt; line-height:0pt; text-align:center; width:100%; min-width:100%">&nbsp;</td></tr></table>

																	<div class="h3-2-center" style="color:#1e1e1e; font-family: Nunito, sans-serif; min-width:auto !important; font-size:20px; line-height:26px; text-align:center; letter-spacing:5px"> THANK YOU FOR CHOOSING <BR /><strong>eZee TAXI</strong></div>
																<table width="100%" border="0" cellspacing="0" cellpadding="0" class="spacer" style="font-size:0pt; line-height:0pt; text-align:center; width:100%; min-width:100%"><tr><td height="5" class="spacer" style="font-size:0pt; line-height:0pt; text-align:center; width:100%; min-width:100%">&nbsp;</td></tr></table>


															
																<table width="100%" border="0" cellspacing="0" cellpadding="0" class="spacer" style="font-size:0pt; line-height:0pt; text-align:center; width:100%; min-width:100%"><tr><td height="35" class="spacer" style="font-size:0pt; line-height:0pt; text-align:center; width:100%; min-width:100%">&nbsp;</td></tr></table>

															</td>
															<td class="img" style="font-size:0pt; line-height:0pt; text-align:left" width="10"></td>
															
														</tr>
													</table>
												</td>
											</tr>
										</table>
										<!-- END Head -->

										<!-- Body -->
										<table width="100%" border="0" cellspacing="0" cellpadding="0" bgcolor="#ffffff">
											<tr>
												<td>
													<table width="100%" border="0" cellspacing="0" cellpadding="0">
														<tr>
															<td class="content-spacing" style="font-size:0pt; line-height:0pt; text-align:left" width="20"></td>
															<td>
																<table width="100%" border="0" cellspacing="0" cellpadding="0" class="spacer" style="font-size:0pt; line-height:0pt; text-align:center; width:100%; min-width:100%"><tr><td height="35" class="spacer" style="font-size:0pt; line-height:0pt; text-align:center; width:100%; min-width:100%">&nbsp;</td></tr></table>

																<div class="h3-1-center" style="color:#1e1e1e; font-family: Varela Round, sans-serif; min-width:auto !important; font-size:20px; line-height:26px; text-align:justify">Dear '.$passenger_details->p_full_name .',
                                                                </div>
																<table width="100%" border="0" cellspacing="0" cellpadding="0" class="spacer" style="font-size:0pt; line-height:0pt; text-align:center; width:100%; min-width:100%"><tr><td height="15" class="spacer" style="font-size:0pt; line-height:0pt; text-align:center; width:100%; min-width:100%"></td></tr></table>


																<div class="h4-center" style="color:#1e1e1e; font-family: Varela Round, sans-serif; min-width:auto !important; font-size:12px; line-height:22px; text-align:justify">
					<p>Find below your booking details:</p>
					<p>
					 <table class="table table-bordered margin-top-10" border="0" style="font-size:12px;" width="100%"   >
                        
                        <tbody >
                     
                           <tr bgcolor="#EFEFEF">
                              <td >Booking Reference</td>
                              <td  align="right">'.$booking_details->b_id.'</td>           
                          </tr>  
                           <tr >
                              <td >Passenger Name</td>
                              <td  align="right">'.$passenger_details->p_full_name.'</td>           
                          </tr> 
                           <tr bgcolor="#EFEFEF">
                              <td >Passenger Mobile Number</td>
                              <td  align="right">'.$passenger_details->p_contact.'</td>           
                          </tr>  
                           <tr >
                              <td >Route Details</td>
                              <td  align="right">'.$route.'</td>           
                          </tr> 
                           <tr bgcolor="#EFEFEF">
                              <td >Vehicle Category</td>
                              <td  align="right">'.$ac_non_ac_package .' '.$vehicle_category->vc_name.'</td>           
                          </tr>  
						   <tr >
                              <td >Trip Type</td>
                              <td  align="right">'.$booking_type->type_name.' '.$booking_type->sub_type_name.'</td>           
                          </tr> 
                           <tr bgcolor="#EFEFEF">
                              <td >Trip Date & Time</td>
                              <td  align="right">'.date("d-m-Y",strtotime($booking_details->b_from_date)).' '.date("h:i A",strtotime($booking_details->b_from_time)).'</td>           
                          </tr>  
						   <tr >
                              <td >Approximate Distance</td>
                              <td  align="right">'.$booking_details->b_pk_min_km.' KM</td>           
                          </tr> 
                           <tr bgcolor="#EFEFEF">
                              <td >Pick up Point</td>
                              <td  align="right">'.$booking_details->b_pickup_point.'</td>           
                          </tr>  
						   <tr >
                              <td >Estimated Amount</td>
                              <td  align="right">Rs.'.$estimated_rate.'</td>           
                          </tr> 
                           <tr bgcolor="#EFEFEF">
                              <td >Advance Paid</td>
                              <td  align="right">Rs.'.$booking_details->b_advance.'</td>           
                          </tr>  
                                  
                        
                        </tbody>
                        </table>
					
					</p>	<br />
					<p style="text-align:justify">
					Estimated Amount Excludes, Toll Charges, Parking Charges, State Tax, Airport / Railway Entry Charges to be paid at actual wherever applicable. Night Allowance & Driver Allowance as Applicable. Service Tax as applicable will be calculated on the actual Base Fare.<br /><br />
					'.$vehicle_category->vc_name.' - '.$vehicle_category->vc_detail.'<br /><br />
					Note, we will send you the driver and vehicle details prior to 2 hours of the pickup time by email and SMS.<br /><br />
					For any modifications on this reservation please login here <a href="www.eZeeTAXI.com" target="_blank">www.eZeeTAXI.com</a> or email us at <a href="booking@eZeeTAXI.com" target="_blank">booking@eZeeTAXI.com</a> along with this booking number.<br/><br/>
					No Modification will be allowed prior to 2 hours of the pickup time.<br/><br/>
Wish you a pleasant trip.

					</p>											
																</div>
																<table width="100%" border="0" cellspacing="0" cellpadding="0" class="spacer" style="font-size:0pt; line-height:0pt; text-align:center; width:100%; min-width:100%"><tr><td height="25" class="spacer" style="font-size:0pt; line-height:0pt; text-align:center; width:100%; min-width:100%">&nbsp;</td></tr></table>


																
															</td>
															<td class="content-spacing" style="font-size:0pt; line-height:0pt; text-align:left" width="20"></td>
														</tr>
													</table>
													
													<table width="100%" border="0" cellspacing="0" cellpadding="0">
														<tr>
															<td class="content-spacing" style="font-size:0pt; line-height:0pt; text-align:left" width="20"></td>
															<td>
																<table width="100%" border="0" cellspacing="0" cellpadding="0" class="spacer" style="font-size:0pt; line-height:0pt; text-align:center; width:100%; min-width:100%"><tr><td height="30" class="spacer" style="font-size:0pt; line-height:0pt; text-align:center; width:100%; min-width:100%">&nbsp;</td></tr></table>

																<table width="100%" border="0" cellspacing="0" cellpadding="0">
																	<tr>
																		<td style="border: 1px solid #1e1e1e;">
																			

																		</td>
																	</tr>
																</table>
																<table width="100%" border="0" cellspacing="0" cellpadding="0" class="spacer" style="font-size:0pt; line-height:0pt; text-align:center; width:100%; min-width:100%"><tr><td height="25" class="spacer" style="font-size:0pt; line-height:0pt; text-align:center; width:100%; min-width:100%">&nbsp;</td></tr></table>


																<div class="text-2" style="color:#1e1e1e; font-family:Georgia, serif; min-width:auto !important; font-size:14px; line-height:22px; text-align:left">
																	<br /><strong>Team – eZee TAXI</strong><br />+91 70 9696 3933 (eZee)<br />

																</div>
																<table width="100%" border="0" cellspacing="0" cellpadding="0" class="spacer" style="font-size:0pt; line-height:0pt; text-align:center; width:100%; min-width:100%"><tr><td height="35" class="spacer" style="font-size:0pt; line-height:0pt; text-align:center; width:100%; min-width:100%">&nbsp;</td></tr></table>

															</td>
															<td class="content-spacing" style="font-size:0pt; line-height:0pt; text-align:left" width="20"></td>
														</tr>
													</table>
												</td>
											</tr>
										</table>
													<div class="fluid-img" style="font-size:0pt; line-height:0pt; text-align:center; background:#F7E6B4"><a href="#" target="_blank"><img src="http://ezeetaxi.com/app/assets/mailimg/ezeesail.png" border="0" width="200" height="auto" alt="eZEE TAXI" /></a></div>
													
										<!-- END Body -->

										<!-- Foot -->
										<table width="100%" border="0" cellspacing="0" cellpadding="0" bgcolor="#CFA00F">
											<tr>
												<td>
													<table width="100%" border="0" cellspacing="0" cellpadding="0">
														<tr>
															
															<td>
																<table width="100%" border="0" cellspacing="0" cellpadding="0" class="spacer" style="font-size:0pt; line-height:0pt; text-align:center; width:100%; min-width:100%"><tr><td height="30" class="spacer" style="font-size:0pt; line-height:0pt; text-align:center; width:100%; min-width:100%">&nbsp;</td></tr></table>

																<div class="h3-1-center" style="color:#1e1e1e; font-family:Georgia, serif; min-width:auto !important; font-size:20px; line-height:26px; text-align:center">
																	<em>Follow Us</em>
																</div>
																<table width="100%" border="0" cellspacing="0" cellpadding="0" class="spacer" style="font-size:0pt; line-height:0pt; text-align:center; width:100%; min-width:100%"><tr><td height="15" class="spacer" style="font-size:0pt; line-height:0pt; text-align:center; width:100%; min-width:100%">&nbsp;</td></tr></table>


																<!-- Socials -->
																<table width="100%" border="0" cellspacing="0" cellpadding="0">
																	<tr>
																		<td align="center">
																			<table border="0" cellspacing="0" cellpadding="0">
																				<tr>
																					<td class="img-center" style="font-size:0pt; line-height:0pt; text-align:center" width="38"><a href="https://www.facebook.com/ezeetaxi/" target="_blank"><img src="http://ezeetaxi.com/app/assets/mailimg/ico_facebook.jpg" border="0" width="28" height="28" alt="eZEE TAXI" /></a></td>
																					<td class="img-center" style="font-size:0pt; line-height:0pt; text-align:center" width="38"><a href="https://twitter.com/ezeetaxi" target="_blank"><img src="http://ezeetaxi.com/app/assets/mailimg/ico_twitter.jpg" border="0" width="28" height="28" alt="eZEE TAXI" /></a></td>
																					<td class="img-center" style="font-size:0pt; line-height:0pt; text-align:center" width="38"><a href="https://plus.google.com/u/0/118007799914118656174" target="_blank"><img src="http://ezeetaxi.com/app/assets/mailimg/g_plus.png" border="0" width="28" height="28" alt="eZEE TAXI" /></a></td>
																					<td class="img-center" style="font-size:0pt; line-height:0pt; text-align:center" width="38"><a href="https://www.youtube.com/channel/UCu9dI9bKWCJyfCRf-1p_ctw" target="_blank"><img src="http://ezeetaxi.com/app/assets/mailimg/y_tube.png" border="0" width="28" height="28" alt="eZEE TAXI" /></a></td>
																				</tr>
																			</table>
																		</td>
																	</tr>
																</table>
																<!-- END Socials -->
																<table width="100%" border="0" cellspacing="0" cellpadding="0" class="spacer" style="font-size:0pt; line-height:0pt; text-align:center; width:100%; min-width:100%"><tr><td height="15" class="spacer" style="font-size:0pt; line-height:0pt; text-align:center; width:100%; min-width:100%">&nbsp;</td></tr></table>

															</td>
															
														</tr>
													</table>
													<table width="100%" border="0" cellspacing="0" cellpadding="0">
														<tr>
															
															<td>
																<table width="100%" border="0" cellspacing="0" cellpadding="0" class="spacer" style="font-size:0pt; line-height:0pt; text-align:center; width:100%; min-width:100%"><tr><td height="24" class="spacer" style="font-size:0pt; line-height:0pt; text-align:center; width:100%; min-width:100%">&nbsp;</td></tr></table>

																<table width="100%" border="0" cellspacing="0" cellpadding="0">
																	<tr>
																		
																	</tr>
																</table>
															</td>
															
														</tr>
													</table>
												</td>
											</tr>
										</table>
										<!-- END Foot -->
									</td>
								</tr>
							</table>
							<!-- END Main -->
							
							<!-- Footer -->
							<table width="100%" border="0" cellspacing="0" cellpadding="0">
								<tr>
									<td class="content-spacing" style="font-size:0pt; line-height:0pt; text-align:left" width="20"></td>
									<td>
										<table width="100%" border="0" cellspacing="0" cellpadding="0" class="spacer" style="font-size:0pt; line-height:0pt; text-align:center; width:100%; min-width:100%"><tr><td height="30" class="spacer" style="font-size:0pt; line-height:0pt; text-align:center; width:100%; min-width:100%">&nbsp;</td></tr></table>

										<div class="text-footer" style="color:#CCC; font-family:Arial, sans-serif; min-width:auto !important; font-size:12px; line-height:18px; text-align:center">
											Plot No.19, Kailash Bhumi, SH F/F 01,<span class="mobile-block"></span> Nr. Shivaji Circle,Opp. B.O.I Bank,<span class="mobile-block"></span> Bhavnagar, GUJ., IND.
											<br />
											<a href="http://www.ezeetaxi.com" target="_blank" class="link-1" style="color:#666666; text-decoration:none"><span class="link-1" style="color:#CCC; text-decoration:none">www.eZeetaxi.com</span></a>
											<span class="mobile-block"><span class="hide-for-mobile">|</span></span>
											<a href="mailto:email@yoursitename.com" target="_blank" class="link-1" style="color:#666666; text-decoration:none"><span class="link-1" style="color:#CCC; text-decoration:none">support@eZeetaxi.com</span></a>
											<span class="mobile-block"><span class="hide-for-mobile">|</span></span>
											Phone: <a href="tel:+91 70 9696 3933" target="_blank" class="link-1" style="color:#666666; text-decoration:none"><span class="link-1" style="color:#CCC; text-decoration:none">+91 70 9696 3933</span></a>
										</div>
										<table width="100%" border="0" cellspacing="0" cellpadding="0" class="spacer" style="font-size:0pt; line-height:0pt; text-align:center; width:100%; min-width:100%"><tr><td height="30" class="spacer" style="font-size:0pt; line-height:0pt; text-align:center; width:100%; min-width:100%">&nbsp;</td></tr></table>

									</td>
									<td class="content-spacing" style="font-size:0pt; line-height:0pt; text-align:left" width="20"></td>
								</tr>
							</table>
							<!-- END Footer -->
						</td>
					</tr>
				</table>
				<div class="wgmail" style="font-size:0pt; line-height:0pt; text-align:center"><img src="" width="600" height="1" style="min-width:600px" alt="eZEE TAXI" border="0" /></div>
			</td>
		</tr>
	</table>
</body>
</html>
';

			$headers  = 'MIME-Version: 1.0' . "\r\n";
			$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
	 
			$headers .= 'From: noreply@ezeetaxi.com' . "\r\n" .
				'Reply-To: Booking@eZeeTAXI.com' . "\r\n" .
				'X-Mailer: PHP/' . phpversion();
			mail($to, $subject, $message_mail, $headers);
?>