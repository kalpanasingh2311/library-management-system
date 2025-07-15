<?php
// Database connection
require "connect.php";

// Get the search query from AJAX request
$query = $_POST['query'];
$query = "%{$query}%";
// Prepare the SQL statement to search for authors matching the query
// $sql = "SELECT distinct publisher FROM books WHERE publisher LIKE '%$query%' LIMIT 10";
// $result = $connection->query($sql);

    $sql=$connection->prepare("SELECT distinct publisher FROM books WHERE publisher LIKE ? LIMIT 10");
    $sql->bind_param("s", $query);
    $sql->execute();
    $result = $sql->get_result();

// Display the results
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<div class='pub'>" . $row['publisher'] . "</div>";
    }
} else {
    echo "<div>No results found</div>";
}

$connection->close();
?>
