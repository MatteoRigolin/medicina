<div class="row">
    <div class="login-form col-lg-3">
        <h1 class="login-text login-title mt-3">Log In</h1>
        <form class="my-4 mx-3" action="api/loginAPI.php" method="POST">
            <div class="mb-3 col-11 ms-3">
                <label for="inputEmail" class="form-label login-text">E-Mail</label>
                <div class="input-group">
                    <input type="email" class="form-control test-input" id="inputEmail" name="mail"
                        aria-describedby="basic-addon">
                    <span class="input-group-text bg-transparent" id="basic-addon">
                        <img src="assets/svg/mail.svg" width="20" height="20">
                    </span>
                </div>
            </div>
            <div class="mb-3 col-11 ms-3">
                <label for="inputPassword" class="form-label login-text">Password</label>
                <div class="input-group">
                    <input type="password" class="form-control test-input" id="inputPassword" name="password"
                        aria-describedby="basic-addon2">
                    <span class="input-group-text bg-transparent" id="basic-addon2">
                        <img src="assets/svg/lock.svg" width="20" height="20">
                    </span>
                </div>
            </div>
            <button class="btn btn-login col-11 ms-3 h-50 mb-2 mt-2" type="submit">SIGN IN</button>
        </form>
    </div>
</div>