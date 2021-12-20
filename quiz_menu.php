<?php
    include_once 'db/connect.php';
    include_once 'includes/header.php';
    session_start();
    unset ($_SESSION['ile']);
    $_SESSION['id_quiz_gra']=$_POST['quiz_id'];
    unset($_SESSION['blad_add']);
    unset($_SESSION['score']);
    unset($_SESSION['id']);
    print_r($_SESSION);
    
?>





<?php
$query="SELECT * FROM quizy Where id='".$_POST['quiz_id']."'";
$results= $mysqli->query($query) or die($mysqli_error.__LINE__);
$quiz=$results->fetch_assoc();


$select="SELECT * FROM questions WHERE id_quiz='".$_POST['quiz_id']."'";
$rezultat=$mysqli->query($select);
$total=$rezultat->num_rows;
?>

<div class="container">
<header>
    <div class="container">
        <h1 id="demo"><?php echo $quiz['name']; ?></h1>
    </div>
</header>



<main>
    <div class="container">
        <!-- <h2> Test your PHP Knowlege</h2> -->
<p> This is the multiple choice quiz to test your knowledge</p>
<ul>
    <li><strong> Number of Questions: </strong><?php echo $total;?> </li>
    <li><strong> Type Of Quiz: </strong> Multiple Choice</li>
    <li><strong> Estimated time: </strong><?php echo $total * 0.5; ?> Minutes </li>

</ul>
<a onclick="StartTimer()" href="question.php?n=1" class="btn btn-primary">Start Quiz</a>
<!-- Needed -->
</div>
<?php
include_once 'includes/footer.php';
?>
</div>
</main>


