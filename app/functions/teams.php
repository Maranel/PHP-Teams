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


function delete(array $teams_id){
    $conn = db_connect();
    foreach( $teams_id as $id){
      $id =  (int) $id;
      $stmt = $conn->prepare("DELETE FROM teams WHERE id=$id");
      $stmt->execute();
    }

}

?>