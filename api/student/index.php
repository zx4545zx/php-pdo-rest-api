<?php
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json; charset=UTF-8');

    include_once '../config/config.php';
    include_once './studentController.php';

    $body = json_decode(file_get_contents("php://input"));

    if ($_SERVER["REQUEST_METHOD"] == 'GET') {
        if ($body) {
            show($body, $conn);
        } else {
            index($conn);
        }
    } else if ($_SERVER["REQUEST_METHOD"] == 'POST') {
        if ($body) {
            create($body, $conn);
        } else {
            echo json_encode(['POST' => 'Body is null']);
        }
    } else if ($_SERVER["REQUEST_METHOD"] == 'PATCH') {
        if ($body) {
            update($body, $conn);
        } else {
            echo json_encode(['PATCH' => 'Body is null']);
        }
    } else if ($_SERVER["REQUEST_METHOD"] == 'DELETE') {
        if ($body) {
            delete($body, $conn);
        } else {
            echo json_encode(['DELETE' => 'ID is null']);
        }

    } else {
        echo json_encode(['ERROR' => 'Error']);
    }
?>
