<form action="/PHP-Teams/app/resetpass.php" method="post" class="card">
    <div class="card-body">
        <h4 >Welcome to the system that will change your LIFE!</h4>
        <div class="mb-3">
            <label for="email" class="form-label">Email:</label>
            <input type="text" class="form-control" id="email" name="email" placeholder="Email">
        </div>
        <input type="submit" name="reset" class="btn btn-success" value="Poslať">
        <a href="?page=login" class="btn btn-unsuccess">Prihlásiť</a>
    </div>
    <div class="card-body">
        <h4>
            <?php
            if(isset($_SESSION['newpass'])){
              echo 'New pass :'.$_SESSION['newpass'];
              unset($_SESSION["newpass"]);
            }
              ?>
              </h4>
    </div>
</form>
