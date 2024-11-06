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
    $name = $db->query("SELECT * FROM users WHERE username='$username'")->fetch_assoc()['user_name'];
    
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

    $subject = 'Password Reset for your Radiant Smiles Dental Account';
    $message = "Dear $name, \n\n".
                "Your password has been reset.\n\n".
                "Your new password is: $password \n\n".
                "Thank you for choosing Radiant Smiles Dental!\n\nBest regards,\nThe Radiant Smiles Dental Team";
    $headers = 'From: password_reset@radiantsmilesdental.com.sg'."\r\n".'Reply-To: password_reset@radiantsmilesdental.com.sg'."\r\n".'X-Mailer: PHP/'.phpversion();
    mail($email, $subject, $message, $headers);

    $hashed_password=password_hash($password,PASSWORD_BCRYPT);
    $db->query("UPDATE users SET user_password='$hashed_password' WHERE username='$username'");
    $_SESSION['reset_success']=true;
    $_SESSION['email']=$email;
    header("Location: ../login.php");
    
?>
