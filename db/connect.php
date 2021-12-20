<?php

//Parametry do lacznosci z lokalna developerska baza danych xamp
$dbHostName= "localhost";
$dbHostUser="root";
$dbHostPasswd="";
$dbName="quiz";

// $dbHostName= "sql4.5v.pl";
// $dbHostUser="stego_quiztakov2";
// $dbHostPasswd="s0i20tl935";
// $dbName="stego_quiztakov2";

//tworzenie obiektu mysql
$mysqli = new mysqli($dbHostName, $dbHostUser, $dbHostPasswd,$dbName);

if($mysqli->connect_error){
    printf("connect failed: %s\n",$mysqli->connect_error);
    exit();
}


?>