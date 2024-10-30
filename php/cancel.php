<?php
    session_start();
    if (!isset($_SESSION['user_type'])) {
        if(!($_SESSION['user_type']=='patient' ||$_SESSION['user_type']=='doctor' )){
            header("Location: login.php");
            exit();
        }
    }  
    $appt_id = $_POST['link'];
    $db = new mysqli("localhost","root","","dental");
    if ($db->connect_error) {
        die("Connection failed: " . $db->connect_error);
    }   
    $query="UPDATE appointmentslots SET IsBooked=0,PatientID=NULL,ConsultType=NULL,Comments=NULL WHERE SlotID=$appt_id";
    $stmt=$db->query($query);
    $_SESSION['cancel'] = true;
    header("Location: ../appointments.php"); 
    exit();
?>