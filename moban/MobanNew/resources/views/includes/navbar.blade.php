<style>
.modal2 {
    display: none; /* Hidden by default */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.9); /* Black w/ opacity */
    }
</style>
    <nav class="navbar navbar-expand-lg navbar-absolute navbar-transparent ">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <div class="navbar-toggle d-inline">
              <button type="button" class="navbar-toggler">
                <span class="navbar-toggler-bar bar1"></span>
                <span class="navbar-toggler-bar bar2"></span>
                <span class="navbar-toggler-bar bar3"></span>
              </button>
            </div>
            <a class="navbar-brand" href="javascript:void(0)">
              {{ Request::is('/') ? 'Home Moban-App' : '' }}
              {{ Request::is('dashboard') ? 'Dashboard Moban-App' : '' }}
              {{ Request::is('about') ? 'About Moban-App' : '' }}
              {{ Request::is('feedback') ? 'Feedback Moban-App' : '' }}
              {{ Request::is('admin') ? 'Admin Moban-App' : '' }}
              {{ Request::is('log') ? 'Log Moban-App' : '' }}
            </a>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
          </button>
          <div class="collapse navbar-collapse" id="navigation">
            <ul class="navbar-nav ml-auto">
              
              <li class="dropdown nav-item">
                <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                  <div class="photo">
                  <i class="tim-icons icon-single-02"></i>
                    <!-- <img src="{{ URL::asset('img/anime3.png') }} " alt="Profile Photo"> -->
                  </div>
                  <b class="caret d-none d-lg-block d-xl-block"></b>
                  <p class="d-lg-none">
                    Admin Moban
                  </p>
                </a>
                <ul class="dropdown-menu dropdown-navbar" id="navbarli">
                  <li class="nav-link">
                  <span data-toggle="modal" id="btnsignin" 
                  class="nav-item dropdown-item">Masuk</span></li>
                </ul>
              </li>
              <li class="separator d-lg-none"></li>
            </ul>
          </div>
        </div>
      </nav>
      <div class="modal modal-search fade" id="searchModal" tabindex="-1" role="dialog" aria-labelledby="searchModal" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <div style="margin-left:auto;margin-right:auto;">
                Maaf Tidak Ada Koneksi Internet
                <a href="./">Muat Ulang</a>
              </div> 
              <!-- <input type="text" class="form-control" id="inlineFormInputGroup" placeholder="SEARCH">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <i class="tim-icons icon-simple-remove"></i>
              </button> -->
            </div>
          </div>
        </div>
      </div>
      <!-- Modal -->
      <div class="modal modal2 fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content bg-dark">
            <div class="modal-header">
              <h5 class="modal-title text-light" id="exampleModalLabel">Masuk sebagai Admin</h5>
              <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button> -->
            </div>
            <div class="modal-body">
                <form id="addUser" method="POST" action="">
                  <div class="form-group text-light">
                      <label for="exampleInputEmail1">Email :</label>
                      <input type="email" name="email" class="form-control" id="email" placeholder="Masukkan email">
                  </div>
                  <div class="form-group text-light">
                      <label for="InputName">Password :</label>
                      <input type="password" name="nama" class="form-control" id="password" placeholder="Masukkan Password">
                  </div>
                  <div class="form-group text-light">
                    <input type="checkbox" id="ce" onclick="showpwd()">
                    <label class="form-check-label" for="ce">Show Password</label>
                  </div>
                    <script>
                        function showpwd() {
                        var x = document.getElementById("password");
                        if (x.type === "password") {
                          x.type = "text";
                        } else {
                          x.type = "password";
                        }}
                        function myfunc(){
                          document.getElementById("exampleModal").style.display="none";
                        }
                    </script>
              </form>  
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" onclick="myfunc()" data-dismiss="modal">Tutup</button>
              <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#exampleModal2">Lupa Password?</button>
              <button type="button" class="btn btn-info" name="signin" onclick="btnlogin()" id="quickstart-sign-in">Masuk</button>
            </div>
          </div>
        </div>
      </div>
      
      <!-- Modal -->
      <div class="modal modal2 fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content bg-dark">
            <div class="modal-header">
              <h5 class="modal-title text-light" id="exampleModalLabel">Lupa Password</h5>
              <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button> -->
            </div>
            <div class="modal-body">
                <form id="addUser2" method="POST" action="">
                  <div class="form-group text-light">
                      <label for="exampleInputEmail1">Email :</label>
                      <input type="email" name="emailreset" class="form-control" id="emailreset" placeholder="Masukkan email">
                  </div>
              </form>  
              <div id="alertberhasilkirim" class="alert alert-info" style="display:none;">
                <button type="button" aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">
                  <i class="tim-icons icon-simple-remove"></i>
                </button>
                <span>Email berhasil dikirim!</span>
              </div>
            </div>
              <script>
                  function myfunc2(){
                    document.getElementById("exampleModal2").style.display="none";
                }
              </script>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" onclick="myfunc2()" data-dismiss="modal">Tutup</button>
              <button type="button" class="btn btn-info" name="signin" onclick="btnforgot()" id="quickstart-sign-in">Kirim Email Reset</button>
            </div>
          </div>
        </div>
      </div>