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
                    z-index: 99;
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
                    min-height:85%;
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
                    margin-top:50px;
                    width: 30%;
                    margin-bottom:50px;
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
                #box button{
                    background-color: #21c1b9;
                    border-radius:40px;
                    padding: 18px 30px;
                    margin-top:20px;
                    display:inline-block;
                    color:white;
                    font-family:"roboto";
                    font-size:28px;
                    font-weight:500;
                    width:420px;
                    opacity:0.90;
                    transition:0.5s;
                    border:none;
                }
                #box button:hover{
                    opacity:1;
                    color:rgb(45,45,45);
                }
                
                #box a{
                    background-color: #21c1b9;
                    border-radius:40px;
                    padding: 18px 30px;
                    margin-top:20px;
                    display:inline-block;
                    color:white;
                    font-family:"roboto";
                    font-size:28px;
                    font-weight:500;
                    width:420px;
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
                p{
                    font-family:"roboto";
                    font-size:30px;
                    font-weight:500;
                    
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
                        <tr><td><br></tr></td>
                        <tr><td><br></tr></td>
                        <tr><td class="heading" >MY APPOINTMENTS</td></tr>
                        <?php 
                            $db = new mysqli("localhost","root","","dental");
                            if ($db->connect_error) {
                                die("Connection failed: " . $conn->connect_error);
                            }
                            $session_id=$_SESSION['user_id'];
                            $stmt = $db->query("SELECT * FROM  appointmentslots WHERE PatientID=$session_id");
                            if ($stmt->num_rows == 0) {
                                echo "<tr><td><p>😔</p></td></tr>
                                      <tr><td><p>You have no appointments</p></td></tr>
                                      <tr><td><a href='appointments_client_view.php'>BOOK APPOINTMENT</a></tr></td>
                                      <tr><td><br></tr></td>
                                      <tr><td><br></tr></td>";
                                exit();
                            }
                            
                            while($row = $stmt ->fetch_assoc()){
                                $startTime = DateTime::createFromFormat('H:i:s', $row['StartTime'])->format('g:i A');
                                $dr_id=$row['DoctorID'];
                                $stmt2=$db->query("SELECT * FROM locations WHERE user_id=$dr_id")->fetch_assoc();
                                if ($stmt2['clinic']==1){
                                    $clinic="Jurong East Clinic";
                                }
                                else if ($stmt2['clinic']==2){
                                    $clinic="Choa Chu Kang";
                                }
                                $appt_id=$row['SlotID'];
                                echo "<form action='apptdetails.php' method='post'>
                                    <tr>
                                        <td>
                                            <button type='submit' name='link' value='" . $appt_id . "'>
                                                📅 " . $row['AppointmentDate'] . "<br>
                                                ⏰ " . $startTime . "<br>
                                                👨🏻‍⚕️ Dr. " . $stmt2['doctor_name'] . "<br>
                                                🏥 " . $clinic . "<br><br>
                                                👆🏻 CLICK TO VIEW DETAILS
                                            </button>
                                        </td>
                                    </tr>
                                </form>";
                            }
                        ?>
                        <tr><td><br></tr></td>
                        <tr><td><br></tr></td>
                        
                        <script type="text/javascript">
                        </script>
                    </table>
                </div>
            </div>

        </body>
    </html>