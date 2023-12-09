<!-- initalization of the session-->

<!-- login and registration page-->
<!DOCTYPE html>

<html lang="en">

 <head>
<meta charset="UTF-8">

<meta http-equiv="X-UA-Compatible" content="IE=edge">

<meta name="viewport" content="width=device-width,initial-scale=1.0">

<title>Login</title> 
<link rel="stylesheet" href="">
<link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

</head>

 <body class="bd">
 <div class="container">
      
<div class="wrapper"> <!-- wrappers both login and registration together-->
   <!--login-->
     <div class="form-wrapper login">   
    <form action="login.php" method="post">
    
    <h1>Book Now!</h1>
    
    <div class="input-box">
    <input type="text" placeholder="Username" class="form-control" name="username" required>   
    <i class='bx bxs-user'></i>
    </div>
     
    <div class="input-box">
    <input type="email" class="form-control" name="email" placeholder="Email" required>
    <i class='bx bx-envelope'></i>
    </div>

<div class="input-box">
    <select name="RoomType" class="selectinput">
						<option value selected >Type Of Room</option>
                        <option value="suite">suite</option>
                        <option value="double-oom">double-room</option>
						<option value="single-room">single-room</option>
                    </select>
   </div>
   <div class="input-box">
    <input type="date" placeholder="checkIn-Date" class="form-control" name="checkIn-Date" required>   
    <i class='bx bxs-user'></i>
    </div>

    <div class="input-box">
    <input type="date" placeholder="checkOut-Date" class="form-control" name="checkOut-Date" required>   
    <i class='bx bxs-user'></i>
    </div>

    <div class="input-box">
    <input type="password" class="form-control" name="password" placeholder="Password" required>
    <i class='bx bx-lock-alt'></i>
   </div>



<button type="submit" class="btn" value="Register" name="submit">Pay Now</button>
  

 </form>
 </div> 
 </div>

 <!--javasrcipt file-->
 <script src="login.js"></script>
    
 </body>
    
</html>
