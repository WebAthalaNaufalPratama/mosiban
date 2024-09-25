function mulaifirebase(){
  $("#quickstart-sign-in").click(function() {
    toggleSignIn();
  });
      // Initialize Firebase
      var configfb = {
        apiKey: "AIzaSyBrPMdssPaCUEl3mHZuHPpJ9UEubeVhK8M",
        authDomain: "bisa-b2497.firebaseapp.com",
        databaseURL: "https://bisa-b2497.firebaseio.com/",
        storageBucket: "bisa-b2497.appspot.com",
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

    firebase.database().ref('sensor/tembalang').limitToFirst(10).once('value', function (snapshot) {
        var tblhujan = [];
        var tblbanjir = [];
        var value = snapshot.val();
        
        $.each(value, function (index, value) {

            if (value) {
              var date = new Date(index*1000);
              var bismillah = index*1000;
                tblbanjir.push('<tr>\
                                <td> '+ new Date(1596046061).toLocaleString() + ' </td>\
                                <td> '+ date.getHours().toString().padStart(2,0)+"."+date.getMinutes().toString().padStart(2,0) + ' </td>\
                                <td>' + value.banjir + ' m</td>\
                                <td>' + value.banjir + ' m<sup>3</sup>/s</td>\
                                </tr></div>');
                tblhujan.push('<tr>\
                                <td> '+ date.getDate().toString()+"/"+ date.getMonth().toString()+" "+ new Date(1591791769824).getFullYear().toString() + ' </td>\
                                <td> '+ date.getHours().toString().padStart(2,0)+"."+date.getMinutes().toString().padStart(2,0) + ' </td>\
                                <td>' + value.hujan  + ' mm</td>\
                                </tr></div>');
            }
                
            lastIndex = index;
            
        $('#tbody1').html(tblbanjir);
        $('#tbody2').html(tblhujan);
        });
        
    });
    
    // Get Data
    //firebase.database().ref().child();
    firebase.database().ref('sensor/tembalang/hujan').once('value', function (snapshot) {
        var value = snapshot.val();
        
        var datahujan = [];
        var labels = [];
        var coba = [];
        // var foo = [];
        // var foolabel = []
        // for (var i = 1; i <= 200; i++) {
        //   foo.push(i);
        // }
        // for (var i = 1; i <= 200; i++) {
        //   foolabel.push("item ke "+i);
        // }
        $.each(value, function (index, value) {

            if (value) {
                datahujan.push(value.nilai);
                // if(isNaN(value.hujan)){
                //   x = 0;
                // }
                // else{
                //   x = value.hujan;
                // }
                //datahujan.push(x);
                labels.push(value.tanggal+""+value.jam);
                // labels.push(
                //     new Date(index * 1000).getUTCHours().toString().padStart(2,0)+"."+new Date(index * 1000).getUTCMinutes().toString().padStart(2,0)
                // );
            }
                
            lastIndex = index;
            
        });
        // datahujan = foo;
        // labels = foolabel;
        // var myDate = new Date( 1591791769824 *1000);
        // console.log(myDate.toGMTString()+myDate.toLocaleString());
        // console.log(databanjir);
        // console.log(databanjir[0]);
        console.log(labels);
        console.log(datahujan);
        
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
              labels: labels.slice(0,10),
              datasets: [{
                label: "Banjir",
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
                data: databanjir.slice(0,10),
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
          data.datasets[0].data = databanjir.slice((databanjir.length - 10),databanjir.length);
          data.labels = labels.slice((labels.length - 10),labels.length);
          banjirchart.update();
        });
        $("#1").click(function() {
          var chart_data = [9, 88, 80, 110, 99];//[60, 120, 105, 110, 95, 105, 90, 100, 80, 95, 70, 120];
          var data = banjirchart.config.data;
          data.datasets[0].data = databanjir.slice((databanjir.length - 24),databanjir.length);
          data.labels = labels.slice((labels.length - 24),labels.length);
          banjirchart.update();
        });
        
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

        //nge set status debit        
        var statusbanjir        
        var cssStatus1 = document.getElementById("statusdebit");
        if(databanjir[0] < 20){
          statusbanjir = "Aman"
          cssStatus1.classList.add("blinking");
        }
        else if(databanjir[0] > 20){
          statusbanjir = "Siaga"
          cssStatus1.classList.add("blinking2");
        }
        else if(databanjir[0] > 40){
          statusbanjir = "Bahaya"
          cssStatus1.classList.add("blinking3");
        }
        
        //nge set status hujan
        var statushujan
        var cssStatus2 = document.getElementById("statushujan");
        if(datahujan[0] < 20){
          statushujan = "Aman"
          cssStatus2.classList.add("blinking");
        }
        else if(databanjir[0] > 20){
          statushujan = "Siaga"
          cssStatus2.classList.add("blinking2");
        }
        else if(databanjir[0] > 40){
          statushujan = "Bahaya"
          cssStatus2.classList.add("blinking3");
        }

        $('#statusdebit').html(statusbanjir);
        $('#lastdebit').html(databanjir[0]);
        
        $('#statushujan').html(statushujan);
        $('#lasthujan').html(datahujan[0]);
                       

        $("#submitUser").removeClass('desabled');
    });   

    $("#btn1").click(function() {
      //var elmnt = document.getElementById("aaa");
      //elmnt.scrollIntoView({behavior: "smooth"});
      location.href = '#aaa'
      window.scroll({behavior: 'smooth' });
    });  
    firebase.database().ref('sensor/tembalang/debit').orderByChild('tempat').startAt("tem").endAt("tem" + "\uf8ff").once('value', function (snapshot) {
      var contoh = [];
      var cth = [];
      var value = snapshot.val();
      //query.on("child_added", function(snapshot)
      
      $.each(value, function (index, value) {

          if (value) {
            contoh.push(value.tempat);
            cth.push(1)

          }
              
          lastIndex = index;
          
      });
      console.log(contoh);
      console.log(cth);
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
