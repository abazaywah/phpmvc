<div class="text-center">
    <span><?php Flasher::flash(); ?></span>
    <div class="form-signin">
        <form action="<?= BASEURL; ?>/user/auth" method="POST">
            <h1 class="h3 mb-3 fw-normal">Login</h1>
            <div class="form-floating">
                <input type="username" class="form-control" id="floatingInput" name="username" placeholder="Username" autocomplete="off" required>
                <label for="floatingInput">Username</label>
            </div>
            <div class="form-floating">
                <input type="password" class="form-control" id="floatingPassword" name="password" placeholder="Password" autocomplete="off" required>
                <label for="floatingPassword">Password</label>
            </div>
            <button class="w-100 btn btn btn-primary" name="login" type="submit">Login</button>
            <p class="mt-3 mb-3 text-muted">&copy; 2021</p>
        </form>
    </div>
</div>