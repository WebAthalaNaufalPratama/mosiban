@extends('layouts.defaults')
@section('content')
<script src="https://www.gstatic.com/firebasejs/5.10.1/firebase.js"></script>
 <script src="https://cdn.firebase.com/libs/firebaseui/3.5.2/firebaseui.js"></script>
 <link type="text/css" rel="stylesheet" href="https://cdn.firebase.com/libs/firebaseui/3.5.2/firebaseui.css" />
{{-- <script src="{{ asset('js/mulaifirebase.js') }} "></script> --}}
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
                    <h4 class="card-title">Data terakhir: <span id="lasthujan">-</span> mm <span id="statushujan">-</span></h4>
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
                    <h4 class="card-title">Data terakhir: <span id="lastintens">-</span> mm <span id="statusintent">-</span></h4>
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
      <script>
        $.ajax({
          type: "get",
          url: "{{route('chart-banjir')}}",
          data: {},
          dataType: "json",
          success: function (response) {
            var ctx = document.getElementById('banjirchart').getContext('2d');
      ctx.canvas.width = 200;
      ctx.canvas.height = 200;

      var gradientStroke = ctx.createLinearGradient(0, 230, 0, 50);

        gradientStroke.addColorStop(1, 'rgba(72,72,176,0.2)');
        gradientStroke.addColorStop(0.2, 'rgba(72,72,176,0.0)');
        gradientStroke.addColorStop(0, 'rgba(119,52,169,0)'); //purple colors 1d8cf8=biru d346b1=ungu          
      var config = {
        type: 'line',
          data: {
            labels: response.data.label,
            datasets: [{
              label: "Debit (m3/s)",
              fill: true,
              backgroundColor: gradientStroke,
              borderColor: '#1d8cf0',
              borderWidth: 2,
              borderDash: [],
              borderDashOffset: 0.0,
              pointBackgroundColor: '#1d8cf8',
              pointBorderColor: 'rgba(255,255,255,0)',
              pointHoverBackgroundColor: '#1d8cf8',
              pointBorderWidth: 20,
              pointHoverRadius: 4,
              pointHoverBorderWidth: 15,
              pointRadius: 4,
              data: response.data.data,
            }]
          },
          options: {
            maintainAspectRatio: false,
            legend: {
              display: false
            },

            tooltips: {
              backgroundColor: '#f5f5f5',
              titleFontColor: '#333',
              bodyFontColor: '#666',
              bodySpacing: 4,
              xPadding: 12,
              mode: "nearest",
              intersect: 0,
              position: "nearest"
            },
            responsive: true,
            scales: {
              yAxes: [{
                barPercentage: 1.6,
                gridLines: {
                  drawBorder: false,
                  color: 'rgba(29,140,248,0.0)',
                  zeroLineColor: "transparent",
                },
                ticks: {
                  suggestedMin: 0,//60,
                  suggestedMax: 10,//125,
                  padding: 20,
                  fontColor: "#9a9a9a"
                },     
                scaleLabel: {
                  display: true,
                  labelString: "Debit air yang mengalir (m3/s)",
                }
              }],

              xAxes: [{
                barPercentage: 1.6,
                gridLines: {
                  drawBorder: false,
                  color: 'rgba(225,78,202,0.1)',
                  zeroLineColor: "transparent",
                },
                ticks: {
                  padding: 20,
                  fontColor: "#9a9a9a"
                },     
                scaleLabel: {
                  display: true,
                  labelString: "Satuan Waktu",
                }
              }]
              }
          }};

      var banjirfull = response.data;

      var row = "";
      for(i=0;i < banjirfull.data.length;i++) {
        row += "<tr>"
        row += "<td>" +banjirfull.date[i]+ "</td>";
        row += "<td>" +banjirfull.time[i]+ "</td>";
        row += "<td>" +banjirfull.tinggi[i]+ "</td>";
        row += "<td>" +banjirfull.data[i]+ "</td>";
        row += "</tr>"
      };
      document.getElementById('tbody1').innerHTML = row;

      var banjirchart = new Chart(ctx, config);
          var statusbanjir
      var cssStatus1 = document.getElementById("statusdebit");
      
      //var debitterakhir = datatinggi[response.data.data.length -1].to
      if(response.data.data[response.data.data.length -1].tinggi < 20){
        statusbanjir = "Aman"
        cssStatus1.classList.add("blinking");
      }
      else if(response.data.data[response.data.data.length -1].tinggi > 20){
        statusbanjir = "Siaga"
        cssStatus1.classList.add("blinking2");
      }
      else if(response.data.data[response.data.data.length -1].tinggi > 40){
        statusbanjir = "Bahaya"
        cssStatus1.classList.add("blinking3");
      }
      $('#statusdebit').html(statusbanjir);
      $('#lastdebit').html(response.data.data[response.data.data.length-1]);
      $('#jamtanggal2').html(response.data.label[response.data.label.length -1]);
          }
        });
      
      </script>

      <script>
        $.ajax({
          type: "get",
          url: "{{route('chart-tinggi')}}",
          data: {},
          dataType: "json",
          success: function (response) {
            var ctx = document.getElementById('tinggichart').getContext('2d');
      ctx.canvas.width = 200;
      ctx.canvas.height = 200;

      var gradientStroke = ctx.createLinearGradient(0, 230, 0, 50);

        gradientStroke.addColorStop(1, 'rgba(72,72,176,0.2)');
        gradientStroke.addColorStop(0.2, 'rgba(72,72,176,0.0)');
        gradientStroke.addColorStop(0, 'rgba(119,52,169,0)'); //purple colors 1d8cf8=biru d346b1=ungu          
      var config = {
        type: 'line',
          data: {
            labels: response.data.label,
            datasets: [{
              label: "Tinggi (m)",
              fill: true,
              backgroundColor: gradientStroke,
              borderColor: '#1d8cf0',
              borderWidth: 2,
              borderDash: [],
              borderDashOffset: 0.0,
              pointBackgroundColor: '#1d8cf8',
              pointBorderColor: 'rgba(255,255,255,0)',
              pointHoverBackgroundColor: '#1d8cf8',
              pointBorderWidth: 20,
              pointHoverRadius: 4,
              pointHoverBorderWidth: 15,
              pointRadius: 4,
              data: response.data.data,
            }]
          },
          options: {
            maintainAspectRatio: false,
            legend: {
              display: false
            },

            tooltips: {
              backgroundColor: '#f5f5f5',
              titleFontColor: '#333',
              bodyFontColor: '#666',
              bodySpacing: 4,
              xPadding: 12,
              mode: "nearest",
              intersect: 0,
              position: "nearest"
            },
            responsive: true,
            scales: {
              yAxes: [{
                barPercentage: 1.6,
                gridLines: {
                  drawBorder: false,
                  color: 'rgba(29,140,248,0.0)',
                  zeroLineColor: "transparent",
                },
                ticks: {
                  suggestedMin: 0,//60,
                  suggestedMax: 10,//125,
                  padding: 20,
                  fontColor: "#9a9a9a"
                },     
                scaleLabel: {
                  display: true,
                  labelString: "Tinggi air (m)",
                }
              }],

              xAxes: [{
                barPercentage: 1.6,
                gridLines: {
                  drawBorder: false,
                  color: 'rgba(225,78,202,0.1)',
                  zeroLineColor: "transparent",
                },
                ticks: {
                  padding: 20,
                  fontColor: "#9a9a9a"
                },     
                scaleLabel: {
                  display: true,
                  labelString: "Satuan Waktu",
                }
              }]
              }
          }};

      var tinggichart = new Chart(ctx, config);
          var statustinggi
      var cssStatus3 = document.getElementById("statustinggi");
      
      //var debitterakhir = datatinggi[response.data.data.length -1].to
      if(response.data.data[response.data.data.length -1] < 20){
        statustinggi = "Aman"
        cssStatus3.classList.add("blinking");
      }
      else if(response.data.data[response.data.data.length -1] <= 40){
        statustinggi = "Siaga"
        cssStatus3.classList.add("blinking2");
      }
      else {
        statustinggi = "Bahaya"
        cssStatus3.classList.add("blinking3");
      }
      $('#statustinggi').html(statustinggi);
      $('#lasttinggi').html(response.data.data[response.data.data.length-1]);
      $('#jamtanggal1').html(response.data.label[response.data.label.length -1]);
          }
        });
      
      </script>

      <script>
        $.ajax({
          type: "get",
          url: "{{route('chart-hujan')}}",
          data: {},
          dataType: "json",
          success: function (response) {
              var ctx2 = document.getElementById('hujanchart').getContext('2d');
            ctx2.canvas.width = 200;
            ctx2.canvas.height = 200;

            var gradientStroke = ctx2.createLinearGradient(0, 230, 0, 50);

              gradientStroke.addColorStop(1, 'rgba(72,72,176,0.2)');
              gradientStroke.addColorStop(0.2, 'rgba(72,72,176,0.0)');
              gradientStroke.addColorStop(0, 'rgba(119,52,169,0)'); //purple colors 1d8cf8=biru d346b1=ungu          
            var config = {
              type: 'line',
                data: {
                  labels: response.data.label,
                  datasets: [{
                    label: "Curah Hujan(mm)",
                    fill: true,
                    backgroundColor: gradientStroke,
                    borderColor: '#1d8cf0',
                    borderWidth: 2,
                    borderDash: [],
                    borderDashOffset: 0.0,
                    pointBackgroundColor: '#1d8cf8',
                    pointBorderColor: 'rgba(255,255,255,0)',
                    pointHoverBackgroundColor: '#1d8cf8',
                    pointBorderWidth: 20,
                    pointHoverRadius: 4,
                    pointHoverBorderWidth: 15,
                    pointRadius: 4,
                    data: response.data.data,
                  }]
                },
                options: {
                  maintainAspectRatio: false,
                  legend: {
                    display: false
                  },

                  tooltips: {
                    backgroundColor: '#f5f5f5',
                    titleFontColor: '#333',
                    bodyFontColor: '#666',
                    bodySpacing: 4,
                    xPadding: 12,
                    mode: "nearest",
                    intersect: 0,
                    position: "nearest"
                  },
                  responsive: true,
                  scales: {
                    yAxes: [{
                      barPercentage: 1.6,
                      gridLines: {
                        drawBorder: false,
                        color: 'rgba(29,140,248,0.0)',
                        zeroLineColor: "transparent",
                      },
                      ticks: {
                        suggestedMin: 0,//60,
                        suggestedMax: 10,//125,
                        padding: 20,
                        fontColor: "#9a9a9a"
                      },     
                      scaleLabel: {
                        display: true,
                        labelString: "Curah Hujan(mm)",
                      }
                    }],

                    xAxes: [{
                      barPercentage: 1.6,
                      gridLines: {
                        drawBorder: false,
                        color: 'rgba(225,78,202,0.1)',
                        zeroLineColor: "transparent",
                      },
                      ticks: {
                        padding: 20,
                        fontColor: "#9a9a9a"
                      },     
                      scaleLabel: {
                        display: true,
                        labelString: "Satuan Waktu",
                      }
                    }]
                    }
                }};
            
            //chart hujan
            var ctx2 = document.getElementById('hujanchart').getContext('2d');
            ctx2.canvas.width = 200;
            ctx2.canvas.height = 200;

            var hujanchart = new Chart(ctx2, config);
            // var data1 = hujanchart.config.data;
            // data1.datasets[0].data = response.data.data;
            // data1.datasets[0].label = "Hujan";
            // data1.labels = labels;
            // hujanchart.update();
            //console.log(response.data.data[response.data.data.length -1]);
            //nge set status hujan

            var hujanfull = response.data;

            var row = "";
            for(i=0;i < hujanfull.data.length;i++) {
              row += "<tr>"
              row += "<td>" +hujanfull.date[i]+ "</td>";
              row += "<td>" +hujanfull.time[i]+ "</td>";
              row += "<td>" +hujanfull.data[i]+ "</td>";
              row += "</tr>"
            };
            document.getElementById('tbody2').innerHTML = row;

            var statushujan
            var cssStatus2 = document.getElementById("statushujan");
            if(response.data.data[response.data.data.length -1] < 1){
              statushujan = "Sangat Ringan"
              cssStatus2.classList.add("blinking");
            }
            else if(response.data.data[response.data.data.length -1] <= 5){ 
              statushujan = "Ringan"
              cssStatus2.classList.add("blinking");
            }
            else if(response.data.data[response.data.data.length -1] <= 10){
              statushujan = "Sedang"
              cssStatus2.classList.add("blinking2");
            }
            else if(response.data.data[response.data.data.length -1] <= 20){
              statushujan = "Lebat"
              cssStatus2.classList.add("blinking3");
            }
            else {
              statushujan = "Sangat Lebat"
              cssStatus2.classList.add("blinking3");
            }
            // console.log(response.data.data);
            
            $('#statushujan').html(statushujan)
            $('#lasthujan').html(response.data.data[response.data.data.length -1]);
            $('#jamtanggal3').html(response.data.label[response.data.label.length -1]);
          }
        });
      </script>

      <script>
        $.ajax({
          type: "get",
          url: "{{route('chart-intensitas')}}",
          data: {},
          dataType: "json",
          success: function (response) {
            var ctx = document.getElementById('intenschart').getContext('2d');
            ctx.canvas.width = 200;
            ctx.canvas.height = 200;

            var gradientStroke = ctx.createLinearGradient(0, 230, 0, 50);

            gradientStroke.addColorStop(1, 'rgba(72,72,176,0.2)');
            gradientStroke.addColorStop(0.2, 'rgba(72,72,176,0.0)');
            gradientStroke.addColorStop(0, 'rgba(119,52,169,0)'); //purple colors 1d8cf8=biru d346b1=ungu   
            
            console.log(response.data.data);
            // $total = 0;
            var dataTotal = [];
            for($i = 0; $i < response.data.data.length;$i++) {
              $data = response.data.data[$i];
              $prevData = response.data.data[$i-1];
              if ($prevData === undefined) {
                $prevData = $data;
              }
              $total = parseFloat($data - $prevData).toFixed(3);
              dataTotal.push($total);
            }
            console.log(dataTotal);

            var config = {
              type: 'line',
                data: {
                  labels: response.data.label,
                  datasets: [{
                    label: "Intensitas (mm)",
                    fill: true,
                    backgroundColor: gradientStroke,
                    borderColor: '#1d8cf0',
                    borderWidth: 2,
                    borderDash: [],
                    borderDashOffset: 0.0,
                    pointBackgroundColor: '#1d8cf8',
                    pointBorderColor: 'rgba(255,255,255,0)',
                    pointHoverBackgroundColor: '#1d8cf8',
                    pointBorderWidth: 20,
                    pointHoverRadius: 4,
                    pointHoverBorderWidth: 15,
                    pointRadius: 4,
                    data: dataTotal,//response.data.data,
                  }]
                },
                options: {
                  maintainAspectRatio: false,
                  legend: {
                    display: false
                  },

                  tooltips: {
                    backgroundColor: '#f5f5f5',
                    titleFontColor: '#333',
                    bodyFontColor: '#666',
                    bodySpacing: 4,
                    xPadding: 12,
                    mode: "nearest",
                    intersect: 0,
                    position: "nearest"
                  },
                  responsive: true,
                  scales: {
                    yAxes: [{
                      barPercentage: 1.6,
                      gridLines: {
                        drawBorder: false,
                        color: 'rgba(29,140,248,0.0)',
                        zeroLineColor: "transparent",
                      },
                      ticks: {
                        suggestedMin: 0,//60,
                        suggestedMax: 10,//125,
                        padding: 20,
                        fontColor: "#9a9a9a"
                      },     
                      scaleLabel: {
                        display: true,
                        labelString: "Intensitas Hujan (mm)",
                      }
                    }],

                    xAxes: [{
                      barPercentage: 1.6,
                      gridLines: {
                        drawBorder: false,
                        color: 'rgba(225,78,202,0.1)',
                        zeroLineColor: "transparent",
                      },
                      ticks: {
                        padding: 20,
                        fontColor: "#9a9a9a"
                      },     
                      scaleLabel: {
                        display: true,
                        labelString: "Satuan Waktu",
                      }
                    }]
                    }
                }};

            //console.log(response.data);
            var intenschart = new Chart(ctx, config);
                var statusintent
            var cssStatus3 = document.getElementById("statusintent");
            
            //var debitterakhir = datatinggi[response.data.data.length -1].to
            if(dataTotal[dataTotal.length-1] <= 20){
              statusintent = "Jarang"
              cssStatus3.classList.add("blinking");
            }
            else if(dataTotal[dataTotal.length-1] > 20){
              statusintent = "Sering"
              cssStatus3.classList.add("blinking2");
            }
            $('#statusintent').html(statusintent);
            $('#lastintens').html(parseFloat(dataTotal[dataTotal.length-1]));
            $('#jamtanggal4').html(response.data.label[response.data.label.length -1]);
          }
        });
      
      </script>
      @endsection
