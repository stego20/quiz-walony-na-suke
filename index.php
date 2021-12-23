<?php
    include_once 'db/connect.php';
    include_once 'includes/header.php';
    session_start();
    unset ($_SESSION['ile']);
    unset($_SESSION['blad_add']);
    unset($_SESSION['score']);
    unset($_SESSION['id']);
    unset($_SESSION['id_sesji']);
    unset($_SESSION['id_quiz_gra']);
    unset($_SESSION['zle']);
?>


<div class="container">




<?php
  if (!isset($_SESSION['user-id'])){echo '<a href="logowanie/logowanie.php">Zaloguj się</a>';}
    else{
      $getinfo="SELECT * FROM konta WHERE id='".$_SESSION['user-id']."'";
    $rezultat=$mysqli->query($getinfo);
    $wiersz=$rezultat->fetch_assoc();
    $_SESSION['user']=$wiersz['imie']." ".$wiersz['nazwisko'];
    $_SESSION['uprawinienia']=$wiersz['admin'];
    $_SESSION['klasa']=$wiersz['klasa'];
    $_SESSION['grupa']=$wiersz['grupa'];
    echo 'Witaj: '.$_SESSION['user'].' ';}
      if(isset($_SESSION['uprawinienia'])){
        if($_SESSION['uprawinienia']=='1'){
          echo '<a href="admin/paneladmin.php">Zarządzaj Użytkownikami</a> ';
          echo '<a href="quizy/add_quiz.php">Dodaj quiz</a> ';
          echo '<a href="quizy/set_quiz.php">Zaplanuj quiz</a> ';
          echo '<a href="modyfiakcja_quiz/modify_quiz.php">Modyfikuj quizy</a> ';
          echo '<a href="zaplanowane/dashboard-zaplanowane.php">Zaplanowane quizy</a> ';
          echo '<a href="wyniki/wyniki.php">Wyniki quizów</a> ';
            }
            else if($_SESSION['uprawinienia']=='0'){
               }
        }


?>

<div class='grid'><form method='post' action='quiz_menu.php'>
<?php
if (isset($_SESSION['grupa']) && isset($_SESSION['klasa'])){
  $date=gmdate('Y-m-d H:i:s',time()+3600);
  $aktualny = strtotime($date);
  $query="SELECT * FROM kolejka WHERE klasa='".$_SESSION['klasa']."' AND grupa='3' OR grupa LIKE'".$_SESSION['grupa']."'";
  $results= $mysqli->query($query) or die($mysqli_error.__LINE__);
  $wiersz2= $results->fetch_assoc();

  
  if($results->num_rows!=0){
    while($row=$results->fetch_assoc()){
      $query2="SELECT * FROM `wyniki` WHERE `imie_i_nazwisko`='".$_SESSION['user']."' AND `id_sesji`='".$row['id_sesji']."'";
      $results2= $mysqli->query($query2) or die($mysqli_error.__LINE__);
      if ($results2->num_rows==0){
        $start= strtotime($row['data_start']);
        $koniec= strtotime($row['data_koniec']);
        if($start<$aktualny && $aktualny<$koniec){
          echo "<button type=submit name='quiz_id' value='".$row['id_sesji']."'>".$row['name']."</button>";
        }else{
        }
      }
  }
  }
  
}



?></form></div>
</div>
</main>
<?php
include_once 'includes/footer.php';
?>



