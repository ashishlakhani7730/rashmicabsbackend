<?php include('header.php'); ?>
             <!-- END HEADER -->
            <div class="container-fluid">
                <div class="page-content">
                    <!-- BEGIN BREADCRUMBS -->
                    <div class="breadcrumbs">
                        <h1>Manage Gallery</h1>
                        
                    </div>
                    <?php $error=$this->session->flashdata('feedback'); ?>
                                      <?php if($feedback= $this->session->flashdata('feedback')):
                                      $feedback_class= $this->session->flashdata('feedback_class') ?>
                                      <div class="row">
                                        <div class="col-lg-6">
                                          <div class="<?php echo $feedback_class ?>">
                                            <?php  echo $feedback ; ?>
                                          </div>
                                        </div>
                                      </div>
                                    <?php endif; ?>
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
											<a href="<?php echo base_url(); ?>index.php/Gallery/add_gallery" class="btn yellow  btn-outline" >Add New
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
									Image
								</th>
								<th>
									Caption
								</th>
								<th>
									 Category
								</th>
                               
								<th>
									 Action
								</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php if(count($gallery_list)): ?>
                                                <?php foreach($gallery_list as $glist): ?>
                                            <tr class="odd gradeX">
                                               
                                                <td>
									RSCG0<?= $glist->id ?>
								</td>
								<td>
									<img src="<?php echo base_url(); ?>uploads/gallery/<?= $glist->g_image ?>" width="60px" height="60px" >
								</td>
								<td>
									<?= $glist->caption ?>
								</td>
								<td>
									<?= $glist->category ?>
								</td>
                              
								
								
                                                <td>
												<form action="<?php echo base_url(); ?>index.php/Gallery/delete_gallery" method="post" >
                                                <button type="submit" value="<?= $glist->id ?>" name="delete_id" class="btn btn-sm red"><i class="fa fa-trash"></i></button>
                                                </form>   
                                                </td>
                                            </tr>
                                    <?php endforeach; ?>
                                    <?php else: ?>
                                        <tr class="odd gradeX">
                                            <td colspan="5"> NO RECORDS FOUND. </td>
                                        </tr>
                                    <?php endif; ?>

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
<?php include('footer.php');  ?>