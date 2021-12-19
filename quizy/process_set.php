<?php
include_once '..\db\connect.php';
session_start();
if (isset($_POST)){
    $name=$_POST['name'];
    $datar = date('Y-m-d H:i:s ', strtotime($_POST['datar']));
    $datak = date('Y-m-d H:i:s ', strtotime($_POST['datak']));
    $klasa=$_POST['klasa'];
    if (isset($_POST['1']) && isset($_POST['2'])){
        $grupa=3;
    }
    else if (isset($_POST['1'])){
        $grupa=1;
    }
    else if (isset($_POST['2'])){
        $grupa=2;
    }
    else{
        $_SESSION['blad_add']='Nie została zanaczona żadna grupa';
        header("Location: add_quiz.php");
    }
    if ($name!= '' && $klasa!= '' ){
            $search="SELECT id FROM quizy WHERE `name`='".$name."' AND `id_n`='".$_SESSION['user-id']."'";
            $id_quiz=$mysqli->query($search);
            $id_quiz=$id_quiz->fetch_assoc();
            $sql="SELECT id_sesji FROM kolejka order by id_sesji DESC limit 1;";
            $rezultat=$mysqli->query($sql);
            if ($rezultat->num_rows==0){
                $total=0;
            }
            $id=$rezultat->fetch_assoc();
            $total=(int)$id['id']+1;
            $insert="INSERT INTO kolejka VALUES('".$total."','".$name."','".$id_quiz['id']."','".$datar."','".$datak."','".$klasa."','".$grupa."')";
            if($rezultat=$mysqli->query($insert) or die ($mysqli_error.__LINE__)){

                header("Location: ../");
            };


        }

    }


    ?>