<?php

require 'vendor/autoload.php';

require __DIR__ . '/dbactions/get-user.php';
require __DIR__ . '/dbactions/create-user.php';

require __DIR__ . '/session/session.php';

use Ramsey\Uuid\Uuid;

// SUBMIT EXPENSE
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $amount = $_POST['amount'];
    $cat_name = $_POST['category_name'];
    $paid_at = $_POST['paid_at'];
    $created_at = $_POST['created_at'];

    $session_id = $_REQUEST['pfa_cookie'];

    header('Content-Type: application/json');
    
    if (!isset($_REQUEST['pfa_cookie'])) {
        // cookie is not set
        http_response_code(401);
        echo json_encode([
            'status' => 'Unauthorized',
            'code' => 401,
            'message' => 'Unauthorized, log in!'
        ]);
    } else {

    }
    
    // // verify that username is available
    // $res_user = get_user_by_name($name);
    // if (pg_num_rows($res_user) != 0) {
    //     // username is taken
    //     http_response_code(409);
    //     echo json_encode([
    //         'status' => 'Conflict',
    //         'code' => 409,
    //         'message' => 'User already exists'
    //     ]);
    // } else {
    //     // username is available
    //     $hashed_pass = password_hash($passwd, PASSWORD_BCRYPT);
    //     $user_id = Uuid::uuid4();
    //     create_user($user_id, $name, $hashed_pass);

    //     $session_cookie = new_session($user_id);
        
    //     setcookie('pfa_cookie', $session_cookie, time() + 3600);
    //     http_response_code(201);
    //     $response = [
    //         'status' => 'Created',
    //         'code' => 201,
    //         'pfa_cookie' => $session_cookie,
    //     ];
    //     echo json_encode($response);
    // }
}
