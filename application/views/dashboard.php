
             <div class="container-fluid">
                <div class="page-content"> 
                    <!-- BEGIN BREADCRUMBS -->
                    <div class="breadcrumbs">
                        <h1>Welcome TO Rashmi Cabs</h1> 
                        <div class="actions">
                                        <div class="btn-group btn-group-devided" data-toggle="buttons">
                                            <label class="btn green btn-outline btn-circle btn-sm active" id="lbltoday">
                                            <input type="radio" name="options" value="<?php echo date("Y-m-d"); ?>" class="toggle" id="today">Today </label>
                                            <label class="btn  green btn-outline btn-circle btn-sm" id="lblystr">
                                            <input type="radio" name="options" class="toggle" value="<?php echo date('Y-m-d', strtotime("-1 days")); ?>" id="yesterday" />Yesterday</label>
                                            <label class="btn  green btn-outline btn-circle btn-sm" id="lbl7days">
                                            <input type="radio" name="options" value="<?php echo date('Y-m-d', strtotime("-7 days")); ?>" class="toggle" id="last7days ">Last 7 Days</label>
                                            <label id="lbl30days" class="btn  green btn-outline btn-circle btn-sm">
                                            <input type="radio" name="options" value="<?php echo date('Y-m-d', strtotime("-30 days")); ?>" class="toggle" id="last30days">Last 30 Days</label>
                                            <label id="lblnext7days" class="btn  green btn-outline btn-circle btn-sm">
                                            <input type="radio" name="options" value="<?php echo date('Y-m-d', strtotime("+7 days")); ?>" class="toggle" id="next7days">Next 7 Days</label>
                                        </div>
                                    </div>
                    </div>
                    <!-- END BREADCRUMBS -->
                    <!-- BEGIN PAGE BASE CONTENT -->
                    <!-- BEGIN DASHBOARD STATS 1-->
                    <div class="row" id="viewdata">
                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                            <a class="dashboard-stat dashboard-stat-v2 blue" href="#">
                                <div class="visual">
                                    <i class="fa fa-comments"></i>
                                </div>
                                <div class="details">
                                    <div class="number">
                                        <span data-counter="counterup" data-value="<?= $tot_booking_list ?>"></span>
                                    </div>
                                    <div class="desc">Total Bookings </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                            <a class="dashboard-stat dashboard-stat-v2 red" href="#">
                                <div class="visual">
                                    <i class="fa fa-bar-chart-o"></i>
                                </div>
                                <div class="details">
                                    <div class="number">
                                        <span data-counter="counterup" data-value="<?= $tot_pending_booking ?>"></span>
                                    </div>
                                    <div class="desc">Pending Bookings</div>
                                </div>
                            </a>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                            <a class="dashboard-stat dashboard-stat-v2 green" href="#">
                                <div class="visual">
                                    <i class="fa fa-shopping-cart"></i>
                                </div>
                                <div class="details">
                                   <div class="number">
                                        <span data-counter="counterup" data-value="<?= $tot_confirm_booking ?>"></span>
                                    </div>
                                    <div class="desc">Complate Bookings</div>
                                </div>
                            </a>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                            <a class="dashboard-stat dashboard-stat-v2 purple" href="#">
                                <div class="visual">
                                    <i class="fa fa-globe"></i>
                                </div>
                                <div class="details">
                                   <div class="number">
                                        <span data-counter="counterup" data-value="<?= $oneway_request ?>"></span>
                                    </div>
                                    <div class="desc">Oneway Request</div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <!-- END DASHBOARD STATS 1-->

                  
                    <div class="row">
                        <div class="col-lg-6 col-xs-12 col-sm-12">
                            <div class="portlet light bordered">
                                <div class="portlet-title tabbable-line">
                                    <div class="caption">
                                        <i class="icon-bubbles font-dark hide"></i>
                                        <span class="caption-subject font-dark bold uppercase">Oneway Offer</span>
                                    </div>
                                    <!-- <div class="actions">
                                        <div class="btn-group">
                                            <a class="btn blue btn-outline btn-circle btn-sm" href="javascript:;" data-toggle="dropdown" data-hover="dropdown" data-close-others="true" id="onewaytoday"> Today
                                                <i class="fa fa-angle-down"></i>
                                            </a>
                                            <ul class="dropdown-menu pull-right">
                                                <li>
                                                    <a href="javascript:;" id="onewaytomo"> Tomorrow</a>
                                                </li>
                                                
                                                <li>
                                                    <a href="javascript:;" id="onewaynext7" >Next 7 Days</a>
                                                </li>
                                               
                                            </ul>
                                        </div>
                                    </div> -->
                                    <ul class="nav nav-tabs">
                                        <li class="active">
                                            <a href="#cst_req" data-toggle="tab"> Customer Requested</a>
                                        </li>
                                        <li>
                                            <a href="#agent_req" data-toggle="tab"> Agent Posted </a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="portlet-body">
                                    <div class="tab-content">
                                        <div class="tab-pane active" id="cst_req">
                                             <div class="scroller" style="height: 500px;" data-always-visible="1" data-rail-visible="0" id="custdiv">
                                            <?php if(count($customer_requested)): ?>
                                                <?php foreach($customer_requested as $request): ?>
                                            <!-- BEGIN: LIST -->
                                            <div class="mt-comments">
                                                <div class="mt-comment">
                                                    <a href="<?php echo base_url();?>index.php/Oneway_offer_management/booking_request/URV/<?php echo $request->id; ?>">
                                                    <div class="mt-comment-body">
                                                        <div class="mt-comment-info">
                                                            <span class="mt-comment-author"><?= $request->b_id ?> - <?= $request->b_p_name ?></span>
                                                            <span class="mt-comment-date"><?= date("d-m-y h:i", strtotime($request->b_from_date)) ?></span>
                                                        </div>
                                                        <div class="mt-comment-text"> Offer ID: <?= $request->b_package_id  ?> </div>
                                                         <div class="mt-comment-text"><?= $request->fromcity ?> - <?= $request->tocity ?> </div>  
                                                    </div></a>
                                                </div>
                                                </div>
                                            <!-- END: LIST -->
                                            <?php endforeach; ?>
                                            <?php else: ?>
                                                <!-- BEGIN: LIST -->
                                            <div class="mt-comments">
                                                <div class="mt-comment">
                                                    NO RECORDS FOUND.
                                                </div>
                                                </div>
                                            <!-- END: LIST -->
                                            <?php endif; ?>
                                            <!-- BEGIN: LIST -->
                                            
                                                </div>
                                            <!-- END: LIST --> 
                                        </div>
                                        <div class="tab-pane" id="agent_req">
                                            <div class="scroller" style="height: 500px;" data-always-visible="1" data-rail-visible="0" id="agentdiv">
                                                
                                                <?php if(count($agent_posts)): ?>
                                                    <?php foreach($agent_posts as $posts): ?>

                                            <!-- BEGIN: LIST -->
                                            <div class="mt-comments">
                                                <div class="mt-comment">
                                                    <a href="<?php echo base_url()?>index.php/Oneway_offer_management">
                                                    <div class="mt-comment-body">
                                                        <div class="mt-comment-info">
                                                            <span class="mt-comment-author"><?= $posts->agentname ?></span>
                                                            <span class="mt-comment-date"><?= date("d-m-Y H:i:s", strtotime($posts->oo_created_date_time)) ?></span>
                                                        </div>
                                                        <div class="mt-comment-text"> Offer ID: <?= $posts->oo_id ?> </div>
                                                        <div class="mt-comment-text">
														<?php echo $this->db->get_where('city_detail',array('id'=>$posts->oo_first_city))->row()->c_name." - ".$this->db->get_where('city_detail',array('id'=>$posts->oo_second_city))->row()->c_name; if(!empty($posts->oo_third_city)){echo " - ".$this->db->get_where('city_detail',array('id'=>$posts->oo_third_city))->row()->c_name;} ?>                                   
                                                        </div> 
                                                        <div class="mt-comment-text"> Expiry: <?= date("d-m-Y", strtotime($posts->oo_valid_date)) ?> <?= $posts->oo_valid_to_time ?> </div>
                                                      <?php if($posts->b_status != 1) { if($posts->oo_status != 1) { ?>
                                                        <span class="label label-sm label-danger"> INACTIVE </span>
                                                         <?php } else if($posts->oo_status == 1) { ?>
                                                        <span class="label label-sm label-info">ACTIVE  </span>
                                                        <?php } } else { ?>
                                                        <span class="label label-sm label-success"> BOOKED </span>
                                                        <?php } ?>
                                                       
                                                    </div></a>
                                                </div>
                                                
                                                </div>
                                            <!-- END:LIST -->
                                        
                                        <?php endforeach; ?>
                                        <?php else: ?>
                                            <!-- BEGIN: LIST -->
                                            <div class="mt-comments">
                                                <div class="mt-comment">
                                                    NO RECORDS FOUND.
                                                    </div>
                                                
                                                </div>
                                            <!-- END:LIST -->
                                        <?php endif; ?>

                                           <!-- BEGIN: LIST -->
                                            
                                            <!-- END:LIST -->  
                                            
                                            </div>    
                                           
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-xs-12 col-sm-12">
                            <div class="portlet light bordered">

                                <div class="portlet-title tabbable-line">
                                    <div class="caption">
                                        <i class=" icon-social-twitter font-dark hide"></i>
                                        <span class="caption-subject font-dark bold uppercase">New Profile (New 20)</span>
                                    </div>
                                    <ul class="nav nav-tabs">
                                        <li class="active">
                                            <a href="#new_cst" data-toggle="tab"> Passenger </a>
                                        </li>
                                        <li>
                                            <a href="#new_agent" data-toggle="tab"> Agent </a>
                                        </li>
                                        <li>
                                            <a href="#new_drv" data-toggle="tab"> Driver </a>
                                        </li>
                                         <li>
                                            <a href="#new_vehicle" data-toggle="tab"> Vehicle </a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="portlet-body">
                                    <div class="tab-content">
                                        <div class="tab-pane active" id="new_cst">
                                             <div class="scroller" style="height: 500px;" data-always-visible="1" data-rail-visible="0">
                                                <?php if(count($passenger_list)): ?>
                                                    <?php foreach($passenger_list as $passanger): ?>
                                            <!-- BEGIN: Actions -->
                                            <div class="mt-actions">
                                                <div class="mt-action">
                                                    
                                                    <div class="mt-action-body">
                                                        <div class="mt-action-row">
                                                            <div class="mt-action-info ">
                                                               
                                                                <div class="mt-action-details ">
                                                                    <span class="mt-action-author"><?= $passanger->p_full_name
                                                                     ?></span>
                                                                    <p class="mt-action-desc">Number: <?= $passanger->p_contact ?></p>
                                                                </div>
                                                            </div>
                                                            <div class="mt-action-datetime ">
                                                                <span class="mt-action-date"><?= date("d-m-Y", strtotime($passanger->p_joining_date_time)) ?></span>
                                                                <span class="mt-action-dot bg-green"></span>
                                                                <span class="mt=action-time"><?= date("H:i:s", strtotime($passanger->p_joining_date_time)) ?></span>
                                                            </div>
                                                            <div class="mt-action-buttons ">
                                                                <div class="btn-group btn-group-circle">

                                                                    <form action="<?php echo base_url().'index.php/Passenger_management/view_passenger'?>" method="post">

                                                                    <button type="submit" value="<?php echo $passanger->id;  ?>" name="btn_p_view" class="btn btn-outline green btn-sm">View</button>

                                                                </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                </div>
                                            <!-- END: Actions -->
                                            <?php endforeach; ?>
                                            <?php else: ?>
                                                      <!-- BEGIN: LIST -->
                                            <div class="mt-comments">
                                                <div class="mt-comment">
                                                    NO RECORDS FOUND.
                                                </div>
                                                </div>
                                            <!-- END: LIST -->
                                            <?php endif; ?> 
                                        </div>
                                        </div>
                                        <?php // div end passenger ?>
                                        <div class="tab-pane" id="new_agent">
                                              <div class="scroller" style="height: 500px;" data-always-visible="1" data-rail-visible="0">
                                             <?php if(count($agent_list)): ?>
                                                <?php foreach($agent_list as $agent): ?>
                                             <!-- BEGIN: Actions -->
                                            <div class="mt-actions">
                                                <div class="mt-action">
                                                    <div class="mt-action-body">
                                                        <div class="mt-action-row">
                                                            <div class="mt-action-info ">
                                                               
                                                                <div class="mt-action-details ">
                                                                    <span class="mt-action-author"><?= $agent->a_full_name ?></span>
                                                                    <p class="mt-action-desc">Number: <?= $agent->a_contact_no1 ?></p>
                                                                </div>
                                                            </div>
                                                            <div class="mt-action-datetime ">
                                                                <span class="mt-action-date"><?= date("d-m-Y", strtotime($agent->a_joining_date_time)) ?></span>
                                                                <span class="mt-action-dot bg-green"></span>
                                                                <span class="mt=action-time"><?= date("H:i:s", strtotime($agent->a_joining_date_time)) ?></span>
                                                            </div>
                                                            <div class="mt-action-buttons ">
                                                                <div class="btn-group btn-group-circle">
                                                                    <form action="<?php echo base_url().'index.php/Agent_management/view_agent'?>" method="post">

                                                                    <button type="submit" value="<?php echo $agent->id; ?>"  name="agent_view_id" class="btn btn-outline green btn-sm">View</button>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                </div>
                                            <!-- END: Actions -->
                                        <?php endforeach; ?>
                                        <?php else: ?>
                                                <!-- BEGIN: LIST -->
                                            <div class="mt-comments">
                                                <div class="mt-comment">
                                                    NO RECORDS FOUND.
                                                </div>
                                                </div>
                                            <!-- END: LIST -->
                                        <?php endif; ?>
                                      </div>  
                                    </div>
                                    <div class="tab-pane" id="new_drv">
                                              <div class="scroller" style="height: 500px;" data-always-visible="1" data-rail-visible="0">
                                             <?php if(count($driver_detail)): ?>
                                                <?php foreach($driver_detail as $driver): ?>
                                             <!-- BEGIN: Actions -->
                                            <div class="mt-actions">
                                                <div class="mt-action">
                                                    
                                                    <div class="mt-action-body">
                                                        <div class="mt-action-row">
                                                            <div class="mt-action-info ">
                                                               
                                                                <div class="mt-action-details ">
                                                                    <span class="mt-action-author"><?= $driver->d_full_name ?></span>
                                                                    <p class="mt-action-desc">Number: <?= $driver->d_contact_no1 ?></p>
                                                                </div>
                                                            </div>
                                                            <div class="mt-action-datetime ">
                                                                <span class="mt-action-date"><?= date("d-m-Y", strtotime($driver->d_reg_date)) ?></span>
                                                                <span class="mt-action-dot bg-green"></span>
                                                                <span class="mt=action-time"><?= date("H:i:s", strtotime($driver->d_reg_time)) ?></span>
                                                            </div>
                                                            <div class="mt-action-buttons ">
                                                                <div class="btn-group btn-group-circle">
                                                                    <form action="<?php echo base_url().'index.php/Agent_driver_management/view_agent_driver'?>" method="post"> 

                                                                    <button type="submit" value="<?php echo $driver->id; ?>"  name="agent_driver_id" class="btn btn-outline green btn-sm">View</button>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                </div>
                                            <!-- END: Actions -->
                                        <?php endforeach; ?>
                                        <?php else: ?>
                                              <!-- BEGIN: LIST -->
                                            <div class="mt-comments">
                                                <div class="mt-comment">
                                                    NO RECORDS FOUND.
                                                </div>
                                                </div>
                                            <!-- END: LIST -->
                                        <?php endif; ?>
                                      </div>  
                                    </div>
                                    <div class="tab-pane" id="new_vehicle">
                                              <div class="scroller" style="height: 500px;" data-always-visible="1" data-rail-visible="0">
                                             <?php if(count($vehicle_list)): ?>
                                                <?php foreach($vehicle_list as $vehicle): ?>
                                             <!-- BEGIN: Actions -->
                                            <div class="mt-actions">
                                                <div class="mt-action">
                                                    
                                                    <div class="mt-action-body">
                                                        <div class="mt-action-row">
                                                            <div class="mt-action-info ">
                                                               
                                                                <div class="mt-action-details ">
                                                                    <span class="mt-action-author"><?= $vehicle->category_name ?>- <?= $vehicle->v_name ?></span>
                                                                    <p class="mt-action-desc">Agent: <?= $vehicle->a_full_name ?></p>
                                                                    <p class="mt-action-desc">Reg: <?= $vehicle->v_register_no ?></p>
                                                                </div>
                                                            </div>
                                                            <div class="mt-action-datetime ">
                                                                <span class="mt-action-date"><?= date("d-m-Y", strtotime($vehicle->v_reg_date)) ?></span>
                                                                <span class="mt-action-dot bg-green"></span>
                                                                <span class="mt=action-time"><?= date("H:i:s", strtotime($vehicle->v_reg_time)) ?></span>
                                                            </div>
                                                            <div class="mt-action-buttons ">
                                                                <div class="btn-group btn-group-circle">
                                                                    <form action="<?php echo base_url().'index.php/Agent_vehicle_management/view_agent_vehicle'?>" method="post">

                                                                    <button type="submit"
                                                                    value="<?php echo $vehicle->id;?>" name="agent_vehicle_id" class="btn btn-outline green btn-sm">View</button>

                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                </div>
                                            <!-- END: Actions -->
                                        <?php endforeach; ?>
                                        <?php else: ?>
                                                <!-- BEGIN: LIST -->
                                            <div class="mt-comments">
                                                <div class="mt-comment">
                                                    NO RECORDS FOUND.
                                                </div>
                                                </div>
                                            <!-- END: LIST -->
                                        <?php endif; ?>
                                           
                                           
                                          </div>  
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                     <div class="clearfix"></div>

                     <div class="row">
                        <div class="col-lg-6 col-xs-12 col-sm-12">
                            <div class="portlet light bordered">
                                <div class="portlet-title tabbable-line">
                                    <div class="caption">
                                        <i class="icon-bubbles font-dark hide"></i>
                                        <span class="caption-subject font-dark bold uppercase">Booking Enquiry</span>
                                    </div>
                                    <div class="actions">
                                        <!-- <div class="btn-group">
                                            <a class="btn blue btn-outline btn-circle btn-sm" href="javascript:;" data-toggle="dropdown" data-hover="dropdown" data-close-others="true" id="booktoday" > Today
                                                <i class="fa fa-angle-down"></i>
                                            </a>
                                            <ul class="dropdown-menu pull-right">
                                                <li>
                                                    <a href="javascript:;" id="booktom"> Tomorrow</a>
                                                </li>
                                                
                                                <li>
                                                    <a href="javascript:;" id="booknext7" >Next 7 Days</a>
                                                </li>
                                               
                                            </ul>
                                        </div> -->
                                    </div>
                                   
                                </div>
                                <div class="portlet-body">
                                    <div class="scroller" style="height: 500px;" data-always-visible="1" data-rail-visible="0" id="bookingdiv" >
                                          <?php if(count($booking_inquiry)): ?>
                                            <?php foreach($booking_inquiry as $blist): ?>
                                         <!-- BEGIN: LIST -->
                                            <div class="mt-comments">
                                                <div class="mt-comment">
                                                  
                                                    <div class="mt-comment-body">
                                                        <form action="<?php echo base_url().'index.php/BookingInquiry_management/edit_booking_enquiry'?>" method="post">
                                                        <div class="mt-comment-info">
                                                            <span class="mt-comment-author"><?= $blist->bi_name ?></span>
                                                            <span class="mt-comment-date"><?= date("d-m-Y", strtotime($blist->bi_plan_date)) ?>, <?= $blist->bi_plan_date ?></span>
                                                        </div>
                                                        <div class="mt-comment-text"> ID:<?= $blist->bi_id ?> </div>
                                                        <div class="mt-comment-text"> Date: <?= date("d-m-Y", strtotime($blist->bi_plan_date)) ?> </div>
                                                         <div class="mt-comment-text"> Contact: <?= $blist->bi_mobile ?></div>
                                                        <div class="mt-comment-text"> Route: <?= $blist->bi_from_city ?> - <?= $blist->bi_to_city ?> </div>
                                                        
                                                        <button type="submit" value="<?php echo $blist->id; ?>" name="id" class="btn btn-outline green btn-sm">View</button>

                                                    </div>
                                                </div>
                                                </div>
                                                <!-- END: LIST -->
                                                <?php endforeach; ?>
                                                <?php else: ?>
                                                <!-- BEGIN: LIST -->
                                            <div class="mt-comments">
                                                <div class="mt-comment">
                                                    NO RECORDS FOUND.
                                                </div>
                                                </div>
                                            <!-- END: LIST -->
                                                <?php endif; ?>
                                        
                                           
                                        </div>
                                
                                   
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-xs-12 col-sm-12">
                            <div class="portlet light bordered">

                                <div class="portlet-title tabbable-line">
                                    <div class="caption">
                                        <i class=" icon-social-twitter font-dark hide"></i>
                                        <span class="caption-subject font-dark bold uppercase">Unpaid Invoices</span>
                                    </div>
                                    <div class="actions">
                                        <!-- <div class="btn-group">
                                            <a class="btn blue btn-outline btn-circle btn-sm" href="javascript:;" data-toggle="dropdown" data-hover="dropdown" data-close-others="true" id="uptoday"> Today
                                                <i class="fa fa-angle-down"></i>
                                            </a>
                                            <ul class="dropdown-menu pull-right">
                                                <li>
                                                    <a href="javascript:;" id="uptommorrow"> Tomorrow</a>
                                                </li>
                                                
                                                <li>
                                                    <a href="javascript:;" id="upnext7">Next 7 Days</a>
                                                </li>
                                               
                                            </ul>
                                        </div> -->
                                    </div>
                                </div>
                                <div class="portlet-body">
                                    <div class="tab-content">
                                        <div class="tab-pane active" id="new_cst">
                                             <div class="scroller" style="height: 500px;" data-always-visible="1" data-rail-visible="0" id="upinvoicediv">
                                                <?php if(count($unpaid_invoices)): ?>
                                                    <?php foreach($unpaid_invoices as $invoice): ?>
                                            <!-- BEGIN: Actions -->
                                            <div class="mt-actions">
                                                <div class="mt-action">
                                                    
                                                    <div class="mt-action-body">
                                                        <div class="mt-action-row">
                                                            <div class="mt-action-info ">
                                                               
                                                                <div class="mt-action-details ">
                                                                    <span class="mt-action-author"><?= $invoice->b_p_name ?></span>
                                                                    <p class="mt-action-desc">ID: <?= $invoice->b_id ?></p>
                                                                    <p class="mt-action-desc">Amount: Rs. <?= $invoice->balance ?></p>
                                                                </div>
                                                            </div>
                                                            <div class="mt-action-datetime ">
                                                                <span class="mt-action-date"><?= date("d-m-Y", strtotime($invoice->b_booking_date_time)) ?></span>
                                                               
                                                            </div>
                                                            <div class="mt-action-buttons ">
                                                                <div class="btn-group btn-group">
                                                                    <form action="<?php echo base_url(); ?>index.php/Invoice_view" method="post">

                                                                    <button type="submit" name="ticket_id" value="<?php echo $invoice->b_invoice_id; ?>" class="btn btn-outline green btn-sm">View</button> 

                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                </div>
                                            <!-- END: Actions -->
                                    
                                    <?php endforeach; ?>
                                    <?php else: ?>
                                            <!-- BEGIN: Actions -->
                                            <div class="mt-actions">
                                                <div class="mt-action">
                                                    
                                                    <div class="mt-action-body">
                                                        <div class="mt-action-row">
                                                            NO RECORDS FOUND. 
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                </div>
                                            <!-- END: Actions -->
                                    <?php endif; ?>
                                           
                                           
                                          </div>  
                                    </div>

                                    
                            </div>
                        </div>
                    </div>
                </div>
                 <!-- END PAGE BASE CONTENT -->
                </div>
                      <div class="clearfix"></div>


                    <div class="row">
                        <div class="col-lg-6 col-xs-12 col-sm-12">
                            <div class="portlet light bordered">
                                <div class="portlet-title tabbable-line">
                                    <div class="caption">
                                        <i class="icon-bubbles font-dark hide"></i>
                                        <span class="caption-subject font-dark bold uppercase">Complaints</span>
                                    </div>
                                    <div class="actions">
                                        <!-- <div class="btn-group">
                                            <a class="btn blue btn-outline btn-circle btn-sm" href="javascript:;" data-toggle="dropdown" data-hover="dropdown" data-close-others="true" id="comtoday"> Today
                                                <i class="fa fa-angle-down"></i>
                                            </a>
                                            <ul class="dropdown-menu pull-right">
                                                <li>
                                                    <a href="javascript:;" id="comyesterday"> Yesterday</a>
                                                </li>
                                                
                                                <li>
                                                    <a href="javascript:;" id="comlast7">Last 7 Days</a>
                                                </li>
                                               
                                            </ul>
                                        </div> -->
                                    </div>
                                   
                                </div>
                                <div class="portlet-body">
                                    <div class="scroller" style="height: 500px;" data-always-visible="1" data-rail-visible="0" id="complaintsdiv">
                                        <?php if(count($complaints)): ?>
                                            <?php foreach($complaints as $compl): ?>
                                         <!-- BEGIN: LIST -->
                                            <div class="mt-comments">
                                                <div class="mt-comment">
    
                                                    <div class="mt-comment-body">

                                                        <form action="<?php echo base_url(); ?>index.php/Local_view" method="post">
                                                        <div class="mt-comment-info">
                                                            <span class="mt-comment-author"><?= $compl->b_p_name ?></span>
                                                            <span class="mt-comment-date"><?= date("d-m-Y H:i:s", strtotime($compl->b_booking_date_time)) ?></span>
                                                        </div>
                                                        <div class="mt-comment-text"> ID: <?= $compl->b_id ?></div>
                                                        <div class="mt-comment-text"> Trip Date : <?= date("d/m/Y", strtotime($compl->b_from_date)) ?> </div>
                                                         <div class="mt-comment-text"> Agent : <?= $compl->a_full_name ?> </div>
                                                         <?php if($compl->b_complain_status == 0): ?>
                                                          <span class="label label-sm label-danger ">Unread
                                                                </span>
                                                                <?php else: ?>
                                                                    <span class="label label-sm label-success ">Read 
                                                                </span>
                                                            <?php endif; ?>
                                                            
                                                            <button type="submit" value="<?= $compl->id ?>" name="local_view_id" class="btn btn-outline green btn-sm">View</button>

                                                        </form>

                                                    </div>
                                                </div>
                                                </div>
                                            <!-- END: LIST -->
                                        <?php endforeach; ?>
                                        <?php else: ?>
                                            <!-- BEGIN: LIST -->
                                            <div class="mt-comments">
                                                <div class="mt-comment">
                                                   NO RECORDS FOUND.
                                                </div>
                                                </div>
                                            <!-- END: LIST -->
                                           <?php endif; ?>
                                        </div>
                                        
                                
                                   
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-xs-12 col-sm-12">
                             <div class="portlet light bordered">
                                <div class="portlet-title tabbable-line">
                                    <div class="caption">
                                        <i class="icon-bubbles font-dark hide"></i>
                                        <span class="caption-subject font-dark bold uppercase">Helpdesk Support</span>
                                    </div>
                                    <div class="actions">
                                        <!-- <div class="btn-group">
                                            <a class="btn blue btn-outline btn-circle btn-sm" href="javascript:;" data-toggle="dropdown" data-hover="dropdown" data-close-others="true" id="hstoday"> Today
                                                <i class="fa fa-angle-down"></i>
                                            </a>
                                            <ul class="dropdown-menu pull-right">
                                                <li>
                                                    <a href="javascript:;" id="hsyesterday">Yesterday</a>
                                                </li>
                                                <li>
                                                    <a href="javascript:;" id="hslast7" >Last 7 Days</a>
                                                </li>
                                                
                                               
                                            </ul>
                                        </div> -->
                                    </div>
                                    <ul class="nav nav-tabs">
                                        <li class="active">
                                            <a href="#cst_helpdesk" data-toggle="tab"> Customer</a>
                                        </li>
                                        <li>
                                            <a href="#agent_helpdesk" data-toggle="tab"> Agent </a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="portlet-body">
                                    <div class="tab-content">
                                        <div class="tab-pane active" id="cst_helpdesk">
                                             <div class="scroller" style="height: 500px;" data-always-visible="1" data-rail-visible="0">
                                           <ul class="chats" id="hscustdiv" >
                                           <?php if(count($helpdesk_support_customer)):  ?>
                                                <?php foreach ($helpdesk_support_customer as $support): ?>
                                            <li class="in">
                                                 <form action="<?php echo base_url(); ?>index.php/Passenger_management/passenger_helpdesk_support" method="post">
                                                <div class="message">
                                                    <span class="arrow"> </span>
                                                     <?= $support->p_full_name ?> 
                                                    <span class="datetime"> at <?= date("d-m-Y H:i:s", strtotime($support->hs_created_datetime)) ?> </span>
                                                    <span class="body"> <?= $support->hs_message ?> </span>
                                                    <?php if($support->hs_status == 0): ?> 
                                                        <span class="label label-sm label-danger">Unread</span>
                                                    <?php else: ?>
                                                        <span class="label label-sm label-success ">Read</span>
                                                    <?php endif; ?>
                                                    <button type="submit" value="<?= $support->customerid ?>" name="passenger_id" class="btn btn-outline green btn-sm">View</button>
                                                </div>
                                            </form>
                                            </li>
                                        <?php endforeach;  ?>
                                        <?php else: ?>
                                              <li class="in">
                                                NO RECORDS FOUND.
                                            </li>
                                        <?php endif; ?>
                                        </ul>
                                        </div>
                                    </div>
                                        <div class="tab-pane" id="agent_helpdesk">
                                            <div class="scroller" style="height: 500px;" data-always-visible="1" data-rail-visible="0">
                                          <ul class="chats" id="hsagentdiv" >
                                           <?php if(count($helpdesk_support_agent)):  ?>
                                                <?php foreach ($helpdesk_support_agent as $support): ?>
                                            <li class="in">
                                                <form action="<?php echo base_url(); ?>index.php/Agent_management/agent_helpdesk_support" method="post">
                                                <div class="message">
                                                    <span class="arrow"> </span>
                                                     <?= $support->a_full_name ?> 
                                                    <span class="datetime"> at <?= date("d-m-Y H:i:s", strtotime($support->hs_created_datetime)) ?> </span>
                                                    <span class="body"> <?= $support->hs_message ?> </span>
                                                    <?php if($support->hs_status == 0): ?> 
                                                        <span class="label label-sm label-danger ">Unread</span>
                                                    <?php else: ?>
                                                        <span class="label label-sm label-success ">Read</span>
                                                    <?php endif; ?>
                                                    <button type="submit" value="<?= $support->agentid ?>" name="agent_id" class="btn btn-outline green btn-sm">View</button>
                                                </div>
                                            </form>
                                            </li>
                                        <?php endforeach;  ?>
                                        <?php else: ?>
                                               <li class="in">
                                                NO RECORDS FOUND.
                                            </li>
                                        <?php endif; ?>
                                            
                                       
                                        </ul>
                                                
                                                
                                            </div>    
                                           
                                        </div>
                                    </div>
                                </div>
                            </div>
                 <!-- END PAGE BASE CONTENT -->
                </div>
            </div>
                      <div class="clearfix"></div>
                <!-- BEGIN FOOTER -->
                 <p class="copyright"> 2017 &copy; RASHMI CABS
                    <a target="_blank" href="http://greenworlddesignstudio.com">GREENWORLD TECHNOLOGIES</a> &nbsp;|&nbsp;
               
                </p>
                <a href="#index" class="go2top">
                    <i class="icon-arrow-up"></i>
                </a>
                <!-- END FOOTER -->
            </div>
        </div>
        <!-- END CONTAINER -->
        <!-- BEGIN QUICK SIDEBAR -->
        <a href="javascript:;" class="page-quick-sidebar-toggler">
            <i class="icon-login"></i>
        </a>
        <div class="page-quick-sidebar-wrapper" data-close-on-body-click="false">
            <div class="page-quick-sidebar">
                <ul class="nav nav-tabs">
                    <li class="active">
                        <a href="javascript:;" data-target="#quick_sidebar_tab_1" data-toggle="tab"> Users
                            <span class="badge badge-danger">2</span>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:;" data-target="#quick_sidebar_tab_2" data-toggle="tab"> Alerts
                            <span class="badge badge-success">7</span>
                        </a>
                    </li>
                    <li class="dropdown">
                        <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown"> More
                            <i class="fa fa-angle-down"></i>
                        </a>
                        <ul class="dropdown-menu pull-right">
                            <li>
                                <a href="javascript:;" data-target="#quick_sidebar_tab_3" data-toggle="tab">
                                    <i class="icon-bell"></i> Alerts </a>
                            </li>
                            <li>
                                <a href="javascript:;" data-target="#quick_sidebar_tab_3" data-toggle="tab">
                                    <i class="icon-info"></i> Notifications </a>
                            </li>
                            <li>
                                <a href="javascript:;" data-target="#quick_sidebar_tab_3" data-toggle="tab">
                                    <i class="icon-speech"></i> Activities </a>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <a href="javascript:;" data-target="#quick_sidebar_tab_3" data-toggle="tab">
                                    <i class="icon-settings"></i> Settings </a>
                            </li>
                        </ul>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active page-quick-sidebar-chat" id="quick_sidebar_tab_1">
                        <div class="page-quick-sidebar-chat-users" data-rail-color="#ddd" data-wrapper-class="page-quick-sidebar-list">
                            <h3 class="list-heading">Staff</h3>
                            <ul class="media-list list-items">
                                <li class="media">
                                    <div class="media-status">
                                        <span class="badge badge-success">8</span>
                                    </div>
                                    <img class="media-object" src="<?php echo base_url(); ?>assets/layouts/layout/img/avatar3.jpg" alt="...">
                                    <div class="media-body">
                                        <h4 class="media-heading">Bob Nilson</h4>
                                        <div class="media-heading-sub"> Project Manager </div>
                                    </div>
                                </li>
                                <li class="media">
                                    <img class="media-object" src="<?php echo base_url(); ?>assets/layouts/layout/img/avatar1.jpg" alt="...">
                                    <div class="media-body">
                                        <h4 class="media-heading">Nick Larson</h4>
                                        <div class="media-heading-sub"> Art Director </div>
                                    </div>
                                </li>
                                <li class="media">
                                    <div class="media-status">
                                        <span class="badge badge-danger">3</span>
                                    </div>
                                    <img class="media-object" src="<?php echo base_url(); ?>assets/layouts/layout/img/avatar4.jpg" alt="...">
                                    <div class="media-body">
                                        <h4 class="media-heading">Deon Hubert</h4>
                                        <div class="media-heading-sub"> CTO </div>
                                    </div>
                                </li>
                                <li class="media">
                                    <img class="media-object" src="<?php echo base_url(); ?>assets/layouts/layout/img/avatar2.jpg" alt="...">
                                    <div class="media-body">
                                        <h4 class="media-heading">Ella Wong</h4>
                                        <div class="media-heading-sub"> CEO </div>
                                    </div>
                                </li>
                            </ul>
                            <h3 class="list-heading">Customers</h3>
                            <ul class="media-list list-items">
                                <li class="media">
                                    <div class="media-status">
                                        <span class="badge badge-warning">2</span>
                                    </div>
                                    <img class="media-object" src="<?php echo base_url(); ?>assets/layouts/layout/img/avatar6.jpg" alt="...">
                                    <div class="media-body">
                                        <h4 class="media-heading">Lara Kunis</h4>
                                        <div class="media-heading-sub"> CEO, Loop Inc </div>
                                        <div class="media-heading-small"> Last seen 03:10 AM </div>
                                    </div>
                                </li>
                                <li class="media">
                                    <div class="media-status">
                                        <span class="label label-sm label-success">new</span>
                                    </div>
                                    <img class="media-object" src="<?php echo base_url(); ?>assets/layouts/layout/img/avatar7.jpg" alt="...">
                                    <div class="media-body">
                                        <h4 class="media-heading">Ernie Kyllonen</h4>
                                        <div class="media-heading-sub"> Project Manager,
                                            <br> SmartBizz PTL </div>
                                    </div>
                                </li>
                                <li class="media">
                                    <img class="media-object" src="<?php echo base_url(); ?>assets/layouts/layout/img/avatar8.jpg" alt="...">
                                    <div class="media-body">
                                        <h4 class="media-heading">Lisa Stone</h4>
                                        <div class="media-heading-sub"> CTO, Keort Inc </div>
                                        <div class="media-heading-small"> Last seen 13:10 PM </div>
                                    </div>
                                </li>
                                <li class="media">
                                    <div class="media-status">
                                        <span class="badge badge-success">7</span>
                                    </div>
                                    <img class="media-object" src="<?php echo base_url(); ?>assets/layouts/layout/img/avatar9.jpg" alt="...">
                                    <div class="media-body">
                                        <h4 class="media-heading">Deon Portalatin</h4>
                                        <div class="media-heading-sub"> CFO, H&D LTD </div>
                                    </div>
                                </li>
                                <li class="media">
                                    <img class="media-object" src="<?php echo base_url(); ?>assets/layouts/layout/img/avatar10.jpg" alt="...">
                                    <div class="media-body">
                                        <h4 class="media-heading">Irina Savikova</h4>
                                        <div class="media-heading-sub"> CEO, Tizda Motors Inc </div>
                                    </div>
                                </li>
                                <li class="media">
                                    <div class="media-status">
                                        <span class="badge badge-danger">4</span>
                                    </div>
                                    <img class="media-object" src="<?php echo base_url(); ?>assets/layouts/layout/img/avatar11.jpg" alt="...">
                                    <div class="media-body">
                                        <h4 class="media-heading">Maria Gomez</h4>
                                        <div class="media-heading-sub"> Manager, Infomatic Inc </div>
                                        <div class="media-heading-small"> Last seen 03:10 AM </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="page-quick-sidebar-item">
                            <div class="page-quick-sidebar-chat-user">
                                <div class="page-quick-sidebar-nav">
                                    <a href="javascript:;" class="page-quick-sidebar-back-to-list">
                                        <i class="icon-arrow-left"></i>Back</a>
                                </div>
                                <div class="page-quick-sidebar-chat-user-messages">
                                    <div class="post out">
                                        <img class="avatar" alt="" src="<?php echo base_url(); ?>assets/layouts/layout/img/avatar3.jpg" />
                                        <div class="message">
                                            <span class="arrow"></span>
                                            <a href="javascript:;" class="name">Bob Nilson</a>
                                            <span class="datetime">20:15</span>
                                            <span class="body"> When could you send me the report ? </span>
                                        </div>
                                    </div>
                                    <div class="post in">
                                        <img class="avatar" alt="" src="<?php echo base_url(); ?>assets/layouts/layout/img/avatar2.jpg" />
                                        <div class="message">
                                            <span class="arrow"></span>
                                            <a href="javascript:;" class="name">Ella Wong</a>
                                            <span class="datetime">20:15</span>
                                            <span class="body"> Its almost done. I will be sending it shortly </span>
                                        </div>
                                    </div>
                                    <div class="post out">
                                        <img class="avatar" alt="" src="<?php echo base_url(); ?>assets/layouts/layout/img/avatar3.jpg" />
                                        <div class="message">
                                            <span class="arrow"></span>
                                            <a href="javascript:;" class="name">Bob Nilson</a>
                                            <span class="datetime">20:15</span>
                                            <span class="body"> Alright. Thanks! :) </span>
                                        </div>
                                    </div>
                                    <div class="post in">
                                        <img class="avatar" alt="" src="<?php echo base_url(); ?>assets/layouts/layout/img/avatar2.jpg" />
                                        <div class="message">
                                            <span class="arrow"></span>
                                            <a href="javascript:;" class="name">Ella Wong</a>
                                            <span class="datetime">20:16</span>
                                            <span class="body"> You are most welcome. Sorry for the delay. </span>
                                        </div>
                                    </div>
                                    <div class="post out">
                                        <img class="avatar" alt="" src="<?php echo base_url(); ?>assets/layouts/layout/img/avatar3.jpg" />
                                        <div class="message">
                                            <span class="arrow"></span>
                                            <a href="javascript:;" class="name">Bob Nilson</a>
                                            <span class="datetime">20:17</span>
                                            <span class="body"> No probs. Just take your time :) </span>
                                        </div>
                                    </div>
                                    <div class="post in">
                                        <img class="avatar" alt="" src="<?php echo base_url(); ?>assets/layouts/layout/img/avatar2.jpg" />
                                        <div class="message">
                                            <span class="arrow"></span>
                                            <a href="javascript:;" class="name">Ella Wong</a>
                                            <span class="datetime">20:40</span>
                                            <span class="body"> Alright. I just emailed it to you. </span>
                                        </div>
                                    </div>
                                    <div class="post out">
                                        <img class="avatar" alt="" src="<?php echo base_url(); ?>assets/layouts/layout/img/avatar3.jpg" />
                                        <div class="message">
                                            <span class="arrow"></span>
                                            <a href="javascript:;" class="name">Bob Nilson</a>
                                            <span class="datetime">20:17</span>
                                            <span class="body"> Great! Thanks. Will check it right away. </span>
                                        </div>
                                    </div>
                                    <div class="post in">
                                        <img class="avatar" alt="" src="<?php echo base_url(); ?>assets/layouts/layout/img/avatar2.jpg" />
                                        <div class="message">
                                            <span class="arrow"></span>
                                            <a href="javascript:;" class="name">Ella Wong</a>
                                            <span class="datetime">20:40</span>
                                            <span class="body"> Please let me know if you have any comment. </span>
                                        </div>
                                    </div>
                                    <div class="post out">
                                        <img class="avatar" alt="" src="<?php echo base_url(); ?>assets/layouts/layout/img/avatar3.jpg" />
                                        <div class="message">
                                            <span class="arrow"></span>
                                            <a href="javascript:;" class="name">Bob Nilson</a>
                                            <span class="datetime">20:17</span>
                                            <span class="body"> Sure. I will check and buzz you if anything needs to be corrected. </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="page-quick-sidebar-chat-user-form">
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="Type a message here...">
                                        <div class="input-group-btn">
                                            <button type="button" class="btn green">
                                                <i class="icon-paper-clip"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane page-quick-sidebar-alerts" id="quick_sidebar_tab_2">
                        <div class="page-quick-sidebar-alerts-list">
                            <h3 class="list-heading">General</h3>
                            <ul class="feeds list-items">
                                <li>
                                    <div class="col1">
                                        <div class="cont">
                                            <div class="cont-col1">
                                                <div class="label label-sm label-info">
                                                    <i class="fa fa-check"></i>
                                                </div>
                                            </div>
                                            <div class="cont-col2">
                                                <div class="desc"> You have 4 pending tasks.
                                                    <span class="label label-sm label-warning "> Take action
                                                        <i class="fa fa-share"></i>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col2">
                                        <div class="date"> Just now </div>
                                    </div>
                                </li>
                                <li>
                                    <a href="javascript:;">
                                        <div class="col1">
                                            <div class="cont">
                                                <div class="cont-col1">
                                                    <div class="label label-sm label-success">
                                                        <i class="fa fa-bar-chart-o"></i>
                                                    </div>
                                                </div>
                                                <div class="cont-col2">
                                                    <div class="desc"> Finance Report for year 2013 has been released. </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col2">
                                            <div class="date"> 20 mins </div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <div class="col1">
                                        <div class="cont">
                                            <div class="cont-col1">
                                                <div class="label label-sm label-danger">
                                                    <i class="fa fa-user"></i>
                                                </div>
                                            </div>
                                            <div class="cont-col2">
                                                <div class="desc"> You have 5 pending membership that requires a quick review. </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col2">
                                        <div class="date"> 24 mins </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="col1">
                                        <div class="cont">
                                            <div class="cont-col1">
                                                <div class="label label-sm label-info">
                                                    <i class="fa fa-shopping-cart"></i>
                                                </div>
                                            </div>
                                            <div class="cont-col2">
                                                <div class="desc"> New order received with
                                                    <span class="label label-sm label-success"> Reference Number: DR23923 </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col2">
                                        <div class="date"> 30 mins </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="col1">
                                        <div class="cont">
                                            <div class="cont-col1">
                                                <div class="label label-sm label-success">
                                                    <i class="fa fa-user"></i>
                                                </div>
                                            </div>
                                            <div class="cont-col2">
                                                <div class="desc"> You have 5 pending membership that requires a quick review. </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col2">
                                        <div class="date"> 24 mins </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="col1">
                                        <div class="cont">
                                            <div class="cont-col1">
                                                <div class="label label-sm label-info">
                                                    <i class="fa fa-bell-o"></i>
                                                </div>
                                            </div>
                                            <div class="cont-col2">
                                                <div class="desc"> Web server hardware needs to be upgraded.
                                                    <span class="label label-sm label-warning"> Overdue </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col2">
                                        <div class="date"> 2 hours </div>
                                    </div>
                                </li>
                                <li>
                                    <a href="javascript:;">
                                        <div class="col1">
                                            <div class="cont">
                                                <div class="cont-col1">
                                                    <div class="label label-sm label-default">
                                                        <i class="fa fa-briefcase"></i>
                                                    </div>
                                                </div>
                                                <div class="cont-col2">
                                                    <div class="desc"> IPO Report for year 2013 has been released. </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col2">
                                            <div class="date"> 20 mins </div>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                            <h3 class="list-heading">System</h3>
                            <ul class="feeds list-items">
                                <li>
                                    <div class="col1">
                                        <div class="cont">
                                            <div class="cont-col1">
                                                <div class="label label-sm label-info">
                                                    <i class="fa fa-check"></i>
                                                </div>
                                            </div>
                                            <div class="cont-col2">
                                                <div class="desc"> You have 4 pending tasks.
                                                    <span class="label label-sm label-warning "> Take action
                                                        <i class="fa fa-share"></i>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col2">
                                        <div class="date"> Just now </div>
                                    </div>
                                </li>
                                <li>
                                    <a href="javascript:;">
                                        <div class="col1">
                                            <div class="cont">
                                                <div class="cont-col1">
                                                    <div class="label label-sm label-danger">
                                                        <i class="fa fa-bar-chart-o"></i>
                                                    </div>
                                                </div>
                                                <div class="cont-col2">
                                                    <div class="desc"> Finance Report for year 2013 has been released. </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col2">
                                            <div class="date"> 20 mins </div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <div class="col1">
                                        <div class="cont">
                                            <div class="cont-col1">
                                                <div class="label label-sm label-default">
                                                    <i class="fa fa-user"></i>
                                                </div>
                                            </div>
                                            <div class="cont-col2">
                                                <div class="desc"> You have 5 pending membership that requires a quick review. </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col2">
                                        <div class="date"> 24 mins </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="col1">
                                        <div class="cont">
                                            <div class="cont-col1">
                                                <div class="label label-sm label-info">
                                                    <i class="fa fa-shopping-cart"></i>
                                                </div>
                                            </div>
                                            <div class="cont-col2">
                                                <div class="desc"> New order received with
                                                    <span class="label label-sm label-success"> Reference Number: DR23923 </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col2">
                                        <div class="date"> 30 mins </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="col1">
                                        <div class="cont">
                                            <div class="cont-col1">
                                                <div class="label label-sm label-success">
                                                    <i class="fa fa-user"></i>
                                                </div>
                                            </div>
                                            <div class="cont-col2">
                                                <div class="desc"> You have 5 pending membership that requires a quick review. </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col2">
                                        <div class="date"> 24 mins </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="col1">
                                        <div class="cont">
                                            <div class="cont-col1">
                                                <div class="label label-sm label-warning">
                                                    <i class="fa fa-bell-o"></i>
                                                </div>
                                            </div>
                                            <div class="cont-col2">
                                                <div class="desc"> Web server hardware needs to be upgraded.
                                                    <span class="label label-sm label-default "> Overdue </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col2">
                                        <div class="date"> 2 hours </div>
                                    </div>
                                </li>
                                <li>
                                    <a href="javascript:;">
                                        <div class="col1">
                                            <div class="cont">
                                                <div class="cont-col1">
                                                    <div class="label label-sm label-info">
                                                        <i class="fa fa-briefcase"></i>
                                                    </div>
                                                </div>
                                                <div class="cont-col2">
                                                    <div class="desc"> IPO Report for year 2013 has been released. </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col2">
                                            <div class="date"> 20 mins </div>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="tab-pane page-quick-sidebar-settings" id="quick_sidebar_tab_3">
                        <div class="page-quick-sidebar-settings-list">
                            <h3 class="list-heading">General Settings</h3>
                            <ul class="list-items borderless">
                                <li> Enable Notifications
                                    <input type="checkbox" class="make-switch" checked data-size="small" data-on-color="success" data-on-text="ON" data-off-color="default" data-off-text="OFF"> </li>
                                <li> Allow Tracking
                                    <input type="checkbox" class="make-switch" data-size="small" data-on-color="info" data-on-text="ON" data-off-color="default" data-off-text="OFF"> </li>
                                <li> Log Errors
                                    <input type="checkbox" class="make-switch" checked data-size="small" data-on-color="danger" data-on-text="ON" data-off-color="default" data-off-text="OFF"> </li>
                                <li> Auto Sumbit Issues
                                    <input type="checkbox" class="make-switch" data-size="small" data-on-color="warning" data-on-text="ON" data-off-color="default" data-off-text="OFF"> </li>
                                <li> Enable SMS Alerts
                                    <input type="checkbox" class="make-switch" checked data-size="small" data-on-color="success" data-on-text="ON" data-off-color="default" data-off-text="OFF"> </li>
                            </ul>
                            <h3 class="list-heading">System Settings</h3>
                            <ul class="list-items borderless">
                                <li> Security Level
                                    <select class="form-control input-inline input-sm input-small">
                                        <option value="1">Normal</option>
                                        <option value="2" selected>Medium</option>
                                        <option value="e">High</option>
                                    </select>
                                </li>
                                <li> Failed Email Attempts
                                    <input class="form-control input-inline input-sm input-small" value="5" /> </li>
                                <li> Secondary SMTP Port
                                    <input class="form-control input-inline input-sm input-small" value="3560" /> </li>
                                <li> Notify On System Error
                                    <input type="checkbox" class="make-switch" checked data-size="small" data-on-color="danger" data-on-text="ON" data-off-color="default" data-off-text="OFF"> </li>
                                <li> Notify On SMTP Error
                                    <input type="checkbox" class="make-switch" checked data-size="small" data-on-color="warning" data-on-text="ON" data-off-color="default" data-off-text="OFF"> </li>
                            </ul>
                            <div class="inner-content">
                                <button class="btn btn-success">
                                    <i class="icon-settings"></i> Save Changes</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END QUICK SIDEBAR -->
        
        <!--[if lt IE 9]>
<script src="assets/global/plugins/respond.min.js"></script>
<script src="assets/global/plugins/excanvas.min.js"></script> 
<script src="assets/global/plugins/ie8.fix.min.js"></script> 
<![endif]-->
        <!-- BEGIN CORE PLUGINS -->
<script src="<?php echo base_url(); ?>assets/global/plugins/jquery.min.js" type="text/javascript"></script>

        <script src="<?php echo base_url(); ?>assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/global/plugins/js.cookie.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
        <!-- END CORE PLUGINS -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <script src="<?php echo base_url(); ?>assets/global/plugins/moment.min.js" type="text/javascript"></script>
        
        <script src="<?php echo base_url(); ?>assets/global/plugins/morris/morris.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/global/plugins/morris/raphael-min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/global/plugins/counterup/jquery.waypoints.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/global/plugins/counterup/jquery.counterup.min.js" type="text/javascript"></script>
       
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN THEME GLOBAL SCRIPTS -->
        <script src="<?php echo base_url(); ?>assets/global/scripts/app.min.js" type="text/javascript"></script>
        <!-- END THEME GLOBAL SCRIPTS -->
        <!-- BEGIN PAGE LEVEL SCRIPTS -->
        <script src="<?php echo base_url(); ?>assets/pages/scripts/dashboard.min.js" type="text/javascript"></script>
        <!-- END PAGE LEVEL SCRIPTS -->
        <!-- BEGIN THEME LAYOUT SCRIPTS -->
        <script src="<?php echo base_url(); ?>assets/layouts/layout5/scripts/layout.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/layouts/global/scripts/quick-sidebar.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/layouts/global/scripts/quick-nav.min.js" type="text/javascript"></script>
        <!-- END THEME LAYOUT SCRIPTS -->
        <script type="text/javascript">

            $(document).ready(function(){
                
            setInterval(function(){

                    //alert("time interval");
                var temp = 1;
                    $.ajax({
                url: '<?php echo base_url(); ?>Dashboard/fetch_data',
                type: 'post',
                data: {temp: temp},
                success: function (data) {
                      
                       // alert("data 1"); exit; 
                        $('#viewdata').html(data);

                     }
                 }); 

                     $.ajax({
                url: '<?php echo base_url(); ?>Dashboard/fetch_booking',
                type: 'post',
                data: {temp: temp},
                success: function (data) {
                      
                       // alert("data 2"); exit;
                        $('#bookingdiv').html(data);

                     }
                 });

                     $.ajax({
                url: '<?php echo base_url(); ?>Dashboard/fetch_onewayagent',
                type: 'post',
                data: {temp: temp},
                success: function (data) {
                      
                     //alert(data); exit;
                      //  alert('hello agent today'); exit;
                        $('#agentdiv').html(data);
                     }
                 });
                 
                    $.ajax({
                url: '<?php echo base_url(); ?>Dashboard/fetch_onewaycust',
                type: 'post',
                data: {temp: temp},
                success: function (data) {
                      
                      // alert("data 4"); exit;
                       // alert('hello customer today'); exit;
                        $('#custdiv').html(data);
                     }
                 });

                     $.ajax({
                url: '<?php echo base_url(); ?>Dashboard/fetch_hscust',
                type: 'post',
                data: {temp: temp},
                success: function (data) {
                      
                       //alert("data 5"); exit;
                       // alert('hello agent today'); exit;
                        $('#hscustdiv').html(data);
                     }
                 });

                     $.ajax({
                url: '<?php echo base_url(); ?>Dashboard/fetch_hsagent',
                type: 'post',
                data: {temp: temp},
                success: function (data) {
                      
                      // alert("data 6"); exit;
                       // alert('hello customer today'); exit;
                       $('#hsagentdiv').html(data);
                     }
                 });
                 
                   $.ajax({
                url: '<?php echo base_url(); ?>Dashboard/fetch_upinvoice',
                type: 'post',
                data: {temp: temp},
                success: function (data) {
                      
                      // alert("data 7"); exit;
                       // alert('hello agent today'); exit;
                        $('#upinvoicediv').html(data);
                     }
                 });

                   $.ajax({
                url: '<?php echo base_url(); ?>Dashboard/fetch_complain',
                type: 'post',
                data: {temp: temp},
                success: function (data) {
                      
                      // alert("data 8"); exit;
                       // alert('hello agent today'); exit;
                        $('#complaintsdiv').html(data);
                     }
                 });


                 }, 30000); 

                   // alert("time interval");
                   // $('#lbltoday').trigger('click');
                   
                    /* $('#booktoday').trigger('click');
                     $('#onewaytoday').trigger('click');
                     $('#hstoday').trigger('click');
                     $('#uptoday').trigger('click');
                     $('#comtoday').trigger('click');  
              
               /* alert("hello");/* 
                $('#lbltoday').click(function(){
                   // alert("hello");
                    $("#today").attr('checked','checked');
                    $("#yesterday").prop('checked', false); 
                    $("#last7days").prop('checked', false); 
                    $("#last30days").prop('checked', false); 
                });
                $('#lblystr').click(function(){

                    $("#yesterday").attr('checked','checked'); 
                    $("#today").prop('checked', false);
                    $("#last7days").prop('checked', false); 
                    $("#last30days").prop('checked', false); 
                }); 
                $('#lbl7days').click(function(){

                    $("#last7days").attr('checked','checked'); 
                     $("#today").prop('checked', false);
                     $("#yesterday").prop('checked', false);
                     $("#last30days").prop('checked', false);

                });
                $('#lbl30days').click(function(){

                    $("#last30days").attr('checked','checked');
                    $("#today").prop('checked', false);
                    $("#yesterday").prop('checked', false); 
                    $("#last7days").prop('checked', false); 

                }); */

               $("#lbltoday").click(function(){
                var temp= '1';
                /* alert("today"); 
                $.post("<?php echo base_url(); ?>Dashboard/todayData",
                {
                },
                function(data, status){
                alert("Data: " + data + "Status: " + status); */
                $.ajax({
                url: '<?php echo base_url(); ?>Dashboard/fetch_data',
                type: 'post',
                data: {temp: temp},
                success: function (data) {
                      
                       //alert("today "); exit;  
                        $('#viewdata').html(data);

                     }
                 });
            }); 

             
                $("#lblystr").click(function(){

                    var temp= '2';
                //alert("yesterday");
                $.ajax({
                url: '<?php echo base_url(); ?>Dashboard/fetch_data',
                type: 'post',
                data: {temp: temp},
                success: function (data) {
                      
                        //alert(data); 
                        $('#viewdata').html(data);

                     }
                 });

               }); 

                $("#lbl7days").click(function(){
                   var temp= '3';
                //alert("last 7 days");
                $.ajax({
                url: '<?php echo base_url(); ?>Dashboard/fetch_data',
                type: 'post',
                data: {temp: temp},
                success: function (data) {
                      
                        //alert(data);
                        $('#viewdata').html(data);

                     }
                 });

               });

               $("#lbl30days").click(function(){
                        var temp= '4';
                //alert("last 7 days");
                $.ajax({
                url: '<?php echo base_url(); ?>Dashboard/fetch_data',
                type: 'post',
                data: {temp: temp},
                success: function (data) {
                      
                        //alert(data);
                        $('#viewdata').html(data);

                     }
                 });
               });

                $("#lblnext7days").click(function(){
                var temp= '5';
                //alert("last 7 days");
                $.ajax({
                url: '<?php echo base_url(); ?>Dashboard/fetch_data',
                type: 'post',
                data: {temp: temp},
                success: function (data) {
                      
                        //alert(data); exit; 
                        $('#viewdata').html(data);

                     }
                 });
               });

               $("#booktoday").click(function(){
                   // alert("this javascript"); exit;
                        var temp= '1';
                //alert("last 7 days");
                $.ajax({
                url: '<?php echo base_url(); ?>Dashboard/fetch_booking',
                type: 'post',
                data: {temp: temp},
                success: function (data) {
                      
                       // alert("book today"); exit;
                        $('#bookingdiv').html(data);

                     }
                 });
               });

                $("#booktom").click(function(){
                   // alert("this javascript"); exit;
                        var temp= '2';
                //alert("last 7 days");
                $.ajax({
                url: '<?php echo base_url(); ?>Dashboard/fetch_booking',
                type: 'post',
                data: {temp: temp},
                success: function (data) {
                      
                        //alert(data);
                        $('#bookingdiv').html(data);

                     }
                 });
               });

                $("#booknext7").click(function(){
                   // alert("this javascript"); exit;
                        var temp= '3';
                //alert("last 7 days");
                $.ajax({
                url: '<?php echo base_url(); ?>Dashboard/fetch_booking',
                type: 'post',
                data: {temp: temp},
                success: function (data) {
                      
                       // alert(data);
                        $('#bookingdiv').html(data);

                     }
                 });
               });

                 $("#onewaytoday").click(function(){
                // alert("this javascript"); exit;
                        var temp= '1';
                //alert("last 7 days");
                $.ajax({
                url: '<?php echo base_url(); ?>Dashboard/fetch_onewayagent',
                type: 'post',
                data: {temp: temp},
                success: function (data) {
                      
                       // alert(data);
                      //  alert('one way 1 today'); exit;
                        $('#agentdiv').html(data);
                     }
                 });


                 $.ajax({
                url: '<?php echo base_url(); ?>Dashboard/fetch_onewaycust',
                type: 'post',
                data: {temp: temp},
                success: function (data) {
                      
                       // alert(data);
                      //  alert('one way 2 today'); exit;
                        $('#custdiv').html(data);
                     }
                 });

               });


                $("#onewaytomo").click(function(){
                   // alert("this javascript"); exit;
                        var temp= '2';
                //alert("last 7 days");
               $.ajax({
                url: '<?php echo base_url(); ?>Dashboard/fetch_onewayagent',
                type: 'post',
                data: {temp: temp},
                success: function (data) {
                      
                       // alert(data);
                     // alert('hello agent tommorrow'); exit;
                        $('#agentdiv').html(data);
                     }
                 });


               $.ajax({
                url: '<?php echo base_url(); ?>Dashboard/fetch_onewaycust',
                type: 'post',
                data: {temp: temp},
                success: function (data) {
                      
                       // alert(data);
                       // alert('hello customer tommorrow'); exit;
                        $('#custdiv').html(data);
                     }
                 });
               

               });


                $("#onewaynext7").click(function(){
                   // alert("this javascript"); exit;
                    var temp= '3';
                //alert("last 7 days");
               $.ajax({
                url: '<?php echo base_url(); ?>Dashboard/fetch_onewayagent',
                type: 'post',
                data: {temp: temp},
                success: function (data) {
                      
                       // alert(data);
                        // alert('hello agent next7 days'); exit;
                        $('#agentdiv').html(data);
                     }
                 });

               $.ajax({
                url: '<?php echo base_url(); ?>Dashboard/fetch_onewaycust',
                type: 'post',
                data: {temp: temp},
                success: function (data) {
                      
                       // alert(data);
                       // alert('hello customer next7 days'); exit;
                        $('#custdiv').html(data);
                     }
                 });
 
        });


         $("#hstoday").click(function(){
                   // alert("this javascript"); exit;
                        var temp= '1';
                //alert("last 7 days");
                $.ajax({
                url: '<?php echo base_url(); ?>Dashboard/fetch_hscust',
                type: 'post',
                data: {temp: temp},
                success: function (data) {
                      
                       // alert(data);
                      // alert('hs 1 today'); exit;
                        $('#hscustdiv').html(data);
                     }
                 });

                 $.ajax({
                url: '<?php echo base_url(); ?>Dashboard/fetch_hsagent',
                type: 'post',
                data: {temp: temp},
                success: function (data) {
                      
                       // alert(data);
                      //  alert('hs 2 today'); exit;
                       $('#hsagentdiv').html(data);
                     }
                 });

               });


         $("#hsyesterday").click(function(){
                   // alert("this javascript"); exit;
                        var temp= '2';
                //alert("last 7 days");
                $.ajax({
                url: '<?php echo base_url(); ?>Dashboard/fetch_hscust',
                type: 'post',
                data: {temp: temp},
                success: function (data) {
                      
                       // alert(data);
                      // alert('hello agent yesterday'); exit;
                        $('#hscustdiv').html(data);
                     }
                 });

                 $.ajax({
                url: '<?php echo base_url(); ?>Dashboard/fetch_hsagent',
                type: 'post',
                data: {temp: temp},
                success: function (data) {
                      
                       // alert(data);
                       // alert('hello customer yesterday'); exit;
                        $('#hsagentdiv').html(data);
                     }
                 });

               });


         $("#hslast7").click(function(){
                    //alert("this javascript"); exit;
                    var temp= '3';
                //alert("last 7 days");
                $.ajax({
                url: '<?php echo base_url(); ?>Dashboard/fetch_hscust',
                type: 'post',
                data: {temp: temp},
                success: function (data) {
                      
                        // alert(data);
                        // alert('hello agent last 7 days'); exit;
                        $('#hscustdiv').html(data);
                     }
                 });

                $.ajax({
                url: '<?php echo base_url(); ?>Dashboard/fetch_hsagent',
                type: 'post',
                data: {temp: temp},
                success: function (data) {
                      
                       // alert(data);
                       // alert('hello customer last 7 days'); exit;
                       $('#hsagentdiv').html(data);

                     }
                 });

               });

         //unpaid invoices jquery 

         $("#uptoday").click(function(){
                   // alert("this javascript"); exit;
                        var temp= '1';
                //alert("last 7 days");
                $.ajax({
                url: '<?php echo base_url(); ?>Dashboard/fetch_upinvoice',
                type: 'post',
                data: {temp: temp},
                success: function (data) {
                      
                       // alert(data);
                     //  alert('Up today'); exit;
                        $('#upinvoicediv').html(data);
                     }
                 });

               

               });


         $("#uptommorrow").click(function(){
                   // alert("this javascript"); exit;
                        var temp= '2';
                //alert("last 7 days");
                $.ajax({
                url: '<?php echo base_url(); ?>Dashboard/fetch_upinvoice',
                type: 'post',
                data: {temp: temp},
                success: function (data) {
                      
                       // alert(data);
                      // alert('hello agent yesterday'); exit;
                        $('#upinvoicediv').html(data);
                     }
                 });

                

               });


         $("#upnext7").click(function(){
                    //alert("this javascript"); exit;
                    var temp= '3';
                //alert("last 7 days");
                $.ajax({
                url: '<?php echo base_url(); ?>Dashboard/fetch_upinvoice',
                type: 'post',
                data: {temp: temp},
                success: function (data) {
                      
                        // alert(data);
                        // alert('hello agent last 7 days'); exit;
                        $('#upinvoicediv').html(data);
                     }
                 });

               

               });

         // complain jquerys 
         $("#comtoday").click(function(){
                   // alert("this javascript"); exit;
                        var temp= '1';
                //alert("com today");
                $.ajax({
                url: '<?php echo base_url(); ?>Dashboard/fetch_complain',
                type: 'post',
                data: {temp: temp},
                success: function (data) {
                      
                       // alert(data);
                       // alert('hello agent today'); exit;
                        $('#complaintsdiv').html(data);
                     }
                 });

               

               });


         $("#comyesterday").click(function(){
                   // alert("this javascript"); exit;
                        var temp= '2';
                //alert("last 7 days");
                $.ajax({
                url: '<?php echo base_url(); ?>Dashboard/fetch_complain',
                type: 'post',
                data: {temp: temp},
                success: function (data) {
                      
                       // alert(data);
                      // alert('hello agent yesterday'); exit;
                        $('#complaintsdiv').html(data);
                     }
                 });

                

               });


         $("#comlast7").click(function(){
                    //alert("this javascript"); exit;
                    var temp= '3';
                //alert("last 7 days");
                $.ajax({
                url: '<?php echo base_url(); ?>Dashboard/fetch_complain',
                type: 'post',
                data: {temp: temp},
                success: function (data) {
                      
                        // alert(data);
                        // alert('hello agent last 7 days'); exit;
                        $('#complaintsdiv').html(data);
                     }
                 });

               

               });

    });
        </script>
    </body>

</html>