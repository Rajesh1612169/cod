<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="Recreatepk.com">
        <link rel="shortcut icon" href="<?=base_url()?>assets/images/logo.png">

        <title>Parcel Master | Tracking</title>

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

      


    </head>

                        
<a class="no-print" href="<?=base_url()?>"><img class="no-print" src="<?=base_url()?>assets/images/logo.png" style="margin-top: 21px;margin-bottom: 21px;"></a>
    <body class="fixed-left">

        <!-- Begin page -->
        <div id="wrapper">


            <div class="content-page">
                <div class="content">
                    <div class="container">
                        <div class="card-box">
                        <div class="row">
                            	<div class="col-md-12">
                        			<h3 class="card-title" style="color: #9c0d00;"><i class="glyphicon glyphicon-list"></i> Details of CN# <?=$datas['0']['consignment_id']?> Booked on <?=$datas['0']['booking_date']?></h3>
                        			<hr>
	                                <div class="form-group col-md-6">
	                                   <label class="col-md-6 control-label">Consignee Name: </label>
	                                   <div class="col-md-6">
	                                    <?=$datas['0']['consignee_name']?>
	                                   </div>
	                               </div>
	                               
	                               <div class="form-group col-md-6">
	                                   <label class="col-md-6 control-label">Description: </label>
	                                   <div class="col-md-6">
	                                    <?=$datas['0']['c_description']?>
	                                   </div>
	                               </div>
	                               <div class="form-group col-md-6">
	                                   <label class="col-md-6 control-label">COD: </label>
	                                   <div class="col-md-6">
	                                    <?=$datas['0']['cod']?>
	                                   </div>
	                               </div>
	                                <div class="form-group col-md-6">
	                                   <label class="col-md-6 control-label">Recived By: </label>
	                                   <div class="col-md-6">
	                                    <?=$datas['0']['recived_by']?>
	                                   </div>
	                               </div>
	                                <div class="form-group col-md-6">
	                                   <label class="col-md-6 control-label">Status: </label>
	                                   <div class="col-md-6">
	                                    <?=$datas['0']['code']?>-<?=$datas['0']['description']?>
	                                   </div>
	                               </div>
	                               
	                           </div>
                        </div>
                        
                        </div>
                        <div class="card-box">
                            <div class="row">
                                <div class="col-md-12">
                                    <center><h3 class="card-title" style="color: #9c0d00;">Tracking Details of CN# <?=$datas['0']['consignment_id']?> Booked on <?=$datas['0']['booking_date']?></h3></center>
                                    <table id="datatable-buttons" class="table table-striped table-bordered">
                                        <thead>
                                        <tr>
                                            <th>Sr.no.</th>
                                            <th>Date/Time</th>
                                            <th>Status</th>
                                            
                                            
                                            <!--<th>Status</th>-->
                                        </tr>
                                        </thead>
                                        <tbody>
                                    <?php
                                        $count  =   1;
                                        foreach($trackings as $tracking){
                                    ?>
                                        <tr>
                                           <td><?=$count?></td>
                                           <td><?=$tracking['time_date']?></td>
                                           <td><?=$tracking['code']?> - <?=$tracking['description']?></td>
                                           
                                        </tr>
                                        <?php
                                        $count++;
                                        }
                                        ?>
                                </tbody>
                                </table>
            	                </div>
            	           </div>
        	           </div>
                    </div>
                </div>
            </div>
            
<?php include 'includes/footer.php';?>