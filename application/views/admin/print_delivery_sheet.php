<!DOCTYPE html>
<?php include 'includes/header.php'; ?>

<style type="text/css" media="print">
    @page { 
        size: landscape;
    }
</style>
            <div class="content-page">
                <div class="content">
                    <div class="container">
                        <div class="card-box no-print">
                        <div class="row no-print">
                            <div class="col-md-12">
                        				    <h3 class="card-title" style="color: #9c0d00;"><i class="glyphicon glyphicon-list"></i> Courier Delivery Sheet</h3>
                        				    <hr class="no-print">
                        				    <div class="col-md-12 no-print">
                        		                <select class="form-control" id="courier_id">
                                		           <option>Select Courier</option>
        	                                       <?php foreach($datas as $data){
        	                                           if($data['c_id']==1){
        	                                               
        	                                           }else{
        	                                       ?>
        	                                       <option value="<?=$data['c_id']?>"><?=$data['name']?> - <?=$data['father_name']?></option>
        	                                       <?php
        	                                           }
        	                                       }
        	                                       ?>
	                                            </select>
                        		            </div>
                        		           
                            </div>
                        </div>
                    </div>
                     <div class="card-box col-md-12" id="nodata" style="display: none; background-color: #9c0d00 !important; color:white; margin-top:20px; font-size: 16px;">
                        		                <i class="md md-warning"></i> Alert <br>
                        		                This Courier is not assigned to any new booking
                        		            </div>
                        		            
                        		            <div class="col-md-12" id="table" style="display:none;">
                        		                <div class='col-md-6' align='left'>
                        		                    <img src="<?=base_url()?>assets/images/logo.png" style="height: 50px;">
                        		                </div>
                        		                <div class='col-md-6' align='right'>
                        		                    Delivery Date: <?=date('d/m/Y')?><br>
                        		                    <div id='cid_name'></div>
                        		                </div>
                        		                
                        		            <table id="datatable" class="table table-striped table-bordered" border="1">
                                                <thead>
                                                <tr>
                                                    <th>Sr.</th>
                                                    <th>CN #</th>
                                                    <th>Consignment</th>
                                                    <th>Consignee</th>
                                                    <th>COD</th>
                                                
                                                    <th>Reciver name / Status</th>
                                                    <th>CNIC</th>
                                                    <th>Signature</th>
                                                </tr>
                                                </thead>
                                                <tbody id="data">
                                                    
                                                </tbody>
                                        </table>
                                       <div class="pull-right no-print">
                                                <a href="javascript:window.print()" class="btn btn-inverse waves-effect waves-light"><i class="fa fa-print"></i> Print</a>
                                            </div>
                        		    </div>
                </div>
            </div>
            </div>
            
<?php include 'includes/footer.php';?>
<script>
    $(document).ready(function(){
        $("#courier_id").change(function (){
            var c_id =  $(this).val();
            
            var c_name =  $(this).html();
            var totalCOD    =   0;
            var count       =   1;
            $('#data').empty();
            $.ajax({
              type: "POST",
              dataType: "json",
              data: {
                  'delivery_courier' : c_id
              },
              url: "<?=base_url()?>Admin/get_delivery_sheet",
              success: function(data) {
              if(data.length > 0){
                  $("#cid_name").html("Courier Officier: "+data[0]['d_name']+" ("+c_id+")")
                  $("#table").css({"display":"block"});
                  $("#nodata").css({"display":"none"});
                  $.each(data, function(idx, obj) {
                      $("#data").append("<tr><td>"+count+"</td><td><img src='<?php echo base_url().'client/set_barcode/';?>"+obj.cn+"'></td><td>Weight:"+obj.weight+"<br>Pcs:"+obj.pcs+"</td><td>"+obj.consignee_name+"<br>"+obj.consignee_address+"<br>"+obj.consignee_number+"</td><td>"+obj.cod+"</td><td></td><td></td><td></td></tr>");
                    totalCOD    +=   Number(obj.cod)
                      count++;
                  }); 
                    $("#data").append("<tr><td colspan='4'><center>TOTAL</center></td><td><center>"+totalCOD+"</center></td><td></td><td></td><td></td></tr>")
              }
              
              else{
                  $("#table").css({"display":"none"});
                  $("#nodata").css({"display":"block"});
              }
              }
            });
        });
    });
</script>