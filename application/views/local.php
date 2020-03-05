<?php $this->load->view('header');?>
            <!-- END HEADER -->
            <div class="container-fluid">
                <div class="page-content">
                    <!-- BEGIN BREADCRUMBS -->
                    <div class="breadcrumbs">
                        <h1>Local Booking</h1>
                        
                    </div>
                    <!-- END BREADCRUMBS -->
                    <!-- BEGIN PAGE BASE CONTENT -->
                 <div class="row">
                        <div class="col-md-12">
                         <div class="portlet-body form">
                                              <div class="portlet light bordered" id="form_wizard_1">
                                            
                                            <div class="portlet-body form">
                                                <form class="form-horizontal" action="#" id="submit_form" method="POST">
                                                    <div class="form-wizard">
                                                        <div class="form-body">
                                                            <ul class="nav nav-pills nav-justified steps">
                                                                <li>
                                                                    <a href="#tab1" data-toggle="tab" class="step">
                                                                        <span class="number"> 1 </span>
                                                                        <span class="desc">
                                                                            <i class="fa fa-check"></i> Search Cabs </span>
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <a href="#tab2" data-toggle="tab" class="step">
                                                                        <span class="number"> 2 </span>
                                                                        <span class="desc">
                                                                            <i class="fa fa-check"></i> Select Cab </span>
                                                                    </a>
                                                                </li>
                                                               
                                                                <li>
                                                                    <a href="#tab4" data-toggle="tab" class="step">
                                                                        <span class="number"> 4 </span>
                                                                        <span class="desc">
                                                                            <i class="fa fa-check"></i> Book Cab </span>
                                                                    </a>
                                                                </li>
                                                            </ul>
                                                            <div id="bar" class="progress progress-striped" role="progressbar">
                                                                <div class="progress-bar progress-bar-success"> </div>
                                                            </div>
                                                            <div class="tab-content">
                                                                <div class="alert alert-danger display-none">
                                                                    <button class="close" data-dismiss="alert"></button> You have some form errors. Please check below. </div>
                                                                <div class="alert alert-success display-none">
                                                                    <button class="close" data-dismiss="alert"></button> Your form validation is successful! </div>
                                                                <div class="tab-pane active" id="tab1">
                                                                    <h3 class="block">Search Cabs</h3>
																	
																	
																	
												<div class="form-group">
													<label class="control-label col-md-3">Booking Sub Type <span class="required">
													* </span>
													</label>
													 <div class="col-md-6">
														<div class="mt-radio-list">
												                                                <label class="mt-radio-inline">
                                                <input type="radio" name="booking_sub_type" id="1" value="5" > 4 HOURS 4/40 </label>
                                                                                                <label class="mt-radio-inline">
                                                <input type="radio" name="booking_sub_type" id="2" value="6"> 8 HOURS 8/80 </label>
                                                                                                <label class="mt-radio-inline">
                                                <input type="radio" name="booking_sub_type" id="3" value="7" > 12 HOURS 12/120 </label>
                                                		</div>
													</div>
												</div>

                                                                    <div class="form-group">
                                                                        <label class="control-label col-md-3">From City
                                                                            <span class="required"> * </span>
                                                                        </label>
                                                                        <div class="col-md-4">
                                                                      <select onfocus="initialize()" id="b_from_city" name="b_from_city_name" class="form-control select2" required>                                            <option></option>
																	 <?php foreach($city_list as $c) {?>
																	 
																	  	 <option value="<?php echo $c->id;?>"><?php echo $c->c_name;?></option>
																	 <?php } ?>
                                            </optgroup>
                                        </select>
                                                                        </div>
                                                                    </div>
                                                                    
                                                                    <div class="form-group">
                                                                        <label class="control-label col-md-3">Travel Date
                                                                            <span class="required"> * </span>
                                                                        </label>
                                                                        <div class="col-md-4">
                                                                      <input class="form-control form-control-inline date-picker" size="16" type="text" data-date-format="dd-mm-yyyy" data-date-start-date="+0d" value="" id="travel_date" required/>                     </div>
                                                                    </div>
                                                                   
                                                                    <div class="form-group">
                                                                        <label class="control-label col-md-3">Trip Start Time
                                                                            <span class="required"> * </span>
                                                                        </label>
                                                                        <div class="col-md-4">
                                                                     <div class="input-group">
                                                                    <input type="text" class="form-control timepicker timepicker-no-seconds" id="start_time" required>
                                                                    <span class="input-group-btn">
                                                                        <button class="btn default" type="button">
                                                                            <i class="fa fa-clock-o"></i>
                                                                        </button>
                                                                    </span>
                                                                </div>                    </div>
                                                                    </div>
                                                                    
                                                                    
                                                                    
                                                                </div>
                                                                <div class="tab-pane" id="tab2">
                                                                    <h3 class="block">Select Cab</h3>
                                                                    
                                                                    <div class="row margin-top-20">
                                                <div class="col-md-12">
                                                <table class="table table-responsive " border="0" align="center">
							<thead id="package_data">
							
                            
                            
							</thead>
                            </table>
                              
                                                </div>
											</div>	
                                                                    
                                                                </div>
                                                                
                                                                <div class="tab-pane" id="tab4">
                                                                    <h3 class="block">Confirm Book Cab</h3>
																<div class="note note-danger" id="booking_validation_message" > </div>
                                                                    <h4 class="form-section">Passenger Details</h4>
                                                                    <div class="form-group">
                                                                        <label class="control-label col-md-3">Select Passenger
                                                                            <span class="required"> * </span>
                                                                        </label>
                                                                        <div class="col-md-4">
                                                                      <select class="form-control select2" data-placeholder="Choose a Category" tabindex="1" name="b_p_id" id="b_p_id" required>
																   
																<option value="">Select Passenger</option>
																
                                                                <?php foreach($passenger_list as $p){?>
																
                                                                <option value="<?php echo $p->id?>" p_full_name="<?php echo $p->p_full_name;?>" p_contact="<?php echo $p->p_contact;?>"> <?php echo $p->p_full_name." - ".$p->p_contact;?></option>
																	
                                                                <?php }?>
																
                                                                
																</select>
                                        <a href="#new_passn" class="btn" data-toggle="modal"><i class="icon-plus"></i> New Passenger</a>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="control-label col-md-3">Traveller Name
                                                                            <span class="required"> * </span>
                                                                        </label>
                                                                        <div class="col-md-4">
                                                                       <input type="text" id="b_p_name" name="b_p_name" class="form-control" required>
                                                                        <span>
                                           <input type="checkbox" id="self_travel" name="self_travel" value="1"> Self Travel </span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="control-label col-md-3">Traveller Mo#
                                                                            <span class="required"> * </span>
                                                                        </label>
                                                                        <div class="col-md-4">
                                                                    <input type="text" id="b_p_contact" name="b_p_contact" class="form-control" required>
                                                                    </div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="control-label col-md-3">Pickup Point
                                                                            <span class="required"> * </span>
                                                                        </label>
                                                                        <div class="col-md-4">
                                                                    <input type="text" id="pickup_point" name="b_pickup_point" class="form-control" required>
                                                                    </div>
                                                                    </div>
																	<div class="form-group">
                                                                        <label class="control-label col-md-3">Drop Point
                                                                            <span class="required"> * </span>
                                                                        </label>
                                                                        <div class="col-md-4">
                                                                    <input type="text" id="drop_point" name="b_drop_point" class="form-control" required>
                                                                    </div>
                                                                    </div>
                                                                      <div class="form-group">
                                                                        <label class="control-label col-md-3">Advance Pay
                                                                            <span class="required"> * </span>
                                                                        </label>
                                                                        <div class="col-md-4">
                                                                    <input type="text" id="b_advance" name="b_advance" class="form-control" required>
                                                                    </div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="control-label col-md-3">Pay Type
                                                                            <span class="required"> * </span>
                                                                        </label>
                                                                        <div class="col-md-4">
                                                                   <select id="b_payment_type" class="form-control select2" required>
                                            <option></option>
                                            <?php foreach($payment_type as $pt) {?>
                                                <option value="<?php echo $pt->id;?>"><?php echo $pt->payment_name;?></option>
                                               <?php } ?>
                                            </optgroup>
                                        </select>
                                                                    </div>
                                                                  </div>
                                                                     <div class="form-group">
                                                                        <label class="control-label col-md-3">Notes
                                                                      
                                                                        </label>
                                                                        <div class="col-md-4">
                                                                    <input type="text" id="b_remarks" class="form-control" >
																	
														 <input type="hidden" id="package_id" class="form-control" >
														 <input type="hidden" id="total_estimated_rate" class="form-control" >
														 <input type="hidden" id="night_charge_status" class="form-control" >
                                                         <input type="hidden" id="hiden_advance" />
                                                                    </div>
                                                                    
                                                                  </div>
                                                                    
                                                            
                                                          
                                                                    
                                                                    <h4 class="form-section">Package Details</h4>
                                                                     <div class="col-md-12">
                                            <div class="col-md-6">
                                             <table class="table table-striped" border="0"  >
                        
                        <tbody id="selected_package_detail_1">
                      
                                  
                        
                        </tbody>
                        </table>
                                            
                                            </div>
                                            
                                            <div class="col-md-6">
                                             <table class="table table-striped" border="0"  >
                        
                       <tbody id="selected_package_detail_2" >
                      
                           
                               
                        
                        </tbody>
                        </table>
                                            
                                            </div>
                                            
                                            </div>
                                         
                                                                </div>
                                                                </div> 
                                                            </div>
                                                        </div>
                                                        <div class="form-actions">
                                                            <div class="row">
                                                                <div class="col-md-offset-3 col-md-9">
                                                                    <a href="javascript:;" class="btn default button-previous">
                                                                        <i class="fa fa-angle-left"></i> Back </a>
                                                                    <a href="javascript:;" onClick="get_package()" class="btn btn-outline green button-next"> Continue
                                                                        <i class="fa fa-angle-right"></i>
                                                                    </a>
                                                                    <a href="javascript:;" onclick="return confirm_local_booking();" class="btn green button-submit"> Submit
                                                                        <i class="fa fa-check"></i>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
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
				
				
				
				 <div id="new_passn" class="modal fade"  aria-hidden="true">
		   
                    <div class="modal-dialog">
                       <div class="modal-content">
                          <div class="modal-header">
                             <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                            	 <h4 class="modal-title">Add Passenger</h4>
                          </div>
						  
                          <div class="modal-body">
                            <div id="passenger_validation_message" class="alert alert-danger" style="display: none"></div>
                           	 <div class="form-body">
                               <div class="form-group">
                                  <label >Name<span class="text-danger">*</span></label>
                                  <input type="text" class="form-control" id="p_w_name" name="p_w_name" required>
                               </div>
                                <div class="form-group">
                                  <label >Mobile Number<span class="text-danger">*</span></label>
                                  <input type="text" class="form-control" id="p_w_contact" name="txtfname" required>
                               </div>
                               <div class="form-group">
                                  <label >Email ID<span class="text-danger">*</span></label>
                                  <input type="text" class="form-control" id="p_w_email_id" name="p_w_email_id" onblur="checkEmailID()" required>
                               </div>
                               <div class="form-group">
                                  <label >City</label>
                                   <select class="form-control select2" data-placeholder="Choose a Category" id="p_w_city" tabindex="1">
																 <option value="" >Select City</option>
																 
                                                    <?php foreach($all_city as $c)
                                                		{?>
														
														<option value="<?php echo $c->city_name;?>" ><?php echo $c->city_name;?></option>
													<?php } ?>  
                                                                
								</select>
                               </div>
                               <div class="form-group">
                                  <label >Gender <span class="text-danger">*</span></label>
								<div class="row">
                                  <div class="mt-radio-list">
								   <div class="form-group">
										 <label class="mt-radio-inline">
										 <input type="radio" name="gender" id="p_w_male" value="1" required> Male
										 </label>
										 <label class="mt-radio-inline">
										 <input type="radio" name="gender" id="p_w_female" value="2" required> Female
										 </label> 
									 	</div>
									 </div>
                                  </div>
                               </div>
                              
                            </div>
                          </div>
                          <div class="modal-footer">
                             <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
                             <button class="btn yellow" onclick="add_passenger();" ><i class="fa fa-plus-circle"></i> Add Passenger</button>
                          </div>
                       </div>
                    </div>
                 </div>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<script type="text/javascript">
    $(function () {
        $("#self_travel").click(function () 
        {
            if ($(this).is(":checked")) {
                var name = $('#b_p_id').find('option:selected').attr('p_full_name');
				var contact = $('#b_p_id').find('option:selected').attr('p_contact');
				$("#b_p_name").val(name);
				$("#b_p_name").attr('readonly',true);
				$("#b_p_contact").val(contact);
				$("#b_p_contact").attr('readonly',true);
            } else {
				//alert('false');
				$("#b_p_name").val('');
              	$("#b_p_name").attr('readonly',false);
				$("#b_p_contact").val('');
				$("#b_p_contact").attr('readonly',false);
            }
        });
    });
$(document).ready(function()
{	
	 $( "#b_advance" ).change(function() 
	 {
		 var fix_adv = $('#hiden_advance').val();
		 var advance = $('#b_advance').val()
		
			if(parseInt(fix_adv) >parseInt(advance))
			 {
				alert('Advance should be greater then '+fix_adv);
			
			 }
	 });	
});
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>	   
<script>
function book_package(package_id,total_estimated_rate)
{
				
			$('#package_id').val(package_id);
			var from_time = $('#start_time').val();
     		 $('#booking_validation_message').hide();
		
			$.ajax({
			
			url: '<?php echo base_url(); ?>index.php/Local_booking/selected_package_detail',
			type: 'post',
			data: {package_id:package_id,from_time:from_time,total_estimated_rate:total_estimated_rate},			
			success: function(msg)
			{
				
				
				var arr = $.parseJSON(msg);
				$('#selected_package_detail_1').empty();
				$('#selected_package_detail_1').html(arr["1"]);
				$('#selected_package_detail_2').empty();
				$('#selected_package_detail_2').html(arr["2"]);
				$('#b_advance').val(arr["3"]);
				$('#hiden_advance').val($('#b_advance').val());
				$('#total_estimated_rate').val(Math.round(total_estimated_rate));
				$('#night_charge_status').val(arr[4]);
			
			}
		});	
}
$(document).on('mouseenter','[rel=popover]', function()
{
	var tax=$(this).attr("data-tax");
	var discount = $(this).attr("data-discount");
	var price=$(this).attr("data-price");
	var min_km=$(this).attr("data-min-km");
	var min_hour=$(this).attr("data-min-hour");
	var rate_per_km=$(this).attr("data-rate-per-km");
	var rate_per_hour=$(this).attr("data-rate-per-hour");
	var night_charge=$(this).attr("data-night-charge");
	var estimated_rate=$(this).attr("data-estimated-rate");
				
		$(this).popover({
		
		
	 trigger:'hover',
	 placement:'left',
	 container : 'body',
	 content:  "<div style='background-color: #FCF3E1'><table width='100%' border='0' align='left' style='margin-bottom:10px;'><tr><td>Package Rate</td><td>= <strong>Rs. "+price+" </strong></td> </tr><tr><td>Minimu KM</td><td>= <strong>"+min_km+" KM</strong></td> </tr><tr><td>Minimum Hour</td><td>=<strong> "+min_hour+" Hr</strong></td> </tr><tr><td>Extra Km Rate</td><td>=<strong> Rs. "+rate_per_km+"</strong></td></tr><tr><td>Extra Hour Rate</td><td>=<strong> Rs. "+rate_per_hour+"</strong></td></tr><tr><td>Discount</td><td>=<strong> Rs. "+discount+" </strong></td> </tr><tr><td>Night Charge</td><td>=<strong> Rs. "+night_charge+"</strong></td></tr><tr><td colspan='2'>_______________________________</td><tr> <td>Total estimated Rate</td><td>=<strong> Rs. "+estimated_rate+"/-</strong></td> </tr></table> <p></p><br> </br>Additional Gov. Tax GST, Toll, Parking, State Tax Charge will be remain.</br></div>",
				html: true
			});
				
				
});
$(document).on('mouseleave','[rel=popover]', function()
{
	$(this).popover('hide');
});
function confirm_local_booking()
{
	//alert("found");
	
	
	var sub_type_id = $("input[name='booking_sub_type']:checked").val();
	var package_id = $('#package_id').val();
	var b_from_city = $('#b_from_city').val();
	var b_from_date = $('#travel_date').val();
	var b_from_time = $('#start_time').val();
	var b_p_id = $('#b_p_id').val();
	var b_p_name = $('#b_p_name').val();
	var b_p_contact = $('#b_p_contact').val();
	var b_pickup_point = $('#pickup_point').val();
	var b_drop_point = $('#drop_point').val();
	var b_payment_type = $('#b_payment_type').val();
	var b_remarks = $('#b_remarks').val();
	var b_advance = $('#b_advance').val();
	var b_night_charge_status = $('#night_charge_status').val();
	var total_estimated_rate = $('#total_estimated_rate').val();	
		
	//alert(sub_type_id+"   "+package_id+"   "+b_from_city+"   "+b_from_date+"   "+b_from_time+"   "+b_p_id+"   "+b_p_name+"   "+b_p_contact+"   "+b_pickup_point+"   "+b_drop_point+"   "+b_payment_type+"   "+b_remarks+"   "+b_advance+"   "+b_night_charge_status);
	var fix_adv = $('#hiden_advance').val();
    var advance = $('#b_advance').val();
		
	if(parseInt(fix_adv) >parseInt(advance))
	 {
		alert('Advance should be greater then '+fix_adv);
		return false;
	 }		
	if(!sub_type_id || !b_from_city || !$("input[name='booking_sub_type']:checked").val() || !b_from_date  || !b_from_time )
	{
	 $('#booking_validation_message').html('Please, fill the searching details');
	  $('#booking_validation_message').show();
	  $("html, body").animate({ scrollTop: 0 }, "slow"); 
	}
	else if(!package_id  || b_night_charge_status=="")
	{
	 $('#booking_validation_message').html(package_id+" "+b_night_charge_status);
	  $('#booking_validation_message').show();
	  $("html, body").animate({ scrollTop: 0 }, "slow"); 
	
	}
	else if(!b_p_id  || !b_p_name || !b_p_id  || !b_p_contact || !b_pickup_point  || !b_drop_point || !b_payment_type  || !b_advance )
	{
		 $('#booking_validation_message').html('Please, fill the Traveller details');
		  $('#booking_validation_message').show();
		  $("html, body").animate({ scrollTop: 0 }, "slow"); 
	
	}
	else
	{
				 $('#booking_validation_message').hide();
				if($("#self_travel:checked").val() == "1")
				 {
					var b_self_travel_status = "1";
				 }
				  else 
				  {
					var b_self_travel_status = "0";
				  }
	  $.ajax({
				url: '<?php echo base_url(); ?>index.php/Local_booking/confirm_local_booking',
				type: 'post',
				data: {sub_type_id:sub_type_id,package_id : package_id,b_from_city:b_from_city, b_from_date:b_from_date, b_from_time:b_from_time, b_p_id:b_p_id, b_p_name:b_p_name, b_p_contact:b_p_contact, b_pickup_point:b_pickup_point, b_drop_point:b_drop_point, b_payment_type:b_payment_type, b_remarks:b_remarks, b_advance:b_advance,b_night_charge_status:b_night_charge_status,b_self_travel_status:b_self_travel_status,total_estimated_rate:total_estimated_rate},
				success: function(msg)
				{
					//alert(msg);
					window.location = '<?= base_url() ?>index.php/Booking_management';
					
				}
			});	
		}	
}
function get_package()
{
	//alert('found');
	var sub_type_id = $("input[name='booking_sub_type']:checked").val();
	var from_city = $('#b_from_city').val();
	var from_date = $('#travel_date').val();
	var from_time = $('#start_time').val();
	
	
	//alert(from_city+"   "+from_date+"   "+from_time+"   "+sub_type_id);
	
	
		$.ajax({
			url: '<?php echo base_url(); ?>index.php/Local_booking/get_package_data',
			type: 'post',
			data: {from_city:from_city,from_date:from_date,from_time:from_time,sub_type_id:sub_type_id},
			success: function(msg)
			{
					//alert(msg);				
					$('#package_data').empty();
					$('#package_data').html(msg);
					
			}
	});
}
function checkEmailID()
{
					
					var pEmailID = $('input[name="p_w_email_id"]').val();
		            $.ajax({
                    url: '<?php echo base_url();?>index.php/Ajax_common/check_email',
                    type: 'post',
                    data: {p_email_id : pEmailID},
                    success: function(msg)
                    {
						
						if(msg=="found")
						{
							
							$('#passenger_validation_message').html("Email ID is not available");
							$('#passenger_validation_message').fadeIn();
							$('input[name="p_w_email_id"]').val("");
						}
						else
						{
							$('#passenger_validation_message').hide();
						}					
					}
				});
	
}	
function add_passenger()
{
		//alert('hi');
		var name=$("#p_w_name").val();
		var mobile=$("#p_w_contact").val();
		var email=$("#p_w_email_id").val();
		var cityname=$("#p_w_city").val();
		var gender = $("input[name='gender']:checked").val();
		var option_text="";
		if(name && mobile && email && gender)
		{
				$.ajax({
					url: '<?php echo base_url(); ?>index.php/Local_booking/add_passenger',
					type: "POST",
					data: {name:name,mobile:mobile,email:email,city:cityname,gender:gender},
					success: function(resp)
						 {
							//alert(resp);	
							//$("#b_p_id").empty('');
							//$("#b_p_id").html(resp);
							//$("#new_passn").modal('hide');
							
							var arr = $.parseJSON(resp);
							if(arr['success'] == "error"){
								$('#passenger_validation_message').fadeIn();
								$('#passenger_validation_message').html(arr['message']);
								
							}else{
								$("#b_p_id").empty('');
								$("#b_p_id").html(arr['message']);
								$("#new_passn").modal('hide');
							}
							
							}
					});
		}
		else
		{
				$('#passenger_validation_message').fadeIn();
				$('#passenger_validation_message').html("Please fill the required details");
		}
				
			
}
</script>
<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?sensor=false&libraries=places"></script>
<script>
google.maps.event.addDomListener(window, 'load', function ()
{

	var places = new google.maps.places.Autocomplete((document.getElementById('to_city_id')),
	{
		types: ['geocode'],
		componentRestrictions: {country: 'in' }
	});
	
	google.maps.event.addListener(places, 'place_changed', function ()
	 {
		
	});	
			
	
	var places = new google.maps.places.Autocomplete((document.getElementById('pickup_point')),
	{
		types: ['geocode'],
		componentRestrictions: {country: 'in' }
	});
	
	google.maps.event.addListener(places, 'place_changed', function ()
	 {
		
	});
	
	
	
	var places = new google.maps.places.Autocomplete((document.getElementById('drop_point')),
	{
		types: ['geocode'],
		componentRestrictions: {country: 'in' }
	});
	
	google.maps.event.addListener(places, 'place_changed', function ()
	 {
		
	});
	
});
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCiwIrp3iYRK3PkyU0ZAj90gWWaAYDKQDA&libraries=places" async defer></script>
 <?php $this->load->view('footer');?>