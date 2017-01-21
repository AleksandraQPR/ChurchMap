<!DOCTYPE html>
<html lang="pl">
    <head>
        <meta charset="utf-8" />
		<title>Mapa kościołów</title>
		<link href="style.css" rel="stylesheet" type="text/css" />
		<link href="https://fonts.googleapis.com/css?family=Libre+Franklin" rel="stylesheet">
        <script type="text/javascript"
        src="http://maps.googleapis.com/maps/api/js?sensor=false"></script>
        <script src="mapaFunctions.js"></script>
    </head>
    <body>
        <table class="kontenerDAnych">
            <tr>
                <th>Nazwa</th>
                <th>Adres</th>
                <th>Akcja</th>
            </tr>
        <?php

        require_once 'dbConnect.php';

        $kosc = getAllPlacemarksFromDB();

        foreach ($kosc as $k => $v) {
            $a = $v['desc'];
            $i = $v['id'];

        $row = <<<HTML
            <tr id="$i">
                <th>$k</th>
                <th>$a</th>
                <th><button onclick="removeFromDBAndClear('$i')" >USUŃ</button></th>
            </tr>
HTML;

            echo $row;
        }

        ?>
    </table>
    </body>
</html>