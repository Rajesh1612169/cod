<!DOCTYPE html>
<?php include 'includes/header.php'; ?>


            <div class="content-page">
                <div class="content">
                    <div class="container">
                        <div class="row">
                            <div class="card-box">
                        		<div class="row">
                        			<div class="col-md-12">
                            			<div class ="col-md-12">
                            			    <a href="<?=base_url()?>assets/excel/city_list.xlsx" class="btn btn-info" style="background-color: #9c0d00 !important; border: 1px solid #9c0d00 !important;" download>
                            			        Download City List
                            			    </a>
                            			    <a href="<?=base_url()?>assets/excel/sample.xlsx" class="btn btn-info" style="background-color: #9c0d00 !important; border: 1px solid #9c0d00 !important;" download>
                            			        Download Sample Excel
                            			    </a>
                            			    <a href="<?=base_url()?>assets/excel/model_data.xlsx" class="btn btn-info" style="background-color: #9c0d00 !important; border: 1px solid #9c0d00 !important;" download>
                            			        Download Sample Model Excel
                            			    </a>
                            			</div>
                            			<div class ="col-md-12">
                            			    <p>All Fields are mandatory, please replace the values with your booking values</p>
                            			</div>
                        			    <form action="<?php echo base_url();?>client/importbooking" method="post" enctype="multipart/form-data" style="margin-top: 77px;">
                                            Upload excel file : 
                                            <input type="file" name="result_file" value="" /><br><br>
                                            <input type="submit" class="btn btn-info" style="background-color: #9c0d00 !important; border: 1px solid #9c0d00 !important;" name="submit" value="Upload" />
                                        </form>
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
        echo "<script>$.Notification.notify('success','top right', 'Success', 'Your Bookings has been saved.')</script>";
    }
?>