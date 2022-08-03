
<!DOCTYPE html>
<?php 
//  print("<pre>".print_r($sheet_data,true)."</pre>");die;
include 'includes/header.php'; 

?>


            <div class="content-page">
                <div class="content">
                    <div class="container">
                        <div class="row">
                            <div class="card-box table-responsive">
                        		<h4 class="m-t-0 header-title"><b>Bookings</b></h4>
                        		<form action="<?=base_url()?>client/save_excel_date" method="POST">
                            <table id="datatable" class="table table-striped table-bordered">
                                <thead>
                                <tr>
                                    <th>S.No</th>
                                   <th>Consignee Name</th>
                                   <th>Reference Code</th>
                                   <th>Consignee Number</th>
                                   <th>Consignee Email</th>
                                   <th>Consignee Address</th>
                                   <th>COD</th>
                                   <th>Pieces</th>
                                   <th>Wieght</th>
                                   <th>City</th>
                                </tr>
                                </thead>
                        

                                <tbody>
                                    
                                    <?php
                                    $count=1;
                                        foreach($sheet_data as $sheet){
                                    ?>
                                        <tr>
                                            <td><?=$count?></td>
                                            <input class="form-control" name="sheeta[a<?=$count?>]" value="<?=$sheet['A']?>" type="hidden">
                                            <input class="form-control" name="sheetb[a<?=$count?>]" value="<?=$sheet['B']?>" type="hidden">
                                            <td><input class="form-control" name="sheetc[a<?=$count?>]" value="<?=$sheet['C']?>"></td>
                                            <td><input class="form-control" name="sheetd[a<?=$count?>]" value="<?=$sheet['D']?>"></td> 
                                            <td><input class="form-control" name="sheete[a<?=$count?>]" value="<?=$sheet['E']?>"></td>
                                            <td><input class="form-control" name="sheetf[a<?=$count?>]" value="<?=$sheet['F']?>"></td>
                                            <td><input class="form-control" name="sheetg[a<?=$count?>]" value="<?=$sheet['G']?>"></td>
                                            <td><input class="form-control" name="sheeth[a<?=$count?>]" value="<?=$sheet['H']?>"></td>
                                            <td><input class="form-control" name="sheeti[a<?=$count?>]" value="<?=$sheet['I']?>"></td>
                                            <td><input class="form-control" name="sheetj[a<?=$count?>]" value="<?=$sheet['J']?>"></td>
                                            <td><input class="form-control" name="sheetj[a<?=$count?>]" value="<?=$sheet['L']?>"></td>
                                            <input class="form-control" name="sheetk[a<?=$count?>]" value="<?=$sheet['K']?>" type="hidden">
                                            
                                            <input class="form-control" name="sheetm[a<?=$count?>]" value="<?=$sheet['M']?>" type="hidden">
                                        </tr>
                                        <?php
                                        $count++;
                                        }
                                        ?>
                                        
                                </tbody>
                                
                            </table>
                            <button type="submit" class="btn btn-info" style="background-color: #9c0d00 !important; border: 1px solid #9c0d00 !important;">Save Booking</button>
                                        </form>
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