 <?php $this->load->view('header'); ?>

            <!-- END HEADER -->

            <div class="container-fluid">

                <div class="page-content">

                    <!-- BEGIN BREADCRUMBS -->

                    <div class="breadcrumbs">

                        <h1>Agent Wallet Transaction (<?php echo $agent_view->a_full_name.' - '.$agent_view->a_wallet_balance; ?>) <br /><form method="post"> <button formaction="<?php echo base_url();?>index.php/Agent_management/view_agent" type="submit" class="btn yellow-haze" value="<?php echo $agent_view->id;?>" name="agent_view_id">Agent View <i class="fa fa-eye"></i></button> </form></h1>

                        

                    </div>

                    <!-- END BREADCRUMBS -->

                    <!-- BEGIN PAGE BASE CONTENT -->

					

                 	<div class="row">

                        <div class="col-md-12">

                            <!-- BEGIN EXAMPLE TABLE PORTLET-->

                            <div class="portlet light bordered">

                                

                                <div class="portlet-body">

									<div class="table-toolbar">

									</div>

                                  

                                   	<table class="table table-striped table-bordered table-hover dt-responsive  order-column" id="sample_1">

								   		<thead>

                                            

											<tr>

                                              

											   <th >

													SR #

												</th>

												<th>

													Transction

												</th>

												  <th>

													Date

												</th>

												

												<th>

													Description

												</th>

												<th>

													Debit/Withdraw

												</th>

												<th>

													Credit/Deposit

												</th>

												

												<th>

													 Closing Balance

												</th>

											 

												<th>

													Receipt

												</th> 

												

												

                                            </tr>

										

                                        </thead>

                                        <tbody>

                                            

                                        <?php foreach($wallet_transaction as $row) { ?>

                                        

											<tr class="odd gradeX">

												<td>

													<?php echo $row->id;?>

												</td> 

												<td>

													<?php echo $row->awt_id;?>

												</td> 

												<td>

													<?php echo date('d/m/Y',strtotime($row->awt_date));?>	

												</td>

												

												<td>

													<?php

														if($row->awt_type==3){

															echo "Deposit From booking No. ".$row->awt_booking_number.".";
														}else if($row->awt_type==4){

															echo "Withdraw From booking No. ".$row->awt_booking_number.".";

														}else if($row->awt_type==1){

															$userdata=$this->db->get_where('user_detail',array('id'=>$row->awt_created_by))->row();

															if(!empty($userdata)){

																echo "Withdraw From <strong>".$userdata->u_full_name."</strong>";

																if(!empty($row->awt_notes)){echo " (".$row->awt_notes.")";} 

															}

														}else if($row->awt_type==2){

															$userdata=$this->db->get_where('user_detail',array('id'=>$row->awt_created_by))->row();

															if(!empty($userdata)){

																echo "Deposit To <strong>".$userdata->u_full_name."</strong>";

																if(!empty($row->awt_notes)){echo " (".$row->awt_notes.")";} 

															}	

														}

														?>

												</td>

												<td>

													<?php echo $row->awt_debit;?>

												</td>

												<td >

												   <?php echo $row->awt_credit;?>

												</td>

												<td>																				

													<?php echo $row->awt_closing_balance;?>

												</td>

												 <td >								 

																					

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

                <!-- BEGIN FOOTER -->



 <?php $this->load->view('footer'); ?>