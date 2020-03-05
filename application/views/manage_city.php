<?php $this->load->view('header');?>

            <div class="container-fluid">
                <div class="page-content">
                    <!-- BEGIN BREADCRUMBS -->
                    <div class="breadcrumbs">
                        <h1>Manage City</h1>
                        
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
											<a href="<?php echo base_url();?>index.php/City_management/add_city_data" class="btn yellow  btn-outline" >Add New
                                                        <i class="fa fa-plus"></i></a>
                                                
                                            </div>
                                        </div>
                                    </div>
                                    <br><br>
                                   <table class="table table-striped table-bordered table-hover dt-responsive" id="sample_1">
                                        <thead>
                                            <tr>
                                              
                                               <th>
									City #
								</th>
                                
								<th>
									City Name
								</th>
								<th>
									 State
								</th>
								<th>
									 Lattitude
								</th>
                                <th>
									 Longitude
								</th>
                               
								<th>
									 Action
								</th>
                                            </tr>
                                        </thead>
                                        <tbody>
										<?php foreach($city_list as $row) { ?> 
                                            <tr class="odd gradeX">
                                               
											<td>
												<?php echo $row->city_id; ?> 
											</td>
											
											<td>
												<?php echo $row->c_name; ?> 
											</td>
											
											<td>
												<?php echo $row->c_state; ?> 
											</td>
											
											<td>
												<?php echo $row->c_lattitude; ?> 
											</td>
											
											 <td>
												<?php echo $row->c_longitude; ?> 
											</td>
							
							
											<td>
												
											   <form method="post">		
																
											    <?php if( $row->c_status !=1) {?>
								
													<button formaction="<?php echo base_url();?>index.php/City_management/city_status" type="submit" onClick="return do_active();" class="btn btn-sm red-haze"  name="city_status_id" value="<?php echo $row->id;?>" ><i class="fa fa-ban" ></i></button>
								
											   <?php } else { ?>
																			
													<button formaction="<?php echo base_url();?>index.php/City_management/city_status" type="submit" onClick="return do_inactive();" class="btn btn-sm green" name="city_status_id" value="<?php echo $row->id;?>" ><i class="fa fa-ban" ></i></button>
													
										     	<?php }?>
									
													<button formaction="<?php echo base_url();?>index.php/City_management/get_data_edit_city" class="btn btn-sm blue" name="city_edit_id" value="<?php echo $row->id;?>"><i class="fa fa-pencil"></i></a>
																						
													 <button formaction="<?php echo base_url();?>index.php/City_management/city_delete" onClick="return doconfirm();" type="submit" name="city_dlt_btn"  value="<?php echo $row->id;?>" class="btn btn-sm red"><i class="fa fa-trash"></i></button>
								
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
               <!-- BEGIN FOOTER -->

<?php $this->load->view('footer');?>