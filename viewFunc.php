<?php
function showArrow($page, $num_of_pages, $direction) {
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

function showImages($page = 1, $chosenImg = [], $pageSize = 6) {
    $images = '';
    $opts = ['skip' => ($page - 1) * $pageSize, 'limit' => $pageSize];
    $db = get_db();

    if (!empty($_SESSION['user_id'])) {
        $user = $db->users->findOne(['_id' => getObjectWithId($_SESSION['user_id'])]);
        $imagesDir = $db->images->find(['$or' => [
            ['visibility' => 'public'],
            ['uploaderID' => $_SESSION['user_id']]]
        ],
        $opts);
    }
    else {
        $user = ['_id' => null];
        $imagesDir = $db->images->find(['visibility' => 'public'], $opts);
    }
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

function showChosenImages($chosenImg = []) {
    $images = '';
    $db = get_db();
    $imagesDir = $db->images->find([]);
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

function errorMsg($msg) {
    $msg = "<p id='error-msg'>".$msg."</p>";
    return $msg;
}

?>