<?php
require('dbconnection.php');
require('./inc/functions.php');

if(isset($_POST["trnimi"]) &&(isset($_POST["trnro"]))){


$trnimi = filter_var($_POST["trnimi"]);
$trnro = filter_var($_POST["trnro"]);

try{
    $db = createSqliteConnection('./lenkkarikauppa.db');
    $sql = "INSERT INTO tuoteryhma (trnimi, trnro) VALUES ('$trnimi', $trnro)";
    executeInsert($db, $sql);
}
    catch (PDOException $pdoex){
        returnError($pdoex);
    }
} else {
    http_response_code(400);
    echo "eipä toimi ei...";
}


