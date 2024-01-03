<?php

require 'vendor/autoload.php';

use Ramsey\Uuid\Uuid;

$session_cookies = array();

function new_session($user_id) {
    global $session_cookies;

    $new_id = Uuid::uuid4()->toString();
    $session_cookies[$new_id] = $user_id;

    return $new_id;
}

function terminate_session($session_id) {
    global $session_cookies;

    unset($session_cookies[$session_id->toString()]);
}

function get_user_from_session($session_id) {
    global $session_cookies;

    if (isset($session_cookies[$session_id->toString()])) {
        return $session_cookies[$session_id];    
    } else {
        return false;
    }
}

function get_session_cookies() {
    global $session_cookies;
    return $session_cookies;
}