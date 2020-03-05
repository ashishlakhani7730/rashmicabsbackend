<?php $this->load->view('header');?>
            <!-- END HEADER -->
            <div class="container-fluid">
                <div class="page-content">
                    <!-- BEGIN BREADCRUMBS -->
                    <div class="breadcrumbs">
                        <h1>Manage Driver</h1>
                        
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
											<a href="<?php echo base_url()?>index.php/Agent_driver_management/add_agent_driver" class="btn yellow  btn-outline" >Add New
                                                        <i class="fa fa-plus"></i></a>
                                                
                                            </div>
                                        </div>
                                    </div>
	
                                   <table class="table table-striped table-bordered table-hover  order-column" id="sample_1">
                                        <thead>
                                            <tr>
                                              
                                             <th>
												Driver #
											</th>
											
											<th>
												Name
											</th>
											<th>
												 Contact No
											</th>
											<th>
												 Agent
											</th>
											<th>
												 City
											</th>
											<th>
												 State
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
										
										<?php foreach($driver_detail as $row) {?>
										
                                            <tr class="odd gradeX">
                                               
                                            <td>
												<?php echo $row->driver_id;?>
											</td>
											<td>
												<?php echo $row->d_full_name;?>
											</td>
											<td>
												<?php echo $row->d_contact_no1;?>
											</td>
											<td>
												<?php echo $row->a_full_name;?>
											</td>
											<td>
												<?php echo $row->d_city;?>
											</td>
											<td>
												<?php echo $row->d_state;?>
											</td>
                                           <td>
                                                <?php if($row->d_status == 1){echo "<span class='label label-sm label-success'>ACTIVE</span>"; }else{echo "<span class='label label-sm label-danger'>INACTIVE</span>"; } ?>
                                            </td>
											<td>
						<form action="<?php echo base_url().'index.php/Agent_driver_management/view_agent_driver'?>" method="post">		
	
						<button type="submit" name="agent_driver_id" value="<?php echo $row->id;?>" class="btn btn-sm yellow">More Details</button>
											
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