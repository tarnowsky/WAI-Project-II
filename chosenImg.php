<?php
session_start();
include 'chosenImgControll.php';
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
            <link rel="stylesheet" href="styles/gallery.css">
            <link rel="icon" type="image/png" href="img/pixil-frame-0.png">
            <script defer src="script/brightness.js"></script>
            <script defer src="script/gallery.js"></script>
            <script defer src="script/chosenImg.js"></script>
            <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
            <script src="https://code.jquery.com/ui/1.13.0/jquery-ui.js"></script>
            <script defer src="script/jquery.scrollme.min.js"></script>
            <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    </head>
    <body>
        <?php include 'header.php';?>
        <main id="main">
            <div id="big-photo-box">
                <span id="close">
                    <img src="img/gallery/close.png" alt="close_img">
                </span>
                <div id="big-photo-container">
                    <div id="big-photo-content">
                    </div>
                </div>
            </div>
            <?php if (empty($_SESSION['chosenImages']) 
            || (count($_SESSION['chosenImages']) == 1 && $_SESSION['chosenImages'][0] == "")): ?>
                <section id="gallery">
                    <div id="true-gallery">
                        <h1 id="gal-title">Wybrane w Galerii zdjęcia, pojawią się tutaj.</h1>
                    </div>
                </section>
            <?php else: ?>
                <section id="gallery">
                    <div id="true-gallery">
                        <h1 id="gal-title">Wybrane zdjęcia</h1>
                        <div class="gallery-container">
                            <?=showChosenImages($_SESSION['chosenImages'])?>
                        </div>
                        <button id="delete-img">Usuń zaznaczone z zapamiętanych</button>
                        <div id="result" style="color:green;"></div>
                    </div>
                </section>
            <?php endif ?>
        </main>
        <?php include 'footer.php';?>
    </body>
</html>