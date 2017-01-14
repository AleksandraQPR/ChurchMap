<?php

require_once 'dbConnect.php';

$granice = $_POST['granice'];
$granice = json_decode($granice);
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

?>