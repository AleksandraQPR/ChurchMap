<?

function pKML($file) {
// Parsowanie kliku kml
    $output = array();

    $xml=new DOMDocument();
    $xml->load($file);

    foreach($xml->getElementsByTagName('Placemark') as $placemark) {
        foreach ( $placemark->getElementsByTagName('name') as $name) {
            var_dump($name->nodeValue);
            $output[$name->nodeValue] = array();
        }
    
        foreach ( $placemark->getElementsByTagName('description') as $desc) {
            var_dump($desc->nodeValue);
            $output[$name->nodeValue]['desc'] = $desc->nodeValue ;
        }
        
        foreach ( $placemark->getElementsByTagName('Point') as $point) {
            var_dump($point->nodeValue);
            $latlng = array();
            foreach ($point->getElementsByTagName('coordinates') as $coordinates) {
                
                $coordinate = $coordinates->nodeValue;
                $coordinate = str_replace(" ", "", $coordinate);//trim white space
            
                $tmp = explode(",", $coordinate);
            
                $latlng['longitude'] = $tmp[0];
                $latlng['latitude'] = $tmp[1];
                $latlng['altitude'] = $tmp[2];
            }

        $output[$name->nodeValue]['coord'] = $latlng;
        }
    }

    return $output; 

}

?>