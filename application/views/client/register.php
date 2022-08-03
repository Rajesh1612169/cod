<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="Recreatepk.com">
        <link rel="shortcut icon" href="<?=base_url()?>assets/images/icon.png">
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
        <style>
        .btn-blue, .btn-blue:hover, .btn-blue:focus, .btn-blue:active {
        background-color: #50c1f9 !important;
        border: 1px solid #50c1f9 !important;
        color: #ffffff;
        </style>

        <div class="account-pages"></div>
        <div class="clearfix"></div>
        <div class="wrapper-page">
        	<div class=" card-box">
            <div class="panel-heading">
                <center><img src="<?=base_url()?>assets/images/logo4.png" class="no-print img-responsive"></center>
            </div> 

            <div class="panel-body">
            <form class="form-horizontal m-t-20" action="<?= base_url('client/register') ?>" method="POST">
                
                <div class="form-group ">
                    <div class="col-xs-12">
                        <input class="form-control" name="name" type="text" required="" placeholder="Full Name" required>
                    </div>
                </div>
                
                <div class="form-group ">
                    <div class="col-xs-12">
                        <input class="form-control" name="company_name" type="text" required="" placeholder="Company Name" required>
                    </div>
                </div>
                
                <div class="form-group ">
                    <div class="col-xs-12">
                        <input class="form-control" name="email" type="email" required="" placeholder="E-Mail" required>
                    </div>
                </div>
                
                <div class="form-group ">
                    <div class="col-xs-12">
                        <input class="form-control" name="address" type="text" required="" placeholder="Address" required>
                    </div>
                </div>
                
                <div class="form-group ">
                    <div class="col-xs-12">
                        <input class="form-control" name="cnic" type="text" required="" placeholder="CNIC" required>
                    </div>
                </div>
                
                <div class="form-group ">
                    <div class="col-xs-12">
                        <input class="form-control" name="number" type="tel" required="" placeholder="Phone" required>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-12">
                        <input class="form-control" name="username" type="text" required="" placeholder="Username" required>
                    </div>
                </div>
                
                <div class="form-group">
                    <div class="col-xs-12">
                        <input class="form-control" name="password" type="password" required="" placeholder="Password" required>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-xs-12">
                        <input class="form-control" name="bankname" type="text" required="" placeholder="Bank Name:" required>
                    </div>
                </div>
                 <div class="form-group">
                    <div class="col-xs-12">
                        <input class="form-control" name="bank_acc_title" type="text" required="" placeholder="Bank Account Title:" required>
                    </div>
                </div>
               <div class="form-group">
                    <div class="col-xs-12">
                        <input class="form-control" name="bank_acc_num" type="text" required="" placeholder="Bank Account Number:" required>
                    </div>
                </div>
               <div class="form-group">
                    <div class="col-xs-12">
                        <input class="form-control" name="easypaisa_acc_num" type="text" required="" placeholder="Easy Paisa Account Number:" required>
                    </div>
                </div>
                 <div class="form-group">
                    <div class="col-xs-12">
                        <input class="form-control" name="easypaisa_acc_title" type="text" required="" placeholder="Easy Paisa Title of Account:" required>
                    </div>
                </div>
                
              
                <div class="form-group text-center m-t-40">
                    <div class="col-xs-12">
                        <button class="btn btn-danger btn-block text-uppercase waves-effect waves-light" type="submit">Register</button>
                    </div>
                </div>
                
                <div class='form-group'>
                    <div class="col-xs-12" align="center">
                        <a href="https://cod.redxcourier.com/client/login_view" class="btn btn-danger btn-block text-uppercase waves-effect waves-light">Back To Login</a>
                    </div>
                </div>
                
                <div class='form-group'>
                    <div class="col-xs-12" align="center">
                        <p>Developed By <a href="http://recreatepk.com/" style='color:#f6c72c' target="_blank">Re | Create</a></p>
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
         
            $('#client').click(function(){
                $('input[name="email"]').val('client@client.com');
                $('input[name="pass"]').val('client123');
            });
    </script>
	</body>
</html>