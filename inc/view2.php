<?php
function dashboard()
{
    global $link;
    global $level; //$level ini diambil dari func.php
?>
    <div class="sidebar" data-color="orange" data-background-color="orange" data-image="../img/sidebar2.jpg" align="left">
        <div class="logo"><a href="index.php" class="simple-text logo-normal">TANK SEDIMENT</a></div>
        <div class="sidebar-wrapper">
            <nav class="sidebar-nav">
                <ul class="nav">
                    <?php
                    ?>
                    <?php
                    if ($level == "Admin") {
                    ?>
                        <li class="nav-item  ">
                            <a class="nav-link" href="index.php?p=main">
                                <i class="material-icons">dashboard</i>
                                <p>Dashboard</p>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link" href="index.php?p=userprofile">
                                <i class="material-icons">person</i>
                                <p>User Profile</p>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link" href="index.php?p=manageuser">
                                <i class="material-icons">group</i>
                                <p>Manage User</p>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link" href="index.php?p=configuration">
                                <i class="material-icons">content_paste</i>
                                <p>Configuration</p>
                            </a>
                        </li>
                        <!-- <li class="nav-item ">
                            <a class="nav-link" href="index.php?p=monitoring">
                                <i class="material-icons">bubble_chart</i>
                                <p>Monitoring</p>
                            </a>
                        </li> -->
                    <?php
                    } else {
                    ?>
                        <li class="nav-item active  ">
                            <a class="nav-link" href="index.php?p=main">
                                <i class="material-icons">dashboard</i>
                                <p>Dashboard</p>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link" href="index.php?p=userprofile">
                                <i class="material-icons">person</i>
                                <p>User Profile</p>
                            </a>
                        </li>
                        <!-- <li class="nav-item ">
                            <a class="nav-link" href="./tables.html">
                                <i class="material-icons">content_paste</i>
                                <p>Table List</p>
                            </a>
                        </li> -->
                    <?php
                    }
                    ?>
                </ul>
            </nav>
        </div>
    </div>
    <header class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
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
                    <li class="nav-item dropdown">
                        <a class="nav-link" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" role="button">
                            <i class="material-icons">dashboard</i>
                            <p class="d-lg-none d-md-block">
                                Stats
                            </p>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <?php
                            $q = mysqli_query($link, "SELECT produk.nama, produk.sn  FROM login JOIN produk ON login.username = produk.username WHERE login.username= 'tedjo.mulyono@polines.ac.id'");
                            while ($d = mysqli_fetch_row($q)) {
                                echo "<a class=\"dropdown-item\" href=index.php?sn=$d[1]>$d[0]</a>";
                            } ?>
                        </div>
                    </li>
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
                    <li class="nav-item dropdown">
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
    </header>
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
                                        <input type="file" id="file" name="file" class="custom-file-input" />
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
                            <button type="submit" name="add" id="add_user" class="btn btn-warning btn-md">ADD USER</button>
                            <div class="input-group-prepend" style="padding-left:15px">
                                <span class="input-group-text"><i class="fas fa-search"></i></span>
                            </div>
                            <input type="text" id="search1" class="form-control" placeholder="Search ..." />
                        </div>
                        <div class="card">
                            <div class="card-header card-header-tabs card-header-warning">
                                <h2 align="left">USER LIST</h2>
                            </div>
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
        echo "<p>" . $_GET['berhasil'] . " Data berhasil di import.</p>";
    }
    ?>
    <div class="main-panel">
        <div class="content" style="margin-top: -15px">
            <div class="row">
                <div class="col-lg-12 col-md-12" id="2" style="margin-top:50px">
                    <div class="card">
                        <div class="card-header card-header-tabs card-header-warning">
                            <h2 align="left" class="card-title">UPLOAD DATA</h2>
                            <p align="left" class="card-category">The Uploaded Data Must In .xls Format</p>
                        </div>
                        <div class="card-body">
                            <div class="tab-pane active">
                                <div class="tab-responsive">
                                    <form method="post" enctype="multipart/form-data" action="../inc/upload_aksi.php">
                                        <label for="foto_profil">File:</label><br>
                                        <div class="custom-file mb-3">
                                            <input type="file" id="file" name="file" class="custom-file-input" required />
                                            <label class="custom-file-label" for="file">Choose File</label>
                                        </div>
                                        <button type="submit" id="upload" name="upload" class="btn btn-success pull-left" value="Import">Import</button>
                                    </form>
                                    <div class="table-responsive" id="tabeldebit" style="margin-top:80px">
                                        <table class="table table-hover table-lg" id="dataTable">
                                            <thead>
                                                <tr>
                                                    <th>
                                                        <h5>No</h5>
                                                    </th>
                                                    <th>
                                                        <h5>Ha</h5>
                                                    </th>
                                                    <th>
                                                        <h5>ha1</h5>
                                                    </th>
                                                    <th>
                                                        <h5>a1</h5>
                                                    </th>
                                                    <th>
                                                        <h5>Ch</h5>
                                                    <th>
                                                        <h5>ha2</h5>
                                                    <th>
                                                        <h5>a2</h5>
                                                    <th>
                                                        <h5>a0</t6>
                                                    <th>
                                                        <h5>Lokasi</h5>
                                                    <th>
                                                        <h5>Tanggal</h5>
                                                    <th>
                                                        <h5>Waktu</h5>
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
                    $("#tabeldebit tbody").append("<tr><td>" + j + "</td><td>" + d.Ha[i] + "</td><td>" + d.ha1[i] + "</td><td>" + d.a1[i] + "</td><td>" + d.Ch[i] + "</td><td>" + d.ha2[i] + "</td><td>" + d.a2[i] + "</td><td>" + d.a0[i] + "</td><td>" + d.lokasi[i] + "</td><td>" + d.tanggal[i] + "</td><td>" + d.waktu[i] + "</td></tr>");
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
        <div class="content" style="margin-top:60px">
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
                                                <input type="file" id="file" name="file" class="custom-file-input" width="100" />
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
                                    <button type="submit" class="btn btn-success pull-right" name="simpan">Update Profile</button>
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
    $sn = $_GET['sn'];

    $q3 = mysqli_query($link, "SELECT tanggal FROM curah_hujan where sn='$sn' order by id desc limit 1");
    $d3 = mysqli_fetch_row($q3);
    $date = $d3[0];

    $q4 = mysqli_query($link, "SELECT waktu FROM curah_hujan where sn='$sn' order by id desc limit 1");
    $d4 = mysqli_fetch_row($q4);
    $time = $d4[0];

    $q5 = mysqli_query($link, "SELECT curah_hujan FROM curah_hujan where sn='$sn' ORDER BY id DESC limit 1");
    $d5 = mysqli_fetch_row($q5);
    $rainfall = $d5[0];

    $q6 = mysqli_query($link, "SELECT lokasi FROM curah_hujan where sn='$sn' ORDER BY id DESC limit 1");
    $d6 = mysqli_fetch_row($q6);
    $location = $d6[0];

    $q7 = mysqli_query($link, "SELECT tanggal FROM curah_hujan where sn='$sn' ORDER BY id DESC limit 1");
    $d7 = mysqli_fetch_row($q7);
    $tanggal = $d7[0];

    $q8 = mysqli_query($link, "SELECT waktu FROM curah_hujan where sn='$sn' ORDER BY id DESC limit 1");
    $d8 = mysqli_fetch_row($q8);
    $waktu = $d8[0];

    $q9 = mysqli_query($link, "SELECT sed_sim FROM curah_hujan where sn='$sn' ORDER BY id DESC limit 1");
    $row = mysqli_fetch_row($q9);
    $sed_sim = $row[0];

?>
    <div class="main-panel">
        <div class="content">
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
                    hreff = window.location.href;
                    str = hreff.split("=");
                    // console.log("urlnya:" + hreff + " ==>" + str[1]);
                    sn = str[1];
                    // $("#" + id + ",#" + id_icon).fadeOut();
                    // $("#" + id_export).fadeIn();
                    $("#" + id_form).fadeOut();
                    grafik(parameter, tgl_last_update, '', sn);
                    $("#" + id_chart).fadeOut();
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
                        location.replace("index.php?sn=2021100002");
                    });
                }

                function jdw_open(id_spin, id_form, id_chart, id_export, id_real) {
                    $("#" + id_spin + " .jdw").click(function(e) {
                        $("#" + id_chart + ",#" + id_id_real + ",#" + id_export).fadeOut();
                        $("#" + id_form).fadeIn('slow');
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
            <div class="content" style="margin-top:-50px">
                <div class="row">

                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="card card-stats">
                            <div class="card-header card-header-danger card-header-icon">
                                <div class="card-icon">
                                    <i class="fa fa-map-marker"></i>
                                </div>
                                <p class="card-category">Location</p>
                                <b class="card-title" id="location" style="font-size:20px"><?php echo $location ?></b>
                            </div>
                            <div class="card-footer">
                                <div class="stats">
                                    <i class="material-icons">local_offer</i>Last 24 Hours
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="card card-stats">
                            <div class="card-header card-header-success card-header-icon">
                                <div class="card-icon">
                                    <i class="fa fa-calendar"></i>
                                </div>
                                <p class="card-category">Date</p>
                                <b class="card-title" id="tanggal" style="font-size:20px"><?php echo $tanggal ?></b>
                            </div>
                            <div class="card-footer">
                                <div class="stats">
                                    <i class="material-icons">date_range</i>Just Updated
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="card card-stats">
                            <div class="card-header card-header-warning card-header-icon">
                                <div class="card-icon">
                                    <i class="fa fa-clock-o"></i>
                                </div>
                                <p class="card-category">Date</p>
                                <b class="card-title" id="waktu" style="font-size:20px"><?php echo $waktu ?></b>
                            </div>
                            <div class="card-footer">
                                <div class="stats">
                                    <i class="material-icons">update</i> Just Updated
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row" style="margin-top:-20px">
                    <div class="col-lg-6 col-md-6" id="2" style="margin-top:50px">
                        <div class="card">
                            <div class="card-header card-header-tabs card-header-info">
                                <h2 align="left" class="card-title">CURAH HUJAN</h2>
                                <p align="left" class="card-category"></p>
                            </div>
                            <div class="card-body">
                                <!-- <h1 class="txt-center" style="margin-bottom : 15px; margin-top:10px">CURAH HUJAN</h1> -->
                                <p class="txt-center" style="margin-top:50px" id="last_update1" data-tgl_last_update="<?php echo $date ?>"> Last update: <?php echo $date ?> | <?php echo $time ?></p>
                                <div class="row animated bounce" align="center" style="margin-top:50px; margin-bottom:40px">
                                    <div class="col-sm-12" id="rain_spin">
                                        <div class="GaugeMeter" id="rain" data-percent="" data-used="" data-total="" data-label="Curah Hujan" data-text="" data-text_size="0.125" data-append="" data-size="290" data-width="30" data-style="Arch" data-theme="LightBlue-DarkBlue" data-animate_gauge_colors="true" data-animate_text_colors="true" style="height:280px" data-stripe="7"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6" id="2" style="margin-top:50px">
                        <div class="card">
                            <div class="card-header card-header-tabs card-header-info">
                                <h2 align="left" class="card-title">GRAFIK CURAH HUJAN</h2>
                            </div>
                            <div class="card-body">
                                <div class="row animated bounce" align="center" style="margin-top:40px;">
                                    <div class="col-sm-12" id="rain_spin">
                                        <div id="rain_icon" align="left" style="margin-top:-30px;margin-bottom:15px">
                                            <i class="far fa-calendar-alt fa-lg jdw"></i> &nbsp;</button>
                                            <!-- <i class="far fa-chart-bar fa-lg"></i></button> -->
                                        </div>
                                        <div id="rainn" data-tgl1="" data-tgl2="" data-waktu=""></div>
                                        <div id="rain_chart"></div>
                                        <div id="rain_real"></div>
                                        <div id="rain_button">
                                            <!-- <button type="button" class="btn btn-outline-dark btn-sm">Yesterday</button> -->
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
                    <div class="col-lg-6 col-md-6" id="3" style="margin-top:30px">
                        <div class="card">
                            <div class="card-header card-header-tabs card-header-danger">
                                <h2 align="left" class="card-title">SED SIM</h2>
                                <p align="left" class="card-category"></p>
                            </div>
                            <div class="card-body">
                                <!-- <h1 class="txt-center" style="margin-bottom : 15px; margin-top: 16px">SED SIM</h1> -->
                                <p class="txt-center" style="margin-top:50px" id="last_update" data-tgl_last_update="<?php echo $date ?>"> Last update: <?php echo $date ?> | <?php echo $time ?></p>
                                <div class="row animated bounce" align="center" style="margin-top:50px; margin-bottom:40px">
                                    <div class="col-sm-12" id="sed_spin">
                                        <div class="GaugeMeter" id="sed" data-percent="" data-used="" data-total="" data-label="Sed Sim" data-text="" data-text_size="0.125" data-append="" data-size="290" data-width="26" data-style="Arch" data-theme="Green-Gold-Red" data-animate_gauge_colors="true" data-animate_text_colors="true" style="height:285px" data-stripe="7"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- <div class="row" id="ph_int">
                                            <!-- <p style="margin: -35px auto; margin-left:300px"> 0 - 10 </p> 
                                        </div> -->
                    <div class="col-lg-6 col-md-6" id="3" style="margin-top:30px">
                        <div class="card">
                            <div class="card-header card-header-tabs card-header-danger">
                                <h2 align="left" class="card-title">GRAFIK SED SIM</h2>
                                <p align="left" class="card-category"></p>
                            </div>
                            <div class="card-body">
                                <div class="row animated bounce" align="center" style="margin-top:40px;">
                                    <div class="col-sm-12" id="sed_spin">
                                        <div id="sed_icon" align="left" style="margin-top:-30px;margin-bottom:20px">
                                            <i class="far fa-calendar-alt fa-lg jdw"></i> &nbsp;</button>
                                            <!-- <i class="far fa-chart-bar fa-lg"></i></button> -->
                                        </div>
                                        <div id="sedd" data-tgl1="" data-tgl2="" data-waktu=""></div>
                                        <div id="sed_chart"></div>
                                        <div id="sed_real"></div>
                                        <div id="sed_button">
                                            <!-- <button type="button" class="btn btn-outline-dark btn-sm">Yesterday</button> -->
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
                    </div>
                </div>
            </div>
        </div>
    </div>
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
                json_path = "../inc/olah.php?j=sed_sim&t=sed_sim&sn=" + sn + "&tgl1=" + tgl1 + "&tgl2=" + tgl2;
            } else if (tipe == 'rain') {
                render_to = 'rain_chart';
                title_text = 'CURAH HUJAN';
                sat = 'mm';
                yAxis_text = 'Curah Hujan (mm)';
                json_path = "../inc/olah.php?j=rain&t=rain&sn=" + sn + "&tgl1=" + tgl1 + "&tgl2=" + tgl2;
            } else if (tipe == 'rain_menit') {
                render_to = 'rain_chart';
                title_text = 'CURAH HUJAN';
                sat = 'mm';
                yAxis_text = 'Curah Hujan (mm)';
                json_path = "../inc/olah.php?j=menitan&t=rain_menit&sn=" + sn + "&tgl1=" + tgl1 + "&tgl2=" + tgl2 + "&waktu=" + waktu;
            } else if (tipe == 'sed_menit') {
                render_to = 'sed_chart';
                title_text = 'SED SIM';
                sat = 'ton';
                yAxis_text = 'Sed Sim';
                json_path = "../inc/olah.php?j=menitan&t=sed_menit&sn=" + sn + "&tgl1=" + tgl1 + "&tgl2=" + tgl2 + "&waktu=" + waktu;
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
                                waktuu = $("#sedd, #rainn").attr('data-waktu');
                                if (tgl_awal == tgl_akhir && waktuu == '') {
                                    $("#rain_chart, #sed_chart").hide();
                                    if (tipe == 'rain') tipe2 = 'rain_menit';
                                    else if (tipe == 'sed') tipe2 = 'sed_menit';
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
                                    }

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
                        }
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
            location.replace("../inc/export_excel.php?j=export&" + "&tgl1=" + tgl1 + "&tgl2=" + tgl2 + "&sn=" + sn + "&waktu=" + waktu1);
        });

        $("#sed_export").click(function() {
            tgl1 = $("#sedd").attr('data-tgl1');
            console.log("tanggal1 =" + tgl1);
            tgl2 = $("#sedd").attr('data-tgl2');
            console.log("tanggal2 =" + tgl2);
            waktu1 = $("#sedd").attr('data-waktu');
            console.log("waktuuuuuuu =" + waktu1);
            console.log("keklik");
            location.replace("../inc/export_excel.php?j=export&" + "&tgl1=" + tgl1 + "&tgl2=" + tgl2 + "&sn=" + sn + "&waktu=" + waktu1);
        });

        $("#sed_button, #rain_button").hide();
        $("#sed_form, #rain_form").hide();
        $("#rain_export, #sed_export").hide();
        // $("#rain_form").hide();

        tgl_last_update = $("#last_update").attr('data-tgl_last_update');
        console.log("tanggal_last =" + tgl_last_update);

        grafik_liat("sed", "sed_icon", "sed_chart", "sed_button", "sed_form", "sed_export", "sed");
        // grafik_toggle("pha", "pha_icon", "pha_chart");
        grafik_close("sed", "sed_icon", "sed_chart", "sed_button", "sed_export");

        grafik_liat("rain", "rain_icon", "rain_chart", "rain_button", "rain_form", "rain_export", "rain");
        // grafik_toggle("pha", "pha_icon", "pha_chart");
        grafik_close("rain", "rain_icon", "rain_chart", "rain_button", "rain_export");

        // sn = $(".container-fluid").attr("data-sn");
        // produk_tipe = $(".container-fluid").attr("data-produk_tipe");
        produk_tipe = 'sed_sim' && 'rain';

        function ambil_data(sn) {
            $.ajax({
                    method: "POST",
                    url: "../inc/olah.php",
                    data: {
                        p: "ambil_data",
                        sn: sn,
                        produk_tipe: produk_tipe
                    },
                    dataType: "json"
                })
                .done(function(data) {
                    sed = parseFloat(data.sed_sim).toFixed(1); //toFixed data harus difloatkan
                    sed2 = Math.round(sed * 100 / 5000);
                    rain = parseFloat(data.curah_hujan).toFixed(1); //toFixed data harus difloatkan
                    rain2 = Math.round(rain * 100 / 300);

                    rainfall = data.curah_hujan;
                    date_server = data.tanggal;
                    time_server = data.waktu;
                    lokasi = data.lokasi;
                    $("#last_update, #last_update1").text("Last Update: " + date_server + " " + " |" + " " + time_server);
                    console.log("date = " + date_server + "time =" + time_server);
                    $("#rainfall").text(rainfall);
                    console.log("curah_hujan = " + rainfall);
                    $("#location").text(lokasi);
                    console.log("lokasi = " + lokasi);
                    $("#tanggal").text(date_server);
                    console.log("tanggal = " + date_server);
                    $("#waktu").text(time_server);
                    console.log("waktu = " + time_server);

                    $("#tgl_spin .spinner-border").remove();
                    $("#pha_spin .spinner-border").remove();
                    $("#tds_spin .spinner-border").remove();
                    $("#rl_spin .spinner-border").remove();
                    $("#rt_spin .spinner-border").remove();
                    $("#light_spin .spinner-border").remove();
                    $("#gt_spin .spinner-border").remove();

                    $("#sed").gaugeMeter({
                        percent: sed2
                    });
                    $("#sed span").empty().append(sed + "<u></u>");
                    $("#rain").gaugeMeter({
                        percent: rain2
                    });
                    $("#rain span").empty().append(rain + "<u></u>");


                })
                .fail(function(msg) {
                    console.log("Data gagal dikirim: " + msg); //jika gagal maka akan muncul notifikasi
                });
        }
        //sn = 2019030001;
        hreff = window.location.href;
        str = hreff.split("=");
        console.log("urlnya:" + hreff + " ==>" + str[1]);
        sn = str[1];
        ambil_data(sn);
        setInterval(function() {
            ambil_data(sn);
        }, 5000);

        $("#sed_form,#rain_form").submit(function(e) {
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
            }

        });

        function jdw_open(id_spin, id_form, id_chart, id_export, id_real) {
            $("#" + id_spin + " .jdw").click(function(e) {
                $("#" + id_chart + ",#" + id_real + ",#" + id_export).fadeOut();
                $("#" + id_form).fadeIn('slow');
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

        jdw_close("sed", "sed_form ", "sed_icon", "sed_chart", "sed_export", "sed_real");
        jdw_close("rain", "rain_form", "rain_icon", "rain_chart", "rain_export", "rain_real");
    </script>

    <script>
        <?php
        $date = date('Y-m-d');
        ?>
        var options = {
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
                            json_path = "../inc/olah.php?j=realtime&sn=" + sn + "";
                            $.getJSON(json_path, function(json) {
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
                text: ' '
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

        json_path2 = "../inc/olah.php?j=realtime_awal&sn=" + sn + "";

        $.getJSON(json_path2, function(json) {
            //options.xAxis.categories = json[0]['data'];
            options.series[0] = json[0];

            chart = new Highcharts.Chart(options);

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
                            json_path4 = "../inc/olah.php?j=realtime&sn=" + sn + "";
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
                text: ''
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
                    text: 'Sed Sim'
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

        json_path3 = "../inc/olah.php?j=realtime_awal1&sn=" + sn + "";

        $.getJSON(json_path3, function(json) {
            //options.xAxis.categories = json[0]['data'];
            options2.series[0] = json[0];

            chart = new Highcharts.Chart(options2);

        });
    </script>
<?php
}
?>