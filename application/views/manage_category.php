 <?php $this->load->view('header'); ?>
            <!-- END HEADER -->
            <div class="container-fluid">
                <div class="page-content">
                    <!-- BEGIN BREADCRUMBS -->
                    <div class="breadcrumbs">
                        <h1>Manage Category</h1>
                        
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
											<a href="<?php echo base_url();?>index.php/Vehicle_category_management/add_category" class="btn yellow  btn-outline" >Add New
                                                        <i class="fa fa-plus"></i></a>
                                                
                                            </div>
                                        </div>
                                    </div>
                                   <table class="table table-striped table-bordered table-hover  order-column" id="sample_1">
                                        <thead>
										
                                            <tr>
                                              
                                               <th>
									Category #
								</th>
                                
								<th>
									 Name
								</th>
								<th>
									 Oneway Offer KM Rate
								</th> 
								<th>
									 Oneway Offer HR Rate
								</th>  																<th>									 Description								</th>
								<th>
									 Action
								</th>
                                            </tr>
                                        </thead>
                                        <tbody>
										<?php foreach($category_list as $row) {?>
                                            <tr class="odd gradeX">
                                               
                                <td>
									<?php echo $row->category_id;?>
								</td>
								<td>
									 <?php echo $row->category_name; ?>
								</td>
								<td>
									 <?php echo $row->category_oneway_offer_km_rate; ?>
								</td>
								<td>
									 <?php echo $row->category_oneway_offer_hr_rate; ?>
								</td>																<td>									 <?php echo $row->description; ?>								</td>
								<td>
												
												<form method="post">												
												
												
												<button  formaction="<?php echo base_url();?>index.php/Vehicle_category_management/get_data_edit_category" value="<?php echo $row->id; ?>" name="category_edit_id" class="btn btn-sm blue"><i class="fa fa-pencil"></i></button>
												
												
                                                <button  formaction="<?php echo base_url();?>index.php/Vehicle_category_management/category_delete" value="<?php echo $row->id; ?>" name="category_delete_id" onclick="return doconfirm();" class="btn btn-sm red"><i class="fa fa-trash"></i></button>
												
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