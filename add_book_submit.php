<?php
if(!isset($_SESSION))
{
    session_start();
}
if(isset($_SESSION['library']))
{
require "connect.php";


// Get form data
$barcode = htmlentities(addslashes($_POST['barcode']));
$subject = htmlentities(addslashes($_POST['subject']));
$author = htmlentities(addslashes($_POST['author']));
$edition = htmlentities(addslashes($_POST['edition']));
$publisher = htmlentities(addslashes($_POST['publisher']));

if (empty($barcode) || empty($subject) || empty($author) || empty($edition)) {
    echo 'empty'; // This could handle empty fields, but ideally this check happens in JS
    exit;
}

// $sql = "SELECT * FROM books WHERE barcode='$barcode'";
// $result = $connection->query($sql);

$sql = $connection->prepare("SELECT * FROM books WHERE barcode = ?");
    $sql->bind_param("s", $barcode);
    $sql->execute();
    $result = $sql->get_result();
if ($result->num_rows > 0) {
    echo 'duplicate'; // Send 'duplicate' response if barcode exists
} else {
// Insert book into database
// $sql = "INSERT INTO books (barcode, subject, author, edition,publisher) VALUES ('$barcode', '$subject', '$author', '$edition','$publisher')";

$sql = $connection->prepare("INSERT INTO books (barcode, subject, author, edition, publisher) VALUES (?, ?, ?, ?, ?)");
    $sql->bind_param("sssss", $barcode, $subject, $author, $edition, $publisher);

    if ($sql->execute()) {
        // echo "Book added successfully!";
        echo "success";
    } else {
        echo "Error: " . $sql->error;
    }

// if ($connection->query($sql) === TRUE) {
//     echo "success";
// } else {
//     echo "Error: " . $sql . "<br>" . $conn->error;
// }
}
    
    
    
    
    
}