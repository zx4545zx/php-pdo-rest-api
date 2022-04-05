<?php
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json; charset=UTF-8');

    include_once $_SERVER['DOCUMENT_ROOT']. '/php-rest-api/api/config/config.php';

    function getAllStudent($conn) {
        $sql = "SELECT * FROM Student";
        $statement = $conn->prepare($sql);
        $statement->execute();

        return $result= $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    function getStudent($body, $conn) {
        $sql = "SELECT * FROM Student WHERE id = '".$body->id."' ";
        $statement = $conn->prepare($sql);
        $statement->execute();

        return $result= $statement->fetch(PDO::FETCH_ASSOC);
    }

    function createStudent($body, $conn) {
        $sql = "INSERT INTO Student(firstname, lastname, classroom_id) value(?,?,?)";
        $statement = $conn->prepare($sql);
        $statement->execute([$body->firstname, $body->lastname, $body->classroom_id]);

        return $result = [
            "id" => $conn->lastInsertId(),
            "status" => 'Insert Success'
        ];
    }

    function updateStudent($body, $conn) {
        $sql = "UPDATE Student SET firstname=?, lastname=?, classroom_id=? WHERE id=?";
        $statement = $conn->prepare($sql);
        $statement->execute([$body->firstname, $body->lastname, $body->classroom_id, $body->id]);

        return $result = [
            "status" => 'Update Success'
        ];
    }

    function deleteStudent($body, $conn) {
        $sql = "DELETE FROM Student WHERE id=?";
        $statement = $conn->prepare($sql);
        $statement->execute([$body->id]);

        return $result = [
            "status" => 'Delete Success'
        ];
    }
?>