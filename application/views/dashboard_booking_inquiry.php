<?php $this->load->view('header');?>
            <!-- END HEADER -->
            <div class="container-fluid">
                <div class="page-content">
                    <!-- BEGIN BREADCRUMBS -->
                    <div class="breadcrumbs">
                        <h1>Manage Booking Inquiry</h1>
                        
                    </div>
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
											
                                                
                                            </div>
                                        </div>
                                    </div>
	
                                   <table class="table table-striped table-bordered table-hover  order-column" id="sample_1">
                                        <thead>
                                            <tr>
                                              
                                             <th>ID #</th>
											<th>
												Name
											</th>
											<th>
												 Contact No
											</th>
											<th>
												 From City
											</th>
											<th>
												 To City
											</th>
											<th>
												Vehicle Category
											</th>
											<th>
												 Plan DateTime
											</th> 
											<th>
												 Action
											</th>
                                            </tr>
                                        </thead>
                                        <tbody>
										
										<?php foreach($booking_inquiry as $row) {?>
										
                                            <tr class="odd gradeX">
                                               
                                            <td>
												<?php echo $row->bi_id;?>
											</td>
											<td>
												<?php echo $row->bi_name;?>
											</td>
											<td>
												<?php echo $row->bi_mobile;?>
											</td>
											<td>
												<?php echo $row->bi_from_city;?>
											</td>
											<td>
												<?php echo $row->bi_to_city;?>
											</td>
											<td>
												<?php echo $row->bi_vc_name;?>
											</td>
											<td>
												<?php echo date('d/m/Y',strtotime($row->bi_plan_date))." ".date('h:i A',strtotime($row->bi_plan_time));?>
											</td>
											<td>
												<form method="post">		
							
												<button type="submit" name="id" value="<?php echo $row->id;?>" formaction="<?php echo base_url().'index.php/BookingInquiry_management/edit_booking_enquiry'?>" class="btn btn-sm blue"><i class="fa fa-eye"></i></button>
												<button type="submit" name="id" value="<?php echo $row->id;?>" formaction="<?php echo base_url().'index.php/BookingInquiry_management/delete_booking_enquiry'?>" class="btn btn-sm red"><i class="fa fa-trash"></i></button>
											
											</form>				   
										   </td>
											</tr>
                                              
                                     <?php }?>
									
                                            
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