<?php
include_once($_SERVER['DOCUMENT_ROOT'].'/../vendor/autoload.php');

use App\User;

header('Content-Type: application/json');
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['email']) && isset($_POST['password'])) {
        $result = User::login($_POST['email'], $_POST['password']);
        if ($result) {
            echo json_encode($result);
        } else {
            http_response_code(401);
            echo json_encode("User not found");
        }
    } else {
        http_response_code(400);
        echo json_encode("Bad request");
    }
} else {
    http_response_code(405);
    echo json_encode("Method not allowed");
}


