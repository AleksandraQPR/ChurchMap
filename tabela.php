<!DOCTYPE html>
<table>
<?php

require_once 'dbConnect.php';

$kosc = getAllPlacemarksFromDB();

foreach ($kosc as $k => $v) {
    $a= $v['desc'];

$row = <<<HTML
    <tr>
        <th>$k</th>
        <th>$a</th>
        <th><!-- miejsce na guzik usuwania --></th>
    </tr>
HTML;

    echo $row;
}

?>
</table>