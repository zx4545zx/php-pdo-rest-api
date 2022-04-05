<?php
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json; charset=UTF-8');

    include_once $_SERVER['DOCUMENT_ROOT']. '/php-rest-api/api/config/config.php';
    include_once $_SERVER['DOCUMENT_ROOT']. '/php-rest-api/api/student/studentModel.php';

    function index($conn) {
        $response = getAllStudent($conn);

        http_response_code(200);
        echo json_encode($response);
    }

    function show($body, $conn) {
        $response = getStudent($body, $conn);

        http_response_code(200);
        echo json_encode($response);
    }

    function create($body, $conn) {
        $response = createStudent($body, $conn);

        http_response_code(200);
        echo json_encode($response);
    }

    function update($body, $conn) {
        $response = updateStudent($body, $conn);

        http_response_code(200);
        echo json_encode($response);
    }

    function delete($body, $conn) {
        $response = deleteStudent($body, $conn);

        http_response_code(200);
        echo json_encode($response);
    }
?>