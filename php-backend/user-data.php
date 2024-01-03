<?php

require 'vendor/autoload.php';

require __DIR__ . '/dbactions/get-user.php';

require __DIR__ . '/session.php';

if ($_SERVER['REQUEST_METHOD'] == 'GET') {

    $sessid = $_REQUEST['pfa_cookie'];
    var_dump($_REQUEST);
    var_dump($sessid);
    var_dump(get_session_cookies());
    $user_id = get_user_from_session($sessid);
    var_dump($user_id);
    if (!$user_id) {
        setcookie('pfa_cookie', $sessid, -3600);
        http_response_code(401);

    } else {
        try {
            $res_user = get_user($user_id);
    
            if (pg_num_rows($res_user) == 0) {
                header('Content-Type: application/json');
                http_response_code(404);
                echo json_encode([
                    'status' => 'Not Found',
                    'code' => 404,
                    'message' => 'User does not exist'
                ]);
            } else {
                $username = pg_fetch_all($res_user)[0]['username'];
                
                http_response_code(200);
                $response = [
                    'status' => 'Ok',
                    'code' => 200,
                    'username' => $username,
                ];
                header('Content-Type: application/json');
                echo json_encode($response);
            }
        } catch (Exception $e) {
            // Handle unexpected exceptions here
            header('Content-Type: application/json');
            http_response_code(500);
            echo json_encode([
                'status' => 'Internal Server Error',
                'code' => 500,
                'message' => 'An error occurred'
            ]);
        }

    }
}