<?php
require 'modelFunc.php';

function countDocsInColl($collection, $filter = []) {
    $db = get_db();
    return $db->$collection->count($filter);
}

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

    imagestring($image, 5, 75, 100, $watermark, $color);

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
?>