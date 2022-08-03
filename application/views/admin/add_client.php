<!DOCTYPE html>
<?php include 'includes/header.php'; ?>

            <div class="content-page">
                <div class="content">
                    <div class="container">
                        <div class="card-box">
                        <div class="row">
                            <div class="col-md-12">
                        				    <h3 class="card-title" style="color: #9c0d00;"><i class="glyphicon glyphicon-list"></i> Add Client</h3>
                        				    <hr>
                        					<form method="POST" action="<?=base_url()?>admin/add_new_client">                                    
	                                            <div class="form-group col-md-6">
	                                                <label class="col-md-2 control-label">Name*</label>
	                                                <div class="col-md-6">
	                                                    <input type="text" class="form-control" name="name" placeholder="Contact Person Full Name" required>
	                                                </div>
	                                            </div>
	                                             <div class="form-group col-md-6">
	                                                <label class="col-md-2 control-label">Company Name*</label>
	                                                <div class="col-md-6">
	                                                    <input type="text" class="form-control" name="company_name" placeholder="Company Name" required>
	                                                </div>
	                                            </div>
	                                             <div class="form-group col-md-6">
	                                                <label class="col-md-2 control-label">Number*</label>
	                                                <div class="col-md-6">
	                                                    <input type="text" class="form-control" name="number" placeholder="Mobile #" required>
	                                                </div>
	                                            </div>
	                                            <div class="form-group col-md-6">
	                                                <label class="col-md-2 control-label">Email*</label>
	                                                <div class="col-md-6">
	                                                    <input type="text" class="form-control" name="email" placeholder="Email Address" required>
	                                                </div>
	                                            </div>
	                                            <div class="form-group col-md-6">
	                                                <label class="col-md-2 control-label">Username*</label>
	                                                <div class="col-md-6">
	                                                    <input type="text" class="form-control" name="username" placeholder="Username" required>
	                                                </div>
	                                            </div>
	                                             <div class="form-group col-md-6">
	                                                <label class="col-md-2 control-label">Password*</label>
	                                                <div class="col-md-6">
	                                                    <input type="text" class="form-control" name="password" placeholder="Password For Login"  required>
	                                                </div>
	                                            </div>
	                                            <div class="form-group col-md-6">
	                                                <label class="col-md-2 control-label">Address*</label>
	                                                <div class="col-md-6">
	                                                    <input type="text" class="form-control" name="address" placeholder="Full Address"  required>
	                                                </div>
	                                            </div>
	                                            <div class="form-group col-md-6">
	                                                <label class="col-md-2 control-label">CNIC</label>
	                                                <div class="col-md-6">
	                                                    <input type="text" class="form-control" name="cnic" placeholder="CNIC" >
	                                                </div>
	                                            </div>
	                                            <div class="form-group col-md-6">
	                                                <label class="col-md-2 control-label">Bank Name:</label>
	                                                <div class="col-md-6">
	                                                    <input type="text" class="form-control" name="bankname" placeholder="Bank Name:" >
	                                                </div>
	                                                </div>
	                                                
                                                <div class="form-group col-md-6">
                                                <label class="col-md-2 control-label">Bank Account Title:</label>
                                                <div class="col-md-6">
                                                    <input type="text" class="form-control" name="bank_acc_title" placeholder="Bank Account Title:" >
                                                </div>
                                                </div>
                                                <div class="form-group col-md-6">
	                                                <label class="col-md-2 control-label">Bank Account Number:</label>
	                                                <div class="col-md-6">
	                                                    <input type="text" class="form-control" name="bank_acc_num" placeholder="Bank Account Number:" >
	                                                </div>
	                                            </div>
	                                            <div class="form-group col-md-6">
	                                                <label class="col-md-2 control-label">Easy Paisa Account Title:</label>
	                                                <div class="col-md-6">
	                                                    <input type="text" class="form-control" name="easypaisa_acc_title" placeholder="Easy Paisa Account Title:">
	                                                </div>
	                                            </div>
	                                             <div class="form-group col-md-6">
	                                                <label class="col-md-2 control-label">Easy Paisa Account Number:</label>
	                                                <div class="col-md-6">
	                                                    <input type="text" class="form-control" name="easypaisa_acc_num"  placeholder="Easy Paisa Account Number:">
	                                                </div>
	                                            </div>
	                                            
	                                            
	                                            <h3 class="card-title col-md-12" style="color: #9c0d00;font-size: 18px;"><i class="glyphicon glyphicon-list"></i> For Karachi</h3>
	                                            <div class="form-group col-md-6">
	                                                <label class="col-md-2 control-label">Price/KG</label>
	                                                <div class="col-md-10">
	                                                    <input type="text" class="form-control" name="price" placeholder="Rs." required>
	                                                </div>
	                                            </div>
	                                            <div class="form-group col-md-6">
	                                                <label class="col-md-2 control-label">Price/Add. KG</label>
	                                                <div class="col-md-10">
	                                                    <input type="text" class="form-control" name="addkg" placeholder="Rs." required>
	                                                </div>
	                                                
	                                                </div>
	                                                <div class="form-group col-md-6">
	                                                <label class="col-md-2 control-label">Return</label>
	                                                <div class="col-md-10">
	                                                    <input type="text" class="form-control" name="khi_rtn" placeholder="Rs." required>
	                                                </div>
	                                                
	                                                </div>
	                                               
	                                            <h3 class="card-title col-md-12" style="color: #9c0d00;font-size: 18px;"><i class="glyphicon glyphicon-list"></i> For Nationwide</h3>
	                                             <div class="form-group col-md-6">
	                                                <label class="col-md-2 control-label">Price/KG</label>
	                                                <div class="col-md-10">
	                                                    <input type="text" class="form-control" name="pricenwd" placeholder="Rs." required>
	                                                </div>
	                                            </div>
	                                            <div class="form-group col-md-6">
	                                                <label class="col-md-2 control-label">Price/Add. KG</label>
	                                                <div class="col-md-10">
	                                                    <input type="text" class="form-control" name="addkgnwd" placeholder="Rs." required>
	                                                </div>
	                                            </div>
	                                            <div class="form-group col-md-6">
	                                                <label class="col-md-2 control-label">Return</label>
	                                                <div class="col-md-10">
	                                                    <input type="text" class="form-control" name="nwd_rtn" placeholder="Rs." required>
	                                                </div>
	                                            </div>
	                                            
	                                            
	                                            <!-- flyer -->
	                                            
	                                            
	                                            <h3 class="card-title col-md-12" style="color: #9c0d00;font-size: 18px;"><i class="glyphicon glyphicon-list"></i> Flyer Charges</h3>
	                                             <div class="form-group col-md-6">
	                                                <label class="col-md-2 control-label">Small</label>
	                                                <div class="col-md-10">
	                                                    <input type="text" class="form-control" name="flyer_small" placeholder="" required>
	                                                </div>
	                                            </div>
	                                            <div class="form-group col-md-6">
	                                                <label class="col-md-2 control-label">Medium</label>
	                                                <div class="col-md-10">
	                                                    <input type="text" class="form-control" name="flyer_medium" placeholder="" required>
	                                                </div>
	                                            </div>
	                                            <div class="form-group col-md-6">
	                                                <label class="col-md-2 control-label">Large</label>
	                                                <div class="col-md-10">
	                                                    <input type="text" class="form-control" name="flyer_large" placeholder="" required>
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
        echo "<script>$.Notification.notify('success','top right', 'Success', 'Client Created Successfully.')</script>";
    }
    ?>