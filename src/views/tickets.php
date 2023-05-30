<?php

if (isset($_SESSION["user"])) {
    $user = $_SESSION["user"];
}
if (isset($_SESSION["tickets"])) {
    $tickets = $_SESSION["tickets"];
}
?>


<div class="row justify-content-center align-items-center g-2">
    <div class="col-sm-12 col-md-6">
        <h1>Üdv <?php echo $user["name"] ?></h1>
        <div class="table-responsive">
            <table class="table table-dark table-striped">

                <tbody>
                    <thead>
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