<?php 
session_start();

require_once('../require/Utils.php');
if (isset($_SESSION['email'])) {
  Redirect('../profile.php', false);
}
?>




<html>

<head>
  <link rel="stylesheet" href="../css/style.css">
  <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
  <title>Sign in</title>

  <style type="text/css"><?php   include "../css/style.css"; ?></style>

<style>
  .btn {
    width: 76%;
    color: rgb(244, 236, 241);
    font-weight: 700;
    font-size: 14px;
    letter-spacing: 1px;
    background: linear-gradient(to right, #9C27B0, #E040FB);
    padding: 10px 20px;
    border: none;
    border-radius: 20px;
    outline: none;
    box-sizing: border-box;
    border: 3px solid rgba(255, 255, 255, 0.81);
    margin-bottom: 50px;
    margin-left: 1px;
    text-align: center;
    margin-bottom: 27px;
    font-family: 'Ubuntu', sans-serif;}
.title {
    align-items: center;
    border-bottom: 3px solid #b768ce;
    padding-left: 39%;
    display: flex;
    justify-content: space-between;
    font-weight: 300;
    margin: 20px 0 0;
    font-family: Arial Helvetica sans-serif;
    color: #b768ce;
}


  </style>

  <a class='btn'  href='../home.php'>Home</a>
  <a class='btn' href='authentication.php' class='active' >Login</a>


</head>

<body>
  <h2 class="title">Bakeliciouzzz cahe house</h2>
  <div class="main">
    <p class="sign" align="center">Sign Up</p>
    <form class="form1" action="registration.php" method="POST" >
      <input class="un " type="text" align="center" placeholder="Firstname" name="firstname">
      <input class="un " type="text" align="center" placeholder="Lastname" name="lastname">
      <input class="un " type="text" align="center" placeholder="Email" name="email">
      <input class="pass" type="password" align="center" placeholder="Password" name="password">
      <button class="submit" align="center">Sign Un</button>
      <p class="forgot" align="center"><a href="#">Forgot Password?</p>
            
                
    </div>
     
</body>

</html>





