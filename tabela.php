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
        <?php

        require_once 'dbConnect.php';

        $kosc = getAllPlacemarksFromDB();

        foreach ($kosc as $k => $v) {
            $a= $v['desc'];

        $row = <<<HTML
            <tr>
                <th>$k</th>
                <th>$a</th>
                <th><!-- miejsce na guzik usuwania --></th>
            </tr>
HTML;

            echo $row;
        }

        ?>
    </table>
    </body>
</html>