<?php defined('BASEPATH') OR exit('No direct script access allowed');
	//define('BACKUP_DIR', './invoice' ) ;		  
//$pay_amount = $total_amount - $booking_data->b_advance;

 if($booking_details->b_ac_non_ac == 1)
  {
  	$ac_non_ac_package = 'AC';
  }
  else
  {
  	$ac_non_ac_package = 'NON AC';
  }

$total_invoice =round($invoice_detail->total_amount) + round($invoice_detail->advance_pay);


/*
 if (!file_exists(BACKUP_DIR)) mkdir(BACKUP_DIR , 0700) ;
            if (!is_writable(BACKUP_DIR)) chmod(BACKUP_DIR , 0700) ;
	
		/*
		    $data['invoice'] = $this->db->get_where('invoice',array('id'=>$booking_details->b_invoice_id))->row();
		   $rent_card_id = $this->db->get_where('booking_list',array('b_invoice_id'=>$booking_details->b_invoice_id))->row()->b_rent_card_id;
			$data['rent_card'] = $this->db->get_where('rent_cards',array('id'=>$rent_card_id))->row();
			$package_id = $this->db->get_where('booking_list',array('b_invoice_id'=>$booking_details->b_invoice_id))->row()->b_pk_id;
		    $ac_non_ac = $this->db->get_where('package_list',array('id'=>$package_id))->row()->pk_ac_non_ac;
		   
		   	if($ac_non_ac==1)
			{
		   	$data['ac_non_ac'] =  ' AC';
		   	}
			else
			{
				$data['ac_non_ac'] =  ' NON AC';
			}
			
		$html = "<html><body style='padding:0px;'>";
		$html .= $this->load->view('invoice_view_pdf', $data,true);
		$html .= "</body></html>";
		
		
		
			 //this the the PDF filename that user will get to downlo
        $pdfFilePath = BACKUP_DIR."/invoice.pdf";
 
        //load mPDF library
        $this->load->library('m_pdf');
 
       //generate the PDF from the given html
        $this->m_pdf->pdf->WriteHTML($html);
 
        //download it.
        $this->m_pdf->pdf->Output($pdfFilePath, "F"); 
		
		$filename= "invoice.pdf";
		$my_path = BACKUP_DIR . '/';
		
		$file = $my_path.$filename;
		$file_size = filesize($file);
		$handle = fopen($file, "r");
		$content = fread($handle, $file_size);
		fclose($handle);

		 $content = chunk_split(base64_encode($content));
		$uid = md5(uniqid(time()));
		$name = basename($file);
		$eol = PHP_EOL;*/

if($booking_details->b_p_id==0)
	{
		$to      = $booking_details->b_p_email_id;
		$p_name =$booking_details->b_p_name;
		$p_contact = $booking_details->b_p_contact;
	}else
	{
		$to      = $passenger_details->p_email_id;
		$p_name =$passenger_details->p_full_name;
		$p_contact = $passenger_details->p_contact;
	}


$subject = 'EzeeTaxi Cabs ';
$message_mail="<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'>
<html xmlns='http://www.w3.org/1999/xhtml'
 xmlns:v='urn:schemas-microsoft-com:vml'
 xmlns:o='urn:schemas-microsoft-com:office:office'>
<head>
	<!--[if gte mso 9]><xml>
	<o:OfficeDocumentSettings>
	<o:AllowPNG/>
	<o:PixelsPerInch>96</o:PixelsPerInch>
	</o:OfficeDocumentSettings>
	</xml><![endif]-->
	<meta http-equiv='Content-type' content='text/html; charset=utf-8' />
	<meta name='viewport' content='width=device-width, initial-scale=1, maximum-scale=1' />
    <meta http-equiv='X-UA-Compatible' content='IE=edge' />
	<meta name='format-detection' content='date=no' />
	<meta name='format-detection' content='address=no' />
	<meta name='format-detection' content='telephone=no' />
    <link href='https://fonts.googleapis.com/css?family=Nunito' rel='stylesheet'> 
    <link href='https://fonts.googleapis.com/css?family=Varela+Round' rel='stylesheet'> 
	<title>For Email Verification</title>
    
	

	<style type='text/css' media='screen'>
		/* Linked Styles */
		body { padding:0 !important; margin:0 !important; display:block !important; background:#373435; -webkit-text-size-adjust:none }
		a { color:#a88123; text-decoration:none }
		p { padding:0 !important; margin:0 !important } 

		/* Mobile styles */
		@media only screen and (max-device-width: 480px), only screen and (max-width: 480px) { 
			div[class='mobile-br-5'] { height: 5px !important; }
			div[class='mobile-br-10'] { height: 10px !important; }
			div[class='mobile-br-15'] { height: 15px !important; }
			div[class='mobile-br-20'] { height: 20px !important; }
			div[class='mobile-br-25'] { height: 25px !important; }
			div[class='mobile-br-30'] { height: 30px !important; }

			th[class='m-td'], 
			td[class='m-td'], 
			div[class='hide-for-mobile'], 
			span[class='hide-for-mobile'] { display: none !important; width: 0 !important; height: 0 !important; font-size: 0 !important; line-height: 0 !important; min-height: 0 !important; }

			span[class='mobile-block'] { display: block !important; }

			div[class='wgmail'] img { min-width: 320px !important; width: 320px !important; }

			div[class='img-m-center'] { text-align: center !important; }

			div[class='fluid-img'] img,
			td[class='fluid-img'] img { width: 100% !important; max-width: 100% !important; height: auto !important; }

			table[class='mobile-shell'] { width: 100% !important; min-width: 100% !important; }
			td[class='td'] { width: 100% !important; min-width: 100% !important; }
			
			table[class='center'] { margin: 0 auto; }
			
			td[class='column-top'],
			th[class='column-top'],
			td[class='column'],
			th[class='column'] { float: left !important; width: 100% !important; display: block !important; }

			td[class='content-spacing'] { width: 15px !important; }

			div[class='h2'] { font-size: 44px !important; line-height: 48px !important; }
		} 
		
	</style>
</head>
<body class='body' style='padding:0 !important; margin:0 !important; display:block !important; background:#1e1e1e; -webkit-text-size-adjust:none'>
	<table width='100%' border='0' cellspacing='0' cellpadding='0' bgcolor='#373435'>
		<tr>
			<td align='center' valign='top'>
				<!-- Top -->
				<table width='100%' border='0' cellspacing='0' cellpadding='0' style='background:url(http://ezeetaxi.com/app/assets/mailimg/bgheader.png) repeat; height:45px;'>
					<tr>
						<td align='center' valign='top'>
							<table width='600' border='0' cellspacing='0' cellpadding='0' class='mobile-shell'>
								<tr>
									<td class='td' style='font-size:0pt; line-height:0pt; padding:0; margin:0; font-weight:normal; width:600px; min-width:600px; Margin:0' width='600'>
										<table width='100%' border='0' cellspacing='0' cellpadding='0'>
											<tr>
												<td class='content-spacing' style='font-size:0pt; line-height:0pt; text-align:left' width='20'></td>
												<td>
													<table width='100%' border='0' cellspacing='0' cellpadding='0' class='spacer' style='font-size:0pt; line-height:0pt; text-align:center; width:100%; min-width:100%'><tr><td height='10' class='spacer' style='font-size:0pt; line-height:0pt; text-align:center; width:100%; min-width:100%'>&nbsp;</td></tr></table>

													
													<table width='100%' border='0' cellspacing='0' cellpadding='0' class='spacer' style='font-size:0pt; line-height:0pt; text-align:center; width:100%; min-width:100%'><tr><td height='10' class='spacer' style='font-size:0pt; line-height:0pt; text-align:center; width:100%; min-width:100%'>&nbsp;</td></tr></table>

												</td>
												<td class='content-spacing' style='font-size:0pt; line-height:0pt; text-align:left' width='20'></td>
											</tr>
										</table>
									</td>
								</tr>
							</table>
						</td>
					</tr>
				</table>
				<!-- END Top -->

				<table width='600' border='0' cellspacing='0' cellpadding='0' class='mobile-shell'>
					<tr>
						<td class='td' style='font-size:0pt; line-height:0pt; padding:0; margin:0; font-weight:normal; width:600px; min-width:600px; Margin:0' width='600'>
							<!-- Header -->
							<table bgcolor='#fff' width='100%' border='0' cellspacing='0' cellpadding='0'>
								<tr>
									<td class='content-spacing' style='font-size:0pt; line-height:0pt; text-align:left' width='20'></td>
									<td>
										<table width='100%' border='0' cellspacing='0' cellpadding='0' class='spacer' style='font-size:0pt; line-height:0pt; text-align:center; width:100%; min-width:100%'><tr><td height='30' class='spacer' style='font-size:0pt; line-height:0pt; text-align:center; width:100%; min-width:100%'>&nbsp;</td></tr></table>

										<div class='img-center' style='font-size:0pt; line-height:0pt; text-align:center'><a href='#' target='_blank'><img src='http://ezeetaxi.com/app/assets/mailimg/logo.png' border='0' width='203px' height='auto' alt='' /></a></div>
										<table width='100%' border='0' cellspacing='0' cellpadding='0' class='spacer' style='font-size:0pt; line-height:0pt; text-align:center; width:100%; min-width:100%'><tr><td height='30' class='spacer' style='font-size:0pt; line-height:0pt; text-align:center; width:100%; min-width:100%'>&nbsp;</td></tr></table>


										
									</td>
									<td class='content-spacing' style='font-size:0pt; line-height:0pt; text-align:left' width='20'></td>
								</tr>
							</table>
							<!-- END Header -->

							<!-- Main -->
							<table width='100%' border='0' cellspacing='0' cellpadding='0'>
								<tr>
									<td>
										<!-- Head -->
										<table width='100%' border='0' cellspacing='0' cellpadding='0' bgcolor='#CFA00F'>
											<tr>
												<td>
													<table width='100%' border='0' cellspacing='0' cellpadding='0'>
														<tr>
															
															<td>
																<table width='100%' border='0' cellspacing='0' cellpadding='0'>
																	<tr>
																		
																	</tr>
																</table>
																<table width='100%' border='0' cellspacing='0' cellpadding='0' class='spacer' style='font-size:0pt; line-height:0pt; text-align:center; width:100%; min-width:100%'><tr><td height='24' class='spacer' style='font-size:0pt; line-height:0pt; text-align:center; width:100%; min-width:100%'>&nbsp;</td></tr></table>

															</td>
															
														</tr>
													</table>
													<table width='100%' border='0' cellspacing='0' cellpadding='0'>
														<tr>
															
															<td class='img' style='font-size:0pt; line-height:0pt; text-align:left' width='10'></td>
															<td>
																<table width='100%' border='0' cellspacing='0' cellpadding='0' class='spacer' style='font-size:0pt; line-height:0pt; text-align:center; width:100%; min-width:100%'><tr><td height='15' class='spacer' style='font-size:0pt; line-height:0pt; text-align:center; width:100%; min-width:100%'>&nbsp;</td></tr></table>

																	<div class='h3-2-center' style='color:#1e1e1e; font-family: Nunito, sans-serif; min-width:auto !important; font-size:20px; line-height:26px; text-align:center; letter-spacing:5px'> THANK YOU FOR CHOOSING <BR /><strong>eZee TAXI</strong></div>
																<table width='100%' border='0' cellspacing='0' cellpadding='0' class='spacer' style='font-size:0pt; line-height:0pt; text-align:center; width:100%; min-width:100%'><tr><td height='5' class='spacer' style='font-size:0pt; line-height:0pt; text-align:center; width:100%; min-width:100%'>&nbsp;</td></tr></table>


															
																<table width='100%' border='0' cellspacing='0' cellpadding='0' class='spacer' style='font-size:0pt; line-height:0pt; text-align:center; width:100%; min-width:100%'><tr><td height='35' class='spacer' style='font-size:0pt; line-height:0pt; text-align:center; width:100%; min-width:100%'>&nbsp;</td></tr></table>

															</td>
															<td class='img' style='font-size:0pt; line-height:0pt; text-align:left' width='10'></td>
															
														</tr>
													</table>
												</td>
											</tr>
										</table>
										<!-- END Head -->

										<!-- Body -->
										<table width='100%' border='0' cellspacing='0' cellpadding='0' bgcolor='#ffffff'>
											<tr>
												<td>
													<table width='100%' border='0' cellspacing='0' cellpadding='0'>
														<tr>
															<td class='content-spacing' style='font-size:0pt; line-height:0pt; text-align:left' width='20'></td>
															<td>
																<table width='100%' border='0' cellspacing='0' cellpadding='0' class='spacer' style='font-size:0pt; line-height:0pt; text-align:center; width:100%; min-width:100%'><tr><td height='35' class='spacer' style='font-size:0pt; line-height:0pt; text-align:center; width:100%; min-width:100%'>&nbsp;</td></tr></table>

																<div class='h3-1-center' style='color:#1e1e1e; font-family: Varela Round, sans-serif; min-width:auto !important; font-size:20px; line-height:26px; text-align:justify'>Dear ".$p_name.",
                                                                </div>
																<table width='100%' border='0' cellspacing='0' cellpadding='0' class='spacer' style='font-size:0pt; line-height:0pt; text-align:center; width:100%; min-width:100%'><tr><td height='15' class='spacer' style='font-size:0pt; line-height:0pt; text-align:center; width:100%; min-width:100%'></td></tr></table>


																<div class='h4-center' style='color:#1e1e1e; font-family: Varela Round, sans-serif; min-width:auto !important; font-size:12px; line-height:22px; text-align:justify'>
					<p>We would like to thank you for choosing eZee TAXI, please find below the details of your trip:</p>
					<p>
					 <table class='table table-bordered margin-top-10' border='0' style='font-size:12px;' width='100%'   >
                        
                        <tbody >
                     
                           <tr bgcolor='#EFEFEF'>
                              <td >Booking Reference</td>
                              <td  align='right'>".$booking_details->b_id."</td>           
                          </tr>  
                           <tr >
                              <td >Passenger Name</td>
                              <td  align='right'>".$p_name."</td>           
                          </tr> 
                           <tr bgcolor='#EFEFEF'>
                              <td >Passenger Mobile Number</td>
                              <td  align='right'>".$p_contact."</td>           
                          </tr>  
                           <tr >
                              <td >Route Details</td>
                              <td  align='right'>".$booking_details->c_name."</td>           
                          </tr> 
                           <tr bgcolor='#EFEFEF'>
                              <td >Vehicle Category</td>
                              <td  align='right'>".$ac_non_ac_package ." ".$vehicle_category->vc_name."</td>           
                          </tr>  
						   <tr >
                              <td >Trip Type</td>
                              <td  align='right'>".$booking_details->type_name." ".$booking_details->sub_type_name."</td>           
                          </tr> 
                           <tr bgcolor='#EFEFEF'>
                              <td >Trip Date & Time</td>
                              <td  align='right'>".date('d-m-Y',strtotime($booking_details->b_from_date))." ".date('h:i A',strtotime($booking_details->b_from_time))."</td>           
                          </tr>  
						   <tr >
                              <td >Distance Travelled</td>
                              <td  align='right'>".$invoice_detail->extra_km." km</td>           
                          </tr> 
                           <tr bgcolor='#EFEFEF'>
                              <td >Pick up Point</td>
                              <td  align='right'>".$booking_details->b_pickup_point."</td>           
                          </tr>  
						   <tr >
                              <td >Final Invoice Amount</td>
                              <td  align='right'>Rs.".$total_invoice."</td>           
                          </tr> 
                           <tr bgcolor='#EFEFEF'>
                              <td >Advance Paid</td>
                              <td  align='right'>Rs. ".$booking_details->b_advance."</td>           
                          </tr>  
						   <tr >
                              <td >Balance Payable</td>
                              <td  align='right'>Rs. ".round($invoice_detail->balance,2)."</td>           
                          </tr> 
                          <!-- <tr bgcolor='#EFEFEF'>
                              <td >Membership Number</td>
                              <td  align='right'>N/A</td>           
                          </tr> 
						    <tr >
                              <td >Accumulated Points</td>
                              <td  align='right'>N/A</td>           
                          </tr>  -->
                                  
                        
                        </tbody>
                        </table>
					
					</p>	<br />
					<p style='text-align:justify'>
					This Excludes, Toll Charges, Parking Charges, State Tax, Airport / Railway Entry Charges to be paid at actual wherever applicable. <br /><br/>
					".$vehicle_category->vc_name." -  ".$vehicle_category->vc_detail." <br /><br />
					
			<form action='ezeetaxi.com/app/index.php/Invoice_view/invoice_link' method='post'>
                  		<input type='hidden' name='ticket_id' value='".$invoice_detail->id."' />
                        <button type='submit'>Click here to view Invoice</button>
                        </form>
				<br /><br/>
					For any queries or feedback regarding this booking; email us on  <a href='mailto:booking@eZeeTAXI.com' target='_blank'>booking@eZeeTAXI.com</a><br/><br/>
					Hope you had a wonderful trip.
					
					</p>											
																
																

																<table width='100%' border='0' cellspacing='0' cellpadding='0' class='spacer' style='font-size:0pt; line-height:0pt; text-align:center; width:100%; min-width:100%'><tr><td height='40' class='spacer' style='font-size:0pt; line-height:0pt; text-align:center; width:100%; min-width:100%'>&nbsp;</td></tr></table>

															</td>
															<td class='content-spacing' style='font-size:0pt; line-height:0pt; text-align:left' width='20'></td>
														</tr>
													</table>
													
													<table width='100%' border='0' cellspacing='0' cellpadding='0'>
														<tr>
															<td class='content-spacing' style='font-size:0pt; line-height:0pt; text-align:left' width='20'></td>
															<td>
																<table width='100%' border='0' cellspacing='0' cellpadding='0' class='spacer' style='font-size:0pt; line-height:0pt; text-align:center; width:100%; min-width:100%'><tr><td height='30' class='spacer' style='font-size:0pt; line-height:0pt; text-align:center; width:100%; min-width:100%'>&nbsp;</td></tr></table>

																<table width='100%' border='0' cellspacing='0' cellpadding='0'>
																	<tr>
																		<td style='border: 1px solid #1e1e1e;'>
																			

																		</td>
																	</tr>
																</table>
																<table width='100%' border='0' cellspacing='0' cellpadding='0' class='spacer' style='font-size:0pt; line-height:0pt; text-align:center; width:100%; min-width:100%'><tr><td height='25' class='spacer' style='font-size:0pt; line-height:0pt; text-align:center; width:100%; min-width:100%'>&nbsp;</td></tr></table>


																<div class='text-2' style='color:#1e1e1e; font-family:Georgia, serif; min-width:auto !important; font-size:14px; line-height:22px; text-align:left'>
																 <br /><strong>Team – eZee TAXI</strong><br />+91 70 9696 3933 (eZee)<br />
																</div>
																<table width='100%' border='0' cellspacing='0' cellpadding='0' class='spacer' style='font-size:0pt; line-height:0pt; text-align:center; width:100%; min-width:100%'><tr><td height='35' class='spacer' style='font-size:0pt; line-height:0pt; text-align:center; width:100%; min-width:100%'>&nbsp;</td></tr></table>

															</td>
															<td class='content-spacing' style='font-size:0pt; line-height:0pt; text-align:left' width='20'></td>
														</tr>
													</table>
												</td>
											</tr>
										</table>
										<div class='fluid-img' style='font-size:0pt; line-height:0pt; text-align:center; background:#F7E6B4'><a href='#' target='_blank'><img src='http://ezeetaxi.com/app/assets/mailimg/ezeesail.png' border='0' width='200' height='auto' alt='' /></a></div>
										<!-- END Body -->

										<!-- Foot -->
										<table width='100%' border='0' cellspacing='0' cellpadding='0' bgcolor='#CFA00F'>
											<tr>
												<td>
													<table width='100%' border='0' cellspacing='0' cellpadding='0'>
														<tr>
															
															<td>
																<table width='100%' border='0' cellspacing='0' cellpadding='0' class='spacer' style='font-size:0pt; line-height:0pt; text-align:center; width:100%; min-width:100%'><tr><td height='30' class='spacer' style='font-size:0pt; line-height:0pt; text-align:center; width:100%; min-width:100%'>&nbsp;</td></tr></table>

																<div class='h3-1-center' style='color:#1e1e1e; font-family:Georgia, serif; min-width:auto !important; font-size:20px; line-height:26px; text-align:center'>
																	<em>Follow Us</em>
																</div>
																<table width='100%' border='0' cellspacing='0' cellpadding='0' class='spacer' style='font-size:0pt; line-height:0pt; text-align:center; width:100%; min-width:100%'><tr><td height='15' class='spacer' style='font-size:0pt; line-height:0pt; text-align:center; width:100%; min-width:100%'>&nbsp;</td></tr></table>


																<!-- Socials -->
																<table width='100%' border='0' cellspacing='0' cellpadding='0'>
																	<tr>
																		<td align='center'>
																			<table border='0' cellspacing='0' cellpadding='0'>
																				<tr>
																					<td class='img-center' style='font-size:0pt; line-height:0pt; text-align:center' width='38'><a href='https://www.facebook.com/ezeetaxi/' target='_blank'><img src='http://ezeetaxi.com/app/assets/mailimg/ico_facebook.jpg' border='0' width='28' height='28' alt='' /></a></td>
																					<td class='img-center' style='font-size:0pt; line-height:0pt; text-align:center' width='38'><a href='https://twitter.com/ezeetaxi' target='_blank'><img src='http://ezeetaxi.com/app/assets/mailimg/ico_twitter.jpg' border='0' width='28' height='28' alt='' /></a></td>
																					<td class='img-center' style='font-size:0pt; line-height:0pt; text-align:center' width='38'><a href='https://plus.google.com/u/0/118007799914118656174' target='_blank'><img src='http://ezeetaxi.com/app/assets/mailimg/g_plus.png' border='0' width='28' height='28' alt='' /></a></td>
																					<td class='img-center' style='font-size:0pt; line-height:0pt; text-align:center' width='38'><a href='https://www.youtube.com/channel/UCu9dI9bKWCJyfCRf-1p_ctw' target='_blank'><img src='http://ezeetaxi.com/app/assets/mailimg/y_tube.png' border='0' width='28' height='28' alt='' /></a></td>
																				</tr>
																			</table>
																		</td>
																	</tr>
																</table>
																<!-- END Socials -->
																<table width='100%' border='0' cellspacing='0' cellpadding='0' class='spacer' style='font-size:0pt; line-height:0pt; text-align:center; width:100%; min-width:100%'><tr><td height='15' class='spacer' style='font-size:0pt; line-height:0pt; text-align:center; width:100%; min-width:100%'>&nbsp;</td></tr></table>

															</td>
															
														</tr>
													</table>
													<table width='100%' border='0' cellspacing='0' cellpadding='0'>
														<tr>
															
															<td>
																<table width='100%' border='0' cellspacing='0' cellpadding='0' class='spacer' style='font-size:0pt; line-height:0pt; text-align:center; width:100%; min-width:100%'><tr><td height='24' class='spacer' style='font-size:0pt; line-height:0pt; text-align:center; width:100%; min-width:100%'>&nbsp;</td></tr></table>

																<table width='100%' border='0' cellspacing='0' cellpadding='0'>
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
							<table width='100%' border='0' cellspacing='0' cellpadding='0'>
								<tr>
									<td class='content-spacing' style='font-size:0pt; line-height:0pt; text-align:left' width='20'></td>
									<td>
										<table width='100%' border='0' cellspacing='0' cellpadding='0' class='spacer' style='font-size:0pt; line-height:0pt; text-align:center; width:100%; min-width:100%'><tr><td height='30' class='spacer' style='font-size:0pt; line-height:0pt; text-align:center; width:100%; min-width:100%'>&nbsp;</td></tr></table>

										<div class='text-footer' style='color:#CCC; font-family:Arial, sans-serif; min-width:auto !important; font-size:12px; line-height:18px; text-align:center'>
											Plot No.19, Kailash Bhumi, SH F/F 01,<span class='mobile-block'></span> Nr. Shivaji Circle,Opp. B.O.I Bank,<span class='mobile-block'></span> Bhavnagar, GUJ., IND.
											<br />
											<a href='http://www.YourSiteName.com' target='_blank' class='link-1' style='color:#666666; text-decoration:none'><span class='link-1' style='color:#CCC; text-decoration:none'>www.eZeetaxi.com</span></a>
											<span class='mobile-block'><span class='hide-for-mobile'>|</span></span>
											<a href='mailto:email@yoursitename.com' target='_blank' class='link-1' style='color:#666666; text-decoration:none'><span class='link-1' style='color:#CCC; text-decoration:none'>support@eZeetaxi.com</span></a>
											<span class='mobile-block'><span class='hide-for-mobile'>|</span></span>
											Phone: <a href='tel:+91 70 9696 3933' target='_blank' class='link-1' style='color:#666666; text-decoration:none'><span class='link-1' style='color:#CCC; text-decoration:none'>+91 70 9696 3933</span></a>
										</div>
										<table width='100%' border='0' cellspacing='0' cellpadding='0' class='spacer' style='font-size:0pt; line-height:0pt; text-align:center; width:100%; min-width:100%'><tr><td height='30' class='spacer' style='font-size:0pt; line-height:0pt; text-align:center; width:100%; min-width:100%'>&nbsp;</td></tr></table>

									</td>
									<td class='content-spacing' style='font-size:0pt; line-height:0pt; text-align:left' width='20'></td>
								</tr>
							</table>
							<!-- END Footer -->
						</td>
					</tr>
				</table>
				<div class='wgmail' style='font-size:0pt; line-height:0pt; text-align:center'><img src='https://d1pgqke3goo8l6.cloudfront.net/oD2XPM6QQiajFKLdePkw_gmail_fix.gif' width='600' height='1' style='min-width:600px' alt='' border='0' /></div>
			</td>
			
		</tr>
	</table>
</body>
</html>
";
			$headers  = 'MIME-Version: 1.0' . "\r\n";
			$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
	 
			$headers .= 'From: noreply@ezeetaxi.com' . "\r\n" .
				'Reply-To: Booking@eZeeTAXI.com' . "\r\n" .
				'X-Mailer: PHP/' . phpversion();
				/*
			$nmessage = "--".$uid."\r\n";
$nmessage .= "Content-type:text/plain; charset=iso-8859-1\r\n";
$nmessage .= "Content-Transfer-Encoding: 7bit\r\n\r\n";
$nmessage .= $message_mail."\r\n\r\n";
$nmessage .= "--".$uid."\r\n";
$nmessage .= "Content-Type: application/octet-stream; name=\"".$filename."\"\r\n";
$nmessage .= "Content-Transfer-Encoding: base64\r\n";
$nmessage .= "Content-Disposition: attachment; filename=\"".$filename."\"\r\n\r\n";
$nmessage .= $content."\r\n\r\n";
$nmessage .= "--".$uid."--";	*/
				
			mail($to, $subject, $message_mail, $headers);
			?>