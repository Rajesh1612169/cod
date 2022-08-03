<!DOCTYPE html>
<?php
// print("<pre>".print_r($datas,true)."</pre>");die;

?>
<?php include 'includes/header.php'; ?>

            <div class="content-page">
                <div class="content">
                    <div class="container">
                        <div class="row">
                           <div class="card-box table-responsive">
                            <h4 class="m-t-0 header-title"><b>Courier Reports</b></h4>FROM - <?=date('d/m/Y',strtotime($s_date))?> TO - <?=date('d/m/Y',strtotime($e_date))?>
                            <table id="datatable-buttons" class="table table-striped table-bordered">
                                <thead>
                                <tr>
                                    <th>SN #</th>
                                    <th>Courier ID</th>
                                    <th>Name - Father Name</th>
                                    <th>Status - Description</th>
                                    <th>Count</th>
                                </tr>
                                </thead>


                                <tbody>
                                    <?php
                                        $count  =   1;
                                        foreach($datas as $data){
                                    ?>
                                        <tr>
                                           <td><?=$count?></td>
                                           <td><?=$data['courier_id']?></td>
                                           <td><?=$data['name']?> - <?=$data['father_name']?></td>
                                           <td><?=$data['code']?> - <?=$data['description']?></td>
                                           <td><?=$data['COUNT(commission.status_id)']?></td>
                                           
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