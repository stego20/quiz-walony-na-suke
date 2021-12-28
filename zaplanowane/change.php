<?php
include_once '../db/connect.php';
include_once '../includes/header.php';
session_start();

$i=$_POST['edit'];

$name=$_POST['name'.$i];
$data_start=$_POST['data-s'.$i];
$data_koniec=$_POST['data-k'.$i];
$grupa=$_POST['grupa'.$i];
$klasa=$_POST['klasa'.$i];
$data_s = date('Y-m-d H:i:s ', strtotime($data_start));
$data_koniec = date('Y-m-d H:i:s ', strtotime($data_koniec));
$id_sesji=$_POST['id-s'];
unset($_POST);
$sql="SELECT * FROM kolejka WHERE `id_sesji`='".$id_sesji."'";
$rezultat=$mysqli->query($sql); 
$wiersz=$rezultat->fetch_assoc();
$id_quiz=$wiersz['id_quiz'];
echo gettype($data_start);
echo $name." ".$data_start." ".$data_koniec." ".$grupa." ".$klasa." ".$id_sesji."<br>";
if ($rezultat->num_rows==1){
    $delete="DELETE FROM kolejka WHERE `id_sesji`='".$id_sesji."'";
    $rezultat=$mysqli->query($delete) or die($mysqli_error.__LINE__);
    $update="INSERT INTO kolejka VALUES('".$id_sesji."','".$name."','".$id_quiz."','".$data_s."','".$data_koniec."','".$klasa."','".$grupa."')";
    $rezultat2=$mysqli->query($update) or die ("nie");
    
    if($rezultat2){
        header("Location: dashboard-zaplanowane.php");
    }
    
}
else{
    header("Location: dashboard-zaplanowane.php");
}




?>