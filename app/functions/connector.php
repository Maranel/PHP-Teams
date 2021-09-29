<?php




function db_connect()
{
  $servername = "localhost";
  $tabusername = "root";
  $tabpassword = "";
  $dbname = "mybase";
  try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $tabusername, $tabpassword);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $conn;
    echo "Connected successfully";
  } catch (PDOException $e) {
    throw $e;
  }
}

?>