<?php

require 'vendor/autoload.php';

use Ramsey\Uuid\Uuid;

$dbhost = getenv('DATABASE_HOST');
$dbname = getenv('DATABASE_NAME');
$dbuser = getenv('DATABASE_USER');
$dbpass = getenv('DATABASE_PASSWORD');

$dbconn = pg_connect("host=$dbhost dbname=$dbname user=$dbuser password=$dbpass")
    or die('Could not connect: ' . pg_last_error());

function chech_unique_username($username) {
    $result = get_user_by_name($username);
    $rows = pg_num_rows($result);
    return $rows == 0;
}

function create_user($username, $password) {
    $user_id = Uuid::uuid4();
    $query = "INSERT INTO users (user_id, username, password) VALUES ($user_id, $username, $password);";
    pg_query($dbconn, $query);
}

function get_user_by_name($username) {
    $query = "SELECT * FROM users WHERE username = $username;";
    return pg_query($dbconn, $query);
}