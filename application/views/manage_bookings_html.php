<?php $this->load->view('header'); ?>
            <!-- END HEADER -->
            <div class="container-fluid">
                <div class="page-content">
                    <!-- BEGIN BREADCRUMBS -->
                    <div class="breadcrumbs">
                        <h1>Manage Booking</h1>
                        
                    </div>
                    <!-- END BREADCRUMBS -->
                    <!-- BEGIN PAGE BASE CONTENT -->
                     <!-- BEGIN DASHBOARD STATS 1-->
                    <div class="row">
                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                            <a class="dashboard-stat dashboard-stat-v2 blue" href="#">
                                  <div class="visual">
                                    <i class="fa fa-cab"></i>
                                </div>
                                <div class="details">
                                    <div class="number"> 
                                        <span ></span>ONEWAY</div>
                                    <div class="desc"> New Booking </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                            <a class="dashboard-stat dashboard-stat-v2 red" href="#">
                                  <div class="visual">
                                    <i class="fa fa-cab"></i>
                                </div>
                                <div class="details">
                                    <div class="number"> 
                                        <span ></span>ROUNDTRIP </div>
                                    <div class="desc"> New Booking </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                            <a class="dashboard-stat dashboard-stat-v2 green" href="#">
                                  <div class="visual">
                                    <i class="fa fa-cab"></i>
                                </div>
                                <div class="details">
                                    <div class="number"> 
                                        <span ></span>MULTICITY </div>
                                    <div class="desc"> New Booking </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                            <a class="dashboard-stat dashboard-stat-v2 purple" href="#">
                                <div class="visual">
                                    <i class="fa fa-cab"></i>
                                </div>
                                <div class="details">
                                    <div class="number"> 
                                        <span ></span>LOCAL </div>
                                    <div class="desc"> New Booking </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <!-- END DASHBOARD STATS 1-->
                 <div class="row">
                        <div class="col-md-12">
                            <!-- BEGIN EXAMPLE TABLE PORTLET-->
                            <div class="portlet light bordered">
                            <div class="portlet-title">
                                                <div class="caption">
                                                    <i class="fa fa-globe"></i>Bookings Details </div>
                                                <div class="tools"> </div>
                                            </div>
                                
                                <div class="portlet-body">
                                             
                                                <div class="tabbable-line">
                                                    <ul class="nav nav-tabs ">
                                                        <li class="active">
                                                            <a href="#tab_15_1" data-toggle="tab"> ALL PENDING </a>
                                                        </li>
                                                        <li>
                                                            <a href="#tab_15_2" data-toggle="tab"> PAY ONEWAY </a>
                                                        </li>
                                                        <li>
                                                            <a href="#tab_15_3" data-toggle="tab"> CONFIRM ONEWAY </a>
                                                        </li>
                                                         <li>
                                                            <a href="#tab_15_4" data-toggle="tab"> ROUNDTRIP </a>
                                                        </li>
                                                         <li>
                                                            <a href="#tab_15_5" data-toggle="tab"> MULTICITY </a>
                                                        </li>
                                                         <li>
                                                            <a href="#tab_15_6" data-toggle="tab"> LOCAL </a>
                                                        </li>
                                                    </ul>
                                                    <div class="tab-content">
                                                        <div class="tab-pane active" id="tab_15_1">
                                                            <p> 
                                                            <div class="portlet-body">
                                  
                                   <table class="table table-striped table-bordered table-hover dt-responsive  order-column" id="allpending">
                                   
                                        <thead>
                                            <tr>
                                              
                               <th >
									Booking #
								</th>
                                <th>
									Pickup Date
								</th>
                                  <th>
									Pickup Time
								</th>
                                
								<th>
									Passanger
								</th>
                                <th>
									Mobile#
								</th>
								<th>
									Package
								</th>
								<th>
									 Vehicle Category
								</th>
                             
                                <th>
									Pickup Location
                                </th> 
                                <th>
									Driver/Agent
                                </th> 
                                <th>
									Status
                                </th> 
								<th>
									 Action
								</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <td>
									EZPKG01
								</td>
								<td>
									XYZ ABCD	
                				</td>
				                <td>
										XYZ ABCD	
                                 </td>
								<td>
										XYZ ABCD	
                                </td>
                                <td>
										XYZ ABCD	
								</td>
								<td >
										XYZ ABCD	
								</td>
                                <td >
											XYZ ABCD	
								</td>
                                 <td >
											XYZ ABCD	
								</td>
                                 <td >
											XYZ ABCD	
								</td>
                                 <td >
										 <span class="label label-sm label-primary"> Pending</span>
								</td>
								<td >
									<a class="btn green-seagreen" href="#"><i class="fa fa-eye"></i></a>
									<a class="btn yellow" href="#"><i class="fa fa-ticket"></i></a>
								
                                </td>
                                        </tbody>
                                    </table>
                                </div>
                                                            
                                                             </p>
                                                        </div>
                                                        
                                                        <div class="tab-pane" id="tab_15_2">
                                                            <p> 
                                                            <div class="portlet-body">
                                  
                                   <table class="table table-striped table-bordered table-hover dt-responsive  order-column" id="oneway">
                                   
                                        <thead>
                                            <tr>
                                              
                               <th >
									Booking #
								</th>
                                <th>
									Pickup Date
								</th>
                                  <th>
									Pickup Time
								</th>
                                
								<th>
									Passanger
								</th>
                                <th>
									Mobile#
								</th>
								<th>
									Package
								</th>
								<th>
									 Vehicle Category
								</th>
                             
                                <th>
									Pickup Location
                                </th> 
                                <th>
									Driver/Agent
                                </th> 
                                <th>
									Status
                                </th> 
								<th>
									 Action
								</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <td>
									EZPKG01
								</td>
								<td>
									XYZ ABCD	
                				</td>
				                <td>
										CONFIRM ONEWAY	
                                 </td>
								<td>
										XYZ ABCD	
                                </td>
                                <td>
										XYZ ABCD	
								</td>
								<td >
										XYZ ABCD	
								</td>
                                <td >
											XYZ ABCD	
								</td>
                                 <td >
											XYZ ABCD	
								</td>
                                 <td >
											XYZ ABCD	
								</td>
                                 <td >
										 <span class="label label-sm label-primary"> Pending</span>
								</td>
								<td >
									<a class="btn green-seagreen" href="#"><i class="fa fa-eye"></i></a>
									<a class="btn yellow" href="#"><i class="fa fa-ticket"></i></a>
								
                                </td>
                                        </tbody>
                                    </table>
                                </div>
                                                            
                                                             </p>
                                                        </div>
                                                        
                                                        <div class="tab-pane " id="tab_15_3">
                                                            <p> 
                                                            <div class="portlet-body">
                                  
                                   <table class="table table-striped table-bordered table-hover dt-responsive  order-column" id="payoneway">
                                   
                                        <thead>
                                            <tr>
                                              
                               <th >
									Booking #
								</th>
                                <th>
									Pickup Date
								</th>
                                  <th>
									Pickup Time
								</th>
                                
								<th>
									Passanger
								</th>
                                <th>
									Mobile#
								</th>
								<th>
									Package
								</th>
								<th>
									 Vehicle Category
								</th>
                             
                                <th>
									Pickup Location
                                </th> 
                                <th>
									Driver/Agent
                                </th> 
                                <th>
									Status
                                </th> 
								<th>
									 Action
								</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <td>
									EZPKG01
								</td>
								<td>
									XYZ ABCD	
                				</td>
				                <td>
										PAY ONEWAY	
                                 </td>
								<td>
										XYZ ABCD	
                                </td>
                                <td>
										XYZ ABCD	
								</td>
								<td >
										XYZ ABCD	
								</td>
                                <td >
											XYZ ABCD	
								</td>
                                 <td >
											XYZ ABCD	
								</td>
                                 <td >
											XYZ ABCD	
								</td>
                                 <td >
										 <span class="label label-sm label-primary"> Pending</span>
								</td>
								<td >
									<a class="btn green-seagreen" href="#"><i class="fa fa-eye"></i></a>
									<a class="btn yellow" href="#"><i class="fa fa-ticket"></i></a>
								
                                </td>
                                        </tbody>
                                    </table>
                                </div>
                                                            
                                                             </p>
                                                        </div>
                                                        
                                                        <div class="tab-pane" id="tab_15_4">
                                                            <p> 
                                                            <div class="portlet-body">
                                  
                                   <table class="table table-striped table-bordered table-hover dt-responsive  order-column" id="roundtrip">
                                   
                                        <thead>
                                            <tr>
                                              
                               <th >
									Booking #
								</th>
                                <th>
									Pickup Date
								</th>
                                  <th>
									Pickup Time
								</th>
                                
								<th>
									Passanger
								</th>
                                <th>
									Mobile#
								</th>
								<th>
									Package
								</th>
								<th>
									 Vehicle Category
								</th>
                             
                                <th>
									Pickup Location
                                </th> 
                                <th>
									Driver/Agent
                                </th> 
                                <th>
									Status
                                </th> 
								<th>
									 Action
								</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <td>
									EZPKG01
								</td>
								<td>
									XYZ ABCD	
                				</td>
				                <td>
										ROUNDTRIP	
                                 </td>
								<td>
										XYZ ABCD	
                                </td>
                                <td>
										XYZ ABCD	
								</td>
								<td >
										XYZ ABCD	
								</td>
                                <td >
											XYZ ABCD	
								</td>
                                 <td >
											XYZ ABCD	
								</td>
                                 <td >
											XYZ ABCD	
								</td>
                                 <td >
										 <span class="label label-sm label-primary"> Pending</span>
								</td>
								<td >
									<a class="btn green-seagreen" href="#"><i class="fa fa-eye"></i></a>
									<a class="btn yellow" href="#"><i class="fa fa-ticket"></i></a>
								
                                </td>
                                        </tbody>
                                    </table>
                                </div>
                                                            
                                                             </p>
                                                        </div>
                                                        
                                                        <div class="tab-pane" id="tab_15_5">
                                                            <p> 
                                                            <div class="portlet-body">
                                  
                                   <table class="table table-striped table-bordered table-hover dt-responsive  order-column" id="multicity">
                                   
                                        <thead>
                                            <tr>
                                              
                               <th >
									Booking #
								</th>
                                <th>
									Pickup Date
								</th>
                                  <th>
									Pickup Time
								</th>
                                
								<th>
									Passanger
								</th>
                                <th>
									Mobile#
								</th>
								<th>
									Package
								</th>
								<th>
									 Vehicle Category
								</th>
                             
                                <th>
									Pickup Location
                                </th> 
                                <th>
									Driver/Agent
                                </th> 
                                <th>
									Status
                                </th> 
								<th>
									 Action
								</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <td>
									EZPKG01
								</td>
								<td>
									XYZ ABCD	
                				</td>
				                <td>
										XYZ ABCD	
                                 </td>
								<td>
										XYZ ABCD	
                                </td>
                                <td>
										XYZ ABCD	
								</td>
								<td >
										XYZ ABCD	
								</td>
                                <td >
											XYZ ABCD	
								</td>
                                 <td >
											XYZ ABCD	
								</td>
                                 <td >
											XYZ ABCD	
								</td>
                                 <td >
										 <span class="label label-sm label-primary"> Pending</span>
								</td>
								<td >
									<a class="btn green-seagreen" href="#"><i class="fa fa-eye"></i></a>
									<a class="btn yellow" href="#"><i class="fa fa-ticket"></i></a>
								
                                </td>
                                        </tbody>
                                    </table>
                                </div>
                                                            
                                                             </p>
                                                        </div>
                                                        
                                                        <div class="tab-pane" id="tab_15_6">
                                                            <p> 
                                                            <div class="portlet-body">
                                  
                                   <table class="table table-striped table-bordered table-hover dt-responsive  order-column" id="local">
                                   
                                        <thead>
                                            <tr>
                                              
                               <th >
									Booking #
								</th>
                                <th>
									Pickup Date
								</th>
                                  <th>
									Pickup Time
								</th>
                                
								<th>
									Passanger
								</th>
                                <th>
									Mobile#
								</th>
								<th>
									Package
								</th>
								<th>
									 Vehicle Category
								</th>
                             
                                <th>
									Pickup Location
                                </th> 
                                <th>
									Driver/Agent
                                </th> 
                                <th>
									Status
                                </th> 
								<th>
									 Action
								</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <td>
									EZPKG01
								</td>
								<td>
									XYZ ABCD	
                				</td>
				                <td>
										XYZ ABCD	
                                 </td>
								<td>
										XYZ ABCD	
                                </td>
                                <td>
										XYZ ABCD	
								</td>
								<td >
										XYZ ABCD	
								</td>
                                <td >
											XYZ ABCD	
								</td>
                                 <td >
											XYZ ABCD	
								</td>
                                 <td >
											XYZ ABCD	
								</td>
                                 <td >
										 <span class="label label-sm label-primary"> Pending</span>
								</td>
								<td >
									<a class="btn green-seagreen" href="#"><i class="fa fa-eye"></i></a>
									<a class="btn yellow" href="#"><i class="fa fa-ticket"></i></a>
								
                                </td>
                                        </tbody>
                                    </table>
                                </div>
                                                            
                                                             </p>
                                                        </div>
                                                        
                                                        
                                                    </div>
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
        <script src="<?php echo base_url(); ?>assets/global/plugins/jquery.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/global/plugins/js.cookie.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
        <!-- END CORE PLUGINS -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <script src="<?php echo base_url(); ?>assets/global/plugins/moment.min.js" type="text/javascript"></script>
        
        <script src="<?php echo base_url(); ?>assets/global/plugins/morris/morris.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/global/plugins/morris/raphael-min.js" type="text/javascript"></script>
         <script src="<?php echo base_url(); ?>assets/global/scripts/datatable.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/global/plugins/datatables/datatables.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js" type="text/javascript"></script>
       
        <script src="<?php echo base_url();?>assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js" type="text/javascript"></script>
        
        
        <script src="<?php echo base_url();?>assets/global/plugins/clockface/js/clockface.js" type="text/javascript"></script>
        <script src="<?php echo base_url();?>assets/global/plugins/jquery-validation/js/jquery.validate.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url();?>assets/global/plugins/jquery-validation/js/additional-methods.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url();?>assets/global/plugins/bootstrap-wizard/jquery.bootstrap.wizard.min.js" type="text/javascript"></script>
        
          <script src="<?php echo base_url();?>assets/global/plugins/bootstrap-timepicker/js/bootstrap-timepicker.min.js" type="text/javascript"></script>
		
       
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN THEME GLOBAL SCRIPTS -->
        <script src="<?php echo base_url(); ?>assets/global/scripts/app.min.js" type="text/javascript"></script>
        	<script src="<?php echo base_url();?>assets/global/plugins/select2/js/select2.full.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url();?>assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js" type="text/javascript"></script>
        <!-- END THEME GLOBAL SCRIPTS -->
        <!-- BEGIN PAGE LEVEL SCRIPTS -->
         <script src="<?php echo base_url(); ?>assets/pages/scripts/table-datatables-managed.js" type="text/javascript"></script>
         <script src="<?php echo base_url();?>assets/pages/scripts/components-date-time-pickers.min.js" type="text/javascript"></script>
		 <script src="<?php echo base_url();?>assets/pages/scripts/components-select2.min.js" type="text/javascript"></script>
		 
		  <script src="<?php echo base_url();?>assets/pages/scripts/form-wizard.min.js" type="text/javascript"></script>
        <!-- END PAGE LEVEL SCRIPTS -->
        <!-- BEGIN THEME LAYOUT SCRIPTS -->
        <script src="<?php echo base_url(); ?>assets/layouts/layout5/scripts/layout.min.js" type="text/javascript"></script>
       <script src="<?php echo base_url();?>assets/pages/scripts/ui-general.min.js" type="text/javascript"></script>
      
        <!-- END THEME LAYOUT SCRIPTS -->
    </body>

</html>