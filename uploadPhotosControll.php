<?php
require 'controllFunc.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST' 
    && isset($_FILES["photoFile"])
    && isset($_POST['author'])
    && isset($_POST['title'])
    && isset($_POST['watermark'])
    && isset($_POST['visibility'])
) {
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
                $message = $message . "<p style='color:red'>Złe rozszerzenie pliku (".$fileType.")</p>";
            if ($fileSize > 1048576) 
                $message = $message . "<p style='color:red'>Rozmiar pliku > 1 MB. ( ".$fileSize." B )</p>";
        }

        else {
            $uploadDir = $_SERVER['DOCUMENT_ROOT'];
            $path = '/images/';
            $uploadFile = $uploadDir . $path . $fileName;

            if (move_uploaded_file($_FILES['photoFile']['tmp_name'], $uploadFile)) {
                $where = $path . $fileName;
                $url = "uploadStatus.php";
                
                $source = ".".$where;
                $fileType = substr($fileType, -4);
                $fileName = substr($fileName, 0, -4);
                
                insert_watermark($source,$watermark,$fileType,$fileName);
                make_mini($source,$fileType,$fileName);

                $path = 'images/min/'.$fileName.'-min.'.$fileType;

                if (!empty($_SESSION['user_id'])) $uploaderId = $_SESSION['user_id'];
                else $uploaderId = null;

                addPhotoToGallery($path, $author, $title, $visibility, $uploaderId);

                header("Location: $url");
                exit;
            }
            else $message = $message . "<p style='color:red'>Możliwy atak przesyłem pliku.</p>";
        }
        
    }
    else if ($_FILES['photoFile']['error'] == 4) 
        $message = $message . "<p style='color:red'>Nie wybrano pliku.</p>";
    else $message = $message . "<p style='color:red'>Jest problem z tym plikiem.</p>";
}
?>