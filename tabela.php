<!DOCTYPE html>
<html lang="pl">
    <head>
        <meta charset="utf-8" />
		<title>Mapa kościołów</title>
		<link href="style.css" rel="stylesheet" type="text/css" />
		<link href="https://fonts.googleapis.com/css?family=Libre+Franklin" rel="stylesheet">
        <script type="text/javascript"
        src="http://maps.googleapis.com/maps/api/js?sensor=false"></script>
        <script src="tabelaFunctions.js"></script>
    </head>
    <body id="tłoTabela">
        <table>
            <tr>
                <th class="header">NAZWA</th>
                <th class="header">ADRES</th>
                <th class="header">>AKCJA</th>
            </tr>
        <?php

        require_once 'dbConnect.php';

        $kosc = getAllPlacemarksFromDB();

        foreach ($kosc as $k => $v) {
            $a = $v['desc'];
            $i = $v['id'];

        $row = <<<HTML
            <tr id="$i">
                <td>$k</td>
                <td>$a</td>
                <td><button class="usun" onclick="removeFromDBAndClear('$i')" >USUŃ</button></td>
            </tr>
HTML;

            echo $row;
        }

        ?>
        </table>
        <button type="button" onclick="location.href='index.php';">POWRÓT</button>     
    </body>
</html>