@extends('layouts.defaults')
@section('content')
<script src="{{ URL::asset('js/auth.js') }} "></script>
<script src="{{ URL::asset('js/admin.js') }} "></script>
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.js"></script> 
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"> defer</script>
<script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>

<script src="https://cdn.jsdelivr.net/gh/linways/table-to-excel@v1.0.4/dist/tableToExcel.js"></script>

<script>
firebase.auth().onAuthStateChanged(function(user) {
  if (!user){
    alert('Anda mencoba masuk tanpa login. Silahkan Login Dahulu!');
    window.location.replace("./");
    
    // Kalau belum login langsung disuruh balek login lagi
  }
});
</script>
    <div class="content">
        <div class="row">
          <div class="col-12">
            <div class="alert alert-info">
              <button type="button" aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">
                <i class="tim-icons icon-simple-remove"></i>
              </button>
              <span>Halo Selamat Datang Admin!</span>
            </div>
            <div id="alertberhasil" class="alert alert-danger" style="display:none;">
              <button type="button" aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">
                <i class="tim-icons icon-simple-remove"></i>
              </button>
              <span>Berhasil Edit Setting!</span>
            </div>
                <div class="card card-chart">
                    <div class="card-header ">
                        <div class="row">
                            <div class="col-sm-6 text-left">
                              <h2 class="card-title"><b>Moban Admin Page</b></h2>
                              <h4 class="card-title">
                                Setting yang digunakan pada Sistem :
                              </h4>
                            </div>
                            <div class="col-sm-6">
                            <!-- data-toggle="modal" data-target="#exampleModal2" -->
                              <button id="btn1" onClick="opensetting()" class="btn btn-sm btn-info btn-simple float-right">Edit Setting</button>
                              <button id="btn2" onClick="canceledit()" class="btn btn-sm btn-info btn-simple float-right">Batal</button>
                              <button id="btn3" onClick="updateUser()" class="btn btn-sm btn-info btn-simple float-right">Simpan</button>
                              <script>document.getElementById('btn2').style.display = "none";</script>
                              <script>document.getElementById('btn3').style.display = "none";</script>
                            </div>
                        </div>
                    </div>
                    <div class="card-header ">
                        <div class="row">
                            <div class="col-sm text-left">
                                <div class="card-body">
                                  <div class="table-responsive">
                                  <form id="formupdate" method="POST" class="form horizontal" action="">
                                    <table class="table tablesorter bg-dark" id="">
                                      <thead class=" text-primary bg-info">
                                        <tr>
                                          <th>
                                            Name
                                          </th>
                                          <th>
                                            Value
                                          </th>
                                        </tr>
                                      </thead>
                                      <tbody>
                                        <tr>
                                          <td>
                                            Tinggi Sensor (cm)
                                          </td>
                                          <td>
                                            <!-- <input type="text" id="tinggisp"> -->
                                            <input type="number" id="tinggiinp" width="10" disabled class="form-control" min=1 max=200>
                                            <!-- <span id="tinggisp"></span> -->
                                          </td>
                                        </tr>
                                        <tr>
                                          <td>
                                            Luas Area (km<sup>2</sup>)
                                          </td>
                                          <td>
                                            <!-- <span id="panjangsp"></span> -->
                                            <input type="number" id="luasinp" disabled class="form-control" min=1 max=100>
                                          </td>
                                        </tr>
                                        <!--
                                        <tr>
                                          <td>
                                            Delay
                                          </td>
                                          <td>
                                             <span id="delaysp"></span> 
                                            <input type="number" id="delayinp" disabled class="form-control" min=1 max=100>
                                          </td>
                                        </tr>-->
                                      </tbody>
                                    </table>
                                    </form>
                                  </div>
                                </div>
                            </div>
                            <div class="col-sm text-left">
                                <div class="card-body">
                                  <div class="table-responsive">
                                    <table class="table tablesorter table-dark" id="settingtable">
                                      <thead class=" text-primary bg-info">
                                        <tr>
                                          <th>
                                            Name
                                          </th>
                                          <th>
                                            Value
                                          </th>
                                        </tr>
                                      </thead>
                                      <tbody>
                                        <tr>
                                          <td>
                                            Status 1 (cm)
                                          </td>
                                          <td>
                                            <!-- <span id="stat1sp"></span> -->
                                            <input type="number" disabled id="stat1inp" class="form-control" min=1 max=100>
                                          </td>
                                        </tr>
                                        <tr>
                                          <td>
                                            Status 2 (cm)
                                          </td>
                                          <td>
                                            <!-- <span id="stat2sp"></span> -->
                                            <input type="number" disabled id="stat2inp" class="form-control" min=1 max=100>
                                          </td>
                                        </tr>
                                        <tr>
                                          <td>
                                            Status 3 (cm)
                                          </td>
                                          <td>
                                            <!-- <span id="stat3sp"></span> -->
                                            <input type="number" disabled id="stat3inp" class="form-control" min=1 max=100>
                                          </td>
                                        </tr>

                                      </tbody>
                                    </table>
                                  </div>
                                </div>
                                
                                <div class="alert alert-info">
                                  <button type="button" aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">
                                    <i class="tim-icons icon-simple-remove"></i>
                                  </button>
                                  <span>Klik Edit Setting untuk mengubah</span>
                                </div>
                            </div>
                        </div>                
                    </div>
            </div>
        <div class="row">
            <div class="col-12">
              <div class="card ">
                  <div class="card-header">
                    <div class="row">
                      <div class="col-sm-6 text-left">
                        <h4 class="card-title"> Akun Administrator</h4>
                      </div>
                    </div>
                  </div>
                  <div class="card-body">
                  <div class="row">
                      <div class="col-sm-6 text-left">
                        <h6 class="card-title"> Akun Administrator Anda</h6>
                        <div class="table-responsive">
                          <table class="table tablesorter bg-dark" id="sarantable">
                            <tbody>
                              <tr>
                                <td>
                                  Email
                                </td>
                                <td>
                                  <!-- <span id="stat1sp"></span> -->
                                  <input type="email" disabled id="emailakun" class="form-control">
                                </td>
                              </tr>
                              <tr>
                                <td>
                                  Password Lama
                                </td>
                                <td>
                                  <!-- <span id="stat2sp"></span> -->
                                  <input id="oldpass" disabled type="password" class="form-control" name="password">
                                </td>
                              </tr>
                              <tr>
                                <td>
                                  Password Baru
                                </td>
                                <td>
                                  <!-- <span id="stat2sp"></span> -->
                                  <input id="passakun" disabled type="password" class="form-control" name="password">
                                </td>
                              </tr>
                            </table>
                              <!-- <tbody>
                                <tr>
                                  <td>
                                    Email
                                  </td>
                                  <td>
                                    <input type="email" disabled id="emailakun" class="form-control">
                                  </td>
                                </tr>

                                <tr id="rowpass" style="display:block;">
                                  <td>
                                    Password
                                  </td>
                                  <td>
                                    <input type="password" disabled id="passakun" class="form-control">
                                  </td>
                                </tr>
                              </tbody>
                            </table>  -->
                            <div class="alert alert-info" id="alertpass" style="display:none;">
                              <button type="button" aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">
                                <i class="tim-icons icon-simple-remove"></i>
                              </button>
                              <span>Berhasil Ubah Password</span>
                            </div>
                            <button id="btn7" onClick="openadmin()" class="btn btn-sm btn-info btn-simple float-right">Ubah Password</button>
                            <button id="btn8" onClick="canceladmin()" class="btn btn-sm btn-info btn-simple float-right">Batal</button>
                            <button id="btn9" onClick="btnadmin()" class="btn btn-sm btn-info btn-simple float-right">Simpan</button>
                            <script>document.getElementById('btn8').style.display = "none";</script>
                            <script>document.getElementById('btn9').style.display = "none";</script>
                          </div>
                      </div>
                      <div class="col-sm-6 text-left">
                        <h6 class="card-title"> Registrasi Administrator Baru </h6>
                        <div class="table-responsive">
                            <table class="table tablesorter table-dark" id="settingtable">
                              <tbody>
                                <tr>
                                  <td>
                                    Email
                                  </td>
                                  <td>
                                    <!-- <span id="stat1sp"></span> -->
                                    <input type="email" disabled id="emailinp" class="form-control">
                                  </td>
                                </tr>
                                <tr>
                                  <td>
                                    Password
                                  </td>
                                  <td>
                                    <!-- <span id="stat2sp"></span> -->
                                    <input id="passinp" disabled type="password" class="form-control" name="password"> 
                                    <!--
                                    <input type="password" disabled id="passinp" class="form-control">
                                    <div class="form-group text-light">
                                    
                                     <input type="checkbox" id="ce" onclick="showpass(passinp)">
                                      <label class="form-check-label" for="ce">Show Password</label> 
                                    </div>-->
                                  </td>
                                </tr>
                              </tbody>
                            </table>
                            <div class="alert alert-info" id="alertregis" style="display:none;">
                              <button type="button" aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">
                                <i class="tim-icons icon-simple-remove"></i>
                              </button>
                              <span>Berhasil Registrasi Administrator</span>
                            </div>
                        <button id="btn4" onClick="openregis()" class="btn btn-sm btn-info btn-simple float-right">Registrasi Admin Baru</button>
                        <button id="btn5" onClick="cancelregis()" class="btn btn-sm btn-info btn-simple float-right">Batal</button>
                        <button id="btn6" onClick="btnregis()" class="btn btn-sm btn-info btn-simple float-right">Simpan</button>
                        <script>document.getElementById('btn5').style.display = "none";</script>
                        <script>document.getElementById('btn6').style.display = "none";</script>
                        </div>
                      </div>
                    </div>
                  </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-12">
              <div class="card ">
                  <div class="card-header">
                    <div class="row">
                      <div class="col-sm-6 text-left">
                        <h4 class="card-title"> Kritik Saran</h4>
                      </div> <!--
                      <div class="col-sm-6">
                        <div class="input-group">
                          <select class="custom-select" id="inputGroupSelect04">
                            <option selected>Choose...</option>
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                          </select>
                          <div class="input-group-append">
                            <button class="btn btn-sm btn-info btn-simple float-right" type="button">Button</button>
                          </div>
                        </div>
                      </div> -->
                    </div>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                    <table class="table tablesorter " id="sarantable">
                        <thead class=" text-primary">
                          <th>ID</th>
                          <th>Tanggal</th>
                          <th>Nama</th>
                          <th>Email</th> 
                          <th>Jenis</th> 
                          <th style="width:30%">Saran</th> 
                          <th>Aksi</th> 
                        </thead>
                        <tbody id="saranbody">
                        </tbody>
                      </table> 
                    </div>
                  </div>
              </div>
            </div>
          </div>

          <div class="row" id="lengkap">
            <div class="col-lg-6 col-md-12">
              <div class="card ">
                <div class="card-header">
                  <div class="row">
                    <div class="col-sm-4 text-left">
                      <h4 class="card-title"> Debit Air</h4>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col text-left">
                    <table style="border:1px;">
                      <div class="form-group">
                      <tr>
                        <td>Dari: </td>
                        <td>
                          <input id="startdebit" class="form-control" max=<?php echo date('Y-m-d'); ?> value=<?php echo date('Y-m-d'); ?> type="date">
                        </td>
                      </tr>
                      <tr>
                        <td>Sampai: </td>
                        <td>
                          <input id="enddebit" class="form-control" max=<?php echo date('Y-m-d'); ?> value=<?php echo date('Y-m-d'); ?> type="date">
                        </td>
                        
                      </tr>
                      <tr>
                        <td></td>
                        
                          <td>
                             <div class="btn-group btn-group-toggle float-center" data-toggle="buttons">
                              <label class="btn btn-sm btn-info btn-simple active" id="0">
                                <input type="radio" name="options1" value="menit" checked>
                                <span class="d-none d-sm-block d-md-block d-lg-block d-xl-block">Real Time</span>
                                <span class="d-block d-sm-none">
                                   <i class="tim-icons icon-atom"></i> 
                                  Real Time
                                </span>
                              </label>
                              <label class="btn btn-sm btn-info btn-simple" id="1">
                                <input type="radio" class="d-none d-sm-none" value="jam" name="options1">
                                <span class="d-none d-sm-block d-md-block d-lg-block d-xl-block">Jam</span>
                                <span class="d-block d-sm-none">
                                  <i class="tim-icons icon-atom"></i> 
                                  Jam
                                </span>
                              </label>
                              <label class="btn btn-sm btn-info btn-simple" id="1">
                                <input type="radio" class="d-none d-sm-none"  value="harian" name="options1">
                                <span class="d-none d-sm-block d-md-block d-lg-block d-xl-block">Harian</span>
                                <span class="d-block d-sm-none">
                                  <i class="tim-icons icon-atom"></i> 
                                  Harian
                                </span>
                              </label>
                            </div>
                        </td>
                      </tr>
                      <tr>
                        <td></td>
                        <td>
                            <button class="btn btn-sm btn-info btn-simple float-right" onclick="exportF(6)" type="button">Cetak Data</button>
                            <button class="btn btn-sm btn-info btn-simple float-right" onclick="debittampil()" type="button">Tampilkan</button>
                        </td>
                      </tr>
                      </div>
                    </table>
                    
                      <div class="input-group">
                      </div>
                    </div>
                  </div>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                  <table class="table tablesorter debittable" id="debittable">
                      <thead class=" text-primary">
                        <tr>
                          <th>Nomor</th>
                          <th>Tanggal</th>
                          <th>Jam</th>
                          <th>Ketinggian(m)</th>
                          <th>Debit(m<sup>3</sup>/s</th> 
                        </tr>
                        
                      </thead>
                      <tbody id="tbody1">
                      </tbody>
                    </table> 
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-6 col-md-12">
              <div class="card ">
                <div class="card-header">
                  <div class="row">
                    <div class="col-sm-4 text-left">
                      <h4 class="card-title"> Curah Hujan</h4>
                    </div>                    
                  </div>
                  <div class="row">
                    <div class="col text-left">
                    <table style="border:1px;">
                      <div class="form-group">
                      <tr>
                        <td>Dari: </td>
                        <td>
                          <input id="starthujan" class="form-control" max=<?php echo date('Y-m-d'); ?> value=<?php echo date('Y-m-d'); ?> type="date">
                        </td>
                      </tr>
                      <tr>
                        <td>Sampai: </td>
                        <td>
                          <input id="endhujan" class="form-control" max=<?php echo date('Y-m-d'); ?> value=<?php echo date('Y-m-d'); ?> type="date">
                        </td>
                      </tr>
                      <tr>
                        <td></td>
                        
                          <td>
                             <div class="btn-group btn-group-toggle float-right" data-toggle="buttons">
                              <label class="btn btn-sm btn-info btn-simple active" id="0">
                                <input type="radio" name="options" value="menit" checked>
                                <span class="d-none d-sm-block d-md-block d-lg-block d-xl-block">Real Time</span>
                                <span class="d-block d-sm-none">
                                   <i class="tim-icons icon-atom"></i> 
                                  Real Time
                                </span>
                              </label>
                              <label class="btn btn-sm btn-info btn-simple" id="1">
                                <input type="radio" class="d-none d-sm-none" value="jam" name="options">
                                <span class="d-none d-sm-block d-md-block d-lg-block d-xl-block">Jam</span>
                                <span class="d-block d-sm-none">
                                  <i class="tim-icons icon-atom"></i> 
                                  Jam
                                </span>
                              </label>
                              <label class="btn btn-sm btn-info btn-simple" id="1">
                                <input type="radio" class="d-none d-sm-none"  value="harian" name="options">
                                <span class="d-none d-sm-block d-md-block d-lg-block d-xl-block">Harian</span>
                                <span class="d-block d-sm-none">
                                  <i class="tim-icons icon-atom"></i> 
                                  Harian
                                </span>
                              </label>
                            </div>
                        </td>
                      </tr>
                      <tr>
                        <td></td>
                        
                        <td>
                            
                            <button class="btn btn-sm btn-info btn-simple float-right" onclick="exportF(8)" type="button">Cetak Data</button>
                            <button class="btn btn-sm btn-info btn-simple float-right" onclick="hujantampil()" type="button">Tampilkan</button>
                        </td>
                      </tr>
                      </div>
                    </table>
                    
                      <div class="input-group">
                         
                      </div>
                    </div>
                    <!-- <div class="col-sm-4 text-left">
                      <div class="input-group">
                      Sampai:
                        <input class="custom-select" type="number" min="1" max="100">
                        <input class="custom-select" type="number" min="1" max="100">
                        <input class="custom-select" type="number" min="1" max="100">
                      </div>
                      <div class="input-group-append">
                          <button class="btn btn-sm btn-info btn-simple float-right" onclick="hujantampil()" type="button">Tampilkan</button>
                        </div>
                      <button class="btn btn-sm btn-info btn-simple float-right" onclick="exportF(4)" type="button">Cetak Data</button> -->
                      <!-- exportF(4) -->
                    <!-- </div> -->
                  </div>
                </div>
                <div class="card-body">
                  <div class="table-responsive">

                    <table class="table tablesorter " id="hujantable">
                      <thead class=" text-primary">
                      <tr>
                        <th>Nomor</th>
                        <th>Tanggal</th>
                        <th>Jam</th>
                        <th>Curah Hujan (mm)</th>
                        <th>Intensitas Hujan (mm/h)</th>
                      </tr>
                      </thead>
                      <tbody id="tbody2">
                      </tbody>
                    </table> 
                    <!-- <table class="table tablesorter " id="table1">
                      <thead class=" text-primary">
                        <tr>
                          <th>
                            Name
                          </th>
                          <th>
                            Country
                          </th>
                          <th>
                            City
                          </th>
                          <th class="text-center">
                            Salary
                          </th>
                        </tr>
                      </thead>
                      <tbody>
                      <div id="isitbody1">
                      </div>
                        <tr>
                          <td>
                            Dakota Rice
                          </td>
                          <td>
                            Niger
                          </td>
                          <td>
                            Oud-Turnhout
                          </td>
                          <td class="text-center">
                            $36,738
                          </td>
                        </tr>
                        <tr>
                          <td>
                            Minerva Hooper
                          </td>
                          <td>
                            Curaçao
                          </td>
                          <td>
                            Sinaai-Waas
                          </td>
                          <td class="text-center">
                            $23,789
                          </td>
                        </tr>
                        
                      </tbody>
                    </table> -->
                  </div>
                </div>
              </div>
            </div>
          </div>
          
        
    </div>
    
    
@endsection