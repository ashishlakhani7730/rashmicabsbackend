<?php $this->load->view('header');?>
            <!-- END HEADER -->
            <div class="container-fluid">
                <div class="page-content">
                    <!-- BEGIN BREADCRUMBS -->
                    <div class="breadcrumbs">
                        <h1>Vehicle Profile</h1>
                        
                    </div>
                    <!-- END BREADCRUMBS -->
                    <!-- BEGIN PAGE BASE CONTENT -->
                 <div class="row">
                        <div class="portlet light bordered">
                                <div class="portlet-title">
                                    <div class="caption font-dark">
                                        <i class="fa fa-user font-dark"></i>
                                        <span class="caption-subject bold uppercase"> </span>
                                    </div>
                                    
                                    
                                </div>
								 
                               <div class="portlet-body">
                     <div class="table-toolbar">
                  
                        <div class="btn-group">
						 <form action="<?php echo base_url();?>index.php/Agent_vehicle_management/edit_agent_vehicle" method="post">
                           <button type="submit" name="agent_vehicle_id" value="<?php echo $vehicle_list->id; ?>"  id="sample_editable_1_new" class="btn blue">
                           
                           Edit
                           </button>
						   </form>
						   
                        </div>
                         <div class="btn-group">
						 <form action="<?php echo base_url();?>index.php/Agent_vehicle_management/agent_vehicle_delete" method="post">
                           <button type="submit" name="agent_vehicle_id" value="<?php echo $vehicle_list->id; ?>" onclick="return doconfirm();"  id="sample_editable_1_new" class="btn red">
                           
                           Delete
                           </button>
						   </form>
						   
                        </div>
                        
						 <div class="btn-group">
						 
							
						 
							
						 <div class="btn-group">
						 	<?php if( $vehicle_list->v_status != 1){?>
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
                                 <th colspan="7" >Vehicle Details</th>
                                
                              </tr>
                           </thead>
                           <tbody>
                        <tr class="red_row">
                                 <th >Vehicle Id#</th>
                                 <th>Joining Date & Time</th>
                                 <th colspan="1">Vehicle Category</th>
                                 <th colspan="1">Vehicle Type</th>
                                 <th colspan="2">Insurance Expire Date</th>
                                  <th colspan="1">Vehicle Register No.</th>
                                
                                
                                
                              </tr>
                              <tr>
                                 <td ><?php echo $vehicle_list->vehicle_id; ?></td>
                                 <td><?php echo  date('d/m/Y',strtotime($vehicle_list->v_reg_date))." ".date('h:i A',strtotime($vehicle_list->v_reg_time));?></td>
                                 <td colspan="1"><?php echo $vehicle_list->category_name; ?></td>
                                 <td colspan="1"><?php echo $vehicle_list->v_name; ?></td>
                                 <td colspan="2"><?php echo date('d/m/Y',strtotime($vehicle_list->v_insurance_expire_date)); ?></td>
                                 <td colspan="1" ><?php echo $vehicle_list->v_register_no; ?></td>
                                 
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
                                 <td colspan="2"><?php if($vehicle_list->a_full_name!=""){echo $vehicle_list->a_full_name; }else{ echo "N/A"; }?></td>                                
                                 <td><?php if( $vehicle_list->a_contact_no1!=""){echo  $vehicle_list->a_contact_no1; }else{ echo "N/A"; }?></td>
                                 <td><?php if($vehicle_list->a_email_id!=""){echo $vehicle_list->a_email_id; }else{ echo "N/A"; }?></td>
                                 <td>-</td>
								 
                                  <td>-</td>
								  
                                 <td>-</td>
                                
                              </tr>
                           </thead>
                            
                            
                                                 
                          
                        
                             <thead>
                             
                               <tr class="red_row">
                               	   
                                 <th>Profile Picture</th>
                                 <th>Insurance Copy</th> 
                                 <th>Other Docs 1</th> 
                                  <th>Other Docs 2</th> 
                                     <th>Other Docs 3</th> 
                                        <th>-</th>
                                           <th>-</th>
                              </tr>
                             
                               <tr>
							   
                                 <td>							 
								 
									 <a <?php if($vehicle_list->v_profile_pic != ""){?>href="<?php echo base_url()."/uploads/vehicle/profile_pic/".$vehicle_list->v_profile_pic; }?>"  target="_blank" >
								 <?php if($vehicle_list->v_profile_pic != ""){?>
                          				<img src="<?php echo base_url();?>/uploads/vehicle/profile_pic/<?php echo $vehicle_list->v_profile_pic;?>" width="50%;">
						 		 <?php } else { ?>
						 				 <img src="<?php echo base_url();?>assets/global/img/defaultimg.jpg" width="50%;">
								<?php } ?>
									</a>
								</td>
										 
								 <td>							 
							 
									 <a <?php if($vehicle_list->v_insurance != ""){?>href="<?php echo base_url()."/uploads/vehicle/insurance/".$vehicle_list->v_insurance; } ?>" target="_blank" >
							 <?php if($vehicle_list->v_insurance != ""){?>
										<img src="<?php echo base_url();?>/uploads/vehicle/insurance/<?php echo $vehicle_list->v_insurance;?>" width="50%;">
							 <?php } else { ?>							
									 	<img src="<?php echo base_url();?>assets/global/img/defaultimg.jpg" width="50%;">
							<?php } ?>
									</a>
								</td>
								
								 <td>							 
							 
									 <a  <?php if($vehicle_list->v_other_docs1 != ""){?>href="<?php echo base_url()."/uploads/vehicle/other_docs1/".$vehicle_list->v_other_docs1;  } ?>" target="_blank" >
							 <?php if($vehicle_list->v_other_docs1 != ""){?>
										<img src="<?php echo base_url();?>/uploads/vehicle/other_docs1/<?php echo $vehicle_list->v_other_docs1;?>" width="50%;">
							 <?php } else { ?>							
									 	<img src="<?php echo base_url();?>assets/global/img/defaultimg.jpg" width="50%;">
							<?php } ?>
									</a>
								</td>	 	 
										 
                           
                          <td>
						  <a  <?php if($vehicle_list->v_other_docs2 != ""){?>href="<?php echo base_url()."/uploads/vehicle/other_docs2/".$vehicle_list->v_other_docs2; } ?>" target="_blank" >
							 <?php if($vehicle_list->v_other_docs2 != ""){?>
										<img src="<?php echo base_url();?>/uploads/vehicle/other_docs2/<?php echo $vehicle_list->v_other_docs2;?>" width="50%;">
							 <?php } else { ?>							
									 	<img src="<?php echo base_url();?>assets/global/img/defaultimg.jpg" width="50%;">
							<?php } ?>
									</a>
									</td>
                           <td>
						  <a  <?php if($vehicle_list->v_other_docs3 != ""){?>href="<?php echo base_url()."/uploads/vehicle/other_docs3/".$vehicle_list->v_other_docs3; } ?>" target="_blank" >
							 <?php if($vehicle_list->v_other_docs3 != ""){?>
										<img src="<?php echo base_url();?>/uploads/vehicle/other_docs3/<?php echo $vehicle_list->v_other_docs3;?>" width="50%;">
							 <?php } else { ?>							
									 	<img src="<?php echo base_url();?>assets/global/img/defaultimg.jpg" width="50%;">
							<?php } ?>
									</a>
									</td>
                            <td>-</td>
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
	var agent_vehicle_id = <?php echo $vehicle_list->id; ?>;
	$.ajax({
                url: '<?php echo base_url();?>index.php/Agent_vehicle_management/agent_vehicle_status',
                type: 'post',
                data: {agent_vehicle_id : agent_vehicle_id},
                success: function(msg)
                {
					window.location.reload();

                }
    });
}

</script>
<?php $this->load->view('footer');?>