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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="home-page.css">
    <title>User Dashboard</title>
</head>

<body>
    <div class="navbar-container">
        <div class="navbar-navbar">
            <div class="navbar-logo">
                <img src="logo.png" alt="Logo">
            </div>
            <div class="navbar-links">
                <span class="navbar-text"><span>Home</span></span>
                <span class="navbar-text"><span>Explore</span></span>
                <span class="navbar-text"><span><a href="r.html">Rooms</a></span></span>
                <span class="navbar-text"><span>About</span></span>
                <span class="navbar-text"><span>Contact</span></span>
            </div>
            <div class="navbar-btn">
                <span class="navbar-text" ><a href="logot.php" >Logout</a></span>
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
        
   