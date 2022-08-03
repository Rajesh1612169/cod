<!DOCTYPE html>
<?php include 'includes/header.php'; ?>

            <div class="content-page">
                <div class="content">
                    <div class="container">
                        <div class="row">
                           <div class="card-box table-responsive">
                            <h4 class="m-t-0 header-title"><b>New Client Requests</b></h4>
                            <table id="datatable-buttons" class="table table-striped table-bordered">
                                <thead>
                                <tr>
                                    <th>SN #</th>
                                    <th>Company Name</th>
                                    <th>Name</th>
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
                                           <td><?=$data['company_name']?></td>
                                           <td><?=$data['name']?></td>
                                           <td>
                                               <a class="btn btn-info" style="background-color: #9c0d00 !important;border: 1px solid #9c0d00 !important;" href="<?=base_url()?>admin/edit_request_client/<?=$data['c_id']?>">Edit</a>
                                                <a class="btn btn-info" style="background-color: #9c0d00 !important;border: 1px solid #9c0d00 !important;" href="<?=base_url()?>admin/delete_client_requests/<?=$data['c_id']?>">Delete</a>
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
        echo "<script>$.Notification.notify('success','top right', 'Success', 'City Deleted Successfully.')</script>";
    }
    ?>