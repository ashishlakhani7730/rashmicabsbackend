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
                                        <span class="caption-subject bold uppercase">INVOICE</span>
                                    </div>
                                    
                                    
                                </div>
                               <div class="portlet-body">
                  
                   <div class="row" id="btninv">
            <div class="col-md-12">
            <table class="table-responsive" >
            <tr>
           
          
          <td style="padding-left:5px;"> <a href="#" class="btn blue"> Email <i class="fa fa-envelope"></i></a></td>
              <td style="padding-left:5px;"> <a  onclick="printDiv('printableArea')" value="print a div!" class="btn green"> Print <i class="fa fa-print"></i></a></td>
              
               
            
            </tr>
            
            </table>
            
            
           
            
            </div>
         </div>
         <!-- END PAGE HEADER-->
                    
                  </div>
                  
                  <div id="printableArea">
    



                  <div class="portlet-body">
                   <!-- invoice/estimate design--->
                  
                  <page size="A4" >
                 
                   <div class="invoice">
            <div class="row invoice-logo">
               <div class="col-xs-6 invoice-logo-space margin-top-20"><img src="<?php echo base_url(); ?>assets/global/img/rc_darklogo.png" width="240px" alt="" />   
            	
               </div>
                
               <div class="col-xs-6">
                  <p ><span class="copystates">Email: info@rashmicabs.com</span><span class="muted">Contact: +91 9726 34 7007</span>
                  <span class="muted">Web: www.rashmicabs.com</span></p>
                 
                 
               </div>
            </div>
            
       
            <div class="row ">
            <div class="col-xs-12">
             <table class="table table-bordered invoicetbl">
                     <thead >
                        <tr  >

                           <th style="text-align:center; background:#333; color:#fff;"   colspan="6">INVOICE</th>
                          
                           <?php $passenger = $this->db->get_where('passenger_list',array('id'=>$invoice->passenger_id))->row();?>
                        </tr>
                     </thead>
                     <tbody>
                        <tr style="background:#CCC; color:#000; font-weight:500;">
						
                           <td  colspan="3">Invoice To </td>
                           
                           <td colspan="3">Booking Details </td>
                           
                         
                        </tr>
                         <tr >
                           <td>Full Name:</td>
						   <td colspan="2"><?php if($booking_details->b_self_travel_status == 1){ echo $booking_details->b_p_name; } else { echo $booking_details->b_p_name." / ".$passenger->p_full_name; }?></td>
                           <td>Invoice #:</td>
                           <td colspan="2"><?php echo $invoice->invoice_id;?></td>
                        </tr>
                        <tr>
                           <td>Email:  </td>
                           <td colspan="2"><?php echo $passenger->p_email_id;?></td>
                           <td>Invoice Date:</td>
                           <td colspan="2"><?php echo date('d/m/Y',strtotime($invoice->invoice_created_date_time));?></td>
                         </tr>
                          <tr>
                           <td>Mobile:  </td>
                           <td colspan="2"><?php echo $passenger->p_contact;?></td>
                           <td>Vehicle Type:  </td>
                           <td colspan="2"><?php echo $this->db->get_where('vehicle_detail',array('id'=>$booking_details->b_vehicle_id))->row()->v_name;?> - <?php  echo $this->db->get_where('vehicle_category_detail',array('id'=>$booking_details->b_vc_id))->row()->category_name;?></td>
                         </tr>
                         <tr>
                          <td>City:  </td>
                           <td colspan="2"><?php echo $passenger->p_city;?></td>
                           
                            <td>Vehicle No.:  </td>
                           <td colspan="2"><?php echo $booking_details->b_vehicle_number;?></td>

                         </tr>
                         <tr style="background:#CCC; color:#000; font-weight:500;">
                           <td  colspan="6">Trip Details </td>
                           
                          
                           
                         
                        </tr>
                         <tr>
                           <td>Package:</td>
                           <td colspan="2"><?php echo $invoice->type;?> - <?php echo $invoice->sub_type;?></td>
						   <td>Total Distance </td>
                           <td colspan="2"><?php echo $invoice->extra_km;?> Km. </td>
                           
                        </tr>
                        
                         <tr>
                          <td>Route:</td>
                           <td colspan="5"><?php echo $invoice->route;?></td>   
                         </tr>
						 <tr>
						  <td>Journey Date And Time:  </td>
                           <td colspan="5"><?php echo date('d/m/Y h:i A',strtotime($rent_card->r_start_date." ".$rent_card->r_start_time));?> TO <?php echo date('d/m/Y h:i A',strtotime($rent_card->r_return_date." ".$rent_card->r_return_time));?></td>
						 </tr>     
                     </tbody>
                  </table>
             
              
            </div>
			<div class="col-xs-12" style="margin-top:-50px;">
			<div class="col-xs-6">
			     <table class="table table-bordered invoicetbl">
                  
                     <tbody>
			<tr style="background:#CCC; color:#000; font-weight:500;">
                           <td colspan="2">Base Fare</td>
						    <td >Amount</td>
							
                        </tr>
						
                        <tr>
                           <td colspan="2">MINIMUM KM    (<?php echo $min_km = $invoice->min_km; echo "  Km"; ?>)</td>
                           <td align="right"><?php  $min_km_rate = $invoice->base_price;  echo number_format($invoice->base_price);	?></td>
                        </tr>
						
						
						
						<tr>						  
                           <?php if($invoice->min_km < $invoice->extra_km) { ?> 
                           <td colspan="2" >EXTRA KM <?php $extra_km = $invoice->extra_km - $min_km;?> (<?php echo $extra_km." x ".$invoice->rate_per_km; ?>)</td>
                           <td  align="right"><?php  $extra_km_rate = $extra_km * $invoice->rate_per_km; echo number_format($extra_km_rate)?></td>
						  
						    <?php } else { ?>
							<td colspan="2" >EXTRA KM </td>
                            <td  align="right"><?php echo "N/A"; $extra_km_rate = 0;?></td>
							<?php } ?>
                        </tr>
						<tr>                         
							  <?php if($invoice->min_hr < $invoice->extra_hr) {?>
                              
 <td colspan="2">EXTRA HOUR (<?php $extra_hr = $invoice->extra_hr - $invoice->min_hr; echo $extra_hr." x ".$invoice->rate_per_hr;?>)</td>
                                   <td align="right" ><?php $extra_hr_rate = $extra_hr * $invoice->rate_per_hr; echo number_format($extra_hr_rate);?></td>
                                   
                               <?php } else { $extra_hr_rate = 0; } ?>                            
                        
                        </tr>
						
						
						 <tr>
                            <td colspan="2">Discount</td>
						   <?php if($invoice->discount!=0){ ?>
                           <td align="right"><?php echo $invoice->discount;?></td>
						   <?php } else { ?>
						     <td align="right"><?php echo "N/A";
							 $invoice->discount=0; ?></td>
							<?php } ?>
                        </tr>
						
					  
	  
						 <?php 
				  $tax_value = explode(',',$invoice->tax_value);
				  $tax_percentage = explode(',',$invoice->tax_percentage);
				  $tax_name = explode(',',$invoice->tax_name); 
		
					 if($invoice->tax_name != "" || $invoice->tax_name != 0 )
					 {
								  
						for($i=0; $i<sizeof($tax_value); $i++) 
						 { ?>	       
						  <tr>
								  
								  <td colspan="2" ><?php echo $tax_name[$i]."  ";  echo round($tax_percentage[$i],2);?> %</strong></td>
								  <td align="right" ><?php echo round($tax_value[$i],2); ?></td>					  
								  
						  
						   </tr>
						
					<?php }  }?>  
			
						 <tr>
						 
                           <td colspan="2" style="background:#CCC; color:#000; font-weight:bold;">TOTAL BASE FARE</td>
                           <td  align="right" style="background:#CCC; color:#000; font-weight:bold;"> <?php  $tax_value = explode(',',$invoice->tax_value);
						   			$i=0;
						   			foreach($tax_value as $tv)
									{
										$i = $i + $tv;
									 									 
									 }
									 
							$fare_amount =  $min_km_rate + $extra_km_rate + $extra_hr_rate - $invoice->discount	+ $i;
							echo number_format($fare_amount);	 
							
							
						  ?></td>
						 
						   
						 
                          
                        </tr>
						
					        </tbody>
                  </table>
             		
                      
			</div>
			
			<div class="col-xs-6">
			    <table class="table table-bordered invoicetbl">
                  
                     <tbody>
			<tr style="background:#CCC; color:#000; font-weight:500;">
                           <td colspan="2">OTHER CHARGE</td>
						    <td >Amount</td>
							
                        </tr>
						
						
						
                         <tr>
						 
							   <td colspan="2">DRIVER ALLOWANCE</td>
							   <td align="right"><?php $driver_allow = $invoice->driver_allowance=0; echo "N/A";?></td>		
													
                        </tr>
						
						
						
						
						 <tr>						  
                           <td colspan="2">PICKUP NIGHT CHARGE</td>
						   						   
								<?php if($night_charge = $invoice->night_charge==0) {?>
								
								<td align="right"><?php echo "N/A";
								$night_charge=0;?></td>
								
								
								<?php } else {?>
								<td align="right"><?php echo $night_charge = $invoice->night_charge;?></td>						
								<?php } ?>
							
                        </tr>
                        <tr>						  
                           <td colspan="2">DROP NIGHT CHARGE</td>
						   						   
								<?php if($drop_night_charge = $invoice->drop_night_charge==0) {?>
								
								<td align="right"><?php echo "N/A";
								$drop_night_charge=0;?></td>
								
								
								<?php } else {?>
								<td align="right"><?php echo $drop_night_charge = $invoice->drop_night_charge;?></td>						
								<?php } ?>
							
                        </tr>
						
						<tr>
						  
						 
								<td colspan="2">TOLL CHARGE</td>                          
							   <?php if($toll_charge = $invoice->toll_charge==0) {?>
								<td align="right"><?php echo "N/A";
										$toll_charge=0;?></td>
								<?php } else {?>
								<td align="right"><?php echo $toll_charge = $invoice->toll_charge;?></td>						
								<?php } ?>
						   
                        </tr>
						
						
						 <tr>
						 
							   <td colspan="2">PARKING CHARGE</td>
								<?php if($parking_charge = $invoice->parking_charge==0) {?>
								<td align="right" ><?php echo "N/A"; $parking_charge=0;?></td>
								<?php } else {?>
								 <td align="right" ><?php echo $parking_charge = $invoice->parking_charge; ?></td>
								<?php } ?>
						   
                        </tr>
						<tr>
				  
						  <?php if($invoice->border_tax !=0)
								  { ?>
								  <td colspan="2">BORDER TAX</td>
								   <td align="right"><?php echo $border_tax = $invoice->border_tax ; ?></td>
						  <?php }
						   else
							{?>
								   <td colspan="2">BORDER TAX</td>
								   <td align="right"><?php echo 'N/A'; $border_tax = $invoice->border_tax = 0 ; ?></td>
						<?php } ?>
								
			  
						 </tr>
						 
						 
						 
						<tr> 
						 <?php if($invoice->border_tax !=0)
								{ ?>       					 
								  <td colspan="2">OTHER CHARGE</td>
								  <td align="right"><?php echo $other_charge = $invoice->other_charge; ?></td>
								<?php }
								 else
								  {?>
								   <td colspan="2">OTHER CHARGE</td>
								   <td align="right"><?php echo 'N/A'; $other_charge = $invoice->other_charge = 0 ; ?></td>
								 <?php }  ?>
					 </tr>
				 
				    
						 <tr>
						 
                           <td colspan="2" style="background:#CCC; color:#000; font-weight:bold;">OTHER CHARGE</td>
                           <td  align="right" style="background:#CCC; color:#000; font-weight:bold;">
                               <?php  $other_charges = $drop_night_charge + $driver_allow + $toll_charge + $night_charge + $parking_charge + $border_tax + $other_charge; echo number_format($other_charges);?></td>
                        </tr>
						
					        </tbody>
                  </table>
             		
                      
			</div>
			
			</div>
              <div class="col-xs-12" style="margin-top:-20px;">
            
             <div class="col-xs-6 inotes" align="left" >
              
                <strongn>NOTES:</strong>
				<p>1.THIS IS NOTES FOR INVOICE</p>
				<p>1.THIS IS NOTES FOR INVOICE</p>
				<p>1.THIS IS NOTES FOR INVOICE</p>
				<p>1.THIS IS NOTES FOR INVOICE</p>
                
               </div>
             <div class="col-xs-6" align="right">
             
                  <table class="table table-bordered invoicetbl" >
                        
                        <tbody >
                           <tr style="background:#CCC; color:#000; font-weight:bold;">
                              <td ><strong>GRAND TOTAL</strong></td>
                              <td width="30%" align="right" class="bold"><?php $grand_total = $fare_amount+$other_charges; echo number_format($grand_total);?></td>           
                          </tr>       
						   <tr>
						<?php   if( ($invoice->advance_pay + round($invoice->paid_amount,2))!=$grand_total) { ?>
                              <td ><strong>TOTAL PAID</strong></td>
                              <td width="30%" align="right" class="bold"><?php  $advanced = $invoice->advance_pay + round($invoice->paid_amount,2); echo number_format($advanced);?></td>         
                          </tr>
						  <?php } ?>      
                 
				 
				 
				 <?php $advanced = $invoice->advance_pay + round($invoice->paid_amount,2);?>  
				        
					<?php if($grand_total-$advanced) { ?>
						  <?php if($invoice->balance != 0) {?>
                         <tr >
                              <td  ><strong> Total Due</strong></td>
                              <td width="30%" align="right" ><strong><?php $grand_total-$advanced; echo number_format($grand_total-$advanced); ?></strong></td>    
                        </tr>
						<?php } else { ?>					 
						 <tr >
                              <td  ><strong> Extra Discount</strong></td>
                              <td width="30%" align="right" ><strong><?php echo $grand_total-$advanced; number_format($grand_total-$advanced); ?></strong></td>    
                        </tr> 
						<?php }
						 
						}  ?>
						
						
						 <tr >
                              <td  ><strong> PAY TYPE</strong></td>
                              <td width="30%" align="right" ><strong><?php  echo $this->db->get_where('payment_type',array('id'=>$invoice->payment_type))->row()->payment_name; ?></strong></td>    
                        </tr> 
                        </tbody>
                        </table>
              
               </div>
               </div>
               </div>
            </div>
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
                <p class="copyright"> 2017 &copy; RASHMI CABS
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