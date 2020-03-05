<?php $this->load->view('header');?>
            <!-- END HEADER -->
            <div class="container-fluid">
                <div class="page-content">
                    <!-- BEGIN BREADCRUMBS -->
                    <div class="breadcrumbs">
                        <h1>Add Booking Inquiry</h1>
                        
                    </div>
                    <!-- END BREADCRUMBS -->
                    <!-- BEGIN PAGE BASE CONTENT -->
                 	<div class="row">
                        <div class="col-md-12">
                          	<div class="portlet light bordered">
						  		<div class="note note-danger" id="validation_message" style="display:none;"> <p>  </p> </div>
                                            
                                	<div class="portlet-body form">
                                        <!-- BEGIN FORM-->
                                        <form action="<?php echo base_url();?>index.php/BookingInquiry_management/insert_booking_enquiry" method="post" enctype="multipart/form-data" class="horizontal-form">
											<div class="form-body">
												<div class="row">
												 <?php $msg = $this->session->flashdata('error');
															if($msg['error'] != ''){
															?>
																<div class="col-md-12">
																	<p style="color:red; "><strong><?php echo $msg['error']; ?></strong></p>
																</div>
																<?php  } ?>
															<div class="col-md-4">
																<div class="form-group">
																	<label class="control-label">Name</label><span class="required">*</span>
																	 <input type="text" name="name" id="name" class="form-control" required>
																			
																</div>
															</div>
															<div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label class="control-label">Mobile</label><span class="required">*</span>
                                                                      <input type="text" name="mobile" id="mobile" class="form-control" required>
                                                                    
                                                                </div>
                                                            </div>
                                                            <!--/span-->
                                                            
                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label class="control-label">From City</label><span class="required">*</span>
                                                                      <input type="text"  name="from_city" id="from_city" class="form-control" required>
                                                                    
                                                                </div>
                                                            </div>
                                                            <!--/span-->
															 <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label class="control-label">To City</label><span class="required">*</span>
                                                                      <input type="text"  name="to_city" id="to_city" class="form-control" required >
                                                                    
                                                                </div>
                                                            </div>
                                                            <!--/span-->
                                                             <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label class="control-label">Vehicle Category</label><span class="required">*</span>
                                                                    <select id="category_id" name="category_id" class="form-control select2" required>
                                            							<option></option>
                                            							<?php foreach($vehicle_category as $vc){?>
																		<option value="<?php echo $vc->id ?>" data-category_name="<?php echo $vc->category_name; ?>"><?php echo $vc->category_name;?></option>
																		<?php } ?>  
                                            							</optgroup>
                                        							</select>
																	<input type="hidden" name="category_name" id="category_name" />
                                                                    
                                                                </div>
                                                            </div>
                                                            <!--/span-->
															  <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label class="control-label">Plan Date</label><span class="required">*</span>
                                                                      <input class="form-control form-control-inline date-picker" size="16" type="text" name="plan_date" data-date-format="dd-mm-yyyy" data-date-start-date="+0d" value="" required/> 
                                                                    
                                                                </div>
                                                            </div>
                                                            <!--/span-->
															
															<div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label class="control-label">Plan Time</label><span class="required">*</span>
                                                                    
                                                                    	<div class="input-group">
       																		<input type="text" class="form-control timepicker timepicker-no-seconds" required name="plan_time" >
                                                                    		<span class="input-group-btn">
                                                                        		<button class="btn default" type="button">
                                                                            		<i class="fa fa-clock-o"></i>
                                                                        		</button>
                                                                    		</span>
                                                                		</div>  
																  
                                                                    
                                                                </div>
                                                            </div>
                                                            <!--/span-->
															<div class="col-md-8">
                                                                <div class="form-group">
                                                                    <label class="control-label">Open Notes</label><span class="required"></span>
                                                                      <textarea class="form-control" name="open_notes" ></textarea> 
                                                                    
                                                                </div>
                                                            </div>
                                                            <!--/span-->
															
                                                            </div>
                                                             
                                                            
                                                            
                                                             
															
															
														
                                        		
                                                                   
                                                        <!--/row-->
                                                     
                                                    </div>
                                                    <div class="form-actions right">
                                                     
                                                        <button type="submit"  class="btn yellow">
                                                            <i class="fa fa-check"></i>Add Booking Inquiry</button>
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
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>					
   <script>
    $(document).ready(function(){
       $("#category_id").change(function () {
			 $('#category_name').val($(this).find(':selected').data('category_name'));
		}); 

	});
</script>  
                    
 <?php $this->load->view('footer');?>  