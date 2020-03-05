
<?php $this->load->view('header');?>
            <!-- END HEADER -->
            <div class="container-fluid">
                <div class="page-content">
                    <!-- BEGIN BREADCRUMBS -->
                    <div class="breadcrumbs">
                        <h1>Manage Office Users</h1>
                        
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
											<a href="<?php echo base_url();?>index.php/User_management/add_user" class="btn yellow  btn-outline" >Add New
                                                        <i class="fa fa-plus"></i></a>
                                                
                                            </div>
                                        </div>
                                    </div>
                                   <table class="table table-striped table-bordered table-hover  order-column" id="sample_1">
                                        <thead>
                                            <tr>
                                              
                                               <th >
									User #
								</th>
                                
								<th>
									Name
								</th>
								<th>
									 Cell No
								</th>
								<th>
									 Email
								</th>
                                <th>
									 City
								</th>
                               
								<th>
									 Action
								</th>
                                            </tr>
                                        </thead>
                                        <tbody>
										<?php foreach($user_list as $row) {?>
                                            <tr class="odd gradeX">
                                               
                                                <td>
									<?php echo $row->user_id;?>
								</td>
								<td>
									<?php echo $row->u_full_name;?>
								</td>
								<td>
								<?php echo $row->u_contact_no1;?>
								</td>
								<td>
									<?php echo $row->u_email_id;?>
								</td>
                                <td>
									<?php echo $row->u_city;?>
								</td>
								
								
								<td>
								
								<form method="post">	
																
										<?php if( $row->u_status != 1){?>
								
											<button formaction="<?php echo base_url();?>index.php/User_management/user_status" type="submit" onClick="return do_inactive();"name="user_status_id" value="<?php echo $row->id; ?>" class="btn btn-sm green"><i class="fa fa-ban"></i></button>
								
										<?php } else { ?>
																			
												<button formaction="<?php echo base_url();?>index.php/User_management/user_status" type="submit" onClick="return do_active();" name="user_status_id" value="<?php echo $row->id; ?>" class="btn btn-sm red-haze"><i class="fa fa-ban" onclick="passengerStatusChange(<?php echo $row->id; ?>)" ></i></button>
													
										<?php }?>
																				
										<button formaction="<?php echo base_url();?>index.php/User_management/get_data_edit_user" class="btn btn-sm blue" name="user_edit_id" value="<?php echo $row->id;?>"><i class="fa fa-pencil"></i></button>
																		
								
																			
										 <button form action="<?php echo base_url();?>index.php/User_management/user_delete" onClick="return doconfirm();" type="submit" name="user_dlt_btn"  value="<?php echo $row->id;?>" class="btn btn-sm red"><i class="fa fa-trash"></i></button>
								
									</form> 
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
<script>
/*
function passengerStatusChange(id)
	{
		
		 $.ajax({
			url: '<?php// echo base_url();?>index.php/User_management/user_status',
			type: 'post',
			data: {id : id},
			success: function()
			{
				 window.location.reload(1);	
			}
		});
	}
	*/
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
    job=confirm("You Want to Delete Permanently?");
    if(job!=true)
    {
        return false;
    }
}


</script>
 <?php $this->load->view('footer');?>