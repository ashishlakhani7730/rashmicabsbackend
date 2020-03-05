<?php $this->load->view('header'); ?>
            <!-- END HEADER -->
            <div class="container-fluid">
                <div class="page-content">
                    <!-- BEGIN BREADCRUMBS -->
                    <div class="breadcrumbs">
                        <h1>Edit Vehicle</h1>
                        
                    </div>
                    <!-- END BREADCRUMBS -->
                    <!-- BEGIN PAGE BASE CONTENT -->
                 <div class="row">
                        <div class="col-md-12">
                          <div class="portlet light bordered">
                                            
                                            <div class="portlet-body form">
                                                <!-- BEGIN FORM-->
                                                <form action="<?php echo base_url();?>index.php/Vehicle_management/update_vehicle" method="post" class="horizontal-form">
                                                    <div class="form-body">
                                                      
                                                        <div class="row">
                                                        <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label class="control-label">Vehicle Name</label><span class="required">*</span>
                                                                      <input type="text" name="v_name" id="lastName" class="form-control" value="<?php echo set_value('v_name',$edit_vehicle->v_name);?>" required>
                                                                    
                                                                </div>
                                                            </div>
															
															
															
															<div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label class="control-label">Category</label><span class="required">*</span>
                                                             			<select id="state_id" name="cat_id" class="form-control select2" required>       
																		 
																			<option value="<?php echo $edit_vehicle->v_category_id; ?>">
																			<?php echo $this->db->get_where('vehicle_category_detail',array('id'=>$edit_vehicle->v_category_id))->row()->category_name; ?>
																						 </option>		 
															 <?php  foreach($category as $count): ?>
													  							<option value="<?php echo $count->id; ?>"><?php echo $count->category_name; ?>
																						 </option>
										
																					  <?php endforeach; ?> 
								
																			</optgroup>
																		</select>
                                                   
                                                                    
                                                                </div>
                                                            </div>
                                                            <!--/span-->
                                                            
                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                   <label class="control-label">Number of Seats</label><span class="required">*</span>
                                                                      <input type="text" name="v_seat_num"  id="lastName" class="form-control" value="<?php echo set_value('v_seat_num',$edit_vehicle->v_seat_number);?>" required> 
                                                                    
                                                                </div>
                                                            </div>
                                                         
                                                            </div>
                                                             
                                                            
                                                            
                                                             
															
															
														
                                        		
                                                                   
                                                        <!--/row-->
                                                     
                                                    </div>
                                                    <div class="form-actions right">
                                                     
                                                        <button type="submit" name="vehicle_update_id" value="<?php echo $edit_vehicle->id; ?>" class="btn yellow">
                                                            <i class="fa fa-check"></i>Update Vehicle</button>
                                                    </div>
                                                </form>
                                                <!-- END FORM-->
                                            </div>
                        </div>
                    </div>
                    </div>
                    
                 
            <!--end-->
                    </div>
                    </div>
                    </div>
                        
                    </div>
                    
                    
                    
                    
                    
                    
                    
                    <!-- END PAGE BASE CONTENT -->
                </div>
                <!-- BEGIN FOOTER -->
 <?php $this->load->view('footer');?>