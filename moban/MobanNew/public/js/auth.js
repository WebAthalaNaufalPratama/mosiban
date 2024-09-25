window.onload = function() {
  initApp();
  };
window.onload = initApp();
function initApp() {
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
  firebase.auth().onAuthStateChanged(function(user) {
    // [START_EXCLUDE silent]
    //document.getElementById('quickstart-verify-email').disabled = true;
    // [END_EXCLUDE]
    if (user) {
      // User is signed in.
      console.log("Auth signed in");
      document.getElementById('btnsignin').textContent = 'Sign Out';
      document.getElementById('btnsignin').setAttribute("data-target","")
      document.getElementById('btnsignin').setAttribute("onClick","firebase.auth().signOut()")
      document.getElementById('adminnav').style.display = "block";
      document.getElementById('lognav').style.display = "block";
      document.getElementById('feednav').style.display = "none";
      var displayName = user.displayName;
      var email = user.email;
      var emailVerified = user.emailVerified;
      var photoURL = user.photoURL;
      var isAnonymous = user.isAnonymous;
      var uid = user.uid;
      var providerData = user.providerData;
      
      //alert(email);
      // [START_EXCLUDE]
      // document.getElementById('quickstart-sign-in-status').textContent = 'Signed in';
      //document.getElementById('btnsignin').style.display = "none";
      //document.getElementById('btnsignout').style.display = "block";
      //document.getElementById('quickstart-account-details').textContent = JSON.stringify(user, null, '  ');
      // if (!emailVerified) {
      //   document.getElementById('quickstart-verify-email').disabled = false;
      // }
      // [END_EXCLUDE]
    } else {
      // User is signed out.
      document.getElementById('btnsignin').setAttribute("data-target","#exampleModal");
      document.getElementById('btnsignin').setAttribute("onClick","")
      document.getElementById('btnsignin').textContent = 'Sign In';
      document.getElementById('adminnav').style.display = "none";
      document.getElementById('lognav').style.display = "none";
      document.getElementById('feednav').style.display = "block";
      console.log("Auth signed out");
      // [START_EXCLUDE]
      // document.getElementById('quickstart-sign-in-status').textContent = 'Signed out';
      // document.getElementById('quickstart-account-details').textContent = 'null';
      // [END_EXCLUDE]
    }
    // [START_EXCLUDE silent]
    document.getElementById('quickstart-sign-in').disabled = false;
    // [END_EXCLUDE]
  });
  //document.getElementById('quickstart-sign-in').addEventListener('click', toggleSignIn, false);
 
};
function logout(){

}
function btnlogin(){
  console.log("Login");
  var email = document.getElementById('email').value;
  var password = document.getElementById('password').value;
  if (email.length < 4) {
    alert('Please enter an email address.');
    return;
  }
  if (password.length < 4) {
    alert('Please enter a password.');
    return;
  }
  if(firebase.auth().currentUser){}
  else{
    // Sign in with email and pass.
    // [START authwithemail]
    firebase.auth().signInWithEmailAndPassword(email, password)
    .then((_) => {
    window.location.href = "/moban/MobanNew/public/admin"
    })
    .catch(function(error) {
      console.log(email);
      // Handle Errors here.
      var errorCode = error.code;
      var errorMessage = error.message;
      // [START_EXCLUDE]
      if (errorCode === 'auth/wrong-password') {
        alert('Wrong password.');
      } else if (errorCode === 'auth/user-not-found'){
        alert('Email Not Registered.');
      } else {
        alert(errorMessage);
      }
      console.log(error);
      //document.getElementById('quickstart-sign-in').disabled = false;
      // [END_EXCLUDE]
    });
    $('#exampleModal').modal('hide');
    // [END authwithemail]
    // window.location.href = "/admin"
  }
  //
}
    