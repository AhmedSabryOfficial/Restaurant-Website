<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Control</title>
</head>
<body>
    <p>Add a Dish</p>
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

</html>