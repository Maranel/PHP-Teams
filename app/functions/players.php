<?php

include ('connector.php');
function getAllplayers(){

                    $conn = db_connect();
                    $stmt =  $conn->prepare("SELECT * FROM users");
                    $stmt->execute();
                    $stmt->setFetchMode(PDO::FETCH_ASSOC);
                    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
                    return $result;
                  
                  }


?>