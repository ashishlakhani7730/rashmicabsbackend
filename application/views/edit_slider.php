												
												
<?php $this->load->view('header');?>
            <!-- END HEADER -->
            <div class="container-fluid">
                <div class="page-content">
                    <!-- BEGIN BREADCRUMBS -->
                    <div class="breadcrumbs">
                        <h1>Edit Slider</h1>
                        
                    </div>
                    <!-- END BREADCRUMBS -->
                    <!-- BEGIN PAGE BASE CONTENT -->
                 	<div class="row">
                        <div class="col-md-12">
                          	<div class="portlet light bordered">
						  		<div class="note note-danger" id="validation_message" style="display:none;"> <p>  </p> </div>
                                            
                                	<div class="portlet-body form">
                                        <!-- BEGIN FORM-->
                                       <form method="post" action="<?php echo site_url('index.php/Slider_management/update_slider'); ?>" class="horizontal-form" enctype="multipart/form-data">
                                                    <div class="form-body">
                                                      
                                                        <div class="row">
														<input type="hidden" id="id" name="id" value="<?php echo $slider->id; ?>" />
                                                        
													 
                                                               <div class="col-md-6">
                                                                   <div class="form-group">
                                                              
                                                    <div class="fileinput fileinput-new" data-provides="fileinput">
                                                        <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
                                                            <?php if(!empty($slider->s_cover_image)){ ?>
													  	<img src="<?php echo base_url()."uploads/slider/cover_image/".$slider->s_cover_image; ?>"  alt="">
													<?php }else{ ?>
														<img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" alt="">
													<?php }?> </div>
                                                        <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"> </div>
                                                        <div>
                                                            <span class="btn default btn-file">
                                                                <span class="fileinput-new"> Select Cover Image</span>
                                                                <span class="fileinput-exists"> Change </span>
                                                                <input type="file" name="s_cover_image" <?php if(empty($slider->s_cover_image)){ ?>required<?php }?>> </span>
                                                            <a href="javascript:;" class="btn red fileinput-exists" data-dismiss="fileinput"> Remove </a>
                                                        </div>
                                                  <span>Note: size must be 120px X 120px. png or jpeg format</span>
                                                 
                                                </div>
                                                                    
                                                                </div>
                                                            </div>
                                                            <!--/span-->
															 
                                                            
                                                         
                                                        </div>
                                                      
                                                     
                                                    </div>
                                                    <div class="form-actions right">
                                                     
                                                        <button type="submit" class="btn yellow">
                                                            <i class="fa fa-check"></i>Edit Slider</button>
                                                    </div>
                                                </form>

                                                <!-- END FORM-->
                                            </div>
                        </div>
                    </div>
                    </div>
                    
                 
            <!--end-->
                    </div>
                    </div>
                    </div>
                        
                    </div>
					
             
                    
 <?php $this->load->view('footer');?>  