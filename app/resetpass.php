<?php
include('./functions/reset_pass.php');
include('./functions/connector.php');
if(isset($_POST['reset'])){
    $new_pass = gen_password();
    insert_pass($_POST['email'],$new_pass);
    header('Location: /PHP-Teams');
}
?>
