<?php

// Include your database connection
require_once "database.php";

$chairs_count = $_POST['chairs_count'];

// Prepare and execute SQL statement to insert into the database
$stmt = $conn->prepare("INSERT INTO `Table` (chairs_count) VALUES (?)");
$stmt->bind_param("i", $chairs_count);

if ($stmt->execute() === TRUE) {
    echo "New table added successfully";
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();

mysqli_close($conn);
?>
