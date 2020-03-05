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
                                        <span class="caption-subject bold uppercase">INVOICE</span>
										
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
                 
                  <form action="<?php echo base_url();?>index.php/CreateInvoice" method="post" class="horizontal-form" >
					<!--rc_print_logo -->
						
						<table width="100%" border="0" cellpadding="5" cellspacing="5" >
  							<tr>
    							<td colspan="2">
									<table width="100%" border="0" style="border:none;" >
	 									<tr>
        									<td width="50%" colspan="2" style="padding:10px;"  ></td>
        									<td width="50%" colspan="2" align="right"><strong>INVOICE: #<input type="text" id="invoice_id" name="invoice_id" size="10" ></strong></td>
      									</tr>
									</table>
								</td>
  							</tr>
  							<tr>
    							<td colspan="2">
									<table width="100%" border="1" >
	 									<tr bgcolor="#000000" style="color:#fff; font-size:16px; font-weight:700">
        									<td colspan="4" align="center">INVOICE</td>
      									</tr>
      									<tr bgcolor="#CCCCCC" style="color:#000; font-size:16px; font-weight:700">
        									<td colspan="2" width="50%">Invoice To </td>
        									<td colspan="2" width="50%">Booking Details </td>

      									</tr>
      									<tr >
											<td width="25%" style="color:#000; font-size:14px; font-weight:700">Full Name:</td>
											<td width="25%" style="color:#000; font-size:14px; font-weight:500"><input type="text" id="f_name" name="f_name" class="form-control" ></td>
											<td width="25%" style="color:#000; font-size:14px; font-weight:700">Traveller Name:</td>
											<td width="25%" style="color:#000; font-size:14px; font-weight:500"><input type="text" id="traveller_name" name="traveller_name" class="form-control" ></td>
      									</tr>
      									<tr bgcolor="#EEEEEE">
											<td width="25%" style="color:#000; font-size:14px; font-weight:700">GST No.: </td>
											<td width="25%" style="color:#000; font-size:14px; font-weight:500"><input type="text" id="gst_no" name="gst_no" class="form-control" ></td>
											<td width="25%" style="color:#000; font-size:14px; font-weight:700">Invoice Date:</td>
											<td width="25%" style="color:#000; font-size:14px; font-weight:500"><input type="text" id="invoice_date" name="invoice_date" class="form-control" ></td>
      									</tr>
	   									<tr>
											<td width="25%" style="color:#000; font-size:14px; font-weight:700">Mobile: </td>
											<td width="25%" style="color:#000; font-size:14px; font-weight:500"><input type="text" id="mobile" name="mobile" class="form-control" ></td>
											<td width="25%" style="color:#000; font-size:14px; font-weight:700">Vehicle Type: </td>
											<td width="25%" style="color:#000; font-size:14px; font-weight:500"><input type="text" id="vehicle_type" name="vehicle_type" class="form-control" ></td>
      									</tr>
	  									<tr bgcolor="#EEEEEE">
											<td width="25%" style="color:#000; font-size:14px; font-weight:700">City: </td>
											<td width="25%" style="color:#000; font-size:14px; font-weight:500"><input type="text" id="city" name="city" class="form-control" ></td>
											<td width="25%" style="color:#000; font-size:14px; font-weight:700">Vehicle No.: </td>
											<td width="25%" style="color:#000; font-size:14px; font-weight:500"><input type="text" id="vehicle_no" name="vehicle_no" class="form-control" ></td>
      									</tr>
	  
	    								<tr >
											<td width="25%" style="color:#000; font-size:14px; font-weight:700">Journey Date And Time:</td>
											<td width="25%" style="color:#000; font-size:14px; font-weight:500"><input type="text" id="journey_date_time" name="journey_date_time" class="form-control" ></td>
											<td width="25%" style="color:#000; font-size:14px; font-weight:700">Package: </td>
											<td width="25%" style="color:#000; font-size:14px; font-weight:500"><input type="text" id="package" name="package" class="form-control" ></td>
      									</tr>
	   									<tr bgcolor="#EEEEEE">
											<td width="25%" style="color:#000; font-size:14px; font-weight:700">Route:</td>
											<td width="25%" style="color:#000; font-size:14px; font-weight:500"><input type="text" id="route" name="route" class="form-control" ></td>
											<td width="25%" style="color:#000; font-size:14px; font-weight:700">Total Distance: </td>
											<td width="25%" style="color:#000; font-size:14px; font-weight:500"><input type="text" id="total_distance" name="total_distance" class="form-control" ></td>
      									</tr>
									</table>
	
								</td>
  							</tr>
  							<tr>
  								<td><br></td>
  							</tr>
  							<tr>
    							<td style="vertical-align:top;">
									<table width="100%" border="1" >
	 									<tr bgcolor="#CCCCCC" style="color:#000; font-size:16px; font-weight:700">
											<td  width="25%">Base Fare </td>
											<td  width="25%" align="right">Amount</td>
		
      									</tr>
	  									<tr>
											<td width="25%" style="color:#000; font-size:14px; font-weight:700">MINIMUM KM </td>
											<td width="25%" style="color:#000; font-size:14px; font-weight:700" align="right"><input type="text" id="minimum_km" name="minimum_km" class="form-control" ></td>
       
      									</tr>
	  	 								<tr bgcolor="#EEEEEE">
											
											<td width="25%" style="color:#000; font-size:14px; font-weight:700">EXTRA KM </td>
											<td width="25%" style="color:#000; font-size:14px; font-weight:700" align="right"><input type="text" id="extra_km" name="extra_km" class="form-control" ></td>
											
       
      									</tr>
										<tr bgcolor="#EEEEEE">
											
											<td width="25%" style="color:#000; font-size:14px; font-weight:700">EXTRA HR </td>
											<td width="25%" style="color:#000; font-size:14px; font-weight:700" align="right"><input type="text" id="extra_hr" name="extra_hr" class="form-control" ></td>
											
       
      									</tr>
										<tr>
     
											<td width="25%" style="color:#000; font-size:14px; font-weight:700">DRIVER ALLOWANCE: </td>
											
											<td width="25%" style="color:#000; font-size:14px; font-weight:700" align="right"><input type="text" id="driver_allowance" name="driver_allowance" class="form-control" ></td>
											
      									</tr>
	   									<tr bgcolor="#EEEEEE">
  
											<td width="25%" style="color:#000; font-size:14px; font-weight:700">NIGHT CHARGE </td>
											
											<td width="25%" style="color:#000; font-size:14px; font-weight:700" align="right"><input type="text" id="pickup_night_charge" name="pickup_night_charge" class="form-control" ></td>
											
      									</tr>
										<tr>
  
        									<td width="25%" style="color:#000; font-size:14px; font-weight:700">OTHER CHARGE </td>
											<td width="25%" style="color:#000; font-size:14px; font-weight:700" align="right"><input type="text" id="other_charge" name="other_charge" class="form-control" ></td>
								 			
      									</tr>
	   									
	   									<tr>
											<td width="25%" style="color:#000; font-size:14px; font-weight:700">Discount</td>
											
											<td width="25%" style="color:#000; font-size:14px; font-weight:700" align="right"><input type="text" id="discount" name="discount" class="form-control" ></td>
											
    
      									</tr>
										
										      
						  				<tr>
								  
								  			<td width="25%" style="color:#000; font-size:14px; font-weight:700">CGST - 2.5%</td>
								  			<td width="25%" style="color:#000; font-size:14px; font-weight:700" align="right"><input type="text" id="tax_value" name="cgst" class="form-control" placeholder='Tax value' ></td>					  
								  
						  
						   				</tr>
										<tr>
								  
								  			<td width="25%" style="color:#000; font-size:14px; font-weight:700">SGST - 2.5%</td>
								  			<td width="25%" style="color:#000; font-size:14px; font-weight:700" align="right"><input type="text" id="tax_value" name="sgst" class="form-control" placeholder='Tax value' ></td>					  
								  
						  
						   				</tr>																				<tr>								  								  			<td width="25%" style="color:#000; font-size:14px; font-weight:700">IGST - 5%</td>								  			<td width="25%" style="color:#000; font-size:14px; font-weight:700" align="right"><input type="text" id="tax_value" name="igst" class="form-control" placeholder='Tax value' ></td>					  								  						  						   				</tr>
						
										
	  
	      								<tr bgcolor="#CCCCCC" >
											<td width="25%" style="color:#000; font-size:14px; font-weight:700">TOTAL BASE FARE</td>
											<td width="25%" style="color:#000; font-size:14px; font-weight:700" align="right"><input type="text" id="total_base_fare" name="total_base_fare" class="form-control" ></td>
  
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
											<td width="25%" style="color:#000; font-size:14px; font-weight:700" align="right"><input type="text" id="toll_charge" name="toll_charge" class="form-control" ></td>						
											
      									</tr>
	   									<tr>
     
											<td width="25%" style="color:#000; font-size:14px; font-weight:700">PARKING CHARGE </td>
											<td width="25%" style="color:#000; font-size:14px; font-weight:700" align="right"><input type="text" id="parking_charge" name="parking_charge" class="form-control" ></td>
											
      									</tr>
	   									<tr bgcolor="#EEEEEE">
        
											<td width="25%" style="color:#000; font-size:14px; font-weight:700">BORDER TAX </td>
											<td width="25%" style="color:#000; font-size:14px; font-weight:700" align="right"><input type="text" id="border_tax" name="border_tax" class="form-control" ></td>	
											
      									</tr>
	   									
	      								<tr bgcolor="#CCCCCC" >
       
											<td width="25%" style="color:#000; font-size:14px; font-weight:700">TOTAL OTHER CHARGES </td>
											<td width="25%" style="color:#000; font-size:14px; font-weight:700" align="right"><input type="text" id="total_other_charges" name="total_other_charges" class="form-control" ></td>
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
													<li>This is notes</li>
													<li>This is notes</li>
													<li>This is notes</li>
													<li>This is notes</li>
													<li>This is notes</li>
	
		
												</ul>
											</td>
	 									</tr>
	 								</table>
	
								</td>
		 						<td style="vertical-align:top">
	 								<table width="100%" border="1" >
										<tr>
											<td width="25%" bgcolor="#CCCCCC" style="color:#000; font-size:16px; font-weight:700">GRAND TOTAL </td>
											<td width="25%" bgcolor="#CCCCCC" style="color:#000; font-size:16px; font-weight:700" align="right"><input type="text" id="grand_total" name="grand_total" class="form-control" ></td>
      									</tr>
										
	   									<tr>
											<td width="25%" style="color:#000; font-size:14px; font-weight:700">TOTAL PAID </td>
											<td width="25%" style="color:#000; font-size:14px; font-weight:700" align="right"><input type="text" id="total_paid" name="total_paid" class="form-control" ></td>
										</tr>
										
										
										
	   									<tr>
											<td width="25%" style="color:#000; font-size:14px; font-weight:700">Extra Discount</td>
											<td width="60%" style="color:#000; font-size:14px; font-weight:700" align="right"><input type="text" id="extra_discount" name="extra_discount" class="form-control" ></td>
      									</tr>
										
	   									<tr bgcolor="#EEEEEE">
											<td width="50%" style="color:#000; font-size:14px; font-weight:700">PAY TYPE</td>
											<td width="25%" style="color:#000; font-size:14px; font-weight:700" align="right"><input type="text" id="pay_type" name="pay_type" class="form-control" ></td>
											
											
      									</tr>
	 							</table>
								
							</td>

  						</tr>
							<tr>
  								<td  colspan="2" align="center"><br /><button type="submit" class="btn yellow">Submit</button>
			  
				<button type="reset" class="btn blue">Clear</button></td>
  							</tr>
					</table>
					
					</form>
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