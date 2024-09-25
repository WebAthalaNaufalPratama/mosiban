<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Chart</title>

    <script src="https://www.gstatic.com/firebasejs/6.3.5/firebase.js"></script>

	<script type="text/javascript" src="{{ URL::asset('js/Chart.js') }}"></script>

    <script src="https://www.gstatic.com/firebasejs/6.3.5/firebase-app.js"></script>
    <script src="https://www.gstatic.com/firebasejs/6.3.5/firebase-database.js"></script>

</head>
<body>
<canvas id="myChart" width="50" height="50"></canvas>
<script>
    var ctx = document.getElementById('myChart').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: [contohArr],
            datasets: [{
                label: '# of Whatever',
                data: [contohArr],
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: false
                    }
                }]
            }
        }
    });

    function addData(chart, label, data) {
        chart.data.labels.push(label);
        chart.data.datasets.forEach((dataset) => {
            dataset.data.push(data);
        });
        chart.update();
    }

    function removeData(chart) {
        chart.data.labels.pop();
        chart.data.datasets.forEach((dataset) => {
            dataset.data.pop();
        });
        chart.update();
    }

    //Firebase code
    //Config values to ba adapted!
    var config = {
        apiKey: "AIzaSyBrPMdssPaCUEl3mHZuHPpJ9UEubeVhK8M",
        authDomain: "bisa-b2497.firebaseapp.com",
        databaseURL: "https://bisa-b2497.firebaseio.com/",
        projectId: "bisa-b2497",
        storageBucket: "bisa-b2497.appspot.com"
    };

    function snapshotToArray(snapshot) {
        var returnArr = [];
        snapshot.forEach(function(childSnapshot) {
            var item = childSnapshot.val();
            item.key = childSnapshot.key;
            returnArr.push(item);
        });
        return returnArr;
    };

    firebase.initializeApp(config);
    var contohArr = [];
    var contohArr2 = [];
    //firebase.database().ref('coba').on('value', function(snapshot)
    firebase.database().ref('sensor/tlogosari').on('value', function(snapshot) {
        var value = snapshot.val();
        var htmls = [];
        console.log(snapshotToArray(snapshot));
        contohArr2.push(snapshotToArray(snapshot));

        snapshot.forEach(function(childsnapshot){
            var item = snapshot.val();
            contohArr.push(item);
        });
        snapshot.foreach(value, function (index, value) {
            if (value) {
                htmls.push(index.substr(0, 2) + ' : ' + index.substr(2, 2) + value.banjir);
            }
            lastIndex = index;
        });
    });
        console.log(contohArr);
        console.log(item.banjir)
        console.log(contohArr2);
	
        

</script>

</body>
</html>