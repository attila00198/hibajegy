<?php

if (isset($_SESSION["user"])) {
    $user = $_SESSION["user"];
}
?>

<div class="row justify-content-center align-items-center g-2">
    <div class="col-sm-12 col-md-6">
        <h1>Üdv <?php echo $user["name"] ?></h1>
        
        <ul>
            <li>hibajegyek összesen</li>
            <li>aktív hibajegyek száma</li>
            <li>lezárt hibajegyek száma</li>
            <li>értesítés a lezárt, vagy módosított hibajegyekről.</li>
        </ul>
    </div>
</div>