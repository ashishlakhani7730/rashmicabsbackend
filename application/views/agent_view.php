<?php $this->load->view('header');?>
            <!-- END HEADER -->
            <div class="container-fluid">
                <div class="page-content">
                    <!-- BEGIN BREADCRUMBS -->
                    <div class="breadcrumbs">
                        <h1>Agent Profile</h1>
                        
                    </div>
                    <!-- END BREADCRUMBS -->
                    <!-- BEGIN PAGE BASE CONTENT -->
                 <div class="row">
                        <div class="portlet light bordered">
                                <div class="portlet-title">
                                    <div class="caption font-dark">
                                        <i class="fa fa-user font-dark"></i>
                                        <span class="caption-subject bold uppercase"> <?php echo $agent_view->a_full_name; ?></span>
                                    </div>
                                    
                                    
                                </div>
								 
                               <div class="portlet-body">
                     <div class="table-toolbar">
                  
                        <div class="btn-group">
						 <form action="<?php echo base_url();?>index.php/Agent_management/get_data_edit_agent" method="post">
                           <button type="submit" name="agent_id" value="<?php echo $agent_view->id; ?>"  id="sample_editable_1_new" class="btn blue">
                           
                           Edit
                           </button>
						   </form>
						   
                        </div>
                         <div class="btn-group">
						 <form action="<?php echo base_url();?>index.php/Agent_management/agent_delete" method="post">
                           <button type"submit" name="agent_id" value="<?php echo $agent_view->id; ?>" onclick="return doconfirm();"  id="sample_editable_1_new" class="btn red">
                           
                           Delete
                           </button>
						   </form>
						   
                        </div>
                        
						 <div class="btn-group">
						 
			<form action="<?php echo base_url();?>index.php/Agent_management/agent_status" method="post">
						 
			<?php if( $agent_view->a_status != 1){?>
						 <div class="btn-group">
                           <button type="button" id="sample_editable_1_new" class="btn green-haze" onclick="passengerStatusChange(<?php echo $agent_view->id; ?>)">
                           
                           Active 
                           </button>
                        </div>
						<?php 
						}
						else
						{
						?>
                         <div class="btn-group">
                           <button type="button" id="sample_editable_1_new" class="btn red-haze" onclick="passengerStatusChange(<?php echo $agent_view->id; ?>)">
                           
                           Inactive 
                           </button>
                        </div>
						<?php } ?>
						   
							
                        </div>
						 </form>
                       
                        <div class="btn-group">
							 <form action="<?php echo base_url();?>index.php/Agent_management/agent_trips_list" method="post">
                           <button name="btn_a_trips" value="<?php echo $agent_view->id; ?>" id="sample_editable_1_new" class="btn green">
                           
                           Trips
                           </button>
						    </form>
                        </div>
                    	<div class="btn-group">
						<form action="<?php echo base_url();?>index.php/Agent_management/agent_helpdesk_support" method="post">
						
                           <button type"submit" name="agent_id" value="<?php echo $agent_view->id; ?>" id="sample_editable_1_new" class="btn yellow" >
                           
                           HelpDesk Support
                           </button>
						   </form>
                        </div>
                     	<div class="btn-group">
                           <button id="sample_editable_1_new"  data-toggle="modal" href="#manage_wallet" class="btn purple">
                           
                           Manage Wallet
                           </button>
                        </div>	
					 
                      <div class="btn-group">
                        <form action="<?php echo base_url();?>index.php/Agent_management/reset_password" method="post">
                           <button type="submit" name="agent_id" value="<?php echo $agent_view->id; ?>"  id="sample_editable_1_new" class="btn blue">
                           Reset Password
                           </button>
                         </form>
                         </div>
                     </div>
                     <hr>
                    
                    <!-- custmor histry tabs-->
                    
                  <div class="portlet-body">
				  <div class="row">
				  <table class="table table-bordered">
                           <thead>
                           <tr class="blue_row">
                                 <th colspan="7" >Agent Details</th>
                                
                              </tr>
                           </thead>
                           <tbody>
                        <tr class="red_row">
                                 <th >Agent Id#</th>
                                 <th>Joining Date & Time</th>
                                 <th colspan="1">Agent Name</th>
                                 <th colspan="1">Contact No</th>
                                 <th colspan="2">2nd Contact No.</th>
                                  <th colspan="1">Agent Email Id</th>
                                
                                
                                
                              </tr>
                              <tr>
                                 <td ><?php echo $agent_view->agent_id; ?></td>
                                 <td><?php echo  date('d/m/Y h:i A',strtotime($agent_view->a_joining_date_time));?></td>
                                 <td colspan="1"><?php echo $agent_view->a_full_name; ?></td>
                                 <td colspan="1"><?php echo $agent_view->a_contact_no1; ?></td>
                                 <td colspan="2"><?php if($agent_view->a_contact_no2!=""){echo $agent_view->a_contact_no2; }else{ echo "N/A"; }?></td>
                                 <td colspan="1" ><?php echo $agent_view->a_email_id; ?></td>
                                 
                              </tr>
                               <thead>
                              <tr class="blue_row">
                                 <th colspan="7" >Buisness Details</th>
                                
                              </tr>
                          <tr class="red_row">
                                 <th colspan="2">Business Name</th>
                               
                                 <th>B Contact No</th>
                                 <th>B Email</th>
                                 <th>PAN#</th>
                                 <th>GST#</th>
                                 <th >Wallet balance</th>
                                  
                                
                              </tr>
                              <tr>
                                 <td colspan="2"><?php if($agent_view->a_bsns_name!=""){echo $agent_view->a_bsns_name; }else{ echo "N/A"; }?></td>                                
                                 <td><?php if( $agent_view->a_bsns_contact_no!=""){echo  $agent_view->a_bsns_contact_no; }else{ echo "N/A"; }?></td>
                                 <td><?php if($agent_view->a_bsns_email_id!=""){echo $agent_view->a_bsns_email_id; }else{ echo "N/A"; }?></td>
                                 <td><?php echo $agent_view->a_pan_no; ?></td>
								 
                                  <td><?php echo $agent_view->a_gst_no; ?></td>
								  
                                 <td><a onclick="wallet_transaction(<?php echo $agent_view->id; ?>)" ><?php echo $agent_view->a_wallet_balance; ?></a></td>
                                
                              </tr>
                           </thead>
                            <thead>
                               <tr class="blue_row">
                                 <th colspan="7" >Address Details</th>
                                
                              </tr>
                             <tr class="red_row">
                                 <th colspan="2">Address</th>
                                 <th colspan="2">Area</th>
                                  <th>PIN</th>
                                 <th>State</th>
                                 <th>City</th>
                                 
                                  
                                
                              </tr>
                              <tr>
                                 <td colspan="2"><?php if($agent_view->a_address!=""){echo $agent_view->a_address; }else{ echo "N/A"; }?></td>
                                 <td colspan="2"><?php if($agent_view->a_area!=""){echo $agent_view->a_area; }else{ echo "N/A"; }?></td>
                                 <td><?php echo $agent_view->a_zipcode; ?></td>
								 
                                 <td><?php if($agent_view->a_state!=""){echo $agent_view->a_state; }else{ echo "N/A"; }?></td>
                                 <td><?php if($agent_view->a_city!=""){echo $agent_view->a_city; }else{ echo "N/A"; }?></td>
                              
                                
                              </tr>
                           </thead>
                            <thead>
                              <tr class="blue_row">
                                 <th colspan="7" >Bank Details</th>
                               
                                
                              </tr>
                            <tr class="red_row">
                                 <th colspan="2">Bank Name</th>
                                 <th colspan="2">Account Name</th>
                                 <th colspan="2">Account Number</th>
                                 <th>IFSC CODE</th>
                                
                                 
                                  
                                
                              </tr>
                              <tr>
                                 <td colspan="2"><?php if($agent_view->a_bnk_name!=""){echo $agent_view->a_bnk_name; }else{ echo "N/A"; }?></td>
                                 <td colspan="2"><?php if($agent_view->a_ac_name!=""){echo $agent_view->a_ac_name; }else{ echo "N/A"; }?></td>
                                 <td colspan="2"><?php if($agent_view->a_ac_no!=""){echo $agent_view->a_ac_no; }else{ echo "N/A"; }?></td>
                                 <td ><?php if($agent_view->a_ifsc!=""){echo $agent_view->a_ifsc; }else{ echo "N/A"; }?></td>
                                 
                                
                                
                              </tr>
                           </thead>
                                                 
                          
                        
                             <thead>
                             
                               <tr class="red_row">
                               	   
                                 <th>Profile Picture</th>
                                 <th>Driving LNC. Front</th> 
								 <th>Driving LNC. Back</th> 
                                 <th>Other Docs 1</th> 
                                  
                                     <th>Other Docs 2</th>
                                        <th>Other Docs 3</th>
                                           <th>-</th>
                              </tr>
                             
                               <tr>
							   
                                 <td>							 
								 
									 <a <?php if($agent_view->user_image1 != ""){?>href="<?php echo base_url();?>/uploads/Agent_Image/profile_pic/<?php echo $agent_view->user_image1; }?>" target="_blank" >
								 <?php if($agent_view->user_image1 != ""){?>
                          				<img src="<?php echo base_url();?>/uploads/Agent_Image/profile_pic/<?php echo $agent_view->user_image1;?>" width="50%;">
						 		 <?php } else { ?>
						 				 <img src="<?php echo base_url();?>assets/global/img/defaultimg.jpg" width="50%;">
								<?php } ?>
									</a>
								</td>
										 
								 <td>							 
							 
									 <a  <?php if($agent_view->user_image2 != ""){?>href="<?php echo base_url();?>/uploads/Agent_Image/driving_lic_front/<?php echo $agent_view->user_image2; }?>" target="_blank" >
							 <?php if($agent_view->user_image2 != ""){?>
										<img src="<?php echo base_url();?>/uploads/Agent_Image/driving_lic_front/<?php echo $agent_view->user_image2;?>" width="50%;">
							 <?php } else { ?>							
									 	<img src="<?php echo base_url();?>assets/global/img/defaultimg.jpg" width="50%;">
							<?php } ?>
									</a>
								</td>
								<td>							 
							 
									 <a <?php if($agent_view->a_driving_lic_back != ""){?>href="<?php echo base_url();?>/uploads/Agent_Image/driving_lic_back/<?php echo $agent_view->a_driving_lic_back;}?>" target="_blank" >
							 <?php if($agent_view->a_driving_lic_back != ""){?>
										<img src="<?php echo base_url();?>/uploads/Agent_Image/driving_lic_back/<?php echo $agent_view->a_driving_lic_back;?>" width="50%;">
							 <?php } else { ?>							
									 	<img src="<?php echo base_url();?>assets/global/img/defaultimg.jpg" width="50%;">
							<?php } ?>
									</a>
								</td>
								 <td>							 
							 
									 <a <?php if($agent_view->user_image3 != ""){?>href="<?php echo base_url();?>/uploads/Agent_Image/other_docs1/<?php echo $agent_view->user_image3;}?>" target="_blank" >
							 <?php if($agent_view->user_image3 != ""){?>
										<img src="<?php echo base_url();?>/uploads/Agent_Image/other_docs1/<?php echo $agent_view->user_image3;?>" width="50%;">
							 <?php } else { ?>							
									 	<img src="<?php echo base_url();?>assets/global/img/defaultimg.jpg" width="50%;">
							<?php } ?>
									</a>
								</td>	 	 
										 
                           
                          <td>
						  	<a <?php if($agent_view->a_other_docs2 != ""){?>href="<?php echo base_url();?>/uploads/Agent_Image/other_docs2/<?php echo $agent_view->a_other_docs2;}?>" target="_blank" >
							 <?php if($agent_view->a_other_docs2 != ""){?>
										<img src="<?php echo base_url();?>/uploads/Agent_Image/other_docs2/<?php echo $agent_view->a_other_docs2;?>" width="50%;">
							 <?php } else { ?>							
									 	<img src="<?php echo base_url();?>assets/global/img/defaultimg.jpg" width="50%;">
							<?php } ?>
									</a>
						  </td>
                          
                            <td>	
								<a <?php if($agent_view->a_other_docs3 != ""){?>href="<?php echo base_url();?>/uploads/Agent_Image/other_docs3/<?php echo $agent_view->a_other_docs3;}?>" target="_blank" >
							 <?php if($agent_view->a_other_docs3 != ""){?>
										<img src="<?php echo base_url();?>/uploads/Agent_Image/other_docs3/<?php echo $agent_view->a_other_docs3;?>" width="50%;">
							 <?php } else { ?>							
									 	<img src="<?php echo base_url();?>assets/global/img/defaultimg.jpg" width="50%;">
							<?php } ?>
									</a>
							</td>
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
<!-- manage wallet -->
<div class="modal fade bs-modal-lg" id="manage_wallet" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
                
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
				<h4 class="modal-title"><strong>Manage Wallet</strong></h4>
			</div>
			<div class="modal-body">
				<div class="form-body">
					<form method="post">
					<div class="row">

						
							<input type="hidden" id="agent_id" name="agent_id" value="<?php echo $agent_view->id; ?>" />
						<div class="col-md-12">
						<div id='div_err' class="alert alert-danger" style="display:none">
								
							</div>
							<div class="form-group">
								<label class="control-label"></label>
								<div class="mt-radio-list">
									<label class="mt-radio-inline">
                					<input type="radio" id="withdraw_deposit1" class="Paid" name ="withdraw_deposit"  value="1" checked="checked">Withdraw</label>
										
									<label class="mt-radio-inline">
									<input type="radio" id="withdraw_deposit2" class="Paid" name ="withdraw_deposit" value="2">Deposit</label>
								</div>
							</div>
						</div>
						
						<div class="col-md-12">
							<div class="form-group">
								<label class="control-label">Current Balance<span class="required">*</span></label>
								<input type="text" id="balance" class="form-control" readonly value="<?php echo $agent_view->a_wallet_balance; ?>">						
							</div>
						</div>
						<!--/span-->
						
						<div class="col-md-12">
							<div class="form-group">
								<label class="control-label">Amount<span class="required">*</span></label>
								<input type="text" id="amount" class="form-control" name="amount" required>						
							</div>
						</div>
						<!--/span-->
						
						<div class="col-md-12">
							<div class="form-group">
								<label class="control-label">Date<span class="required">*</span></label>
								<input class="form-control form-control  date-picker" data-date-format="dd-mm-yyyy" type="text" id="date" class="form-control" name="date" required>						
							</div>
						</div>
						<!--/span-->
						
						<div class="col-md-12">
							<div class="form-group">
								<label class="control-label">Notes<span class="required"></span></label>
								<input type="text" id="notes" class="form-control" name="notes" >						
							</div>
						</div>
						<!--/span-->
							
									
					</div>

				</div>
				<div class="modal-footer">
					<button type="button" class="btn default" data-dismiss="modal">Close</button>
					<button type="button" class="btn btn-success" onclick="add_wallet_balance()">Submit</button>
				</div>
				<form>
			</div>
        	<!-- /.modal-content -->
		</div>
		<!-- /.modal-dialog -->
	</div>
	<!-- /.modal -->
</div>
<!-- manage wallet -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<script>

$(document).ready(function(){
	
	/*$('#amount').focusout(function(){
		
		var tran_type=$('input[name=withdraw_deposit]:checked').val();
		
		var balance =$('#balance').val();
		var amount= $('#amount').val();
		
		if(tran_type==1)
		{
			if(parseInt(balance)<parseInt(amount))
			{
				$('#div_err').show();
				$('#div_err').empty();
				$('#div_err').append("Balance is low");
				$('#amount').val("");
				$('#amount').focus();
			}else{
				$('#div_err').hide();
				$('#div_err').empty();
			}
		}
		
		//alert('here');
	});*/
});	
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
			url: '<?php echo base_url();?>index.php/Agent_management/agent_status',
			type: 'post',
			data: {id : id},
			success: function()
			{
				 window.location.reload(1);	
			}
		});
	}
function add_wallet_balance()
{

	var tran_type=$('input[name=withdraw_deposit]:checked').val();
		
	var balance =$('#balance').val();
	var amount= $('#amount').val();
	var agent_id =$('#agent_id').val();
	var date= $('#date').val();
	var notes= $('#notes').val();
		
	if(amount!='' && date!='')
	{
		if(tran_type==1 && parseInt(balance)<parseInt(amount))
		{
			$('#div_err').show();
			$('#div_err').empty();
			$('#div_err').append("Balance is low");
			$('#amount').val("");
			$('#amount').focus();
		}else{
			$('#div_err').hide();
			$('#div_err').empty();
			$.ajax({
					url: '<?php echo base_url();?>index.php/Agent_management/add_wallet_balance',
					type: 'post',
					data: {agent_id : agent_id,withdraw_deposit: tran_type, date:date, notes:notes, amount:amount},
					success: function(data)
					{
						 window.location.reload(1);	
					}
			});
		}
	}else{
		$('#div_err').show();
		$('#div_err').empty();
		$('#div_err').append("All fields must required");
	}
	
}
function wallet_transaction(agent_id){
var form = $('<form action="<?php echo base_url(); ?>index.php/Agent_management/wallet_transaction" method="post">' +
				  '<input type="hidden" name="agent_id" value="' + agent_id + '"></input>' + '</form>');
				  $('body').append(form);
				  $(form).submit();
}
</script>
<?php $this->load->view('footer');?>