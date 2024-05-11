<?php
require_once 'database.php';
session_start();


  $sql = "SELECT * FROM menu";
  $all_product = $conn->query($sql);

  // Fetch all rows into an array for later use
  $results = mysqli_fetch_all($all_product, MYSQLI_ASSOC);;

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restaurant Menu</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
    <!--google fonts-->
    <link rel="preconnect" href="https://fonts.googleleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">
        <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <script src="javascripto.js"></script>
</head>
<body>


    <header id="header">
        <div class="logo">
        <a href="index.php" class="logo"><i class='bx bxs-bowl-hot'></i>SHB3NY</a>
        </div>
        <nav class="navlist">
            <a href="index.php">Home</a>
            <a href="#menu" class="active">Menu</a>
            <a href="#about">About Us</a>
            <a href="#contact">Contact</a>
        </nav>
        <div >
        <a href="logout.php"><p class="btn">Logout</p> </a>        
</div>
    </header>

    <section id="home" class="home">

        <div class="about-text">
            <h2>SHB3NY<span class="polka-dot"> Meals</span></h2>
               <p>
               WE OFFER LOAVES OF SHE WOLF BREAD FOR SALE 
MONDAY-FRIDAY, BEGINNING AT 5:00PM
& SATURDAY-SUNDAY BEGINNING AT 12:30PM. 
AVAILABLE WHILE SUPPLIES LAST
            </p>
            <a href="#menu" class="btn">View Menu <i class="fas fa-arrow-down"></i></a>
        </div>
    </section>



<?php
$categories = array("Breakfast", "Lunch", "Dinner", "Dessert", "Drinks");

foreach ($categories as $category) {
  echo "<section>";
  echo "<div class='about-text'>";
  echo "<h2>$category</h2>";
  echo "</div>";
  echo "</section>";
  echo "<section id='menu' class='container'>";
   
    // Loop through results to display items under each category
    foreach ($results as $row) {
        if ($row["Category"] == strtoupper($category)) {
?>
            <div class="container-box" data-item-id="1">
                <img src="<?php echo $row["IMG_path"]; ?>" alt="Spaghetti Bolognese">
                <h3><?php echo $row["item_Name"]; ?></h3>
                <p><?php echo $row["Description"]; ?></p>
                <p>$<?php echo $row["Price"]; ?></p>
            </div>
            
<?php
        }
    }

    echo "</section>";
}
?>

    
    <section id="reservation" class="reservation">
        <div class="reservation-text">
            <h2>Table Reservation</h2>
            <p>Reserve a table for your dining experience!</p>
            <a href="TableReservation.html" class="reserve-btn btn">Reserve Table</a>
        </div>
    </section>
    

    <section id="about" class="about">
        <div class="about-img">
            <img src="img/chief.png" alt="Chef">
        </div>
        <div class="about-text">
            <h2>About Us</h2>
            <p>We are a renowned restaurant serving delicious meals with the finest ingredients. Visit us today!</p>
        </div>
    </section>
    <section class="contact" id="contact">
      <div class="contact-content">
        <div class="contact-img">
          <div class="c-one">
            <!--destination for img name is f1.png-->
            <img src="img/f1.png" alt="" />
          </div>
          <div class="c-one">
            <!--destination for img name is f1.png-->
            <img src="img/f2.png" alt="" />
          </div>
        </div>

        <div class="contact-text">
          <h2>Contact Us</h2>
          <p>
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloribus,
            tenetur illo tempora praesentium nihil optio, impedit similique
            rerum distinctio minus ex repellendus iusto ab aspernatur deleniti
            at eaque nostrum ut.
          </p>
          <div class="social">
            <a href="#" class="clr"><img src="img/instagram-alt-logo-24.png" alt=""></i></a>
            <a href="#"><img src="img/facebook-logo-24.png" alt=""></a>
            <a href="#"><img src="img/google-logo-24.png" alt=""></a>
            <a href="#"><img src="img/twitter-logo-24.png" alt=""></a>
          </div>
        </div>

        <div class="details">
          <div class="main-d">
            <a href="#"><img src="img/location-plus-solid-24.png" alt="">Main street 65, ny, ny</a>
          </div>
          <div class="main-d">
            <a href="#"><img src="img/mobile-solid-24.png" alt="">01030901313</a>
          </div>
          <div class="main-d">
            <a href="#"><img src="img/bell-solid-24.png" alt="">Subscribe</a>
          </div>
        </div>
      </div>
    </section>






</body>
</html>
