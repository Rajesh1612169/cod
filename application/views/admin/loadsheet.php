<!DOCTYPE html>

<?php include 'includes/header.php'; ?>

            <div class="content-page">
                <div class="content">
                    <div class="container">
                        <div class="row">
                              <div class="card-box table-responsive">
                            <h4 class="m-t-0 header-title"><b>Load Sheets</b></h4>
                            <table id="datatable" class="table table-striped table-bordered">
                                <thead>
                                <tr>
                                    <th>Sheet #</th>
                                    <th>Date</th>
                                    <th>Action</th>
                                    <!--<th>Status</th>-->
                                </tr>
                                </thead>


                                <tbody>
                                    <?php
                                        foreach($datas as $data){
                                    ?>
                                        <tr <?php
                                        if($data['printed']=='0'){
                                            
                                            echo "style='background-color: #04ff0047 !important;'";
                                           
                                        }
                                        ?>
                                        >
                                           <td><?=$data['ls_id']?></td>
                                           <td><?=$data['date']?></td>
                                           
                                           <td>
                                               <a class="btn btn-info dropdown-toggle waves-effect waves-light" style="background-color: #f6c72c !important;border: 1px solid #f6c72c !important;" href="<?=base_url()?>admin/print_labels/<?=$data['ls_id']?>">Print Labels</a></li>
                                               <a class="btn btn-info dropdown-toggle waves-effect waves-light" style="background-color: #f6c72c !important;border: 1px solid #f6c72c !important;" href="<?=base_url()?>admin/print_loadsheet/<?=$data['ls_id']?>">Print Loadsheet</a></li>
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