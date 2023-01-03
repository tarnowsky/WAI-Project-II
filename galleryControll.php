<?php
require 'controllFunc.php';
$how_many_on_page = 4;

if (!empty($_SESSION['user_id'])) {
    $how_many_pages = ceil(countDocsInColl(
        'images', [
            '$or' => [
                ['visibility' => 'public'],
                ['uploaderID' => $_SESSION['user_id']]
            ]
        ]
        ) / $how_many_on_page);
}
else $how_many_pages = ceil(countDocsInColl('images', ['visibility' => 'public']) / $how_many_on_page);


if (!isset($_GET['page'])) $page = 1;
if (!isset($_SESSION['chosenImages'])) {
    $_SESSION['chosenImages'] = [];
}

if ($_SERVER['REQUEST_METHOD']==='GET') {
    if (isset($_GET['page'])) {
        $page = $_GET['page'];
        if ($_GET['dir'] == 'prev') $page--;
        else $page++;
    }
    
    if (isset($_GET['behv']) && $_GET['behv'] === 'clr') {
        deletePhotos();
        header("Location: gallery.php");
        exit;
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $_SESSION['chosenImages'] = $_POST['chosenImages'];
}
?>
