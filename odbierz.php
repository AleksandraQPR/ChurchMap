<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

require_once 'parseKML.php';
require_once 'dbConnect.php';

if (isset($_FILES['upload_file'])) {

    try {
        $tablic = pKML($_FILES['upload_file']['tmp_name']);
        addPlacemarksToDB($tablic);
        echo $_FILES['upload_file']['name']. " OK";
    }
    catch (Exception $e) {
        echo $e->getmessage(). " KO";
    }
        
    exit;
} else {
    echo "No files uploaded ...";
}

?>