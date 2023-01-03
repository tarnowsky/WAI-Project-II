<?php
session_start();
include 'uploadPhotosControll.php';
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
            <h1 id="upload-title">Prześlij zdjęcia do Galerii!</h1>
            <form action="uploadPhotos.php" method="POST" enctype="multipart/form-data" id="upload">
                Wskaż plik ze zdjęciem.<br>
                Dopuszczalny format: jpg, png.<br>
                Maksymalny rozmiar: 1 MB.<br><br>
                <input name="photoFile" type="file"><br><br>
                <label for="author">*Autor:</label><br>
                <input id="author" name="author" type="text" required><br>
                <label for="title">*Tytuł:</label><br>
                <input id="title" name="title" type="text" required><br>
                <label for="watermark">*Wpisz treść znaku wodnego:</label><br>
                <input id="watermark" name="watermark" type="text" required><br><br>
                <div id="private-toggle">
                    <label for="private">Prywatne</label>
                    <input type="radio" id="private" name="visibility" value="private">
                    <label for="public">Publiczne</label>
                    <input type="radio" id="public" name="visibility" value="public" checked>
                </div>
                *wymagane<br><br>
                <input type="submit" value="Send File" />
            </form>
            <?php if(isset($message)):?>
                <?=$message?>
            <?php endif ?>
        </main>
        <?php include 'footer.php';?>
        <script>
            window.addEventListener('DOMContentLoaded', (event) => {
                const privateToggleBox = document.getElementById("private-toggle");
                <?php if(!empty($_SESSION['user_id'])): ?>
                    const authorInput = document.getElementById("author");
                    const login = "<?=getLoginById($_SESSION['user_id'])?>";
                    
                    authorInput.setAttribute("value", login);
                    
                    <?php else: ?>
                    privateToggleBox.style.display = "none";
                <?php endif ?>
            })
        </script>
    </body>
</html>