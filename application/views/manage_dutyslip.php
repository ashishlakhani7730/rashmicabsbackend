<?php $this->load->view('header');?>
            <!-- END HEADER -->
            <div class="container-fluid">
                <div class="page-content">
                    <!-- BEGIN BREADCRUMBS -->
                    <div class="breadcrumbs">
                        <h1>Manage Duty Slip</h1>
                        
                    </div>
                     <?php $error=$this->session->flashdata('feedback'); ?>
                                      <?php if($feedback= $this->session->flashdata('feedback')):
                                      $feedback_class= $this->session->flashdata('feedback_class') ?>
                                      <div class="row">
                                        <div class="col-lg-6">
                                          <div class="<?php echo $feedback_class ?>">
                                            <?php  echo $feedback ; ?>
                                          </div>
                                        </div>
                                      </div>
                                    <?php endif; ?>
                    <!-- END BREADCRUMBS -->
                    <!-- BEGIN PAGE BASE CONTENT -->
                 <div class="row">
                        <div class="col-md-12">
                            <!-- BEGIN EXAMPLE TABLE PORTLET-->
                            <div class="portlet light bordered">
                                
                                <div class="portlet-body">
                                    <div class="table-toolbar">
                                       <div class="row">
                                            
                                            <div class="col-md-12">
											<a href="<?php echo base_url()?>index.php/CreateDutySlip" class="btn yellow  btn-outline" >Add New
                                                        <i class="fa fa-plus"></i></a>
  
                                            </div>
                                        </div>
                                    </div>
	
                                   <table class="table table-striped table-bordered table-hover  order-column" id="sample_1">
                                        <thead>
                                            <tr>
                                              
                                             <th>ID #</th>
                                             <th>Date</th>
											<th>
												Travels Name
											</th>
                                            <th>
                                                Customer Name
                                            </th>
											<th>
												 Contact No
											</th>
											<th>
												 Pikup Address
											</th>
											<th>
												Car No /Model
											</th>
											<th>
												Paid Status
											</th> 
											<th>
												 Action
											</th>
                                            </tr>
                                        </thead>
                                        <tbody>
										
										  <?php if(count($duty_slip)): ?>

										      <?php foreach($duty_slip as $dslip): ?>
                                            <tr class="odd gradeX">
                                               
                                            <td>
												<?php echo $dslip->ds_dutyslip_no; ?>
											</td>
											<td>
												<?php echo date("d-m-Y", strtotime($dslip->ds_date)); ?>
											</td>
											<td>
												<?php echo $dslip->ds_travelsname ; ?>
											</td>
                                            <td>
                                                <?php echo $dslip->ds_cust_name ; ?>
                                            </td>
											<td>
												<?php echo $dslip->ds_mobile; ?>
											</td>
											
											<td>
												<?php echo $dslip->ds_pikup_point; ?>
											</td>
											<td>
												<?php echo $dslip->ds_carno; ?>
											</td>
											<td>
												<?php if($dslip->ds_paid_status == 0): ?>
                                                    <label class="label label-sm label-danger">DUE</label>
                                                <?php else: ?>
                                                    <label class="label label-sm label-success">PAID</label>
                                                <?php endif; ?>
											</td>
											<td>
												<form method="post">		
							
												<button type="submit" name="dsid" value="<?php echo $dslip->ds_id;?>" formaction="<?php echo base_url().'index.php/CreateDutySlip/view_duty_Slip'?>" class="btn btn-sm blue"><i class="fa fa-print"></i></button>
                                                <button type="submit" name="dsid" value="<?php echo $dslip->ds_id;?>" formaction="<?php echo base_url().'index.php/CreateDutySlip/edit_duty_Slip'?>" class="btn btn-sm blue"><i class="fa fa-eye"></i></button>
												<button type="submit" name="delid" value="<?php echo $dslip->ds_id;?>" formaction="<?php echo base_url().'index.php/CreateDutySlip/delete_duty_Slip'?>" class="btn btn-sm red"><i class="fa fa-trash"></i></button>
											
											</form>				   
										   </td>
											</tr>
                                              <?php endforeach; ?>
                                              <?php else: ?>
                                                <tr>
                                                    <td colspan="8">NO RECORDS FOUNDS.</td>
                                                </tr>
                                     		     <?php endif; ?>					
                                            
                                        </tbody>
                                    </table>
								
								
								
								
                                </div>
                            </div>
                            <!-- END EXAMPLE TABLE PORTLET-->
                        </div>
                    </div>
                    </div>
                    </div>
                    </div>
                        
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
        <script src="<?php echo base_url();?>ssets/global/plugins/moment.min.js" type="text/javascript"></script>
        
        <script src="<?php echo base_url();?>assets/global/plugins/morris/morris.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url();?>assets/global/plugins/morris/raphael-min.js" type="text/javascript"></script>
         <script src="<?php echo base_url();?>assets/global/scripts/datatable.js" type="text/javascript"></script>
        <script src="<?php echo base_url();?>assets/global/plugins/datatables/datatables.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url();?>assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js" type="text/javascript"></script>
       
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN THEME GLOBAL SCRIPTS -->
        <script src="<?php echo base_url();?>assets/global/scripts/app.min.js" type="text/javascript"></script>
        <!-- END THEME GLOBAL SCRIPTS -->
        <!-- BEGIN PAGE LEVEL SCRIPTS -->
         <script src="<?php echo base_url();?>assets/pages/scripts/table-datatables-managed.min.js" type="text/javascript"></script>
        <!-- END PAGE LEVEL SCRIPTS -->
        <!-- BEGIN THEME LAYOUT SCRIPTS -->
        <script src="<?php echo base_url();?>assets/layouts/layout5/scripts/layout.min.js" type="text/javascript"></script>
       
        <!-- END THEME LAYOUT SCRIPTS -->

    </body>

</html>