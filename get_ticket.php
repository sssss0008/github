<?php

include 'db.php';

$stmt = $conn->query("SELECT * FROM tickets");
$tickets = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($tickets);
?>
