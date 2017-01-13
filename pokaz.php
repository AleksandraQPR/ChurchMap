<?php

require_once 'dbConnect.php';

$dane = getPlacemarksFromDB();

if($dane) {
    echo $dane;
}
else {
    echo 'false';
}

?>