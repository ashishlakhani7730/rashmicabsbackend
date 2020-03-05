<?php $this->load->view('header'); ?>

            <!-- END HEADER -->
            <div class="container-fluid">
                <div class="page-content">
                    <!-- BEGIN BREADCRUMBS -->
                    <div class="breadcrumbs">
                        <h1>Edit Oneway Offer</h1>
                        
                    </div>
                    <!-- END BREADCRUMBS -->
                    <!-- BEGIN PAGE BASE CONTENT -->
                 <div class="row">
                        <div class="col-md-12">
                          <div class="portlet light bordered">
                                            
                                            <div class="portlet-body form">
                                                <!-- BEGIN FORM-->
                                                <form id="subscribeForm" action="<?php echo base_url();?>index.php/Oneway_offer_management/update_oneway_offer" method="post" class="horizontal-form">
                                                    <div class="form-body">
                                                     
                                                        <div class="row">
                                                        
															 <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label class="control-label">Agent<span class="required">*</span></label>
																	
													 <input type="hidden" id="agent_id" name="agent_id" class="form-control" value="<?php echo $edit_oneway_offer->oo_agent_id;?>">
													 <input type="text"class="form-control"  value="<?php echo $this->db->get_where('agent_detail',array('id'=>$edit_oneway_offer->oo_agent_id))->row()->a_full_name;?>" readonly>
													 
													 
													 
                                                                    
                                                                </div>
                                                            </div>
                                                            <!--/span-->
															 <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label class="control-label">Vehicle Category</label><span class="required">*</span>
													 <input type="hidden" name="v_c_id" id="v_c_id"  class="form-control" value="<?php echo $edit_oneway_offer->oo_vc_id;?>">
													 <input type="text"class="form-control"  value="<?php echo $this->db->get_where('vehicle_category_detail',array('id'=>$edit_oneway_offer->oo_vc_id))->row()->category_name;?>" readonly>
                                                                    
                                                                </div>
                                                            </div>
															
															<!--/span-->
															<div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label class="control-label">Vehicle Type</label><span class="required">*</span>
                                                                   
                                                                    <input type="hidden" name="v_t_id" id="v_t_id"  class="form-control" value="<?php echo $edit_oneway_offer->oo_vc_id;?>">
													 <input type="text"class="form-control"  value="<?php echo $this->db->get_where('vehicle_detail',array('id'=>$edit_oneway_offer->oo_vt_id))->row()->v_name; $vehicle_list=$this->db->get_where('vehicle_list',array('id'=>$edit_oneway_offer->oo_vehicle_id))->row();if(!empty($vehicle_list)){ echo " - ".$vehicle_list->v_register_no;}?>" readonly>
                                                                </div>
                                                            </div>
															 <!--/span-->
															 
                                                            <!--/span-->
                                                             <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label class="control-label">First City<span class="required">*</span></label>
																	
													 <input type="hidden" id="f_city_id" name="f_city_name" class="form-control" value="<?php echo $edit_oneway_offer->oo_first_city;?>">
													 <input type="text"class="form-control"  value="<?php echo $this->db->get_where('city_detail',array('id'=>$edit_oneway_offer->oo_first_city))->row()->c_name;?>" readonly>
													 
													 
													 
                                                                    
                                                                </div>
                                                            </div>
                                                            <!--/span-->
															<div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label class="control-label">Second City<span class="required">*</span></label>
																	
													 <input type="hidden" id="s_city_id" name="s_city_name" class="form-control" value="<?php echo $edit_oneway_offer->oo_second_city;?>">
													 <input type="text"class="form-control"  value="<?php echo $this->db->get_where('city_detail',array('id'=>$edit_oneway_offer->oo_second_city))->row()->c_name;?>" readonly>
													 
													 
													 
                                                                    
                                                                </div>
                                                            </div>
                                                            <!--/span-->
															<div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label class="control-label">Third City<span class="required">*</span></label>
																	
													 <input type="hidden" id="t_city_id" name="t_city_name" class="form-control" value="<?php echo $edit_oneway_offer->oo_third_city;?>">
													 <input type="text"class="form-control"  value="<?php if($edit_oneway_offer->oo_third_city != 0){ echo $this->db->get_where('city_detail',array('id'=>$edit_oneway_offer->oo_third_city))->row()->c_name;} else { echo "N/A"; }?>" readonly>
													 
													 
													 
                                                                    
                                                                </div>
                                                            </div>
                                                            <!--/span-->
															
															 
                                                            <!--/span-->
                                                            
                                                        <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label class="control-label">Valid Date </label><span class="required">*</span>
                                                                    <input class="form-control form-control-inline date-picker" size="16" type="text" id="valid_date" name="valid_date" data-date-format="dd-mm-yyyy" data-date-start-date="+0d" value="<?php echo date('d-m-Y',strtotime($edit_oneway_offer->oo_valid_date)); ?>" required/>   
                                                                    
                                                                </div>
                                                            </div>
													 
													 
                                               
													
													<div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label class="control-label">Valid From Time </label><span class="required">*</span>
                                                                    <div class="input-group">
       																<input type="text" class="form-control form-control-inline timepicker timepicker-no-seconds" required id="valid_from_time" name="valid_from_time" value="<?php echo date('h:i A',strtotime($edit_oneway_offer->oo_valid_from_time)); ?>">	
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
       																<input type="text" class="form-control form-control-inline timepicker timepicker-no-seconds" required id="valid_to_time" name="valid_to_time" value="<?php echo date('H:i A',strtotime($edit_oneway_offer->oo_valid_to_time)); ?>">	
                                                                    <span class="input-group-btn">
                                                                        <button class="btn default" type="button">
                                                                            <i class="fa fa-clock-o"></i>
                                                                        </button>
                                                                    </span>
                                                                </div>        
                                                                </div>
                                                            </div>
													 
													     
										
															 
                                                      
                                                         
                                                        
                                                        <!--/row-->
                                                     
                                                    </div>
                                                    <div class="form-actions right">
                                                     
                                                        <button type="submit" name="update_oneway_offer_id" value="<?php echo $edit_oneway_offer->id; ?>" class="btn yellow">
                                                            <i class="fa fa-check"></i>Update Oneway Offer</button>
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