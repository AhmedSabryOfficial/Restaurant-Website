<?php
if (isset($_POST["add"])) {
    $item_Name = $_POST["item_Name"];
    $Description = $_POST["Description"];
    $Price = $_POST["Price"];
    $Category = $_POST["Category"];

    $img = $_FILES["img"]["name"];
    $img_tmp = $_FILES["img"]["tmp_name"];
    $upload_dir = "uploads/"; 
    $targetFile = $upload_dir . basename($_FILES["img"]["name"]);

    if (move_uploaded_file($img_tmp, $upload_dir . $img)) {
        require_once "database.php";

        $sql = "INSERT INTO menu (item_Name, Description, Price, Category, IMG_path) VALUES (?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssss", $item_Name, $Description, $Price,$Category, $targetFile);

        if ($stmt->execute()) {
            echo "<div class='alert alert-success'>Dish added successfully.</div>";
        } else {
            echo "<div class='alert alert-danger'>Error adding dish.</div>";
        }
    } else {
        echo "<div class='alert alert-danger'>Error uploading file.</div>";
    }
}
?>
