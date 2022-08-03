<!DOCTYPE html>
<?php include 'includes/header.php'; ?>
            <div class="content-page">
                <div class="content">
                    <div class="container">
                        <div class="card-box">
                        <div class="row">
                            	<div class="col-md-12">
                        			<h3 class="card-title" style="color: #9c0d00;"><i class="glyphicon glyphicon-list"></i> Details of CN# <?=$datas['0']['consignment_id']?> Booked on <?=$datas['0']['booking_date']?></h3>
                        			<hr>
	                                <div class="form-group col-md-6">
	                                   <label class="col-md-6 control-label">Consignee Name: </label>
	                                   <div class="col-md-6">
	                                    <?=$datas['0']['consignee_name']?>
	                                   </div>
	                               </div>
	                               <div class="form-group col-md-6">
	                                   <label class="col-md-6 control-label">Consignee Number: </label>
	                                   <div class="col-md-6">
	                                    <?=$datas['0']['consignee_number']?>
	                                   </div>
	                               </div>
	                               <div class="form-group col-md-6">
	                                   <label class="col-md-6 control-label">Consignee Email: </label>
	                                   <div class="col-md-6">
	                                    <?=$datas['0']['consignee_email']?>
	                                   </div>
	                               </div>
	                               <div class="form-group col-md-6">
	                                   <label class="col-md-6 control-label">Consignee Address: </label>
	                                   <div class="col-md-6">
	                                    <?=$datas['0']['consignee_address']?>, <?=$datas['0']['city_name']?>
	                                   </div>
	                               </div>
	                               <div class="form-group col-md-6">
	                                   <label class="col-md-6 control-label">Weight: </label>
	                                   <div class="col-md-6">
	                                    <?=$datas['0']['weight']?>
	                                   </div>
	                               </div>
	                               <div class="form-group col-md-6">
	                                   <label class="col-md-6 control-label">Pieces: </label>
	                                   <div class="col-md-6">
	                                    <?=$datas['0']['pcs']?>
	                                   </div>
	                               </div>
	                               <div class="form-group col-md-6">
	                                   <label class="col-md-6 control-label">Description: </label>
	                                   <div class="col-md-6">
	                                    <?=$datas['0']['c_description']?>
	                                   </div>
	                               </div>
	                               <div class="form-group col-md-6">
	                                   <label class="col-md-6 control-label">COD: </label>
	                                   <div class="col-md-6">
	                                    <?=$datas['0']['cod']?>
	                                   </div>
	                               </div>
	                                <div class="form-group col-md-6">
	                                   <label class="col-md-6 control-label">Recived By: </label>
	                                   <div class="col-md-6">
	                                    <?=$datas['0']['recived_by']?>
	                                   </div>
	                               </div>
	                                <div class="form-group col-md-6">
	                                   <label class="col-md-6 control-label">Status: </label>
	                                   <div class="col-md-6">
	                                    <?=$datas['0']['code']?>-<?=$datas['0']['description']?>
	                                   </div>
	                               </div>
	                               <div class="form-group col-md-6">
	                                   <label class="col-md-6 control-label">Remarks: </label>
	                                   <div class="col-md-6">
	                                    <?=$datas['0']['remark']?>
	                                   </div>
	                               </div>
	                               <!--<div class="form-group col-md-6">-->
	                               <!--    <label class="col-md-6 control-label">Status: </label>-->
	                               <!--    <div class="col-md-6">-->
	                               <!--     <?=$datas['0']['status_id']?>-->
	                               <!--    </div>-->
	                               <!--</div>-->
	                           </div>
                        </div>
                        
                        </div>
                        <div class="card-box">
                            <div class="row">
                                <div class="col-md-12">
                                    <center><h3 class="card-title" style="color: #9c0d00;">Tracking Details of CN# <?=$datas['0']['consignment_id']?> Booked on <?=$datas['0']['booking_date']?></h3></center>
                                    <table id="datatable-buttons" class="table table-striped table-bordered">
                                        <thead>
                                        <tr>
                                            <th>Sr.no.</th>
                                            <th>Date/Time</th>
                                            <th>Status</th>
                                            
                                            
                                            <!--<th>Status</th>-->
                                        </tr>
                                        </thead>
                                        <tbody>
                                    <?php
                                        $count  =   1;
                                        foreach($trackings as $tracking){
                                    ?>
                                        <tr>
                                           <td><?=$count?></td>
                                           <td><?=$tracking['time_date']?></td>
                                           <td><?=$tracking['code']?> - <?=$tracking['description']?></td>
                                           
                                        </tr>
                                        <?php
                                        $count++;
                                        }
                                        ?>
                                </tbody>
                                </table>
            	                </div>
            	           </div>
        	           </div>
                    </div>
                </div>
            </div>
            
<?php include 'includes/footer.php';?>