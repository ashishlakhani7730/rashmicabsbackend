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
                                            
                                        </div>
                                    </div>
	
                                   <table class="table table-striped table-bordered table-hover  order-column" id="sample_1">
                                        <thead>
                                            <tr>
                                              
                                             <th>
												Offer #
											</th>
											<th>
												Vehicle Category
											</th>
											<th>
												City Route
											</th>
											<th>
												KM Rate
											</th>
											<th>
												HR Rate
											</th>
											
											<th>
												Valid From
											</th> 
											<th>
												Valid To
											</th> 
											
										
											<th>
												 Action
											</th>
                                            </tr>
                                        </thead>
                                        <tbody>
										
									
										<?php foreach($oneway_offer_list as $row) {?>
                                            <tr class="odd gradeX">
                                               
                                            <td>
												<?php echo $row->oo_id; ?>
											</td>
											<td>
												<?php echo $this->db->get_where('vehicle_category_detail',array('id'=>$row->oo_vc_id))->row()->category_name; ?>
											</td>
											
											<td>
												<?php echo $this->db->get_where('city_detail',array('id'=>$row->oo_first_city))->row()->c_name." - ".$this->db->get_where('city_detail',array('id'=>$row->oo_second_city))->row()->c_name; if(!empty($row->oo_third_city)){echo " - ".$this->db->get_where('city_detail',array('id'=>$row->oo_third_city))->row()->c_name;} ?>
											</td>
											<td>
												<?php echo $row->oo_km_rate; ?>
											</td>
											<td>
												<?php echo $row->oo_hr_rate; ?>
											</td>
											<td>
												<?php echo date('d-m-Y h:i A',strtotime( $row->oo_valid_date." ".$row->oo_valid_from_time )); ?>
											</td>
											<td>
												<?php echo date('d-m-Y h:i A',strtotime( $row->oo_valid_date." ".$row->oo_valid_to_time )); ?>
											</td>
											<td>
						<form  method="post">	
						
						<?php if($row->oo_status != 1) { ?>
												
												<button  formaction="<?php echo base_url();?>index.php/Oneway_offer_management/oneway_offer_status" value="<?php echo $row->id; ?>" onClick="return do_active();" name="oneway_offer_status_id" class="btn btn-sm red-haze"><i class="fa fa-ban"></i></button>
												
												<?php } else { ?>
												
												<button  formaction="<?php echo base_url();?>index.php/Oneway_offer_management/oneway_offer_status" value="<?php echo $row->id; ?>" name="oneway_offer_status_id"  onClick="return do_inactive();" class="btn btn-sm green"><i class="fa fa-ban"></i></button>
												
												<?php }?>
	
						<button formaction="<?php echo base_url();?>index.php/Oneway_offer_management/get_data_edit_oneway_offer" class="btn btn-sm blue"  value="<?php echo $row->id; ?>" name="oneway_offer_edit_id"><i class="fa fa-pencil"></i></button>
						
						<button formaction="<?php echo base_url()?>index.php/Oneway_offer_management/delete_oneway_offer" name="oneway_offer_dlt_id" value="<?php echo $row->id; ?>" class="btn btn-sm red" onclick="return doconfirm();"><i class="fa fa-trash-o"></i></button>
						
						
					
											
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