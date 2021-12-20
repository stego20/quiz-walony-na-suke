<?php
include_once '../db/connect.php';
session_start();
if (!isset($_POST)){
    header("Location: modify_quiz.php");
}
else{
    print_r($_POST);
}


?>