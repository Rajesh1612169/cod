<!DOCTYPE html>

<?php include 'includes/header.php'; ?>

            <div class="content-page">
                <div class="content">
                    <div class="container">
                        <div class="card-box">
                        <div class="row">
                            	<div class="col-md-12">
                        			<h3 class="card-title" style="color: #f6c72c;"><i class="glyphicon glyphicon-list"></i> Details of CN# <?=$datas['0']['consignment_id']?> Booked on <?=$datas['0']['booking_date']?></h3>
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
                        <div class="row">
                           <div class="card-box table-responsive">
                            <h4 class="m-t-0 header-title"><b>Consignment History</b></h4>
                            <table id="datatable-buttons" class="table table-striped table-bordered">
                                <thead>
                                <tr>
                                    <th>Date/Time</th>
                                    <th>Status</th>
                                </tr>
                                </thead>


                                <tbody>
                                    <?php
                                        foreach($trackings as $tracking){
                                    ?>
                                        <tr>
                                           
                                           <td><?=$tracking['time_date']?></td>
                                           <td><?=$tracking['code']?>-<?=$tracking['description']?></td>
                                           
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
    if($this->session->flashdata('changed')){
        echo "<script>$.Notification.notify('success','top right', 'Success', 'Status Changed Successfully.')</script>";
    }
    ?>