<?php

if (isset($_SESSION["user"])) {
    $user = $_SESSION["user"];
}
?>

<div class="row justify-content-center align-items-center g-2">
    <div class="col-sm-12 col-md-6">
        <ul>
            <li>összes hibajegy megjelenítése táblázatban</li>
            <li>sorrendezés állapot, és/vagy dátum szerint</li>
            <li>külön szin a lezárt és aktív hibajegyeknek.</li>
        </ul>
    </div>
</div>