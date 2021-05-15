<?php
require "databases.php";
require "method_login.php";

if(isset($_SESSION['login'])){
  
  if($_SESSION['login'] == 'aktif'){
    header("Location: index.php");
  }
  else{
    if(isset($_COOKIE['username']) && isset($_COOKIE['password'])){
      // echo "cookie ada";
      $_SESSION['waktu_login'] = $_COOKIE['waktu_login'];
      $_SESSION['login'] = 'aktif';
      header("Location: index.php");
    }
    else{
      // echo "cookie tidak ada";
      $_SESSION['login'] = 'tidak aktif';
    }
  }
}
else{
  if(isset($_COOKIE['username']) && isset($_COOKIE['password'])){
    // echo "cookie ada";
    $_SESSION['waktu_login'] = $_COOKIE['waktu_login'];
    $_SESSION['login'] = 'aktif';
    $_SESSION['uesrname'] = $_COOKIE['username'];
    header("Location: index.php");
  }
  else{
    // echo "cookie tidak ada";
    $_SESSION['login'] = 'tidak aktif';
  }
}
?>






<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Halaman | Login</title>
  <link rel="stylesheet" href="bootstrap/bootstrap.min.css">
  <style>
    body{
      background-color: lightblue;
    }
    .container{
      width: 550px;
      height: 100vh;
    }
  </style>
</head>
<body>

  <div class="container bg-light">
    <form action="" method="POST">
    <h1 class="text-center">Login Form</h1>
      <table>
        <tr>
          <td>Username</td> 
          <td><input type="text" name="username_input" class="form-control"></td>
        </tr>
        <tr>
          <td>password</td> 
          <td><input type="password" name="password_input" class="form-control"></td>
        </tr>
        <tr>
          <td>ingat saya <input class="form-check-input" type="checkbox" value="" name="cookie_check" id="flexCheckDefault"> </td> <td></td>
          
        </tr>
      </table>
      <center><button class="btn btn-success" type="submit" name="tombol_login" > masuk </button></center>
    </form>
  </div>
  

  <script src="bootstrap/bootstrap.min.js"></script>
</body>
</html>