<?php

namespace App\Models;

class User extends BasicModel {


    public function renderUsers() {
        echo '<div class="row justify-content-center">';
        foreach($this->all() as $user) {
                    echo '
                    <div class="col-12 col-md-4 card">
                      <div class="card-body">
                        <h5 class="mb-1">'. $user->id .'</h5>
                        <p class="mb-1">'.$user->email.'</p>
                        <small>'.$user->username.'</small>
                      </div>
                    </div>
                    ';
                  }
                  echo '</div>';
    }
}