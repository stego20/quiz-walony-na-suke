<?php
include_once '..\db\conect.php';
session_start();
if (isset($_POST['rejestracja'])){
    header("Location: rejestracja.php");
}
else if(isset($_POST['submit'])){
    
    $login=$_POST['login'];
    $haslo=$_POST['haslo'];
    unset($_POST);
    if ($haslo!='' and $login!=''){
        $sql="SELECT * FROM konta WHERE `login`='$login' and `haslo`='$haslo'";
        $rezultat=$polaczenie->query($sql);
        $total=$rezultat->num_rows;
        if($total==1){
            $wiersz=$rezultat->fetch_assoc();
            $_SESSION['user']=$wiersz['imie']." ".$wiersz['nazwisko'];
            $_SESSION['uprawinienia']=$wiersz['admin'];
            header('Location: ../');
        }
        else{
            $_SESSION['blad']='Zły Login albo Hasło';
            header("location: logowanie.php"); 
        }
    }
    else{
    $_SESSION['blad']='Zły Login albo Hasło';
    header("location: logowanie.php"); 
    }
    
}
?>
