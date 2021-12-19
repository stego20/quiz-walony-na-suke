<?php
include_once '..\db\connect.php';
session_start();
if (isset($_POST)){
    $name=$_POST['name'];
    if ($name!= ''  ){
        $sql="SELECT id FROM quizy order by id DESC limit 1;";
            $rezultat=$mysqli->query($sql);
            $id=$rezultat->fetch_assoc();
            $total=(int)$id['id']+1;
            echo 'tu';
            $insert="INSERT INTO quizy VALUES('".$total."','".$name."','".$_SESSION['user-id']."')";
            if($rezultat=$mysqli->query($insert) or die ($mysqli_error.__LINE__)){
                $_SESSION['id']=$total;
                header("Location: ../pytania/dashboard.php");
            };


        }
        
    // echo $_POST['1']."< >".$_POST['2']."<br>";
    // echo $datar." ".$datak;
    }


    ?>