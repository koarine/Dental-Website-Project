<?php
session_start();
if (isset($_SESSION['user_type'])) {
    if(($_SESSION['user_type']=='patient' || $_SESSION['user_type']=='doctor' || $_SESSION['user_type']=='admin' )){
        header("Location: appointments.php");
        exit();
    }
}
if(isset($_SESSION['reg_success'])){
    if($_SESSION['reg_success']==true){
        echo '<script>alert("Registration successful ✔️");</script>';
        unset($_SESSION['reg_success']);
    }
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Radiant Smiles Dental | Home</title>
        <style>
            html{
                height:100%;
                min-height: 1080x;
                padding:0;
                border:0;
                min-width: 1350px;
                scroll-behavior: smooth;
            }
            body{background-color: white;
                height:100%;
                margin:0 ;
                min-height: 800px;
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
            header{
                font-family: "Roboto", sans-serif;
                background-color: #21c1b9;
                height:15%;
                width: 100%;
                border: 0;
                position:fixed;
                min-width: 1050px;
                min-height:138px;
                box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;
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
                background-color: #21c1b9;
                border-radius: 20px;
                width:48%;  
                height:75%;
                margin: auto;
                box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
            }
            #left{
                width: 65%;
                height: 100%;
                border-radius: 20px 0px 0px 20px;
                float: left;
                display: flex;
                background-color: white;
            }
            #right{
                width: 35%;
                height: 100%;
                border-radius: 0px 20px 20px 0px;
                float: right;
                display: flex;
            }
            #tableleft{
                width: 80%;
                height: 80%;
                margin: auto;
                text-align: left;
                font-family: "Roboto";
                color: black;
                
                
            }
            .boxtitle{
                font-weight: 350;
                font-style: normal;
                font-size: 45px;
            }
            .boxhead{
                font-weight: 500;
                font-style: normal;
                font-size: 22px;
            }
            .textarea{
                width: 400px;
                height: 60px;
                border-radius: 20px;
                background-color: #f1ecec;
                border: none;
                font-size: 35px;
                padding-left: 10px;
                color: #404040;
            }
            .textarea:focus{
                outline: none;
            }
            #right a{
                font-weight:550;
                font-size:20px;
                background-color:white; 
                color: #404040; 
                border-radius: 30px;  
                padding:10px 40px; 
                text-decoration:none;
            }
            #right a:hover{
                color: #21c1b9;
            }
            #login{
                font-weight:550;
                font-size:20px; 
                color: white;
                border-radius: 30px; 
                background-color: #21c1b9;
                width: 410px; 
                height: 50px;
                border:none;
            }
            #login:hover{
                color: #404040;
                
            }
        </style>
    </head>
    <body onload="checkpassworderror()">
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
        <div id="lower">
            <div id="box">
                <div id="left">
                    <table border="0" id="tableleft">
                        <form method="post" action="php/login_validation.php" onsubmit="return validation()">
                            <tr>
                                <td class="boxtitle" >Sign In</td>
                            </tr>
                            <tr>
                                <td class="boxhead">USERNAME</td>
                            </tr>
                            <tr>
                                <td><input type="text" class="textarea" name="username" id="username"></td>
                            </tr>
                            <tr>
                                <td class="boxhead">PASSWORD</td>
                            </tr>
                            <tr>
                                <td><input type="password" class="textarea" name="password" id="password"></td>
                            </tr>
                            <tr>
                                <td><input type="submit" id="login" value="Log In" class ="textarea"></td>
                            </tr>
                            <tr>    
                                <td><a href="" style="color:#404040; text-decoration: none;" >Forgot Password</a></td>
                            </tr>
                        </form>
                        <script type="text/javascript">
                            var username = document.getElementById("username")
                            var password = document.getElementById("password")
                            function validation(){
                                if (username.value ==""){
                                alert("username cannot be empty")
                                return false
                                }
                                if (password.value ==""){
                                    alert("password cannot be empty")
                                    return false
                                }
                                return true
                            }
                            function checkpassworderror() {
                                <?php
                                if (isset($_SESSION['password_error']) && $_SESSION['password_error']) {
                                    echo 'alert("Username or Password is wrong");';
                                    unset($_SESSION['password_error']);
                                }
                                ?>
                            }
                            
                        </script>
                    </table>
                </div>
                <div id="right" style="font-family: Roboto; color: white;" >
                    <div id="inner "style="margin: auto;">
                        <p class="boxhead" style="font-size: 45px; margin:0px; font-weight: 700;">New Here?</p>
                        <p style=" padding:10px 20px;font-size: 20px; margin-top: 0; font-weight: 370;">Register now to take back control of your dental health!</p>
                        <a href="registration.php">Register</a>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>