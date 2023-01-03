<?php
session_start();
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
            <link rel="stylesheet" href="styles/uploadPhotos.css">
            <link rel="icon" type="image/png" href="img/pixil-frame-0.png">
            <script defer src="script/brightness.js"></script>
            <script defer src="script/jquery.scrollme.min.js"></script>
            <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    </head>
    <body>
        <?php include 'header.php';?>
        <main>
            <h1 id="upload-title">Plik przesłany poprawnie.</h1>
            <a href="uploadPhotos.php">Dodaj następny plik</a>
            <a href="gallery.php">Galeria</a>
        </main>
        <?php include 'footer.php';?>
    </body>
</html>