<?php
include('connector.php');

function chckinpt($test_user, $test_id, $test_pass,$test_email)
{

  $conn = db_connect();                 
  if (isset($_POST["submit"])) {
    if (empty($_POST["username"])) {
      echo "Name is required";
      return 4;
    }
    if (empty($_POST["email"])) {
      echo "Email is required";
      return 4;
    } elseif (!filter_var($test_email, FILTER_VALIDATE_EMAIL)) {
      echo "Invalid email format";
      return 4;
    } elseif (chck_tabval($test_email,'email', $conn) == 4){
     echo "Email adress exist.";
     return 4;
        }
    }
    if (empty($_POST["userid"])) {
      echo "Nick is required";
      return 4;
    } elseif (chck_tabval($test_id,'userid', $conn) == 4) {
      echo "Nick name exist.";
      return 4;
    }
    if(!empty($test_pass) && $test_pass != "" ){
      if (strlen($_POST["password"]) <= '8') {
          echo "Your Password Must Contain At Least 8 Digits !"."<br>";
          return 4;
      }
      elseif(!preg_match("#[0-9]+#",$test_pass)) {
        echo "Your Password Must Contain At Least 1 Number !"."<br>";
        return 4;
      }
      elseif(!preg_match("#[A-Z]+#",$test_pass)) {
        echo"Your Password Must Contain At Least 1 Capital Letter !"."<br>";
        return 4;
      }
      elseif(!preg_match("#[a-z]+#",$test_pass)) {
        echo "Your Password Must Contain At Least 1 Lowercase Letter !"."<br>";
        return 4;
      }
      elseif(!preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $test_pass)) {
        echo "Your Password Must Contain At Least 1 Special Character !"."<br>";
        return 4;
      }
  }
}

function chck_tabval($value,$field, $conn)
{
  $conn = db_connect();
  $stmt =  $conn->prepare("SELECT $field FROM users WHERE $field='$value'");
  $stmt->execute();
  $stmt->setFetchMode(PDO::FETCH_ASSOC);
  $result = $stmt->fetchAll();

  if (count($result) > 0) {
    return 4;
  }
}


?>