<!DOCTYPE html>
<?php include 'includes/header.php'; ?>


            <div class="content-page">
                <div class="content">
                    <div class="container">
                        <div class="card-box">
                        <div class="row">
                            <div class="col-md-12">
                        				    <h3 class="card-title" style="color: #f6c72c;"><i class="glyphicon glyphicon-list"></i> Edit Expense Category</h3>
                        				    <hr>
                        					<form method="POST" action="<?=base_url()?>admin/edit_new_expense_category/<?=$datas[0]['ec_id']?>">                                    
	                                            <div class="form-group col-md-6">
	                                                <label class="col-md-2 control-label">Name*</label>
	                                                <div class="col-md-6">
	                                                    <input type="text" class="form-control" name="name" value="<?=$datas[0]['name']?>" placeholder="Contact Person Full Name" required>
	                                                </div>
	                                            </div>
	                                             <div class="form-group col-md-6">
	                                                <label class="col-md-2 control-label">Company Name*</label>
	                                                <div class="col-md-6">
	                                                    <input type="text" class="form-control" name="description" value="<?=$datas[0]['description']?>" placeholder="Company Name" required>
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
    if($this->session->flashdata('Success')){
        echo "<script>$.Notification.notify('success','top right', 'Success', 'Expense Category Edited Successfully.')</script>";
    }
    ?>