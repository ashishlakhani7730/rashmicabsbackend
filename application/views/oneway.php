<?php $this->load->view('header');?>

            <!-- END HEADER -->

            <div class="container-fluid">

                <div class="page-content">

                    <!-- BEGIN BREADCRUMBS -->

                    <div class="breadcrumbs">

                        <h1>Oneway Booking</h1>

                        

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

                                                                        <span class="number"> 3 </span>

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

                                                <input type="radio" name="booking_sub_type" id="1" value="1" > ONEWAY OFFER </label>

                                                                                                <label class="mt-radio-inline">

                                                <input type="radio" name="booking_sub_type" id="2" value="2"> ONEWAY </label>

                                                                                                

                                                		</div>

													</div>

												</div>

                                                                    <div class="form-group">

																	



                                                                        <label class="control-label col-md-3">From City

                                                                            <span class="required"> * </span>

                                                                        </label>

                                                                        <div class="col-md-4">

                                                                       <select id="b_from_city" name="b_from_city" class="form-control select2" required>

                                            <option></option>

                                            

                                               <?php foreach($city_list as $c)

                                                {?>

																<option value="<?php echo $c->id ?>" ><?php echo $c->c_name;?></option>

													<?php } ?>  

                                            </optgroup>

                                        </select>

                                                                        </div>

                                                                    </div>

                                                                    <div class="form-group">

                                                                        <label class="control-label col-md-3">To City

                                                                            <span class="required"> * </span>

                                                                        </label>

                                                                        <div class="col-md-4">
                                                              
																	 
											<select id="b_to_city_id" name="b_to_city_id" class="form-control select2" required>

											<option></option>

                                            

                                               <?php foreach($city_list as $c)

                                                {?>

																<option value="<?php echo $c->id ?>" ><?php echo $c->c_name;?></option>

													<?php } ?>  

                                            </optgroup>

                                            </optgroup>

                                        </select>
											
											
										
                                                                        </div>

                                                                    </div>

                                                                    <div class="form-group">

                                                                        <label class="control-label col-md-3">Travel Date

                                                                            <span class="required"> * </span>

                                                                        </label>

                                                                        <div class="col-md-4">

<input class="form-control form-control-inline date-picker" size="16" type="text" id="b_from_date" data-date-format="dd-mm-yyyy" data-date-start-date="+0d" value="" required/>                     </div>

                                                                    </div>                                                               

                                                                    <div class="form-group" id="oneway_time" style="display:none">

                                                                        <label class="control-label col-md-3">Trip Start Time

                                                                            <span class="required"> * </span>

                                                                        </label>

                                                                        <div class="col-md-4">

                                                                     <div class="input-group">

       <input type="text" class="form-control timepicker timepicker-no-seconds" required id="b_from_time" >

                                                                    <span class="input-group-btn">

                                                                        <button class="btn default" type="button">

                                                                            <i class="fa fa-clock-o"></i>

                                                                        </button>

                                                                    </span>

                                                                </div>  

																   </div>

                                                                    </div>

                                                                    

                                                                    

                                                                    

                                                                </div>

                                                                <div class="tab-pane" id="tab2">

                                                                    <h3 class="block">Select Cab</h3>

                                                                    

                                                                    <div class="row margin-top-20">

                                                <div class="col-md-12">

                                                <table class="table table-responsive " border="0" align="center">

							<thead class="flip-content" id="available_packages_detail">

							

						

							</thead>

                            </table>

                              

                                                </div>

											</div>	

                                                                    

                                                                </div>

                                                                

                                                                <div class="tab-pane" id="tab4">

                                                                <div class="note note-danger" id="booking_validation_message" > </div>

                                                                    <h3 class="block">Confirm Book Cab</h3>

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

																	

																	<div class="form-group" id="oneway_offer_time" style="display:none">

                                                                        <label class="control-label col-md-3">Trip Start Time

                                                                            <span class="required"> * </span>

                                                                        </label>

                                                                        <div class="col-md-4">

                                                                     <div class="input-group"> <input type="text" class="form-control timepicker timepicker-no-seconds" required id="b_offer_from_time" >

                                                                    <span class="input-group-btn">

                                                                        <button class="btn default" type="button">

                                                                            <i class="fa fa-clock-o"></i>

                                                                        </button>

                                                                    </span>

                                                                </div>  

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

                                                                    <input type="text" id="drop_point" name="b_drop_point"  class="form-control" required>

                                                                    </div>

                                                                    </div>

                                                                      <div class="form-group">

                                                                        <label class="control-label col-md-3">Advance Pay

                                                                            <span class="required"> * </span>

                                                                        </label>

                                                                        <div class="col-md-4">

                                                                    <input type="text" id="b_advance"  name="b_advance" class="form-control" required>

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

																 

																 <input type="hidden" id="night_charge_status" class="form-control" >

																 <input type="hidden" id="total_estimated_rate" class="form-control" >

																 <input type="hidden" id="total_estimated_distance" class="form-control" >

																 <input type="hidden" id="chargeable_km" class="form-control" >

                                                                 <input type="hidden" id="hiden_advance" />

																  <input type="hidden" id="total_time" />

																  <input type="hidden" id="offer_valid_from_time" />

																  <input type="hidden" id="offer_valid_to_time" />

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

                        

                        <tbody id="selected_package_detail_2">

                      

                           

                                   

                        

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

                                                                    <a href="javascript:;" class="btn btn-outline green button-next" onClick="get_available_package()"> Continue

                                                                        <i class="fa fa-angle-right"></i>

                                                                    </a>

                                                                    <a href="javascript:;" onclick="confirm_oneway_booking();" class="btn green button-submit"> Submit

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

</script>				 				 

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>

<script> 

$(document).ready(function()

{



	$("input[name='booking_sub_type']").change(function(){

	

   		if($("input[name='booking_sub_type']:checked").val() == '1')

		{

			$('#oneway_offer_time').show();

			$('#oneway_time').hide();

		}

		

		

		if($("input[name='booking_sub_type']:checked").val() == '2')

		{

			$('#oneway_offer_time').hide();

			$('#oneway_time').show();

		}

	});	





	 $("select#b_from_city").change(function()

	 {

		var sub_type_id = $("input[name='booking_sub_type']:checked").val();

		

		if(sub_type_id == 1)

		{

		

		var b_from_city = $('#b_from_city').val();

		

            $.ajax({

                url: '<?php echo base_url(); ?>index.php/Oneway_offer_booking/fetch_available_city_routes',

                type: 'post',

                data: {b_from_city : b_from_city},

                success: function(msg)

                {

					$('#b_to_city_id').empty();

					$('#b_to_city_id').html(msg);



                }

            });

		}

		

		

		if(sub_type_id == 2)

		{

		var b_from_city = $('#b_from_city').val();

		

            $.ajax({

                url: '<?php echo base_url(); ?>index.php/Oneway_booking/fetch_available_city_routes',

                type: 'post',

                data: {b_from_city : b_from_city},

                success: function(msg)

                {

					$('#b_to_city_id').empty();

					$('#b_to_city_id').html(msg);



                }

            });

		}				

     });

	  		

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

$(document).on('mouseenter','[rel=popover]', function()

{



				var sub_type_id = $("input[name='booking_sub_type']:checked").val();

				var tax=$(this).attr("data-tax");

				var total_distance=$(this).attr("data-total-distance");

				var total_time=$(this).attr("data-total-time");

				var total_days = $(this).attr("data-total-days");

				var min_km = $(this).attr("data-min-km");

				var min_hour=$(this).attr("data-min-hr");

				var rate_per_km=$(this).attr("data-rate-per-km");

				var rate_per_hr=$(this).attr("data-rate-per-hr");

				var night_charge=$(this).attr("data-night-charge");

				var driver_allowance=$(this).attr("data-driver-allowance");

				var estimated_rate=$(this).attr("data-estimated-rate");

				var estimate_rate = $(this).attr("data-estimate-fare-rate");

				var discount = $(this).attr("data-discount");

				var outstation_km = 0;

				var driver_allowance_per_day = $(this).attr("data-driver-allowance-per-day");

				var book_type_name="";

				book_type_name="Oneway";

				

				if(sub_type_id == 1)

				{

				var content_data =  "<div style='background-color: #FCF3E1'><table width='100%' border='0' align='left' style='margin-bottom:10px;'><tr><td>Total Distance</td><td>= <strong>"+total_distance+" KM</strong></td> </tr><tr><td>Rate per KM</td><td>=<strong>  Rs. "+rate_per_km+"/-</strong></td> </tr><tr><td>Rate per HR</td><td>=<strong>  Rs. "+rate_per_hr+"/-</strong></td> <tr> <td>Estimated Time</td><td>= <strong>"+total_time+" Hrs</strong></td> </tr></tr><tr><td colspan='2'>_______________________________</td><tr> <td>Total estimated Rate</td><td>=<strong> Rs. "+estimated_rate+"/-</strong></td> </tr></table> <p></p><br> </br>After: <strong>"+total_time+" hrs. </strong>extra hour charge will be applied</br></br>Additional Gov. Tax GST, Toll, Parking, State Tax Charge will be remain.</br></div>";	



				

				/*var content_data =  "<div style='background-color: #FCF3E1'><table width='100%' border='0' align='left' style='margin-bottom:10px;'><tr><td>Total Distance</td><td>= <strong>"+total_distance+" KM</strong></td> </tr><tr><td>Chargeable KM</td><td>= <strong>"+estimated_rate+" KM</strong></td> </tr><tr><td>Discount</td><td>= <strong>"+discount+" </strong></td> </tr><tr><td>Total Days</td><td>= <strong>"+total_days+" Days </strong></td> </tr><tr><td>Extra Rate per KM</td><td>=  Rs. <strong>"+rate_per_km+"/-</strong></td> </tr> <tr> <td>Minimum KM</td><td>=<strong>"+min_km+" KM</strong></td></tr><tr> <td>Total estimated Rate</td><td>=<strong> Rs. "+estimated_rate+"/-</strong></td> </tr></table> <p></p><br> <em><b class='blue'>Package Rate Includes:</b></em></br><br><b>"+estimate_rate+" Km </b>  , "+book_type_name+" Usage, Vehicle & Fuel charges. </br> Each day will be counted from midnight 12 to midnight 12</br><br> <em><b class='blue'>Govt. Charges:</b></em></br>Service Tax: "+tax+" on Package Rate</br> Toll Charges (both-ways), State Tax, Parking & Airport Entry (not included in bill) to be paid wherever applicable <br><em><b class='blue'>Other Charges:</b></em>  </br>Night charges Rs."+night_charge+" for driver if pick up (11 PM to 6 AM) <br> Driver Allowance = Rs. "+driver_allowance+"/-  </span></span>("+driver_allowance_per_day+" Rs./day)</div>";*/

			

				$(this).popover({

					trigger:'hover',

					placement:'left',

					container : 'body',

					content:content_data,

					html: true

				});

				

				}

				

				if(sub_type_id == 2)

				{

				var content_data =  "<div style='background-color: #FCF3E1'><table width='100%' border='0' align='left' style='margin-bottom:10px;'><tr><td>Total Distance</td><td>= <strong>"+total_distance+" KM</strong></td> </tr><tr><td>Minimu KM</td><td>= <strong>"+min_km+" KM</strong></td> </tr><tr><td>Extra Rate per KM</td><td>=<strong>  Rs. "+rate_per_km+"/-</strong></td> </tr><tr><td>Minimum Hour</td><td>=<strong> "+min_hour+" Hr</strong></td> </tr><tr><td>Extra Rate per HR</td><td>=<strong>  Rs. "+rate_per_hr+"/-</strong></td> </tr> <tr><td>Estimate Fare</td><td>=<strong> Rs. "+estimate_rate+"</strong></td></tr><tr><td>Discount</td><td>=<strong> Rs. "+discount+" </strong></td> </tr><tr><td colspan='2'>_______________________________</td><tr> <td>Total estimated Rate</td><td>=<strong> Rs. "+estimated_rate+"/-</strong></td> </tr></table> <p></p><br> </br>Additional Gov. Tax GST, Toll, Parking, State Tax Charge will be remain.</br></div>";

				

				//var content_data =  "<div style='background-color: #FCF3E1'><table width='100%' border='0' align='left' style='margin-bottom:10px;'><tr><td>Total Distance</td><td>= <strong>"+total_distance+" KM</strong></td> </tr><tr><td>Minimu KM</td><td>= <strong>"+min_km+" KM</strong></td> </tr><tr><td>Extra Rate per KM</td><td>=<strong>  Rs. "+rate_per_km+"/-</strong></td> </tr> <tr><td>Estimate Fare</td><td>=<strong> Rs. "+estimate_rate+"</strong></td></tr><tr><td>Discount</td><td>=<strong> Rs. "+discount+" </strong></td> </tr><tr><td>Total Days</td><td>= <strong>"+total_days+" Days </strong></td> </tr><tr> <td>Driver Allowance</td><td>=<strong> Rs. "+driver_allowance+"("+driver_allowance_per_day+"/D)</strong></td></tr><tr> <td>Night Charge</td><td>=<strong> Rs. "+night_charge+"</strong></td></tr><tr><td colspan='2'>_______________________________</td><tr> <td>Total estimated Rate</td><td>=<strong> Rs. "+estimated_rate+"/-</strong></td> </tr></table> <p></p><br> </br>Additional Tax: <strong>"+tax+"   </strong>on Package Rate</br></div>";	



				

				/*var content_data =  "<div style='background-color: #FCF3E1'><table width='100%' border='0' align='left' style='margin-bottom:10px;'><tr><td>Total Distance</td><td>= <strong>"+total_distance+" KM</strong></td> </tr><tr><td>Chargeable KM</td><td>= <strong>"+estimated_rate+" KM</strong></td> </tr><tr><td>Discount</td><td>= <strong>"+discount+" </strong></td> </tr><tr><td>Total Days</td><td>= <strong>"+total_days+" Days </strong></td> </tr><tr><td>Extra Rate per KM</td><td>=  Rs. <strong>"+rate_per_km+"/-</strong></td> </tr> <tr> <td>Minimum KM</td><td>=<strong>"+min_km+" KM</strong></td></tr><tr> <td>Total estimated Rate</td><td>=<strong> Rs. "+estimated_rate+"/-</strong></td> </tr></table> <p></p><br> <em><b class='blue'>Package Rate Includes:</b></em></br><br><b>"+estimate_rate+" Km </b>  , "+book_type_name+" Usage, Vehicle & Fuel charges. </br> Each day will be counted from midnight 12 to midnight 12</br><br> <em><b class='blue'>Govt. Charges:</b></em></br>Service Tax: "+tax+" on Package Rate</br> Toll Charges (both-ways), State Tax, Parking & Airport Entry (not included in bill) to be paid wherever applicable <br><em><b class='blue'>Other Charges:</b></em>  </br>Night charges Rs."+night_charge+" for driver if pick up (11 PM to 6 AM) <br> Driver Allowance = Rs. "+driver_allowance+"/-  </span></span>("+driver_allowance_per_day+" Rs./day)</div>";*/

			

				$(this).popover({

					trigger:'hover',

					placement:'left',

					container : 'body',

					content:content_data,

					html: true

				});

				

				}

});

$(document).on('mouseleave','[rel=popover]', function()

{

	$(this).popover('hide');



});



/*function check_passanger_detail()

{			

				

				var self_travel = document.getElementById('self_travel');				

				if (self_travel.checked)

				{

					

					var name = $('#b_p_id').find('option:selected').attr('p_full_name');

					var contact = $('#b_p_id').find('option:selected').attr('p_contact');

					$("#b_p_name").val(name);

					$("#b_p_name").attr('readonly',true);

					$("#b_p_contact").val(contact);

					$("#b_p_contact").attr('readonly',true);

				}

			

}*/



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

					url: '<?php echo base_url(); ?>index.php/Oneway_booking/add_passenger',

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

function get_available_package()

{

		var sub_type_id = $("input[name='booking_sub_type']:checked").val();

		var package_city = $("#b_from_city option:selected").val();

		var b_to_city_id = $("#b_to_city_id option:selected").val();

		

		var from_date = $("#b_from_date").val();		

		$('#booking_validation_message').hide();

		

		

		if(sub_type_id!="" || package_city!="")

		{

			if(sub_type_id==1)

			{

			$.ajax({

				url: '<?php echo base_url(); ?>index.php/Oneway_offer_booking/get_available_package',

				type: 'post',

				data: {b_to_city_id:b_to_city_id,sub_type_id : sub_type_id, package_city:package_city,from_date:from_date},

				success: function(msg)

				{

					

					$('#available_packages_detail').empty();

					$('#available_packages_detail').html(msg);

					

				}

			});

			}

		

			if(sub_type_id==2)

			{

			var from_time = $("#b_from_time").val();

			

			$.ajax({

				url: '<?php echo base_url(); ?>index.php/Oneway_booking/get_available_package',

				type: 'post',

				data: {b_to_city_id:b_to_city_id,sub_type_id : sub_type_id, package_city:package_city,from_time:from_time,from_date:from_date},

				success: function(msg)

				{

					//alert(msg);

					$('#available_packages_detail').empty();

					$('#available_packages_detail').html(msg);

					

				}

			});

			}

		}

		else

		{

			

			

		}

		

		

}



function book_oneway_offer(package_id,total_distance,total_estimated_rate,total_time)

{

			//alert('book_package');

			

			//alert(package_id);

			 $('#package_id').val(package_id);

			

			 $('#booking_validation_message').hide();

		

	$.ajax({

				url: '<?php echo base_url(); ?>index.php/Oneway_offer_booking/selected_package_detail',

				type: 'post',

				data: {package_id:package_id,total_distance:total_distance,total_time:total_time,total_estimated_rate:total_estimated_rate},

			

				success: function(msg)

				{	

					

					var arr = $.parseJSON(msg);

					

					$('#selected_package_detail_1').empty();

					$('#selected_package_detail_1').html(arr["1"]);

					$('#selected_package_detail_2').empty();

					$('#selected_package_detail_2').html(arr["2"]);

					$('#b_advance').val(0);

					$('#hiden_advance').val($('#b_advance').val());

					$('#night_charge_status').val(0);

					$('#total_estimated_rate').val(arr["5"]);

					$('#total_estimated_distance').val(Math.round(total_distance));

					$('#chargeable_km').val(0);

					$('#total_time').val(total_time);

					$('#offer_valid_from_time').val(arr["3"]);

					$('#offer_valid_to_time').val(arr["4"]);
					
					$('#total_time').val(arr["6"]);

					

				}

		});

	

	

	

}







function book_package(package_id,advance_rate,total_distance,chargeable_km,total_days,total_estimated_rate)

{

			//alert('book_package');

			 $('#package_id').val(package_id);

			 var b_from_time = $('#b_from_time').val();

			 $('#booking_validation_message').hide();

			 

			 var b_to_city_id = $("#b_to_city_id option:selected").val();

		

	$.ajax({

				url: '<?php echo base_url(); ?>index.php/Oneway_booking/selected_package_detail',

				type: 'post',

				data: {package_id:package_id,b_from_time:b_from_time,total_distance:total_distance,chargeable_km:chargeable_km,total_days:total_days,total_estimated_rate:total_estimated_rate, b_to_city_id:b_to_city_id},

			

				success: function(msg)

				{	

					//alert(msg);			

					var arr = $.parseJSON(msg);

					

					$('#selected_package_detail_1').empty();

					$('#selected_package_detail_1').html(arr["1"]);

					$('#selected_package_detail_2').empty();

					$('#selected_package_detail_2').html(arr["2"]);

					$('#b_advance').val(Math.round(advance_rate));

					$('#hiden_advance').val($('#b_advance').val());

					$('#night_charge_status').val($('#available_night_charge_status').val());

					$('#total_estimated_rate').val(Math.round(total_estimated_rate));

					$('#total_estimated_distance').val(Math.round(total_distance));

					$('#chargeable_km').val(Math.round(chargeable_km));

				}

		});

	

	

	

}









function confirm_oneway_booking()

{

	//alert('cnfm b found');

	var sub_type_id = $("input[name='booking_sub_type']:checked").val();

	var package_id = $('#package_id').val();

	var b_from_city = $('#b_from_city').val();	

	var b_from_date = $('#b_from_date').val();

	

	if(sub_type_id == 1)

	{	

	var b_from_time = $('#b_offer_from_time').val();

	}

	

	if(sub_type_id == 2)

	{	

	var b_from_time = $('#b_from_time').val();

	}

	var b_p_id = $('#b_p_id').val();

	var b_p_name = $('#b_p_name').val();

	var b_p_contact = $('#b_p_contact').val();	

	var b_drop_point = $("input[name='b_drop_point']").map(function(){ return $(this).val();}).get().join(" - ");

	var b_pickup_point = $("input[name='b_pickup_point']").map(function(){ return $(this).val();}).get().join(" - ");	

	var b_payment_type = $('#b_payment_type').val();

	var b_remarks = $('#b_remarks').val();

	var b_advance = $('#b_advance').val();

	var b_night_charge_status = $('#night_charge_status').val();

	var b_to_city_id = $('#b_to_city_id').val();	

	var total_estimated_rate = $('#total_estimated_rate').val();

	var total_estimated_distance = $('#total_estimated_distance').val();

	var chargeable_km = $('#chargeable_km').val();	

	

	//alert(b_to_city_id+"  1   "+package_id+"  2 "+b_from_city+" 3 "+b_from_date+"   4  "+b_from_time+"  5  "+b_p_id+"  6  "+b_p_name+"   7 "+b_p_contact+"  8 "+b_drop_point+"  9  "+b_pickup_point+"  10  "+b_payment_type+"   11   "+b_remarks+"   12   "+b_advance+"   13  "+b_night_charge_status+"   14   "+total_estimated_rate+"   15   "+total_estimated_distance+"    16   "+chargeable_km);	

	

	 var fix_adv = $('#hiden_advance').val();

		 var advance = $('#b_advance').val()

		

	if(parseInt(fix_adv) >parseInt(advance))

	 {

		alert('Advance should be greater then '+fix_adv);

		return false;

	 }

	if(!b_from_city || !b_from_date  || !b_from_time )

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

	else if(!b_p_id  || !b_p_name || !b_p_contact || !b_pickup_point || !b_payment_type || !b_advance || !b_drop_point )

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

			

		if(sub_type_id == 1)

		{

		var total_estimated_time = $('#total_time').val();

		var valid_from_time = $('#offer_valid_from_time').val();

		var valid_to_time = $('#offer_valid_to_time').val();
		
		

	$.ajax({

			url: '<?php echo base_url(); ?>index.php/Oneway_offer_booking/request_oneway_offer_booking',

			type: 'post',
			
			dataType: "json",

			data: {b_to_city_id:b_to_city_id,package_id:package_id,b_from_city:b_from_city,b_from_date:b_from_date,b_from_time:b_from_time,b_p_id:b_p_id,b_p_name:b_p_name,b_p_contact:b_p_contact,b_drop_point:b_drop_point,b_pickup_point:b_pickup_point,b_payment_type:b_payment_type,b_remarks:b_remarks,b_advance:b_advance,b_night_charge_status:b_night_charge_status,total_estimated_rate:total_estimated_rate,total_estimated_distance:total_estimated_distance,chargeable_km:chargeable_km,b_self_travel_status:b_self_travel_status,total_estimated_time:total_estimated_time,valid_from_time:valid_from_time,valid_to_time:valid_to_time},

			success: function(msg)

			{
				if(msg.error == 1)
				{
					alert(msg.message);
					return false;
				}
				else
				{
					//alert('success');				

					//	alert(msg);

					window.location = '<?= base_url() ?>index.php/Oneway_offer_management';
				}
			}

		});

		}

	

		if(sub_type_id == 2)

		{

		

	$.ajax({

			url: '<?php echo base_url(); ?>index.php/Oneway_booking/confirm_oneway_booking',

			type: 'post',

			data: {b_to_city_id:b_to_city_id,package_id:package_id,b_from_city:b_from_city,b_from_date:b_from_date,b_from_time:b_from_time,b_p_id:b_p_id,b_p_name:b_p_name,b_p_contact:b_p_contact,b_drop_point:b_drop_point,b_pickup_point:b_pickup_point,b_payment_type:b_payment_type,b_remarks:b_remarks,b_advance:b_advance,b_night_charge_status:b_night_charge_status,total_estimated_rate:total_estimated_rate,total_estimated_distance:total_estimated_distance,chargeable_km:chargeable_km,b_self_travel_status:b_self_travel_status},

			success: function(msg)

			{

				//alert('success');				

				//alert(msg);

				window.location = '<?= base_url() ?>index.php/Booking_management';

				

			}

		});

		}	

	}

	

}

</script>

<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?sensor=false&libraries=places"></script>

<script>

google.maps.event.addDomListener(window, 'load', function ()

{

	

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

<script type="text/javascript">

            $('#b_from_time').timepicker();

</script>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCiwIrp3iYRK3PkyU0ZAj90gWWaAYDKQDA&libraries=places" async defer></script>

<?php $this->load->view('footer');?>