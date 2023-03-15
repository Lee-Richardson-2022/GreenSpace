<?php

// Connect to database
$dbname = 'C:\xampp\htdocs\Relateable\RelateableDB.db';

$conn = new SQLite3($dbname);

if (!$conn) {
    die("Connection failed: " . $conn->lastErrorMsg());
}

// Get search query from form input
$q = $_GET['q'];

// Search for users in User table by first and last name
$sql = "SELECT * FROM User WHERE fname LIKE '%$q%' OR lname LIKE '%$q%'";
$result = $conn->query($sql);

// Display results on each user's profile page
if ($result->numColumns() > 0) {
    while($row = $result->fetchArray(SQLITE3_ASSOC)) {
        echo "<h2>" . $row['fname'] . " " . $row['lname'] . "</h2>";
        echo "<p>" . $row['description'] . "</p>";
        echo "<img src='" . $row['profile_picture'] . "' alt='Profile Picture'>";
        // add any other user information you want to display here
    }
} else {
    echo "No results found";
}

$conn->close();

?>