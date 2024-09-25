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

    <link rel="icon" type="image/ico" href="img/logo_TS.png" width="10" />
    <link href="node_modules/fontawesome-free-5.11.2-web/css/all.css" rel="stylesheet">
    <link href="node_modules/simple-line-icons-master/simple-line-icons.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link href="node_modules/pace.min.css" rel="stylesheet">
    <link href="node_modules/pace.min.css" rel="stylesheet">
    <link href="node_modules/animate.css" rel="stylesheet">
    <link rel="stylesheet" href="node_modules/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!-- <link href="inc/sedimen.css" rel="stylesheet"> -->

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
<style>
    body {
        background-color: white;
    }
</style>

<body class="app flex-row align-items-center">
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
        <div class="container h-100">
            <div class=" row h-75 align-items-center">
                <div class="col-sm-3"></div>
                <div class="col-sm-6  text-center animated bounceIn">
                    <img src="img/logo TS (1).png" style="padding-bottom:30px" width="350"><br />
                    <p input class="text-muted" id="masuk" nama="masuk">Sign In to your account</p>
                    <form method="post" class="login-form" id="loginForm" align="center">
                        <div class="input-group mb-4 ">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-white border-warning border-top-0 border-right-0 border-left-0 rounded-0">
                                    <i class="fas fa-user"></i>
                                </span>
                            </div>
                            <input type="email" class="form-control border-warning border-top-0 border-right-0 border-left-0 rounded-0" name="email" placeholder="Email" required>
                        </div>
                        <div class="input-group mb-4" style="padding-bottom:30px">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-white border-warning border-top-0 border-right-0 border-left-0 rounded-0">
                                    <i class="fas fa-lock"></i>
                                </span>
                            </div>
                            <input type="password" id="login-password" class="form-control border-warning border-top-0 border-right-0 border-left-0 rounded-0" name="password" placeholder="Password" required>
                        </div>
                        <button class="btn btn-outline-warning" type="submit" id="login-btn" name="login-btn" value="login-btn">Login</button>
                        <h2 style="margin-top:30px;"></h2>
                        <!--<p class="teks12">Don't have an account? <a href="index.php?p=reg" class="a">Register Now!</a></p>-->
                    </form>
                </div>
                <div class="col-sm-3"></div>
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

                <div class="col-sm-2"></div>
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
</body>

<script src="https://www.google.com/recaptcha/api.js" async defer></script>

</html>