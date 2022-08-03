<!DOCTYPE html>

<?php include 'includes/header.php'; ?>

            <div class="content-page">
                <div class="content">
                    <div class="container">
                        <div class="row">
                           <div class="card-box table-responsive">
                            <h4 class="m-t-0 header-title"><b>All Bookings</b></h4>
                            <table id="datatable-buttons" class="table table-striped table-bordered">
                                <thead>
                                <tr>
                                    <th>Sn #</th>
                                    <th>Code</th>
                                    <th>Description</th>
                                    <th>Color Code</th>
                                    <th>Action</th>
                                </tr>
                                </thead>


                                <tbody>
                                    <?php
                                        $count=1;
                                        foreach($datas as $data){
                                    ?>
                                        <tr>
                                           <td><?=$count?></td>
                                           <td><?=$data['code']?></td>
                                           <td><?=$data['description']?></td>
                                           <td style="<?php
                                            echo 'background-color:'.$data['color_code'];
                                           ?>">Text Display</td>
                                           <td>
                                               <?php
                                                    if($data['s_id']=='1' || $data['s_id']=='2' || $data['s_id']=='11' || $data['s_id']=='7'){
                                                ?>
                                                <p>Default Statuses</p>
                                                <?php
                                                    }
                                                    else{
                                                ?>
                                               <div class="btn-group">
                                                    <button type="button" class="btn btn-info dropdown-toggle waves-effect waves-light" style="background-color: #9c0d00 !important;border: 1px solid #9c0d00 !important;" data-toggle="dropdown" aria-expanded="false">Action <span class="caret"></span></button>
                                                    <ul class="dropdown-menu" role="menu">
                                                        <li><a href="<?=base_url()?>admin/edit_status/<?=$data['s_id']?>">Edit</a></li>
                                                        <li><a href="<?=base_url()?>admin/delete_status/<?=$data['s_id']?>">Delete</a></li>
                                                        <!--<li><a href="#">Another action</a></li>-->
                                                        <!--<li><a href="#">Something else here</a></li>-->
                                                        <!--<li class="divider"></li>-->
                                                        <!--<li><a href="#">Separated link</a></li>-->
                                                    </ul>
                                                </div>
                                                <?php
                                                    }
                                                    ?>
                                                
                                           </td>
                                           <td></td>
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
    if($this->session->flashdata('success')){
        echo "<script>$.Notification.notify('success','top right', 'Success', 'Status Deleted Successfully.')</script>";
    }
    ?>