<?php
    require('opentok.phar');
    use OpenTok\OpenTok;
    use OpenTok\MediaMode;
    use OpenTok\ArchiveMode;

    $API_KEY = 47112394;
    $API_SECRET = '465db61fe01b9b1d4a36a5e976616dcafa71b126';

    $opentok = new OpenTok($API_KEY, $API_SECRET);

    // Create a session that attempts to use peer-to-peer streaming:
    $session = $opentok->createSession();

    // A session that uses the OpenTok Media Router, which is required for archiving:
    $session = $opentok->createSession(array( 'mediaMode' => MediaMode::ROUTED ));

    // A session with a location hint:
    $session = $opentok->createSession(array( 'location' => '12.34.56.78' ));

    // An automatically archived session:
    $sessionOptions = array(
        'archiveMode' => ArchiveMode::ALWAYS,
        'mediaMode' => MediaMode::ROUTED
    );
    $session = $opentok->createSession($sessionOptions);


    // Store this sessionId in the database for later use
    $sessionId = $session->getSessionId();

    echo $sessionId;
?>
