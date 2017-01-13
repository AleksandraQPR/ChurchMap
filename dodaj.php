<?php

require_once 'dbConnect.php';

$dane = $_POST;

addPlacemarkToDB($dane['nazwaKosciola'],
                $dane['adresKosciola'],
                $dane['dlugoscGeograficzna'],
                $dane['szerokoscGeograficzna']);

?>