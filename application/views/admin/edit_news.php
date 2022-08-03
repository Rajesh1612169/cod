<!DOCTYPE html>
<?php include 'includes/header.php'; ?>


            <div class="content-page">
                <div class="content">
                    <div class="container">
                        <div class="card-box">
                        <div class="row">
                            <div class="col-md-12">
                        				    <h3 class="card-title" style="color: #f6c72c;"><i class="glyphicon glyphicon-list"></i> Add News</h3>
                        				    <hr>
                        					<form method="POST" action="<?=base_url()?>admin/edit_new_news/<?=$datas[0]['n_id']?>">                                    
	                                            <div class="form-group col-md-6">
	                                                <label class="col-md-2 control-label">Heading*</label>
	                                                <div class="col-md-6">
	                                                    <input type="text" class="form-control" name="heading" value="<?=$datas[0]['heading']?>" placeholder="Heading of the news" required>
	                                                </div>
	                                            </div>
	                                             <div class="form-group col-md-6">
	                                                <label class="col-md-2 control-label">description*</label>
	                                                <div class="col-md-6">
	                                                    <input type="text" class="form-control" name="description" value="<?=$datas[0]['description']?>" placeholder="Description" required>
	                                                </div>
	                                            </div>
	                                             <div class="form-group col-md-6">
	                                                <label class="col-md-2 control-label">date*</label>
	                                                <div class="col-md-6">
	                                                    <div class="input-group">
	                                                    <input type="text" class="form-control" name="date" value="<?=date("m/d/Y", strtotime($datas[0]['date']));?>" placeholder="mm/dd/yyyy" id="datepicker">
														<span class="input-group-addon bg-custom b-0 text-white"><i class="icon-calender"></i></span>
														</div>
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
        <script src="<?=base_url()?>assets/plugins/moment/moment.js"></script>
     	<script src="<?=base_url()?>assets/plugins/timepicker/bootstrap-timepicker.js"></script>
     	<script src="<?=base_url()?>assets/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
     	<script src="<?=base_url()?>assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
     	<script src="<?=base_url()?>assets/plugins/clockpicker/js/bootstrap-clockpicker.min.js"></script>
     	<script src="<?=base_url()?>assets/plugins/bootstrap-daterangepicker/daterangepicker.js"></script>
     	<script src="<?=base_url()?>assets/pages/jquery.form-pickers.init.js"></script>
 <?php
    if($this->session->flashdata('edit')){
        echo "<script>$.Notification.notify('success','top right', 'Success', 'News Edit Successfully.')</script>";
    }
    ?>