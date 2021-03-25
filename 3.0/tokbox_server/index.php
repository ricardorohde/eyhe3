<?php

    require('opentok.phar');
    use OpenTok\OpenTok;
    use OpenTok\MediaMode;
    //use OpenTok\ArchiveMode;


    $API_KEY = 46211362;
    $API_SECRET = '6f9c311abc59bcb0d0156b10179fbb89a2ccc71a';

    $apiObj = new OpenTok($API_KEY, $API_SECRET);

    //$session = $apiObj->createSession(array('mediaMode' => MediaMode::ROUTED,'archiveMode' => ArchiveMode::MANUAL));
    $session = $apiObj->createSession(array('mediaMode' => MediaMode::ROUTED));
    $session_id = $session->getSessionId();
    //echo "Sessão criada ID: ".$session_id."<br/>";*/


    /*$token1 = $apiObj->generateToken($session_id);
    $token2 = $apiObj->generateToken($session_id);

    echo "Token cliente 1: ".$token1."<br/>";
    echo "Token cliente 2: ".$token2."<br/>";

    //$session->getArchiveMode();*/



?>
