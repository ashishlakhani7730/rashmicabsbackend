<?php $this->load->view('header'); ?>

            <!-- END HEADER -->
            <div class="container-fluid">
                <div class="page-content">
                    <!-- BEGIN BREADCRUMBS -->
                    <div class="breadcrumbs">
                        <h1>Add New Booking Package</h1>
                        
                    </div>
                    <!-- END BREADCRUMBS -->
                    <!-- BEGIN PAGE BASE CONTENT -->
                 <div class="row">
                        <div class="col-md-12">
                          <div class="portlet light bordered">
                                            
                                            <div class="portlet-body form">
                                                <!-- BEGIN FORM-->
                                                <form action="<?php echo base_url();?>index.php/Package_management/insert_package" id="subscribeForm" method="post" class="horizontal-form">
                                                    <div class="form-body">
                                                      
                                                        <div class="row">
                                                        <div class="col-md-3">
                                                                <div class="form-group">
                                                                    <label class="control-label">Package Type</label><span class="required">*</span>
                                                                      <select name="p_type" id="p_id" class="form-control select2" required>
											
                                            <option></option>
											 <?php	foreach($package_type as $pt) { ?>
                                            
                                                <option value="<?php echo $pt->package_type_id?>"><?php echo $pt->package_type;?></option>
												
                                              <?php } ?>
                                            </optgroup>
                                        </select>
                                                                    
                                                                </div>
                                                            </div>
                                                            <!--/span-->
                                                            
                                                            <div class="col-md-3">
                                                                <div class="form-group">
                                                                    <label class="control-label">Package Sub Type</label><span class="required">*</span>
                                                                       <select name="sub_p_type" id="sub_p_id" class="form-control select2" required>
                                            
											                                            </optgroup>
                                        </select>
                                                                    
                                                                </div>
                                                            </div>
                                                            <!--/span-->
															 <div class="col-md-3">
                                                                <div class="form-group">
                                                                    <label class="control-label">Vehicle Category</label><span class="required">*</span>
                                                                    <select name="v_c_type" id="v_c_id" class="form-control select2" required>
																	 <option></option>
																	 <?php	foreach($vehicle_category as $v_cat) { ?>
																	 
																		 <option value="<?php echo $v_cat->id?>"><?php echo $v_cat->category_name;?></option>
                                     								 <?php } ?>      
                                            </optgroup>
                                        </select>
                                                                    
                                                                </div>
                                                            </div>
                                                            <!--/span-->
                                                             <div class="col-md-3">
                                                                <div class="form-group">
                                                                    <label class="control-label">From City<span class="required">*</span></label>
                                                                     <select name="city_name" id="city_id" class="form-control select2" required>
                                          							  <option></option>
																	 <?php	foreach($city_list as $city) { ?>
																	 
																			 <option value="<?php echo $city->id?>"><?php echo $city->c_name;?></option>
                                     								 <?php } ?>      
                                           
                                        </select>
                                                                    
                                                                </div>
                                                            </div>
                                                            <!--/span-->
															
															  <!--/span-->
                                                             <div class="col-md-3">
                                                                <div class="form-group">
                                                                    <label class="control-label">To City<span class="required">*</span></label>
                                                                     <select name="to_city_name" id="to_city_id" class="form-control select2" required>
                                          							  
                                        							</select>
                                                                    
                                                                </div>
                                                            </div>
                                                            <!--/span-->
															
															
                                                            <!--/span-->
                                                             <div class="col-md-3">
                                                                <div class="form-group">
                                                                    <label class="control-label">Package Rate<span class="required">*</span></label>
                                                           <input type="number" id="lastName" value="<?php  echo set_value('rate',0); ?>" name="rate" class="form-control"  min="0">          
                                                                    
                                                                </div>
                                                            </div>
                                                            <!--/span-->
                                                              <div class="col-md-3">
                                                                <div class="form-group">
                                                                    <label class="control-label">Minimum Km.<span class="required">*</span></label>
                                                           <input type="number" id="lastName" name="min_km" class="form-control" min="0" value="<?php  echo set_value('min_km',0); ?>">          
                                                                    
                                                                </div>
                                                            </div>
                                                            <!--/span-->
															 <div class="col-md-3">
                                                                <div class="form-group">
                                                                    <label class="control-label">Minimum Hr.<span class="required">*</span></label>
                                                                     
                                         <input type="number" id="lastName" name="min_hr"class="form-control" min="0" value="<?php  echo set_value('min_hr',0); ?>" >                                  
                                                                </div>
                                                            </div>
                                                            <!--/span-->
                                                             <div class="col-md-3">
                                                                <div class="form-group">
                                                                    <label class="control-label">Per Km./Extra Km. Rate<span class="required">*</span></label>
                                                                     
                                         <input type="number" id="lastName" name="extra_km_rate" class="form-control" min="0"value="<?php  echo set_value('extra_km_rate',0); ?>" >                                  
                                                                </div>
                                                            </div>
                                                            <!--/span-->
                                                               <div class="col-md-3">
                                                                <div class="form-group">
                                                                    <label class="control-label">Per Hr./Extra Hr. Rate<span class="required">*</span></label>
                                                                     
                                         <input type="number" id="lastName"name="extra_hr_rate"  class="form-control" min="0" value="<?php  echo set_value('extra_hr_rate',0); ?>">                                  
                                                                </div>
                                                            </div>
                                                            <!--/span-->
															 <div class="col-md-3">
                                                                <div class="form-group">
                                                                    <label class="control-label">Night Charge<span class="required">*</span></label>
                                                                     
                                         <input type="number" id="lastName" name="night_charge" class="form-control" min="0" value="<?php  echo set_value('night_charge',0); ?>">                                  
                                                                </div>
                                                            </div>
                                                            <!--/span-->
                                                            <div class="col-md-3">
                                                                <div class="form-group">
                                                                    <label class="control-label">Driver Allowance (24 Hour)<span class="required">*</span></label>
                                                                     
                                         <input type="number" id="lastName" name="driver_allowance" class="form-control" min="0" value="<?php  echo set_value('driver_allowance',0); ?>" >                                  
                                                                </div>
                                                            </div>
                                                            <!--/span-->
                                                              <div class="col-md-3">
                                                                <div class="form-group">
                                                                    <label class="control-label">Package Discount<span class="required">*</span></label>
																	
																	
                                                                     
                                         <div class="input-inline input-medium">
													 
                                                            <div class="input-group">
															
                                                                <span class="input-group-addon"><input type="checkbox" id="discount_id" name="discount_name" value="1" checked="checked" disabled="disabled" ></span>
																<input type="hidden" name="discount_name" value="1" />
                                                                    <input type="text" id="firstName" class="form-control"  name="discount"  width="70px" required>
                                                                 <span class="input-group-addon" id="discount_symbol"><i class='fa fa-rupee'></i></span>
                                                            </div>
															
                                                        </div>
														
														
														                                  
                                                                </div>
                                                            </div>
                                                            <!--/span-->
															  <div class="col-md-3">
                                                                <div class="form-group">
                                                                    <label class="control-label">Package Advance<span class="required">*</span></label>
                                               
											                         
                                      				 <div class="input-inline input-medium">
													 
                                                            <div class="input-group">
															
                                                				 <span class="input-group-addon"><input type="checkbox" value="1" id="package_id" name="package_name" checked="checked" disabled="disabled"></span>
																 	<input type="hidden" name="package_name" value="1" />
                                                                	 <input  type="text" class="form-control" name="advance" width="70px" required>                                                        
                                                                 <span class="input-group-addon" id="package_symbol"><i class='fa fa-rupee'></i></span>
                                                            </div>
															
                                                        </div>
														
														
                                  
                                                                </div>
                                                            </div>
                                                            <!--/span-->
                                                            <div class="col-md-3">
                                                                  <div class="form-group">
                                                <label>Ac/Non AC<span class="required">*</span></label>
                                                <div class="mt-radio-inline">
                                                    <label class="mt-radio">
                                                        <input type="radio" name="ac_status" id="optionsRadios4" value="1" checked> AC
                                                        <span></span>
                                                    </label>
                                                    <label class="mt-radio">
                                                        <input type="radio" name="ac_status" id="optionsRadios5" value="2"> NON-AC
                                                        <span></span>
                                                    </label>
                                                    
                                                </div>
                                            </div>
                                                            </div>
										<div class="col-md-12">
                                                                
                                                            </div>
															 
                                                      
                                                         
                                                        </div>
                                                        <!--/row-->
                                                     
                                                    </div>
                                                    <div class="form-actions right">
                                                     
                                                        <button type="submit" onclick="check_must()" class="btn yellow" >
                                                            <i class="fa fa-check"></i>Add Package</button>
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
<script>
$(document).ready(function ()
 {		
		$('select#v_c_id').change(function()
		{
			var p_id = $('#p_id option:selected').val();
			
			var sub_p_id = $('#sub_p_id option:selected').val();
			
			var v_c_id = $('#v_c_id option:selected').val();
			
			if(p_id!='' && sub_p_id!='' &&  v_c_id!='')
			{
				$.ajax(
				{
					url: '<?php echo base_url(); ?>index.php/Ajax_common/fetch_package_cities',
					type: 'post',
					data: {p_id:p_id,sub_p_id:sub_p_id,v_c_id:v_c_id},
					success: function(msg)
					{
						//alert(msg);
						$('#city_id').empty();
						$('#city_id').append(msg);
					}

                });
            }
		});
		
		
		$('select#city_id').change(function()
		{
			var p_id = $('#p_id option:selected').val();
			
			var sub_p_id = $('#sub_p_id option:selected').val();
			
			var v_c_id = $('#v_c_id option:selected').val();
			
			var city_id = $('#city_id option:selected').val();
			
			if(p_id!='' && sub_p_id!='' &&  v_c_id!='' && city_id!='')
			{
				$.ajax(
				{
					url: '<?php echo base_url(); ?>index.php/Ajax_common/get_to_cities',
					type: 'post',
					data: {p_id:p_id,sub_p_id:sub_p_id,v_c_id:v_c_id,city_id:city_id},
					success: function(msg)
					{
						//alert(msg);
						$('#to_city_id').empty();
						$('#to_city_id').append(msg);
					}

                });
            }
		});
		
		
		
		$("#discount_id").click(function()
		 {
			if($("#discount_id:checked").val() == "1") {
				$("#discount_symbol").html("<i class='fa fa-rupee'></i>");
			} else {
				$("#discount_symbol").html("<strong>%</strong>");
			}
		});
		
		$("#package_id").click(function()
		 {
		 	
			if($("#package_id:checked").val() == "1") {
				$("#package_symbol").html("<i class='fa fa-rupee'></i>");
			} else {
				$("#package_symbol").html("<strong>%</strong>");
			}
		});
		
		
		/*$('#subscribeForm').submit(function()
		  {
		 
			if ($(this).find('input[name="tax_on_package[]"]:checked').length == 0)
			 {
			  alert('Check Atleast One Tax Type!');
			  return false;
			}
		});*/
		
		$('#p_id').on('change', function()			  
		 {
			var sel_p = $(this).val();                 
			//alert(sel_p);
			console.log(sel_p);
			$.ajax(
			{   
				url: "<?php echo base_url();?>index.php/Ajax_common/get_sub_package", 
				async: false,
				type: "POST", 
				data: "sel_p="+sel_p,
				dataType: "html",                          
				
				success: function(data) 
				{
					//alert(data);
					$('#sub_p_id').empty();                         
					$('#sub_p_id').html(data);
				}
			});
		});
	
});

</script>
 <?php $this->load->view('footer'); ?>