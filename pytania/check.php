<?php
include_once '..\includes\header.php';
include_once '..\db/connect.php';
session_start();
?>
<?php
if(isset($_POST["submit"])){
    $nrpyt = $_SESSION["operator"];
    $post = $_POST["pytanie"];
    $query = "INSERT INTO questions VALUES('$nrpyt','$post')";
    $run=$mysqli->query($query);
    for ($i=0; $i < 4; $i++) { 
        if(!isset($_POST[$i+10])){
            $post = $_POST[$i];
            $query="INSERT INTO choices VALUES('$nrpyt',0,'$post')";
            $run=$mysqli->query($query);
        }
        else{
        $query = "INSERT INTO choices";
        $post = $_POST[$i];
        $query="INSERT INTO choices VALUES('$nrpyt',1,'$post')";
        $run=$mysqli->query($query);
        }
    }
    
}
if($_SESSION["end"]>=$_SESSION["operator"]){
    $textpyt = 0;
    $iscorrect = 10;
    $pytanie = $_SESSION["pytania"][$_SESSION["operator"]][0];
    // echo $pytanie."<br>";
    $_SESSION["operator"]+=1;
    $odp = array();
    foreach ($_SESSION["odpowiedzi"] as $key) {
        if($key[0]==$pytanie){
            array_push($odp,$key);
            array_shift($_SESSION["odpowiedzi"]);
        }
        elseif($key[0]>$pytanie){
            break;
        }
    }
    // print_r($odp);
    
}
else{
    header("Location:gettxt.php");
}
?>
<header>
    <div class="container">
        <h1>Testowanie Pytań(nazwa robocza)</h1>
    </div>

</header>

    <main>
<div class="container">
    <div class="current">Pytanie nr.<?php echo $_SESSION["operator"];?> </div>
    <form action="check.php" method="post">
        <label for="pytanie">Pytanie:</label>
        <input id="pytanie" name ="pytanie" type="text" value="<?php echo $pytanie = $_SESSION["pytania"][$_SESSION["operator"]-1][1]; ?>">
        <br><label>Odpowiedzi (zaznaczone- poprawna):</label><br>
        <?php foreach ($odp as $key) {?>
            <input type="checkbox" name="<?php echo $iscorrect;?>" value="<?php echo $key[1];?>"<?php if($key[1]==1){echo"checked";}?>><input name="<?php echo $textpyt;?>" type="text" value="<?php echo $key[2]; ?>"><br>
        <?php $textpyt+=1; $iscorrect+=1;}?>
        <input type="submit" value="submit" name="submit" class="btn btn-success"/>
    </form>
    </div>
    </main>
</div>
<?php include_once '..\includes\footer.php'; ?>
