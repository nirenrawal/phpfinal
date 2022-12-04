<?php
session_start();
try{
    $dbUserName = 'root';
    $dbPassword = 'root';
    $connection = 'mysql:host=localhost; dbname=majorproject; charset=utf8mb4';

    $options = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ
    ];
    $db = new PDO($connection, $dbUserName, $dbPassword, $options);
}catch(PDOException $ex){
    echo $ex;
}