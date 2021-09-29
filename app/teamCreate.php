<?php
include('./functions/teams.php');

if(isset($_POST['addTeam'])){
        create_team($_POST['team']);        
        header('Location: /PHP-Teams/?page=teams');         
}

?>