<?php
    session_start();
    if (!isset($_SESSION['user_type']) || $_SESSION['user_type'] != 'admin') {
        header("Location: login.php");
        exit();
    } 
    $name=$_POST["name"];
    $email=$_POST["email"];
    $username=$_POST["username"];
    $password=$_POST["password"];
    $usertype=$_POST["user-role"];
    $clinic=$_POST["clinic"];
    $clinic=(int)$clinic;

    $db = new mysqli("localhost","root","","dental");
    if ($db->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $stmt = $db->query("SELECT * FROM users WHERE username = '$username'");
    if ($stmt->num_rows >0){
        $_SESSION['adminreg_username_exists'] = true;
        header("Location: ../appointments.php");
        exit();
    }
    else{
        if($usertype=="doctor"){
            $hashed_password=password_hash($password,PASSWORD_BCRYPT);
            $db->query("INSERT INTO users VALUES (NULL,'$username','$hashed_password','$usertype','$name','$email')");
            $dr_id=$db->query("SELECT * FROM users WHERE username = '$username' ")->fetch_assoc()['user_id'];
            $db->query("INSERT INTO locations VALUES ($dr_id,'$name',$clinic)");
            $_SESSION['adminreg_success']=true;
            header("Location: ../appointments.php");
            exit();
        }   
        else{
            $hashed_password=password_hash($password,PASSWORD_BCRYPT);
            $db->query("INSERT INTO users VALUES (NULL,'$username','$hashed_password','$usertype','$name','$email')");
            $_SESSION['adminreg_success']=true;
            header("Location: ../appointments.php");
            exit();
        }
    }
?>