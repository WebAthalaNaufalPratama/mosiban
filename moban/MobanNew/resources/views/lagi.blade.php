@extends('layouts.defaults')
@section('content')
<script src="https://www.gstatic.com/firebasejs/5.10.1/firebase.js"></script>
 <script src="https://cdn.firebase.com/libs/firebaseui/3.5.2/firebaseui.js"></script>
 <link type="text/css" rel="stylesheet" href="https://cdn.firebase.com/libs/firebaseui/3.5.2/firebaseui.css" />
<script src="{{ asset('js/mulaifirebase.js') }} "></script>
<script src="{{ URL::asset('js/auth.js') }} "></script>
<script src="https://cdn.jsdelivr.net/gh/linways/table-to-excel@v1.0.4/dist/tableToExcel.js"></script>
      <div class="content">
        <div class="row"> 
          <div class="col-12">
            <div class="card card-chart">
              <div class="card-header ">
                <div class="row">
                  <div class="col-sm-6 text-left">
                    <h2 class="card-title"><b>Tinggi Muka Air</b></h2>
                    <h4 class="card-title">Status : <span id="statustinggi">Data Belum Masuk</span> (<span id="lasttinggi">-</span> m)</h4>
                    <h4 class="card-title">Update: <span id="jamtanggal1">-</span></h4>
                  </div>      
                  <div class="col-sm-6">
                  <a href="#lengkapdebit"><button class="btn btn-sm btn-info btn-simple float-right">Lihat Detail Data</button></a>
                  <!--<button onclick="coba();" class="btn btn-sm btn-info btn-simple float-right">Coba</button>
                    
                    <div class="btn-group btn-group-toggle float-right" data-toggle="buttons">
                      <label class="btn btn-sm btn-info btn-simple active" id="0">
                        <input type="radio" name="options" checked>
                        <span class="d-none d-sm-block d-md-block d-lg-block d-xl-block">Harian</span>
                        <span class="d-block d-sm-none">
                           <i class="tim-icons icon-atom"></i> tim-icons icon-single-02 
                          Harian
                        </span>
                      </label>
                      <label class="btn btn-sm btn-info btn-simple" id="1">
                        <input type="radio" class="d-none d-sm-none" name="options">
                        <span class="d-none d-sm-block d-md-block d-lg-block d-xl-block">Pekan</span>
                        <span class="d-block d-sm-none">
                          <i class="tim-icons icon-atom"></i> tim-icons icon-gift-2
                          Pekan
                        </span>
                      </label>
                    </div>-->
                  </div>
                </div>                
              </div>
              <div class="card-body">
                <div class="chart-area">
                  <canvas id="tinggichart"></canvas><!--chartBig1-->
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row"> 
          <div class="col-12">
            <div class="card card-chart">
              <div class="card-header ">
                <div class="row">
                  <div class="col-sm-6 text-left">
                    <h2 class="card-title"><b>Debit Air</b></h2>
                    <h4 class="card-title">Data Terakhir: <span id="lastdebit">-</span> m<sup>3</sup>/s</h4>
                    <h4 class="card-title">Update: <span id="jamtanggal2">-</span></h4>
                  </div>      
                  <div class="col-sm-6">
                  <a href="#lengkapdebit"><button class="btn btn-sm btn-info btn-simple float-right">Lihat Detail Data</button></a>
                    <!--
                    <div class="btn-group btn-group-toggle float-right" data-toggle="buttons">
                      <label class="btn btn-sm btn-info btn-simple active" id="0">
                        <input type="radio" name="options" checked>
                        <span class="d-none d-sm-block d-md-block d-lg-block d-xl-block">Harian</span>
                        <span class="d-block d-sm-none">
                           <i class="tim-icons icon-atom"></i> tim-icons icon-single-02 
                          Harian
                        </span>
                      </label>
                      <label class="btn btn-sm btn-info btn-simple" id="1">
                        <input type="radio" class="d-none d-sm-none" name="options">
                        <span class="d-none d-sm-block d-md-block d-lg-block d-xl-block">Pekan</span>
                        <span class="d-block d-sm-none">
                          <i class="tim-icons icon-atom"></i> tim-icons icon-gift-2
                          Pekan
                        </span>
                      </label>
                    </div>-->
                  </div>
                </div>                
              </div>
              <div class="card-body">
                <div class="chart-area">
                  <canvas id="banjirchart"></canvas><!--chartBig1-->
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <div class="card card-chart">
              <div class="card-header ">
                <div class="row">
                  <div class="col-sm-6 text-left">
                    <h2 class="card-title"><b>Curah Hujan</b></h2>
                    <h4 class="card-title">Data terakhir: <span id="lasthujan">-</span> mm</h4>
                    <h4 class="card-title">Update: <span id="jamtanggal3">-</span></h4>
                  </div>      
                  
                  <div class="col-sm-6">
                    <a href="#lengkaphujan"><button class="btn btn-sm btn-info btn-simple float-right">Lihat Detail Data</button></a>
                    <!--
                    <div class="btn-group btn-group-toggle float-right" data-toggle="buttons">
                      <label class="btn btn-sm btn-info btn-simple active" id="3">
                        <input type="radio" name="options" checked>
                        <span class="d-none d-sm-block d-md-block d-lg-block d-xl-block">Harian</span>
                        <span class="d-block d-sm-none">
                           <i class="tim-icons icon-atom"></i> tim-icons icon-single-02 
                          Harian
                        </span>
                      </label>
                      <label class="btn btn-sm btn-info btn-simple" id="4">
                        <input type="radio" class="d-none d-sm-none" name="options">
                        <span class="d-none d-sm-block d-md-block d-lg-block d-xl-block">Pekan</span>
                        <span class="d-block d-sm-none">
                          <i class="tim-icons icon-atom"></i> tim-icons icon-gift-2 
                          Pekan
                        </span>
                      </label>
                    </div>-->
                  </div>
                </div>                
              </div>
              <div class="card-body">
                <div class="chart-area">
                  <canvas id="hujanchart"></canvas> <!--chartLinePurple -->
                </div>
              </div>
            </div>
          </div>
        </div>        
        <div class="row">
          <div class="col-12">
            <div class="card card-chart">
              <div class="card-header ">
                <div class="row">
                  <div class="col-sm-6 text-left">
                    <h2 class="card-title"><b>Intensitas Hujan</b></h2>
                    <h4 class="card-title">Data terakhir: <span id="lastintens">-</span> mm</h4>
                    <h4 class="card-title">Update: <span id="jamtanggal4">-</span></h4>
                  </div>      
                  
                  <div class="col-sm-6">
                    <a href="#lengkaphujan"><button class="btn btn-sm btn-info btn-simple float-right">Lihat Detail Data</button></a>
                  </div>
                </div>                
              </div>
              <div class="card-body">
                <div class="chart-area">
                  <canvas id="intenschart"></canvas> <!--chartLinePurple -->
                </div>
              </div>
            </div>
          </div>
        </div>        
        <div class="row" >
          <div class="col-lg-6 col-md-12">
            <div class="card "id="lengkapdebit">
              <div class="card-header">
                <div class="row">
                  <div class="col-sm-6 text-left">
                      <h4 class="card-title"> Debit Air</h4>
                  </div>      
                  <div class="col-sm-6">
                    <button class="btn btn-sm btn-info btn-simple float-right" onclick="exportF(0)" type="button">Cetak Data</button>  
                  </div>      
                </div>      
              </div>
              <div class="card-body">
                <div class="table-responsive">
                <table class="table tablesorter " id="ex-table">
                    <thead class=" text-primary">
                      <th>Tanggal</th>
                      <th>Jam</th>
                      <th>Ketinggian (m)</th>
                      <th>Debit (m<sup>3</sup>/s)</th> 
                    </thead>
                    <tbody id="tbody1">
                    </tbody>
                  </table> 
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-6 col-md-12">
            <div class="card "id="lengkaphujan">
              <div class="card-header" >
                <div class="row">
                  <div class="col-sm-6 text-left">
                      <h4 class="card-title"> Curah Hujan & Intensitas Hujan</h4>
                  </div>      
                  <div class="col-sm-6">
                    <button class="btn btn-sm btn-info btn-simple float-right" onclick="exportF(1)" type="button">Cetak Data</button>  
                  </div>      
                </div>      
              </div>
              <div class="card-body">
                <div class="table-responsive">

                  <table class="table tablesorter " id="ex-table">
                    <thead class=" text-primary">
                      <th>Tanggal</th>
                      <th>Jam</th>
                      <th>Curah Hujan Hujan (mm)</th>
                      <th>Intensitas Hujan (mm/h)</th>
                    </thead>
                    <tbody id="tbody2">
                    </tbody>
                  </table> 
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      @endsection
