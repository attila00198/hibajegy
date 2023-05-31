<?php

if (isset($_SESSION["user"])) {
    $user = $_SESSION["user"];
}
if (isset($_SESSION["tickets"])) {
    $tickets = $_SESSION["tickets"];
}
?>

<style>
    dialog {
        position: relative;
        z-index: 10;
        margin-top: 80px;
        padding: 40px;
        background-color: rgba(43, 43, 43, .8);
        color: rgb(134, 223, 0);
        border: none;
        border-radius: 1rem;
    }

    dialog::backdrop {
        background-color: rgba(80, 80, 80, .5);
    }

    dialog .close-btn {
        position: absolute;
        top: 20px;
        right: 20px;
        border-radius: 50%;
        width: 40px;
    }
</style>

<?php if (isset($_SESSION["msg"])) : ?>
    <div class="row justify-content-center align-items-center g-2">
        <div class="alert alert-<?= $_SESSION["msg"]["category"] ?> col-sm-12 col-md-4 pb-4">
            <span><?= $_SESSION["msg"]["message"] ?></span>
        </div>
    </div>
<?php endif; ?>

<dialog data-model>
    <div class="row justify-content-center align-items-center g-2">
        <h4>Jelszóváltás</h4>
        <div class="col">
            <button class="btn btn-outline-danger close-btn" data-close-model>X</button>
        </div>
    </div>
    <div class="row justify-content-center align-items-center g-2">
        <div class="col">
            <form class="form mt-4" id="passwd-change-form" action="profile" method="post">
                <div class="form-floating mb-3">
                    <input type="text" class="form-control bg-dark text-white" name="currentPasswd" id="currentPasswd" placeholder="Jelenlegi Jelszó" required>
                    <label for="currentPasswd">Jelenlegi Jelszó</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control bg-dark text-white" name="newPasswd" id="newPasswd" placeholder="Új jelszó" required>
                    <label for="newPasswd">Új jelszó</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control bg-dark text-white" name="repeatPasswd" id="repeatPasswd" placeholder="Megerősítés" required>
                    <label for="repeatPasswd">Megerősítés</label>
                </div>
                <button type="submit" class="btn btn-success">Mentés</button>
            </form>
        </div>
    </div>
</dialog>

<div class="row justify-content-center align-items-center g-2">
    <div class="col-sm-12 col-md-6">
        <h1>Üdv <?php echo $user["fullname"] ?></h1>
        <div class="table-responsive">
            <table class="table table-dark table-striped">

                <tbody>
                    <tr>
                        <th>Felhasználónév</th>
                        <td><?php echo $user["name"] ?></td>
                    </tr>
                    <tr>
                        <th>Teljes Név</th>
                        <td><?php echo $user["fullname"] ?></td>
                    </tr>
                    <tr>
                        <th>Jelszó</th>
                        <td><button type="submit" class="btn btn-outline-info" data-open-model>Módosítás</button></td>
                    </tr>
                    <tr>
                        <th>Email Cím</th>
                        <td><?php echo $user["email"] ?></td>
                    </tr>
                    <tr>
                        <th>Active Hibajegyek Száma</th>
                        <td>N/A</td>
                    </tr>
                    <tr>
                        <th>Lezárt Hibajegyek Száma</th>
                        <td>N/A</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
    var modal = document.querySelector("[data-model]")
    var openModalBtn = document.querySelector("[data-open-model]")
    var claseModalBtn = document.querySelector("[data-close-model]")

    openModalBtn.addEventListener('click', () => {
        modal.showModal()
    })

    claseModalBtn.addEventListener('click', () => {
        modal.close()
    })
</script>