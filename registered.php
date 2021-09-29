<div id="registered" class="container p-5">
    <h2>Player List</h2>
    <div class="row  pt-5">
    <?php
    include('./app/functions/connector.php');
    $email =  $_SESSION['email'];
    $conn = db_connect();
    $stmt = $conn->prepare("SELECT username,userid,email FROM users WHERE email = '$email' ");
    $stmt->execute();
    // $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);

    // render 
    foreach ($stmt->fetchAll() as $v) {
        echo '
        <div class="col-12  card">
        <div class="card-body">
            <h5 class="mb-1">Nick: '. $v['userid'] .'</h5>
            <p class="mb-1">Email: '.$v['email'].'</p>
            <small>User: '.$v['username'] . ' '  . '</small>
      </div>
    </div>
    <a href="?page=login" class="btn btn-success">Prihlásiť</a>
    ';
  }
    ?>
    </div>
  </div>