<?php $this->load->view('header'); ?>

            <!-- END HEADER -->
            <div class="container-fluid">
                <div class="page-content">
                    <!-- BEGIN BREADCRUMBS -->
                    <div class="breadcrumbs">
                        <h1>Add Oneway Offer</h1>
                        
                    </div>
                    <!-- END BREADCRUMBS -->
                    <!-- BEGIN PAGE BASE CONTENT -->
                 <div class="row">
                        <div class="col-md-12">
                          <div class="portlet light bordered">
                                            
                                            <div class="portlet-body form">
                                                <!-- BEGIN FORM-->
                                                <form action="<?php echo base_url();?>index.php/Oneway_offer_management/insert_oneway_offer" id="subscribeForm" method="post" class="horizontal-form">
                                                    <div class="form-body">
                                                      
                                                        <div class="row">
                                                        
                                                            <!--/span-->
                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label class="control-label">Agents </label><span class="required">*</span>
                                                                    <select name="agent_id" id="agent_id" class="form-control select2" required>
																	 <option></option>
																	 <?php	foreach($agent_list as $al) { ?>
																	 
																		 <option value="<?php echo $al->id?>"><?php echo $al->a_full_name;?></option>
                                     								 <?php } ?>      
                                            </optgroup>
                                        </select>
                                                                    
                                                                </div>
                                                            </div>
                                                            <!--/span-->
                                                            
                                                            <!--/span-->
															 <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label class="control-label">Vehicle Category</label><span class="required">*</span>
                                                                    <select name="v_c_id" id="v_c_id" class="form-control select2" required>
																	 <option></option>
																	 <!--<?php	//foreach($vehicle_category as $v_cat) { ?>
																	 
																		 <option value="<?php //echo $v_cat->id?>"><?php //echo $v_cat->category_name;?></option>
                                     								 <?php ///} ?>      
                                            </optgroup> -->
                                        </select>
                                                                    
                                                                </div>
                                                            </div>
                                                            <!--/span-->
															<div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label class="control-label">Vehicle Type</label><span class="required">*</span>
                                                                    <select name="v_t_id" id="v_t_id" class="form-control select2" required>
																	 <option></option>
																	     
                                            </optgroup>
                                        </select>
                                                                    
                                                                </div>
																<input type="hidden" id="vehicle_list_id" name="vehicle_list_id" />
                                                            </div>
															 <!--/span-->
															 
															 
															 
                                                             <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label class="control-label">First City<span class="required">*</span></label>
                                                                     <select name="f_city_name" id="f_city_id" class="form-control select2" required>
                                          							  <option></option>
																	 <?php	foreach($city_list as $city) { ?>
																	 
																			 <option value="<?php echo $city->id?>"><?php echo $city->c_name;?></option>
                                     								 <?php } ?>      
                                            </optgroup>
                                        </select>
                                                                    
                                                                </div>
                                                            </div>
                                                            <!--/span-->
															
															 <!--/span-->
                                                             <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label class="control-label">Second City<span class="required">*</span></label>
                                                                     <select name="s_city_name" id="s_city_id" class="form-control select2" required>
                                          							  <option></option>
																	 <?php	foreach($city_list as $city) { ?>
																	 
																			 <option value="<?php echo $city->id?>"><?php echo $city->c_name;?></option>
                                     								 <?php } ?>      
                                            </optgroup>
                                        </select>
                                                                    
                                                                </div>
                                                            </div>
                                                            <!--/span-->
															
															
															 <!--/span-->
                                                             <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label class="control-label">Third City<span class="required"></span></label>
                                                                     <select name="t_city_name" id="t_city_id" class="form-control select2" >
                                          							  <option></option>
																	 <?php	foreach($city_list as $city) { ?>
																	 
																			 <option value="<?php echo $city->id?>"><?php echo $city->c_name;?></option>
                                     								 <?php } ?>      
                                            </optgroup>
                                        </select>
                                                                    
                                                                </div>
                                                            </div>
                                                            <!--/span-->
															
															
															 
															  
                                                           
                                              
														
														
														
														
													 
													 <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label class="control-label">Valid Date </label><span class="required">*</span>
                                                                    <input class="form-control form-control-inline date-picker" size="16" type="text" id="valid_date" name="valid_date" data-date-format="dd-mm-yyyy" data-date-start-date="+0d" value="" required/>   
                                                                    
                                                                </div>
                                                            </div>
													 
													 
                                               
													
													<div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label class="control-label">Valid From Time </label><span class="required">*</span>
                                                                    <div class="input-group">
       																<input type="text" class="form-control form-control-inline timepicker timepicker-no-seconds" required id="valid_from_time" name="valid_from_time">	
                                                                    <span class="input-group-btn">
                                                                        <button class="btn default" type="button">
                                                                            <i class="fa fa-clock-o"></i>
                                                                        </button>
                                                                    </span>
                                                                </div>        
                                                                </div>
                                                            </div>
													 
													 
                                                 
													
													<div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label class="control-label">Valid To Time </label><span class="required">*</span>
                                                                    <div class="input-group">
       																<input type="text" class="form-control form-control-inline timepicker timepicker-no-seconds" required id="valid_to_time" name="valid_to_time" >	
                                                                    <span class="input-group-btn">
                                                                        <button class="btn default" type="button">
                                                                            <i class="fa fa-clock-o"></i>
                                                                        </button>
                                                                    </span>
                                                                </div>        
                                                                </div>
                                                            </div>
													 
													 
                                               
													 
													 
                                                    </div>
													
                                                    <div class="form-actions right">
                                                     
                                                        <button type="submit" onclick="check_must()" class="btn yellow" >
                                                            <i class="fa fa-check"></i>Add Oneway Offer</button>
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
		$('select#v_t_id').change(function()
		{
			
			var v_c_id = $('#v_c_id option:selected').val();
			
			if( v_c_id!='')
			{
				$.ajax(
				{
					url: '<?php echo base_url(); ?>index.php/Ajax_common/fetch_package_cities',
					type: 'post',
					data: {v_c_id:v_c_id},
					success: function(msg)
					{
						//alert(msg);
					
						$('#f_city_id').html(msg);
						$('#s_city_id').html(msg);
						$('#t_city_id').html(msg);
					}

                });
            }
			set_vehicle_data();
		});
		
		
		$('select#v_c_id').change(function()
		{
			
			/*var v_c_id = $('#v_c_id option:selected').val();
			
			if( v_c_id!='')
			{
				$.ajax(
				{
					url: '<?php echo base_url(); ?>index.php/Ajax_common/fetch_vehicle_type',
					type: 'post',
					data: {v_c_id:v_c_id},
					success: function(msg)
					{
						//alert(msg);
					
						$('#v_t_id').html(msg);
						
					}

                });
            }*/
			get_vehicle_type_data();
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
		$('select#agent_id').change(function()
		{
			get_vehicle_data();
		});
	
});

function get_vehicle_data(){
	var agent_id = $("#agent_id option:selected").val();
	
                 
	$.ajax({
                url: '<?php echo base_url(); ?>index.php/Ajax_common/get_vehicle_data',
                type: 'post',
                data: {agent_id : agent_id},
                success: function(msg)
                {
					$('#v_c_id').empty();
					$('#v_c_id').html(msg);
					
                }
    });
}
function get_vehicle_type_data(){
		$('#vehicle_list_id').val('');
		var agent_id = $("#agent_id option:selected").val();
		var cat_id = $("#v_c_id option:selected").val();
		
		$.ajax({
					url: '<?php echo base_url(); ?>index.php/Ajax_common/get_vehicle_type_data',
					type: 'post',
					data: {agent_id : agent_id, cat_id : cat_id},
					success: function(msg)
					{
						$('#v_t_id').empty();
						$('#v_t_id').html(msg);
						set_vehicle_data();
					}
		});
}
function set_vehicle_data(){
	var vehicle_list_id = $("#v_t_id option:selected").data('vehicle_list_id');
	//alert(vehicle_list_id);	
	$('#vehicle_list_id').val(vehicle_list_id);
	
}
</script>
 <?php $this->load->view('footer'); ?>