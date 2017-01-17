<?php

require_once 'dbConnect.php';

$dane = $_GET;

addPlacemarkToDB($dane['nazwaKosciola'],
                $dane['adresKosciola'],
                $dane['dlugoscGeograficzna'],
                $dane['szerokoscGeograficzna'],
                0.0);

?>