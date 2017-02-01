var map;
var lat;
var lng;
var markersArray = [];

var geocoder = new google.maps.Geocoder();
var infowindow = new google.maps.InfoWindow();

google.maps.event.addDomListener(window, 'load', initialize);

function initialize() {

    var myOptions = {
        draggableCursor: 'crosshair' ,
        zoom: 18,
        center: new google.maps.LatLng(54.546, 18.453),
        mapTypeId: google.maps.MapTypeId.ROADMAP,
    };
    map = new google.maps.Map(document.getElementById('mapa'), myOptions);

    google.maps.event.addListener(map, 'click', grab);
    google.maps.event.addListener(map, 'drag', retrieve);
    google.maps.event.addListener(map, 'zoom_changed', retrieve);
    // wyświetlany kml na powierzchni mapy
    //var kmllayer = new google.maps.KmlLayer('http://13.79.156.6/sample.kml');
    //kmllayer.setMap(map);
}
	 
function grab(event) {
    document.getElementById("szerokoscGeograficzna").value = event.latLng.lat();
    lat=event.latLng.lat();
    document.getElementById("dlugoscGeograficzna").value = event.latLng.lng();
    lng=event.latLng.lng();

;}

function retrieve() {
    var bounds = map.getBounds();
    var granice = {};

    granice.gora = bounds.getNorthEast().lat();
    granice.prawo = bounds.getNorthEast().lng();
    granice.dol = bounds.getSouthWest().lat();
    granice.lewo = bounds.getSouthWest().lng();
    
    while(markersArray.length) {
        var a =markersArray.pop(); 
        google.maps.event.clearInstanceListeners(a);
        a.setMap(null);
    }

    var zapytanie = new XMLHttpRequest();
    zapytanie.open("GET", 'pokaz.php?granice='+JSON.stringify(granice), true);
    zapytanie.onreadystatechange = function() {
            if (zapytanie.readyState == 4 && zapytanie.status == 200) {
                //TODO wyswietlanie wszystkich punktow na mapie
                var odpowiedz = JSON.parse(zapytanie.responseText);
                // console.log(zapytanie.responseText);
                for (var kosc in odpowiedz) {
                    var pozycja = new google.maps.LatLng(odpowiedz[kosc]['coord']['latitude'], odpowiedz[kosc]['coord']['longitude']);
                    var marker = new google.maps.Marker({
                        position: pozycja,
                        showing: false,
                        map: map,
                        title: kosc,
                        info: new google.maps.InfoWindow({
                            content: 'Nazwa: ' + kosc +
                            '<br/>Adres: '+ odpowiedz[kosc]['desc'] +
                            '<br/><button onclick="removeFromDatabase('+
                            odpowiedz[kosc]["id"]+')" >USUŃ</button>'
                        })
                    });
                    markersArray.push(marker);
                    google.maps.event.addListener(marker, 'click', function() {
                        if(!this.showing){
                            this.info.open(map, this);
                            this.showing = true;
                        }
                        else{
                            this.info.close();
                            this.showing = false;
                        }
                    });
                    //marker.setMap(map);
               }

            }
        };

    zapytanie.send();
}

function addToDatabase() {
    var xhr = new XMLHttpRequest();

    var nazwa = document.getElementById('nazwaKosciola').value;
    var adres = document.getElementById('adresKosciola').value;
    var dlugosc = lng;
    var szerokosc = lat;
    var wartosci = "nazwaKosciola=" + nazwa;
    wartosci += "&adresKosciola=" + adres;
    wartosci += "&dlugoscGeograficzna=" + dlugosc;
    wartosci += "&szerokoscGeograficzna=" + szerokosc;

    xhr.open("GET", 'dodaj.php?'+wartosci, true);
    xhr.onreadystatechange = function() {
            if (xhr.readyState == 4 && xhr.status == 200) {
                
                console.log(xhr.responseText);
            }
        };
    xhr.send();
}

function removeFromDatabase(id) {
    var xhr = new XMLHttpRequest();
    var wartosci = "id=" + id;
    xhr.open("GET", 'usun.php?'+wartosci, true);
    xhr.onreadystatechange = function() {
            if (xhr.readyState == 4 && xhr.status == 200) {
                
                console.log(xhr.responseText);
                if(xhr.responseText == 'Usunieto') {
                    retrieve();
                }
            }
        };
    xhr.send();
}

function upload() {
    if (document.getElementById('plikKML') != null) {
        var file = document.querySelector('#plikKML').files[0];
        var url = 'odbierz.php';
        var xhr = new XMLHttpRequest();
        var fd = new FormData();
        xhr.open("POST", url, true);
        xhr.onreadystatechange = function() {
            if (xhr.readyState == 4 && xhr.status == 200) {
                
                console.log(xhr.responseText); // handle response.
                retrieve();

                var oldInput = document.getElementById('plikKML'); 
                var newInput = document.createElement("input"); 

                newInput.type = "file"; 
                newInput.id = oldInput.id; 
                newInput.name = oldInput.name; 
                newInput.placeholder = oldInput.placeholder; 

                oldInput.parentNode.replaceChild(newInput, oldInput);
            }
        };
        fd.append("upload_file", file);
        xhr.send(fd);
    }
    
}