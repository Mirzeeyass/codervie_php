<?php
    $server = "us-cdbr-east-06.cleardb.net";
    $username = "bd2c093a1ecfa1";
    $password = "efcefc15";
    $database = "heroku_c6737200629f8b6";

    $connect = mysqli_connect($server, $username, $password, $database);

    if(!$connect){
        die("Error". mysqli_connect_error());
    }
?>
