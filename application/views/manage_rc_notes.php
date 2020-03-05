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
											<a href="<?php echo base_url();?>index.php/Rc_notes_management/add_rc_notes" class="btn yellow  btn-outline" >Add New
                                                        <i class="fa fa-plus"></i></a>
											
											
											
											
											
											
                                                
                                            </div>
                                        </div>
                                    </div>
	
                                   <table class="table table-striped table-bordered table-hover  order-column" id="sample_1">
                                        <thead>
                                            <tr>
                                              
                                             <th>
												Sr#
											</th>
											<th>
												Title
											</th>
											<th>
												Description
											</th>
											<th>
												Created On
											</th>
											
										
											<th>
												 Action
											</th>
                                            </tr>
                                        </thead>
                                        <tbody>
										
									
										<?php
										$i=1;
										
										 foreach($rc_notes_list as $row) {?>
                                            <tr class="odd gradeX">
                                               
                                            <td>
												<?php echo $i;   $i++;?>
											</td>
											
											<td>
												<?php echo $row->rc_title; ?>
											</td>
											<td>
												<?php echo $row->rc_description; ?>
											</td>
											<td>
												<?php echo date('d-m-Y h:i A',strtotime( $row->rc_created_date_time)); ?>
											</td>
											
											<td>
						<form  method="post">	
						
						
						<button formaction="<?php echo base_url()?>index.php/Rc_notes_management/delete_rc_notes" name="rc_notes_dlt_id" value="<?php echo $row->id; ?>" class="btn btn-sm red" onclick="return doconfirm();"><i class="fa fa-trash-o"></i></button>
						
						
					
											
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