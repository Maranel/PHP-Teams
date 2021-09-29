<?php

include ('connector.php');
function getTeams(){

                    $conn = db_connect();
                    $stmt =  $conn->prepare("SELECT * FROM teams ORDER BY id");
                    $stmt->execute();
                    $stmt->setFetchMode(PDO::FETCH_ASSOC);
                    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
                    return $result;
                  
                  }


?>