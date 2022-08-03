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
                        				    <h3 class="card-title" style="color: #f6c72c"><i class="glyphicon glyphicon-list"></i> SHIPPER</h3>
                        				    <hr>
                        					<form method="POST" action="<?=base_url()?>admin/consignment_edit_new/<?=$datas[0]['cn']?>">                                    
	                                            <div class="form-group col-md-6">
	                                                <label class="col-md-2 control-label">Name</label>
	                                                <div class="col-md-6">
	                                                    <input type="text" class="form-control" placeholder="Full Name" value="<?=$datas[0]['company_name']?>" disabled="" required>
	                                                </div>
	                                            </div>
	                                             <div class="form-group col-md-6">
	                                                <label class="col-md-2 control-label">Number</label>
	                                                <div class="col-md-6">
	                                                    <input type="text" class="form-control" placeholder="Mobile #" value="<?=$datas[0]['number']?>" disabled="" required>
	                                                </div>
	                                            </div>
	                                            <div class="form-group col-md-6">
	                                                <label class="col-md-2 control-label">Email</label>
	                                                <div class="col-md-6">
	                                                    <input type="text" class="form-control" placeholder="Email Address" value="<?=$datas[0]['email']?>" disabled="" required>
	                                                </div>
	                                            </div>
	                                             <div class="form-group col-md-6">
	                                                <label class="col-md-2 control-label">Pickup Address</label>
	                                                <div class="col-md-6">
	                                                    <input type="text" class="form-control" name="p_address" placeholder="Pickup From"  value="<?=$datas[0]['p_address']?>" required>
	                                                </div>
	                                            </div>
	                                            <div class="form-group col-md-6">
	                                                <label class="col-md-2 control-label">Return Address</label>
	                                                <div class="col-md-6">
	                                                    <input type="text" class="form-control" name="r_address" placeholder="Return Address" value="<?=$datas[0]['r_address']?>" required>
	                                                </div>
	                                            </div>
                        				</div>
                        			</div>
                        		</div>
                        		<div class="card-box">
                        			<div class="row">
                        				<div class="col-md-12">  
                        				<h3 class="card-title" style="color: #f6c72c"><i class="glyphicon glyphicon-list"></i> CONSIGNEE</h3>
                        				    <hr>
	                                            <div class="form-group col-md-6">
	                                                <label class="col-md-2 control-label">Consignee Name</label>
	                                                <div class="col-md-6">
	                                                    <input type="text" class="form-control" name="consignee_name" value="<?=$datas[0]['consignee_name']?>" placeholder="Full Name" required>
	                                                </div>
	                                            </div>
	                                             <div class="form-group col-md-6">
	                                                <label class="col-md-2 control-label">Consignee ref#</label>
	                                                <div class="col-md-6">
	                                                    <input type="text" class="form-control" name="consignee_ref" value="<?=$datas[0]['consignee_ref']?>" placeholder="Referance Number">
	                                                </div>
	                                            </div>
	                                              <div class="form-group col-md-6">
	                                                <label class="col-md-2 control-label">Consignee Cell#</label>
	                                                <div class="col-md-6">
	                                                    <input type="text" class="form-control" name="consignee_number" value="<?=$datas[0]['consignee_number']?>" placeholder="923xx-xxxxxxx" required>
	                                                </div>
	                                            </div>
	                                             <div class="form-group col-md-6">
	                                                <label class="col-md-2 control-label">Email</label>
	                                                <div class="col-md-6">
	                                                    <input type="text" class="form-control" name="consignee_email" value="<?=$datas[0]['consignee_email']?>" placeholder="Email Address" required>
	                                                </div>
	                                            </div>
	                                          
                        				</div>
                        			</div>
                        		</div>
                        		<div class="card-box">
                        			<div class="row">
                        				<div class="col-md-12"> 
                        				<h3 class="card-title" style="color: #f6c72c"><i class="glyphicon glyphicon-list"></i> CONSIGNMENT</h3>
                        				    <hr>
                        				     <div class="form-group col-md-6">
	                                                <label class="col-md-2 control-label">COD</label>
	                                                <div class="col-md-6">
	                                                    <input type="text" class="form-control" name="cod" value="<?=$datas[0]['cod']?>" placeholder="Total Amount to be collected" required>
	                                                </div>
	                                            </div>
	                                             <div class="form-group col-md-6">
	                                                <label class="col-md-2 control-label">Pieces</label>
	                                                <div class="col-md-6">
	                                                    <input type="text" class="form-control" name="pcs" value="<?=$datas[0]['pcs']?>" placeholder="How many peices?" required>
	                                                </div>
	                                            </div>
	                                             <div class="form-group col-md-6">
	                                                <label class="col-md-2 control-label">Weight</label>
	                                                <div class="col-md-6">
	                                                    <input type="text" class="form-control" name="weight" value="<?=$datas[0]['weight']?>" placeholder="In KGs" required>
	                                                </div>
	                                            </div>
	                                            <div class="form-group col-md-6">
	                                                <label class="col-md-2 control-label">Description</label>
	                                                <div class="col-md-6">
	                                                    <input type="text" class="form-control" name="description" value="<?=$datas[0]['description']?>" placeholder="Description about parcel">
	                                                </div>
	                                            </div>
	                                             <div class="form-group col-md-6">
	                                                <label class="col-md-2 control-label">Destination City</label>
	                                                <div class="col-md-6">
	                                                    <select class="form-control select2" name="city_id" required>
	                                                        <option value="<?=$datas[0]['ref_id']?>"><?=$datas[0]['name']?></option>
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
	                                                    <input type="text" class="form-control" name="remark" value="<?=$datas[0]['remark']?>" placeholder="Remarks or Notes">
	                                                </div>
	                                            </div>
	                                            <hr>
	                                            <div class="col-sm-12" align="center">
	                                                  <button type="submit" class="btn btn-info" style="background-color: #0082d7 !important; border: 1px solid #0082d7 !important;">Edit Booking</button>
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
        echo "<script>$.Notification.notify('success','top right', 'Success', 'Booking has been Edited Successfully.')</script>";
    }
    ?>