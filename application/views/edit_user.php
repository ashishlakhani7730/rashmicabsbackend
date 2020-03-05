<?php $this->load->view('header');?>
            <div class="container-fluid">
                <div class="page-content">
                    <!-- BEGIN BREADCRUMBS -->
                    <div class="breadcrumbs">
                        <h1>Edit Office User</h1>
                        
                    </div>
                    <!-- END BREADCRUMBS -->
                    <!-- BEGIN PAGE BASE CONTENT -->
                 <div class="row">
                        <div class="col-md-12">
                          <div class="portlet light bordered">
						  
	  <div class="note note-danger" id="validation_message" style="display:none;"> <p>  </p> </div>
                                            
                                            <div class="portlet-body form">
                                                <!-- BEGIN FORM-->
                                                <form action="<?php echo base_url();?>index.php/User_management/update_user" enctype="multipart/form-data" method="post" class="horizontal-form">
                                                    <div class="form-body">
                                                      
                                                        <div class="row">
                                                        <div class="col-md-12">
                                                                  <div class="form-group">
                                                <label>ROLETYPE<span class="required">*</span></label>
                                                <div class="mt-radio-inline">
                                                    <label class="mt-radio">
                                    <input type="radio" name="user_role" id="office_user" value="1" <?php if($edit_user->u_role==1){echo "checked";}?>> OFFICE STAFF
                                                        <span></span>
                                                    </label>
                                                    <label class="mt-radio">
                                    <input type="radio" name="user_role" id="admin" value="2" <?php if($edit_user->u_role==2){echo "checked";}?>> MAIN ADMIN
                                                        <span></span>
                                                    </label>
                                                    
                                                </div>
                                            </div>
                                                            </div>
                                                            <!--/span-->
                                                        <div class="col-md-3">
                                                                <div class="form-group">
                                                                    <label class="control-label">First Name</label><span class="required">*</span>
                                                                      <input type="text" id="lastName" class="form-control" name="f_name" value="<?php echo set_value('u_f_name',$edit_user->u_f_name); ?>" required>
                                                                    
                                                                </div>
                                                            </div>
                                                            <!--/span-->
                                                            
                                                            <div class="col-md-3">
                                                                <div class="form-group">
                                                                    <label class="control-label">Last Name</label><span class="required">*</span>
                                                                      <input type="text" id="lastName" class="form-control" name="l_name" value="<?php echo set_value('u_l_name',$edit_user->u_l_name); ?>" required>
                                                                    
                                                                </div>
                                                            </div>
                                                            <!--/span-->
															 <div class="col-md-3">
                                                                <div class="form-group">
                                                                    <label class="control-label">Contact Number</label><span class="required">*</span>
                                                                      <input type="text" id="lastName" class="form-control" name="contact_no1"  value="<?php echo set_value('contact_no1',$edit_user->u_contact_no1); ?>" required >
                                                                    
                                                                </div>
                                                            </div>
                                                            <!--/span-->
                                                             <div class="col-md-3">
                                                                <div class="form-group">
                                                                    <label class="control-label">Secondary Mob. No#</label>
                                                                      <input type="text" id="lastName" class="form-control"  name="contact_no2" value="<?php echo set_value('contact_no2',$edit_user->u_contact_no2); ?>">
                                                                    
                                                                </div>
                                                            </div>
                                                            <!--/span-->
															  <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label class="control-label">Email ID</label><span class="required">*</span>
                                                                      <input type="text" id="lastName" class="form-control" name="email" value="<?php echo set_value('email',$edit_user->u_email_id); ?>" required>
                                                                    
                                                                </div>
                                                            </div>
                                                            <!--/span-->
															 
                                                            
															 <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label class="control-label">State</label>
                                                                      <select id="state_id" class="form-control select2" name="state_name">
																	   <option value="<?php echo $edit_user->u_state;?>" selected="selected" ><?php echo $edit_user->u_state;?></option>
  									 	
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
																	  	<option><?php echo $edit_user->u_city;?></option>
                                            
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
                                                        <?php if($edit_user->u_image==NULL){?>
														    <img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" alt="" /> 
															<?php } else { ?>
															
															 <img src="<?php echo base_url();?>uploads/User_image/<?php echo $edit_user->u_image;?>" alt="" /> 
															<?php } ?>
															</div>
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
                                                     
                                                        <button type="submit" value="<?php echo $edit_user->id;?>" name="user_update_id" class="btn yellow">
                                                            <i class="fa fa-check"></i>Update User</button>
                                                    </div>
                                                </form>
                                                <!-- END FORM-->
                                            </div>
                        </div>
                    </div>
                    </div>
                    
                 
            <!--end-->
			
			 <div class="portlet-body">
				  <div class="row">
				 <table class="table table-bordered">
                           <thead>
                              <tr class="blue_row">
                                 <th colspan="7" >Modification Details</th>
                                
                              </tr>
                           </thead>
                           <tbody>
                              <tr class="red_row">
							 	 <th >Created By</th>
                                 <th>Created on</th>
                                 <th >Updated By</th>
                                 <th>Updated on</th>
                                 
                                
                              </tr>
							  
							   <tr>
							 	 <th ><?php echo $this->db->get_where('user_detail',array('id'=>$edit_user->u_created_by))->row()->u_full_name;?></th>
                                 <th><?php echo $edit_user->u_created_date_time;?></th>
                                 <th ><?php if($edit_user->u_updated_by != 0) {echo  $this->db->get_where('user_detail',array('id'=>$edit_user->u_updated_by))->row()->u_full_name; } else {echo "N/A";}?></th>
                                 <th><?php if($edit_user->u_updated_by != 0) { echo $edit_user->u_updated_date_time; } else {echo "N/A";} ?></th>
                                 
                                
                              </tr>
							 </tbody>
							 
				</table>
			</div>
			</div>				 
			
                    </div>
                    </div>
                    </div>
                        
                    </div>
                    
                    
                    
                    
                    
                    
                    
                    <!-- END PAGE BASE CONTENT -->
                </div>
                <!-- BEGIN FOOTER -->
                  
                  
<p class="copyright"> 2017 &copy; RASHMI CABS
                    <a target="_blank" href="http://greenworlddesignstudio.com">GREENWORLD TECHNOLOGIES</a> &nbsp;|&nbsp;
               
                </p>
                <a href="#index" class="go2top">
                    <i class="icon-arrow-up"></i>
                </a>
                <!-- END FOOTER -->
            </div>
        </div>
        <!-- END CONTAINER -->
     
        
        <!--[if lt IE 9]>
<script src="assets/global/plugins/respond.min.js"></script>
<script src="assets/global/plugins/excanvas.min.js"></script> 
<script src="assets/global/plugins/ie8.fix.min.js"></script> 
<![endif]-->
        <!-- BEGIN CORE PLUGINS -->
        <script src="<?php echo base_url();?>assets/global/plugins/jquery.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url();?>assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url();?>assets/global/plugins/js.cookie.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url();?>assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url();?>assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url();?>assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
        <!-- END CORE PLUGINS -->
         <!-- BEGIN PAGE LEVEL PLUGINS -->
        <script src="<?php echo base_url();?>assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js" type="text/javascript"></script>
		<script src="<?php echo base_url();?>assets/global/plugins/select2/js/select2.full.min.js" type="text/javascript"></script>
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN THEME GLOBAL SCRIPTS -->
        <script src="<?php echo base_url();?>assets/global/scripts/app.min.js" type="text/javascript"></script>
        <!-- END THEME GLOBAL SCRIPTS -->
        <!-- BEGIN PAGE LEVEL SCRIPTS -->
		 <script src="<?php echo base_url();?>assets/pages/scripts/components-select2.min.js" type="text/javascript"></script>
        <!-- END PAGE LEVEL SCRIPTS -->
        <!-- BEGIN THEME LAYOUT SCRIPTS -->
        <script src="<?php echo base_url();?>assets/layouts/layout5/scripts/layout.min.js" type="text/javascript"></script>
       
        <!-- END THEME LAYOUT SCRIPTS -->
		
 <script type="text/javascript">
 
            $(document).ready(function ()
			 {
              
			    $('#state_id').on('change', function()			  
				 {
				 	 var selStates = $(this).val();
                 
					//alert(selStates);
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
    </body>

</html>