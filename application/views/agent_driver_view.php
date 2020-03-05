<?php $this->load->view('header');?>
            <!-- END HEADER -->
            <div class="container-fluid">
                <div class="page-content">
                    <!-- BEGIN BREADCRUMBS -->
                    <div class="breadcrumbs">
                        <h1>Driver Profile</h1>
                        
                    </div>
                    <!-- END BREADCRUMBS -->
                    <!-- BEGIN PAGE BASE CONTENT -->
                 <div class="row">
                        <div class="portlet light bordered">
                                <div class="portlet-title">
                                    <div class="caption font-dark">
                                        <i class="fa fa-user font-dark"></i>
                                        <span class="caption-subject bold uppercase"> <?php echo $driver_detail->d_full_name; ?></span>
                                    </div>
                                    
                                    
                                </div>
								 
                               <div class="portlet-body">
                     <div class="table-toolbar">
                  
                        <div class="btn-group">
						 <form action="<?php echo base_url();?>index.php/Agent_driver_management/edit_agent_driver" method="post">
                           <button type="submit" name="agent_driver_id" value="<?php echo $driver_detail->id; ?>"  id="sample_editable_1_new" class="btn blue">
                           
                           Edit
                           </button>
						   </form>
						   
                        </div>
                         <div class="btn-group">
						 <form action="<?php echo base_url();?>index.php/Agent_driver_management/agent_driver_delete" method="post">
                           <button type="submit" name="agent_driver_id" value="<?php echo $driver_detail->id; ?>" onclick="return doconfirm();"  id="sample_editable_1_new" class="btn red">
                           
                           Delete
                           </button>
						   </form>
						   
                        </div>
                        
						 <div class="btn-group">
						 
							
						 
							
						 <div class="btn-group">
						 	<?php if( $driver_detail->d_status != 1){?>
                           <button type="submit" id="sample_editable_1_new" class="btn green-haze" onclick="change_status()">
                           
                           Active 
                           </button>
						   <?php }else{	?>
						   <button type="submit" id="sample_editable_1_new" class="btn red-haze" onclick="change_status()">
                           
                           Inactive 
                           </button>
                        </div>
						<?php } ?>
						   
                         
						
							
                        </div>
                        
                        <!--<div class="btn-group">
                           <button id="sample_editable_1_new" class="btn green">
                           
                           Trips
                           </button>
                        </div>
                      -->
                     
					 
                       
                        
                         
                       
                                             

                       
                     </div>
                     <hr>
                    
                    <!-- custmor histry tabs-->
                    
                  <div class="portlet-body">
				  <div class="row">
				  <table class="table table-bordered">
                           <thead>
                           <tr class="blue_row">
                                 <th colspan="7" >Driver Details</th>
                                
                              </tr>
                           </thead>
                           <tbody>
                        <tr class="red_row">
                                 <th >Driver Id#</th>
                                 <th>Joining Date & Time</th>
                                 <th colspan="1">Driver Name</th>
                                 <th colspan="1">Contact No</th>
                                 <th colspan="2">2nd Contact No.</th>
                                  <th colspan="1">Driver Email Id</th>
                                
                                
                                
                              </tr>
                              <tr>
                                 <td ><?php echo $driver_detail->driver_id; ?></td>
                                 <td><?php echo  date('d/m/Y',strtotime($driver_detail->d_reg_date))." ".date('h:i A',strtotime($driver_detail->d_reg_time));?></td>
                                 <td colspan="1"><?php echo $driver_detail->d_full_name; ?></td>
                                 <td colspan="1"><?php echo $driver_detail->d_contact_no1; ?></td>
                                 <td colspan="2"><?php if($driver_detail->d_contact_no2!=""){echo $driver_detail->d_contact_no2; }else{ echo "N/A"; }?></td>
                                 <td colspan="1" ><?php echo $driver_detail->d_email_id; ?></td>
                                 
                              </tr>
                               <thead>
                              <tr class="blue_row">
                                 <th colspan="7" >Agent Details</th>
                                
                              </tr>
                          <tr class="red_row">
                                 <th colspan="2">Agent Name</th>
                               
                                 <th>Agent Contact No</th>
                                 <th>Agent Email</th>
                                 <th>-</th>
                                 <th>-</th>
                                 <th >-</th>
                                  
                                
                              </tr>
                              <tr>
                                 <td colspan="2"><?php if($driver_detail->a_full_name!=""){echo $driver_detail->a_full_name; }else{ echo "N/A"; }?></td>                                
                                 <td><?php if( $driver_detail->a_contact_no1!=""){echo  $driver_detail->a_contact_no1; }else{ echo "N/A"; }?></td>
                                 <td><?php if($driver_detail->a_email_id!=""){echo $driver_detail->a_email_id; }else{ echo "N/A"; }?></td>
                                 <td>-</td>
								 
                                  <td>-</td>
								  
                                 <td>-</td>
                                
                              </tr>
                           </thead>
                            <thead>
                               <tr class="blue_row">
                                 <th colspan="7" >Address Details</th>
                                
                              </tr>
                             <tr class="red_row">
                                 <th colspan="2">Address</th>
                                 <th colspan="2">Area</th>
                                  <th>PIN</th>
                                 <th>State</th>
                                 <th>City</th>
                                 
                                  
                                
                              </tr>
                              <tr>
                                 <td colspan="2"><?php if($driver_detail->d_address!=""){echo $driver_detail->d_address; }else{ echo "N/A"; }?></td>
                                 <td colspan="2"><?php if($driver_detail->d_area!=""){echo $driver_detail->d_area; }else{ echo "N/A"; }?></td>
                                 <td><?php if($driver_detail->d_zipcode!=""){echo $driver_detail->d_zipcode; }else{ echo "N/A"; }?></td>
								 
                                 <td><?php if($driver_detail->d_state!=""){echo $driver_detail->d_state; }else{ echo "N/A"; }?></td>
                                 <td><?php if($driver_detail->d_city!=""){echo $driver_detail->d_city; }else{ echo "N/A"; }?></td>
                              
                                
                              </tr>
                           </thead>
                            
                                                 
                          
                        
                             <thead>
                             
                               <tr class="red_row">
                               	   
                                 <th>Profile Picture</th>
                                 <th>Driving Lic. Front</th> 
								 <th>Driving Lic. Back</th>
                                 <th>Other Docs 1</th> 
                                  <th>Other Docs 2</th> 
                                     
                                        <th>Other Docs 3</th> 
                                           <th>-</th>
                              </tr>
                             
                               <tr>
							   
                                 <td>							 
								 
									 <a <?php if($driver_detail->d_profile_pic != ""){?>href="<?php echo base_url()."/uploads/driver/profile_pic/".$driver_detail->d_profile_pic; }?>"  target="_blank" >
								 <?php if($driver_detail->d_profile_pic != ""){?>
                          				<img src="<?php echo base_url();?>/uploads/driver/profile_pic/<?php echo $driver_detail->d_profile_pic;?>" width="50%;">
						 		 <?php } else { ?>
						 				 <img src="<?php echo base_url();?>assets/global/img/defaultimg.jpg" width="50%;">
								<?php } ?>
									</a>
								</td>
										 
								 <td>							 
							 
									 <a <?php if($driver_detail->d_driving_lic_front != ""){?>href="<?php echo base_url()."/uploads/driver/driving_lic_front/".$driver_detail->d_driving_lic_front; } ?>" target="_blank" >
							 <?php if($driver_detail->d_driving_lic_front != ""){?>
										<img src="<?php echo base_url();?>/uploads/driver/driving_lic_front/<?php echo $driver_detail->d_driving_lic_front;?>" width="50%;">
							 <?php } else { ?>							
									 	<img src="<?php echo base_url();?>assets/global/img/defaultimg.jpg" width="50%;">
							<?php } ?>
									</a>
								</td>
								<td>							 
							 
									 <a <?php if($driver_detail->d_driving_lic_back != ""){?>href="<?php echo base_url()."/uploads/driver/driving_lic_back/".$driver_detail->d_driving_lic_back; } ?>" target="_blank" >
							 <?php if($driver_detail->d_driving_lic_back != ""){?>
										<img src="<?php echo base_url();?>/uploads/driver/driving_lic_back/<?php echo $driver_detail->d_driving_lic_back;?>" width="50%;">
							 <?php } else { ?>							
									 	<img src="<?php echo base_url();?>assets/global/img/defaultimg.jpg" width="50%;">
							<?php } ?>
									</a>
								</td>
								
								 <td>							 
							 
									 <a  <?php if($driver_detail->d_other_docs1 != ""){?>href="<?php echo base_url()."/uploads/driver/other_docs1/".$driver_detail->d_other_docs1;  } ?>" target="_blank" >
							 <?php if($driver_detail->d_other_docs1 != ""){?>
										<img src="<?php echo base_url();?>/uploads/driver/other_docs1/<?php echo $driver_detail->d_other_docs1;?>" width="50%;">
							 <?php } else { ?>							
									 	<img src="<?php echo base_url();?>assets/global/img/defaultimg.jpg" width="50%;">
							<?php } ?>
									</a>
								</td>	 	 
										 
                           
                          <td>
						  <a  <?php if($driver_detail->d_other_docs2 != ""){?>href="<?php echo base_url()."/uploads/driver/other_docs2/".$driver_detail->d_other_docs2; } ?>" target="_blank" >
							 <?php if($driver_detail->d_other_docs2 != ""){?>
										<img src="<?php echo base_url();?>/uploads/driver/other_docs2/<?php echo $driver_detail->d_other_docs2;?>" width="50%;">
							 <?php } else { ?>							
									 	<img src="<?php echo base_url();?>assets/global/img/defaultimg.jpg" width="50%;">
							<?php } ?>
									</a>
									</td>
                            <td>
						  <a  <?php if($driver_detail->d_other_docs3 != ""){?>href="<?php echo base_url()."/uploads/driver/other_docs3/".$driver_detail->d_other_docs3; } ?>" target="_blank" >
							 <?php if($driver_detail->d_other_docs3 != ""){?>
										<img src="<?php echo base_url();?>/uploads/driver/other_docs3/<?php echo $driver_detail->d_other_docs3;?>" width="50%;">
							 <?php } else { ?>							
									 	<img src="<?php echo base_url();?>assets/global/img/defaultimg.jpg" width="50%;">
							<?php } ?>
									</a>
									</td>
                             <td>-</td>
                        

                                  
                              </tr>
                               
                              
                             
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
                
       
        <!-- END THEME LAYOUT SCRIPTS -->
<script>	
function doconfirm()
{
    dlt_confirm=confirm("You Want to Delete Permanently?");
    if(dlt_confirm!=true)
    {
        return false;
    }
}
function change_status()
{
	var agent_driver_id = <?php echo $driver_detail->id; ?>;
	$.ajax({
                url: '<?php echo base_url();?>index.php/Agent_driver_management/agent_driver_status',
                type: 'post',
                data: {agent_driver_id : agent_driver_id},
                success: function(msg)
                {
					window.location.reload();

                }
    });
}

</script>
<?php $this->load->view('footer');?>