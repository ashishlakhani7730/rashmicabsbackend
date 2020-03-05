<?php $this->load->view('header'); ?>
            <!-- END HEADER -->
            <div class="container-fluid">
                <div class="page-content">
                    <!-- BEGIN BREADCRUMBS -->
                    <div class="breadcrumbs">
                        <h1>Manage Booking</h1>
                         <?php $msg = $this->session->flashdata('success');
						if($msg['success'] != ''){
									?>
									<div class="col-md-12 note note-success">
										<p style="color:green; "><strong><?php echo $msg['success']; ?></strong></p>
									</div>
								<?php  } ?>
                    </div>
                    <!-- END BREADCRUMBS -->
                    <!-- BEGIN PAGE BASE CONTENT -->
                     <!-- BEGIN DASHBOARD STATS 1-->
                    <div class="row">
                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                            <a class="dashboard-stat dashboard-stat-v2 blue" href="<?php echo base_url();?>index.php/Oneway_booking">
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
                            <a class="dashboard-stat dashboard-stat-v2 red" href="<?php echo base_url();?>index.php/Roundtrip_booking">
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
                            <a class="dashboard-stat dashboard-stat-v2 green" href="<?php echo base_url();?>index.php/Multicity_booking">
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
                            <a class="dashboard-stat dashboard-stat-v2 purple" href="<?php echo base_url();?>index.php/Local_booking">
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
                                                         <li >
                                                            <a href="#tab_15_1_1" data-toggle="tab"> YESTERDAY </a>
                                                        </li>
                                                        
                                                         <li>
                                                            <a href="#tab_15_1_2" data-toggle="tab"> TODAY </a>
                                                        </li>
                                                        
                                                         <li >
                                                            <a href="#tab_15_1_3" data-toggle="tab"> TOMORROW </a>
                                                        </li>
                                                        
                                                        <li class="active">
                                                            <a href="#tab_15_1" data-toggle="tab"> ALL PENDING </a>
                                                        </li>
                                                        <li>
                                                            <a href="#tab_15_2" data-toggle="tab">ONEWAY OFFER</a>
                                                        </li>
                                                        <li>
                                                            <a href="#tab_15_3" data-toggle="tab"> ONEWAY </a>
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
                                                        <div class="tab-pane" id="tab_15_1_1">
                                                            <p> 
                                                            <div class="portlet-body">
                                     <br><br>
                                   <table class="table table-striped table-bordered table-hover dt-responsive  order-column" id="sample_1">
                                   
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
                                            
                                        <?php foreach($yesterday_list as $yt) { ?>
                                        
                                        <tr class="odd gradeX">
                                        <td>
        									<?php echo $yt->b_id;?>
        								</td> 
        								<td>
        									<?php echo date('d/m/Y',strtotime($yt->b_from_date));?>	
                        				</td>
        				                <td>
									    	<?php echo date('h:i A',strtotime($yt->b_from_time));?>
										</td>
										<td>
											<?php echo $yt->b_p_name;?>
										</td>
										<td>
											<?php echo $yt->b_p_contact;?>
										</td>
										<td >
										   <?php if($yt->package_type=='ONEWAY') { echo $yt->package_type; } else { echo $yt->package_type.'<br>'.$yt->package_sub_type; } ?>
										</td>
										<td>																				
											<?php echo $this->db->get_where('vehicle_category_detail',array('id'=>$yt->b_vc_id))->row()->category_name;?>
										</td>
										 <td >								 
											<?php echo $yt->b_pickup_point;?>									
										</td>
										 <td >
										    <center><?php if($yt->b_agent_id=="") { echo "-"; }  ?></center>	
										</td>
										 <td >
											<?php if($yt->b_status == 0){echo "<span class='label label-sm label-danger'>Cancelled</span>";} if($yt->b_status == 1){echo "<span class='label label-sm label-info'> pending </span>";} if($yt->b_status == 2){echo "<span class='label label-sm label-primary'>Owner Assigned </span>";}  if($yt->b_status == 3){echo " <span class='label label-sm label-default'> Driver Assigned </span>";} if($yt->b_status == 4){ if($yt->b_rent_card_id !=0 && $yt->b_rent_card_status == 1){ echo "<span class='label label-sm label-default'> Duty Slip  </span>"; } else { echo "<span class='label label-sm label-warning'> Cab Assigned </span>"; } } if($yt->b_status == 5){ if( $this->db->get_where('invoice',array('id'=>$yt->b_invoice_id))->row()->balance > 0 ){echo "<span class='label label-sm label-info'> Complete Trip</span>";}else{ echo "<span class='label label-sm label-info'> Due  </span>"; }  } if($yt->b_status == 6){ if($this->db->get_where('invoice',array('id'=>$yt->b_invoice_id))->row()->balance > 0 ){echo "<span class='label label-sm label-info'> Due </span>";}else{echo "<span class='label label-sm label-success'> Trip Finished</span>"; } }?>
										</td>
										<td>
										 <?php if($yt->package_sub_type=="ONEWAY OFFER") {?>
										 <?php } ?>
										
										<?php if($yt->package_sub_type=="ONEWAY") {?>
											 <form method="post">
											
												<button formaction="<?php echo base_url();?>index.php/Local_view" type="submit" class="btn green-seagreen"  value="<?php echo $yt->id;?>" name="local_view_id"><i class="fa fa-eye"></i></button>	
												
											
											
											 </form>
										<?php } ?>
										
										<?php if($yt->package_sub_type=="ROUNDTRIP") {?>										
										 <form method="post">
											
												<button formaction="<?php echo base_url();?>index.php/Roundtrip_view" type="submit" class="btn green-seagreen"  value="<?php echo $yt->id;?>" name="roundtrip_view_id"><i class="fa fa-eye"></i></button>
												
												
											
											 </form>
										<?php } ?>
										
										<?php if($yt->package_sub_type=="MULTICITY") {?>
										<form method="post">
											
												<button formaction="<?php echo base_url();?>index.php/Multicity_view" type="submit" class="btn green-seagreen"  value="<?php echo $yt->id;?>" name="multicity_view_id"><i class="fa fa-eye"></i></button>
												
												
											
											 </form>
										<?php } ?>
										
										<?php if($yt->package_type=="LOCAL") {?>
										<form method="post">
											
												<button formaction="<?php echo base_url();?>index.php/Local_view" type="submit" class="btn green-seagreen"  value="<?php echo $yt->id;?>" name="local_view_id"><i class="fa fa-eye"></i></button>
											
												
											
											 </form>
										<?php } ?>
										
										</td>
										<td>
										<form method="post">
											
												<button onclick="return confirm('Are you sure want to delete?')" formaction="<?php echo base_url();?>index.php/Booking_management/delete_booking" type="submit" class="btn red"  value="<?php echo $yt->id;?>" name="delete_id"><i class="fa fa-trash"></i></button>
											
												
											
											 </form>
										</td>
										
										</tr>
                                      
										<?php } ?>
										  </tbody>
                                    </table>
                                </div>
                                                            
                                                             </p>
                                                        </div>
                                                        
                                                        
                                                        
                                                        <div class="tab-pane " id="tab_15_1_2">
                                                            <p> 
                                                            <div class="portlet-body">
                                  <br><br>
                                   <table class="table table-striped table-bordered table-hover dt-responsive" id="sample_A">
                                   
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
                                            
                                        <?php foreach($today_list as $tl) { ?>
                                        
                                        <tr class="odd gradeX">
                                        <td>
        									<?php echo $tl->b_id;?>
        								</td> 
        								<td>
        									<?php echo date('d/m/Y',strtotime($tl->b_from_date));?>	
                        				</td>
        				                <td>
									    	<?php echo date('h:i A',strtotime($tl->b_from_time));?>
										</td>
										<td>
											<?php echo $tl->b_p_name;?>
										</td>
										<td>
											<?php echo $tl->b_p_contact;?>
										</td>
										<td >
										   <?php if($tl->package_type=='ONEWAY') { echo $tl->package_type; } else { echo $tl->package_type.'<br>'.$tl->package_sub_type; } ?>
										</td>
										<td>																				
											<?php echo $this->db->get_where('vehicle_category_detail',array('id'=>$tl->b_vc_id))->row()->category_name;?>
										</td>
										 <td >								 
											<?php echo $tl->b_pickup_point;?>									
										</td>
										 <td >
										    <center><?php if($tl->b_agent_id=="") { echo "-"; }  ?></center>	
										</td>
										 <td >
											<?php if($tl->b_status == 0){echo "<span class='label label-sm label-danger'>Cancelled</span>";} if($tl->b_status == 1){echo "<span class='label label-sm label-info'> pending </span>";} if($tl->b_status == 2){echo "<span class='label label-sm label-primary'>Owner Assigned </span>";}  if($tl->b_status == 3){echo " <span class='label label-sm label-default'> Driver Assigned </span>";} if($tl->b_status == 4){ if($tl->b_rent_card_id !=0 && $tl->b_rent_card_status == 1){ echo "<span class='label label-sm label-default'> Duty Slip  </span>"; } else { echo "<span class='label label-sm label-warning'> Cab Assigned </span>"; } } if($tl->b_status == 5){ if( $this->db->get_where('invoice',array('id'=>$tl->b_invoice_id))->row()->balance > 0 ){echo "<span class='label label-sm label-info'> Complete Trip</span>";}else{ echo "<span class='label label-sm label-info'> Due  </span>"; }  } if($tl->b_status == 6){ if($this->db->get_where('invoice',array('id'=>$tl->b_invoice_id))->row()->balance > 0 ){echo "<span class='label label-sm label-info'> Due </span>";}else{echo "<span class='label label-sm label-success'> Trip Finished</span>"; } }?>
											
										</td>
										<td>
										 <?php if($tl->package_sub_type=="ONEWAY OFFER") {?>
										 <?php } ?>
										
										<?php if($tl->package_sub_type=="ONEWAY") {?>
											 <form method="post">
											
												<button formaction="<?php echo base_url();?>index.php/Local_view" type="submit" class="btn green-seagreen"  value="<?php echo $tl->id;?>" name="local_view_id"><i class="fa fa-eye"></i></button>	
												
											
											
											 </form>
										<?php } ?>
										
										<?php if($tl->package_sub_type=="ROUNDTRIP") {?>										
										 <form method="post">
											
												<button formaction="<?php echo base_url();?>index.php/Roundtrip_view" type="submit" class="btn green-seagreen"  value="<?php echo $tl->id;?>" name="roundtrip_view_id"><i class="fa fa-eye"></i></button>
												
												
											
											 </form>
										<?php } ?>
										
										<?php if($tl->package_sub_type=="MULTICITY") {?>
										<form method="post">
											
												<button formaction="<?php echo base_url();?>index.php/Multicity_view" type="submit" class="btn green-seagreen"  value="<?php echo $tl->id;?>" name="multicity_view_id"><i class="fa fa-eye"></i></button>
												
												
											
											 </form>
										<?php } ?>
										
										<?php if($tl->package_type=="LOCAL") {?>
										<form method="post">
											
												<button formaction="<?php echo base_url();?>index.php/Local_view" type="submit" class="btn green-seagreen"  value="<?php echo $tl->id;?>" name="local_view_id"><i class="fa fa-eye"></i></button>
											
												
											
											 </form>
										<?php } ?>
										
										</td>
										<td>
										<form method="post">
											
												<button onclick="return confirm('Are you sure want to delete?')" formaction="<?php echo base_url();?>index.php/Booking_management/delete_booking" type="submit" class="btn red"  value="<?php echo $tl->id;?>" name="delete_id"><i class="fa fa-trash"></i></button>
											
												
											
											 </form>
										</td>
										</tr>
                                      
										<?php } ?>
										  </tbody>
                                    </table>
                                </div>
                                                            
                                                             </p>
                                                        </div>
                                                        
                                                        
                                                        
                                                        
                                                        <div class="tab-pane" id="tab_15_1_3">
                                                            <p> 
                                                            <div class="portlet-body">
                                  
                                   <br><br>
                                   <table class="table table-striped table-bordered table-hover dt-responsive" id="sample_B">
                                   
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
                                            
                                        <?php foreach($tomorrow_list as $pb) { ?>
                                        
                                        <tr class="odd gradeX">
                                        <td>
        									<?php echo $pb->b_id;?>
        								</td> 
        								<td>
        									<?php echo date('d/m/Y',strtotime($pb->b_from_date));?>	
                        				</td>
        				                <td>
									    	<?php echo date('h:i A',strtotime($pb->b_from_time));?>
										</td>
										<td>
											<?php echo $pb->b_p_name;?>
										</td>
										<td>
											<?php echo $pb->b_p_contact;?>
										</td>
										<td >
										   <?php if($pb->package_type=='ONEWAY') { echo $pb->package_type; } else { echo $pb->package_type.'<br>'.$pb->package_sub_type; } ?>
										</td>
										<td>																				
											<?php echo $this->db->get_where('vehicle_category_detail',array('id'=>$pb->b_vc_id))->row()->category_name;?>
										</td>
										 <td >								 
											<?php echo $pb->b_pickup_point;?>									
										</td>
										 <td >
										    <center><?php if($pb->b_agent_id=="") { echo "-"; }  ?></center>	
										</td>
										 <td >
											<?php if($pb->b_status == 0){echo "<span class='label label-sm label-danger'>Cancelled</span>";} if($pb->b_status == 1){echo "<span class='label label-sm label-info'> pending </span>";} if($pb->b_status == 2){echo "<span class='label label-sm label-primary'>Owner Assigned </span>";}  if($pb->b_status == 3){echo " <span class='label label-sm label-default'> Driver Assigned </span>";} if($pb->b_status == 4){ if($pb->b_rent_card_id !=0 && $pb->b_rent_card_status == 1){ echo "<span class='label label-sm label-default'> Duty Slip  </span>"; } else { echo "<span class='label label-sm label-warning'> Cab Assigned </span>"; } } if($pb->b_status == 5){ if( $this->db->get_where('invoice',array('id'=>$pb->b_invoice_id))->row()->balance > 0 ){echo "<span class='label label-sm label-info'> Complete Trip</span>";}else{ echo "<span class='label label-sm label-info'> Due  </span>"; }  } if($pb->b_status == 6){ if($this->db->get_where('invoice',array('id'=>$pb->b_invoice_id))->row()->balance > 0 ){echo "<span class='label label-sm label-info'> Due </span>";}else{echo "<span class='label label-sm label-success'> Trip Finished</span>"; } }?>
											
										</td>
										<td>
										 <?php if($pb->package_sub_type=="ONEWAY OFFER") {?>
										 
										 		<form method="post">
											
												<button formaction="<?php echo base_url();?>index.php/Oneway_view" type="submit" class="btn green-seagreen"  value="<?php echo $pb->id;?>" name="oneway_view_id"><i class="fa fa-eye"></i></button>	
												
											
											
											 </form>
										 <?php } ?>
										
										<?php if($pb->package_sub_type=="ONEWAY") {?>
											 <form method="post">
											
												<button formaction="<?php echo base_url();?>index.php/Local_view" type="submit" class="btn green-seagreen"  value="<?php echo $pb->id;?>" name="local_view_id"><i class="fa fa-eye"></i></button>	
												
											
											
											 </form>
										<?php } ?>
										
										<?php if($pb->package_sub_type=="ROUNDTRIP") {?>										
										 <form method="post">
											
												<button formaction="<?php echo base_url();?>index.php/Roundtrip_view" type="submit" class="btn green-seagreen"  value="<?php echo $pb->id;?>" name="roundtrip_view_id"><i class="fa fa-eye"></i></button>
												
												
											
											 </form>
										<?php } ?>
										
										<?php if($pb->package_sub_type=="MULTICITY") {?>
										<form method="post">
											
												<button formaction="<?php echo base_url();?>index.php/Multicity_view" type="submit" class="btn green-seagreen"  value="<?php echo $pb->id;?>" name="multicity_view_id"><i class="fa fa-eye"></i></button>
												
												
											
											 </form>
										<?php } ?>
										
										<?php if($pb->package_type=="LOCAL") {?>
										<form method="post">
											
												<button formaction="<?php echo base_url();?>index.php/Local_view" type="submit" class="btn green-seagreen"  value="<?php echo $pb->id;?>" name="local_view_id"><i class="fa fa-eye"></i></button>
											
												
											
											 </form>
										<?php } ?>
										
										</td>
										<td>
										<form method="post">
											
												<button onclick="return confirm('Are you sure want to delete?')" formaction="<?php echo base_url();?>index.php/Booking_management/delete_booking" type="submit" class="btn red"  value="<?php echo $pb->id;?>" name="delete_id"><i class="fa fa-trash"></i></button>
											
												
											
											 </form>
										</td>
										</tr>
                                      
										<?php } ?>
										  </tbody>
                                    </table>
                                </div>
                                                            
                                                             </p>
                                                        </div>
                                                        <div class="tab-pane active" id="tab_15_1">
                                                            <p> 
                                                            <div class="portlet-body">
                                  
                                    <br><br>
                                   <table class="table table-striped table-bordered table-hover dt-responsive" id="sample_C">
                                   
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
                                            
                                        <?php foreach($pending_booking_list as $pb) { ?>
                                        
                                        <tr class="odd gradeX">
                                        <td>
        									<?php echo $pb->b_id;?>
        								</td> 
        								<td>
        									<?php echo date('d/m/Y',strtotime($pb->b_from_date));?>	
                        				</td>
        				                <td>
									    	<?php echo date('h:i A',strtotime($pb->b_from_time));?>
										</td>
										<td>
											<?php echo $pb->b_p_name;?>
										</td>
										<td>
											<?php echo $pb->b_p_contact;?>
										</td>
										<td >
										   <?php if($pb->package_type=='ONEWAY') { echo $pb->package_sub_type; } else { echo $pb->package_type.'<br>'.$pb->package_sub_type; } ?>
										</td>
										<td>																				
											<?php echo $this->db->get_where('vehicle_category_detail',array('id'=>$pb->b_vc_id))->row()->category_name;?>
										</td>
										 <td >								 
											<?php echo $pb->b_pickup_point;?>									
										</td>
										 <td >
										    <center><?php if($pb->b_agent_id=="") { echo "-"; }  ?><?php if($pb->b_agent_id!="") { echo $this->db->get_where('agent_detail',array('id'=>$pb->b_agent_id))->row()->a_full_name; }  ?>		</center>
										</td>
										 <td >
											<?php if($pb->b_status == 0){echo "<span class='label label-sm label-danger'>Cancelled</span>";} if($pb->b_status == 1){echo "<span class='label label-sm label-info'> pending </span>";} if($pb->b_status == 2){echo "<span class='label label-sm label-primary'>Owner Assigned </span>";}  if($pb->b_status == 3){echo " <span class='label label-sm label-default'> Driver Assigned </span>";} if($pb->b_status == 4){ if($pb->b_rent_card_id !=0 && $pb->b_rent_card_status == 1){ echo "<span class='label label-sm label-default'> Duty Slip  </span>"; } else { echo "<span class='label label-sm label-warning'> Cab Assigned </span>"; } } if($pb->b_status == 5){ if( $this->db->get_where('invoice',array('id'=>$pb->b_invoice_id))->row()->balance > 0 ){echo "<span class='label label-sm label-info'> Complete Trip</span>";}else{ echo "<span class='label label-sm label-info'> Due  </span>"; }  } if($pb->b_status == 6){ if($this->db->get_where('invoice',array('id'=>$pb->b_invoice_id))->row()->balance > 0 ){echo "<span class='label label-sm label-info'> Due </span>";}else{echo "<span class='label label-sm label-success'> Trip Finished</span>"; } }?>
											
										</td>
										<td>
										<?php if($pb->package_sub_type=="ONEWAY OFFER") {  ?>
										 
										 		<form method="post">
											
												<button formaction="<?php echo base_url();?>index.php/Oneway_view" type="submit" class="btn green-seagreen"  value="<?php echo $pb->id;?>" name="oneway_view_id"><i class="fa fa-eye"></i></button>	
												
											     <?php if($pb->b_status==6) {?>	
												<button formaction="<?php echo base_url(); ?>index.php/Invoice_view/outstation_invoice" type="submit"  name="ticket_id" value="<?php echo $pb->b_invoice_id;?>" class="btn yellow"><i class="fa fa-ticket"></i></button>
											    <?php } ?>
											
											 </form>
										 
										 <?php } ?>
										
										<?php if($pb->package_sub_type=="ONEWAY") {?>
											 <form method="post">
											
												<button formaction="<?php echo base_url();?>index.php/Local_view" type="submit" class="btn green-seagreen"  value="<?php echo $pb->id;?>" name="local_view_id"><i class="fa fa-eye"></i></button>	
												
											     <?php if($pb->b_status==6) {?>	
												<button formaction="<?php echo base_url(); ?>index.php/Invoice_view" type="submit"  name="ticket_id" value="<?php echo $pb->b_invoice_id;?>" class="btn yellow"><i class="fa fa-ticket"></i></button>
											    <?php } ?>
											
											 </form>
										<?php } ?>
										
										<?php if($pb->package_sub_type=="ROUNDTRIP") {?>										
										 <form method="post">
											
												<button formaction="<?php echo base_url();?>index.php/Roundtrip_view" type="submit" class="btn green-seagreen"  value="<?php echo $pb->id;?>" name="roundtrip_view_id"><i class="fa fa-eye"></i></button>
												<?php if($pb->b_status==6) {?>	
												<button formaction="<?php echo base_url(); ?>index.php/Invoice_view/outstation_invoice" type="submit"  name="ticket_id" value="<?php echo $pb->b_invoice_id;?>" class="btn yellow"><i class="fa fa-ticket"></i></button>
											    <?php } ?>
												
											
											 </form>
										<?php } ?>
										
										<?php if($pb->package_sub_type=="MULTICITY") {?>
										<form method="post">
											
												<button formaction="<?php echo base_url();?>index.php/Multicity_view" type="submit" class="btn green-seagreen"  value="<?php echo $pb->id;?>" name="multicity_view_id"><i class="fa fa-eye"></i></button>
												
												<?php if($pb->b_status==6) {?>	
												<button formaction="<?php echo base_url(); ?>index.php/Invoice_view/outstation_invoice" type="submit"  name="ticket_id" value="<?php echo $pb->b_invoice_id;?>" class="btn yellow"><i class="fa fa-ticket"></i></button>
											    <?php } ?>
											
											 </form>
										<?php } ?>
										
										<?php if($pb->package_type=="LOCAL") {?>
										<form method="post">
											
												<button formaction="<?php echo base_url();?>index.php/Local_view" type="submit" class="btn green-seagreen"  value="<?php echo $pb->id;?>" name="local_view_id"><i class="fa fa-eye"></i></button>
											
												<?php if($pb->b_status==6) {?>	
												<button formaction="<?php echo base_url(); ?>index.php/Invoice_view" type="submit"  name="ticket_id" value="<?php echo $pb->b_invoice_id;?>" class="btn yellow"><i class="fa fa-ticket"></i></button>
											    <?php } ?>
											
											 </form>
										<?php } ?>
										
										</td>
										<td>
										<form method="post">
											
												<button onclick="return confirm('Are you sure want to delete?')" formaction="<?php echo base_url();?>index.php/Booking_management/delete_booking" type="submit" class="btn red"  value="<?php echo $pb->id;?>" name="delete_id"><i class="fa fa-trash"></i></button>
											
												
											
											 </form>
										</td>
										</tr>
                                      
										<?php } ?>
										  </tbody>
                                    </table>
                                </div>
                                                            
                                                             </p>
                                                        </div>
                                                        
                                                        <div class="tab-pane" id="tab_15_2">
                                                            <p> 
                                                            <div class="portlet-body">
                                  
                                     <br><br>
                                   <table class="table table-striped table-bordered table-hover dt-responsive" id="sample_D">
                                   
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
                                            
										<?php foreach($oneway_offer_booking_list as $ob) { ?>
                                        
                                        <tr class="odd gradeX">
                                        <td>
        									<?php echo $ob->b_id;?>
        								</td>
        								<td>
        									<?php echo date('d/m/Y',strtotime($ob->b_from_date));?>	
                        				</td>
        				                <td>
										<?php echo date('h:i A',strtotime($ob->b_from_time));?>
										 </td>
										<td>
											<?php echo $ob->b_p_name;?>
										</td>
										<td>
											<?php echo $ob->b_p_contact;?>
										</td>
										<td >
											<?php echo $ob->package_sub_type; ?>
										</td>
										<td>																				
											<?php echo $this->db->get_where('vehicle_category_detail',array('id'=>$ob->b_vc_id))->row()->category_name;?>
										</td>
										 <td >								 
											<?php echo $ob->b_pickup_point;?>									
										</td>
										 <td >
										<center><?php if($ob->b_agent_id=="") { echo "-"; }  ?></center>
											<?php if($ob->b_agent_id!="") { $agent_detail = $this->db->get_where('agent_detail',array('id'=>$ob->b_agent_id))->row();if(!empty($agent_detail)){echo $agent_detail->a_full_name; }else{ echo "-";} }  ?>	
										</td>
										 <td >
										    <?php if($ob->b_status == 0){echo "<span class='label label-sm label-danger'>Cancelled</span>";} if($ob->b_status == 1){echo "<span class='label label-sm label-info'> pending </span>";} if($ob->b_status == 2){echo "<span class='label label-sm label-primary'>Owner Assigned </span>";}  if($ob->b_status == 3){echo " <span class='label label-sm label-default'> Driver Assigned </span>";} if($ob->b_status == 4){ if($ob->b_rent_card_id !=0 && $ob->b_rent_card_status == 1){ echo "<span class='label label-sm label-default'> Duty Slip  </span>"; } else { echo "<span class='label label-sm label-warning'> Cab Assigned </span>"; } } if($ob->b_status == 5){ if( $this->db->get_where('invoice',array('id'=>$ob->b_invoice_id))->row()->balance > 0 ){echo "<span class='label label-sm label-info'> Complete Trip</span>";}else{ echo "<span class='label label-sm label-info'> Due  </span>"; }  } if($ob->b_status == 6){ if($this->db->get_where('invoice',array('id'=>$ob->b_invoice_id))->row()->balance > 0 ){echo "<span class='label label-sm label-info'> Due </span>";}else{echo "<span class='label label-sm label-success'> Trip Finished</span>"; } }?>
											
										</td>
										<td>
											 <form method="post">
											
												<button formaction="<?php echo base_url();?>index.php/Oneway_view" type="submit" class="btn green-seagreen"  value="<?php echo $ob->id;?>" name="oneway_view_id"><i class="fa fa-eye"></i></button>	
												<?php if($ob->b_status==6) {?>	
												<button formaction="<?php echo base_url(); ?>index.php/Invoice_view/outstation_invoice" type="submit"  name="ticket_id" value="<?php echo $ob->b_invoice_id;?>" class="btn yellow"><i class="fa fa-ticket"></i></button>
											    <?php } ?>
											
											 </form>
										
										</td>
										<td>
										<form method="post">
											
												<button onclick="return confirm('Are you sure want to delete?')" formaction="<?php echo base_url();?>index.php/Booking_management/delete_booking" type="submit" class="btn red"  value="<?php echo $ob->id;?>" name="delete_id"><i class="fa fa-trash"></i></button>
											
												
											
											 </form>
										</td>
										</tr>
                                        
										<?php } ?>
										</tbody>
                                    </table>
                                </div>
                                                            
                                                             </p>
                                                        </div>
                                                        
                                                        <div class="tab-pane " id="tab_15_3">
                                                            <p> 
                                                            <div class="portlet-body">
                                  
                                     <br><br>
                                   <table class="table table-striped table-bordered table-hover dt-responsive" id="sample_E">
                                   
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
                                            
										<?php foreach($oneway_booking_list as $ob) { ?>
                                        
                                        <tr class="odd gradeX">
                                        <td>
        									<?php echo $ob->b_id;?>
        								</td>
        								<td>
        									<?php echo date('d/m/Y',strtotime($ob->b_from_date));?>	
                        				</td>
        				                <td>
										<?php echo date('h:i A',strtotime($ob->b_from_time));?>
										 </td>
										<td>
											<?php echo $ob->b_p_name;?>
										</td>
										<td>
											<?php echo $ob->b_p_contact;?>
										</td>
										<td >
											<?php echo $ob->package_sub_type; ?>
										</td>
										<td>																				
											<?php echo $this->db->get_where('vehicle_category_detail',array('id'=>$ob->b_vc_id))->row()->category_name;?>
										</td>
										 <td >								 
											<?php echo $ob->b_pickup_point;?>									
										</td>
										 <td >
										<center><?php if($ob->b_agent_id=="") { echo "-"; }  ?></center>
											<?php if($ob->b_agent_id!="") { $agent_detail = $this->db->get_where('agent_detail',array('id'=>$ob->b_agent_id))->row();if(!empty($agent_detail)){echo $agent_detail->a_full_name;}else{ echo "-";} }  ?>	
										</td>
										 <td >
										    <?php if($ob->b_status == 0){echo "<span class='label label-sm label-danger'>Cancelled</span>";} if($ob->b_status == 1){echo "<span class='label label-sm label-info'> pending </span>";} if($ob->b_status == 2){echo "<span class='label label-sm label-primary'>Owner Assigned </span>";}  if($ob->b_status == 3){echo " <span class='label label-sm label-default'> Driver Assigned </span>";} if($ob->b_status == 4){ if($ob->b_rent_card_id !=0 && $ob->b_rent_card_status == 1){ echo "<span class='label label-sm label-default'> Duty Slip  </span>"; } else { echo "<span class='label label-sm label-warning'> Cab Assigned </span>"; } } if($ob->b_status == 5){ if( $this->db->get_where('invoice',array('id'=>$ob->b_invoice_id))->row()->balance > 0 ){echo "<span class='label label-sm label-info'> Complete Trip</span>";}else{ echo "<span class='label label-sm label-info'> Due  </span>"; }  } if($ob->b_status == 6){ if($this->db->get_where('invoice',array('id'=>$ob->b_invoice_id))->row()->balance > 0 ){echo "<span class='label label-sm label-info'> Due </span>";}else{echo "<span class='label label-sm label-success'> Trip Finished</span>"; } }?>
											
										</td>
										<td>
											 <form method="post">
											
												<button formaction="<?php echo base_url();?>index.php/Local_view" type="submit" class="btn green-seagreen"  value="<?php echo $ob->id;?>" name="local_view_id"><i class="fa fa-eye"></i></button>	
												<?php if($ob->b_status==6) {?>	
												<button formaction="<?php echo base_url(); ?>index.php/Invoice_view" type="submit"  name="ticket_id" value="<?php echo $ob->b_invoice_id;?>" class="btn yellow"><i class="fa fa-ticket"></i></button>
											    <?php } ?>
											
											 </form>
										
										</td>
										<td>
										<form method="post">
											
												<button onclick="return confirm('Are you sure want to delete?')" formaction="<?php echo base_url();?>index.php/Booking_management/delete_booking" type="submit" class="btn red"  value="<?php echo $ob->id;?>" name="delete_id"><i class="fa fa-trash"></i></button>
											
												
											
											 </form>
										</td>
										</tr>
                                        
										<?php } ?>
										</tbody>
										
                                    </table>
                                </div>
                                                            
                                                             </p>
                                                        </div>
                                                        
                                                        <div class="tab-pane" id="tab_15_4">
                                                            <p> 
                                                            <div class="portlet-body">
                                 
                                    <br><br>
                                   <table class="table table-striped table-bordered table-hover dt-responsive" id="sample_F">
                                   
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
										 <?php foreach($outstation_booking_list as $ob)
										 
										  {?>
                                       
                                        <tr class="odd gradeX">
										
										  <td>
											<?php echo $ob->b_id;?>
										</td>
										<td>
											<?php echo date('d/m/Y',strtotime($ob->b_from_date));?>	
										</td>
										<td>
											<?php echo date('h:i A',strtotime($ob->b_from_time));?>
										 </td>
										<td>
											<?php echo $ob->b_p_name;?>
										</td>
										<td>
											<?php echo $ob->b_p_contact;?>
										</td>
										<td >
											<?php echo $ob->package_type."<br>".$ob->package_sub_type; ?>
										</td>
										<td>																				
											<?php echo $this->db->get_where('vehicle_category_detail',array('id'=>$ob->b_vc_id))->row()->category_name;?>
										</td>
										 <td >								 
											<?php echo $ob->b_pickup_point;?>									
										</td>
										 <td >
										<center><?php if($ob->b_agent_id=="") { echo "-"; }  ?></center>
											<?php if($ob->b_agent_id!="") { $agent_detail = $this->db->get_where('agent_detail',array('id'=>$ob->b_agent_id))->row();if(!empty($agent_detail)){echo $agent_detail->a_full_name;}else{ echo "-";} }  ?>	
										</td>
										 <td >
										     <?php if($ob->b_status == 0){echo "<span class='label label-sm label-danger'>Cancelled</span>";} if($ob->b_status == 1){echo "<span class='label label-sm label-info'> pending </span>";} if($ob->b_status == 2){echo "<span class='label label-sm label-primary'>Owner Assigned </span>";}  if($ob->b_status == 3){echo " <span class='label label-sm label-default'> Driver Assigned </span>";} if($ob->b_status == 4){ if($ob->b_rent_card_id !=0 && $ob->b_rent_card_status == 1){ echo "<span class='label label-sm label-default'> Duty Slip  </span>"; } else { echo "<span class='label label-sm label-warning'> Cab Assigned </span>"; } } if($ob->b_status == 5){ if( $this->db->get_where('invoice',array('id'=>$ob->b_invoice_id))->row()->balance > 0 ){echo "<span class='label label-sm label-info'> Complete Trip</span>";}else{ echo "<span class='label label-sm label-info'> Due  </span>"; }  } if($ob->b_status == 6){ if($this->db->get_where('invoice',array('id'=>$ob->b_invoice_id))->row()->balance > 0 ){echo "<span class='label label-sm label-info'> Due </span>";}else{echo "<span class='label label-sm label-success'> Trip Finished</span>"; } }?>
											
										</td>
										<td>
											 <form method="post">
											
												<button formaction="<?php echo base_url();?>index.php/Roundtrip_view" type="submit" class="btn green-seagreen"  value="<?php echo $ob->id;?>" name="roundtrip_view_id"><i class="fa fa-eye"></i></button>
												
												
											
												<?php if($ob->b_status==6) {?>	
												<button formaction="<?php echo base_url(); ?>index.php/Invoice_view/outstation_invoice" type="submit"  name="ticket_id" value="<?php echo $ob->b_invoice_id;?>" class="btn yellow"><i class="fa fa-ticket"></i></button>
											    <?php } ?>
											
											 </form>
										
										</td>
										<td>
										<form method="post">
											
												<button onclick="return confirm('Are you sure want to delete?')" formaction="<?php echo base_url();?>index.php/Booking_management/delete_booking" type="submit" class="btn red"  value="<?php echo $ob->id;?>" name="delete_id"><i class="fa fa-trash"></i></button>
											
												
											
											 </form>
										</td>
										</tr>
								
								 <?php } ?>
                                  </tbody>      
                                    </table>
									
                                </div>
                                                            
                                                             </p>
                                                        </div>
                                                        
                                                        <div class="tab-pane" id="tab_15_5">
                                                            <p> 
                                                            <div class="portlet-body">
                                  
                                     <br><br>
                                   <table class="table table-striped table-bordered table-hover dt-responsive" id="sample_G">
                                   
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
										<?php foreach($multicity_booking_list as $mb) {?>
                                      
                                           <tr class="odd gradeX">
										
										  <td>
											<?php echo $mb->b_id;?>
										</td>
										<td>
											<?php echo date('d/m/Y',strtotime($mb->b_from_date));?>	
										</td>
										<td>
											<?php echo date('h:i A',strtotime($mb->b_from_time));?>
										 </td>
										<td>
											<?php echo $mb->b_p_name;?>
										</td>
										<td>
											<?php echo $mb->b_p_contact;?>
										</td>
										<td >
											<?php echo $mb->package_type."<br>".$mb->package_sub_type; ?>
										</td>
										<td>																				
											<?php echo $this->db->get_where('vehicle_category_detail',array('id'=>$mb->b_vc_id))->row()->category_name;?>
										</td>
										 <td >								 
											<?php echo $mb->b_pickup_point;?>									
										</td>
										 <td >
										<center><?php if($mb->b_agent_id=="") { echo "-"; }  ?></center>
											<?php if($mb->b_agent_id!="") { $agent_detail = $this->db->get_where('agent_detail',array('id'=>$mb->b_agent_id))->row();if(!empty($agent_detail)){echo $agent_detail->a_full_name;}else{ echo "-";} }  ?>	
										</td>
										 <td >
										     <?php if($mb->b_status == 0){echo "<span class='label label-sm label-danger'>Cancelled</span>";} if($mb->b_status == 1){echo "<span class='label label-sm label-info'> pending </span>";} if($mb->b_status == 2){echo "<span class='label label-sm label-primary'>Owner Assigned </span>";}  if($mb->b_status == 3){echo " <span class='label label-sm label-default'> Driver Assigned </span>";} if($mb->b_status == 4){ if($mb->b_rent_card_id !=0 && $mb->b_rent_card_status == 1){ echo "<span class='label label-sm label-default'> Duty Slip  </span>"; } else { echo "<span class='label label-sm label-warning'> Cab Assigned </span>"; } } if($mb->b_status == 5){ if( $this->db->get_where('invoice',array('id'=>$mb->b_invoice_id))->row()->balance > 0 ){echo "<span class='label label-sm label-info'> Complete Trip</span>";}else{ echo "<span class='label label-sm label-info'> Due  </span>"; }  } if($mb->b_status == 6){ if($this->db->get_where('invoice',array('id'=>$mb->b_invoice_id))->row()->balance > 0 ){echo "<span class='label label-sm label-info'> Due </span>";}else{echo "<span class='label label-sm label-success'> Trip Finished</span>"; } }?>
											
											
											
											
										</td>
										<td>
											 <form method="post">
											
												<button formaction="<?php echo base_url();?>index.php/Multicity_view" type="submit" class="btn green-seagreen"  value="<?php echo $mb->id;?>" name="multicity_view_id"><i class="fa fa-eye"></i></button>
												
												
											
												<?php if($mb->b_status==6) {?>	
												<button formaction="<?php echo base_url(); ?>index.php/Invoice_view/outstation_invoice" type="submit"  name="ticket_id" value="<?php echo $mb->b_invoice_id;?>" class="btn yellow"><i class="fa fa-ticket"></i></button>
											    <?php } ?>
											
											 </form>
										
										</td>
										<td>
										<form method="post">
											
												<button onclick="return confirm('Are you sure want to delete?')" formaction="<?php echo base_url();?>index.php/Booking_management/delete_booking" type="submit" class="btn red"  value="<?php echo $mb->id;?>" name="delete_id"><i class="fa fa-trash"></i></button>
											
												
											
											 </form>
										</td>
										</tr>
										
										<?php } ?>
										 </tbody>	
                                    </table>
                                </div>
                                                            
                                                             </p>
                                                        </div>
                                                        
                                                        <div class="tab-pane" id="tab_15_6">
                                                            <p> 
                                                            <div class="portlet-body">
                                  
                                     <br><br>
                                   <table class="table table-striped table-bordered table-hover dt-responsive" id="sample_H">
                                   
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
										<?php foreach($local_booking_list as $lb){?>
                                       
                                            <tr class="odd gradeX">
                                         <td>
									    	<?php echo $lb->b_id;?>
										</td>
										<td>
											<?php echo date('d/m/Y',strtotime($lb->b_from_date));?>	
										</td>
										<td>
											<?php echo date('h:i A',strtotime($lb->b_from_time));?>
										 </td>
										<td>
											<?php echo $lb->b_p_name;?>
										</td>
										<td>
											<?php echo $lb->b_p_contact;?>
										</td>
										<td >
											<?php echo $lb->package_type."<br>".$lb->package_sub_type; ?>
										</td>
										<td>																				
											<?php echo $this->db->get_where('vehicle_category_detail',array('id'=>$lb->b_vc_id))->row()->category_name;?>
										</td>
										 <td >								 
											<?php echo $lb->b_pickup_point;?>									
										</td>
										  <td >
										<center><?php if($lb->b_agent_id=="") { echo "-"; }  ?></center>
											<?php if($lb->b_agent_id!="") { $agent_detail = $this->db->get_where('agent_detail',array('id'=>$lb->b_agent_id))->row();if(!empty($agent_detail)){echo $agent_detail->a_full_name;}else{ echo "-";} }  ?>	
										</td>
										 <td >
										  
											 <?php if($lb->b_status == 0){echo "<span class='label label-sm label-danger'>Cancelled</span>";} if($lb->b_status == 1){echo "<span class='label label-sm label-info'> pending </span>";} if($lb->b_status == 2){echo "<span class='label label-sm label-primary'>Owner Assigned </span>";}  if($lb->b_status == 3){echo " <span class='label label-sm label-default'> Driver Assigned </span>";} if($lb->b_status == 4){ if($lb->b_rent_card_id !=0 && $lb->b_rent_card_status == 1){ echo "<span class='label label-sm label-default'> Duty Slip </span>"; } else { echo "<span class='label label-sm label-warning'> Cab Assigned </span>"; } } if($lb->b_status == 5){ if( $this->db->get_where('invoice',array('id'=>$lb->b_invoice_id))->row()->balance > 0 ){echo "<span class='label label-sm label-info'> Complete Trip</span>";}else{ echo "<span class='label label-sm label-info'> Due  </span>"; }  } if($lb->b_status == 6){ if($this->db->get_where('invoice',array('id'=>$lb->b_invoice_id))->row()->balance > 0 ){echo "<span class='label label-sm label-info'> Due </span>";}else{echo "<span class='label label-sm label-success'> Trip Finished</span>"; } }?>
										</td>
										<td>
											 <form method="post">
											
												<button formaction="<?php echo base_url();?>index.php/Local_view" type="submit" class="btn green-seagreen"  value="<?php echo $lb->id;?>" name="local_view_id"><i class="fa fa-eye"></i></button>
												
												
											
												<?php if($lb->b_status==6) {?>	
												<button formaction="<?php echo base_url(); ?>index.php/Invoice_view" type="submit"  name="ticket_id" value="<?php echo $lb->b_invoice_id;?>" class="btn yellow"><i class="fa fa-ticket"></i></button>
											    <?php } ?>
											
											 </form>
										
										</td>
										<td>
										<form method="post">
											
												<button onclick="return confirm('Are you sure want to delete?')" formaction="<?php echo base_url();?>index.php/Booking_management/delete_booking" type="submit" class="btn red"  value="<?php echo $lb->id;?>" name="delete_id"><i class="fa fa-trash"></i></button>
																
											
											 </form>
										</td>
										</tr>
										
										<?php } ?>
										
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
 <?php $this->load->view('footer'); ?>