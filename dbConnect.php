<?php
const ip = 'localhost';
const user = 'root';
const password = '';
const db = 'koscioly';

function getPlacemarksFromDB($u, $d, $l, $r){

    $connection = getConnection();

    if($connection == null){
        return;
    }
    
    $sql = "SELECT * FROM churches WHERE longitude > ? AND longitude < ? AND latitude > ? AND latitude < ? ";
    $statement = $connection->prepare($sql);
    $statement->bind_param("dddd", $l, $r, $d, $u);


    $result = $connection->query($sql);

    if ($result->num_rows > 0) {

        $placemarks = array();

        while($row = $result->fetch_assoc()) {
/*
            echo "id: " . $row["id"].
                " - name: " . $row["name"].
                "    - description: " . $row["description"].
                "    - longitude: " . $row["longitude"].
                "    - latitude: " . $row["latitude"].
                "    - altitude: " . $row["altitude"].
                "<br>";
*/
            $name = $row["name"];

            $placemarks[$name] = array();

            $placemarks[$name]['desc'] = $row["description"];


            $placemarks[$name]['coord']['longitude'] = $row["longitude"];
            $placemarks[$name]['coord']['latitude'] = $row["latitude"];
            $placemarks[$name]['coord']['altitude'] = $row["altitude"];
        }
        return $placemarks;

    } else {
        return null;
    }
}

function addPlacemarkToDB($name, $description, $longitude, $latitude, $altitude){

    $connection = getConnection();

    if($connection == null){
        return;
    }

    insertToDB($connection, $name, $description, $longitude, $latitude, $altitude);

    $connection->close();
}

function addPlacemarksToDB($placemarks){

    $connection = getConnection();

    if($connection == null){
        return;
    }

    $names = array_keys($placemarks);

    for($i = 0; $i < count($names); $i++){

        $name = $names[$i];
        $description = $placemarks[$names[$i]]['desc'];
        $longitude = $placemarks[$names[$i]]['coord']['longitude'];
        $latitude = $placemarks[$names[$i]]['coord']['latitude'];
        $altitude = $placemarks[$names[$i]]['coord']['altitude'];

        insertToDB($connection, $name, $description, $longitude, $latitude, $altitude);
    }

    $connection->close();
}


function insertToDB($connection, $name, $description, $longitude, $latitude, $altitude){

    $sql = "INSERT INTO churches (`name`, description, longitude, latitude, altitude) VALUES (?, ?, ?, ?, ?)";

    $statement = $connection->prepare($sql);

/*
    echo "========================\n";
    echo $name."\n";
    echo $description."\n";
    echo $longitude."\n";
    echo $latitude."\n";
    echo $altitude."\n";
*/
    $statement->bind_param("ssddd", $name, $description, $longitude, $latitude, $altitude);
    //$statement->bind_param("ssddd", $name, $description, 100.100, 333.100, 222.100);

    $statement->execute();

    $statement->close();
}

function getConnection(){

    $connection = new mysqli(ip, user, password, db);

    if ($connection->connect_error) {
        die("Connection failed: " . $connection->connect_error);
        return null;
    }else{
        return $connection;
    }
}
