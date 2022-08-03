<!DOCTYPE html>
<?php include 'includes/header.php'; ?>


            <div class="content-page">
                <div class="content">
                    <div class="container">
                        <div class="card-box">
                        <div class="row">
                            <div class="col-md-12">
                        				    <h3 class="card-title" style="color: #f6c72c;"><i class="glyphicon glyphicon-list"></i> Edit Client</h3>
                        				    <hr>
                        					<form method="POST" action="<?=base_url()?>client/edit_profile/<?=$profile[0]['c_id']?>">                                    
	                                            <div class="form-group col-md-6">
	                                                <label class="col-md-2 control-label">Name*</label>
	                                                <div class="col-md-6">
	                                                    <input type="text" class="form-control" name="name" value="<?=$profile[0]['name']?>" placeholder="Contact Person Full Name" required>
	                                                </div>
	                                            </div>
	                                             <div class="form-group col-md-6">
	                                                <label class="col-md-2 control-label">Company Name*</label>
	                                                <div class="col-md-6">
	                                                    <input type="text" class="form-control" name="company_name" value="<?=$profile[0]['company_name']?>" placeholder="Company Name" required>
	                                                </div>
	                                            </div>
	                                             <div class="form-group col-md-6">
	                                                <label class="col-md-2 control-label">Number*</label>
	                                                <div class="col-md-6">
	                                                    <input type="text" class="form-control" name="number" value="<?=$profile[0]['number']?>" placeholder="Mobile #" required>
	                                                </div>
	                                            </div>
	                                            <div class="form-group col-md-6">
	                                                <label class="col-md-2 control-label">Email*</label>
	                                                <div class="col-md-6">
	                                                    <input type="text" class="form-control" name="email" value="<?=$profile[0]['email']?>" placeholder="Email Address" required>
	                                                </div>
	                                            </div>
	                                             <div class="form-group col-md-6">
	                                                <label class="col-md-2 control-label">Password*</label>
	                                                <div class="col-md-6">
	                                                    <input type="text" class="form-control" name="password" value="<?=$profile[0]['password']?>" placeholder="Password For Login"  required>
	                                                </div>
	                                            </div>
	                                            <div class="form-group col-md-6">
	                                                <label class="col-md-2 control-label">Address*</label>
	                                                <div class="col-md-6">
	                                                    <input type="text" class="form-control" name="address" value="<?=$profile[0]['address']?>" placeholder="Full Address"  required>
	                                                </div>
	                                            </div>
	                                            <div class="form-group col-md-6">
	                                                <label class="col-md-2 control-label">CNIC</label>
	                                                <div class="col-md-6">
	                                                    <input type="text" class="form-control" name="cnic" value="<?=$profile[0]['cnic']?>" placeholder="CNIC">
	                                                </div>
	                                            </div>
	                                             <div class="form-group col-md-6">
	                                                <label class="col-md-2 control-label">Bank Name</label>
	                                                <div class="col-md-6">
	                                                    <input type="text" class="form-control" name="bankname" value="<?=$profile[0]['bankname']?>" placeholder="Bank Name">
	                                                </div>
	                                            </div>
	                                            <div class="form-group col-md-6">
	                                                <label class="col-md-2 control-label">Bank Account Title</label>
	                                                <div class="col-md-6">
	                                                    <input type="text" class="form-control" name="bank_acc_title" value="<?=$profile[0]['bank_acc_title']?>" placeholder="CNIC">
	                                                </div>
	                                            </div>
	                                             <div class="form-group col-md-6">
	                                                <label class="col-md-2 control-label">Bank Account Number</label>
	                                                <div class="col-md-6">
	                                                    <input type="text" class="form-control" name="bank_acc_num" value="<?=$profile[0]['bank_acc_num']?>" placeholder="Bank Account Number">
	                                                </div>
	                                            </div>
	                                             <div class="form-group col-md-6">
	                                                <label class="col-md-2 control-label">Easypaisa Account Title</label>
	                                                <div class="col-md-6">
	                                                    <input type="text" class="form-control" name="easypaisa_acc_title" value="<?=$profile[0]['easypaisa_acc_title']?>" placeholder="Easypaisa Account Title">
	                                                </div>
	                                            </div>
	                                            <div class="form-group col-md-6">
	                                                <label class="col-md-2 control-label">Easypaisa Account Number</label>
	                                                <div class="col-md-6">
	                                                    <input type="text" class="form-control" name="easypaisa_acc_num" value="<?=$profile[0]['easypaisa_acc_num']?>" placeholder="Easypaisa Account Number">
	                                                </div>
	                                            </div>
	                                            
	                                             <h3 class="card-title col-md-12" style="color: #f6c72c;font-size: 18px;"><i class="glyphicon glyphicon-list"></i> For Karachi</h3>
	                                            <div class="form-group col-md-6">
	                                                <label class="col-md-2 control-label">Price/KG</label>
	                                                <div class="col-md-6">
	                                                    <input type="text" class="form-control" value="<?=$profile[0]['price']?>" placeholder="Rs." readonly>
	                                                </div>
	                                            </div>
	                                            <div class="form-group col-md-6">
	                                                <label class="col-md-2 control-label">Price/Add. KG</label>
	                                                <div class="col-md-6">
	                                                    <input type="text" class="form-control" value="<?=$profile[0]['addkg']?>" placeholder="Rs." readonly>
	                                                </div>
	                                            </div>
	                                            <h3 class="card-title col-md-12" style="color: #f6c72c;font-size: 18px;"><i class="glyphicon glyphicon-list"></i> For Nationwide</h3>
	                                             <div class="form-group col-md-6">
	                                                <label class="col-md-2 control-label">Price/KG</label>
	                                                <div class="col-md-6">
	                                                    <input type="text" class="form-control" value="<?=$profile[0]['pricenwd']?>" placeholder="Rs." readonly>
	                                                </div>
	                                            </div>
	                                            <div class="form-group col-md-6">
	                                                <label class="col-md-2 control-label">Price/Add. KG</label>
	                                                <div class="col-md-6">
	                                                    <input type="text" class="form-control" value="<?=$profile[0]['addkgnwd']?>" placeholder="Rs." readonly>
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
    if($this->session->flashdata('success')){
        echo "<script>$.Notification.notify('success','top right', 'Success', 'Your profile successfully edited.')</script>";
    }
    ?>