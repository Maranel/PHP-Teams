<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="css/main.css">
</head>

<body>
  <div id="registered" class="container p-5">
    <h2>Player List</h2>
    <div class="row  pt-5">

        <?php
        if (isset($_POST["submit"])) {
          $min = 1;
          $username = $_POST["username"];
          $surename = $_POST["surename"];
          $userid = $_POST["userid"];
          $email = $_POST["email"];

          $conn = db_connect();
          $valchck = chckinpt($email, $username, $userid, $surename, $conn);
          if ($valchck != 4) {
            insertuser($username, $surename, $userid, $email, $conn);
          }
        }
        ?>
    </div>
  </div>
</body>

</html>


<?php
function insertuser($username, $surename, $userid, $email, $conn)
{

  $sql = "INSERT INTO users (username,surename,userid,email) VALUES('$username','$surename','$userid','$email')";
  $conn->exec($sql);
  $stmt = $conn->prepare("SELECT username,surename,userid,email FROM users");
  $stmt->execute();
  $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);

  // render 
  foreach ($stmt->fetchAll() as $v) {
    echo '
    <div class="col-12 col-md-3 card">
      <div class="card-body">
        <h5 class="mb-1">'. $v['userid'] .'</h5>
        <p class="mb-1">'.$v['email'].'</p>
        <small>'.$v['username'] . ' ' . $v['surename'] . '</small>
      </div>
    </div>
    ';
  }
}

function chck_tabval($test_id, $conn)
{
  $conn = db_connect();
  $stmt =  $conn->prepare("SELECT userid FROM users WHERE userid='$test_id'");
  $stmt->execute();
  $stmt->setFetchMode(PDO::FETCH_ASSOC);
  $result = $stmt->fetchAll();

  if (count($result) > 0) {
    return 4;
  }
}


function chckinpt($test_email, $test_user, $test_id, $test_srname, $conn)
{

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
    }
    if (empty($_POST["surename"])) {
      echo "Surename is required";
      return 4;
    }
    if (empty($_POST["userid"])) {
      echo "Nick is required";
      return 4;
    } elseif (chck_tabval($test_id, $conn) == 4) {
      echo "Nick name exist.";
      return 4;
    }
  }
}


function db_connect()
{
  $servername = "localhost";
  $tabusername = "root";
  $tabpassword = "";
  $dbname = "mybase";
  try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $tabusername, $tabpassword);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $conn;
    echo "Connected successfully";
  } catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
  }
}
