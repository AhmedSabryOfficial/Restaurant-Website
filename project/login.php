<?php
session_start(); // Start the session at the beginning

if (isset($_POST["login"])) {
    $email = $_POST["email"];
    $password = $_POST["password"];
    
    require_once "database.php"; // Include your database connection

    $sql = "SELECT * FROM customer WHERE Email = '$email'";
    $result = mysqli_query($conn, $sql);
    $user = mysqli_fetch_array($result, MYSQLI_ASSOC);

    if ($user) {
        if (password_verify($password, $user["password"])) {
            // Store user data in session variables
            $_SESSION["user_id"] = $user["cxID"];
            $_SESSION["user_name"] = $user["cx_Name"];
            header("Location: index.php");
            exit(); // Use exit instead of die()
        } else {
            echo "<div class='alert alert-danger'>Password does not match</div>";
        }
    } else {
        echo "<div class='alert alert-danger'>Email does not match</div>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <link rel="stylesheet" href="style.css">
   
</head>
<body>
    <div class="container">
        <div class="image-container">
            <form name="loginForm" action="login.php" method="post" onsubmit="return validateForm()">
                <h1 style="background-color">Login Form</h1>
                <input type="email" placeholder="Enter Email:" name="email" class="form-control">
                <input type="password" placeholder="Enter Password:" name="password" class="form-control">
                <input type="submit" value="Login" name="login" class="btn btn-primary">
            </form>
        </div>

        <div><p>Not registered yet <a href="register.php">Register Here</a></p></div>
        <div><p>Admin? <a href="admin.php">Click Here</a></p></div>

    </div>
    <script>
        function validateForm() {
            var email = document.forms["loginForm"]["email"].value;
            var password = document.forms["loginForm"]["password"].value;
            
            if (email == "") {
                alert("Email must be filled out");
                return false;
            }
            if (password == "") {
                alert("Password must be filled out");
                return false;
            }
            return true;
        } 
    </script>
</body>
</html>
