<?php
session_start();
$con = mysqli_connect("localhost", "root", "", "register") or die(mysqli_error());

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $username = mysqli_real_escape_string($con, $_POST['username']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $number = mysqli_real_escape_string($con, $_POST['number']);
    $password = mysqli_real_escape_string($con, $_POST['password']);

    if (!empty($username) && !empty($password) && !is_numeric($username)) {
        $query = "INSERT INTO form (username, email, contact, password) VALUES ('$username', '$email', '$number', '$password')";
        mysqli_query($con, $query);

        echo "<script type='text/javascript'> alert('Successfully Registered')</script>";
    } else {
        echo "<script type='text/javascript'> alert('Please enter valid information')</script>";
    }
}

mysqli_close($con);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <link rel="stylesheet" href="form.css">
</head>
<body>
<div class="container">
    <form action="#" method="POST" class="form">
        <h1>Register</h1>
        <table>
            <tr>
                <td><label for="username">Username</label></td>
                <td><input type="text" id="username" name="username" required></td>
            </tr>
            <tr>
                <td><label for="email">Email</label></td>
                <td><input type="email" id="email" name="email" required></td>
            </tr>
            <tr>
                <td><label for="number">Contact</label></td> 
                <td><input type="number" id="number" name="number" required></td> 
            </tr>
            <tr>
                <td><label for="password">Password</label></td>
                <td><input type="password" id="password" name="password" required></td>
            </tr>
            <tr>
                <td><label for="confirm-password">Confirm Password</label></td>
                <td><input type="password" id="confirm-password" name="confirm-password" required></td>
            </tr>
        </table>
        <button type="submit">Register</button>
        <p>Already have an account? <a href="login.php">Login here</a></p>
    </form>
</div>
</body>
</html>