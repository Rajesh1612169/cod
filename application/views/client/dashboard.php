<!DOCTYPE html>
<?php include 'includes/header.php'; ?>
<?php
// print_r($weekly);die;
?>

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
                                    <div class="bg-icon bg-icon-pink pull-left">
                                        <i class="md md-view-week text-pink"></i>
                                    </div>
                                    <div class="text-right">
                                        <h3 class="text-dark"><b class="counter"><?=$weekly[0]['COUNT(c_id)'] ?></b></h3>
                                        <p class="text-muted">Weekly Bookings</p>
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
                                    <div class="bg-icon bg-icon-warning pull-left">
                                        <i class="md md-new-releases text-warning"></i>
                                    </div>
                                    <div class="text-right">
                                        <h3 class="text-dark"><b class="counter"><?=$return[0]['COUNT(c_id)'] ?></b></h3>
                                        <p class="text-muted">Return Parcels</p>
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


                    </div> <!-- container -->

                </div> <!-- content -->

                

            </div>
<?php include 'includes/footer.php';?>