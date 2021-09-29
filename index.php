<?php

    session_start();
    $user = null;
    if(isset($_SESSION['user']) && !empty($_SESSION['user'])){
        $user = $_SESSION['user'];
    }
?>


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
    <?php
    if(!empty($user)){
        include('./partials/nav.php');
    }    
    
    ?>
    <main class="container pb-5">
        <div class="row text-center text-white">
            <div class="col">
                <?php
                if(!empty($user)){
                    
                }
                ?>
                <h1>Gamers App</h1>
            </div>
        </div>
   

                <?php  
                    if(isset($_GET['page'])) {
                        if(empty($user)){
                            echo '<div class="row justify-content-center pt-5">
                                <div class="col-12 col-md-4">';

                            switch($_GET['page']) {
                                case 'register':
                                    include('register.php');
                                    break;
                                case 'login':
                                    include('login.php');
                                    break;
                                case 'registered':
                                    include('registered.php');
                                    break;
                                case 'forgotpass':
                                    include('resetpass.php');
                                    break;
                                default:
                                    include('register.php');
                                    break;
                            }
                            echo '</div> </div>';
                        }else{
                            echo '<div class="row justify-content-center pt-5">
                                <div class="col-12 ">';

                            switch($_GET['page']) {
                                case 'logout':
                                    include('./app/logout.php');
                                    break;
                                case 'players':
                                    include('all_players.php');
                                    break;
                                case 'teams':
                                    include('teams.php');
                                    break;
                                case 'createam':
                                    include('createam.php');
                                    break;
                                
                                default:
                                    include('all_players.php');
                                    break;
                            }
                            echo '</div> </div>';
                            
                        }
                    }
                    
                    elseif(!empty($user)){
                        echo '<div class="row justify-content-center pt-5">
                        <div class="col-12  ">';
                        include('all_players.php');
                        echo '</div> </div>';

                    } else {
                        echo '<div class="row justify-content-center pt-5">
                        <div class="col-12 col-md-4">';
                        include('register.php');
                        echo '</div> </div>';
                    }
                ?>
            </div>
        </div>
    </main>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
</body>

</html>
