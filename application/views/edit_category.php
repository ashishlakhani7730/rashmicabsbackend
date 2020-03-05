<?php $this->load->view('header'); ?>
            <!-- END HEADER -->
            <div class="container-fluid">
                <div class="page-content">
                    <!-- BEGIN BREADCRUMBS -->
                    <div class="breadcrumbs">
                        <h1>Edit Category</h1>
                        
                    </div>
                    <!-- END BREADCRUMBS -->
                    <!-- BEGIN PAGE BASE CONTENT -->
                 <div class="row">
                        <div class="col-md-12">
                          <div class="portlet light bordered">
                                            
                                            <div class="portlet-body form">
                                                <!-- BEGIN FORM-->
                                                <form action="<?php echo base_url();?>index.php/Vehicle_category_management/update_category" method="post" class="horizontal-form" enctype="multipart/form-data">
                                                    <div class="form-body">
                                                      
                                                        <div class="row">
                                                          <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label class="control-label">Category Name</label><span class="required">*</span>
                                                                      <input type="text" name="cat_n" id="lastName" class="form-control" value="<?php echo set_value('cat_n',$edit_category->category_name);?>" required>
                                                                    
                                                                </div>
                                                            </div>
                                                            <!--/span--> 
															
															<div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label class="control-label">Oneway Offer Km Rate</label><span class="required">*</span>
                                                                      <input type="text" name="cat_oo_km_rate" id="cat_oo_km_rate" class="form-control" value="<?php echo set_value('cat_n',$edit_category->category_oneway_offer_km_rate);?>" required>
                                                                    
                                                                </div>
                                                            </div>
															
															<div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label class="control-label">Oneway Offer Hr Rate</label><span class="required">*</span>
                                                                      <input type="text" name="cat_oo_hr_rate" id="cat_oo_hr_rate" class="form-control" value="<?php echo set_value('cat_n',$edit_category->category_oneway_offer_hr_rate);?>" required>
                                                                    
                                                                </div>
                                                            </div>																														<div class="col-md-4">                                                                <div class="form-group">                                                                    <label class="control-label">Description</label><span class="required"></span>                                                                      <input type="text" name="description" id="description" value="<?php echo set_value('cat_n',$edit_category->description);?>" class="form-control">                                                                                                                                    </div>                                                            </div>
															
															<div class="col-md-4">
                                                                <div class="form-group">
                                                              
                                                    <div class="fileinput fileinput-new" data-provides="fileinput">
                                                        <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
                                                            <img src="<?php if($edit_category->c_profile_pic != ""){ echo base_url()."/uploads/category/profile_pic/".$edit_category->c_profile_pic; } else {  echo "http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image"; } ?>" alt="" /> </div>
                                                        <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"> </div>
                                                        <div>
                                                            <span class="btn default btn-file">
                                                                <span class="fileinput-new"> Profile Picture </span>
                                                                <span class="fileinput-exists"> Change </span>
                                                                <input type="file" name="c_profile_pic" > </span>
                                                            <a href="javascript:;" class="btn red fileinput-exists" data-dismiss="fileinput"> Remove </a>
                                                        </div>
                                                 
                                                 
                                                </div>
                                                                    
                                                                </div>
                                                            </div>
															                                                        
                                                            </div>
                                                                   
                                                        <!--/row-->
                                                     
                                                    </div>
                                                    <div class="form-actions right">
                                                     
                                                        <button type="submit" name="category_update_id" value="<?php echo $edit_category->id;?>" class="btn yellow">
                                                            <i class="fa fa-check"></i>Update Category</button>
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
                    
                    
                    
                    
                    
                    
                    
                    <!-- END PAGE BASE CONTENT -->
                </div>
                <!-- BEGIN FOOTER -->
 <?php $this->load->view('footer');?>