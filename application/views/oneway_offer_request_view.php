<?php $this->load->view('header');?>

            <!-- END HEADER -->

            <div class="container-fluid">

                <div class="page-content">

                    <!-- BEGIN BREADCRUMBS -->

                    <div class="breadcrumbs">

                        <h1>Manage Oneway Offer Request</h1>

                        

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
                        
                                   <table class="table table-striped table-bordered table-hover dt-responsive order-column" id="oneway">

                                   

                                        <thead>

                                            <tr>

                                              

                               <th >

									Request #

								</th>

                                <th>

									Pickup Date

								</th>

                                  <th>

									Pickup Time

								</th>

                                

								<th>

									Passanger

								</th>

                                <th>

									Mobile#

								</th>
								
								<th>
									City Route
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

                                            

										<?php foreach($oneway_offer_request_list as $ob) { ?>                

                                        <tr class="odd gradeX">

                                        <td>

        									<?php echo $ob->b_id;?>

        								</td>

        								<td>

        									<?php echo date('d/m/Y',strtotime($ob->b_from_date));?>	

                        				</td>

        				                <td>

										<?php echo date('h:i A',strtotime($ob->b_from_time));?>

										 </td>

										<td>

											<?php echo $ob->b_p_name;?>

										</td>

										<td>

											<?php echo $ob->b_p_contact;?>

										</td>
										
										<td>
											<?php echo $ob->fromcity." - ".$ob->tocity; ?>
										</td>
										
										 <td >

										    <?php 
											    if($ob->b_status == 7){echo "<span class='label label-sm label-danger'>Rejected</span>";} 
												if($ob->b_status == 1){echo "<span class='label label-sm label-success'>Confirm</span>";} 
												if($ob->b_status == 2){echo "<span class='label label-sm label-primary'>Requested</span>";}  
											?>
											
										</td>

										<td>
										<?php if($ob->b_status == 2){ ?>
											 <form method="post">
												<a  href="<?php echo base_url()."index.php/Oneway_offer_management/confirm_offer_booking/CBR/".$ob->id; ?>"  data-toggle="modal" id="sample_editable_1_new" class="btn green-seagreen" name="accept_this"><i class="fa fa-check"></i></a>
											 </form>

										<?php } ?>

										</td>

										</tr>

                                        

										<?php } ?>

										</tbody>

                                    </table>

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

<?php $this->load->view('footer');?>