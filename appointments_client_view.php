<?php
    session_start();
    if (!isset($_SESSION['user_type']) || $_SESSION['user_type'] != 'patient') {
        header("Location: login.php");
        exit();
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
                    <tr><td class="heading" >Appointment Booking</td></tr>
                    <form action="confirm_booking.php" method="POST" onsubmit="return validation()">
                        <tr>
                            <td class="heading2">Clinic Location:</td>
                        </tr>
                        <tr>
                            <td>
                                <select 
                                id="clinic" 
                                class ="input" 
                                name ="clinic"
                                style ="width:285px; appearance:none;" 
                                onchange = "multifunc()" 
                                required
                                >
                                    <option value ="Jurong East Clinic">Jurong East Clinic</option>
                                    <option value ="Bishan Clinic">Bishan Clinic</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td class="heading2">Doctor Preference</td>
                        </tr>
                        <tr>
                            <td>
                                <select 
                                id="doctor" 
                                class ="input" 
                                name ="doctor" 
                                onchange = "time_update()" 
                                style ="width:285px; appearance:none;" 
                                required
                                >
                                    <?php 
                                        $db = new mysqli("localhost","root","","dental");
                                        if ($db->connect_error) {
                                            die("Connection failed: " . $conn->connect_error);
                                        }
                                        $stmt = $db->query("SELECT * FROM  locations");
                                        while($row = $stmt ->fetch_assoc()){
                                            echo "<option value='".$row['user_id']."'id='".$row['user_id']."'class='".$row['clinic']."'>".$row['doctor_name']."</option>";
                                        }
                                    ?>  
                                    <script>
                                        var items = document.getElementsByClassName("2");
                                                for (var i = 0; i < items.length; i++) {
                                                    items[i].hidden = true
                                                }
                                        function multifunc(){
                                            time_update()
                                            validationchange()
                                        }
                                        window.onload = validationchange()
                                        function validationchange(){
                                            document.getElementById("doctor").value=""
                                            if (document.getElementById("clinic").value=="Jurong East Clinic"){
                                                var items = document.getElementsByClassName("2");
                                                for (var i = 0; i < items.length; i++) {
                                                    items[i].hidden = true
                                                }
                                                var items = document.getElementsByClassName("1");
                                                for (var i = 0; i < items.length; i++) {
                                                    items[i].hidden = false
                                                }
                                            }
                                            else if(document.getElementById("clinic").value=="Bishan Clinic"){
                                                var items = document.getElementsByClassName("1");
                                                for (var i = 0; i < items.length; i++) {
                                                    items[i].hidden = true
                                                }
                                                var items = document.getElementsByClassName("2");
                                                for (var i = 0; i < items.length; i++) {
                                                    items[i].hidden = false
                                                }
                                            }
                                            return
                                        }
                                    </script>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td class="heading2">Date Preference</td>
                        </tr>
                        <tr>
                            <td>
                                <input 
                                type="date" 
                                class ="input" 
                                onchange = "time_update()" 
                                name="date" 
                                id="dateInput" 
                                required
                                >
                            </td>
                        </tr>
                        <script>
                            function setMinDateToTomorrow() {
                                const dateInput = document.getElementById('dateInput');
                                const tomorrow = new Date();
                                tomorrow.setDate(tomorrow.getDate() + 1); 
                

                                const year = tomorrow.getFullYear();
                                const month = String(tomorrow.getMonth() + 1).padStart(2, '0'); 
                                const day = String(tomorrow.getDate()).padStart(2, '0');
                                const formattedDate = `${year}-${month}-${day}`;
                                dateInput.min = formattedDate; 
                            }

                            setMinDateToTomorrow();
                        </script>
                        <tr>
                            <td class="heading2">Appointment Time</td>
                        </tr>
                        <tr>
                            <td>
                                <select 
                                id="time" 
                                class ="input" 
                                name ="time" 
                                style ="width:285px; appearance:none;" 
                                required
                                >
                                    <?php 
                                        $stmt = $db->query("SELECT SlotID,DoctorID,StartTime,EndTime,AppointmentDate FROM  appointmentslots WHERE IsBooked=0");
                                        while($row = $stmt ->fetch_assoc()){
                                            $startTime = DateTime::createFromFormat('H:i:s', $row['StartTime'])->format('g:i A');
                                            $endTime = DateTime::createFromFormat('H:i:s', $row['EndTime'])->format('g:i A');
                                            echo "<option value='".$row['SlotID']."' class='".$row['DoctorID']." ".$row['AppointmentDate']." bruh"."'>". $startTime . " to " . $endTime ."</option>";
                                        }
                                    ?>
                                    <script>    
                                        var items = document.getElementsByClassName("bruh");
                                                for (var i = 0; i < items.length; i++) {
                                                    items[i].hidden = true
                                                }
                                        document.getElementById("time").value=""

                                        function time_update(){
                                                
                                            var dr_id = document.getElementById("doctor").value;
                                            var date = document.getElementById("dateInput").value;
                                            document.getElementById("time").value=""    
                                            var items = document.getElementsByClassName("bruh");
                                                for (var i = 0; i < items.length; i++) {
                                                    items[i].hidden = true
                                                }
                                            if (dr_id==null || date==""){
                                                return
                                            }
                                            var concat = dr_id + " " + date 
                                            var items = document.getElementsByClassName(concat);
                                            if (items.length===0){
                                                var str = "We're Sorry, "+document.getElementById(dr_id).innerText+" has no timeslots available on "+date+ " 😔"
                                                alert(str)
                                            }
                                            for (var i = 0; i < items.length; i++) {
                                                items[i].hidden = false
                                            }
                                        }
                                    </script>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td class="heading2">Type of consult</td>
                        </tr>
                        <tr>
                            <td>
                                <select 
                                id="" 
                                class="input" 
                                name ="ctype"
                                style ="width:285px; appearance:none;" 
                                required
                                >
                                    <option value ="Scaling & Polishing">Scaling & Polishing</option>
                                    <option value ="Teeth Whitening">Teeth Whitening</option>
                                    <option value ="Metal Braces">Metal Braces</option>
                                    <option value ="Ceramic Braces">Ceramic Braces</option>
                                    <option value ="Invisalign">Invisalign</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td class="heading2">Comments</td>
                        </tr>
                        <tr>
                            <td>
                                <textarea rows="2" cols="50" class="input" name="comment" style="resize: none;"></textarea>
                            </td>
                        </tr>
                        <input type="hidden" name="action" value="booking">
                        <tr style="line-height:50px;">
                            <td>
                                <input type="submit" class = "submit" value="CONFIRM">
                            </td>
                        </tr>
                    </form>
                    <script type="text/javascript">
                        var date = new Date();
                        function validation(){
                            var appt = document.getElementById("3")
                            var apptdate = new Date(appt.value)
                            if(apptdate<=date){
                                alert("Error : Appointment date must be later tommorow onwards")
                                return false;
                            }
                            return true;
                        }
                    </script>
                </table>
            </div>
        </div>

    </body>
</html>
