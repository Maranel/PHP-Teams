<?php
session_start();
include('./functions/chc_rgr_value.php');
include('./functions/insertuser.php');

if (isset($_POST["submit"])) {
  $username = $_POST["username"];
  $password = $_POST["password"];
  $userid = $_POST["userid"];
  $email = $_POST["email"];
  $valchck = chckinpt($username, $userid, $password,$email);
  if ($valchck != 4) {
  insertuser($username, $password, $userid, $email);
  $_SESSION['email'] = $email;
  header('Location: /PHP-Teams/?page=registered'); 
  }else{
    header('Location: /PHP-Teams/?page=register');
  }
   
}



?>