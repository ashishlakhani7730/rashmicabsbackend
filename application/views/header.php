<?php header("X-Powered-By: ASP.NET"); ?>

<!DOCTYPE html>



<?php $uri1 = $this->uri->segment('1');

	$uri2 = $this->uri->segment('2');	

?>

<?php

//header("Cache-Control: no cache");

//session_cache_limiter("private_no_expire");



?>





<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->

<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->

<!--[if !IE]><!-->



<html lang="en">

    <!--<![endif]-->

    <!-- BEGIN HEAD -->



    <head>

        <meta charset="utf-8" />

        <title>RASHMI CABS | CONTROL PANEL</title>

        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <meta content="width=device-width, initial-scale=1" name="viewport" />

        <meta content="Preview page of Metronic Admin Theme #5 for statistics, charts, recent events and reports" name="description" />

        <meta content="" name="author" />

        <!-- BEGIN LAYOUT FIRST STYLES -->

        <!--My Additional -->

        <link type="text/css" href="<?php echo base_url();?>css/bootstrap.min.css" />

        <link type="text/css" href="<?php echo base_url();?>css/bootstrap-timepicker.min.css" />

        <script type="text/javascript" src="<?php echo base_url();?>js/jquery.min.js"></script>

        <script type="text/javascript" src="<?php echo base_url();?>js/bootstrap.min.js"></script>

        <script type="text/javascript" src="<?php echo base_url();?>js/bootstrap-timepicker.min.js"></script>

          <!--End ADDitional -->

        <link href="//fonts.googleapis.com/css?family=Oswald:400,300,700" rel="stylesheet" type="text/css" />

        <!-- END LAYOUT FIRST STYLES -->

        <!-- BEGIN GLOBAL MANDATORY STYLES -->

        <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url();?>assets/global/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url();?>assets/global/plugins/bootstrap-summernote/summernote.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url();?>assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />

        <link href="<?php echo base_url();?>assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css" />

        <link href="<?php echo base_url();?>assets/global/plugins/bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css" />

		

		 <link href="<?php echo base_url();?>assets/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css" rel="stylesheet" type="text/css" />

        <link href="<?php echo base_url();?>assets/global/plugins/bootstrap-timepicker/css/bootstrap-timepicker.min.css" rel="stylesheet" type="text/css" />

		

        <link href="<?php echo base_url();?>assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css" />

        <!-- END GLOBAL MANDATORY STYLES -->

        <!-- BEGIN PAGE LEVEL PLUGINS -->

		<link href="<?php echo base_url();?>assets/global/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />

        <link href="<?php echo base_url();?>assets/global/plugins/select2/css/select2-bootstrap.min.css" rel="stylesheet" type="text/css" /> 

        <link href="<?php echo base_url();?>assets/global/plugins/morris/morris.css" rel="stylesheet" type="text/css" />

    	

         <link href="<?php echo base_url();?>assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css" rel="stylesheet" type="text/css" />

		 

	 	 <link href="<?php echo base_url();?>assets/global/plugins/datatables/datatables.min.css" rel="stylesheet" type="text/css" />

    	 <link href="<?php echo base_url();?>assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css" rel="stylesheet" type="text/css" />

       

        <!-- END PAGE LEVEL PLUGINS -->

        <!-- BEGIN THEME GLOBAL STYLES -->

        <link href="<?php echo base_url();?>assets/global/css/components-md.css" rel="stylesheet" id="style_components" type="text/css" />

        <link href="<?php echo base_url();?>assets/global/css/plugins-md.css" rel="stylesheet" type="text/css" />

		

		 <link href="<?php echo base_url();?>assets/pages/css/invoice.css" rel="stylesheet" type="text/css"/>

		

        <!-- END THEME GLOBAL STYLES -->

        <!-- BEGIN THEME LAYOUT STYLES -->

        <link href="<?php echo base_url();?>assets/layouts/layout5/css/layout.css" rel="stylesheet" type="text/css" />

        <link href="<?php echo base_url();?>assets/layouts/layout5/css/custom.css" rel="stylesheet" type="text/css" />

        <!-- END THEME LAYOUT STYLES -->

        <link rel="shortcut icon" href="favicon.ico" /> </head>

    <!-- END HEAD -->

		 

    <body class="page-header-fixed page-sidebar-closed-hide-logo page-md">

        <!-- BEGIN CONTAINER -->

        <div class="wrapper">

            <!-- BEGIN HEADER -->

            <header class="page-header">

                <nav class="navbar mega-menu" role="navigation">

                    <div class="container-fluid">

                        <div class="clearfix navbar-fixed-top">

                            <!-- Brand and toggle get grouped for better mobile display -->

                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-responsive-collapse">

                                <span class="sr-only">Toggle navigation</span>

                                <span class="toggle-icon">

                                    <span class="icon-bar"></span>

                                    <span class="icon-bar"></span>

                                    <span class="icon-bar"></span>

                                </span>

                            </button>

                            <!-- End Toggle Button -->

                            <!-- BEGIN LOGO -->

                            <a id="index" class="page-logo" href="<?php echo base_url(); ?>">

                                <img src="<?php echo base_url();?>assets/global/img/rc_logo.png"  alt="RASHMI CABS"> </a>

                            <!-- END LOGO -->

                         

                            <!-- BEGIN TOPBAR ACTIONS -->

                            <div class="topbar-actions">

                                <!-- BEGIN GROUP NOTIFICATION -->

                                <div class="btn-group-notification btn-group" id="header_notification_bar">

                                    <button type="button" class="btn btn-sm md-skip dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">

                                        <i class="icon-bell"></i>

                                        <span class="badge">7</span>

                                    </button>

                                    <ul class="dropdown-menu-v2">

                                        <li class="external">

                                            <h3>

                                                <span class="bold">12 pending</span> notifications</h3>

                                            <a href="#">view all</a>

                                        </li>

                                        <li>

                                            <ul class="dropdown-menu-list scroller" style="height: 250px; padding: 0;" data-handle-color="#637283">

                                                <li>

                                                    <a href="javascript:;">

                                                        <span class="details">

                                                            <span class="label label-sm label-icon label-success md-skip">

                                                                <i class="fa fa-plus"></i>

                                                            </span> New user registered. </span>

                                                        <span class="time">just now</span>

                                                    </a>

                                                </li>

                                                <li>

                                                    <a href="javascript:;">

                                                        <span class="details">

                                                            <span class="label label-sm label-icon label-danger md-skip">

                                                                <i class="fa fa-bolt"></i>

                                                            </span> Server #12 overloaded. </span>

                                                        <span class="time">3 mins</span>

                                                    </a>

                                                </li>

                                                <li>

                                                    <a href="javascript:;">

                                                        <span class="details">

                                                            <span class="label label-sm label-icon label-warning md-skip">

                                                                <i class="fa fa-bell-o"></i>

                                                            </span> Server #2 not responding. </span>

                                                        <span class="time">10 mins</span>

                                                    </a>

                                                </li>

                                                <li>

                                                    <a href="javascript:;">

                                                        <span class="details">

                                                            <span class="label label-sm label-icon label-info md-skip">

                                                                <i class="fa fa-bullhorn"></i>

                                                            </span> Application error. </span>

                                                        <span class="time">14 hrs</span>

                                                    </a>

                                                </li>

                                                <li>

                                                    <a href="javascript:;">

                                                        <span class="details">

                                                            <span class="label label-sm label-icon label-danger md-skip">

                                                                <i class="fa fa-bolt"></i>

                                                            </span> Database overloaded 68%. </span>

                                                        <span class="time">2 days</span>

                                                    </a>

                                                </li>

                                                <li>

                                                    <a href="javascript:;">

                                                        <span class="details">

                                                            <span class="label label-sm label-icon label-danger md-skip">

                                                                <i class="fa fa-bolt"></i>

                                                            </span> A user IP blocked. </span>

                                                        <span class="time">3 days</span>

                                                    </a>

                                                </li>

                                                <li>

                                                    <a href="javascript:;">

                                                        <span class="details">

                                                            <span class="label label-sm label-icon label-warning md-skip">

                                                                <i class="fa fa-bell-o"></i>

                                                            </span> Storage Server #4 not responding dfdfdfd. </span>

                                                        <span class="time">4 days</span>

                                                    </a>

                                                </li>

                                                <li>

                                                    <a href="javascript:;">

                                                        <span class="details">

                                                            <span class="label label-sm label-icon label-info md-skip">

                                                                <i class="fa fa-bullhorn"></i>

                                                            </span> System Error. </span>

                                                        <span class="time">5 days</span>

                                                    </a>

                                                </li>

                                                <li>

                                                    <a href="javascript:;">

                                                        <span class="details">

                                                            <span class="label label-sm label-icon label-danger md-skip">

                                                                <i class="fa fa-bolt"></i>

                                                            </span> Storage server failed. </span>

                                                        <span class="time">9 days</span>

                                                    </a>

                                                </li>

                                            </ul>

                                        </li>

                                    </ul>

                                </div>

                                <!-- END GROUP NOTIFICATION -->

                               

                                <!-- BEGIN USER PROFILE -->

                                <div class="btn-group-img btn-group">

                                    <button type="button" class="btn btn-sm md-skip dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">

                                         <span>Hi, <?php $user = $this->session->has_userdata('user'); 

										 echo $this->db->get_where('user_detail',array('id',$user))->row()->u_full_name; ?></span>

                                         <?php $user_image=$this->db->get_where('user_detail',array('id',$user))->row()->u_image;?>

                                        <img src="<?php if(!empty($user_image)){ echo base_url();?>uploads/User_image/<?php echo $user_image; }else{echo base_url()."assets/global/img/defaultimg.jpg";}  ?>" alt=""> </button>

                                    <ul class="dropdown-menu-v2" role="menu">

                                        <li>

                                            <a href="<?php echo base_url();?>index.php/Account_details">

                                                <i class="icon-user"></i> My Profile

                                                <span class="badge badge-danger">1</span>

                                            </a>

                                        </li>

                                        <li>

                                            <a href="app_calendar.html">

                                                <i class="icon-calendar"></i> My Calendar </a>

                                        </li>

                                        <li>

                                            <a href="app_inbox.html">

                                                <i class="icon-envelope-open"></i> My Inbox

                                                <span class="badge badge-danger"> 3 </span>

                                            </a>

                                        </li>

                                        <li>

                                            <a href="app_todo_2.html">

                                                <i class="icon-rocket"></i> My Tasks

                                                <span class="badge badge-success"> 7 </span>

                                            </a>

                                        </li>

                                        <li class="divider"> </li>

                                        <li>

                                            <a href="page_user_lock_1.html">

                                                <i class="icon-lock"></i> Lock Screen </a>

                                        </li>

                                        <li>

                                            <a href="<?php echo base_url();  ?>index.php/Login/logout">

                                                <i class="icon-key"></i> Log Out </a>

                                        </li>

                                    </ul>

                                </div>

                                <!-- END USER PROFILE -->

                            

                            </div>

                            <!-- END TOPBAR ACTIONS -->

                        </div>

                        <!-- BEGIN HEADER MENU -->

						 <div class="nav-collapse collapse navbar-collapse navbar-responsive-collapse">

                            <ul class="nav navbar-nav">

                                <li class="dropdown dropdown-fw dropdown-fw-disabled  <?php if($uri1 == 'Dashboard' || $uri1 == 'Booking_management' || $uri1 == 'Roundtrip_booking' || $uri1 == 'Roundtrip_view' || $uri1 == 'Multicity_booking' || $uri1 == 'Multicity_view' || $uri1 == 'Local_booking' || $uri1 == 'Local_view' || $uri1 == 'Oneway_booking' || $uri1 == 'Oneway_view' || $uri1 == 'Invoice_rent_card' || $uri1 =='Invoice_view' || $uri1 =='Oneway_offer_management' || $uri1 =='Rc_notes_management' || $uri1=='CreateDutySlip' || $uri1 == 'BookingInquiry_management' || $uri1=='' || $uri1 == 'CreateInvoice'){?> active open selected <?php } ?>">

                                    <a href="javascript:;" class="text-uppercase">

                                        <i class="icon-home"></i> Home </a>

                                    <ul class="dropdown-menu dropdown-menu-fw">

									

                                        <li <?php if($uri1 == 'Dashboard' || $uri1==''){?>class="active"  <?php } ?> >

                                            <a href="<?php echo base_url()?>index.php/Dashboard">

											

											

                                                <i class="icon-bar-chart"></i> DASHBOARD </a>

                                        </li>

                                       <li  <?php if($uri1 == 'Booking_management' || $uri1 == 'Roundtrip_booking' || $uri1 == 'Roundtrip_view' || $uri1 == 'Multicity_booking' || $uri1 == 'Multicity_view' || $uri1 == 'Local_booking' || $uri1 == 'Local_view' || $uri1 == 'Oneway_booking' || $uri1 == 'Oneway_view'  || $uri1 == 'Invoice_rent_card' || $uri1 =='Invoice_view' ){?>class="active"<?php }?>>

                                             <a href="<?php echo base_url()?>index.php/Booking_management">

                                                <i class="fa fa-cab"></i> All Bookings </a>

                                        </li>

										

										<li <?php if($uri1 == 'Oneway_offer_management'){?>class="active"<?php }?>>

                                            <a href="<?php echo base_url()?>index.php/Oneway_offer_management"><i class="fa fa-money"></i> Oneway Offer </a>

                                        </li>

										

										<li <?php if($uri1 == 'Rc_notes_management'){?>class="active"<?php }?>>

                                            <a href="<?php echo base_url()?>index.php/Rc_notes_management"><i class="fa fa-sticky-note-o"></i> RC Notes</a>

                                        </li>

										

                                        <li <?php if($uri1 == 'BookingInquiry_management'){?>class="active"<?php }?>>

                                            <a href="<?php echo base_url()?>index.php/BookingInquiry_management">

                                                <i class="fa fa-phone"></i> Bookings Inquiry </a>

                                        </li>

										

										<li <?php if($uri1 == 'Manage_duty_slip'|| $uri1 == 'CreateDutySlip'){?>class="active"<?php }?>>

                                            <a href="<?php echo base_url()?>index.php/Manage_duty_slip">

                                                <i class="fa fa-ticket"></i> Create Duty Slip</a>

                                        </li>

										

										<li <?php if($uri1 == 'CreateInvoice'){?>class="active"<?php }?>>

                                            <a href="<?php echo base_url()?>index.php/CreateInvoice">

                                                <i class="fa fa-ticket"></i> Create Invoice</a>

                                        </li>

                                      	

                                    </ul>

                              </li>

                                <li class="dropdown dropdown-fw dropdown-fw-disabled <?php if($uri1 == 'Passenger_management' || $uri1 == 'Agent_management' || $uri1 == 'User_management' || $uri1 == 'Package_management' || $uri1 == 'Agent_driver_management' || $uri1 == 'Agent_vehicle_management'){?> active open selected <?php } ?> ">

                                    <a href="javascript:;" class="text-uppercase">

                                        <i class="fa fa-cogs"></i> MANAGE MODULES </a>

                                    <ul class="dropdown-menu dropdown-menu-fw">

                                         <li <?php if($uri1 == 'Package_management'){?>class="active"<?php }?>>

                                            <a href="<?php echo base_url()?>index.php/Package_management"><i class="fa fa-money"></i>Manage Booking Packages</a>

                                        </li>

                                         <li  <?php if($uri1 == 'Agent_management'){?>class="active"<?php }?>>

                                            <a href="<?php echo base_url()?>index.php/Agent_management"><i class="fa fa-user"></i>Manage Agent</a>

                                        </li>

										 <li  <?php if($uri1 == 'Agent_driver_management'){?>class="active"<?php }?>>

                                            <a href="<?php echo base_url()?>index.php/Agent_driver_management"><i class="fa fa-user"></i>Manage Agent Driver</a>

                                        </li>

										<li  <?php if($uri1 == 'Agent_vehicle_management'){?>class="active"<?php }?>>

                                            <a href="<?php echo base_url()?>index.php/Agent_vehicle_management"><i class="fa fa-user"></i>Manage Agent Vehicle</a>

                                        </li>

                                        <li <?php if($uri1 == 'Passenger_management'){?>class="active"<?php }?>>

                                            <a href="<?php echo base_url()?>index.php/Passenger_management"> <i class="fa fa-users"></i>Manage Passengers</a>

                                        </li>

                                          <li  <?php if($uri1 == 'User_management'){?>class="active"<?php }?>>

                                            <a href="<?php echo base_url()?>index.php/User_management"> <i class="fa fa-user-md"></i>Manage Office Users</a>

                                        </li>

										 

                                         

                                    </ul>

                              </li>

                                 <li class="dropdown dropdown-fw dropdown-fw-disabled <?php  if($uri1 == 'Report_management'){?> active open selected <?php } ?>">

                                    <a href="javascript:;" class="text-uppercase">

                                        <i class="icon-bar-chart"></i> REPORTS </a>

                                    <ul class="dropdown-menu dropdown-menu-fw">

                                         <li <?php if($uri2 == 'BookingReports'){?>class="active"<?php }?> >

                                            <a href="<?php echo base_url()?>index.php/Report_management/BookingReports">  <i class="fa fa-ticket"></i> Booking Reports </a>

                                        </li>
										
										<li <?php if($uri2 == 'BookingReportsOfSearch'){?>class="active"<?php }?> >

                                            <a href="<?php echo base_url()?>index.php/Report_management/BookingReportsOfSearch">  <i class="fa fa-search"></i> Search All Booking Reports </a>

                                        </li>

                                         <li <?php if($uri2 == 'AgentsReports'){?>class="active"<?php }?>>

                                            <a href="<?php echo base_url()?>index.php/Report_management/AgentsReports"> <i class="fa fa-user"></i> Agents Reports </a>

                                        </li>

                                        <li <?php if($uri2 == 'PassengersReports'){?>class="active"<?php }?>>

                                            <a href="<?php echo base_url()?>index.php/Report_management/PassengersReports"> <i class="fa fa-users"></i> Passengers Reports </a>

                                        </li>

										

										 <li <?php if($uri2 == 'OtherReports'){?>class="active"<?php }?>>

                                            <a href="<?php echo base_url()?>index.php/Report_management/OtherReports"> <i class="fa fa-users"></i> Other Reports </a>

                                        </li>

                                       

                                    </ul>

                              </li>

                                

                                <li class="dropdown dropdown-fw dropdown-fw-disabled <?php if($uri1 == 'City_management' || $uri1 == 'Tax_management' || $uri1 == 'Vehicle_category_management' || $uri1 == 'Vehicle_management' || $uri1 == 'Oneway_city_route_list' || $uri1 == 'Backup' || $uri1 == 'Slider_management' || $uri1 == 'bookingterms'){?> active open selected <?php } ?> ">

                               

                                    <a href="javascript:;" class="text-uppercase">

                                        <i class="icon-settings"></i> SETTINGS </a>

                                    <ul class="dropdown-menu dropdown-menu-fw">

										 <li <?php if($uri1 == 'Vehicle_category_management'){?> class="active" <?php } ?>>

                                            <a href="<?php echo base_url();?>index.php/Vehicle_category_management"> <i class="fa fa-money"></i> Manage Category</a>

                                        </li>

										<li <?php if($uri1 == 'Vehicle_management'){?> class="active" <?php } ?>>

                                            <a href="<?php echo base_url();?>index.php/Vehicle_management"> <i class="fa fa-money"></i> Manage Vehicle </a>

                                        </li>

                                        <li <?php if($uri1 == 'City_management'){?> class="active" <?php } ?>>

                                            <a href="<?php echo base_url();?>index.php/City_management"> <i class="fa fa-building"></i> Manage City's </a>

                                        </li>

										<!--<li <?php //if($uri1 == 'Oneway_city_route_list'){?> class="active" <?php // } ?>>

                                            <a href="<?php //echo base_url();?>index.php/Oneway_city_route_list"> <i class="fa fa-money"></i> Oneway Route List</a>

                                        </li> -->

                                         <li <?php if($uri1 == 'Tax_management'){?> class="active" <?php } ?>>

                                            <a href="<?php echo base_url();?>index.php/Tax_management"> <i class="fa fa-money"></i> Manage TAX </a>

                                        </li>

										 <li <?php if($uri1 == 'Slider_management'){?> class="active" <?php } ?>>

                                            <a href="<?php echo base_url();?>index.php/Slider_management"> <i class="fa fa-money"></i> Manage Slider </a>

                                        </li>
                                        <li class="dropdown more-dropdown-sub">
                                            <a href="javascript:;">
                                                <i class="fa fa-money"></i> Booking Terms </a>
                                            <ul class="dropdown-menu">
                                                <li <?php if ($uri2 == 'offerterms') { echo "class='active'"; } ?> >
                                                    <a href="<?php echo base_url();?>index.php/bookingterms/offerterms/1"> Oneway Offer Terms </a>
                                                </li>
                                                <li <?php if ($uri2 == 'onewayterms') { echo "class='active'"; } ?> >
                                                    <a href="<?php echo base_url();?>index.php/bookingterms/onewayterms/2"> Oneway Terms </a>
                                                </li>
                                                <li <?php if ($uri2 == 'multicity') { echo "class='active'"; } ?> >
                                                    <a href="<?php echo base_url();?>index.php/bookingterms/multicity/3"> Multicity Terms </a>
                                                </li>
                                                <li <?php if ($uri2 == 'roundtrip') { echo "class='active'"; } ?> >
                                                    <a href="<?php echo base_url();?>index.php/bookingterms/roundtrip/4"> Round-Trip Terms </a>
                                                </li>
                                                <li <?php if ($uri2 == 'localpackage') { echo "class='active'"; } ?> >
                                                    <a href="<?php echo base_url();?>index.php/bookingterms/localpackage/5"> Local Package Terms </a>
                                                </li>
                                            </ul>
                                        </li>

										<li <?php if($uri1 == 'Backup'){?> class="active" <?php } ?>>

                                            <a href="<?php echo base_url();?>index.php/Backup"> <i class="fa fa-database"></i> Backup </a>

                                        </li>
                                         <li <?php if($uri1 == 'Gallery'){?> class="active" <?php } ?>>

                                            <a href="<?php echo base_url();?>index.php/Gallery"> <i class="fa fa-image"></i> Gallery </a>

                                        </li>

                                       

                                    </ul>

                                </li>

                                

                                

                            </ul>

                        </div>

                        <!-- END HEADER MENU -->

                    </div>

                    <!--/container-->

                </nav>

            </header>

			