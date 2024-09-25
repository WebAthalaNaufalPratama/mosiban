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
          <li class="{{ Request::is('about') ? 'active' : '' }}">
            <a href="./about">
              <i class="tim-icons icon-atom"></i>
              <p>Tentang Aplikasi</p>
            </a>
          </li>
          <li id="adminnav" class="{{ Request::is('admin') ? 'active' : '' }}">
            <a href="./admin">
              <i class="tim-icons icon-settings-gear-63"></i>
              <p>Admin Page</p>
            </a>
          </li><!--
          <li id="lognav" class="{{ Request::is('log') ? 'active' : '' }}">
            <a href="./log">
              <i class="tim-icons icon-sound-wave"></i>
              <p>Log History</p>
            </a>
          </li> -->
          <!-- <i class="tim-icons icon-settings-gear-63"></i> -->
          <li id="feednav" class="{{ Request::is('feedback') ? 'active' : '' }}">
            <a href="./feedback">
              <i class="tim-icons icon-send text-succes"></i>
              <p>Beri Masukan <span class="badge badge-info">Beta</span></p>
            </a>
          </li>
        </ul>
        <div class="logo" style="left:0:right:0;"></div>
        <div class="logo" style="left:0:right:0;">
          <div style="width:90%;margin-left:auto;margin-right:auto;display:block;">
            <span id="tgl_date_time" class="simple-text logo-normal">
          </div>
          
          <div style="width:30%;margin-left:auto;margin-right:auto;display:block;">
            <span id="jam_date_time" class="simple-text logo-normal">
          </div>  

        </div>
      </div>    