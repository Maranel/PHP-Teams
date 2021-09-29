<div class="row justify-content-center">
    <div class="col-6">

<div class="card">
           <div class="card-header">
               <div class="row">
                   <div class="col">
                   <h3>Teams</h3>
                   </div>
                   <div class="col text-end">
                    <a href="?page=createam"  class="ml-auto btn btn-primary">Add</a>
                </div>
               </div>
                    
           </div>         
           <div class="card-body">
                <?php
                include('./app/functions/getTeams.php');
                echo '<ul class="list-group text-center">';
                foreach (getTeams() as $team) {
                    echo '<li class="list-group-item ">'. $team['team_name'].'</li>';
                }
                echo '</ul>';
                ?>
           </div>
</div>

        
</div>
</div>