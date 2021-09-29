<?php
session_start();
require_once './functions/auth.php';

if(isset($_POST['login']))
{
  $password = $_POST['password'];        
  $email = $_POST['email'];
  $_SESSION['user'] = login($password,$email);
  if($_SESSION['user'] == 4 ){
    session_destroy();
    header('Location: /PHP-Teams/?page=login');
  } else{
    header('Location: /PHP-Teams');
    }
  }

?>