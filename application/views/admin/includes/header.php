<?php
$data   =   $this->db->query("select COUNT(c_id) from client_request")->result_array();
?>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="recreatepk.com">
        <link rel="shortcut icon" href="<?=base_url()?>assets/images/icon.png">
        <title>Courier System| Admin</title>

        <!--Morris Chart CSS -->
		<link rel="stylesheet" href="<?=base_url()?>assets/plugins/morris/morris.css">

        <link href="<?=base_url()?>assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="<?=base_url()?>assets/css/core.css" rel="stylesheet" type="text/css" />
        <link href="<?=base_url()?>assets/css/components.css" rel="stylesheet" type="text/css" />
        <link href="<?=base_url()?>assets/css/icons.css" rel="stylesheet" type="text/css" />
        <link href="<?=base_url()?>assets/css/pages.css" rel="stylesheet" type="text/css" />
        <link href="<?=base_url()?>assets/css/responsive.css" rel="stylesheet" type="text/css" />
        <!--DATATABLE-->
        <link href="<?=base_url()?>assets/plugins/datatables/jquery.dataTables.min.css" rel="stylesheet" type="text/css"/>
        <link href="<?=base_url()?>assets/plugins/datatables/buttons.bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="<?=base_url()?>assets/plugins/datatables/fixedHeader.bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="<?=base_url()?>assets/plugins/datatables/responsive.bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="<?=base_url()?>assets/plugins/datatables/scroller.bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="<?=base_url()?>assets/plugins/datatables/dataTables.colVis.css" rel="stylesheet" type="text/css"/>
        <link href="<?=base_url()?>assets/plugins/datatables/dataTables.bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="<?=base_url()?>assets/plugins/datatables/fixedColumns.dataTables.min.css" rel="stylesheet" type="text/css"/>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <link rel="stylesheet" href="<?=base_url()?>assets/calendar/calendar.css" />
<script src="<?=base_url()?>assets/calendar/calendar.js"></script>
        <script src="<?=base_url()?>assets/js/modernizr.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment-with-locales.min.js" ></script>
<!-- Without locals-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js" ></script>
<link rel="stylesheet" href="<?=base_url()?>assets/calender/dist/tavo-calendar.css" />
<script src="<?=base_url()?>assets/calender/dist/tavo-calendar.js"></script>
    </head>
    <style>
        @media print
            {    
                .no-print, .no-print *
                {
                    display: none !important;
                }
            }
    </style>
    <style>
            .hover-item:hover {
            	background-color: #000 !important;
            }
            .hover-item:focus {
            	background-color: #000 !important;
            }
            .hover-item:focus-within {
            	background-color: #000 !important;
            }
    </style>

                        
    <!--<a class="no-print" href="<?=base_url()?>admin"><img class="no-print img-responsive" src="<?=base_url()?>assets/images/dd-logo.png" style="height: 100px; padding: 10px; margin-top: 21px;margin-bottom: 21px;"></a>-->
    
    <body class="fixed-left">

        <!-- Begin page -->
        <div id="wrapper">

            <!-- Top Bar Start -->
            <div class="topbar">

                <!-- LOGO -->
                <div class="topbar-left hidden-xs hidden-sm hidden-md" style="width: 300px;">
                    <div class="text-center">
                        <!--<a href="<?=base_url()?>" class="logo"><span><img src="<?=base_url()?>assets/images/dd-logo.png" style="height: 50px;"/></a>-->
                    </div>
                </div>

                <!-- Button mobile view to collapse sidebar menu -->
                <div class="navbar navbar-default class="no-print"" role="navigation" style="background-color:#9c0d00;">
                    <div class="container">
                        <div class="">
                            
                             <ul class="nav navbar-nav">
                                <li>
                                    <a class="hover-item" href="<?=base_url()?>Admin">Dashboard</a>
                                </li>
                            </ul>
                             <ul class="nav navbar-nav">
                                <li>
                                    <a class="hover-item" href="<?=base_url()?>admin/arrival">Arrival</a>
                                </li>
                            </ul>

                            <ul class="nav navbar-nav">
                                <!--<li><a href="#" class="waves-effect waves-light">Files</a></li>-->
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle waves-effect waves-light hover-item" data-toggle="dropdown"
                                       role="button" aria-haspopup="true" aria-expanded="false">Bookings <span
                                            class="caret"></span></a>
                                    <ul class="dropdown-menu">
                                        <li><a href="<?=base_url()?>admin/add_booking">Create Booking</a></li>
                                        <li><a href="<?=base_url()?>admin/booking_date">All Bookings</a></li>
                                        <li><a href="<?=base_url()?>admin/loadsheet">Loadsheet</a></li>
                                        <li><a href="<?=base_url()?>admin/import">Import Bookings</a></li>
                                    </ul>
                                </li>
                            </ul>
                              <ul class="nav navbar-nav">
                                <!--<li><a href="#" class="waves-effect waves-light">Files</a></li>-->
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle waves-effect waves-light hover-item" data-toggle="dropdown"
                                       role="button" aria-haspopup="true" aria-expanded="false">Client <span
                                            class="caret"></span></a>
                                    <ul class="dropdown-menu">
                                        <li><a href="<?=base_url()?>admin/add_client">Create Client</a></li>
                                        <li><a href="<?=base_url()?>admin/clients">All Clients</a></li>
                                         <li><a href="<?=base_url()?>admin/clients_leads">Clients Leads</a></li>
                                        <li><a href="<?=base_url()?>admin/client_request">Client Request <span class="label label-pink"><?=$data[0]['COUNT(c_id)']?></span></a></li>
                                    </ul>
                                </li>
                            </ul>
                             <ul class="nav navbar-nav">
                                <!--<li><a href="#" class="waves-effect waves-light">Files</a></li>-->
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle waves-effect waves-light hover-item" data-toggle="dropdown"
                                       role="button" aria-haspopup="true" aria-expanded="false">Statuses <span
                                            class="caret"></span></a>
                                    <ul class="dropdown-menu">
                                        <li><a href="<?=base_url()?>admin/add_status">Create Status</a></li>
                                        <li><a href="<?=base_url()?>admin/status">All Status</a></li>
                                    </ul>
                                </li>
                            </ul>
                              <ul class="nav navbar-nav">
                                <!--<li><a href="#" class="waves-effect waves-light">Files</a></li>-->
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle waves-effect waves-light hover-item" data-toggle="dropdown"
                                       role="button" aria-haspopup="true" aria-expanded="false">Invoicing <span
                                            class="caret"></span></a>
                                    <ul class="dropdown-menu">
                                        <li><a href="<?=base_url()?>admin/add_invoice">Create Invoice</a></li>
                                        <li><a href="<?=base_url()?>admin/invoice">All Invoice</a></li>
                                    </ul>
                                </li>
                            </ul>
                             <ul class="nav navbar-nav">
                                <!--<li><a href="#" class="waves-effect waves-light">Files</a></li>-->
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle waves-effect waves-light hover-item" data-toggle="dropdown"
                                       role="button" aria-haspopup="true" aria-expanded="false">Cities <span
                                            class="caret"></span></a>
                                    <ul class="dropdown-menu">
                                        <li><a href="<?=base_url()?>admin/add_city">Create City</a></li>
                                        <li><a href="<?=base_url()?>admin/city">All Cities</a></li>
                                    </ul>
                                </li>
                            </ul>
                             <ul class="nav navbar-nav">
                                <!--<li><a href="#" class="waves-effect waves-light">Files</a></li>-->
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle waves-effect waves-light hover-item" data-toggle="dropdown"
                                       role="button" aria-haspopup="true" aria-expanded="false">Courier <span
                                            class="caret"></span></a>
                                    <ul class="dropdown-menu">
                                        <li><a href="<?=base_url()?>admin/add_courier">Create Courier</a></li>
                                        <li><a href="<?=base_url()?>admin/courier">All Courier</a></li>
                                        <li><a href="<?=base_url()?>admin/print_delivery_sheet">Print Delivery Sheets</a></li>
                                        <li><a href="<?=base_url()?>admin/courier_settlement">Courier Settlement</a></li>
                                        <li><a href="<?=base_url()?>admin/courier_reports_date">Courier Reports</a></li>
                                    </ul>
                                </li>
                            </ul>
                            <ul class="nav navbar-nav">
                                <!--<li><a href="#" class="waves-effect waves-light">Files</a></li>-->
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle waves-effect waves-light hover-item" data-toggle="dropdown"
                                       role="button" aria-haspopup="true" aria-expanded="false">News <span
                                            class="caret"></span></a>
                                    <ul class="dropdown-menu">
                                        <li><a href="<?=base_url()?>admin/add_news">Create News</a></li>
                                        <li><a href="<?=base_url()?>admin/news">All News</a></li>
                                    </ul>
                                </li>
                            </ul>
                            <ul class="nav navbar-nav">
                                <!--<li><a href="#" class="waves-effect waves-light">Files</a></li>-->
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle waves-effect waves-light hover-item" data-toggle="dropdown"
                                       role="button" aria-haspopup="true" aria-expanded="false">Expense <span
                                            class="caret"></span></a>
                                    <ul class="dropdown-menu">
                                        <li><a href="<?=base_url()?>admin/add_expense_category">Add Expense Category</a></li>
                                        <li><a href="<?=base_url()?>admin/expense_category">Expense Category</a></li>
                                        <li><a href="<?=base_url()?>admin/add_expense">Add Expense</a></li>
                                        <li><a href="<?=base_url()?>admin/expense">All Expenses</a></li>
                                    </ul>
                                </li>
                            </ul>
                           <ul class="nav navbar-nav">
                                <!--<li><a href="#" class="waves-effect waves-light">Files</a></li>-->
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle waves-effect waves-light hover-item" data-toggle="dropdown"
                                       role="button" aria-haspopup="true" aria-expanded="false">Accounts <span
                                            class="caret"></span></a>
                                    <ul class="dropdown-menu">
                                        <li><a href="<?=base_url()?>admin/add_money_account">Add Money to Account</a></li>
                                    </ul>
                                </li>
                            </ul>


                            <ul class="nav navbar-nav navbar-right pull-right">
                                <form role="search" class="navbar-left app-search pull-left hidden-xs" action="<?=base_url()?>admin/tracking" method="POST" id="search">
            			                     <input type="text" name="cn" placeholder="Track Shipment..." class="form-control" style="background: #ffffff;color: #000000;" required>
            			                     <a onclick="document.getElementById('search').submit()" href="#"><i class="fa fa-search"></i></a>
            			                </form>
                                <li class="hidden-xs">
                                    <a href="#" id="btn-fullscreen" class="waves-effect waves-light"><i class="icon-size-fullscreen"></i></a>
                                </li>
                                
                                <li class="dropdown top-menu-item-xs">
                                    <a href="" class="dropdown-toggle profile waves-effect waves-light" data-toggle="dropdown" aria-expanded="true"><i class="glyphicon glyphicon-user"></i></a>
                                    <ul class="dropdown-menu">
                                        
                                        <li><a href="<?=base_url()?>admin/profile"><i class="ti-settings m-r-10 text-custom"></i> Settings</a></li>
                                        
                                        <li class="divider"></li>
                                        <li><a href="<?=base_url()?>admin/signout"><i class="ti-power-off m-r-10 text-danger"></i> Logout</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <!--/.nav-collapse -->
                    </div>
                </div>
            </div>
            <!-- Top Bar End -->
            
