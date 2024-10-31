<?php
    session_start();
    if (!isset($_SESSION['user_type'])) {
        if(!($_SESSION['user_type']=='patient')){
            header("Location: login.php");
            exit();
        }
    }
    $appt_id = $_POST['link']
    
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
                width: 20%;
                height: 95%;
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
                display:inline-block;
                color:white;
                font-family:"roboto";
                font-size:23px;
                font-weight:500;
                width:283px;
                opacity:0.90;
                transition:0.5s;
                padding:10px 0px;
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
                width:285px;
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
            #box button{
                background-color: #21c1b9;
                border-radius:40px;
                padding: 10px 0px;
                display:inline-block;
                color:white;
                font-family:"roboto";
                font-size:23px;
                font-weight:500;
                width:283px;
                opacity:0.90;
                transition:0.5s;
                border:none;
            }
            #box button:hover{
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
                <a href="contact.html">CONTACT US</a>
            </div>
            <div id="right-header">
            <a href="login.php">APPOINTMENTS</a>
            </div>
        </header>
        <div id="blank"></div>
        <div id="page">
            <div id="box">
                <table>
                    <tr><td class="heading" >Appointment Details</td></tr>
                    <form action="reschedule.php" method="POST" onsubmit="return validation()">
                        <?php
                            $appt_id=$_POST['link'];
                            $db = new mysqli("localhost","root","","dental");
                            if ($db->connect_error) {
                                die("Connection failed: " . $conn->connect_error);
                            }
                            $session_id=$_SESSION['user_id'];
                            $stmt=$db->query("SELECT * FROM appointmentslots WHERE SlotID=$appt_id")->fetch_assoc();
                            $dr_id=$stmt['DoctorID'];
                            $stmt2=$db->query("SELECT * FROM locations where user_id=$dr_id")->fetch_assoc();
                            $dr_name=$stmt2['doctor_name'];
                            if($stmt2['clinic']==1){
                                $clinic = "Jurong East Clinic";
                            }
                            else if($stmt2['clinic']==2){
                                $clinic = "Bishan Clinic";
                            }
                            $adate=$stmt['AppointmentDate'];
                            $atime= $startTime = DateTime::createFromFormat('H:i:s', $stmt['StartTime'])->format('g:i A');
                            $ctype=$stmt['ConsultType'];
                            $comments=$stmt['Comments'];
                        ?>
                        <tr><td class="heading2">Clinic Location</td></tr><tr><td><input type="text" class ="input" value="<?php echo $clinic; ?>" disabled></td></tr>
                        <tr><td class="heading2">Doctor</td></tr><tr><td><input type="text" class ="input" value="<?php echo $dr_name; ?>" disabled></td></tr>
                        <tr><td  class="heading2">Date</td></tr><tr><td><input type="text" class ="input" value="<?php echo $adate; ?>" disabled></td></tr>
                        <tr><td class="heading2">Appointment Time</td></tr><tr><td><input type="text" class ="input" value="<?php echo $atime; ?>" disabled></td></tr>
                        <tr><td class="heading2">Type of consult</td></tr><tr><td><input type="text" class ="input" value="<?php echo $ctype; ?>" disabled></td></tr>
                        <input type="hidden" name="link" value="<?php echo $appt_id?>">
                        <tr><td class="heading2">Comments</td></tr><tr><td><textarea rows="1" cols="50" class="input" name="comment" style="resize: none;" disabled><?php echo $comments ?></textarea></tr></td>
                        <tr style="line-height:50px;"><td><input type="submit" class = "submit" value="RESCHEDULE"></td></tr>
                    </form>
                        <tr><td><form action="php/cancel.php" method="POST"><button type="submit"name="link" onclick="confirm('Are you sure you want to cancel?')" value="<?php echo $appt_id?>">CANCEL</button></form></tr></td>
                </table>
            </div>
        </div>

    </body>
</html>
