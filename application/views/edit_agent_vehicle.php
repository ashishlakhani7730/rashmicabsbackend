<?php $this->load->view('header');?>
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
						  		<div class="note note-danger" id="validation_message" style="display:none;"> <p>  </p> </div>
                                            
                                	<div class="portlet-body form">
                                        <!-- BEGIN FORM-->
                                        <form action="<?php echo base_url();?>index.php/Agent_vehicle_management/update_agent_vehicle" method="post" enctype="multipart/form-data" class="horizontal-form">
											<div class="form-body">
												<div class="row">
												<input type="hidden" name="agent_vehicle_id" value="<?php echo $vehicle_list->id; ?>" />
												 <?php $msg = $this->session->flashdata('error');
															if($msg['error'] != ''){
															?>
																<div class="col-md-12">
																	<p style="color:red; "><strong><?php echo $msg['error']; ?></strong></p>
																</div>
																<?php  } ?>
															<div class="col-md-4">
																<div class="form-group">
																	<label class="control-label">Agent</label><span class="required">*</span>
																	<select id="agent_id" name="agent_id" class="form-control select2" required>
																		<option value="" selected="selected" >Select Agent</option>
											 
																		<?php  foreach($agent_detail as $row): ?>
									  
																		<option value="<?php echo $row->id; ?>" <?php if($vehicle_list->agent_id==$row->id){ ?> selected="selected"<?php }?>><?php echo $row->a_full_name; ?></option>
																		<?php endforeach; ?> 
		
																		</optgroup>
																	</select>
																			
																</div>
															</div>
															<div class="col-md-4">
																<div class="form-group">
																	<label class="control-label">Vehicle Category</label><span class="required">*</span>
																	<select id="vehicle_category_id" name="vehicle_category_id" class="form-control select2" required>
																		<option value="" selected="selected" >Select Vehicle Category</option>
											 
																		<?php  foreach($vehicle_category as $row): ?>
									  
																		<option value="<?php echo $row->id; ?>" <?php if($vehicle_list->vehicle_category_id==$row->id){ ?> selected="selected"<?php }?>><?php echo $row->category_name; ?></option>
																		<?php endforeach; ?> 
		
																		</optgroup>
																	</select>
																			
																</div>
															</div>
                                                            <!--/span-->
                                                            
                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label class="control-label">Vehicle Type</label><span class="required">*</span>
                                                                      <select id="vehicle_detail_id" name="vehicle_detail_id" class="form-control select2" required>
																	  <option value="" selected="selected">Select Vehicle Type </option>
                                           
                                            						</optgroup>
                                        							</select>
                                                                    
                                                                </div>
                                                            </div>
                                                            <!--/span-->
															 <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label class="control-label">Insurance Expiry Date</label><span class="required">*</span>
                                                                      <input class="form-control form-control  date-picker" data-date-format="dd-mm-yyyy" data-date-start-date="+0d"  size="16" type="text" name="v_insurance_expire_date" id="v_insurance_expire_date" required value="<?php echo date('d-m-Y',strtotime($vehicle_list->v_insurance_expire_date)); ?>" >
                                                                    
                                                                </div>
                                                            </div>
                                                            <!--/span-->
                                                             <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label class="control-label">Vehicle Register No.</label><span class="required">*</span>
                                                                      <input type="text"  name="v_register_no" id="v_register_no" class="form-control" required value="<?php echo $vehicle_list->v_register_no; ?>">
                                                                    
                                                                </div>
                                                            </div>
                                                            <!--/span-->
															 
                                                            <!--/span-->
                                                            </div>
                                                             
                                                            
                                                            
                                                             
															
															
														
                                        		
                                                                   <div class="row">
                                     <h3 class="form-section">Documents Upload</h3>
                                     
                                     <div class="col-md-3">
                                                                <div class="form-group">
                                                              
                                                    <div class="fileinput fileinput-new" data-provides="fileinput">
                                                        <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
                                                            <img src="<?php if($vehicle_list->v_profile_pic != ""){ echo base_url()."/uploads/vehicle/profile_pic/".$vehicle_list->v_profile_pic; } else {  echo "http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image"; } ?>" alt="" /> </div>
                                                        <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"> </div>
                                                        <div>
                                                            <span class="btn default btn-file">
                                                                <span class="fileinput-new"> Profile Picture </span>
                                                                <span class="fileinput-exists"> Change </span>
                                                                <input type="file" name="v_profile_pic" > </span>
                                                            <a href="javascript:;" class="btn red fileinput-exists" data-dismiss="fileinput"> Remove </a>
                                                        </div>
                                                 
                                                 
                                                </div>
                                                                    
                                                                </div>
                                                            </div>
                                                            <!--/span-->
                                   <div class="col-md-3">
                                                                <div class="form-group">
                                                              
                                                    <div class="fileinput fileinput-new" data-provides="fileinput">
                                                        <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
                                                            <img src="<?php if($vehicle_list->v_insurance != ""){ echo base_url()."/uploads/vehicle/insurance/".$vehicle_list->v_insurance; } else {  echo "http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image"; } ?>" alt="" /> </div>
                                                        <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"> </div>
                                                        <div>
                                                            <span class="btn default btn-file">
                                                                <span class="fileinput-new"> Insurance Copy </span>
                                                                <span class="fileinput-exists"> Change </span>
                                                                <input type="file"name="v_insurance" > </span>
                                                            <a href="javascript:;" class="btn red fileinput-exists" data-dismiss="fileinput"> Remove </a>
                                                        </div>
                                                 
                                                 
                                                </div>
                                                                    
                                                                </div>
                                                            </div>
                                                            <!--/span-->
                                                            
                                          <div class="col-md-3">
                                                                <div class="form-group">
                                                              
                                                    <div class="fileinput fileinput-new" data-provides="fileinput">
                                                        <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
                                                            <img src="<?php if($vehicle_list->v_other_docs1 != ""){ echo base_url()."/uploads/vehicle/other_docs1/".$vehicle_list->v_other_docs1; } else {  echo "http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image"; } ?>" alt="" /> </div>
                                                        <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"> </div>
                                                        <div>
                                                            <span class="btn default btn-file">
                                                                <span class="fileinput-new"> Other Docs 1 </span>
                                                                <span class="fileinput-exists"> Change </span>
                                                                <input type="file" name="v_other_docs1" > </span>
                                                            <a href="javascript:;" class="btn red fileinput-exists" data-dismiss="fileinput"> Remove </a>
                                                        </div>
                                                 
                                                 
                                                </div>
                                                                    
                                                                </div>
                                                            </div>
                                                            <!--/span-->
                                     
                                     
                                     
                                     <div class="col-md-3">
                                                                <div class="form-group">
                                                              
                                                    <div class="fileinput fileinput-new" data-provides="fileinput">
                                                        <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
                                                            <img src="<?php if($vehicle_list->v_other_docs2 != ""){ echo base_url()."/uploads/vehicle/other_docs2/".$vehicle_list->v_other_docs2; } else {  echo "http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image"; } ?>" alt="" /> </div>
                                                        <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"> </div>
                                                        <div>
                                                            <span class="btn default btn-file">
                                                                <span class="fileinput-new"> Other Docs 2</span>
                                                                <span class="fileinput-exists"> Change </span>
                                                                <input type="file" name="v_other_docs2" > </span>
                                                            <a href="javascript:;" class="btn red fileinput-exists" data-dismiss="fileinput"> Remove </a>
                                                        </div>
                                                 
                                                 
                                                </div>
                                                                    
                                                                </div>
                                                            </div>
                                                             
                                                            

                                                            <!--/span-->
															
															 <div class="col-md-3">
                                                                <div class="form-group">
                                                              
                                                    <div class="fileinput fileinput-new" data-provides="fileinput">
                                                        <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
                                                            <img src="<?php if($vehicle_list->v_other_docs3 != ""){ echo base_url()."/uploads/vehicle/other_docs3/".$vehicle_list->v_other_docs3; } else {  echo "http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image"; } ?>" alt="" /> </div>
                                                        <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"> </div>
                                                        <div>
                                                            <span class="btn default btn-file">
                                                                <span class="fileinput-new"> Other Docs 3</span>
                                                                <span class="fileinput-exists"> Change </span>
                                                                <input type="file" name="v_other_docs3" > </span>
                                                            <a href="javascript:;" class="btn red fileinput-exists" data-dismiss="fileinput"> Remove </a>
                                                        </div>
                                                 
                                                 
                                                </div>
                                                                    
                                                                </div>
                                                            </div>
                                                             
                                                            

                                                            <!--/span-->
                                                            
                                                         
                                                        </div>
                                                        <!--/row-->
                                                     
                                                    </div>
                                                    <div class="form-actions right">
                                                     
                                                        <button type="submit"  class="btn yellow">
                                                            <i class="fa fa-check"></i>Edit Vehicle</button>
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
					
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
 <script type="text/javascript">
 
$(document).ready(function ()
{
    get_vehicle_type();         
	$("select#vehicle_category_id").change(function()			  
	{
		get_vehicle_type();
    });
});
function get_vehicle_type(){
	var vehicle_category_id = $("#vehicle_category_id option:selected").val();
	var vehicle_detail_id =<?php echo $vehicle_list->vehicle_detail_id; ?>;
                 
	$.ajax({
                url: '<?php echo base_url(); ?>index.php/Agent_vehicle_management/get_vehicle_category',
                type: 'post',
                data: {vehicle_category_id : vehicle_category_id, vehicle_detail_id : vehicle_detail_id},
                success: function(msg)
                {
					$('#vehicle_detail_id').empty();
					$('#vehicle_detail_id').html(msg);

                }
    });
}			
</script>                   
                    
<?php $this->load->view('footer');?>  