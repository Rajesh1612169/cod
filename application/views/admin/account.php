<!DOCTYPE html>
<?php
// print_r($datas[0]['money']);die;
include 'includes/header.php'; ?>


            <div class="content-page">
                <div class="content">
                    <div class="container">
                        <div class="card-box">
                        <div class="row">
                            <div class="col-md-12">
                        				    <h3 class="card-title" style="color:#9c0d00;"><i class="glyphicon glyphicon-list"></i> Add to Account</h3>
                        				    <hr>
                        					                                    
	                                            <div class="form-group col-md-4">
	                                                <label class="col-md-2 control-label">Cash in Account</label>
	                                                <div class="col-md-10">
	                                                    <input type="text" class="form-control" value="<?=$datas[0]['money']?>" disabled>
	                                                </div>
	                                            </div>
	                                            <form method="POST" action="<?=base_url()?>admin/add_into_account">
	                                             <div class="form-group col-md-4">
	                                                <label class="col-md-2 control-label">Add Money</label>
	                                                <div class="col-md-10">
	                                                    <input type="number" class="form-control" name="addmoney" value="0" required>
	                                                </div>
	                                            </div>
	                                            <div class="form-group col-md-4">
	                                                <label class="col-md-2 control-label">Minus Money</label>
	                                                <div class="col-md-10">
	                                                    <input type="number" class="form-control" name="minusmoney" value="0" required>
	                                                </div>
	                                            </div>
	                                             <div class="col-sm-12" align="center">
	                                                  <button type="submit" class="btn btn-info" style="background-color:#9c0d00 !important; border: 1px solid#9c0d00 !important;">Save</button>
	                                           </div>
	                                            </form>
                        				</div>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
            
<?php include 'includes/footer.php';?>
 <?php
    if($this->session->flashdata('success')){
        echo "<script>$.Notification.notify('success','top right', 'Success', 'Added and Subtracted Successfully.')</script>";
    }
    ?>
    
    <?php
    if($this->session->flashdata('error')){
        echo "<script>$.Notification.notify('error','top right', 'Error', 'Cant add city Reference Number already exist.')</script>";
    }
    ?>