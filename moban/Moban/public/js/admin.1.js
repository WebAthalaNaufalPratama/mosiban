function initAdmin() {
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

    firebase.database().ref('setting').once('value', function (snapshot) {
        var nilai=[];
        var value = snapshot.val();
        
        $.each(value, function (index, value) {

            if (value) {
                nilai.push(value);
            }
                
            lastIndex = index;
        });
        console.log(nilai);
        // $('#tinggisp').html(nilai[6] + " cm");
        // $('#lebarsp').html(nilai[1] + " cm");
        // $('#panjangsp').html(nilai[2] + " cm");
        // $('#stat1sp').html(nilai[3] + " cm");
        // $('#stat2sp').html(nilai[4] + " cm");
        // $('#stat3sp').html(nilai[5] + " cm");
        
        // $('#delaysp').html(nilai[0] + " Menit");

        document.getElementById("tinggiinp").setAttribute('value', nilai[6]);
        document.getElementById("lebarinp").setAttribute('value', nilai[1]);
        document.getElementById("panjanginp").setAttribute('value', nilai[2]);
        document.getElementById("stat1inp").setAttribute('value', nilai[3]);
        document.getElementById("stat2inp").setAttribute('value', nilai[4]);
        document.getElementById("stat3inp").setAttribute('value', nilai[5]);

        document.getElementById("delayinp").setAttribute('value', nilai[0]);

        console.log(nilai);
        console.log("yess");
        
    });
    $('.updateUser').on('click', function () {
        //alert("alert bisa");
        firebase.database().ref('setting').set({
            tinggipipa: document.getElementById("tinggiinp").value,
            lebar: document.getElementById("lebarinp").value,
            panjang: document.getElementById("panjanginp").value,
            status1: document.getElementById("stat1inp").value,
            status2: document.getElementById("stat2inp").value,
            status3: document.getElementById("stat3inp").value,
            delay: document.getElementById("delayinp").value
          }, function(error) {
            if (error) {
                var errorMessage = error.message;
                alert("ada error yaitu:"+errorMessage);
              // The write failed...
            } else {
                document.getElementById('alertberhasil').style.display = "block";
              // Data saved successfully!
            }
          });
        
        // var values = document.getElementById("formupdate").serializeArray();
        //     var postData = {
        //         name: values[0].value,
        //         email: values[1].value,
        //     };

        //     var updates = {};
        //     updates['/setting/' + updateID] = postData;

        //     firebase.database().ref().update(updates);

        $("#exampleModal2").modal('hide');
    });
    firebase.database().ref('kritiksaran/').once('value', function (snapshot) {
        var tblkritik = [];
        var value = snapshot.val();
        
        $.each(value, function (index, value) {

            if (value) {
                var id = index;
                var date = id.substring(0,10);
                var hour = id.substr(id.length - 5);
                tblkritik.push('<tr>\
                                <td> '+ date + ' </td>\
                                <td> '+ hour + ' </td>\
                                <td>' + value.name + ' </td>\
                                <td>' + value.email + ' </td>\
                                <td>' + value.jenis + ' </td>\
                                <td>' + value.saran + ' </td>\
                                </tr></div>');
            }
                
            lastIndex = index;
            
        $('#saranbody').html(tblkritik);
        });
    });
}
function updateUser(){
    //alert("aa");
        firebase.database().ref('setting').set({
            tinggipipa: document.getElementById("tinggiinp").value,
            lebar: document.getElementById("lebarinp").value,
            panjang: document.getElementById("panjanginp").value,
            status1: document.getElementById("stat1inp").value,
            status2: document.getElementById("stat2inp").value,
            status3: document.getElementById("stat3inp").value,
            delay: document.getElementById("delayinp").value
          }, function(error) {
            if (error) {
                var errorMessage = error.message;
                alert("ada error yaitu:"+errorMessage);
              // The write failed...
            } else {
                //alert("bisaa");
                document.getElementById('alertberhasil').style.display = "block";
                //location.reload();
              // Data saved successfully!
            }
          });
        
        // var values = document.getElementById("formupdate").serializeArray();
        //     var postData = {
        //         name: values[0].value,
        //         email: values[1].value,
        //     };

        //     var updates = {};
        //     updates['/setting/' + updateID] = postData;

        //     firebase.database().ref().update(updates);

        $("#exampleModal2").modal('hide');
        canceledit();
}
function opensetting(){
    document.getElementById('btn1').style.display = "none";
    document.getElementById('btn2').style.display = "block";
    document.getElementById('btn3').style.display = "block";
    
    document.getElementById("tinggiinp").removeAttribute("disabled");
    document.getElementById("lebarinp").removeAttribute("disabled");
    document.getElementById("panjanginp").removeAttribute("disabled");
    document.getElementById("stat1inp").removeAttribute("disabled");
    document.getElementById("stat2inp").removeAttribute("disabled");
    document.getElementById("stat3inp").removeAttribute("disabled");
    document.getElementById("delayinp").removeAttribute("disabled");
    
}
function canceledit(){
    document.getElementById('btn1').style.display = "block";
    document.getElementById('btn2').style.display = "none";
    document.getElementById('btn3').style.display = "none";
    
    document.getElementById("tinggiinp").setAttribute("disabled", "true");
    document.getElementById("lebarinp").setAttribute("disabled", "true");
    document.getElementById("panjanginp").setAttribute("disabled", "true");
    document.getElementById("stat1inp").setAttribute("disabled", "true");
    document.getElementById("stat2inp").setAttribute("disabled", "true");
    document.getElementById("stat3inp").setAttribute("disabled", "true");
    document.getElementById("delayinp").setAttribute("disabled", "true");
}
function exportF(urutan) {
    alert('bisa');
    let table = document.getElementsByTagName("table"); // you can use document.getElementById('tableId') as well by providing id to the table tag
    TableToExcel.convert(table[urutan], { // html code may contain multiple tables so here we are refering to 1st table tag
    name: 'export'+rand()+'.xlsx', // fileName you could use any name
    sheet: {
      name: 'Sheet 1' // sheetName
    
  }})
}
    
function exportToExcel(tableId){
    var file_name = "name_"+date+".xlsx"; //filename with current date, change if needed
    var meta = '<meta http-equiv="content-type" content="text/html; charset=UTF-8" />';
    var html = $(tableId).clone();

    let tableData = document.getElementById(tableId);
    let table = document.getElementsByTagName("table");
    //tableData = tableData.replace(/<img[^>]*>/gi,""); //enable thsi if u dont want images in your table
	//tableData = tableData.replace(/<A[^>]*>|<\/A>/g, ""); //remove if u want links in your table
    //tableData = tableData.replace(/<input[^>]*>|<\/input>/gi, ""); //remove input params
    html = "<table>"+html.html()+"</table>";
    tableData = tableData + 'Moban Page'
    var uri = 'data:application/vnd.ms-excel,'+encodeURIComponent(meta+html);
    var a = $("<a>", {href: uri, download: file_name});
    $(a)[0].click();

	//click a hidden link to which will prompt for download.
	// let a = document.createElement('a')
	// let dataType = 'data:application/vnd.ms-excel';
	// a.href = `data:application/vnd.ms-excel, ${encodeURIComponent(table[tableId])}`
	// a.download = 'exportMoban-' + rand() + '.xlsx'
	// a.click()
}
function rand() {
	let rand = Math.floor((Math.random().toFixed(2)*100))
	let dateObj = new Date()
	let dateTime = `${dateObj.getHours()}${dateObj.getMinutes()}`

	return `${dateTime}${rand}`
}
function debittampil(){
    
    var jumlah = document.getElementById("cmbjumlahdebit").value; //s1.options[s.selectedIndex].value;

    var ascdesc = document.getElementById('cmbascdescdebit').value;
    if (jumlah == 0){ //semua
        alert('ambil semua');
        firebase.database().ref('sensor/tembalang/debit').once('value', function (snapshot) {
            var tblbanjir = [];
            var value = snapshot.val();
            var nomer = 1;
            $.each(value, function (index, value) {
    
                if (value) {
                  var date = new Date(index*1000);
                  var bismillah = index*1000;
                    tblbanjir.push('<tr>\
                                    <td>' + nomer + '</td>\
                                    <td> '+ value.tanggal + ' </td>\
                                    <td> '+ value.jam + ' </td>\
                                    <td>' + value.tinggi/100 + ' m</td>\
                                    <td>' + value.debit + ' m<sup>3</sup>/s</td>\
                                    </tr></div>');
                }
                nomer++;
                lastIndex = index;        
                if(ascdesc=='asc'){ // semua ascending
                    //alert('ambil semua ascending');
                    $('#tbody1').html(tblbanjir);   
                    
                }else if(ascdesc=='desc'){ //semua descending
                    //alert('ambil semua descending');
                    $('#tbody1').html(tblbanjir.reverse());   
                }  
            });
        });
    }else if(jumlah==10||jumlah==50||jumlah==100){ // tidak semua
        alert('tidak semua');
        if(ascdesc=='asc'){ // tidak semua ascending
            firebase.database().ref('sensor/tembalang/debit').limitToFirst(parseInt(jumlah)).once('value', function (snapshot) {
                var tblbanjir = [];
                var value = snapshot.val();
                var nomer = 1;
                
                $.each(value, function (index, value) {
        
                    if (value) {
                      var date = new Date(index*1000);
                      var bismillah = index*1000;
                        tblbanjir.push('<tr>\
                                        <td>' + nomer + '</td>\
                                        <td> '+ value.tanggal + ' </td>\
                                        <td> '+ value.jam + ' </td>\
                                        <td>' + value.tinggi/100 + ' m</td>\
                                        <td>' + value.debit + ' m<sup>3</sup>/s</td>\
                                        </tr></div>');
                    }
                    nomer++;
                    lastIndex = index;        
                    $('#tbody1').html(tblbanjir);
                });
            });    

        }else if(ascdesc=='desc'){ //tidak semua descending
            firebase.database().ref('sensor/tembalang/debit').limitToLast(parseInt(jumlah)).once('value', function (snapshot) {
                var tblbanjir = [];
                var value = snapshot.val();
                var nomer = 1;
                
                $.each(value, function (index, value) {
        
                    if (value) {
                      var date = new Date(index*1000);
                      var bismillah = index*1000;
                        tblbanjir.push('<tr>\
                                        <td>' + nomer + '</td>\
                                        <td> '+ value.tanggal + ' </td>\
                                        <td> '+ value.jam + ' </td>\
                                        <td>' + value.tinggi/100 + ' m</td>\
                                        <td>' + value.debit + ' m<sup>3</sup>/s</td>\
                                        </tr></div>');
                    }
                    nomer ++;
                    lastIndex = index;        
                    $('#tbody1').html(tblbanjir);
                });
            });    
        }  
    }
}

function hujantampil(){
    
    var jumlah = document.getElementById("cmbjumlahhujan").value; //s1.options[s.selectedIndex].value;

    var ascdesc = document.getElementById('cmbascdeschujan').value;
    if (jumlah == 0){ //semua
        alert('ambil semua');
        firebase.database().ref('sensor/tembalang/hujan').once('value', function (snapshot) {
            var tblhujan = [];
            var value = snapshot.val();
            var nomer = 1;
            $.each(value, function (index, value) {
    
                if (value) {
                  var date = new Date(index*1000);
                  var bismillah = index*1000;
                    tblhujan.push('<tr>\
                                    <td>' + nomer + '</td>\
                                    <td> '+ value.tanggal + ' </td>\
                                    <td> '+ value.jam + ' </td>\
                                    <td>' + value.nilai  + ' mm</td>\
                                    </tr></div>');
                }
                nomer++;
                lastIndex = index;        
                if(ascdesc=='asc'){ // semua ascending
                    //alert('ambil semua ascending');
                    $('#tbody2').html(tblhujan);   
                    
                }else if(ascdesc=='desc'){ //semua descending
                    //alert('ambil semua descending');
                    $('#tbody2').html(tblhujan.reverse());   
                }  
            });
        });
    }else if(jumlah==10||jumlah==50||jumlah==100){ // tidak semua
        alert('tidak semua');
        if(ascdesc=='asc'){ // tidak semua ascending
            firebase.database().ref('sensor/tembalang/hujan').limitToFirst(parseInt(jumlah)).once('value', function (snapshot) {
                var tblhujan = [];
                var value = snapshot.val();
                var nomer = 1;
                
                $.each(value, function (index, value) {
        
                    if (value) {
                      var date = new Date(index*1000);
                      var bismillah = index*1000;
                        tblhujan.push('<tr>\
                                        <td>' + nomer + '</td>\
                                        <td> '+ value.tanggal + ' </td>\
                                        <td> '+ value.jam + ' </td>\
                                        <td>' + value.nilai  + ' mm</td>\
                                        </tr></div>');
                    }
                    nomer++;
                    lastIndex = index;        
                    $('#tbody2').html(tblhujan);
                });
            });    

        }else if(ascdesc=='desc'){ //tidak semua descending
            firebase.database().ref('sensor/tembalang/hujan').limitToLast(parseInt(jumlah)).once('value', function (snapshot) {
                var tblhujan = [];
                var value = snapshot.val();
                var nomer = 1;
                
                $.each(value, function (index, value) {
        
                    if (value) {
                      var date = new Date(index*1000);
                      var bismillah = index*1000;
                        tblhujan.push('<tr>\
                                        <td>' + nomer + '</td>\
                                        <td> '+ value.tanggal + ' </td>\
                                        <td> '+ value.jam + ' </td>\
                                        <td>' + value.nilai  + ' mm</td>\
                                        </tr></div>');
                    }
                    nomer ++;
                    lastIndex = index;        
                    $('#tbody2').html(tblhujan);
                });
            });    
        }  
    }
}

function bt(){
    var s = document.getElementById("endhujan").value;
    //var s = "sssss";
    alert(s);
}
// Basic example
$(document).ready(function () {
    $('#debittable').DataTable();
    $('.dataTables_length').addClass('bs-select');
  });

window.onload = initAdmin();