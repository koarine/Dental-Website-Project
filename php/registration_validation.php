<?php
    session_start();
    $name=$_POST["name"];
    $email=$_POST["email"];
    $username=$_POST["username"];
    $password=$_POST["password"];

    $db = new mysqli("localhost","root","","dental");
    if ($db->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $stmt = $db->query("SELECT * FROM users WHERE username = '$username'");
    if ($stmt->num_rows >0){
        $_SESSION['username_exists'] = true;
        header("Location: ../registration.php");
        exit();
    }
    else{
        $hashed_password=password_hash($password,PASSWORD_BCRYPT);
        $db->query("INSERT INTO users VALUES (NULL,'$username','$hashed_password','patient','$name','$email')");
        header("Location: ../login.php");
        exit();
    }
?>