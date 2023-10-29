<?php

require 'vendor/autoload.php';

use Ramsey\Uuid\Uuid;

$session_cookies = array();

function new_session($username) {
    $new_id = Uuid::uuid4();
    $session_cookies[$new_id] = $username;

    return $new_id;
}

function terminate_session($id) {
    unset($session_cookies[$id]);
}