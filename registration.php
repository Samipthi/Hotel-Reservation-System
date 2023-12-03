<?php
session_start();
if (isset($_SESSION["user"])) {
   header("Location: index.php");
}
?>
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
    <div class="wrapper">
    <?php
if (isset($_POST["submit"])) {
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];

    $passwordHash = password_hash($password, PASSWORD_DEFAULT);

    $errors = array();

    if (empty($username) OR empty($email) OR empty($password)) {
        array_push($errors, "All fields are required");
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        array_push($errors, "Email is not valid");
    }
    if (strlen($password) < 8) {
        array_push($errors, "Password must be at least 8 characters long");
    }

    require_once "database.php";
    $sql = "SELECT * FROM user WHERE email = '$email'";
    $result = mysqli_query($conn, $sql);
    $rowCount = mysqli_num_rows($result);

    if ($rowCount > 0) {
        array_push($errors, "Email already exists!");
    }

    if (count($errors) > 0) {
        foreach ($errors as $error) {
            echo "<div class='alert alert-danger'>$error</div>";
        }
    } else {
        $sql = "INSERT INTO user (username, email, password) VALUES (?, ?, ?)";
        $stmt = mysqli_stmt_init($conn);

        $prepareStmt = mysqli_stmt_prepare($stmt, $sql);

        if ($prepareStmt) {
            // Statement is prepared successfully
            mysqli_stmt_bind_param($stmt, "sss", $username, $email, $passwordHash);
            mysqli_stmt_execute($stmt);
            echo "<div class='alert alert-success'>You are registered successfully.</div>";

            // Redirect to the login page
            header("Location: login.php");
            exit();
        } else {
            // Statement preparation failed
            die("Something went wrong");
        }
    }
}
?>

    <form action="" method="post">
    
    <h1>Register</h1>
    
    <div class="input-box">
    <input type="text" placeholder="Username" class="form-control" name="username" required>   
    <i class='bx bxs-user'></i>
    </div >

    <div class="input-box">
    <input type="email" class="form-control" name="email" placeholder="Email" required>
    <i class='bx bx-envelope'></i>
    </div>

    <div class="input-box">
    <input type="password" class="form-control" name="password" placeholder="Password" required>
    <i class='bx bx-lock-alt'></i>
    </div>

 
<button type="submit" class="btn" value="register" name="submit">Register</button>
<div class="login-link">
    <p>Have an account?<a href="login.php" class="register">Login</a></p>
</div> 

 </form>
 
 </div>

 <!--javasrcipt file-->
 <script src="login.js"></script>
    
 </body>
    
</html>