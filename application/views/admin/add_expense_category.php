<!DOCTYPE html>
<?php include 'includes/header.php'; ?>


            <div class="content-page">
                <div class="content">
                    <div class="container">
                        <div class="card-box">
                        <div class="row">
                            <div class="col-md-12">
                        				    <h3 class="card-title" style="color: #9c0d00;"><i class="glyphicon glyphicon-list"></i> Add Expense Category</h3>
                        				    <hr>
                        					<form method="POST" action="<?=base_url()?>admin/add_new_expense_category">                                    
	                                            <div class="form-group col-md-6">
	                                                <label class="col-md-2 control-label">Name*</label>
	                                                <div class="col-md-6">
	                                                    <input type="text" class="form-control" name="name" required>
	                                                </div>
	                                            </div>
	                                             <div class="form-group col-md-6">
	                                                <label class="col-md-2 control-label">Description*</label>
	                                                <div class="col-md-6">
	                                                    <input type="text" class="form-control" name="description" required>
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
    if($this->session->flashdata('success')){
        echo "<script>$.Notification.notify('success','top right', 'Success', 'Expense Created Successfully.')</script>";
    }
    ?>
    