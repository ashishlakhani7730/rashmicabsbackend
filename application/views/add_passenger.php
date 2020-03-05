 <div class="container-fluid">
                <div class="page-content">
                    <!-- BEGIN BREADCRUMBS -->
                    <div class="breadcrumbs">
                        <h1>Add New Passenger</h1>
                        
                    </div>
                    <!-- END BREADCRUMBS -->
                    <!-- BEGIN PAGE BASE CONTENT -->
                 <div class="row">
                        <div class="col-md-12">
                          <div class="portlet light bordered">
                                            
                                            <div class="portlet-body form">
											
											
											
											<div class="note note-danger" id="validation_message" style="display:none;"> <p>  </p> </div>
                                                <!-- BEGIN FORM-->
                                                <form action="<?php echo base_url();?>index.php/Passenger_management/insert_passenger" method="post" class="horizontal-form" enctype="multipart/form-data">
                                                    <div class="form-body">
                                                      
                                                        <div class="row">
														<?php $msg = $this->session->flashdata('error');
															if($msg['error'] != ''){
															?>
																<div class="col-md-12">
																	<p style="color:red; "><strong><?php echo $msg['error']; ?></strong></p>
																</div>
																<?php  } ?>
                                                        <div class="col-md-3">
                                                                <div class="form-group">
                                                                    <label class="control-label">First Name</label><span class="required">*</span>
                                                                      <input type="text" id="f_name" name="f_name" class="form-control" >
                                                                    
                                                                </div>
                                                            </div>
                                                            <!--/span-->
                                                            
                                                            <div class="col-md-3">
                                                                <div class="form-group">
                                                                    <label class="control-label">Last Name</label><span class="required">*</span>
                                                                      <input type="text" id="l_name" name="l_name" class="form-control" >
                                                                    
                                                                </div>
                                                            </div>
                                                            <!--/span-->
															 <div class="col-md-3">
                                                                <div class="form-group">
                                                                    <label class="control-label">Contact Number</label><span class="required">*</span>
                                                                      <input type="text" id="lastName" name="contact_no" class="form-control" placeholder="10 digit number " pattern="[7-9]{1}[0-9]{9}"  required="required" >
                                                                    
                                                                </div>
                                                            </div>
                                                            <!--/span-->
                                                             <div class="col-md-3">
                                                                <div class="form-group">
                                                                    <label class="control-label">Secondary Mob. No#</label>
                                                                      <input type="text" id="lastName" name="contact_no_2" placeholder="10 digit number " pattern="[7-9]{1}[0-9]{9}"  class="form-control"  >
                                                                    
                                                                </div>
                                                            </div>
                                                            <!--/span-->
															  <div class="col-md-3">
                                                                <div class="form-group">
                                                                    <label class="control-label">Email ID</label><span class="required">*</span>
                                                                      <input type="text" id="lastName" name="email_id" class="form-control" required="required" >
                                                                    
                                                                </div>
                                                            </div>
                                                            <!--/span-->
															<div class="col-md-3">
                                                                <div class="form-group">
                                                                    <label class="control-label">GST No.</label><span class="required"></span>
                                                                      <input type="text" id="gst_number" name="gst_number" class="form-control" >
                                                                    
                                                                </div>
                                                            </div>
                                                            <!--/span-->
															 <div class="col-md-6">
                                                                  <div class="form-group">
                                                						<label>Gender<span class="required">*</span></label>
                                                						<div class="mt-radio-inline">
                                                    						<label class="mt-radio">
                                                        						<input type="radio" name="gender" id="male" value="1" checked > MALE
                                                        						<span></span>
                                                    						</label>
                                                    						<label class="mt-radio">
                                                        						<input type="radio" name="gender" id="female" value="2"> FEMALE
                                                        						<span></span>
                                                    						</label>
                                                    
                                                						</div>
                                            					</div>
                                                            </div>
															
															
                                                             <div class="col-md-3">
                                                                <div class="form-group">
                                                                    <label class="control-label">Address</label>
                                                           <input type="text" id="lastName" name="address" class="form-control" >          
                                                                    
                                                                </div>
                                                            </div>
                                                            <!--/span-->
                                                              <div class="col-md-3">
                                                                <div class="form-group">
                                                                    <label class="control-label">Area</label>
                                                           <input type="text" id="lastName" name="area" class="form-control"  >          
                                                                    
                                                                </div>
                                                            </div>
                                                            <!--/span-->
															 <div class="col-md-3">
                                                                <div class="form-group">
                                                                    <label class="control-label">State</label>
                                                                      <select name="state" id="state" class="form-control select2">
																		   <option value="">Select State</option>
																		
																		
																			<?php foreach($state as $s){?>
																			<option value="<?php echo $s->StateName; ?>"><?php echo $s->StateName; ?></option>
																			<?php }?>
                                            
                                     								   </select>
                                                                    
                                                                </div>
                                                            </div>
                                                            <!--/span-->
															 <div class="col-md-3">
                                                                <div class="form-group">
                                                                    <label class="control-label">City</label>
                                                                      <select  class="form-control select2" name="city" id="city" >
                                           									<option value="">Select City</option>
                                            
                                      								  </select>
                                                                    
                                                                </div>
                                                            </div>
                                                            <!--/span-->
                                                             <div class="col-md-3">
                                                                <div class="form-group">
                                                                    <label class="control-label">Password</label><span class="required">*</span>
                                                                      <input type="password" id="lastName" name="password" class="form-control" onblur="confirmPassword()" required="required" >
                                                                    
                                                                </div>
                                                            </div>
                                                            <!--/span-->
                                                             <div class="col-md-3">
                                                                <div class="form-group">
                                                                    <label class="control-label">Confirm Password</label><span class="required">*</span>
                                                                      <input type="password" id="lastName" name="confirm_password" class="form-control" onblur="confirmPassword()" required="required" >
                                                                    
                                                                </div>
                                                            </div>
                                                            <!--/span-->
															
															<div class="col-md-4">
                                                                <div class="form-group">
                                                              
                                                    <div class="fileinput fileinput-new" data-provides="fileinput">
                                                        <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
                                                            <img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" alt="" /> </div>
                                                        <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"> </div>
                                                        <div>
                                                            <span class="btn default btn-file">
                                                                <span class="fileinput-new"> Select Logo </span>
                                                                <span class="fileinput-exists"> Change </span>
                                                                <input type="file" name="p_profile"> </span>
                                                            <a href="javascript:;" class="btn red fileinput-exists" data-dismiss="fileinput"> Remove </a>
                                                        </div>
                                                 
                                                 
                                                </div>
                                                                    
                                                                </div>
                                                            </div>
                                                            <!--/span-->
														
                                        		
                                                            

                                                            <!--/span-->
                                                            
                                                         
                                                        </div>
                                                        <!--/row-->
                                                     
                                                    </div>
                                                    <div class="form-actions right">
                                                     
                                                        <button type="submit" class="btn yellow">
                                                            <i class="fa fa-check"></i>Add Passenger</button>
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
				
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
 <script type="text/javascript">
    $(document).ready(function(){
	
        $("select#state").change(function(){
            var state_name = $("#state option:selected").val();
			
			
            $.ajax({
                url: '<?php echo base_url(); ?>index.php/Ajax_common/fetch_city',
                type: 'post',
                data: {state_name : state_name},
                success: function(msg)
                {
				
					//alert(msg);
                    $('#city').empty();
                    $('#city').append(msg);

                }
            });
        });
		
	});
	
	
	
	
	function confirmPassword()
	{
		if($('input[name="password"]').val()!="" && $('input[name="confirm_password"]').val()!="")
		{	
			if($('input[name="password"]').val() == $('input[name="confirm_password"]').val())
			{
					
				$('#validation_message').hide();
			}
			else
			{
				$('input[name="confirm_password"]').val("");
				$('#validation_message').html("Password mismatch");
				$('#validation_message').fadeIn();
				$("html, body").animate({ scrollTop: 0 }, "slow"); 
			}
		}
		else
		{
			
			$('#validation_message').hide();
		}
	}

</script>	
</script>					
				
				