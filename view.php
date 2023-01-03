<?php
function getGalleryArrow($page, $num_of_pages, $direction) {
    $arrow = '';
    if ($direction == 'left') {
        if ($page > 1) {
            $arrow = $arrow."
            <div>
                <a href='gallery.php?page=".$page."&dir=prev' onclick='changePage()'>
                    <img src='img/gallery/backward-arrow.png' alt='back'>
                </a>
            </div>";
        }

    }
    else {
        if ($page < $num_of_pages) {
            $arrow = $arrow."
            <div>
                <a href='gallery.php?page=".$page."&dir=next' onclick='changePage()'>
                    <img src='img/gallery/skip-track.png' alt='back'>
                </a>
            </div>";
        }
    }     
    return $arrow;
}

function getImagesForGallery($imagesDir, $user, $chosenImg) {
    $images = '';
    foreach ($imagesDir as $file) {
        if (($file['visibility'] == 'public') || ($file['uploaderID'] == $user['_id'])) {
            if (in_array($file['_id'], $chosenImg)) $checked = 'checked';
            else $checked = '';

            if ($file['visibility'] == 'private') $visibility = '<br>PRYWATNE';
            else $visibility = '';

            $images = $images.'
            <div class="gallery-photo-container" id="0">
                <form>
                    <img class="gallery-photo" src="'.$file['path'].'" alt="zdjęcie" title="Zobacz zdjęcie">
                    <input type="checkbox" name="'.$file['_id'].'" class="gallery-checkbox" '.$checked.'>
                    <p>Autor: '.$file['author'].'<br>Tytuł: '.$file['title'].$visibility.'</p>
                </form>
            </div>
            ';
        }
        
    }
    return $images;
}

function getChosenImages($imagesDir, $chosenImg) {
    $images = '';
    foreach ($imagesDir as $file) {
        if (in_array($file['_id'], $chosenImg)) {
            if ($file['visibility'] == 'private') $visibility = '<br>PRYWATNE';
            else $visibility = '';

            $images = $images.'
            <div class="gallery-photo-container" id="0">
                <form>
                    <img class="gallery-photo" src="'.$file['path'].'" alt="zdjęcie" title="Zobacz zdjęcie">
                    <input type="checkbox" name="'.$file['_id'].'" class="gallery-checkbox">
                    <p>Autor: '.$file['author'].'<br>Tytuł: '.$file['title'].$visibility.'</p>
                </form>
            </div>
            ';
        }
    }
    return $images;
}

function getSearchedImages($imagesDir, $title_chunk, $user) {
    $result_images = '';
    if (empty($title_chunk)) return $result_images;
    foreach ($imagesDir as $image) {
        if ($image['visibility'] == 'public' || $image['uploaderID'] == $user['_id']) {

            if ($image['visibility'] == 'private') $visibility = '<br>PRYWATNE';
            else $visibility = '';

            if (strpos($image['title'], $title_chunk) !== false) {
                $result_images = $result_images.'
                <div class="gallery-photo-container">
                    <img class="gallery-photo" src="'.$image['path'].'" alt="zdjęcie" title="Zobacz zdjęcie" onclick="enlargePhoto(this)">
                    <p>Autor: '.$image['author'].'<br>Tytuł: '.$image['title'].$visibility.'</p>
                </div>
                ';
            }
        }
    }

    return $result_images;
}

function errorMsg($msg) {
    $msg = "<p id='error-msg'>".$msg."</p>";
    return $msg;
}

function getRegisterMsg($register = false) {
    $register_msg = "<p>Nie masz jeszcze konta?<br>
    <a href='register.php'>Zarejestruj się!</a>
    </p>";
    if ($register) {
        $register_msg = "<p style='color:green'>Udało się zarejestrować!<br>
        Zaloguj się!</p>";
    }
    return $register_msg;
}

function getBadMessage($value) {
    return "<p style='color:red'>".$value."</p>";
}

function getHrefEle($href, $value) {
    return "<a href='".$href."'>".$value."</a>";
}
?>