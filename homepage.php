<?php
session_start();
if (isset($_SESSION["user"])) {
   header("Location: login.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="home-page.css">
    <title>Hotel Room Booking</title>
</head>

<body>
    <div class="navbar-container">
        <div class="navbar-navbar">
            <div class="navbar-logo">
                <img src="pics\logo.png" alt="Logo">
            </div>
            <div class="navbar-links">
                <span class="navbar-text"><span>Home</span></span>
                <span class="navbar-text"><span>Explore</span></span>
                <span class="navbar-text"><span>Rooms<a href="login.php"></span></span>
                <span class="navbar-text"><span>About</span></span>
                <span class="navbar-text"><span>Contact</span></span>
            </div>
            <div class="navbar-btn">
                <span class="navbar-text"><a href="login.php">Login</a></span>
            </div>
        </div>
    </div>
    
    <header>
        <h1>Explore Our Rooms</h1>
        <p>Your perfect stay is just a click away</p>
    </header>

    <section class="booking-section">
        <h2>Book Your Room Now</h2>
        <p>Discover comfort and luxury in our spacious rooms</p>
        <!-- Add your room booking form or any other content here -->
    </section>

    <footer>
        <p>&copy; 2023 Hotel Room Booking</p>
    </footer>
</body>

</html>
