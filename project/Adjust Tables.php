
<?php

// Include your database connection
require_once "database.php";

$sql = "SELECT * FROM `Table`";
$result = mysqli_query($conn, $sql);

$options = "";
while ($row = mysqli_fetch_assoc($result)) {
    $options .= "<option value='{$row['TableID']}'> {$row['TableID']}</option>";
}

mysqli_close($conn);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Table</title>
</head>
<body>
    <h1>Add Table</h1>
    <form action="addTable.php" method="POST">
        <label for="chairs_count">Chairs Count:</label>
        <input type="number" id="chairs_count" name="chairs_count" required>
        <button type="submit">Add Table</button>
    </form><br><br>
    <h2>Remove Table</h2>
    <!-- Corrected form structure -->
    <form action="RemoveTable.php" method="POST">
        <label for="TableID">Choose Table ID</label>
        <select name="TableID" id="TableID">
            <?php echo $options; ?>
        </select>
        <input type="submit" name="submit-btn" value="Remove Table">
    </form>
</body>
</html>