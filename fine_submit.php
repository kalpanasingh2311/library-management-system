<?php
if(!isset($_SESSION))
{
    session_start();
}
if(isset($_SESSION['library']))
{
require "connect.php";

$enrollment= htmlentities(addslashes($_POST['enrollment']));
$paynow=htmlentities(addslashes($_POST['paynow']));


$sql = $connection->prepare("INSERT INTO finaclear (enrollment, paynow) VALUES (?, ? )");
    $sql->bind_param("ss", $enrollment, $paynow );

    if ($sql->execute()) {
        
        echo "success";
    } else {
        echo "Error: " . $sql->error;
    }
}
    

