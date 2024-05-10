<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restaurant Menu</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>


    <header id="header">
        <div class="logo">
            <i class="fas fa-utensils"></i>
            SHB3NY
        </div>
        <nav class="navlist">
            <a href="#home" class="active">Home</a>
            <a href="#menu">Menu</a>
            <a href="#about">About</a>
            <a href="#contact">Contact</a>
        </nav>
        <div class="nav-icons">
            <p>wlecome</p>
            <i class="fas fa-shopping-cart"></i>
            <span id="cart-count">0</span>
        </div>
    </header>

    <section id="home" class="home">
        <div class="home-img">
            <img src="restaurant.png" alt="Restaurant Image">
        </div>
        <div class="home-text">
            <h1>Welcome to <span class="polka-dot"> SHB3NY Restaurant</span></h1>
            <a href="#menu" class="btn">View Menu <i class="fas fa-arrow-down"></i></a>
        </div>
    </section>

    <section id="menu" class="container">
        <div class="container-box" data-item-id="1">
            <img src="pasta.jpg" alt="Spaghetti Bolognese">
            <h3>Spaghetti Bolognese</h3>
            <p>Classic Italian pasta with meat sauce</p>
            <p>12.99$</p>
            <button class="order-btn btn">Order Now <i class="fas fa-shopping-cart"></i></button>
        </div>
        <div class="container-box" data-item-id="2">
            <img src="salad.jpeg" alt="Chicken Caesar Salad">
            <h3>Chicken Caesar Salad</h3>
            <p>Fresh romaine lettuce with grilled chicken and Caesar dressing</p>
            <p>9.99$</p>
            <button class="order-btn btn">Order Now <i class="fas fa-shopping-cart"></i></button>
        </div>
        
        <div class="container-box" data-item-id="4">
            <img src="salmon.jpeg" alt="Grilled Salmon ">
            <h3>Grilled Salmon</h3>
            <p>Freshly grilled salmon fillet served with steamed vegetables </p>
            <p>17.99$</p>
            <button class="order-btn btn">Order Now <i class="fas fa-shopping-cart"></i></button>
        </div>
        <div class="container-box" data-item-id="3">
            <img src="pizza.jpg" alt=" Margherita Pizza " height="500px" >
            <h3>Margherita Pizza</h3>
            <p>Traditional Italian pizza with tomato sauce, mozzarella, and basil </p>
            <p>14.99$</p>
            <button class="order-btn btn">Order Now <i class="fas fa-shopping-cart"></i></button>
        </div>

    </section>
    <section id="reservation" class="reservation">
        <div class="reservation-text">
            <h2>Table Reservation</h2>
            <p>Reserve a table for your dining experience!</p>
            <button class="reserve-btn btn">Reserve Table</button>
        </div>
    </section>
    

    <section id="about" class="about">
        <div class="about-img">
            <img src="chief.png" alt="Chef">
        </div>
        <div class="about-text">
            <h2>About Us</h2>
            <p>We are a renowned restaurant serving delicious meals with the finest ingredients. Visit us today!</p>
        </div>
    </section>

    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <script src="javascripto.js"></script>
</body>
</html>
