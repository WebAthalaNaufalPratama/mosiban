<?php
session_start();
include "../inc/view.php";
include "../inc/olah.php";
$link = $sa->koneksi();
$level = $sa->level($_SESSION["username"]);
if (empty($_SESSION["username"])) {
    //arahkan ke halaman logout
    header("Location: ../index.php");
}
?>
<!DOCTYPE html>
<html lang="en" class="perfect-scrollbar-on">

<head>
    <base href="./">
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>
        MOSIBAN
    </title>
    
    <meta content="width=device-width, initial-scale=1.0, shrink-to-fit=no" name="viewport" />
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <!--<link href="../node_modules/material-dashboard.css?v=2.1.2" rel="stylesheet" />-->
    <link href="../node_modules/demo.css" rel="stylesheet" />
    <link rel="apple-touch-icon" sizes="76x76" href="../img/logo mosiban.png">
    <link rel="icon" type="image/png" href="../img/logo mosiban.png" width="5" height="3">
    <link rel="apple-touch-icon" href="../app-assets/images/ico/apple-icon-120.png">
    <link rel="shortcut icon" type="image/x-icon" href="../app-assets/images/ico/favicon.ico">
    <link href="https://fonts.googleapis.com/css?family=Muli:300,300i,400,400i,600,600i,700,700i|Comfortaa:300,400,500,700" rel="stylesheet">
    <link href="../node_modules/bootstrap.css" rel="stylesheet">
    <link href="../node_modules/fontawesome-free-5.11.2-web/css/all.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
    <link href="../node_modules/simple-line-icons-master/simple-line-icons.min.css" rel="stylesheet">
    <link href="../css/style.css" rel="stylesheet">
    <link href="../node_modules/bootstrap.min.css" rel="stylesheet">
    <link href="../node_modules/gauge.css" rel="stylesheet">
    <link href="../inc/grafik.css" rel="stylesheet">
    <link href="../node_modules/animate.css" rel="stylesheet">
    <link href="../node_modules/pace.min.css" rel="stylesheet">
    <link href="../node_modules/owl.carousel.css" rel="stylesheet" type="text/css">
    <link href="../node_modules/owl.theme.default.min.css" rel="stylesheet" type="text/css">
    <link href="../node_modules/dataTables.bootstrap4.min.css" rel="stylesheet">
    <!--BEGIN VENDOR CSS-->
    <!--<link rel="stylesheet" type="text/css" href="../app-assets/css/vendors.css">-->
     <!--END VENDOR CSS-->
     <!--BEGIN MODERN CSS-->
    <link rel="stylesheet" type="text/css" href="../app-assets/css/app.css">
     <!--END MODERN CSS-->
     <!--BEGIN Page Level CSS-->
    <link rel="stylesheet" type="text/css" href="../app-assets/css/core/menu/menu-types/vertical-compact-menu.css">
    <!--<link rel="stylesheet" type="text/css" href="../app-assets/vendors/css/cryptocoins/cryptocoins.css">-->
    <!--<link rel="stylesheet" type="text/css" href="../app-assets/css/pages/buy-ico.css">-->
     <!--END Page Level CSS-->
     <!--BEGIN Custom CSS-->
    <link rel="stylesheet" type="text/css" href="../assets/css/style.css">
     <!--END Custom CSS-->
     <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
     <script src="../node_modules/jquery.AshAlom.gaugeMeter-2.0.0.min.js"></script>
     <!--<script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>-->



    <!--<script src="../node_modules/jquery-3.4.1.min.js"></script>-->
    <script src="../node_modules/popper.min.js"></script>
    <script src="../node_modules/bootstrap.min.js"></script>

    <script src="../node_modules/pace.min.js"></script>
    <script src="../node_modules/perfect-scrollbar-0.4.5.min.js"></script>
    <script src="../node_modules/Chart.min.js"></script>
    <script src="../node_modules/custom-tooltips.min.js"></script>
    <script src="../inc/sedimen.js"></script>
    <!--<script src="../node_modules/GaugeMeter.js"></script>-->
    <!--<script src="../node_modules/gauge.js"></script>-->
    <script src="../node_modules/highcharts/highcharts.js "></script>
    <script src="../node_modules/Chart.bundle.min.js"></script>
    <script src="../node_modules/owl.carousel.js" type="text/javascript"></script>
    <!--<script src="../node_modules/bootstrap-material-design.min.js"></script>-->
    <script src="https://unpkg.com/default-passive-events"></script>
    <script src="../node_modules/perfect-scrollbar.jquery.min.js"></script>
     <!--Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
     <!--Chartist JS -->
    <script src="../node_modules/chartist.min.js"></script>
      <!--Notifications Plugin    -->
    <script src="../node_modules/bootstrap-notify.js"></script>
     <!--Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="../node_modules/material-dashboard.js?v=2.1.2"></script>
     <!--Material Dashboard DEMO methods, don't include it in your project! -->
    <script src="../node_modules/demo.js"></script>
     <!--Plugin for the momentJs  -->
    <script src="../node_modules/moment.min.js"></script>
      <!--Plugin for Sweet Alert -->
    <script src="../node_modules/sweetalert2.js"></script>
     <!--Forms Validations Plugin -->
    <script src="../node_modules/jquery.validate.min.js"></script>
     <!--Plugin for the Wizard, full documentation here: https://github.com/VinceG/twitter-bootstrap-wizard -->
    <script src="../node_modules/jquery.bootstrap-wizard.js"></script>
    	<!--Plugin for Select, full documentation here: http://silviomoreto.github.io/bootstrap-select -->
    <script src="../node_modules/bootstrap-selectpicker.js"></script>
      <!--Plugin for the DateTimePicker, full documentation here: https://eonasdan.github.io/bootstrap-datetimepicker/ -->
    <script src="../node_modules/bootstrap-datetimepicker.min.js"></script>
    	<!--Plugin for Tags, full documentation here: https://github.com/bootstrap-tagsinput/bootstrap-tagsinputs  -->
    <script src="../node_modules/bootstrap-tagsinput.js"></script>
     <!--Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput -->
    <script src="../node_modules/jasny-bootstrap.min.js"></script>
      <!--Full Calendar Plugin, full documentation here: https://github.com/fullcalendar/fullcalendar    -->
    <script src="../node_modules/fullcalendar.min.js"></script>
     <!--Vector Map plugin, full documentation here: http://jvectormap.com/documentation/ -->
    <script src="../node_modules/jquery-jvectormap.js"></script>
      <!--Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
    <script src="../node_modules/nouislider.min.js"></script>
     <!--Include a polyfill for ES6 Promises (optional) for IE11, UC Browser and Android browser support SweetAlert -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js"></script>
     <!--Library for adding dinamically elements -->
    <script src="../node_modules/arrive.min.js"></script>
     <!--Chartist JS -->
    <script src="../node_modules/chartist.min.js"></script>
      <!--Notifications Plugin    -->
    <script src="../node_modules/bootstrap-notify.js"></script>
     <!--Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
    <!--<script src="../node_modules/material-dashboard.js?v=2.1.2" type="text/javascript"></script>-->
    
    <style>
    
        .main-menu {
            background-color: #8EACCD;
        }
        .icon{
            background-color: #8EACCD;
        }
        
        
  .btnNav {
    width: 110px; /* Sesuaikan lebar sesuai kebutuhan */
  }
  #search1{
      left:0;
  }
  a.warna{
      background: #4db4f7;
  }
  
   .main-menu.menu-dark {
    color: #F9F3CC;
    background: #4db4f7;
   }
  .dash-circle {
   position: absolute; 
   top: 10px; 
   left: 0; 
   width: 50px; 
   height: 50px; 
   background-color: #f6f6f9; 
   border-radius: 50%; 
  }
  .dash-circle i {
    font-size: 2.5rem !important;
    position: absolute;
    top: 10px;
    left: 15px; }
    .dash-circle i.cc {
      top: 20px; }
      
    nav{
        background-color: black;
    }
    
    /* Gaya dasar */
.filter-dropdown {
  position: relative;
  display: inline-block;
}

.filter-button {
  background-color: #3498db;
  color: white;
  border: none;
  padding: 10px;
  border-radius: 4px;
  cursor: pointer;
}

.filter-button i {
  margin-left: 5px;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f9f9f9;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}

.dropdown-content a:hover {
  background-color: #f1f1f1;
}

/* Tampilkan dropdown saat tombol ditekan */
.filter-dropdown:hover .dropdown-content {
  display: block;
}

    
        
</style>




</head>

<body class="vertical-layout vertical-compact-menu 2-columns   menu-expanded fixed-navbar" data-open="click" data-menu="vertical-compact-menu" data-col="2-columns">

<!--<body class="vertical-layout vertical-compact-menu content-detached-right-sidebar   menu-expanded fixed-navbar" data-open="click" data-menu="vertical-compact-menu" data-col="content-detached-right-sidebar">-->
    <?php
    dashboard();
    main();
    kaki();
    ?>
    <div class="modal fade" id="MyModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Confirmation</h4>
                    <button type="button" class="close" data-dismiss="modal">×</button>
                </div>
                <div class="modal-body" id="modal_body">
                </div>
                <div class="modal-footer" id="modal_footer">
                    <button type="button" id="btn-no" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <div id="modal_edit" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Edit User</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="container">
                            <div class="col-sm-1"></div>
                            <div class="col-sm-10">
                                <form class="mb-3" id="editpengguna" method="post" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label for="email">Email:</label><br>
                                        <input name="email" type="email" class="form-control" placeholder="Enter your email" readonly required>
                                    </div>
                                    <div class="form-group">
                                        <label for="password">Password:</label><br>
                                        <input type="password" class="form-control" name="password" placeholder="Enter your password" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="nama">Name:</label><br>
                                        <input type="text" class="form-control" name="nama" placeholder="Enter your name" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="telepon">Phone Number:</label><br>
                                        <input type="text" class="form-control" name="no_hp" placeholder="Enter your phone number" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="alamat">Address:</label><br>
                                        <input type="text" class="form-control" name="alamat" placeholder="Enter your address" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="kota">City:</label><br>
                                        <input type="text" class="form-control" name="kota" placeholder="Enter your city" required>
                                    </div>
                                    <div class="preview">
                                        <img src="" id="img" width="100" height="100" style="display:none">
                                    </div>
                                    <label for="foto_profil">Profile Picture:</label><br>
                                    <div class="custom-file mb-3">
                                        <input type="file" id="file" name="file" class="custom-file-input" />
                                        <label class="custom-file-label" for="file">Choose file</label>
                                        <!--<input type="button" class="button" value="Upload" id="but_upload">
							-->
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" id="update" class="btn btn-primary pull-right">Update</button>
                    <button type="button" class="btn btn-outline-danger pull-left" data-dismiss="modal">Close</button>
                </div>
                </form>
            </div>
        </div>
        <div class="col-sm-12"></div>
    </div>
    <!--<script src="../node_modules/highcharts.js"></script>-->
    <!--<script src="../node_modules/exporting.js"></script>-->
    <!--<script src="../node_modules/export-data.js"></script>-->
    <!--<script src="../node_modules/accessibility.js"></script>-->
    <!--<script src="../node_modules/jquery.AshAlom.gaugeMeter-2.0.0.min.js"></script>-->
    <script src="../node_modules/jquery.dataTables.min.js"></script>
    <script src="../node_modules/dataTables.bootstrap4.min.js"></script>
    <script src="../node_modules/bootstrap.bundle.min.js"></script>
    <script src="../node_modules/jquery.easing.min.js"></script>
    <script src="../node_modules/datatables-demo.js"></script>
    <!-- BEGIN VENDOR JS-->
    <script src="../app-assets/vendors/js/vendors.min.js" type="text/javascript"></script>
    <!-- BEGIN VENDOR JS-->
    <!-- BEGIN PAGE VENDOR JS-->
    <script src="../app-assets/vendors/js/charts/chartist.min.js" type="text/javascript"></script>
    <script src="../app-assets/vendors/js/charts/chartist-plugin-tooltip.min.js" type="text/javascript"></script>
    <script src="../app-assets/vendors/js/timeline/horizontal-timeline.js" type="text/javascript"></script>
    <!-- END PAGE VENDOR JS-->
    <!-- BEGIN MODERN JS-->
    <script src="../app-assets/js/core/app-menu.js" type="text/javascript"></script>
    <script src="../app-assets/js/core/app.js" type="text/javascript"></script>
    <!-- END MODERN JS-->
    <!-- BEGIN PAGE LEVEL JS-->
    <script src="../app-assets/js/scripts/pages/dashboard-ico.js" type="text/javascript"></script>
    <!-- END PAGE LEVEL JS-->
    
</body>

</html>