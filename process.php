<?php

use function PHPSTORM_META\type;

include_once 'includes\header.php'; ?>
<?php include_once 'db\connect.php'; ?>


<?php session_start(); ?>

<?php
if (!isset($_SESSION['score'])) {
    $_SESSION['$score'] = 0;

}

if ($_POST) {
    $number = $_POST['number'];
    
    $selectChoice = $_POST['choice'];
    
    $next = $number + 1;

}
$query = "SELECT * FROM questions WHERE id_quiz='".$_SESSION['id_quiz_gra']."'";

$result= $mysqli->query($query) or die($mysqli_error.__LINE__);
$total=$result->num_rows;


$query = "SELECT * FROM choices WHERE questionNumber = $number AND isCorrect = 1";


$result = $mysqli-> query($query) or die ($mysqli->error.__LINE__);

$row = $result->fetch_assoc();


$correctChoice = $row['id'];

$end = $selectChoice == '1';

if($end) {
    $_SESSION['score']++;

}
if($total == $number){
    header("Location: final.php");
}
else{
    header("Location: question.php?n=".$next);
}



?>
<main>
    <div class="container">
    <h1>Process PHP</h1>
    </div>
</main>
<?php 
include_once 'includes\footer.php'; 
?>