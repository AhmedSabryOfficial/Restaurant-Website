

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
    <title>Control</title>
</head>
<body>
    <h1>Add a Dish</h1>
    <form action="addDish.php"  method="POST" enctype="multipart/form-data">
    <input type="text" placeholder="Item Name" name="item_Name" class="form-control">
    <input type="text" placeholder="Description" name="Description" class="form-control">
    <input type="number" placeholder="Price" name="Price" class="form-control">

    <select name="Popularity" id="Popularity" placeholder="Popularity">
    <option value="undefined" selected>Select</option>
    <option value="1">Popular</option>
    <option value="0">Not Popular</option>
    </select>


<select name="Category" id="Category" placeholder="Category">
<option value="undefined" selected>Select Category</option>
  <option value="DINNER">DINNER</option>
  <option value="LUNCH">LUNCH</option>
  <option value="BREAKFAST">BREAKFAST</option>
  <option value="DRINKS">DRINKS</option>
  <option value="DESSERT">DESSERT</option>
</select>
    <input type="file" name="img">
    <input type="submit" value="Add" name="add" class="btn btn-primary"></body>
    </form>

    <h1>Add a Table</h1>
    <form action="addTable.php" method="POST">
        <label for="chairs_count">Chairs Count:</label>
        <input type="number" id="chairs_count" name="chairs_count" required>
        <button type="submit">Add Table</button>
    </form>
</html>