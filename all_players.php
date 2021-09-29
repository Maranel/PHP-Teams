<?php
include('./app/functions/players.php');
echo '<div class="row justify-content-center">';
foreach (getAllplayers() as $players) {
                    echo '
                    <div class="col-12 col-md-4 card">
                      <div class="card-body">
                        <h5 class="mb-1">'. $players['userid'] .'</h5>
                        <p class="mb-1">'.$players['email'].'</p>
                        <small>'.$players['username'].'</small>
                      </div>
                    </div>
                    ';
                  }
echo '</div>';
?>