<?php
// print_r($datas);die;
?>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="Recreatepk.com">

        <link rel="shortcut icon" href="<?=base_url()?>assets/images/icon.png">

        <title>Parcel Master | Client</title>

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

        <!-- HTML5 Shiv and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->

        <script src="<?=base_url()?>assets/js/modernizr.min.js"></script>
        <style>
            .page-break{
        page-break-after: always;
    }
        </style>
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
        @media print
            {    
                .no-print, .no-print *
                {
                    display: none !important;
                }
                .table-bordered > thead > tr > th,
                .table-bordered > tbody > tr > th,
                .table-bordered > tfoot > tr > th,
                .table-bordered > thead > tr > td,
                .table-bordered > tbody > tr > td,
                .table-bordered > tfoot > tr > td {
                  border: 1px solid black !important;
                  font-size: 12px !important;
                  padding: 4px;
                  
                }
            }
        .table-bordered > thead > tr > th,
        .table-bordered > tbody > tr > th,
        .table-bordered > tfoot > tr > th,
        .table-bordered > thead > tr > td,
        .table-bordered > tbody > tr > td,
        .table-bordered > tfoot > tr > td {
          border: 1px solid black !important;
          color: black;
          
        }
        .table {
            background-color: #fff0 !important;
        }
    </style>
</head>
<body onload="window.print()">
<?php
$count=1;
foreach($datas as $data)
{
?>

<div class="content-page <?php if($count==2){echo "page-break";} ?>">
    <div class="content" style="margin-top: 0px !important; margin-bottom: 0px !important;">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <table class="table table-bordered">
    					    <tr>
    					        <td>
    					            <img src="<?=base_url('assets/images/logo4.png')?>" style="height: 50px; margin-top: 25px;"><br><br>
    					            <img src="<?=base_url('assets/images/barcode.png')?>" height='50' width='100'><br>
    					            <span style=''><?= $data['consignment_id']?></span>
    					        </td>
    					        <td>
    					        <table class="table table-bordered">
    					                <tr>
                					        <td>Date</td>
                					        <td><?=$data['booking_date']?></td>
                					        <td>Pieces</td>
                					        <td><?=$data['pcs']?></td>
                					   </tr>
                					   <tr>
                					        <td>Weight</td>
                					        <td><?=$data['weight']?></td>
                					        <td>Fragile</td>
                					        <td>No</td>
                					   </tr>
                					   <tr>
                					        <td>Origin</td>
                					        <td>KARACHI</td>
                					        <td>Destination</td>
                					        <td><b><?=$data['city_name']?></b></td>
                					   </tr>
                					   <tr>
                					        <td><b>COD Amount</b></td>
                					        <td><b>Rs.<?=$data['cod']?>/-</b></td>
                					        <td>Decld. Ins. Value</td>
                					        <td>Rs. 0 /-</td>
                					   </tr>
            					        
    					        </table>
    					        </td>
    					    </tr>
    					    <tr>
    					       <td>
    					            Shiper: <?=$data['company_name']?> <?=$data['number']?><br>
    					            Address: <?=$data['p_address']?><br>
    					            Return Address: <?=$data['r_address']?>
    					       </td>
    					       <td>
    					           Consignee: <?=$data['consignee_name']?> <?=$data['consignee_number']?><br>
    					           <?=$data['consignee_address']?>, <?=$data['city_name']?>
    					       </td>
    					    </tr>
    					    <tr>
    					        <td>
    					            <table class="table table-bordered">
    					                <tr>
    					                    <td>Customer Reference #</td>
    					                    <td><?=$data['consignee_ref']?></td>
    					                </tr>
    					            </table>
    					        </td>
    					        <td>
    					            <table class="table table-bordered">
    					                <tr>
    					                    <td>Remarks</td>
    					                    <td><?=$data['remark']?></td>
    					                </tr>
    					            </table>
    					        </td>
    					    </tr>
    					    <tr>
    					        <td colspan="2">
    					            Product Details: <?=$data['c_description']?>
    					        </td>
    					    </tr>
    				</table>
    				<hr style="border-top: 1px dotted #000;">
                </div>                    
            </div>
        </div>
    </div>
</div>
<?php
if($count==2){
    $count=0;
}
$count++;
}
?>

</body>
</html>