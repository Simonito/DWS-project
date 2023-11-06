<?php

require __DIR__ . '/database.php';
require __DIR__ . '/session.php';

error_reporting(E_ALL);
ini_set('display_errors', 1);

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
    exit();
}

function process_login_request($name, $passwd) {
    try {
        $res_user = get_user_by_name($name);

        if (pg_num_rows($res_user) == 0) {
            header('Content-Type: application/json');
            echo json_encode([
                'status' => 'Not Found',
                'code' => 404,
                'message' => 'User does not exist'
            ]);
        } else {
            $hashed_passwd = pg_fetch_all($res_user)[0]['password'];
            if (password_verify($passwd, $hashed_passwd) == false) {
                header('Content-Type: application/json');
                echo json_encode([
                    'status' => 'Bad Request',
                    'code' => 400,
                    'message' => 'Invalid password'
                ]);
            } else {
                $token = new_session($name);
                $response = [
                    'status' => 'Ok',
                    'code' => 200,
                    'authToken' => $token
                ];
                header('Content-Type: application/json');
                echo json_encode($response);
            }
        }
    } catch (Exception $e) {
        // Handle unexpected exceptions here
        header('Content-Type: application/json');
        echo json_encode([
            'status' => 'Internal Server Error',
            'code' => 500,
            'message' => 'An error occurred'
        ]);
    }

    exit();
}
