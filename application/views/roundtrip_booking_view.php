<?php $this->load->view('header');?>

            <!-- END HEADER -->

            <div class="container-fluid">

                <div class="page-content">

                    <!-- BEGIN BREADCRUMBS -->

                    <div class="breadcrumbs">

                        <h1>Manage Booking</h1>

                        

                    </div>

                    <!-- END BREADCRUMBS -->

                    <!-- BEGIN PAGE BASE CONTENT -->

                 <div class="row">

                        <div class="portlet light bordered">

                               <!-- <div class="portlet-title">

                                 <div class="caption font-dark">

                                        <i class="fa fa-user font-dark"></i>

                                        <span class="caption-subject bold uppercase"> Sohil Padhiyar</span>

                                    </div>

                                    

                                    

                                </div>-->

                               <div class="portlet-body">

                    <div class="table-toolbar">

                  	 <?php if($roundtrip_data->b_status < 4){?>

				  <?php if($roundtrip_data->b_status != 0){?>

                        <div class="btn-group">

						

                           <button  href="#edit"  data-toggle="modal" id="sample_editable_1_new" class="btn blue">                       

                           Edit

						   

						 </button>

					 

                        </div>

						 <?php }?>

                  		 <?php }?> 

						 

						     

                    <?php if($roundtrip_data->b_status < 5 ){?>

						 <?php if($roundtrip_data->b_status !=0 ){?>

                         <div class="btn-group">

                           <button href="#cancelBooking" data-toggle="modal" id="sample_editable_1_new" class="btn red-haze">

                           

                           Cancel

                           </button>

                        </div>

						<?php }?>

                  		 <?php }?> 

						 

						 <?php if($roundtrip_data->b_status !=0 ){?>

						 <?php if($roundtrip_data->b_status <4){?>

						 <div class="btn-group">

						

                           <button  href="#modify_packages"  data-toggle="modal" id="sample_editable_1_new" class="btn blue-steel">                       

                          Modify Packages

						   

						 </button>

					 

                        </div>

						<?php }?>

						

						 <?php if($roundtrip_data->b_status <=4 ){?>

                        <div class="btn-group">

                           <button href="#assign_cab" data-toggle="modal" id="sample_editable_1_new" class="btn green">

                           

                           <?php if($roundtrip_data->b_status ==4 ){?>Change Cab<?php } else { ?>Assign Cab<?php } ?>

                           </button>

                        </div>

						<?php }?>

						

						

						

						

						 <?php if($roundtrip_data->b_status >=4 ){?>

                    

						<?php if($roundtrip_data->b_rent_card_status == 0){?>

                          <div class="btn-group">

						   <button href="#duty_slip" data-toggle="modal" id="sample_editable_1_new" onClick="fetch_rent_card()" class="btn red-intense">

                                                    

                           Duty Slip

                           </button>

                       </div>

						<?php } ?>

					

					

						  	<?php if($roundtrip_data->b_rent_card_status > 0 ){ ?>

						   <div class="btn-group">

						   <form method="post" action="<?php echo base_url();?>index.php/Invoice_rent_card/view_rent_card">

<button type="submit" id="sample_editable_1_new" name="view_id" value="<?php echo $roundtrip_data->id;?>" class="btn btn yellow-haze" >

                           

                           View Duty Slip

                           </button>

						   </form>

						    </div>

							

						   <?php } }?>

						   

						   

                       <?php if($roundtrip_data->b_status ==4 && $roundtrip_data->b_rent_card_id !=0 && $roundtrip_data->b_rent_card_status == 1){?>

                          <div class="btn-group">

                           <button id="sample_editable_1_new" href="#taxiinvoice" data-toggle="modal" class="btn blue">

                           

                           Complete Trip

                           </button>

                        </div>

						

						<?php }?>

						

						  <?php if($roundtrip_data->b_status >=5 && $generate_invoice['balance'] > 0){?>

                           <div class="btn-group">

                           <button id="sample_editable_1_new"  data-toggle="modal" href="#generate_invoice" class="btn purple">

                           

                           Generate Invoice

                           </button>

                        </div>						

                     <?php }?>

					 

					  <?php if($roundtrip_data->b_status ==6 ){?>

                        <div class="btn-group">

						<form method="post">

                                <button type="submit"  id="sample_editable_1_new" formaction="<?php echo base_url(); ?>index.php/Invoice_view/outstation_invoice" value="<?php echo $generate_invoice['id']; ?>" name="ticket_id" class="btn blue-chambray">



                                    View Invoice 

                                </button>

								</form>

						</div>

						

                        <?php }?>

						<?php }?>

                                             

 <hr>

                       

                     

                    

                    

                    <!-- custmor histry tabs-->

                    

                  <div class="portlet-body">

				  <div class="row">

				  <table class="table table-bordered">

                           <thead>

                              <tr >

                                 <th colspan="5" class="blue_row">Booking Details</th>

                                  <th colspan="2" class="blue_row">

								  <form method="post">

								    <?php if(!empty($passanger_data->id)){ ?><button type="submit"  value="<?php echo $passanger_data->id;?>" name="btn_p_view" formaction="<?php echo base_url().'index.php/Passenger_management/view_passenger'?>" class="btn yellow-saffron">Passenger Details <i class="fa fa-user"></i>

								   </button><?php }?>

								   </form>

								   </th>

                                

                              </tr>

                           </thead>

                           <tbody>

                              <tr class="red_row">

                                 <th colspan="2">Passenger Name</th>

                                 <th>Email id</th>

                                 <th>Passenger No</th>

                                 <th colspan="1">Mobile</th>

                                 <th colspan="1">2nd Mobile No.</th>

                                  <th colspan="1">Profile Picture</th>

                                

                                

                                

                              </tr>

                              <tr>

                                 <td colspan="2"><?php if(!empty($passanger_data->p_full_name)){echo $passanger_data->p_full_name;}?></td>

                                 <td><?php if(!empty($passanger_data->p_email_id)){echo $passanger_data->p_email_id;}?></td>

                                 <td><?php if(!empty($passanger_data->p_id)){echo $passanger_data->p_id;}?></td>

                                 <td colspan="1"><?php if(!empty($passanger_data->p_contact)){echo $passanger_data->p_contact;}?></td>

                                 <td colspan="1"><?php if(!empty($passanger_data->p_contact_2)){echo $passanger_data->p_contact_2;}?></td>

                                 <td colspan="1" > <img src="<?php if(!empty($passanger_data->p_profile)){ echo base_url();?>uploads/passenger_profile/<?php echo $passanger_data->p_profile;}else{echo base_url()."assets/global/img/defaultimg.jpg";}?>" width="75px" height="75px"></td>

                                 

                              </tr>

                               <thead>

                              <tr class="blue_row">

                                 <th colspan="7" >Trip Details</th>

                                

                              </tr>

                               <tr class="red_row">

                                 

								  <th>Ticket #</th>

                                 <th>Booking Date & Time</th>

                                 <th>Pickup Date & Time</th>

                                 <th>City</th>

                                 <th>Pickup Location</th>

                                 <th >Drop Location</th>

                                  <th>Booking Status</th>

                                

                              </tr>

                              <tr >

                                 <td><?php echo $roundtrip_data->b_id;?></td>

                                 <td><?php echo date('d/m/Y h:i A',strtotime($roundtrip_data->b_booking_date_time));?></td>

                                 <td><?php echo date('d/m/Y',strtotime($roundtrip_data->b_from_date))." ".date('h:i A',strtotime($roundtrip_data->b_from_time));?></td>

                                 <td><?php echo $this->db->get_where('city_detail',array('id'=>$roundtrip_data->b_from_city))->row()->c_name; ?></td>

                                 <td><?php echo $roundtrip_data->b_pickup_point;?></td>

                                 <td><?php echo $roundtrip_data->b_drop_point;?></td>

                                <td>

							  <?php if($roundtrip_data->b_status == 0){echo "<span class='label label-sm label-danger'>Cancelled</span>";} if($roundtrip_data->b_status == 1){echo "<span class='label label-sm label-info'> pending </span>";} if($roundtrip_data->b_status == 2){echo "<span class='label label-sm label-primary'>Owner Assigned </span>";}  if($roundtrip_data->b_status == 3){echo " <span class='label label-sm label-default'> Driver Assigned </span>";} if($roundtrip_data->b_status == 4){ if($roundtrip_data->b_rent_card_id !=0 && $roundtrip_data->b_rent_card_status == 1){ echo "<span class='label label-sm label-default'> Duty Slip Generated </span>"; } else { echo "<span class='label label-sm label-warning'> Cab Assigned </span>"; } } if($roundtrip_data->b_status == 5){ if( $generate_invoice['balance'] > 0 ){echo "<span class='label label-sm label-info'> Complete Trip</span>";}else{ echo "<span class='label label-sm label-info'> Due  </span>"; }  } if($roundtrip_data->b_status == 6){ if( $generate_invoice['balance'] > 0 ){echo "<span class='label label-sm label-info'> Due </span>";}else{echo "<span class='label label-sm label-success'> Trip Finished</span>"; } }?>

							  </td>

							  </tr>

                              <tr class="red_row">

                                 <th>Vehicle Category</th>

                                 <th>Vehicle Type</th>

                                 <th>Package Rate</th>

                                 <th>Extra Rate Per Km.</th>

                                 <th>Extra Rate Per Hr.</th>

                                 <th >Minimum Km</th>

                                  <th>Minimum Hr.</th>

                                

                              </tr>

                              <tr>

                                
								<!--<?php //if($roundtrip_data->b_ac_non_ac == 1) { ?>AC<?php //} else {?>NON-AC <?php //} ?>	-->
                                 <td><?php echo $this->db->get_where('vehicle_category_detail',array('id'=>$roundtrip_data->b_vc_id))->row()->category_name; ?> </td>

                                  <td><?php echo $this->db->get_where('vehicle_detail',array('v_category_id'=>$roundtrip_data->b_vc_id))->row()->v_name; ?></td>

								  <td>RS. <?php echo $roundtrip_data->b_pk_rate;?></td>

                                 <td>Rs. <?php echo $roundtrip_data->b_pk_rate_per_km;?></td>

                                 <td>Rs. <?php echo $roundtrip_data->b_pk_rate_per_hour;?></td>

                                 <td><?php echo $roundtrip_data->b_pk_min_km; ?></td>

                                <td><?php echo $roundtrip_data->b_pk_min_hour; ?></td>

                              </tr>

                           </thead>

                            <thead>

                              <tr class="blue_row">

                                 <th colspan="7" >Trip Passenger Details</th>

                                

                              </tr>

                               <tr class="red_row">

                                 <th colspan="2">Passenger Name</th>

                                 <th>Passenger Contact</th>

                                

                                 <th>Payment Type</th>

                                 <th  colspan="3">Package_details</th>

                                

                                 

                                

                              </tr>

							     

                              <tr>

                                 <td colspan="2"><?php echo $roundtrip_data->b_p_name; ?></td>

                                 <td><?php echo $roundtrip_data->b_p_contact; ?></td>                              

                                 <td><?php echo $this->db->get_where('payment_type',array('id'=>$roundtrip_data->b_payment_type))->row()->payment_name;?></td>

                                 <td  colspan="3">Package ID : <?php echo $roundtrip_data->b_package_id; ?> , 

								 <?php echo $roundtrip_data->package_type." ".$roundtrip_data->package_sub_type;?> , 

								

								 Vahicle Category : <?php echo $roundtrip_data->category_name;?> , 

								 City : <?php echo $roundtrip_data->c_name;?>

								 </td>

                               

                             

                              </tr>

							   <tr class="blue_row">

							   <th colspan="7" >Modification Details</th>

							   </tr>

							  <tr class="red_row">

                                

                                  <th colspan="2">Updated By</th>                               

								  <th colspan="2" >Cancelled By</th>					                                

                                  <th colspan="2">Cancel Type</th>   

								  <th colspan="2">Cancel Note</th>      

                              </tr>

                              <tr>

                                  <td colspan="2"><?php if($roundtrip_data->b_updated_by!=0){ echo $this->db->get_where('user_detail',array('id'=>$roundtrip_data->b_updated_by))->row()->u_full_name." - "; echo date('d/m/Y h:i A',strtotime($roundtrip_data->b_updated_date_time)); } else { echo "N/A";   } ?></td>                               

								  <td colspan="2" ><?php if($roundtrip_data->b_cancelled_by!=0){ echo $this->db->get_where('user_detail',array('id'=>$roundtrip_data->b_cancelled_by))->row()->u_full_name." - ";  echo date('d/m/Y h:i A',strtotime($roundtrip_data->b_cancel_date_time)); } else { echo "N/A"; }?></td>

								                                

                                 <td colspan="2"><?php if($roundtrip_data->b_cancelled_by!=0){ if($roundtrip_data->b_cancel_type==1){echo "Customer";} if($roundtrip_data->b_cancel_type==2){echo "Agent";}  if($roundtrip_data->b_cancel_type==3){echo "Rashmi Cabs";}}  else { echo "N/A";   } ?></td	>   

								  

								  <td colspan="2"><?php if($roundtrip_data->b_cancelled_by!=0){echo $roundtrip_data->b_cancel_note;}  else { echo "N/A";   } ?></td	>                                                                   

								 

                                

                              </tr>

							   <?php if($roundtrip_data->b_status!=1) {?>

							  <?php if($roundtrip_data->b_status!=0 || $roundtrip_data->b_status==4) {?>

							  <tr class="blue_row">

							   <th colspan="7" >Cab Assigning Details</th>

							   </tr>

							  <tr class="red_row">

                                

                                 

								  <th colspan="1">Agent Name</th>

								  <th  colspan="2">Vehicle Category-Type</th>                                  

                                  <th>Driver Name</th>

								  <th>Driver Contact</th>

								  <th>Vehicle Number</th>

								  <th colspan="1">Assign By</th>

								

								     

								

                              </tr>

                              <tr>

                                 

										 <td colspan="1"><?php echo $this->db->get_where('agent_detail',array('id'=>$roundtrip_data->b_agent_id))->row()->a_full_name;?></td>

										 

										 <td colspan="2"><?php if(!empty($roundtrip_data->b_vc_category_id)){ echo $this->db->get_where('vehicle_category_detail',array('id'=>$roundtrip_data->b_vc_category_id))->row()->category_name;}?><br /><?php if(!empty($roundtrip_data->b_vehicle_id)){ echo $this->db->get_where('vehicle_detail',array('id'=>$roundtrip_data->b_vehicle_id))->row()->v_name; }?></td>

										 

										 <td><?php echo $roundtrip_data->b_driver_name; ?></td>

										 

										 <td><?php echo $roundtrip_data->b_driver_contact; ?></td> 

										 

										 <td><?php echo $roundtrip_data->b_vehicle_number; ?></td>

										  

										 <td colspan="1"><?php if($roundtrip_data->b_cab_assign_type==1){echo "By Agent - ".$this->db->get_where('agent_detail',array('id'=>$roundtrip_data->b_cab_assign_by))->row()->a_full_name." - ";}else{echo $this->db->get_where('user_detail',array('id'=>$roundtrip_data->b_cab_assign_by))->row()->u_full_name." - "; }?><?php echo date('d/m/Y h:i A',strtotime($roundtrip_data->b_assign_date_time));?></td>

                              </tr>							  

							  <?php } }?>

							  <?php if($roundtrip_data->b_complain_msg!=''){?>

							  <tr class="blue_row">

							   <th colspan="7" >Complain Details</th>

							   </tr>

							  <tr class="red_row">

                                

                                  <th colspan="4">Message</th>                               

								  <th colspan="2" >Send Datetime</th>					                                

                                  <th colspan="2">Read Datetime</th>    

								     

                              </tr>

                              <tr>

                                  <td colspan="4"><?php if($roundtrip_data->b_complain_msg!=''){ echo $roundtrip_data->b_complain_msg; } else { echo "N/A";   } ?></td>                               

								  <td colspan="2" ><?php if($roundtrip_data->b_complain_datetime!='0000-00-00 00:00:00'){ echo date('d/m/Y h:i A',strtotime($roundtrip_data->b_complain_datetime)); } else { echo "N/A"; }?></td>

								                                

                                  <td colspan="2"><?php if($roundtrip_data->b_complain_read_datetime!='0000-00-00 00:00:00'){ echo date('d/m/Y h:i A',strtotime($roundtrip_data->b_complain_read_datetime)); } else { echo "N/A"; }?></td	>   

								  

								  

								 

                                

                              </tr>

							  <?php }?>

                           </thead>                             

                           </tbody>

                        </table>

				  </div>

                       

						

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

				

				

				

				

				<div class="modal fade bs-modal-lg" id="edit" tabindex="-1" role="dialog" aria-hidden="true">

			<div class="modal-dialog modal-lg">

				<div class="modal-content">

					<div class="modal-header">

						<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>

						<h4 class="modal-title"><strong>Roundtrip Booking Edit</strong></h4>

					</div>

					<div class="modal-body">

						<div id="err" class="alert alert-danger" style="display: none"></div>

						<div class="form-body">

							<div class="form-group">

								<label >Name<span class="text-danger">*</span></label>

								<input type="text" class="form-control" id="name" name="b_p_name" value="<?php echo $roundtrip_data->b_p_name;?>" >

							</div>

							<div class="form-group">

								<label >Mobile Number<span class="text-danger">*</span></label>

								<input type="text" class="form-control" id="mobile" name="b_p_contact" value="<?php echo $roundtrip_data->b_p_contact;?>"  >

							</div>

							<div class="form-group">

								<label >Pickup Point</label>

								<input type="text" class="form-control" id="pickup" name="b_pickup_point" value="<?php echo $roundtrip_data->b_pickup_point;?>" >

							</div>

							<div class="form-group">

								<label>Drop Point</label>

								<input type="text" class="form-control" id="drop" name="b_drop_point" value="<?php echo $roundtrip_data->b_drop_point;?>">

							</div>

							<div class="row">

								<div class="form-group col-md-4">

									<label >Travel Date <span class="required">

													* </span>

													</label>

													<div>

														<div class="input-group input-medium date date-picker" data-date-format="dd-mm-yyyy" data-date-start-date="+0d">

															<input type="text"  name="b_from_date" id="b_from_date" class="form-control" value="<?php echo date('d-m-Y',strtotime($roundtrip_data->b_from_date));?>" readonly >

												<span class="input-group-btn">

												<button class="btn default" type="button"><i class="fa fa-calendar"></i></button>

												</span>

														</div>



													</div>

								</div>

								<div class="form-group col-md-4">

									<label >Travel Date <span class="required">

													* </span>

													</label>

													<div>

														<div class="input-group input-medium date date-picker" data-date-format="dd-mm-yyyy" data-date-start-date="+0d">

															<input type="text"  name="b_to_date" id="b_to_date" class="form-control" value="<?php echo date('d-m-Y',strtotime($roundtrip_data->b_to_date));?>" readonly >

												<span class="input-group-btn">

												<button class="btn default" type="button"><i class="fa fa-calendar"></i></button>

												</span>

														</div>



													</div>

								</div>

								<div class="form-group col-md-4">

									<label>Trip Start Time</label>

									<input type="text" id="time" name="b_from_time" class="form-control timepicker timepicker-no-seconds" style="width: 200px" value="<?php echo $roundtrip_data->b_from_time;?>" required>

									<input type="hidden" id="Editid" value="<?php echo $roundtrip_data->id?>">

								</div>

							</div>

						</div>

					</div>

					<div class="modal-footer">

						<button type="button" class="btn default" data-dismiss="modal">Close</button>

						<button type="button" class="btn yellow" onClick="update()" data-dismiss="modal">Edit Booking</button>

					</div>

				</div>

				<!-- /.modal-content -->

			</div>

			<!-- /.modal-dialog -->

		</div>

							<!-- /.modal -->

        </div>   

		

		

		

		

		

		

		

		

		

		

		<div class="modal fade bs-modal-lg" id="cancelBooking" tabindex="-1" role="dialog" aria-hidden="true">

								<div class="modal-dialog modal-lg">

								

									<div class="modal-content">

									

										<div class="modal-header">

										

											<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>

											<h4 class="modal-title">Cancel Type</h4>

										</div>

										

										

										<form action="<?php echo base_url();?>index.php/Roundtrip_view/cancel_booking" method="post" class="horizontal-form">

											

											<input type="hidden" name="id" value="<?php echo $roundtrip_data->id;?>"  />

											 <div class="col-md-12">

                                          <div class="form-group">

                                             <label class="control-label">Cancel Type<span class="required">*</span></label>

                                            

											  <select class="form-control select2" name="cancel_type" id="cancel_type" data-placeholder="Choose a Category" tabindex="1" required>

											  							<option value="">select type</option>

                                                                        <option value="1">Customer</option>

                                                                        <option value="2">Agent</option>

                                                                        <option value="3">Rashmi Cabs</option>

																	

												</select>						

                                             

                                          </div>

                                       </div>

									     <!--/span-->

                                         <div class="col-md-12">

                                  	        <div class="form-group">

                                             <label class="control-label">Cancel Note <span class="required">*</span></label>

                                              <input type="text" id="cancel_note" class="form-control" name="cancel_note" required>

                                          </div>

                                       </div>

									   

									   

                                       <!--/span-->

                                        <!-- <div class="col-md-6">

                                  	        <div class="form-group">

                                             <label class="control-label">Cancel Date <span class="required">*</span></label>

                                             <input class="form-control form-control  date-picker" data-date-format="dd-mm-yyyy" data-date-start-date="<?php //echo date('d-m-Y',strtotime($roundtrip_data->b_booking_date_time));?>"   size="16" type="text"  name="cancel_date" id="cancel_date"  />

                                          </div>

                                       </div>

									   

									    <div class="col-md-6">

                                          <div class="form-group">

                                             <label class="control-label">Cancel Time <span class="required">*</span></label>

                                                    <input type="text" class="form-control timepicker timepicker-no-seconds" name="cancel_time" id="cancel_time"  >                                     

                                            

                                          </div>

                                       </div>

									   -->

										

									

										<div class="modal-footer">

											<button type="submit" class="btn red-haze" onclick="cancel(<?php echo $roundtrip_data->id;?>)" >Cancel Booking</button>

											<button type="button" class="btn default" data-dismiss="modal">Close</button>

											

										</div>

										

									</div>

										</form>

									<!-- /.modal-content -->

								</div>

								<!-- /.modal-dialog -->

							</div>

							<!-- /.modal -->

                            

                            </div>

							

							

							<div class="modal fade bs-modal-lg" id="modify_packages" tabindex="-1" role="dialog" aria-hidden="true">

								<div class="modal-dialog modal-lg">

									<div class="modal-content">

										<div class="modal-header">

											<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>

											<h4 class="modal-title">Modify Packages </h4>

										</div>

									<div class="modal-body">

											<table class="table table-striped table-bordered table-hover" id="modifypack">

												<thead>

												<tr>

													<th class="table-checkbox">

														Vehicle category

													</th>

													<th>

														Ac / Non-AC

													</th>

													<th>

														Seats

													</th>

													<th>

														Rate per KM

													</th>

													

													<th>

														Estimated Package Rate

													</th>

													

													<th>

														Action

													</th>

												</tr>

												</thead>

												<tbody>

	<?php 

													

		$data =$this->db->get_where('package_detail',array('p_sub_type'=>$roundtrip_data->b_type,'p_from_city'=>$roundtrip_data->b_from_city))->result();

		

		$total_distance_km = $roundtrip_data->b_estimated_distance;

		

		

		foreach($data as $d)

		{

			$max_seats = $this->db->select_max('v_seat_number')->get_where('vehicle_detail',array('v_category_id'=>$d->p_v_category))->row();

							

				$min_seats = $this->db->select_min('v_seat_number')->get_where('vehicle_detail',array('v_category_id'=>$d->p_v_category))->row();

				

				

				

				

				if($max_seats == $min_seats)

				{

					$no_of_seats = $max_seats->v_seat_number;

				}

				

				else

				{

					$no_of_seats=$max_seats->v_seat_number.' - '.$max_seats->v_seat_number;	

				}	

				

				

				date_default_timezone_set('Asia/Kolkata');

		

				$date = new DateTime($roundtrip_data->b_from_time);

				$dt2=$date->format('G');	

				

				if($dt2==24 or $dt2==1 or $dt2==2 or $dt2==3 or $dt2==4 or  $dt2==0  or $dt2==23)

				{

					$night=$d->p_night_charge;

					$n='';

					$night_charge_status=1;

				}

				else

				{

					$night=0;

					$n='<span class="text-danger">Not Applied</span>';

					$night_charge_status=0;

				}		 

				 

						$date1 = date_create(date('Y-m-d',strtotime($roundtrip_data->b_from_date)));

						$date2 = date_create(date('Y-m-d',strtotime($roundtrip_data->b_to_date)));

						

					

						

						$diff =date_diff($date1,$date2);

							

						

						

						$total_days =  $diff->format("%a"); 

					

						

						

						if($dt2<=21)

						{

							$total_days = $total_days + 1;

						}											

				

				$chargeable_km=0;

				

				$discount = "";

				

				if( ($d->p_min_km * $total_days ) > $total_distance_km)

				{

				  $km_rate = ($d->p_min_km * $total_days * $d->p_extra_km_rate);

				 }

				 else

				 {

				 $km_rate = ($total_distance_km * $d->p_extra_km_rate) ;

				 

				 }

				

				$total_estimated_rate =  $km_rate ;

					

			 

			 	 if($d->p_advance_type!=0)

			 	 {

				  $total_advance_rate =  ($d->p_advance * $total_estimated_rate)/100;

				}

				else

				{

					$total_advance_rate = $d->p_advance;

				}

		  

		  		

		 $total_estimated_rate = $total_estimated_rate + $night + ($total_days *$d->p_driver_allowance	);

		 

		// $vehicle_category = $this->db->get_where('vehicle_category',array('id'=>$d->pk_vc_id))->row();

				?>

		<tr class="odd gradeX" >

		

			<td ><?php echo $this->db->get_where('vehicle_category_detail',array('id'=>$d->p_v_category))->row()->category_name; ?></td>

			<td ><?php if($d->p_ac_status == 1){ echo " AC ";}else{echo "NON AC";} ?></td>

			<td ><?php echo $no_of_seats; ?></td>

			<td> <?php echo 'Rs. '.$d->p_extra_km_rate; ?></td>

			

			<td><?php echo 'Rs. '.$total_estimated_rate; ?>

			<td ><?php if($d->id != $roundtrip_data->b_pk_id){?> <a href="javascript:;" class='btn yellow' onclick="book_package(<?php echo $d->id ?>,<?php echo $total_estimated_rate; ?>)" ><i class="fa fa-cab"></i></a><?php } ?></td>

			

		</tr>

		<?php }	?>

												

													

	

												</tbody>

											</table>

										</div>

										<div class="modal-footer">

										

											<button type="button" class="btn default" data-dismiss="modal">Close</button>

											

										</div>

									</div>

									<!-- /.modal-content -->

								</div>

								<!-- /.modal-dialog -->

							</div>

							<!-- /.modal -->

                            

                            </div>

							

							

							

							

							

							<div class="modal fade bs-modal-lg" id="assign_cab" tabindex="-1" role="dialog" aria-hidden="true">

								<div class="modal-dialog modal-lg">

								

									<div class="modal-content">

									

										<div class="modal-header">

										

											<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>

											<h4 class="modal-title">Assign Cab</h4>

										</div>

										

										

										

											

											<input type="hidden" name="id" id="id" value="<?php echo $roundtrip_data->id;?>"  />

											 <div class="col-md-12">

                                          <div class="form-group">

										   <div class="col-md-4">

                                             <label class="control-label">Select Agent<span class="required">*</span></label>

                                            

											  <select name="agent_name" id="agent_id" data-placeholder="Choose a Category" tabindex="1" class="form-control select2" required>

											  							<option></option>

                                                                       <?php foreach($agent_data as $ad){?>

																	   <option value="<?php echo $ad->id; ?>" <?php if($ad->id==$roundtrip_data->b_agent_id){?> selected="selected"<?php }?>><?php echo $ad->a_full_name." - ".$ad->a_city; ?></option>

																	   <?php } ?>

																	

												</select>						

                                             

                                          </div>

										

										 

										

										   <div class="col-md-4">

                                             <label class="control-label">Select Vehicle Category<span class="required">*</span></label>

                                            

											  <select class="form-control select2" name="cat_name" id="cat_id" data-placeholder="Choose a Category" tabindex="1" required>

											  							<option></option>

                                                                       <!--<?php //foreach($v_category_data as $vc){?>

																	   <option value="<?php //echo $vc->id; ?>"><?php //echo $vc->category_name; ?></option>

																	   <?php //} ?> -->

																	

												</select>						

                                             

                                       

										  </div>

										  

										 

										   <div class="col-md-4">

                                             <label class="control-label">Select Vehicle<span class="required">*</span></label>

                                            

											  <select class="form-control select2" name="vehicle_name" id="vehicle_id" data-placeholder="Choose a Category" tabindex="1" required>

											  							<option></option>

                                                                       

																	

												</select>						

                                             

                                          </div>

										  </div>

                                       </div>

									   <br><br>  <br><br>

                                       <!--/span-->

                                         <div class="col-md-12">

                                  	        <div class="form-group">											

                                  	        <div class="col-md-4">

                                             <label class="control-label">Driver Name<span class="required">*</span></label>

                                             <!-- <input class="form-control"  type="text"  name="driver_name" id="driver_id"  required/> -->

											  <select class="form-control select2" name="assign_driver_id" id="assign_driver_id" data-placeholder="Choose a Category" tabindex="1" required>

											  							<option></option>

                                                                       

																	

																	

												</select>

												<input type="hidden"  name="driver_name" id="driver_id" />

                                          </div>

										  

										  <div class="col-md-4">

                                             <label class="control-label">Driver Contact Number<span class="required">*</span></label>

                                             <input class="form-control"  type="text"  name="driver_contact" id="driver_number_id"  required readonly/>

                                          </div>

                                       

									   

									    <div class="col-md-4">

                                          <div class="form-group">

                                             <label class="control-label">Vehicle Registered Number<span class="required">*</span></label>

                                                    <input type="text" class="form-control" name="vehicle_number" id="vehicle_number" required readonly> 

													 <input type="hidden"  name="vehicle_list_id" id="vehicle_list_id" />  

													                                    

                                            </div>

											</div>

                                          </div>

                                       </div>

									  

										

									

										<div class="modal-footer">

											<button type="button" onclick="return assign_cab();" class="btn yellow">Assign Cab</button>

											<button type="button" class="btn default" data-dismiss="modal">Close</button>

											

										</div>

										

									</div>

										

									<!-- /.modal-content -->

								</div>

								<!-- /.modal-dialog -->

							</div>

							<!-- /.modal -->

                            

                            </div>

							

							

							<div class="modal fade bs-modal-lg" id="duty_slip" tabindex="-1" role="dialog" aria-hidden="true">

								<div class="modal-dialog modal-lg">

									<div class="modal-content">

										<div class="modal-header">

											<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>

											

											<h4 class="modal-title">Rent Card</h4>

										</div>

										<div class="modal-body">

										<form action="<?php echo base_url();?>index.php/Invoice_rent_card" method="post"  class="horizontal-form" onsubmit="return check_return_time()">

										

							<input type="hidden" name="view_id" id="view_id" value="<?php echo $roundtrip_data->id; ?>"/>			 

											

                                 <div class="form-body">

                                    <div class="row">

                                   

                                       <div class="col-md-4">

                                          <div class="form-group">

										  <?php ?>

                                             <label class="control-label">Vehicle Number and Name<span class="required">*</span></label>

                                             <input type="text" id="firstName" class="form-control" value="<?php echo $roundtrip_data->b_vehicle_number;?> - <?php echo $this->db->get_where('vehicle_detail',array('id'=>$roundtrip_data->b_vehicle_id))->row()->v_name;?>" disabled  >

                                             

                                          </div>

                                       </div>

                                       <!--/span-->

                                       <div class="col-md-4">

                                          <div class="form-group">

                                             <label class="control-label">Agent Name<span class="required">*</span></label>

                                             <input type="text" id="firstName" class="form-control" value="<?php echo $this->db->get_where('agent_detail',array('id'=>$roundtrip_data->b_agent_id))->row()->a_full_name;?>" disabled placeholder="used Owner Name" >

                                             

                                          </div>

                                       </div>

                                       <!--/span-->

								

									   

									  

                                        <div class="col-md-4">

                                          <div class="form-group">

                                             <label class="control-label">Driver Name<span class="required">*</span></label>

                                             <input type="text" id="firstName" class="form-control" value="<?php echo $roundtrip_data->b_driver_name;?>" disabled >

                                             

                                          </div>

                                       </div>

									   </div>

                                       <!--/span-->

									     <div class="row">

                                        <div class="col-md-4">

                                          <div class="form-group">

                                             <label class="control-label">Customer Name<span class="required">*</span></label>

                                             <input type="text" id="firstName" class="form-control" value="<?php if($roundtrip_data->b_self_travel_status == 1){ echo $roundtrip_data->b_p_name; } else { echo $roundtrip_data->b_p_name." / ".$passanger_data->p_full_name; }?>" disabled >

                                             

                                          </div>

                                       </div>

                                       <!--/span-->

                                       

									   

									   <div class="col-md-4">

                                          <div class="form-group">

                                             <label class="control-label">Customer Contact<span class="required">*</span></label>

                                            <input type="text" id="firstName" class="form-control" value="<?php if($roundtrip_data->b_self_travel_status == 1){ echo $roundtrip_data->b_p_contact; } else { echo $roundtrip_data->b_p_contact." / ".$passanger_data->p_contact; }?>" disabled >

                                             

                                          </div>

										  

                                       </div>

									   

									   <div class="col-md-4">

                                          <div class="form-group">

                                             <label class="control-label">Reffered By</label>

                                            <input type="text" id="reffered_by" name="reffered_by" class="form-control">

                                             

                                          </div>

										  

                                       </div>

                                       <!--/span-->

                                      

                                       <!--/span-->

                                      									  

                                       

									   </div>

                                       <!--/span-->

									     <div class="row">

										  <div class="col-md-6">

                                          <div class="form-group ">

                                             <label class="control-label">Name of Package<span class="required">*</span></label>

                                           <input type="text" id="firstName" class="form-control" value="<?php echo $roundtrip_data->package_type." ".$roundtrip_data->package_sub_type;?>" disabled >

                                            

                                          </div>

                                       </div>

									   

									   <div class="col-md-6">

                                          <div class="form-group ">

                                             <label class="control-label">City Route<span class="required">*</span></label>

                                           <input type="text" id="firstName" class="form-control" value="<?php echo $roundtrip_data->c_name; ?> - <?php echo $roundtrip_data->b_to_city; ?>" disabled>

                                            

                                          </div>

                                       </div>

									    <!--/span-->

									   

									   

									   </div>

                                       <!--/span-->

									     <div class="row">

									   <div class="col-md-6">

                                          <div class="form-group ">

                                             <label class="control-label">Date of Journey<span class="required">*</span></label>

                                          <input class="form-control " size="16" type="text" name="start_date"  onfocus="check_time()" id="start_date" value="<?php echo date('d-m-Y',strtotime($roundtrip_data->b_from_date));?>" readonly/>

                                            

                                          </div>

                                       </div>

                                       <!--/span-->

                                       <div class="col-md-6">

                                          <div class="form-group ">

                                             <label class="control-label">Date of Return</label>

                                          <input class="form-control form-control  date-picker" data-date-format="dd-mm-yyyy" data-date-start-date="<?php echo date('d-m-Y',strtotime($roundtrip_data->b_from_date));?>"  size="16" type="text"  name="return_date" id="return_date" onfocus="check_time()" />

                                            

                                          </div>

                                       </div>

									   </div>

                                       <!--/span-->

									   

									     <div class="row">

                                        <div class="col-md-6">

                                          <div class="form-group ">

                                             <label class="control-label">Time of Journey<span class="required">*</span></label>

                                           <input type="text" class="form-control " name="start_time" id="start_time" value="<?php echo date('h:i A',strtotime($roundtrip_data->b_from_time));?>" readonly >

                                            

                                          </div>

                                       </div>

                                       <!--/span-->

                                       <div class="col-md-6">

                                          <div class="form-group ">

                                             <label class="control-label">Time of Return</label>

                                          <input type="text" class="form-control timepicker timepicker-no-seconds" onblur="check_time()" value="" name="return_time" id="return_time"  > 

                                            

                                          </div>

                                       </div>

									    </div>

										

                                       <!--/span-->

									     <div class="row">

									   <div class="col-md-6">

                                          <div class="form-group ">

                                             <label class="control-label">Start KM</label>

                                          <input class="form-control" type="text" name="start_km" onblur="check_KM()"  onfocus="check_time()" id="start_km" <?php //if($booking_data->b_assign_owner_id==1){echo "required";}?>/>

                                            

                                          </div>

                                       </div>

									   <!--/span-->

									   <div class="col-md-6">

                                          <div class="form-group ">

                                             <label class="control-label">Return KM</label>

                                          <input class="form-control" type="text" name="return_km"  onblur="check_KM()" onfocus="check_time()" id="return_km" />

                                            

                                          </div>

                                       </div>

									   </div>

                                       

                                       <!--/span-->

									     <div class="row">

                                       <div class="col-md-12">

                                          <div class="form-group ">

                                             <label class="control-label">Note</label>

                                          <textarea rows="4" class="form-control"  name="other_details"  onfocus="check_time()" id="other_details"></textarea>

                                            

                                          </div>

                                       </div>

                                       <!--/span-->

                                     

                                                                          

                                       </div>

									   </div>

									   <hr />

                                        

                                        

                                   

                                    <!--/row-->

                                    

                              

										

										<div class="modal-footer">

											<button type="button" class="btn default" data-dismiss="modal">Close</button>

											<button type="submit" class="btn green">Create Duty Slip</button>

										</div>

										

									

									

									</form>

									<!-- /.modal-content -->

								</div>

								<!-- /.modal-dialog -->

							</div>

		

							<!-- /.modal -->

                            

                            </div>

							

							</div>

							

							</div>

							

							

							

							

							

							

							

							<div class="modal fade bs-modal-lg" id="taxiinvoice" tabindex="-1" role="dialog" aria-hidden="true">

								<div class="modal-dialog modal-lg">

									<div class="modal-content">

										<div class="modal-header">

											<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>

											

											<h4 class="modal-title">Complete Trip</h4>

					</div>

					<div class="modal-body">

						<form action="#" class="horizontal-form">

							<div class="form-body">

								<div class="row">



									<div class="col-md-4">

										<div class="form-group">

											<label class="control-label">Service Code<span class="required">*</span></label>

											<input type="text" id="service_code" class="form-control" readonly placeholder="used service code" value="<?php echo $roundtrip_data->b_package_id; ?>">



										</div>

									</div>

									<!--/span-->

									<div class="col-md-4">

										<div class="form-group">

											<label class="control-label">Service Name<span class="required">*</span></label>

											<input type="text" id="firstName" class="form-control" readonly placeholder="used service name" value="<?php echo $roundtrip_data->package_type." - ".$roundtrip_data->package_sub_type;?>">



										</div>

									</div>

									<!--/span-->







									<div class="col-md-4">

										<div class="form-group">

											<label class="control-label">Base Price<span class="required">*</span></label>

											<input type="text" id="base_price" class="form-control" readonly value="<?php  echo $roundtrip_data->b_pk_rate; ?>">



										</div>

									</div>

									<div class="col-md-4">

										<div class="form-group">

											<label class="control-label">Minimum Km<span class="required">*</span></label>

											<input type="text" id="min_km" class="form-control" readonly value="<?php  echo $roundtrip_data->b_pk_min_km; ?>">



										</div>

									</div>

									<div class="col-md-4">

										<div class="form-group">

											<label class="control-label">Minimum Hours<span class="required">*</span></label>

											<input type="text" id="min_hr" class="form-control" readonly value="N/A">



										</div>

									</div>

									<div class="col-md-4">

										<div class="form-group">

											<label class="control-label">Trip Start Date<span class="required">*</span></label>

											<input type="text" id="trip_start_date" class="form-control" readonly value="<?php  echo date('d/m/Y h:i A',strtotime($roundtrip_data->b_from_date." ".$roundtrip_data->b_from_time)); ?>">



										</div>

									</div>

									<div class="col-md-4">

										<div class="form-group">

											<label class="control-label">Trip End Date<span class="required">*</span></label>

											<input type="text" id="trip_start_date" class="form-control" readonly value="<?php  echo date('d/m/Y h:i A',strtotime($rent_card_details_data->r_return_date." ".$rent_card_details_data->r_return_time)); ?>">



										</div>

									</div>

									<div class="col-md-4">

										<div class="form-group">

											<label class="control-label">Advance Pay<span class="required">*</span></label>

											<input type="text" id="advance_pay" class="form-control" readonly value="<?php  echo $roundtrip_data->b_advance; ?>">



										</div>

									</div>

									<div class="col-md-4">

										<div class="form-group ">

											<label class="control-label">Driver Allowance</label>

											<input type="text" id="driver_invoice" class="form-control" value="<?php  echo $roundtrip_data->b_pk_driver_allowance; ?>" readonly>



										</div>

									</div>

									

									<!--/span-->

									<div class="col-md-4">

										<div class="form-group">

											<label class="control-label">Total Hour</label>

											<input type="text" id="exatra_hr_invoice" class="form-control" value="N/A" readonly>



										</div>

									</div>

									<!--/span-->

									<!--/span-->

									<div class="col-md-4">

										<div class="form-group">

											<label class="control-label">Total KM.</label>

											<input type="text" id="exatra_km_invoice" class="form-control" value="<?php echo $rent_card_details_data->r_return_km - $rent_card_details_data->r_start_km; ?>">



										</div>

									</div>



									<!--/span-->

									<div class="col-md-4">

										<div class="form-group ">

											<label class="control-label">Parking Charges</label>

											<input type="text" id="parking_invoice" class="form-control" value="0">





										</div>

									</div>





									<!--/span-->

									<div class="col-md-4">

										<div class="form-group ">

											<label class="control-label">Pickup Night charge</label>

											<input type="text" id="night_charge" class="form-control" value="<?php if($roundtrip_data->b_night_charge_status==1) {echo $roundtrip_data->b_pk_night_charge;}else {echo "0";} ?>" readonly>



										</div>

									</div>

                                    <div class="col-md-4">

										<div class="form-group ">

											<label class="control-label">Drop Night charge</label>

											<input type="text" id="drop_night_charge" class="form-control" value="<?php if($roundtrip_data->b_drop_night_charge_status==1) {echo $roundtrip_data->b_drop_night_charge;}else {echo "0";} ?>" readonly>



										</div>

									</div>

									<!--/span-->

									<!--/span-->

									<div class="col-md-4">

										<div class="form-group ">

											<label class="control-label">TOLL Charges</label>

											<input type="text" id="toll_invoice" class="form-control" value="0">



										</div>

									</div>

									<!--/span-->

									<!--/span-->

									<div class="col-md-4">

										<div class="form-group ">

											<label class="control-label">Border Tax</label>

											<input type="text" id="border_tax" class="form-control" value="0">



										</div>

									</div>

									<!--/span-->

									

									<!--/span-->

									<div class="col-md-4">

										<div class="form-group">

											<label class="control-label">Discount</label>&nbsp;<span class="badge badge-success"><?php if($roundtrip_data->b_pk_discount_type==0){

													echo $roundtrip_data->b_pk_discount."%";

												}else{



													echo "RS.";

												} ?></span>

											<input type="text" id="discount_invoice" class="form-control" value="



<?php

											if($roundtrip_data->b_pk_discount_type==0){

												echo $roundtrip_data->b_pk_discount;



											}else{

												echo $roundtrip_data->b_pk_discount; 

											}



											?>" readonly >











										</div>

									</div>

									<!--/span-->

									

									<!--/span-->

									<div class="col-md-4">

										<div class="form-group ">

											<label class="control-label">Other charge</label>

											<input type="text" id="other_invoice" class="form-control" value="0">



										</div>

									</div>

									
									<div class="col-md-4">

										<div class="form-group">

											<label class="control-label">Commission Type</label>
			
											<div class="mt-radio-list">
			
												<label class="mt-radio-inline">
			
												<input type="radio" id="withdraw_deposit1" class="Paid" name ="withdraw_deposit"  value="4" >Withdraw</label>
			
													
			
												<label class="mt-radio-inline">
			
												<input type="radio" id="withdraw_deposit2" class="Paid" name ="withdraw_deposit" value="3" checked="checked">Deposit</label>
			
											</div>
			
										</div>

									</div>
									

									<div class="col-md-4">

										<div class="form-group ">

											<label class="control-label">Agent Commission</label>

											<input type="number" id="agent_commission" class="form-control" value="0" pattern="[0-9]">



										</div>

									</div>
									<div class="col-md-4">
									
										<div class="form-group">

											<label class="control-label">TAX Apply On</label>
			
											<div class="mt-radio-list">
			
												<label class="mt-radio-inline">
			
												<input type="radio" id="tax1" class="Paid" name ="taxdetails"  value="<?php echo $SGST->id; ?>,<?php echo $CGST->id; ?>" checked="checked">SGST,CGST</label>
			
												<label class="mt-radio-inline">
			
												<input type="radio" id="tax2" class="Paid" name ="taxdetails" value="<?php echo $IGST->id; ?>" >IGST</label>                                          
			
											</div>
			
										</div>
														
									</div>
									<!--/span-->

									

								</div>

							</div>

							<!--/row-->



						</form>

					</div>

					<div class="modal-footer">

						<button type="button" class="btn default" data-dismiss="modal">Close</button>

						<button type="button" class="btn green" onClick="update_invoice(<?php echo $roundtrip_data->id; ?>)">Complete Trip</button>

										</div>

										

									

									

									</form>

									<!-- /.modal-content -->

								</div>

								<!-- /.modal-dialog -->

							</div>

		

							<!-- /.modal -->

                            

                            </div>

							

							

						 

						 <div class="modal fade bs-modal-lg" id="generate_invoice" tabindex="-1" role="dialog" aria-hidden="true">

			<div class="modal-dialog modal-lg">

				<div class="modal-content">

                

					<div class="modal-header">

						<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>

						<h4 class="modal-title"><strong>Generate Invoice</strong></h4>

					</div>

					<div class="modal-body">

						<div class="form-body">

							<div class="row">



								<div class="col-md-4">

									<div class="form-group">

										<label class="control-label">Service Code<span class="required">*</span></label>

										<input type="text" id="firstName" class="form-control" readonly placeholder="used service code" value="<?php echo $generate_invoice['package_id']; ?>">



									</div>

								</div>

								<!--/span-->

								<div class="col-md-4">

									<div class="form-group">

										<label class="control-label">Service Name<span class="required">*</span></label>

										<input type="text" id="firstName" class="form-control" readonly placeholder="used service name" value="<?php echo $generate_invoice['type'].'-'.$generate_invoice['sub_type']; ?>">



									</div>

								</div>

								<div class="col-md-4">

									<div class="form-group">

										<label class="control-label">Base Price<span class="required">*</span></label>

										<input type="text" id="firstName" class="form-control" readonly value="<?php  echo round($generate_invoice['base_price']); ?>">



									</div>

								</div>

								<div class="col-md-2">

									<div class="form-group">

										<label class="control-label">Minimum Km<span class="required">*</span></label>

										<input type="text" id="firstName" class="form-control" readonly value="<?php  echo $generate_invoice['min_km'] * $final_total_days; ?>">



									</div>

								</div>

								<div class="col-md-2">

									<div class="form-group">

										<label class="control-label">Minimum Hrs<span class="required">*</span></label>

										<input type="text" id="firstName" class="form-control" readonly value="N/A">



									</div>

								</div>

								<div class="col-md-4">

									<div class="form-group">

										<label class="control-label">Journey Start Date<span class="required">*</span></label>

										<input type="text" id="firstName" class="form-control" readonly value="<?php  echo date('d/m/Y h:i A',strtotime($rent_card_details_data->r_start_date." ".$rent_card_details_data->r_start_time)); ?>">



									</div>

								</div>

								<div class="col-md-4">

									<div class="form-group">

										<label class="control-label">Journey Return Date<span class="required">*</span></label>

										<input type="text" id="firstName" class="form-control" readonly value="<?php  echo date('d/m/Y h:i A',strtotime($rent_card_details_data->r_return_date." ".$rent_card_details_data->r_return_time)); ?>">



									</div>

								</div>

								

								<!--/span-->

								<div class="col-md-2">

									<div class="form-group">

										<label class="control-label">Total KM.</label>

										<input type="text" id="exatra_km_invoice1" class="form-control" value="<?php echo $generate_invoice['extra_km']; ?>" readonly>



									</div>

								</div>

								<!--/span-->

								<div class="col-md-2">

									<div class="form-group">

										<label class="control-label">Total Hour</label>

										<input type="text" id="exatra_hr_invoice1" class="form-control" value="N/A" readonly>



									</div>

								</div>

								

								<div class="col-md-4">

									<div class="form-group ">

										<label class="control-label">Driver Allowance</label>

			<input type="text" id="driver_invoice1" class="form-control" value="<?php echo $generate_invoice['driver_allowance']*$generate_invoice['total_days']; ?>" readonly>



									</div>

								</div>

								

								<div class="col-md-4">

									<div class="form-group ">

										<label class="control-label">Parking Charges</label>

										<input type="text" id="parking_invoice1" class="form-control" value="<?php echo $generate_invoice['parking_charge']; ?>" readonly>



									</div>

								</div>

								<!--/span-->

								<div class="col-md-4">

									<div class="form-group ">

										<label class="control-label">TOLL Charges</label>

										<input type="text" id="toll_invoice1" class="form-control" value="<?php echo $generate_invoice['toll_charge']; ?>" readonly>



									</div>

								</div>

								<!--/span-->



								<!--/span-->

								<!--/span-->

								<div class="col-md-4">

									<div class="form-group ">

										<label class="control-label">Border Tax</label>

										<input type="text" id="other_invoice1" class="form-control" value="<?php echo $generate_invoice['border_tax']; ?>"  readonly>



									</div>

								</div>

								

								<!--/span-->

								<!--/span-->

								<div class="col-md-4">

									<div class="form-group ">

										<label class="control-label">Night Charge</label>

										<input type="text" id="other_invoice1" class="form-control" value="<?php echo $generate_invoice['night_charge']+$generate_invoice['drop_night_charge']; ?>"  readonly>



									</div>

								</div>

                                

                                

								

								<!--/span-->

								<div class="col-md-4">

									<div class="form-group ">

										<label class="control-label">Other charge</label>

										<input type="text" id="other_invoice1" class="form-control" value="<?php echo $generate_invoice['other_charge']; ?>"  readonly>



									</div>

								</div>

								

								<div class="col-md-4">

									<div class="form-group ">

										<label class="control-label">Discount</label>&nbsp;<span class="badge badge-success">Rs.</span>

										<input type="text" id="invoice_discount_invoice" class="form-control" value="



<?php echo $generate_invoice['discount'];	?>"  readonly="readonly">



									</div>

								</div>

								<!--/span-->

								

									<!--/span-->

							<div class="col-md-4">

									<div class="form-group ">

										<label class="control-label">Route</label>

										<input type="text" id="Last_city" class="form-control" value="<?php

										if($generate_invoice['route']=="")

										{

										$c=$this->db->get_where('city_detail',array('id'=>$roundtrip_data->b_from_city))->row();

										echo $c->c_name;

										

										

								

										if($roundtrip_data->b_type == '4')

										{

										$to_city = $this->db->get_where('city_detail',array('id'=>$roundtrip_data->b_to_city))->row();

										echo " - ".$to_city->c_name;

										}

										else

										{

										

										echo " - ".$roundtrip_data->b_to_city;

										}

										

										}

										else

										{

											echo $generate_invoice['route'];

										}

										

								

										?>" required >



									</div>

								</div>

								

								

								<div class="col-md-4">

									<div class="form-group ">

										<label class="control-label">Total Amount </label>

										<input type="text" id="t_amount" class="form-control" value="<?php echo round($generate_invoice['total_amount'] + $generate_invoice['advance_pay'],2);?>" readonly>



									</div>

								</div>

								<!--/span-->



								<div class="col-md-4">

									<div class="form-group ">

										<label class="control-label">Advance Pay</label>

										<input type="text" id="advance_pay" class="form-control" value="<?php echo round($generate_invoice['advance_pay']); ?>" readonly>



									</div>

								</div>

								

<?php $tax_value = explode(',',$generate_invoice['tax_value']);

								  $tax_percentage = explode(',',$generate_invoice['tax_percentage']);

								  $tax_name = explode(',',$generate_invoice['tax_name']);  ?>

								  

							<?php if($generate_invoice['tax_value']!=0){	  

							 for($i=0; $i<sizeof($tax_value); $i++)  { ?>

								<div class="col-md-2">

									<div class="form-group ">

										<label class="control-label">Tax ( <?php echo $tax_name[$i]."  ";  echo round($tax_percentage[$i],2);?> %)</label>

										<input type="text" id="total_tax" class="form-control" value="<?php echo round($tax_value[$i],2); ?>" readonly>



									</div>

								</div>

								<?php } } else {?>

										<div class="col-md-4">

									<div class="form-group ">

										<label class="control-label">Tax</label>

										<input type="text" id="total_tax" class="form-control" value="N/A" readonly>



									</div>

								</div>

								<?php } ?>

								

								<div class="col-md-4">

									<div class="form-group">

										<label class="control-label">Paid Amount<span class="required">*</span></label>

										<input type="text" id="firstName" class="form-control" readonly value="<?php  echo round($generate_invoice['paid_amount'],2); ?>">



									</div>

								</div>

								

								<div class="col-md-4">

									<div class="form-group ">

										<label class="control-label">Pay Amount</label>&nbsp;<span class="badge badge-success"><?php echo $generate_invoice['extra_discount'];	?> Rs.</span>

										<input type="text" id="pay_amount"  class="form-control" value="0" onFocus="set_total_amount()" onBlur="check_discount_availability()" >



									</div>

								</div>

								<!--/span-->

								

								<div class="col-md-4">
									<div class="form-group">

                                                                        <label class="control-label">Pay Type

                                                                            <span class="required"> * </span>

                                                                        </label>

                                                                       

                                                                   <select id="b_payment_type" class="form-control" required>

											<?php $payment_type = $this->db->get('payment_type')->result(); ?>
                                            <?php foreach($payment_type as $pt) {?>

                                                <option value="<?php echo $pt->id;?>"><?php echo $pt->payment_name;?></option>

                                               <?php } ?>

                                            </optgroup>

                                        </select>

                                                                    

                                                                  </div>
								</div>

									<div class="col-md-12">

										<div class="form-group ">

											<label class="control-label">Balance Amount</label>

											<div class="input-inline input-medium">

												<div class="input-group">

													<span class="input-group-addon">

											 Pay Amount

											</span>

													<input type="text" id="balance_amount" class="form-control" value="<?php if($generate_invoice['paid_amount']==0){

													$d111=$generate_invoice['total_amount']-$generate_invoice['extra_discount']; 							                         							echo round($d111,2);

												}else{

													$d1=$generate_invoice['total_amount']-$generate_invoice['paid_amount']-$generate_invoice['extra_discount'];

													echo round($d1,2);

												}

												?>" readonly>



												</div>



												<input type="hidden" id="pay1" class="form-control" value="<?php

												 if($generate_invoice['paid_amount']==0){

													$d111=$generate_invoice['total_amount']-$generate_invoice['extra_discount']; echo $d111;

												}else{

													$d1=$generate_invoice['total_amount']-$generate_invoice['paid_amount']-$generate_invoice['extra_discount'];

													echo $d1;

												}

												?>">



											</div>

										</div>





									</div>

								

							

							

								<div class="col-md-12">

									<div class="form-group">

									<label class="control-label"></label>

										 <div class="mt-radio-list">

										<label class="mt-radio-inline">

                						<input type="radio" id="pay_type_1" class="Paid" name ="pay_type"  value="1">Paid Amount</label>

										

										<label class="mt-radio-inline">

										<input type="radio" id="pay_type_2" class="Paid" name ="pay_type" value="2">Final Amount</label>

										</div>

									</div>

								</div>

									

							</div>





							<!--/row-->

						<hr />

						</div>

						<div class="modal-footer">

							<button type="button" class="btn default" data-dismiss="modal">Close</button>

							<button type="button" class="btn btn-success" onClick="invoice_generate(<?php echo $roundtrip_data->id;?>)">Generate Invoice</button>

						</div>

					</div>

                   

					<!-- /.modal-content -->

				</div>

				<!-- /.modal-dialog -->

			</div>



							<!-- /.modal -->

                            

                            </div>

         

		 

		 

		 

				

				

				

				

<style>

.pac-container {

   background-color: #FFF;

	z-index: 9995;  

   position: fixed;

   display: inline-block;

   float: left;

}

.modal{

z-index: 9995;   

}

.modal-backdrop{

   z-index: 10;        

}

</style>



<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>

<script>

$(document).ready(function ()

{

	$('#cat_id').on('change', function()			  

	 {

	 	

	 	/* var cat_id = $(this).val();

		 alert(cat_id);

		 console.log(cat_id);

		 

		$.ajax(

		{   

			url: "<?php echo base_url();?>index.php/Roundtrip_view/get_city_by_state", 

			async: false,

			type: "POST", 

			data: "cat_id="+cat_id,

			dataType: "html",                          

			

			success: function(data) 

			{

				alert(data);                         

				$('#vehicle_id').html(data);

			}

		});*/

		

		get_vehicle_category_data();

		

	});

	get_vehicle_data();

	get_driver_data();

	change_agent();

	

	$("select#agent_id").change(function()			  

	{

		change_agent();

    });

	$("select#vehicle_id").change(function()			  

	{

		set_vehicle_data();

	});

	$("select#assign_driver_id").change(function()			  

	{

		set_driver_data();

    });

});

function change_agent(){

	$('#vehicle_list_id').val('');

	$('#vehicle_number').val('');

	$('#driver_id').val('');

	$('#driver_number_id').val('');

	$('#vehicle_id').empty();

	get_vehicle_data();

	get_driver_data();

}

function get_vehicle_category_data(){

		$('#vehicle_list_id').val('');

		$('#vehicle_number').val('');

		var agent_id = $("#agent_id option:selected").val();

		var cat_id = $("#cat_id option:selected").val();

		var vehicle_id = '<?php echo $roundtrip_data->b_vehicle_id; ?>';

		

		$.ajax({

					url: '<?php echo base_url(); ?>index.php/Ajax_common/get_vehicle_type_data',

					type: 'post',

					data: {agent_id : agent_id, cat_id : cat_id, vehicle_id : vehicle_id},

					success: function(msg)

					{

						$('#vehicle_id').empty();

						$('#vehicle_id').html(msg);

						set_vehicle_data();

					}

		});

	}

function get_vehicle_data(){

	var agent_id = $("#agent_id option:selected").val();

	var cat_id = '<?php echo $roundtrip_data->b_vc_category_id; ?>';

	

                 

	$.ajax({

                url: '<?php echo base_url(); ?>index.php/Ajax_common/get_vehicle_data',

                type: 'post',

                data: {agent_id : agent_id, cat_id: cat_id},

                success: function(msg)

                {

					$('#cat_id').empty();

					$('#cat_id').html(msg);

					get_vehicle_category_data();

                }

    });

}

function set_vehicle_data(){

	var vehicle_list_id = $("#vehicle_id option:selected").data('vehicle_list_id');

	var v_register_no = $("#vehicle_id option:selected").data('v_register_no');

		

	$('#vehicle_list_id').val(vehicle_list_id);

	$('#vehicle_number').val(v_register_no);

}

function get_driver_data(){

	var agent_id = $("#agent_id option:selected").val();

	var assign_driver_id = <?php echo $roundtrip_data->b_assign_driver_id; ?>;

                 

	$.ajax({

                url: '<?php echo base_url(); ?>index.php/Ajax_common/get_driver_data',

                type: 'post',

                data: {agent_id : agent_id ,assign_driver_id:assign_driver_id},

                success: function(msg)

                {

					$('#assign_driver_id').empty();

					$('#assign_driver_id').html(msg);

					set_driver_data();

                }

    });

}

function set_driver_data(){

	var d_full_name = $("#assign_driver_id option:selected").data('d_full_name');

	var d_contact_no1 = $("#assign_driver_id option:selected").data('d_contact_no1');

		

	$('#driver_id').val(d_full_name);

	$('#driver_number_id').val(d_contact_no1);

}

function update_invoice(id)

{

		

					var service_code = $('#service_code').val();

					var base_price = $('#base_price').val();

					var min_km = $('#min_km').val();

					var min_hr = $('#min_hr').val();

					var advance_pay = $('#advance_pay').val();

					var trip_start_date = $('#trip_start_date').val();

					var exatra_km_invoice=$("#exatra_km_invoice").val();

					var exatra_hr_invoice=$("#exatra_hr_invoice").val();

					var parking_invoice=$("#parking_invoice").val();

					var toll_invoice=$("#toll_invoice").val();

					var driver_invoice=$("#driver_invoice").val();

					var other_invoice=$("#other_invoice").val();

					var discount_invoice=$("#discount_invoice").val();

					var night_charge=$('#night_charge').val();

					var drop_night_charge=$('#drop_night_charge').val();

					

					var border_tax=$('#border_tax').val();

					

					

					var descri_invoice='';

					var agent_commission=$('#agent_commission').val();

					var tran_type=$('input[name=withdraw_deposit]:checked').val();
					
					var b_tax_type=$("input[name='taxdetails']:checked").val();

					//alert('id'+id+'service_code'+service_code+'base_price'+base_price+'min_km'+min_km+'min_hr'+min_hr+'ex_km'+exatra_km_invoice+'ex_hr'+exatra_hr_invoice+'parking'+parking_invoice+'toll'+toll_invoice+'driver'+driver_invoice+'other'+other_invoice+'discount'+discount_invoice+'descri'+descri_invoice+'trip_start_date'+trip_start_date+'advance_pay'+advance_pay+'night_charge'+night_charge+'border_tax'+border_tax);

					$.ajax({

						url: '<?php echo base_url(); ?>index.php/Ajax_common/update_invoice',

						type: "POST",

						data: {drop_night_charge:drop_night_charge,id:id,service_code:service_code,base_price:base_price,min_km:min_km,min_hr:min_hr,ex_km:exatra_km_invoice,ex_hr:exatra_hr_invoice,parking:parking_invoice,toll:toll_invoice,driver:driver_invoice,other:other_invoice,discount:discount_invoice,descri:descri_invoice,trip_start_date:trip_start_date,advance_pay:advance_pay,night_charge:night_charge,border_tax:border_tax,agent_commission:agent_commission,tran_type:tran_type,b_tax_type:b_tax_type},

						success: function(resp)

						{

							//alert(resp);

						

							$("#taxiinvoice").modal('hide');

						

							window.location.reload(1);

							



						}

					});

				}

function invoice_generate(id)

{	

	var balnce=$("#pay1").val();

	var lcity=$("#Last_city").val();

	

	var pay_type = $('input[name=pay_type]:checked').val();

	var total_amount =<?php echo $generate_invoice['total_amount'] + $generate_invoice['advance_pay']?>;

	var pay_amount = $('#pay_amount').val();

	

	

	var ticket_id="<?php echo $generate_invoice['ticket_id'];?>";

	var tax_value = "0";

	

	var tax_percentage ="0";

	var tax_name = "0";

	

	var tax_type = "0";

	var payment_type = $("#b_payment_type").val();







	$.ajax({

		url: '<?php echo base_url(); ?>index.php/Roundtrip_view/generate_invoice',

		type: "POST",

		data: {edit:id,balnce:balnce,Last_city:lcity,pay_type:pay_type,total_amount:total_amount,tax_value:tax_value,tax_percentage:tax_percentage,tax_name:tax_name,tax_type:tax_type,ticket_id:ticket_id,pay_amount:pay_amount,payment_type:payment_type},

		success: function(resp)

		{

			//alert(resp);	

			$("#generate_invoice").modal('hide');

			window.location.reload(1);



		}

	});

}

function update()

{



	var editid=$("#Editid").val();

	

	var name=$("#name").val();

	

	var mobile=$("#mobile").val();

	

	var pickup=$("#pickup").val();

	

	var drop=$("#drop").val();

	

	var time=$("#time").val();

	

	var date=$("#b_from_date").val();

	

	var to_date=$("#b_to_date").val();

	

	$.ajax({

	

		url: '<?php echo base_url()."index.php/Roundtrip_view/update_booking"; ?>',

		type: "POST",

		data: {editid:editid,name:name,mobile:mobile,pickup:pickup,drop:drop,time:time,date:date,to_date:to_date},

		success: function(resp)

		{			

				//alert(resp);

				$("#edit").modal('hide');

				window.location.reload(1);

		}

		

	});

	

	

}

function cancel(id)

{

		

		//var cancel_time = $('#cancel_time').val();

		//var cancel_date = $('#cancel_date').val();

		var cancel_time = '<?php echo date('H:i:s'); ?>';

		var cancel_date = '<?php echo date('Y-m-d'); ?>';

		var cancel_type = $('#cancel_type').val();

		var cancel_note = $('#cancel_note').val();

		

		//alert(id+"    "+cancel_type+"    "+cancel_time+"  "+cancel_date);

									   

		$.ajax({

		url: '<?php echo base_url(); ?>index.php/Roundtrip_view/cancel_booking',

		type: 'post',

		data: {id:id,cancel_time:cancel_time,cancel_date:cancel_date,cancel_type:cancel_type,cancel_note:cancel_note},

			success: function(msg)

			{

						//window.location.reload(1);

				  var form = $('<form action="<?php echo base_url(); ?>index.php/Roundtrip_view" method="post">' +

				  '<input type="hidden" name="roundtrip_view_id" value="' + id + '"></input>' + '</form>');

				  $('body').append(form);

				  $(form).submit();

			}

		});

	

}

function book_package(package_id,rate)

{

	var booking_id = <?php echo $roundtrip_data->id;?>;

		

		$.ajax({

		url: '<?php echo base_url(); ?>index.php/Roundtrip_view/modify_booking_package',

		type: 'post',

		data: {package_id : package_id, booking_id:booking_id,total_estimated_rate:rate },

		success: function(msg)

		{

					window.location.reload(1);

		}

			});

}

function assign_cab()

{

	id = $('#id').val();

	cat_id = $('#cat_id').val();

	agent_id = $('#agent_id').val();

    vehicle_id = $('#vehicle_id').val();

    driver_id = $('#driver_id').val();

	driver_number_id = $('#driver_number_id').val();

    vehicle_number = $('#vehicle_number').val();

	

	var vehicle_list_id = $('#vehicle_list_id').val();

	var assign_driver_id = $("#assign_driver_id option:selected").val();

	

	agent_check = document.getElementById('agent_id');

	cat_check = document.getElementById('cat_id');

	vehicle_check = document.getElementById('agent_id');

	

	if(agent_check.options[agent_check.selectedIndex].value == "")

	{

		alert("Please select Atleast one Agent!");

		return false;

	}

	/*if(cat_check.options[cat_check.selectedIndex].value == "")

	{

		alert("Please select Atleast one Category!");

		return false;

	}

	if(vehicle_check.options[vehicle_check.selectedIndex].value == "")

	{

		alert("Please select Atleast one Vehicle!");

		return false;

	}

	if(driver_id == "" || driver_number_id == "" || vehicle_number == "" )

	{

			alert("Please Fill Proper Driver information! ");

			return false;

	}*/

	

	$.ajax({

		url: '<?php echo base_url(); ?>index.php/Roundtrip_view/assign_cab',

		type: 'post',

		data: {id:id,cat_id:cat_id,agent_id:agent_id,vehicle_id:vehicle_id,driver_id:driver_id,driver_number_id:driver_number_id,vehicle_number:vehicle_number, vehicle_list_id:vehicle_list_id, assign_driver_id:assign_driver_id},

		success: function(msg)

		{

					$("#assign_cab").modal('hide');

					window.location.reload(1);	

		}

	});

		

}

function set_total_amount()

{					

	<?php

	 if($generate_invoice['paid_amount']==0){

		$bal_amount=$generate_invoice['total_amount']-$generate_invoice['extra_discount']; 

		

	}else{

		$bal_amount=$generate_invoice['total_amount']-$generate_invoice['paid_amount'] - $generate_invoice['extra_discount'];

		

	}

	?>

	$('#pay1').val(<?php echo round($bal_amount,2);?>);

	$('#balance_amount').val(<?php echo round($bal_amount,2);?>);

}

function check_discount_availability()

{	

	var ext_discount =  parseInt($('#pay_amount').val());

	var bal =  parseInt($('#balance_amount').val());

	if(ext_discount <= bal)

	{	

		$('#pay1').val(($('#pay1').val()- $('#pay_amount').val()).toFixed(2) );

		$('#balance_amount').val(($('#balance_amount').val()- $('#pay_amount').val()).toFixed(2) );

	

	}

	else

	{

		alert("Discount should be less than total" );

		$('#pay_amount').val(0);

	}



}

function check_time()

				{

					var return_date = $('#return_date').val();

					var start_date = $('#start_date').val();

					

					if($('#return_time').val() != "")

					{

						

					if(start_date == return_date)

					{

					

						var time = $("#start_time").val();

						var hours = Number(time.match(/^(\d+)/)[1]);

						var minutes = Number(time.match(/:(\d+)/)[1]);

						var AMPM = time.match(/\s(.*)$/)[1];

						if(AMPM == "PM" && hours<12) hours = hours+12;

						if(AMPM == "AM" && hours==12) hours = hours-12;

						var sHours = hours.toString();

						var sMinutes = minutes.toString();

						if(hours<10) sHours = "0" + sHours;

						if(minutes<10) sMinutes = "0" + sMinutes;

						start_time = sHours + ":" + sMinutes;

						

						var time = $("#return_time").val();

						var hours = Number(time.match(/^(\d+)/)[1]);

						var minutes = Number(time.match(/:(\d+)/)[1]);

						var AMPM = time.match(/\s(.*)$/)[1];

						if(AMPM == "PM" && hours<12) hours = hours+12;

						if(AMPM == "AM" && hours==12) hours = hours-12;

						var sHours = hours.toString();

						var sMinutes = minutes.toString();

						if(hours<10) sHours = "0" + sHours;

						if(minutes<10) sMinutes = "0" + sMinutes;

						return_time = sHours + ":" + sMinutes;

						

						if(start_time>=return_time)

						{

							$('#return_time').val('');

						}

					}

					}

					

				}

				

				function check_KM()

				{

					if($('#return_km').val() != "")

					{

						

							if(parseInt($('#return_km').val()) <= parseInt($('#start_km').val()))

							{

								$('#return_km').val('');

							}

						

					}

				

				}

				

				

				function check_return_time()

				{

					if($('#return_time').val() != "")

					{

						if($('#return_date').val() == $('#start_date').val())

						{

							var time = $("#start_time").val();

						var hours = Number(time.match(/^(\d+)/)[1]);

						var minutes = Number(time.match(/:(\d+)/)[1]);

						var AMPM = time.match(/\s(.*)$/)[1];

						if(AMPM == "PM" && hours<12) hours = hours+12;

						if(AMPM == "AM" && hours==12) hours = hours-12;

						var sHours = hours.toString();

						var sMinutes = minutes.toString();

						if(hours<10) sHours = "0" + sHours;

						if(minutes<10) sMinutes = "0" + sMinutes;

						start_time = sHours + ":" + sMinutes;

						

						var time = $("#return_time").val();

						var hours = Number(time.match(/^(\d+)/)[1]);

						var minutes = Number(time.match(/:(\d+)/)[1]);

						var AMPM = time.match(/\s(.*)$/)[1];

						if(AMPM == "PM" && hours<12) hours = hours+12;

						if(AMPM == "AM" && hours==12) hours = hours-12;

						var sHours = hours.toString();

						var sMinutes = minutes.toString();

						if(hours<10) sHours = "0" + sHours;

						if(minutes<10) sMinutes = "0" + sMinutes;

						return_time = sHours + ":" + sMinutes;

						

							

							if(return_time <= start_time)

							{

								$('#return_time').val('');

								return false;

							}

							else

							{

								return true;

							}

						}

						else

							{

								return true;

							}

					}

					else

					{

						return true;

					}

				}

function fetch_rent_card()

{

	var view_id= <?php echo $roundtrip_data->id?>;

	

	$('#return_time').val('');

	

	$.ajax({

				url: '<?php echo base_url(); ?>index.php/Roundtrip_view/fetch_rent_card',

				type: "POST",

				dataType:'json',

				data: {view_id:view_id},

				success: function(resp) {

					//alert(resp['r_start_km']);

					//alert(resp['r_return_km']);

					if(resp['r_start_km']==0)

					{

						$('#start_km').val("");

					}

					else

					{

						$('#start_km').val(resp['r_start_km']);

					}

					if(resp['r_return_km']==0)

					{

						$('#return_km').val("");

					}

					else

					{

						$('#return_km').val(resp['r_return_km']);

					}

					$('#return_date').val(resp['r_return_date']);

					$('#return_time').val(resp['r_return_time']);

					$('#reffered_by').val(resp['r_reffered_by']);

					$('#other_details').val(resp['r_other_details']);

					

				}

		});

}



</script>			

<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?sensor=false&libraries=places"></script>

<script>

google.maps.event.addDomListener(window, 'load', function ()

{

	var places = new google.maps.places.Autocomplete((document.getElementById('pickup')),

	{

		types: ['geocode'],

		componentRestrictions: {country: 'in' }

	});

	 $('#my-modal').modal('show');	

	

	google.maps.event.addListener(places, 'place_changed', function ()

	{

		

	});	

	var places = new google.maps.places.Autocomplete((document.getElementById('drop')),

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

 <?php $this->load->view('footer'); ?>