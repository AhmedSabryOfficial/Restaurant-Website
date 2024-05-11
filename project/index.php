
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
    <title>Restaurant</title>
    <link rel="stylesheet" href="style.css">
    <!--box icons-->
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
    <!--google fonts-->
    <link rel="preconnect" href="https://fonts.googleleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">
        <script src="javascripto.js"></script>

</head>

<body>
    <header>
        <a href="index.php" class="logo"><i class='bx bxs-bowl-hot'></i>SHB3NY</a>
        <ul class="navlist">
            <li><a href="#home" class="active">Home</a></li>
            <li><a href="order.php">Menu</a></li>
            <li><a href="#about">About Us</a></li>
            <li><a href="#contact">Contact</a></li>
        </ul>

        <div >
        <a href="logout.php"><p class="btn">Logout</p> </a>        
</div>
    </header>

    <!--home-->
    <section class="home" id="home">
        <div class="home-text">
            <h1>Meet, <span>Eat &</span> <br /> Enjoy The true <br /> <span class="polka-dot">taste</span></h1>
            <a href="order.php" class="btn">Explore Menu<i class='bx bxs-right-arrow'></i></a>
            <!--<a href="#" class="btn2">Order Now</a>-->
        </div>


        <div class="home-img">
            <img src="img/plate.png">
        </div>
    </section>
    <!--container-->
    <section class="container">
        <div class="container-box">
            <img src="img/clock.png">
            <h3>11:00 am - 8:00 pm</h3>
            <a href="#">Working Hours</a>
        </div>

        <div class="container-box">
            <img src="img/location.png">
            <h3>The Pyramids Road</h3>
            <a href="#">Our Location</a>
        </div>

        <div class="container-box">
            <img src="img/telephone.png">
            <h3>(20) 123-88773001</h3>
            <a href="#">Call Us Now</a>
        </div>
    </section>
    <!---our menu-->
    <section class="shop" id="shop">
        <div class="middle-text">
            <h4>Our Menu</h4>
            <h2>LET'S CHECK OUR POPULAR DISHES</h2>
        </div>
<div class = "shop-content">



        <?php

    // Loop through results to display items under each category
    foreach ($results as $row) {
        if($row["isPopular"]=="1"){
?>

            <div class="row" data-item-id="1">
                <img src="<?php echo $row["IMG_path"]; ?>" alt="Spaghetti Bolognese">
                <h3><?php echo $row["item_Name"]; ?></h3>
                <p><?php echo $row["Description"]; ?></p>
                <p>$<?php echo $row["Price"]; ?></p>
            </div>
            
<?php
    }
    }
?>

</div>


        <div class="row-btn">
            <a href="order.php" class="btn">All Food<i class='bx bxs-right-arrow'></i></a>
            </div>
            </section>
     
    <!--about us-->
    <section class="about" id="about">
        <div class="about-img">
            <img src="img/burger.png">
        </div>

        <div class="about-text">
            <h2>Living well begins <br> with eating well.</h2>
            <p>
                this is kalam you write kalam over here so we can adjust it later
                maybe when abdalrahman take the files to write some about us we dont know
                ,anyway , dont forget to exalt the mention of Muhammad alieh al salat wa al salam, at the end, in my
                opinion <br> pizza is delicious.
            </p>
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