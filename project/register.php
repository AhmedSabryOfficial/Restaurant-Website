<?php
session_start();
if (isset($_SESSION["user"])) {
   header("Location: index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <link rel="stylesheet" href="style.css">
    
</head>
<body>
<script>
       
    </script>
<?php


// Process form submission
if (isset($_POST["submit"])) {
 
   $fullName = $_POST["fullname"];
   $email = $_POST["email"];
   $password = $_POST["password"];
   $passwordRepeat = $_POST["repeat_password"];
   
   $passwordHash = password_hash($password, PASSWORD_DEFAULT);

   $errors = array();
   
   // Validate form inputs
   if (empty($fullName) || empty($email) || empty($password) || empty($passwordRepeat)) {
      array_push($errors, "All fields are required");
   }
   if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      array_push($errors, "Email is not valid");
   }
   if (strlen($password) < 8) {
      array_push($errors, "Password must be at least 8 characters long");
   }
   if ($password !== $passwordRepeat) {
      array_push($errors, "Passwords do not match");
   }
   
   // Check if email already exists in the database
   require_once "database.php"; // Include your database connection script
   $sql = "SELECT * FROM customer WHERE email = ?";
   $stmt = $conn->prepare($sql);
   $stmt->bind_param("s", $email);
   $stmt->execute();
   $result = $stmt->get_result();
   
   if ($result->num_rows > 0) {
      array_push($errors, "Email already exists");
   }

   // If no errors, insert user data into the database
   if (count($errors) === 0) {
      $sql = "INSERT INTO customer (cx_Name, email, password) VALUES (?, ?, ?)";
      $stmt = $conn->prepare($sql);
      $stmt->bind_param("sss", $fullName, $email, $passwordHash);
      
      if ($stmt->execute()) {
         echo "<div class='alert alert-success'>You are registered successfully.</div>";
      } else {
         echo "<div class='alert alert-danger'>Error registering user.</div>";
      }
   } else {
      // Display validation errors
      foreach ($errors as $error) {
         echo "<div class='alert alert-danger'>$error</div>";
      }
   }


}
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Registration Form</title>
   <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="c">
   <div class="i-c"></div>
   <form name="registrationForm" action="register.php" method="post" onsubmit="return validateForm22()" class="f">
      <div><h1>Registration Form</h1></div>
      <div class="b">
         <input type="text" class="i" name="fullname" placeholder="Full Name">
      </div>
      <div class="b">
         <input type="text" class="i" name="email" placeholder="Email">
      </div>
      <div class="b">
         <input type="password" class="i" name="password" placeholder="Password">
      </div>
      <div class="b">
         <input type="password" class="i" name="repeat_password" placeholder="Repeat Password">
      </div>
      <div class="b">
         <input type="submit" value="Register" name="submit" class="b">
      </div>
   </form>
   <div class="b">
   <p>Already Registered? <a href="login.php">Login Here</a></p>
</div>
</div>

</body>
</html>
