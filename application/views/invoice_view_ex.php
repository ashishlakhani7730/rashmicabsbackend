<script type="text/javascript">

function printDiv(invoice)

 {

     var printContents = document.getElementById(invoice).innerHTML;

     var originalContents = document.body.innerHTML;



     document.body.innerHTML = printContents;



     window.print();



     document.body.innerHTML = originalContents;

	 

	 document.getElementById('header').style.display = 'none';

	 document.getElementById('footer').style.display = 'none';

}

</script>

<style>

@import url('https://fonts.googleapis.com/css?family=Saira+Semi+Condensed');

body{

font-family: 'Saira Semi Condensed', sans-serif !important;

}

table {

    border-collapse: collapse !important;

}



td, th {

padding:5px !important; 

background-color:none !important;

display: table-cell !important;

}









</style>	

<?php $this->load->view('header'); ?>

            <!-- END HEADER -->

            <div class="container-fluid">

                <div class="page-content">

                

                    <!-- BEGIN PAGE BASE CONTENT -->

                 <div class="row">

                        <div class="portlet light bordered">

                                <div class="portlet-title">

                                    <div class="caption font-dark">

                                        <i class="fa fa-user font-dark"></i>

                                        <span class="caption-subject bold uppercase">INVOICE WITHOUT LOGO</span>

										

                                    </div>

                                    

                                    

                                </div>

                               <div class="portlet-body">

                  

                   <div class="row" id="btninv">

				   <?php $msg = $this->session->flashdata('success');

															if($msg['success'] != ''){

															?>

																<div class="col-md-12">

																	<p style="color:green; "><strong><?php echo $msg['success']; ?></strong></p>

																</div>

																<?php  } ?>

            <div class="col-md-12">

			<form method="post">

            <table class="table-responsive" >

            <tr>        

          <td style="padding-left:5px;">

										

										

		<?php if($invoice->sub_type=="ONEWAY OFFER") {?>

             

                <button formaction="<?php echo base_url();?>index.php/Oneway_view" type="submit" class="btn yellow-haze" value="<?php echo $booking_details->id;?>" name="oneway_view_id">Booking View <i class="fa fa-eye"></i></button>	

                

        <?php } ?>

        

        <?php if($invoice->sub_type=="ROUNDTRIP") {?>										

    

                <button formaction="<?php echo base_url();?>index.php/Roundtrip_view" type="submit" class="btn yellow-haze" value="<?php echo $booking_details->id;?>" name="roundtrip_view_id">Booking View <i class="fa fa-eye"></i></button>

            

        <?php } ?>

        

        <?php if($invoice->sub_type=="MULTICITY") {?>

        

                <button formaction="<?php echo base_url();?>index.php/Multicity_view" type="submit" class="btn yellow-haze" value="<?php echo $booking_details->id;?>" name="multicity_view_id">Booking View <i class="fa fa-eye"></i></button>

        

        <?php } ?>

        

       

            </td>

          <td style="padding-left:5px;">
		  <button formaction="<?php echo base_url();?>index.php/Invoice_view/outstation_invoice" type="submit" class="btn purple" value="<?php echo $invoice->id;?>" name="ticket_id"> Original </button>
		  <button formaction="<?php echo base_url();?>index.php/Invoice_view/InvoiceMail" type="submit" class="btn yellow-haze" value="<?php echo $invoice->id;?>" name="invoice_id"> Email <i class="fa fa-envelope"></i></button>
		   
		   <!--<a href="#" class="btn blue"> Email <i class="fa fa-envelope"></i></a> --></td>

              <td style="padding-left:5px;"> <a  onclick="printDiv('printableArea')" value="print a div!" class="btn green"> Print <i class="fa fa-print"></i></a></td>

              

               

            

            </tr>

            

            </table>

            </form>

            

           

            

            </div>

         </div>

         <!-- END PAGE HEADER-->

                    

                  </div>

                  

                  <div id="printableArea">

    







                  <div class="portlet-body">

                   <!-- invoice/estimate design--->

                  

                  <page size="A4" >

                 

                   

					<!--rc_print_logo -->

						<?php $passenger = $this->db->get_where('passenger_list',array('id'=>$invoice->passenger_id))->row();?>

						<table width="100%" border="0" cellpadding="5" cellspacing="5" >

  							<tr>

    							<td colspan="2">

									<table width="100%" border="0" style="border:none;" height="130px;" >

	 									<tr>

        									

      									</tr>

									</table>

								</td>

  							</tr>

  							<tr>

    							<td colspan="2">

									<table width="100%" border="1" >

	 									

      									<tr bgcolor="#CCCCCC" style="color:#000; font-size:16px; font-weight:700">

        									<td colspan="2" width="50%">Invoice To </td>

        									<td colspan="2" width="50%">Booking Details </td>

      									</tr>

      									<tr >

											<td width="25%" style="color:#000; font-size:14px; font-weight:700">Full Name:</td>

											<td width="25%" style="color:#000; font-size:14px; font-weight:500; text-transform: uppercase;"><?php if(!empty($passenger)){echo $passenger->p_full_name;} ?></td>

											<td width="25%" style="color:#000; font-size:14px; font-weight:700">Traveller Name:</td>

											<td width="25%" style="color:#000; font-size:14px; font-weight:500; text-transform: uppercase;"><?php  echo $booking_details->b_p_name." - ".$booking_details->b_p_contact;?></td>

      									</tr>

      									<tr bgcolor="#EEEEEE">

											<td width="25%" style="color:#000; font-size:14px; font-weight:700">GST No.: </td>

											<td width="25%" style="color:#000; font-size:14px; font-weight:500"><?php if(!empty($passenger)){ if(!empty($passenger->p_gst_number)){echo $passenger->p_gst_number;}else{echo "N/A";} }?></td>

											<td width="25%" style="color:#000; font-size:14px; font-weight:700">Invoice Date:</td>

											<td width="25%" style="color:#000; font-size:14px; font-weight:500"><?php echo date('d/m/Y',strtotime($invoice->invoice_created_date_time));?></td>

      									</tr>

	   									<tr>

											<td width="25%" style="color:#000; font-size:14px; font-weight:700">Mobile: </td>

											<td width="25%" style="color:#000; font-size:14px; font-weight:500"><?php if(!empty($passenger)){ echo $passenger->p_contact;}?></td>

											<td width="25%" style="color:#000; font-size:14px; font-weight:700">Vehicle Type: </td>

											<td width="25%" style="color:#000; font-size:14px; font-weight:500"><?php echo $this->db->get_where('vehicle_detail',array('id'=>$booking_details->b_vehicle_id))->row()->v_name;?> - <?php  echo $this->db->get_where('vehicle_category_detail',array('id'=>$booking_details->b_vc_id))->row()->category_name;?></td>

      									</tr>

	  									<tr bgcolor="#EEEEEE">

											<td width="25%" style="color:#000; font-size:14px; font-weight:700">City: </td>

											<td width="25%" style="color:#000; font-size:14px; font-weight:500"><?php if(!empty($passenger)){ echo $passenger->p_city;}?></td>

											<td width="25%" style="color:#000; font-size:14px; font-weight:700">Vehicle No.: </td>

											<td width="25%" style="color:#000; font-size:14px; font-weight:500"><?php echo $booking_details->b_vehicle_number;?></td>

      									</tr>

	  

	    								<tr >

											<td width="25%" style="color:#000; font-size:14px; font-weight:700">Journey Date And Time:</td>

											<td width="25%" style="color:#000; font-size:14px; font-weight:500"><?php echo date('d/m/Y h:i A',strtotime($rent_card->r_start_date." ".$rent_card->r_start_time));?> TO <?php echo date('d/m/Y h:i A',strtotime($rent_card->r_return_date." ".$rent_card->r_return_time));?></td>

											<td width="25%" style="color:#000; font-size:14px; font-weight:700">Package: </td>

											<td width="25%" style="color:#000; font-size:14px; font-weight:500"><?php echo $invoice->type;?> - <?php echo $invoice->sub_type;?></td>

      									</tr>

	   									<tr bgcolor="#EEEEEE">

											<td width="25%" style="color:#000; font-size:14px; font-weight:700">Route:</td>

											<td width="25%" style="color:#000; font-size:14px; font-weight:500"><?php echo $invoice->route;?></td>

											<td width="25%" style="color:#000; font-size:14px; font-weight:700">Total Distance: </td>

											<td width="25%" style="color:#000; font-size:14px; font-weight:500"><?php echo $invoice->extra_km;?> Km. </td>

      									</tr>

									</table>

	

								</td>

  							</tr>

  							

  							<tr>

    							<td style="vertical-align:top;">

									<table width="100%" border="1" >

	 									<tr bgcolor="#CCCCCC" style="color:#000; font-size:16px; font-weight:700">

											<td  width="25%">Base Fare </td>

											<td  width="25%" align="right">Amount</td>

		

      									</tr>

	  									<tr>

											<td width="25%" style="color:#000; font-size:14px; font-weight:700">MINIMUM KM (<?php $tot_km = $invoice->min_km * $invoice->total_days; echo number_format($tot_km)." x ".$invoice->rate_per_km; ?>)</td>

											<td width="25%" style="color:#000; font-size:14px; font-weight:700" align="right"><?php $min_km_rate = ($invoice->min_km * $invoice->total_days) * $invoice->rate_per_km; echo number_format($min_km_rate);	?></td>

       

      									</tr>

	  	 								<tr bgcolor="#EEEEEE">

											<?php if(($invoice->min_km * $invoice->total_days) < $invoice->extra_km) { ?> 

											<td width="25%" style="color:#000; font-size:14px; font-weight:700">EXTRA KM <?php $extra_km = $invoice->extra_km - $tot_km;?> (<?php echo $extra_km." x ".$invoice->rate_per_km; ?>)</td>

											<td width="25%" style="color:#000; font-size:14px; font-weight:700" align="right"><?php $extra_km_rate = $extra_km * $invoice->rate_per_km; echo number_format($extra_km_rate)?></td>

											<?php } else { ?>

											<td width="25%" style="color:#000; font-size:14px; font-weight:700">EXTRA KM </td>

											<td width="25%" style="color:#000; font-size:14px; font-weight:700" align="right"><?php echo "N/A"; $extra_km_rate = 0;?></td>

											<?php } ?>

       

      									</tr>
										
										<tr>                         

							  				<?php if($invoice->min_hr < $invoice->extra_hr) {?>

                              

 											<td width="25%" style="color:#000; font-size:14px; font-weight:700">EXTRA HOUR (<?php $extra_hr = $invoice->extra_hr - $invoice->min_hr; echo $extra_hr." x ".$invoice->rate_per_hr;?>)</td>

                                   			<td width="25%" style="color:#000; font-size:14px; font-weight:700" align="right"><?php $extra_hr_rate = $extra_hr * $invoice->rate_per_hr; echo number_format($extra_hr_rate);?></td>

                                   

                               				<?php } else { $extra_hr_rate = 0; } ?>                            

                        

                        				</tr>

										<tr>

     

											<td width="25%" style="color:#000; font-size:14px; font-weight:700">DRIVER ALLOWANCE: </td>

											<?php if($invoice->driver_allowance !=0) { ?>

											<td width="25%" style="color:#000; font-size:14px; font-weight:700" align="right"><?php  $driver_allow = $invoice->driver_allowance * $invoice->total_days; echo number_format($driver_allow); ?> </td>

											<?php } else { ?>

											<td width="25%" style="color:#000; font-size:14px; font-weight:700" align="right"><?php $invoice->driver_allowance=0; echo $driver_allow="N/A";?></td>

											<?php } ?>

      									</tr>

	   									<tr bgcolor="#EEEEEE">

  

											<td width="25%" style="color:#000; font-size:14px; font-weight:700">

											NIGHT CHARGE 

											<?php if($invoice->night_charge!=0 && $invoice->drop_night_charge != 0) {

												echo "( PICKUP + DROP )";

											}else if($invoice->night_charge!=0){

												echo "( PICKUP )";

											}else if($invoice->drop_night_charge!=0){

												echo "( DROP )";

											}?>

											

											</td>

											<?php if($night_charge = $invoice->night_charge==0 && $invoice->drop_night_charge == 0) {?>

											<td width="25%" style="color:#000; font-size:14px; font-weight:700" align="right"><?php echo "N/A"; $night_charge=0; $drop_night_charge=0;?></td>

											<?php } else {?>

											<td width="25%" style="color:#000; font-size:14px; font-weight:700" align="right"><?php  $night_charge = $invoice->night_charge;  $drop_night_charge = $invoice->drop_night_charge; echo $invoice->night_charge+$invoice->drop_night_charge; ?></td>

											<?php }?>

      									</tr>

	   									

										<tr>

  

        									<td width="25%" style="color:#000; font-size:14px; font-weight:700">OTHER CHARGE </td>

											<?php if($invoice->other_charge !=0){ ?>  

        									<td width="25%" style="color:#000; font-size:14px; font-weight:700" align="right"><?php echo $other_charge = $invoice->other_charge; ?></td>

											<?php }else{ ?>

								   			<td width="25%" style="color:#000; font-size:14px; font-weight:700" align="right"><?php echo 'N/A'; $other_charge = $invoice->other_charge = 0 ; ?></td>

								 			<?php }  ?>

      									</tr>

	   									<tr bgcolor="#EEEEEE">

											<td width="25%" style="color:#000; font-size:14px; font-weight:700">Discount</td>

											<?php if($invoice->discount!=0){ ?>

											<td width="25%" style="color:#000; font-size:14px; font-weight:700" align="right"><?php echo $invoice->discount;?></td>

											<?php } else { ?>

											<td width="25%" style="color:#000; font-size:14px; font-weight:700" align="right"><?php echo "N/A"; $invoice->discount=0; ?></td>

											<?php } ?>

    

      									</tr>

										

										<?php 

					  						$tax_value = explode(',',$invoice->tax_value);

					  						$tax_percentage = explode(',',$invoice->tax_percentage);

					  						$tax_name = explode(',',$invoice->tax_name); 

			

					 						if($invoice->tax_name != "" || $invoice->tax_name != 0 )

					 						{

								  

												for($i=0; $i<sizeof($tax_value); $i++) 

						 						{

										 ?>	       

						  				<tr>

								  

								  			<td width="25%" style="color:#000; font-size:14px; font-weight:700"><?php echo $tax_name[$i]."  ";  echo round($tax_percentage[$i],2);?> %</strong></td>

								  			<td width="25%" style="color:#000; font-size:14px; font-weight:700" align="right"><?php echo round($tax_value[$i],2); ?></td>					  

								  

						  

						   				</tr>

						

										<?php }  }?> 

	  

	      								<tr bgcolor="#CCCCCC" >

											<td width="25%" style="color:#000; font-size:14px; font-weight:700">TOTAL BASE FARE</td>

											<td width="25%" style="color:#000; font-size:14px; font-weight:700" align="right">

											<?php  

												$tax_value = explode(',',$invoice->tax_value);

						   						$i=0;

						   						foreach($tax_value as $tv)

												{

													$i = $i + $tv;

												}

									 

												$fare_amount =  $min_km_rate + $extra_km_rate + $extra_hr_rate - $invoice->discount	+ $i + $drop_night_charge + $driver_allow + $night_charge + $other_charge ;

												echo number_format($fare_amount);	

											?>

											</td>

  

      									</tr>

									</table>

								</td>

								<td style="vertical-align:top;">

									<table width="100%" border="1" >

	 									<tr bgcolor="#CCCCCC" style="color:#000; font-size:16px; font-weight:700">

    

		 									<td  width="25%">Other Charges </td>

        									<td  width="25%" align="right">Amount</td>

      									</tr>

	  									

	   									<tr bgcolor="#EEEEEE">

      

											<td width="25%" style="color:#000; font-size:14px; font-weight:700">TOLL CHARGE </td>

											<?php if($toll_charge = $invoice->toll_charge==0) {?>

											<td width="25%" style="color:#000; font-size:14px; font-weight:700" align="right"><?php echo "N/A";$toll_charge=0;?></td>

											<?php } else {?>

											<td width="25%" style="color:#000; font-size:14px; font-weight:700" align="right"><?php echo $toll_charge = $invoice->toll_charge;?></td>						

											<?php } ?>

      									</tr>

	   									<tr>

     

											<td width="25%" style="color:#000; font-size:14px; font-weight:700">PARKING CHARGE </td>

											<?php if($parking_charge = $invoice->parking_charge==0) {?>

											<td width="25%" style="color:#000; font-size:14px; font-weight:700" align="right"><?php echo "N/A";$parking_charge=0;?></td>

											<?php } else {?>

											<td width="25%" style="color:#000; font-size:14px; font-weight:700" align="right"><?php echo $parking_charge = $invoice->parking_charge; ?></td>

											<?php } ?>

      									</tr>

	   									<tr bgcolor="#EEEEEE">

        

											<td width="25%" style="color:#000; font-size:14px; font-weight:700">BORDER TAX </td>

											<?php if($invoice->border_tax !=0){ ?>

											<td width="25%" style="color:#000; font-size:14px; font-weight:700" align="right"><?php echo $border_tax = $invoice->border_tax ; ?></td>

											<?php } else {?>

								  			<td width="25%" style="color:#000; font-size:14px; font-weight:700" align="right"><?php echo 'N/A'; $border_tax = $invoice->border_tax = 0 ; ?></td>	

											<?php } ?>

      									</tr>

	   									

	      								<tr bgcolor="#CCCCCC" >

       

											<td width="25%" style="color:#000; font-size:14px; font-weight:700">TOTAL OTHER CHARGES </td>

											<td width="25%" style="color:#000; font-size:14px; font-weight:700" align="right"><?php $other_charges =  $toll_charge + $parking_charge + $border_tax ; echo number_format($other_charges);?></td>

      									</tr>

									</table>

								</td>

  							</tr>

  							<tr>

    							<td style="vertical-align:top">

	 								<table width="100%" border="1" >

	 									<tr>

	 										<td>

	 											<strong>Notes:</strong><br>

												<ul type="1">

													<li>GSTIN : 24APTPG3433K1ZP</li>
													
													<li>SAC CODE: 9966</li>

													<li>BANK : SBI<br />AC NAME : RASHMI CABS<br />AC No. : 37493651071<br>IFSC : SBIN0060439</li>

													<li>Subject to Bhavnagar Jurisdiction</li>

													

	

		

												</ul>

											</td>

	 									</tr>

	 								</table>

	

								</td>

		 						<td style="vertical-align:top">

	 								<table width="100%" border="1" >

										<tr>

											<td width="50%" bgcolor="#CCCCCC" style="color:#000; font-size:16px; font-weight:700">GRAND TOTAL </td>

											<td width="25%" bgcolor="#CCCCCC" style="color:#000; font-size:16px; font-weight:700" align="right"><?php $grand_total = $fare_amount+$other_charges; echo number_format($grand_total);?></td>

      									</tr>

										

	   									<tr>

											<td width="25%" style="color:#000; font-size:14px; font-weight:700">ADVANCED PAID<span style="color:#000; font-size:10px;"><br>(<?php if($invoice->payment_type == 1) { echo " ONLINE PAYMENT "; } else if($invoice->payment_type == 2) { echo " CASH TO RASHMICABS "; } else if ($invoice->payment_type == 3) { echo " CASH TO DRIVER "; } ?>)</span></td>

											<td width="25%" style="color:#000; font-size:14px; font-weight:700" align="right"><?php  $advanced = $invoice->advance_pay; echo number_format($advanced);?></td>
											
										</tr>
										
										<tr>

											<td width="25%" style="color:#000; font-size:14px; font-weight:700">FINAL PAID<span style="color:#000; font-size:10px;"><br>(<?php  if($invoice->gen_payment_type != '') { if($invoice->gen_payment_type == 1) { echo " ONLINE PAYMENT "; } else if($invoice->gen_payment_type == 2) { echo " CASH TO RASHMICABS "; } else if ($invoice->gen_payment_type == 3) { echo " CASH TO DRIVER "; } }?>)</span></td>
										
											<td width="25%" style="color:#000; font-size:14px; font-weight:700" align="right"><?php  $paid_amount = $invoice->paid_amount; echo number_format($paid_amount);?></td>
										</tr>

										

										

										<?php $advanced = $invoice->advance_pay + round($invoice->paid_amount,2);?>  

										

										<?php if($grand_total-$advanced) { ?>

						  				<?php if($invoice->balance != 0) {?>

										<tr>

                              				<td width="25%" style="color:#000; font-size:14px; font-weight:700" >Total Due</td>

                              				<td width="60%" style="color:#000; font-size:14px; font-weight:700" align="right"><?php $grand_total-$advanced; echo number_format($grand_total-$advanced); ?></td>    

                        				</tr>

										<?php } else { ?>	

	   									<tr>

											<td width="25%" style="color:#000; font-size:14px; font-weight:700">Extra Discount</td>

											<td width="60%" style="color:#000; font-size:14px; font-weight:700" align="right"><?php echo $grand_total-$advanced; number_format($grand_total-$advanced); ?></td>

      									</tr>

										<?php }	}  ?>

	   									

	 							</table>



							</td>



  						</tr>

					</table>

					<p>This is a computer generated invoice no signature required.</p>

                  </page>     

                            

            </div></div></div>

                    </div>

                    

                  </div>

                            </div>

                    </div>

                    

                 

            <!--end-->

                    </div>

                   

                    

                    <!-- END PAGE BASE CONTENT -->

                </div>

                <!-- BEGIN FOOTER -->

                <p class="copyright"> <?php echo date('Y'); ?> &copy; RASHMI CABS

                    <a target="_blank" href="http://greenworlddesignstudio.com">GREENWORLD TECHNOLOGIES</a> &nbsp;|&nbsp;

               

                </p>

                <a href="#index" class="go2top">

                    <i class="icon-arrow-up"></i>

                </a>

                <!-- END FOOTER -->

            </div>

        </div>

        <!-- END CONTAINER -->

     

        

        <!--[if lt IE 9]>

<script src="assets/global/plugins/respond.min.js"></script>

<script src="assets/global/plugins/excanvas.min.js"></script> 

<script src="assets/global/plugins/ie8.fix.min.js"></script> 

<![endif]-->

        <!-- BEGIN CORE PLUGINS -->

       <script src="<?php echo base_url();?>assets/global/plugins/jquery.min.js" type="text/javascript"></script>

        <script src="<?php echo base_url();?>assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>

        <script src="<?php echo base_url();?>assets/global/plugins/js.cookie.min.js" type="text/javascript"></script>

        <script src="<?php echo base_url();?>assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>

        <script src="<?php echo base_url();?>assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>

        <script src="<?php echo base_url();?>assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>

        <!-- END CORE PLUGINS -->

         <!-- BEGIN PAGE LEVEL PLUGINS -->

        <script src="<?php echo base_url();?>assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js" type="text/javascript"></script>

		<script src="<?php echo base_url();?>assets/global/plugins/select2/js/select2.full.min.js" type="text/javascript"></script>

        <!-- END PAGE LEVEL PLUGINS -->

        <!-- BEGIN THEME GLOBAL SCRIPTS -->

        <script src="<?php echo base_url();?>assets/global/scripts/app.min.js" type="text/javascript"></script>

        <!-- END THEME GLOBAL SCRIPTS -->

        <!-- BEGIN PAGE LEVEL SCRIPTS -->

		 <script src="<?php echo base_url();?>assets/pages/scripts/components-select2.min.js" type="text/javascript"></script>

        <!-- END PAGE LEVEL SCRIPTS -->

        <!-- BEGIN THEME LAYOUT SCRIPTS -->

        <script src="<?php echo base_url();?>assets/layouts/layout5/scripts/layout.min.js" type="text/javascript"></script>

       

        <!-- END THEME LAYOUT SCRIPTS -->

    </body>



</html>