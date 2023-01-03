<?php
require 'controllFunc.php';
$how_many_on_page = 100;
$how_many_pages = ceil(countDocsInColl('images') / 9);


if (!isset($_GET['page'])) $page = 1;
if (!isset($_SESSION['chosenImages'])) {
    $_SESSION['chosenImages'] = [];
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_SESSION['chosenImages'])) {
    $_SESSION['chosenImages'] = array_diff($_SESSION['chosenImages'], $_POST['delImg']);
}
?>

