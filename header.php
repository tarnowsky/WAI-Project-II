<?php
require_once "controll.php";
?>
<header>
    <div id="header-title">
        <a href="index.php">
            <h2>Red Lust</h2>
        </a>
    </div>
    <nav>
        <div id="nav-menu">
            <div class="menu-block">
                <a href="uploadPhotos.php">Prześlij zdjęcie</a>
            </div>
            <div class="menu-block">
                <a href="gallery.php">Galeria</a>
            </div>
            <div class="menu-block">
                <a href="chosenImg.php">Wybrane zdjęcia</a>
            </div>
            <div class="menu-block">
                <a href="searchImage.php">Wyszukiwarka</a>
            </div>
            <div class="menu-block">
                <?=$log_in_out?>
            </div>
        </div>
    </nav>
    <div id="brightness">
        <img id="brightnessLogo" src="img/header/brightness.png" alt="zmień kontrast">
    </div>
    <input type="checkbox" id="burger-butt">
    <label for="burger-butt" id="burger-menu">
        <span id="burger">
            <span class="burger-ele" id="top"></span>
            <span class="burger-ele" id="middle"></span>
            <span class="burger-ele" id="bottom"></span>
        </span>
        <span id="burger-content">
            <span id="burgerBrightness">
                <img id="burgerBrightnessLogo" src="img/header/brightness.png" alt="zmień kontrast">
            </span>
            <span id="nav-in-burger">
                <span>
                    <a href="gallery.php">Galeria</a>
                </span>
                <span>
                    <a href="uploadPhotos.php">Prześlij zdjęcie</a>
                </span>
                <span>
                    <?=$log_in_out?>
                </span>
            </span>
            <span id="socials-in-burger">
                <span class="burger-photoBox">
                    <a href="https://www.facebook.com/redlust.theband" target="_blank">
                        <img src="img/Nav/facebook.png" alt="Facebook logo" class="fbLink">
                    </a>
                </span>
                <span class="burger-photoBox">
                    <a href="https://www.instagram.com/redlust_official/" target="_blank">
                        <img src="img/Nav/instagram.png" alt="Instagram logo" class="instaLink">
                    </a>
                </span>
            </span>
        </span>
    </label>
</header>