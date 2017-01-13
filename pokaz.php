<?php

require_once 'dbConnect.php';

$granice = $_POST['granice'];
$granice = json_decode($granice);
//TODO: parametryzacja funkcji
$dane = getPlacemarksFromDB();

if($dane) {
    echo $dane;
}
else {
    echo 'false';
}

?>