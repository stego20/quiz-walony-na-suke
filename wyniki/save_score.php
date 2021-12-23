<?php
include_once '../db/connect.php';
include_once '../includes/header.php';
session_start();
$query = "SELECT * FROM questions WHERE id_quiz='".$_SESSION['id_quiz_gra']."'";

$result= $mysqli->query($query) or die($mysqli_error.__LINE__);
$total=$result->num_rows;
$ile=$_GET['sciagal'];

$insert="INSERT INTO wyniki VALUES('".$_SESSION['id_sesji']."','".$_SESSION['user']."','".$_SESSION['user-id']."','".$_SESSION['score']."','".serialize($_SESSION['zle'])."','".$total."','".$ile."')";
$result2= $mysqli->query($insert) or die($mysqli_error.__LINE__);
$total=$result->num_rows;
// header("Location: ../final.php");
?>