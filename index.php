<?php

require "dbBroker.php";
require "model/user.php";

session_start();

if(isset($_POST['username']) && isset($_POST['password'])){
    $uname = $_POST['username'];
    $upass = $_POST['password'];
    $user_id = 1;

    $korisnik = new User($user_id, $uname, $upass);

    //$odg = $korisnik->loginUser($korisnik, $baza);
    $odg = User::loginUser($korisnik, $baza);

    echo json_encode($odg);

    if($odg){
        $_SESSION['user_id'] = $korisnik->id;
        header('Location: home.php');
        exit();
    }

}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <title>FON: Zakazivanje kolokvijuma</title>

</head>
<body>
    <div class="login-form">
        <div class="main-div">
            <form method="POST" action="#">
                <div class="container">
                    <label class="username">Korisnicko ime</label>
                    <input type="text" name="username" class="form-control"  required>
                    <br>
                    <label for="password">Lozinka</label>
                    <input type="password" name="password" class="form-control" required>
                    <button type="submit" class="btn btn-primary" name="submit">Prijavi se</button>
                </div>


            </form>
        </div>

        
    </div>
</body>
</html>