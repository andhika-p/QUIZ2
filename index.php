<?php
session_start();
if(isset($_SESSION['login'])){
  
  if($_SESSION['login'] != 'aktif'){
    header("Location: login.php");
  }
  else{
    $_SESSION['waktu_login'] = $_COOKIE['waktu_login'];
    $_SESSION['username'] = $_COOKIE['username'];
    $_SESSION['login'] = 'aktif';
  }
}
else{
  if(isset($_COOKIE['username']) && isset($_COOKIE['password'])){
    // echo "cookie ada";
    $_SESSION['waktu_login'] = $_COOKIE['waktu_login'];
    $_SESSION['login'] = 'aktif';
    $_SESSION['uesrname'] = $_COOKIE['username'];
    
  }
  else{
    // echo "cookie tidak ada";
    $_SESSION['login'] = 'tidak aktif';
    header("Location: login.php");
    
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
    <h1 class="text-center">Beranda</h1>
    <h1 class="text-center">User = <?= $_SESSION['username'] ?></h1>
    <?php
    if(isset($_COOKIE['username'])){ ?>
      <p>cookie aktif</p>
      <p>telah login pada jam ini menit ke <?= $_COOKIE['waktu_login'] ?></p>
      <p>cookie di set 180 detik setelah cookie di set</p>
    <?php
    }
    else{ ?>
      <h1 class="text-center">cookie tidak aktif</h1>
    <?php
    }
    ?>
    
  </div>
  

  <script src="bootstrap/bootstrap.min.js"></script>
</body>
</html>