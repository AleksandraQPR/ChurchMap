<?

function pKML($file) {
    // Parsowanie kliku kml
    // Zwraca tablice asocjacyjna 
    $output = array();
    // Otwieranie pliku KML
    $xml=new DOMDocument();
    $xml->load($file);

    foreach($xml->getElementsByTagName('Placemark') as $placemark) {
        foreach ( $placemark->getElementsByTagName('name') as $name) {
            
            $output[$name->nodeValue] = array();
        }
    
        foreach ( $placemark->getElementsByTagName('description') as $desc) {
            
            $output[$name->nodeValue]['desc'] = $desc->nodeValue ;
        }
        
        foreach ( $placemark->getElementsByTagName('Point') as $point) {
            
            $latlng = array();
            foreach ($point->getElementsByTagName('coordinates') as $coordinates) {
                
                $coordinate = $coordinates->nodeValue;
                $coordinate = str_replace(" ", "", $coordinate);
            
                $tmp = explode(",", $coordinate);
            
                $latlng['longitude'] = $tmp[0];
                $latlng['latitude'] = $tmp[1];
                $latlng['altitude'] = $tmp[2];
            }

        $output[$name->nodeValue]['coord'] = $latlng;
        }
    }

// output ma nastepujaca postac:
// $output = array('Twoj kociol' => array('desc' => 'www.kosciol.pl', 'coord'=> array('longitude'=>'dlugosc', 'latitude'=>'szerokosc', 'altitude'=>'wysokosc') ));
    
    return $output; 
}

?>