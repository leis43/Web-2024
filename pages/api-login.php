<?php
require_once 'database.php';
require_once 'httpUtils.php';

function findUserByEmail(mysqli $conn, string $email)
{
    $sql_query = "SELECT * FROM users WHERE mail = ?";
    $stmt = $conn->prepare($sql_query);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    return $result->fetch_assoc();
}

function verifyPassword(string $inputPassword, string $storedHash): bool
{
    return md5($inputPassword) === $storedHash;
}

$conn = createDBConnection();
$dataAsJson = file_get_contents("php://input");
$dataAsArray = json_decode($dataAsJson, true);
$email = $dataAsArray['email'];
$password = $dataAsArray['password'];

$user = findUserByEmail($conn, $email);

if ($user && verifyPassword($password, $user['passwords'])) {
    setcookie('auth', $user['id'], time()+3600);
    sendStatusCode200();
} else {
    sendStatusCode401();
}
