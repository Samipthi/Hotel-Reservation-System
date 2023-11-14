<!-- initalization of the session-->
<?php
session_start();
if (isset($_SESSION["user"])) {
   header("Location: index.php");
}
?>
<!-- login and registration page-->
<!DOCTYPE html>

<html lang="en">

 <head>
<meta charset="UTF-8">

<meta http-equiv="X-UA-Compatible" content="IE=edge">

<meta name="viewport" content="width=device-width,initial-scale=1.0">

<title>Login</title> 
<link rel="stylesheet" href="login.css">
<link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

</head>

 <body>
 <div class="container">
        <?php
        if (isset($_POST["submit"])) {
           $username = $_POST["username"];
           $password = $_POST["password"];
         require_once("database.php");

            $sql = "SELECT * FROM user WHERE username = '$username'";
            $result = mysqli_query($conn, $sql);
            $user = mysqli_fetch_array($result, MYSQLI_ASSOC);
            if ($user) {
                if (password_verify($password, $user["password"])) {
                    session_start();
                    $_SESSION["user"] = "yes";
                    header("Location: index.php");
                    die();
                }else{
                    echo "<div class='alert alert-danger'>Password does not match</div>";
                }
            }else{
                echo "<div class='alert alert-danger'>Username does not match</div>";
            }
        }
        ?>

<div class="wrapper"> <!-- wrappers both login and registration together-->
   <!--login-->
     <div class="form-wrapper login">   
    <form action="login.php" method="post">
    
    <h1>Login</h1>
    
    <div class="input-box">
    <input type="text" placeholder="Username" class="form-control" name="username" required>   
    <i class='bx bxs-user'></i>
    </div>
    
    <div class="input-box">
    <input type="password" class="form-control" name="password" placeholder="Password" required>
    <i class='bx bx-lock-alt'></i>
   </div>

<div class="remember-forgot">
<label><input type="checkbox"> Remember me</label>
<a href="#">Forgot password?</a>
</div>

<button type="submit" class="btn" value="Register" name="submit">Login</button>
<div class="registerb">
    <p>Don't have an account?<a href="registration.php" class="register">Register</a></p>
</div>   

 </form>
 </div> 
 </div>

 <!--javasrcipt file-->
 <script src="login.js"></script>
    
 </body>
    
</html>
