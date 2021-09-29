<?php

include ('connector.php');

function login(string $password,string $email){

  $conn = db_connect();
  $stmt =  $conn->prepare("SELECT * FROM users WHERE  email='$email'");
  $stmt->execute();
  $stmt->setFetchMode(PDO::FETCH_ASSOC);
  $result = $stmt->fetch(PDO::FETCH_ASSOC);
  if(password_verify($password, $result['password'])){
    return $result;
  }else{
    return 4;
  }

  

}




?>