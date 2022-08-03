<!DOCTYPE html>
<?php include 'includes/header.php'; ?>

 <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container">
<div class="row">
                        	<div class="col-sm-12">
                        	    
                        		<div class="card-box">
                        		    
                        			<div class="row">
                        			    
                        				<div class="col-md-12">
                        				    <h3 class="card-title" style="color: #9c0d00;"><i class="glyphicon glyphicon-list"></i> SHIPPER</h3>
                        				    <hr>
                        					<form method="POST" action="<?=base_url()?>client/add_booking/">                                    
	                                            <div class="form-group col-md-6">
	                                                <label class="col-md-2 control-label">Name</label>
	                                                <div class="col-md-6">
	                                                    <input type="text" class="form-control" placeholder="Full Name" value="<?=$client[0]['name']?>" required>
	                                                     <input type="hidden" class="form-control" name="shipper_id" value="<?=$client[0]['c_id']?>">
	                                                     <input type="hidden" class="form-control" name="booking_date" value="<?=date('Y-m-d')?>">
	                                                </div>
	                                            </div>
	                                             <div class="form-group col-md-6">
	                                                <label class="col-md-2 control-label">Number</label>
	                                                <div class="col-md-6">
	                                                    <input type="text" class="form-control" placeholder="Mobile #" value="<?=$client[0]['number']?>" required>
	                                                </div>
	                                            </div>
	                                            <div class="form-group col-md-6">
	                                                <label class="col-md-2 control-label">Email</label>
	                                                <div class="col-md-6">
	                                                    <input type="text" class="form-control" placeholder="Email Address" value="<?=$client[0]['email']?>" required>
	                                                </div>
	                                            </div>
	                                             <div class="form-group col-md-6">
	                                                <label class="col-md-2 control-label">Pickup Address</label>
	                                                <div class="col-md-6">
	                                                    <input type="text" class="form-control" name="p_address" placeholder="Pickup From"  value="<?=$client[0]['address']?>" required>
	                                                </div>
	                                            </div>
	                                            <div class="form-group col-md-6">
	                                                <label class="col-md-2 control-label">Return Address</label>
	                                                <div class="col-md-6">
	                                                    <input type="text" class="form-control" name="r_address" placeholder="Return Address" value="<?=$client[0]['address']?>" required>
	                                                </div>
	                                            </div>
                        				</div>
                        			</div>
                        		</div>
                        		<div class="card-box">
                        			<div class="row">
                        				<div class="col-md-12">  
                        				<h3 class="card-title" style="color: #9c0d00;"><i class="glyphicon glyphicon-list"></i> CONSIGNEE</h3>
                        				    <hr>
	                                            <div class="form-group col-md-6">
	                                                <label class="col-md-2 control-label">Consignee Name</label>
	                                                <div class="col-md-6">
	                                                    <input type="text" class="form-control" name="consignee_name" placeholder="Full Name" required>
	                                                </div>
	                                            </div>
	                                             <div class="form-group col-md-6">
	                                                <label class="col-md-2 control-label">Consignee ref#</label>
	                                                <div class="col-md-6">
	                                                    <input type="text" class="form-control" name="consignee_ref" placeholder="Referance Number">
	                                                </div>
	                                            </div>
	                                              <div class="form-group col-md-6">
	                                                <label class="col-md-2 control-label">Consignee Cell#</label>
	                                                <div class="col-md-6">
	                                                    <input type="text" class="form-control" name="consignee_number" placeholder="+923xx-xxxxxxx" required>
	                                                </div>
	                                            </div>
	                                             <div class="form-group col-md-6">
	                                                <label class="col-md-2 control-label">Email</label>
	                                                <div class="col-md-6">
	                                                    <input type="text" class="form-control" name="consignee_email" placeholder="Email Address" required>
	                                                </div>
	                                            </div>
	                                            <div class="form-group col-md-6">
	                                                <label class="col-md-2 control-label">Address</label>
	                                                <div class="col-md-6">
	                                                    <input type="text" class="form-control" name="consignee_address" placeholder="Full Address" required>
	                                                </div>
	                                            </div>
                        				</div>
                        			</div>
                        		</div>
                        		<div class="card-box">
                        			<div class="row">
                        				<div class="col-md-12"> 
                        				<h3 class="card-title" style="color: #9c0d00;"><i class="glyphicon glyphicon-list"></i> CONSIGNMENT</h3>
                        				    <hr>
                        				     <div class="form-group col-md-6">
	                                                <label class="col-md-2 control-label">COD</label>
	                                                <div class="col-md-6">
	                                                    <input type="text" class="form-control" name="cod" placeholder="Total Amount to be collected" required>
	                                                </div>
	                                            </div>
	                                             <div class="form-group col-md-6">
	                                                <label class="col-md-2 control-label">Pieces</label>
	                                                <div class="col-md-6">
	                                                    <input type="text" class="form-control" name="pcs" placeholder="How many peices?" required>
	                                                </div>
	                                            </div>
	                                             <div class="form-group col-md-6">
	                                                <label class="col-md-2 control-label">Weight</label>
	                                                <div class="col-md-6">
	                                                    <input type="text" class="form-control" name="weight" placeholder="In KGs" required>
	                                                </div>
	                                            </div>
	                                            <div class="form-group col-md-6">
	                                                <label class="col-md-2 control-label">Description</label>
	                                                <div class="col-md-6">
	                                                    <input type="text" class="form-control" name="description" placeholder="Description about parcel">
	                                                </div>
	                                            </div>
	                                             <div class="form-group col-md-6">
	                                                <label class="col-md-2 control-label">Destination City</label>
	                                                <div class="col-md-6">
	                                                    <select class="form-control select2" name="city_id" required>
	                                                        <?php
	                                                            foreach($cities as $city){
	                                                        ?>
	                                                        <option value="<?=$city['ref_id']?>"><?=$city['name']?></option>
	                                                        <?php
	                                                            }
	                                                        ?>
            		                                    </select>
	                                                </div>
	                                            </div>
	                                            <div class="form-group col-md-6">
	                                                <label class="col-md-2 control-label">Remarks</label>
	                                                <div class="col-md-6">
	                                                    <input type="text" class="form-control" name="remark" placeholder="Remarks or Notes">
	                                                </div>
	                                            </div>
	                                            <hr>
	                                            <div class="col-sm-12" align="center">
	                                                  <button type="submit" class="btn btn-info" style="background-color: #9c0d00 !important; border: 1px solid #9c0d00 !important;">Save Booking</button>
	                                           </div>
	                                        </form>
                        				</div>
                        			</div>
                        		</div>
                        	</div>
                        </div>
                        </div>
                        </div>
                        </div>
                        <?php include 'includes/footer.php';?>
                     <?php
                             if($this->session->flashdata('success')){
        echo "<script>$.Notification.notify('success','top right', 'Success', 'Your Booking has been saved.')</script>";
    }
    ?>