<?php
    session_start();
    if (isset($_SESSION['reset_error'])){
        if ($_SESSION['reset_error']==true){
            echo"<script>alert('Invalid username')</script>";
            unset($_SESSION['reset_error']);
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
        <title>Radiant Smiles Dental | Reset Password</title>
        <style>
            html{
                height:100%;
                min-height: 1080x;
                padding:0;
                border:0;
                min-width: 1500px;
                scroll-behavior: smooth;
            }
            body{background-color: white;
                height:100%;
                margin:0 ;
                min-height: 900px;
            }
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
                font-weight: 600;
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
            #lower{
                height:85%;
                width:100%;
                display: flex;
                align-items: center;
                text-align: center;
                background-color:  rgb(238, 255, 235);

            }
            #box{
                background-color: white;
                border-radius: 20px;
                width:21%;  
                height:35%;
                margin: auto;
                box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
                display: flex;
            }
            #table{
                margin: auto;
                text-align: left;
                font-family: "Roboto";
                width: 70%;
                height: 85%;
            }
            .boxtitle{
                font-weight: 350;
                font-style: normal;
                font-size: 42px;
            }
            .boxhead{
                font-weight: 500;
                font-style: normal;
                font-size: 20px;
            }
            .textarea{
                width: 300px;
                height: 40px;
                border-radius: 13px;
                background-color: #f1ecec;
                border: none;
                font-size: 23px;
                padding-left: 10px;
                color: #404040;
            }
            .textarea:focus{
                outline: none;
            }
            #login{
                font-weight:550;
                font-size:20px; 
                color: white;
                border-radius: 30px; 
                background-color: #21c1b9;
                width: 310px; 
                height: 50px;
                border:none;
            }
            #login:hover{
                color: #404040;
                
            }
        </style>
    </head>
    <body onload="checkUsernameExists()"> 
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
        <div id="lower">
            <div id="box">
                <table border="0" id="table">
                    <form method="post" onsubmit="return validation()" action="php/reset_validation.php">
                        <tr style="height: 70px;">
                            <td class="boxtitle">Reset Password</td>
                        </tr>
                        <tr>
                            <td class="boxhead">Username</td>
                        </tr>
                        <tr>
                            <td><input type="text" class="textarea" id="username" name="username"></td>
                        </tr>
                        <tr style="height: 80px;">
                            <td><input type="submit" id="login" value="Reset" class="textarea"></td>
                        </tr>
                    </form>
                        <script>
                            function validation(){
                            username=document.getElementById("username")
                            if (username.value==""){
                                alert("Error: Username field cannot be empty")
                                return false
                            }
                            else{
                                return true
                            }
                        }
                        </script>

                </table>
            </div>
        </div>
    </body>
</html>
