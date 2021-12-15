<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body{
            width: 100%;
            height: 100%;
        }
        form{
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%,-50%);
            height: auto;
            width: 400px;
            text-align: center;
        }
        form input{
            margin: 5px 0px;
            border: none;
            border-bottom: 2px solid;
        }

    </style>
</head>
<body>
    
    <form action='proceslog.php' method="post" >
        <h1 >Logowanie do QUIZ</h1>
       <p>Login: <input type="text" name="login"></p>
        <p>Haslo: <input type="password" name="haslo"></p>
        <?php
            if(isset($_SESSION['blad'])){
                echo "<p style='color: red;'>".$_SESSION['blad']."</p>";
                unset($_SESSION['blad']);
            }
        ?>
        <button type="submit" name='submit'>Log in</button>
        <button type="submit" name='rejestracja'>Register</button>
    </form>
</body>
</html>