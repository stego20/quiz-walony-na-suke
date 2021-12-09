<?php include_once 'includes\header.php'; ?>
<?php session_start(); ?>
<main>
    <div class="container">
    <h1>You are done</h1>
    <p> Congrats ! You have completed the test </php>
    <p>final score: <?php echo $_SESSION['score']; ?> </p>
    <a href="question.php?n=1" class="btn btn-secondary"> Take Again</a> 
    </div>
</main>
<?php include_once 'includes\footer.php'; ?>