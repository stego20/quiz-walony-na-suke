<?php
    include_once 'db\connect.php';
    include_once 'includes\header.php';
    session_start();
    unset ($_SESSION['ile']);
    $sql="SELECT * FROM question";
    $result=$mysqli->query($sql) or die ($mysqli_error.__LINE__);
    $total=$result->num_rows;
    // if (!isset($_SESSION['user'])){
    //     header('Location: logowanie/logowanie.php');
    //     echo 'Witaj: '.$_SESSION['user'];
    // }
?>
    <?php
        if (!isset($_SESSION['user'])){header('Location: logowanie/logowanie.php');}
        else{echo '<a href="logowanie/mojekonto.php" style="text-aligne: right;">Witaj: '.$_SESSION['user'].'</a>';}
        if(isset($_SESSION['uprawinienia'])){
            if($_SESSION['uprawinienia']=='1'){
                echo '<a href="admin/paneladmin.php">zarządzaj użytkownikami</a>';
            }
            else if($_SESSION['uprawinienia']=='0'){
                
            }
        }
    ?>
    <div class='container'>
        <header>
            <div class='container'>
                <h1>PHP QUIZZER</h1>
            </div>
        </header>
        <main>
            <div class='container'>
                
                <h2>Test Your PHP Knowlage</h2>
                <p>This is the multiple choice to test your knowlage of PHP</p>
                <ul>
                    <li><strong>Type Of Quiz:</strong> Multiple Choice</li>
                    <li><strong>Number Of Question:</strong> <?php echo $total;?></li>
                    <li><strong>Estimated Time:</strong> <?php echo $total*0.5 ; ?> minutes </li>
                </ul>
                <a href="question.php?n=1" class='btn btn-primary'>Start Quiz</a>
                <a href="dodawanie pytan/dodawanie_pytan.php" class='btn btn-primary'>ADD qustion</a>
            </div>
        </main>
    
    <?php
        include_once 'includes\footer.php';
    ?></div>
    </body>
</html>
