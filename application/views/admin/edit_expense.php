<!DOCTYPE html>

<?php include 'includes/header.php'; ?>


            <div class="content-page">
                <div class="content">
                    <div class="container">
                        <div class="card-box">
                        <div class="row">
                            <div class="col-md-12">
                        				    <h3 class="card-title" style="color: #f6c72c;"><i class="glyphicon glyphicon-list"></i> Add Expense</h3>
                        				    <hr>
                        					<form method="POST" action="<?=base_url()?>admin/edit_new_expense/<?=$expense[0]['e_id']?>" autocomplete="off">                                    
	                                           <div class="form-group col-md-12">
	                                                <label class="col-md-1 control-label">Category</label>
	                                                <div class="col-md-11">
	                                                    <select class="form-control select2" name="ec_id" required>
	                                                        <option>Select Category</option>
	                                                        <?php
	                                                            foreach($datas as $data){
	                                                        ?>
	                                                        <option value="<?=$data['ec_id']?>" <?
	                                                        if($data['ec_id']==$expense[0]['ec_id'])
	                                                        {
	                                                            echo 'selected';
	                                                        }
	                                                        ?>
	                                                        ><?=$data['name']?> - <?=$data['description']?></option>
	                                                        <?php
	                                                            }
	                                                        ?>
            		                                    </select>
	                                                </div>
	                                            </div>
	                                             <div class="form-group col-md-4">
	                                                <label class="col-md-2 control-label">Name*</label>
	                                                <div class="col-md-10">
	                                                    <input type="text" class="form-control" name="Name" value="<?=$expense[0]['name']?>" required>
	                                                </div>
	                                            </div>
	                                            <div class="form-group col-md-4">
	                                                <label class="col-md-2 control-label">Date*</label>
	                                                <div class="col-md-10">
	                                                    <input type="text" class="form-control" name="date"value="<?=$expense[0]['date']?>" placeholder="mm/dd/yyyy" id="datepicker" required>
	                                                </div>
	                                            </div>
	                                            <div class="form-group col-md-4">
	                                                <label class="col-md-2 control-label">Cost*</label>
	                                                <div class="col-md-10">
	                                                    <input type="text" class="form-control" name="cost"value="<?=$expense[0]['cost']?>" required>
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
    if($this->session->flashdata('success')){
        echo "<script>$.Notification.notify('success','top right', 'Success', 'Expense Edited Successfully.')</script>";
    }
    ?>
    