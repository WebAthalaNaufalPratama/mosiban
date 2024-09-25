<!--<script src="../node_modules/jquery.AshAlom.gaugeMeter-2.0.0.min.js"></script>-->
<?php
function dashboard()
{
    global $link;
    global $level; //$level ini diambil dari func.php
    

?>

<nav class="header-navbar navbar-expand-md navbar navbar-with-menu navbar-without-dd-arrow fixed-top navbar-light navbar-bg-color">
      <div class="navbar-wrapper  ">
        <div class="navbar-header d-md-none ">
          <ul class="nav navbar-nav flex-row ">
            <li class="nav-item mobile-menu d-md-none mr-auto" style="width: 40px"><a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i class="ft-menu font-large-1"></i><i class="fa fa-bars font-large-1" aria-hidden="true"></i></i></a></li>
            <li class="nav-item d-md-none "><a class="navbar-brand" href="index.html"><img class="brand-logo d-none d-md-block " alt="Tank-Sedimen " src="../img/logo mosiban.png"><img class="brand-logo d-sm-block d-md-none" alt="CryptoDash admin logo sm" src="../img/logo mosiban.png"></a></li>
            <li class="nav-item d-md-none"><a class="nav-link open-navbar-container" style="width: 40px" data-toggle="collapse" data-target="#navbar-mobile"><i class="fa fa-sign-out" aria-hidden="true"></i>   </i></a></li>
          </ul>
        </div>
        <div class="navbar-container">
          <div class="collapse navbar-collapse " id="navbar-mobile">
            <ul class="nav navbar-nav mr-auto float-left">
              <li class="nav-item d-none d-md-block"><a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i class="ft-menu font-large-1"></i><i class="fa fa-bars font-large-1" aria-hidden="true"></i></i></a></li>
              <li class="nav-item nav-search"><a class="nav-link nav-link-search" href="#"><i class="ficon ft-search"></i></a>
                <div class="search-input">
                  <input class="input" type="text" placeholder="Explore CryptoDash...">
                </div>
              </li>
            </ul>
            <ul class="nav navbar-nav float-right">         
            <a href="../login/logout.php"><i class="ft-menu font-large-1"><i class="fa fa-sign-out" aria-hidden="true"></i></i></a>
             <!--<span class="mr-1"><span class="user-name text-bold-700">3,458.88</span></span> -->
    </li>

            </ul>
          </div>
        </div>
      </div>
    </nav>
    
    <!--<div class="main-menu menu-fixed menu-dark menu-bg-default rounded menu-accordion menu-shadow">-->
    <!--  <div class="main-menu-content"><a class="navigation-brand d-none d-md-block d-lg-block d-xl-block" href="index.html"><img class="brand-logo" alt="CryptoDash admin logo" src="../../../app-assets/images/logo/logo.png"/></a>-->
    <!--    <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">-->
    <!--      <li class="active"><a href="../../../html/ltr/vertical-menu/index.html"><i class="icon-grid"></i><span class="menu-title" data-i18n="">Dashboard</span></a>-->
    <!--      </li>-->
    <!--      <li class=" nav-item"><a href="buy-ico.html"><i class="icon-layers"></i><span class="menu-title" data-i18n="">Buy ICO</span></a>-->
    <!--      </li>-->
    <!--      <li class=" nav-item"><a href="wallet.html"><i class="icon-wallet"></i><span class="menu-title" data-i18n="">Wallet</span></a>-->
    <!--      </li>-->
    <!--      <li class=" nav-item"><a href="transactions.html"><i class="icon-shuffle"></i><span class="menu-title" data-i18n="">Transactions</span></a>-->
    <!--      </li>-->
    <!--      <li class=" nav-item"><a href="faq.html"><i class="icon-support"></i><span class="menu-title" data-i18n="">FAQ</span></a>-->
    <!--      </li>-->
    <!--      <li class=" nav-item"><a href="#"><i class="icon-user-following"></i><span class="menu-title" data-i18n="">Account</span></a>-->
    <!--        <ul class="menu-content">-->
    <!--          <li><a class="menu-item" href="account-profile.html">Profile</a>-->
    <!--          </li>-->
    <!--          <li><a class="menu-item" href="account-login-history.html">Login History</a>-->
    <!--          </li>-->
    <!--          <li class="navigation-divider"></li>-->
    <!--          <li><a class="menu-item" href="#">Misc</a>-->
    <!--            <ul class="menu-content">-->
    <!--              <li><a class="menu-item" href="account-login.html">Login</a>-->
    <!--              </li>-->
    <!--              <li><a class="menu-item" href="account-register.html">Register</a>-->
    <!--              </li>-->
    <!--            </ul>-->
    <!--          </li>-->
    <!--        </ul>-->
    <!--      </li>-->
    <!--    </ul>-->
    <!--  </div>-->
    <!--</div>-->



<div class="main-menu menu-fixed menu-dark menu-bg-Info rounded menu-accordion menu-shadow">
  <div class="main-menu-content"><a class="navigation-brand d-none d-md-block d-lg-block d-xl-block" href="index.html"><img class="brand-logo" alt="CryptoDash admin logo" src="../img/logo mosiban.png"/></a>

    <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">

        <?php
        ?>
        <?php
        if ($level == "Admin") {
        ?>
          <li class="active"><a href="index.php?p=main" class="warna"><i class="icon-grid"></i><span class="menu-title" data-i18n="">Dashboard</span></a>
          </li>
          <li class=" active"><a href="index.php?p=userprofile" class="warna"><i class="icon-layers"></i><span class="menu-title" data-i18n="">User Profile</span></a>
          </li>
          <li class=" active"><a href="index.php?p=manageuser" class="warna"><i class="icon-wallet"></i><span class="menu-title" data-i18n="">Manage User</span></a>
          </li>
          <li class=" active"><a href="index.php?p=configuration" class="warna"><i class="icon-wallet"></i><span class="menu-title" data-i18n="">Configuration</span></a>
        </li>
        <?php
        } else {
        ?>
          <li class="active"><a href="index.php?p=main"><i class="icon-grid"></i><span class="menu-title" data-i18n="">Dashboard</span></a>
          </li>
          <li class=" nav-item"><a href="index.php?p=userprofile"><i class="icon-layers"></i><span class="menu-title" data-i18n="">User Profile</span></a>
          </li>
        <?php
        }
        ?>
        </ul>
      </div>
    </div>

    <!-- <header class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
        <div class="container-fluid">
            <div class="navbar-wrapper">
                <a class="navbar-brand" style="margin-left:300px"></a>
            </div>
            <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                <span class="sr-only">Toggle navigation</span>
                <span class="navbar-toggler-icon icon-bar"></span>
                <span class="navbar-toggler-icon icon-bar"></span>
                <span class="navbar-toggler-icon icon-bar"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?p=main">
                            <i class="material-icons">dashboard</i>
                            <p class="d-lg-none d-md-block">
                                Stats
                            </p>
                        </a>
                    </li> -->
                    <!--<li class="nav-item dropdown">-->
                    <!--    <a class="nav-link" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">-->
                    <!--        <i class="material-icons">notifications</i>-->
                    <!--        <span class="notification">5</span>-->
                    <!--        <p class="d-lg-none d-md-block">-->
                    <!--            Some Actions-->
                    <!--        </p>-->
                    <!--    </a>-->
                    <!--    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">-->
                    <!--        <a class="dropdown-item" href="#">Mike John responded to your email</a>-->
                    <!--        <a class="dropdown-item" href="#">You have 5 new tasks</a>-->
                    <!--        <a class="dropdown-item" href="#">You're now friend with Andrew</a>-->
                    <!--        <a class="dropdown-item" href="#">Another Notification</a>-->
                    <!--        <a class="dropdown-item" href="#">Another One</a>-->
                    <!--    </div>-->
                    <!--</li>-->
                    <!-- <li class="nav-item dropdown">
                        <a class="nav-link" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" role="button">
                            <i class="material-icons">person</i>
                            <p class="d-lg-none d-md-block">
                                Account
                            </p>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="index.php?p=userprofile">Profile</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="../login/logout.php">Logout</a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </header> -->
    <script>
        $(document).ready(function() {
            $().ready(function() {
                $sidebar = $('.sidebar');

                $sidebar_img_container = $sidebar.find('.sidebar-background');

                $full_page = $('.full-page');

                $sidebar_responsive = $('body > .navbar-collapse');

                window_width = $(window).width();

                fixed_plugin_open = $('.sidebar .sidebar-wrapper .nav li.active a p').html();

                if (window_width > 767 && fixed_plugin_open == 'Dashboard') {
                    if ($('.fixed-plugin .dropdown').hasClass('show-dropdown')) {
                        $('.fixed-plugin .dropdown').addClass('open');
                    }

                }

                $('.fixed-plugin a').click(function(event) {
                    // Alex if we click on switch, stop propagation of the event, so the dropdown will not be hide, otherwise we set the  section active
                    if ($(this).hasClass('switch-trigger')) {
                        if (event.stopPropagation) {
                            event.stopPropagation();
                        } else if (window.event) {
                            window.event.cancelBubble = true;
                        }
                    }
                });

                $('.fixed-plugin .active-color span').click(function() {
                    $full_page_background = $('.full-page-background');

                    $(this).siblings().removeClass('active');
                    $(this).addClass('active');

                    var new_color = $(this).data('color');

                    if ($sidebar.length != 0) {
                        $sidebar.attr('data-color', new_color);
                    }

                    if ($full_page.length != 0) {
                        $full_page.attr('filter-color', new_color);
                    }

                    if ($sidebar_responsive.length != 0) {
                        $sidebar_responsive.attr('data-color', new_color);
                    }
                });

                $('.fixed-plugin .background-color .badge').click(function() {
                    $(this).siblings().removeClass('active');
                    $(this).addClass('active');

                    var new_color = $(this).data('background-color');

                    if ($sidebar.length != 0) {
                        $sidebar.attr('data-background-color', new_color);
                    }
                });

                $('.fixed-plugin .img-holder').click(function() {
                    $full_page_background = $('.full-page-background');

                    $(this).parent('li').siblings().removeClass('active');
                    $(this).parent('li').addClass('active');


                    var new_image = $(this).find("img").attr('src');

                    if ($sidebar_img_container.length != 0 && $('.switch-sidebar-image input:checked').length != 0) {
                        $sidebar_img_container.fadeOut('fast', function() {
                            $sidebar_img_container.css('background-image', 'url("' + new_image + '")');
                            $sidebar_img_container.fadeIn('fast');
                        });
                    }

                    if ($full_page_background.length != 0 && $('.switch-sidebar-image input:checked').length != 0) {
                        var new_image_full_page = $('.fixed-plugin li.active .img-holder').find('img').data('src');

                        $full_page_background.fadeOut('fast', function() {
                            $full_page_background.css('background-image', 'url("' + new_image_full_page + '")');
                            $full_page_background.fadeIn('fast');
                        });
                    }

                    if ($('.switch-sidebar-image input:checked').length == 0) {
                        var new_image = $('.fixed-plugin li.active .img-holder').find("img").attr('src');
                        var new_image_full_page = $('.fixed-plugin li.active .img-holder').find('img').data('src');

                        $sidebar_img_container.css('background-image', 'url("' + new_image + '")');
                        $full_page_background.css('background-image', 'url("' + new_image_full_page + '")');
                    }

                    if ($sidebar_responsive.length != 0) {
                        $sidebar_responsive.css('background-image', 'url("' + new_image + '")');
                    }
                });

                $('.switch-sidebar-image input').change(function() {
                    $full_page_background = $('.full-page-background');

                    $input = $(this);

                    if ($input.is(':checked')) {
                        if ($sidebar_img_container.length != 0) {
                            $sidebar_img_container.fadeIn('fast');
                            $sidebar.attr('data-image', '#');
                        }

                        if ($full_page_background.length != 0) {
                            $full_page_background.fadeIn('fast');
                            $full_page.attr('data-image', '#');
                        }

                        background_image = true;
                    } else {
                        if ($sidebar_img_container.length != 0) {
                            $sidebar.removeAttr('data-image');
                            $sidebar_img_container.fadeOut('fast');
                        }

                        if ($full_page_background.length != 0) {
                            $full_page.removeAttr('data-image', '#');
                            $full_page_background.fadeOut('fast');
                        }

                        background_image = false;
                    }
                });

                $('.switch-sidebar-mini input').change(function() {
                    $body = $('body');

                    $input = $(this);

                    if (md.misc.sidebar_mini_active == true) {
                        $('body').removeClass('sidebar-mini');
                        md.misc.sidebar_mini_active = false;

                        $('.sidebar .sidebar-wrapper, .main-panel').perfectScrollbar();

                    } else {

                        $('.sidebar .sidebar-wrapper, .main-panel').perfectScrollbar('destroy');

                        setTimeout(function() {
                            $('body').addClass('sidebar-mini');

                            md.misc.sidebar_mini_active = true;
                        }, 300);
                    }

                    // we simulate the window Resize so the charts will get updated in realtime.
                    var simulateWindowResize = setInterval(function() {
                        window.dispatchEvent(new Event('resize'));
                    }, 180);

                    // we stop the simulation of Window Resize after the animations are completed
                    setTimeout(function() {
                        clearInterval(simulateWindowResize);
                    }, 1000);

                });
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            // Javascript method's body can be found in assets/js/demos.js
            md.initDashboardPageCharts();

        });
    </script>

<?php
}
function isiadmi()
{
    global $link, $level;
?>

    

    <div class="main-panel">
        <!-- Navbar -->

        <!-- End Navbar -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="card card-stats">
                            <div class="card-header card-header-warning card-header-icon">
                                <div class="card-icon">
                                    <i class="material-icons">content_copy</i>
                                </div>
                                <p class="card-category">Used Space</p>
                                <h3 class="card-title">49/50
                                    <small>GB</small>
                                </h3>
                            </div>
                            <div class="card-footer">
                                <div class="stats">
                                    <i class="material-icons text-danger">warning</i>
                                    <a href="javascript:;">Get More Space...</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="card card-stats">
                            <div class="card-header card-header-success card-header-icon">
                                <div class="card-icon">
                                    <i class="material-icons">store</i>
                                </div>
                                <p class="card-category">Revenue</p>
                                <h3 class="card-title">$34,245</h3>
                            </div>
                            <div class="card-footer">
                                <div class="stats">
                                    <i class="material-icons">date_range</i> Last 24 Hours
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="card card-stats">
                            <div class="card-header card-header-danger card-header-icon">
                                <div class="card-icon">
                                    <i class="material-icons">info_outline</i>
                                </div>
                                <p class="card-category">Fixed Issues</p>
                                <h3 class="card-title">75</h3>
                            </div>
                            <div class="card-footer">
                                <div class="stats">
                                    <i class="material-icons">local_offer</i> Tracked from Github
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="card card-stats">
                            <div class="card-header card-header-info card-header-icon">
                                <div class="card-icon">
                                    <i class="fa fa-twitter"></i>
                                </div>
                                <p class="card-category">Followers</p>
                                <h3 class="card-title">+245</h3>
                            </div>
                            <div class="card-footer">
                                <div class="stats">
                                    <i class="material-icons">update</i> Just Updated
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="card card-chart">
                            <div class="card-header card-header-success">
                                <div class="ct-chart" id="dailySalesChart"></div>
                            </div>
                            <div class="card-body">
                                <h4 class="card-title">Daily Sales</h4>
                                <p class="card-category">
                                    <span class="text-success"><i class="fa fa-long-arrow-up"></i> 55% </span> increase in today sales.</p>
                            </div>
                            <div class="card-footer">
                                <div class="stats">
                                    <i class="material-icons">access_time</i> updated 4 minutes ago
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card card-chart">
                            <div class="card-header card-header-warning">
                                <div class="ct-chart" id="websiteViewsChart"></div>
                            </div>
                            <div class="card-body">
                                <h4 class="card-title">Email Subscriptions</h4>
                                <p class="card-category">Last Campaign Performance</p>
                            </div>
                            <div class="card-footer">
                                <div class="stats">
                                    <i class="material-icons">access_time</i> campaign sent 2 days ago
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card card-chart">
                            <div class="card-header card-header-danger">
                                <div class="ct-chart" id="completedTasksChart"></div>
                            </div>
                            <div class="card-body">
                                <h4 class="card-title">Completed Tasks</h4>
                                <p class="card-category">Last Campaign Performance</p>
                            </div>
                            <div class="card-footer">
                                <div class="stats">
                                    <i class="material-icons">access_time</i> campaign sent 2 days ago
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6 col-md-12">
                        <div class="card">
                            <div class="card-header card-header-tabs card-header-primary">
                                <div class="nav-tabs-navigation">
                                    <div class="nav-tabs-wrapper">
                                        <span class="nav-tabs-title">Tasks:</span>
                                        <ul class="nav nav-tabs" data-tabs="tabs">
                                            <li class="nav-item">
                                                <a class="nav-link active" href="#profile" data-toggle="tab">
                                                    <i class="material-icons">bug_report</i> Bugs
                                                    <div class="ripple-container"></div>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="#messages" data-toggle="tab">
                                                    <i class="material-icons">code</i> Website
                                                    <div class="ripple-container"></div>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="#settings" data-toggle="tab">
                                                    <i class="material-icons">cloud</i> Server
                                                    <div class="ripple-container"></div>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="tab-content">
                                    <div class="tab-pane active" id="profile">
                                        <table class="table">
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <div class="form-check">
                                                            <label class="form-check-label">
                                                                <input class="form-check-input" type="checkbox" value="" checked>
                                                                <span class="form-check-sign">
                                                                    <span class="check"></span>
                                                                </span>
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>Sign contract for "What are conference organizers afraid of?"</td>
                                                    <td class="td-actions text-right">
                                                        <button type="button" rel="tooltip" title="Edit Task" class="btn btn-primary btn-link btn-sm">
                                                            <i class="material-icons">edit</i>
                                                        </button>
                                                        <button type="button" rel="tooltip" title="Remove" class="btn btn-danger btn-link btn-sm">
                                                            <i class="material-icons">close</i>
                                                        </button>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="form-check">
                                                            <label class="form-check-label">
                                                                <input class="form-check-input" type="checkbox" value="">
                                                                <span class="form-check-sign">
                                                                    <span class="check"></span>
                                                                </span>
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>Lines From Great Russian Literature? Or E-mails From My Boss?</td>
                                                    <td class="td-actions text-right">
                                                        <button type="button" rel="tooltip" title="Edit Task" class="btn btn-primary btn-link btn-sm">
                                                            <i class="material-icons">edit</i>
                                                        </button>
                                                        <button type="button" rel="tooltip" title="Remove" class="btn btn-danger btn-link btn-sm">
                                                            <i class="material-icons">close</i>
                                                        </button>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="form-check">
                                                            <label class="form-check-label">
                                                                <input class="form-check-input" type="checkbox" value="">
                                                                <span class="form-check-sign">
                                                                    <span class="check"></span>
                                                                </span>
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>Flooded: One year later, assessing what was lost and what was found when a ravaging rain swept through metro Detroit
                                                    </td>
                                                    <td class="td-actions text-right">
                                                        <button type="button" rel="tooltip" title="Edit Task" class="btn btn-primary btn-link btn-sm">
                                                            <i class="material-icons">edit</i>
                                                        </button>
                                                        <button type="button" rel="tooltip" title="Remove" class="btn btn-danger btn-link btn-sm">
                                                            <i class="material-icons">close</i>
                                                        </button>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="form-check">
                                                            <label class="form-check-label">
                                                                <input class="form-check-input" type="checkbox" value="" checked>
                                                                <span class="form-check-sign">
                                                                    <span class="check"></span>
                                                                </span>
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>Create 4 Invisible User Experiences you Never Knew About</td>
                                                    <td class="td-actions text-right">
                                                        <button type="button" rel="tooltip" title="Edit Task" class="btn btn-primary btn-link btn-sm">
                                                            <i class="material-icons">edit</i>
                                                        </button>
                                                        <button type="button" rel="tooltip" title="Remove" class="btn btn-danger btn-link btn-sm">
                                                            <i class="material-icons">close</i>
                                                        </button>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="tab-pane" id="messages">
                                        <table class="table">
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <div class="form-check">
                                                            <label class="form-check-label">
                                                                <input class="form-check-input" type="checkbox" value="" checked>
                                                                <span class="form-check-sign">
                                                                    <span class="check"></span>
                                                                </span>
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>Flooded: One year later, assessing what was lost and what was found when a ravaging rain swept through metro Detroit
                                                    </td>
                                                    <td class="td-actions text-right">
                                                        <button type="button" rel="tooltip" title="Edit Task" class="btn btn-primary btn-link btn-sm">
                                                            <i class="material-icons">edit</i>
                                                        </button>
                                                        <button type="button" rel="tooltip" title="Remove" class="btn btn-danger btn-link btn-sm">
                                                            <i class="material-icons">close</i>
                                                        </button>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="form-check">
                                                            <label class="form-check-label">
                                                                <input class="form-check-input" type="checkbox" value="">
                                                                <span class="form-check-sign">
                                                                    <span class="check"></span>
                                                                </span>
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>Sign contract for "What are conference organizers afraid of?"</td>
                                                    <td class="td-actions text-right">
                                                        <button type="button" rel="tooltip" title="Edit Task" class="btn btn-primary btn-link btn-sm">
                                                            <i class="material-icons">edit</i>
                                                        </button>
                                                        <button type="button" rel="tooltip" title="Remove" class="btn btn-danger btn-link btn-sm">
                                                            <i class="material-icons">close</i>
                                                        </button>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="tab-pane" id="settings">
                                        <table class="table">
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <div class="form-check">
                                                            <label class="form-check-label">
                                                                <input class="form-check-input" type="checkbox" value="">
                                                                <span class="form-check-sign">
                                                                    <span class="check"></span>
                                                                </span>
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>Lines From Great Russian Literature? Or E-mails From My Boss?</td>
                                                    <td class="td-actions text-right">
                                                        <button type="button" rel="tooltip" title="Edit Task" class="btn btn-primary btn-link btn-sm">
                                                            <i class="material-icons">edit</i>
                                                        </button>
                                                        <button type="button" rel="tooltip" title="Remove" class="btn btn-danger btn-link btn-sm">
                                                            <i class="material-icons">close</i>
                                                        </button>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="form-check">
                                                            <label class="form-check-label">
                                                                <input class="form-check-input" type="checkbox" value="" checked>
                                                                <span class="form-check-sign">
                                                                    <span class="check"></span>
                                                                </span>
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>Flooded: One year later, assessing what was lost and what was found when a ravaging rain swept through metro Detroit
                                                    </td>
                                                    <td class="td-actions text-right">
                                                        <button type="button" rel="tooltip" title="Edit Task" class="btn btn-primary btn-link btn-sm">
                                                            <i class="material-icons">edit</i>
                                                        </button>
                                                        <button type="button" rel="tooltip" title="Remove" class="btn btn-danger btn-link btn-sm">
                                                            <i class="material-icons">close</i>
                                                        </button>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="form-check">
                                                            <label class="form-check-label">
                                                                <input class="form-check-input" type="checkbox" value="" checked>
                                                                <span class="form-check-sign">
                                                                    <span class="check"></span>
                                                                </span>
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>Sign contract for "What are conference organizers afraid of?"</td>
                                                    <td class="td-actions text-right">
                                                        <button type="button" rel="tooltip" title="Edit Task" class="btn btn-primary btn-link btn-sm">
                                                            <i class="material-icons">edit</i>
                                                        </button>
                                                        <button type="button" rel="tooltip" title="Remove" class="btn btn-danger btn-link btn-sm">
                                                            <i class="material-icons">close</i>
                                                        </button>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12">
                        <div class="card">
                            <div class="card-header card-header-warning">
                                <h4 class="card-title">Employees Stats</h4>
                                <p class="card-category">New employees on 15th September, 2016</p>
                            </div>
                            <div class="card-body table-responsive">
                                <table class="table table-hover">
                                    <thead class="text-warning">
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Salary</th>
                                        <th>Country</th>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>Dakota Rice</td>
                                            <td>$36,738</td>
                                            <td>Niger</td>
                                        </tr>
                                        <tr>
                                            <td>2</td>
                                            <td>Minerva Hooper</td>
                                            <td>$23,789</td>
                                            <td>Curaçao</td>
                                        </tr>
                                        <tr>
                                            <td>3</td>
                                            <td>Sage Rodriguez</td>
                                            <td>$56,142</td>
                                            <td>Netherlands</td>
                                        </tr>
                                        <tr>
                                            <td>4</td>
                                            <td>Philip Chaney</td>
                                            <td>$38,735</td>
                                            <td>Korea, South</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="fixed-plugin">
        <div class="dropdown show-dropdown">
            <a href="#" data-toggle="dropdown">
                <i class="fa fa-cog fa-2x"> </i>
            </a>
            <ul class="dropdown-menu">
                <li class="header-title"> Sidebar Filters</li>
                <li class="adjustments-line">
                    <a href="javascript:void(0)" class="switch-trigger active-color">
                        <div class="badge-colors ml-auto mr-auto">
                            <span class="badge filter badge-purple" data-color="purple"></span>
                            <span class="badge filter badge-azure" data-color="azure"></span>
                            <span class="badge filter badge-green" data-color="green"></span>
                            <span class="badge filter badge-warning" data-color="orange"></span>
                            <span class="badge filter badge-danger" data-color="danger"></span>
                            <span class="badge filter badge-rose active" data-color="rose"></span>
                        </div>
                        <div class="clearfix"></div>
                    </a>
                </li>
                <li class="header-title">Images</li>
                <li class="active">
                    <a class="img-holder switch-trigger" href="javascript:void(0)">
                        <img src="../img/sidebar-1.jpg" alt="">
                    </a>
                </li>
                <li>
                    <a class="img-holder switch-trigger" href="javascript:void(0)">
                        <img src="../img/sidebar-2.jpg" alt="">
                    </a>
                </li>
                <li>
                    <a class="img-holder switch-trigger" href="javascript:void(0)">
                        <img src="../img/sidebar-3.jpg" alt="">
                    </a>
                </li>
                <li>
                    <a class="img-holder switch-trigger" href="javascript:void(0)">
                        <img src="../img/sidebar-4.jpg" alt="">
                    </a>
                </li>
                <li class="button-container">
                    <a href="https://www.creative-tim.com/product/material-dashboard" target="_blank" class="btn btn-primary btn-block">Free Download</a>
                </li>
                <!-- <li class="header-title">Want more components?</li>
            <li class="button-container">
                <a href="https://www.creative-tim.com/product/material-dashboard-pro" target="_blank" class="btn btn-warning btn-block">
                  Get the pro version
                </a>
            </li> -->
                <li class="button-container">
                    <a href="https://demos.creative-tim.com/material-dashboard/docs/2.1/getting-started/introduction.html" target="_blank" class="btn btn-default btn-block">
                        View Documentation
                    </a>
                </li>
                <li class="button-container github-star">
                    <a class="github-button" href="https://github.com/creativetimofficial/material-dashboard" data-icon="octicon-star" data-size="large" data-show-count="true" aria-label="Star ntkme/github-buttons on GitHub">Star</a>
                </li>
                <li class="header-title">Thank you for 95 shares!</li>
                <li class="button-container text-center">
                    <button id="twitter" class="btn btn-round btn-twitter"><i class="fa fa-twitter"></i> &middot; 45</button>
                    <button id="facebook" class="btn btn-round btn-facebook"><i class="fa fa-facebook-f"></i> &middot; 50</button>
                    <br>
                    <br>
                </li>
            </ul>
        </div>
    </div>


<?php
}
function main()
{
?>
    <main class="main">
        <br>
        <div class="container">
            <div class="animated fadeIn"></div>
        </div>
        <div class="container-fluid">
            <div class="animated fadeIn">
                <?php
                if (isset($_GET['p'])) {
                    if ($_GET['p'] == 'manageuser') {
                        manageuser();
                    } elseif ($_GET['p'] == 'main') {
                        isiadmin();
                    } elseif ($_GET['p'] == 'configuration') {
                        configuration();
                    } elseif ($_GET['p'] == 'userprofile') {
                        userprofile();
                    }
                } else {
                    isiadmin();
                }
                ?>
            </div>
        </div>
    </main>
<?php
}
function kaki()
{
?>
    <footer class="footer">
        <div class="container-fluid">
            <div class="copyright float-right">
                &copy;
                <script>
                    document.write(new Date().getFullYear())
                </script>, made with <i class="material-icons">favorite</i> by
                <a href="https://www.omahiot.com" target="_blank">OmahIoT</a>
            </div>
        </div>
    </footer>

<?php
}
function manageuser()
{
?>
    <div class="main-panel">
        <div class="content" style="margin-top: -15px">
            <div class="container">
                <div class="row " id="form_add" style="display:none">
                    <div class="col-lg-12 col-md-12">
                        <form class="mb-2" id="userform" method="post" enctype="multipart/form-data">
                            <div class="card col-lg-12 col-md-12">
                                <div class="card-header ">
                                    <h4 align="center">
                                        <p>Please fill in this form to add an user</p>
                                    </h4>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="email">Email:</label><br>
                                        <input name="email" type="email" class="form-control" placeholder="Enter your email" required>
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
                                        <label for="level">Level:</label><br>
                                        <input type="text" class="form-control" name="level" placeholder="Enter your level" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="telepon">Phone:</label><br>
                                        <input type="text" class="form-control" name="no_hp" placeholder="Enter your phone" required>
                                    </div>
                                    <div class="preview">
                                        <img src="" id="img" width="100" height="100" style="display:none">
                                    </div>
                                    <label for="foto_profil">Photo:</label><br>
                                    <div class="custom-file mb-3">
                                        <input type="file" id="file" name="file" class="custom-file-input_one" />
                                        <label class="custom-file-label" for="file">Choose File</label>
                                    </div>
                                    <div class="form-group">
                                        <label for="alamat">Address:</label><br>
                                        <input type="text" class="form-control" name="alamat" placeholder="Enter your address" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="kota">City:</label><br>
                                        <input type="text" class="form-control" name="kota" placeholder="Enter your city" required>
                                    </div>
                                    <button type="submit" name="signup" class="btn btn-success center-block">Save</button>
                                    <a href="index.php?p=manageuser" class="btn btn-outline-danger center-block">Close</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12 col-md-12" id="2" style="margin-top:50px">
                        <div class="input-group mb-3">
                        <button type="submit"  name="add" id="add_user" class="btn-gradient-secondary mt-3">ADD USER<i class="la la-angle-right"></i></button>

                            <div class="input-group-prepend">
                                <span class="input-group-text mb-5"><i class="fas fa-search"></i></span>
                            </div>
                            <input type="text" id="search1" class="form-control" placeholder="Search ..." />
                            
                        </div>
                        <div class="col-12">
    <div class="card pull-up">
        <div class="card-content collapse show">
            <div class="card-body">
                <h2 align="left">USER LIST</h2>
                <div class="card-body">
                    <div class="tab-pane active">
                        <div class="tab-responsive">
                            <div class="table-responsive" id="tabeluser">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Username</th>
                                            <th>Name</th>
                                            <th>Level</th>
                                            <th>Phone</th>
                                            <th>Address</th>
                                            <th>City</th>
                                            <th>Photo</th>
                                            <th colspan="2" style="text-align:center">Option</th>
                                        </tr>
                                    </thead>
                                    <tbody><!-- Isi tabel user di sini --></tbody>
                                </table>
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
            </div>
        </div>
    </div>
    <script>
        // Add the following code if you want the name of the file appear on select
        $(".custom-file-input").on("change", function() {
            var fileName = $(this).val().split("\\").pop();
            $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
        });
    </script>
    <script language="javascript">
        $.ajax({
                method: "POST",
                url: "../inc/olah.php",
                data: {
                    "p": "userlist"
                },
                dataType: "json"
            })
            .done(function(d) {
                jml = d.username.length;
                j = 0;
                for (i = 0; i < jml; i++) {
                    j++;
                    $("#tabeluser tbody").append("<tr><td>" + j + "</td><td>" + d.username[i] + "</td><td>" + d.nama[i] + "</td><td>" + d.level[i] + "</td><td>" + d.no_hp[i] + "</td><td>" + d.alamat[i] + "</td><td>" + d.kota[i] + "</td><td><img width='50px' src=" + d.foto_profil[i] + "></td><td class='td-actions text-center'><button type='submit' rel='tooltip' title='Edit' id='edit-user' data-user=" + d.username[i] + " class='btn btn-primary btn-link btn-sm'><i class='material-icons'>edit</i></button><button id='hapus-user' rel='tooltip' title='Remove' data-user=" + d.username[i] + " class='btn btn-danger btn-link btn-sm'><i class='material-icons'>close</i></button></td></tr>");
                }

                //edit user 
                $("#tabeluser #edit-user").click(function() {
                    console.log("kliked")
                    username = $(this).attr('data-user');
                    nama = $(this).attr('nama');
                    userform = $("#userform");
                    console.log("edit: " + username);
                    $.ajax({
                            method: "POST",
                            url: "../inc/olah.php",
                            data: {
                                p: "edituser",
                                'username': username,
                            },
                            dataType: "json"
                        })
                        .done(function(d) {
                            jml = d.username.length;
                            $("#modal_edit").modal();
                            $("#modal_edit #editpengguna input[name='email']").val(username);
                            $("#editpengguna input[name='nama']").val(d.nama);
                            $("#editpengguna input[name='password']").val(d.password);
                            $("#editpengguna input[name='no_hp']").val(d.no_hp);
                            $("#editpengguna input[name='alamat']").val(d.alamat);
                            $("#editpengguna input[name='kota']").val(d.kota);
                            $("#editpengguna #img").attr('src', d.foto_profil);
                            $(".preview img").show(); // Display image element
                        })
                });

                //hapus user
                $("#tabeluser #hapus-user").click(function() {
                    username = $(this).attr('data-user');
                    Button = $("<button id='btn-hps' class='btn btn-primary pull-right' data-dismiss='modal'>Hapus</button>");
                    console.log("hapus: " + username);
                    $("#MyModal").modal();
                    $("#modal_body").text("Hapus " + username + " ?");
                    $("#modal_footer").append(Button);

                    $("#MyModal #btn-hps").click(function() {
                        console.log("tombol yes diklik");
                        $("#MyModal").modal();
                        $.ajax({
                                method: "POST",
                                url: "../inc/olah.php",
                                data: {
                                    p: "hapus",
                                    'username': username,
                                },
                                dataType: "json"
                            })
                            .done(function(d) {
                                console.log("terhapus");
                                location.replace("index.php?p=manageuser");
                            })

                    })
                    //Pass false to the callback function
                    $("#MyModal #btn-no").click(function() {
                        console.log("tombol no diklik");
                        $("#MyModal").modal("hide");
                        $(Button).remove();

                    })
                });
            });

        //query
        $('#search1').on('keyup', function() {
            console.log('masuk');
            $.ajax({
                    type: 'POST',
                    url: '../inc/olah.php',
                    data: {
                        p: 'search',
                        search: $(this).val()
                    },
                    dataType: "json",
                    cache: false,
                    success: function(d) {
                        $("#tabeluser tbody").empty();
                        //$("#tabeluser tbody").show();
                        jml = d.username.length;
                        j = 0;
                        for (i = 0; i < jml; i++) {
                            j++;
                            $("#tabeluser tbody").append("<tr><td>" + j + "</td><td>" + d.username[i] + "</td><td>" + d.nama[i] + "</td><td>" + d.level[i] + "</td><td>" + d.no_hp[i] + "</td><td>" + d.alamat[i] + "</td><td>" + d.kota[i] + "</td><td><img width='50px' src=" + d.foto_profil[i] + "></td><td align='right'><button type='submit' id='edit-user' data-user=" + d.username[i] + " class='btn btn-success' >Edit</button></td><td align='right'><button id='hapus-user' data-user=" + d.username[i] + " class='btn btn-danger' >Hapus</button></td></tr>");
                        }
                    }
                })

                .done(function(d) {
                    //  $("#tabeluser tbody").empty();
                    $("#tabeluser #edit-user").on('click', function() {
                        //		update=$(".modal-footer #update");
                        //		e.preventDefault();
                        username = $(this).attr('data-user');
                        nama = $(this).attr('nama');
                        userform = $("#userform");
                        console.log("edit: " + username);
                        //		location.replace("index.php?p=edituser"+$user));
                        $.ajax({
                                method: "POST",
                                url: "../inc/olah.php",
                                data: {
                                    p: "edituser",
                                    'username': username,
                                },
                                dataType: "json"
                            })
                            .done(function(d) {
                                jml = d.username.length;
                                $("#modal_edit").modal();
                                $("#modal_edit #editpengguna input[name='email']").val(username);
                                $("#editpengguna input[name='nama']").val(d.nama);
                                $("#editpengguna input[name='password']").val(d.password);
                                $("#editpengguna input[name='no_hp']").val(d.no_hp);
                                $("#editpengguna input[name='alamat']").val(d.alamat);
                                $("#editpengguna input[name='kota']").val(d.kota);
                                $("#editpengguna #img").attr('src', d.foto_profil);
                                $(".preview img").show(); // Display image element
                            })
                    });

                    //hapus user
                    $("#tabeluser #hapus-user").click(function() {
                        username = $(this).attr('data-user');
                        Button = $("<button id='btn-hps' class='btn btn-primary pull-right'>Hapus</button>");
                        console.log("hapus: " + username);
                        $("#MyModal").modal();
                        $("#modal_body").text("Hapus " + username + " ?");
                        $("#modal_footer").append(Button);
                        //Pass true to callback function
                        $("#MyModal #btn-hps").click(function() {
                            console.log("tombol yes diklik");
                            $("#MyModal").modal("hide");
                            $.ajax({
                                method: "POST",
                                url: "../inc/olah.php",
                                data: {
                                    p: "hapus",
                                    'username': username,
                                },
                                dataType: "json"
                            })
                            location.replace("index.php?p=daftarpengguna");
                        })
                        //Pass false to the callback function
                        $("#MyModal #btn-no").click(function() {
                            console.log("tombol no diklik");
                            $("#MyModal").modal("hide");
                            $(Button).remove();

                        })
                    })
                })
        });
        $(".custom-file-input").on("change", function() {
            var fileName = $(this).val().split("\\").pop();
            $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
        });
    </script>
    
    

<?php
}
function configuration()
{
    global $link;
?>
    <?php
    if (isset($_GET['berhasil'])) {
        echo "<p>" . $_GET['berhasil'] . "</p>";
    }
    ?>

    ?>
    <div class="main-panel">
    <div class="content" style="margin-top: -15px">
        <div class="col-12">
            <div class="card pull-up">
                <div class="card-content collapse show">
                    <div class="card-body">
                        <h2 align="left" class="card-title">UPLOAD DATA KREO</h2>
                        <p align="left" class="card-category">The Uploaded Data Must Be in .xls Format</p>
                        <div class="card-body">
                            <div class="tab-pane active">
                                <div class="tab-responsive">
                                    <form method="post" enctype="multipart/form-data" action="../inc/upload_data.php">
                                        <label for="file">File:</label><br>
                                        <div class="custom-file mb-3">
                                            <input type="file" id="file" name="file" class="custom-file-input" required>
                                            <label class="custom-file-label" for="file">Choose File</label>
                                        </div>
                                        <button type="submit"   id="upload" name="upload" class="btn-gradient-secondary mt-2" value="Import">IMPORT SEDIMEN<i class="la la-angle-right"></i></button><br>
                                        <button type="submit"   id="upload2" name="upload2" class="btn-gradient-secondary mt-2" value="Import1">IMPORT BANJIR<i class="la la-angle-right"></i></button>
                                    </form>

                                    <div class="table-responsive" id="tabeldebit" style="margin-top: 40px">
                                        <h2 align="left" class="card-title">Data Sedimen</h2>
                                        <table class="table table-hover table-lg" id="dataTable">
                                            <thead>
                                                <tr>
                                                    <th><h5>No</h5></th>
                                                    <th><h5>Ha</h5></th>
                                                    <th><h5>ha1</h5></th>
                                                    <th><h5>a1</h5></th>
                                                    <th><h5>Ch</h5></th>
                                                    <th><h5>ha2</h5></th>
                                                    <th><h5>a2</h5></th>
                                                    <th><h5>a0</h5></th>
                                                    <!--<th><h5>Lokasi</h5></th>-->
                                                    <!--<th><h5>Tanggal</h5></th>-->
                                                    <!--<th><h5>Waktu</h5></th>-->
                                                </tr>
                                            </thead>
                                            <tbody></tbody>
                                        </table>
                                    </div>
                                    <div class="table-responsive" id="tabeldebitbanjir" style="margin-top: 40px">
                                        <h2 align="left" class="card-title">Data Banjir</h2>
                                        <table class="table table-hover table-lg" id="dataTable">
                                            <thead>
                                                <tr>
                                                    <th><h5>No</h5></th>
                                                    <th><h5>HA1</h5></th>
                                                    <th><h5>HA2</h5></th>
                                                    <th><h5>HA3</h5></th>
                                                    <th><h5>HB</h5></th>
                                                    <th><h5>HC</h5></th>
                                                    <th><h5>A0</h5></th>
                                                    <th><h5>A1</h5></th>
                                                    <th><h5>A2</h5></th>
                                                    <th><h5>A3</h5></th>
                                                    <th><h5>B0</h5></th>
                                                    <th><h5>B1</h5></th>
                                                    <th><h5>C0</h5></th>
                                                    <th><h5>C1</h5></th>
                                                    <th><h5>S1</h5></th>
                                                    <th><h5>S2</h5></th>
                                                    <th><h5>S3</h5></th>
                                                    <!--<th><h5>Lokasi</h5></th>-->
                                                    <!--<th><h5>Tanggal</h5></th>-->
                                                    <!--<th><h5>Waktu</h5></th>-->
                                                </tr>
                                            </thead>
                                            <tbody></tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card pull-up">
                <div class="card-content collapse show">
                    <div class="card-body">
                        <h2 align="left" class="card-title">UPLOAD DATA KRIPIK</h2>
                        <p align="left" class="card-category">The Uploaded Data Must Be in .xls Format</p>
                        <div class="card-body">
                            <div class="tab-pane active">
                                <div class="tab-responsive">
                                    <form method="post" enctype="multipart/form-data" action="../inc/upload_data.php">
                                        <label for="file">File:</label><br>
                                        <div class="custom-file mb-3">
                                            <input type="file" id="file" name="file" class="custom-file-input" required />
                                            <label class="custom-file-label" for="file">Choose File</label>
                                        </div>
                                        <button type="submit"   id="upload3" name="upload3" class="btn-gradient-secondary mt-2" value="Import">IMPORT KRIPIK<i class="la la-angle-right"></i></button><br>
                                        <button type="submit"   id="upload4" name="upload4" class="btn-gradient-secondary mt-2" value="Import">IMPORT BANJIR<i class="la la-angle-right"></i></button>

                                    </form>
                                    <div class="table-responsive" id="tabeldebitkripik" style="margin-top: 80px">
                                        <h2 align="left" class="card-title">Data Sedimen</h2>
                                        <table class="table table-hover table-lg" id="dataTable">
                                            <thead>
                                                <tr>
                                                    <th><h5>No</h5></th>
                                                    <th><h5>Ha</h5></th>
                                                    <th><h5>ha1</h5></th>
                                                    <th><h5>a1</h5></th>
                                                    <th><h5>Ch</h5></th>
                                                    <th><h5>ha2</h5></th>
                                                    <th><h5>a2</h5></th>
                                                    <th><h5>a0</h5></th>
                                                    <!--<th><h5>Lokasi</h5></th>-->
                                                    <!--<th><h5>Tanggal</h5></th>-->
                                                    <!--<th><h5>Waktu</h5></th>-->
                                                </tr>
                                            </thead>
                                            <tbody></tbody>
                                        </table>
                                    </div>
                                    <div class="table-responsive" id="tabeldebitbanjirkripik" style="margin-top: 40px">
                                        <h2 align="left" class="card-title">Data Banjir</h2>
                                        <table class="table table-hover table-lg" id="dataTable">
                                            <thead>
                                                <tr>
                                                    <th><h5>No</h5></th>
                                                    <th><h5>HA1</h5></th>
                                                    <th><h5>HA2</h5></th>
                                                    <th><h5>HA3</h5></th>
                                                    <th><h5>HB</h5></th>
                                                    <th><h5>HC</h5></th>
                                                    <th><h5>A0</h5></th>
                                                    <th><h5>A1</h5></th>
                                                    <th><h5>A2</h5></th>
                                                    <th><h5>A3</h5></th>
                                                    <th><h5>B0</h5></th>
                                                    <th><h5>B1</h5></th>
                                                    <th><h5>C0</h5></th>
                                                    <th><h5>C1</h5></th>
                                                    <th><h5>S1</h5></th>
                                                    <th><h5>S2</h5></th>
                                                    <th><h5>S3</h5></th>
                                                    <!--<th><h5>Lokasi</h5></th>-->
                                                    <!--<th><h5>Tanggal</h5></th>-->
                                                    <!--<th><h5>Waktu</h5></th>-->
                                                </tr>
                                            </thead>
                                            <tbody></tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card pull-up">
                <div class="card-content collapse show">
                    <div class="card-body">
                        <h2 align="left" class="card-title">UPLOAD DATA GARANG</h2>
                        <p align="left" class="card-category">The Uploaded Data Must Be in .xls Format</p>
                        <div class="card-body">
                            <div class="tab-pane active">
                                <div class="tab-responsive">
                                    <form method="post" enctype="multipart/form-data" action="../inc/upload_data.php">
                                        <label for="file">File:</label><br>
                                        <div class="custom-file mb-3">
                                            <input type="file" id="file" name="file" class="custom-file-input" required />
                                            <label class="custom-file-label" for="file">Choose File</label>
                                        </div>
                                        <button type="submit"   id="upload5" name="upload5" class="btn-gradient-secondary mt-2" value="Import">IMPORT GARANG<i class="la la-angle-right"></i></button><br>
                                        <button type="submit"   id="upload6" name="upload6" class="btn-gradient-secondary mt-2" value="Import">IMPORT BANJIR<i class="la la-angle-right"></i></button>

                                    </form>
                                    <div class="table-responsive" id="tabeldebitgarang" style="margin-top: 80px">
                                        <h2 align="left" class="card-title">Data Sedimen</h2>
                                        <table class="table table-hover table-lg" id="dataTable">
                                            <thead>
                                                <tr>
                                                    <th><h5>No</h5></th>
                                                    <th><h5>Ha</h5></th>
                                                    <th><h5>ha1</h5></th>
                                                    <th><h5>a1</h5></th>
                                                    <th><h5>Ch</h5></th>
                                                    <th><h5>ha2</h5></th>
                                                    <th><h5>a2</h5></th>
                                                    <th><h5>a0</h5></th>
                                                    <!--<th><h5>Lokasi</h5></th>-->
                                                    <!--<th><h5>Tanggal</h5></th>-->
                                                    <!--<th><h5>Waktu</h5></th>-->
                                                </tr>
                                            </thead>
                                            <tbody></tbody>
                                        </table>
                                    </div>
                                    <div class="table-responsive" id="tabeldebitbanjirgarang" style="margin-top: 40px">
                                        <h2 align="left" class="card-title">Data Banjir</h2>
                                        <table class="table table-hover table-lg" id="dataTable">
                                            <thead>
                                                <tr>
                                                    <th><h5>No</h5></th>
                                                    <th><h5>HA1</h5></th>
                                                    <th><h5>HA2</h5></th>
                                                    <th><h5>HA3</h5></th>
                                                    <th><h5>HB</h5></th>
                                                    <th><h5>HC</h5></th>
                                                    <th><h5>A0</h5></th>
                                                    <th><h5>A1</h5></th>
                                                    <th><h5>A2</h5></th>
                                                    <th><h5>A3</h5></th>
                                                    <th><h5>B0</h5></th>
                                                    <th><h5>B1</h5></th>
                                                    <th><h5>C0</h5></th>
                                                    <th><h5>C1</h5></th>
                                                    <th><h5>S1</h5></th>
                                                    <th><h5>S2</h5></th>
                                                    <th><h5>S3</h5></th>
                                                    <!--<th><h5>Lokasi</h5></th>-->
                                                    <!--<th><h5>Tanggal</h5></th>-->
                                                    <!--<th><h5>Waktu</h5></th>-->
                                                </tr>
                                            </thead>
                                            <tbody></tbody>
                                        </table>
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

                    
    <script>
        // Add the following code if you want the name of the file appear on select
        $(".custom-file-input").on("change", function() {
            var fileName = $(this).val().split("\\").pop();
            $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
        });
    </script>
    <script language="javascript">
        $("#id").keyup(function() {
            this.value = this.value.replace(/ /g, "_");
        });

        $.ajax({
                method: "POST",
                url: "../inc/olah.php",
                data: {
                    "p": "daftardebitsedimen"
                },
                dataType: "json"
            })
            .done(function(d) {
                jml = d.id.length;
                j = 0;
                for (i = 0; i < jml; i++) {
                    j++;
                    $("#tabeldebit tbody").append("<tr><td>" + j + "</td><td>" + d.Ha[i] + "</td><td>" + d.ha1[i] + "</td><td>" + d.a1[i] + "</td><td>" + d.Ch[i] + "</td><td>" + d.ha2[i] + "</td><td>" + d.a2[i] + "</td><td>" + d.a0[i] + "</td></tr>");
                }
            })
        $(".custom-file-input").on("change", function() {
            var fileName = $(this).val().split("\\").pop();
            $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
        });
    </script>
    <script language="javascript">
        $("#id").keyup(function() {
            this.value = this.value.replace(/ /g, "_");
        });

        $.ajax({
                method: "POST",
                url: "../inc/olah.php",
                data: {
                    "p": "daftardebitsedimenbanjir"
                },
                dataType: "json"
            })
            .done(function(d) {
                jml = d.id.length;
                j = 0;
                for (i = 0; i < jml; i++) {
                    j++;
                    $("#tabeldebitbanjir tbody").append("<tr><td>" + j + "</td><td>" + d.HA1[i] + "</td><td>" + d.HA2[i] + "</td><td>" + d.HA3[i] + "</td><td>" + d.HB[i] + "</td><td>" + d.HC[i] + "</td><td>" + d.A0[i] + "</td><td>" + d.A1[i] + "</td><td>" + d.A2[i] + "</td><td>" + d.A3[i] + "</td><td>" + d.B0[i] + "</td><td>" + d.B1[i] + "</td><td>" + d.C0[i] + "</td><td>" + d.C1[i] + "</td><td>" + d.S1[i] + "</td><td>" + d.S2[i] + "</td><td>" + d.S3[i] + "</td><tr>");
                }
            })
        $(".custom-file-input").on("change", function() {
            var fileName = $(this).val().split("\\").pop();
            $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
        });
    </script>
    <script language="javascript">
        $("#id").keyup(function() {
            this.value = this.value.replace(/ /g, "_");
        });

        $.ajax({
                method: "POST",
                url: "../inc/olah.php",
                data: {
                    "p": "daftardebitsedimenbanjirkripik"
                },
                dataType: "json"
            })
            .done(function(d) {
                jml = d.id.length;
                j = 0;
                for (i = 0; i < jml; i++) {
                    j++;
                    $("#tabeldebitbanjirkripik tbody").append("<tr><td>" + j + "</td><td>" + d.HA1[i] + "</td><td>" + d.HA2[i] + "</td><td>" + d.HA3[i] + "</td><td>" + d.HB[i] + "</td><td>" + d.HC[i] + "</td><td>" + d.A0[i] + "</td><td>" + d.A1[i] + "</td><td>" + d.A2[i] + "</td><td>" + d.A3[i] + "</td><td>" + d.B0[i] + "</td><td>" + d.B1[i] + "</td><td>" + d.C0[i] + "</td><td>" + d.C1[i] + "</td><td>" + d.S1[i] + "</td><td>" + d.S2[i] + "</td><td>" + d.S3[i] + "</td><tr>");
                }
            })
        $(".custom-file-input").on("change", function() {
            var fileName = $(this).val().split("\\").pop();
            $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
        });
    </script>
    <script language="javascript">
        $("#id").keyup(function() {
            this.value = this.value.replace(/ /g, "_");
        });

        $.ajax({
                method: "POST",
                url: "../inc/olah.php",
                data: {
                    "p": "daftardebitsedimenbanjirgarang"
                },
                dataType: "json"
            })
            .done(function(d) {
                jml = d.id.length;
                j = 0;
                for (i = 0; i < jml; i++) {
                    j++;
                    $("#tabeldebitbanjirgarang tbody").append("<tr><td>" + j + "</td><td>" + d.HA1[i] + "</td><td>" + d.HA2[i] + "</td><td>" + d.HA3[i] + "</td><td>" + d.HB[i] + "</td><td>" + d.HC[i] + "</td><td>" + d.A0[i] + "</td><td>" + d.A1[i] + "</td><td>" + d.A2[i] + "</td><td>" + d.A3[i] + "</td><td>" + d.B0[i] + "</td><td>" + d.B1[i] + "</td><td>" + d.C0[i] + "</td><td>" + d.C1[i] + "</td><td>" + d.S1[i] + "</td><td>" + d.S2[i] + "</td><td>" + d.S3[i] + "</td><tr>");
                }
            })
        $(".custom-file-input").on("change", function() {
            var fileName = $(this).val().split("\\").pop();
            $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
        });
    </script>
    <script language="javascript">
        $("#id").keyup(function() {
            this.value = this.value.replace(/ /g, "_");
        });

        $.ajax({
                method: "POST",
                url: "../inc/olah.php",
                data: {
                    "p": "daftardebitsedimenkripik"
                },
                dataType: "json"
            })
            .done(function(d) {
                jml = d.id.length;
                j = 0;
                for (i = 0; i < jml; i++) {
                    j++;
                    $("#tabeldebitkripik tbody").append("<tr><td>" + j + "</td><td>" + d.Ha[i] + "</td><td>" + d.ha1[i] + "</td><td>" + d.a1[i] + "</td><td>" + d.Ch[i] + "</td><td>" + d.ha2[i] + "</td><td>" + d.a2[i] + "</td><td>" + d.a0[i] + "</td></tr>");
                }
            })
        $(".custom-file-input").on("change", function() {
            var fileName = $(this).val().split("\\").pop();
            $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
        });
    </script>
    <script language="javascript">
        $("#id").keyup(function() {
            this.value = this.value.replace(/ /g, "_");
        });

        $.ajax({
                method: "POST",
                url: "../inc/olah.php",
                data: {
                    "p": "daftardebitsedimengarang"
                },
                dataType: "json"
            })
            .done(function(d) {
                jml = d.id.length;
                j = 0;
                for (i = 0; i < jml; i++) {
                    j++;
                    $("#tabeldebitgarang tbody").append("<tr><td>" + j + "</td><td>" + d.Ha[i] + "</td><td>" + d.ha1[i] + "</td><td>" + d.a1[i] + "</td><td>" + d.Ch[i] + "</td><td>" + d.ha2[i] + "</td><td>" + d.a2[i] + "</td><td>" + d.a0[i] + "</td></tr>");
                }
            })
        $(".custom-file-input").on("change", function() {
            var fileName = $(this).val().split("\\").pop();
            $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
        });
    </script>
<?php
}
function userprofile()
{
    global $link;
?>
    <div class="main-panel">
        <div class="content" style="margin-top:10px">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header card-header-warning">
                                <h3 class="card-title">Edit Profile</h3>
                                <p class="card-category">Complete your profile</p>
                            </div>
                            <form class="mb-2" id="profile" method="post" enctype="multipart/form-data">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="input-container text-left col-12">
                                            <div class="preview" align="center">
                                                <img src="" id="img" width="100" height="100">
                                            </div>
                                            <label for="foto_profil"></label>
                                            <div class="custom-file mb-3">
                                                <input type="file" id="file" name="file" class="custom-file-input-foto" width="100" />
                                                <label class="custom-file-label" for="file">Pilih File</label>
                                            </div>
                                        </div>
                                        <div class="col-md-5">
                                            <div class="form-group">
                                                <label>Email</label><br>
                                                <input name="username" type="text" class="form-control" placeholder="<?php echo ($_SESSION["username"]); ?>" readonly="readonly" required style="margin-top:-5px">
                                            </div>
                                        </div>
                                        <div class="col-md-7">
                                            <div class="form-group">
                                                <label>Password </label><br>
                                                <input type="text" class="form-control" name="password" required style="margin-top:-5px">
                                            </div>
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Name</label></br>
                                                <input type="text" class="form-control" name="nama" required style="margin-top:-5px">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Phone</label><br>
                                                <input type="text" class="form-control" name="no_hp" required style="margin-top:-5px">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <label>Address</label><br>
                                                <input type="text" class="form-control" name="alamat" required style="margin-top:-5px">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>City</label><br>
                                                <input type="text" class="form-control" name="alamat" required style="margin-top:-5px">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-3"><br></div>
                                    <button type="submit" name="simpan" class="btn-gradient-secondary mt-2">Update Profile<i class="la la-angle-right"></i></button>
                                    <div class="clearfix"></div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card card-profile">
                            <div class="card-avatar">
                                <a href="javascript:;">
                                    <img class="img" src="<?php $q = mysqli_query($link, "SELECT foto_profil FROM login WHERE username=\"$_SESSION[username]\"");
                                                            while ($d = mysqli_fetch_row($q)) {
                                                                echo $d[0];
                                                            } ?>" width="40" alt="<?php echo ($_SESSION["username"]); ?>">
                                </a>
                            </div>
                            <div class="card-body">
                                <h4 class="card-category text-gray">Hi</h4>
                                <h2 class="card-title"><?php $q = mysqli_query($link, "SELECT nama FROM login WHERE username=\"$_SESSION[username]\"");
                                                        while ($d = mysqli_fetch_row($q)) {
                                                            echo $d[0];
                                                        } ?></h2>
                                <p class="card-description">
                                    Don't be scared of the truth because we need to restart the human foundation in truth ...
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        $(".custom-file-input").on("change", function() {
            var fileName = $(this).val().split("\\").pop();
            $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
        });
        username = $("#profile input[name='username']").attr('placeholder');
        console.log(username)
        $.ajax({
                method: "POST",
                url: "../inc/olah.php",
                data: {
                    "p": "profile",
                    'username': username
                },
                dataType: "json"
            })
            .done(function(d) {
                $("#profile input[name='password']").val(d.password);
                $("#profile input[name='nama']").val(d.nama);
                $("#profile input[name='no_hp']").val(d.no_hp);
                $("#profile input[name='alamat']").val(d.alamat);
                $("#profile input[name='kota']").val(d.kota);
                $("#profile #img").attr('src', d.foto_profil);
            })
    </script>
<?php
}
function isiadmin()

{

  global $link;
    $q3 = mysqli_query($link, "SELECT tanggal_server FROM curah_hujan WHERE lokasi='Kreo' AND curah_hujan!=0 order by id desc limit 1");
    $d3 = mysqli_fetch_row($q3);
    $date = $d3[0];
    
    $q3 = mysqli_query($link, "SELECT tanggal_server FROM curah_hujan WHERE lokasi='Kreo' AND sed_sim!=0 order by id desc limit 1");
    $d3 = mysqli_fetch_row($q3);
    $date1 = $d3[0];
    
    $q3 = mysqli_query($link, "SELECT tanggal_server FROM curah_hujan WHERE lokasi='Kreo' AND deb_banjir!=0 order by id desc limit 1");
    $d3 = mysqli_fetch_row($q3);
    $date2 = $d3[0];

    $q3k = mysqli_query($link, "SELECT tanggal_server FROM curah_hujan WHERE lokasi='Kripik'  AND curah_hujan!=0 order by id desc limit 1");
    $d3k = mysqli_fetch_row($q3k);
    $datekripik1 = $d3k[0];
    
    $q3k = mysqli_query($link, "SELECT tanggal_server FROM curah_hujan WHERE lokasi='Kripik' AND sed_sim!=0 order by id desc limit 1");
    $d3k = mysqli_fetch_row($q3k);
    $datekripik2 = $d3k[0];
    
    $q3k = mysqli_query($link, "SELECT tanggal_server FROM curah_hujan WHERE lokasi='Kripik' AND deb_banjir!=0 order by id desc limit 1");
    $d3k = mysqli_fetch_row($q3k);
    $datekripik3 = $d3k[0];
    
    $q3g = mysqli_query($link, "SELECT tanggal_server FROM curah_hujan WHERE lokasi='Garang' order by id desc limit 1");
    $d3g = mysqli_fetch_row($q3g);
    $dategarang1 = $d3g[0];
    
    $q3g = mysqli_query($link, "SELECT tanggal_server FROM curah_hujan WHERE lokasi='Garang'  order by id desc limit 1");
    $d3g = mysqli_fetch_row($q3g);
    $dategarang2 = $d3g[0];
    
    $q3g = mysqli_query($link, "SELECT tanggal_server FROM curah_hujan WHERE lokasi='Garang'  order by id desc limit 1");
    $d3g = mysqli_fetch_row($q3g);
    $dategarang3 = $d3g[0];

    $q4 = mysqli_query($link, "SELECT waktu_server FROM curah_hujan WHERE lokasi='Kreo'  order by id desc limit 1");
    $d4 = mysqli_fetch_row($q4);
    $time1 = $d4[0];
    
    $q4 = mysqli_query($link, "SELECT waktu_server FROM curah_hujan WHERE lokasi='Kreo'  order by id desc limit 1");
    $d4 = mysqli_fetch_row($q4);
    $time2 = $d4[0];
    
    $q4 = mysqli_query($link, "SELECT waktu_server FROM curah_hujan WHERE lokasi='Kreo'  order by id desc limit 1");
    $d4 = mysqli_fetch_row($q4);
    $time = $d4[0];

    $q4 = mysqli_query($link, "SELECT waktu FROM curah_hujan WHERE lokasi='Kripik'  order by id desc limit 1");
    $d4 = mysqli_fetch_row($q4);
    $timekripik1 = $d4[0];
    
    $q4 = mysqli_query($link, "SELECT waktu FROM curah_hujan WHERE lokasi='Kripik'   order by id desc limit 1");
    $d4 = mysqli_fetch_row($q4);
    $timekripik2 = $d4[0];
    
    $q4 = mysqli_query($link, "SELECT waktu FROM curah_hujan WHERE lokasi='Kripik'  order by id desc limit 1");
    $d4 = mysqli_fetch_row($q4);
    $timekripik3 = $d4[0];
    
    $q4 = mysqli_query($link, "SELECT waktu FROM curah_hujan WHERE lokasi='Garang'  order by id desc limit 1");
    $d4 = mysqli_fetch_row($q4);
    $timegarang1 = $d4[0];
    
    $q4 = mysqli_query($link, "SELECT waktu FROM curah_hujan WHERE lokasi='Garang'  order by id desc limit 1");
    $d4 = mysqli_fetch_row($q4);
    $timegarang2 = $d4[0];
    
    $q4 = mysqli_query($link, "SELECT waktu FROM curah_hujan WHERE lokasi='Garang'  order by id desc limit 1");
    $d4 = mysqli_fetch_row($q4);
    $timegarang3= $d4[0];

    $q5 = mysqli_query($link, "SELECT curah_hujan FROM curah_hujan WHERE lokasi='Kreo' ORDER BY id DESC limit 1");
    $d5 = mysqli_fetch_row($q5);
    $rainfall = $d5[0];
    
    $q5 = mysqli_query($link, "SELECT deb_banjir FROM curah_hujan WHERE lokasi='Kreo' ORDER BY id DESC limit 1");
    $d5 = mysqli_fetch_row($q5);
    $banjir  = $d5[0];

    $q5 = mysqli_query($link, "SELECT curah_hujan FROM curah_hujan WHERE lokasi='Kripik' ORDER BY id DESC limit 1");
    $d5 = mysqli_fetch_row($q5);
    $rainfallkripik = $d5[0];
    
    $q5 = mysqli_query($link, "SELECT curah_hujan FROM curah_hujan WHERE lokasi='Garang' ORDER BY id DESC limit 1");
    $d5 = mysqli_fetch_row($q5);
    $rainfallgarang = $d5[0];
    
    $q6 = mysqli_query($link, "SELECT lokasi FROM curah_hujan ORDER BY id DESC limit 1");
    $d6 = mysqli_fetch_row($q6);
    $location = $d6[0];

    $q7 = mysqli_query($link, "SELECT tanggal_server FROM curah_hujan WHERE lokasi='Kreo' ORDER BY id DESC limit 1");
    $d7 = mysqli_fetch_row($q7);
    $tanggal = $d7[0];

    $q7k = mysqli_query($link, "SELECT tanggal_server FROM curah_hujan WHERE lokasi='Kripik' ORDER BY id DESC limit 1");
    $d7k = mysqli_fetch_row($q7k);
    $tanggalkripik = $d7k[0];
    
    $q7g = mysqli_query($link, "SELECT tanggal_server FROM curah_hujan WHERE lokasi='Garang' ORDER BY id DESC limit 1");
    $d7g = mysqli_fetch_row($q7g);
    $tanggalgarang = $d7g[0];

    $q8 = mysqli_query($link, "SELECT waktu_server FROM curah_hujan WHERE lokasi='Kreo' ORDER BY id DESC limit 1");
    $d8 = mysqli_fetch_row($q8);
    $waktu = $d8[0];

    $q8k = mysqli_query($link, "SELECT waktu_server FROM curah_hujan WHERE lokasi='Kripik' ORDER BY id DESC limit 1");
    $d8k = mysqli_fetch_row($q8k);
    $waktukripik = $d8k[0];
    
    $q8g = mysqli_query($link, "SELECT waktu_server FROM curah_hujan WHERE lokasi='Garang' ORDER BY id DESC limit 1");
    $d8g = mysqli_fetch_row($q8g);
    $waktugarang = $d8g[0];

    $q9 = mysqli_query($link, "SELECT sed_sim FROM curah_hujan WHERE lokasi='Kreo' ORDER BY id DESC limit 1");
    $row = mysqli_fetch_row($q9);
    $sed_sim = $row[0];

    $q9 = mysqli_query($link, "SELECT sed_sim FROM curah_hujan WHERE lokasi='Kripik' ORDER BY id DESC limit 1");
    $row = mysqli_fetch_row($q9);
    $sed_simkripik = $row[0];
    
    $q9 = mysqli_query($link, "SELECT sed_sim FROM curah_hujan WHERE lokasi='Garang' ORDER BY id DESC limit 1");
    $row = mysqli_fetch_row($q9);
    $sed_simgarang = $row[0];
    
    $q9 = mysqli_query($link, "SELECT gambar FROM gambar WHERE lokasi='Kreo' ORDER BY id DESC limit 1");
    $row = mysqli_fetch_row($q9);
    $kreoKamera = $row[0];
    
    $q9 = mysqli_query($link, "SELECT gambar FROM gambar WHERE lokasi='Kripik' ORDER BY id DESC limit 1");
    $row = mysqli_fetch_row($q9);
    $kripikKamera = $row[0];
    
    $q9 = mysqli_query($link, "SELECT gambar FROM gambar WHERE lokasi='Garang' ORDER BY id DESC limit 1");
    $row = mysqli_fetch_row($q9);
    $garangKamera = $row[0];

?>
    <!-- <div class="main-panel">
        <div class="content"> -->
    <div class="app-content content">
      <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body">
            <script language="javascript">
                <?php
                function format_hari_tanggal($waktu)
                {
                    $hari_array = array(
                        'Minggu',
                        'Senin',
                        'Selasa',
                        'Rabu',
                        'Kamis',
                        'Jumat',
                        'Sabtu'
                    );
                    $hr = date('w', strtotime($waktu));
                    $hari = $hari_array[$hr];
                    $tanggal = date('j', strtotime($waktu));
                    $bulan_array = array(
                        1 => 'Januari',
                        2 => 'Februari',
                        3 => 'Maret',
                        4 => 'April',
                        5 => 'Mei',
                        6 => 'Juni',
                        7 => 'Juli',
                        8 => 'Agustus',
                        9 => 'September',
                        10 => 'Oktober',
                        11 => 'November',
                        12 => 'Desember',
                    );
                    $bl = date('n', strtotime($waktu));
                    $bulan = $bulan_array[$bl];
                    $tahun = date('Y', strtotime($waktu));
                    return "$hari, $tanggal $bulan $tahun";
                }
                ?>

                function tgl_ke_hari(tgl) {
                    set_tgl = new Date(tgl);
                    int_hari = set_tgl.getDay();
                    if (int_hari == 0) hari = 'Minggu';
                    else if (int_hari == 1) hari = 'Senin';
                    else if (int_hari == 2) hari = 'Selasa';
                    else if (int_hari == 3) hari = 'Rabu';
                    else if (int_hari == 4) hari = 'Kamis';
                    else if (int_hari == 5) hari = 'Jumat';
                    else hari = 'Sabtu';
                    return hari;
                }

                function bln_singkat(bln) {
                    if (bln == 1) bln2 = 'Jan';
                    else if (bln == 2) bln2 = 'Feb';
                    else if (bln == 3) bln2 = 'Mar';
                    else if (bln == 4) bln2 = 'Apr';
                    else if (bln == 5) bln2 = 'May';
                    else if (bln == 6) bln2 = 'Jun';
                    else if (bln == 7) bln2 = 'Jul';
                    else if (bln == 8) bln2 = 'Aug';
                    else if (bln == 9) bln2 = 'Sep';
                    else if (bln == 10) bln2 = 'Oct';
                    else if (bln == 11) bln2 = 'Nov';
                    else bln2 = 'Dec';
                    return bln2;
                }

                function tgl_now() {
                    var today = new Date();
                    var dd = today.getDate();
                    var mm = today.getMonth() + 1; //January is 0!
                    var yyyy = today.getFullYear();

                    if (dd < 10) {
                        dd = '0' + dd
                    }
                    if (mm < 10) {
                        mm = '0' + mm
                    }

                    var weekday = new Array(7);
                    weekday[0] = "Minggu";
                    weekday[1] = "Senin";
                    weekday[2] = "Selasa";
                    weekday[3] = "Rabu";
                    weekday[4] = "Kamis";
                    weekday[5] = "Jumat";
                    weekday[6] = "Sabtu";
                    var dino_iki = weekday[today.getDay()];

                    var date = new Date();
                    date.setDate(date.getDate() - 1);
                    var dd2 = date.getDate();
                    var mm2 = date.getMonth() + 1; //January is 0!
                    var yyyy2 = date.getFullYear();
                    var wingi = weekday[date.getDay()] + " " + dd2 + '/' + mm2 + '/' + yyyy2;

                    today1 = yyyy + '-' + mm + '-' + dd;
                    today2 = dd + '/' + mm + '/' + yyyy;
                    today = [dino_iki, today1, today2, wingi];
                    return today;
                }

                function tgl_DMY(tgl) {
                    t = tgl.split('-');
                    t2 = t[2] + '-' + t[1] + '-' + t[0];
                    return t2;
                }

                function tgl_text(tgl) {
                    t = tgl.split('-');
                    t2 = bln_singkat(t[1]) + ' ' + t[2] + ', ' + t[0];
                    return t2;
                }

                function tgl_text2(tgl) {
                    t = tgl.split('-');
                    t2 = t[0] + ' ' + bln_singkat(t[1]) + ' ' + t[2];
                    return t2;
                }

                function grafik_liat(id, id_icon, id_chart, id_button, id_form, id_export, parameter) {
                    //console.log("grafikliat");
                    // $("#" + id_icon + " .fa-chart-bar").click(function(e) {
                    console.log("tgllastupdate=" + tgl_last_update);
                    // $("#" + id + ",#" + id_icon).fadeOut();
                    // $("#" + id_export).fadeIn();
                    $("#" + id_form).fadeOut();
                    grafik(parameter, tgl_last_update, '');
                    $("#" + id_chart).fadeOut();
                    // });

                }
                
                function grafik_liatkripik(idkripik, id_iconkripik, id_chartkripik, id_buttonkirpik, id_formkripik, id_exportkripik, parameterkripik) {
                    //console.log("grafikliat");
                    // $("#" + id_icon + " .fa-chart-bar").click(function(e) {
                    console.log("tgllastupdate=" + tgl_last_update);
                    // $("#" + id + ",#" + id_icon).fadeOut();
                    // $("#" + id_export).fadeIn();
                    $("#" + id_formkripik).fadeOut();
                    grafik(parameterkripik, tgl_last_update, '');
                    $("#" + id_chartkripik).fadeOut();
                    // });

                }

                function grafik_toggle(id_button, id_chart, id_export, parameter) {
                    $("#" + id_button + " button:nth-child(1)").click(function(e) {
                        $(this).toggleClass('saiki');
                        if ($(this).hasClass('saiki')) {
                            $(this).text('Today');
                            grafik(parameter, tgl_wingi, '', sn);
                        } else {
                            grafik(parameter, tgl_last_update, '', sn);
                            $(this).text('Yesterday');
                        }
                        $("#" + id_button + " div:nth-child(1),#" + id_button + " div:nth-child(2),#" + id_export).fadeOut();
                        $("#" + id_chart + ",#" + id_button + " .btn").fadeIn();
                    });
                }

                function grafik_close(id, id_icon, id_chart, id_button, id_export) {
                    $("#" + id_button + " button:nth-child(1)").click(function(e) {
                        $("#" + id_chart + ",#" + id_button + ",#" + id_export).fadeOut();
                        $("#" + id + ",#" + id_icon + ",#" + id_chart).fadeIn();
                        $("#" + id_button + " button:first-child").fadeIn(); //button today/yesterday
                        location.replace("index.php?p=main");
                    });
                }
                function grafik_closekripik(id, id_icon, id_chart, id_button, id_export) {
                    $("#" + id_button + " button:nth-child(1)").click(function(e) {
                        $("#" + id_chart + ",#" + id_button + ",#" + id_export).fadeOut();
                        $("#" + id + ",#" + id_icon + ",#" + id_chart).fadeIn();
                        $("#" + id_button + " button:first-child").fadeIn(); //button today/yesterday
                        location.replace("index.php?p=main");
                    });
                }

                function jdw_open(id_spin, id_form, id_chart, id_export, id_real) {
                    $("#" + id_spin + " .jdw").click(function(e) {
                        $("#" + id_chart + ",#" + id_id_real + ",#" + id_export).fadeOut();
                        $("#" + id_form).fadeIn('slow');
                    });
                }
                
                function jdw_openkripik(id_spinkripik, id_formkripik, id_chartkripik, id_export, id_real) {
                    $("#" + id_spinkripik + " .jdwkripik").click(function(e) {
                        $("#" + id_chartkripik + ",#" + id_id_realkripik + ",#" + id_export).fadeOut();
                        $("#" + id_formkripik).fadeIn('slow');
                    });
                }

                function jdw_close(id, id_form, id_icon, id_chart, id_export, id_real) {
                    //console.log("jdw_close"+id_form);
                    $("#" + id_form + " .tutup").click(function(e) {
                        $("#" + id_form + ",#" + id_export).fadeOut();
                        $("#" + id + ",#" + id_icon + ",#" + id_real).fadeIn();
                    });
                }
            </script>

<div class="btn-group d-flex align-items-center justify-content-center mb-3" role="group" aria-label="Basic example">
<button data-role="DASHKREO" class="btn btn-gradient-primary btnNav active" onclick="switchToContent('DASHKREO')">Dash Kreo</button>
    <button data-role="JATIBARANG" class="btn btn-gradient-primary btnNav" onclick="switchToContent('JATIBARANG')">Dash Kripik</button>
    <button data-role="DASHSEMARANG" class="btn btn-gradient-primary btnNav" onclick="switchToContent('DASHSEMARANG')">Dash Garang</button>
</div>
        </div>
    </div>
</div>

<div class="content" id="DASHKREOContent" style="display: none">
    <div class="btn-group d-flex align-items-center justify-content-center mb-3" role="group" aria-label="Basic example">
<button data-role="DASHKREO" class="btn btn-gradient-primary btnNav active" onclick="switchToContent('DASHKREO')">Kreo</button>
    <button data-role="JATIBARANG" class="btn btn-gradient-primary btnNav" onclick="switchToContent('JATIBARANG')">Kripik</button>
    <button data-role="DASHSEMARANG" class="btn btn-gradient-primary btnNav" onclick="switchToContent('DASHSEMARANG')">Garang</button>
</div>

    <div class="row">
        <div class="col-12 ">
            <div class="card pull-up" ">
                <div class="card-content collapse show ml-5 ">
                    <div class="card-body ">
                        <div class="row justify-content-center">
                            <div class="col-md-4 col-12 text-left">
                                <div class="dash-circle rounded-circle">
                                    <i class="fa fa-map-marker text-danger"></i>
                                </div>
                                <p class="mt-2 ml-5 text-center"><strong>Location</strong></p>
                                <!-- <h5 class="mb-0 text-center"><?php echo $location ?></h5> -->
                                <h5 class="mb-0 ml-5 text-center">KREO</h5>
                            </div>
                            <div class="col-md-4 col-12 text-center">
                                <div class="dash-circle rounded-circle">
                                    <i class="fa fa-calendar text-warning"></i>
                                </div>
                                <p class="mt-2 ml-5"><strong>Date</strong></p>
                                <h5 class="mb-0 ml-5"><?php echo $tanggal ?></h5>
                            </div>
                            <div class="col-md-4 col-12 mb-1 text-right">
                                <div class="dash-circle rounded-circle text-success">
                                    <i class="fa fa-clock-o"></i>
                                </div>
                                <p class="mt-2 ml-5 text-center"><strong>Time</strong></p>
                                <h5 class="mb-0 ml-5 text-center"><?php echo $waktu ?></h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
        <div class="row">
            <div class="col-md-6">
                <div class="card pull-up">
                    <h2 class="card-title btn-gradient-primary text-white">CURAH HUJAN</h2>
                    <p class="card-category"></p>
                    <div class="card-body">
                        <p class="txt-center" id="last_update" data-tgl_last_update="<?php echo $date ?>"> Last update: <?php echo $date ?> | <?php echo $time ?></p>
                        <div class="row animated bounce" align="center" style="margin-top:50px; margin-bottom:80px">
                            <div class="col-sm-12" id="rain_spin">
                                <div class="GaugeMeter" id="rain" data-percent="" data-used="0" data-total="" data-label="Curah Hujan" data-text="" data-text_size="0.125" data-append="" data-size="290" data-width="30" data-style="Arch" data-theme="LightBlue-DarkBlue" data-animate_gauge_colors="true" data-animate_text_colors="true" style="height:280px" data-stripe="7"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card pull-up">
                    <h2 class="card-title btn-gradient-primary text-white">SED SIM</h2>
                    <p class="card-category"></p>
                    <div class="card-body">
                        <p class="txt-center" id="last_update1" data-tgl_last_update="<?php echo $date1 ?>"> Last update: <?php echo $date1 ?> | <?php echo $time1 ?></p>
                        <div class="row animated bounce" align="center" style="margin-top:50px; margin-bottom:80px">
                            <div class="col-sm-12" id="sed_spin">
                                <div class="GaugeMeter" id="sed" data-percent="" data-used="0" data-total="" data-label="Sed Sim" data-text="" data-text_size="0.125" data-append="" data-size="290" data-width="26" data-style="Arch" data-theme="Green-Gold-Red" data-animate_gauge_colors="true" data-animate_text_colors="true" style="height:285px" data-stripe="7"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card pull-up">
                    <h2 class="card-title btn-gradient-primary text-white">BANJIR</h2>
                    <p class="card-category"></p>
                    <div class="card-body">
                        <p class="txt-center" id="last_update2" data-tgl_last_update="<?php echo $date2 ?>"> Last update: <?php echo $date2 ?> | <?php echo $time2 ?></p>
                        <div class="row animated bounce" align="center" style="margin-top:50px; margin-bottom:80px">
                            <div class="col-sm-12" id="deb_spin">
                                <div class="GaugeMeter" id="deb" data-percent="" data-used="0" data-total="" data-label="Deb Banjir" data-text="" data-text_size="0.125" data-append="" data-size="290" data-width="26" data-style="Arch" data-theme="Green-Gold-Red" data-animate_gauge_colors="true" data-animate_text_colors="true" style="height:285px" data-stripe="7"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <!--</div>-->
            <div class="col-md-6">
                <div class="card pull-up">
                    <h2 class="card-title btn-gradient-primary text-white">GRAFIK CURAH HUJAN</h2>
                    <div class="card-body">
                        <div class="row animated bounce" align="center" style="margin-top:40px;">
                            <div class="col-sm-12" id="rain_spin">
                                <div id="rain_icon" align="left" style="margin-top:-30px;margin-bottom:15px">
                                    <i class="far fa-calendar-alt fa-lg jdw"></i> &nbsp;</button>
                                </div>
                                <form id="timeFilterForm" style="margin-top:-30px">
                                    <select id="timeFilter" name="timeFilter" >
                                        <option value="">Pilih Hari</option>
                                        <?php
                                    
                                        // Query untuk mengambil nilai unik dari kolom 'tanggal_server' dan mengurutkannya berdasarkan 'id' secara menurun
                                        $sql = mysqli_query($link, "SELECT DISTINCT tanggal_server FROM curah_hujan WHERE lokasi='Kreo' ORDER BY id DESC");
                                    
                                        // Periksa hasil query
                                        if ($sql->num_rows > 0) {
                                            while ($row = mysqli_fetch_assoc($sql)) {
                                                // Tambahkan option dengan nilai dari database 'tanggal_server'
                                                echo '<option value="' . $row['tanggal_server'] . '">' . $row['tanggal_server'] . '</option>';
                                            }
                                        } else {
                                            echo "Tidak ada hasil yang ditemukan";
                                        }
                                        ?>
                                    </select>
                                    <select name="jamFill" id="jamFill">
                                        <option value="">Pilih Jam</option>
                                        
                                        <?php
                                        $jam = [
                                            "00:00" => "0",
                                            "01:00" => "1",
                                            "02:00" => "2",
                                            "03:00" => "3",
                                            "04:00" => "4",
                                            "05:00" => "5",
                                            "06:00" => "6",
                                            "07:00" => "7",
                                            "08:00" => "8",
                                            "09:00" => "9",
                                            "10:00" => "10",
                                            "11:00" => "11",
                                            "12:00" => "12",
                                            "13:00" => "13",
                                            "14:00" => "14",
                                            "15:00" => "15",
                                            "16:00" => "16",
                                            "17:00" => "17",
                                            "18:00" => "18",
                                            "19:00" => "19",
                                            "20:00" => "20",
                                            "21:00" => "21",
                                            "22:00" => "22",
                                            "23:00" => "23",
                                            "24:00" => "24",
                                        ];
                                    
                                        foreach ($jam as $label => $value) {
                                            echo '<option value="' . $value . '">' . $label . '</option>';
                                        }
                                        ?>
                                    </select>
                                    <select name="menitFill" id="menitFill">
                                        <option value="">Pilih Menit</option>
                                        
                                        <?php
                                        $jam = [
                                            "0 - 5" => "0-5",
                                            "6 - 10" => "6-10",
                                            "11 - 15" => "11-15",
                                            "16 - 20" => "16-20",
                                            "21 - 25" => "21-25",
                                            "26 - 30" => "26-30",
                                            "31 - 35" => "31-35",
                                            "36 - 40" => "36-40",
                                            "41 - 45" => "41-45",
                                            "46 - 50" => "46-50",
                                            "51 - 55" => "51-55",
                                            "56 - 60" => "56-60",
                                        ];
                                    
                                        foreach ($jam as $label => $value) {
                                            echo '<option value="' . $value . '">' . $label . '</option>';
                                        }
                                        ?>
                                    </select>
                                    <button type="submit"  class="btn btn-primary">Filter</button>
                                </form>

                                <div id="rainn" data-tgl1="" data-tgl2="" data-waktu=""></div>
                                <div id="rain_chart"></div>
                                <div id="rain_real"></div>
                                <div id="rain_button">
                                    <button type="button" class="btn btn-outline-dark btn-sm">Close</button>
                                    <button type="submit" class="btn btn-dark btn-sm" id="rain_export">Export to .xls</button>
                                </div>
                                <form id="rain_form">
                                    <input type="hidden" name="tipe" value="rain">
                                    <div class="form-group col-7">
                                        <label for="tgl_awal"><small>Start from:</small></label><br>
                                        <input type="date" class="form-control form-control-sm" name="tgl_awal" required>
                                    </div>
                                    <div class="form-group col-7">
                                        <label for "tgl_akhir"><small>End:</small></label><br>
                                        <input type="date" class="form-control form-control-sm" name="tgl_akhir" required>
                                    </div>
                                    <button type="button" class="btn btn-dark btn-sm tutup">Close</button>
                                    <button type="submit" class="btn btn-dark btn-sm">Send</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card pull-up">
                    <h2 class="card-title btn-gradient-primary text-white">GRAFIK SED SIM</h2>
                    <div class="card-body">
                        <div class="row animated bounce" align="center" style="margin-top:40px;">
                            <div class="col-sm-12" id="sed_spin">
                                <div id="sed_icon" align="left" style="margin-top:-30px;margin-bottom:20px">
                                    <i class="far fa-calendar-alt fa-lg jdw"></i> &nbsp;</button>
                                </div>
                                <form id="timeFilterFormSed" style="margin-top:-30px">
                                    <select id="timeFilterSed" name="timeFilterSed">
                                        <option value="">Pilih Hari</option>
                                        <?php
                                    
                                        // Query untuk mengambil nilai unik dari kolom 'tanggal_server' dan mengurutkannya berdasarkan 'id' secara menurun
                                        $sql = mysqli_query($link, "SELECT DISTINCT tanggal_server FROM curah_hujan WHERE lokasi='Kreo' ORDER BY id DESC");
                                    
                                        // Periksa hasil query
                                        if ($sql->num_rows > 0) {
                                            while ($row = mysqli_fetch_assoc($sql)) {
                                                // Tambahkan option dengan nilai dari database 'tanggal_server'
                                                echo '<option value="' . $row['tanggal_server'] . '">' . $row['tanggal_server'] . '</option>';
                                            }
                                        } else {
                                            echo "Tidak ada hasil yang ditemukan";
                                        }
                                        ?>
                                    </select>
                                    <select name="jamFillSed" id="jamFillSed">
                                        <option value="">Pilih Waktu</option>
                                        
                                        <?php
                                        $jam = [
                                            "00:00" => "0",
                                            "01:00" => "1",
                                            "02:00" => "2",
                                            "03:00" => "3",
                                            "04:00" => "4",
                                            "05:00" => "5",
                                            "06:00" => "6",
                                            "07:00" => "7",
                                            "08:00" => "8",
                                            "09:00" => "9",
                                            "10:00" => "10",
                                            "11:00" => "11",
                                            "12:00" => "12",
                                            "13:00" => "13",
                                            "14:00" => "14",
                                            "15:00" => "15",
                                            "16:00" => "16",
                                            "17:00" => "17",
                                            "18:00" => "18",
                                            "19:00" => "19",
                                            "20:00" => "20",
                                            "21:00" => "21",
                                            "22:00" => "22",
                                            "23:00" => "23",
                                            "24:00" => "24",
                                        ];
                                    
                                        foreach ($jam as $label => $value) {
                                            echo '<option value="' . $value . '">' . $label . '</option>';
                                        }
                                        ?>
                                    </select>
                                    <select name="menitFillSed" id="menitFillSed">
                                        <option value="">Pilih Menit</option>
                                        
                                        <?php
                                        $jam = [
                                            "0 - 5" => "0-5",
                                            "6 - 10" => "6-10",
                                            "11 - 15" => "11-15",
                                            "16 - 20" => "16-20",
                                            "21 - 25" => "21-25",
                                            "26 - 30" => "26-30",
                                            "31 - 35" => "31-35",
                                            "36 - 40" => "36-40",
                                            "41 - 45" => "41-45",
                                            "46 - 50" => "46-50",
                                            "51 - 55" => "51-55",
                                            "56 - 60" => "56-60",
                                        ];
                                    
                                        foreach ($jam as $label => $value) {
                                            echo '<option value="' . $value . '">' . $label . '</option>';
                                        }
                                        ?>
                                    </select>
                                    <button type="submit"  class="btn btn-primary">Filter</button>
                                </form>
                                <div id="sedd" data-tgl1="" data-tgl2="" data-waktu=""></div>
                                <div id="sed_chart"></div>
                                <div id="sed_real"></div>
                                <div id="sed_button">
                                    <button type="button" class="btn btn-outline-dark btn-sm">Close</button>
                                    <button type="submit" class="btn btn-dark btn-sm" id="sed_export">Export to .xls</button>
                                </div>
                                <form id="sed_form">
                                    <input type="hidden" name="tipe" value="sed">
                                    <div class="form-group col-7">
                                        <label for="tgl_awal"><small>Start from:</small></label><br>
                                        <input type="date" class="form-control form-control-sm" name="tgl_awal" required>
                                    </div>
                                    <div class="form-group col-7">
                                        <label for="tgl_akhir"><small>End:</small></label><br>
                                        <input type="date" class="form-control form-control-sm" name="tgl_akhir" required>
                                    </div>
                                    <button type="button" class="btn btn-dark btn-sm tutup">Close</button>
                                    <button type="submit" class="btn btn-dark btn-sm">Send</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card pull-up">
                    <h2 class="card-title btn-gradient-primary text-white">GRAFIK BANJIR</h2>
                    <div class="card-body">
                        <div class="row animated bounce" align="center" style="margin-top:40px;">
                            <div class="col-sm-12" id="deb_spin">
                                <div id="deb_icon" align="left" style="margin-top:-30px;margin-bottom:20px">
                                    <i class="far fa-calendar-alt fa-lg jdw"></i> &nbsp;</button>
                                </div>
                                <form id="timeFilterFormDeb" style="margin-top:-30px">
                                    <select id="timeFilterDeb" name="timeFilterDeb">
                                        <option value="">Pilih Hari</option>
                                        <?php
                                    
                                        // Query untuk mengambil nilai unik dari kolom 'tanggal_server' dan mengurutkannya berdasarkan 'id' secara menurun
                                        $sql = mysqli_query($link, "SELECT DISTINCT tanggal_server FROM curah_hujan WHERE lokasi='Kreo' ORDER BY id DESC");
                                    
                                        // Periksa hasil query
                                        if ($sql->num_rows > 0) {
                                            while ($row = mysqli_fetch_assoc($sql)) {
                                                // Tambahkan option dengan nilai dari database 'tanggal_server'
                                                echo '<option value="' . $row['tanggal_server'] . '">' . $row['tanggal_server'] . '</option>';
                                            }
                                        } else {
                                            echo "Tidak ada hasil yang ditemukan";
                                        }
                                        ?>
                                    </select>
                                    <select name="jamFillDeb" id="jamFillDeb">
                                        <option value="">Pilih Waktu</option>
                                        
                                        <?php
                                        $jam = [
                                            "00:00" => "0",
                                            "01:00" => "1",
                                            "02:00" => "2",
                                            "03:00" => "3",
                                            "04:00" => "4",
                                            "05:00" => "5",
                                            "06:00" => "6",
                                            "07:00" => "7",
                                            "08:00" => "8",
                                            "09:00" => "9",
                                            "10:00" => "10",
                                            "11:00" => "11",
                                            "12:00" => "12",
                                            "13:00" => "13",
                                            "14:00" => "14",
                                            "15:00" => "15",
                                            "16:00" => "16",
                                            "17:00" => "17",
                                            "18:00" => "18",
                                            "19:00" => "19",
                                            "20:00" => "20",
                                            "21:00" => "21",
                                            "22:00" => "22",
                                            "23:00" => "23",
                                            "24:00" => "24",
                                        ];
                                    
                                        foreach ($jam as $label => $value) {
                                            echo '<option value="' . $value . '">' . $label . '</option>';
                                        }
                                        ?>
                                    </select>
                                    <select name="menitFillDeb" id="menitFillDeb">
                                        <option value="">Pilih Menit</option>
                                        
                                        <?php
                                        $jam = [
                                            "0 - 5" => "0-5",
                                            "6 - 10" => "6-10",
                                            "11 - 15" => "11-15",
                                            "16 - 20" => "16-20",
                                            "21 - 25" => "21-25",
                                            "26 - 30" => "26-30",
                                            "31 - 35" => "31-35",
                                            "36 - 40" => "36-40",
                                            "41 - 45" => "41-45",
                                            "46 - 50" => "46-50",
                                            "51 - 55" => "51-55",
                                            "56 - 60" => "56-60",
                                        ];
                                    
                                        foreach ($jam as $label => $value) {
                                            echo '<option value="' . $value . '">' . $label . '</option>';
                                        }
                                        ?>
                                    </select>
                                    <button type="submit"  class="btn btn-primary">Filter</button>
                                </form>
                                <div id="debb" data-tgl1="" data-tgl2="" data-waktu=""></div>
                                <div id="deb_chart"></div>
                                <div id="deb_real"></div>
                                <div id="deb_button">
                                    <button type="button" class="btn btn-outline-dark btn-sm">Close</button>
                                    <button type="submit" class="btn btn-dark btn-sm" id="deb_export">Export to .xls</button>
                                </div>
                                <form id="deb_form">
                                    <input type="hidden" name="tipe" value="deb">
                                    <div class="form-group col-7">
                                        <label for="tgl_awal"><small>Start from:</small></label><br>
                                        <input type="date" class="form-control form-control-sm" name="tgl_awal" required>
                                    </div>
                                    <div class="form-group col-7">
                                        <label for="tgl_akhir"><small>End:</small></label><br>
                                        <input type="date" class="form-control form-control-sm" name="tgl_akhir" required>
                                    </div>
                                    <button type="button" class="btn btn-dark btn-sm tutup">Close</button>
                                    <button type="submit" class="btn btn-dark btn-sm">Send</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    <div class="row">
        <div class="col-12 ">
            <div class="card pull-up" ">
                <div class="card-content collapse show ml-5 ">
                    <div class="card-body ">
                        <div class="row justify-content-center mt-3">
                            <div class="col-md-4 col-12 text-center ">
                                <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#imageAccordionContent" aria-expanded="true" aria-controls="imageAccordionContent">
                                    <h4><i class="fa fa-camera" style="color: #43dc18;"></i> Tampilkan Gambar</h4>
                                </button>
                            </div>
                        
                           <div class="accordion" id="imageAccordion">
                                <div class="card">
                                    
                                    <div id="imageAccordionContent" class="collapse" aria-labelledby="imageAccordionHeader" data-parent="#imageAccordion">
                                        <div class="card-body">
                                            <img id="kreoKamera" class="img-stream" alt="Photo"  style="transform: rotate(90deg); max-width: 100%;">
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
    </div>
</div>


<div id="JATIBARANGContent" class="content" style="display: none">
    <div class="btn-group d-flex align-items-center justify-content-center mb-3" role="group" aria-label="Basic example">
<button data-role="DASHKREO" class="btn btn-gradient-primary btnNav active" onclick="switchToContent('DASHKREO')">Kreo</button>
    <button data-role="JATIBARANG" class="btn btn-gradient-primary btnNav" onclick="switchToContent('JATIBARANG')">Kripik</button>
    <button data-role="DASHSEMARANG" class="btn btn-gradient-primary btnNav" onclick="switchToContent('DASHSEMARANG')">Garang</button>
</div>
    <div class="row">
        <div class="col-12">
            <div class="card pull-up">
                <div class="card-content collapse show ml-5">
                    <div class="card-body">
                        <div class="row justify-content-center">
                            <div class="col-md-4 col-12 text-left">
                                <div class="dash-circle rounded-circle">
                                    <i class="fa fa-map-marker text-danger"></i>
                                </div>
                                <p class="mt-2 ml-5 text-center"><strong>Location</strong></p>
                                <!-- <h5 class="mb-0 text-center"><?php echo $location ?></h5> -->
                                <h5 class="mb-0 ml-5 text-center">KRIPIK</h5>
                            </div>
                            <div class="col-md-4 col-12 text-center">
                                <div class="dash-circle rounded-circle">
                                    <i class="fa fa-calendar text-warning"></i>
                                </div>
                                <p class="mt-2 ml-5"><strong>Date</strong></p>
                                <h5 class="mb-0 ml-5"><?php echo $tanggalkripik ?></h5>
                            </div>
                            <div class="col-md-4 col-12 mb-1 text-right">
                                <div class="dash-circle rounded-circle text-success">
                                    <i class="fa fa-clock-o"></i>
                                </div>
                                <p class="mt-2 ml-5 text-center"><strong>Time</strong></p>
                                <h5 class="mb-0  ml-5 text-center"><?php echo $waktukripik ?></h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="card pull-up">
                    <h2 class="card-title btn-gradient-primary text-white">CURAH HUJAN</h2>
                    <p class="card-category"></p>
                    <div class="card-body">
                        <p class="txt-center" id="last_update4" data-tgl_last_update="<?php echo $datekripik1 ?>"> Last update: <?php echo $dategarang1 ?> | <?php echo $timegarang1 ?></p>
                        <div class="row animated bounce" align="center" style="margin-top:50px; margin-bottom:80px">
                            <div class="col-sm-12" id="rain_spinkripik">
                                <div class="GaugeMeter" id="rainkripik" data-percent="" data-used="" data-total="" data-label="Curah Hujan" data-text="" data-text_size="0.125" data-append="" data-size="290" data-width="30" data-style="Arch" data-theme="LightBlue-DarkBlue" data-animate_gauge_colors="true" data-animate_text_colors="true" style="height:280px" data-stripe="7"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card pull-up">
                    <h2 class="card-title btn-gradient-primary text-white">SED SIM</h2>
                    <p class="card-category"></p>
                    <div class="card-body">
                        <p class="txt-center" id="last_update5" data-tgl_last_update="<?php echo $dategarang2 ?>"> Last update: <?php echo $dategarang2 ?> | <?php echo $timegarang2 ?></p>
                        <div class="row animated bounce" align="center" style="margin-top:50px; margin-bottom:80px">
                            <div class="col-sm-12" id="sed_spinkripik">
                                <div class="GaugeMeter" id="sedkripik" data-percent="" data-used="" data-total="" data-label="Sed Sim" data-text="" data-text_size="0.125" data-append="" data-size="290" data-width="26" data-style="Arch" data-theme="Green-Gold-Red" data-animate_gauge_colors="true" data-animate_text_colors="true" style="height:285px" data-stripe="7"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card pull-up">
                    <h2 class="card-title btn-gradient-primary text-white">BANJIR</h2>
                    <p class="card-category"></p>
                    <div class="card-body">
                        <p class="txt-center" id="last_update6" data-tgl_last_update="<?php echo $datekripik3 ?>"> Last update: <?php echo $dategarang3 ?> | <?php echo $timegarang3 ?></p>
                        <div class="row animated bounce" align="center" style="margin-top:50px; margin-bottom:80px">
                            <div class="col-sm-12" id="deb_spinkripik">
                                <div class="GaugeMeter" id="debkripik" data-percent="" data-used="" data-total="" data-label="Deb Banjir" data-text="" data-text_size="0.125" data-append="" data-size="290" data-width="26" data-style="Arch" data-theme="Green-Gold-Red" data-animate_gauge_colors="true" data-animate_text_colors="true" style="height:285px" data-stripe="7"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card pull-up">
                    <h2 class="card-title btn-gradient-primary text-white">GRAFIK CURAH HUJAN</h2>
                    <div class="card-body">
                        <div class="row animated bounce" align="center" style="margin-top:40px;">
                            <div class="col-sm-12" id="rain_spinkripik">
                                <div id="rain_iconkripik" align="left" style="margin-top:-30px;margin-bottom:15px">
                                    <i class="far fa-calendar-alt fa-lg jdw"></i> &nbsp;</button>
                                </div>
                                <form id="timeFilterFormKripik" style="margin-top:-30px">
                                    <select id="timeFilterKripik" name="timeFilterKripik">
                                        <option value="">Pilih Hari</option>
                                        <?php
                                    
                                        // Query untuk mengambil nilai unik dari kolom 'tanggal_server' dan mengurutkannya berdasarkan 'id' secara menurun
                                        $sql = mysqli_query($link, "SELECT DISTINCT tanggal_server FROM curah_hujan WHERE lokasi='Kripik' ORDER BY id DESC");
                                    
                                        // Periksa hasil query
                                        if ($sql->num_rows > 0) {
                                            while ($row = mysqli_fetch_assoc($sql)) {
                                                // Tambahkan option dengan nilai dari database 'tanggal_server'
                                                echo '<option value="' . $row['tanggal_server'] . '">' . $row['tanggal_server'] . '</option>';
                                            }
                                        } else {
                                            echo "Tidak ada hasil yang ditemukan";
                                        }
                                        ?>
                                    </select>
                                    <select name="jamFillKripik" id="jamFillKripik">
                                        <option value="">Pilih Waktu</option>
                                        
                                        <?php
                                        $jam = [
                                            "00:00" => "0",
                                            "01:00" => "1",
                                            "02:00" => "2",
                                            "03:00" => "3",
                                            "04:00" => "4",
                                            "05:00" => "5",
                                            "06:00" => "6",
                                            "07:00" => "7",
                                            "08:00" => "8",
                                            "09:00" => "9",
                                            "10:00" => "10",
                                            "11:00" => "11",
                                            "12:00" => "12",
                                            "13:00" => "13",
                                            "14:00" => "14",
                                            "15:00" => "15",
                                            "16:00" => "16",
                                            "17:00" => "17",
                                            "18:00" => "18",
                                            "19:00" => "19",
                                            "20:00" => "20",
                                            "21:00" => "21",
                                            "22:00" => "22",
                                            "23:00" => "23",
                                            "24:00" => "24",
                                        ];
                                    
                                        foreach ($jam as $label => $value) {
                                            echo '<option value="' . $value . '">' . $label . '</option>';
                                        }
                                        ?>
                                    </select>
                                    <select name="menitFillKripik" id="menitFillKripik">
                                        <option value="">Pilih Menit</option>
                                        
                                        <?php
                                        $jam = [
                                            "0 - 5" => "0-5",
                                            "6 - 10" => "6-10",
                                            "11 - 15" => "11-15",
                                            "16 - 20" => "16-20",
                                            "21 - 25" => "21-25",
                                            "26 - 30" => "26-30",
                                            "31 - 35" => "31-35",
                                            "36 - 40" => "36-40",
                                            "41 - 45" => "41-45",
                                            "46 - 50" => "46-50",
                                            "51 - 55" => "51-55",
                                            "56 - 60" => "56-60",
                                        ];
                                    
                                        foreach ($jam as $label => $value) {
                                            echo '<option value="' . $value . '">' . $label . '</option>';
                                        }
                                        ?>
                                    </select>
                                    <button type="submit"  class="btn btn-primary">Filter</button>
                                </form>
                                <div id="rainnkripik" data-tgl1="" data-tgl2="" data-waktu=""></div>
                                <div id="rainkripik_chart"></div>
                                <div id="rainkripik_real"></div>
                                <div id="rainkripik_button">
                                    <button type="button" class="btn btn-outline-dark btn-sm">Close</button>
                                    <button type="submit" class="btn btn-dark btn-sm" id="rainkripik_export">Export to .xls</button>
                                </div>
                                <form id="rainkripik_form">
                                    <input type="hidden" name="tipe" value="rainkripik">
                                    <div class="form-group col-7">
                                        <label for="tgl_awal"><small>Start from:</small></label><br>
                                        <input type="date" class="form-control form-control-sm" name="tgl_awal" required>
                                    </div>
                                    <div class="form-group col-7">
                                        <label for "tgl_akhir"><small>End:</small></label><br>
                                        <input type="date" class="form-control form-control-sm" name="tgl_akhir" required>
                                    </div>
                                    <button type="button" class="btn btn-dark btn-sm tutup">Close</button>
                                    <button type="submit" class="btn btn-dark btn-sm">Send</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card pull-up">
                    <h2 class="card-title btn-gradient-primary text-white">GRAFIK SED SIM</h2>
                    <div class="card-body">
                        <div class="row animated bounce" align="center" style="margin-top:40px;">
                            <div class="col-sm-12" id="sed_spinkripik">
                                <div id="sed_iconkripik" align="left" style="margin-top:-30px;margin-bottom:20px">
                                    <i class="far fa-calendar-alt fa-lg jdw"></i> &nbsp;</button>
                                </div>
                                <form id="timeFilterFormSedKripik" style="margin-top:-30px">
                                    <select id="timeFilterSedKripik" name="timeFilterSedKripik">
                                        <option value="">Pilih Hari</option>
                                        <?php
                                    
                                        // Query untuk mengambil nilai unik dari kolom 'tanggal_server' dan mengurutkannya berdasarkan 'id' secara menurun
                                        $sql = mysqli_query($link, "SELECT DISTINCT tanggal_server FROM curah_hujan WHERE lokasi='Kripik' ORDER BY id DESC");
                                    
                                        // Periksa hasil query
                                        if ($sql->num_rows > 0) {
                                            while ($row = mysqli_fetch_assoc($sql)) {
                                                // Tambahkan option dengan nilai dari database 'tanggal_server'
                                                echo '<option value="' . $row['tanggal_server'] . '">' . $row['tanggal_server'] . '</option>';
                                            }
                                        } else {
                                            echo "Tidak ada hasil yang ditemukan";
                                        }
                                        ?>
                                    </select>
                                    <select name="jamFillSedKripik" id="jamFillSedKripik">
                                        <option value="">Pilih Waktu</option>
                                        
                                        <?php
                                        $jam = [
                                            "00:00" => "0",
                                            "01:00" => "1",
                                            "02:00" => "2",
                                            "03:00" => "3",
                                            "04:00" => "4",
                                            "05:00" => "5",
                                            "06:00" => "6",
                                            "07:00" => "7",
                                            "08:00" => "8",
                                            "09:00" => "9",
                                            "10:00" => "10",
                                            "11:00" => "11",
                                            "12:00" => "12",
                                            "13:00" => "13",
                                            "14:00" => "14",
                                            "15:00" => "15",
                                            "16:00" => "16",
                                            "17:00" => "17",
                                            "18:00" => "18",
                                            "19:00" => "19",
                                            "20:00" => "20",
                                            "21:00" => "21",
                                            "22:00" => "22",
                                            "23:00" => "23",
                                            "24:00" => "24",
                                        ];
                                    
                                        foreach ($jam as $label => $value) {
                                            echo '<option value="' . $value . '">' . $label . '</option>';
                                        }
                                        ?>
                                    </select>
                                    <select name="menitFillSedKripik" id="menitFillSedKripik">
                                        <option value="">Pilih Menit</option>
                                        
                                        <?php
                                        $jam = [
                                            "0 - 5" => "0-5",
                                            "6 - 10" => "6-10",
                                            "11 - 15" => "11-15",
                                            "16 - 20" => "16-20",
                                            "21 - 25" => "21-25",
                                            "26 - 30" => "26-30",
                                            "31 - 35" => "31-35",
                                            "36 - 40" => "36-40",
                                            "41 - 45" => "41-45",
                                            "46 - 50" => "46-50",
                                            "51 - 55" => "51-55",
                                            "56 - 60" => "56-60",
                                        ];
                                    
                                        foreach ($jam as $label => $value) {
                                            echo '<option value="' . $value . '">' . $label . '</option>';
                                        }
                                        ?>
                                    </select>
                                    <button type="submit" class="btn btn-primary">Filter</button>
                                </form>
                                <div id="seddkripik" data-tgl1="" data-tgl2="" data-waktu=""></div>
                                <div id="sedkripik_chart"></div>
                                <div id="sedkripik_real"></div>
                                <div id="sedkripik_button">
                                    <button type="button" class="btn btn-outline-dark btn-sm">Close</button>
                                    <button type="submit" class="btn btn-dark btn-sm" id="sedkripik_export">Export to .xls</button>
                                </div>
                                <form id="sedkripik_form">
                                    <input type="hidden" name="tipe" value="sedkripik">
                                    <div class="form-group col-7">
                                        <label for="tgl_awal"><small>Start from:</small></label><br>
                                        <input type="date" class="form-control form-control-sm" name="tgl_awal" required>
                                    </div>
                                    <div class="form-group col-7">
                                        <label for="tgl_akhir"><small>End:</small></label><br>
                                        <input type="date" class="form-control form-control-sm" name="tgl_akhir" required>
                                    </div>
                                    <button type="button" class="btn btn-dark btn-sm tutup">Close</button>
                                    <button type="submit" class="btn btn-dark btn-sm">Send</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card pull-up">
                    <h2 class="card-title btn-gradient-primary text-white">GRAFIK BANJIR</h2>
                    <div class="card-body">
                        <div class="row animated bounce" align="center" style="margin-top:40px;">
                            <div class="col-sm-12" id="deb_spinkripik">
                                <div id="deb_iconkripik" align="left" style="margin-top:-30px;margin-bottom:20px">
                                    <i class="far fa-calendar-alt fa-lg jdw"></i> &nbsp;</button>
                                </div>
                                <form id="timeFilterFormDebKripik" style="margin-top:-30px">
                                    <select id="timeFilterDebKripik" name="timeFilterDebKripik">
                                        <option value="">Pilih Hari</option>
                                        <?php
                                    
                                        // Query untuk mengambil nilai unik dari kolom 'tanggal_server' dan mengurutkannya berdasarkan 'id' secara menurun
                                        $sql = mysqli_query($link, "SELECT DISTINCT tanggal_server FROM curah_hujan WHERE lokasi='Kripik' ORDER BY id DESC");
                                    
                                        // Periksa hasil query
                                        if ($sql->num_rows > 0) {
                                            while ($row = mysqli_fetch_assoc($sql)) {
                                                // Tambahkan option dengan nilai dari database 'tanggal_server'
                                                echo '<option value="' . $row['tanggal_server'] . '">' . $row['tanggal_server'] . '</option>';
                                            }
                                        } else {
                                            echo "Tidak ada hasil yang ditemukan";
                                        }
                                        ?>
                                    </select>
                                    <select name="jamFillDebKripik" id="jamFillDebKripik">
                                        <option value="">Pilih Waktu</option>
                                        
                                        <?php
                                        $jam = [
                                            "00:00" => "0",
                                            "01:00" => "1",
                                            "02:00" => "2",
                                            "03:00" => "3",
                                            "04:00" => "4",
                                            "05:00" => "5",
                                            "06:00" => "6",
                                            "07:00" => "7",
                                            "08:00" => "8",
                                            "09:00" => "9",
                                            "10:00" => "10",
                                            "11:00" => "11",
                                            "12:00" => "12",
                                            "13:00" => "13",
                                            "14:00" => "14",
                                            "15:00" => "15",
                                            "16:00" => "16",
                                            "17:00" => "17",
                                            "18:00" => "18",
                                            "19:00" => "19",
                                            "20:00" => "20",
                                            "21:00" => "21",
                                            "22:00" => "22",
                                            "23:00" => "23",
                                            "24:00" => "24",
                                        ];
                                    
                                        foreach ($jam as $label => $value) {
                                            echo '<option value="' . $value . '">' . $label . '</option>';
                                        }
                                        ?>
                                    </select>
                                    <select name="menitFillDebKripik" id="menitFillDebKripik">
                                        <option value="">Pilih Menit</option>
                                        
                                        <?php
                                        $jam = [
                                            "0 - 5" => "0-5",
                                            "6 - 10" => "6-10",
                                            "11 - 15" => "11-15",
                                            "16 - 20" => "16-20",
                                            "21 - 25" => "21-25",
                                            "26 - 30" => "26-30",
                                            "31 - 35" => "31-35",
                                            "36 - 40" => "36-40",
                                            "41 - 45" => "41-45",
                                            "46 - 50" => "46-50",
                                            "51 - 55" => "51-55",
                                            "56 - 60" => "56-60",
                                        ];
                                    
                                        foreach ($jam as $label => $value) {
                                            echo '<option value="' . $value . '">' . $label . '</option>';
                                        }
                                        ?>
                                    </select>
                                    <button type="submit" class="btn btn-primary">Filter</button>
                                </form>
                                <div id="debbkripik" data-tgl1="" data-tgl2="" data-waktu=""></div>
                                <div id="debkripik_chart"></div>
                                <div id="debkripik_real"></div>
                                <div id="debkripik_button">
                                    <button type="button" class="btn btn-outline-dark btn-sm">Close</button>
                                    <button type="submit" class="btn btn-dark btn-sm" id="debkripik_export">Export to .xls</button>
                                </div>
                                <form id="debkripik_form">
                                    <input type="hidden" name="tipe" value="debkripik">
                                    <div class="form-group col-7">
                                        <label for="tgl_awal"><small>Start from:</small></label><br>
                                        <input type="date" class="form-control form-control-sm" name="tgl_awal" required>
                                    </div>
                                    <div class="form-group col-7">
                                        <label for="tgl_akhir"><small>End:</small></label><br>
                                        <input type="date" class="form-control form-control-sm" name="tgl_akhir" required>
                                    </div>
                                    <button type="button" class="btn btn-dark btn-sm tutup">Close</button>
                                    <button type="submit" class="btn btn-dark btn-sm">Send</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
        <div class="col-12 ">
            <div class="card pull-up" ">
                <div class="card-content collapse show ml-5 ">
                    <div class="card-body ">
                    <div class="row justify-content-center mt-3">
                            <div class="col-md-4 col-12 text-center ">
                                <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#imageAccordionContent" aria-expanded="true" aria-controls="imageAccordionContent">
                                    <h4><i class="fa fa-camera" style="color: #43dc18;"></i> Tampilkan Gambar</h4>
                                </button>
                            </div>
                        
                           <div class="accordion" id="imageAccordion">
                                <div class="card">
                                    
                                    <div id="imageAccordionContent" class="collapse" aria-labelledby="imageAccordionHeader" data-parent="#imageAccordion">
                                        <div class="card-body">
                                            <img id="kripikKamera" class="img-stream" alt="Photo"  style="transform: rotate(90deg); max-width: 100%;">
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
    </div>

<div id="DASHSEMARANGContent" class="content" style="display: none">
    <div class="btn-group d-flex align-items-center justify-content-center mb-3" role="group" aria-label="Basic example">
<button data-role="DASHKREO" class="btn btn-gradient-primary btnNav active" onclick="switchToContent('DASHKREO')">Kreo</button>
    <button data-role="JATIBARANG" class="btn btn-gradient-primary btnNav" onclick="switchToContent('JATIBARANG')">Kripik</button>
    <button data-role="DASHSEMARANG" class="btn btn-gradient-primary btnNav" onclick="switchToContent('DASHSEMARANG')">Garang</button>
</div>
    <div class="row">
        <div class="col-12">
            <div class="card pull-up">
                <div class="card-content collapse show ml-5">
                    <div class="card-body">
                        <div class="row justify-content-center">
                            <div class="col-md-4 col-12 text-left">
                                <div class="dash-circle rounded-circle">
                                    <i class="fa fa-map-marker text-danger"></i>
                                </div>
                                <p class="mt-2 ml-5 text-center"><strong>Location</strong></p>
                                <!-- <h5 class="mb-0 text-center"><?php echo $location ?></h5> -->
                                <h5 class="mb-0 ml-5 text-center">GARANG</h5>
                            </div>
                            <div class="col-md-4 col-12 text-center">
                                <div class="dash-circle rounded-circle">
                                    <i class="fa fa-calendar text-warning"></i>
                                </div>
                                <p class="mt-2 ml-5"><strong>Date</strong></p>
                                <h5 class="mb-0 ml-5"><?php echo $tanggalgarang ?></h5>
                            </div>
                            <div class="col-md-4 col-12 mb-1 text-right">
                                <div class="dash-circle rounded-circle text-success">
                                    <i class="fa fa-clock-o"></i>
                                </div>
                                <p class="mt-2 ml-5 text-center"><strong>Time</strong></p>
                                <h5 class="mb-0 ml-5 text-center"><?php echo $waktugarang ?></h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="card pull-up">
                    <h2 class="card-title btn-gradient-primary text-white">CURAH HUJAN</h2>
                    <p class="card-category"></p>
                    <div class="card-body">
                        <p class="txt-center" id="last_update7" data-tgl_last_update="<?php echo $datekripik1 ?>"> Last update: <?php echo $datekripik1 ?> | <?php echo $timekripik1 ?></p>
                        <div class="row animated bounce" align="center" style="margin-top:50px; margin-bottom:80px">
                            <div class="col-sm-12" id="rain_spingarang">
                                <div class="GaugeMeter" id="raingarang" data-percent="" data-used="" data-total="" data-label="Curah Hujan" data-text="" data-text_size="0.125" data-append="" data-size="290" data-width="30" data-style="Arch" data-theme="LightBlue-DarkBlue" data-animate_gauge_colors="true" data-animate_text_colors="true" style="height:280px" data-stripe="7"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card pull-up">
                    <h2 class="card-title btn-gradient-primary text-white">SED SIM</h2>
                    <p class="card-category"></p>
                    <div class="card-body">
                        <p class="txt-center" id="last_update8" data-tgl_last_update="<?php echo $datekripik2 ?>"> Last update: <?php echo $datekripik2 ?> | <?php echo $timekripik2 ?></p>
                        <div class="row animated bounce" align="center" style="margin-top:50px; margin-bottom:80px">
                            <div class="col-sm-12" id="sed_spingarang">
                                <div class="GaugeMeter" id="sedgarang" data-percent="" data-used="" data-total="" data-label="Sed Sim" data-text="" data-text_size="0.125" data-append="" data-size="290" data-width="26" data-style="Arch" data-theme="Green-Gold-Red" data-animate_gauge_colors="true" data-animate_text_colors="true" style="height:285px" data-stripe="7"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card pull-up">
                    <h2 class="card-title btn-gradient-primary text-white">BANJIR</h2>
                    <p class="card-category"></p>
                    <div class="card-body">
                        <p class="txt-center" id="last_update9" data-tgl_last_update="<?php echo $datekripik3 ?>"> Last update: <?php echo $datekripik3 ?> | <?php echo $timekripik3 ?></p>
                        <div class="row animated bounce" align="center" style="margin-top:50px; margin-bottom:80px">
                            <div class="col-sm-12" id="deb_spingarang">
                                <div class="GaugeMeter" id="debgarang" data-percent="" data-used="" data-total="" data-label="Deb Banjir" data-text="" data-text_size="0.125" data-append="" data-size="290" data-width="26" data-style="Arch" data-theme="Green-Gold-Red" data-animate_gauge_colors="true" data-animate_text_colors="true" style="height:285px" data-stripe="7"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card pull-up">
                    <h2 class="card-title btn-gradient-primary text-white">GRAFIK CURAH HUJAN</h2>
                    <div class="card-body">
                        <div class="row animated bounce" align="center" style="margin-top:40px;">
                            <div class="col-sm-12" id="rain_spingarang">
                                <div id="rain_icongarang" align="left" style="margin-top:-30px;margin-bottom:15px">
                                    <i class="far fa-calendar-alt fa-lg jdw"></i> &nbsp;</button>
                                    <!-- <i class="far fa-chart-bar fa-lg"></i></button> -->
                                </div>
                                <form id="timeFilterFormGarang" style="margin-top:-30px">
                                    <select id="timeFilterGarang" name="timeFilterGarang">
                                        <option value="">Pilih Hari</option>
                                    
                                        <?php
                                    
                                        // Query untuk mengambil nilai unik dari kolom 'tanggal_server' dan mengurutkannya berdasarkan 'id' secara menurun
                                        $sql = mysqli_query($link, "SELECT DISTINCT tanggal_server FROM curah_hujan WHERE lokasi='Garang' ORDER BY id DESC");
                                    
                                        // Periksa hasil query
                                        if ($sql->num_rows > 0) {
                                            while ($row = mysqli_fetch_assoc($sql)) {
                                                // Tambahkan option dengan nilai dari database 'tanggal_server'
                                                echo '<option value="' . $row['tanggal_server'] . '">' . $row['tanggal_server'] . '</option>';
                                            }
                                        } else {
                                            echo "Tidak ada hasil yang ditemukan";
                                        }
                                        ?>
                                    </select>
                                    <select name="jamFillGarang" id="jamFillGarang">
                                        <option value="">Pilih Waktu</option>
                                        
                                        <?php
                                        $jam = [
                                            "00:00" => "0",
                                            "01:00" => "1",
                                            "02:00" => "2",
                                            "03:00" => "3",
                                            "04:00" => "4",
                                            "05:00" => "5",
                                            "06:00" => "6",
                                            "07:00" => "7",
                                            "08:00" => "8",
                                            "09:00" => "9",
                                            "10:00" => "10",
                                            "11:00" => "11",
                                            "12:00" => "12",
                                            "13:00" => "13",
                                            "14:00" => "14",
                                            "15:00" => "15",
                                            "16:00" => "16",
                                            "17:00" => "17",
                                            "18:00" => "18",
                                            "19:00" => "19",
                                            "20:00" => "20",
                                            "21:00" => "21",
                                            "22:00" => "22",
                                            "23:00" => "23",
                                            "24:00" => "24",
                                        ];
                                    
                                        foreach ($jam as $label => $value) {
                                            echo '<option value="' . $value . '">' . $label . '</option>';
                                        }
                                        ?>
                                    </select>
                                    <select name="menitFillGarang" id="menitFillGarang">
                                        <option value="">Pilih Menit</option>
                                        
                                        <?php
                                        $jam = [
                                            "0 - 5" => "0-5",
                                            "6 - 10" => "6-10",
                                            "11 - 15" => "11-15",
                                            "16 - 20" => "16-20",
                                            "21 - 25" => "21-25",
                                            "26 - 30" => "26-30",
                                            "31 - 35" => "31-35",
                                            "36 - 40" => "36-40",
                                            "41 - 45" => "41-45",
                                            "46 - 50" => "46-50",
                                            "51 - 55" => "51-55",
                                            "56 - 60" => "56-60",
                                        ];
                                    
                                        foreach ($jam as $label => $value) {
                                            echo '<option value="' . $value . '">' . $label . '</option>';
                                        }
                                        ?>
                                    </select>
                                    <button type="submit"  class="btn btn-primary">Filter</button>
                                </form>
                                <div id="rainngarang" data-tgl1="" data-tgl2="" data-waktu=""></div>
                                <div id="raingarang_chart"></div>
                                <div id="raingarang_real"></div>
                                <div id="raingarang_button">
                                    <button type="button" class="btn btn-outline-dark btn-sm">Close</button>
                                    <button type="submit" class="btn btn-dark btn-sm" id="raingarang_export">Export to .xls</button>
                                </div>
                                <form id="raingarang_form">
                                    <input type="hidden" name="tipe" value="raingarang">
                                    <div class="form-group col-7">
                                        <label for="tgl_awal"><small>Start from:</small></label><br>
                                        <input type="date" class="form-control form-control-sm" name="tgl_awal" required>
                                    </div>
                                    <div class="form-group col-7">
                                        <label for="tgl_akhir"><small>End:</small></label><br>
                                        <input type="date" class="form-control form-control-sm" name="tgl_akhir" required>
                                    </div>
                                    <button type="button" class="btn btn-dark btn-sm tutup">Close</button>
                                    <button type="submit" class="btn btn-dark btn-sm">Send</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card pull-up">
                    <h2 class="card-title btn-gradient-primary text-white">GRAFIK SED SIM</h2>
                    <div class="card-body">
                        <div class="row animated bounce" align="center" style="margin-top:40px;">
                            <div class="col-sm-12" id="sed_spingarang">
                                <div id="sed_icongarang" align="left" style="margin-top:-30px;margin-bottom:20px">
                                    <i class="far fa-calendar-alt fa-lg jdw"></i> &nbsp;</button>
                                    <!-- <i class="far fa-chart-bar fa-lg"></i></button> -->
                                </div>
                                <form id="timeFilterFormSedGarang" style="margin-top:-30px">
                                    <select id="timeFilterSedGarang" name="timeFilterSedGarang">
                                        <option value="">Pilih Hari</option>
                                    
                                        <?php
                                    
                                        // Query untuk mengambil nilai unik dari kolom 'tanggal_server' dan mengurutkannya berdasarkan 'id' secara menurun
                                        $sql = mysqli_query($link, "SELECT DISTINCT tanggal_server FROM curah_hujan WHERE lokasi='Garang' ORDER BY id DESC");
                                    
                                        // Periksa hasil query
                                        if ($sql->num_rows > 0) {
                                            while ($row = mysqli_fetch_assoc($sql)) {
                                                // Tambahkan option dengan nilai dari database 'tanggal_server'
                                                echo '<option value="' . $row['tanggal_server'] . '">' . $row['tanggal_server'] . '</option>';
                                            }
                                        } else {
                                            echo "Tidak ada hasil yang ditemukan";
                                        }
                                        ?>
                                    </select>
                                    <select name="jamFillSedGarang" id="jamFillSedGarang">
                                        <option value="">Pilih Waktu</option>
                                        
                                        <?php
                                        $jam = [
                                            "00:00" => "0",
                                            "01:00" => "1",
                                            "02:00" => "2",
                                            "03:00" => "3",
                                            "04:00" => "4",
                                            "05:00" => "5",
                                            "06:00" => "6",
                                            "07:00" => "7",
                                            "08:00" => "8",
                                            "09:00" => "9",
                                            "10:00" => "10",
                                            "11:00" => "11",
                                            "12:00" => "12",
                                            "13:00" => "13",
                                            "14:00" => "14",
                                            "15:00" => "15",
                                            "16:00" => "16",
                                            "17:00" => "17",
                                            "18:00" => "18",
                                            "19:00" => "19",
                                            "20:00" => "20",
                                            "21:00" => "21",
                                            "22:00" => "22",
                                            "23:00" => "23",
                                            "24:00" => "24",
                                        ];
                                    
                                        foreach ($jam as $label => $value) {
                                            echo '<option value="' . $value . '">' . $label . '</option>';
                                        }
                                        ?>
                                    </select>
                                    <select name="menitFillSedKripik" id="menitFillSedKripik">
                                        <option value="">Pilih Menit</option>
                                        
                                        <?php
                                        $jam = [
                                            "0 - 5" => "0-5",
                                            "6 - 10" => "6-10",
                                            "11 - 15" => "11-15",
                                            "16 - 20" => "16-20",
                                            "21 - 25" => "21-25",
                                            "26 - 30" => "26-30",
                                            "31 - 35" => "31-35",
                                            "36 - 40" => "36-40",
                                            "41 - 45" => "41-45",
                                            "46 - 50" => "46-50",
                                            "51 - 55" => "51-55",
                                            "56 - 60" => "56-60",
                                        ];
                                    
                                        foreach ($jam as $label => $value) {
                                            echo '<option value="' . $value . '">' . $label . '</option>';
                                        }
                                        ?>
                                    </select>
                                    <button type="submit"  class="btn btn-primary">Filter</button>
                                </form>
                                <div id="seddgarang" data-tgl1="" data-tgl2="" data-waktu=""></div>
                                <div id="sedgarang_chart"></div>
                                <div id="sed_realgarang"></div>
                                <div id="sedgarang_button">
                                    <button type="button" class="btn btn-outline-dark btn-sm">Close</button>
                                    <button type="submit" class="btn btn-dark btn-sm" id="sedgarang_export">Export to .xls</button>
                                </div>
                                <form id="sedgarang_form">
                                    <input type="hidden" name="tipe" value="sedgarang">
                                    <div class="form-group col-7">
                                        <label for="tgl_awal"><small>Start from:</small></label><br>
                                        <input type="date" class="form-control form-control-sm" name="tgl_awal" required>
                                    </div>
                                    <div class="form-group col-7">
                                        <label for="tgl_akhir"><small>End:</small></label><br>
                                        <input type="date" class="form-control form-control-sm" name="tgl_akhir" required>
                                    </div>
                                    <button type="button" class="btn btn-dark btn-sm tutup">Close</button>
                                    <button type="submit" class="btn btn-dark btn-sm">Send</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card pull-up">
                    <h2 class="card-title btn-gradient-primary text-white">GRAFIK BANJIR</h2>
                    <div class="card-body">
                        <div class="row animated bounce" align="center" style="margin-top:40px;">
                            <div class="col-sm-12" id="deb_spingarang">
                                <div id="deb_icongarang" align="left" style="margin-top:-30px;margin-bottom:20px">
                                    <i class="far fa-calendar-alt fa-lg jdw"></i> &nbsp;</button>
                                    <!-- <i class="far fa-chart-bar fa-lg"></i></button> -->
                                </div>
                                <form id="timeFilterFormDebGarang" style="margin-top:-30px">
                                    <select id="timeFilterDebGarang" name="timeFilterDebGarang">
                                        <option value="">Pilih Hari</option>
                                    
                                        <?php
                                    
                                        // Query untuk mengambil nilai unik dari kolom 'tanggal_server' dan mengurutkannya berdasarkan 'id' secara menurun
                                        $sql = mysqli_query($link, "SELECT DISTINCT tanggal_server FROM curah_hujan WHERE lokasi='Garang' ORDER BY id DESC");
                                    
                                        // Periksa hasil query
                                        if ($sql->num_rows > 0) {
                                            while ($row = mysqli_fetch_assoc($sql)) {
                                                // Tambahkan option dengan nilai dari database 'tanggal_server'
                                                echo '<option value="' . $row['tanggal_server'] . '">' . $row['tanggal_server'] . '</option>';
                                            }
                                        } else {
                                            echo "Tidak ada hasil yang ditemukan";
                                        }
                                        ?>
                                    </select>

                                    <select name="jamFillDebGarang" id="jamFillDebGarang">
                                        <option value="">Pilih Waktu</option>
                                        
                                        <?php
                                        $jam = [
                                            "00:00" => "0",
                                            "01:00" => "1",
                                            "02:00" => "2",
                                            "03:00" => "3",
                                            "04:00" => "4",
                                            "05:00" => "5",
                                            "06:00" => "6",
                                            "07:00" => "7",
                                            "08:00" => "8",
                                            "09:00" => "9",
                                            "10:00" => "10",
                                            "11:00" => "11",
                                            "12:00" => "12",
                                            "13:00" => "13",
                                            "14:00" => "14",
                                            "15:00" => "15",
                                            "16:00" => "16",
                                            "17:00" => "17",
                                            "18:00" => "18",
                                            "19:00" => "19",
                                            "20:00" => "20",
                                            "21:00" => "21",
                                            "22:00" => "22",
                                            "23:00" => "23",
                                            "24:00" => "24",
                                        ];
                                    
                                        foreach ($jam as $label => $value) {
                                            echo '<option value="' . $value . '">' . $label . '</option>';
                                        }
                                        ?>
                                    </select>
                                    <select name="menitFillDebKripik" id="menitFillDebKripik">
                                        <option value="">Pilih Menit</option>
                                        
                                        <?php
                                        $jam = [
                                            "0 - 5" => "0-5",
                                            "6 - 10" => "6-10",
                                            "11 - 15" => "11-15",
                                            "16 - 20" => "16-20",
                                            "21 - 25" => "21-25",
                                            "26 - 30" => "26-30",
                                            "31 - 35" => "31-35",
                                            "36 - 40" => "36-40",
                                            "41 - 45" => "41-45",
                                            "46 - 50" => "46-50",
                                            "51 - 55" => "51-55",
                                            "56 - 60" => "56-60",
                                        ];
                                    
                                        foreach ($jam as $label => $value) {
                                            echo '<option value="' . $value . '">' . $label . '</option>';
                                        }
                                        ?>
                                    </select>
                                    <button type="submit"  class="btn btn-primary">Filter</button>
                                </form>
                                <div id="debbgarang" data-tgl1="" data-tgl2="" data-waktu=""></div>
                                <div id="debgarang_chart"></div>
                                <div id="debgarang_real"></div>
                                <div id="debgarang_button">
                                    <button type="button" class="btn btn-outline-dark btn-sm">Close</button>
                                    <button type="submit" class="btn btn-dark btn-sm" id="debgarang_export">Export to .xls</button>
                                </div>
                                <form id="debgarang_form">
                                    <input type="hidden" name="tipe" value="debgarang">
                                    <div class="form-group col-7">
                                        <label for="tgl_awal"><small>Start from:</small></label><br>
                                        <input type="date" class="form-control form-control-sm" name="tgl_awal" required>
                                    </div>
                                    <div class="form-group col-7">
                                        <label for="tgl_akhir"><small>End:</small></label><br>
                                        <input type="date" class="form-control form-control-sm" name="tgl_akhir" required>
                                    </div>
                                    <button type="button" class="btn btn-dark btn-sm tutup">Close</button>
                                    <button type="submit" class="btn btn-dark btn-sm">Send</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <div class="row">
        <div class="col-12 ">
            <div class="card pull-up" ">
                <div class="card-content collapse show ml-5 ">
                    <div class="card-body ">
                        <div class="row justify-content-center mt-3">
                            <div class="col-md-4 col-12 text-center " style="max-width: 100%;">
                                <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#imageAccordionContent" aria-expanded="true" aria-controls="imageAccordionContent">
                                    <h4><i class="fa fa-camera" style="color: #43dc18;"></i> Tampilkan Gambar</h4>
                                </button>
                            </div>
                        
                           <div class="accordion" id="imageAccordion">
                                <div class="card">
                                    
                                    <div id="imageAccordionContent" class="collapse" aria-labelledby="imageAccordionHeader" data-parent="#imageAccordion">
                                        <div class="card-body">
                                            <img id="garangKamera" class="img-stream" alt="Photo"  style="transform: rotate(90deg); max-width: 100%;">
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
</div>

<script>
    function switchToContent(contentId) {
        const links = document.querySelectorAll('.btnNav');
        links.forEach((btn) => {
            btn.classList.remove('active');
            btn.style.backgroundColor = ''; // Menghapus warna latar belakang dari semua tombol
        });

        const button = document.querySelector(`[data-role="${contentId}"]`);
        button.classList.add('active');
        button.style.backgroundColor = 'green'; // Menambahkan warna hijau pada tombol yang aktif

        const contentDivs = document.querySelectorAll('.content');
        contentDivs.forEach((div) => {
            div.style.display = 'none';
        });

        const contentDiv = document.getElementById(contentId + 'Content');
        contentDiv.style.display = 'block';
    }

    switchToContent('DASHKREO');
</script>




               
    


    <!--<script src="../node_modules/jquery.AshAlom.gaugeMeter-2.0.0.min.js"></script>-->
    <script language="javascript">
        function grafik(tipe, tgl1, tgl2, sn, waktu) {

            nama_hari = tgl_ke_hari(tgl1); //cari hari bdsrkan tgl

            if (tgl2 == '' || tgl1 == tgl2) tanggal = nama_hari + ', ' + tgl_DMY(tgl1);
            else {

                tanggal = tgl_text(tgl1) + " to " + tgl_text(tgl2);
            }

            //console.log("cek grafik(): "+tgl1+'|'+nama_hari);

            if (tipe == 'sed') {
                render_to = 'sed_chart';
                title_text = 'SED SIM';
                sat = 'ton';
                yAxis_text = 'Sed Sim';
                json_path = "../inc/olah.php?j=sed_sim&t=sed_sim" + "&tgl1=" + tgl1 + "&tgl2=" + tgl2;
            } else if (tipe == 'rain') {
                render_to = 'rain_chart';
                title_text = 'CURAH HUJAN';
                sat = 'mm';
                yAxis_text = 'Curah Hujan (mm)';
                json_path = "../inc/olah.php?j=rain&t=rain" + "&tgl1=" + tgl1 + "&tgl2=" + tgl2;
            } else if (tipe == 'deb') {
                render_to = 'deb_chart';
                title_text = 'DEBIT BANJIR';
                sat = 'mm';
                yAxis_text = 'Debit Banjir (mm)';
                json_path = "../inc/olah.php?j=deb_banjir&t=deb_banjir" + "&tgl1=" + tgl1 + "&tgl2=" + tgl2;
            } else if (tipe == 'debkripik') {
                render_to = 'debkripik_chart';
                title_text = 'DEBIT BANJIR KRIPIK';
                sat = 'mm';
                yAxis_text = 'Debit Banjir (mm)';
                json_path = "../inc/olah.php?j=deb_banjir&t=deb_banjirkripik" + "&tgl1=" + tgl1 + "&tgl2=" + tgl2;
            } else if (tipe == 'sedkripik') {
                render_to = 'sedkripik_chart';
                title_text = ' SED SIM KRIPIK';
                sat = 'mm';
                yAxis_text = 'Sed Sim (mm)';
                json_path = "../inc/olah.php?j=sed_sim&t=sed_simkripik" + "&tgl1=" + tgl1 + "&tgl2=" + tgl2;
            } else if (tipe == 'rainkripik') {
                render_to = 'rainkripik_chart';
                title_text = 'CURAH HUJAN KRIPIK';
                sat = 'mm';
                yAxis_text = 'Curah Hujan (mm)';
                json_path = "../inc/olah.php?j=rain&t=rainkripik" + "&tgl1=" + tgl1 + "&tgl2=" + tgl2;
            } else if (tipe == 'debgarang') {
                render_to = 'debgarang_chart';
                title_text = 'DEBIT BANJIR GARANG';
                sat = 'mm';
                yAxis_text = 'Debit Banjir (mm)';
                json_path = "../inc/olah.php?j=deb_banjir&t=deb_banjirgarang" + "&tgl1=" + tgl1 + "&tgl2=" + tgl2;
            } else if (tipe == 'sedgarang') {
                render_to = 'sedgarang_chart';
                title_text = ' SED SIM GARANG';
                sat = 'mm';
                yAxis_text = 'Sed Sim (mm)';
                json_path = "../inc/olah.php?j=sed_sim&t=sed_simgarang" + "&tgl1=" + tgl1 + "&tgl2=" + tgl2;
            } else if (tipe == 'raingarang') {
                render_to = 'raingarang_chart';
                title_text = 'CURAH HUJAN GARANG';
                sat = 'mm';
                yAxis_text = 'Curah Hujan (mm)';
                json_path = "../inc/olah.php?j=rain&t=raingarang" + "&tgl1=" + tgl1 + "&tgl2=" + tgl2;
            }
            // else if (tipe == 'raingarang') {
            //     render_to = 'rain_chartkripik';
            //     title_text = 'CURAH HUJAN';
            //     sat = 'mm';
            //     yAxis_text = 'Curah Hujan (mm)';
            //     json_path = "../inc/olah.php?j=rain&t=rainkripik" + "&tgl1=" + tgl1 + "&tgl2=" + tgl2;
            // } 
            else if (tipe == 'rain_menit') {
                render_to = 'rain_chart';
                title_text = 'CURAH HUJAN';
                sat = 'mm';
                yAxis_text = 'Curah Hujan (mm)';
                json_path = "../inc/olah.php?j=menitan&t=rain_menit" + "&tgl1=" + tgl1 + "&tgl2=" + tgl2 + "&waktu=" + waktu;
            } else if (tipe == 'sed_menit') {
                render_to = 'sed_chart';
                title_text = 'SED SIM';
                sat = 'ton';
                yAxis_text = 'Sed Sim';
                json_path = "../inc/olah.php?j=menitan&t=sed_menit" + "&tgl1=" + tgl1 + "&tgl2=" + tgl2 + "&waktu=" + waktu;
            } else if (tipe == 'deb_menit') {
                render_to = 'deb_chart';
                title_text = 'DEB BANJIR';
                sat = 'ton';
                yAxis_text = 'Deb Banjir';
                json_path = "../inc/olah.php?j=menitan&t=deb_menit" + "&tgl1=" + tgl1 + "&tgl2=" + tgl2 + "&waktu=" + waktu;
            } else if (tipe == 'deb_menitkripik') {
                render_to = 'debkripik_chart';
                title_text = 'DEB BANJIR KRIPIK';
                sat = 'ton';
                yAxis_text = 'Deb Banjir';
                json_path = "../inc/olah.php?j=menitankripik&t=deb_menitkripik" + "&tgl1=" + tgl1 + "&tgl2=" + tgl2 + "&waktu=" + waktu;
            } else if (tipe == 'rain_menitkripik') {
                render_to = 'rainkripik_chart';
                title_text = 'CURAH HUJAN';
                sat = 'mm';
                yAxis_text = 'Curah Hujan (mm)';
                json_path = "../inc/olah.php?j=menitankripik&t=rain_menitkripik" + "&tgl1=" + tgl1 + "&tgl2=" + tgl2 + "&waktu=" + waktu;
            } else if (tipe == 'sed_menitkripik') {
                render_to = 'sedkripik_chart';
                title_text = 'SED SIM';
                sat = 'ton';
                yAxis_text = 'Sed Sim';
                json_path = "../inc/olah.php?j=menitankripik&t=sed_menitkripik" + "&tgl1=" + tgl1 + "&tgl2=" + tgl2 + "&waktu=" + waktu;
            } else if (tipe == 'deb_menitgarang') {
                render_to = 'debgarang_chart';
                title_text = 'DEB BANJIR GARANG';
                sat = 'ton';
                yAxis_text = 'Deb Banjir';
                json_path = "../inc/olah.php?j=menitangarang&t=deb_menitgarang" + "&tgl1=" + tgl1 + "&tgl2=" + tgl2 + "&waktu=" + waktu;
            } else if (tipe == 'rain_menitgarang') {
                render_to = 'raingarang_chart';
                title_text = 'CURAH HUJAN GAARNG';
                sat = 'mm';
                yAxis_text = 'Curah Hujan (mm)';
                json_path = "../inc/olah.php?j=menitangarang&t=rain_menitgarang" + "&tgl1=" + tgl1 + "&tgl2=" + tgl2 + "&waktu=" + waktu;
            } else if (tipe == 'sed_menitgarang') {
                render_to = 'sedgarang_chart';
                title_text = 'SED SIM GARANG';
                sat = 'ton';
                yAxis_text = 'Sed Sim';
                json_path = "../inc/olah.php?j=menitangarang&t=sed_menitgarang" + "&tgl1=" + tgl1 + "&tgl2=" + tgl2 + "&waktu=" + waktu;
            }

            if (tgl2 == '' || tgl1 == tgl2) {
                tipe1 = 'column';
            } else {
                tipe1 = 'column';
            }
            console.log("tipe grafik: " + tipe1);
            var options = {
                chart: {
                    renderTo: render_to,
                    type: tipe1,
                    height: 300
                    //marginRight: 30,  
                    //marginBottom: 25
                },
                title: {
                    text: undefined,
                    //x: -20 //center
                },
                subtitle: {
                    text: tanggal,
                    // x: -20
                },
                xAxis: {
                    categories: []
                },
                yAxis: {
                    title: {
                        text: yAxis_text
                    },
                    plotLines: [{
                        value: 0,
                        width: 1,
                        color: '#090'
                    }]
                },
                plotOptions: {
                    line: {
                        dataLabels: {
                            enabled: true
                        },
                        enableMouseTracking: true
                    },
                    series: {
                        cursor: 'pointer',
                        events: {
                            click: function(event) {
                                waktuu = $("#sedd, #debb,  #rainn, #debbkripik,#seddkripik, #rainnkripik, #rainngarang, #seddgarang, #debbgarang").attr('data-waktu');
                                // console.log(waktu);
                                if (tgl_awal == tgl_akhir && waktuu == '') {
                                    $("#rain_chart, #sed_chart, #deb_chart, #debkripik_chart, #rainkripik_chart, #raingarang_chart, #sedkripik_chart, #sedgarang_chart, #debgarang_chart").hide();
                                    // $("#rain_chartkripik, #sedkripik_chart").hide();
                                    if (tipe == 'rain') tipe2 = 'rain_menit';
                                    else if (tipe == 'sed') tipe2 = 'sed_menit';
                                    else if (tipe == 'deb') tipe2 = 'deb_menit';
                                    else if (tipe == 'debkripik') tipe2 = 'deb_menitkripik';
                                    else if (tipe == 'debgarang') tipe2 = 'deb_menitgarang';
                                    else if (tipe == 'rainkripik') tipe2 = 'rain_menitkripik';
                                    else if (tipe == 'raingarang') tipe2 = 'rain_menitgarang';
                                    else if (tipe == 'sedgarang') tipe2 = 'sed_menitgarang';
                                    else if (tipe == 'sedkripik') tipe2 = 'sed_menitkripik';
                                    waktu = event.point.category;
                                    grafik(tipe2, tgl_awal, tgl_akhir, sn, waktu);
                                    // console.log("nnnnnnn = " + tanggal2);
                                    // console.log("mmmmmmm = " + waktu);
                                    // // json_path = ("../inc/olah.php?j=menit" + "&tanggal=" + tanggal2 + "&waktu=" + waktu);  
                                    // $.ajax({
                                    //     method: "GET",
                                    //     url: "../inc/olah.php",
                                    //     data: {
                                    //         j: "menitan",
                                    //         tipe: tipe,
                                    //         tanggal: tgl_awal,
                                    //         waktu: waktu

                                    //     },
                                    //     dataType: "json"
                                    // })
                                    $("#" + tipe + "_chart,#" + tipe + "_button,#" + tipe + "_export").fadeIn();
                                    if (tipe == "rain") {
                                        $("#rainn").attr("data-tgl1", tgl_awal);
                                        $("#rainn").attr("data-tgl2", tgl_akhir);
                                        $("#rainn").attr("data-waktu", waktu);
                                    } else if (tipe == "sed") {
                                        $("#sedd").attr("data-tgl1", tgl_awal);
                                        $("#sedd").attr("data-tgl2", tgl_akhir);
                                        $("#sedd").attr("data-waktu", waktu);
                                    } else if (tipe == "deb") {
                                        $("#debb").attr("data-tgl1", tgl_awal);
                                        $("#debb").attr("data-tgl2", tgl_akhir);
                                        $("#debb").attr("data-waktu", waktu);
                                    } 
                                    else if (tipe == "rainkripik") {
                                        $("#rainnkripik").attr("data-tgl1", tgl_awal);
                                        $("#rainnkripik").attr("data-tgl2", tgl_akhir);
                                        $("#rainnkripik").attr("data-waktu", waktu);
                                    } else if (tipe == "debkripik") {
                                        $("#debbkripik").attr("data-tgl1", tgl_awal);
                                        $("#debbkripik").attr("data-tgl2", tgl_akhir);
                                        $("#debbkripik").attr("data-waktu", waktu);
                                    } else if (tipe == "sedkripik") {
                                        $("#seddkripik").attr("data-tgl1", tgl_awal);
                                        $("#seddkripik").attr("data-tgl2", tgl_akhir);
                                        $("#seddkripik").attr("data-waktu", waktu);
                                    } else if (tipe == "raingarang") {
                                        $("#rainngarang").attr("data-tgl1", tgl_awal);
                                        $("#rainngarang").attr("data-tgl2", tgl_akhir);
                                        $("#rainngarang").attr("data-waktu", waktu);
                                    } else if (tipe == "debgarang") {
                                        $("#debbgarang").attr("data-tgl1", tgl_awal);
                                        $("#debbgarang").attr("data-tgl2", tgl_akhir);
                                        $("#debbgarang").attr("data-waktu", waktu);
                                    } else if (tipe == "sedgarag") {
                                        $("#seddgarang").attr("data-tgl1", tgl_awal);
                                        $("#seddgarang").attr("data-tgl2", tgl_akhir);
                                        $("#seddgarang").attr("data-waktu", waktu);
                                    }
                                    
                                    
                                    // else if (tipe == "sedkripik") {
                                    //     $("#seddkripik").attr("data-tgl1", tgl_awal);
                                    //     $("#seddkripik").attr("data-tgl2", tgl_akhir);
                                    //     $("#seddkripik").attr("data-waktu", waktu);
                                    // }

                                }
                            }
                        }
                    }
                },

                tooltip: {
                    formatter: function() {
                        if (tipe == "rain" || tipe == "rain_menit") {
                            waktuuu = $("#rainn").attr('data-waktu');
                            if (tgl1 == tgl2 && waktuuu == '') {
                                return '<b>' + this.series.name + '</b><br/>at ' + this.x + ': ' + this.y + ' ' + 'mm/jam';
                            } else if (tgl1 != tgl2 && waktuuu == '') {
                                return '<b>' + this.series.name + '</b><br/>at ' + tgl_text2(this.x) + '<br/>' + this.y + ' ' + 'mm/hari';
                            } else if (tgl1 == tgl2 && waktuuu != '') {
                                return '<b>' + this.series.name + '</b><br/>at ' + this.x + '<br/>' + this.y + ' ' + 'mm/5mnt';
                            }
                        } else if (tipe == "sed" || tipe == "sed_menit") {
                            waktuuu = $("#sedd").attr('data-waktu');
                            if (tgl1 == tgl2 && waktuuu == '') {
                                return '<b>' + this.series.name + '</b><br/>at ' + this.x + ': ' + this.y + ' ' + 'ton/jam';
                            } else if (tgl1 != tgl2 && waktuuu == '') {
                                return '<b>' + this.series.name + '</b><br/>at ' + tgl_text2(this.x) + '<br/>' + this.y + ' ' + 'ton/hari';
                            } else if (tgl1 == tgl2 && waktuuu != '') {
                                return '<b>' + this.series.name + '</b><br/>at ' + this.x + '<br/>' + this.y + ' ' + 'ton/5mnt';
                            }
                        } else if (tipe == "deb" || tipe == "deb_menit") {
                            waktuuu = $("#debb").attr('data-waktu');
                            if (tgl1 == tgl2 && waktuuu == '') {
                                return '<b>' + this.series.name + '</b><br/>at ' + this.x + ': ' + this.y + ' ' + 'ton/jam';
                            } else if (tgl1 != tgl2 && waktuuu == '') {
                                return '<b>' + this.series.name + '</b><br/>at ' + tgl_text2(this.x) + '<br/>' + this.y + ' ' + 'ton/hari';
                            } else if (tgl1 == tgl2 && waktuuu != '') {
                                return '<b>' + this.series.name + '</b><br/>at ' + this.x + '<br/>' + this.y + ' ' + 'ton/5mnt';
                            }
                        } else if (tipe == "debkripik" || tipe == "deb_menitkripik") {
                            waktuuu = $("#debbkripik").attr('data-waktu');
                            if (tgl1 == tgl2 && waktuuu == '') {
                                return '<b>' + this.series.name + '</b><br/>at ' + this.x + ': ' + this.y + ' ' + 'ton/jam';
                            } else if (tgl1 != tgl2 && waktuuu == '') {
                                return '<b>' + this.series.name + '</b><br/>at ' + tgl_text2(this.x) + '<br/>' + this.y + ' ' + 'ton/hari';
                            } else if (tgl1 == tgl2 && waktuuu != '') {
                                return '<b>' + this.series.name + '</b><br/>at ' + this.x + '<br/>' + this.y + ' ' + 'ton/5mnt';
                            }
                        } else if (tipe == "sedkripik" || tipe == "sed_menitkripik") {
                            waktuuu = $("#seddkripik").attr('data-waktu');
                            if (tgl1 == tgl2 && waktuuu == '') {
                                return '<b>' + this.series.name + '</b><br/>at ' + this.x + ': ' + this.y + ' ' + 'ton/jam';
                            } else if (tgl1 != tgl2 && waktuuu == '') {
                                return '<b>' + this.series.name + '</b><br/>at ' + tgl_text2(this.x) + '<br/>' + this.y + ' ' + 'ton/hari';
                            } else if (tgl1 == tgl2 && waktuuu != '') {
                                return '<b>' + this.series.name + '</b><br/>at ' + this.x + '<br/>' + this.y + ' ' + 'ton/5mnt';
                            }
                        } else if (tipe == "rainkripik" || tipe == "rain_menitkripik") {
                            waktuuu = $("#rainnkripik").attr('data-waktu');
                            if (tgl1 == tgl2 && waktuuu == '') {
                                return '<b>' + this.series.name + '</b><br/>at ' + this.x + ': ' + this.y + ' ' + 'ton/jam';
                            } else if (tgl1 != tgl2 && waktuuu == '') {
                                return '<b>' + this.series.name + '</b><br/>at ' + tgl_text2(this.x) + '<br/>' + this.y + ' ' + 'ton/hari';
                            } else if (tgl1 == tgl2 && waktuuu != '') {
                                return '<b>' + this.series.name + '</b><br/>at ' + this.x + '<br/>' + this.y + ' ' + 'ton/5mnt';
                            }
                        } else if (tipe == "debgarang" || tipe == "deb_menitgarang") {
                            waktuuu = $("#debbgarang").attr('data-waktu');
                            if (tgl1 == tgl2 && waktuuu == '') {
                                return '<b>' + this.series.name + '</b><br/>at ' + this.x + ': ' + this.y + ' ' + 'ton/jam';
                            } else if (tgl1 != tgl2 && waktuuu == '') {
                                return '<b>' + this.series.name + '</b><br/>at ' + tgl_text2(this.x) + '<br/>' + this.y + ' ' + 'ton/hari';
                            } else if (tgl1 == tgl2 && waktuuu != '') {
                                return '<b>' + this.series.name + '</b><br/>at ' + this.x + '<br/>' + this.y + ' ' + 'ton/5mnt';
                            }
                        } else if (tipe == "sedgarang" || tipe == "sed_menitgarang") {
                            waktuuu = $("#seddgarang").attr('data-waktu');
                            if (tgl1 == tgl2 && waktuuu == '') {
                                return '<b>' + this.series.name + '</b><br/>at ' + this.x + ': ' + this.y + ' ' + 'ton/jam';
                            } else if (tgl1 != tgl2 && waktuuu == '') {
                                return '<b>' + this.series.name + '</b><br/>at ' + tgl_text2(this.x) + '<br/>' + this.y + ' ' + 'ton/hari';
                            } else if (tgl1 == tgl2 && waktuuu != '') {
                                return '<b>' + this.series.name + '</b><br/>at ' + this.x + '<br/>' + this.y + ' ' + 'ton/5mnt';
                            }
                        } else if (tipe == "raingarang" || tipe == "rain_menitgarang") {
                            waktuuu = $("#rainngarang").attr('data-waktu');
                            if (tgl1 == tgl2 && waktuuu == '') {
                                return '<b>' + this.series.name + '</b><br/>at ' + this.x + ': ' + this.y + ' ' + 'ton/jam';
                            } else if (tgl1 != tgl2 && waktuuu == '') {
                                return '<b>' + this.series.name + '</b><br/>at ' + tgl_text2(this.x) + '<br/>' + this.y + ' ' + 'ton/hari';
                            } else if (tgl1 == tgl2 && waktuuu != '') {
                                return '<b>' + this.series.name + '</b><br/>at ' + this.x + '<br/>' + this.y + ' ' + 'ton/5mnt';
                            }
                        }
                        // else if (tipe == "sedkripik" || tipe == "sed_menitkripik") {
                        //     waktuuu = $("#sedd").attr('data-waktu');
                        //     if (tgl1 == tgl2 && waktuuu == '') {
                        //         return '<b>' + this.series.name + '</b><br/>at ' + this.x + ': ' + this.y + ' ' + 'ton/jam';
                        //     } else if (tgl1 != tgl2 && waktuuu == '') {
                        //         return '<b>' + this.series.name + '</b><br/>at ' + tgl_text2(this.x) + '<br/>' + this.y + ' ' + 'ton/hari';
                        //     } else if (tgl1 == tgl2 && waktuuu != '') {
                        //         return '<b>' + this.series.name + '</b><br/>at ' + this.x + '<br/>' + this.y + ' ' + 'ton/5mnt';
                        //     }
                        
                        // }  
                        // else if (tipe == "rainkripik" || tipe == "rain_menitkripik") {
                        //     waktuuu = $("#rainnkripik").attr('data-waktu');
                        //     if (tgl1 == tgl2 && waktuuu == '') {
                        //         return '<b>' + this.series.name + '</b><br/>at ' + this.x + ': ' + this.y + ' ' + 'mm/jam';
                        //     } else if (tgl1 != tgl2 && waktuuu == '') {
                        //         return '<b>' + this.series.name + '</b><br/>at ' + tgl_text2(this.x) + '<br/>' + this.y + ' ' + 'mm/hari';
                        //     } else if (tgl1 == tgl2 && waktuuu != '') {
                        //         return '<b>' + this.series.name + '</b><br/>at ' + this.x + '<br/>' + this.y + ' ' + 'mm/5mnt';
                        //     }
                        // }
                    }
                },
                legend: {
                    enabled: false
                },
                credits: {
                    enabled: false
                },
                series: []
            }
            
            
            
            $.getJSON(json_path, function(json) {
                options.xAxis.categories = json[0]['data'];
                options.series[0] = json[1];

                chart = new Highcharts.Chart(options);
            });
        }
        
        

        $("#rain_export").click(function() {
            tgl1 = $("#rainn").attr('data-tgl1');
            console.log("tanggal1 =" + tgl1);
            tgl2 = $("#rainn").attr('data-tgl2');
            console.log("tanggal2 =" + tgl2);
            waktu1 = $("#rainn").attr('data-waktu');
            console.log("waktuuuuuuu =" + waktu1);
            console.log("keklik");
            location.replace("../inc/export_excel.php?j=export&" + "&tgl1=" + tgl1 + "&tgl2=" + tgl2 + "&waktu=" + waktu1);
        });
        
        $("#sed_export").click(function() {
            tgl1 = $("#sedd").attr('data-tgl1');
            console.log("tanggal1 =" + tgl1);
            tgl2 = $("#sedd").attr('data-tgl2');
            console.log("tanggal2 =" + tgl2);
            waktu1 = $("#sedd").attr('data-waktu');
            console.log("waktuuuuuuu =" + waktu1);
            console.log("keklik");
            location.replace("../inc/export_excel.php?j=export&" + "&tgl1=" + tgl1 + "&tgl2=" + tgl2 + "&waktu=" + waktu1);
        });
        
        $("#deb_export").click(function() {
            tgl1 = $("#debb").attr('data-tgl1');
            console.log("tanggal1 =" + tgl1);
            tgl2 = $("#debb").attr('data-tgl2');
            console.log("tanggal2 =" + tgl2);
            waktu1 = $("#debb").attr('data-waktu');
            console.log("waktuuuuuuu =" + waktu1);
            console.log("keklik");
            location.replace("../inc/export_excel.php?j=export&" + "&tgl1=" + tgl1 + "&tgl2=" + tgl2 + "&waktu=" + waktu1);
        });
        
        $("#debkripik_export").click(function() {
            tgl1 = $("#debbkripik").attr('data-tgl1');
            console.log("tanggal1 =" + tgl1);
            tgl2 = $("#debbkripik").attr('data-tgl2');
            console.log("tanggal2 =" + tgl2);
            waktu1 = $("#debbkripik").attr('data-waktu');
            console.log("waktuuuuuuu =" + waktu1);
            console.log("keklik");
            location.replace("../inc/export_excel2.php?j=export&" + "&tgl1=" + tgl1 + "&tgl2=" + tgl2 + "&waktu=" + waktu1);
        });
        
        $("#rainkripik_export").click(function() {
            tgl1 = $("#rainnkripik").attr('data-tgl1');
            console.log("tanggal1 =" + tgl1);
            tgl2 = $("#rainnkripik").attr('data-tgl2');
            console.log("tanggal2 =" + tgl2);
            waktu1 = $("#rainnkripik").attr('data-waktu');
            console.log("waktuuuuuuu =" + waktu1);
            console.log("keklik");
            location.replace("../inc/export_excel2.php?j=export&" + "&tgl1=" + tgl1 + "&tgl2=" + tgl2 + "&waktu=" + waktu1);
        });
        
        $("#sedkripik_export").click(function() {
            tgl1 = $("#seddkripik").attr('data-tgl1');
            console.log("tanggal1 =" + tgl1);
            tgl2 = $("#seddkripik").attr('data-tgl2');
            console.log("tanggal2 =" + tgl2);
            waktu1 = $("#seddkripik").attr('data-waktu');
            console.log("waktuuuuuuu =" + waktu1);
            console.log("keklik");
            location.replace("../inc/export_excel2.php?j=export&" + "&tgl1=" + tgl1 + "&tgl2=" + tgl2 + "&waktu=" + waktu1);
        });
        
        $("#debgarang_export").click(function() {
            tgl1 = $("#debbgarang").attr('data-tgl1');
            console.log("tanggal1 =" + tgl1);
            tgl2 = $("#debbgarang").attr('data-tgl2');
            console.log("tanggal2 =" + tgl2);
            waktu1 = $("#debbgarang").attr('data-waktu');
            console.log("waktuuuuuuu =" + waktu1);
            console.log("keklik");
            location.replace("../inc/export_excel3.php?j=export&" + "&tgl1=" + tgl1 + "&tgl2=" + tgl2 + "&waktu=" + waktu1);
        });
        
        $("#raingarang_export").click(function() {
            tgl1 = $("#rainngarang").attr('data-tgl1');
            console.log("tanggal1 =" + tgl1);
            tgl2 = $("#rainngarang").attr('data-tgl2');
            console.log("tanggal2 =" + tgl2);
            waktu1 = $("#rainngarang").attr('data-waktu');
            console.log("waktuuuuuuu =" + waktu1);
            console.log("keklik");
            location.replace("../inc/export_excel3.php?j=export&" + "&tgl1=" + tgl1 + "&tgl2=" + tgl2 + "&waktu=" + waktu1);
        });
        
        $("#sedgarang_export").click(function() {
            tgl1 = $("#seddgarang").attr('data-tgl1');
            console.log("tanggal1 =" + tgl1);
            tgl2 = $("#seddgarang").attr('data-tgl2');
            console.log("tanggal2 =" + tgl2);
            waktu1 = $("#seddgarang").attr('data-waktu');
            console.log("waktuuuuuuu =" + waktu1);
            console.log("keklik");
            location.replace("../inc/export_excel3.php?j=export&" + "&tgl1=" + tgl1 + "&tgl2=" + tgl2 + "&waktu=" + waktu1);
        });
        
        //menghilangkan icon yang pertama muncul

        $("#sed_button, #rain_button").hide();
        $("#sed_form, #rain_form").hide();
        $("#deb_button, #rain_button").hide();
        $("#deb_form, #rain_form").hide();
        $("#rain_export, #sed_export").hide();
        $("#rain_export, #deb_export").hide();
        
        
        $("#sedkripik_button, #rainkripik_button").hide();
        $("#sedkripik_form, #rainkripik_form").hide();
        $("#debkripik_button, #rainkripik_button").hide();
        $("#debkripik_form, #rainkripik_form").hide();
        $("#rainkripik_export, #sedkripik_export").hide();
        $("#rainkripik_export, #debkripik_export").hide();
        
        $("#sedgarang_button, #raingarang_button").hide();
        $("#sedgarang_form, #raingarang_form").hide();
        $("#debgarang_button, #raingarang_button").hide();
        $("#debgarang_form, #raingarang_form").hide();
        $("#raingarang_export, #sedgarang_export").hide();
        $("#raingarang_export, #debgarang_export").hide();
        // $("#rain_form").hide();

        tgl_last_update = $("#last_update").attr('data-tgl_last_update');
        console.log("tanggal_last =" + tgl_last_update);
        
        // untuk membuka grafik
        
        grafik_liat("sed", "sed_icon", "sed_chart", "sed_button", "sed_form", "sed_export", "sed");
        grafik_liat("deb", "deb_icon", "deb_chart", "deb_button", "deb_form", "deb_export", "deb");
        grafik_liat("rain", "rain_icon", "rain_chart", "rain_button", "rain_form", "rain_export", "rain");
        grafik_liat("debkripik", "deb_iconkripik", "debkripik_chart", "debkripik_button", "debkripik_form", "debkripik_export", "debkripik");
        
        grafik_liat("rainkripik", "rain_iconkripik", "rainkripik_chart", "rainkripik_button", "rainkripik_form", "rainkripik_export", "rainkripik");
        grafik_liat("sedkripik", "sed_iconkripik", "sedkripik_chart", "sedkripik_button", "sedkripik_form", "sedkripik_export", "sedkripik");
        
        grafik_liat("debgarang", "deb_icongarang", "debgarang_chart", "debgarang_button", "debgarang_form", "debgarang_export", "debgarang");
        
        grafik_liat("raingarang", "rain_icongarang", "raingarang_chart", "raingarang_button", "raingarang_form", "raingarang_export", "raingarang");
        grafik_liat("sedgarang", "sed_icongarang", "sedgarang_chart", "sedgarang_button", "sedgarang_form", "sedgarang_export", "sedgarang");
        // grafik_toggle("pha", "pha_icon", "pha_chart");
        grafik_close("sed", "sed_icon", "sed_chart", "sed_button", "sed_export");
        grafik_close("deb", "deb_icon", "deb_chart", "deb_button", "deb_export");
        grafik_close("rain", "rain_icon", "rain_chart", "rain_button", "rain_export");
        grafik_close("rainkripik", "rain_iconkripik", "rainkripik_chart", "rainkripik_button", "rainkripik_export");
        grafik_close("debkripik", "deb_iconkripik", "debkripik_chart", "debkripik_button", "debkripik_export");
        grafik_close("sedkripik", "sed_iconkripik", "sedkripik_chart", "sedkripik_button", "sedkripik_export");
        grafik_close("raingarang", "rain_icongarang", "raingarang_chart", "raingarang_button", "raingarang_export");
        grafik_close("debgarang", "deb_icongarang", "debgarang_chart", "debgarang_button", "debgarang_export");
        grafik_close("sedgarang", "sed_icongarang", "sedgarang_chart", "sedgarang_button", "sedgarang_export");

        
        // grafik_liat("rainkripik", "rain_iconkripik", "rain_chartkripik", "rainkripik_button", "rainkripik_form", "rainkripik_export", "rainkripik");
        
        // grafik_close("rainkripik", "rain_iconkripik", "rain_chartkripik", "rainkripik_button" "rainkripik_export");
        // grafik_toggle("pha", "pha_icon", "pha_chart");
        var gaugeMeterLoaded = new Promise(function(resolve, reject) {
            // Anda dapat menggunakan metode asynchronous seperti $.getScript untuk memuat library
            $.getScript("../node_modules/GaugeMeter.js", function() {
                // Library sudah dimuat, maka kita resolve Promise
                resolve();
            });
        });
        // sn = $(".container-fluid").attr("data-sn");
        // produk_tipe = $(".container-fluid").attr("data-produk_tipe");
        produk_tipe = 'sed_sim' && 'rain' && 'deb_banjir' && 'deb_banjirkripik' ;
        // produk_tipekripik = 'sed_simkripik' && 'rainkripik';
        function ambil_data(sn) {
            $.ajax({
                    method: "POST",
                    url: "../inc/olah.php",
                    data: {
                        p: "ambil_data",
                        // sn: sn,
                        produk_tipe: produk_tipe
                    },
                    dataType: "json"
                })
                .done(function(data) {
                    sed = Math.max(parseFloat(data.sed_sim), 0).toFixed(1);
                    rain = Math.max(parseFloat(data.curah_hujan), 0).toFixed(1);
                    deb = Math.max(parseFloat(data.deb_banjir), 0).toFixed(1);
                    // sed = parseFloat(data.sed_sim).toFixed(1); //toFixed data harus difloatkan
                    sed2 = Math.floor(Math.abs(sed * 100 / 5000));
                    // rain = parseFloat(data.curah_hujan).toFixed(1); //toFixed data harus difloatkan
                    rain2 = Math.floor(Math.abs(rain * 100 / 300)) ;
                    // deb = parseFloat(data.deb_banjir).toFixed(1); //toFixed data harus difloatkan
                    deb2 = Math.floor(Math.abs(deb * 100 / 300)) ;

                    rainfall = data.curah_hujan;
                    banjir = data.deb_banjir;
                    date_server = data.tanggal;
                    time_server = data.waktu;
                    lokasi = data.lokasi;
                    $("#last_update, #last_update1, #last_update2").text("Last Update: " + date_server + " " + " |" + " " + time_server);
                    console.log("date = " + date_server + "time =" + time_server);
                    $("#rainfall").text(rainfall);
                    $("#banjir").text(banjir);
                    console.log("debit banjir = " + banjir);
                    console.log("curah_hujan = " + rainfall);
                    $("#location").text(lokasi);
                    console.log("lokasi = " + lokasi);
                    $("#tanggal").text(date_server);
                    console.log("tanggal = " + date_server);
                    $("#waktu").text(time_server);
                    console.log("waktu = " + time_server);
                    console.log(sed, deb, rain); // Pastikan nilai-nilainya valid
                    console.log(sed2, deb2, rain2); // Pastikan nilai-nilainya valid
                    // console.log("sed = " + sed2);
                    // console.log("rain = " + rain2);
                    // console.log("deb = " + deb2);

                    $("#tgl_spin .spinner-border").remove();
                    $("#pha_spin .spinner-border").remove();
                    $("#tds_spin .spinner-border").remove();
                    $("#rl_spin .spinner-border").remove();
                    $("#rt_spin .spinner-border").remove();
                    $("#light_spin .spinner-border").remove();
                    $("#gt_spin .spinner-border").remove();
                    
                    // $('#sed').gaugeMeter('destroy');
                    // $('#deb').gaugeMeter('destroy');
                    // $('#rain').gaugeMeter('destroy');
                    gaugeMeterLoaded.then(function() {
                    
                        $('#sed').gaugeMeter({ percent: sed2 });
                        $('#sed span').empty().append(sed + "<u></u>");
                        $('#deb').gaugeMeter({ percent: deb2 });
                        $('#deb span').empty().append(deb + "<u></u>");
                        $('#rain').gaugeMeter({ percent: rain2 });
                        $('#rain span').empty().append(rain + "<u></u>");
                    });

                })
                .fail(function(msg) {
                    console.log("Data gagal dikirim: " + msg); //jika gagal maka akan muncul notifikasi
                });
        }
        
        var gaugeMeterLoaded = new Promise(function(resolve, reject) {
            // Anda dapat menggunakan metode asynchronous seperti $.getScript untuk memuat library
            $.getScript("../node_modules/GaugeMeter.js", function() {
                // Library sudah dimuat, maka kita resolve Promise
                resolve();
            });
        });
        
        function ambil_data_kripik(sn) {
            $.ajax({
                    method: "POST",
                    url: "../inc/olah.php",
                    data: {
                        p: "ambil_data_kripik",
                        // sn: sn,
                        produk_tipe: produk_tipe
                    },
                    dataType: "json"
                })
                .done(function(data) {
                    sedkripik = Math.max(parseFloat(data.sed_sim), 0).toFixed(1);
                    rainkripik = Math.max(parseFloat(data.curah_hujan), 0).toFixed(1);
                    debkripik = Math.max(parseFloat(data.deb_banjir), 0).toFixed(1);
                    // sedkripik = parseFloat(data.sed_sim).toFixed(1); //toFixed data harus difloatkan
                    sed2kripik = Math.floor(Math.abs(sedkripik * 100 / 5000));
                    // rainkripik = parseFloat(data.curah_hujan).toFixed(1); //toFixed data harus difloatkan
                    rain2kripik = Math.floor(Math.abs(rainkripik * 100 / 300));
                    // debkripik = parseFloat(data.deb_banjir).toFixed(1); //toFixed data harus difloatkan
                    deb2kripik = Math.floor(Math.abs(debkripik * 100 / 300));

                    rainfallkripik = data.curah_hujan;
                    banjir = data.deb_banjir;
                    date_server = data.tanggal;
                    time_server = data.waktu;
                    lokasi = data.lokasi;
                    $("#last_update4, #last_update5, #las_update6").text("Last Update: " + date_server + " " + " |" + " " + time_server);
                    console.log("date = " + date_server + "time =" + time_server);
                    $("#rainfallkripik").text(rainfallkripik);
                    console.log("curah_hujan = " + rainfallkripik);
                    $("#banjir").text(banjir);
                    console.log("debit banjir = " + banjir);
                    $("#location").text(lokasi);
                    console.log("lokasi = " + lokasi);
                    $("#tanggal").text(date_server);
                    console.log("tanggal = " + date_server);
                    $("#waktu").text(time_server);
                    console.log("waktu = " + time_server);
                    console.log(sed2kripik, deb2kripik, rain2kripik); // Pastikan nilai-nilainya valid

                    $("#tgl_spin .spinner-border").remove();
                    $("#pha_spin .spinner-border").remove();
                    $("#tds_spin .spinner-border").remove();
                    $("#rl_spin .spinner-border").remove();
                    $("#rt_spin .spinner-border").remove();
                    $("#light_spin .spinner-border").remove();
                    $("#gt_spin .spinner-border").remove();
                    
                    // $('#sedkripik').gaugeMeter('destroy');
                    // $('#debkripik').gaugeMeter('destroy');
                    // $('#rainkripik').gaugeMeter('destroy');
                    gaugeMeterLoaded.then(function() {

                        $("#sedkripik").gaugeMeter({
                            percent: sed2kripik
                        });
                        console.log( "rain =" + sed2kripik);
                        $("#sedkripik span").empty().append(sedkripik + "<u></u>");
                        $("#debkripik").gaugeMeter({
                            percent: deb2kripik
                            
                        });
                        console.log("rain =" + deb2kripik);
                        $("#debkripik span").empty().append(debkripik + "<u></u>");
                        $("#rainkripik").gaugeMeter({
                            percent: rain2kripik
                            
                        });
                        console.log( "rain =" +rain2kripik);
                        $("#rainkripik span").empty().append(rainkripik + "<u></u>");
                    });
                })
                .fail(function(msg) {
                    console.log("Data gagal dikirim: " + msg); //jika gagal maka akan muncul notifikasi
                });
        }
        
        var gaugeMeterLoaded = new Promise(function(resolve, reject) {
            // Anda dapat menggunakan metode asynchronous seperti $.getScript untuk memuat library
            $.getScript("../node_modules/GaugeMeter.js", function() {
                // Library sudah dimuat, maka kita resolve Promise
                resolve();
            });
        });
        
        function ambil_data_garang(sn) {
            $.ajax({
                    method: "POST",
                    url: "../inc/olah.php",
                    data: {
                        p: "ambil_data_garang",
                        // sn: sn,
                        produk_tipe: produk_tipe
                    },
                    dataType: "json"
                })
                .done(function(data) {
                    sedgarang = Math.max(parseFloat(data.sed_sim), 0).toFixed(1);
                    raingarang = Math.max(parseFloat(data.curah_hujan), 0).toFixed(1);
                    debgarang = Math.max(parseFloat(data.deb_banjir), 0).toFixed(1);
                    // sedgarang = parseFloat(data.sed_sim).toFixed(1); //toFixed data harus difloatkan
                    sed2garang = Math.floor(Math.abs(sedgarang * 100 / 5000));
                    // raingarang = parseFloat(data.curah_hujan).toFixed(1); //toFixed data harus difloatkan
                    rain2garang = Math.floor(Math.abs(raingarang * 100 / 300));
                    // debgarang = parseFloat(data.deb_banjir).toFixed(1); //toFixed data harus difloatkan
                    deb2garang = Math.floor(Math.abs(debgarang * 100 / 300));

                    rainfallgarang = data.curah_hujan;
                    banjir = data.deb_banjir;
                    date_server = data.tanggal;
                    time_server = data.waktu;
                    lokasi = data.lokasi;
                    $("#last_update7, #last_update8, #last_update9").text("Last Update: " + date_server + " " + " |" + " " + time_server);
                    console.log("date = " + date_server + "time =" + time_server);
                    $("#rainfallgarang").text(rainfallgarang);
                    console.log("curah_hujan = " + rainfallgarang);
                    $("#banjir").text(banjir);
                    console.log("debit banjir = " + banjir);
                    $("#location").text(lokasi);
                    console.log("lokasi = " + lokasi);
                    $("#tanggal").text(date_server);
                    console.log("tanggal = " + date_server);
                    $("#waktu").text(time_server);
                    console.log("waktu = " + time_server);
                    console.log(sed2garang, deb2garang, rain2garang); // Pastikan nilai-nilainya valid


                    $("#tgl_spin .spinner-border").remove();
                    $("#pha_spin .spinner-border").remove();
                    $("#tds_spin .spinner-border").remove();
                    $("#rl_spin .spinner-border").remove();
                    $("#rt_spin .spinner-border").remove();
                    $("#light_spin .spinner-border").remove();
                    $("#gt_spin .spinner-border").remove();
                    
                    // $('#sedgarang').gaugeMeter('destroy');
                    // $('#debgarang').gaugeMeter('destroy');
                    // $('#raingarang').gaugeMeter('destroy');
                    gaugeMeterLoaded.then(function() {

                        $("#sedgarang").gaugeMeter({
                            percent: sed2garang
                        });
                        $("#sedgarang span").empty().append(sedgarang + "<u></u>");
                        $("#debgarang").gaugeMeter({
                            
                            percent: deb2garang
                        })
                        $("#debgarang span").empty().append(debgarang + "<u></u>");
                        $("#raingarang").gaugeMeter({
                            percent: rain2garang
                        });
                        $("#raingarang span").empty().append(raingarang + "<u></u>");
                    });
                    


                })
                .fail(function(msg) {
                    console.log("Data gagal dikirim: " + msg); //jika gagal maka akan muncul notifikasi
                });
        }
        
        function ambil_gambar_kreo() {
            $.ajax({
                    method: "POST",
                    url: "../inc/olah.php",
                    data: {
                        p: "ambil_gambar_kreo",
                        // sn: sn,
                        produk_tipe: produk_tipe
                    },
                    dataType: "json"
                })
                .done(function(data) {
                    gambarkreo = data.gambar
                    
                    
                    $("#kreoKamera").attr("src", 'data:image/png;base64,' + gambarkreo);
                    console.log(gambarkreo);
                })
                .fail(function(msg) {
                    console.log("Data gagal dikirim: " + msg); //jika gagal maka akan muncul notifikasi
                });
        }
        function ambil_gambar_kripik() {
            $.ajax({
                    method: "POST",
                    url: "../inc/olah.php",
                    data: {
                        p: "ambil_gambar_kripik",
                        // sn: sn,
                        produk_tipe: produk_tipe
                    },
                    dataType: "json"
                })
                .done(function(data) {
                    gambarkripik = data.gambar
                    
                    
                    $("#kripikKamera").attr("src", 'data:image/png;base64,' + gambarkripik);
                    console.log(gambarkripik);
                })
                .fail(function(msg) {
                    console.log("Data gagal dikirim: " + msg); //jika gagal maka akan muncul notifikasi
                });
        }
        function ambil_gambar_garang() {
            $.ajax({
                    method: "POST",
                    url: "../inc/olah.php",
                    data: {
                        p: "ambil_gambar_garang",
                        // sn: sn,
                        produk_tipe: produk_tipe
                    },
                    dataType: "json"
                })
                .done(function(data) {
                    gambargarang = data.gambar
                    
                    
                    $("#garangKamera").attr("src", 'data:image/png;base64,' + gambargarang);
                    console.log(gambarkripik);
                })
                .fail(function(msg) {
                    console.log("Data gagal dikirim: " + msg); //jika gagal maka akan muncul notifikasi
                });
        }
        
        
        // sn = 202310240002;
        hreff = window.location.href;
        str = hreff.split("=");
        console.log("urlnya:" + hreff + " ==>" + str[1]);
        sn = str[1];
        // console.log(sn);
        // Jalankan semua tiga fungsi untuk mengambil data awal
ambil_data(sn);
ambil_data_kripik(sn);
ambil_data_garang(sn);
ambil_gambar_kreo()
ambil_gambar_kripik()
ambil_gambar_garang()

// Atur interval untuk mengambil data dan memperbarui GaugeMeter
setInterval(function() {
    ambil_data(sn);
    ambil_data_kripik(sn);
    ambil_data_garang(sn);
}, 5000);


        $("#sed_form,#rain_form, #deb_form, #sedkripik_form").submit(function(e) {
            e.preventDefault();

            tipe = $(this).find("input[name='tipe']").val();
            tgl_awal = $(this).find("input[name='tgl_awal']").val();
            tgl_akhir = $(this).find("input[name='tgl_akhir']").val();
            // waktu2 = event.point.x;

            //console.log("tipe: "+tipe+" t1: "+tgl_awal+" t2: "+tgl_akhir+" sn: "+sn);

            grafik(tipe, tgl_awal, tgl_akhir, sn);

            $(tipe + ',' + '#' + tipe + "_icon,#" + tipe + "_form").fadeOut();
            $("#" + tipe + "_chart,#" + tipe + "_button,#" + tipe + "_export").fadeIn();
            // $("#" + tipe + "_button button:first-child").hide(); //hide tombol today/yesterday

            if (tipe == "rain") {
                $("#rainn").attr("data-tgl1", tgl_awal);
                $("#rainn").attr("data-tgl2", tgl_akhir);
            } else if (tipe == "sed") {
                $("#sedd").attr("data-tgl1", tgl_awal);
                $("#sedd").attr("data-tgl2", tgl_akhir);
            } else if (tipe == "deb") {
                $("#debb").attr("data-tgl1", tgl_awal);
                $("#debb").attr("data-tgl2", tgl_akhir);
            } 

        });
        
        
        
        $("#sedkripik_form,#rainkripik_form, #debkripik_form").submit(function(e) {
            e.preventDefault();

            tipe = $(this).find("input[name='tipe']").val();
            tgl_awal = $(this).find("input[name='tgl_awal']").val();
            tgl_akhir = $(this).find("input[name='tgl_akhir']").val();
            // waktu2 = event.point.x;

            //console.log("tipe: "+tipe+" t1: "+tgl_awal+" t2: "+tgl_akhir+" sn: "+sn);

            grafik(tipe, tgl_awal, tgl_akhir, sn);

            $(tipe + ',' + '#' + tipe + "_icon,#" + tipe + "_form").fadeOut();
            $("#" + tipe + "_chart,#" + tipe + "_button,#" + tipe + "_export").fadeIn();
            // $("#" + tipe + "_button button:first-child").hide(); //hide tombol today/yesterday

             if (tipe == "rainkripik") {
                $("#rainnkripik").attr("data-tgl1", tgl_awal);
                $("#rainnkripik").attr("data-tgl2", tgl_akhir);
            } else if (tipe == "sedkripik") {
                $("#seddkripik").attr("data-tgl1", tgl_awal);
                $("#seddkripik").attr("data-tgl2", tgl_akhir);
            } else if (tipe == "debkripik") {
                $("#debbkripik").attr("data-tgl1", tgl_awal);
                $("#debbkripik").attr("data-tgl2", tgl_akhir);
            }

        });
        
        $("#sedgarang_form,#raingarang_form, #debgarang_form").submit(function(e) {
            e.preventDefault();

            tipe = $(this).find("input[name='tipe']").val();
            tgl_awal = $(this).find("input[name='tgl_awal']").val();
            tgl_akhir = $(this).find("input[name='tgl_akhir']").val();
            // waktu2 = event.point.x;

            //console.log("tipe: "+tipe+" t1: "+tgl_awal+" t2: "+tgl_akhir+" sn: "+sn);

            grafik(tipe, tgl_awal, tgl_akhir, sn);

            $(tipe + ',' + '#' + tipe + "_icon,#" + tipe + "_form").fadeOut();
            $("#" + tipe + "_chart,#" + tipe + "_button,#" + tipe + "_export").fadeIn();
            // $("#" + tipe + "_button button:first-child").hide(); //hide tombol today/yesterday

             if (tipe == "raingarang") {
                $("#rainngarang").attr("data-tgl1", tgl_awal);
                $("#rainngarang").attr("data-tgl2", tgl_akhir);
            } else if (tipe == "sedgarang") {
                $("#seddgarang").attr("data-tgl1", tgl_awal);
                $("#seddgarang").attr("data-tgl2", tgl_akhir);
            } else if (tipe == "debgarang") {
                $("#debbgarang").attr("data-tgl1", tgl_awal);
                $("#debbgarang").attr("data-tgl2", tgl_akhir);
            }

        });
        
       

        function jdw_open(id_spin, id_form, id_chart, id_export, id_real) {
            $("#" + id_spin + " .jdw").click(function(e) {
                $("#" + id_chart + ",#" + id_real + ",#" + id_export).fadeOut();
                $("#" + id_form).fadeIn('slow');
            });
        }
        function jdw_openkripik(id_spinkripik, id_formkripik, id_chartkripik, id_export, id_real) {
            $("#" + id_spinkripik + " .jdw").click(function(e) {
                $("#" + id_chartkripik + ",#" + id_realkripik + ",#" + id_export).fadeOut();
                $("#" + id_formkripik).fadeIn('slow');
            });
        }

        function jdw_close(id, id_form, id_icon, id_chart, id_export, id_real) {
            //console.log("jdw_close"+id_form);
            $("#" + id_form + " .tutup").click(function(e) {
                $("#" + id_form + ",#" + id_export + ",#" + id_chart).fadeOut();
                $("#" + id + ",#" + id_icon + ",#" + id_real).fadeIn();
            });
        }

        jdw_open("sed_spin", "sed_form", "sed_chart", "sed_export", "sed_real");
        jdw_open("rain_spin", "rain_form", "rain_chart", "rain_export", "rain_real");
        jdw_open("deb_spin", "deb_form", "deb_chart", "deb_export", "deb_real");
        
        jdw_open("deb_spinkripik", "debkripik_form", "debkripik_chart", "debkripik_export", "debkripik_real");
        
        jdw_open("sed_spinkripik", "sedkripik_form", "sedkripik_chart", "sedkripik_export", "sedkripik_real");
        jdw_open("rain_spinkripik", "rainkripik_form", "rainkripik_chart", "rainkripik_export", "rainkripik_real");
        
        jdw_open("deb_spingarang", "debgarang_form", "debgarang_chart", "debgarang_export", "debgarang_real");
        
        jdw_open("sed_spingarang", "sedgarang_form", "sedgarang_chart", "sedgarang_export", "sed_realgarang");
        jdw_open("rain_spingarang", "raingarang_form", "raingarang_chart", "raingarang_export", "raingarang_real");

        jdw_close("sed", "sed_form ", "sed_icon", "sed_chart", "sed_export", "sed_real");
        jdw_close("deb_spin", "deb_form", "deb_chart", "deb_export", "deb_real");
        jdw_close("rain", "rain_form", "rain_icon", "rain_chart", "rain_export", "rain_real");
        jdw_close("rainkripik", "rainkripik_form", "rainkripik_chart", "rainkripik_export", "rainkripik_real");
        jdw_close("deb_spinkripik", "debkripik_form", "debkripik_chart", "debkripik_export", "debkripik_real");
        jdw_close("sed_spinkripik", "sedkripik_form", "sedkripik_chart", "sedkripik_export", "sedkripik_real");
        // jdw_close("rain_spinkripik", "rainkripik_form", "rain_chartkripik", "rainkripik_export", "rainkripik_real");
        jdw_close("raingarang", "raingarang_form", "raingarang_chart", "raingarang_export", "raingarang_real");
        jdw_close("deb_spingarang", "debgarang_form", "debgarang_chart", "debgarang_export", "debgarang_real");
        jdw_close("sed_spingarang", "sedgarang_form", "sedgarang_chart", "sedgarang_export", "sed_realgarang");
    </script>

    <script>
    <?php
    $date = date('Y-m-d');
    $date1 = date('Y-m-d');
    $date2 = date('Y-m-d');
    ?>
    var options1 = {
        chart: {
            renderTo: 'rain_real',
            type: 'spline',
            animation: Highcharts.svg, // don't animate in old IE
            marginRight: 10,
            events: {
                load: function() {

                    // set up the updating of the chart each second
                    var series = this.series[0];

                    setInterval(function() {
                        json_path1 = "../inc/olah.php?j=realtime";
                        $.getJSON(json_path1, function(json) {
                            tgl_wkt = json.tanggal + ' ' + json.waktu; //bikin 2020-11-20 10:00:00
                            // console.log("tgl_wkt="+tgl_wkt);

                            //var x = (new Date(tgl_wkt)).getTime(), //konversi ke millisecond
                            var x = json.waktu, //konversi ke millisecond
                                y = Number(json.curah_hujan);

                            //console.log("X="+x+"=Y="+y);
                            series.addPoint([x, y], true, true);
                        })
                    }, 60000);
                }
            }
        },

        credits: {
            enabled: false
        },

        time: {
            useUTC: false
        },

        title: {
            text: 'Curah Hujan(mm)'
        },

        accessibility: {
            announceNewData: {
                enabled: true,
                minAnnounceInterval: 15000,
                announcementFormatter: function(allSeries, newSeries, newPoint) {
                    if (newPoint) {
                        return 'New point added. Value: ' + newPoint.y;
                    }
                    return false;
                }
            }
        },

        xAxis: {
            type: 'category',
            tickPixelInterval: 150
        },

        yAxis: {
            title: {
                text: 'Curah Hujan(mm)'
            },
            plotLines: [{
                value: 0,
                width: 1,
                color: '#808080'
            }]
        },

        tooltip: {
            // headerFormat: 'x',
            pointFormat: '{series.name} : {point.y:.2f}' + ' ' + 'mm/mnt'
        },

        legend: {
            enabled: false
        },

        exporting: {
            enabled: false
        },

        series: []

    }

    var options10 = {
        chart: {
            renderTo: 'rainkripik_real',
            type: 'spline',
            animation: Highcharts.svg, // don't animate in old IE
            marginRight: 10,
            events: {
                load: function() {

                    // set up the updating of the chart each second
                    var series = this.series[0];

                    setInterval(function() {
                        json_path2 = "../inc/olah.php?j=realtimekripik";
                        $.getJSON(json_path2, function(json) {
                            tgl_wkt = json.tanggal + ' ' + json.waktu; //bikin 2020-11-20 10:00:00
                            // console.log("tgl_wkt="+tanggal);
                            // console.log("waktu="+waktu);

                            //var x = (new Date(tgl_wkt)).getTime(), //konversi ke millisecond
                            var x = json.waktu, //konversi ke millisecond
                                y = Number(json.curah_hujan);

                            // console.log("X="+x+"=Y="+y);
                            series.addPoint([x, y], true, true);
                        })
                    }, 60000);
                }
            }
        },

        credits: {
            enabled: false
        },

        time: {
            useUTC: false
        },

        title: {
            text: 'Curah Hujan (mm)'
        },

        accessibility: {
            announceNewData: {
                enabled: true,
                minAnnounceInterval: 15000,
                announcementFormatter: function(allSeries, newSeries, newPoint) {
                    if (newPoint) {
                        return 'New point added. Value: ' + newPoint.y;
                    }
                    return false;
                }
            }
        },

        xAxis: {
            type: 'category',
            tickPixelInterval: 150
        },

        yAxis: {
            title: {
                text: 'Curah Hujan(mm)'
            },
            plotLines: [{
                value: 0,
                width: 1,
                color: '#808080'
            }]
        },

        tooltip: {
            // headerFormat: 'x',
            pointFormat: '{series.name} : {point.y:.2f}' + ' ' + 'mm/mnt'
        },

        legend: {
            enabled: false
        },

        exporting: {
            enabled: false
        },

        series: []

    }

    
    var options11 = {
        chart: {
            renderTo: 'raingarang_real',
            type: 'spline',
            animation: Highcharts.svg, // don't animate in old IE
            marginRight: 10,
            events: {
                load: function() {

                    // set up the updating of the chart each second
                    var series = this.series[0];

                    setInterval(function() {
                        json_path3 = "../inc/olah.php?j=realtimegarang";
                        $.getJSON(json_path3, function(json) {
                            tgl_wkt = json.tanggal + ' ' + json.waktu; //bikin 2020-11-20 10:00:00
                            // console.log("tgl_wkt="+tgl_wkt);

                            //var x = (new Date(tgl_wkt)).getTime(), //konversi ke millisecond
                            var x = json.waktu, //konversi ke millisecond
                                y = Number(json.curah_hujan);

                            //console.log("X="+x+"=Y="+y);
                            series.addPoint([x, y], true, true);
                        })
                    }, 60000);
                }
            }
        },

        credits: {
            enabled: false
        },

        time: {
            useUTC: false
        },

        title: {
            text: 'Curah Hujan(mm)'
        },

        accessibility: {
            announceNewData: {
                enabled: true,
                minAnnounceInterval: 15000,
                announcementFormatter: function(allSeries, newSeries, newPoint) {
                    if (newPoint) {
                        return 'New point added. Value: ' + newPoint.y;
                    }
                    return false;
                }
            }
        },

        xAxis: {
            type: 'category',
            tickPixelInterval: 150
        },

        yAxis: {
            title: {
                text: 'Curah Hujan (mm)'
            },
            plotLines: [{
                value: 0,
                width: 1,
                color: '#808080'
            }]
        },

        tooltip: {
            // headerFormat: 'x',
            pointFormat: '{series.name} : {point.y:.2f}' + ' ' + 'mm/mnt'
        },

        legend: {
            enabled: false
        },

        exporting: {
            enabled: false
        },

        series: []

    }
    json_path3 = `../inc/olah.php?j=realtime_awal`;
    json_path2 = `../inc/olah.php?j=realtime_awal_kripik`;
    json_path12 = `../inc/olah.php?j=realtime_awal_garang`;
    
    $.getJSON(json_path3, function(json) {
            options1.series[0] = json[0];
            chart1 = new Highcharts.Chart(options1);
        });
    
    $.getJSON(json_path2, function(json) {
            //options2.xAxis.categories = json[0]['data'];
            options10.series[0] = json[0];
    
            chart2 = new Highcharts.Chart(options10);
    
        });
    
    $.getJSON(json_path12, function(json) {
            //options2.xAxis.categories = json[0]['data'];
            options11.series[0] = json[0];
    
            chart4 = new Highcharts.Chart(options11);
    
        });
        
    
    
   document.getElementById('timeFilterForm').addEventListener('submit', function(event) {
        event.preventDefault();
        
        var timeFilterValue = document.getElementById('timeFilter').value;
        var timeFill = document.getElementById('jamFill').value;
        var menitFill = document.getElementById('menitFill').value;
    
        // Menambahkan parameter time ke URL json_path3 dengan menggunakan '=' bukan hanya nama variabel
        if (!timeFill) {
            json_path3 = `../inc/olah.php?j=realtime_awal&timeFilter=${timeFilterValue}`;
        } else if(!menitFill) {
            json_path3 = `../inc/olah.php?j=realtime_awal&timeFilter=${timeFilterValue}&time=${timeFill}`;
        } else {
            json_path3 = `../inc/olah.php?j=realtime_awal&timeFilter=${timeFilterValue}&time=${timeFill}&menit=${menitFill}`;
        }
        
        // json_path2 = "../inc/olah.php?j=realtime_awal_kripik";
        // json_path12 = "../inc/olah.php?j=realtime_awal_garang";
    
        $.getJSON(json_path3, function(json) {
            options1.series[0] = json[0];
            chart1 = new Highcharts.Chart(options1);
        });
    });

    
    document.getElementById('timeFilterFormKripik').addEventListener('submit', function(event) {
        event.preventDefault();
        
        var timeFilterValue = document.getElementById('timeFilterKripik').value;
        var timeFill = document.getElementById('jamFillKripik').value;
        var menitFill = document.getElementById('menitFillKripik').value;
    
        // Menambahkan parameter time ke URL json_path3 dengan menggunakan '=' bukan hanya nama variabel
        if (!timeFill) {
            json_path2 = `../inc/olah.php?j=realtime_awal_kripik&timeFilter=${timeFilterValue}`;
        } else if(!menitFill) {
            json_path2 = `../inc/olah.php?j=realtime_awal_kripik&timeFilter=${timeFilterValue}&time=${timeFill}`;
        } else{
            json_path2 = `../inc/olah.php?j=realtime_awal_kripik&timeFilter=${timeFilterValue}&time=${timeFill}&menit=${menitFill}`;
        }
        
        // json_path2 = "../inc/olah.php?j=realtime_awal_kripik";
        // json_path12 = "../inc/olah.php?j=realtime_awal_garang";
    
        $.getJSON(json_path2, function(json) {
            //options2.xAxis.categories = json[0]['data'];
            options10.series[0] = json[0];
    
            chart2 = new Highcharts.Chart(options10);
    
        });
    });
    
    document.getElementById('timeFilterFormGarang').addEventListener('submit', function(event) {
        event.preventDefault();
        
        var timeFilterValue = document.getElementById('timeFilterGarang').value;
        var timeFill = document.getElementById('jamFillGarang').value;
        var menitFill = document.getElementById('menitFillGarang').value;
    
        // Menambahkan parameter time ke URL json_path3 dengan menggunakan '=' bukan hanya nama variabel
        if (!timeFill) {
            json_path12 = `../inc/olah.php?j=realtime_awal_garang&timeFilter=${timeFilterValue}`;
        } else if(!menitFill) {
            json_path12 = `../inc/olah.php?j=realtime_awal_garang&timeFilter=${timeFilterValue}&time=${timeFill}`;
        } else{
            json_path12 = `../inc/olah.php?j=realtime_awal_garang&timeFilter=${timeFilterValue}&time=${timeFill}&menit=${menitFill}`;
        }
        
        // json_path2 = "../inc/olah.php?j=realtime_awal_kripik";
        // json_path12 = "../inc/olah.php?j=realtime_awal_garang";
    
       $.getJSON(json_path12, function(json) {
            //options2.xAxis.categories = json[0]['data'];
            options11.series[0] = json[0];
    
            chart4 = new Highcharts.Chart(options11);
    
        });
    });


    
</script>

    <script>
        var options2 = {
            chart: {
                renderTo: 'sed_real',
                type: 'spline',
                animation: Highcharts.svg, // don't animate in old IE
                marginRight: 10,
                events: {
                    load: function() {

                        // set up the updating of the chart each second
                        var series = this.series[0];

                        setInterval(function() {
                            json_path4 = "../inc/olah.php?j=realtime";
                            $.getJSON(json_path4, function(json) {
                                // tgl_wkt = json.tanggal + ' ' + json.waktu; //bikin 2020-11-20 10:00:00
                                // console.log("tgl_wkt="+tgl_wkt);

                                //var x = (new Date(tgl_wkt)).getTime(), //konversi ke millisecond
                                var x = json.waktu, //konversi ke millisecond
                                    y = Number(json.sed_sim);

                                //console.log("X="+x+"=Y="+y);
                                series.addPoint([x, y], true, true);
                            })
                        }, 60000);
                    }
                }
            },

            credits: {
                enabled: false
            },

            time: {
                useUTC: false
            },

            title: {
                text: 'Sed Sim (Ton/hari)'
            },

            accessibility: {
                announceNewData: {
                    enabled: true,
                    minAnnounceInterval: 15000,
                    announcementFormatter: function(allSeries, newSeries, newPoint) {
                        if (newPoint) {
                            return 'New point added. Value: ' + newPoint.y;
                        }
                        return false;
                    }
                }
            },

            xAxis: {
                type: 'category',
                tickPixelInterval: 150
            },

            yAxis: {
                title: {
                    text: 'Sed Sim (Ton/hari)'
                },
                plotLines: [{
                    value: 0,
                    width: 1,
                    color: '#808080'
                }]
            },

            tooltip: {
                // headerFormat: 'x',
                pointFormat: '{series.name} : {point.y:.2f}' + ' ' + 'ton/mnt'
            },

            legend: {
                enabled: false
            },

            exporting: {
                enabled: false
            },

            series: []

        }
        
        var options3 = {
            chart: {
                renderTo: 'sedkripik_real',
                type: 'spline',
                animation: Highcharts.svg, // don't animate in old IE
                marginRight: 10,
                events: {
                    load: function() {

                        // set up the updating of the chart each second
                        var series = this.series[0];

                        setInterval(function() {
                            json_path6 = "../inc/olah.php?j=realtimekripik";
                            $.getJSON(json_path6, function(json) {
                                // tgl_wkt = json.tanggal + ' ' + json.waktu; //bikin 2020-11-20 10:00:00
                                // console.log("tgl_wkt="+tgl_wkt);

                                //var x = (new Date(tgl_wkt)).getTime(), //konversi ke millisecond
                                var x = json.waktu, //konversi ke millisecond
                                    y = Number(json.sed_sim);

                                //console.log("X="+x+"=Y="+y);
                                series.addPoint([x, y], true, true);
                            })
                        }, 60000);
                    }
                }
            },

            credits: {
                enabled: false
            },

            time: {
                useUTC: false
            },

            title: {
                text: 'Sed Sim (Ton/hari)'
            },

            accessibility: {
                announceNewData: {
                    enabled: true,
                    minAnnounceInterval: 15000,
                    announcementFormatter: function(allSeries, newSeries, newPoint) {
                        if (newPoint) {
                            return 'New point added. Value: ' + newPoint.y;
                        }
                        return false;
                    }
                }
            },

            xAxis: {
                type: 'category',
                tickPixelInterval: 150
            },

            yAxis: {
                title: {
                    text: 'Sed Sim (Ton/hari)'
                },
                plotLines: [{
                    value: 0,
                    width: 1,
                    color: '#808080'
                }]
            },

            tooltip: {
                // headerFormat: 'x',
                pointFormat: '{series.name} : {point.y:.2f}' + ' ' + 'ton/mnt'
            },

            legend: {
                enabled: false
            },

            exporting: {
                enabled: false
            },

            series: []

        }
        
        var options7 = {
            chart: {
                renderTo: 'sed_realgarang',
                type: 'spline',
                animation: Highcharts.svg, // don't animate in old IE
                marginRight: 10,
                events: {
                    load: function() {

                        // set up the updating of the chart each second
                        var series = this.series[0];

                        setInterval(function() {
                            json_path8 = "../inc/olah.php?j=realtimegarang";
                            $.getJSON(json_path8, function(json) {
                                // tgl_wkt = json.tanggal + ' ' + json.waktu; //bikin 2020-11-20 10:00:00
                                // console.log("tgl_wkt="+tgl_wkt);

                                //var x = (new Date(tgl_wkt)).getTime(), //konversi ke millisecond
                                var x = json.waktu, //konversi ke millisecond
                                    y = Number(json.deb_banjir);

                                //console.log("X="+x+"=Y="+y);
                                series.addPoint([x, y], true, true);
                            })
                        }, 60000);
                    }
                }
            },

            credits: {
                enabled: false
            },

            time: {
                useUTC: false
            },

            title: {
                text: 'Sed Sim (Ton/hari)'
            },

            accessibility: {
                announceNewData: {
                    enabled: true,
                    minAnnounceInterval: 15000,
                    announcementFormatter: function(allSeries, newSeries, newPoint) {
                        if (newPoint) {
                            return 'New point added. Value: ' + newPoint.y;
                        }
                        return false;
                    }
                }
            },

            xAxis: {
                type: 'category',
                tickPixelInterval: 150
            },

            yAxis: {
                title: {
                    text: 'Sed Sim (Ton/hari)'
                },
                plotLines: [{
                    value: 0,
                    width: 1,
                    color: '#808080'
                }]
            },

            tooltip: {
                // headerFormat: 'x',
                pointFormat: '{series.name} : {point.y:.2f}' + ' ' + 'ton/mnt'
            },

            legend: {
                enabled: false
            },

            exporting: {
                enabled: false
            },

            series: []

        }

        json_path3 = "../inc/olah.php?j=realtime_awal1";
        json_path5 = "../inc/olah.php?j=realtime_awal1kripik";
        json_path7 = "../inc/olah.php?j=realtime_awal1garang";
        
        $.getJSON(json_path3, function(json) {
            //options.xAxis.categories = json[0]['data'];
            options2.series[0] = json[0];

            chart = new Highcharts.Chart(options2);

        });
         $.getJSON(json_path5, function(json) {
            //options.xAxis.categories = json[0]['data'];
            options3.series[0] = json[0];

            chart = new Highcharts.Chart(options3);

        });
         $.getJSON(json_path7, function(json) {
            //options.xAxis.categories = json[0]['data'];
            options7.series[0] = json[0];

            chart = new Highcharts.Chart(options7);

        });
        
        document.getElementById('timeFilterFormSed').addEventListener('submit', function(event) {
            event.preventDefault();
            
            var timeFilterValue = document.getElementById('timeFilterSed').value;
            var timeFill = document.getElementById('jamFillSed').value;
            var menitFill = document.getElementById('menitFillSed').value;
        
            // Menambahkan parameter time ke URL json_path3 dengan menggunakan '=' bukan hanya nama variabel
            if (!timeFill) {
                json_path3 = `../inc/olah.php?j=realtime_awal1&timeFilter=${timeFilterValue}`;
            } else if(!menitFill) {
                json_path3 = `../inc/olah.php?j=realtime_awal1&timeFilter=${timeFilterValue}&time=${timeFill}`;
            } else {
                json_path3 = `../inc/olah.php?j=realtime_awal1&timeFilter=${timeFilterValue}&time=${timeFill}&menit=${menitFill}`;
            }
            
            // json_path2 = "../inc/olah.php?j=realtime_awal_kripik";
            // json_path12 = "../inc/olah.php?j=realtime_awal_garang";
        
            $.getJSON(json_path3, function(json) {
                //options.xAxis.categories = json[0]['data'];
                options2.series[0] = json[0];
    
                chart = new Highcharts.Chart(options2);
    
            });
        });
    
        
        document.getElementById('timeFilterFormSedKripik').addEventListener('submit', function(event) {
            event.preventDefault();
            
            var timeFilterValue = document.getElementById('timeFilterSedKripik').value;
            var timeFill = document.getElementById('jamFillSedKripik').value;
            var menitFill = document.getElementById('menitFillSedKripik').value;
        
            // Menambahkan parameter time ke URL json_path3 dengan menggunakan '=' bukan hanya nama variabel
            if (!timeFill) {
                json_path5 = `../inc/olah.php?j=realtime_awal1kripik&timeFilter=${timeFilterValue}`;
            } else if(!menitFill) {
                json_path5 = `../inc/olah.php?j=realtime_awal1kripik&timeFilter=${timeFilterValue}&time=${timeFill}`;
            } else{
                json_path5 = `../inc/olah.php?j=realtime_awal1kripik&timeFilter=${timeFilterValue}&time=${timeFill}&menit=${menitFill}`;
            }
            
            // json_path2 = "../inc/olah.php?j=realtime_awal_kripik";
            // json_path12 = "../inc/olah.php?j=realtime_awal_garang";
        
             $.getJSON(json_path5, function(json) {
                //options.xAxis.categories = json[0]['data'];
                options3.series[0] = json[0];
    
                chart = new Highcharts.Chart(options3);
    
            });
        });
        
        document.getElementById('timeFilterFormSedGarang').addEventListener('submit', function(event) {
            event.preventDefault();
            
            var timeFilterValue = document.getElementById('timeFilterSedGarang').value;
            var timeFill = document.getElementById('jamFillSedGarang').value;
            var menitFill = document.getElementById('menitFillSedGarang').value;
        
            // Menambahkan parameter time ke URL json_path3 dengan menggunakan '=' bukan hanya nama variabel
            if (!timeFill) {
                json_path7 = `../inc/olah.php?j=realtime_awal1garang&timeFilter=${timeFilterValue}`;
            } else if(!menitFill) {
                json_path7 = `../inc/olah.php?j=realtime_awal1garang&timeFilter=${timeFilterValue}&time=${timeFill}`;
            } else{
                json_path7 = `../inc/olah.php?j=realtime_awal1garang&timeFilter=${timeFilterValue}&time=${timeFill}&menit=${menitFill}`;
            }
            
            // json_path2 = "../inc/olah.php?j=realtime_awal_kripik";
            // json_path12 = "../inc/olah.php?j=realtime_awal_garang";
        
           $.getJSON(json_path7, function(json) {
                //options.xAxis.categories = json[0]['data'];
                options7.series[0] = json[0];
    
                chart = new Highcharts.Chart(options7);
    
            });
        });
    </script>
    <script>
        var options4 = {
            chart: {
                renderTo: 'deb_real',
                type: 'spline',
                animation: Highcharts.svg, // don't animate in old IE
                marginRight: 10,
                events: {
                    load: function() {

                        // set up the updating of the chart each second
                        var series = this.series[0];

                        setInterval(function() {
                            json_path6 = "../inc/olah.php?j=realtime";
                            $.getJSON(json_path6, function(json) {
                                // tgl_wkt = json.tanggal + ' ' + json.waktu; //bikin 2020-11-20 10:00:00
                                // console.log("tgl_wkt="+tgl_wkt);

                                //var x = (new Date(tgl_wkt)).getTime(), //konversi ke millisecond
                                var x = json.waktu, //konversi ke millisecond
                                    y = Number(json.deb_banjir);

                                //console.log("X="+x+"=Y="+y);
                                series.addPoint([x, y], true, true);
                            })
                        }, 60000);
                    }
                }
            },

            credits: {
                enabled: false
            },

            time: {
                useUTC: false
            },

            title: {
                text: 'Deb Banjir (M3/det)'
            },

            accessibility: {
                announceNewData: {
                    enabled: true,
                    minAnnounceInterval: 15000,
                    announcementFormatter: function(allSeries, newSeries, newPoint) {
                        if (newPoint) {
                            return 'New point added. Value: ' + newPoint.y;
                        }
                        return false;
                    }
                }
            },

            xAxis: {
                type: 'category',
                tickPixelInterval: 150
            },

            yAxis: {
                title: {
                    text: 'Deb Banjir (M3/det)'
                },
                plotLines: [{
                    value: 0,
                    width: 1,
                    color: '#808080'
                }]
            },

            tooltip: {
                // headerFormat: 'x',
                pointFormat: '{series.name} : {point.y:.2f}' + ' ' + 'ton/mnt'
            },

            legend: {
                enabled: false
            },

            exporting: {
                enabled: false
            },

            series: []

        }

        var options8 = {
            chart: {
                renderTo: 'debkripik_real',
                type: 'spline',
                animation: Highcharts.svg, // don't animate in old IE
                marginRight: 10,
                events: {
                    load: function() {

                        // set up the updating of the chart each second
                        var series = this.series[0];

                        setInterval(function() {
                            json_path7 = "../inc/olah.php?j=realtimekripik";
                            $.getJSON(json_path7, function(json) {
                                // tgl_wkt = json.tanggal + ' ' + json.waktu; //bikin 2020-11-20 10:00:00
                                // console.log("tgl_wkt="+tgl_wkt);

                                //var x = (new Date(tgl_wkt)).getTime(), //konversi ke millisecond
                                var x = json.waktu, //konversi ke millisecond
                                    y = Number(json.deb_banjir);

                                //console.log("X="+x+"=Y="+y);
                                series.addPoint([x, y], true, true);
                            })
                        }, 60000);
                    }
                }
            },

            credits: {
                enabled: false
            },

            time: {
                useUTC: false
            },

            title: {
                text: 'Deb Banjir (M3/det)'
            },

            accessibility: {
                announceNewData: {
                    enabled: true,
                    minAnnounceInterval: 15000,
                    announcementFormatter: function(allSeries, newSeries, newPoint) {
                        if (newPoint) {
                            return 'New point added. Value: ' + newPoint.y;
                        }
                        return false;
                    }
                }
            },

            xAxis: {
                type: 'category',
                tickPixelInterval: 150
            },

            yAxis: {
                title: {
                    text: 'Deb Banjir (M3/det)'
                },
                plotLines: [{
                    value: 0,
                    width: 1,
                    color: '#808080'
                }]
            },

            tooltip: {
                // headerFormat: 'x',
                pointFormat: '{series.name} : {point.y:.2f}' + ' ' + 'ton/mnt'
            },

            legend: {
                enabled: false
            },

            exporting: {
                enabled: false
            },

            series: []

        }
        
        var options9 = {
            chart: {
                renderTo: 'debgarang_real',
                type: 'spline',
                animation: Highcharts.svg, // don't animate in old IE
                marginRight: 10,
                events: {
                    load: function() {

                        // set up the updating of the chart each second
                        var series = this.series[0];

                        setInterval(function() {
                            json_path7 = "../inc/olah.php?j=realtimegarang";
                            $.getJSON(json_path7, function(json) {
                                // tgl_wkt = json.tanggal + ' ' + json.waktu; //bikin 2020-11-20 10:00:00
                                // console.log("tgl_wkt="+tgl_wkt);

                                //var x = (new Date(tgl_wkt)).getTime(), //konversi ke millisecond
                                var x = json.waktu, //konversi ke millisecond
                                    y = Number(json.deb_banjir);
                                    

                                //console.log("X="+x+"=Y="+y);
                                series.addPoint([x, y], true, true);
                            })
                        }, 60000);
                    }
                }
            },

            credits: {
                enabled: false
            },

            time: {
                useUTC: false
            },

            title: {
                text: 'Deb Banjir (M3/det)'
            },

            accessibility: {
                announceNewData: {
                    enabled: true,
                    minAnnounceInterval: 15000,
                    announcementFormatter: function(allSeries, newSeries, newPoint) {
                        if (newPoint) {
                            return 'New point added. Value: ' + newPoint.y;
                        }
                        return false;
                    }
                }
            },

            xAxis: {
                type: 'category',
                tickPixelInterval: 150
            },

            yAxis: {
                title: {
                    text: 'Deb Banjir (M3/det)'
                },
                plotLines: [{
                    value: 0,
                    width: 1,
                    color: '#808080'
                }]
            },

            tooltip: {
                // headerFormat: 'x',
                pointFormat: '{series.name} : {point.y:.2f}' + ' ' + 'ton/mnt'
            },

            legend: {
                enabled: false
            },

            exporting: {
                enabled: false
            },

            series: []

        }

        json_path6 = "../inc/olah.php?j=realtime_awal2garang";
        json_path5 = "../inc/olah.php?j=realtime_awal2kripik";
        json_path4 = "../inc/olah.php?j=realtime_awal2";

        $.getJSON(json_path4, function(json) {
            //options.xAxis.categories = json[0]['data'];
            options4.series[0] = json[0];

            chart = new Highcharts.Chart(options4);

        });
         $.getJSON(json_path6, function(json) {
            //options.xAxis.categories = json[0]['data'];
            options9.series[0] = json[0];

            chart = new Highcharts.Chart(options9);

        });

        $.getJSON(json_path5, function(json) {
            //options.xAxis.categories = json[0]['data'];
            options8.series[0] = json[0];

            chart = new Highcharts.Chart(options8);

        });
        
        document.getElementById('timeFilterFormDeb').addEventListener('submit', function(event) {
            event.preventDefault();
            
            var timeFilterValue = document.getElementById('timeFilterDeb').value;
            var timeFill = document.getElementById('jamFillDeb').value;
            var menitFill = document.getElementById('menitFillDeb').value;
        
            // Menambahkan parameter time ke URL json_path3 dengan menggunakan '=' bukan hanya nama variabel
            if (!timeFill) {
                json_path4 = `../inc/olah.php?j=realtime_awal2&timeFilter=${timeFilterValue}`;
            } else if(!menitFill) {
                json_path4 = `../inc/olah.php?j=realtime_awal2&timeFilter=${timeFilterValue}&time=${timeFill}`;
            } else{
                json_path4 = `../inc/olah.php?j=realtime_awal2&timeFilter=${timeFilterValue}&time=${timeFill}&menit=${menitFill}`;
            }
            
            // json_path2 = "../inc/olah.php?j=realtime_awal_kripik";
            // json_path12 = "../inc/olah.php?j=realtime_awal_garang";
        
            $.getJSON(json_path4, function(json) {
                //options.xAxis.categories = json[0]['data'];
                options4.series[0] = json[0];
    
                chart = new Highcharts.Chart(options4);
    
            });
        });
    
        
        document.getElementById('timeFilterFormDebKripik').addEventListener('submit', function(event) {
            event.preventDefault();
            
            var timeFilterValue = document.getElementById('timeFilterDebKripik').value;
            var timeFill = document.getElementById('jamFillDebKripik').value;
            var menitFill = document.getElementById('menitFillDebKripik').value;
            
             // Menambahkan parameter time ke URL json_path3 dengan menggunakan '=' bukan hanya nama variabel
            if (!timeFill) {
                json_path5 = `../inc/olah.php?j=realtime_awal2kripik&timeFilter=${timeFilterValue}`;
            } else if(!menitFill) {
                json_path5 = `../inc/olah.php?j=realtime_awal2kripik&timeFilter=${timeFilterValue}&time=${timeFill}`;
            } else{
                json_path5 = `../inc/olah.php?j=realtime_awal2kripik&timeFilter=${timeFilterValue}&time=${timeFill}&menit=${menitFill}`;
            }
            
            // json_path2 = "../inc/olah.php?j=realtime_awal_kripik";
            // json_path12 = "../inc/olah.php?j=realtime_awal_garang";
        
            $.getJSON(json_path5, function(json) {
            //options.xAxis.categories = json[0]['data'];
            options8.series[0] = json[0];

            chart = new Highcharts.Chart(options8);

        });
        
            
        });
        
        document.getElementById('timeFilterFormDebGarang').addEventListener('submit', function(event) {
            event.preventDefault();
            
            var timeFilterValue = document.getElementById('timeFilterDebGarang').value;
            var timeFill = document.getElementById('jamFillDebGarang').value;
            var menitFill = document.getElementById('menitFillDebGarang').value;
        
            // Menambahkan parameter time ke URL json_path3 dengan menggunakan '=' bukan hanya nama variabel
            if (!timeFill) {
                json_path6 = `../inc/olah.php?j=realtime_awal2garang&timeFilter=${timeFilterValue}`;
            } else if(!menitFill) {
                json_path6 = `../inc/olah.php?j=realtime_awal2garang&timeFilter=${timeFilterValue}&time=${timeFill}`;
            } else{
                json_path6 = `../inc/olah.php?j=realtime_awal2garang&timeFilter=${timeFilterValue}&time=${timeFill}&menit=${menitFill}`;
            }
            
            // json_path2 = "../inc/olah.php?j=realtime_awal_kripik";
            // json_path12 = "../inc/olah.php?j=realtime_awal_garang";
        
            $.getJSON(json_path6, function(json) {
                //options.xAxis.categories = json[0]['data'];
                options9.series[0] = json[0];
    
                chart = new Highcharts.Chart(options9);
    
            });
        });
    </script>
<?php
}
?>