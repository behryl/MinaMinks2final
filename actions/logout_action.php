<?php


session_unset();
session_destroy();

header("location: ../login/login_view.php");
exit;
?>