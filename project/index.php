<?php
session_start();
if (!isset($_SESSION["user"])) {
   header("Location: login.php");
   
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style2.css">
</head>
<body>
   
    <div class="container">
      
        <a href="logout.php" >Logout</a>
    </div>
</body>
</html>