<?php
require_once 'database.php';

function sendStatusCode401(): void
{
    $dataError = array(
        "message" => "Unauthorized",
        "status" => "error"
    );
    $statusCode = 401;

    header('Content-Type: application/json;charset=utf-8');
    $jsonData = json_encode($dataError);
    http_response_code($statusCode);
    echo $jsonData;
}

function sendStatusCode200(): void
{
    $dataSuccess = array(
        "message" => "All good",
        "status" => "success"
    );
    $statusCode = 200;

    header('Content-Type: application/json;charset=utf-8');
    $jsonData = json_encode($dataSuccess);
    http_response_code($statusCode);
    echo $jsonData;
}

function sendStatusCode400(): void
{
    $dataError = array(
        "message" => "An error occurred",
        "status" => "error"
    );
    $statusCode = 400;

    header('Content-Type: application/json;charset=utf-8');
    $jsonData = json_encode($dataError);
    http_response_code($statusCode);
    echo $jsonData;
}

function authByCookie() :string
{
    function findUserById(mysqli $conn, string $id): ?mysqli_result
    {
        $sql_query = "SELECT * FROM users WHERE id = ?";
        $stmt = $conn->prepare($sql_query);
        $stmt->bind_param("s", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result ?? null;
    }
    $conn = createDBConnection();
    if (!$_COOKIE['auth'] || !findUserById($conn, $_COOKIE['auth']) ) {
        header('Location: /login');
    }
    $user = findUserById($conn, $_COOKIE['auth']);
    if (!$user) {
        header('Location: /login');
        exit();
    }
    return $user->fetch_assoc()['mail'];
}