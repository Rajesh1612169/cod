<!DOCTYPE html>
<?php include 'includes/header.php'; ?>


            <div class="content-page">
                <div class="content">
                    <div class="container">
                        <div class="card-box">
                        <div class="row">
                            <div class="col-md-12">
                        				    <h3 class="card-title" style="color: #9c0d00;"><i class="glyphicon glyphicon-list"></i> Company Details</h3>
                        				    <hr>
                        					<form method="POST" action="<?=base_url()?>admin/profile_edit/<?=$datas[0]['c_id']?>">
                        					    <div class="form-group col-md-6">
	                                                <label class="col-md-2 control-label">Company Name*</label>
	                                                <div class="col-md-6">
	                                                    <input type="text" class="form-control" name="name" value="<?=$datas[0]['name']?>" placeholder="Company Name" required>
	                                                </div>
	                                            </div>                                    
	                                            <div class="form-group col-md-6">
	                                                <label class="col-md-2 control-label">Name*</label>
	                                                <div class="col-md-6">
	                                                    <input type="text" class="form-control" name="admin_name" value="<?=$datas[0]['admin_name']?>" placeholder="Admin name    " required>
	                                                </div>
	                                            </div>
	                                             
	                                             <div class="form-group col-md-6">
	                                                <label class="col-md-2 control-label">Email*</label>
	                                                <div class="col-md-6">
	                                                    <input type="text" class="form-control" name="email" value="<?=$datas[0]['email']?>" placeholder="Mobile #" required>
	                                                </div>
	                                            </div>
	                                            <div class="form-group col-md-6">
	                                                <label class="col-md-2 control-label">Password*</label>
	                                                <div class="col-md-6">
	                                                    <input type="text" class="form-control" name="password" value="<?=$datas[0]['password']?>" placeholder="Password" required>
	                                                </div>
	                                            </div>
	                                            <div class="form-group col-md-6">
	                                                <label class="col-md-2 control-label">Address*</label>
	                                                <div class="col-md-6">
	                                                    <input type="text" class="form-control" name="address" value="<?=$datas[0]['address']?>" placeholder="Full Address"  required>
	                                                </div>
	                                            </div>
	                                            <div class="form-group col-md-6">
	                                                <label class="col-md-2 control-label">Number</label>
	                                                <div class="col-md-6">
	                                                    <input type="text" class="form-control" name="phone" value="<?=$datas[0]['phone']?>" placeholder="Company number" required>
	                                                </div>
	                                            </div>
	                                            <div class="form-group col-md-6">
	                                                <label class="col-md-2 control-label">NTN Number</label>
	                                                <div class="col-md-6">
	                                                    <input type="text" class="form-control" name="ntn" value="<?=$datas[0]['ntn']?>" placeholder="Company NTN number">
	                                                </div>
	                                            </div>
	                                            <div class="form-group col-md-6">
	                                                <label class="col-md-2 control-label">SST %</label>
	                                                <div class="col-md-6">
	                                                    <input type="number" class="form-control" name="sst" value="<?=$datas[0]['ntn']?>" placeholder="Service sales tax in %">
	                                                </div>
	                                            </div>
	                                             <div class="col-sm-12" align="center">
	                                                  <button type="submit" class="btn btn-info" style="background-color: #9c0d00 !important; border: 1px solid #9c0d00 !important;">Save</button>
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
    if($this->session->flashdata('Saved')){
        echo "<script>$.Notification.notify('success','top right', 'Success', 'Details Saved Successfully.')</script>";
    }
    ?>