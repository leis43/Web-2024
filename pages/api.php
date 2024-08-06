<?php
require_once 'database.php';
require_once 'httpUtils.php';

function saveFile(string $file, string $data): bool
{
    $myFile = fopen($file, 'w');
    if ($myFile) {
        $result = fwrite($myFile, $data);
        fclose($myFile);
        return $result !== false;
    }
    return false;
}

function saveImage(string $imageBase64, string $directory): string
{
    $imageBase64Array = explode(';base64,', $imageBase64);
    $imgExtention = str_replace('data:image/', '', $imageBase64Array[0]);
    $imageDecoded = base64_decode($imageBase64Array[1]);
    $name = uniqid();
    $filePath = __DIR__ . "/static/images/{$directory}/{$name}.{$imgExtention}";
    if (saveFile($filePath, $imageDecoded)) {
        return "./static/images/{$directory}/{$name}.{$imgExtention}";
    }
    sendStatusCode400();
    exit();
}

function savePostToDatabase(mysqli $conn, $data): void
{
    $sql_query = "INSERT INTO post (
      title,
      subtitle,
      content,
      author,
      author_url,
      publish_date,
      image_url,
      featured,
      image_url_small                
    ) 
    VALUES (
      '{$conn->real_escape_string($data['title'])}',
      '{$conn->real_escape_string($data['subtitle'])}',
      '{$conn->real_escape_string($data['content'])}',
      '{$conn->real_escape_string($data['authorName'])}',
      '{$conn->real_escape_string($data['authorAvatar'])}',
      '{$conn->real_escape_string($data['publishDate'])}',
      '{$conn->real_escape_string($data['mainImage'])}',
       '0',     
      '{$conn->real_escape_string($data['previewImage'])}'
    )";

    if ($conn->query($sql_query)) {
        sendStatusCode200();
    } else {
        sendStatusCode400();
        echo $conn->error;
    }
}

function dataIsCorrect($data): bool
{
    $requiredFields = ['title', 'subtitle', 'content', 'authorName', 'publishDate', 'authorAvatar', 'mainImage', 'previewImage'];

    foreach ($requiredFields as $field) {
        if (!isset($data[$field]) || !is_string($data[$field]) || empty(trim($data[$field]))) {
            sendStatusCode400();
            return false;
        }
    }

    return true;
}

$method = $_SERVER['REQUEST_METHOD'];
if ($method !== 'POST') {
    sendStatusCode400();
    exit();
}

$connection = createDBConnection();
if ($connection->connect_error) {
    sendStatusCode400();
    exit();
}

$dataAsJson = file_get_contents("php://input");
$dataAsArray = json_decode($dataAsJson, true);

if (!$dataAsArray) {
    sendStatusCode400();
    exit();
}

$dataAsArray['authorAvatar'] = saveImage($dataAsArray['authorAvatar'], "images__home");
$dataAsArray['mainImage'] = saveImage($dataAsArray['mainImage'], "images__post");
$dataAsArray['previewImage'] = saveImage($dataAsArray['previewImage'], "images__home");

if (dataIsCorrect($dataAsArray)) {
    savePostToDatabase($connection, $dataAsArray);
}

$connection->close();