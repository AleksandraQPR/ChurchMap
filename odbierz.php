<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);


if (isset($_FILES['upload_file'])) {
    if(move_uploaded_file($_FILES['upload_file']['tmp_name'], "tmp/" . $_FILES['upload_file']['name'])){
        echo $_FILES['upload_file']['name']. " OK";
    } else {
        echo $_FILES['upload_file']['name']. " KO";
    }
    exit;
} else {
    echo "No files uploaded ...";
}

?>