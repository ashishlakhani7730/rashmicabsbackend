<?php $this->load->view('header');?>
    <div class="container-fluid">
        <div class="page-content">
            <div class="row">
                <div class="col-md-12">
                    <div class="portlet light bordered">                    
                        <div class="portlet-body form">
                            <form method="post" action="<?php echo base_url(); ?>index.php/bookingterms/offerterms_update" class="horizontal-form">
                                <div class="form-body">
                                    <div class="">
                                        <h1>Manage Oneway Offer Terms</h1>
                                    <div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="control-label">Package Terms</label>
												<textarea id="summernote_1" name="packageterms"><?php echo $data->package_terms; ?></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="control-label">Terms & Conditions</label>
												<textarea id="summernote_2" name="termsandcon"><?php echo $data->terms_and_conditions; ?></textarea>
                                               
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="control-label">Privacy Policy</label>
                                                <textarea name="ppolicy" id="summernote_3"><?php echo $data->privacy_policy; ?> </textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="control-label">Cancellation Rules</label>
                                                <textarea name="crules" id="summernote_4"><?php echo $data->cancellation_terms; ?> </textarea>
                                            </div>
                                        </div>         
                                    </div>         
                                </div>
                                <div class="form-actions right">
                                    <button type="submit" class="btn blue">
                                    <i class="fa fa-check"></i>Update</button>
                                </div>
                            </form>         <!-- END FORM-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>          
<?php $this->load->view('footer');?>