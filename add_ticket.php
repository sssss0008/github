<?php

session_start();
include 'db.php';

if(!isset($_SESSION['is_admin']) || !$_SESSION['is_admin']) {
     http_response_code(403);
     exit(json_encode(["success" => false, "message" => "Unauthorized"]));
}

$data = json_decode(file_get_contents("php://input"));

if(isset($data->type) && isset($data->price) && isset($data->discount)) {
     $type = $data->type;
     $price = $data->price;
     $discount = $data->discount;

     $stmt = $conn->prepare("INSERT INTO tickets (type, price, discount) VALUES (?, ?, ?)");
     if($stmt->execute([$type, $price, $discount])) {
         echo json_encode(["success" => true]);
     } else {
         echo json_encode(["success" => false, "message" => "Failed to add ticket"]);
     }
} else {
     echo json_encode(["success" => false, "message" => "Invalid input"]);
}
?>
