<?php
include('connector.php');

function create_team(string $team_name){
  $conn = db_connect();
  $sql = "INSERT INTO teams (team_name) VALUES('$team_name')";
  $conn->exec($sql);
  $stmt = $conn->prepare("SELECT * FROM teams ORDER BY id DESC limit 1");
  $stmt->execute();
  $result = $stmt->fetch(PDO::FETCH_ASSOC);
  if($result['team_name'] !== $team_name){
  return false;
  }
  return true;


}


?>