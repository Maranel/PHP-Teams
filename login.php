<form action="/PHP-Teams/app/login.php" method="post" class="card">
    <div class="card-body">
        <h4 >Welcome to the system that will change your LIFE!</h4>
        <div class="mb-3">
            <label for="email" class="form-label">Email:</label>
            <input type="text" class="form-control" id="email" name="email" placeholder="Email">
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Heslo:</label>
            <input type="text" class="form-control" id="password" name="password" placeholder="Heslo">
        </div>
        <input type="submit" name="login" class="btn btn-success" value="Odoslať">
        <a href="?page=register" class="btn btn-success">Registrácia</a>
        <a href="?page=forgotpass" class="btn btn-unsuccess">Reset password</a>
    </div>
</form>
