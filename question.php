<?php

include_once 'includes/header.php';
include_once 'db/connect.php';
session_start();
print_r($_SESSION);
$query="SELECT * FROM questions WHERE id_quiz='".$_SESSION['id_quiz_gra']."'";
$results= $mysqli->query($query) or die($mysqli_error.__LINE__);
$total=$results->num_rows;

$number = (int)$_GET['n'];
if(!isset($_SESSION['test'])){
    $_SESSION['test']=0;
}

if($number==1){($_SESSION)['score']=0;}
    
$query = "SELECT * FROM questions WHERE QuestionNumber = '".$number."' AND id_quiz='".$_SESSION['id_quiz_gra']."'";
$result= $mysqli->query($query) or die($mysqli_error.__LINE__);
$question=$result->fetch_assoc();

$query = "SELECT * FROM choices WHERE questionNumber = '".$number."' AND id_quiz='".$_SESSION['id_quiz_gra']."'";
$choices = $mysqli -> query($query) or die ($mysqli-> error.__LINE__);

//Furtka na wybór timera zależnie od typu Quizu
$decy = 0;
if ($decy == 0) 
{
    echo('<script src="js/QuizTimer.js"></script>');
}
elseif ($decy == 1) 
{
    echo('<script src="js/QuestionTimer.js"></script>');
}

?>

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
            <input type="hidden" id='sciagal' name="sciagal" value="<?php echo $number;?>" />
            <input type="hidden" name="QuestionText" value="<?php echo $question['QuestionText'];?>" />
        </form>
    </div>
</main>
</div>

<?php

//   Ktoś niech to ogranie bo potrzebne w tabeli z wynikami ucznia miejsce na "Próby ściągania" = Tak/Nie

//   $host = 'localhost';
//   $user = 'root';
//   $pass = '';
//   $dbname = 'Cheating';
//   $conn = new mysqli($host, $user, $pass, $dbname) or die("nie połączono");
//   $sql = "INSERT INTO Wyniki (Proby) VALUES ('Tak');";

?>

<script>
  var controller = 0;
  var sciagal=0;
  let button=document.getElementById('sciagal');
  $( "html" )
    .mouseenter(function() 
    {})
    .mouseleave(function() 
    {
      controller = controller+1;
      if (controller >= 3) 
      {
          sciagal++;
            
        button.value=sciagal;
          alert("Jebać kapusi");
          controller = 0;            
      }
    });
</script> 

<?php include_once 'includes\footer.php'; ?>