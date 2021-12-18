<?php include_once 'includes\header.php'; ?>
<?php include_once 'db\connect.php'; ?>
<?php session_start(); ?>

<?php
$query="SELECT * FROM questions";
$results= $mysqli->query($query) or die($mysqli_error.__LINE__);
$total=$results->num_rows;


$number = (int)$_GET['n'];

if($number==1){($_SESSION)['score']=0;}
    

$query = "SELECT * FROM questions WHERE QuestionNumber = $number";
$result= $mysqli->query($query) or die($mysqli_error.__LINE__);
$question=$result->fetch_assoc();



$query = "SELECT * FROM choices WHERE questionNumber = $number";

$choices = $mysqli -> query($query) or die ($mysqli-> error.__LINE__);
?>

<script src="js/main.js"></script> 

<header>
    <div class="container">
        <h1> PHP Quizer</h1>
        <p id="timer">00:00</p>
    </div>

</header>

    <main>
<div class="container">
    <div class="current">Question <?php echo $question['QuestionNumber']?> of <?php echo $total; ?> </div>
    <p class="question"><?php echo $question['QuestionText'];?> </p>
    <form action="process.php" method="post">
        <ul class="choices">
            <?php while($row = $choices-> fetch_assoc()): ?>
            <li><input type="radio" name="choice" value="<?php echo $row['isCorrect'];?>"><?php echo $row['choiceText'];?></li>
           <?php endwhile; ?>
        </ul>
    <input id="NextQuest" type="submit" value="submit" class="btn btn-success"/>
    <input type="hidden" name="number" value="<?php echo $number;?>" />
    </form>
</div>
    </main>
</div>

<?php include_once 'includes\footer.php'; ?>