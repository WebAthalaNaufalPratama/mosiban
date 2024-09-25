function mulaifirebase(){
  $("#quickstart-sign-in").click(function() {
    toggleSignIn();
  });
      // Initialize Firebase
    //   var configfb = {
    //     apiKey: "AIzaSyBrPMdssPaCUEl3mHZuHPpJ9UEubeVhK8M",
    //     authDomain: "bisa-b2497.firebaseapp.com",
    //     databaseURL: "https://bisa-b2497.firebaseio.com/",
    //     storageBucket: "bisa-b2497.appspot.com",
    // };
    const configfb = {
        apiKey: "AIzaSyBf4v_oRS1rwzqZX7qhDagQAEw6gAJMgCk",
        authDomain: "monitoringbanjir-9e3e5.firebaseapp.com",
        projectId: "monitoringbanjir-9e3e5",
        storageBucket: "monitoringbanjir-9e3e5.appspot.com",
        messagingSenderId: "388367440224",
        appId: "1:388367440224:web:3baec50425535fb307e605"
    };
    if (!firebase.apps.length) {
        firebase.initializeApp(configfb);
    }

    var database = firebase.database();

    var lastIndex = 0;

    function snapshotToArray(snapshot) {
        var returnArr = [];

        snapshot.forEach(function(childSnapshot) {
            var item = childSnapshot.val();
            item.key = childSnapshot.key;

            returnArr.push(item);
        });

        return returnArr;
    };
//    TABEL   D E B I T     YA
    firebase.database().ref('sensor/tembalang/debit').limitToFirst(10).once('value', function (snapshot) {
        var tblbanjir = [];
        var value = snapshot.val();
        
        $.each(value, function (index, value) {

            if (value) {
              var date = new Date(index*1000);
              var bismillah = index*1000;
                tblbanjir.push('<tr>\
                                <td> '+ value.tanggal + ' </td>\
                                <td> '+ value.jam + ' </td>\
                                <td>' + value.tinggi/100 + ' m</td>\
                                <td>' + value.debit + ' m<sup>3</sup>/s</td>\
                                </tr></div>');
            }
                
            lastIndex = index;
        $('#tbody1').html(tblbanjir);
        });
        
    });

    
//    TABEL   H U J A N     YA
firebase.database().ref('sensor/tembalang/hujan').limitToLast(10).once('value', function (snapshot) {
  var tblhujan = [];
  var value = snapshot.val();
  
  $.each(value, function (index, value) {
 
      if (value) {
          tblhujan.push('<tr>\
                          <td> '+ value.tanggal + ' </td>\
                          <td> '+ value.jam + ' </td>\
                          <td>' + value.nilai  + ' mm</td>\
                          </tr></div>');
      }
          
      lastIndex = index;
  $('#tbody2').html(tblhujan);
  });
  
});

//        D E B I T   YA   SA YA NG
    firebase.database().ref('sensor/tembalang/debit').limitToLast(24).once('value', function (snapshot) {
      var value = snapshot.val();
      var datadebit = [];
      var datatinggi = [];
      var labelbanjir = [];
      $.each(value, function (index, value) {

          if (value) {
            datadebit.push(value.debit);
            datatinggi.push(value.tinggi);
            labelbanjir.push(value.tanggal+" "+value.jam);
          }
          lastIndex = index;
          
      });
      console.log(labelbanjir);
      console.log(datadebit);
      console.log(datatinggi);
      
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
            labels: labelbanjir,
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
              data: datadebit,
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

      var banjirchart = new Chart(ctx, config);
      // console.log(banjirchart.config.data.datasets[0].label);
      // console.log(banjirchart.config.options.scales.xAxes[0].scaleLabel.labelString);
      $("#0").click(function() {
        var data = banjirchart.config.data;
        data.datasets[0].data = datadebit.slice((datadebit.length - 10),datadebit.length);
        data.labels = labelbanjir.slice((labelbanjir.length - 10),labelbanjir.length);
        banjirchart.update();
      });
      $("#1").click(function() {
        var chart_data = [9, 88, 80, 110, 99];//[60, 120, 105, 110, 95, 105, 90, 100, 80, 95, 70, 120];
        var data = banjirchart.config.data;
        data.datasets[0].data = datadebit.slice((datadebit.length - 24),datadebit.length);
        data.labels = labelbanjir.slice((labelbanjir.length - 24),labelbanjir.length);
        banjirchart.update();
      });
      

      //nge set status        
      var statusbanjir
      var cssStatus1 = document.getElementById("statusdebit");
      
      //var debitterakhir = datatinggi[datahujan.length -1].to
      if(datatinggi[datatinggi.length -1] < 20){
        statusbanjir = "Aman"
        cssStatus1.classList.add("blinking");
      }
      else if(datatinggi[datatinggi.length -1] > 20){
        statusbanjir = "Siaga"
        cssStatus1.classList.add("blinking2");
      }
      else if(datatinggi[datatinggi.length -1] > 40){
        statusbanjir = "Bahaya"
        cssStatus1.classList.add("blinking3");
      }
      $('#statusdebit').html(statusbanjir);
      $('#lastdebit').html(datadebit[0]);
      $('#lasttinggi').html(datatinggi[datatinggi.length -1]/100);
      
      $("#submitUser").removeClass('desabled');
  });  
  
//        H U J A N   YA   SA YA NG
    firebase.database().ref('sensor/tembalang/hujan').limitToLast(24).once('value', function (snapshot) {
      var value = snapshot.val();
      
      var datahujan = [];
      var labels = [];
      $.each(value, function (index, value) {

          if (value) {
              datahujan.push(value.nilai);
              labels.push(value.tanggal+" "+value.jam);
          }
              
          lastIndex = index;
          
      });
      console.log(labels);
      console.log(datahujan);
      
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
            labels: labels,
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
              data: datahujan,
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
      var data1 = hujanchart.config.data;
      data1.datasets[0].data = datahujan;
      data1.datasets[0].label = "Hujan";
      data1.labels = labels;
      hujanchart.update();

      //nge set status hujan
      var statushujan
      var cssStatus2 = document.getElementById("statushujan");
      if(datahujan[datahujan.length -1] < 1){
        statushujan = "Sangat Ringan"
        cssStatus2.classList.add("blinking");
      }
      else if(datahujan[datahujan.length -1] >= 1){
        statushujan = "Ringan"
        cssStatus2.classList.add("blinking");
      }
      else if(datahujan[datahujan.length -1] >= 5){
        statushujan = "Sedang"
        cssStatus2.classList.add("blinking2");
      }
      else if(datahujan[datahujan.length -1] >= 10){
        statushujan = "Lebat"
        cssStatus2.classList.add("blinking3");
      }
      else if(datahujan[datahujan.length -1] >= 20){
        statushujan = "Sangat Lebat"
        cssStatus2.classList.add("blinking3");
      }
      
      $('#statushujan').html(statushujan);
      $('#lasthujan').html(datahujan[datahujan.length -1]);
                     
      
      $("#submitUser").removeClass('desabled');
  });   

    $("#btn1").click(function() {
      //var elmnt = document.getElementById("aaa");
      //elmnt.scrollIntoView({behavior: "smooth"});
      location.href = '#lengkap'
      window.scroll({behavior: 'smooth' });
    });  
    
    firebase.database().ref('sensor/tembalang/debit').orderByChild('tanggal').startAt("2020-8-19").endAt("2020-8-21").on('value', function (snapshot) {
      var contoh = [];
      var cth = [];
      var value = snapshot.val();
      //query.on("child_added", function(snapshot)
      
      $.each(value, function (index, value) {

          if (value) {
            contoh.push(value.debit);
            cth.push(1)

          }
              
          lastIndex = index;
          
      });
      console.log(contoh);
      console.log("AAAAAAA");
      var now     = new Date(); 
      var year    = now.getFullYear();
      var month   = now.getMonth()+1; 
      var day     = now.getDate();
      var hour    = now.getHours();
      var minute  = now.getMinutes();
      var second  = now.getSeconds(); 
      if(month.toString().length == 1) {
           month = '0'+month;
      }
      if(day.toString().length == 1) {
           day = '0'+day;
      }   
      if(hour.toString().length == 1) {
           hour = '0'+hour;
      }
      if(minute.toString().length == 1) {
           minute = '0'+minute;
      }
  
      var ddd = year+"-"+month+"-"+day;//+"-"+hour+"-"+minute
      console.log(ddd);
      
  });
  
  console.log("a");
// initApp();
  };


function alus() {
  window.scroll({behavior: 'smooth' });
}
window.onload = mulaifirebase();
//setInterval(function(){ mulaifirebase(); }, 3000);