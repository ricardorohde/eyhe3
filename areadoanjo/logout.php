<?php
session_start();
session_destroy();
header("Location: anjo-login.php");
?>
