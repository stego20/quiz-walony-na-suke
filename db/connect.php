<?php

//Parametry do lacznosci z lokalna developerska baza danych xamp
$dbHostName= "localhost";
$dbHostUser="root";
$dbHostPasswd="";
$dbName="quiz";

//tworzenie obiektu mysql
$mysqli = new mysqli($dbHostName, $dbHostUser, $dbHostPasswd,$dbName);

if($mysqli->connect_error){
    printf("connect failed: %s\n",$mysqli->connect_error);
    exit();
}


?>