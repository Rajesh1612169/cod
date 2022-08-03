<!DOCTYPE html>
<?php 
include 'includes/header.php'; ?>
<style>
    .btn{
        margin: 2px;
    }
</style>
            <div class="content-page">
                <div class="content">
                    <div class="container">
                        <div class="row">
                            <div class="card-box col-md-12">
                                <form method="POST" action="<?=base_url()?>admin/booking_date1" autocomplete='off'>
                                <div class="form-group">
    			                    <label class="control-label col-sm-1">Select Date</label>
    			                    <div class="col-sm-9">
            			                <div class="input-daterange input-group" id="date-range">
                							<input type="text" class="form-control" name="start" />
                							<span class="input-group-addon bg-custom b-0 text-white">to</span>
                							<input type="text" class="form-control" name="end" />
            						    </div>
        			                </div>
        			                <div class="col-sm-2">
        			                    <button class="btn btn-info dropdown-toggle waves-effect waves-light" style="background-color: #9c0d00 !important;border: 1px solid #9c0d00 !important;"  type="submit">Submit</button>
        			                </div>
    			                </div>
    			                </form>
    			                
    			                <form action="<?=base_url()?>admin/search_by_cns" method="POST">
                                    <div class="col-md-12" style="margin-top: 50px;">
                                        <h4 class="m-t-0 header-title"><b>Search by CN#</b></h4>
    	                                <textarea class="col-md-6" name="cn" rows="5" cols="110"></textarea>
        	                            <div class="col-md-6">
        									<button class="btn btn-info"  type="submit" style="background-color: #9c0d00 !important; border: 1px solid #9c0d00 !important;">Search</button>
                                        </div>
    	                            </div>
	                            </form>
	                            
                            </div>
                        </div>
                        <div class="row">
                           <div class="card-box table-responsive">
                            <h4 class="m-t-0 header-title"><b>All Bookings</b></h4>
                            <table id="datatable-buttons" class="table table-striped table-bordered">
                                <thead>
                                <tr>
                                    <th><input id="selectAll" type=checkbox style="width: 24px;height: 23px;"/> CN #</th>
                                    <th>Booking Date</th>
                                    <th>Shipper Name</th>
                                    <th>Consignee Name</th>
                                    <th>Consignee Address</th>
                                    <td>Destination</td>
                                    <th>Consignee Number</th>
                                    <th>Weight</th>
                                    <th>COD</th>
                                    <th>Remarks</th>
                                    <th>Status</th>
                                    <th>Pickup courier</th>
                                    <th>Delivery courier</th>
                                    <th>Delivered To</th>
                                    <th>Action</th>
                                </tr>
                                </thead>


                                <tbody>
                                    <?php
                                        foreach($datas as $data){
                                    ?>
                                        <tr style="<?php
                                            echo 'background-color:'.$data['color_code'].' !important;';
                                           ?>" >
                                           <td><input value="<?=$data['cn']?>" type=checkbox style="width: 24px;height: 23px;"/> <?=$data['cn']?></td>
                                           <td><?=$data['booking_date']?></td>
                                           <td title="<?=$data['contact_name']?>"><?=$data['company_name']?></td>
                                           <td><?=$data['consignee_name']?></td>
                                           <td><?=$data['consignee_address']?></td>
                                           <td><?=$data['city_name']?></td>
                                           <td><?=$data['consignee_number']?></td>
                                           <td title="Peices:<?=$data['pcs']?>"><?=$data['weight']?></td>
                                           <td><?=$data['cod']?></td>
                                           <td><?=$data['remark']?></td>
                                           <td><?=$data['code']?>-<?=$data['description']?></td>
                                           <td>
                                               <?=$data['courier_name']?>
                                           </td>
                                           <td>
                                               <?=$data['d_courier_name']?>
                                           </td>
                                           <td><?=$data['recived_by']?></td>
                                           <td>
                                                <button class="btn btn-info" style="background-color: #9c0d00 !important;border: 1px solid #9c0d00 !important;" data-id="<?=$data['cn']?>" data-toggle="modal" data-target="#POD">Deliver with POD</button>
                                                <a class="btn btn-info" style="background-color: #9c0d00 !important;border: 1px solid #9c0d00 !important;" href="<?=base_url()?>admin/consignment_edit/<?=$data['cn']?>">Edit</a>
                                                <a class="btn btn-info" style="background-color: #9c0d00 !important;border: 1px solid #9c0d00 !important;" href="<?=base_url()?>admin/view_consignment_history/<?=$data['cn']?>">View History</a>
                                                <a class="btn btn-info" style="background-color: #9c0d00 !important;border: 1px solid #9c0d00 !important;" href="<?=base_url()?>admin/consignment_delete/<?=$data['cn']?>">Delete</a>
                                                  
                                                 </td>
                                                
                                        </tr>
                                          <?php
                                               }
                                               ?>
                                </tbody>
                            </table>
                            <div class="col-md-12">
                            <div id="btndiv" class="col-md-3">
                                <p>change Status</p>
                            <?php
                                foreach($statuses as $status){
                                     if($status['s_id']=='2'){                      
                            ?>
                            <a href="javascript:void(0)" onclick="change_status(<?=$status['s_id']?>)" id="status_code<?=$status['s_id']?>" data-status="<?=$status['s_id']?>" class="btn btn-info" style="background-color: #9c0d00 !important;border: 1px solid #9c0d00 !important;"><?=$status['code']?></a>
                            <?php
                                     }else{
                            ?>
                                    <a href="javascript:void(0)" onclick="change_status(<?=$status['s_id']?>)" id="status_code<?=$status['s_id']?>" data-status="<?=$status['s_id']?>" class="btn btn-info" style="background-color: #9c0d00 !important;border: 1px solid #9c0d00 !important;"><?=$status['code']?></a>
                            <?php
                                     }
                            }
                            ?>

	                        </div>
	                        <div id="pickcourier" class="col-md-3">
                                <p>Assign to courier for pickup</p>
                            <select class="form-control select2" id="pickcouriers" required style="display: inline !important;width: 50% !important;">
    	                        <option>Select Courier</option>
	                                                        <?php
	                                                            foreach($couriers as $courier){
	                                                        ?>
	                                                        <option value="<?=$courier['c_id']?>"><?=$courier['name']?></option>
	                                                        <?php
	                                                            }
	                                                        ?>
            		                                    </select>
            		                                    <a href="javascript:void(0)" onclick="change_pickup()"  class="btn btn-info" style="background-color: #9c0d00 !important;border: 1px solid #9c0d00 !important;">Save</a>

	                        </div>
	                        <div id="deliverycourier" class="col-md-3">
                                <p>Assign to courier for Delivery</p>
                            <select class="form-control select2" id="deliverycouriers" required style="display: inline !important;width: 50% !important;">
    	                        <option>Select Courier</option>
	                                                        <?php
	                                                            foreach($d_couriers as $d_courier){
	                                                        ?>
	                                                        <option value="<?=$d_courier['c_id']?>"><?=$d_courier['name']?></option>
	                                                        <?php
	                                                            }
	                                                        ?>
            		                                    </select>
            		                                    <a href="javascript:void(0)" onclick="change_delivery()"  class="btn btn-info" style="background-color: #9c0d00 !important;border: 1px solid #9c0d00 !important;">Save</a>

	                        </div>
	                        <div id="deldiv" class="col-md-3">
                                <p>Delete Consignment(s)</p>
                            
                            <a href="javascript:void(0)" onclick="del_all()" class="btn btn-danger waves-effect waves-light" >Delete</a>
                            
	                        </div>
	                        </div>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--modal-->
            <div id="POD" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            <h4 class="modal-title" id="myModalLabel">Mark as delivered with POD</h4>
                        </div>
                        <div class="modal-body">
                            <form action="<?=base_url()?>admin/delivered_POD" method="POST">
                                <div class="col-md-6"> 
                                                        <div class="form-group">
                                                            <input type="text" class="form-control" name="recived_by" placeholder="Reciving Person Name" required>
                                                            
                                                 
                                                        </div> 
                                                    </div>
                                <div class="col-md-6"> 
                                                        <div class="form-group">
                                                            <input type="text" class="form-control" name="received_by_CNIC" placeholder="Reciving Person CNIC" required>
                                                            
                                                 
                                                        </div> 
                                                    </div>
                                <div class="col-md-12"> 
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="cn" readonly> 
                                    </div> 
                                </div> 
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary waves-effect waves-light" style="background-color: #9c0d00 !important;border: 1px solid #9c0d00 !important;">Save changes</button>
                        </form>
                        </div>
                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div>
            <!--modal-->
<?php include 'includes/footer.php';?>
<script src="<?=base_url()?>assets/plugins/moment/moment.js"></script>
<script src="<?=base_url()?>assets/plugins/timepicker/bootstrap-timepicker.js"></script>
<script src="<?=base_url()?>assets/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
<script src="<?=base_url()?>assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
<script src="<?=base_url()?>assets/plugins/clockpicker/js/bootstrap-clockpicker.min.js"></script>
<script src="<?=base_url()?>assets/plugins/bootstrap-daterangepicker/daterangepicker.js"></script>
<script src="<?=base_url()?>assets/pages/jquery.form-pickers.init.js"></script>
<script>
    function change_pickup(){
        var n = new Array();
        var id  =   $('#pickcouriers').val()
        $("input:checked").each(function(){
            n.push(this.value);
        });

       $.ajax({
      type: "POST",
      dataType: "json",
      data: {
          n:n
      },
      url: "<?=base_url()?>admin/change_pickup/"+id,
      success: function(data) {
       $.Notification.notify('success','top right', 'Success', 'Pickup Courier Changed Successfully.');
       setInterval('location.reload()', 2000);
      }
       });
    }
    
    
    function change_delivery(){
        var n = new Array();
        var id  =   $('#deliverycouriers').val()
        $("input:checked").each(function(){
            n.push(this.value);
        });

       $.ajax({
      type: "POST",
      dataType: "json",
      data: {
          n:n
      },
      url: "<?=base_url()?>admin/change_delivery/"+id,
      success: function(data) {
       $.Notification.notify('success','top right', 'Success', 'Delivery Courier Changed Successfully.');
       setInterval('location.reload()', 2000);
      }
       });
    }
</script>
<script type="text/javascript">
    $(document).ready(function () {
        $('#datatable-buttons').DataTable({dom: 'Bfrtip',lengthMenu: [
            [ 10, 25, 50, -1 ],
            [ '10 rows', '25 rows', '50 rows', 'Show all' ]
        ],
 buttons: [
            'pageLength', 
            'excelHtml5',
            'print'
           
        ]});
        $('#datatable').dataTable();
        $('#datatable-keytable').DataTable({keys: true, paging: false});
        $('#datatable-responsive').DataTable({paging: false});
        $('#datatable-colvid').DataTable({
            "dom": 'C<"clear">lfrtip',
            "paging": false,
            "colVis": {
                "buttonText": "Change columns"
            }
        });
        $('#datatable-scroller').DataTable({
            ajax: "assets/plugins/datatables/json/scroller-demo.json",
            deferRender: true,
            scrollY: 380,
            scrollCollapse: true,
            scroller: true,
            paging: false
        });
        var table = $('#datatable-fixed-header').DataTable({fixedHeader: true});
        var table = $('#datatable-fixed-col').DataTable({
            scrollY: "300px",
            scrollX: true,
            scrollCollapse: true,
            paging: false,
            fixedColumns: {
                leftColumns: 1,
                rightColumns: 1
            }
        });
    });
    // TableManageButtons.init();

</script>
<script>
     $("#selectAll").click(function(){
        $("input[type=checkbox]").prop('checked', $(this).prop('checked'));

});
</script>
<script>
var countChecked = function () {
    var n = $("input:checked").length;
    if (n >= 1) {
        $("#btndiv").css({"visibility": "visible"});
        $("#pickcourier").css({"visibility": "visible"});
        $("#deliverycourier").css({"visibility": "visible"});
        $("#deldiv").css({"visibility": "visible"});
    } else {
        $("#btndiv").css({"visibility": "hidden"});
        $("#pickcourier").css({"visibility": "hidden"});
        $("#deliverycourier").css({"visibility": "hidden"});
        $("#deldiv").css({"visibility": "hidden"});
    }
};
countChecked();

$("input[type=checkbox]").on("click", countChecked);
</script>
<script>
    $('#POD').on('show.bs.modal', function(e) {
    var Id = $(e.relatedTarget).attr("data-id");
    $(e.currentTarget).find('input[name="cn"]').val(Id);
});
</script>
<script>
     function del_all(){
        var n = new Array();
        $("input:checked").each(function(){
            n.push(this.value);
        });

       $.ajax({
      type: "POST",
      dataType: "json",
      data: {
          n:n
      },
      url: "<?=base_url()?>admin/del_all",
      success: function(data) {
       $.Notification.notify('success','top right', 'Success', 'Consignment(s) Deleted Successfully.');
       setInterval('location.reload()', 2000);
      }
       });
    }
</script>
<script>
     function change_status(a){
            var status = $("#status_code"+a).attr("data-status");
        var n = new Array();
        $("input:checked").each(function(){
            n.push(this.value);
        });

       $.ajax({
      type: "POST",
      dataType: "json",
      data: {
          n:n
      },
      url: "<?=base_url()?>admin/change_statuses/"+status,
      success: function(data) {
       $.Notification.notify('success','top right', 'Success', 'Statuses Changed Successfully.');
       setInterval('location.reload()', 2000);
      }
       });
    }
</script>
 <?php
    if($this->session->flashdata('changed')){
        echo "<script>$.Notification.notify('success','top right', 'Success', 'Status Changed Successfully.')</script>";
    }
    ?>