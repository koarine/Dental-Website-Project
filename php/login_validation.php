<?php
    session_start();
    $username=$_POST["username"];
    $password=$_POST["password"];

    $db = new mysqli("localhost","root","","dental");
    if ($db->connect_error) {
        die("Connection failed: " . $db->connect_error);
    }   
    $query="SELECT user_password FROM users WHERE username ='$username'";
    $stmt=$db->query($query);
    $hashed_password=$stmt->fetch_assoc()['user_password'];
    if (password_verify($password,$hashed_password)){
        $query="SELECT user_type,user_name FROM users WHERE username ='$username'";
        $stmt=$db->query($query);
        $val=$stmt->fetch_assoc();
        $_SESSION['user_type']=$val['user_type'];
        $_SESSION['user_name']=$val['user_name'];
        header("Location: ../appointments.php");
        exit();
    }
    else{
        $_SESSION['password_error'] = true;
        header("Location: ../login.php");
        exit();
    }
?>