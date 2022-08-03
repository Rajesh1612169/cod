<!DOCTYPE html>
<?php include 'includes/header.php'; ?>


            <div class="content-page">
                <div class="content">
                    <div class="container">
                        <div class="card-box">
                        <div class="row">
                            <div class="col-md-12">
                        				    <h3 class="card-title" style="color: #9c0d00;"><i class="glyphicon glyphicon-list"></i> Courier Settlement</h3>
                        				    <hr>
                        				    <div class="col-md-12" class="no-print">
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
                        		            <div class="card-box col-md-12" id="nodata" style="display: none; background-color: #9c0d00 !important; color:white; margin-top:20px; font-size: 16px;">
                        		                <i class="md md-warning"></i> Alert <br>
                        		                This Courier has no COD
                        		            </div>
                        		            <div class="col-md-12" id="table" style="display:none;margin-top:20px">
                        		            <table id="datatable" class="table table-striped table-bordered">
                                                <thead>
                                                <tr>
                                                    <th>Select</th>
                                                    <th>Consignment #</th>
                                                    <th>Consignee name</th>
                                                    <th>Consignee Address</th>
                                                    <th>COD</th>
                                                    <th>Status</th>
                                                    <th class="no-print">Change Status</th>
                                                </tr>
                                                </thead>
                                                <tbody id="data">
                                                    
                                                </tbody>
                                        </table>
                                         
                                        <div class="col-sm-12 text-right" id="save" style="display: block;">
                                            <a href="javascript:window.print()" class="btn btn-inverse waves-effect waves-light"><i class="fa fa-print"></i> Print</a>
                        		        <button type="submit" class="btn btn-info" onclick="save()" style="background-color: #9c0d00 !important; border: 1px solid #9c0d00 !important;">Save</button>
                        		        </div>
                        		    </div>
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
            var totalCOD    =   0;
            $('#data').empty();
            $.ajax({
              type: "POST",
              dataType: "json",
              data: {
                  'delivery_courier' : c_id
              },
              url: "<?=base_url()?>Admin/get_deliverd_consignmnet",
              success: function(data) {
                  var status    =   data.status;
                  var consignment   =   data.consignment;      
              if(consignment.length > 0){
                  $("#table").css({"display":"block"});
                  $("#nodata").css({"display":"none"});
                    
                    
                  $.each(consignment, function(idx, obj) {
                      var options = "";
                    $.each(status, function(idx1, obj1) {
                        options += "<option value='"+obj1.s_id+"' consign_id='"+obj.c_id+"'>"+obj1.code+" - "+obj1.description+"</option>"
                    })
                    
                      $("#data").append("<tr><td><input value="+obj.c_id+" total="+obj.cod+" type=checkbox style='width: 24px;height: 23px;'/>"+"</td><td>"+obj.c_id+"</td><td>"+obj.consignee_name+"</td><td>"+obj.consignee_address+"</td><td>"+obj.cod+"</td><td>"+obj.code+" - "+obj.description+"</td><td class='no-print'><select class='statuses' required >"+options+"</select></td></tr>");
                     
                  });
                  $("#data").append("<tr><td colspan='4'><b><center>Total</center></b></td><td id='field_results'></td><td></td><td class='no-print'></td></tr>");
                  
                  $("input:checkbox").click(function() {
                    var output=0;
                    $("input:checked").each(function() {
                      output += Number($(this).attr('total'));
                    });
                    $("#field_results").html(output);
                  });
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
<script>
    function save(){
        var statuses = [];
        var ids     =[];
        $.each($(".statuses option:selected"), function(){            
            statuses.push({status : $(this).val(), ids : $(this).attr('consign_id')});
            
        });
        var n = new Array();
        $("input:checked").each(function(){
            n.push(this.value);
        });
        $.ajax({
              type: "POST",
              dataType: "json",
              data: {
                  n:n,
                  statuses:statuses
              },
              url: "<?=base_url()?>Admin/courier_settlement_cod",
              success: function(data) {
                  if(data=='success'){
                                        $.Notification.notify('success','top right', 'Success', 'Success COD collected and Status has been changed');
                  window.location.reload();
                  }
                  else{
                                        $.Notification.notify('success','top right', 'Success', 'Status has been changed');
                  window.location.reload();
                  }
              }
        });
    }
</script>