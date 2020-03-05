 <?php $this->load->view('header'); ?>
            <!-- END HEADER -->
            <div class="container-fluid">
                <div class="page-content">
                    <!-- BEGIN BREADCRUMBS -->
                    <div class="breadcrumbs">
                        <h1>Manage Booking (<?php echo $passenger_data->p_full_name; ?>)<br /> <form method="post"> <button formaction="<?php echo base_url();?>index.php/Passenger_management/view_passenger" type="submit" class="btn yellow-haze" value="<?php echo $passenger_data->id;?>" name="btn_p_view">Passenger View <i class="fa fa-eye"></i></button> </form>	 </h1>
                        
                    </div>
                    <!-- END BREADCRUMBS -->
                    <!-- BEGIN PAGE BASE CONTENT -->
					
                 	<div class="row">
                        <div class="col-md-12">
                            <!-- BEGIN EXAMPLE TABLE PORTLET-->
                            <div class="portlet light bordered">
                                
                                <div class="portlet-body">
									<div class="table-toolbar">
									</div>
                                  <br><br>
                                   	<table class="table table-striped table-bordered table-hover dt-responsive" id="sample_1">
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
													Passenger
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
                                            
                                        <?php foreach($booking_list as $pb) { ?>
                                        
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
															<button formaction="<?php echo base_url(); ?>index.php/Invoice_view/outstation_invoice" type="submit"  name="ticket_id" value="<?php echo $pb->b_invoice_id;?>" class="btn yellow"><i class="fa fa-ticket"></i></button>
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
													
												
											</tr>
                                      
											<?php } ?>
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

 <?php $this->load->view('footer'); ?>