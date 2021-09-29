
<?php
include('vendor/autoload.php');

use App\Models\User;
use App\Models\Team;

$user = new User;
$team = new Team;
$userObj = $user->find(48);

$userObj->username = 'Hahaha';
$userObj->email = 'janko.hrasko@gmail.com';