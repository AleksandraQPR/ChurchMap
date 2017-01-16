<?php

require_once 'dbConnect.php';

if(isset($_GET['granice'])) {
    $granice = $_GET['granice'];
    $granice = json_decode($granice, true);

    //TODO: parametryzacja funkcji
    $u = $granice['gora'];
    $d = $granice['dol'];
    $l = $granice['lewo'];
    $r = $granice['prawo'];

    $dane = getPlacemarksFromDB($u, $d, $l, $r);

    if($dane) {
        echo $dane;
    }
    else {
        echo 'false';
    }
}
?>