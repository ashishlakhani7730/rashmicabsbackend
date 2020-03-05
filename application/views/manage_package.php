<?php $this->load->view('header');?>
            <!-- END HEADER -->
            <div class="container-fluid">
                <div class="page-content">
                    <!-- BEGIN BREADCRUMBS -->
                    <div class="breadcrumbs">
                        <h1>Manage Package</h1>
                        
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
											<a href="<?php echo base_url();?>index.php/Package_management/add_package" class="btn yellow  btn-outline" >Add New
                                                        <i class="fa fa-plus"></i></a>
											
											
											
											
											
											
                                                
                                            </div>
                                        </div>
                                    </div>
	
                                   <table class="table table-striped table-bordered table-hover  order-column" id="sample_1">
                                        <thead>
                                            <tr>
                                              
                                             <th>
												Package #
											</th>
											
											<th>
												Package Type
											</th>
											<th>
												 Sub Type
											</th>
											<th>
												Vehicle Category
											</th>
											<th>
												 From City
											</th>
											<th>
												 To City
											</th>
											<th>
												Package Rate
											</th> 
											<th>
												 Action
											</th>
                                            </tr>
                                        </thead>
                                        <tbody>
										
									
										<?php foreach($package_list as $row) {?>
                                            <tr class="odd gradeX">
                                               
                                            <td>
												<?php echo $row->package_id; ?>
											</td>
											<td>
												<?php echo $this->db->get_where('package_type',array('package_type_id'=>$row->p_type))->row()->package_type; ?>
											</td>
											<td>
												<?php echo $this->db->get_where('package_type',array('id'=>$row->p_sub_type))->row()->package_sub_type; ?>
											</td>
											<td>
												<?php echo $this->db->get_where('vehicle_category_detail',array('id'=>$row->p_v_category))->row()->category_name; ?>
											</td>
											<td>
												<?php echo $this->db->get_where('city_detail',array('id'=>$row->p_from_city))->row()->c_name; ?>
											</td>
											<td>
												<?php if(!empty($row->p_to_city)){$to_city=$this->db->get_where('city_detail',array('id'=>$row->p_to_city))->row()->c_name; if(!empty($to_city)){echo $to_city;}} ?>
											</td>
											<td>
												<?php echo $row->p_rate; ?>
											</td>
											<td>
						<form  method="post">	
						
						<?php if($row->p_status != 1) { ?>
												
												<button  formaction="<?php echo base_url();?>index.php/Package_management/package_status" value="<?php echo $row->id; ?>" onClick="return do_active();" name="package_status_id" class="btn btn-sm red-haze"><i class="fa fa-ban"></i></button>
												
												<?php } else { ?>
												
												<button  formaction="<?php echo base_url();?>index.php/Package_management/package_status" value="<?php echo $row->id; ?>" name="package_status_id"  onClick="return do_inactive();" class="btn btn-sm green"><i class="fa fa-ban"></i></button>
												
												<?php }?>
	
						<button formaction="<?php echo base_url();?>index.php/Package_management/get_data_edit_package" class="btn btn-sm blue"  value="<?php echo $row->id; ?>" name="package_edit_id"><i class="fa fa-pencil"></i></button>
						
						<button formaction="<?php echo base_url()?>index.php/Package_management/delete_package" name="package_dlt_id" value="<?php echo $row->id; ?>" class="btn btn-sm red" onclick="return doconfirm();"><i class="fa fa-trash-o"></i></button>
						<button formaction="<?php echo base_url();?>index.php/Package_management/copy_package" class="btn btn-sm yellow tooltips"  value="<?php echo $row->id; ?>" name="package_copy_id"><i class="fa fa-copy"></i></button>
						
					
											
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