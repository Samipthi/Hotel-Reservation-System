<!DOCTYPE html>
<html lang="en">

 <head>
<meta charset="UTF-8">

<meta http-equiv="X-UA-Compatible" content="IE=edge">

<meta name="viewport" content="width=device-width,initial-scale=1.0">
<title>Registration</title> 
<link rel="stylesheet" href="login.css">
<link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

</head>

 <body>

<div class="wrapper">
       <div class="form_wrapper register>
    <form action="registration.php" method="post">
    
    <h1>Register</h1>
    
    <div class="input-box">
    <input type="text" placeholder="Username" class="form-control" name="fullname" required>   
    <i class='bx bxs-user'></i>
    </div >

    <div class="input-box">
    <input type="text" class="form-control" name="email" placeholder="Email" required>
    <i class='bx bx-envelope'></i>
    </div>

    <div class="input-box">
    <input type="password" class="form-control" name="password" placeholder="Password" required>
    <i class='bx bx-lock-alt'></i>
    </div>

 
<button type="submit" class="btn" value="Register" name="submit">Register</button>
<div class="register-link">
    <p>Have an account?<a href="login.php" class="Register">Login</a></p>

</div> 

 </form>
 </div>  
 </div>
    
 </body>
    
</html>