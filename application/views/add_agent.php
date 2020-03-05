<?php $this->load->view('header');?>
            <!-- END HEADER -->
            <div class="container-fluid">
                <div class="page-content">
                    <!-- BEGIN BREADCRUMBS -->
                    <div class="breadcrumbs">
                        <h1>Add New Agent</h1>
                        
                    </div>
                    <!-- END BREADCRUMBS -->
                    <!-- BEGIN PAGE BASE CONTENT -->
                 <div class="row">
                        <div class="col-md-12">
                          <div class="portlet light bordered">
						  <div class="note note-danger" id="validation_message" style="display:none;"> <p>  </p> </div>
                                            
                                            <div class="portlet-body form">
                                                <!-- BEGIN FORM-->
                                                <form action="<?php echo base_url();?>index.php/Agent_management/insert_agent" method="post" enctype="multipart/form-data" class="horizontal-form">
                                                    <div class="form-body">
                                                      
                                                        <div class="row">
														<?php $msg = $this->session->flashdata('error'); 
														if(!empty($msg['error'])){
														?>
														<div class="col-xs-12">
															<div class="alert alert-danger">
																<button class="close" data-close="alert"></button>
																<span><?php echo $msg['error']; ?>  </span>
															</div>
														</div>
														<?php }?>
                                                        <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label class="control-label">First Name</label><span class="required">*</span>
                                                                      <input type="text" name="first_name" id="lastName" class="form-control" required>
                                                                    
                                                                </div>
                                                            </div>
                                                            <!--/span-->
                                                            
                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label class="control-label">Last Name</label><span class="required">*</span>
                                                                      <input type="text"  name="last_name" id="lastName" class="form-control" required>
                                                                    
                                                                </div>
                                                            </div>
                                                            <!--/span-->
															 <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label class="control-label">Contact Number</label><span class="required">*</span>
                                                                      <input type="text"  name="contact_no" id="lastName" placeholder="10 digit number " class="form-control" pattern="[7-9]{1}[0-9]{9}" required >
                                                                    
                                                                </div>
                                                            </div>
                                                            <!--/span-->
                                                             <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label class="control-label">Secondary Mob. No#</label>
                                                                      <input type="text"  name="sec_contact_no" id="lastName" placeholder="10 digit number " class="form-control" pattern="[7-9]{1}[0-9]{9}"  >
                                                                    
                                                                </div>
                                                            </div>
                                                            <!--/span-->
															  <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label class="control-label">Email ID</label>
                                                                      <input type="text" name="email" id="lastName" class="form-control">
                                                                    
                                                                </div>
                                                            </div>
                                                            <!--/span-->
															
															 <!--<div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label class="control-label">IMEI No.</label><span class="required"></span>
                                                                      <input type="text" name="imei_no" id="lastName" class="form-control"  >
                                                                    
                                                                </div>
                                                            </div> -->
                                                            <!--/span-->
															
                                                            </div>
                                                             <div class="row">
                                     <h3 class="form-section">Buisness Details</h3>
                                     <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label class="control-label">Business Name</label>
                                                                      <input type="text"  name="bsns_name" id="lastName" class="form-control">
                                                                    
                                                                </div>
                                                            </div>
                                                            <!--/span-->
                                                            
                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                  <label class="control-label">Business Contact No</label>
                                                                      <input type="text" name="bsns_contact_no" id="lastName" class="form-control" >
                                                                    
                                                                </div>
                                                            </div>
                                                            <!--/span-->
															 <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label class="control-label">Business Email</label>
                                                                      <input type="text"  name="bsns_email" id="lastName" class="form-control">
                                                                    
                                                                </div>
                                                            </div>
                                                            <!--/span-->
                                                             <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label class="control-label">Pan No#</label>
                                                                      <input type="text" name="pan_no" id="lastName" class="form-control" >
                                                                    
                                                                </div>
                                                            </div>
                                                            <!--/span-->
															  <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label class="control-label">GST No#</label>
                                                                      <input type="text" name="gst_no" id="lastName" class="form-control" >
                                                                    
                                                                </div>
                                                            </div>
                                                            <!--/span-->
                                                            </div>
                                                            
                                                            <div class="row">
                                     <h3 class="form-section">Bank Details</h3>
                                       <div class="col-md-3">
                                                                <div class="form-group">
                                                                    <label class="control-label">Bank Name</label>
                                                                      <input type="text" name="bank_name"id="lastName" class="form-control" >
                                                                    
                                                                </div>
                                                            </div>
                                                            <!--/span-->
                                                             <div class="col-md-3">
                                                                <div class="form-group">
                                                                    <label class="control-label">Account Name</label>
                                                                      <input type="text" name="account_name" id="lastName" class="form-control">
                                                                    
                                                                </div>
                                                            </div>
                                                            <!--/span-->
                                                             <div class="col-md-3">
                                                                <div class="form-group">
                                                                    <label class="control-label">Account Number</label>
                                                                      <input type="text" name="account_no" id="lastName" class="form-control" >
                                                                    
                                                                </div>
                                                            </div>
                                                            <!--/span-->
                                                             <div class="col-md-3">
                                                                <div class="form-group">
                                                                    <label class="control-label">IFSC CODE</label>
                                                                      <input type="text" name="ifsc_code" id="lastName" class="form-control" >
                                                                    
                                                                </div>
                                                            </div>
                                                            <!--/span-->
                                                            </div>
                                                             <div class="row">
                                     <h3 class="form-section">Address Details</h3>
                                                             <div class="col-md-3">
                                                                <div class="form-group">
                                                                    <label class="control-label">Address</label>
                                                           <input type="text" name="address" id="lastName" class="form-control"  >          
                                                                    
                                                                </div>
                                                            </div>
                                                            <!--/span-->
                                                              <div class="col-md-3">
                                                                <div class="form-group">
                                                                    <label class="control-label">Area</label>
                                                           <input type="text"  name="area" id="lastName" class="form-control"  >          
                                                                    
                                                                </div>
                                                            </div>
                                                            <!--/span-->
                                                               <div class="col-md-3">
                                                                <div class="form-group">
                                                                    <label class="control-label">Zipcode</label>
                                                           <input type="text" name="zipcode" id="lastName" class="form-control"  >          
                                                                    
                                                                </div>
                                                            </div>
                                                            <!--/span-->
															 <div class="col-md-3">
                                                                <div class="form-group">
                                                                    <label class="control-label">State</label>
                                                                      <select id="state_id" name="state_name" class="form-control select2" >
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
                                                                      <select id="city_id" name="city_name" class="form-control select2">
                                           
                                            </optgroup>
                                        </select>
                                                                    
                                                                </div>
                                                            </div>
                                                            <!--/span-->
                                                            <!-- <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label class="control-label">Password</label><span class="required">*</span>
                                                                      <input type="password" name="password" id="lastName" class="form-control"  onblur="confirmPassword()" required>
                                                                    
                                                                </div>
                                                            </div> -->
                                                            <!--/span-->
                                                            <!--  <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label class="control-label">Confirm Password</label><span class="required">*</span>
                                                                      <input type="password" name="confirm_password" id="lastName" class="form-control" onblur="confirmPassword()" required>
                                                                    
                                                                </div>
                                                            </div> -->
                                                            <!--/span-->
                                                                 </div>
															
															
														
                                        		
                                                                   <div class="row">
                                     <h3 class="form-section">Documents Upload</h3>
                                     
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
                                                                <input type="file" name="user_image1" > </span>
                                                            <a href="javascript:;" class="btn red fileinput-exists" data-dismiss="fileinput"> Remove </a>
                                                        </div>
                                                 
                                                 
                                                </div>
                                                                    
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
                                                                <span class="fileinput-new"> Driving Licence Front </span>
                                                                <span class="fileinput-exists"> Change </span>
                                                                <input type="file"name="user_image2" > </span>
                                                            <a href="javascript:;" class="btn red fileinput-exists" data-dismiss="fileinput"> Remove </a>
                                                        </div>
                                                 
                                                 
                                                </div>
                                                                    
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
                                                                <span class="fileinput-new"> Driving Licence Back </span>
                                                                <span class="fileinput-exists"> Change </span>
                                                                <input type="file" name="a_driving_lic_back" > </span>
                                                            <a href="javascript:;" class="btn red fileinput-exists" data-dismiss="fileinput"> Remove </a>
                                                        </div>
                                                 
                                                 
                                                </div>
                                                                    
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
                                                                <span class="fileinput-new"> Other Docs 1</span>
                                                                <span class="fileinput-exists"> Change </span>
                                                                <input type="file" name="user_image3" > </span>
                                                            <a href="javascript:;" class="btn red fileinput-exists" data-dismiss="fileinput"> Remove </a>
                                                        </div>
                                                 
                                                 
                                                </div>
                                                                    
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
                                                                <span class="fileinput-new"> Other Docs 2</span>
                                                                <span class="fileinput-exists"> Change </span>
                                                                <input type="file" name="a_other_docs2" > </span>
                                                            <a href="javascript:;" class="btn red fileinput-exists" data-dismiss="fileinput"> Remove </a>
                                                        </div>
                                                 
                                                 
                                                </div>
                                                                    
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
                                                                <span class="fileinput-new"> Other Docs 3</span>
                                                                <span class="fileinput-exists"> Change </span>
                                                                <input type="file" name="a_other_docs3" > </span>
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
                                                     
                                                        <button type="submit"  class="btn yellow">
                                                            <i class="fa fa-check"></i>Add Agent</button>
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
                    
 <?php $this->load->view('footer');?>  