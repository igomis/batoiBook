<?php
include_once($_SERVER['DOCUMENT_ROOT'].'/../vendor/autoload.php');

use App\User;

header('Content-Type: application/json');
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['email']) && isset($_POST['password'])) {
    $result = User::register($_POST['email'], $_POST['password'], $_POST['nick']);
    if ($result) {
        echo json_encode($result);
    } else {
        http_response_code(401);
        echo json_encode("Datos incorrectos");
    }
}
