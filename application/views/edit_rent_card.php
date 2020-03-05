<script type="text/javascript">
  function printDiv(invoice) {
    var printContents = document.getElementById(invoice).innerHTML;
    var originalContents = document.body.innerHTML;

    document.body.innerHTML = printContents;

    window.print();


    document.body.innerHTML = originalContents;
  }
</script>
  <?php $this->load->view('header');?>
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
                  
                   <!--<div class="row" id="btninv">
            <div class="col-md-12">
            <table class="table-responsive" >
            <tr>
           
          
          <td style="padding-left:5px;" <a href="#" class="btn blue"> Email <i class="fa fa-envelope"></i></a></td>
              <td style="padding-left:5px;"> <a  onclick="printDiv('printableArea')" value="print a div!" class="btn green"> Print <i class="fa fa-print"></i></a></td>
              
               
            
            </tr>
            
            </table>
            
            
           
            
            </div>
         </div> -->
         <!-- END PAGE HEADER-->
                    
                  </div>
                  
                  <div id="printableArea">
    



                  <div class="portlet-body">
                   <!-- invoice/estimate design--->
                  
                  <page size="A4" >
                 
                   <div class="invoice ">
            <!--<div class="row invoice-logo">
               <div class="col-xs-6 invoice-logo-space margin-top-20"><img src="<?php echo base_url(); ?>assets/global/img/rc_darklogo.png" width="220px" alt="" />   
              
               </div>
                
               <div class="col-xs-6">
                  <p ><span class="copystates">Email: info@rashmicabs.com<span class="muted">Contact: +91 9726 34 7007</span>
                  <span class="muted">Web: www.rashmicabs.com</span></p>
                 
                 
               </div>
            </div> -->
            
            <hr />
      <form action="<?php echo base_url();?>index.php/CreateDutySlip/update_dutyslip" method="post" class="horizontal-form" >
      	<?php echo form_hidden('dsid', $dutyslip->ds_id); ?> 
 
            <div class="row ">
            <div class="col-xs-12">
      
             <table class="table table-bordered " >
          <thead >
                        <tr  >

                           <th style="text-align:right; "   colspan="6"><strong >Duty Slip: #<input type="text" id="ds_dutyslip_no" name="ds_dutyslip_no" size="20" value="<?= $dutyslip->ds_dutyslip_no ?>" align="right" ></strong></th>
                          
                          
                        </tr>
                     </thead>
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
                           <td width="20%">Date:</td>
                          <td width="30%" colspan="4"> <input class="form-control form-control-inline  date-picker" type="text" data-date-format="dd-mm-yyyy" value="<?= date('d-m-Y', strtotime($dutyslip->ds_date)) ?> " name="ds_date" >  </td>
                           
                        </tr>
                         <tr >
                           <td width="20%">Travels Name:</td>
                           <td width="30%" colspan="2"><input type="text" id="traveller_name" name="ds_travelsname" value="<?= $dutyslip->ds_travelsname ?>" class="form-control" > </td>
                           <td width="20%">Customer Name:</td>
                           <td width="30%" colspan="2"><input type="text" id="Customer_name" value="<?= $dutyslip->ds_cust_name ?>" name="ds_cust_name" class="form-control" > </td>
               
                        </tr>
                        
                       <!-- <tr>
                            <td>Email:  </td>
                            <td colspan="2"><input type="text" id="email" name="email" class="form-control" > </td>
                            <td>Driver Name:  </td>
                            <td colspan="2"><input type="text" id="driver_name" name="driver_name" class="form-control" > </td>
                         </tr>
                          <tr>
                           <td>Mobile:  </td>
                           <td colspan="2"><input type="text" id="mobile" name="mobile" class="form-control" > </td>
                          <td>Driver Contact:  </td>
                           <td colspan="2"><input type="text" id="driver_contact" name="driver_contact" class="form-control" > </td>
                         </tr>
                         <tr>
                          <td>City:  </td>
                           <td colspan="2"><input type="text" id="city" name="city" class="form-control" > </td>
                           
                            <td>Cab Category Type:  </td>
                           <td colspan="2"><input type="text" id="cab_category_type" name="cab_category_type" class="form-control" > </td>
                         </tr>
             
              <tr>
              <td>Reffered By:  </td>
               <td colspan="2"><input type="text" id="referred_by" name="referred_by" class="form-control" ></td>
               
               <td>Car No./Modal:  </td>
               <td colspan="2"><input type="text" id="car_model" name="car_model" class="form-control" ></td>
               </tr> -->
              <tr>
              <td width="20%">Booked By:</td>
              <td width="30%" colspan="2"><input type="text" id="ds_book_by" name="ds_book_by" value="<?= $dutyslip->ds_book_by ?>" class="form-control" > </td>
              <td>Reffered By:  </td>
              <td colspan="2"><input type="text" id="ds_reffer_travels" name="ds_reffer_travels" value="<?= $dutyslip->ds_reffer_travels ?>" class="form-control" ></td>
              
                         </tr>
                          <tr>
                            <td>Mobile:  </td>
                          <td colspan="2"><input type="text" id="mobile" name="ds_mobile" value="<?= $dutyslip->ds_mobile ?>" class="form-control" > </td>              
                          <td>Driver Name: </td>
                          <td colspan="2"><input type="text" id="driver_name" name="ds_drivername" value="<?= $dutyslip->ds_drivername ?>" class="form-control" > </td>
                          
               
                         </tr>
             <tr>
              <td>Driver Contact:  </td>
              <td colspan="2"><input type="text" id="driver_contact" name="ds_drivercontact" value="<?= $dutyslip->ds_drivercontact ?>" class="form-control" > </td> 
              
              <td>Pickup Address:  </td>
              <td colspan="2"><input type="text" id="pickup_address" name="ds_pikup_point" value="<?= $dutyslip->ds_pikup_point ?>" class="form-control" ></td>
              
             </tr>

               <tr>
                <td>Pickup Time:  </td>
              <td colspan="2"><input type="text" id="pickup_address" name="ds_pikup_time" class="form-control" value="<?= $dutyslip->ds_pikup_time ?>" ></td>
            
                <td>Drop Time:  </td>
                <td colspan="2"><input type="text" id="pickup_address" name="ds_drop_time" value="<?= $dutyslip->ds_drop_time ?>" class="form-control" ></td>
                
               </tr>
               <tr>
                <td>Travel Route:  </td>
                <td colspan="2"><input type="text" id="travel_route" name="ds_travelroute" class="form-control" value="<?= $dutyslip->ds_travelroute ?>" ></td>
                <td>Car No/Model :  </td>
                <td colspan="2"><input type="text" id="ds_carno" name="ds_carno" value="<?= $dutyslip->ds_carno ?>" class="form-control" ></td>
              </tr>
                
               
                         <tr style="background:#CCC; color:#0000; font-weight:900;">
                           <td  colspan="3">Booking Details </td>

                           <td colspan="3">Payment Details </td>
                           
                         
                        </tr>
                         
                        
                           <tr>
              
               <td >Rate in:</td>
               <td colspan="2"><input type="text" id="ds_rate_in" name="ds_rate_in" value="<?= $dutyslip->ds_rate_in ?>" class="form-control" ></td>
               
               <td>Rate out:</td>
               <td colspan="2"><input type="text" id="ds_rate_out" name="ds_rate_out" value="<?= $dutyslip->ds_rate_out ?>" class="form-control" ></td>
                
               </tr>
               <tr>
              
               <td >Profit:</td>
               <td colspan="2"><input type="text" id="ds_rate_in" name="ds_profit" class="form-control" value="<?= $dutyslip->ds_profit ?>" ></td>
               
               <td>Bill Status:</td>
               <td colspan="2"><input type="text" id="ds_rate_out" name="ds_bill_status" class="form-control" value="<?= $dutyslip->ds_bill_status ?>" ></td>
                
               </tr>
               <tr>
              
                <td >Party Pay:</td>
                <td colspan="2"><input type="text" id="ds_rate_in" name="ds_party_pay" value="<?= $dutyslip->ds_party_pay ?>" class="form-control" ></td>
               
               <td >Travel Pay:</td>
                <td colspan="2"><input type="text" id="ds_travel_pay" name="ds_travel_pay" value="<?= $dutyslip->ds_travel_pay ?>" class="form-control" ></td>
               
                
               </tr>
               <tr>
              
               <td>Ref. Travels Pay:</td>
            <td colspan="2"><input type="text" id="ds_ref_travels_pay" name="ds_ref_travels_pay" value="<?= $dutyslip->ds_ref_travels_pay ?>" class="form-control" ></td>
            <td>Paid Status:</td>
            <td colspan="2"><input type="radio" id="ds_pais_status" name="ds_paid_status" value="1"  <?php if($dutyslip->ds_paid_status == 1): ?> checked="true" <?php endif; ?>> PAID  <input type="radio" id="ds_pais_status" name="ds_paid_status"  value="0" <?php if($dutyslip->ds_paid_status == 0): ?> checked="true" <?php endif; ?> > DUE </td>
            

               </tr>
               
                         <tr style="background:#CCC; color:#0000; font-weight:900;">
                           <td  colspan="6">Duty Perticulers (Kms./Days) </td>
                           
                          
                           
                         
                        </tr>
                         <tr>
              
               <td>Start Km.</td>
              
               <td>Return Km. </td>
               <td>Total Kms. </td>
              
               
             </tr>
                        <tr>
                           
                           <td><input type="text" id="start_km" name="ds_start_km" value="<?= $dutyslip->ds_start_km ?>" class="form-control" > </td>
                          
                           <td><input type="text" id="return_km" name="ds_return_km" value="<?= $dutyslip->ds_return_km ?>" class="form-control" > </td>
                           <td><input type="text" id="total_kms" name="ds_total_km" value="<?= $dutyslip->ds_total_km ?>" class="form-control" ></td>
                         
                         
                         </tr> 
                     </tbody>
                  </table>
             
              
            </div>
              <div class="row margin-bottom-20 margin-top-20">
              
         
         <div class="col-md-12 margin-top-20">
             <div class="col-xs-12" align="left">
              
                <strong>Other Notes:</strong><br />
        <textarea  id="other_notes" name="ds_other_notes" class="form-control" ><?= $dutyslip->ds_other_notes ?></textarea>
        
               </div>
             
               </div>
         <div class="col-md-12 margin-top-20">
         <div class="col-xs-6" align="right">
         <button type="submit" class="btn yellow">Submit</button>
        
         <button type="reset" class="btn blue">Clear</button>
        </div>
        </div>
               </div>
            
          
               
               </div>
      </form >
            </div>
            
        
                  
                  </page>
                  <!--
                            
                            </        
                    -->        
                                    
                                
                            
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