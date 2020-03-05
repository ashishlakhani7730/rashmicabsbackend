<?php $this->load->view('header');?>
            <!-- END HEADER -->
            <div class="container-fluid">
                <div class="page-content">
                    <!-- BEGIN BREADCRUMBS -->
                    <div class="breadcrumbs">
                        <h1>Manage Booking Inquiry</h1>
                        
                    </div>
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
											<a href="<?php echo base_url()?>index.php/BookingInquiry_management/add_booking_enquiry" class="btn yellow  btn-outline" >Add New
                                                        <i class="fa fa-plus"></i></a>
                                                
                                            </div>
                                        </div>
                                    </div>
	
                                    <br><br>
                                   <table class="table table-striped table-bordered table-hover dt-responsive" id="sample_A">
                                        <thead>
                                            <tr>
                                              
                                             <th>ID #</th>
											<th>
												Name
											</th>
											<th>
												 Contact No
											</th>
											<th>
												 From City
											</th>
											<th>
												 To City
											</th>
											<th>
												Vehicle Category
											</th>
											<th>
												 Plan DateTime
											</th> 
											<th>
												 Action
											</th>
                                            </tr>
                                        </thead>
                                        <tbody>
										
										<?php foreach($booking_inquiry as $row) {?>
										
                                            <tr class="odd gradeX">
                                               
                                            <td>
												<?php echo $row->bi_id;?>
											</td>
											<td>
												<?php echo $row->bi_name;?>
											</td>
											<td>
												<?php echo $row->bi_mobile;?>
											</td>
											<td>
												<?php echo $row->bi_from_city;?>
											</td>
											<td>
												<?php echo $row->bi_to_city;?>
											</td>
											<td>
												<?php echo $row->bi_vc_name;?>
											</td>
											<td>
												<?php echo date('d/m/Y',strtotime($row->bi_plan_date))." ".date('h:i A',strtotime($row->bi_plan_time));?>
											</td>
											<td>
												<form method="post">		
							
												<button type="submit" name="id" value="<?php echo $row->id;?>" formaction="<?php echo base_url().'index.php/BookingInquiry_management/edit_booking_enquiry'?>" class="btn btn-sm blue"><i class="fa fa-eye"></i></button>
												<button type="submit" name="id" value="<?php echo $row->id;?>" formaction="<?php echo base_url().'index.php/BookingInquiry_management/delete_booking_enquiry'?>" class="btn btn-sm red"><i class="fa fa-trash"></i></button>
											
											</form>				   
										   </td>
											</tr>
                                              
                                     <?php }?>
									
                                            
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

<?php $this->load->view('footer');?>