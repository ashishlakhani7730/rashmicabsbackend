<?php $this->load->view('header');?>
 <!-- END HEADER -->
            <div class="container-fluid">
                <div class="page-content">
                    <!-- BEGIN BREADCRUMBS -->
                    <div class="breadcrumbs">
                        <h1>Edit Oneway Route</h1>
                        
                    </div>
                    <!-- END BREADCRUMBS -->
                    <!-- BEGIN PAGE BASE CONTENT -->
                 <div class="row">
                        <div class="col-md-12">
                          <div class="portlet light bordered">
                                            
                                            <div class="portlet-body form">
                                                <!-- BEGIN FORM-->
                                                <form action="<?php echo base_url();?>index.php/Oneway_city_route_list/edit_city_route" method="post" class="horizontal-form">
                                                    <div class="form-body">
                                                      <input type="hidden" name="cr_id" value="<?php echo $city_route_list->id; ?>" />
                                                        <div class="row">
														 <?php $msg = $this->session->flashdata('error');
															if($msg['error'] != ''){
															?>
																<div class="col-md-12">
																	<p style="color:red; "><strong><?php echo $msg['error']; ?></strong></p>
																</div>
																<?php  } ?>
                                                        <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label class="control-label">Source City</label><span class="required">*</span>
                                                                    <select class="form-control select2" name="source_city" id="source_city"  data-placeholder="Choose a Category" tabindex="1" required>
                                                    <option></option>
												 	 <?php foreach($city_list as $c) { ?>
												  
												  	 <option value="<?php echo $c->id;?>" <?php if($city_route_list->cr_from_city==$c->id){?> selected="selected"<?php }?>><?php echo $c->c_name;?></option>
																															
												 	 <?php } ?>
													           
															</select>
                                                                    
                                                                </div>
                                                            </div>
                                                            <!--/span-->
                                                            
                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label class="control-label">Destination City</label><span class="required">*</span>
                                                                      <select class="form-control select2" name="destination_city" id="destination_city"  data-placeholder="Choose a Category" tabindex="1" required>
													<option value="" >Select City</option>
																           
															</select>
                                                                    
                                                                </div>
                                                            </div>
															
															<div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label class="control-label">Discount<span class="required">*</span></label>
																	
																	
                                                                     
                                         <div class="input-medium">
													 
                                                            <div class="input-group">
															
                                                                <span class="input-group-addon"><input type="checkbox" id="discount_id" name="discount_name" value="1" <?php if($city_route_list->cr_discount_type==1){ ?> checked="checked"<?php }?>></span>
                                                                    <input type="text" id="firstName" class="form-control"  name="discount"  width="70px" value="<?php echo $city_route_list->cr_discount; ?>" required >
                                                                 <span class="input-group-addon" id="discount_symbol"><strong>%</strong></span>
                                                            </div>
															
                                                        </div>
														
														
														                                  
                                                                </div>
                                                            </div>
                                                            <!--/span-->
                                                         
                                                            </div>
                                                             
                                                            
                                                            
                                                             
															
															
														
                                        		
                                                                   
                                                        <!--/row-->
                                                     
                                                    </div>
                                                    <div class="form-actions right">
                                                     
                                                        <button type="submit" class="btn yellow">
                                                            <i class="fa fa-check"></i>Edit City Route</button>
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
 $(document).ready(function()
 {
 		get_source_city();
        $("select#source_city").change(function()
		{			
            get_source_city();
   		 });
		 
		 if($("#discount_id:checked").val() == "1") {
				$("#discount_symbol").html("<i class='fa fa-rupee'></i>");
		 } else {
				$("#discount_symbol").html("<strong>%</strong>");
		 }
		 
		 $("#discount_id").click(function()
		 {
			if($("#discount_id:checked").val() == "1") {
				$("#discount_symbol").html("<i class='fa fa-rupee'></i>");
			} else {
				$("#discount_symbol").html("<strong>%</strong>");
			}
		});
 });
 
 function get_source_city(){
 
 var source_city_id = $("#source_city option:selected").val();
 var dest_city_id =<?php echo $city_route_list->cr_to_city; ?>;
           
			$.ajax({
                url: '<?php echo base_url();?>index.php/Oneway_city_route_list/fetch_destination_city',
                type: 'post',
                data: {source_city_id : source_city_id, dest_city_id:dest_city_id},
                success: function(msg)
                {
					$('#destination_city').empty();
                    $('#destination_city').append(msg);

                }
              });
 
 }
</script>
<?php $this->load->view('footer');?>