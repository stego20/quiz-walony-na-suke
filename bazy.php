<?php
$mysqli = mysqli_connect("127.0.0.1","root","","") or die("nie działa");
$query="CREATE DATABASE IF NOT EXISTS quiz DEFAULT CHARACTER SET utf8 COLLATE utf8_polish_ci;";
$run = $mysqli->query($query);

$query="USE quiz;";
$run = $mysqli->query($query);

$query="CREATE TABLE choices (
    id_quiz int(100) NOT NULL,
    questionNumber int(11) NOT NULL,
    isCorrect int(11) NOT NULL,
    choiceText varchar(100) NOT NULL
);";
$run = $mysqli->query($query);

$query="CREATE TABLE questions(
    id_quiz int(100) NOT NULL,
    QuestionNumber int(11)NOT NULL,
    QuestionText varchar(100)NOT NULL,
    idimg int(100)

);";
$run = $mysqli->query($query);

$query="CREATE TABLE konta(    
    `id` int(11) NOT NULL,
    `login` text NOT NULL,
    `haslo` text NOT NULL,
    `klasa` varchar(2) NOT NULL,
    `grupa` int(11) NOT NULL,
    `imie` text NOT NULL,
    `nazwisko` text NOT NULL,
    `admin` int(1) NOT NULL
);";
$run = $mysqli->query($query);

$query = "CREATE TABLE img(
    id int(100) NOT NULL,
    imgpath varchar(200) NOT NULL,
    PRIMARY KEY (id)
)"
$run = $mysqli->query($query);

$query = "CREATE TABLE quizy(
    id int(100) NOT NULL,
    `name` varchar(200) NOT NULL,
    id_n int(100) NOT NULL

)"
$run = $mysqli->query($query);

$query = "CREATE TABLE kolejka(
    id_sesji int(100) NOT NULL,
    `name` varchar(200) NOT NULL,
    id-quiz int(100) NOT NULL,
    data_start datetime NOT NULL,
    data_koniec datetime NOT NULL,
    klasa varchar(2) NOT NULL,
    grupa int(1) NOT NULL 
)"
$run = $mysqli->query($query);


?>