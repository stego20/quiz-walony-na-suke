<?php
    include_once 'db\connect.php';
    include_once 'includes\header.php';
    session_start();
    unset ($_SESSION['ile']);
    
    // if (!isset($_SESSION['user'])){
    //     header('Location: logowanie/logowanie.php');
    //     echo 'Witaj: '.$_SESSION['user'];
    // }
?>


<div class="container">
<header>
    <div class="container">
        <h1 id="demo">PHP QUIZERR</h1>
    </div>
</header>


<?php
$query="SELECT * FROM questions";
$results= $mysqli->query($query) or die($mysqli_error.__LINE__);
$total=$results->num_rows;
?>
<?php
  if (!isset($_SESSION['user'])){header('Location: logowanie/logowanie.php');}
    else{echo 'Witaj: '.$_SESSION['user'];}
      if(isset($_SESSION['uprawinienia'])){
        if($_SESSION['uprawinienia']=='1'){
          echo '<a href="admin/paneladmin.php">zarządzaj użytkownikami</a>';

            }
            else if($_SESSION['uprawinienia']=='0'){
               }
        }


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
<a onclick="StartTimer()" href="question.php?n=1" class="btn btn-primary">Start Quiz</a>
<!-- Needed -->
</div>
<?php
include_once 'includes\footer.php';
?>
</div>
</main>


