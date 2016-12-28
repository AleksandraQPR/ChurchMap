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
        <div id="mapa"></div>
        <div id="formularz">
            <div class="kontenerDanych">
                <input type="text" name="dlugoscGeograficzna" id="dlugoscGeograficzna" placeholder="Podaj długość geograficzną" />
                <input type="text" name="szerokoscGeograficzna" id="szerokoscGeograficzna" placeholder="Podaj szerokość geograficzną" />
                <button type="button" onclick="codeLatLng()" >ZATWIERDŹ WSPÓŁRZĘDNE</button>
            </div>
            <div class="kontenerDanych">
                <input type="file" name="plikKML" id="plikKML" placeholder="Podaj ścieżkę pliku KML" />
                <button type="button" onclick="" >ZATWIERDŹ ŚCIEŻKĘ PLIKU</button>
            </div>
        </div>
    </body>
</html>
