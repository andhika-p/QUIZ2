<?php
session_start();
if(isset($_POST['tombol_login'])){
  // var_dump($_POST);
  $username = $_POST['username_input'];$password = $_POST['password_input'];
  // echo $username.$password;
  $validasi_input = mysqli_query($conn,"SELECT * FROM data_pengguna WHERE username = '$username' and password = '$password' ");
  if( mysqli_num_rows($validasi_input) ){
    if(isset($_POST['cookie_check'])){
      echo "<script>alert('anda masuk dengan cookie')</script>";
      setcookie("username",$username,time()+180);
      setcookie("password",$username,time()+180);
      setcookie("waktu_login",date("i:s",time() ) ,time()+180 );
      $_SESSION['waktu_login'] = date("i:s",time());
    
    }
    else{
      echo "<script>alert('anda masuk tanpa cookie')</script>";
    }
    $_SESSION['login'] = 'aktif';
    $_SESSION['username'] = $username;
    // header("Location: index.php");
  }
  else{
    echo "<script>alert('username atau password yang anda masukan salah')</script>";
  }
}
?>