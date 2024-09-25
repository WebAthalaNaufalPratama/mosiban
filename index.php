<?php
include "inc/olah.php";
session_start();

if (isset($_SESSION["email"]) && $_SESSION["password"]) {
    unset($_SESSION["email"]);
    unset($_SESSION["password"]);
    session_destroy();
}

if (isset($_SESSION["warning"])) {
    echo '<script>';
    echo 'alert("' . $_SESSION["warning"] . '")';
    echo '</script>';
    unset($_SESSION["warning"]);
}
?>
<!DOCTYPE html>
<html>
  <head>
    <base href="./">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Tank Sediment">
    <meta name="author" content="Łukasz Holeczek">
    <meta name="keyword" content="Bootstrap,Admin,Template,Open,Source,jQuery,CSS,HTML,RWD,Dashboard">
    <title> Login </title>
    
    <link rel="icon" type="image/ico" href="img/logo mosiban.png" width="10" />
    <link rel="shortcut icon" type="image/x-icon" href="/img/logo mosiban.png">
    <link href="https://fonts.googleapis.com/css?family=Muli:300,300i,400,400i,600,600i,700,700i|Comfortaa:300,400,500,700" rel="stylesheet">
    <!-- BEGIN VENDOR CSS-->
    <link rel="stylesheet" type="text/css" href="/app-assets/css/vendors.css">
    <link rel="stylesheet" type="text/css" href="/app-assets/vendors/css/forms/icheck/icheck.css">
    <link rel="stylesheet" type="text/css" href="/app-assets/vendors/css/forms/icheck/custom.css">
    <!-- END VENDOR CSS-->
    <!-- BEGIN MODERN CSS-->
    <link rel="stylesheet" type="text/css" href="/app-assets/css/app.css">
    <!-- END MODERN CSS-->
    <!-- BEGIN Page Level CSS-->
    <link rel="stylesheet" type="text/css" href="/app-assets/css/core/menu/menu-types/vertical-compact-menu.css">
    <link rel="stylesheet" type="text/css" href="/app-assets/vendors/css/cryptocoins/cryptocoins.css">
    <link rel="stylesheet" type="text/css" href="/app-assets/css/pages/account-login.css">
    <!-- END Page Level CSS-->
    <!-- BEGIN Custom CSS-->
    <link rel="stylesheet" type="text/css" href="/assets/css/style.css">
    <!-- END Custom CSS-->
    <script src="node_modules/jquery-3.4.1.min.js"></script>
    <script src="node_modules/popper.min.js"></script>
    <script src="node_modules/bootstrap.min.js"></script>
    <script src="node_modules/pace.min.js"></script>
    <script src="node_modules/perfect-scrollbar-0.4.5.min.js"></script>
    <script src="node_modules/coreui.min.js"></script>
    <script src="node_modules/Chart.min.js"></script>
    <script src="node_modules/custom-tooltips.min.js"></script>
    <script src="js/main.js"></script>
    <script src="inc/sedimen.js"></script>
  </head>
  <body class="vertical-layout vertical-compact-menu 1-column  bg-full-screen-image menu-expanded blank-page blank-page" data-open="click" data-menu="vertical-compact-menu" data-col="1-column">
    <!-- ////////////////////////////////////////////////////////////////////////////-->
    <?php
    if (isset($_GET['p'])) {
        if ($_GET['p'] == 'reg') {
            reg();
        }
    } else home();
    ?>
    <?php
    function home()
    {
    ?>
    <div class="app-content content">
      <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body">
            <section id="account-login" class="flexbox-container">    
    <div class="col-12 d-flex align-items-center justify-content-center">
        <!-- image -->
        <div class="col-xl-3 col-lg-4 col-md-5 col-sm-5 col-12 p-0 text-center d-none d-md-block">
            <div class="border-grey border-lighten-3 m-0 box-shadow-0 card-account-left height-400">
                <img src="img/logo mosiban.png" class="card-account-img width-300" alt="card-account-img">
            </div>
        </div>
        <!-- login form -->
        <div class="col-xl-3 col-lg-4 col-md-5 col-sm-5 col-12 p-0">
            <div class="card border-grey border-lighten-3 m-0 box-shadow-0 card-account-right height-400">                
                <div class="card-content">                    
                    <div class="card-body p-3">
                        <p class="text-center h5 text-capitalize">Welcome!</p>
                        <p class="mb-3 text-center">Please enter your login details</p>
                        <form method="post" class="login-form" id="loginForm" align="center">                           
                            <!--<fieldset class="form-label-group">-->
                                <input type="email" class="form-control" name="email" placeholder="Your Email"  required>
                                 <!--<label for="user-name">Username</label>-->
                            <!--</fieldset>-->
                            <!--<fieldset class="form-label-group">-->
                                <input type="password" class="form-control" id="login-password" name="password" placeholder="Enter Password" required>
                                <input type="text" id="fcmToken" name="fcmToken" hidden><br><br>
                                 <!--<label for="user-password">Password</label> -->
                            <!--</fieldset>-->
                            <button type="submit" class="btn-gradient-primary btn-block my-1" id="login-btn" name="login-btn" value="login-btn">Log In</button>
                        </form>
                        <p class="text-center"><a href="live.php" class="card-link" target="_blank">Live</a></p>
                    </div>                    
                </div>
            </div>
        </div> 
        <?php
        }
        function reg()
        {
        ?>
        
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-2"></div>
                <div class="col-mx-6">
                    <div class="modal-contentzz slideInDown">
                        <form class="mb-2" id="daftar" method="post">
                            <h1 align="center">Sign Up</h1>
                            <p class="text-muted" align="center">Please fill in this form to create an account.</p>

                            <label for="name"><b>Name</b></label>
                            <div class="input-group mb-3 input-group-sm">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                                </div>
                                <input type="name" name="nama" class="form-control" placeholder="Name" required id="name">
                            </div>

                            <label for="phone"><b>Phone</b></label>
                            <div class="input-group mb-3 input-group-sm">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-phone-square"></i></span>
                                </div>
                                <input type="phone" name="telp" class="form-control" placeholder="Phone" required>
                            </div>

                            <label for="email"><b>Email</b></label>
                            <div class="input-group mb-3 input-group-sm">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                </div>
                                <input type="email" name="email" class="form-control" placeholder="Email" required>
                            </div>

                            <label for="password"><b>Password</b></label>
                            <div class="input-group mb-3 input-group-sm">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-lock"></i></span>
                                </div>
                                <input type="password" name="password" class="form-control" placeholder="Password" id="signin-password" required>
                            </div>
                            <!-- <label for="captcha"><b>Captcha</b></label>
                            <div class="input-group mb-3 input-group-sm">
                                <input type="text" class="form-control input-lg" placeholder="Captcha" id="nilaiCaptcha" name="nilaiCaptcha" required>
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><img src="inc/captcha.php" alt="gambar"></span>
                                </div>
                            </div> -->
                            <div class="g-recaptcha" data-sitekey="6LfSG9oZAAAAAODB9btIYgrZyDnQBXr2tk7DuoKp" name="g-recaptcha-response" align="right"></div>
                            <p>By creating an account you agree to our <a href="#" style="color:dodgerblue">Terms & Privacy</a>.</p>
                            <div align="center">
                                <button type="submit" name="signup" class="btn btn-success" value="Submit">Sign Up</button>
                                <a href="index.php" class="btn btn-danger">Cancel</a>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="myModal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Confirmation</h4>
                        <button type="button" class="close" data-dismiss="modal">×</button>
                    </div>
                    <!-- Modal body -->
                    <div class="modal-body" id="modal_body">
                    </div>
                    <!-- Modal footer -->
                    <div class="modal-footer" id="modal_footer">
                        <button type="button" id="btn-no" class="btn btn-danger" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div> 
    <?php
    }
    ?>  
</section>

        </div>
      </div>
    </div>
    <!-- ////////////////////////////////////////////////////////////////////////////-->

    <!-- BEGIN VENDOR JS-->
    <script src="/app-assets/vendors/js/vendors.min.js" type="text/javascript"></script>
    <!-- BEGIN VENDOR JS-->
    <!-- BEGIN PAGE VENDOR JS-->
    <script src="/app-assets/vendors/js/forms/icheck/icheck.min.js" type="text/javascript"></script>
    <!-- END PAGE VENDOR JS-->
    <!-- BEGIN MODERN JS-->
    <script src="/app-assets/js/core/app-menu.js" type="text/javascript"></script>
    <script src="/app-assets/js/core/app.js" type="text/javascript"></script>
    <!-- END MODERN JS-->
    <!-- BEGIN PAGE LEVEL JS-->
    <script src="/app-assets/js/scripts/forms/form-login-register.js" type="text/javascript"></script>
    <!-- END PAGE LEVEL JS -->
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
   
  </body>
</html>