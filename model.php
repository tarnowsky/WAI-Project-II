<?php
require '../../vendor/autoload.php';
use MongoDB\BSON\ObjectID;

function get_db() {
    $mongo = new MongoDB\Client(
        "mongodb://localhost:27017/wai",
        [
            'username' => 'wai_web',
            'password' => 'w@i_w3b',
        ]);

    $db = $mongo->wai;

    return $db;
}

function addPhotoToGallery($path, $author, $title, $visibility, $id) {
    $db = get_db();
    return $db->images->insertOne([
        'path' => $path,
        'author' => $author,
        'title' => $title,
        'visibility' => $visibility,
        'uploaderID' => $id
    ]);
}

function deletePhotos() {
    $db = get_db();
    $db->images->deleteMany([]);
    deleteImgFromDir('images/');
    deleteImgFromDir('images/min/');
    deleteImgFromDir('images/wm/');
}

function deleteImgFromDir($dir) {
    array_map('unlink', glob("{$dir}*.jpeg"));
    array_map('unlink', glob("{$dir}*.jpg"));
    array_map('unlink', glob("{$dir}*.png"));
}

function loginFree($login) {
    $db = get_db();
    $user = $db->users->findOne(['login' => $login]);
    if ($user) return false;
    return true;
}

function addNewUser($login, $password) {
    $hash = password_hash($password, PASSWORD_DEFAULT);
    $db = get_db();
    return $db->users->insertOne([
        'login' => $login,
        'password' => $hash
    ]);
}

function readUser($login, $password) {
    $db = get_db();
    $user = $db->users->findOne(['login' => $login]);
    if ($user !== null && password_verify($password, $user['password'])) {
        session_regenerate_id();
		$_SESSION['user_id'] = $user['_id'];
        return true;
    } 
    else return false;
}

function getLoginById($user_id) {
    $db = get_db();
    $user = $db->users->findOne(['_id' => getObjectWithId($user_id)]);
    if ($user) return $user['login'];
    else return false;
}

function getImgMatchingTitle($title_chunk) {
    $result_images = '';

    if (empty($title_chunk)) return $result_images;
    
    $db = get_db();

    $images = $db->images->find([]);

    if (!empty($_SESSION['user_id']))
        $user = $db->users->findOne(['_id' => getObjectWithId($_SESSION['user_id'])]);
    else $user = null;

    foreach ($images as $image) {
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

function getImagesForUser($page, )

function getObjectWithId($id) {
    return new ObjectID($id);
}
include 'viewFunc.php';
?>