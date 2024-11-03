<?php
    session_start();
    if (!isset($_SESSION['user_type'])) {
        if(!($_SESSION['user_type']=='patient' || $_SESSION['user_type']=='doctor' || $_SESSION['user_type']=='admin' )){
            header("Location: login.php");
            exit();
        }
    }
    if(isset($_SESSION['cancel'])){
        if($_SESSION['cancel']==true){
            echo '<script>alert("Booking Successfully Cancelled ✔️");</script>';
            unset($_SESSION['cancel']);
        }
    }
    if(isset($_SESSION['adminreg_success'])){
        if($_SESSION['adminreg_success']==true){
            echo '<script>alert("Registration Success ✔️");</script>';
            unset($_SESSION['adminreg_success']);
        }
    }
    if(isset($_SESSION['adminreg_username_exists'])){
        if($_SESSION['adminreg_username_exists']==true){
            echo '<script>alert("Registration Error : Username already exists ❌");</script>';
            unset($_SESSION['adminreg_username_exists']);
        }
    }
    if(isset($_SESSION['delete_user'])){
        if($_SESSION['delete_user']==true){
            echo '<script>alert("User Deleted Successfully ✔️");</script>';
            unset($_SESSION['delete_user']);
        }
    }
    if(isset($_SESSION['adminedit_success'])){
        if($_SESSION['adminedit_success']==true){
            echo '<script>alert("User Edited Successfully ✔️");</script>';
            unset($_SESSION['adminedit_success']);
        }
    }
    if(isset($_SESSION['adminedit_success'])){
        if($_SESSION['adminedit_username_exists']==true){ 
            echo '<script>alert("User Edit Error : Username exists ❌");</script>';
            unset($_SESSION['adminedit_username_exists']);
        }
    }
    if(isset($_SESSION['sched_success'])){
        if($_SESSION['sched_success']==true){ 
            $success = $_SESSION['success'];
            $fail = $_SESSION['fail'];
            echo "<script>alert('Schedule Set. $success successful slots entered ✔️ $fail slots clashed ❌.  ');</script>";
            unset($_SESSION['sched_success']);  
            unset($_SESSION['success']);
            unset($_SESSION['fail']);
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
                font-family: "Roboto", sans-serif;
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
                font-weight: 550;
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
                width: 28%;
                height: 54%;
                background-color:white;
                box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;
                border-radius:50px;
                
            }
            .heading{
                font-family:"roboto";
                font-size:50px;
                font-weight:300;
                color:black;    
                margin-top:50px;
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
                <a href="php/logout.php" style="margin-left:150px;">LOG OUT</a>
            </div>
        </header>
        <div id="blank"></div>
        <div id="page">
            <div id="box">
                <p class="heading">Welcome Back,<br> <?php echo $_SESSION["user_name"];?></p>
                <ul>    
                    <li>
                        <a href ="<?php if($_SESSION['user_type']=='patient'){echo"myappointments_client.php";}else if($_SESSION['user_type']=='doctor'){echo"appointments_doctor_view.php";}else{echo"adminreg.php";}?>" ><?php if($_SESSION['user_type']=='patient'){echo"MY APPOINTMENTS";}else if($_SESSION['user_type']=='doctor'){echo"VIEW SCHEDULE";}else{echo"CREATE ACCOUNTS";}?></a>
                    </li>
                    <li>
                        <a href ="<?php if($_SESSION['user_type']=='patient'){echo"appointments_client_view.php";}else if($_SESSION['user_type']=='doctor'){echo"schedule.php";}else{echo"usermanagement.php";}?>"><?php if($_SESSION['user_type']=='patient'){echo"BOOK APPOINTMENT";}else if($_SESSION['user_type']=='doctor'){echo"SET SCHEDULE";}else{echo"MANAGE USERS";}?></a>
                    </li>
                </ul>
            </div>
        </div>

    </body>
</html>
