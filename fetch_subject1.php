<?php
include "connect.php";

if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

$barcode = $_POST['barcode'] ?? '';

if (!empty($barcode)) {
 $stmt = $connection->prepare("SELECT edition, subject, author, publisher FROM books WHERE barcode = ?");
$stmt->bind_param("s", $barcode);
$stmt->execute();

$stmt->bind_result($edition, $subject, $author, $publisher); // Add all columns here

    
    if ($stmt->fetch()) {
       echo "Book Name: $subject <br>Author: $author";
    } else {
        echo "No subject found for this barcode.";
    }

    $stmt->close();
}

$connection->close();
?>
