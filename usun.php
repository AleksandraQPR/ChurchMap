<?php

require_once 'dbConnect.php';

if(isset($_GET['id'])){
    $id = $_GET['id'];

    removePlacemarkFromDB($id);
    echo "Usunieto";
}

?>