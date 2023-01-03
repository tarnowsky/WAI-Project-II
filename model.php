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

function getImg($filter = []) {
    $db = get_db();
    return $db->images->find($filter);
}

function getUserById($id) {
    $db = get_db();
    $user = $db->users->findOne(['_id' => getObjectWithId($id)]);
    return $user;
}

function getImagesForUser($page, $page_size, $is_logged) {
    $db = get_db();
    $opts = ['skip' => ($page - 1) * $page_size, 'limit' => $page_size];

    if ($is_logged) {
        $imagesDir = $db->images->find(['$or' => [
            ['visibility' => 'public'],
            ['uploaderID' => $_SESSION['user_id']]]
        ],
        $opts);
    }
    else {
        $imagesDir = $db->images->find(['visibility' => 'public'], $opts);
    }
    return $imagesDir;
}

function countDocsInColl($collection, $filter = []) {
    $db = get_db();
    return $db->$collection->count($filter);
}

function getObjectWithId($id) {
    return new ObjectID($id);
}
include 'viewFunc.php';
?>