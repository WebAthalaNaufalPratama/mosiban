<div class="sidebar-wrapper"> 
        <div class="logo">
          <a href="./">
            <img style="width:50%;margin-left:auto;margin-right:auto;display:block;" 
            src="{{ URL::asset('img/logo-moban-white.png') }}" sty alt="logo">
          </a>
        </div>
        <div class="logo">
          <a href="./">
            <img style="width:100%;margin-left:auto;margin-right:auto;display:block;" 
            src="{{ URL::asset('img/tulisan.png') }}" sty alt="logo">
          </a>
        </div>

        <ul class="nav">
          <li class="{{ Request::is('/') ? 'active' : '' }}">
            <a href="./">
              <i class="tim-icons icon-components"></i>
              <p>Home</p>
            </a>
          </li>
          <li class="{{ Request::is('dashboard') ? 'active' : '' }}">
            <a href="./dashboard">
              <i class="tim-icons icon-chart-pie-36"></i>
              <p>Dashboard</p>
            </a>
          </li>
          @if(Auth::check())
          <li id="adminnav" class="{{ Request::is('admin') ? 'active' : '' }}">
            <a href="./admin">
              <i class="tim-icons icon-settings-gear-63"></i>
              <p>Admin Page</p>
            </a>
          </li>
          @else
          @endif
        </ul>
        <div class="logo" style="left:0;right:0;"></div>
        <div class="logo" style="left:0;right:0;">
          <div style="width:90%;margin-left:auto;margin-right:auto;display:block;">
            <span id="tgl_date_time" class="simple-text logo-normal">
          </div>
          
          <div style="width:30%;margin-left:auto;margin-right:auto;display:block;">
            <span id="jam_date_time" class="simple-text logo-normal">
          </div>  

        </div>
      </div>    