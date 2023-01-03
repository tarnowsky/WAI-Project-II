<?php
require '../../vendor/autoload.php';
require 'model.php';
require 'view.php';
use MongoDB\BSON\ObjectID;

function insert_watermark(
    $source,
    $watermark,
    $type,
    $name
    ) {
        
    if ($type == 'png') {
        $image = imagecreatefrompng($source);
    }
    else $image = imagecreatefromjpeg($source);
        
    $color = imagecolorallocate($image, 0, 255, 0);

    imagestring($image, 5, 0, 0, $watermark, $color);

    $path = 'images/wm/'.$name.'-wm.'.$type;

    if ($type == 'png') {
        imagepng($image, $path);
    }
    else imagejpeg($image, $path);
}

function make_mini(
    $source, 
    $type,
    $name
    ) {

    list($originWidth, $originHeight) = getimagesize($source);
    $newWidth = 125;
    $newHeight = 200;

    $thumb = imagecreatetruecolor($newWidth, $newHeight);
    if ($type == 'png') $image = imagecreatefrompng($source);
    else $image = imagecreatefromjpeg($source);

    imagecopyresized(
        $thumb,
        $image,
        0, 0, 0, 0,
        $newWidth, $newHeight,
        $originWidth, $originHeight
    );
    $path = 'images/min/'.$name.'-min.'.$type;
    if ($type == 'png') imagepng($thumb, $path);
    else imagejpeg($thumb, $path);
}
// chosenImg
if (!isset($_SESSION['chosenImages'])) {
    $_SESSION['chosenImages'] = [];
}

// gallery
$how_many_on_page = 4;
// login
$msg = getRegisterMsg();
// register
$error_msg = '';

if (!isset($_GET['page'])) {
    $page = 1;
}

if (!empty($_SESSION['user_id'])) {
    $logged = true;
    //gallery
    $how_many_pages = ceil(countDocsInColl(
        'images', [
            '$or' => [
                ['visibility' => 'public'],
                ['uploaderID' => $_SESSION['user_id']]
            ]
        ]
        ) / $how_many_on_page);
    //header
    $log_in_out = getHrefEle("logout.php", "Wyloguj");
}
else {
    $logged = false;
    //gallery
    $how_many_pages = ceil(countDocsInColl('images', ['visibility' => 'public']) / $how_many_on_page);
    //header
    $log_in_out = getHrefEle("login.php", "Zaloguj");
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    //searched img
    if (isset($_POST['title_chunk'])) {
        $title_chunk = $_POST['title_chunk'];
        if ($logged) {
            echo getSearchedImages(
                getImg(), 
                $title_chunk, 
                getUserById($_SESSION['user_id'])
            );
        }
        else {
            echo getSearchedImages(
                getImg(), 
                $title_chunk, 
                null
            );
        }
        exit;
    }
    // chosenImg
    if (isset($_SESSION['chosenImages']) && isset($_POST['delImg'])) {
        $_SESSION['chosenImages'] = array_diff($_SESSION['chosenImages'], $_POST['delImg']);
    }
    //gallery 
    if (isset($_POST['chosenImages'])) {
        $_SESSION['chosenImages'] = $_POST['chosenImages'];
    }
    //login
    if (isset($_POST['login']) && isset($_POST['pass'])) {
        $login = $_POST['login']; 
        $password = $_POST['pass'];
        if (readUser($login, $password)) {
            header("Location: loginStatus.php?login=done");
            exit;
        }
        else $msg = getBadMessage('Problemy z logowaniem.');
    }
    //register
    if (isset($_POST['login'])
    && isset($_POST['mail'])
    && isset($_POST['pass'])
    && isset($_POST['repass'])) {
        $login = $_POST['login'];
        $email = $_POST['mail'];
        $password = $_POST['pass'];
        $repassword = $_POST['repass'];
    
        if ($password === $repassword) {
            if (loginFree($login)) {
                if(addNewUser($login, $password)) {
                    header("Location: login.php?register=done");
                    exit;
                }
                else $error_msg = 'Błąd po stronie bazy danych.';
            }
            else $error_msg = 'Login zajęty.';
        }
        else $error_msg = 'Hasła nie są identyczne.';
    }

    // upload photos
    if (isset($_FILES["photoFile"])
    && isset($_POST['author'])
    && isset($_POST['title'])
    && isset($_POST['watermark'])
    && isset($_POST['visibility'])) {
        $message = '';

        if ($_FILES['photoFile']['error'] == UPLOAD_ERR_OK) {
            $validImgExtensions = array('jpg', 'png', 'jpeg');
            
            $path = $_FILES['photoFile']['name'];
            $fileSize = $_FILES['photoFile']['size'];
            $fileType = pathinfo($path, PATHINFO_EXTENSION);
            $watermark = $_POST['watermark'];

            $fileName = basename($path);

            $author = $_POST['author'];
            $title = $_POST['title'];
            $visibility = $_POST['visibility'];


            if (!in_array($fileType, $validImgExtensions) || $fileSize > 1048576) {
                if (!in_array($fileType, $validImgExtensions))
                    $message = $message . getBadMessage("Złe rozszerzenie pliku (".$fileType.")");
                if ($fileSize > 1048576) 
                    $message = $message . getBadMessage("Rozmiar pliku > 1 MB. ( ".$fileSize." B )");
            }

            else {
                $uploadDir = $_SERVER['DOCUMENT_ROOT'];
                $path = '/images/';
                $uploadFile = $uploadDir . $path . $fileName;

                if (move_uploaded_file($_FILES['photoFile']['tmp_name'], $uploadFile)) {
                    $where = $path . $fileName;
                    $url = "uploadStatus.php?name=".$fileName.";";
                    
                    $source = ".".$where;
                    $fileType = substr($fileType, -4);
                    $fileName = substr($fileName, 0, -4);
                    
                    insert_watermark($source,$watermark,$fileType,$fileName);
                    make_mini($source,$fileType,$fileName);

                    $path = 'images/min/'.$fileName.'-min.'.$fileType;

                    if ($logged) $uploaderId = $_SESSION['user_id'];
                    else $uploaderId = null;

                    addPhotoToGallery($path, $author, $title, $visibility, $uploaderId);

                    header("Location: $url");
                    exit;
                }
                else $message = $message . getBadMessage("Możliwy atak przesyłem pliku.");
            }
            
        }
        else if ($_FILES['photoFile']['error'] == 4) 
            $message = $message . getBadMessage("Nie wybrano pliku.");
        else $message = $message . getBadMessage("Jest problem z tym plikiem.");
    }
}

if ($_SERVER['REQUEST_METHOD']==='GET') {
    //gallery
    if (isset($_GET['page']) && isset($_GET['dir'])) {
        $page = $_GET['page'];
        $dir = $_GET['dir'];
        if ($dir == 'prev') $page--;
        else $page++;
    }

    if (isset($_GET['behv']) && $_GET['behv'] === 'clr') {
        deletePhotos();
        header("Location: gallery.php");
        exit;
    }

    //login 
    if (isset($_GET['register'])) {
        $msg = getRegisterMsg(true);
    }

}
?>

