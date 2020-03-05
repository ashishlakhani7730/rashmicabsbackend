<?php $this->load->view('header');?>
            <!-- END HEADER -->
            <div class="container-fluid">
                <div class="page-content">
                    <!-- BEGIN BREADCRUMBS -->
                    <div class="breadcrumbs">
                        <h1>Manage Slider</h1>
                        
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
                                            
                                            <?php $msg = $this->session->flashdata('success'); 
											if(!empty($msg['success'])){
											?>
											<div class="col-xs-12">
												<div class="alert alert-success">
													<button class="close" data-close="alert"></button>
													<span><?php echo $msg['success']; ?>  </span>
												</div>
											</div>
											<?php }?>
                                            <div class="col-md-12">
											<a data-toggle="modal" href="<?php echo site_url('index.php/Slider_management/AddSlider'); ?>" class="btn green btn-outline" >Add New
                                                        <i class="fa fa-plus"></i></a>
                                                
                                            </div>
                                        </div>
                                    </div>
	
                                   <table class="table table-striped table-bordered table-hover  order-column" id="sample_1">
                                        <thead>
                                            <tr>
                                              
                                             <th> ID# </th>
												<th> Cover Img </th>
												
                                                <th> Actions </th>
                                            </tr>
                                        </thead>
                                        <tbody>
											<?php foreach($slider as $row){ ?>
                                            <tr class="odd gradeX">
                                               
                                                <td><?php echo $row->s_id; ?></td>
                                                <td>
                                                    <?php if(!empty($row->s_cover_image)){ ?>
													  	<img src="<?php echo base_url()."uploads/slider/cover_image/".$row->s_cover_image; ?>" width="60px" height="60px">
													<?php }else{ ?>
														<img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" width="60px" height="60px">
													<?php }?>
                                                </td>
                                               
                                               
												
                                                <td>
												<form method="post">
												<input type="hidden" name="id" value="<?php echo $row->id; ?>" />
												<button class="btn btn-sm blue" type="submit" formaction="<?php echo site_url('index.php/Slider_management/EditSlider'); ?>"><i class="fa fa-edit"></i></button>
												
												<!--<?php //if($row->s_status==1){ ?>	
												<button class="btn btn-sm green" type="submit" formaction="<?php //echo site_url('index.php/Slider_management/StatusSlider'); ?>"><i class="fa fa-ban"></i></button>
												<?php //}else{?>
												<button class="btn btn-sm red" type="submit" formaction="<?php //echo site_url('index.php/Slider_management/StatusSlider'); ?>"><i class="fa fa-ban"></i></button>
												<?php //}?>
												 -->
												<button class="btn btn-sm red" type="submit" formaction="<?php echo site_url('index.php/Slider_management/DeleteSlider'); ?>"><i class="fa fa-trash"></i></button>
                                                </form>  
                                                   
                                                </td>
                                            </tr>
											<?php }?>
                                     
                                            
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
               <?php $this->load->view('footer'); ?>