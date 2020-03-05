 <div class="container-fluid">
                <div class="page-content">
                    <!-- BEGIN BREADCRUMBS -->
                    <div class="breadcrumbs">
                        <h1>Manage Passengers</h1>
                        
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
											<a href="<?php echo base_url();?>index.php/Passenger_management/add_passenger" class="btn yellow  btn-outline" >Add New
                                                        <i class="fa fa-plus"></i></a>
                                                
                                            </div>
                                        </div>
                                    </div>
                                   <table class="table table-striped table-bordered table-hover  order-column" id="sample_1">
                                        <thead>
                                            <tr>
                                              
                                               <th >
									Pessanger #
								</th>
                                
								<th>
									Name
								</th>
								<th>
									 Cell No
								</th>
								<th>
									 Email
								</th>
                                <th>
									 City
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
										
										<?php foreach($passenger_list as $pl){?>
                                            <tr class="odd gradeX">
                                               
                                               <td>
													<?php echo $pl->p_id;?>
												</td>
												<td>
													 <?php echo $pl->p_full_name;?>
												</td>
												<td>
													<?php echo $pl->p_contact;?>
												</td>
												<td>
													<?php echo $pl->p_email_id;?>
												</td>
												<td>
													<?php echo $pl->p_city;?>
												</td>
												<td>
                                                	<?php if($pl->p_status == 1){echo "<span class='label label-sm label-success'>ACTIVE</span>"; }else{echo "<span class='label label-sm label-danger'>INACTIVE</span>"; } ?>
                                            	</td>
												<td>
													<form action="<?php echo base_url().'index.php/Passenger_management/view_passenger'?>" method="post">
														<button type="submit"  value="<?php echo $pl->id;?>" name="btn_p_view" class="btn btn-sm yellow" >More Details</button>
												 	 </form>  
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