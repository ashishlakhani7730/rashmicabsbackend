 <?php $this->load->view('header'); ?>
            <!-- END HEADER -->
            <div class="container-fluid">
                <div class="page-content">
                    <!-- BEGIN BREADCRUMBS -->
                    <div class="breadcrumbs">
                        <h1>Manage City Route</h1>
                        
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
											<a href="<?php echo base_url();?>index.php/Oneway_city_route_list/add_city_route" class="btn yellow  btn-outline" >Add New
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
									From City
								</th>
								<th>
									To City
								</th>
								<th>
									Discount
								</th>
								<th>
									 Action
								</th>
                                            </tr>
                                        </thead>
										
										
										
                                        <tbody>
										<?php foreach($city_route_list as $cr) { ?>
                                            <tr class="odd gradeX">
                                               
                                                <td>
												<?php echo $cr->cr_id;?>
												</td>
												<td>
												<?php echo $this->db->get_where('city_detail',array('id'=>$cr->cr_from_city))->row()->c_name;?>
												</td>
												<td>
												<?php echo $this->db->get_where('city_detail',array('id'=>$cr->cr_to_city))->row()->c_name;?>								</td>
								
                                                
												<td>
													<?php if($cr->cr_discount_type==0){ echo $cr->cr_discount." %";}else{echo "Rs. ".$cr->cr_discount;} ?>
												</td>
												<td>
												<form method="post">				
												
												<button  formaction="<?php echo base_url();?>index.php/Oneway_city_route_list/update_city_route" value="<?php echo $cr->id;?>" name="cr_id"  class="btn btn-sm blue"><i class="fa fa-pencil"></i></button>		
												
                                                <button  formaction="<?php echo base_url();?>index.php/Oneway_city_route_list/delete_city_route" value="<?php echo $cr->id;?>" name="cr_delete_id" onclick="return doconfirm();" class="btn btn-sm red"><i class="fa fa-trash"></i></button>
												
												
												
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