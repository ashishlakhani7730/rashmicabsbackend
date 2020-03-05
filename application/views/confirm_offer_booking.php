<?php $this->load->view('header');?>

            <!-- END HEADER -->

            <div class="container-fluid">

                <div class="page-content">

                    <!-- BEGIN BREADCRUMBS -->

                    <div class="breadcrumbs">

                        <h1>Confirm Oneway Offer Booking</h1>

                    </div>

                    <!-- END BREADCRUMBS -->

                    <!-- BEGIN PAGE BASE CONTENT -->

                 <div class="row">

                        <div class="col-md-12">

                          <div class="portlet light bordered">
 
								<div class="note note-danger" id="validation_message" style="display:none;"> <p>  </p> </div>            

                                            <div class="portlet-body form">
												<div class="form-body">
												<div class="row">
												 <div class="col-md-4">
												 
													 <div class="form-group">

														<label class="control-label">Traveller Name

															<span class="required"> * </span>

														</label>
														
														<input type="text" id="b_p_name" name="b_p_name" value="<?php echo $record[0]->b_p_name; ?>" class="form-control" required>                

													</div>
												
												</div>
												
												<div class="col-md-4">
													
													<div class="form-group">

														<label class="control-label">Traveller Mo

															<span class="required"> * </span>

														</label>                     

                                                            <input type="text" id="b_p_contact" name="b_p_contact" value="<?php echo $record[0]->b_p_contact; ?>" class="form-control" required>
                           
                                                    </div>
												
												</div>
												
												 <div class="col-md-4">
												 <div class="form-group" id="oneway_offer_time">

																		<label class="control-label">Trip Start Time

                                                                            <span class="required"> * </span>

                                                                        </label>

                                                                       

                                                                <div class="input-group"> <input type="text" id="time" class="form-control timepicker timepicker-no-seconds" value="<?php echo $record[0]->b_from_time; ?>"  id="b_offer_from_time" required>

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

                                                                        <label class="control-label ">Pickup Point

                                                                            <span class="required"> * </span>

                                                                        </label>

                                                                    <input type="text" id="pickup_point" name="b_pickup_point" value="<?php echo $record[0]->b_pickup_point; ?>" class="form-control" required>
													</div>
												 </div>
												 
												 <div class="col-md-4">
													<div class="form-group">

                                                                        <label class="control-label ">Drop Point

                                                                            <span class="required"> * </span>

                                                                        </label>

                                                                    <input type="text" id="drop_point" name="b_drop_point" value="<?php echo $record[0]->b_drop_point; ?>" class="form-control" required>
													</div>
												 </div>
												 
												 <div class="col-md-4">
													<div class="form-group">

                                                                        <label class="control-label">Advance Pay

                                                                            <span class="required"> * </span>

                                                                        </label>

                                                                    <input type="text" id="b_advance" name="b_advance" value="<?php echo $record[0]->b_advance; ?>" class="form-control" required>
													</div>
												 </div>
												 
												 <div class="col-md-4">
													<div class="form-group">

														<label class="control-label">Pay Type
															<span class="required"> * </span>
														</label>

														<select id="b_payment_type" class="form-control select2" <?php if($record[0]->b_payment_type == 1) { echo "disabled"; }?> required>

															<option></option>
															<option value="1" <?php if($record[0]->b_payment_type == 1) { echo "selected";} ?>>ONLINE PAYMENT</option>
															<option value="2" <?php if($record[0]->b_payment_type == 2) { echo "selected";} ?>>CASH TO RASHMICABS</option>
															<option value="3" <?php if($record[0]->b_payment_type == 3) { echo "selected";} ?>>CASH TO DRIVER</option>
															

														</select>

                                                                   

                                                    </div>
												 </div>
												 
												 <div class="col-md-4">
												 <div class="form-group">
                                                     <label class="control-label ">Notes

                                                     </label>
    
                                                    <input type="text" id="b_remarks" value="<?php echo $record[0]->b_remarks; ?>" class="form-control" >       

                                                 </div>
												 </div>
												 
												 
												

                                                </a> 
												</div>
												</div>
												<a href="javascript:;" onclick="accept_reject(<?php echo $record[0]->id; ?>,<?php echo $record[0]->b_pk_id;?>);" class="btn green button-submit"> Confirm Booking 

                                                                        <i class="fa fa-check"></i></a>
                                            </div>
						 </div>
						
						</div>
				</div>
				
				</div>
				<div id="form1">
				<!-- Dynamic Form Div -->
				</div>
			</div>
<script>
	
	function accept_reject(req_id,cab_id)
	{
		var travellername = $("#b_p_name").val();
		var mobilenumber = $("#b_p_contact").val();
		var pickuppoint = $("#pickup_point").val();
		var droppoint = $("#drop_point").val();
		var time = $("#time").val();
		var advancepay = $("#b_advance").val();
		var paymenttype = $("#b_payment_type").val();
		var remarks = $("#b_remarks").val();
		var booking_id = 0;
		$.ajax({
			url: "<?php echo base_url()."index.php/Oneway_offer_management/accept_one_request"; ?>",
			method:"post",
			dataType:"json",
			data: {oneway_request_id:req_id,offer_cab_id:cab_id,name:travellername,mobile:mobilenumber,pickup:pickuppoint,drop:droppoint,ptime:time,advance:advancepay,ptype:paymenttype,note:remarks},
			success : function(json)
			{
				console.log(json);
				/*if(json.code)
				{
					$.ajax({
								url: "<?php echo base_url()."index.php/Oneway_offer_management/confirm_booking"; ?>",
								method:"post",
								dataType:"json",
								data: {oneway_request_id:req_id},
								success : function(jsontwo)
								{
									if(jsontwo.code)
									{/*
										var newForm = $('<form>', {
											'action': '<?= base_url() ?>index.php/Oneway_view'
											//'target': ''
										}).append($('<input>', {
											'name': 'oneway_view_id',
											'value': '+'jsontwo.booking'+',
											'type': 'hidden'
										}));*/
										
										/*$("div#form1").append(
												$("<form/>", {id: 'redirectoneway',action: '<?php //base_url() ?>index.php/Oneway_view',method: 'post'
												}).append($("<input/>", {type: 'hidden',id: 'oneway_view_id',name: 'oneway_view_id',value: jsontwo.booking}))
										);
										
										$("#redirectoneway").submit();*/
										/*
										
									}
									else
									{
										alert("Somthing Wrong In Book Offer Onway");
										return false;
									}
								}
					});
				}
				else
				{
					alert(json.message);
					return false;
				}*/


		window.location = '<?php echo base_url() ?>index.php/Booking_management';

			}
		});
		/*if(booking_id != 0)
		{
			console.log(booking_id);
		$('<form action="<?php // base_url() ?>index.php/Oneway_view" method="post"> <input type="hidden" id="oneway_view_id" name="oneway_view_id" value="'+booking_id +'" /></form>').appendTo('body').submit();
		}*/
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