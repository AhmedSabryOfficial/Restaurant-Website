<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restaurant Menu</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <?php
// Handle table reservation logic
if (isset($_POST['reserve'])) {
    // Process reservation form data (e.g., insert into database)
    $customerId = $_SESSION['user']['id']; // Assuming customer ID is stored in session
    $tableId = $_POST['table_id']; // Get table ID from form

    // Perform database insertion (replace with your database connection logic)
    // Example: Insert reservation data into 'Reservation' table
    require_once 'database.php'; // Include database connection file

    $sql = "INSERT INTO Reservation (Cx_ID, Table_ID, Reservation_Date)
            VALUES (?, ?, NOW())";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, 'ii', $customerId, $tableId);
    mysqli_stmt_execute($stmt);

    if (mysqli_stmt_affected_rows($stmt) > 0) {
        // Reservation successful
        echo "<script>alert('Table reserved successfully!');</script>";
    } else {
        // Reservation failed
        echo "<script>alert('Failed to reserve table. Please try again.');</script>";
    }

    mysqli_stmt_close($stmt);
    mysqli_close($conn);
}
?>

<!-- HTML reservation form -->
<form method="post">
    <label for="table_id">Select Table:</label>
    <select name="table_id" id="table_id">
        <option value="1">Table 1</option>
        <option value="2">Table 2</option>
        <!-- Add more table options as needed -->
    </select>
    <button type="submit" name="reserve">Reserve</button>
</form>

    <header id="header">
        <div class="logo">
            <i class="fas fa-utensils"></i>
            Restaurant
        </div>
        <nav class="navlist">
            <a href="#home" class="active">Home</a>
            <a href="#menu">Menu</a>
            <a href="#about">About</a>
            <a href="#contact">Contact</a>
        </nav>
        <div class="nav-icons">
            <i class="fas fa-shopping-cart"></i>
            <span id="cart-count">0</span>
        </div>
    </header>

    <section id="home" class="home">
        <div class="home-img">
            <img src="restaurant.jpg" alt="Restaurant Image">
        </div>
        <div class="home-text">
            <h1>Welcome to <span class="polka-dot">Restaurant</span></h1>
            <a href="#menu" class="btn">View Menu <i class="fas fa-arrow-down"></i></a>
        </div>
    </section>

    <section id="menu" class="container">
        <div class="container-box" data-item-id="1">
            <img src="spaghetti.jpg" alt="Spaghetti Bolognese">
            <h3>Spaghetti Bolognese</h3>
            <p>Classic Italian pasta with meat sauce</p>
            <button class="order-btn btn">Order Now <i class="fas fa-shopping-cart"></i></button>
        </div>
        <div class="container-box" data-item-id="2">
            <img src="salad.jpg" alt="Chicken Caesar Salad">
            <h3>Chicken Caesar Salad</h3>
            <p>Fresh romaine lettuce with grilled chicken and Caesar dressing</p>
            <button class="order-btn btn">Order Now <i class="fas fa-shopping-cart"></i></button>
        </div>
        <!-- Add more menu items as needed -->
    </section>

    <section id="about" class="about">
        <div class="about-img">
            <img src="chef.jpg" alt="Chef">
        </div>
        <div class="about-text">
            <h2>About Us</h2>
            <p>We are a renowned restaurant serving delicious meals with the finest ingredients. Visit us today!</p>
        </div>
    </section>

    <section id="reservation" class="reservation">
        <div class="reservation-text">
            <h2>Table Reservation</h2>
            <p>Reserve a table for your dining experience!</p>
            <button class="reserve-btn btn">Reserve Table</button>
        </div>
    </section>

    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <script src="javascripto.js"></script>
</body>
</html>
