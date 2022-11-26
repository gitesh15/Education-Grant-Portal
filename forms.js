// Your web app's Firebase configuration
  // For Firebase JS SDK v7.20.0 and later, measurementId is optional
 // Your web app's Firebase configuration
 const firebaseConfig = {
    apiKey: "AIzaSyAzkBeoK5tYFVzoDfpDLTljjLqUxaERFFU",
    authDomain: "minor-7b7a4.firebaseapp.com",
    databaseURL: "https://minor-7b7a4-default-rtdb.firebaseio.com",
    projectId: "minor-7b7a4",
    storageBucket: "minor-7b7a4.appspot.com",
    messagingSenderId: "585969567164",
    appId: "1:585969567164:web:9a5e7e4d87e43d492797b9"
  };
    // Initialize Firebase
    firebase.initializeApp(firebaseConfig);
  
    const auth =  firebase.auth();
  
    //signup function
    function signUp(){
        // var name = document.getElementById("name");
      var email = document.getElementById("email");
      var password = document.getElementById("password");
  
      const promise = auth.createUserWithEmailAndPassword(email.value,password.value);
      //
      promise.catch(e=>alert(e.message));
      alert("SignUp Successfully");
    }

    //signIN function
    function  signin(){
      var email = document.getElementById("email");
      var password  = document.getElementById("password");
      const promise = auth.signInWithEmailAndPassword(email.value,password.value);
      promise.catch(e=>alert(e.message));
      
    }
  //   loginUser = (email, password, navigate) => {
  //     try {
  //             firebase.auth().signInWithEmailAndPassword(email,password).then(function(user){
  //             console.log(user);
  //             navigate('Learn')
  //         })
  //     }
  //     catch (error) {
  //         console.log(error.toString())
  //     }
  // };
  
  
    //signOut
  
    function signOut(){
      auth.signOut();
      alert("SignOut Successfully from System");
    }
  
    //active user to homepage
    firebase.auth().onAuthStateChanged((user)=>{
      if(user){
        var email = user.email;
        alert("Active user "+email);
  
      }else{
        alert("No Active user Found")
      }
    })