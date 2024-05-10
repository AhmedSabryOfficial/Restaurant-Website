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