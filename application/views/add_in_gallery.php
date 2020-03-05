<?php include('header.php'); ?>
            <!-- END HEADER -->
            <div class="container-fluid">
                <div class="page-content">
                    <!-- BEGIN BREADCRUMBS -->
                    <div class="breadcrumbs">
                        <h1>Gallery</h1>
                        
                    </div>
                    <!-- END BREADCRUMBS -->
                    <!-- BEGIN PAGE BASE CONTENT -->
                 <div class="row">
                        <div class="col-md-12">
                          <div class="portlet light bordered">
                                            
                                            <div class="portlet-body form">
                                                <!-- BEGIN FORM-->
                                                <?php echo form_open_multipart('index.php/Gallery/add_gallery', ['class'=> 'horizontal-form']); ?>
                                                
                                                    <div class="form-body">
                                                      
                                                        <div class="row">
                                                        <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label class="control-label">Select Category</label><span class="required">*</span>
                                                                      <select id="single" name="category" class="form-control select2">
                                            <option></option>
                                            
                                                <option value="RC MINI">RC MINI</option>
<option value="RC SEDAN">RC SEDAN</option>
<option value="RC SUV">RC SUV</option>
<option value="RC DELUX">RC DELUX</option>
<option value="RC SUV PREMIUM">RC SUV PREMIUM</option>
<option value="NEWS & UPDATES">NEWS & UPDATES</option>
                                            </optgroup>
                                        </select>
                                                                    
                                                                </div>
                                                            </div>
                                                            <!--/span-->
                                                            
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label class="control-label">Caption</label><span class="required">*</span>
                                                                      <input type="text" name="caption" id="lastName" class="form-control" > 
                                                                    
                                                                </div>
                                                            </div>
                                                            <!--/span-->
                                                            	
															  <div class="col-md-4">
                                                                <div class="form-group">
                                                              
                                                    <div class="fileinput fileinput-new" data-provides="fileinput">
                                                        <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
                                                            <img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" alt="" /> </div>
                                                        <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"> </div>
                                                        <div>
                                                            <span class="btn default btn-file">
                                                                <span class="fileinput-new"> Gallery </span>
                                                                <span class="fileinput-exists"> Change </span>
                                                                <?php echo form_upload(['name'=>'g_image']); ?>  </span>
                                                            <a href="javascript:;" class="btn red fileinput-exists" data-dismiss="fileinput"> Remove </a>
                                                        </div>
                                                 
                                                     
                                                </div>
                                                                    
                                                                </div>
                                                            </div>
                                                            <!--/span-->
                                                            </div>
                                                             
                                                            
                                                            
                                                             
															
															
														
                                        		
                                                                   
                                                        <!--/row-->
                                                     
                                                    </div>
                                                    <div class="form-actions right">
                                                     
                                                        <button type="submit" class="btn yellow">
                                                            <i class="fa fa-check"></i>Submit</button>
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
<?php include('footer.php'); ?>
