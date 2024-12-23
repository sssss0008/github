<?php

session_start();
include 'db.php';

$data = json_decode(file_get_contents("php://input"));

if(isset($data->username) && isset($data->password)) {
     $username = $data->username;

     $stmt = $conn->prepare("SELECT * FROM users WHERE username=?");
     $stmt->execute([$username]);
     $user = $stmt->fetch(PDO::FETCH_ASSOC);

     if($user && password_verify($data->password, $user['password'])) {
         $_SESSION['user_id'] = $user['id'];
         $_SESSION['is_admin'] = ($user['username'] === 'admin'); // Default admin check.
         echo json_encode(["success" => true, "isAdmin" => $_SESSION['is_admin']]);
     } else {
         echo json_encode(["success" => false, "message" => "Invalid username or password"]);
     }
} else {
     echo json_encode(["success" => false, "message" => "Invalid input"]);
}
?>
