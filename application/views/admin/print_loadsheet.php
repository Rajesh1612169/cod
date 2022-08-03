<!DOCTYPE html> 
<?php include 'includes/header.php'; ?>

<style>
    .page-break{
        page-break-after: always;
    }
</style>
<div class="col-md-12">
    <div class="col-md-12">
        <img src="<?=base_url()?>/assets/images/logo4.png" style="height: 50px; margin-top: 25px;"><br>
    </div>
    <div class="col-md-12">
        <b class="pull-right">Shipper's Copy</b>
    </div>
    <div class="col-md-12" align="center">
        <b><u style="font-size: 31px;">Loadsheet</u></b>
    </div>
    <div class="col-md-12">
        <p>Sheet No: <?=$datas[0]['loadsheet_cconsignment_id']?></p>
        <p>Date: <?=$datas[0]['date']?></p>
        <p>Customer: <?=$client[0]['company_name']?> (<?=$client[0]['name']?>)</p>
    </div>
    <table style="width: 100%;" border="1">
                                <thead>
                                <tr>
                                    <th>Sr.No. </th>
                                    <th>Consignment No#</th>
                                    <th>Booking Date</th>
                                    <th>Consignee</th>
                                    <th>Address</th>
                                    <th>Destination</th>
                                    <th>Reference</th>
                                    <th>COD</th>
                                </tr>
                                </thead>


                                <tbody>
                                    <?php  $COD=0;
                                        $weight=0;
                                        $pcs=0;
                                        $count=1;
                                        foreach($datas as $data){
                                    ?>
                                        <tr>
                                           <td><?=$count?></td>
                                           <td><?=$data['consignment_id']?></td>
                                           <td><?=$data['booking_date']?></td>
                                           <td><?=$data['consignee_name']?></td>
                                           <td><?=$data['consignee_address']?></td>
                                           <td><?=$data['city_name']?></td>
                                           <td><?=$data['consignee_ref']?></td>
                                           <td>
                                               <?=$data['cod']?>
                                            </td>
                                            <?php $COD +=$data['cod']; ?>
                                        </tr>
                                        <?php
                                        $count++;
                                        }
                                        ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="7"><center><b>TOTAL</b></center></td>
                                        <td><?=$COD?></td>
                                    </tr>
                                </tfoot>
</table>

<div class="col-md-12 page-break" style="margin-top:100px">
    <div class="col-md-2 pull-left">
        <hr style="border-top: 2px solid #000 !important;">
        <center>Customer name & signature</center>
    </div>
    <div class="col-md-2 pull-right">
        <hr style="border-top: 2px solid #000 !important;">
        <center>Courier name & signature</center>
    </div>
</div>
</div>
<div class="col-md-12">
    <div class="col-md-12">
        <img src="<?=base_url()?>/assets/images/logo4.png" style="height: 50px; margin-top: 25px;"><br>
    </div>
    <div class="col-md-12">
        <b class="pull-right">Parcel Master's Copy</b>
    </div>
    <div class="col-md-12" align="center">
        <b><u style="font-size: 31px;">Loadsheet</u></b>
    </div>
    <div class="col-md-12">
        <p>Sheet No: <?=$datas[0]['loadsheet_cconsignment_id']?></p>
        <p>Date: <?=$datas[0]['date']?></p>
        <p>Customer: <?=$client[0]['company_name']?> (<?=$client[0]['name']?>)</p>
    </div>
    <table style="width: 100%;" border="1">
                                <thead>
                                <tr>
                                    <th>Sr.No. </th>
                                    <th>Consignment No#</th>
                                    <th>Booking Date</th>
                                    <th>Origin</th>
                                    <th>Consignee</th>
                                    <th>Destination</th>
                                    <th>Reference</th>
                                    <th>COD</th>
                                    <th>Pieces</th>
                                    <th>Wieght</th>
                                </tr>
                                </thead>


                                <tbody>
                                    <?php  $COD=0;
                                        $weight=0;
                                        $pcs=0;
                                        $count=1;
                                        foreach($datas as $data){
                                    ?>
                                        <tr>
                                           <td><?=$count?></td>
                                           <td><?=$data['consignment_id']?></td>
                                           <td><?=$data['booking_date']?></td>
                                           <td>KARACHI</td>
                                           <td><?=$data['consignee_name']?></td>
                                           <td><?=$data['city_name']?></td>
                                           <td><?=$data['consignee_ref']?></td>
                                           <td>
                                               <?=$data['cod']?>
                                            </td>
                                            <? $COD +=$data['cod']; ?>
                                           <td><?=$data['pcs']?></td>
                                           <? $pcs  +=   $data['pcs']; ?>
                                           <td><?=$data['weight']?></td>
                                           <? $weight += $data['weight']; ?>
                                        </tr>
                                        <?php
                                        $count++;
                                        }
                                        ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="7"><center><b>TOTAL</b></center></td>
                                        <td><?=$COD?></td>
                                        <td><?=$pcs?></td>
                                        <td><?=$weight?></td>
                                    </tr>
                                </tfoot>
</table>

<div class="col-md-12" style="margin-top:100px">
    <div class="col-md-2 pull-left">
        <hr style="border-top: 2px solid #000 !important;">
        <center>Customer name & signature</center>
    </div>
    <div class="col-md-2 pull-right">
        <hr style="border-top: 2px solid #000 !important;">
        <center>Courier name & signature</center>
    </div>
</div>
</div>
                     
<?php include 'includes/footer.php';?>
<script type="text/javascript">
    $(document).ready(function () {
        $('#datatable').dataTable();
        $('#datatable-keytable').DataTable({keys: true});
        $('#datatable-responsive').DataTable();
        $('#datatable-colvid').DataTable({
            "dom": 'C<"clear">lfrtip',
            "colVis": {
                "buttonText": "Change columns"
            }
        });
        $('#datatable-scroller').DataTable({
            ajax: "assets/plugins/datatables/json/scroller-demo.json",
            deferRender: true,
            scrollY: 380,
            scrollCollapse: true,
            scroller: true
        });
        var table = $('#datatable-fixed-header').DataTable({fixedHeader: true});
        var table = $('#datatable-fixed-col').DataTable({
            scrollY: "300px",
            scrollX: true,
            scrollCollapse: true,
            paging: true,
            fixedColumns: {
                leftColumns: 1,
                rightColumns: 1
            }
        });
    });
    TableManageButtons.init();

</script>
<script type="text/javascript">   
     $(window).load(function() {
      //This execute when entire finished loaded
      window.print();
    });
</script>
