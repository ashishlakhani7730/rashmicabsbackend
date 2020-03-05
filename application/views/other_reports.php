 <?php $this->load->view('header'); ?>
            <!-- END HEADER -->
            <div class="container-fluid">
                <div class="page-content">
                    <!-- BEGIN BREADCRUMBS -->
                    <div class="breadcrumbs">
                        <h1>Manage Passengers Reports</h1>
                        
                    </div>
                    <!-- END BREADCRUMBS -->
                    <!-- BEGIN PAGE BASE CONTENT -->
					<div class="row">
                        <div class="col-md-12">
                         	<div class="portlet light bordered">
                                            
                            	<div class="portlet-body form">
                                	<!-- BEGIN FORM-->
                                	<form action="<?php echo base_url();?>index.php/Report_management/OtherReports" id="subscribeForm" method="post" class="horizontal-form">
                                    	<div class="form-body">
                                                      
											<div class="row">
												<?php $msg = $this->session->flashdata('error');
												if($msg['error'] != ''){
												?>
													<div class="col-md-12 ">
													<p style="color:red; "><strong><?php echo $msg['error']; ?></strong></p>
												</div>
												<?php  } ?>
												
												<div class="col-md-3">
                                                	<div class="form-group">
														<label class="control-label">From Date </label><span class="required">*</span>
														<input class="form-control form-control-inline date-picker" size="16" type="text" id="from_date" name="from_date" data-date-format="dd-mm-yyyy" value="" required/>  
													</div>
												</div>
													 
												<div class="col-md-3">
                                                	<div class="form-group">
														<label class="control-label">To Date </label><span class="required">*</span>
														<input class="form-control form-control-inline date-picker" size="16" type="text" id="to_date" name="to_date" data-date-format="dd-mm-yyyy" value="" required/>  
													</div>
												</div>
												
												<div class="col-md-3">
                                               		<div class="form-group">
                                                    	<label class="control-label">Type</label><span class="required">*</span>
                                                        <select name="type" id="type" class="form-control select2" >
															
															<option value="1" selected="selected">Booking Source Wise</option>
															<option value="2">City Wise</option>
															
                                        				</select>
                                                                    
                                                    </div>
												</div>
												<div class="col-md-3" id="other_div" style="display:none">
                                               		<div class="form-group">
                                                    	<label class="control-label" id="other_value_lbl"></label><span class="required">*</span>
                                                        <select name="other_id" id="other_id" class="form-control select2" >
															
															
                                        				</select>
                                                                    
                                                    </div>
												</div>
											</div>
													
                                                    
											<div class="form-actions right">
												<button type="submit" class="btn yellow" >
                                                            <i class="fa fa-check"></i>Submit</button>
											</div>
										</div>
                                    </form>
                                	<!-- END FORM-->
                               
                        		</div>
                    		</div>
                    	</div>
                    </div>
                 	<div class="row">
                        <div class="col-md-12">
                            <!-- BEGIN EXAMPLE TABLE PORTLET-->
                            <div class="portlet light bordered">
                                
                                <div class="portlet-body">
									<div class="table-toolbar">
									</div>
                                  
                                  	<br><br>
                                   <table class="table table-striped table-bordered table-hover dt-responsive" id="sample_1">
								   		<thead>
                                            
											<tr>
                                              
											   <th >
													Booking #
												</th>
												<th>
													Pickup Date
												</th>
												  <th>
													Pickup Time
												</th>
												
												<th>
													Passenger
												</th>
												<th>
													Mobile#
												</th>
												<th>
													Package
												</th>
												<th>
													 Vehicle Category
												</th>
											 
												<th>
													Pickup Location
												</th> 
												<th>
													Driver/Agent
												</th> 
												<th>
													Status
												</th> 
												
                                            </tr>
										
                                        </thead>
                                        <tbody>
                                            
                                        <?php foreach($booking_list as $pb) { ?>
                                        
											<tr class="odd gradeX">
												<td>
													<?php echo $pb->b_id;?>
												</td> 
												<td>
													<?php echo date('d/m/Y',strtotime($pb->b_from_date));?>	
												</td>
												<td>
													<?php echo date('h:i A',strtotime($pb->b_from_time));?>
												</td>
												<td>
													<?php echo $pb->b_p_name;?>
												</td>
												<td>
													<?php echo $pb->b_p_contact;?>
												</td>
												<td >
												   <?php if($pb->package_type=='ONEWAY') { echo $pb->package_sub_type; } else { echo $pb->package_type.'<br>'.$pb->package_sub_type; } ?>
												</td>
												<td>																				
													<?php echo $this->db->get_where('vehicle_category_detail',array('id'=>$pb->b_vc_id))->row()->category_name;?>
												</td>
												 <td >								 
													<?php echo $pb->b_pickup_point;?>									
												</td>
												 <td >
													<center><?php if($pb->b_agent_id=="") { echo "-"; }  ?><?php if($pb->b_agent_id!="") { echo $this->db->get_where('agent_detail',array('id'=>$pb->b_agent_id))->row()->a_full_name; }  ?>		</center>
												</td>
												 <td >
													<?php if($pb->b_status == 0){echo "<span class='label label-sm label-danger'>Cancelled</span>";} if($pb->b_status == 1){echo "<span class='label label-sm label-info'> pending </span>";} if($pb->b_status == 2){echo "<span class='label label-sm label-primary'>Owner Assigned </span>";}  if($pb->b_status == 3){echo " <span class='label label-sm label-default'> Driver Assigned </span>";} if($pb->b_status == 4){ if($pb->b_rent_card_id !=0 && $pb->b_rent_card_status == 1){ echo "<span class='label label-sm label-default'> Duty Slip  </span>"; } else { echo "<span class='label label-sm label-warning'> Cab Assigned </span>"; } } if($pb->b_status == 5){ if( $this->db->get_where('invoice',array('id'=>$pb->b_invoice_id))->row()->balance > 0 ){echo "<span class='label label-sm label-info'> Complete Trip</span>";}else{ echo "<span class='label label-sm label-info'> Due  </span>"; }  } if($pb->b_status == 6){ if($this->db->get_where('invoice',array('id'=>$pb->b_invoice_id))->row()->balance > 0 ){echo "<span class='label label-sm label-info'> Due </span>";}else{echo "<span class='label label-sm label-success'> Trip Finished</span>"; } }?>
													
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
		get_option_type()
		$("select#type").change(function(){
			get_option_type()
		});
	});
	
	function get_option_type(){
		
            var type = $("#type option:selected").val();
			
			
			$('#other_div').show();
			$('#other_value_lbl').empty();
					
			if(type=='1'){
				$('#other_value_lbl').append('Booking Source');
			}else if(type=='2'){
				$('#other_value_lbl').append('City');
			}else{
				$('#other_value_lbl').append('');
				$('#other_div').hide();
			}
			
			
            $.ajax({
                url: '<?php echo base_url(); ?>index.php/Report_management/fetch_other_type',
                type: 'post',
                data: {type : type},
                success: function(msg)
                {
					$('#other_id').empty();
                    $('#other_id').append(msg);
				
                }
            });
        
	}
</script>


<?php $this->load->view('footer'); ?>