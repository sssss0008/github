<?php

session_start();
include 'db.php';

if(!isset($_SESSION['user_id'])) {
     http_response_code(403);
     exit(json_encode(["success"=>false,"message"=>"Unauthorized"]));
}

$user_id = $_SESSION['user_id'];
$stmt = $conn->prepare("SELECT * FROM bookings WHERE user_id=?");
$stmt->execute([$user_id]);
$bookings = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($bookings);
?>
