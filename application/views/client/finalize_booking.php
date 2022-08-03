<!DOCTYPE html>


<?php include 'includes/header.php'; ?>
  
            <div class="content-page">
                <div class="content">
                    <div class="container">
                        <div class="row">
                              <div class="card-box table-responsive">
                            <h4 class="m-t-0 header-title"><b>Bookings</b></h4>
                            <table id="datatable" class="table table-striped table-bordered">
                                <thead>
                                <tr>
                                    <th><input id="selectAll" type=checkbox style="width: 24px;height: 23px;"/> Select</th>
                                    <th>Booking Date</th>
                                    <th>Description</th>
                                    <th>Consignee Name</th>
                                    <th>Address</th>
                                    <th>Destination City</th>
                                    <th>Pieces</th>
                                    <th>Weight</th>
                                    <th>COD Amount</th>
                                    <th>Ref No</th>

                                    <th>Action</th>
                                    <!--<th>Status</th>-->
                                </tr>
                                </thead>


                                <tbody>
                                    <?php
                                        foreach($datas as $data){
                                    ?>
                                        <tr>
                                            <td><input value="<?=$data['ls_c_id']?>" type=checkbox style="width: 24px;height: 23px;"/></td>
                                           <td><?=$data['booking_date']?></td>
                                           <td><?=$data['consignee_ref']?></td>
                                           <td><?=$data['description']?></td>
                                           <td><?=$data['consignee_name']?></td>
                                           <td><?=$data['consignee_address']?></td>
                                           <td><?=$data['name']?></td>
                                           <td><?=$data['pcs']?></td>
                                           <td><?=$data['weight']?></td>
                                           <td><?=$data['cod']?></td>
                                           <td>
                                               <a class="btn btn-info dropdown-toggle waves-effect waves-light" style="background-color: #9c0d00 !important;border: 1px solid #9c0d00 !important;" href="<?=base_url()?>client/edit_consignement/<?=$data['ls_c_id']?>">Edit consignment</a></li>
                                               <a class="btn btn-info dropdown-toggle waves-effect waves-light" style="background-color: #9c0d00 !important;border: 1px solid #9c0d00 !important;" href="<?=base_url()?>client/del_loadsheet_consigment1/<?=$data['ls_c_id']?>">Delete consignment</a></li>
                                           </td>
                                           <!--<td></td>-->
                                        </tr>
                                        <?php
                                        }
                                        ?>
                                </tbody>
                            </table>
	                            <input hidden type="button" onclick="finalize_booking()" id="btndiv" class="btn-info" style="background-color: #9c0d00 !important; border: 1px solid #9c0d00 !important;" value="Save Booking">
	                            <input hidden type="button" onclick="delete_booking()" id="delbtn" class="btn-info" style="background-color: #9c0d00 !important; border: 1px solid #9c0d00 !important;" value="Delete Booking(s)">
                        </div>
                        </div>
                    </div>
                </div>
            </div>
            

            
<?php include 'includes/footer.php';?>
<!--<script>-->
<!--        $(document).ready(function () {-->
<!--        $('#datatable').DataTable( {-->
<!--        "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]]-->
<!--    });-->
<!--        });-->
<!--</script>-->
<script>
     $("#selectAll").click(function(){
        $("input[type=checkbox]").prop('checked', $(this).prop('checked'));

});
</script>
<script>

      $( document ).ready(function() {
    
    var checkboxes = $("input[type='checkbox']"),
    actions = $("#btndiv");
    actions2 = $("#delbtn");

    checkboxes.click(function() {
        actions.attr("hidden", !checkboxes.is(":checked"));
        actions2.attr("hidden", !checkboxes.is(":checked"));
    });
      
});
  
     
</script>
<script>
    function delete_booking(){
        $("#btndiv").attr('disabled', 'disabled');
         $("#delbtn").attr('disabled', 'disabled');
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
      url: "<?=base_url()?>client/del_loadsheet_consigment",
      success: function(data) {
         setInterval('location.reload()', 2000);
      }
       });
    }
</script>
<script>
    function finalize_booking(){
        $("#btndiv").attr('disabled', 'disabled');
         $("#delbtn").attr('disabled', 'disabled');
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
      url: "<?=base_url()?>client/save_booking",
      success: function(data) {
        //   console.log(data);
            setInterval('location.reload()', 5000);
      }
       });
    }
</script>
 <?php
                             if($this->session->flashdata('success')){
        echo "<script>$.Notification.notify('success','top right', 'Success', 'Temporary consignment(s) has been Deleted.')</script>";
    }
    ?>