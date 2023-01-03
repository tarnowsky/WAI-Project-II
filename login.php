<?php
session_start();
include "loginControll.php";
?>
<!DOCTYPE html>
<html lang="en">
    <head>
            <title>Moje Hobby</title>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="stylesheet" href="styles/header_styles.css">
            <link rel="stylesheet" href="styles/main_content_styles.css">
            <link rel="stylesheet" href="styles/footer.css">
            <link rel="stylesheet" href="styles/login.css">
            <link rel="icon" type="image/png" href="img/pixil-frame-0.png">
            <script defer src="script/brightness.js"></script>
            <script defer src="script/jquery.scrollme.min.js"></script>
            <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    </head>
    <body>
        <?php include 'header.php';?>
        <main>
            <section id="login-interface">
                <h1 id="login-header">Logowanie</h1>
                <div id="login-box">
                    <form id="login-form" method="POST">
                        <label for="login">Login:</label><br>
                        <input type="text" id="login" name="login" placeholder="Podaj login..." required><br>
                        <label for="pass">Hasło:</label><br>
                        <input type="password" id="pass" name="pass" placeholder="Wpisz hasło..." required><br>
                        <input type="submit" value="Zaloguj">
                    </form>
                </div>
                <div id="register-msg">
                    <?=$msg?>
                </div>
            </section>
        </main>
        <?php include 'footer.php';?>
    </body>
</html>