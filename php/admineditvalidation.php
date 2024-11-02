<?php
    session_start();
    if (!isset($_SESSION['user_type'])) {
        if(!($_SESSION['user_type']=='admin' )){
            header("Location: login.php");
            exit();
        }       
    }
    $user_id=$_POST['link'];
    $name=$_POST["name"];
    $email=$_POST["email"];
    $username=$_POST["username"];
    $usertype=$_POST["user-role"];
    $clinic=$_POST["clinic"];
    $clinic=(int)$clinic;

    $db = new mysqli("localhost","root","","dental");
    if ($db->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $exist_username=$db->query("SELECT * FROM users WHERE user_id = '$user_id'")->fetch_assoc()['username'];    
    if($username!=$exist_username){ 
        $stmt = $db->query("SELECT * FROM users WHERE username = '$username'");
        if ($stmt->num_rows >0){
            $_SESSION['adminedit_username_exists'] = true;
            header("Location: ../appointments.php");
            exit();
        }
    }
    if($usertype=="doctor"){
        $db->query("UPDATE users SET user_name='$name',user_type='$usertype',email='$email',username='$username' WHERE user_id=$user_id ");
        $stmt=$db->query("SELECT * FROM locations WHERE user_id=$user_id");
        if ($stmt->num_rows==0){
            $db->query("INSERT INTO locations SET user_id=$user_id,doctor_name='$name',clinic=$clinic");
        }
        else{
            $db->query("UPDATE locations SET clinic=$clinic,doctor_name='$name' WHERE user_id=$user_id");
        }
        $_SESSION['adminedit_success']=true;
        header("Location: ../appointments.php");
        exit();
    }   
    else{
        $db->query("UPDATE users SET user_name='$name',user_type='$usertype',email='$email',username='$username' WHERE user_id=$user_id ");
        $db->query("DELETE FROM users WHERE user_id='$user_id'");
        $db->query("DELETE FROM locations WHERE user_id='$user_id'");
        $db->query("DELETE FROM appointmentslots WHERE DoctorID='$user_id'");

        $_SESSION['adminedit_success']=true;
        header("Location: ../appointments.php");
        exit();
    }
    
?>