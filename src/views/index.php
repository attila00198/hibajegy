<?php if (isset($_SESSION["msg"])) : ?>
    <div class="row justify-content-center align-items-center g-2">
        <div class="alert alert-<?= $_SESSION["msg"]["category"] ?> col-sm-12 col-md-4 pb-4">
            <span><?= $_SESSION["msg"]["message"] ?></span>
        </div>
    </div>
<?php endif; ?>

<?php unset($_SESSION["msg"]) ?>

<div class="row justify-content-center align-items-center g-2">
    <div class="d-flex justify-content-around col-sm-12 col-md-4 pb-4">
        <button id="show-lform" class="btn btn-primary form-switcher disabled" onclick="showLogin()">Belépés</button>
        <button id="show-rform" class="btn btn-danger form-switcher" onclick="showRegister()">Regisztráció</button>
    </div>
</div>

<div class="row justify-content-center align-items-center g-2">
    <div id="login-form-container" class="col-sm-12 col-md-4">
        <form id="login-form" action="login" method="post">
            <div class="form-floating mb-3">
                <input type="text" class="form-control bg-dark text-white" name="lusername" id="lusername" placeholder="Felhasználó név" required>
                <label for="lusername">Felhasználó név</label>
            </div>
            <div class="form-floating mb-3">
                <input type="password" class="form-control bg-dark text-white" name="lpassword" id="lpassword" placeholder="Jelszó" required>
                <label for="lpassword">Jelszó</label>
            </div>
            <button type="submit" class="btn btn-success">Belépés</button>
        </form>
    </div>

    <div id="register-form-container" class="col-sm-12 col-md-4 d-none">
        <form id="register-form" action="register" method="post">
            <div class="form-floating mb-3">
                <input type="text" class="form-control bg-dark text-white" name="rusername" id="rusername" placeholder="Felhasználó név" required>
                <label for="rusername">Felhasználónév</label>
            </div>
            <div class="form-floating mb-3">
                <input type="text" class="form-control bg-dark text-white" name="rfullname" id="rfullname" placeholder="Felhasználó név" required>
                <label for="rfullname">Teljes név</label>
            </div>
            <div class="form-floating mb-3">
                <input type="email" class="form-control bg-dark text-white" name="remail" id="remail" placeholder="Felhasználó név" required>
                <label for="remail">Email</label>
            </div>
            <div class="form-floating mb-3">
                <input type="password" class="form-control bg-dark text-white" name="rpassword" id="rpassword" placeholder="Jelszó" required>
                <label for="rpassword">Jelszó</label>
            </div>
            <div class="form-floating mb-3">
                <input type="password" class="form-control bg-dark text-white" name="rpassword-repeat" id="rpassword-repeat" placeholder="Jelszó" required>
                <label for="rpassword-repeat">Megerősítés</label>
            </div>
            <button type="submit" class="btn btn-success">Belépés</button>
        </form>
    </div>
</div>