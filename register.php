<?php

include 'db.php';

$data = json_decode(file_get_contents("php://input"));

if(isset($data->username) && isset($data->password)) {
     $username = $data->username;
     $passwordHash = password_hash($data->password, PASSWORD_DEFAULT);

     $stmt = $conn->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
     if($stmt->execute([$username, $passwordHash])) {
         echo json_encode(["success" => true]);
     } else {
         echo json_encode(["success" => false, "message" => "Registration failed"]);
     }
} else {
     echo json_encode(["success" => false, "message" => "Invalid input"]);
}
?>
