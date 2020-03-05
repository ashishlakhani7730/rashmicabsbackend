<?php $this->load->view('header'); ?>

            <!-- END HEADER -->
            <div class="container-fluid">
                <div class="page-content">
                    <!-- BEGIN BREADCRUMBS -->
                    <div class="breadcrumbs">
                        <h1>Add RC Notes</h1>
                        
                    </div>
                    <!-- END BREADCRUMBS -->
                    <!-- BEGIN PAGE BASE CONTENT -->
                 <div class="row">
                        <div class="col-md-12">
                          <div class="portlet light bordered">
                                            
                                            <div class="portlet-body form">
                                                <!-- BEGIN FORM-->
                                                <form action="<?php echo base_url();?>index.php/Rc_notes_management/insert_rc_notes" id="subscribeForm" method="post" class="horizontal-form">
                                                    <div class="form-body">
                                                      
                                                        <div class="row">
                                                        
                                                            <!--/span-->
                                                              <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label class="control-label">Title<span class="required">*</span></label>
                                                           <input type="text" id="lastName"  name="title" class="form-control"  >          
                                                                    
                                                                </div>
                                                            </div>
															
															
                                                            <!--/span-->
															 <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label class="control-label">Description<span class="required">*</span></label>
                                                           <input type="text" id="lastName"  name="description" class="form-control"  >          
                                                                    
                                                                </div>
                                                            </div>
															
															
                                                            
                                                            <!--/span-->
															
                                                            
															
															 <!--/span-->
                                                            
												
                                                    </div>
													
                                                    <div class="form-actions right">
                                                     
                                                        <button type="submit" onclick="check_must()" class="btn yellow" >
                                                            <i class="fa fa-check"></i>Add RC Notes</button>
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
		});
		
		
		$('select#v_c_id').change(function()
		{
			
			var v_c_id = $('#v_c_id option:selected').val();
			
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