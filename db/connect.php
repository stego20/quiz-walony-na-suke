<?php

//Parametry do lacznosci z lokalna developerska baza danych xamp
$dbHostName= "sql4.5v.pl";
$dbHostUser="stego_stego20";
$dbHostPasswd="su7x57oikb";
$dbName="stego_stego20";

//tworzenie obiektu mysql
$mysqli = new mysqli($dbHostName, $dbHostUser, $dbHostPasswd,$dbName);

if($mysqli->connect_error){
    printf("connect failed: %s\n",$mysqli->connect_error);
    exit();
}


?>