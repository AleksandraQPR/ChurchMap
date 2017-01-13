<?php


function validateKML($xml)
{

    $placemarkExist = false;

    foreach ($xml->getElementsByTagName('Placemark') as $placemark) {

        $placemarkExist = true;

        $nameExist = false;
        $nameIsEmpty = true;

        $descriptionExist = false;
        $descriptionIsEmpty = true;

        $pointExist = false;

        $coordinatesExist = false;
        $coordinatesLongitudeIsNumber = false;
        $coordinatesLatitudeIsNumber = false;
        $coordinatesAltitudeIsNumber = false;

        foreach ($placemark->getElementsByTagName('name') as $name) {
            $nameExist = true;

            if($name->nodeValue != ""){
                $nameIsEmpty = false;
            }
        }

        foreach ($placemark->getElementsByTagName('description') as $desc) {
            $descriptionExist = true;

            if($desc->nodeValue != ""){
                $descriptionIsEmpty = false;
            }
        }

        foreach ($placemark->getElementsByTagName('Point') as $point) {

            $pointExist = true;

            foreach ($point->getElementsByTagName('coordinates') as $coordinates) {

                $coordinatesExist = true;

                $coordinate = $coordinates->nodeValue;
                $coordinate = str_replace(" ", "", $coordinate);

                $tmp = explode(",", $coordinate);

                $coordinatesLongitudeIsNumber = is_numeric($tmp[0]);
                $coordinatesLatitudeIsNumber = is_numeric($tmp[1]);
                $coordinatesAltitudeIsNumber = is_numeric($tmp[2]);
            }

        }
        $PlacemarkError = false;
        $PlacemarkErrorDescription = "ERROR : ";


        if(!$nameExist){
            $PlacemarkError = true;
            $PlacemarkErrorDescription .= "Brak znacznika <name>, ";
        }
        if($nameIsEmpty){
            $PlacemarkError = true;
            $PlacemarkErrorDescription .= "Nazwa w znaczniku <name> nie moze byc pusta, ";
        }
        if(!$descriptionExist){
            $PlacemarkError = true;
            $PlacemarkErrorDescription .= "Brak znacznika <description>, ";
        }
        if($descriptionIsEmpty){
            $PlacemarkError = true;
            $PlacemarkErrorDescription .= "Opis w znaczniku <description> nie moze byc pusty, ";
        }
        if(!$pointExist){
            $PlacemarkError = true;
            $PlacemarkErrorDescription .= "Brak znacznika <Point>, ";
        }else{
            if(!$coordinatesExist){
                $PlacemarkError = true;
                $PlacemarkErrorDescription .= "Brak znacznika <coordinates>, ";
            }else{
                if(!$coordinatesLongitudeIsNumber){
                    $PlacemarkError = true;
                    $PlacemarkErrorDescription .= "Wartosc Longitude musi byc numeryczna, ";
                }
                if(!$coordinatesLatitudeIsNumber){
                    $PlacemarkError = true;
                    $PlacemarkErrorDescription .= "Wartosc Latitude musi byc numeryczna, ";
                }
                if(!$coordinatesAltitudeIsNumber){
                    $PlacemarkError = true;
                    $PlacemarkErrorDescription .= "Wartosc Altitude musi byc numeryczna, ";
                }
            }
        }

        if($PlacemarkError){
            throw new Exception($PlacemarkErrorDescription);
            return false;
        }
    }

    if(!$placemarkExist){
        throw new Exception("Brak znaczników <Placemark> w zaladowanym pliku!");
        return false;
    }

    return true;
}