<?php
session_start(); 



// Include your database connection
require_once "database.php";

// Get reservation data from POST
$date = $_POST['date'];
$chosenStartTime = $_POST['start_time'];
$chosenEndTime = $_POST['end_time'];
$chairs = $_POST['chairs'];



// Retrieve user ID from session
$cxID = $_SESSION['user_id'];

// Prepare and bind parameters for the first query
$query = "SELECT COUNT(*) AS availableTables
          FROM Reservation
          WHERE Reservation_Date = ? 
          AND StartTime = ?";
$stmt = mysqli_prepare($conn, $query);
mysqli_stmt_bind_param($stmt, "ss", $date, $chosenStartTime);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

if ($result) {
    $row = mysqli_fetch_assoc($result);
    $availableTables = $row['availableTables'];

    // Get total tables count
    $totalTablesQuery = "SELECT COUNT(*) AS totalTables FROM `Table`";
    $totalTablesResult = mysqli_query($conn, $totalTablesQuery);
    $totalTablesRow = mysqli_fetch_assoc($totalTablesResult);
    $totalTables = $totalTablesRow['totalTables'];

    if ($availableTables == $totalTables) {
        echo "Sorry, all tables are reserved at the specified time.";
    } else {
        // Reserve the first available table
        $reserveQuery = "SELECT TableID FROM `Table` LIMIT 1";
        $reserveResult = mysqli_query($conn, $reserveQuery);
        $reserveRow = mysqli_fetch_assoc($reserveResult);
        $tableID = $reserveRow['TableID'];

        // Insert the new reservation using prepared statement
        $insertQuery = "INSERT INTO Reservation (Cx_ID, Table_ID, Reservation_Date, StartTime, EndTime) 
                        VALUES (?, ?, ?, ?, ?)";
        $insertStmt = mysqli_prepare($conn, $insertQuery);
        mysqli_stmt_bind_param($insertStmt, "iisss", $cxID, $tableID, $date, $chosenStartTime, $chosenEndTime);
        mysqli_stmt_execute($insertStmt);

        // Update the table's isReserved value to 1
        $updateQuery = "UPDATE `Table` SET isReserved = 1 WHERE TableID = ?";
        $updateStmt = mysqli_prepare($conn, $updateQuery);
        mysqli_stmt_bind_param($updateStmt, "i", $tableID);
        mysqli_stmt_execute($updateStmt);

        echo "Table reserved successfully!";
    }
} else {
    echo "Error in checking table availability.";
}

mysqli_close($conn);

// Function to validate date and time format
function isValidDateTime($date, $startTime, $endTime) {
    return (bool)strtotime($date) && (bool)strtotime($startTime) && (bool)strtotime($endTime);
}
?>