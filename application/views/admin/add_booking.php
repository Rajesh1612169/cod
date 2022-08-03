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
                        					<form method="POST" action="<?=base_url()?>admin/add_new_booking/">                                    
	                                            <div class="form-group col-md-6">
	                                                <label class="col-md-2 control-label">Name</label>
	                                                <div class="col-md-6">
	                                                    <select class="form-control select2" name="shipper_id" id="shipper_id" required>
	                                                        <option>Select Client</option>
	                                                        <?php
	                                                            foreach($clients as $client){
	                                                        ?>
	                                                        <option value="<?=$client['c_id']?>"><?=$client['company_name']?> - <?=$client['name']?></option>
	                                                        <?php
	                                                            }
	                                                        ?>
            		                                    </select>
	                                                     <input type="hidden" class="form-control" name="booking_date" value="<?=date('Y-m-d')?>">
	                                                </div>
	                                            </div>
	                                             <div class="form-group col-md-6">
	                                                <label class="col-md-2 control-label">Number</label>
	                                                <div class="col-md-6">
	                                                    <input type="text" id="number" class="form-control" placeholder="Mobile #" readonly required>
	                                                </div>
	                                            </div>
	                                            
	                                             <div class="form-group col-md-6">
	                                                <label class="col-md-2 control-label">Pickup Address</label>
	                                                <div class="col-md-6">
	                                                    <input type="text" id="p_address" class="form-control" name="p_address" placeholder="Pickup From" required>
	                                                </div>
	                                            </div>
	                                            <div class="form-group col-md-6">
	                                                <label class="col-md-2 control-label">Return Address</label>
	                                                <div class="col-md-6">
	                                                    <input type="text" id="r_address" class="form-control" name="r_address" placeholder="Return Address" required>
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
	                                                  <button type="submit" class="btn btn-danger" >Save Booking</button>
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
<script>
    $(document).ready(function(){
        $("#shipper_id").change(function (){
            var c_id =  $(this).val();
            $.ajax({
              type: "POST",
              dataType: "json",
              data: {
                  'c_id' : c_id
              },
              url: "<?=base_url()?>Admin/get_client_info",
              success: function(data) {
                  if(data.length > 0){
                      $.each(data, function(idx, obj) {
                       $('#number').val(obj.number);
                       $('#email').val(obj.email);
                       $('#p_address').val(obj.address);
                       $('#r_address').val(obj.address);
                       
                      });
                  }
              }  
            })
        });
    });
</script>