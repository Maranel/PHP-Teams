<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#" > 
    <?php
     echo $user['userid'];                
    ?>
    </a>
   
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link <?= (isset($_GET['page']) && $_GET['page'] == 'teams') ? 'active' : null ?>" href="?page=teams">Teams</a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?= (isset($_GET['page']) && $_GET['page'] == 'players') ? 'active' : null ?>" href="?page=players">Players</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="?page=logout">Logout</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
