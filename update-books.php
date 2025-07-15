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



// $sql = "UPDATE books SET subject='$subject', author='$author', edition='$edition', publisher = '$publisher' WHERE barcode='$barcode'";

$sql = $connection->prepare("UPDATE books SET subject = ?, author = ?, edition = ?, publisher = ? WHERE barcode = ?");
$sql->bind_param("sssss", $subject, $author, $edition, $publisher, $barcode);



if ($sql->execute()) {
     echo '<script>alert("successfully")

    window.location.href = "book_list.php";
  </script>';
    
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

}