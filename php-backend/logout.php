<?php

require 'vendor/autoload.php';

require __DIR__ . '/session.php';

if ($_SERVER['REQUEST_METHOD'] == 'GET') {

    $sessid = $_REQUEST['pfa_cookie'];
    terminate_session($sessid);

    setcookie('pfa_cookie', $sessid, -3600);
    http_response_code(200);
}
