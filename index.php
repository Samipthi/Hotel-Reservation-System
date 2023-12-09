<?php
include 'config.php';
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width,initial-scale=1.0">
<link rel="stylesheet" href="./css/login.css">
<link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

<!-- sweet alert -->
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<!-- aos animation -->
<link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
<!-- loading bar -->
<script src="https://cdn.jsdelivr.net/npm/pace-js@latest/pace.min.js"></script>
<link rel="stylesheet" href="./css/flash.css">
<title>Paradise</title> 
</head>

<body>

<section id="carouselExampleControls" class="carousel slide carousel_section" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="carousel-image" src="./image/hotel1.jpg">
            </div>
            <div class="carousel-item">
                <img class="carousel-image" src="./image/hotel2.jpg">
            </div>
            <div class="carousel-item">
                <img class="carousel-image" src="./image/hotel3.jpg">
            </div>
            <div class="carousel-item">
                <img class="carousel-image" src="./image/hotel4.jpg">
            </div>
        </div>
    </section>

<section id="auth_section">
<div class="auth_container"> <!-- wrappers both login and registration together-->
   <!--login-->
   
   <div id="Log_in">
   <h1>Login</h1>
     
     <div class="role_btn">
                    <div class="btns active">User</div>
                    <div class="btns">Staff</div>
                </div>
 
    <?php
    if(isset($_POST['user_login_submit'])) {
        $username = $_POST["username"];
        $password = $_POST["password"];

         $sql = "SELECT * FROM user WHERE username = '$username'";
         $result = mysqli_query($conn, $sql);

         if ($result->num_rows > 0) {
             $_SESSION['usermail']=$username;
             $username = "";
             $password = "";
             header("Location: home.php");
         } else {
             echo "<script>swal({
                 title: 'Something went wrong',
                 icon: 'error',
             });
             </script>";
         }
                    }
                  
     ?>


          <form class="user_login authsection active" id="userlogin" action="" method="POST">
                    <div class="form-floating">
                        <input type="text" class="form-control" name="username" placeholder=" ">
                        <label for="Username">Username</label>
                    </div>
                    
                    <div class="form-floating">
                        <input type="password" class="form-control" name="password" placeholder=" ">
                        <label for="Password">Password</label>
                    </div>
                    <button type="submit" name="user_login_submit" class="auth_btn">Log in</button>

                    <div class="footer_line">
                        <h6>Don't have an account? <span class="page_move_btn" onclick="signuppage()">sign up</span></h6>
                    </div>
                </form>

  <!-- == Emp Login == -->
  <?php              
                    if (isset($_POST['Emp_login_submit'])) {
                        $Email = $_POST['Emp_Email'];
                        $Password = $_POST['Emp_Password'];

                        $sql = "SELECT * FROM emp_login WHERE Emp_Email = '$Email' AND Emp_Password = BINARY'$Password'";
                        $result = mysqli_query($conn, $sql);

                        if ($result->num_rows > 0) {
                            $_SESSION['usermail']=$Email;
                            $Email = "";
                            $Password = "";
                            header("Location: admin/admin.php");
                        } else {
                            echo "<script>swal({
                                title: 'Something went wrong',
                                icon: 'error',
                            });
                            </script>";
                        }
                    }
                ?> 
               
    <form action="" method="POST" class="employee_login authsection" id="employeelogin">
   
    <div class="input-box">
    <input type="email" class="form-control" name="email" placeholder="Email" required>
    <i class='bx bx-envelope'></i>
    </div>
    
    <div class="input-box">
    <input type="password" class="form-control" name="password" placeholder="Password" required>
    <i class='bx bx-lock-alt'></i>
   </div>

<div class="remember-forgot">
<label><input type="checkbox"> Remember me</label>
<a href="#">Forgot password?</a>
</div>

<button type="submit" class="auth_btn" name="Emp_login_submit" value="Register" >Login</button>
  
 </form>             
</div>

</div>
<!--============ signup =============-->


<?php
if (isset($_POST['user_signup_submit'])) {
        $username = $_POST["username"];
        $email = $_POST["email"];
        $password = $_POST["password"];
        $cpass= $_POST["cpass"];
    
        if($username == "" || $email == "" || $password == ""){
            echo "<script>swal({
                title: 'Fill the proper details',
                icon: 'error',
            });
            </script>";
        }
        else{
            if ($password == $cpass) {
                $sql = "SELECT * FROM user WHERE username = '$username'";
                $result = mysqli_query($conn, $sql);

                if ($result->num_rows > 0) {
                    echo "<script>swal({
                        title: 'username already exits',
                        icon: 'error',
                    });
                    </script>";
                } else {
                    $sql = "INSERT INTO user (username,email,password) VALUES ('$username', '$email', '$password')";
                    $result = mysqli_query($conn, $sql);

                    if ($result) {
                        $_SESSION['usermail']=$username;
                        $username = "";
                        $email = "";
                        $password = "";
                        $cpass="";
                        header("Location: home.php");
                    } else {
                        echo "<script>swal({
                            title: 'Something went wrong',
                            icon: 'error',
                        });
                        </script>";
                    }
                }
            } else {
                echo "<script>swal({
                    title: 'Password does not matched',
                    icon: 'error',
                });
                </script>";
            }
        }
        
    }
?>
<div id="sign_up">
                <h2>Sign Up</h2>

                <form class="user_signup" id="usersignup" action="" method="POST">
                    <div class="form-floating">
                        <input type="text" class="form-control" name="username" placeholder=" ">
                        <label for="Username">Username</label>
                    </div>
                    <div class="form-floating">
                        <input type="email" class="form-control" name="email" placeholder=" ">
                        <label for="Email">Email</label>
                    </div>
                    <div class="form-floating">
                        <input type="password" class="form-control" name="password" placeholder=" ">
                        <label for="Password">Password</label>
                    </div>
                    <div class="form-floating">
                        <input type="password" class="form-control" name="cpass" placeholder=" ">
                        <label for="cpass">Confirm Password</label>
                    </div>

                    <button type="submit" name="user_signup_submit" class="auth_btn">Sign up</button>

                    <div class="footer_line">
                        <h6>Already have an account? <span class="page_move_btn" onclick="loginpage()">Log in</span></h6>
                    </div>
                </form>
            </div>
    </section>
</body>


<script src="./js/index.js"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

<!-- aos animation-->
<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
<script>
    AOS.init();
</script>
</html>