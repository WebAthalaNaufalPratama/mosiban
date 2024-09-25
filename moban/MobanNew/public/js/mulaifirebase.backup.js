function mulaifirebase(){
    
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
    firebase.database().ref('sensor/tembalang').once('value', function (snapshot) {
        var tblhujan = [];
        var tblbanjir = [];
        var value = snapshot.val();
        
        $.each(value, function (index, value) {

            if (value) {
                tblbanjir.push('<tr>\
                                <td> '+ new Date(index * 1000).getUTCFullYear() + ' </td>\
                                <td> '+ new Date(index * 1000).getUTCHours().toString().padStart(2,0)+"."+new Date(index * 1000).getUTCMinutes().toString().padStart(2,0) + ' </td>\
                                <td>' + value.banjir + ' m</td>\
                                <td>' + value.banjir + ' m<sup>3</sup>/s</td>\
                                </tr></div>');
                tblhujan.push('<tr>\
                                <td> '+ new Date(index * 1000).getDate().toString()+" "+ new Date(index * 1000).getMonth().toString() + ' </td>\
                                <td> '+ new Date(index * 1000).getUTCHours().toString().padStart(2,0)+"."+new Date(index * 1000).getUTCMinutes().toString().padStart(2,0) + ' </td>\
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
    firebase.database().ref('sensor/tembalang').limitToFirst(10).once('value', function (snapshot) {
        var value = snapshot.val();
        
        var databanjir = [];
        var datahujan = [];
        var labels = [];
        var coba = [];
        $.each(value, function (index, value) {

            if (value) {
                databanjir.push(value.banjir);
                datahujan.push(value.hujan);
                labels.push(
                    new Date(index * 1000).getUTCHours().toString().padStart(2,0)+"."+new Date(index * 1000).getUTCMinutes().toString().padStart(2,0)
                );
                    //index.toLocaleString());
                //((new Date((index *1000).toGMTString()+"<br>"+(index *1000).toLocaleString())));
                //(index);
                //(new Date(index.seconds*1000)); //(index.substr(8,2)+"."+index.substr(-2));
                //new Date(index * 1000).getDate().toString()+" "+ new Date(index * 1000).getUTCMonth().toString()
            }
                
            lastIndex = index;
            
        });
        // var myDate = new Date( 1591791769824 *1000);
        // console.log(myDate.toGMTString()+myDate.toLocaleString());
        console.log(databanjir);
        console.log(labels);
        console.log(datahujan);
        //console.log(tblbanjir);

        // var tbody = document.getElementById('isitbody1')
        
        // $.each(value, function(index,value){
        //     tbody.innerHTML += "asdasd<br>"
        //     tbody.innerHTML += '<tr><td>qqq</td></tr>'
        //     if(value){
        //         tbody.innerHTML += '<td>',value.banjir,'</td>'
        //         console.log("aa")
        //         console.log(value.banjir)
        //     }
        //     tbody.innerHTML += '</tr>'
        // });



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
              labels: labels,
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
                data: databanjir,
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
          data.datasets[0].data = databanjir;
          data.datasets[0].label = "Banjir";
          data.labels = labels;
          banjirchart.config.options.scales.yAxes[0].scaleLabel.labelString = "Debit air yang mengalir (m3/s)";
          banjirchart.update();
        });
        $("#1").click(function() {
          var chart_data = [9, 88, 80, 110, 99];//[60, 120, 105, 110, 95, 105, 90, 100, 80, 95, 70, 120];
          var data = banjirchart.config.data;
          data.datasets[0].data = datahujan;
          data.datasets[0].label = "Hujan";
          data.labels = labels;
          banjirchart.config.options.scales.yAxes[0].scaleLabel.labelString = "Curah Hujan (mm/s)";
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
        // var hujanchart = new Chart(ctx2, {
        //     type: 'line',
        //     data: {
        //         labels: labels,
        //         datasets: [{
        //             label: 'Tingkat Hujan',
        //             data: datahujan,
        //             backgroundColor: [
        //                 'rgba(0, 0, 128, 0.2)'
        //             ],
        //             borderColor: [
        //                 'rgba(0, 0, 128, 1)'
        //             ],
        //             borderWidth: 1
        //         }]
        //     },
        //     options: {
        //         responsive: true,
        //         maintainAspectRatio: false,
        //         title:{
        //             display: true,
        //             text: 'Grafik Hujan',
        //             fontsize: 15,
        //             fontstyle: 'bold'
        //         },
        //         scales: {
        //             yAxes: [{
        //                 ticks: {
        //                     beginAtZero: false
        //                 }
        //             }]
        //         }
        //     }
        // });
        //$('#ex-table').append(content);
        $("#submitUser").removeClass('desabled');
    });   
  
};

  

window.onload = mulaifirebase();