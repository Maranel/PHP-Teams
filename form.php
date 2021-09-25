<?php

  if(isset($_POST["submit"])){
    $min = 1;
    $username = $_POST["username"];
    $surename = $_POST["surename"];
    $userid = $_POST["userid"];
    $email = $_POST["email"];

    $conn = db_connect();
    $valchck=chckinpt($email,$username,$userid,$surename,$conn);
    if($valchck!= 4){
      insertuser($username,$surename,$userid,$email,$conn);       
    }
                    }

function insertuser($username,$surename,$userid,$email,$conn){
                    
  $sql = "INSERT INTO users (username,surename,userid,email) VALUES('$username','$surename','$userid','$email')";
  $conn->exec($sql);
  $stmt = $conn->prepare("SELECT username,surename,userid,email FROM users");
  $stmt->execute();
  $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
  foreach($stmt->fetchAll() as $v){
  echo '<div >'.$v['username'].' '.$v['surename'].' '.$v['userid'].' '.$v['email'].'</div>';
                   


    }
  }

function chck_tabval($test_id,$conn){
  $conn = db_connect();
  $stmt =  $conn->prepare("SELECT userid FROM users WHERE userid='$test_id'");
  $stmt->execute();
  $stmt->setFetchMode(PDO::FETCH_ASSOC);
  $result = $stmt->fetchAll();

  if(count($result) > 0){
    return 4;
  }
}


function chckinpt($test_email,$test_user,$test_id,$test_srname,$conn){

  if(isset($_POST["submit"])){
    if (empty($_POST["username"])) {
      echo "Name is required";
      return 4;
    } 
  if (empty($_POST["email"])) {
    echo "Email is required";
    return 4;
   }
    elseif (!filter_var($test_email, FILTER_VALIDATE_EMAIL)) {
      echo "Invalid email format";
      return 4;
   }
   if (empty($_POST["surename"])) {
    echo "Surename is required";
    return 4;
  }
    if (empty($_POST["userid"])) {
      echo "Nick is required";
      return 4;
    }
    elseif(chck_tabval($test_id,$conn)==4){
      echo "Nick name exist.";
      return 4;
    }  

  }
}


function db_connect(){
  $servername = "localhost";
  $tabusername = "root";
  $tabpassword = "";
  $dbname = "mybase";
  try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $tabusername, $tabpassword);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $conn;
    echo "Connected successfully"; }
    catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage(); }
  }
?>