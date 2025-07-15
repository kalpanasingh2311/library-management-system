<?php
// Database connection
require "connect.php";

// Get the search query from AJAX request
$query = $_POST['query'];
$query = "%{$query}%"; 

// Prepare the SQL statement to search for authors matching the query
// $sql = "SELECT distinct author FROM books WHERE author LIKE '%$query%' LIMIT 10";
// $result = $connection->query($sql);


$sql = $connection->prepare("SELECT DISTINCT author FROM books WHERE author LIKE ? LIMIT 10");
    $sql->bind_param("s", $query);
    $sql->execute();
    $result = $sql->get_result();


    // $row=$result->fetch_array();
// Display the results
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<div class='aut'>" . $row['author'] . "</div>";
    }
} else {
    echo "<div>No results found</div>";
}

$connection->close();
?>
