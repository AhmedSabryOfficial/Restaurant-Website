<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
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
    <div class="container">
        <div class="image-container">
            <form name="loginForm" action="login.php" method="post" onsubmit="return validateForm()" >
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
    <?php
        if (isset($_POST["login"])) {
           $email = $_POST["email"];
           $password = $_POST["password"];
            require_once "database.php";
            $sql = "SELECT * FROM customer WHERE Email = '$email'";
            $result = mysqli_query($conn, $sql);
            $user = mysqli_fetch_array($result, MYSQLI_ASSOC);
            if ($user) {
                if (password_verify($password, $user["password"])) {
                    session_start();
                    $_SESSION["user"] = "yes";
                    header("Location: index.php");
                    die();
                } else {
                    echo "<div class='alert alert-danger'>Password does not match</div>";
                }
            } else {
                echo "<div class='alert alert-danger'>Email does not match</div>";
            }
        }
        ?>
</body>
</html>
