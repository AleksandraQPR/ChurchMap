var map;
var lat;
var lng;

var geocoder = new google.maps.Geocoder();
var infowindow = new google.maps.InfoWindow();

function initialize() {

    var myOptions = {
        draggableCursor: 'crosshair' ,
        zoom: 18,
        center: new google.maps.LatLng(54.546, 18.453),
        mapTypeId: google.maps.MapTypeId.ROADMAP,
    };
    map = new google.maps.Map(document.getElementById('mapa'), myOptions);

    google.maps.event.addListener(map, 'click', grab);
    
    // wyświetlany kml na powierzchni mapy
    var kmllayer = new google.maps.KmlLayer('http://13.79.156.6/sample.kml');
    kmllayer.setMap(map);
}
	 
function grab(event) {
    document.getElementById("szerokoscGeograficzna").value = event.latLng.lat();
    lat=event.latLng.lat();
    document.getElementById("dlugoscGeograficzna").value = event.latLng.lng();
    lng=event.latLng.lng();
}
		 
function codeLatLng(event) {

    var latlng = new google.maps.LatLng(lat, lng);

    geocoder.geocode({'latLng': latlng}, function(results, status) {
        var marker = new google.maps.Marker({
            position: latlng,
            map: map
        });
        infowindow.setContent(results[1].formatted_address);
        infowindow.open(map, marker);
    });
}


google.maps.event.addDomListener(window, 'load', initialize);