<?php
session_start();
session_destroy();

// seta o status do anjo para offiline


header("Location: ../../index.php");
