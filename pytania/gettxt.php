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
    
    if($count!=0){
        $i=0;
        while ($i < sizeof($array)){
            $array[$i][0]+=$count;
            $i++;}
        $i=0;
        while ($i < sizeof($pytania)){
            $pytania[$i][0]+=$count;
            $i++;}
    }
    $_SESSION["pytania"] = $pytania;
    $_SESSION["odpowiedzi"] = $odp;
}

?>
<mian>
    <div class = "container">
        <h2>Add A Question From TXT File</h2>
        <form action="gettxt.php" method="POST">
            <p>
                <label>Question TXT</label>
                <input type="file" required="required" name="questiontxt">
            </p>
            <p>
                <label>Choices TXT</label>
                <input type="file" required="required" name="choicestxt">
            </p>
            <input type="submit" class="btn btn-primary" name="submit" value="Submit">
        </form>
        
    </div>
</mian>
<?php include_once '..\includes\footer.php'; ?>