<!DOCTYPE html>

<?php include 'includes/header.php'; ?>


            <div class="content-page">
                <div class="content">
                    <div class="container">
                        <div class="row">
                            <div class="card-box col-md-12">
                                <form method="POST" action="<?=base_url()?>client/consignment" autocomplete='off'>
                                <div class="form-group">
    			                    <label class="control-label col-sm-1">Select Date</label>
    			                    <div class="col-sm-9">
            			                <div class="input-daterange input-group" id="date-range">
                							<input type="text" class="form-control" name="from" />
                							<span class="input-group-addon bg-custom b-0 text-white">to</span>
                							<input type="text" class="form-control" name="to" />
            						    </div>
        			                </div>
        			                <div class="col-sm-2">
        			                    <button class="btn btn-info dropdown-toggle waves-effect waves-light" style="background-color: #9c0d00 !important;border: 1px solid #9c0d00 !important;"  type="submit">Submit</button>
        			                </div>
    			                </div>
    			                </form>
                            </div>
                        </div>
                        <div class="row">
                              <div class="card-box table-responsive">
                            <h4 class="m-t-0 header-title"><b>Bookings</b></h4>
                            <table id="datatable-buttons" class="table table-striped table-bordered">
                                <thead>
                                <tr>
                                    <th>Booking Date</th>
                                    <th>CN#</th>
                                    <th>Ref No</th>
                                    <th>Description</th>
                                    <th>Consignee Name</th>
                                    <th>Address</th>
                                    <th>Destination City</th>
                                    <th>Pieces</th>
                                    <th>Weight</th>
                                    <th>COD Amount</th>
                                    <th>Status</th>
                                    <th>Recived By</th>
                                    <th>Action</th>
                                    <!--<th>Status</th>-->
                                </tr>
                                </thead>


                                <tbody>
                                    <?php
                                        foreach($datas as $data){
                                    ?>
                                        <tr style="<?php
                                            echo 'background-color:'.$data['color_code'].' !important;';
                                           ?>">
                                           <td><?=$data['booking_date']?></td>
                                           <td><?=$data['consignment_id']?></td>
                                           <td><?=$data['consignee_ref']?></td>
                                           <td><?=$data['c_description']?></td>
                                           <td><?=$data['consignee_name']?></td>
                                           <td><?=$data['consignee_address']?></td>
                                           <td><?=$data['name']?></td>
                                           <td><?=$data['pcs']?></td>
                                           <td><?=$data['weight']?></td>
                                           <td><?=$data['cod']?></td>
                                           
                                           <td><?=$data['code']?>-<?=$data['description']?></td>
                                           <td><?=$data['recived_by']?></td>
                                           <td>
                                               <a class="btn btn-info dropdown-toggle waves-effect waves-light" style="background-color: #9c0d00 !important;border: 1px solid #9c0d00 !important;" href="<?=base_url()?>client/print_label/<?=$data['consignment_id']?>">Print Labels</a></li>
                                               <a class="btn btn-info dropdown-toggle waves-effect waves-light" style="background-color: #9c0d00 !important;border: 1px solid #9c0d00 !important;" href="<?=base_url()?>client/consignment_details/<?=$data['consignment_id']?>">Details</a></li>
                                           </td>
                                           <!--<td></td>-->
                                        </tr>
                                        <?php
                                        }
                                        ?>
                                </tbody>
                            </table>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
            

            
<?php include 'includes/footer.php';?>
<script src="<?=base_url()?>assets/plugins/moment/moment.js"></script>
<script src="<?=base_url()?>assets/plugins/timepicker/bootstrap-timepicker.js"></script>
<script src="<?=base_url()?>assets/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
<script src="<?=base_url()?>assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
<script src="<?=base_url()?>assets/plugins/clockpicker/js/bootstrap-clockpicker.min.js"></script>
<script src="<?=base_url()?>assets/plugins/bootstrap-daterangepicker/daterangepicker.js"></script>
<script src="<?=base_url()?>assets/pages/jquery.form-pickers.init.js"></script>
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