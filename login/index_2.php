<?php
include "../inc/olah.php";
$link = $sa->koneksi();

?>
<!DOCTYPE html>
<html lang="en" class="perfect-scrollbar-on">

<head>
    <base href="./">
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>
        Tank Sedimen
    </title>
    <meta content="width=device-width, initial-scale=1.0, shrink-to-fit=no" name="viewport" />
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <link href="../node_modules/material-dashboard.css?v=2.1.2" rel="stylesheet" />
    <link href="../node_modules/demo.css" rel="stylesheet" />
    <link rel="apple-touch-icon" sizes="76x76" href="../img/apple-icon.png">
    <link rel="icon" type="image/png" href="../img/favicon.png">
    <link href="../node_modules/bootstrap.css" rel="stylesheet">
    <link href="../node_modules/fontawesome-free-5.11.2-web/css/all.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
    <link href="../node_modules/simple-line-icons-master/simple-line-icons.min.css" rel="stylesheet">
    <link href="../css/style.css" rel="stylesheet">
    <link href="../node_modules/bootstrap.min.css" rel="stylesheet">
    <link href="../node_modules/gauge.css" rel="stylesheet">
    <link href="../inc/grafik.css" rel="stylesheet">
    <link href="../node_modules/animate.css" rel="stylesheet">
    <link href="../node_modules/pace.min.css" rel="stylesheet">
    <link href="../node_modules/owl.carousel.css" rel="stylesheet" type="text/css">
    <link href="../node_modules/owl.theme.default.min.css" rel="stylesheet" type="text/css">
    <link href="../node_modules/dataTables.bootstrap4.min.css" rel="stylesheet">

    <script src="../node_modules/jquery-3.4.1.min.js"></script>
    <script src="../node_modules/popper.min.js"></script>
    <script src="../node_modules/bootstrap.min.js"></script>

    <script src="../node_modules/pace.min.js"></script>
    <script src="../node_modules/perfect-scrollbar-0.4.5.min.js"></script>
    <script src="../node_modules/Chart.min.js"></script>
    <script src="../node_modules/custom-tooltips.min.js"></script>
    <!-- <script src="../js/main.js"></script> -->
    <script src="../inc/sedimen.js"></script>
    <script src="../node_modules/GaugeMeter.js"></script>
    <script src="../node_modules/gauge.js"></script>
    <script src="../node_modules/highcharts/highcharts.js "></script>
    <script src="../node_modules/Chart.bundle.min.js"></script>
    <script src="../node_modules/owl.carousel.js" type="text/javascript"></script>
    <script src="../node_modules/bootstrap-material-design.min.js"></script>
    <script src="https://unpkg.com/default-passive-events"></script>
    <script src="../node_modules/perfect-scrollbar.jquery.min.js"></script>
    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <!--  Google Maps Plugin    -->
    <!-- <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script> -->
    <!-- Chartist JS -->
    <script src="../node_modules/chartist.min.js"></script>
    <!--  Notifications Plugin    -->
    <script src="../node_modules/bootstrap-notify.js"></script>
    <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="../node_modules/material-dashboard.js?v=2.1.2"></script>
    <!-- Material Dashboard DEMO methods, don't include it in your project! -->
    <script src="../node_modules/demo.js"></script>
    <!-- Plugin for the momentJs  -->
    <script src="../node_modules/moment.min.js"></script>
    <!--  Plugin for Sweet Alert -->
    <script src="../node_modules/sweetalert2.js"></script>
    <!-- Forms Validations Plugin -->
    <script src="../node_modules/jquery.validate.min.js"></script>
    <!-- Plugin for the Wizard, full documentation here: https://github.com/VinceG/twitter-bootstrap-wizard -->
    <script src="../node_modules/jquery.bootstrap-wizard.js"></script>
    <!--	Plugin for Select, full documentation here: http://silviomoreto.github.io/bootstrap-select -->
    <script src="../node_modules/bootstrap-selectpicker.js"></script>
    <!--  Plugin for the DateTimePicker, full documentation here: https://eonasdan.github.io/bootstrap-datetimepicker/ -->
    <script src="../node_modules/bootstrap-datetimepicker.min.js"></script>
    <!--	Plugin for Tags, full documentation here: https://github.com/bootstrap-tagsinput/bootstrap-tagsinputs  -->
    <script src="../node_modules/bootstrap-tagsinput.js"></script>
    <!-- Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput -->
    <script src="../node_modules/jasny-bootstrap.min.js"></script>
    <!--  Full Calendar Plugin, full documentation here: https://github.com/fullcalendar/fullcalendar    -->
    <script src="../node_modules/fullcalendar.min.js"></script>
    <!-- Vector Map plugin, full documentation here: http://jvectormap.com/documentation/ -->
    <script src="../node_modules/jquery-jvectormap.js"></script>
    <!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
    <script src="../node_modules/nouislider.min.js"></script>
    <!-- Include a polyfill for ES6 Promises (optional) for IE11, UC Browser and Android browser support SweetAlert -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js"></script>
    <!-- Library for adding dinamically elements -->
    <script src="../node_modules/arrive.min.js"></script>
    <!--  Google Maps Plugin    -->
    <!-- <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script> -->
    <!-- Chartist JS -->
    <script src="../node_modules/chartist.min.js"></script>
    <!--  Notifications Plugin    -->
    <script src="../node_modules/bootstrap-notify.js"></script>
    <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="../node_modules/material-dashboard.js?v=2.1.2" type="text/javascript"></script>

</head>

<body class="app header-fixed aside-menu-fixed sidebar-lg-show">
    

   <div id="coba"></div>

   <script>

var options = {
        chart: {
            renderTo: 'coba',
            type: 'spline',
            animation: Highcharts.svg, // don't animate in old IE
            marginRight: 10,
            events: {
                load: function () {

                    // set up the updating of the chart each second
                    var series = this.series[0];

                    setInterval(function () {
                        json_path="../inc/olah.php?j=realtime";
                        $.getJSON(json_path,function(json){
                            tgl_wkt=json.tanggal+' '+json.waktu; //bikin 2020-11-20 10:00:00
                            // console.log("tgl_wkt="+tgl_wkt);

                            //var x = (new Date(tgl_wkt)).getTime(), //konversi ke millisecond
                            var x = json.waktu, //konversi ke millisecond
                                y = Number(json.curah_hujan);
                            
                            //console.log("X="+x+"=Y="+y);
                            series.addPoint([x, y], true, true);
                        })
                    }, 60000);
                }
            }
        },

        time: {
            useUTC: false
        },

        title: {
            text: 'Live random data'
        },

        accessibility: {
            announceNewData: {
                enabled: true,
                minAnnounceInterval: 15000,
                announcementFormatter: function (allSeries, newSeries, newPoint) {
                    if (newPoint) {
                        return 'New point added. Value: ' + newPoint.y;
                    }
                    return false;
                }
            }
        },

        xAxis: {
            type: 'category',
            tickPixelInterval: 150
        },

        yAxis: {
            title: {
                text: 'Value'
            },
            plotLines: [{
                value: 0,
                width: 1,
                color: '#808080'
            }]
        },

        tooltip: {
            //headerFormat: '<b>{series.name}</b><br/>',
            //pointFormat: '{point.x:%Y-%m-%d %H:%M:%S}<br/>{point.y:.2f}'
        },

        legend: {
            enabled: false
        },

        exporting: {
            enabled: false
        },

        series:[]

}

json_path2="../inc/olah.php?j=realtime_awal";

$.getJSON(json_path2, function(json) {
    //options.xAxis.categories = json[0]['data'];
    options.series[0] = json[0];
    
    chart = new Highcharts.Chart(options);
    
});


        
   </script>
    
    <script src="../node_modules/jquery.dataTables.min.js"></script>
    <script src="../node_modules/dataTables.bootstrap4.min.js"></script>
    <script src="../node_modules/bootstrap.bundle.min.js"></script>
    <script src="../node_modules/jquery.easing.min.js"></script>
    <script src="../node_modules/datatables-demo.js"></script>
</body>

</html>