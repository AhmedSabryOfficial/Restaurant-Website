<?php
// Check if TableID is provided via POST
if (isset($_POST['TableID'])) {
    // Get the TableID from POST data
    $ID = $_POST['TableID'];

    // Include your database connection
    require_once "database.php";

    // Prepare and execute the DELETE query
    $sql = "DELETE FROM `Table` WHERE TableID = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "i", $ID);
    
    if (mysqli_stmt_execute($stmt)) {
        echo "Table deleted successfully!";
    } else {
        echo "Error: Unable to delete the table.";
    }

    mysqli_close($conn);
} else {
    echo "Error: TableID not provided.";
}
?>
