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
        width: 50%;
        position: relative;
        z-index: 10;
        margin-top: 80px;
        padding: 40px;
        background-color: rgba(43, 43, 43, .8);
        color: rgb(134, 223, 0);
        border: none;
        border-radius: 1rem;
    }

    .open-btn {
        width: fit-content;
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
    <div class="row justify-content-center align-items-center g-2 mb-4">
        <h4>Hibajegy létrehozása</h4>
        <div class="col">
            <button class="btn btn-outline-danger close-btn" data-close-model>X</button>
        </div>
    </div>
    <div class="row justify-content-center align-items-center g-2">
        <div class="col">
            <form id="new-ticket-form-form" action="tickets" method="post">
                <div class="form-floating mb-3">
                    <input type="text" class="form-control bg-dark text-white" name="subject" id="subject" placeholder="Tárgy" required>
                    <label for="subject">Tárgy</label>
                </div>
                <div class="form-floating mb-3">
                    <textarea class="form-control bg-dark text-white" name="lpassword" id="lpassword" placeholder="Leírás" required></textarea>
                    <label for="lpassword">Leírás</label>
                </div>
                <button type="submit" class="btn btn-success">Belépés</button>
            </form>
        </div>
    </div>
</dialog>

<div class="row justify-content-center align-item-center g-2">
    <button data-open-model class="btn btn-outline-info open-btn">Új Hibajegy</button>
</div>

<div class="row justify-content-center g-2">
    <div class="col-sm-12 col-md-6 p-4">
        <div class="table-responsive">
            <table class="table table-dark table-striped">
                <tbody>
                    <thead>
                        <th></th>
                        <th>#</th>
                        <th>Tárgy</th>
                        <th>Létrehozva</th>
                        <th>Modosítva</th>
                        <th>Státusz</th>
                    </thead>
                </tbody>
            </table>
        </div>
    </div>
</div>