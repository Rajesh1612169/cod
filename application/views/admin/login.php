<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="Recreatepk.com">
        <link rel="shortcut icon" href="<?= base_url()?>assets/images/icon.png">
        <title>Redx Courier | Login</title>
        <link href="<?=base_url()?>assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="<?=base_url()?>assets/css/core.css" rel="stylesheet" type="text/css" />
        <link href="<?=base_url()?>assets/css/components.css" rel="stylesheet" type="text/css" />
        <link href="<?=base_url()?>assets/css/icons.css" rel="stylesheet" type="text/css" />
        <link href="<?=base_url()?>assets/css/pages.css" rel="stylesheet" type="text/css" />
        <link href="<?=base_url()?>assets/css/responsive.css" rel="stylesheet" type="text/css" />
        <script src="<?=base_url()?>assets/js/modernizr.min.js"></script>
    </head>
    <body>

        <div class="account-pages"></div>
        <div class="clearfix"></div>
        <div class="wrapper-page">
        	<div class=" card-box">
            <div class="panel-heading">
                <center><img src="<?=base_url()?>assets/images/logo4.PNG" class="no-print img-responsive"></center>
            </div> 


            <div class="panel-body">
            <form class="form-horizontal m-t-20" action="<?=base_url()?>admin/login" method="POST">
                
                <div class="form-group ">
                    <div class="col-xs-12">
                        <input class="form-control" name="email" type="text" required="" placeholder="Email">
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-12">
                        <input class="form-control" name="pass" type="password" required="" placeholder="Password">
                    </div>
                </div>
                
                <div class="form-group text-center m-t-40">
                    <div class="col-xs-12">
                        <button class="btn btn-danger btn-block text-uppercase waves-effect waves-light" type="submit">Log In</button>
                    </div>
                    <!--<div class="col-xs-12">-->
                    <!--    <button href="" style="margin-top: 15px;" class="btn btn-danger btn-block text-uppercase waves-effect waves-light" type="button">Register</button>-->
                    <!--</div>-->
                </div>
                
                <div class='form-group'>
                    <div class="col-xs-12" align="center">
                        <p>Developed by<a href="https://recreatepk.com/" style='color:#FF0000;'> Re | Create</a></p>
                    </div>
                </div>

            </form> 
            
            </div>   
            </div>                              
            
        </div>
        
    	<script>
            var resizefunc = [];
        </script>

        <!-- jQuery  -->
        <script src="<?=base_url()?>assets/js/jquery.min.js"></script>
        <script src="<?=base_url()?>assets/js/bootstrap.min.js"></script>
        <script src="<?=base_url()?>assets/js/detect.js"></script>
        <script src="<?=base_url()?>assets/js/fastclick.js"></script>
        <script src="<?=base_url()?>assets/js/jquery.slimscroll.js"></script>
        <script src="<?=base_url()?>assets/js/jquery.blockUI.js"></script>
        <script src="<?=base_url()?>assets/js/waves.js"></script>
        <script src="<?=base_url()?>assets/js/wow.min.js"></script>
        <script src="<?=base_url()?>assets/js/jquery.nicescroll.js"></script>
        <script src="<?=base_url()?>assets/js/jquery.scrollTo.min.js"></script>
        
        <script src="<?=base_url()?>assets/plugins/notifyjs/js/notify.js"></script>
        <script src="<?=base_url()?>assets/plugins/notifications/notify-metro.js"></script>

        <script src="<?=base_url()?>assets/js/jquery.core.js"></script>
        <script src="<?=base_url()?>assets/js/jquery.app.js"></script>
    <?php
    if($this->session->flashdata('error')){
        echo "<script>$.Notification.notify('error','top right', 'Error', 'Email or Password is incorrect.')</script>";
    }
    ?>
    <script>
        $('form').attr('autocomplete','off');
     
         $('#admin').click(function(){
                $('input[name="email"]').val('admin@admin.com');
                $('input[name="pass"]').val('admin123');
            });
    </script>
	</body>
</html>