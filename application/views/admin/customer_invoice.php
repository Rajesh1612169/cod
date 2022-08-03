<!DOCTYPE html>
<?php include 'includes/header.php'; ?>

            <div class="content-page">
                <div class="content">
                    <div class="container">
                        <div class="row">
                           <div class="card-box table-responsive">
                            <h4 class="m-t-0 header-title"><b>Invoices</b></h4>
                            <table id="datatable" class="table table-striped table-bordered">
                                <thead>
                                <tr>
                                    <th>SN #</th>
                                    <th>Invoice #</th>
                                    <th>Date</th>
                                    <th>Company Name</th>
                                    <th>Name</th>
                                    <th>Cost</th>
                                    <th>Change Status</th>
                                    <th>Action</th>
                                </tr>
                                </thead>


                                <tbody>
                                    <?php
                                        $count  =   1;
                                        foreach($datas as $data){
                                    ?>
                                        <tr>
                                           <td><?=$count?></td>
                                           <td><?=$data['ci_id']?></td>
                                           <td><?=date("d-m-Y", strtotime($data['date']));?></td>
                                           <td><?=$data['company_name']?></td>
                                           <td><?=$data['name']?></td>
                                           <td><?=$data['total_cost']?></td>
                                           <td>
                                               <?php if($data['status']=='1'){
                                                ?>
                                                <a href="<?=base_url()?>admin/pay_invoice/<?=$data['status']?>/<?=$data['ci_id']?>"><span class="label label-table label-success">Paid</span></a>
                                                <?php
                                               }else{
                                               ?>
                                               <a href="<?=base_url()?>admin/pay_invoice/<?=$data['status']?>/<?=$data['ci_id']?>"><span class="label label-table label-warning">Unpaid</span></a>
                                               <?php
                                               }
                                               ?>
                                           </td>
                                           <td>
                                               <a class="btn btn-info" style="background-color: #f6c72c !important;border: 1px solid #f6c72c !important;" href="<?=base_url()?>admin/print_invoice/<?=$data['ci_id']?>">View</a>
                                               <a class="btn btn-info" style="background-color: #f6c72c !important;border: 1px solid #f6c72c !important;" href="<?=base_url()?>admin/delete_invoice/<?=$data['ci_id']?>">Delete</a>
                                           </td>
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
    if($this->session->flashdata('del')){
        echo "<script>$.Notification.notify('success','top right', 'Success', 'Invoice Deleted Successfully.')</script>";
    }
    ?>
     <?php
    if($this->session->flashdata('changed')){
        echo "<script>$.Notification.notify('success','top right', 'Success', 'Status Changed Successfully.')</script>";
    }
    ?>