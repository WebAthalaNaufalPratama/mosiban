function mulaifeedback() {
    var configfb = {
        apiKey: "AIzaSyBrPMdssPaCUEl3mHZuHPpJ9UEubeVhK8M",
        authDomain: "bisa-b2497.firebaseapp.com",
        databaseURL: "https://bisa-b2497.firebaseio.com/",
        storageBucket: "bisa-b2497.appspot.com",
    };
    if (!firebase.apps.length) {
        firebase.initializeApp(configfb);
        alert("mulai");
    }
    var lastIndex = 0;
    $('#submitUser').on('click', function () {
        
    });

    var s = document.getElementById("jenis");
    var jenis = s.options[s.selectedIndex].value;
    if(jenis == 0){
        alert("Web");
    }
    else    if(jenis == 1){
        alert("android");
    }
    $('.submitUser').on('click', function () {
        
    });
    
}
function message() {

    var s = document.getElementById('item1');
    var item1 = s.options[s.selectedIndex].value;
    
    if (item1 == 1) {
        alert("it equals camera")
    }
    else if (item1 == 2) {
        alert("it equals microphone")
    }
    else if (item1 == 3) {
        alert("it equals tripod")
    }
    }
function btnkirim(){
    alert("bisa yus");
    var lastIndex = 0;
    var values = $("#addUser").serializeArray();
    var name = document.getElementById('InputName').value;
    var email = document.getElementById('InputEmail').value;
    var jenis = document.getElementById('jenis').value;
    var saran = document.getElementById('saran').value;
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

    var date = day+"-"+month+"-"+year+"-"+hour+"-"+minute;

    console.log(date);

    firebase.database().ref('kritiksaran/' + date).set({
        name: name,
        email: email,
        jenis: jenis,
        saran: saran,
    });

    // Reassign lastID value
    lastIndex = userID;
    $("#addUser input").val("");
}
function getDateTime() {
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
    if(second.toString().length == 1) {
         second = '0'+second;
    }   
    var dateTime = year+'/'+month+'/'+day+' '+hour+':'+minute+':'+second;   
     return dateTime;
}
window.onload = mulaifeedback();
window.onload = function() {
    mulaifeedback();
    };