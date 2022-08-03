<!DOCTYPE html>

<?php
// print_r($datas);die;
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
                           <div class="card-box table-responsive">
                               <form action="<?=base_url()?>admin/search_booked_by_cns" method="POST">
                                <div class="col-md-12">
                                    
                                    <h4 class="m-t-0 header-title"><b>Search by CN#</b></h4>
	                               <textarea class="col-md-10" name="cn" rows="5" cols="110"></textarea>
	                               <div class="col-md-2">
									    <button class="btn btn-danger"  type="submit" >Search</button>
                                    </div>
	                            </div>
	                            </form>
	                            <div class="col-md-12">
                            <h4 class="m-t-0 header-title"><b>New Bookings</b></h4>
                            
                            <table id="datatable" class="table table-striped table-bordered">
                                <thead>
                                <tr>
                                    <th><input id="selectAll" type=checkbox style="width: 24px;height: 23px;"/> Select All</th>
                                    <th>CN #</th>
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
                                </tr>
                                </thead>


                                <tbody>
                                    <?php
                                        foreach($datas as $data){
                                    ?>
                                        <tr style="<?php
                                            echo 'background-color:'.$data['color_code'].' !important;';
                                           ?>" >
                                            <td><input value="<?=$data['cn']?>" type=checkbox style="width: 24px;height: 23px;" /> </td>
                                           <td><?=$data['cn']?></td>
                                           <td><?=$data['booking_date']?></td>
                                           <td title="<?=$data['contact_name']?>"><?=$data['company_name']?></td>
                                           <td><?=$data['consignee_name']?></td>
                                           <td><?=$data['consignee_address']?></td>
                                           <td><?=$data['city_name']?></td>
                                           <td><?=$data['consignee_number']?></td>
                                           <td title="Peices:<?=$data['pcs']?>"><input type='text' id='weight<?=$data['cn']?>' value='<?=$data['weight']?>'></td>
                                           <td><?=$data['cod']?></td>
                                           <td><?=$data['remark']?></td>
                                           <td><?=$data['code']?>-<?=$data['description']?></td>
                                           
                                        </tr>
                                          <?php
                                               }
                                               ?>
                                </tbody>
                            </table>
                            </div>
                            <div class="col-md-12">
                            <div id="btndiv" class="col-md-3">
                                <p>change Status</p>
                            <?php
                                foreach($statuses as $status){
                                     if($status['s_id']=='7'){                      
                            ?>
                            
                                    <a href="javascript:void(0)" onclick="change_status(<?=$status['s_id']?>)" id="status_code<?=$status['s_id']?>" data-status="<?=$status['s_id']?>" class="btn btn-danger" >Marked as Arrived</a>
                            <?php
                                     }
                            }
                            ?>

	                        </div>
	                        
	                        </div>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
           
<?php include 'includes/footer.php';?>


<script>
        $(document).ready(function () {
        $('#datatable').DataTable( {
        "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]]
    });
        });
</script>
<script>
     $("#selectAll").click(function(){
        $("input[type=checkbox]").prop('checked', $(this).prop('checked'));

});
</script>

<script>
     function change_status(a){
            var status = $("#status_code"+a).attr("data-status");
        var n = new Array();
        var weight  =   new Array();
        
        var as  =   [];
        // var temp;
       
        $("input:checked").each(function(){
            
            temp    = this.value;
            var obj =   {};
            // n.push(this.value);
            obj['ids']  =   temp;
            obj['weight']=  $("#weight"+temp).val();
            as.push(obj);
            delete temp;
        }); 
         console.log(as);
       
       $.ajax({
      type: "POST",
      dataType: "json",
      data: {
          n:as
      },
      url: "<?=base_url()?>admin/change_statuses_arrival/"+status,
      success: function(data) {
      $.Notification.notify('success','top right', 'Success', 'Statuses Changed Successfully.');
      setInterval('location.reload()', 2000);
      }
       });
    }
</script>