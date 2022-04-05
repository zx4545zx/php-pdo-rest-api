<?php
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json; charset=UTF-8');

    include_once $_SERVER['DOCUMENT_ROOT']. '/php-rest-api/api/config/config.php';

    function getAllTeacher($conn) {
        $sql = "SELECT * FROM Teacher";
        $statement = $conn->prepare($sql);
        $statement->execute();

        return $result= $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    function getTeacher($body, $conn) {
        $sql = "SELECT * FROM Teacher WHERE id = '".$body->id."' ";
        $statement = $conn->prepare($sql);
        $statement->execute();

        return $result= $statement->fetch(PDO::FETCH_ASSOC);
    }

    function createTeacher($body, $conn) {
        $sql = "INSERT INTO Teacher(firstname, lastname, position) value(?,?,?)";
        $statement = $conn->prepare($sql);
        $statement->execute([$body->firstname, $body->lastname, $body->position]);

        return $result = [
            "id" => $conn->lastInsertId(),
            "status" => 'Insert Success'
        ];
    }

    function updateTeacher($body, $conn) {
        $sql = "UPDATE Teacher SET firstname=?, lastname=?, position=? WHERE id=?";
        $statement = $conn->prepare($sql);
        $statement->execute([$body->firstname, $body->lastname, $body->position, $body->id]);

        return $result = [
            "status" => 'Update Success'
        ];
    }

    function deleteTeacher($body, $conn) {
        $sql = "DELETE FROM Teacher WHERE id=?";
        $statement = $conn->prepare($sql);
        $statement->execute([$body->id]);

        return $result = [
            "status" => 'Delete Success'
        ];
    }
?>