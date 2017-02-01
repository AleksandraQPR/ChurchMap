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
                <form onsubmit='addToDatabase()'>
                    <input type="text" name="dlugoscGeograficzna" id="dlugoscGeograficzna" placeholder="Podaj długość geograficzną" required />
                    <input type="text" name="szerokoscGeograficzna" id="szerokoscGeograficzna" placeholder="Podaj szerokość geograficzną" required />
                    <input type="text" name="nazwaKosciola" id="nazwaKosciola" placeholder="Podaj nazwę parafii" required />
                    <input type="text" name="adresKosciola" id="adresKosciola" placeholder="Podaj adres www parafii" required />
                    <button type="submit">ZATWIERDŹ DANE</button>
                </form>
            </div>
            <div class="kontenerDanych">
                <div>
                <label class="fileContainer" id="etykieta">
                    Plik KML
                    <input type="file" name="plikKML" id="plikKML" placeholder="Podaj ścieżkę pliku KML" />
                </label>
                </div>
                <button type="button" onclick="upload()">ZATWIERDŹ PLIK</button>
                </div>

                </br>
                <button type="button" onclick="location.href='tabela.php';">TABELA KOŚCIOŁÓW</button>
            
        </div>
    </body>
</html>
