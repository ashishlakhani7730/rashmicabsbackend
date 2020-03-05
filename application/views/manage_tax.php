 <?php $this->load->view('header'); ?>
            <!-- END HEADER -->
            <div class="container-fluid">
                <div class="page-content">
                    <!-- BEGIN BREADCRUMBS -->
                    <div class="breadcrumbs">
                        <h1>Manage TAX</h1>
                        
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
											<a href="<?php echo base_url();?>index.php/Tax_management/add_tax" class="btn yellow  btn-outline" >Add New
                                                        <i class="fa fa-plus"></i></a>
                                                
                                            </div>
                                        </div>
                                    </div>
                                   <table class="table table-striped table-bordered table-hover  order-column" id="sample_1">
                                        <thead>
										
                                            <tr>
                                              
                                               <th>
									ID #
								</th>
                                
								<th>
									Tax Name
								</th>
								<th>
									 Tax Value (%)
								</th>
								
                               
								<th>
									 Action
								</th>
                                            </tr>
                                        </thead>
                                        <tbody>
										<?php foreach($tax_list as $row) {?>
                                            <tr class="odd gradeX">
                                               
                                                <td>
									<?php echo $row->tax_id;?>
								</td>
								<td>
									 <?php echo $row->t_name; ?>
								</td>
								<td>
									<?php echo $row->t_value; ?>
								</td>
								
                                                <td>
												
												<form method="post">
												
												<?php if($row->t_status != 1) { ?>
												<button  formaction="<?php echo base_url();?>index.php/Tax_management/tax_status" value="<?php echo $row->id; ?>" onClick="return do_active();" name="tax_status_id" class="btn btn-sm red-haze"><i class="fa fa-ban"></i></button>
												<?php } else { ?>
												<button  formaction="<?php echo base_url();?>index.php/Tax_management/tax_status" value="<?php echo $row->id; ?>" name="tax_status_id"  onClick="return do_inactive();" class="btn btn-sm green"><i class="fa fa-ban"></i></button>
												<?php }?>
												
												<button  formaction="<?php echo base_url();?>index.php/Tax_management/get_data_edit_tax" value="<?php echo $row->id; ?>" name="tax_edit_id" class="btn btn-sm blue"><i class="fa fa-pencil"></i></button>
												
												
                                                <button  formaction="<?php echo base_url();?>index.php/Tax_management/tax_delete" value="<?php echo $row->id; ?>" name="tax_delete_id" onclick="return doconfirm();" class="btn btn-sm red"><i class="fa fa-trash"></i></button>
												
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
<script type="text/javascript">
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
 <?php $this->load->view('footer'); ?>