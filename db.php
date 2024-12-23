<?php

$host = "localhost";
$db_name = "ticket_management";
$username = "root"; // Change as needed.
$password = ""; // Change as needed.

try {
     $conn = new PDO("mysql:host=$host;dbname=$db_name", $username, $password);
     $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
     echo "Connection failed: " . $e->getMessage();
}
?>
