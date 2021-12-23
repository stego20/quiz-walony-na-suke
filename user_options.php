<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</head>
<body>

<?php

// include_once 'db/connect.php';

$id = "ID typka";

// $query = "SELECT 'login' FROM konta WHERE id = $id";
// $result = $mysqli-> query($query) or die ($mysqli->error.__LINE__);
// $row = $result->fetch_assoc();

// $login = $row['login'];
$login = "abc";


//Tu zaciągać quizy!!!
$quiz1 = array(
    "name" => "Biolka",
    "maxpoint" => 50,
    "score" => 16,
);

$quiz2 = array(
    "name" => "Matma",
    "maxpoint" => 100,
    "score" => 84,
);


?>

<nav>
    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
    <li class="nav-item" role="presentation">
        <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">Quizy</button>
    </li>
    <li class="nav-item" role="presentation">
        <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">Ustawienia Konta</button>
    </li>
    <!-- <li class="nav-item" role="presentation">
        <button class="nav-link" id="pills-contact-tab" data-bs-toggle="pill" data-bs-target="#pills-contact" type="button" role="tab" aria-controls="pills-contact" aria-selected="false">Inne Opcje?</button>
    </li> -->
    </ul>
    <div class="tab-content" id="pills-tabContent">
        <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
            <ul class="list-group">
                <li class="list-group-item"><?php echo($quiz1["name"]) ?></li>
                <div class="progress">
                    <div class="progress-bar" role="progressbar" style="width: <?php echo($quiz1["score"]/$quiz1["maxpoint"]*100) ?>%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"><?php echo($quiz1["score"]/$quiz1["maxpoint"]*100) ?>%</div>
                </div>
                <li class="list-group-item"><?php echo($quiz2["name"]) ?></li>
                <div class="progress">
                    <div class="progress-bar" role="progressbar" style="width: <?php echo($quiz2["score"]/$quiz2["maxpoint"]*100)?>%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"><?php echo($quiz2["score"]/$quiz2["maxpoint"]*100) ?>%</div>
                </div>
            </ul>            
        </div>
        <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
            <form action="user_options.php" method="POST">
                <div class="accordion-item">
                    <h2 class="accordion-header" id="flush-headingLogin">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseLogin" aria-expanded="false" aria-controls="flush-collapseLogin">
                            Zmieñ Login
                        </button>
                    </h2>
                    <div id="flush-collapseLogin" class="accordion-collapse collapse" aria-labelledby="flush-headingLogin" data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body">
                            <a>Obecny login: <?php echo($login); ?></a>
                            <br>
                            <div class="input-group mb-3">
                                <label class="col-sm-2 col-form-label">Nowy login:</label>
                                <input name="login" type="text" class="form-control bg-secondary" aria-describedby="button-addon2">
                                <br>
                                <button name="newlogin" class="btn btn-success" type="submit" id="button-addon2">Zmieñ</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="flush-headingHasło">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseHasło" aria-expanded="false" aria-controls="flush-collapseHasło">
                            Zmieñ Hasło
                        </button>
                    </h2>
                    <div id="flush-collapseHasło" class="accordion-collapse collapse" aria-labelledby="flush-headingHasło" data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body">
                            <div class="input-group mb-3">
                                <label for="inputPassword" class="col-sm-2 col-form-label">Nowe haslo:</label>
                                <div class="col-sm-10">
                                    <input name="pass1" type="password" class="form-control bg-secondary">
                                </div>
                            </div>
                            <div class="input-group mb-3">
                                <label for="inputPassword" class="col-sm-2 col-form-label">Powtórz haslo:</label>
                                <input name="pass2" type="password" class="form-control bg-secondary" aria-describedby="button-addon2">
                                <br>
                                <button name="newpassword" class="btn btn-success" type="submit" id="button-addon2">Zmieñ</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</nav>


<?php

if (isset($_POST["newlogin"])) 
{
    $newlogin = $_POST['login'];

    // $query = "UPDATE konta SET 'login' = $newlogin WHERE id = $id;";
    // $result = $mysqli-> query($query) or die ($mysqli->error.__LINE__);
}

elseif (isset($_POST["newpassword"])) 
{
    $pass1 = $_POST['pass1'];
    $pass2 = $_POST['pass2'];

    if (strcmp($pass1, $pass2) == 0) 
    {
        // $query = "UPDATE konta SET haslo = $pass2 WHERE id = $id;";
        // $result = $mysqli-> query($query) or die ($mysqli->error.__LINE__);        
        
        // echo("Haslo zmienione");
    }
    elseif (strcmp($pass1, $pass2) != 0) 
    {
        // echo("hasla sie róznia");
    }

}

?>


</body>
</html>