<?php
if (!empty($_SESSION['user_id'])) {
    $log_in_out = "<a href='logout.php'>Wyloguj</a>";
}
else $log_in_out = "<a href='login.php'>Zaloguj</a>";
?>