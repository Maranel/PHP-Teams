<?php

function insertuser($username, $password, $userid, $email)
{
  $conn = db_connect();
  $password = password_hash($password, PASSWORD_BCRYPT);
  $sql = "INSERT INTO users (username,password,userid,email) VALUES('$username','$password','$userid','$email')";
  $conn->exec($sql);
  }
?>