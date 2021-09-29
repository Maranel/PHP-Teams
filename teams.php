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
               <form action="./app/deleteTeam.php" method="post">
               <input type="submit" name="delete" class="btn btn-danger" value="Delete">   
                <?php
                include('./app/functions/getTeams.php');
                echo '<ul class="list-group text-center">';
                foreach (getTeams() as $team) {
                    echo '<li class="list-group-item ">'. $team['team_name'].'
                    <div class="form-check">
                    <input class="form-check-input" name="teamToDelete[]" type="checkbox" value="'.$team['id'].'"
                    id="flexCheckChecked" checked>
                    <label class="form-check-label" for="flexCheckChecked">
                    </label>
                    </div>
                    </li>';
                }
                echo '</ul>';
                ?>
                </form>
           </div>
</div>

        
</div>
</div>