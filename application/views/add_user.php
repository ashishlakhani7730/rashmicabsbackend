<?php $this->load->view('header');?>
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
						  
	  <div class="note note-danger" id="validation_message" style="display:none;"> <p>  </p> </div>
                                            
                                            <div class="portlet-body form">
                                                <!-- BEGIN FORM-->
                                                <form action="<?php echo base_url();?>index.php/User_management/insert_user" enctype="multipart/form-data" method="post" class="horizontal-form">
                                                    <div class="form-body">
                                                      
                                                        <div class="row">
                                                        <div class="col-md-12">
                                                                  <div class="form-group">
                                                <label>ROLETYPE<span class="required">*</span></label>
                                                <div class="mt-radio-inline">
                                                    <label class="mt-radio">
                                    <input type="radio" name="user_role" id="office_user" value="1" checked> OFFICE STAFF
                                                        <span></span>
                                                    </label>
                                                    <label class="mt-radio">
                                    <input type="radio" name="user_role" id="admin" value="2"> MAIN ADMIN
                                                        <span></span>
                                                    </label>
                                                    
                                                </div>
                                            </div>
                                                            </div>
                                                            <!--/span-->
                                                        <div class="col-md-3">
                                                                <div class="form-group">
                                                                    <label class="control-label">First Name</label><span class="required">*</span>
                                                                      <input type="text" id="lastName" class="form-control" name="f_name" required>
                                                                    
                                                                </div>
                                                            </div>
                                                            <!--/span-->
                                                            
                                                            <div class="col-md-3">
                                                                <div class="form-group">
                                                                    <label class="control-label">Last Name</label><span class="required">*</span>
                                                                      <input type="text" id="lastName" class="form-control" name="l_name" required>
                                                                    
                                                                </div>
                                                            </div>
                                                            <!--/span-->
															 <div class="col-md-3">
                                                                <div class="form-group">
                                                                    <label class="control-label">Contact Number</label><span class="required">*</span>
                                                                      <input type="text" id="lastName" class="form-control" name="contact_no1"  required >
                                                                    
                                                                </div>
                                                            </div>
                                                            <!--/span-->
                                                             <div class="col-md-3">
                                                                <div class="form-group">
                                                                    <label class="control-label">Secondary Mob. No#</label>
                                                                      <input type="text" id="lastName" class="form-control"  name="contact_no2">
                                                                    
                                                                </div>
                                                            </div>
                                                            <!--/span-->
															  <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label class="control-label">Email ID</label><span class="required">*</span>
                                                                      <input type="text" id="lastName" class="form-control" name="email"  required>
                                                                    
                                                                </div>
                                                            </div>
                                                            <!--/span-->
															 
                                                            
															 <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label class="control-label">State</label>
                                         <select id="state_id" class="form-control select2" name="state_name">
																	    <option value="" selected="selected" >Select State</option>
  									 
  							 <?php  foreach($state as $count): ?>
							  
        <option value="<?php echo $count->state; ?>"><?php echo $count->state; ?>
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
                                                                      <select id="city_id" class="form-control select2" name="city_name">
                                            
                                            </optgroup>
                                        </select>
                                                                    
                                                                </div>
                                                            </div>
                                                            <!--/span-->
                                                             <div class="col-md-3">
                                                                <div class="form-group">
                                                                    <label class="control-label">Password</label><span class="required">*</span>
                                                                      <input type="password" id="lastName" class="form-control" name="password" onblur="confirmPassword()" >
                                                                    
                                                                </div>
                                                            </div>
                                                            <!--/span-->
                                                             <div class="col-md-3">
                                                                <div class="form-group">
                                                                    <label class="control-label">Confirm Password</label><span class="required">*</span>
                                                                      <input type="password" id="lastName" class="form-control" name="confirm_password" onblur="confirmPassword()">
                                                                    
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
                                                                <span class="fileinput-new"> Profile Picture </span>
                                                                <span class="fileinput-exists"> Change </span>
                                                                <input type="file" name="user_image"> </span>
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
                                                            <i class="fa fa-check"></i>Add User</button>
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
                  
                  

       
      
		
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>		
<script type="text/javascript">
$(document).ready(function ()
{
	$('#state_id').on('change', function()			  
	 {
	 	 var selStates = $(this).val();
		 console.log(selStates);
		 
		$.ajax(
		{   
			url: "<?php echo base_url();?>index.php/Ajax_common/get_city_by_state", 
			async: false,
			type: "POST", 
			data: "state_name="+selStates,
			dataType: "html",                          
			
			success: function(data) 
			{
				//alert(data);                         
				$('#city_id').html(data);
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
   <?php $this->load->view('footer'); ?>