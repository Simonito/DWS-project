<?php

require __DIR__ . '/database.php';

use Ramsey\Uuid\Uuid;

function create_user($username, $password) {
    global $dbconn;
    $user_id = Uuid::uuid4();
    $query = "INSERT INTO users (user_id, username, password) VALUES ($1, $2, $3);";
    $result = pg_query_params($dbconn, $query, [$user_id, $username, $password]);

    if (!$result) {
        return null;
    }
}
