<?php
include_once '..\includes\header.php';
include_once '..\db/connect.php';
session_start();
?>
<?php
$_SESSION["pytania"] = array();
$_SESSION["odpowiedzi"] = array();
?>
<?php
if(isset($_POST["submit"])){

    $query = "SELECT * FROM questions";
    $run=$mysqli->query($query);
    $count = mysqli_num_rows($run);
    
    $pytania = array();
    $file = file_get_contents($_POST["questiontxt"]);
    $lines = explode("\n",$file);
    foreach ($lines as $key ) {
        $explode = explode("\t",$key);
        array_push($pytania,$explode);
    }
    array_shift($pytania);

    $odp = array();
    $file = file_get_contents($_POST["choicestxt"]);
    $lines = explode("\n",$file);
    foreach ($lines as $key ) {
        $explode = explode("\t",$key);
        array_push($odp,$explode);
    }
    array_shift($odp);

    $_SESSION["pytania"] = $pytania;
    $_SESSION["odpowiedzi"] = $odp;
    $_SESSION["operator"] = 0;
    $_SESSION["end"]=sizeof($pytania)-1;
    $_SESSION["count"]=$count;
    $_SESSION["usuwanie"]=0;
    header("Location:check.php");
}

?>
<mian>
    <div class = "container">
        <h2>Add A Question From TXT File</h2>
        <form action="gettxt.php" method="POST">
            <p>
                <label for="question" class="form-label" >Question TXT</label>
                <input id="question" class="form-control" type="file" required="required" name="questiontxt">
            </p>
            <p>
                <label for="choices" class="form-label">Choices TXT</label>
                <input id="choices" class="form-control" type="file" required="required" name="choicestxt">
            </p>
            <input type="submit" class="btn btn-primary" name="submit" value="Submit">
        </form>
        
    </div>
</mian>
<?php include_once '..\includes\footer.php'; ?>