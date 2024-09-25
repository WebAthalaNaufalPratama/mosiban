<!DOCTYPE html>
<html lang="en">
  <head>
    @include('includes.head')  
    <link rel="stylesheet" type="text/css" href="{{asset('fonts/icomoon/style.css')}}">
    <style>
      html {
          scroll-behavior: smooth;
      }     
    </style>
  </head>
  <body>
  <div class="wrapper">
    <div class="sidebar" data="blue">
    @include('includes.sidebar')
    </div>
    
    <div class="main-panel " data="blue">
      <!-- Navbar -->
      @include('includes.navbar')

      <!-- content -->
      @yield('content')

      <!-- footer -->
      <footer class="footer">
          @include('includes.footer')        
        </footer>
    </div>
    
  </div>
  <script>
    $(document).ready(function() {
      $().ready(function() {
        $sidebar = $('.sidebar');
        $navbar = $('.navbar');
        $main_panel = $('.main-panel');

        $full_page = $('.full-page');

        $sidebar_responsive = $('body > .navbar-collapse');
        sidebar_mini_active = true;
        white_color = false;

        window_width = $(window).width();

        fixed_plugin_open = $('.sidebar .sidebar-wrapper .nav li.active a p').html();


        $('.fixed-plugin a').click(function(event) {
          if ($(this).hasClass('switch-trigger')) {
            if (event.stopPropagation) {
              event.stopPropagation();
            } else if (window.event) {
              window.event.cancelBubble = true;
            }
          }
        });

        $('.fixed-plugin .background-color span').click(function() {
          $(this).siblings().removeClass('active');
          $(this).addClass('active');

          var new_color = $(this).data('color');

          if ($sidebar.length != 0) {
            $sidebar.attr('data', new_color);
          }

          if ($main_panel.length != 0) {
            $main_panel.attr('data', new_color);
          }

          if ($full_page.length != 0) {
            $full_page.attr('filter-color', new_color);
          }

          if ($sidebar_responsive.length != 0) {
            $sidebar_responsive.attr('data', new_color);
          }
        });

        $('.switch-sidebar-mini input').on("switchChange.bootstrapSwitch", function() {
          var $btn = $(this);

          if (sidebar_mini_active == true) {
            $('body').removeClass('sidebar-mini');
            sidebar_mini_active = false;
            blackDashboard.showSidebarMessage('Sidebar mini deactivated...');
          } else {
            $('body').addClass('sidebar-mini');
            sidebar_mini_active = true;
            blackDashboard.showSidebarMessage('Sidebar mini activated...');
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

        $('.switch-change-color input').on("switchChange.bootstrapSwitch", function() {
          var $btn = $(this);

          if (white_color == true) {

            $('body').addClass('change-background');
            setTimeout(function() {
              $('body').removeClass('change-background');
              $('body').removeClass('white-content');
            }, 900);
            white_color = false;
          } else {

            $('body').addClass('change-background');
            setTimeout(function() {
              $('body').removeClass('change-background');
              $('body').addClass('white-content');
            }, 900);

            white_color = true;
          }


        });

        $('.light-badge').click(function() {
          $('body').addClass('white-content');
        });

        $('.dark-badge').click(function() {
          $('body').removeClass('white-content');
        });
      });
    });
  </script>
  <!--   Core JS Files   -->
  <script src="{{ URL::asset('js/core/jquery.min.js') }}"></script>
  <script src="{{ URL::asset('js/datetime.js') }}"></script>
  <script src="{{ URL::asset('js/core/popper.min.js') }}"></script>
  <script src="{{ URL::asset('js/core/bootstrap.min.js') }}"></script>
  <script src="{{ URL::asset('js/plugins/perfect-scrollbar.jquery.min.js') }}"></script>
  <script src="{{ URL::asset('js/auth.js') }} "></script>
  <!-- Chart JS -->
  <script src="{{ URL::asset('js/plugins/chartjs.min.js') }} "></script>
  <!--  Notifications Plugin    -->
  <script src="{{ URL::asset('js/plugins/bootstrap-notify.js') }} "></script>
  <!-- Control Center for Black Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="{{ URL::asset('js/black-dashboard.min.js?v=1.0.0') }} "></script>
  </body>
</html> 