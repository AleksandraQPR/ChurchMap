<!DOCTYPE html>
<html lang="pl">
    <head>
        <meta charset="utf-8" />
		<title>Mapa kościołów</title>
		<link href="style.css" rel="stylesheet" type="text/css" />
		<link href="https://fonts.googleapis.com/css?family=Libre+Franklin" rel="stylesheet">
        <script type="text/javascript"
        src="http://maps.googleapis.com/maps/api/js?sensor=false"></script>
    </head>
    <body>
        <header>
            <div id="naglowekMapy"></div>
        </header>
        <div id="mapa"></div>
        <div id="formularz">
            <input type="text" name="dlugoscGeograficzna"  placeholder="długość geograficzna" />
            <input type="text" name="szerokoscGeograficzna"  placeholder="szerokość geograficzna" />
            <button type="button" onclick="" >ZATWIERDŹ WSPÓŁRZĘDNE</button>
            <input type="text" name="plikKML"  placeholder="ścieżka pliku KML" />
            <button type="button" onclick="" >ZATWIERDŹ ŚCIEŻKĘ PLIKU</button>
            <button type="button" onclick="" >PRZEŚLIJ</button>
        </div>
    </body>
</html>
