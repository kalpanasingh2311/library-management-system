<?php
if(!isset($_SESSION))
{
    session_start();
}
if(isset($_SESSION['library']))
{
require "connect.php";

// get form data

$name_student= htmlentities(addslashes($_POST['studentname']));
$enrollment=htmlentities(addslashes($_POST['enrolment']));
$course=htmlentities(addslashes($_POST['course']));
$department=htmlentities(addslashes($_POST['department']));
$current_sem=htmlentities(addslashes($_POST['currentsem']));
$active=htmlentities(addslashes($_POST['active']));


if (empty($name_student) || empty($enrollment) || empty($course) || empty($department)
||empty($current_sem) || empty($active)) {
    echo 'empty';
     // This could handle empty fields, but ideally this check happens in JS
    exit;
}

// $sql = "SELECT * FROM books WHERE barcode='$barcode'";
// $result = $connection->query($sql);

$sql = $connection->prepare("SELECT * FROM admission WHERE enrollment = ?");
    $sql->bind_param("s", $enrollment);
    $sql->execute();
    $result = $sql->get_result();
if ($result->num_rows > 0) {
    echo 'duplicate'; // Send 'duplicate' response if barcode exists
} else {
// Insert book into database
// $sql = "INSERT INTO books (barcode, subject, author, edition,publisher) VALUES ('$barcode', '$subject', '$author', '$edition','$publisher')";

$sql = $connection->prepare("INSERT INTO admission (name_student, enrollment,course ,department ,current_sem, active) VALUES (?, ?, ?, ?, ?,?)");
    $sql->bind_param("ssssis", $name_student, $enrollment, $course, $department, $current_sem,$active);

    if ($sql->execute()) {
        // echo "Book added successfully!";
        echo "success";
    } else {
        echo "Error: " . $sql->error;
    }
}
    
 


//  $sql  ="insert into admission (`name_student`, `enrollment`, `course`, `department`, `current_sem`, `active`) values
// ('$studentname','$enrolment','$course','$department','$currentsem'$active')";
//     $query = mysqli_query($con, $sql);
//     if($query){
//         echo "success";
//     }
//     else{
//         echo "error"; 
//     }
//  }
//  else{
//     header('location.php');
//  }
    
    

}
?>
