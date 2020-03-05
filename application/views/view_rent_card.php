<script type="text/javascript">
  function printDiv(invoice) {
	  var printContents = document.getElementById(invoice).innerHTML;
	  var originalContents = document.body.innerHTML;

	  document.body.innerHTML = printContents;

	  window.print();


	  document.body.innerHTML = originalContents;
  }
</script>
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
                                        <span class="caption-subject bold uppercase"> Duty Slip</span>
                                    </div>
                                    
                                    
                                </div>
                               <div class="portlet-body">
                  
                   <div class="row" id="btninv">
            <div class="col-md-12">
            <table class="table-responsive" >
            <tr>
           
          
          <td style="padding-left:5px;"> <a href="<?php echo site_url('index.php/CreateDutySlip'); ?>" class="btn blue"><!--<i class="fa fa-arrow-left"></i> --> New Duty Slip </a></td>
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
                  <!--Array ( [f_name] => 54546454 [booking_id] => [email] => [driver_name] => [mobile] => [driver_contact] => [city] => [cab_category_type] => [referred_by] => [car_model] => [package] => [driver_allowance] => [travel_route] => [minimum_km] => [payment_mode] => [minimum_hour] => [package_rate] => [toll_charges] => [advance_paid] => [other_charges] => [journey_date_time] => [start_km] => [return_date_time] => [return_km] => [total_kms] => [extra_kms] => [other_notes] => [booking_notes] => ) -->
                  <!--<page size="A4" >
                 
                   <div class="invoice ">
            <div class="row invoice-logo">
               <div class="col-xs-6 invoice-logo-space margin-top-20"><img src="<?php echo base_url(); ?>assets/global/img/rc_darklogo.png" width="220px" alt="" />   
            	
               </div>
                
               <div class="col-xs-6">
                  <p ><span class="copystates">Email: info@rashmicabs.com<span class="muted">Contact: +91 9726 34 7007</span>
                  <span class="muted">Web: www.rashmicabs.com</span></p>
                 
                 
               </div>
            </div>
            
            <hr />
            <div class="row ">
            <div class="col-xs-12">
             <table class="table table-bordered " >
                     <thead >
                        <tr  >
						

                           <th style="text-align:center; background:#333; color:#fff;"   colspan="6">Duty Slip</th>
                          
                          
                        </tr>
                     </thead>
                     <tbody>
                        <tr style="background:#CCC; color:#0000; font-weight:900;">
                           <td  colspan="3">Customer Details </td>
                           
                           <td colspan="3">Car Details </td>
                           
                         
                        </tr>
                         <tr >
                           <td>Full Name:</td>
                           <td colspan="2"><?php echo $detail['f_name']; ?></td>
                           <td>Booking ID:</td>
                           <td colspan="2"><?php echo $detail['booking_id']; ?></td>
                        </tr>
                        <tr>
                           <td>Email:  </td>
                           <td colspan="2"><?php echo $detail['email']; ?> </td>
                           <td>Driver Name:  </td>
                           <td colspan="2"><?php echo $detail['driver_name']; ?></td>
                         </tr>
                          <tr>
                           <td>Mobile:  </td>
                           <td colspan="2"><?php echo $detail['mobile']; ?></td>
                          <td>Driver Contact:  </td>
                           <td colspan="2"><?php echo $detail['driver_contact']; ?></td>
                         </tr>
                         <tr>
                          <td>City:  </td>
                           <td colspan="2"><?php echo $detail['city']; ?></td>
                           
                            <td>Cab Category Type:  </td>
                           <td colspan="2"><?php echo $detail['cab_category_type']; ?></td>
                         </tr>
						 
						  <tr>
							<td>Reffered By:  </td>
							 <td colspan="2"><?php echo $detail['referred_by']; ?></td>
							 
							 <td>Car No./Modal:  </td>
							 <td colspan="2"><?php echo $detail['car_model']; ?></td>
						   </tr>
						   
                         <tr style="background:#CCC; color:#0000; font-weight:900;">
                           <td  colspan="3">Booking Details </td>
                           
                           <td colspan="3">Payment Details </td>
                           
                         
                        </tr>
                         <tr>
                           <td>Package:</td>
                           <td colspan="2"><?php echo $detail['package']; ?> </td>
                           <td>Driver Allowance: </td>
                           <td colspan="2"><?php echo $detail['driver_allowance']; ?> </td>
                        </tr>
                        
                         <tr>
                          
                           <td>Travel Route:  </td>
                           <td colspan="2"><?php echo $detail['travel_route']; ?></td>
                           <td>Minimum Km: </td>
                           <td colspan="2"><?php echo $detail['minimum_km']; ?></td>
                            
                         </tr>
                          <tr>
                          
                            <td>Payment Mode:  </td>
                           <td colspan="2"><?php echo $detail['payment_mode']; ?></td>
                           
                           <td>Minimum Hour: </td>
                           <td colspan="2"><?php echo $detail['minimum_hour']; ?> </td>
                         </tr>
                         <tr>
							
							<td>Package Rate:</td>
							 <td colspan="2"><?php echo $detail['package_rate']; ?></td> 
							 
							  <td>Toll Charges:  </td>
							 <td colspan="2"><?php echo $detail['toll_charges']; ?></td>
						   </tr>
                         <tr>
							
						   <td >Advance Paid:</td>
						   <td colspan="2"><?php echo $detail['advance_paid']; ?></td>
							 
							  <td>Other Charges:  </td>
							 <td colspan="2"><?php echo $detail['other_charges']; ?></td>
							  
						   </tr>
                        
                         <tr style="background:#CCC; color:#0000; font-weight:900;">
                           <td  colspan="6">Duty Perticulers (Kms./Days) </td>
                           
                          
                           
                         
                        </tr>
                         <tr>
							 <td>Journey Date &amp; Time</td>
							 <td>Start Km.</td>
							 <td>Return Date &amp; Time</td>
							 <td>Return Km. </td>
							 <td>Total Kms. </td>
							 <td>Extra Kms. </td>
							 
						 <tr>
                        <tr>
                           <td><?php echo $detail['journey_date_time']; ?></td>
                           <td><?php echo $detail['start_km']; ?></td>
                           <td><?php echo $detail['return_date_time']; ?></td>
                           <td><?php echo $detail['return_km']; ?></td>
                           <td><?php echo $detail['total_kms']; ?></td>
                            <td><?php echo $detail['extra_kms']; ?></td>
                         
                         </tr> 
                     </tbody>
                  </table>
             
              
            </div>
              <div class="row margin-bottom-20 margin-top-20">
              <div class="col-md-12 margin-top-20">
             <div class="col-xs-6" align="left">
              
                <strong>Customers Signature</strong> <br>After Checking The Opening Kms.
                
               </div>
             <div class="col-xs-6" align="right">
             
                <strong>Customers Signature</strong> <br>After Checking The Closing Kms.
              
               </div>
               </div>
			   
			   <div class="col-md-12 margin-top-20">
             <div class="col-xs-6" align="left">
              
                <strong>Other Notes:</strong><br />
				<?php echo $detail['other_notes']; ?>
				<br /><strong>Booking Notes:</strong><br />
                <?php echo $detail['booking_notes']; ?>
               </div>
             
               </div>
               </div>
            
          
               
               </div>
            </div>
            
        
                  
                  </page> -->
                  
				  
				  <page size="A4" >  
							  <table width="100%" border="0" cellpadding="5" cellspacing="5" >
  <tr>
    <td colspan="2">
	<table width="100%" border="0" style="border:none;" >
	 <tr>
        <td width="50%" colspan="2" style="padding:10px;"  ><img src="<?php echo base_url();?>assets/global/img/rc_print_logo.png" width="260px"></td>
        <td width="50%" colspan="2" align="right"><strong>Duty Slip: #<?php echo $dutyslip->ds_dutyslip_no; ?></strong><br>Email: info@rashmicabs.com<br>Contact: +91 9726 34 7007 <br>Web: www.rashmicabs.com</td>
      </tr>
	</table>
	</td>
  </tr>
  <tr>
    <td colspan="2">
	
	<table width="100%" border="1" >
	 <tr bgcolor="#000000" style="color:#fff; font-size:16px; font-weight:700">
        <td colspan="4" align="center">DUTY SLIP</td>
      </tr>
      <tr bgcolor="#CCCCCC" style="color:#000; font-size:16px; font-weight:700">
        <td  colspan="2">Customer Details  </td>
        <td colspan="2"> Date : <?= date('d-m-Y', strtotime($dutyslip->ds_date)) ?> </td>
      </tr>
      <tr >
        <td  colspan="2" width="50%" style="color:#000; font-size:14px; font-weight:700">Travels Name:</td>
        <td colspan="2" width="50%" style="color:#000; font-size:14px; font-weight:500"><?php echo $dutyslip->ds_travelsname; ?></td>
        
      </tr>
      <tr >
        <td  colspan="2" width="50%" style="color:#000; font-size:14px; font-weight:700">Customer Name:</td>
        <td colspan="2" width="50%" style="color:#000; font-size:14px; font-weight:500"><?php echo $dutyslip->ds_cust_name; ?></td>
        
      </tr>

       <tr bgcolor="#EEEEEE">
        <td colspan="2" width="50%" style="color:#000; font-size:14px; font-weight:700">Reffer Travels:</td>
        <td colspan="2" width="50%" style="color:#000; font-size:14px; font-weight:500"><?php echo $dutyslip->ds_reffer_travels; ?></td>
        
      </tr>
      <tr >
        <td width="25%" style="color:#000; font-size:14px; font-weight:700">Mobile No.:</td>
        <td width="25%" style="color:#000; font-size:14px; font-weight:500"><?= $dutyslip->ds_mobile ?></td>
         <td width="25%" style="color:#000; font-size:14px; font-weight:700">Booked By:</td>
        <td width="25%" style="color:#000; font-size:14px; font-weight:500"><?= $dutyslip->ds_book_by ?></td>
        
      </tr>
       <tr bgcolor="#EEEEEE">
        <td colspan="2" width="50%" style="color:#000; font-size:14px; font-weight:700">Pickup Address:</td>
        <td colspan="2" width="50%" style="color:#000; font-size:14px; font-weight:500"><?= $dutyslip->ds_pikup_point ?></td>
        
      </tr>
       <tr >
        <td width="25%" style="color:#000; font-size:14px; font-weight:700">Pickup Time.:</td>
        <td width="25%" style="color:#000; font-size:14px; font-weight:500"><?= date("h:i A", strtotime($dutyslip->ds_journey_datetime)) ?></td>
         <td width="25%" style="color:#000; font-size:14px; font-weight:700">Drop Time:</td>
        <td width="25%" style="color:#000; font-size:14px; font-weight:500"><?= date("h:i A", strtotime($dutyslip->ds_return_datetime)) ?></td>
        
      </tr>
       <tr bgcolor="#EEEEEE">
        <td colspan="2" width="50%" style="color:#000; font-size:14px; font-weight:700">Car:</td>
        <td colspan="2" width="50%" style="color:#000; font-size:14px; font-weight:500"><?= $dutyslip->ds_carno ?></td>
        
      </tr>
       <tr >
        <td width="25%" style="color:#000; font-size:14px; font-weight:700">Driver Name: </td>
        <td width="25%" style="color:#000; font-size:14px; font-weight:500"><?= $dutyslip->ds_drivername ?></td>
         <td width="25%" style="color:#000; font-size:14px; font-weight:700">Mobile Number: </td>
        <td width="25%" style="color:#000; font-size:14px; font-weight:500"><?= $dutyslip->ds_drivercontact ?></td>
        
      </tr>
      <tr bgcolor="#EEEEEE">
        <td colspan="2" width="50%" style="color:#000; font-size:14px; font-weight:700">Route:</td>
        <td colspan="2" width="50%" style="color:#000; font-size:14px; font-weight:500"><?= $dutyslip->ds_travelroute ?></td>
        
      </tr>
     
	</table>
	
	</td>
  </tr>
 
   <td>
	<table width="100%" border="1" >
	 
	  <tr align="left">
      
    <td  style="color:#000; font-size:14px; font-weight:700" >Start Kms.</td>
		<td  style="color:#000; font-size:14px; font-weight:700" >End Kms.</td>
		<td  style="color:#000; font-size:14px; font-weight:700" >Total Kms.</td>
		
       
      </tr>
	  <tr >
      
        
	
		<td   style="color:#000; font-size:14px; font-weight:700" ><?= $dutyslip->ds_start_km ?></td>
		<td   style="color:#000; font-size:14px; font-weight:700" ><?= $dutyslip->ds_return_km ?></td>
		<td  style="color:#000; font-size:14px; font-weight:700" ><?= $dutyslip->ds_total_km ?></td>
       
      </tr>
   
	  
	</table>
  <br>
  <table width="100%" border="1" >
   
     <tr bgcolor="#EEEEEE">
        <td width="25%" style="color:#000; font-size:14px; font-weight:700">Rate IN:</td>
        <td width="25%" style="color:#000; font-size:14px; font-weight:500"><?= $dutyslip->ds_rate_in ?></td>
         <td width="25%" style="color:#000; font-size:14px; font-weight:700">Rate OUT:</td>
        <td width="25%" style="color:#000; font-size:14px; font-weight:500"><?= $dutyslip->ds_rate_out ?></td>
        
      </tr>
       <tr >
        <td width="25%" style="color:#000; font-size:14px; font-weight:700">Profit:</td>
        <td width="25%" style="color:#000; font-size:14px; font-weight:500"><?= $dutyslip->ds_profit ?></td>
        <td width="25%" style="color:#000; font-size:14px; font-weight:700">Bill Status:</td>
        <td width="25%" style="color:#000; font-size:14px; font-weight:500"><?= $dutyslip->ds_bill_status ?></td>
        
      </tr>
      <tr bgcolor="#EEEEEE">
        <td colspan="2" width="50%" style="color:#000; font-size:14px; font-weight:700">Party Pay:</td>
        <td colspan="2" width="50%" style="color:#000; font-size:14px; font-weight:500"><?= $dutyslip->ds_party_pay ?></td>
        
      </tr>
      <tr >
        <td colspan="2" width="50%" style="color:#000; font-size:14px; font-weight:700">Travels Pay:</td>
        <td colspan="2" width="50%" style="color:#000; font-size:14px; font-weight:500"><?= $dutyslip->ds_travel_pay ?></td>
        
      </tr>
      <tr bgcolor="#EEEEEE">
        <td colspan="2" width="50%" style="color:#000; font-size:14px; font-weight:700">Ref. Travels Pay:</td>
        <td colspan="2" width="50%" style="color:#000; font-size:14px; font-weight:500"><?= $dutyslip->ds_ref_travels_pay ?></td>
        
      </tr>
       <tr >
        <td colspan="2" width="50%" style="color:#000; font-size:14px; font-weight:700">Notes:</td>
        <td colspan="2" width="50%" style="color:#000; font-size:14px; font-weight:500"><?= $dutyslip->ds_other_notes ?></td>
        
      </tr>
    
  </table>

	</td>
  </tr>
   <tr>
   <td>
	

	</td>
  </tr>
</table>
	
	</td>
  </tr>
  <tr>
  <td><br></td>
  </tr>
  <tr>
   <td>
	

	</td>
  </tr>
   <tr>
   <td>
	

	</td>
  </tr>
</table>
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
        <script src="<?php echo base_url(); ?>assets/global/plugins/jquery.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/global/plugins/js.cookie.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
        <!-- END CORE PLUGINS -->
         <!-- BEGIN PAGE LEVEL PLUGINS -->
        <script src="<?php echo base_url(); ?>assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js" type="text/javascript"></script>
		<script src="<?php echo base_url(); ?>assets/global/plugins/select2/js/select2.full.min.js" type="text/javascript"></script>
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN THEME GLOBAL SCRIPTS -->
        <script src="<?php echo base_url(); ?>assets/global/scripts/app.min.js" type="text/javascript"></script>
        <!-- END THEME GLOBAL SCRIPTS -->
        <!-- BEGIN PAGE LEVEL SCRIPTS -->
		 <script src="<?php echo base_url(); ?>assets/pages/scripts/components-select2.min.js" type="text/javascript"></script>
        <!-- END PAGE LEVEL SCRIPTS -->
        <!-- BEGIN THEME LAYOUT SCRIPTS -->
        <script src="<?php echo base_url(); ?>assets/layouts/layout5/scripts/layout.min.js" type="text/javascript"></script>
       
        <!-- END THEME LAYOUT SCRIPTS -->
    </body>

</html>