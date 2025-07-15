<?php
require "connect.php";

// Get the barcode from the POST request
$barcode = $_POST['barcode'];

// Prepare and bind statement to prevent SQL injection
$stmt = $connection->prepare("SELECT COUNT(*) FROM books WHERE barcode = ?");
$stmt->bind_param("s", $barcode);
$stmt->execute();
$stmt->bind_result($count);
$stmt->fetch();

// Check if the barcode exists
if ($count > 0) {
    echo 'exists'; // Barcode already exists
} else {
    echo 'not_exists'; // Barcode does not exist
}

$stmt->close();
$connection->close();
?>
