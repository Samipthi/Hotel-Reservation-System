<?php

include 'config.php';
session_start();

// page redirect
$usermail="";
$usermail=$_SESSION['usermail'];
if($usermail == true){

}else{
  header("location: index.php");
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Payment</title>
    <link rel="stylesheet" type="text/css" href="css/payment.css">
    <!-- Include jspdf library -->
    
</head>
<body>
    <header>
        <div class="container">
            <div class="left">
                <h3>BILLING ADDRESS</h3>
                <form>
                    Full name
                    <input type="text" name="username" placeholder="Enter name">
                    Email
                    <input type="text" name="email" placeholder="Enter email">

                
                  <!-- New section for room type -->
                    Room Type
                    <select id="roomType" onchange="displayPrice()">
                        <option value="standard">Standard Room</option>
                        <option value="deluxe">Deluxe Suite</option>
                        <option value="family">Family Suite</option>
                        <option value="executive">Executive Penthouse</option>
                    </select>

                    Check-InDate
                    <input type="date" name="check-InDate" placeholder="date">
                    <br><br>
                    Check-OutDate
                    <input type="date" name="check-OutDate" placeholder="date">
                </form>
            </div>
            <div class="right">
                <h3>PAYMENT</h3>
                <form>
                    Accepted Card <br>
                    <img src="image/card1.png" width="100">
                    <img src="image/card2.png" width="50">
                    <br><br>

                    Credit card number
                    <input type="text" name="cardNumber" placeholder="Enter card number">
                    
                    Exp month
                    <input type="text" name="expMonth" placeholder="Enter Month">
                    <div id="zip">
                        <label>
                            Exp year
                            <select name="expYear">
                                <option>Choose Year..</option>
                                <option>2022</option>
                                <option>2023</option>
                                <option>2024</option>
                                <option>2025</option>
                            </select>
                        </label>
                        <label>
                            CVV
                            <input type="number" name="cvv" placeholder="CVV">
                        </label>
                    </div>

                    <!-- Display the price dynamically based on the selected room type -->
                    <div id="priceDisplay">
                        Price: $99 per night <!-- Default price for Standard Room -->
                    </div>
                </form>
                <input type="submit" name="" value="Proceed to Checkout" id="checkoutBtn">
            </div>
        </div>
    </header>
    <!-- Include your payment.js after jspdf -->
	
</body>
</html>
