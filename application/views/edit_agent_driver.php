<?php $this->load->view('header');?>
            <!-- END HEADER -->
            <div class="container-fluid">
                <div class="page-content">
                    <!-- BEGIN BREADCRUMBS -->
                    <div class="breadcrumbs">
                        <h1>Edit Driver</h1>
                        
                    </div>
                    <!-- END BREADCRUMBS -->
                    <!-- BEGIN PAGE BASE CONTENT -->
                 	<div class="row">
                        <div class="col-md-12">
                          	<div class="portlet light bordered">
						  		<div class="note note-danger" id="validation_message" style="display:none;"> <p>  </p> </div>
                                            
                                	<div class="portlet-body form">
                                        <!-- BEGIN FORM-->
                                        <form action="<?php echo base_url();?>index.php/Agent_driver_management/update_agent_driver" method="post" enctype="multipart/form-data" class="horizontal-form">
											<div class="form-body">
												<div class="row">
															 <?php $msg = $this->session->flashdata('error');
															if($msg['error'] != ''){
															?>
																<div class="col-md-12">
																	<p style="color:red; "><strong><?php echo $msg['error']; ?></strong></p>
																</div>
																<?php  } ?>
															<input type="hidden" name="agent_driver_id" value="<?php echo $driver_detail->id;?>" />
															<div class="col-md-4">
																<div class="form-group">
																	<label class="control-label">Agent</label><span class="required">*</span>
																	<select id="agent_id" name="agent_id" class="form-control select2" required>
																		<option value="" selected="selected" >Select Agent</option>
											 
																		<?php  foreach($agent_detail as $row): ?>
									  
																		<option value="<?php echo $row->id; ?>" <?php if($row->id==$driver_detail->agent_id){ ?> selected="selected"<?php }?>><?php echo $row->a_full_name; ?></option>
																		<?php endforeach; ?> 
		
																		</optgroup>
																	</select>
																			
																</div>
															</div>
															<div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label class="control-label">First Name</label><span class="required">*</span>
                                                                      <input type="text" name="d_f_name" id="lastName" class="form-control" value="<?php echo $driver_detail->d_f_name;?>" required>
                                                                    
                                                                </div>
                                                            </div>
                                                            <!--/span-->
                                                            
                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label class="control-label">Last Name</label><span class="required">*</span>
                                                                      <input type="text"  name="d_l_name" id="lastName" class="form-control" value="<?php echo $driver_detail->d_l_name;?>" required>
                                                                    
                                                                </div>
                                                            </div>
                                                            <!--/span-->
															 <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label class="control-label">Contact Number</label><span class="required">*</span>
                                                                      <input type="text"  name="d_contact_no1" id="lastName" class="form-control" value="<?php echo $driver_detail->d_contact_no1;?>" required >
                                                                    
                                                                </div>
                                                            </div>
                                                            <!--/span-->
                                                             <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label class="control-label">Secondary Mob. No#</label>
                                                                      <input type="text"  name="d_contact_no2" id="lastName" class="form-control"  value="<?php echo $driver_detail->d_contact_no2;?>"  >
                                                                    
                                                                </div>
                                                            </div>
                                                            <!--/span-->
															  <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label class="control-label">Email ID</label>
                                                                      <input type="text" name="d_email_id" id="lastName" class="form-control" value="<?php echo $driver_detail->d_email_id;?>" >
                                                                    
                                                                </div>
                                                            </div>
                                                            <!--/span-->
                                                            </div>
                                                             
                                                            
                                                            
                                                             <div class="row">
                                     						<h3 class="form-section">Address Details</h3>
                                                             <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label class="control-label">Address</label>
                                                           <input type="text" name="d_address" id="lastName" class="form-control" value="<?php echo $driver_detail->d_address;?>"  >          
                                                                    
                                                                </div>
                                                            </div>
                                                            <!--/span-->
                                                              <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label class="control-label">Area</label>
                                                           <input type="text"  name="d_area" id="lastName" class="form-control" value="<?php echo $driver_detail->d_area;?>"  >          
                                                                    
                                                                </div>
                                                            </div>
                                                            <!--/span-->
                                                               <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label class="control-label">Zipcode</label>
                                                           <input type="text" name="d_zipcode" id="lastName" class="form-control" value="<?php echo $driver_detail->d_zipcode;?>"  >          
                                                                    
                                                                </div>
                                                            </div>
                                                            <!--/span-->
															 <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label class="control-label">State</label>
                                                                      <select id="state_id" name="d_state" class="form-control select2" >
                                           <option value="" selected="selected" >Select State</option>
  									 
  							 <?php  foreach($state as $count): ?>
							  
        <option value="<?php echo $count->state; ?>" <?php if($count->state==$driver_detail->d_state){ ?> selected="selected"<?php }?>><?php echo $count->state; ?>
								                         </option>
 													  <?php endforeach; ?> 

                                            </optgroup>
                                        </select>
                                                                    
                                                                </div>
                                                            </div>
                                                            <!--/span-->
															 <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label class="control-label">City</label>
                                                                      <select id="city_id" name="d_city" class="form-control select2">
																	  <option value="">select city</option>
                                           
                                            </optgroup>
                                        </select>
                                                                    
                                                                </div>
                                                            </div>
                                                            <!--/span-->
                                                            
                                                                 </div>
															
															
														
                                        		
                                                                   <div class="row">
                                     <h3 class="form-section">Documents Upload</h3>
                                     
                                     <div class="col-md-3">
                                                                <div class="form-group">
                                                              
                                                    <div class="fileinput fileinput-new" data-provides="fileinput">
                                                        <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
                                                            <img src="<?php if($driver_detail->d_profile_pic != ""){ echo base_url()."/uploads/driver/profile_pic/".$driver_detail->d_profile_pic; } else {  echo "http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image"; } ?>" alt="" /> </div>
                                                        <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"> </div>
                                                        <div>
                                                            <span class="btn default btn-file">
                                                                <span class="fileinput-new"> Profile Picture </span>
                                                                <span class="fileinput-exists"> Change </span>
                                                                <input type="file" name="d_profile_pic" > </span>
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
                                                            <img src="<?php if($driver_detail->d_driving_lic_front != ""){ echo base_url()."/uploads/driver/driving_lic_front/".$driver_detail->d_driving_lic_front; } else {  echo "http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image"; } ?>" alt="" /> </div>
                                                        <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"> </div>
                                                        <div>
                                                            <span class="btn default btn-file">
                                                                <span class="fileinput-new"> Driving Licence Front </span>
                                                                <span class="fileinput-exists"> Change </span>
                                                                <input type="file"name="d_driving_lic_front" > </span>
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
                                                            <img src="<?php if($driver_detail->d_driving_lic_back != ""){ echo base_url()."/uploads/driver/driving_lic_back/".$driver_detail->d_driving_lic_back; } else {  echo "http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image"; } ?>" alt="" /> </div>
                                                        <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"> </div>
                                                        <div>
                                                            <span class="btn default btn-file">
                                                                <span class="fileinput-new"> Driving Licence Back </span>
                                                                <span class="fileinput-exists"> Change </span>
                                                                <input type="file"name="d_driving_lic_back" > </span>
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
                                                            <img src="<?php if($driver_detail->d_other_docs1 != ""){ echo base_url()."/uploads/driver/other_docs1/".$driver_detail->d_other_docs1; } else {  echo "http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image"; } ?>" alt="" /> </div>
                                                        <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"> </div>
                                                        <div>
                                                            <span class="btn default btn-file">
                                                                <span class="fileinput-new"> Other Docs 1 </span>
                                                                <span class="fileinput-exists"> Change </span>
                                                                <input type="file" name="d_other_docs1" > </span>
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
                                                            <img src="<?php if($driver_detail->d_other_docs2 != ""){ echo base_url()."/uploads/driver/other_docs2/".$driver_detail->d_other_docs2; } else {  echo "http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image"; } ?>" alt="" /> </div>
                                                        <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"> </div>
                                                        <div>
                                                            <span class="btn default btn-file">
                                                                <span class="fileinput-new"> Other Docs 2</span>
                                                                <span class="fileinput-exists"> Change </span>
                                                                <input type="file" name="d_other_docs2" > </span>
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
                                                            <img src="<?php if($driver_detail->d_other_docs3 != ""){ echo base_url()."/uploads/driver/other_docs3/".$driver_detail->d_other_docs3; } else {  echo "http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image"; } ?>" alt="" /> </div>
                                                        <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"> </div>
                                                        <div>
                                                            <span class="btn default btn-file">
                                                                <span class="fileinput-new"> Other Docs 3</span>
                                                                <span class="fileinput-exists"> Change </span>
                                                                <input type="file" name="d_other_docs3" > </span>
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
                                                            <i class="fa fa-check"></i>Edit Driver</button>
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
              	get_city();
			    $('#state_id').on('change', function()			  
				 {
				 	get_city();
                });
            });
function get_city()
{
	var selStates = $("#state_id option:selected").val();
				
    var city = '<?php echo $driver_detail->d_city;?>';
					
    console.log(selStates);
    $.ajax(
			{   
                 url: "<?php echo base_url();?>index.php/Ajax_common/get_city_by_state", 
                 async: false,
                 type: "POST", 
                 data: {state_name : selStates, city:city},
                 dataType: "html",                          
                        
                 success: function(data) 
			 	{
					$('#city_id').html(data);
                }
           });
}	
			
			


 </script>                   
                    
 <?php $this->load->view('footer');?>  