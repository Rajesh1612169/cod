<!DOCTYPE html>
 <script src='https://cdnjs.cloudflare.com/ajax/libs/Chart.js/1.0.2/Chart.min.js'></script>
<?php include 'includes/header.php'; ?>

            <!-- ========== Left Sidebar Start ========== -->
            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="content-page">
                 <!--Start content -->
                <div class="content">
                    <div class="container">

                         <!--Page-Title -->
                        

                        <div class="row">
                            <div class="col-md-6 col-lg-2">
                                <div class="widget-bg-color-icon card-box fadeInDown animated">
                                    <div class="bg-icon bg-icon-info pull-left">
                                        <i class="md md-today text-info"></i>
                                    </div>
                                    <div class="text-right">
                                        <h3 class="text-dark"><b class="counter"><?=$today[0]['COUNT(c_id)'] ?></b></h3>
                                        <p class="text-muted">Today's Bookings</p>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-2">
                                <div class="widget-bg-color-icon card-box">
                                    <div class="bg-icon bg-icon-purple pull-left">
                                        <i class="ion-ios7-box text-purple"></i>
                                    </div>
                                    <div class="text-right">
                                        <h3 class="text-dark"><b class="counter"><?=$all[0]['COUNT(c_id)'] ?></b></h3>
                                        <p class="text-muted">All Bookings</p>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-2">
                                <div class="widget-bg-color-icon card-box">
                                    <div class="bg-icon bg-icon-pink pull-left">
                                        <i class="md md-view-week text-pink"></i>
                                    </div>
                                    <div class="text-right">
                                        <h3 class="text-dark"><b class="counter"><?=$arrival[0]['COUNT(c_id)'] ?></b></h3>
                                        <p class="text-muted">Arrival</p>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-2">
                                <div class="widget-bg-color-icon card-box">
                                    <div class="bg-icon bg-icon-pink pull-left">
                                        <i class="ion-ios7-box text-purple"></i>
                                    </div>
                                    <div class="text-right">
                                        <h3 class="text-dark"><b class="counter"><?=$refuse[0]['COUNT(c_id)'] ?></b></h3>
                                        <p class="text-muted">Refused To Recieve</p>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-2">
                                <div class="widget-bg-color-icon card-box">
                                    <div class="bg-icon bg-icon-pink pull-left">
                                        <i class="md md-view-week text-pink"></i>
                                    </div>
                                    <div class="text-right">
                                        <h3 class="text-dark"><b class="counter"><?=$office[0]['COUNT(c_id)'] ?></b></h3>
                                        <p class="text-muted">Reached At Office</p>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-2">
                                <div class="widget-bg-color-icon card-box">
                                    <div class="bg-icon bg-icon-pink pull-left">
                                        <i class="md md-close text-danger"></i>
                                    </div>
                                    <div class="text-right">
                                        <h3 class="text-dark"><b class="counter"><?=$re_attempt[0]['COUNT(c_id)'] ?></b></h3>
                                        <p class="text-muted">Re Attempt</p>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-2">
                                <div class="widget-bg-color-icon card-box">
                                    <div class="bg-icon bg-icon-pink pull-left">
                                        <i class="md md-view-week text-pink"></i>
                                    </div>
                                    <div class="text-right">
                                        <h3 class="text-dark"><b class="counter"><?=$hold[0]['COUNT(c_id)'] ?></b></h3>
                                        <p class="text-muted">Hold</p>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-2">
                                <div class="widget-bg-color-icon card-box">
                                    <div class="bg-icon bg-icon-pink pull-left">
                                        <i class="md md-new-releases text-warning"></i>
                                    </div>
                                    <div class="text-right">
                                        <h3 class="text-dark"><b class="counter"><?=$cust_notavail[0]['COUNT(c_id)'] ?></b></h3>
                                        <p class="text-muted">Customer Not Available</p>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-2">
                                <div class="widget-bg-color-icon card-box">
                                    <div class="bg-icon bg-icon-danger pull-left">
                                        <i class="md md-close text-danger"></i>
                                    </div>
                                    <div class="text-right">
                                        <h3 class="text-dark"><b class="counter"><?=$undelivered[0]['COUNT(c_id)'] ?></b></h3>
                                        <p class="text-muted">Inprocess Parcels</p>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-2">
                                <div class="widget-bg-color-icon card-box">
                                    <div class="bg-icon bg-icon-success pull-left">
                                        <i class="md md-check text-success"></i>
                                    </div>
                                    <div class="text-right">
                                        <h3 class="text-dark"><b class="counter"><?=$delivered[0]['COUNT(c_id)'] ?></b></h3>
                                        <p class="text-muted">Delivered Parcels</p>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-2">
                                <div class="widget-bg-color-icon card-box">
                                    <div class="bg-icon bg-icon-warning pull-left">
                                        <i class="md md-new-releases text-warning"></i>
                                    </div>
                                    <div class="text-right">
                                        <h3 class="text-dark"><b class="counter"><?=$new[0]['COUNT(c_id)'] ?></b></h3>
                                        <p class="text-muted">Return Parcels</p>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>

                                <br>
                        </div>
                           
                      <div class="row">
                        <div  class="card-box">
                                     <div id="my-calendar"></div>

                        </div>
                    </div>
                    <div  class="card-box">
                        <canvas id="countries" width="600" height="400"></canvas>
                        <canvas id="income" width="600" height="400"></canvas>

                        </div>
                                                    
                     <div class="col-md-12">
                                <a class="btn btn-danger pull-right" style="border: 1px solid ; margin-bottom: 20px;" href="<?=base_url()?>admin/add_news">Make Announcements</a>
                            </div>
                      <div class="row">
                           <div class="card-box table-responsive">
                            <h4 class="m-t-0 header-title"><b>Announcements</b></h4>
                            
                            <table id="datatable" class="table table-striped table-bordered">
                                <thead>
                                <tr>
                                    <th>s.no #</th>
                                    <th>Date</th>
                                    <th>Heading</th>
                                    <th>Description</th>
                                </tr>
                                </thead>


                                <tbody>
                                    <?php
                                        $count=1;
                                        foreach($news as $n){
                                    ?>
                                        <tr>
                                            <td><?=$count?></td>
                                           <td><?=$n['date']?></td>
                                           <td><?=$n['heading']?></td>
                                           <td><?=$n['description']?></td>
                                        </tr>
                                        <?php
                                        $count++;
                                        }
                                        ?>
                                        
                                </tbody>
                            </table>
                            
                        </div>
                        </div>
                        <div class="col-md-12">
                        <a class="btn btn-danger pull-right" style=" margin-bottom: 20px;" href="<?=base_url()?>admin/courier_settlement">Settle Courier</a>
                        </div>
                        <div class="row">
                            
                           <div class="card-box table-responsive">
                               
                            <h4 class="m-t-0 header-title"><b>Courier Settlements</b></h4>
                            
                            <table id="datatable1" class="table table-striped table-bordered">
                                <thead>
                                <tr>
                                    <th>s.no #</th>
                                    <th>Courier Name</th>
                                    <th>COD on hand</th>
                                </tr>
                                </thead>


                                <tbody>
                                    <?php
                                        $count=1;
                                        foreach($couriers as $courier){
                                            if($courier['c_id']!=1){
                                    ?>
                                        <tr>
                                            <td><?=$count?></td>
                                           <td><?=$courier['name']?> - <?=$courier['father_name']?></td>
                                           <td>Rs. <?=$courier['SUM(cod)']?></td>
                                        </tr>
                                        <?php
                                        $count++;
                                            }
                                        }
                                        ?>
                                        
                                </tbody>
                            </table>
                            
                        </div>
                        </div>


                    </div> <!-- container -->

                </div> <!-- content -->

                

            </div>
<?php include 'includes/footer.php';?>
<script>
 var barData = {
                labels : ["January","February","March","April","May","June"],
                datasets : [
                    {
                        fillColor : "#48A497",
                        strokeColor : "#48A4D1",
                        data : [456,479,324,569,702,600]
                    },
                    {
                        fillColor : "rgba(73,188,170,0.4)",
                        strokeColor : "rgba(72,174,209,0.4)",
                        data : [364,504,605,400,345,320]
                    }
                ]
            }
            // get bar chart canvas
            var income = document.getElementById("income").getContext("2d");
            // draw bar chart
            new Chart(income).Bar(barData);
            // pie chart data
            var pieData = [
                {
                    value: 20,
                    color:"#878BB6"
                },
                {
                    value : 40,
                    color : "#4ACAB4"
                },
                {
                    value : 10,
                    color : "#FF8153"
                },
                {
                    value : 30,
                    color : "#FFEA88"
                }
            ];
            // pie chart options
            var pieOptions = {
                 segmentShowStroke : false,
                 animateScale : true
            }
            // get pie chart canvas
            var countries= document.getElementById("countries").getContext("2d");
            // draw pie chart
            new Chart(countries).Pie(pieData, pieOptions);
    const myCalendar = new TavoCalendar('#my-calendar', {
      // settings here
})
        $(document).ready(function () {
        $('#datatable').DataTable( {
        "lengthMenu": [[5, 10, 20, -1], [5, 10, 20, "All"]]
    });
    $('#datatable1').DataTable( {
        "lengthMenu": [[5, 10, 20, -1], [5, 10, 20, "All"]]
    });
        });
</script>