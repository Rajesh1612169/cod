<!--<html>-->
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="Recreatepk.com">
        <link rel="shortcut icon" href="<?=base_url()?>assets/images/icon.png">
        <title>Redx Courier | Client</title>

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


        <script src="<?=base_url()?>assets/js/modernizr.min.js"></script>
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

    </head>

                        
<!--<a  class="no-print" href="<?=base_url()?>"><img class="no-print img-responsive" src="<?=base_url()?>assets/images/rc-tcs.png" style="height: 120px;margin-top: 21px;margin-bottom: 21px;"></a>-->
    <body class="fixed-left">

        <!-- Begin page -->
        <div id="wrapper">

            <!-- Top Bar Start -->
            <div class="topbar">

                <!-- LOGO -->
               <div class="topbar-left hidden-xs hidden-sm hidden-md" style="width: 300px;">
                    <div class="text-center">
                        <a href="<?=base_url()?>" class="logo"><span><img src="<?=base_url()?>assets/images/dd-logo.png" style="height: 50px;"/></a>
                    </div>
                </div>

                <!-- Button mobile view to collapse sidebar menu -->
                <div class="no-print" class="navbar navbar-default" role="navigation" style="background-color: #9c0d00;">
                    <div class="container">
                        <div class="">
                            <ul class="nav navbar-nav">
                                <li>
                                    <a class="hover-item" href="<?=base_url()?>Client">Dashboard</a>
                                </li>
                            </ul>
                            <ul class="nav navbar-nav">
                                <!--<li><a href="#" class="waves-effect waves-light">Files</a></li>-->
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle waves-effect waves-light hover-item" data-toggle="dropdown"
                                       role="button" aria-haspopup="true" aria-expanded="false">Bookings <span
                                            class="caret"></span></a>
                                    <ul class="dropdown-menu">
                                        <li><a href="<?=base_url()?>Client/add_booking_show">Create Booking</a></li>
                                        <li><a href="<?=base_url()?>Client/open_finalize_booking">Finalize Booking</a></li>
                                        <li><a href="<?=base_url()?>Client/loadsheet">Loadsheets</a></li>
                                        <li><a href="<?=base_url()?>Client/consignment">All Booking</a></li>
                                        <li><a href="<?=base_url()?>Client/import">Import Bookings</a></li>
                                    </ul>
                                </li>
                                
                            </ul>
                             <ul class="nav navbar-nav">
                                <li>
                                    <a class="hover-item" href="<?=base_url()?>client/invoice">Invoices</a>
                                </li>
                            </ul>
                            <ul class="nav navbar-nav">
                                <li>
                                    <a class="hover-item" href="<?=base_url()?>client/report">Reports</a>
                                </li>
                            </ul>
                            

                           


                            <ul class="nav navbar-nav navbar-right pull-right">
                                <form role="search" class="navbar-left app-search pull-left hidden-xs" action="<?=base_url()?>client/tracking" method="POST" id="search">
                                            
            			                     <input type="text" name="cn" placeholder="Track Shipment..." class="form-control" style="background: #ffffff;color: #000000;">
            			                     <a onclick="document.getElementById('search').submit()" href="#"><i class="fa fa-search"></i></a>
            			                </form>
                                <li class="hidden-xs">
                                    <a href="#" id="btn-fullscreen" class="waves-effect waves-light"><i class="icon-size-fullscreen"></i></a>
                                </li>
                                <li class="dropdown top-menu-item-xs">
                                    <a href="" class="dropdown-toggle profile waves-effect waves-light" data-toggle="dropdown" aria-expanded="true"><i class="glyphicon glyphicon-user"></i></a>
                                    <ul class="dropdown-menu">
                                        <li><a href="<?=base_url()?>client/profile"><i class="ti-settings m-r-10 text-custom"></i> Settings</a></li>
                                        
                                        <li class="divider"></li>
                                        <li><a href="<?=base_url()?>client/signout"><i class="ti-power-off m-r-10 text-danger"></i> Logout</a></li>
                                    </ul>
                                </li>
                            </ul>
                            
                        </div>
                        <!--/.nav-collapse -->
                    </div>
                </div>
            </div>
            <!-- Top Bar End -->
