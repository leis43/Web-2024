<?php
const HOST = '127.0.0.1';
const USERNAME = 'root';
const PASSWORD = '';
const DATABASE = 'blog';

function createDBConnection(): mysqli
{
	$conn = new mysqli(HOST, USERNAME, PASSWORD, DATABASE);
	if (mysqli_connect_errno()) {
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
		exit();
	}

	return $conn;
}

function closeDBConnection(mysqli $conn): void
{
	$conn->close();
}
