<?php
include_once '../db/connect.php';
session_start();
if(isset($_POST['submit'])){
    $login=$_POST['login'];
    $haslo=base64_encode($_POST['haslo']);
    $klasa=$_POST['klasa'];
    $grupa=$_POST['grupa'];
    $imie=$_POST['imie'];
    $nazwisko=$_POST['nazwisko'];
    if ($login!= '' && $haslo!= '' && $klasa!= '' && $grupa!= '' && $imie!= '' && $nazwisko!=''){
        
        $sql2="SELECT * FROM konta WHERE `login`='".$login."'";
        $rezultat2=$mysqli->query($sql2);
        if ($rezultat2){
            $ile=$rezultat2->num_rows;
            echo $ile;
        if ($ile==0){
            $sql="SELECT id FROM konta order by id DESC limit 1;";
            $rezultat=$mysqli->query($sql);
            $id=$rezultat->fetch_assoc();
            $total=(int)$id['id']+1;
            echo 'tu';
            $insert="INSERT INTO konta VALUES('".$total."','".$login."','".$haslo."','".$klasa."','".$grupa."','".$imie."','".$nazwisko."',0)";
            if($rezultat=$mysqli->query($insert) or die ($mysqli_error.__LINE__)){
                header("Location: logowanie.php");
            };

            
        }else{
            $_SESSION['bladreg']='Taki Login jest już uzywany';
            header("Location: rejestracja.php");
        }
        }
        
    }else{
        $_SESSION['bladreg']='Źle podane dane';
        header("Location: rejestracja.php");
    }
};
?>