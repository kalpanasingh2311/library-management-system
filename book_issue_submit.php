<?php
if(!isset($_SESSION))
{
    session_start();
}
if(isset($_SESSION['library']))
{
require "connect.php";
date_default_timezone_set("Asia/Bangkok");

// Get form data
$enrollment = htmlentities(addslashes($_POST['enrolment']));
$bookcode = htmlentities(addslashes($_POST['bookcode']));

$date = date('Y-m-d');

if (empty($enrollment) || empty($bookcode)) {
    echo 'empty';
     // This could handle empty fields, but ideally this check happens in JS
    exit;
}

$sqlc = "SELECT * FROM books WHERE barcode='$bookcode'";
$resultc = $connection->query($sqlc);
if(mysqli_num_rows($resultc)>0){

$sql = $connection->prepare("SELECT * FROM book_issue WHERE book_barcode =? and (return_date is null or return_date = '')");
    $sql->bind_param("s",  $bookcode);
    $sql->execute();
    $result = $sql->get_result();
if ($result->num_rows > 0) {
    echo 'book alreday issued'; // Send 'duplicate' response if barcode exists
} else {


    // $sql1= $connection->prepare("select * from books where barcode=$barcode");

// Insert book into database
// $sql = "INSERT INTO books (barcode, subject, author, edition,publisher) VALUES ('$barcode', '$subject', '$author', '$edition','$publisher')";

$sql = $connection->prepare("INSERT INTO book_issue (enrollment, book_barcode, entry_date) VALUES (?, ?, ?)");
$sql->bind_param("sis", $enrollment, $bookcode, $date);

    if ($sql->execute()) {
        // echo "Book added successfully!";
        echo "success";
    } else {
        echo "Error: " . $sql->error;

    }
}
    

}
else{
    echo "incorrect bar code";
}
 



    
    

}
?>





