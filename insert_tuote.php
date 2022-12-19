<?php
require('dbconnection.php');
require('./inc/functions.php');

if(isset($_POST["tuotenro"]) && (isset($_POST["tuotenimi"])) &&(isset($_POST["hinta"])) && (isset($_POST["trnro"]))){


$tuotenro = filter_var($_POST["tuotenro"]);
$tuotenimi = filter_var($_POST["tuotenimi"]);
$hinta = filter_var($_POST["hinta"]);
$trnro = filter_var($_POST["trnro"]);

try{
    $db = createSqliteConnection('./lenkkarikauppa.db');
    $sql = "INSERT INTO tuote (tuotenro, tuotenimi, hinta, trnro) VALUES ('$tuotenro', $tuotenimi, $hinta, $trnro)";
    executeInsert($db, $sql);
}
    catch (PDOException $pdoex){
        returnError($pdoex);
    }
} else {
    http_response_code(400);
    echo "eipä toimi ei...";
}





