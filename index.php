<?php
include_once 'includes\header.php';
include_once 'db\connect.php';
?>

<div class="container">
<header>
    <div class="container">
        <h1>PHP QUIZERR</h1>

    </div>
</header>

<?php

$query="SELECT * FROM questions";
$results= $mysqli->query($query) or die($mysqli_error.__LINE__);
$total=$results->num_rows;
?>




<main>
    <div class="container">
        <h2> Test your PHP Knowlege</h2>
<p> This is the multiple choice quiz to test your knowledge of PHP</p>
<ul>
    <li><strong> Number of Questions: </strong><?php echo $total;?> </li>
    <li><strong> Type Of Quiz: </strong> Multiple Choice</li>
    <li><strong> Estimated time: </strong><?php echo $total * 0.5; ?> Minutes </li>

</ul>
<a href="question.php?n=1" class="btn btn-primary">Start Quiz</a>
</div>
<?php
include_once 'includes\footer.php';
?>
</div>
</main>

