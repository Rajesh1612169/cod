<!DOCTYPE html>
<?php include 'includes/header.php'; ?>
<link href="<?=base_url()?>assets/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />

            <div class="content-page">
                <div class="content">
                    <div class="container">
                        <div class="card-box">
                            <div class="row">
                                <div class="alert alert-success alert-dismissible" id="Invoice_msg" style="display:none">
                                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                  <h5> Success!</h5>
                                  Invoice has been made Successfuly
                                </div>
                                <div class="col-md-12">
                        		    <h3 class="card-title" style="color: #9c0d00"><i class="glyphicon glyphicon-list"></i> Create Invoice</h3>
                        		    <br>
                        		    <p>Please Select Client to get there consignments to make invoice</p>
                        		    <br>
                        		    <div class="card-box" id="nodata"style="color: white; background-color: #9c0d00 !important; display:none;">
                        		        No consignment found that are delivered and not invoiced for the following client
                        		    </div>
                        		    <div class="col-md-12">
                        		       <select class="form-control select2" id="customer_id">
                        		           <option>Select Client</option>
                        		           <optgroup label="Customers">
	                                       <?php foreach($datas as $data){
	                                       ?>
	                                       <option value="<?=$data['c_id']?>"><?=$data['company_name']?> - <?=$data['name']?></option>
	                                       <?php
	                                       }
	                                       ?>
	                                       </optgroup>
	                                   </select>
                        		    </div>
                        		    <p id="consignment_info" style="display:none; margin-top:100px">Please Select consignments to make invoice</p>
                        		    <br>
                        		    <div class="col-md-12" id="table" style="display:none;">
                        		        <table class="table m-0">
                                            <thead>
                                            <tr>
                                                <th><input id="selectAll" type=checkbox total="0" f_r_amount="0" my_cod="0" style="width: 24px;height: 23px;"/> Select</th>
                                                <th>Consignment #</th>
                                                <th>Booking Date</th>
                                                <th>Destination</th>
                                                <th>weight</th>
                                                <th>COD</th>
                                                <th>Cost + tax</th>
                                                <th>Reimbursment Amount</th>
                                                <th>Status</th>
                                            </tr>
                                            </thead>
                                            <tbody id="data">
                                                
                                            </tbody>
                                        </table>
                        		    </div>
                        		    <div class="col-md-12 text-right" id="save" style="display:none;">
                        		        <button type="submit" class="btn btn-info" onclick="save()"style="background-color: #9c0d00 !important; border: 1px solid #9c0d00 !important;">Save</button>
                        		    </div>
                        		</div>
                        	</div>
                        </div>
                    </div>
                </div>
            </div>
            
<?php include 'includes/footer.php';?>
<script src="<?=base_url()?>assets/plugins/select2/js/select2.min.js" type="text/javascript"></script>
<script src="<?=base_url()?>assets/plugins/bootstrap-select/js/bootstrap-select.min.js" type="text/javascript"></script>
<script>
    $(document).ready(function(){
    $("#customer_id").change(function (){
        $("#table").css({"display":"block"});
        $("#consignment_info").css({"display":"block"});
        $("#data").empty();
        $("#save").css({"display":"block"});
        var c_id =  $(this).val();
        $.ajax({
      type: "POST",
      dataType: "json",
      data: {
          'shipper_id' : c_id
      },
      url: "<?=base_url()?>Admin/get_client_consignment",
      success: function(data) {
            var consingments    =   data.consingments;
            var tax1            =   data.tax;
            var tax             =   Number(tax1[0]['sst']);
      if(consingments.length > 0){
           $("#table").css({"display":"block"});
            var pricenwd=0;
            var addkgnwd=0;
            var total_cost=0;
            var fkg=0;
            var skg=0;
            var weight=0;
            var s_weight=0;
            var s_kg_cost=0;
            var final_cost=0;
            var total_cod=0;
            var khi_rtn=0;
            var nwd_rtn=0;
            var count = 1;
            var r_amount=0;
            
        $.each(consingments, function(idx, obj) {
            
            fkg=Number(obj.price);
            skg=Number(obj.addkg);
            weight=Number(obj.weight);
            pricenwd=Number(obj.pricenwd);
            addkgnwd=Number(obj.addkgnwd);
            khi_rtn=Number(obj.khi_rtn);
            nwd_rtn=Number(obj.nwd_rtn)
            if(obj.city_id=='2'){
                if(weight==1 || weight<1){
                   
                        final_cost   =   (Math.ceil(weight))*fkg;
                    
                   
                }
                else{
                    
                        s_weight    =   (Math.ceil(weight))-1;
                        s_kg_cost   =   s_weight*skg;
                        final_cost  =   s_kg_cost+fkg;
                    
                }
            }
            else{
                if(weight==1 || weight<1){
                   
                        final_cost   =   (Math.ceil(weight))*pricenwd;
                    
                    
                }
                else{
                  
                        s_weight    =   (Math.ceil(weight))-1;
                        s_kg_cost   =   s_weight*addkgnwd;
                        final_cost  =   s_kg_cost+pricenwd;
                    
                    
                }
            }
        
            
            if(tax==0){
                if(obj.s_id=='11'){
                    $("#data").append("<tr><td><input style='width: 24px;height: 23px;' value="+obj.consignment_id+" total="+final_cost+" f_r_amount='0' my_cod='0' type=checkbox />"+"</td><td>"+obj.consignment_id+"</td><td>"+obj.booking_date+"</td><td>"+obj.city_name+"</td><td>"+obj.weight+"</td><td id='totalcod"+count+"'>0</td><td>"+final_cost+"</td><td>0</td><td>"+obj.code+" - "+obj.description+"</td></tr>");
                }
                else{
                    r_amount    =   Number(obj.cod)-final_cost;
                    $("#data").append("<tr><td><input style='width: 24px;height: 23px;' value="+obj.consignment_id+" total="+final_cost+" f_r_amount="+r_amount+" my_cod="+obj.cod+" type=checkbox />"+"</td><td>"+obj.consignment_id+"</td><td>"+obj.booking_date+"</td><td>"+obj.city_name+"</td><td>"+obj.weight+"</td><td id='totalcod"+count+"'>"+obj.cod+"</td><td>"+final_cost+"</td><td>"+r_amount+"</td><td>"+obj.code+" - "+obj.description+"</td></tr>");
                }
            
            
            total_cost  +=  final_cost;
            // alert($("#totalcod"+count).html());
            total_cod   +=  Number($("#totalcod"+count).html());
            
            }
            else{
                if(obj.s_id=='11'){
                var taxammount=0;
                var tax_in_decimal= tax/100;
                taxammount =   final_cost*tax_in_decimal;
                f_cost  =   taxammount+final_cost;
                $("#data").append("<tr><td><input style='width: 24px;height: 23px;' value="+obj.consignment_id+" total="+f_cost+" f_r_amount='0' my_cod='0' type=checkbox />"+"</td><td>"+obj.consignment_id+"</td><td>"+obj.booking_date+"</td><td>"+obj.city_name+"</td><td>"+obj.weight+"</td><td id='totalcod"+count+"'>"+obj.cod+"</td><td>"+final_cost+" + "+tax+"% = "+f_cost+"</td><td>0</td><td>"+obj.code+" - "+obj.description+"</td></tr>");
                }
                else{
                    var taxammount=0;
                    var tax_in_decimal= tax/100;
                    taxammount =   final_cost*tax_in_decimal;
                    f_cost  =   taxammount+final_cost;
                    r_amount    =   Number(obj.cod)-final_cost;
                    $("#data").append("<tr><td><input style='width: 24px;height: 23px;' value="+obj.consignment_id+" total="+final_cost+" f_r_amount="+r_amount+" my_cod="+obj.cod+" type=checkbox />"+"</td><td>"+obj.consignment_id+"</td><td>"+obj.booking_date+"</td><td>"+obj.city_name+"</td><td>"+obj.weight+"</td><td id='totalcod"+count+"'>"+obj.cod+"</td><td>"+final_cost+"</td><td>"+r_amount+"</td><td>"+obj.code+" - "+obj.description+"</td></tr>");
                }
                total_cod   +=  Number($("#totalcod"+count).html());
                total_cost  +=  f_cost;
            }
            count++;
        });
        $("#data").append("<tr><td colspan='4'></td><td style='border-top: 1px solid;border-bottom: 1px solid;'><b>Total</b></td><td id='my_total_cod' style='border-top: 1px solid;border-bottom: 1px solid;'></td><td id='field_results' style='border-top: 1px solid;border-bottom: 1px solid;'></td><td id='r_amount' style='border-top: 1px solid;border-bottom: 1px solid;'></td></tr>");
        $("#save").css({"display":"block"});
        
         $("input:checkbox").click(function() {
        var output=0;
        var output2=0;
        var output3=0;
        var f = $("#field_results").html();
        $("input:checked").each(function() {
          output += Number($(this).attr('total'));
          output2 += Number($(this).attr('f_r_amount'));
          output3 += Number($(this).attr('my_cod'));
        //   alert(output2);
        });
        var a = output3-output;
        $("#field_results").html(output);
        $("#r_amount").html(a);
        $("#my_total_cod").html(output3);
        
      });
      }
      else
      {
         $("#nodata").css({"display":"block"});
         $("#table").css({"display":"none"});
         $("#save").css({"display":"none"});
         $("#consignment_info").css({"display":"none"});
      }



      }
    });
    });
    });
</script>

<script>
    function save(){
        var n = new Array();
        var cost    =   $("#field_results").html();
        var r_amount=   $('#r_amount').html();
        var c_id    =   $("#customer_id").val();
        var date    =   "<?=date('Y-m-d')?>";
        
        $("input:checked").each(function(){
            n.push(this.value);
        });
        
        
        $.ajax({
      type: "POST",
      dataType: "json",
      data: {
          n:n,
          'total_cost':cost,
          'c_id': c_id,
          'date': date,
          'r_amount': r_amount
      },
      url: "<?=base_url()?>admin/add_new_invoice",
      success: function(data) {
        $("#Invoice_msg").css({"display":"block"});
        $("#table").css({"display":"none"});
        $("#nodata").css({"display":"none"});
      }
    });
    }
</script>
<script>
     $("#selectAll").click(function(){
        $("input[type=checkbox]").prop('checked', $(this).prop('checked'));

});
</script>