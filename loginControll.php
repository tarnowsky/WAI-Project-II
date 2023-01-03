<?php
require 'modelFunc.php';
$msg = "<p>Nie masz jeszcze konta?<br>
<a href='register.php'>Zarejestruj się!</a>
</p>";

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['register'])) {
    if ($_GET['register'] == 'done') {
        $msg = "<p style='color:green'>Udało się zarejestrować!<br>
        Zaloguj się!</p>";
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['login']) && isset($_POST['pass'])) {
    $login = $_POST['login']; 
    $password = $_POST['pass'];
    if (readUser($login, $password)) {
        header("Location: loginStatus.php?login=done");
        exit;
    }
    else $msg = "<p style='color:red'>Problemy z logowaniem.</p>";
}
?>