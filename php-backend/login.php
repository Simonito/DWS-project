<?php

require __DIR__ . '/database.php';
require __DIR__ . '/session.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['username'];
    $passwd = $_POST['password'];

    process_login_request($name, $passwd);
    
} else {
    header('Content-Type: application/json');
    echo json_encode([
        'status' => 'Not Found',
        'code' => 404,
        'message' => 'Failed to log in'
    ]);
}

function process_login_request($name, $passwd) {
    $res_user = get_user_by_name($name);
    header('Content-Type: application/json');

    if (pg_num_rows($res_user) == 0) {
        echo json_encode(
            array(
                'status' => 'Not Found',
                'code' => 404,
                'message' => 'user does not exist'
            )
        );
        return;
    }

    $hashed_passwd = pg_fetch_all($res_user)[0]['password'];
    if (password_verify($passwd, $hash_passwd) == FALSE) {
        echo json_encode(
            array(
                'status' => 'Bad Request',
                'code' => 400,
                'message' => 'invalid password'
            )
        );
        return;
    }

    //TODO: create session token and send it back as response
    $token = new_session($name);

    $response = [
        'status' => 'Ok',
        'code' => 200,
        'authToken' => $token
    ];

    echo json_encode($response);
}