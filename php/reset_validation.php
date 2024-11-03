<?php
    session_start();
    $username = $_POST['username'];
    $db = new mysqli("localhost","root","","dental");
    if ($db->connect_error){
        die("Connection failed: " . $conn->connect_error);
    }
    if($db->query("SELECT * FROM users WHERE username='$username'")->num_rows == 0){
        $_SESSION['reset_error']=true;
        header("Location: ../resetpassword.php");
        exit();
    }
    $email = $db->query("SELECT * FROM users WHERE username='$username'")->fetch_assoc()['email'];
    
    function generateRandomString($length = 10) {
        $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!?';
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $index = rand(0, strlen($characters) - 1);
            $randomString .= $characters[$index];
        }
        return $randomString;
    }
    $password = generateRandomString(); //this is the plaintext password
    $hashed_password=password_hash($password,PASSWORD_BCRYPT);
    $db->query("UPDATE users SET user_password='$hashed_password' WHERE username='$username'");
    $_SESSION['reset_success']=true;
    $_SESSION['email']=$email;
    header("Location: ../login.php");
    
?>