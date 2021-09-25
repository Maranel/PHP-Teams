<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <link rel="stylesheet" href="css/main.css">


</head>

<body>
<div class="overlay">
    </div>
    <main class="container pb-5">
        <div class="row text-center text-white">
            <div class="col">
                <h1>Gamers App</h1>
            </div>
        </div>
        <div class="row justify-content-center pt-5">
            <div class="col-12 col-md-4">

                <?php  
                    if(isset($_GET['page'])) {
                        switch($_GET['page']) {
                            case 'register':
                                include('register.php');
                                break;
                            default:
                                include('register.php');
                                break;
                        }
                    } else {
                        include('register.php');
                    }
                ?>
            </div>
        </div>
    </main>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
</body>

</html>

<?php
//  $connector = new connector('localhost','root','','mybase');
//  $result = $connector->selectFetchAll('users');
//  foreach($result as $itab_val){
//      echo $itab_val['username'."surename"];
//  }
?>