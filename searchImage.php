<?php
session_start();
require 'controllFunc.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST'
    && isset($_POST['title_chunk'])
) {
    echo getImgMatchingTitle($_POST['title_chunk']);
    exit;
}
?>
<!DOCTYPE html>
<html lang="pl-PL">
    <head>
        <title>Moje Hobby</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="styles/header_styles.css">
        <link rel="stylesheet" href="styles/main_content_styles.css">
        <link rel="stylesheet" href="styles/footer.css">
        <link rel="stylesheet" href="styles/gallery.css">
        <link rel="stylesheet" href="styles/search_img.css">
        <link rel="icon" type="image/png" href="img/pixil-frame-0.png">
        <script defer src="script/brightness.js"></script>
        <script defer src="script/gallery.js"></script>
        <script defer src="script/imgSearch.js"></script>
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
            
            <section id="gallery">
                <div id="true-gallery">
                    <h1>Wyszukiwarka zdjęć</h1>
                    <div id="searchBar-box">
                        <label for="searchBar">Wpisz tytuł zdjęcia:</label>
                        <input id="searchBar" placeholder="Wpisz tytuł lub jego fragment..." type="text">
                    </div>
                    <div class="gallery-container"> 
                    </div>
                </div>
            </section>
        </main>
        <?php include 'footer.php';?>
    </body>
</html>
