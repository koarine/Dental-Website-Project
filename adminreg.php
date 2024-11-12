<?php
    session_start();
    if (!isset($_SESSION['user_type']) || $_SESSION['user_type'] != 'admin') {
        header("Location: login.php");
        exit();
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
                height:94%;
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
                font-size: 45px;
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
            select {
            -webkit-appearance: none;
            -moz-appearance: none;
            text-indent: 1px;
            text-overflow: '';
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
                    <form method="post" onsubmit="return validation()" action="php/adminreg_validation.php">
                        <tr style="height: 70px;">
                            <td class="boxtitle">CREATE USER</td>
                        </tr>
                        <tr>
                            <td class="boxhead">NAME</td>
                        </tr>
                        <tr>
                            <td><input type="text" class="textarea" id="name" name="name"></td>
                        </tr>
                        <tr>
                            <td class="boxhead">EMAIL</td>
                        </tr>
                        <tr>
                            <td><input type="text" class="textarea" id="email" name="email"></td>
                        </tr>
                        <tr>
                            <td class="boxhead" class="textarea">USERNAME</td>
                        </tr>
                        <tr>
                            <td><input type="text" class="textarea" id="username" name="username"></td>
                        </tr>
                        <tr>
                            <td class="boxhead">PASSWORD</td>
                        </tr>
                        <tr>
                            <td><input type="password" class="textarea" id="password" name="password"></td>
                        </tr>
                        <tr>
                            <td class="boxhead">CONFIRM PASSWORD</td>
                        </tr>
                        <tr>
                            <td><input type="password" class="textarea" id="confirmpassword"></td>
                        </tr>
                        <tr>
                            <td class="boxhead">USER TYPE</td>
                        </tr>
                        <tr>
                            <td>
                                <select style="width:313px;"class="textarea" id="user-role" name="user-role" onchange="utypecheck()" >
                                    <option value="admin">Admin</option>
                                    <option value="patient">Patient</option>
                                    <option value="doctor" selected>Doctor</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td class="boxhead">CLINIC</td>
                        </tr>
                        <tr>
                            <td>
                                <select style="width:313px;"class="textarea" id="clinic" name="clinic">
                                    <option value="1" selected>Jurong East Clinic</option>
                                    <option value="2">Bishan Clinic</option>
                                </select>
                            </td>
                        </tr>
                        <tr style="height: 80px;">
                            <td><input type="submit" id="login" value="Register" class="textarea"></td>
                        </tr>
                        
                    </form>
                    <script type = "text/javascript">
                        var utype = document.getElementById("user-role")
                        var clinic = document.getElementById("clinic")
                        var nametext = document.getElementById("name")
                        var email = document.getElementById("email")
                        var username = document.getElementById("username")
                        var password = document.getElementById("password")
                        var confirmpassword = document.getElementById("confirmpassword")
                        function utypecheck(){
                            if (utype.value=="doctor"){
                                clinic.value=1
                                clinic.disabled=false
                            }
                            else{
                                clinic.value=""
                                clinic.disabled=true
                            }
                        }
                        function validation(){
                            if(nametext.value==""){
                                alert("name field cannot be empty")
                                return false
                            }
                            else{
                                var regexp = /^[a-zA-Z][a-zA-Z ]*$/
                                if(!regexp.test(nametext.value)){
                                    alert("name field can only contain spaces and alphabets")
                                    return false
                                }
                            }
                            if(email.value==""){
                                alert("email field cannot be empty")
                                return false
                            }
                            else{
                                var regexp = /^[\w-]+@[\w]+(\.[\w]+){1,3}$/ 
                                if(!regexp.test(email.value)){
                                    alert("email can only contain word characters (hyphen only for name), no more than 4 domain names.")
                                    return false
                                }
                            }
                            if(username.value==""){
                                alert("username field cannot be empty")
                                return false
                            }
                            else{
                                var regexp = /^[a-zA-Z0-9]{5,15}$/ 
                                if(!regexp.test(username.value)){
                                    alert("username can only contain alphabet letters and numbers min-length of 5 and max-length of 15")
                                    return false
                                }
                            }
                            if(password.value==""){
                                alert("password field cannot be empty")
                                return false
                            }
                            else{
                                var regexp = /^[a-zA-Z0-9?!#]{6,}$/ 
                                if(!regexp.test(password.value)){
                                    alert("password can only contain alphabet letters,numbers and special characters(?,!,#) min-length of 6")
                                    return false
                                }
                            }
                            if(confirmpassword.value==""){
                                alert("confirm password field cannot be empty")
                                return false
                            }
                            else{
                                if(confirmpassword.value!=password.value){
                                    alert("confirm password must match password")
                                    return false
                                }
                            }
                            return true
                        }a
                        
                    </script>
                </table>
            </div>
        </div>
    </body>
</html>
