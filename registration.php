<?php

@include 'config.php';

if(isset($_POST['submit'])){

   $name = mysqli_real_escape_string($conn, $_POST['name']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass = md5($_POST['password']);
   $cpass = md5($_POST['cpassword']);
   $user_type = $_POST['user_type'];

   $select = " SELECT * FROM user_f WHERE email = '$email' && password = '$pass' ";

   $result = mysqli_query($conn, $select);

   if(mysqli_num_rows($result) > 0){

      $error[] = 'user already exist!';

   }else{

      if($pass != $cpass){
         $error[] = 'password not matched!';
      }else{
         $insert = "INSERT INTO user_f(name, email, password, user_type) VALUES('$name','$email','$pass','$user_type')";
         mysqli_query($conn, $insert);
         header('location:login_form.php');
      }
   }

};


?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>register form</title>
   <link rel="stylesheet" href="style.css">
   <link rel="Stylesheet" href="menu page.css">

</head>
<body>
<nav class="navbar">
    <div class="logo">
      <img src="logomain.png"alt="logo"><p class="heading"></p></div>
    <ul class="navlist hide" id="Hide">
        <!-- <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a> -->
            <li><a class="ss" href="index.html"><h1 class="head">Home</h1></a>
            <li><div class="dropdown">
                <button class="dropbtn"><h1 class="head">Scholarship</h1> </button>
                <div class="dropdown-content">
                  <a href="scholarship.html">All Scholarships</a>
                  <a href="scholarship.html">Categories</a>
                  <a href="scholarship.html">National</a>
                  <a href="scholarship.html">Current class</a>
                  <a href="scholarship.html">International</a>
                  <a href="scholarship.html">Government</a>
                </div>
              </div> </li>
              <li><div class="dropdown">
                <button class="dropbtn"> <h1 class="head">login</h1></button>
                <div class="dropdown-content">
                  <a href="user page.html">User</a>
                  <a href="admin page.html">Admin</a>
                </div>
              </div> </li>
            <li><a href="Article.html"><h1 class="head">Article</h1></a></li>
            <!-- <li><a href="#Q&A">Q&A</a></li>  -->
            
            <!-- <li><a href="#Register">Register</a></li> -->
        </ul>
    </ul>
    <div id="myNav" class="overlay">
      
      <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
      <div class="overlay-content">
        <div class="logo1"><img src="logo.png"alt="logo">Education Grant Portal</div>
          <a class="ss" href="index.html"><h1 class="head">Home</h1></a>
          <a href="scholarship.html"><h1 class="head">All Scholarships</h1></a>
          <!-- <div class="dropdown">
                <button class="dropbtn">Scholarship </button>
                <div class="dropdown-content">
                  <a href="redirect">All Scholarships</a>
                  <a href="#">Categories</a>
                  <a href="#">State</a>
                  <a href="#">Current class</a>
                  <a href="#">International</a>
                  <a href="#">Government</a>
                </div>  -->
          <a href="register.html"><h1 class="head">Register</h1></a></li>
            <a href="login form.html"><h1 class="head">Login</h1></a>
            <a href="Article.html"><h1 class="head">Article</h1></a>
            
          </div>  
      </div>
    </div>
    <span class="span" style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; </span>
    
    <script>
    function openNav() {
      document.getElementById("myNav").style.display = "block";
      document.getElementById("mar").style.display = "none";
      document.getElementById("mar").style.height = "0px";
      document.getElementById("exp").style.display = "none";
      document.getElementById("scholar").style.display = "none";
      document.getElementById("con").style.display = "none";
      document.getElementById("for").style.display = "none";
      document.getElementById("las").style.display = "none";
      document.getElementById("cd").style.display = "none";
      
    }
    
    function closeNav() {
      document.getElementById("myNav").style.display = "none";
      document.getElementById("mar").style.display = "block";
      document.getElementById("exp").style.display = "block";
      document.getElementById("scholar").style.display = "block";
      document.getElementById("con").style.display = "block";
      document.getElementById("for").style.display = "block";
      document.getElementById("las").style.display = "block";
      document.getElementById("cd").style.display = "block";
    }
    </script>
</nav>  
<div class="form-container">

   <!-- <form action="" method="post">
      <h3>register now</h3> -->
      <form action="user screen.html" method="post">
         <h3>register now</h3>
         <!-- <?php
         if(isset($error)){
            foreach($error as $error){
               echo '<span class="error-msg">'.$error.'</span>';
            };
         };
         ?> -->
      <input type="text" name="name" required placeholder="enter your name">
      <input type="email" name="email" required placeholder="enter your email">
      <input type="password" name="password" required placeholder="enter your password">
      <input type="password" name="cpassword" required placeholder="confirm your password">
      <select name="user_type">
         <option value="user" id="users" onselect="open()">user</option>
         <option value="admin" id="admins">admin</option>
      </select>
      <button type="submit" name="submit" value="register now" class="form-btn" id="sub" onclick="open()"><a class="res" href="user screen.html">Register Now</a></button>
      <p>already have an account? <a href="login form.html">login now</a></p>
      
      <script>
         function open(){
           document.getElementById("sub").innerHTML=<a href="user screen.html"></a>;
         }
         
       </script>
   </form>

</div>

</body>
</html>