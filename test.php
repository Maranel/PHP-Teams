
<?php
include('vendor/autoload.php');

use App\Models\User;
use App\Models\Team;

$user = new User;
$team = new Team;

var_dump($user->find(48), $team->find(7));