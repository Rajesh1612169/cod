<!DOCTYPE html>
<?php include 'includes/header.php'; ?>

            <div class="content-page">
                <div class="content">
                    <div class="container">
                        <div class="row">
                           <div class="card-box table-responsive">
                            <h4 class="m-t-0 header-title"><b>New Client Leads</b></h4>
                            
                                <div class="row">
                                <div class="col-md-12" style='margin-bottom:50px;'>
                                <form action="<?= base_url('admin/search_leads') ?>" method="POST" autocomplete="off">
                                    <div class="input-daterange input-group col-md-6" id="date-range" style="float: left !important;">
                                        <span  style="background-color: #9c0d00 !important; border: 1px solid #9c0d00 !important;" class="input-group-addon bg-custom b-0 text-white">From</span>
																<input type="text" class="form-control" name="start" value="<?= date('d/m/Y') ?>">
																<span  style="background-color: #9c0d00 !important; border: 1px solid #9c0d00 !important;" class="input-group-addon bg-custom b-0 text-white">to</span>
																<input type="text" class="form-control" name="end" value="<?= date('d/m/Y') ?>">
															</div>
									<div class="col-md-6">
									    <button class="btn btn-info" type="submit" style="background-color: #9c0d00 !important; border: 1px solid #9c0d00 !important;">Search</button>
                                    </div>
                                </form>
                                </div>
                                </div>
                                
                            <table id="datatable-buttons" class="table table-striped table-bordered">
                                <thead>
                                <tr>
                                    <th>SN #</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Address</th>
                                    <th>Message</th>
                                    <th>Date</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $count = 1;
                                        foreach($datas as $data){
                                    ?>
                                        <tr>
                                           <td><?=$count?></td>
                                           <td><?=$data['name']?></td>
                                           <td><?=$data['email']?></td>
                                           <td><?=$data['phone']?></td>
                                           <td><?=$data['address']?></td>
                                           <td><?=$data['message']?></td>
                                           <td><?=$data['date']?></td>
                                           <td>
                                               <a class="btn btn-info" style="background-color: #9c0d00 !important;border: 1px solid #9c0d00 !important;" href="<?=base_url()?>admin/delete_client_leads/<?=$data['id']?>">Delete</a>
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
    });
</script>

 <?php
    if($this->session->flashdata('delete')){
        echo "<script>$.Notification.notify('success','top right', 'Success', 'Leads Deleted Successfully.')</script>";
    }
    ?>