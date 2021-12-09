<?php
include_once 'includes\header.php';
include_once 'db/connect.php';
?>
<?php
$query = "SELECT * FROM questions";
$run=$mysqli->query($query);
$count = mysqli_num_rows($run);
?>
<?php
// // questions
// $array = array();
// $file = file_get_contents("pytania.txt");
// $lines = explode("\n",$file);
// foreach ($lines as $key ) {
//     $explode = explode("\t",$key);
//     array_push($array,$explode);
// }
// array_shift($array);
// foreach ($array as $key){
//     $number = $key[0]+$count;
//     $query = "INSERT INTO questions VALUES('$number','$key[1]')";
//     $run=$mysqli->query($query);
// }
// echo "questions done <br>";
?>
<?php 
// // choices
// $array = array();
// $file = file_get_contents("odpowiedzi.txt");
// $lines = explode("\n",$file);
// foreach ($lines as $key ) {
//     $explode = explode("\t",$key);
//     array_push($array,$explode);
// }
// array_shift($array);
// foreach ($array as $key) {
//     $number = $key[0]+$count;
//     $query="INSERT INTO choices VALUES('$number','$key[1]','$key[2]')";
//     $run=$mysqli->query($query);
// }
// echo "choices done";
?>
<?php 
if (isset($_POST['submit'])){
            // questions
        $array = array();
        $file = file_get_contents($_POST["questiontxt"]);
        $lines = explode("\n",$file);
        foreach ($lines as $key){
            $explode = explode("\t",$key);
            array_push($array,$explode);
        }
        array_shift($array);
        foreach ($array as $key){
            $number = $key[0]+$count;
            $query = "INSERT INTO questions VALUES('$number','$key[1]')";
            $run=$mysqli->query($query);
        }
        echo "questions done <br>";

        // choices
        $array = array();
        $file = file_get_contents("odpowiedzi.txt");
        $lines = explode("\n",$file);
        foreach ($lines as $key ) {
            $explode = explode("\t",$key);
            array_push($array,$explode);
        }
        array_shift($array);
        foreach ($array as $key) {
            $number = $key[0]+$count;
            $query="INSERT INTO choices VALUES('$number','$key[1]','$key[2]')";
            $run=$mysqli->query($query);
        }
        echo "choices done";
}
?>
<mian>
    <div class = "container">
        <h2>Add A Question From TXT File</h2>
        <form action="questiontxttxt.php" method="POST">
            <p>
                <label>Question TXT</label>
                <input type="file" required="required" name="questiontxt">
            </p>
            <p>
                <label>Choices TXT</label>
                <input type="file" required="required" name="choicestxt">
            </p>
            <input type="submit" class="btn btn-primary" name="submit" value="Submit">
            <a href="index.php" class="btn btn-primary">Back</a>
        </form>
        
    </div>
</mian>
<?php include_once 'includes\footer.php'; ?>