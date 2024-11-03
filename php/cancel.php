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
    // get patient ID
    $stmt = $db->query("SELECT PatientID FROM appointmentslots WHERE SlotID=$appt_id")->fetch_assoc();
    $PatientID = $stmt['PatientID'];

    // update appointment slots for cancellation
    $query="UPDATE appointmentslots SET IsBooked=0,PatientID=NULL,ConsultType=NULL,Comments=NULL WHERE SlotID=$appt_id";
    $stmt=$db->query($query);
    $_SESSION['cancel'] = true;
    
    
    // email
    $stmt = $db->query("SELECT email FROM users WHERE user_id=$PatientID")->fetch_assoc();
    $to = $stmt["email"];
    // get name
    $name = $_SESSION["user_name"];
    // email subject
    $subject = 'Cancellation of Appointment at Radiant Smiles Dental';
    // email message
    $message = "Dear $name,\n\n".
            "Your appointment with Radiant Smiles Dental has been cancelled.\n\n".
            "Thank you for choosing Radiant Smiles Dental!\n\nBest regards,\nThe Radiant Smiles Dental Team";

    $headers = 'From: booking@radiantsmilesdental.com.sg'."\r\n".'Reply-To: booking@radiantsmilesdental.com.sg'."\r\n".'X-Mailer: PHP/'.phpversion();
    mail($to, $subject, $message, $headers, '-ff32ee@localhost');

    header("Location: ../appointments.php"); 

    exit();
?>
