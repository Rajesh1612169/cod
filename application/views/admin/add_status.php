<!DOCTYPE html>
<?php include 'includes/header.php'; ?>
<link href="<?=base_url()?>assets/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css" rel="stylesheet">

            <div class="content-page">
                <div class="content">
                    <div class="container">
                        <div class="card-box">
                        <div class="row">
                            <div class="col-md-12">
                        				    <h3 class="card-title" style="color: #9c0d00;"><i class="glyphicon glyphicon-list"></i> Add Status</h3>
                        				    <hr>
                        					<form method="POST" action="<?=base_url()?>admin/add_new_status">                                    
	                                            <div class="form-group col-md-4">
	                                                <label class="col-md-2 control-label">Code*</label>
	                                                <div class="col-md-10">
	                                                    <input type="text" class="form-control" name="code" placeholder="Status Code (CNA,DD)" required>
	                                                </div>
	                                            </div>
	                                             <div class="form-group col-md-4">
	                                                <label class="col-md-2 control-label">Description*</label>
	                                                <div class="col-md-10">
	                                                    <input type="text" class="form-control" name="description" placeholder="Description of the code" required>
	                                                </div>
	                                            </div>
	                                            <div class="form-group col-md-4">
	                                                <label class="col-md-2 control-label">Color Code*</label>
	                                                <div class="col-md-10">
	                                                    <input type="text" class="colorpicker-default form-control" name="color_code">
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
        <script src="<?=base_url()?>assets/plugins/moment/moment.js"></script>
     	<script src="<?=base_url()?>assets/plugins/timepicker/bootstrap-timepicker.js"></script>
     	<script src="<?=base_url()?>assets/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
     	<script src="<?=base_url()?>assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
     	<script src="<?=base_url()?>assets/plugins/clockpicker/js/bootstrap-clockpicker.min.js"></script>
     	<script src="<?=base_url()?>assets/plugins/bootstrap-daterangepicker/daterangepicker.js"></script>

        <script src="<?=base_url()?>assets/js/jquery.core.js"></script>
        <script src="<?=base_url()?>assets/js/jquery.app.js"></script>
        <script src="<?=base_url()?>assets/pages/jquery.form-pickers.init.js"></script>
 <?php
    if($this->session->flashdata('success')){
        echo "<script>$.Notification.notify('success','top right', 'Success', 'Status Created Successfully.')</script>";
    }
    ?>