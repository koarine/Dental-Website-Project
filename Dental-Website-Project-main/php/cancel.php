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
    $stmt = $db->query("SELECT * FROM appointmentslots WHERE SlotID=$appt_id")->fetch_assoc();
    $PatientID = $stmt['PatientID'];
    $DoctorID = $stmt['DoctorID'];
    $ApptDate = $stmt['AppointmentDate'];
    $StartTime = $stmt['StartTime'];
    $EndTime = $stmt['EndTime'];
    $ConsultType = $stmt['ConsultType'];
    $Comments = $stmt['Comments'];
    
    // get doctor name and clinic location
    $stmt = $db->query("SELECT * FROM locations WHERE user_id=$DoctorID")->fetch_assoc();
    $DoctorName = $stmt['doctor_name'];
    $ClinicLocation = $stmt['clinic'];
    if ($ClinicLocation==1){
        $ClinicLocation="Jurong East Clinic";
    }
    else if ($ClinicLocation==1){
        $ClinicLocation="Bishan Clinic";
    }
    $apptResult = $db->query("SELECT StartTime, EndTime FROM appointmentslots WHERE SlotID = $appt_id");
    while ($apptRow = $apptResult->fetch_assoc()) {
        $startTime = date('g:i A', strtotime($apptRow['StartTime']));
        $endTime = date('g:i A', strtotime($apptRow['EndTime']));
        $apptTiming = $startTime. " to ". $endTime;
    }
    // update appointment slots for cancellation
    $query="UPDATE appointmentslots SET IsBooked=0,PatientID=NULL,ConsultType=NULL,Comments=NULL WHERE SlotID=$appt_id";
    $stmt=$db->query($query);
    $_SESSION['cancel'] = true;
    
    
    // email
    $stmt = $db->query("SELECT email FROM users WHERE user_id=$PatientID")->fetch_assoc();
    $to = $stmt["email"];
    // get name
    $name = $db->query("SELECT * FROM users WHERE user_id=$PatientID")->fetch_assoc()['user_name'];
    // email subject
    $subject = 'Cancellation of Appointment at Radiant Smiles Dental';
    // email message
    $message = "Dear $name,\n\n".
            "Your appointment with Radiant Smiles Dental has been cancelled.\n\n".
            "Appointment Details:\n".
            "Clinic Location: $ClinicLocation \n".
            "Doctor: $DoctorName \n".
            "Date: $ApptDate \n".
            "Time: $apptTiming \n".
            "Consult Type: $ConsultType \n".
            "Comments: $Comments \n\n".
            "Thank you for choosing Radiant Smiles Dental!\n\nBest regards,\nThe Radiant Smiles Dental Team";

    $headers = 'From: booking@radiantsmilesdental.com.sg'."\r\n".'Reply-To: booking@radiantsmilesdental.com.sg'."\r\n".'X-Mailer: PHP/'.phpversion();
    mail($to, $subject, $message, $headers);

    header("Location: ../appointments.php"); 

    exit();
?>
