<?php
require 'controllFunc.php';
$error_msg = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST'
    && isset($_POST['login'])
    && isset($_POST['mail'])
    && isset($_POST['pass'])
    && isset($_POST['repass'])
) {
    $login = $_POST['login'];
    $email = $_POST['mail'];
    $password = $_POST['pass'];
    $repassword = $_POST['repass'];

    if ($password === $repassword) {
        if (loginFree($login)) {
            if(addNewUser($login, $password)) {
                header("Location: login.php?register=done");
                exit;
            }
            else $error_msg = 'Błąd po stronie bazy danych.';
        }
        else $error_msg = 'Login zajęty.';
    }
    else $error_msg = 'Hasła nie są identyczne.';
}
?>