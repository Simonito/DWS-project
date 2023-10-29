<?php

require 'vendor/autoload.php';

use Ramsey\Uuid\Uuid;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['username'];
    $passwd = $_POST['password'];

    $uuid = Uuid::uuid4();

    header('Content-Type: application/json');
    $response = [
        'status' => 'Ok',
        'code' => 200,
        'message' => 'Successfully logged in',
        'name' => $name,
        'passwd' => $passwd,
        'uuid' => $uuid
    ];
    echo json_encode($response);
} else {
    header('Content-Type: application/json');
    echo json_encode([
        'status' => 'Not Found',
        'code' => 404,
        'message' => 'Failed to log in'
    ]);
}