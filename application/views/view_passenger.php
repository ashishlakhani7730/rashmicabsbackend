  <div class="container-fluid">
                <div class="page-content">
                    <!-- BEGIN BREADCRUMBS -->
                    <div class="breadcrumbs">
                        <h1>Passenger Profile</h1>
                        
                    </div>
                    <!-- END BREADCRUMBS -->
                    <!-- BEGIN PAGE BASE CONTENT -->
                 <div class="row">
                        <div class="portlet light bordered">
                                <div class="portlet-title">
                                    <div class="caption font-dark">
                                        <i class="fa fa-user font-dark"></i>
                                        <span class="caption-subject bold uppercase"> <?php echo $passenger_data->p_full_name;?></span>
                                    </div>
                                </div>
                               <div class="portlet-body">
                     <div class="table-toolbar">
                  <form method="post" >
                        <div class="btn-group">
                           <button  type="submit" name="btn_p_edit" value="<?php echo $passenger_data->id; ?>" id="sample_editable_1_new" class="btn blue" formaction="<?php echo base_url().'index.php/Passenger_management/edit_passenger'?>">
                           
                           Edit
                           </button>
                        </div>
					
                         <div class="btn-group">
                           <button type="submit" name="btn_p_delete" value="<?php echo $passenger_data->id; ?>" id="sample_editable_1_new" onclick="return doconfirm();" class="btn red" formaction="<?php echo base_url().'index.php/Passenger_management/delete_passenger'?>">
                           
                           Delete
                           </button>
                        </div>
                        
						
						<?php if( $passenger_data->p_status != 1){?>
						 <div class="btn-group">
                           <button type="submit" name="btn_active" id="sample_editable_1_new" class="btn green-haze" value="<?php echo $passenger_data->id; ?>" formaction="<?php echo base_url().'index.php/Passenger_management/passenger_status_change'?>">
                           
                           Active 
                           </button>
                        </div>
						<?php 
						}
						else
						{
						?>
                         <div class="btn-group">
                           <button type="submit" name="btn_active" id="sample_editable_1_new" class="btn red-haze" value="<?php echo $passenger_data->id; ?>" formaction="<?php echo base_url().'index.php/Passenger_management/passenger_status_change'?>">
                           
                           Inactive 
                           </button>
                        </div>
						<?php } ?>
                        <div class="btn-group">
                           <button type="submit" name="btn_p_trips" value="<?php echo $passenger_data->id; ?>" id="sample_editable_1_new" class="btn green" formaction="<?php echo base_url().'index.php/Passenger_management/passenger_trips_list'?>">
                           
                           Trips
                           </button>
                        </div>
                     	<div class="btn-group">
						
						
                           <button type="submit" name="passenger_id" value="<?php echo $passenger_data->id; ?>" id="sample_editable_1_new" class="btn yellow" formaction="<?php echo base_url();?>index.php/Passenger_management/passenger_helpdesk_support">
                           
                           HelpDesk Support
                           </button>
						   
                        </div>
                        
                       <div class="btn-group">
                           <button type="submit" name="passenger_id" value="<?php echo $passenger_data->id; ?>"  id="sample_editable_1_new" class="btn blue" formaction="<?php echo base_url();?>index.php/Passenger_management/reset_password" >
                           Reset Password
                           </button>
                         </div>
                        </form>
                     </div>
                     <hr>
                    
                    <!-- custmor histry tabs-->
                    
                  <div class="portlet-body">
				  <div class="row">
				 <table class="table table-bordered">
                           <thead>
                              <tr class="blue_row">
                                 <th colspan="7" >Pessanger Details</th>
                                
                              </tr>
                           </thead>
                           <tbody>
                              <tr class="red_row">
                                 <th colspan="2">Full Name</th>
                                 <th>Email id</th>
                                 <th>Customer No</th>
                                 <th colspan="1">Mobile</th>
                                 <th colspan="1">2nd Mobile No.</th>
                                  <th colspan="1">Profile Picture</th>
                                
                                
                                
                              </tr>
                              <tr>
                                 <td colspan="2"><?php echo $passenger_data->p_full_name;?></td>
                                 <td><?php echo $passenger_data->p_email_id;?></td>
                                 <td><?php echo $passenger_data->p_id;?></td>
                                 <td colspan="1"><?php echo $passenger_data->p_contact;?></td>
                                 <td colspan="1"><?php if($passenger_data->p_contact_2!=""){echo $passenger_data->p_contact_2; }else{ echo "N/A"; }?></td>
                                 <td colspan="1" > <img src="<?php echo base_url();?>uploads/passenger_profile/<?php echo $passenger_data->p_profile;?>" width="75px" height="75px"></td>
                                 
                              </tr>
                               <thead>
                              <tr class="blue_row">
                                 <th colspan="7" >Other Details</th>
                                
                              </tr>
                               <tr class="red_row">
                                 <th>Joining Date & Time</th>
                                 <th>Gender</th>
                             
                                 <th colspan="2">City</th>
                                 <th colspan="2">State</th>
                                 <th >GST No.</th>
                                 
                                
                              </tr>
                              <tr>
                                 <td><?php echo  date('d/m/Y h:i A',strtotime($passenger_data->p_joining_date_time));?></td>
                                 <td><?php if($passenger_data->p_gender==1){echo "Male";}else{echo "Female";}?></td>
                      
                                 <td colspan="2"><?php if($passenger_data->p_city!=""){echo $passenger_data->p_city; }else{ echo "N/A"; }?></td>
                                 <td colspan="2"><?php if($passenger_data->p_state!=""){echo $passenger_data->p_state; }else{ echo "N/A"; }?></td>
                                 <td><?php echo $passenger_data->p_gst_number;?></td>
                           
                              </tr>
                           </thead>
                                                 
                          
                        
                             <thead>
                              <tr class="blue_row">
                                 <th colspan="4" >Home Address</th>
                                 <th colspan="3" >Log Details</th>
                                  
                                
                              </tr>
                               <tr>
                                 <th colspan="1" class="red_row">Address</th>
                                 <td colspan="3"><?php if($passenger_data->p_address!=""){echo $passenger_data->p_address; }else{ echo "N/A"; }?></td>
                                 <th colspan="1" class="red_row">Created By</th>
                                 <td colspan="2">User by - <?php echo date('Y-m-d h:i A',strtotime($passenger_data->p_joining_date_time)); ?></td> 
                              </tr>
                               <tr>
                                 <th colspan="1" class="red_row">Area</th>
                                 <td colspan="3"><?php if($passenger_data->p_area!=""){echo $passenger_data->p_area; }else{ echo "N/A"; }?></td>
                                 <th colspan="1" class="red_row">Updated By</th>
                                 <td colspan="2">User by - <?php echo date('Y-m-d h:i A',strtotime($passenger_data->p_updated_date_time)); ?></td> 
                              </tr>
                               <tr>
                                 <th colspan="1" class="red_row">City</th>
                                 <td colspan="3"><?php if($passenger_data->p_city!=""){echo $passenger_data->p_city; }else{ echo "N/A"; }?></td>
                                 <th colspan="1" class="red_row">-</th>
                                 <td colspan="2">-</td> 
                              </tr>
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
				
<script>

function doconfirm()
{
    dlt_confirm=confirm("You Want to Delete Permanently?");
    if(dlt_confirm!=true)
    {
        return false;
    }
}

function passengerStatusChange(id)
	{
		 $.ajax({
			url: '<?php echo base_url();?>index.php/Passenger_management/passenger_status_change',
			type: 'post',
			data: {id : id},
			success: function()
			{
				 //window.location.reload(1);
				// window.location.href = "<?php echo base_url();?>index.php/Passenger_management/view_passenger/"+id;				 
			}
		});
	}
</script>