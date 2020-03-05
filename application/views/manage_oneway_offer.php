<?php $this->load->view('header');?>
            <!-- END HEADER -->
            <div class="container-fluid">
                <div class="page-content">
                    <!-- BEGIN BREADCRUMBS -->
                    <div class="breadcrumbs">
                        <h1>Manage Oneway Offer</h1>
                        
                    </div>
											 <?php 
												$msg = $this->session->flashdata('success'); 
												if(!empty($msg['success'])){ ?>
												<div class="alert alert-success alert-dismissible" role="alert">
												  <button type="button" class="close" data-dismiss="alert" aria-label="Close">                                                     <span aria-hidden="true">&times;</span></button>
												  		<p class="success"><strong>Congrats!</strong> <?php echo $msg['success']; ?>.</p>
												</div>
											<?php }?>
                    <!-- END BREADCRUMBS -->
                    <!-- BEGIN PAGE BASE CONTENT -->
                 <div class="row">
                        <div class="col-md-12">
                            <!-- BEGIN EXAMPLE TABLE PORTLET-->
                            <div class="portlet light bordered">
                                
                                <div class="portlet-body">
                                    <div class="table-toolbar">
                                       <div class="row">
                                            
                                            <div class="col-md-12">
											<a href="<?php echo base_url();?>index.php/Oneway_offer_management/add_oneway_offer" class="btn yellow  btn-outline" >Add New
                                                        <i class="fa fa-plus"></i></a>
											
											
											
											
											
											
                                                
                                            </div>
                                        </div>
                                    </div>
									
									<div class="portlet-body">
									
									<div class="tabbable-line">

                                                    <ul class="nav nav-tabs ">

                                                         <li <?php if(!$this->input->get('all_list')) { ?>class="active"<?php } ?>>

                                                            <a href="#tab_today_1" data-toggle="tab"> TODAY (Request) </a>

                                                        </li>

                                                        

                                                         <li>

                                                            <a href="#tab_tommorrow_1" data-toggle="tab"> TOMORROW (Request) </a>

                                                        </li>

                                                        

                                                         <li >

                                                            <a href="#tab_today_2" data-toggle="tab"> TODAY ALL (Open) </a>

                                                        </li>

                                                        

                                                        <li>

                                                            <a href="#tab_tommorrow_2" data-toggle="tab"> TOMORROW ALL (Open) </a>

                                                        </li>
														
														<li>

                                                            <a href="#request_all" data-toggle="tab">  ALL (Request) </a>

                                                        </li>
														
														<li>

                                                            <a href="#open_all" data-toggle="tab">  ALL (Open) </a>

                                                        </li>

                                                        <li <?php if($this->input->get('all_list')) { ?>class="active"<?php } ?>>

                                                            <a href="#tab_all_1" data-toggle="tab">ALL</a>

                                                        </li>                                           

                                                    </ul>
													
													<div class="tab-content">

                                                        <div class="tab-pane <?php if($this->input->get('all_list')) { ?>active<?php } ?>" id="tab_all_1">

                                                            <p> 

                                                            <div class="portlet-body">
															
									<div class="row">

                        <div class="col-md-12">

                         	<div class="portlet light bordered">

                                            

                            	<div class="portlet-body form">

                                	<!-- BEGIN FORM-->

                                	<form action="<?php echo base_url();?>index.php/Oneway_offer_management?all_list=search_list" id="subscribeForm" method="post" class="horizontal-form">

                                    	<div class="form-body">

                                                      

											<div class="row">

												

												<div class="col-md-4">

                                                	<div class="form-group">

														<label class="control-label">From Date </label><span class="required">*</span>

														<input class="form-control form-control-inline date-picker" size="16" type="text" id="from_date" name="from_date" data-date-format="dd-mm-yyyy" value="" required/>  

													</div>

												</div>

													 

												<div class="col-offset-4 col-md-4">

                                                	<div class="form-group">

														<label class="control-label">To Date </label><span class="required">*</span>

														<input class="form-control form-control-inline date-picker" size="16" type="text" id="to_date" name="to_date" data-date-format="dd-mm-yyyy" value="" required/>  

													</div>

												</div>
												<div class="col-md-4">
													<div class="form-actions">

												<button type="submit" class="btn yellow" >

                                                            <i class="fa fa-check"></i>Submit</button>
															
												<a href="<?php echo base_url()."index.php/Oneway_offer_management?all_list=all_list";?>" class="btn blue" >

                                                            <i class="fa fa-align-justify"></i>ALL</a>

											</div>
											</div>	
											</div>

										</div>

                                    </form>
									
									

                                	<!-- END FORM-->

                               

                        		</div>

                    		</div>

                    	</div>

                    </div>						
	
                                     <br><br><br><br>
                                   <table class="table table-striped table-bordered table-hover dt-responsive" id="sample_A">
                                        <thead>
                                            <tr>
                                              
                                             <th>
												Offer #
											</th>
											<th>
												Vehicle Category
											</th>
											<th>
												City Route
											</th>																						<th>												Agent Name											</th>
											<th>
												Agent Number
											</th>
											
											<th>
												Valid From
											</th> 
											<th>
												Valid To
											</th> 
											<th>
												 Status
											</th>
										
											<th>
												 Action
											</th>
                                            </tr>
                                        </thead>
                                        <tbody>
										
									
										<?php if(isset($oneway_offer_list)) { foreach($oneway_offer_list as $row) {?>
                                            <tr class="odd gradeX">
                                               
                                            <td>
												<?php echo $row->oo_id; ?>
											</td>
											<td>
												<?php echo $this->db->get_where('vehicle_category_detail',array('id'=>$row->oo_vc_id))->row()->category_name; ?>
											</td>
											
											<td>
												<?php echo $this->db->get_where('city_detail',array('id'=>$row->oo_first_city))->row()->c_name." - ".$this->db->get_where('city_detail',array('id'=>$row->oo_second_city))->row()->c_name; if(!empty($row->oo_third_city)){echo " - ".$this->db->get_where('city_detail',array('id'=>$row->oo_third_city))->row()->c_name;} ?>
											</td>																						<td>												<a href="<?php echo base_url()."index.php/Agent_management/view_agent/MOO/".$row->oo_agent_id; ?>"><?php echo $row->agentname; ?></a>											</td>
											<td>
												<?php echo $row->a_contact_no1; ?>
											</td>
											<td>
												<?php echo date('d-m-Y h:i A',strtotime( $row->oo_valid_date." ".$row->oo_valid_from_time )); ?>
											</td>
											<td>
												<?php echo date('d-m-Y h:i A',strtotime( $row->oo_valid_date." ".$row->oo_valid_to_time )); ?>
											</td>
											<td>
											<?php if($row->b_status != 1) { if($row->oo_status != 1) { ?>
												<span class="label label-sm label-danger"> INACTIVE </span>
											<?php } else if($row->oo_status == 1) { ?>
												<span class="label label-sm label-info">ACTIVE  </span>
											<?php } } else { ?>
												<span class="label label-sm label-success"> BOOKED </span>
											<?php } ?>
											</td>
											<td>
						<form  method="post">													
					    <?php if($row->id == $row->b_pk_id) { ?>
						<button  formaction="<?php echo base_url();?>index.php/Oneway_offer_management/booking_request/URV/<?php echo $row->id; ?>" value="<?php echo $row->id; ?>" name="oneway_offer_request_id" class="btn btn-sm yellow"><i class="fa fa-users"></i></button>						
						<?php } else if($row->b_status != 1) { ?>
						<?php if($row->oo_status != 1) { ?>
												
												<button  formaction="<?php echo base_url();?>index.php/Oneway_offer_management/oneway_offer_status" value="<?php echo $row->id; ?>" onClick="return do_active();" name="oneway_offer_status_id" class="btn btn-sm red-haze"><i class="fa fa-ban"></i></button>
												
												<?php } else { ?>
												
												<button  formaction="<?php echo base_url();?>index.php/Oneway_offer_management/oneway_offer_status" value="<?php echo $row->id; ?>" name="oneway_offer_status_id"  onClick="return do_inactive();" class="btn btn-sm green"><i class="fa fa-ban"></i></button>
												
												<?php }?>
	
						<button formaction="<?php echo base_url();?>index.php/Oneway_offer_management/get_data_edit_oneway_offer" class="btn btn-sm blue"  value="<?php echo $row->id; ?>" name="oneway_offer_edit_id"><i class="fa fa-pencil"></i></button>
						
						<button formaction="<?php echo base_url()?>index.php/Oneway_offer_management/delete_oneway_offer" name="oneway_offer_dlt_id" value="<?php echo $row->id; ?>" class="btn btn-sm red" onclick="return doconfirm();"><i class="fa fa-trash-o"></i></button>
						
						
						<?php } ?>
											
											</form>				   
										   </td>
											</tr>
                                              
										<?php } }?>
									
                                            
                                        </tbody>
                                    </table>
															
																</div>
															</p>
														</div>
														
										 <div class="tab-pane <?php if(!$this->input->get('all_list')) { ?>active<?php } ?>" id="tab_today_1">
										 <p> 
										 <div class="portlet-body">			
										  <br><br>
                                   <table class="table table-striped table-bordered table-hover dt-responsive" id="sample_B">
                                        <thead>
                                            <tr>
                                              
                                             <th>
												Offer #
											</th>
											<th>
												Vehicle Category
											</th>
											<th>
												City Route
											</th>																						<th>												Agent Name											</th>
											<th>
												Agent Number
											</th>
											
											<th>
												Valid From
											</th> 
											<th>
												Valid To
											</th> 
											<th>
												 Status
											</th>
										
											<th>
												 Action
											</th>
                                            </tr>
                                        </thead>
                                        <tbody>
										
									
										<?php foreach($today_request as $row) {?>
                                            <tr class="odd gradeX">
                                               
                                            <td>
												<?php echo $row->oo_id; ?>
											</td>
											<td>
												<?php echo $this->db->get_where('vehicle_category_detail',array('id'=>$row->oo_vc_id))->row()->category_name; ?>
											</td>
											
											<td>
												<?php echo $this->db->get_where('city_detail',array('id'=>$row->oo_first_city))->row()->c_name." - ".$this->db->get_where('city_detail',array('id'=>$row->oo_second_city))->row()->c_name; if(!empty($row->oo_third_city)){echo " - ".$this->db->get_where('city_detail',array('id'=>$row->oo_third_city))->row()->c_name;} ?>
											</td>																						<td>												<a href="<?php echo base_url()."index.php/Agent_management/view_agent/MOO/".$row->oo_agent_id; ?>"><?php echo $row->agentname; ?></a>											</td>
											<td>
												<?php echo $row->a_contact_no1; ?>
											</td>
											<td>
												<?php echo date('d-m-Y h:i A',strtotime( $row->oo_valid_date." ".$row->oo_valid_from_time )); ?>
											</td>
											<td>
												<?php echo date('d-m-Y h:i A',strtotime( $row->oo_valid_date." ".$row->oo_valid_to_time )); ?>
											</td>
											<td>
											<?php if($row->b_status != 1) { if($row->oo_status != 1) { ?>
												<span class="label label-sm label-danger"> INACTIVE </span>
											<?php } else if($row->oo_status == 1) { ?>
												<span class="label label-sm label-info">ACTIVE  </span>
											<?php } } else { ?>
												<span class="label label-sm label-success"> BOOKED </span>
											<?php } ?>
											</td>
											<td>
						<form  method="post">													
					    <?php if($row->id == $row->b_pk_id) { ?>
						<button  formaction="<?php echo base_url();?>index.php/Oneway_offer_management/booking_request/URV/<?php echo $row->id; ?>" value="<?php echo $row->id; ?>" name="oneway_offer_request_id" class="btn btn-sm yellow"><i class="fa fa-users"></i></button>						
						<?php } else if($row->b_status != 1) { ?>
						<?php if($row->oo_status != 1) { ?>
												
												<button  formaction="<?php echo base_url();?>index.php/Oneway_offer_management/oneway_offer_status" value="<?php echo $row->id; ?>" onClick="return do_active();" name="oneway_offer_status_id" class="btn btn-sm red-haze"><i class="fa fa-ban"></i></button>
												
												<?php } else { ?>
												
												<button  formaction="<?php echo base_url();?>index.php/Oneway_offer_management/oneway_offer_status" value="<?php echo $row->id; ?>" name="oneway_offer_status_id"  onClick="return do_inactive();" class="btn btn-sm green"><i class="fa fa-ban"></i></button>
												
												<?php }?>
	
						<button formaction="<?php echo base_url();?>index.php/Oneway_offer_management/get_data_edit_oneway_offer" class="btn btn-sm blue"  value="<?php echo $row->id; ?>" name="oneway_offer_edit_id"><i class="fa fa-pencil"></i></button>
						
						<button formaction="<?php echo base_url()?>index.php/Oneway_offer_management/delete_oneway_offer" name="oneway_offer_dlt_id" value="<?php echo $row->id; ?>" class="btn btn-sm red" onclick="return doconfirm();"><i class="fa fa-trash-o"></i></button>
						
						
						<?php } ?>
											
											</form>				   
										   </td>
										   <td>
										<form method="post">
											
												<button formaction="<?php echo base_url()?>index.php/Oneway_offer_management/delete_oneway_offer" name="oneway_offer_dlt_id" value="<?php echo $row->id; ?>" class="btn btn-sm red" onclick="return doconfirm();"><i class="fa fa-trash-o"></i></button>
																
											
											 </form>
										</td>
											</tr>
                                              
                                  <?php } ?>
									
                                            
                                        </tbody>
                                    </table>
											
											
										 </div>
										 </p>
										 </div>
										 
										 <div class="tab-pane" id="request_all">
										 <p> 
										 <div class="portlet-body">			
											<br><br>
                                   <table class="table table-striped table-bordered table-hover dt-responsive" id="sample_C">
                                        <thead>
                                            <tr>
                                              
                                             <th>
												Offer #
											</th>
											<th>
												Vehicle Category
											</th>
											<th>
												City Route
											</th>																						<th>												Agent Name											</th>
											<th>
												Agent Number
											</th>
											
											<th>
												Valid From
											</th> 
											<th>
												Valid To
											</th> 
											<th>
												 Status
											</th>
										
											<th>
												 Action
											</th>
                                            </tr>
                                        </thead>
                                        <tbody>
										
									
										<?php foreach($all_request as $row) {?>
                                            <tr class="odd gradeX">
                                               
                                            <td>
												<?php echo $row->oo_id; ?>
											</td>
											<td>
												<?php echo $this->db->get_where('vehicle_category_detail',array('id'=>$row->oo_vc_id))->row()->category_name; ?>
											</td>
											
											<td>
												<?php echo $this->db->get_where('city_detail',array('id'=>$row->oo_first_city))->row()->c_name." - ".$this->db->get_where('city_detail',array('id'=>$row->oo_second_city))->row()->c_name; if(!empty($row->oo_third_city)){echo " - ".$this->db->get_where('city_detail',array('id'=>$row->oo_third_city))->row()->c_name;} ?>
											</td>																						<td>												<a href="<?php echo base_url()."index.php/Agent_management/view_agent/MOO/".$row->oo_agent_id; ?>"><?php echo $row->agentname; ?></a>											</td>
											<td>
												<?php echo $row->a_contact_no1; ?>
											</td>
											<td>
												<?php echo date('d-m-Y h:i A',strtotime( $row->oo_valid_date." ".$row->oo_valid_from_time )); ?>
											</td>
											<td>
												<?php echo date('d-m-Y h:i A',strtotime( $row->oo_valid_date." ".$row->oo_valid_to_time )); ?>
											</td>
											<td>
											<?php if($row->b_status != 1) { if($row->oo_status != 1) { ?>
												<span class="label label-sm label-danger"> INACTIVE </span>
											<?php } else if($row->oo_status == 1) { ?>
												<span class="label label-sm label-info">ACTIVE  </span>
											<?php } } else { ?>
												<span class="label label-sm label-success"> BOOKED </span>
											<?php } ?>
											</td>
											<td>
						<form  method="post">													
					    <?php if($row->id == $row->b_pk_id) { ?>
						<button  formaction="<?php echo base_url();?>index.php/Oneway_offer_management/booking_request/URV/<?php echo $row->id; ?>" value="<?php echo $row->id; ?>" name="oneway_offer_request_id" class="btn btn-sm yellow"><i class="fa fa-users"></i></button>						
						<?php } else if($row->b_status != 1) { ?>
						<?php if($row->oo_status != 1) { ?>
												
												<button  formaction="<?php echo base_url();?>index.php/Oneway_offer_management/oneway_offer_status" value="<?php echo $row->id; ?>" onClick="return do_active();" name="oneway_offer_status_id" class="btn btn-sm red-haze"><i class="fa fa-ban"></i></button>
												
												<?php } else { ?>
												
												<button  formaction="<?php echo base_url();?>index.php/Oneway_offer_management/oneway_offer_status" value="<?php echo $row->id; ?>" name="oneway_offer_status_id"  onClick="return do_inactive();" class="btn btn-sm green"><i class="fa fa-ban"></i></button>
												
												<?php }?>
	
						<button formaction="<?php echo base_url();?>index.php/Oneway_offer_management/get_data_edit_oneway_offer" class="btn btn-sm blue"  value="<?php echo $row->id; ?>" name="oneway_offer_edit_id"><i class="fa fa-pencil"></i></button>
						
						<button formaction="<?php echo base_url()?>index.php/Oneway_offer_management/delete_oneway_offer" name="oneway_offer_dlt_id" value="<?php echo $row->id; ?>" class="btn btn-sm red" onclick="return doconfirm();"><i class="fa fa-trash-o"></i></button>
						
						
						<?php } ?>
											
											</form>				   
										   </td>
										    <td>
										<form method="post">
											
												<button formaction="<?php echo base_url()?>index.php/Oneway_offer_management/delete_oneway_offer" name="oneway_offer_dlt_id" value="<?php echo $row->id; ?>" class="btn btn-sm red" onclick="return doconfirm();"><i class="fa fa-trash-o"></i></button>
																
											
											 </form>
										</td>
											</tr>
                                              
                                  <?php } ?>
									
                                            
                                        </tbody>
                                    </table>
											
											
										 </div>
										 </p>
										 </div>
										 
										 <div class="tab-pane" id="open_all">
										 <p> 
										 <div class="portlet-body">			
											<br><br>
                                   <table class="table table-striped table-bordered table-hover dt-responsive" id="sample_D">
                                        <thead>
                                            <tr>
                                              
                                             <th>
												Offer #
											</th>
											<th>
												Vehicle Category
											</th>
											<th>
												City Route
											</th>																						<th>												Agent Name											</th>
											<th>
												Agent Number
											</th>
											
											<th>
												Valid From
											</th> 
											<th>
												Valid To
											</th> 
											<th>
												 Status
											</th>
										
											<th>
												 Action
											</th>
                                            </tr>
                                        </thead>
                                        <tbody>
										
									
										<?php foreach($all_open as $row) {?>
                                            <tr class="odd gradeX">
                                               
                                            <td>
												<?php echo $row->oo_id; ?>
											</td>
											<td>
												<?php echo $this->db->get_where('vehicle_category_detail',array('id'=>$row->oo_vc_id))->row()->category_name; ?>
											</td>
											
											<td>
												<?php echo $this->db->get_where('city_detail',array('id'=>$row->oo_first_city))->row()->c_name." - ".$this->db->get_where('city_detail',array('id'=>$row->oo_second_city))->row()->c_name; if(!empty($row->oo_third_city)){echo " - ".$this->db->get_where('city_detail',array('id'=>$row->oo_third_city))->row()->c_name;} ?>
											</td>																						<td>												<a href="<?php echo base_url()."index.php/Agent_management/view_agent/MOO/".$row->oo_agent_id; ?>"><?php echo $row->agentname; ?></a>											</td>
											<td>
												<?php echo $row->a_contact_no1; ?>
											</td>
											<td>
												<?php echo date('d-m-Y h:i A',strtotime( $row->oo_valid_date." ".$row->oo_valid_from_time )); ?>
											</td>
											<td>
												<?php echo date('d-m-Y h:i A',strtotime( $row->oo_valid_date." ".$row->oo_valid_to_time )); ?>
											</td>
											<td>
												<?php 
													$date1 = new DateTime($row->oo_valid_date." ".$row->oo_valid_to_time);
													$date2 = new DateTime();

													$diff = $date2->diff($date1);
													
													if($diff->d == 1 && $diff->invert == 1 && $diff->h < 6){ ?>
														<span class="label label-sm label-danger"> EXPIRE </span>
													<?php }
													else
													{ ?>
														
														<?php if($row->b_status != 1) { if($row->oo_status != 1) { ?>
															<span class="label label-sm label-danger"> INACTIVE </span>
														<?php } else if($row->oo_status == 1) { ?>
															<span class="label label-sm label-info">ACTIVE  </span>
														<?php } } else { ?>
															<span class="label label-sm label-success"> BOOKED </span>
														<?php } ?>
													<?php } ?>
												
											</td>
											<td>
						<form  method="post">													
					    <?php if($row->id == $row->b_pk_id) { ?>
						<button  formaction="<?php echo base_url();?>index.php/Oneway_offer_management/booking_request/URV/<?php echo $row->id; ?>" value="<?php echo $row->id; ?>" name="oneway_offer_request_id" class="btn btn-sm yellow"><i class="fa fa-users"></i></button>						
						<?php } else if($row->b_status != 1) { ?>
						<?php if($row->oo_status != 1) { ?>
												
												<button  formaction="<?php echo base_url();?>index.php/Oneway_offer_management/oneway_offer_status" value="<?php echo $row->id; ?>" onClick="return do_active();" name="oneway_offer_status_id" class="btn btn-sm red-haze"><i class="fa fa-ban"></i></button>
												
												<?php } else { ?>
												
												<button  formaction="<?php echo base_url();?>index.php/Oneway_offer_management/oneway_offer_status" value="<?php echo $row->id; ?>" name="oneway_offer_status_id"  onClick="return do_inactive();" class="btn btn-sm green"><i class="fa fa-ban"></i></button>
												
												<?php }?>
	
						<button formaction="<?php echo base_url();?>index.php/Oneway_offer_management/get_data_edit_oneway_offer" class="btn btn-sm blue"  value="<?php echo $row->id; ?>" name="oneway_offer_edit_id"><i class="fa fa-pencil"></i></button>
						
						<button formaction="<?php echo base_url()?>index.php/Oneway_offer_management/delete_oneway_offer" name="oneway_offer_dlt_id" value="<?php echo $row->id; ?>" class="btn btn-sm red" onclick="return doconfirm();"><i class="fa fa-trash-o"></i></button>
						
						
						<?php } ?>
											
											</form>				   
										   </td>
											</tr>
                                              
                                  <?php } ?>
									
                                            
                                        </tbody>
                                    </table>
											
											
										 </div>
										 </p>
										 </div>
										 
										 <div class="tab-pane" id="tab_tommorrow_1">
										 <p> 
										 <div class="portlet-body">			
												<br><br>
                                   <table class="table table-striped table-bordered table-hover dt-responsive" id="sample_E">
                                        <thead>
                                            <tr>
                                              
                                             <th>
												Offer #
											</th>
											<th>
												Vehicle Category
											</th>
											<th>
												City Route
											</th>																						<th>												Agent Name											</th>
											<th>
												Agent Number
											</th>
											
											<th>
												Valid From
											</th> 
											<th>
												Valid To
											</th> 
											<th>
												 Status
											</th>
										
											<th>
												 Action
											</th>
                                            </tr>
                                        </thead>
                                        <tbody>
										
									
										<?php foreach($tommorrow_request as $row) {?>
                                            <tr class="odd gradeX">
                                               
                                            <td>
												<?php echo $row->oo_id; ?>
											</td>
											<td>
												<?php echo $this->db->get_where('vehicle_category_detail',array('id'=>$row->oo_vc_id))->row()->category_name; ?>
											</td>
											
											<td>
												<?php echo $this->db->get_where('city_detail',array('id'=>$row->oo_first_city))->row()->c_name." - ".$this->db->get_where('city_detail',array('id'=>$row->oo_second_city))->row()->c_name; if(!empty($row->oo_third_city)){echo " - ".$this->db->get_where('city_detail',array('id'=>$row->oo_third_city))->row()->c_name;} ?>
											</td>																						<td>												<a href="<?php echo base_url()."index.php/Agent_management/view_agent/MOO/".$row->oo_agent_id; ?>"><?php echo $row->agentname; ?></a>											</td>
											<td>
												<?php echo $row->a_contact_no1; ?>
											</td>
											<td>
												<?php echo date('d-m-Y h:i A',strtotime( $row->oo_valid_date." ".$row->oo_valid_from_time )); ?>
											</td>
											<td>
												<?php echo date('d-m-Y h:i A',strtotime( $row->oo_valid_date." ".$row->oo_valid_to_time )); ?>
											</td>
											<td>
											<?php if($row->b_status != 1) { if($row->oo_status != 1) { ?>
												<span class="label label-sm label-danger"> INACTIVE </span>
											<?php } else if($row->oo_status == 1) { ?>
												<span class="label label-sm label-info">ACTIVE  </span>
											<?php } } else { ?>
												<span class="label label-sm label-success"> BOOKED </span>
											<?php } ?>
											</td>
											<td>
						<form  method="post">													
					    <?php if($row->id == $row->b_pk_id) { ?>
						<button  formaction="<?php echo base_url();?>index.php/Oneway_offer_management/booking_request/URV/<?php echo $row->id; ?>" value="<?php echo $row->id; ?>" name="oneway_offer_request_id" class="btn btn-sm yellow"><i class="fa fa-users"></i></button>						
						<?php } else if($row->b_status != 1) { ?>
						<?php if($row->oo_status != 1) { ?>
												
												<button  formaction="<?php echo base_url();?>index.php/Oneway_offer_management/oneway_offer_status" value="<?php echo $row->id; ?>" onClick="return do_active();" name="oneway_offer_status_id" class="btn btn-sm red-haze"><i class="fa fa-ban"></i></button>
												
												<?php } else { ?>
												
												<button  formaction="<?php echo base_url();?>index.php/Oneway_offer_management/oneway_offer_status" value="<?php echo $row->id; ?>" name="oneway_offer_status_id"  onClick="return do_inactive();" class="btn btn-sm green"><i class="fa fa-ban"></i></button>
												
												<?php }?>
	
						<button formaction="<?php echo base_url();?>index.php/Oneway_offer_management/get_data_edit_oneway_offer" class="btn btn-sm blue"  value="<?php echo $row->id; ?>" name="oneway_offer_edit_id"><i class="fa fa-pencil"></i></button>
						
						<button formaction="<?php echo base_url()?>index.php/Oneway_offer_management/delete_oneway_offer" name="oneway_offer_dlt_id" value="<?php echo $row->id; ?>" class="btn btn-sm red" onclick="return doconfirm();"><i class="fa fa-trash-o"></i></button>
						
						
						<?php } ?>
											
											</form>				   
										   </td>
										    <td>
										<form method="post">
											
												<button formaction="<?php echo base_url()?>index.php/Oneway_offer_management/delete_oneway_offer" name="oneway_offer_dlt_id" value="<?php echo $row->id; ?>" class="btn btn-sm red" onclick="return doconfirm();"><i class="fa fa-trash-o"></i></button>
																
											
											 </form>
										</td>
											</tr>
                                              
                                  <?php } ?>
									
                                            
                                        </tbody>
                                    </table>
											
											
										 </div>
										 </p>
										 </div>
										 
										 <div class="tab-pane" id="tab_today_2">
										 <p> 
										 <div class="portlet-body">			
											
												<br><br>
                                   <table class="table table-striped table-bordered table-hover dt-responsive" id="sample_F">
                                        <thead>
                                            <tr>
                                              
                                             <th>
												Offer #
											</th>
											<th>
												Vehicle Category
											</th>
											<th>
												City Route
											</th>																						<th>												Agent Name											</th>
											<th>
												Agent Number
											</th>
											
											<th>
												Valid From
											</th> 
											<th>
												Valid To
											</th> 
											<th>
												 Status
											</th>
										
											<th>
												 Action
											</th>
                                            </tr>
                                        </thead>
                                        <tbody>
										
									
										<?php foreach($today_request_open as $row) {?>
                                            <tr class="odd gradeX">
                                               
                                            <td>
												<?php echo $row->oo_id; ?>
											</td>
											<td>
												<?php echo $this->db->get_where('vehicle_category_detail',array('id'=>$row->oo_vc_id))->row()->category_name; ?>
											</td>
											
											<td>
												<?php echo $this->db->get_where('city_detail',array('id'=>$row->oo_first_city))->row()->c_name." - ".$this->db->get_where('city_detail',array('id'=>$row->oo_second_city))->row()->c_name; if(!empty($row->oo_third_city)){echo " - ".$this->db->get_where('city_detail',array('id'=>$row->oo_third_city))->row()->c_name;} ?>
											</td>																						<td>												<a href="<?php echo base_url()."index.php/Agent_management/view_agent/MOO/".$row->oo_agent_id; ?>"><?php echo $row->agentname; ?></a>											</td>
											<td>
												<?php echo $row->a_contact_no1; ?>
											</td>
											<td>
												<?php echo date('d-m-Y h:i A',strtotime( $row->oo_valid_date." ".$row->oo_valid_from_time )); ?>
											</td>
											<td>
												<?php echo date('d-m-Y h:i A',strtotime( $row->oo_valid_date." ".$row->oo_valid_to_time )); ?>
											</td>
											<td>
											<?php if($row->b_status != 1) { if($row->oo_status != 1) { ?>
												<span class="label label-sm label-danger"> INACTIVE </span>
											<?php } else if($row->oo_status == 1) { ?>
												<span class="label label-sm label-info">ACTIVE  </span>
											<?php } } else { ?>
												<span class="label label-sm label-success"> BOOKED </span>
											<?php } ?>
											</td>
											<td>
						<form  method="post">													
					    <?php if($row->id == $row->b_pk_id) { ?>
						<button  formaction="<?php echo base_url();?>index.php/Oneway_offer_management/booking_request/URV/<?php echo $row->id; ?>" value="<?php echo $row->id; ?>" name="oneway_offer_request_id" class="btn btn-sm yellow"><i class="fa fa-users"></i></button>						
						<?php } else if($row->b_status != 1) { ?>
						<?php if($row->oo_status != 1) { ?>
												
												<button  formaction="<?php echo base_url();?>index.php/Oneway_offer_management/oneway_offer_status" value="<?php echo $row->id; ?>" onClick="return do_active();" name="oneway_offer_status_id" class="btn btn-sm red-haze"><i class="fa fa-ban"></i></button>
												
												<?php } else { ?>
												
												<button  formaction="<?php echo base_url();?>index.php/Oneway_offer_management/oneway_offer_status" value="<?php echo $row->id; ?>" name="oneway_offer_status_id"  onClick="return do_inactive();" class="btn btn-sm green"><i class="fa fa-ban"></i></button>
												
												<?php }?>
	
						<button formaction="<?php echo base_url();?>index.php/Oneway_offer_management/get_data_edit_oneway_offer" class="btn btn-sm blue"  value="<?php echo $row->id; ?>" name="oneway_offer_edit_id"><i class="fa fa-pencil"></i></button>
						
						<button formaction="<?php echo base_url()?>index.php/Oneway_offer_management/delete_oneway_offer" name="oneway_offer_dlt_id" value="<?php echo $row->id; ?>" class="btn btn-sm red" onclick="return doconfirm();"><i class="fa fa-trash-o"></i></button>
						
						
						<?php } ?>
											
											</form>				   
										   </td>
											</tr>
                                              
                                  <?php } ?>
									
                                            
                                        </tbody>
                                    </table>
											
										 </div>
										 </p>
										 </div>
										 
										 <div class="tab-pane" id="tab_tommorrow_2">
										 <p> 
										 <div class="portlet-body">			
												<br><br>
                                   <table class="table table-striped table-bordered table-hover dt-responsive" id="sample_G">
                                        <thead>
                                            <tr>
                                              
                                             <th>
												Offer #
											</th>
											<th>
												Vehicle Category
											</th>
											<th>
												City Route
											</th>																						<th>												Agent Name											</th>
											<th>
												Agent Number
											</th>
											
											<th>
												Valid From
											</th> 
											<th>
												Valid To
											</th> 
											<th>
												 Status
											</th>
										
											<th>
												 Action
											</th>
                                            </tr>
                                        </thead>
                                        <tbody>
										
									
										<?php foreach($tommorrow_request_open as $row) {?>
                                            <tr class="odd gradeX">
                                               
                                            <td>
												<?php echo $row->oo_id; ?>
											</td>
											<td>
												<?php echo $this->db->get_where('vehicle_category_detail',array('id'=>$row->oo_vc_id))->row()->category_name; ?>
											</td>
											
											<td>
												<?php echo $this->db->get_where('city_detail',array('id'=>$row->oo_first_city))->row()->c_name." - ".$this->db->get_where('city_detail',array('id'=>$row->oo_second_city))->row()->c_name; if(!empty($row->oo_third_city)){echo " - ".$this->db->get_where('city_detail',array('id'=>$row->oo_third_city))->row()->c_name;} ?>
											</td>																						<td>												<a href="<?php echo base_url()."index.php/Agent_management/view_agent/MOO/".$row->oo_agent_id; ?>"><?php echo $row->agentname; ?></a>											</td>
											<td>
												<?php echo $row->a_contact_no1; ?>
											</td>
											<td>
												<?php echo date('d-m-Y h:i A',strtotime( $row->oo_valid_date." ".$row->oo_valid_from_time )); ?>
											</td>
											<td>
												<?php echo date('d-m-Y h:i A',strtotime( $row->oo_valid_date." ".$row->oo_valid_to_time )); ?>
											</td>
											<td>
												<?php 
													$date1 = new DateTime($row->oo_valid_date." ".$row->oo_valid_to_time);
													$date2 = new DateTime();

													$diff = $date2->diff($date1);
													if($diff->d > 1 ){
														echo " expire ";
													}
													else
													{
														echo "not expire";
													}
												?>


											<?php if($row->b_status != 1) { if($row->oo_status != 1) { ?>
												<span class="label label-sm label-danger"> INACTIVE </span>
											<?php } else if($row->oo_status == 1) { ?>
												<span class="label label-sm label-info">ACTIVE  </span>
											<?php } } else { ?>
												<span class="label label-sm label-success"> BOOKED </span>
											<?php } ?>
											</td>
											<td>
						<form  method="post">													
					    <?php if($row->id == $row->b_pk_id) { ?>
						<button  formaction="<?php echo base_url();?>index.php/Oneway_offer_management/booking_request/URV/<?php echo $row->id; ?>" value="<?php echo $row->id; ?>" name="oneway_offer_request_id" class="btn btn-sm yellow"><i class="fa fa-users"></i></button>						
						<?php } else if($row->b_status != 1) { ?>
						<?php if($row->oo_status != 1) { ?>
												
												<button  formaction="<?php echo base_url();?>index.php/Oneway_offer_management/oneway_offer_status" value="<?php echo $row->id; ?>" onClick="return do_active();" name="oneway_offer_status_id" class="btn btn-sm red-haze"><i class="fa fa-ban"></i></button>
												
												<?php } else { ?>
												
												<button  formaction="<?php echo base_url();?>index.php/Oneway_offer_management/oneway_offer_status" value="<?php echo $row->id; ?>" name="oneway_offer_status_id"  onClick="return do_inactive();" class="btn btn-sm green"><i class="fa fa-ban"></i></button>
												
												<?php }?>
	
						<button formaction="<?php echo base_url();?>index.php/Oneway_offer_management/get_data_edit_oneway_offer" class="btn btn-sm blue"  value="<?php echo $row->id; ?>" name="oneway_offer_edit_id"><i class="fa fa-pencil"></i></button>
						
						<button formaction="<?php echo base_url()?>index.php/Oneway_offer_management/delete_oneway_offer" name="oneway_offer_dlt_id" value="<?php echo $row->id; ?>" class="btn btn-sm red" onclick="return doconfirm();"><i class="fa fa-trash-o"></i></button>
						
						
						<?php } ?>
											
											</form>				   
										   </td>
											</tr>
                                              
                                  <?php } ?>
									
                                            
                                        </tbody>
                                    </table>
											
										 </div>
										 </p>
										 </div>
														
													</div>
												</div>
											</div>
								
								
                                </div>
                            </div>
                            <!-- END EXAMPLE TABLE PORTLET-->
                        </div>
                    </div>
                    </div>
                    </div>
                    </div>
                        
                    </div>
                    
                    
                    
                    
                    
                    
                    
                    <!-- END PAGE BASE CONTENT -->
                </div>
                <!-- BEGIN FOOTER -->
<script>
	

function do_active()
{
    active=confirm("Do you want to make it Active?");
    if(active!=true)
    {
        return false;
    }
}

function do_inactive()
{
    inactive=confirm("Do you want to make it Inactive?");
    if(inactive!=true)
    {
        return false;
    }
}

function doconfirm()
{
    dlt_confirm=confirm("You Want to Delete Permanently?");
    if(dlt_confirm!=true)
    {
        return false;
    }
}
</script>
<?php $this->load->view('footer');?>