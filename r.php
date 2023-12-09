<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="r.css">
    <title>Paradise</title>
</head>
<body>

<header class="header">
    <div class="navbar-container">
        <div class="navbar-navbar">
            <div class="navbar-logo">
    <div class="logo">
        <img src="logo.png" alt="Logo">
    </div>
    <nav class="navbar">
        <ul>
            <li><a href="homepage.php">Home</a></li>
            <li><a href="#">Explore</a></li>
            <li><a href="r.html">Rooms</a></li>
            <li><a href="#">About</a></li>
            <li><a href="#">Contact</a></li>
            <li><a href="login.php">Login</a></li>
        </ul>
    </nav>
    </div>
    </div>
    </div>
</header>

<main class="container">
    <section class="hero">
        <h1>Welcome to Paradise</h1>
    </section>

    <section class="room-container" id="singleRoom">
        <img src="single-room.jpg" alt="Single Room Image">
        <div class="details">
            <h2>Single Room</h2>
            <button onclick="checkAvailability('single')">Check Availability</button>
            <p class="availabilityResult" id="availabilityResultSingle"></p>
            <p class="room-price" id="roomPriceSingle">Select room type to see the price.</p>
            <button class="reserve-btn" onclick="reserveNow('single')">Reserve Now</button>
        </div>
    </section>

    <section class="room-container" id="doubleRoom">
        <img src="double-room.jpg" alt="Double Room Image">
        <div class="details">
            <h2>Double Room</h2>
            <button onclick="checkAvailability('double')">Check Availability</button>
            <p class="availabilityResult" id="availabilityResultDouble"></p>
            <p class="room-price" id="roomPriceDouble">Select room type to see the price.</p>
            <button class="reserve-btn" onclick="reserveNow('double')">Reserve Now</button>
        </div>
    </section>

    <section class="room-container" id="suiteRoom">
        <img src="suite-room.jpg" alt="Suite Image">
        <div class="details">
            <h2>Suite</h2>
            <button onclick="checkAvailability('suite')">Check Availability</button>
            <p class="availabilityResult" id="availabilityResultSuite"></p>
            <p class="room-price" id="roomPriceSuite">Select room type to see the price.</p>
            <button class="reserve-btn" onclick="reserveNow('suite')">Reserve Now</button>
        </div>
    </section>
</main>

    <footer>
        <button type="submit"><a href="booking.php">Reserve Now</a></button>
    </footer>
</div>

<script src="script.js"></script>
</body>
</html>
