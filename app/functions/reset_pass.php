<?php


function gen_password(){

        $data = '1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZabcefghijklmnopqrstuvwxyz';
        return substr(str_shuffle($data), 0, 8);
}

function insert_pass($email,$new_pass){

    $conn = db_connect();
    $stmt =  $conn->prepare("SELECT * FROM users WHERE email='$email'");
    $stmt->execute();
    $hash_pass=password_hash($new_pass, PASSWORD_BCRYPT);
    $sql = "UPDATE users SET password='$hash_pass' WHERE email='$email'";
    $conn->exec($sql);

    }



?>