<?php
   session_start();
   require_once("koneksi.php");
    // $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
  
   $sql = "SELECT * FROM user WHERE email = '$email'";
   $query = $con->query($sql);
   $hasil = $query->fetch_assoc();
   if($query->num_rows == 0) {
    echo "<script>alert('Username Belum Terdaftar!');history.go(-1);</script>";
   } else {
     if($password <> $hasil['password']) {
    echo "<script>alert('Password Salah!');history.go(-1);</script>";
     } else {
      $_SESSION['email'] = $hasil['email'];
       $_SESSION['username'] = $hasil['username'];
       header('location:movies.php');
     }
   }
?>