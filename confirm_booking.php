<?php
    session_start();
    if (!isset($_SESSION['user_type'])) {
        if(!($_SESSION['user_type']=='patient')){
            header("Location: login.php");
            exit();
        }
    }   
?>


<!DOCTYPE html>
<html lang="en">
    
    <head>
        <title>Radiant Smiles Dental | Home</title>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
        <style>
            html{
                height:100%;
                min-height: 900px;
                padding:0;
                border:0;
                min-width: 1850px;
                scroll-behavior: smooth;
                
            }
            body{background-color: white;
                height:100%;
                margin:0 ;
            }
            header{
                font-family: "Roboto", sans-serif;
                background-color: #21c1b9;
                height:15%;
                width: 100%;
                border: 0;
                position:fixed;
                min-width: 1050px;
                min-height:138px;
            }
            p{
                margin:0px;
                padding:0px;
            }

            /* ================================================ header (navbar) ================================================ */
            
            #left-header a{
                height:100%;
                width:100%;
                display: flex;
                justify-content: center;
                align-items: center;
            }
            #mid-header a{
                font-size: 23px;
                margin-left: 3%;
                font-weight: 550;
                color: white;
                padding: 20px 15px;
                border-radius: 12px;
                text-decoration: none;
            }
            #mid-header a:hover{
                background-color: white;
                box-shadow: 2px 3px 3px #404040;
                color:#404040;
            }
            #right-header a{
                font-size: 23px;
                font-weight: 500;
                color: #404040;
                text-decoration: none;
                text-align: center;
                margin: auto;
                background-color: white;
                padding: 20px 15px;
                border-radius: 12px;
                box-shadow: 2px 3px 3px #404040;
            }
            #right-header a:hover{
                color: #21c1b9;
                box-shadow: 2px 4px 4px #404040;
            }
            #left-header{
                width: 12.5%;
                height: 100%;
                float: left;
                min-width: 200px;
            }
            #mid-header{
                width: 55%;
                height: 100%;
                display: flex;
                align-items: center;
                float: left;
            }
            #right-header{
                width: 17.5%;
                height: 100%;
                display: flex;
                align-items: center;
                float: right;
                text-align: center;
                min-width: 250px;
            }
            #blank{
                height:15%;
            }
            #page{
                height:85%;
                text-align:center;
                font-family:"roboto";
                background-color:rgb(238, 255, 235);
                display: flex;  
                justify-content: center; 
                align-items: center;
            }

            #wb{
                font-size:60px;
                font-weight:600;
                color:#404040;
                padding-top:200px;
                
            }
            #box{
                width: 27%;
                height: 38%;
                background-color:white;
                box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;
                border-radius:35px;
                display: flex; justify-content: center; align-items: center;
                
            }
            .heading{
                font-family:"roboto";
                font-size:43px;
                font-weight:300;
                color:black;    
                margin-top:20px;
                padding-bottom:0px;
                padding-top:10px;
            }
            .heading2{
                font-family:"roboto";
                font-size:24px;
                font-weight:400;
                color:black;    
                margin-top:0px;
                text-align:left;
                padding-top:4px;
                padding-bottom:1px;
                padding-left:50px;
            }
            #box a{
                background-color: #21c1b9;
                border-radius:40px;
                padding: 18px 30px;
                margin-top:20px;
                display:inline-block;
                color:white;
                font-family:"roboto";
                font-size:32px;
                font-weight:500;
                width:400px;
                opacity:0.90;
                transition:0.5s;
            }
            #box a:hover{
                opacity:1;
                color:rgb(45,45,45);
            }
            ul{
                margin:0;
                padding:0;
            }
            li{
                list-style-type:none;
            }
            a{
                text-decoration: none;
            }
            table{
                
            }
            .input{
                background-color:#f1ecec;
                border-radius: 18px;
                font-size: 20px;
                border:5px;
                width:265px;
                padding:10px;
                font-family:"roboto";
                outline:none;
                font-weight:400;
            }

            .submit{
                background-color:#21c1b9;
                border-radius: 50px;
                font-size: 23px;
                border:5px;
                width:325px;
                padding:10px;
                font-family:"roboto";
                outline:none;
            
                color:white;
                border-top:50px;
                font-weight:500;
                opacity:0.90;
                transition:0.5s;    
            }
            
            .submit:hover{
                opacity:1;
                color:rgb(45,45,45);
            }
            
        </style>
    </head>
    <body >
        <header>
            <div id="left-header">
                <a href="index.html"><img src="images/logo.png" height = 85%></a>
            </div>
            <div id="mid-header">
                <a href="services.html" style="margin-left:2%">OUR SERVICES</a>   
                <a href="about.html">ABOUT US</a>
                <a href="contact.php">CONTACT US</a>
            </div>
            <div id="right-header">
            <a href="login.php">APPOINTMENTS</a>
            </div>
        </header>
        <div id="blank"></div>
        <div id="page">
            <div id="box">
                <table>
                <?php
                    $db = new mysqli("localhost","root","","dental");
                    if ($db->connect_error) {
                        die("Connection failed: " . $conn->connect_error);
                    }
                    $SlotID = $_POST["time"];
                    $PatientID = $_SESSION["user_id"];
                    $ctype = $_POST["ctype"];
                    $comments = $_POST["comment"];
                    $clinicLocation = $_POST["clinic"];
                    $apptDate = $_POST["date"];
                    $action = isset($_POST['action']) ? $_POST['action'] : 'booking';

                    // get start time and end time of appointment
                    $apptResult = $db->query("SELECT StartTime, EndTime FROM appointmentslots WHERE SlotID = $SlotID");
                    while ($apptRow = $apptResult->fetch_assoc()) {
                        $startTime = date('g:i A', strtotime($apptRow['StartTime']));
                        $endTime = date('g:i A', strtotime($apptRow['EndTime']));
                        $apptTiming = $startTime. " to ". $endTime;
                    }
                    
                    // get doctor name
                    $dr_id = $_POST["doctor"];
                    $apptDoctor_stmt = $db->query("SELECT * FROM locations WHERE user_id=$dr_id");
                    $row = $apptDoctor_stmt->fetch_assoc();
                    $apptDoctor = $row['doctor_name'];
                    
                    
                    $stmt=$db->query("SELECT * FROM  appointmentslots WHERE SlotID=$SlotID")->fetch_assoc();
                    if ($stmt['IsBooked']==0){
                        if(isset($_POST['link'])){
                            $link = $_POST['link'];
                            $PatientID=$db->query("SELECT * FROM appointmentslots where SLOTID=$link")->fetch_assoc()['PatientID'];
                            $db->query("UPDATE appointmentslots SET IsBooked=0,PatientID=NULL,ConsultType=NULL,Comments=NULL WHERE SlotID=$link");
                        }
                        $db->query("UPDATE appointmentslots SET IsBooked=1,PatientID=$PatientID,ConsultType='$ctype',Comments='$comments' WHERE SlotID=$SlotID");
                        echo "
                            <tr>
                                <td class='heading'>
                                    Booking Confirmed
                                </td>
                            </tr>
                            <tr>
                                <td class='heading'>
                                    ✔️
                                </td>
                            </tr>
                            <tr style='line-height:50px;'>
                                <td>
                                    <form action='appointments.php'>
                                        <input type='submit' class='submit' value='Back to appointments page'>
                                    </form>
                                </td>
                            </tr>
                            <tr style='line-height:50px;'>
                                <td>
                                    <form action='apptdetails.php' method='POST'>
                                        <input type='hidden' name='link' value='" . $SlotID . "'>
                                        <input type='submit' class='submit' value='View details'>
                                    </form>
                                </td>
                            </tr>
                        ";

                        // get email
                        $stmt = $db->query("SELECT email FROM users WHERE user_id=$PatientID")->fetch_assoc();
                        $to = $stmt["email"];
                        // get name
                        $name = $_SESSION["user_name"];
                        // email subject
                        

                        if ($action == 'reschedule') {
                            $subject = 'Your Appointment at Radiant Smiles Dental has been rescheduled';
                            $message = "Dear $name,\n\n".
                                    "Your appointment with Radiant Smiles Dental has been rescheduled.\n\nAppointment Details:\n".
                                    "Clinic Location: $clinicLocation \n".
                                    "Doctor: $apptDoctor \n".
                                    "Date: $apptDate \n".
                                    "Time: $apptTiming \n".
                                    "Consult Type: $ctype \n".
                                    "Comments: $comments \n\n".
                                    "Thank you for choosing Radiant Smiles Dental!\n\nBest regards,\nThe Radiant Smiles Dental Team";
                        } else {
                            $subject = 'Appointment Booking Confirmed at Radiant Smiles Dental';
                            $message = "Dear $name,\n\n".
                                    "Your appointment with Radiant Smiles Dental has been confirmed.\n\nAppointment Details:\n".
                                    "Clinic Location: $clinicLocation \n".
                                    "Doctor: $apptDoctor \n".
                                    "Date: $apptDate \n".
                                    "Time: $apptTiming \n".
                                    "Consult Type: $ctype \n".
                                    "Comments: $comments \n\n".
                                    "Thank you for choosing Radiant Smiles Dental!\n\nBest regards,\nThe Radiant Smiles Dental Team";

                        }
                        
                        $headers = 'From: booking@radiantsmilesdental.com.sg'."\r\n".'Reply-To: booking@radiantsmilesdental.com.sg'."\r\n".'X-Mailer: PHP/'.phpversion();
                        
                        mail($to, $subject, $message, $headers, '-ff32ee@localhost');
                    }
                    else{
                        echo"
                            <tr><td class='heading' >Booking Failed</td></tr>
                            <tr><td class='heading' >❌</td></tr>
                            <form action='appointments_client_view.php' >
                            <tr style='line-height:80px;'><td><input type='submit' class = 'submit' value='Try Again'></td></tr>
                            </form>
                        ";
                    }
                    exit();
                ?>
                </table>
            </div>
        </div>

    </body>
</html>
