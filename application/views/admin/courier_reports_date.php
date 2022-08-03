<!DOCTYPE html>

<?php 
// print_r($datas);die; 02/07/2020
$orgDate    =   date("Y/m/d");
$newDate    =   date("m/d/Y", strtotime($orgDate));
// print_r($newDate);die;
include 'includes/header.php'; ?>
<style>
    .btn{
        margin: 2px;
    }
</style>
            <div class="content-page">
                <div class="content">
                    <div class="container">
                        <div class="row">
                           <div class="card-box table-responsive">
                            <h4 class="m-t-0 header-title"><b>Search by Date</b></h4>
                            <div class="col-md-12">
                                <form action="<?=base_url()?>admin/courier_reports" method="POST" autocomplete="off">
                                    <div class="input-daterange input-group col-md-6" id="date-range" style="float: left !important;">
                                        <span style="background-color: #9c0d00 !important; border: 1px solid #9c0d00 !important;" class="input-group-addon bg-custom b-0 text-white">From</span>
																<input type="text" class="form-control" name="start" value="<?=$newDate?>">
																<span style="background-color: #9c0d00 !important; border: 1px solid #9c0d00 !important;" class="input-group-addon bg-custom b-0 text-white">to</span>
																<input type="text" class="form-control" name="end" value="<?=$newDate?>">
															</div>
									<div class="col-md-6">
									    <button class="btn btn-info"  type="submit" style="background-color: #9c0d00 !important; border: 1px solid #9c0d00 !important;">Search</button>
                                    </div>
                                    </form>
                                </div>
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
<?php
    if($this->session->flashdata('del')){
        echo "<script>$.Notification.notify('success','top right', 'Success', 'Consignment Deleted Successfully.')</script>";
    }
    ?>