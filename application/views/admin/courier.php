<!DOCTYPE html>

<?php 
// print_r($datas);die;
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
                            <h4 class="m-t-0 header-title"><b>All Courier</b></h4>
                            <table id="datatable" class="table table-striped table-bordered">
                                <thead>
                                <tr>
                                    <th>Code #</th>
                                    <th>Name</th>
                                    <th>Father Name</th>
                                    <th>Number</th>
                                    <th>CNIC</th>
                                    <th>Address</th>
                                    <th>Action</th>
                                </tr>
                                </thead>


                                <tbody>
                                    <?php
                                        foreach($datas as $data){
                                    ?>
                                        <tr>
                                            <td><?=$data['c_id']?></td>
                                           <td><?=$data['name']?></td>
                                           <td><?=$data['father_name']?></td>
                                           <td><?=$data['number']?></td>
                                           <td><?=$data['cnic']?></td>
                                           <td><?=$data['address']?></td>
                                           <td>
                                               <?php if($data['c_id']==1){
                                                   echo 'System Genrated Courier';
                                               }
                                               else{?>
                                                <a class="btn btn-info" style="background-color: #9c0d00 !important;border: 1px solid #9c0d00 !important;" href="<?=base_url()?>admin/edit_courier/<?=$data['c_id']?>">Edit</a>
                                                <a class="btn btn-info" style="background-color: #9c0d00 !important;border: 1px solid #9c0d00 !important;" href="<?=base_url()?>admin/delete_courier/<?=$data['c_id']?>">Delete</a>
                                            <?php
                                            }?>
                                            
                                            </td>
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
<script>
        $(document).ready(function () {
        $('#datatable').DataTable( {
        "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]]
    });
        });
</script>

 <?php
    if($this->session->flashdata('del')){
        echo "<script>$.Notification.notify('success','top right', 'Success', 'Courier Deleted Successfully.')</script>";
    }
    ?>