<?php

if (isset($_SESSION["user"])) {
    $user = $_SESSION["user"];
}
if(isset($_SESSION["tickets"])) {
    $tickets = $_SESSION["tickets"];
}
?>


<div class="row justify-content-center align-items-center g-2">
    <div class="col-sm-12 col-md-6">
        <h1>Üdv <?php echo $user["name"] ?></h1>
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
                        <td><button type="submit" class="btn btn-outline-info">Módosítás</button></td>
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