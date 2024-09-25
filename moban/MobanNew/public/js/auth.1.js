function toggleSignIn() {
    if (firebase.auth().currentUser) {
      // [START signout]
      //document.getElementById('btnsignin').setAttribute("data-target","#exampleModal")
      firebase.auth().signOut();
      console.log("Logout");
      location.reload();
      // [END signout]
    } else {
      //document.getElementById('btnsignin').setAttribute("data-target","")
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
      // Sign in with email and pass.
      // [START authwithemail]
      firebase.auth().signInWithEmailAndPassword(email, password).catch(function(error) {
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
        document.getElementById('quickstart-sign-in').disabled = false;
        // [END_EXCLUDE]
      });
      // [END authwithemail]
    }
    //document.getElementById('quickstart-sign-in').disabled = true;
    $('#exampleModal').modal('hide');
    window.location.href = "/admin"
  };
function initApp() {
    var configfb = {
        apiKey: "AIzaSyBrPMdssPaCUEl3mHZuHPpJ9UEubeVhK8M",
        authDomain: "bisa-b2497.firebaseapp.com",
        databaseURL: "https://bisa-b2497.firebaseio.com/",
        storageBucket: "bisa-b2497.appspot.com",
    };
    if (!firebase.apps.length) {
        firebase.initializeApp(configfb);
    }
    //document.getElementById("navbarli").children[0].style.display = "none"
    // Listening for auth state changes.
    // [START authstatelistener]
    firebase.auth().onAuthStateChanged(function(user) {
      // [START_EXCLUDE silent]
      //document.getElementById('quickstart-verify-email').disabled = true;
      // [END_EXCLUDE]
      if (user) {
        // User is signed in.
        console.log("Auth signed in");
        document.getElementById('btnsignin').textContent = 'Sign Out';
        //document.getElementById('btnsignin').setAttribute("data-target","")
        //document.getElementById('btnsignin').setAttribute("onClick","firebase.auth().signOut()")
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
    // [END authstatelistener]
  
    document.getElementById('quickstart-sign-in').addEventListener('click', toggleSignIn, false);
   
  };
window.onload = function() {
initApp();
};
window.onload = initApp();
  