<?php
require('./dbconnection.php');


function registerUser($uname, $pw){
    $db = createSqliteConnection('./lenkkarikauppa.db');

    $pw = password_hash($pw, PASSWORD_DEFAULT);

    $sql = "INSERT INTO user (username, passwd) VALUES (?,?)";
    $statement = $db->prepare($sql);
    $statement->execute(array($uname, $pw));
}

function checkUser($uname, $pw){
    $db = createSqliteConnection('./lenkkarikauppa.db');

    $sql = "SELECT passwd FROM user WHERE username=?";
    $statement = $db->prepare($sql);
    $statement->execute(array($uname));

    $hashedpw = $statement->fetchColumn();

    if(isset($hashedpw)){
        return password_verify($pw, $hashedpw) ? $uname : null;
    }

    return null;
}

