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
                                                <form id="subscribeForm" action="<?php echo base_url();?>index.php/Package_management/update_package" method="post" class="horizontal-form">
                                                    <div class="form-body">
                                                     
                                                        <div class="row">
                                                        <div class="col-md-3">
                                                                <div class="form-group">
                                                                    <label class="control-label">Package Type</label><span class="required">*</span>
                                                       <input type="hidden"  name="p_type" id="p_id" class="form-control" value="<?php echo $edit_package->p_type;?>">
													 <input type="text"class="form-control"  value="<?php echo $this->db->get_where('package_type',array('id'=>$edit_package->p_sub_type))->row()->package_type;?>" readonly>
										  
											
                                                                    
                                                                </div>
                                                            </div>
                                                            <!--/span-->
                                                            
                                                            <div class="col-md-3">
                                                                <div class="form-group">
                                                                    <label class="control-label">Package Sub Type</label><span class="required">*</span>
																	
																	
													 <input type="hidden" name="sub_p_type" id="sub_p_id" class="form-control" value="<?php echo $edit_package->p_sub_type;?>">
													 <input type="text" class="form-control" value="<?php echo $this->db->get_where('package_type',array('id'=>$edit_package->p_sub_type))->row()->package_sub_type;?>" readonly> 
													 
                                                                      
                                                                    
                                                                </div>
                                                            </div>
                                                            <!--/span-->
															 <div class="col-md-3">
                                                                <div class="form-group">
                                                                    <label class="control-label">Vehicle Category</label><span class="required">*</span>
													 <input type="hidden" name="v_c_type" id="v_c_id"  class="form-control" value="<?php echo $edit_package->p_v_category;?>">
													 <input type="text"class="form-control"  value="<?php echo $this->db->get_where('vehicle_category_detail',array('id'=>$edit_package->p_v_category))->row()->category_name;?>" readonly>
                                                                    
                                                                </div>
                                                            </div>
                                                            <!--/span-->
                                                             <div class="col-md-3">
                                                                <div class="form-group">
                                                                    <label class="control-label">From City<span class="required">*</span></label>
																	
													 <input type="hidden" id="city_id" name="city_name" class="form-control" value="<?php echo $edit_package->p_from_city;?>">
													 <input type="text"class="form-control"  value="<?php echo $this->db->get_where('city_detail',array('id'=>$edit_package->p_from_city))->row()->c_name;?>" readonly>
													 
													 
													 
                                                                    
                                                                </div>
                                                            </div>
                                                            <!--/span-->
															
															 <div class="col-md-3">
                                                                <div class="form-group">
                                                                    <label class="control-label">To City<span class="required">*</span></label>
																	
													 <input type="hidden" name="to_city_name" id="to_city_id" class="form-control" value="<?php echo $edit_package->p_to_city;?>">
													 <input type="text"class="form-control"  value="<?php if(!empty($edit_package->p_to_city)){echo $this->db->get_where('city_detail',array('id'=>$edit_package->p_to_city))->row()->c_name;}?>" readonly>
													 
													 
													 
                                                                    
                                                                </div>
                                                            </div>
                                                            <!--/span-->
															
															 
                                                            <!--/span-->
                                                             <div class="col-md-3">
                                                                <div class="form-group">
                                                                    <label class="control-label">Package Rate<span class="required">*</span></label>
                                                           <input type="number" id="lastName" value="<?php  echo set_value('rate',$edit_package->p_rate); ?>" name="rate" class="form-control"  min="0">          
                                                                    
                                                                </div>
                                                            </div>
                                                            <!--/span-->
                                                              <div class="col-md-3">
                                                                <div class="form-group">
                                                                    <label class="control-label">Minimum Km.<span class="required">*</span></label>
                                                           <input type="number" id="lastName" name="min_km" class="form-control" min="0" value="<?php  echo set_value('min_km',$edit_package->p_min_km); ?>">          
                                                                    
                                                                </div>
                                                            </div>
                                                            <!--/span-->
															 <div class="col-md-3">
                                                                <div class="form-group">
                                                                    <label class="control-label">Minimum Hr.<span class="required">*</span></label>
                                                                     
                                         <input type="number" id="lastName" name="min_hr"class="form-control" min="0" value="<?php  echo set_value('min_hr',$edit_package->p_min_hr); ?>" >                                  
                                                                </div>
                                                            </div>
                                                            <!--/span-->
                                                             <div class="col-md-3">
                                                                <div class="form-group">
                                                                    <label class="control-label">Per Km./Extra Km. Rate<span class="required">*</span></label>
                                                                     
                                         <input type="number" id="lastName" name="extra_km_rate" class="form-control" min="0"value="<?php  echo set_value('extra_km_rate',$edit_package->p_extra_km_rate); ?>" >                                  
                                                                </div>
                                                            </div>
                                                            <!--/span-->
                                                               <div class="col-md-3">
                                                                <div class="form-group">
                                                                    <label class="control-label">Per Hr./Extra Hr. Rate<span class="required">*</span></label>
                                                                     
                                         <input type="number" id="lastName"name="extra_hr_rate"  class="form-control" min="0" value="<?php  echo set_value('extra_hr_rate',$edit_package->p_extra_hr_rate); ?>">                                  
                                                                </div>
                                                            </div>
                                                            <!--/span-->
															 <div class="col-md-3">
                                                                <div class="form-group">
                                                                    <label class="control-label">Night Charge<span class="required">*</span></label>
                                                                     
                                         <input type="number" id="lastName" name="night_charge" class="form-control" min="0" value="<?php  echo set_value('night_charge',$edit_package->p_night_charge); ?>">                                  
                                                                </div>
                                                            </div>
                                                            <!--/span-->
                                                            <div class="col-md-3">
                                                                <div class="form-group">
                                                                    <label class="control-label">Driver Allowance (24 Hour)<span class="required">*</span></label>
                                                                     
                                         <input type="number" id="lastName" name="driver_allowance" class="form-control" min="0" value="<?php  echo set_value('driver_allowance',$edit_package->p_driver_allowance); ?>" >                                  
                                                                </div>
                                                            </div>
                                                            <!--/span-->
                                                              <div class="col-md-3">
                                                                <div class="form-group">
                                                                    <label class="control-label">Package Discount<span class="required">*</span></label>
																	
																	
                                                                     
                                         <div class="input-inline input-medium">
													 
                                                            <div class="input-group">
															
															 <?php if($edit_package->p_discount_type==1) { ?>
															 
															 
															
                                                                <span class="input-group-addon"><input type="checkbox" id="discount_id" name="discount_name" value="1" checked disabled="disabled" ></span>
																<input type="hidden" name="discount_name" value="1" />
                                                                    <input type="text" id="firstName" class="form-control"  name="discount"  width="70px" value="<?php echo set_value('discount',$edit_package->p_discount);?>">
																	
                                                                	  <span class="input-group-addon" id="discount_symbol"><i class='fa fa-rupee'></i></span>
															<?php } else { ?>
															
															
															
															 <span class="input-group-addon"><input type="checkbox" id="discount_id" name="discount_name" value="1" ></span>
                                                                    <input type="text" id="firstName" class="form-control"  name="discount"  width="70px" value="<?php echo set_value('discount',$edit_package->p_discount);?>">
																	
                                                                	  <span class="input-group-addon" id="discount_symbol"><strong>%</strong></span>
																	 
																	 
															<?php } ?>
																	 
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
															
															 <?php if($edit_package->p_advance_type==1) { ?>															 
															
                                                                <span class="input-group-addon">
																
																<input type="checkbox" value="1" id="package_id" name="package_name" checked disabled="disabled" ></span>		
																<input type="hidden" name="package_name" value="1" />
                                                                    <input  type="text" class="form-control" name="advance" width="70px" value="<?php echo set_value('advance',$edit_package->p_advance);?>">
																	
                                                                 <span class="input-group-addon" id="package_symbol"><i class='fa fa-rupee'></i></span>
																 
																 <?php } else { ?>
																 
																 
																 <span class="input-group-addon">
																
																<input type="checkbox" value="1" id="package_id" name="package_name" ></span>
                                                                    <input  type="text" class="form-control" name="advance" width="70px" value="<?php echo set_value('advance',$edit_package->p_advance);?>">
																	
                                                                 <span class="input-group-addon" id="package_symbol"><strong>%</strong></span>
																 
																 <?php } ?>
																 
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
                                                        <input type="radio" name="ac_status" id="optionsRadios4" value="1" <?php if($edit_package->p_ac_status==1){ ?> checked <?php } ?>> AC
                                                        <span></span>
                                                    </label>
                                                    <label class="mt-radio">
                                                        <input type="radio" name="ac_status" id="optionsRadios5" value="2" <?php if($edit_package->p_ac_status==2){ ?> checked <?php } ?>> NON-AC
                                                        <span></span>
                                                    </label>
                                                    
                                                </div>
                                            </div>
                                                            </div>
										<div class="col-md-12">
                                                                  <div class="form-group">
                                                <label>TAX On Packages<span class="required">*</span></label>
                                                <div class="mt-checkbox-inline">
												
												<?php $data='';  ?>
												
												
												 <?php $count=1; foreach($tax_list as $row)
												  {
												  	$chk_tax = explode(',',$edit_package->p_tax_on_package);
													
													
													for($i=0;$i<sizeof($chk_tax);$i++)
													{
														if($row->id==$chk_tax[$i])
														{
															
															$data = "checked";
														}
													}?>
												 	
												 
                                                    <label class="mt-checkbox">
													
	<input type="checkbox" name="tax_on_package[]" value="<?php echo $row->id;?>" <?php echo $data;?> > <?php echo $row->t_name;?> 
													
                                                        <span></span>
														
                                                    </label>
													
                                                   <?php $data="";} ?>  
												                                                  
                                                </div>
                                            </div>
                                       </div>
															 
                                                      
                                                         
                                                        </div>
                                                        <!--/row-->
                                                     
                                                    </div>
                                                    <div class="form-actions right">
                                                     
                                                        <button type="submit" name="update_package_id" value="<?php echo $edit_package->id; ?>" class="btn yellow">
                                                            <i class="fa fa-check"></i>Update Package</button>
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
			url: "<?php echo base_url();?>index.php/Package_management/get_sub_package", 
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