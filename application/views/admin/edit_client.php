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
                        					<form method="POST" action="<?=base_url()?>admin/edit_new_client/<?=$datas[0]['c_id']?>">                                    
	                                            <div class="form-group col-md-6">
	                                                <label class="col-md-2 control-label">Name*</label>
	                                                <div class="col-md-6">
	                                                    <input type="text" class="form-control" name="name" value="<?=$datas[0]['name']?>" placeholder="Contact Person Full Name" required>
	                                                </div>
	                                            </div>
	                                             <div class="form-group col-md-6">
	                                                <label class="col-md-2 control-label">Company Name*</label>
	                                                <div class="col-md-6">
	                                                    <input type="text" class="form-control" name="company_name" value="<?=$datas[0]['company_name']?>" placeholder="Company Name" required>
	                                                </div>
	                                            </div>
	                                             <div class="form-group col-md-6">
	                                                <label class="col-md-2 control-label">Number*</label>
	                                                <div class="col-md-6">
	                                                    <input type="text" class="form-control" name="number" value="<?=$datas[0]['number']?>" placeholder="Mobile #" required>
	                                                </div>
	                                            </div>
	                                            <div class="form-group col-md-6">
	                                                <label class="col-md-2 control-label">Username*</label>
	                                                <div class="col-md-6">
	                                                    <input type="text" class="form-control" name="username" value="<?=$datas[0]['username']?>" placeholder="Username" required>
	                                                </div>
	                                            </div>
	                                            <div class="form-group col-md-6">
	                                                <label class="col-md-2 control-label">Email Address*</label>
	                                                <div class="col-md-6">
	                                                    <input type="text" class="form-control" name="email" value="<?=$datas[0]['email']?>" placeholder="Email Address" required>
	                                                </div>
	                                            </div>
	                                             <div class="form-group col-md-6">
	                                                <label class="col-md-2 control-label">Password*</label>
	                                                <div class="col-md-6">
	                                                    <input type="text" class="form-control" name="password" value="<?=$datas[0]['password']?>" placeholder="Password For Login"  required>
	                                                </div>
	                                            </div>
	                                            <div class="form-group col-md-6">
	                                                <label class="col-md-2 control-label">Address*</label>
	                                                <div class="col-md-6">
	                                                    <input type="text" class="form-control" name="address" value="<?=$datas[0]['address']?>" placeholder="Full Address"  required>
	                                                </div>
	                                            </div>
	                                            <div class="form-group col-md-6">
	                                                <label class="col-md-2 control-label">CNIC</label>
	                                                <div class="col-md-6">
	                                                    <input type="text" class="form-control" name="cnic" value="<?=$datas[0]['cnic']?>" placeholder="CNIC">
	                                                </div>
	                                            </div>
	                                            <div class="form-group col-md-6">
	                                                <label class="col-md-2 control-label">Bank Name:</label>
	                                                <div class="col-md-6">
	                                                    <input type="text" class="form-control" name="bankname" value="<?=$datas[0]['bankname']?>" placeholder="Bank Name">
	                                                </div>
	                                            </div> 
	                                            <div class="form-group col-md-6">
	                                                <label class="col-md-2 control-label">Bank Account Title:</label>
	                                                <div class="col-md-6">
	                                                    <input type="text" class="form-control" name="bank_acc_title" value="<?=$datas[0]['bank_acc_title']?>" placeholder="Bank Account Title">
	                                                </div>
	                                            </div> 
	                                            <div class="form-group col-md-6">
	                                                <label class="col-md-2 control-label">Bank Account Number:</label>
	                                                <div class="col-md-6">
	                                                    <input type="text" class="form-control" name="bank_acc_num" value="<?=$datas[0]['bank_acc_num']?>" placeholder="Bank Account Numbe">
	                                                </div>
	                                            </div>
	                                            <div class="form-group col-md-6">
	                                                <label class="col-md-2 control-label">Easy Paisa Account Title:</label>
	                                                <div class="col-md-6">
	                                                    <input type="text" class="form-control" name="easypaisa_acc_title" value="<?=$datas[0]['easypaisa_acc_title']?>" placeholder="Easy Paisa Account Title">
	                                                </div>
	                                            </div>
	                                            <div class="form-group col-md-6">
	                                                <label class="col-md-2 control-label">Easy Paisa Account Number:</label>
	                                                <div class="col-md-6">
	                                                    <input type="text" class="form-control" name="easypaisa_acc_num" value="<?=$datas[0]['easypaisa_acc_num']?>" placeholder="Easy Paisa Account Number">
	                                                </div>
	                                            </div>
	                                             <h3 class="card-title col-md-12" style="color: #f6c72c;font-size: 18px;"><i class="glyphicon glyphicon-list"></i> For Karachi</h3>
	                                            <div class="form-group col-md-6">
	                                                <label class="col-md-2 control-label">Price/KG</label>
	                                                <div class="col-md-10">
	                                                    <input type="text" class="form-control" name="price" value="<?=$datas[0]['price']?>" placeholder="Rs." required>
	                                                </div>
	                                            </div>
	                                            <div class="form-group col-md-6">
	                                                <label class="col-md-2 control-label">Price/Add. KG</label>
	                                                <div class="col-md-10">
	                                                    <input type="text" class="form-control" name="addkg" value="<?=$datas[0]['addkg']?>" placeholder="Rs." required>
	                                                </div>
	                                            </div>
	                                            <div class="form-group col-md-6">
	                                                <label class="col-md-2 control-label">Return</label>
	                                                <div class="col-md-10">
	                                                    <input type="text" class="form-control" name="khi_rtn" value="<?=$datas[0]['khi_rtn']?>" placeholder="Rs." required>
	                                                </div>
	                                            </div>
	                                            <h3 class="card-title col-md-12" style="color: #f6c72c;font-size: 18px;"><i class="glyphicon glyphicon-list"></i> For Nationwide</h3>
	                                             <div class="form-group col-md-6">
	                                                <label class="col-md-2 control-label">Price/KG</label>
	                                                <div class="col-md-10">
	                                                    <input type="text" class="form-control" name="pricenwd" value="<?=$datas[0]['pricenwd']?>" placeholder="Rs." required>
	                                                </div>
	                                            </div>
	                                            <div class="form-group col-md-6">
	                                                <label class="col-md-2 control-label">Price/Add. KG</label>
	                                                <div class="col-md-10">
	                                                    <input type="text" class="form-control" name="addkgnwd" value="<?=$datas[0]['addkgnwd']?>" placeholder="Rs." required>
	                                                </div>
	                                            </div>
	                                            <div class="form-group col-md-6">
	                                                <label class="col-md-2 control-label">Return</label>
	                                                <div class="col-md-10">
	                                                    <input type="text" class="form-control" name="nwd_rtn" value="<?=$datas[0]['nwd_rtn']?>" placeholder="Rs." required>
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
    if($this->session->flashdata('Saved')){
        echo "<script>$.Notification.notify('success','top right', 'Success', 'Client Edited Successfully.')</script>";
    }
    ?>