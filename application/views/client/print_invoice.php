<!DOCTYPE html>

<?php
// print_r($invoice);die;
include 'includes/header.php'; ?>


            <div class="content-page">
                <div class="content">
                    <div class="container">
                        <div class="card-box">
                            <div class="row">
                                <div class="col-md-12">
                        		   <div class="panel panel-default">
                                    <!-- <div class="panel-heading">
                                        <h4>Invoice</h4>
                                    </div> -->
                                    <div class="panel-body">
                                        <div class="clearfix">
                                            <div class="pull-left">
                                                <h4 class="text-right"><img src="<?=base_url()?>assets/images/logo.png" alt="Delivery Ensure" style="height: 92px;"></h4>
                                                
                                            </div>
                                            <div class="pull-right">
                                                <h4>Invoice # <br>
                                                    <strong><?=$invoice[0]['ci_id']?></strong>
                                                </h4>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-md-12">
                                                
                                                <div class="pull-left m-t-30">
                                                    <address>
                                                      <strong><?=$profile[0]['name']?></strong><br>
                                                      <?=$profile[0]['address']?><br>
                                                      Phone: <?=$profile[0]['phone']?><br>
                                                      NTN: <?=$profile[0]['ntn']?><br>
                                                      </address>
                                                </div>
                                                <div class="pull-right m-t-30">
                                                    <p><strong>Invoice Date: </strong><?=$invoice[0]['date']?></p>
                                                    <p class="m-t-10"><strong>Invoice Status: </strong>
                                                    <?php
                                                    if($invoice[0]['status']==0){
                                                    ?>
                                                    <span class="label label-pink">Pending</span></p>
                                                    <?php
                                                    }
                                                    else
                                                    {
                                                    ?>
                                                    <span class="label label-success">Paid</span></p>
                                                    <?php
                                                    }
                                                    ?>
                                                    <p class="m-t-10"><strong>Invoice ID: </strong> #<?=$invoice[0]['ci_id']?></p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="m-h-50"></div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="table-responsive">
                                                    <table class="table m-t-30">
                                                        <thead>
                                                            <tr>
                                                                <th>CN #</th>
                                                                <th>Consignee Ref</th>
                                                                <th>Consignee</th>
                                                                <th>Destination City</th>
                                                                <th>Booking Date</th>
                                                                <th>Wieght</th>
                                                                <th>Status</th>
                                                                <th>COD</th>
                                                                <th style="text-align: center;">Delivery Cost + Tax</th>
                                                                <th>Reimbursement Amount</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php
                                                                $final_cost     =   0;
                                                                $second_weight  =   0;
                                                                $second_cost    =   0;
                                                                $tax_in_dec     =   $profile[0]['sst']/100;
                                                                $cost_with_tax  =   0;
                                                                $tax_cost       =   0;
                                                                $all_total      =   0;
                                                                $total_cod      =   0;
                                                                $reimburse      =   0;
                                                                $totalreimburse =   0;
                                                                foreach($invoice as $i){
                                                            ?>
                                                            <tr>
                                                                <td><?=$i['consignmet_id']?></td>
                                                                <td><?=$i['consignee_ref']?></td>
                                                                <td><?=$i['consignee_name']?></td>
                                                                <td><?=$i['city_name']?></td>
                                                                <td><?=$i['booking_date']?></td>
                                                                <td><?=$i['weight']?></td>
                                                                <td><?=$i['code']?> - <?=$i['description']?></td>
                                                                <td align="center"><?php
                                                                if($i['s_id']=='11'){
                                                                    echo '0';
                                                                }
                                                                else{
                                                                    echo $i['cod'];
                                                                    $total_cod  += $i['cod'];
                                                                }
                                                                ?></td>
                                                                <td align="center">
                                                                    <?php
                                                                        if($i['ref_id']=='2'){
                                                                           
                                                                            if($i['weight']<='1'){
                                                                                $final_cost =   ceil($i['weight'])*$i['price'];
                                                                                if($profile[0]['sst']!=0){
                                                                                    $tax_cost       =   $final_cost*$tax_in_dec;
                                                                                    $cost_with_tax  =   $tax_cost+$final_cost;
                                                                                    $all_total +=$cost_with_tax;
                                                                                    echo $final_cost.' + '.$profile[0]['sst'].'% = Rs.'.$cost_with_tax;
                                                                                }
                                                                                else{
                                                                                    echo $final_cost.' + '.$profile[0]['sst'].'% = Rs.'.$final_cost;
                                                                                    $all_total +=$final_cost;
                                                                                }
                                                                            }
                                                                            else{
                                                                                $second_weight  =   ceil($i['weight'])-1;
                                                                                $second_cost    =   $second_weight*$i['addkg'];
                                                                                $final_cost     =   $second_cost+$i['price'];
                                                                                if($profile[0]['sst']!=0){
                                                                                    $tax_cost       =   $final_cost*$tax_in_dec;
                                                                                    $cost_with_tax  =   $tax_cost+$final_cost;
                                                                                    $all_total +=$cost_with_tax;
                                                                                    echo $final_cost.' + '.$profile[0]['sst'].'% = Rs.'.$cost_with_tax;
                                                                                }
                                                                                else{
                                                                                    $all_total +=$final_cost;
                                                                                    echo $final_cost.' + '.$profile[0]['sst'].'% = Rs.'.$final_cost;
                                                                                    
                                                                                }
                                                                            }
                                                                        
                                                                        }
                                                                        else{
                                                                            if($i['weight']<='1'){
                                                                                $final_cost =   ceil($i['weight'])*$i['pricenwd'];
                                                                                if($profile[0]['sst']!=0){
                                                                                    $tax_cost       =   $final_cost*$tax_in_dec;
                                                                                    $cost_with_tax  =   $tax_cost+$final_cost;
                                                                                    $all_total +=$cost_with_tax;
                                                                                    echo $final_cost.' + '.$profile[0]['sst'].'% = Rs.'.$cost_with_tax;
                                                                                }
                                                                                else{
                                                                                    $all_total +=$final_cost;
                                                                                    echo $final_cost.' + '.$profile[0]['sst'].'% = Rs.'.$final_cost;
                                                                                }
                                                                            }
                                                                            else{
                                                                                $second_weight  =   ceil($i['weight'])-1;
                                                                                $second_cost    =   $second_weight*$i['addkgnwd'];
                                                                                $final_cost     =   $second_cost+$i['pricenwd'];
                                                                                if($profile[0]['sst']!=0){
                                                                                    $tax_cost       =   $final_cost*$tax_in_dec;
                                                                                    $cost_with_tax  =   $tax_cost+$final_cost;
                                                                                    $all_total +=$cost_with_tax;
                                                                                    echo $final_cost.' + '.$profile[0]['sst'].'% = Rs. '.$cost_with_tax;
                                                                                    
                                                                                }
                                                                                else{
                                                                                    $all_total +=$final_cost;
                                                                                    echo $final_cost.' + '.$profile[0]['sst'].'% = Rs. '.$final_cost;
                                                                                }
                                                                            }
                                                                        
                                                                        }
                                                                    ?>
                                                                </td>
                                                                <td align="center">
                                                                    <?php if($i['s_id']=='11'){
                                                                        echo '0';
                                                                    }
                                                                    else{
                                                                        if($profile[0]['sst']!=0){
                                                                            $reimburse  =   $i['cod']-$cost_with_tax;
                                                                            $totalreimburse +=   $reimburse;
                                                                            echo $reimburse;
                                                                        }
                                                                        else{
                                                                            $reimburse  =   $i['cod']-$final_cost;
                                                                            $totalreimburse +=   $reimburse;
                                                                            echo $reimburse;
                                                                        }
                                                                        
                                                                    }
                                                                    ?>
                                                                </td>
                                                            </tr>
                                                            <?php
                                                                }
                                                            ?>
                                                        </tbody>
                                                        <tfoot>
                                                            <tr>
                                                                <td colspan="6"></td>
                                                                <td align="center" style="border-bottom: 1px solid; border-top: 1px solid;"><b>Total</b></td>
                                                                <td align="center" style="border-bottom: 3px double; border-top: 1px solid;"><?=$total_cod?></td>
                                                                <td align="center" style="border-bottom: 3px double; border-top: 1px solid;">Rs. <?=$all_total?></td>
                                                                <td align="center" style="border-bottom: 3px double; border-top: 1px solid;">Rs. <?=$total_cod-$all_total?></td>
                                                            </tr>
                                                        </tfoot>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                       
                                        <div class="hidden-print">
                                            <div class="pull-right">
                                                <a href="javascript:window.print()" class="btn btn-inverse waves-effect waves-light"><i class="fa fa-print"></i> Print</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        		</div>
                        	</div>
                        </div>
                    </div>
                </div>
            </div>
            
<?php include 'includes/footer.php';?>