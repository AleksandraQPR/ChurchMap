var map;
var lat;
var lng;
// wyświetlany kml na powierzchni mapy
var kmllayer = new google.maps.KmlLayer('mu.kml');

var geocoder = new google.maps.Geocoder();
var infowindow = new google.maps.InfoWindow();

function initialize() {

    var myOptions = {
        draggableCursor: 'crosshair' ,
        zoom: 18,
        center: new google.maps.LatLng(54.371, 18.612),
        mapTypeId: google.maps.MapTypeId.ROADMAP,
    };
    map = new google.maps.Map(document.getElementById('map_canvas'), myOptions);

    google.maps.event.addListener(map, 'click', grab);

    kmllayer.setMap(map);

}
	 
function grab(event) {
    document.getElementById("lonbox").value = event.latLng.lat();
    costam1=event.latLng.lat();
    document.getElementById("latbox").value = event.latLng.lng();
    costam2=event.latLng.lng();
}
		 
function codeLatLng(event) {
//		 document.getElementById("lonbox").value = 
//		 document.getElementById("latbox").value = event.latLng.lng();
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