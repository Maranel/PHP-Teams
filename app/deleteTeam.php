<?php
include('./functions/teams.php');
if(isset($_POST['delete'])){
    delete($_POST['teamToDelete']);
    header('Location: /PHP-Teams/?page=teams');


}

?>