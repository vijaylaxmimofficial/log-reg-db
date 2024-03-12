<?php
session_start();
$con = mysqli_connect("localhost", "root", "", "register") or die(mysqli_error());

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $username = mysqli_real_escape_string($con, $_POST['username']);
    $password = mysqli_real_escape_string($con, $_POST['password']);  
    if (!empty($username) && !empty($password) && !is_numeric($username)) {
        $query = "SELECT * FROM form WHERE username ='$username'";
        $result = mysqli_query($con, $query);

        if ($result && mysqli_num_rows($result) > 0) {
            $user_data = mysqli_fetch_assoc($result);
            if ($user_data['password'] == $password) {
                header("location: welcome.php");
                die;
            }
        }

        echo "<script type='text/javascript'> alert('Wrong username or password')</script>";
    } else {
        echo "<script type='text/javascript'> alert('Invalid input or empty fields')</script>";
    }
}
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <link rel="stylesheet" href="form.css">
</head>
<body>
<div class="container">
    <form action="#" method="POST" class="form"> 
        <h1>Login</h1>
        <table>
            <tr>
                <td><label for="username">Username</label></td> 
                <td><input type="text" id="username" name="username" required></td>
            </tr>
            <tr>
                <td><label for="password">Password</label></td>
                <td><input type="password" id="password" name="password" required></td>
            </tr>
        </table>
        <button type="submit">Login</button>
        <p>Don't have an account? <a href="register.php">Register here</a></p>
    </form>
</div>


</body>
</html>