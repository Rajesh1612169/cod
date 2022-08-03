
<!DOCTYPE html>
<?php include 'includes/header.php'; ?>
<style>
    @media print {
       table td:last-child {display:none}
       table th:last-child {display:none}
   }
</style>
            <div class="content-page">
                <div class="content">
                    <div class="container">
                        <div class="row">
                           <div class="card-box table-responsive">
                            <h4 class="m-t-0 header-title"><b>Reports</b></h4>
                                <div class="col-md-12">
                                    <div class="input-daterange input-group col-md-6" id="date-range" style="float: left !important;">
                                        <span style="background-color: #9c0d00 !important; border: 1px solid #9c0d00 !important;" class="input-group-addon bg-custom b-0 text-white">From</span>
																<input type="text" class="form-control" id="start">
																<span style="background-color: #9c0d00 !important; border: 1px solid #9c0d00 !important;" class="input-group-addon bg-custom b-0 text-white">to</span>
																<input type="text" class="form-control" id="end">
															</div>
									<div class="col-md-6">
									    <button class="btn btn-info" style="background-color: #9c0d00 !important; border: 1px solid #9c0d00 !important;" onclick="save()">Search</button>
                                    </div>
                                </div>
                                
                            	<div class="col-md-12" id="table" style=" margin-top: 90px;">
                        		    <table id="datatable-buttons" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Booking Date</th>
                                                <th>Consignment #</th>
                                                <th>Ref No</th>
                                                <th>Consignee Name</th>
                                                <th>Destination City</th>
                                                <th>Weight</th>
                                                <th>COD</th>
                                                <th>Status</th>
                                                <th>Invoice ID</th>
                                            </tr>
                                        </thead>
                                        <tbody id="data">
                                                
                                        </tbody>
                                    </table>
                        		</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
<?php include 'includes/footer.php';?>
<script src="<?=base_url()?>assets/plugins/moment/moment.js"></script>
<script src="<?=base_url()?>assets/plugins/timepicker/bootstrap-timepicker.js"></script>
<script src="<?=base_url()?>assets/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
<script src="<?=base_url()?>assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
<script src="<?=base_url()?>assets/plugins/clockpicker/js/bootstrap-clockpicker.min.js"></script>
<script src="<?=base_url()?>assets/plugins/bootstrap-daterangepicker/daterangepicker.js"></script>
<script src="<?=base_url()?>assets/pages/jquery.form-pickers.init.js"></script>
<script>
     function save(){
            $('#datatable-buttons tbody').empty();
            var start  =   $('#start').val();
            var end  =   $('#end').val();
            $.ajax({
              type: "POST",
              dataType: "json",
              data: {
                  'start' : start,
                  'end' : end
              },
              url: "<?=base_url()?>client/get_consignment_by_date",
              success: function(data) {
                  if(data.length > 0){
                  $.each(data, function(idx, obj) {
                      if(obj.invoice_id==0){
                          $("#data").append("<tr><td>"+obj.booking_date+"</td><td><a href='<?=base_url()?>client/consignment_details/"+obj.consignment_id+"'>"+obj.consignment_id+"</a></td><td>"+obj.consignee_ref+"</td><td>"+obj.consignee_name+"</td><td>"+obj.city_name+"</td><td>"+obj.weight+"</td><td>"+obj.cod+"</td><td>"+obj.code+" "+obj.description+"</td><td>Not Invoiced</td></tr>");
                      }
                      else{
                          $("#data").append("<tr><td>"+obj.booking_date+"</td><td>"+obj.consignment_id+"</td><td>"+obj.consignee_ref+"</td><td>"+obj.consignee_name+"</td><td>"+obj.city_name+"</td><td>"+obj.weight+"</td><td>"+obj.cod+"</td><td>"+obj.code+" "+obj.description+"</td><td><a href='<? echo base_url().'client/print_invoice/"+obj.invoice_id+"'?>'>"+obj.invoice_id+"</a></td></tr>");
                      }
                      
                  });
                  }
                   
              }
            });
        }
</script>