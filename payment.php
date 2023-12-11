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
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<!-- aos animation -->
<link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
<!-- loading bar -->
<script src="https://cdn.jsdelivr.net/npm/pace-js@latest/pace.min.js"></script>
<link rel="stylesheet" href="./css/flash.css">
    <!-- Include jspdf library -->
    
</head>
<?php
  // Include your database connection file
   
   if (isset($_POST['payment'])) {
       $username = $_POST["username"];
       $email = $_POST["email"];
       $roomtype = $_POST["roomType"];
       $checkin = $_POST["check-InDate"];
       $checkout = $_POST["check-OutDate"];
       $mode = $_POST["mode"];
   
       // Step 1: Fetch user ID based on email and username
       $userQuery = "SELECT id FROM user WHERE email = '$email' AND username = '$username'";
       $userResult = mysqli_query($conn, $userQuery);
   
       if ($userResult) {
           if ($userResult->num_rows > 0) {
               $userRow = $userResult->fetch_assoc();
               $userId = $userRow['id'];
   
               // Step 2: Fetch room number based on room type
               $roomQuery = "SELECT room_no,price FROM room WHERE room_type = '$roomtype'";
               $roomResult = mysqli_query($conn, $roomQuery);
                
               if ($roomResult->num_rows > 0) {
                   $roomRow = $roomResult->fetch_assoc();
                   $roomNo = $roomRow['room_no'];
                   $price = $roomRow['price'];
   
                   // Step 3: Insert data into the booking table
                   $bookingQuery = "INSERT INTO booking (check_InDate, check_OutDate, user_id, room_no) VALUES ('$checkin', '$checkout', '$userId', '$roomNo')";
                   $bookingResult = mysqli_query($conn, $bookingQuery);
   
                   if ($bookingResult) {
                       $bookingId = mysqli_insert_id($conn);
                       $checkin = new DateTime($checkin);
                       $checkout = new DateTime($checkout);
                       
                       $interval = $checkin->diff($checkout);
                       $numberOfDays = $interval->days;
                       $total= $price*$numberOfDays;
                       // Step 4: Insert data into the payment table
                       $paymentQuery = "INSERT INTO payment (pay_Method, pay_Date, amount,user_id, booking_id) VALUES ('$mode', NOW(), '$total','$userId', '$bookingId')";
                       $paymentResult = mysqli_query($conn, $paymentQuery);
   
                       if ($paymentResult) {
                           echo "Booking and payment records inserted successfully.";
                           header("Location: home.php");
                       } else {
                           echo "Error inserting payment record: " . mysqli_error($conn);
                       }
                   } else {
                       echo "Error inserting booking record: " . mysqli_error($conn);
                   }
               } else {
                   echo "Room not found for the specified room type.";
               }
           } else {
               echo "User not found for the specified email and username.";
           }
       } else {
           echo "Error executing user query: " . mysqli_error($conn);
       }
   }
   
    ?>
<body>
    <header>
        <div class="container">
            <div class="left">
                <h3>BILLING ADDRESS</h3>
                <form method="post" action="">
                    Full name
                    <input type="text" name="username" placeholder="Enter name">
                    Email
                    <input type="text" name="email" placeholder="Enter email">

                
                  <!-- New section for room type -->
                    Room Type<br>
                    <label>
                        <input type="radio" name="roomType" value="Standard Room" onchange="displayPrice()"> Standard Room
                    </label>
<br>
                    <label>
                        <input type="radio" name="roomType" value="Deluxe Room" onchange="displayPrice()"> Deluxe Room
                    </label>

<br>                    <label>
                        <input type="radio" name="roomType" value="Family Suite" onchange="displayPrice()"> Family Suite
                    </label>
<br>
                    <label>
                        <input type="radio" name="roomType" value="Executive Penthouse" onchange="displayPrice()"> Executive Penthouse
                    </label>
<br><br>

                    Check-InDate
                    <input type="date" name="check-InDate" placeholder="date">
                    <br><br>
                    Check-OutDate
                    <input type="date" name="check-OutDate" placeholder="date"><br>
                    
                
            <div class="right">
                <h3>PAYMENT</h3>
                
                    Accepted Card <br>
                    <img src="image/card1.png" width="100">
                    <img src="image/card2.png" width="50">
                    <br><br>

                    Mode(gpay,card)
                    <input type="text" name="mode" placeholder="Enter mode">
                    <!-- Display the price dynamically based on the selected room type -->
                     <div id="priceDisplay">Price: $99 per night</div> <!-- Default price for Standard Room -->
                   
                    <input type="submit" name="payment" value="payment" id="checkoutBtn">
    
                </form>
               
            </div>
        </div>
</div>
    </header>
    <!-- php code -->
  



    <!-- Include your payment.js after jspdf -->
    <script src="./js/payment.js"></script>
	
</body>
</html>
