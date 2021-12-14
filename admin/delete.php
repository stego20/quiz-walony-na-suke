<?php
include_once '..\db\conect.php';
include_once '..\includes\header.php';
session_start();
echo $_GET['n'];
$sql="DELETE FROM `konta` WHERE `id`='". $_GET['n']."'";
$rezultat=$polaczenie->query($sql);
header("Location: paneladmin.php");
?>
