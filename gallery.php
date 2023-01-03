<?php
session_start();
include 'galleryControll.php';
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
            
            <section id="gallery">
                <?php if ($how_many_pages != 0): ?>
                <div class="arrow-container">
                    <?=showArrow($page, $how_many_pages, 'left');?>
                </div>
                <div id="true-gallery">
                    <h1>Galeria zdjęć</h1>
                    <div class="gallery-container"> 
                        <?=showImages($page, $_SESSION['chosenImages'], $how_many_on_page);?>
                    </div>
                        <a href="gallery.php?behv=clr">Wyczyść</a>
                        <button id="save-img">Zapamiętaj wybrane</button>
                        <div id="result" style="color:green;"></div>
                </div>
                <div class="arrow-container">
                    <?=showArrow($page, $how_many_pages, 'right');?>
                </div>
                <?php else: ?>
                    <div id="true-gallery">
                        <h1>Przesłane zdjęcia pojawią się tutaj.</h1>
                    </div>
                <?php endif ?>
            </section>
        </main>
        <?php include 'footer.php';?>
        <script>
            let chosenImages = []
            <?php if(!isset($_GET['page'])): ?>
                window.sessionStorage.clear()
            <?php endif ?>

            <?php if(isset($_SESSION['chosenImages'])): ?>
                chosenImages = "<?=implode(" ", $_SESSION['chosenImages'])?>".split(" ")
            <?php endif ?>
            
            window.addEventListener('DOMContentLoaded', (event) => {
                const saveImgBtn = document.getElementById('save-img');
                const galleryCheckBox = document.querySelectorAll('.gallery-checkbox');
                
                if (window.sessionStorage.getItem('tempChosenImg')) {
                    chosenImages = JSON.parse(window.sessionStorage.getItem('tempChosenImg'))
                }
                galleryCheckBox.forEach(box => {
                    box.onchange = () => {
                        if (chosenImages.includes(box.name)) {
                            const index = chosenImages.indexOf(box.name)
                            chosenImages.splice(index, 1)
                        }
                        else chosenImages.push(box.name)
                        console.log(chosenImages)
                    }
                    if (chosenImages.includes(box.name)) {
                        box.checked = true;
                    }
                    else box.checked = false;
                })

                saveImgBtn.onclick = () => {
                    $.ajax({
                        method: 'POST',
                        url: '../gallery.php',
                        data: {chosenImages: chosenImages}
                    }).done(() => {
                        $("#result").html('Zdjęcia zapamiętane')
                    })
                }

            })

            const changePage = () => {
                window.sessionStorage.setItem('tempChosenImg', JSON.stringify(chosenImages))
            }
        </script>
    </body>
</html>