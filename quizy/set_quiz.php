<?php
include_once '../db/connect.php';
session_start();
?>
    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

</head>
<body>
    <form method="post" action='process_set.php'>
        Wybierz nazwe quizu: <input list='name-quiz' name="name" autocomplete="off"><br>
  <datalist id="name-quiz">
      <?php
    $sql="SELECT `name` FROM quizy WHERE id_n='".$_SESSION['user-id']."'";
    $rezultat=$mysqli->query($sql);
    while($row=$rezultat->fetch_assoc()){
        echo "<option value='".$row['name']."'>";
    }
    ?>
  </datalist>
        Data-rozpoczęczia:<input type="datetime-local" name="datar"><br>
        Data-zakończenia:<input type="datetime-local" name="datak"><br>
        Klasa:<input type="text" name='klasa' maxlength="2"><br>
        grupa: <input type="checkbox" name="1" value="1">1
            <input type="checkbox" name="2" value="2">2 <br>
        <input type="submit" value="Create">
    </form></div>
</form>

    
</body>
</html>