<?php
require '../../vendor/autoload.php';
require 'model.php';
use MongoDB\BSON\ObjectID;

function countDocsInColl($collection, $filter = []) {
    $db = get_db();
    return $db->$collection->count($filter);
}

function showArrow($page, $num_of_pages) {
    $arrows = '';
    if ($page > 1) {
        $arrows = $arrows."
        <div>
            <a href='gallery.php?page=".$page."&dir=prev'>
                <img src='img/gallery/backward-arrow.png' alt='back'>
            </a>
        </div>";
    }
        
    if ($page < $num_of_pages) {
        $arrows = $arrows."
        <div>
            <a href='gallery.php?page=".$page."&dir=next'>
                <img src='img/gallery/skip-track.png' alt='back'>
            </a>
        </div>";
    }
    return $arrows;
}

function insert_watermark(
    $source,
    $watermark,
    $type,
    $name
    ) {
        
    $name = substr($name, 0, -4);
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
    $name = substr($name, 0, -4);

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
?>