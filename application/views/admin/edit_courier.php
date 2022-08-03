<!DOCTYPE html>
<?php include 'includes/header.php'; ?>


            <div class="content-page">
                <div class="content">
                    <div class="container">
                        <div class="card-box">
                        <div class="row">
                            <div class="col-md-12">
                        				    <h3 class="card-title" style="color: #f6c72c;"><i class="glyphicon glyphicon-list"></i> Add Courier</h3>
                        				    <hr>
                        					<form method="POST" action="<?=base_url()?>admin/edit_new_courier/<?=$datas[0]['c_id']?>">                                    
	                                            <div class="form-group col-md-6">
	                                                <label class="col-md-2 control-label">Name*</label>
	                                                <div class="col-md-6">
	                                                    <input type="text" class="form-control" name="name" value="<?=$datas[0]['name']?>" placeholder="Full Name" required>
	                                                </div>
	                                            </div>
	                                             <div class="form-group col-md-6">
	                                                <label class="col-md-2 control-label">Father Name*</label>
	                                                <div class="col-md-6">
	                                                    <input type="text" class="form-control" name="father_name" value="<?=$datas[0]['father_name']?>" placeholder="Father Name" required>
	                                                </div>
	                                            </div>
	                                             <div class="form-group col-md-6">
	                                                <label class="col-md-2 control-label">Number*</label>
	                                                <div class="col-md-6">
	                                                    <input type="text" class="form-control" name="number" value="<?=$datas[0]['number']?>" placeholder="Mobile #" required>
	                                                </div>
	                                            </div>
	                                            <div class="form-group col-md-6">
	                                                <label class="col-md-2 control-label">CNIC*</label>
	                                                <div class="col-md-6">
	                                                    <input type="text" class="form-control" name="cnic" value="<?=$datas[0]['cnic']?>" placeholder="CNIC" required>
	                                                </div>
	                                            </div>
	                                             <div class="form-group col-md-6">
	                                                <label class="col-md-2 control-label">Address*</label>
	                                                <div class="col-md-6">
	                                                    <input type="text" class="form-control" name="address" value="<?=$datas[0]['address']?>" placeholder="Complete Address"  required>
	                                                </div>
	                                            </div>
	                                             <div class="col-sm-12" align="center">
	                                                  <button type="submit" class="btn btn-info" style="background-color: #f6c72c !important; border: 1px solid #f6c72c !important;">Save</button>
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
    if($this->session->flashdata('edit')){
        echo "<script>$.Notification.notify('success','top right', 'Success', 'Courier Edited Successfully.')</script>";
    }
    ?>