<?php
include_once '../db/connect.php';
session_start();
print_r($_POST);
if (!isset($_POST)){
    header("Location: modify_quiz.php");
}
else{
    $selectquest="SELECT * FROM choices WHERE questionNumber='".$_GET['quest_id']."' AND id_quiz='".$_GET['n']."'";
    $choice=$mysqli->query($selectquest);
    $ilerekordów=$choice->num_rows;
    $ile=0;
    if (sizeof($_POST)-3==$ilerekordów){
        while($choiceszbaz=$choice->fetch_assoc()){
            if($choiceszbaz['choiceText']==$_POST['choice'.$ile]){
                
                if ($ile+1==$_POST['corect']){
                    if($choiceszbaz['isCorrect']==1){
                        echo $_POST['choice'.$ile]."<br>";
                    }
                    else{
                        $update="UPDATE choices SET isCorrect='1' WHERE questionNumber='".$_GET['quest_id']."' AND id_quiz='".$_GET['n']."' AND  choiceText='".$choiceszbaz['choiceText']."'";
                        $update2=$mysqli->query($update) or die("nie udało się");
                        echo $_POST['choice'.$ile]."<br>";
                    }
                }
                else{
                    if($choiceszbaz['isCorrect']==1){
                        $update="UPDATE choices SET isCorrect='0' WHERE questionNumber='".$_GET['quest_id']."' AND id_quiz='".$_GET['n']."' AND  choiceText='".$choiceszbaz['choiceText']."'";
                        $update2=$mysqli->query($update) or die("nie udało się");
                        echo $_POST['choice'.$ile]."<br>";
                    }
                    else{
                        echo $_POST['choice'.$ile]."<br>";
                    }
                }
            }
            else{
                if($_POST['choice'.$ile]=='-' or $_POST['choice'.$ile]==''){
                   $delete="DELETE FROM choices WHERE questionNumber='".$_GET['quest_id']."' AND id_quiz='".$_GET['n']."' AND  choiceText='".$choiceszbaz['choiceText']."'";
                   $delete2=$mysqli->query($delete) or die("nie udało się");
                }
                
            }
            
            $ile++;
        }
        echo $ilerekordów;

    }
    else{
        while($choiceszbaz=$choice->fetch_assoc()){
            
            if($choiceszbaz['choiceText']==$_POST['choice'.$ile]){
                if ($ile+1==$_POST['corect']){
                    if($choiceszbaz['isCorrect']==1){
                        echo "poprawny<br>";
                    }
                    else{
                        $update="UPDATE choices SET isCorrect='1' WHERE questionNumber='".$_GET['quest_id']."' AND id_quiz='".$_GET['n']."' AND  choiceText='".$choiceszbaz['choiceText']."'";
                        $update2=$mysqli->query($update) or die("nie udało się");
                    }
                }
                else{
                    if($choiceszbaz['isCorrect']==1){
                        $update="UPDATE choices SET isCorrect='0' WHERE questionNumber='".$_GET['quest_id']."' AND id_quiz='".$_GET['n']."' AND  choiceText='".$choiceszbaz['choiceText']."'";
                        $update2=$mysqli->query($update) or die("nie udało się");
                    }
                    else{
                        echo "poprawny<br>";
                    }
                }
            }
            else{
                if($_POST['choice'.$ile]=='-' or $_POST['choice'.$ile]==''){
                    $delete="DELETE FROM choices WHERE questionNumber='".$_GET['quest_id']."' AND id_quiz='".$_GET['n']."' AND  choiceText='".$choiceszbaz['choiceText']."'";
                    $delete2=$mysqli->query($delete) or die("nie udało się");
                 }
            }
            
            $ile++;
        }
        
        for ($i=0; $i < sizeof($_POST)-(3+$ilerekordów); $i++) { 
            // echo $_POST['choice'.$i+$ilerekordów+1];
            if ($_POST['choice'.$i+$ilerekordów+1]!='-'){
                if ($_POST['corect']==$i+1+$ilerekordów){
                    $insert="INSERT INTO choices VALUES('".$_GET['n']."','".$_GET['quest_id']."','1','".$_POST['choice'.$i+$ilerekordów+1]."')";
                    $insertbaza=$mysqli->query($insert);
                }else{
                    $insert="INSERT INTO choices VALUES('".$_GET['n']."','".$_GET['quest_id']."','0','".$_POST['choice'.$i+$ilerekordów+1]."')";
                    $insertbaza=$mysqli->query($insert);
                }
                
            }
        }
        echo $ilerekordów;
    }
    
    header("Location: change_question.php?n=".$_GET['n']."");
}


?>