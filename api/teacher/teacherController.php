<?php
    require_once "../teacher/teacherModel.php";

    function index($conn) {
        $response = getAllTeacher($conn);

        http_response_code(200);
        echo json_encode($response);
    }

    function show($body, $conn) {
        $response = getTeacher($body, $conn);

        http_response_code(200);
        echo json_encode($response);
    }

    function create($body, $conn) {
        $response = createTeacher($body, $conn);

        http_response_code(200);
        echo json_encode($response);
    }

    function update($body, $conn) {
        $response = updateTeacher($body, $conn);

        http_response_code(200);
        echo json_encode($response);
    }

    function delete($body, $conn) {
        $response = deleteTeacher($body, $conn);

        http_response_code(200);
        echo json_encode($response);
    }
?>