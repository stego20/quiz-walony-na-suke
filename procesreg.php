<?php
include_once '..\db\conect.php';
session_start();
if(isset($_POST['submit'])){
    $login=$_POST['login'];
    $haslo=$_POST['haslo'];
    $klasa=$_POST['klasa'];
    $grupa=$_POST['grupa'];
    $imie=$_POST['imie'];
    $nazwisko=$_POST['nazwisko'];
    if ($login!= '' && $haslo!= '' && $klasa!= '' && $grupa!= '' && $imie!= '' && $nazwisko!=''){
        
        $sql2="SELECT * FROM konta WHERE `login`='".$login."'";
        $rezultat2=$polaczenie->query($sql2);
        if ($rezultat2){
            $ile=$rezultat2->num_rows;
            echo $ile;
        if ($ile==0){
            $sql="SELECT * FROM konta";
            $rezultat=$polaczenie->query($sql);
            $total=$rezultat->num_rows;
            echo 'tu';
            $insert="INSERT INTO konta VALUES(null,'".$login."','".$haslo."','".$klasa."','".$grupa."','".$imie."','".$nazwisko."',0)";
            if($rezultat=$polaczenie->query($insert) or die ($mysqli_error.__LINE__)){
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