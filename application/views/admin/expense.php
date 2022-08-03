<!DOCTYPE html>

<?php include 'includes/header.php'; ?>

            <div class="content-page">
                <div class="content">
                    <div class="container">
                        <div class="row">
                            
                           <div class="card-box table-responsive">
                               <h4 class="m-t-0 header-title"><b>Search by Date</b></h4>
                               <div class="col-md-12">
                                <form action="<?=base_url()?>admin/get_expense_by_date" method="POST" autocomplete="off">
                                    <div class="input-daterange input-group col-md-10" id="date-range" style="float: left !important;">
                                        <span style="background-color: #9c0d00 !important; border: 1px solid #9c0d00 !important;" class="input-group-addon bg-custom b-0 text-white">From</span>
																<input type="text" class="form-control" name="start">
																<span style="background-color: #9c0d00 !important; border: 1px solid #9c0d00 !important;" class="input-group-addon bg-custom b-0 text-white">to</span>
																<input type="text" class="form-control" name="end">
															</div>
									<div class="col-md-2">
									    <button class="btn btn-info"  type="submit" style="background-color: #9c0d00 !important; border: 1px solid #9c0d00 !important;">Search</button>
                                    </div>
                                    </form>
                                </div>
                                <div class="col-md-12">
                                    <br>
                            <h4 class="m-t-0 header-title"><b><?php if(!empty($start)){ echo 'Showing Expense: '.$start.' - '.$end; } else{ echo 'All Expenses';}?></b></h4>
                            <table id="datatable-buttons" class="table table-striped table-bordered">
                                <thead>
                                <tr>
                                    <th>SN #</th>
                                    <th>Expenses</th>
                                    <th>Description</th>
                                    <th>Cost</th>
                                </tr>
                                </thead>


                                <tbody>
                                    <?php
                                    if(!empty($start)){
                                        $start1 = date("M-d-Y", strtotime($start));
                                        $end1 = date("M-d-Y", strtotime($end));
                                    }
                                        $count  =   1;
                                        $total_expense=0;
                                        foreach($datas as $data){
                                            
                                    ?>
                                        <tr>
                                           <td><a href="<?=base_url()?><?php if(!empty($start)){ echo 'admin/get_expenses_data_date/'.$start1.'/'.$end1.'/'.$data['ec_id']; } else{ echo 'admin/get_expenses_data/'.$data['ec_id'];}?>"><?=$count?></a></td>
                                           <td><a href="<?=base_url()?><?php if(!empty($start)){ echo 'admin/get_expenses_data_date/'.$start1.'/'.$end1.'/'.$data['ec_id']; } else{ echo 'admin/get_expenses_data/'.$data['ec_id'];}?>"><?=$data['name']?></a></td>
                                           <td><a href="<?=base_url()?><?php if(!empty($start)){ echo 'admin/get_expenses_data_date/'.$start1.'/'.$end1.'/'.$data['ec_id']; } else{ echo 'admin/get_expenses_data/'.$data['ec_id'];}?>"><?=$data['description']?></a></td>
                                           <td><a href="<?=base_url()?><?php if(!empty($start)){ echo 'admin/get_expenses_data_date/'.$start1.'/'.$end1.'/'.$data['ec_id']; } else{ echo 'admin/get_expenses_data/'.$data['ec_id'];}?>"><?=$data['SUM(expense.cost)']?></a></td>
                                           <?php
                                           $total_expense    =   $total_expense+$data['SUM(expense.cost)'];
                                           ?>
                                        </tr>
                                        <?php
                                        $count++;
                                        }
                                        ?>
                                        
                                </tbody>
                                <tr>
                                            
                                            <td colspan="2"><center><b>TOTAL</b></center></td>
                                            <td>Cash in Account: <?=$cash_in_account[0]['money']?></td>
                                            <td><?=$total_expense?></td>
                                            <?php
                                            $profit_loss    =   $cash_in_account[0]['money']-$total_expense;
                                            ?>
                                        </tr>
                                        <tr>
                                            <td colspan=2><center><b>
                                                <?php
                                                if($profit_loss<=0)
                                            {
                                                echo 'Loss';
                                            }
                                            else
                                            {
                                                echo 'Profit';
                                            }
                                            ?>
                                            </center></b>
                                            </td>
                                            <td colspan=2 style="border-bottom: 1px solid black; <?php
                                            if($profit_loss<=0)
                                            {
                                                echo 'background: #ff000026;';
                                                
                                            }
                                            else
                                            {
                                                echo 'background: #00ff5a26;';
                                            }
                                            ?>"><center><?=$cash_in_account[0]['money']-$total_expense?></center></td>
                                        </tr>
                            </table>
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
    if($this->session->flashdata('Saved')){
        echo "<script>$.Notification.notify('success','top right', 'Success', 'Client Deleted Successfully.')</script>";
    }
    ?>