<?php
    session_start();
    if (!isset($_SESSION['user_type'])) {
        if(!($_SESSION['user_type']=='doctor' )){
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
                width: 21%;
                height: 85%;
                background-color:white;
                box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;
                border-radius:35px;
                display: flex; justify-content: center; align-items: center;
                
            }
            .heading{
                font-family:"roboto";
                font-size:50px;
                font-weight:300;
                color:black;    
                margin-top:30px;
                padding-bottom:15px;
                padding-top:20px;
            }
            .heading2{
                font-family:"roboto";
                font-size:23px;
                font-weight:400;
                color:black;    
                margin-top:0px;
                text-align:left;
                padding-top:7px;
                padding-bottom:2px;
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
                <a href="php/logout.php" style="margin-left:150px;">LOG OUT</a>
            </div>
        </header>
        <div id="blank"></div>
        <div id="page">
            <div id="box">
                <table>
                    <tr><td class="heading" >Set Schedule</td></tr>
                    <form action="php/generate_slots.php" method="POST" onsubmit="return validation()">
                        <tr><td class="heading2">Start Date: </td></tr><tr><td><input type="date" class ="input" name="start_date" required id="1"></td></tr>
                        <tr><td class="heading2">End Date: </td></tr><tr><td><input type="date"  class ="input" name="end_date" id="2" required></td></tr>
                        <tr><td  class="heading2">Start Time: </td></tr><tr><td><input type="time" class ="input" name="start_time" id="3" required></td></tr>
                        <tr><td class="heading2">End Time: </td></tr><tr><td><input type="time" class ="input" name="end_time" id="4" required></td></tr>
                        <tr><td class="heading2">Time Interval (minutes): </td></tr><tr><td><input type="number" class ="input" id="5" name="time_interval" required></td></tr>
                        <tr style="line-height:90px;"><td><input type="submit" class = "submit" value="CREATE SLOTS"></td></tr>
                    </form>
                    <script type="text/javascript"> 
                        var startdate = document.getElementById("1")
                        var enddate = document.getElementById("2")
                        var starttime = document.getElementById("3")
                        var endtime = document.getElementById("4")
                        var timeinterval = document.getElementById("5")
                        
                        function validation(){
                            var date = new Date();
                            var startdate_o = new Date(startdate.value)
                            var enddate_o = new Date(enddate.value)
                            if ((startdate_o < date)||(enddate_o < date)) {
                                alert("Error : Date must be tommorrow onwards")
                                return false
                            }
                            if(enddate_o<startdate_o){
                                alert("Error : Start date cannot be later than end date")
                                return false
                            }
                            if(starttime.value>endtime.value){
                                alert("Error : Start time cannot be later than end time")
                                return false
                            }
                            if(timeinterval.value<=0){
                                alert("Error : Invalid time value! Time interval must be a postive integer")
                                return false
                            }
                            return true;
                        }
                    </script>
                </table>
            </div>
        </div>

    </body>
</html>
