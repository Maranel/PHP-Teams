<form action="./app/register.php" method="post" class="card ">
    <div class="card-body">
        <h4>Welcome to the system that will change your LIFE!</h4>
        <p><small>Please register!</small></p>
        <div class="mb-3">
            <label for="username" class="form-label">Meno:</label>
            <input type="text" class="form-control" id="username" name="username" placeholder="Meno">
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Heslo:</label>
            <input type="text" class="form-control" id="surename" name="password" placeholder="Heslo">
        </div>
        <div class="mb-3">
            <label for="userid" class="form-label">Nick:</label>
            <input type="text" class="form-control" id="userid" name="userid" placeholder="Nick">
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email:</label>
            <input type="text" class="form-control" id="email" name="email" placeholder="Email">
        </div>
        <input type="submit" name="submit" class="btn btn-success" value="Odoslať">
        <a href="?page=login" class="btn btn-success">Prihlásiť</a>
    </div>
</form>

