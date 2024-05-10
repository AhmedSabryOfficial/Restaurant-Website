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
    <style>
        /* CSS for container */
        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            position: relative; /* Position relative for absolute positioning */
            text-align: center;
        }

        /* CSS for form */
        form {
            position: absolute;
            top: 50%; /* Position form vertically centered */
            left: 50%; /* Position form horizontally centered */
            transform: translate(-50%, -50%); /* Center form exactly */
            background-color: rgba(0, 0, 0, 0.1); /* Semi-transparent white background */
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Drop shadow */
        }

        /* CSS for form inputs */
        form input {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        /* CSS for submit button */
        form input[type="submit"] {
            width: auto; /* Adjust width as needed */
            cursor: pointer;
            background-color: royalblue;
            color: #fff;
            border: none;
            border-radius: 5px;
            padding: 10px 20px;
            font-size: 16px;
        }

        /* CSS for image container (background) */
        .image-container {
            background-image: url('fork.png');
            background-size: cover;
            background-position: center;
            height: 400px; /* Set desired height for the image container */
            margin-bottom: 20px;
            position: relative;
        }

        /* CSS for overlay text */
        .image-container h1 {
            color: #fff;
            font-size: 36px;
            margin-top: 0;
            padding-top: 100px; /* Adjust vertical padding to position text */
        }

        /* Responsive styles */
        @media (max-width: 768px) {
            .container {
                padding: 10px;
            }
            .image-container h1 {
                font-size: 24px;
            }
        }
    </style>
</head>
<body>
<script>
        function validateForm() {
            var fullName = document.forms["registrationForm"]["fullname"].value;
            var email = document.forms["registrationForm"]["email"].value;
            var password = document.forms["registrationForm"]["password"].value;
            var repeatPassword = document.forms["registrationForm"]["repeat_password"].value;
            
            if (fullName === "") {
                alert("Full Name must be filled out");
                return false;
            }
            if (email === "") {
                alert("Email must be filled out");
                return false;
            }
            if (!validateEmail(email)) {
                alert("Please enter a valid email address");
                return false;
            }
            if (password === "") {
                alert("Password must be filled out");
                return false;
            }
            if (password.length < 8) {
                alert("Password must be at least 8 characters long");
                return false;
            }
            if (repeatPassword === "") {
                alert("Repeat Password must be filled out");
                return false;
            }
            if (password !== repeatPassword) {
                alert("Passwords do not match");
                return false;
            }
            return true;
        }

        function validateEmail(email) {
            var re = /\S+@\S+\.\S+/;
            return re.test(email);
        }
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
      $sql = "INSERT INTO customer (fullname, email, password) VALUES (?, ?, ?)";
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
<div class="container">
   <div class="image-container"></div>
   <form name="registrationForm" action="register.php" method="post" onsubmit="return validateForm()">
      <div><h1>Registration Form</h1></div>
      <div class="btn">
         <input type="text" class="form-control" name="fullname" placeholder="Full Name">
      </div>
      <div class="btn">
         <input type="text" class="form-control" name="email" placeholder="Email">
      </div>
      <div class="form-group">
         <input type="password" class="form-control" name="password" placeholder="Password">
      </div>
      <div class="btn">
         <input type="password" class="form-control" name="repeat_password" placeholder="Repeat Password">
      </div>
      <div class="btn">
         <input type="submit" value="Register" name="submit">
      </div>
   </form>
</div>
<div class="btn">
   <p>Already Registered? <a href="login.php">Login Here</a></p>
</div>
</body>
</html>
