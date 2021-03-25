<?php

    $sessao = $_GET['s'];
    require('opentok.phar');
    use OpenTok\OpenTok;
    use OpenTok\MediaMode;

    $API_KEY = 46211362;
    $API_SECRET = '6f9c311abc59bcb0d0156b10179fbb89a2ccc71a';

    $apiObj = new OpenTok($API_KEY, $API_SECRET);

    $token = $apiObj->generateToken($sessao);

    echo $token;
?>
