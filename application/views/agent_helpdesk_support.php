<?php $this->load->view('header');?>
            <!-- END HEADER -->
            <div class="container-fluid">
                <div class="page-content">
                    <!-- BEGIN BREADCRUMBS -->
                    <div class="breadcrumbs">
                        <h1>HelpDesk Support</h1>
                        
                    </div>
                    <!-- END BREADCRUMBS -->
                    <!-- BEGIN PAGE BASE CONTENT -->
                 <div class="row">
                        <div class="col-md-12">
                          <div class="portlet light bordered">
                                            
                                            <div class="portlet-body form">
                                                <!-- BEGIN FORM-->
<div class="portlet-body" id="chats">
                                    <div class="scroller" style="height: 525px;" data-always-visible="1" data-rail-visible1="1">
                                        <ul class="chats">
											<?php foreach($helpdesk_support as $row){?>
                                            <li class="<?php if(!empty($row->hs_sender_id)){?>in<?php }?><?php if(!empty($row->hs_receiver_id)){?>out<?php }?>">
                                             
                                                <div class="message">
                                                    <span class="arrow"> </span>
                                                    <a href="javascript:;" class="name"> 
													<?php if(!empty($row->hs_sender_id)){?>By Agent<?php }?>
													<?php if(!empty($row->hs_receiver_id)){
													
													$user=$this->db->get_where('user_detail',array('id'=>$row->hs_created_by))->row();
													if(!empty($user)){
														echo $user->u_full_name;
													}
													
													}?> 
													</a>
                                                    <span class="datetime"> at <?php echo date('d/m/Y h:i A',strtotime($row->hs_send_date.' '.$row->hs_send_time)); ?> </span>
                                                    <span class="body"> <?php echo $row->hs_message;?> </span>
                                                </div>
                                            </li>
                                            <?php }?>
                                        </ul>
                                    </div>
                                    <div class="chat-form">
                                        <div class="input-cont">
                                            <input class="form-control" type="text" id="message"  placeholder="Type a message here..." /> </div>
                                        <div class="btn-cont">
                                            <span class="arrow"> </span>
                                            <a  class="btn blue icn-only" onclick="insert_agent_helpdesk_support()">
                                                <i class="fa fa-check icon-white"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>                                                <!-- END FORM-->
                                            </div>
                        </div>
                    </div>
                    </div>
                    
                 
            <!--end-->
                    </div>
                    </div>
                    </div>
                        
                    </div>
					
   
 <script>	
function insert_agent_helpdesk_support()
{
	var message = $('#message').val();
	var agent_id= <?php echo $agent_id;?>;
	if(message!=''){
		 $.ajax({
			url: '<?php echo base_url();?>index.php/Agent_management/insert_agent_helpdesk_support',
			type: 'post',
			data: {agent_id : agent_id, message : message},
			success: function()
			{
				 window.location.reload(1);	
			}
		});
	}else{
		alert('Please Enter message');
	}
}
</script>                   
 <?php $this->load->view('footer');?>  