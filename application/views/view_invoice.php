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
				   
            <div class="col-md-12">
			<table class="table-responsive" >
            <tr>
           
          
          <td style="padding-left:5px;"> <a href="<?php echo site_url('index.php/CreateInvoice'); ?>" class="btn blue"><!--<i class="fa fa-arrow-left"></i> --> New Invoice </a></td>
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
                 
                  
					<!--rc_print_logo -->
						
						<table width="100%" border="0" cellpadding="5" cellspacing="5" >
  							<tr>
    							<td colspan="2">
									<table width="100%" border="0" style="border:none;" >
	 									<tr>
        									<td width="50%" colspan="2" style="padding:10px;"  ><img src="<?php echo base_url(); ?>assets/global/img/rc_print_logo.png" width="260px"></td>
        									<td width="50%" colspan="2" align="right"><strong>INVOICE: #<?php echo $detail['invoice_id']; ?></strong><br>Email: info@rashmicabs.com<br>Contact: +91 9726 34 7007 <br>Web: www.rashmicabs.com</td>
      									</tr>
									</table>
								</td>
  							</tr>
  							<tr>
    							<td colspan="2">
									<table width="100%" border="1" >
	 									<tr bgcolor="#EEEEEE" style="color:#000; font-size:16px; font-weight:700">
        									<td colspan="4" align="center">120, Madhav Hill, Waghawadi Road, Bhavnagar - 364001, Gujarat, India</td>
      									</tr>
      									<tr bgcolor="#CCCCCC" style="color:#000; font-size:16px; font-weight:700">
        									<td colspan="2" width="50%">Invoice To </td>
        									<td colspan="2" width="50%">Booking Details </td>

      									</tr>
      									<tr >
											<td width="25%" style="color:#000; font-size:14px; font-weight:700">Full Name:</td>
											<td width="25%" style="color:#000; font-size:14px; font-weight:500; text-transform: uppercase;"><?php echo $detail['f_name']; ?></td>
											<td width="25%" style="color:#000; font-size:14px; font-weight:700">Traveller Name:</td>
											<td width="25%" style="color:#000; font-size:14px; font-weight:500; text-transform: uppercase;"><?php echo $detail['traveller_name']; ?></td>
      									</tr>
      									<tr bgcolor="#EEEEEE">
											<td width="25%" style="color:#000; font-size:14px; font-weight:700">GST No.: </td>
											<td width="25%" style="color:#000; font-size:14px; font-weight:500"><?php if(!empty($detail['gst_no'])){echo $detail['gst_no'];}else{echo "N/A";	} ?></td>
											<td width="25%" style="color:#000; font-size:14px; font-weight:700">Invoice Date:</td>
											<td width="25%" style="color:#000; font-size:14px; font-weight:500"><?php echo $detail['invoice_date']; ?></td>
      									</tr>
	   									<tr>
											<td width="25%" style="color:#000; font-size:14px; font-weight:700">Mobile: </td>
											<td width="25%" style="color:#000; font-size:14px; font-weight:500"><?php echo $detail['mobile']; ?></td>
											<td width="25%" style="color:#000; font-size:14px; font-weight:700">Vehicle Type: </td>
											<td width="25%" style="color:#000; font-size:14px; font-weight:500"><?php echo $detail['vehicle_type']; ?></td>
      									</tr>
	  									<tr bgcolor="#EEEEEE">
											<td width="25%" style="color:#000; font-size:14px; font-weight:700">City: </td>
											<td width="25%" style="color:#000; font-size:14px; font-weight:500"><?php echo $detail['city']; ?></td>
											<td width="25%" style="color:#000; font-size:14px; font-weight:700">Vehicle No.: </td>
											<td width="25%" style="color:#000; font-size:14px; font-weight:500"><?php echo $detail['vehicle_no']; ?></td>
      									</tr>
	  
	    								<tr >
											<td width="25%" style="color:#000; font-size:14px; font-weight:700">Journey Date And Time:</td>
											<td width="25%" style="color:#000; font-size:14px; font-weight:500"><?php echo $detail['journey_date_time']; ?></td>
											<td width="25%" style="color:#000; font-size:14px; font-weight:700">Package: </td>
											<td width="25%" style="color:#000; font-size:14px; font-weight:500"><?php echo $detail['package']; ?></td>
      									</tr>
	   									<tr bgcolor="#EEEEEE">
											<td width="25%" style="color:#000; font-size:14px; font-weight:700">Route:</td>
											<td width="25%" style="color:#000; font-size:14px; font-weight:500"><?php echo $detail['route']; ?></td>
											<td width="25%" style="color:#000; font-size:14px; font-weight:700">Total Distance: </td>
											<td width="25%" style="color:#000; font-size:14px; font-weight:500"><?php echo $detail['total_distance']; ?></td>
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
											<td width="25%" style="color:#000; font-size:14px; font-weight:700" align="right"><?php echo $detail['minimum_km']; ?></td>
       
      									</tr>
	  	 								<tr bgcolor="#EEEEEE">
											
											<td width="25%" style="color:#000; font-size:14px; font-weight:700">EXTRA KM </td>
											<td width="25%" style="color:#000; font-size:14px; font-weight:700" align="right"><?php echo $detail['extra_km']; ?></td>
											
       
      									</tr>
										<tr >
											
											<td width="25%" style="color:#000; font-size:14px; font-weight:700">EXTRA HR </td>
											<td width="25%" style="color:#000; font-size:14px; font-weight:700" align="right"><?php echo $detail['extra_hr']; ?></td>
											
       
      									</tr>
										<tr bgcolor="#EEEEEE"> 
     
											<td width="25%" style="color:#000; font-size:14px; font-weight:700">DRIVER ALLOWANCE: </td>
											<td width="25%" style="color:#000; font-size:14px; font-weight:700" align="right"><?php echo $detail['driver_allowance']; ?></td>
											
      									</tr>
	   									<tr >
  
											<td width="25%" style="color:#000; font-size:14px; font-weight:700">NIGHT CHARGE </td>
											<td width="25%" style="color:#000; font-size:14px; font-weight:700" align="right"><?php echo $detail['pickup_night_charge']; ?></td>
											
      									</tr>
										<tr bgcolor="#EEEEEE">
  
        									<td width="25%" style="color:#000; font-size:14px; font-weight:700">OTHER CHARGE </td>
											<td width="25%" style="color:#000; font-size:14px; font-weight:700" align="right"><?php echo $detail['other_charge']; ?></td>
								 			
      									</tr>
	   									<tr>
											<td width="25%" style="color:#000; font-size:14px; font-weight:700">Discount</td>
											<td width="25%" style="color:#000; font-size:14px; font-weight:700" align="right"><?php echo $detail['discount']; ?></td>
											
    
      									</tr>
										
										<tr bgcolor="#EEEEEE">
								  
								  			<td width="25%" style="color:#000; font-size:14px; font-weight:700">CGST - 2.5%</td>
								  			<td width="25%" style="color:#000; font-size:14px; font-weight:700" align="right"><?php echo $detail['cgst']; ?></td>					  
								  
						  
						   				</tr>
										<tr>
								  
								  			<td width="25%" style="color:#000; font-size:14px; font-weight:700">SGST - 2.5%</td>
								  			<td width="25%" style="color:#000; font-size:14px; font-weight:700" align="right"><?php echo $detail['sgst']; ?></td>					  
								  
						  
						   				</tr>																				<tr>								  								  			<td width="25%" style="color:#000; font-size:14px; font-weight:700">IGST - 5%</td>								  			<td width="25%" style="color:#000; font-size:14px; font-weight:700" align="right"><?php echo $detail['igst']; ?></td>					  								  						  						   				</tr>
						
										
	  
	      								<tr bgcolor="#CCCCCC" >
											<td width="25%" style="color:#000; font-size:14px; font-weight:700">TOTAL BASE FARE</td>
											<td width="25%" style="color:#000; font-size:14px; font-weight:700" align="right"><?php echo $detail['total_base_fare']; ?></td>
  
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
											<td width="25%" style="color:#000; font-size:14px; font-weight:700" align="right"><?php echo $detail['toll_charge']; ?></td>						
											
      									</tr>
	   									<tr>
     
											<td width="25%" style="color:#000; font-size:14px; font-weight:700">PARKING CHARGE </td>
											<td width="25%" style="color:#000; font-size:14px; font-weight:700" align="right"><?php echo $detail['parking_charge']; ?></td>
											
      									</tr>
	   									<tr bgcolor="#EEEEEE">
        
											<td width="25%" style="color:#000; font-size:14px; font-weight:700">BORDER TAX </td>
											<td width="25%" style="color:#000; font-size:14px; font-weight:700" align="right"><?php echo $detail['border_tax']; ?></td>	
											
      									</tr>
	   									
	      								<tr bgcolor="#CCCCCC" >
       
											<td width="25%" style="color:#000; font-size:14px; font-weight:700">TOTAL OTHER CHARGES </td>
											<td width="25%" style="color:#000; font-size:14px; font-weight:700" align="right"><?php echo $detail['total_other_charges']; ?></td>
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
													<li>GSTIN : 24APTPG3433K1ZP</li>													<li>SAC CODE: 9966</li>
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
											<td width="25%" bgcolor="#CCCCCC" style="color:#000; font-size:16px; font-weight:700">GRAND TOTAL </td>
											<td width="25%" bgcolor="#CCCCCC" style="color:#000; font-size:16px; font-weight:700" align="right"><?php echo $detail['grand_total']; ?></td>
      									</tr>
										<tr>
											<td width="25%" style="color:#000; font-size:14px; font-weight:700">TOTAL PAID </td>
											<td width="25%" style="color:#000; font-size:14px; font-weight:700" align="right"><?php echo $detail['total_paid']; ?></td>
										</tr>
										
										
										
	   									<tr>
											<td width="25%" style="color:#000; font-size:14px; font-weight:700">Extra Discount</td>
											<td width="60%" style="color:#000; font-size:14px; font-weight:700" align="right"><?php echo $detail['extra_discount']; ?></td>
      									</tr>
										
	   									<tr bgcolor="#EEEEEE">
											<td width="50%" style="color:#000; font-size:14px; font-weight:700">PAY TYPE</td>
											<td width="25%" style="color:#000; font-size:14px; font-weight:700" align="right"><?php echo $detail['pay_type']; ?></td>
      									</tr>
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