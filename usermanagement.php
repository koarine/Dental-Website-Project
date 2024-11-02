<?php
    session_start();
    if (!isset($_SESSION['user_type'])) {
        if(!($_SESSION['user_type']=='admin' )){
            header("Location: login.php");
            exit();
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
                background-color: white;
                border-radius: 20px;
                width:65%;
            
                margin: auto;
                box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
                display: flex;
            }
            #table{
                margin: auto;
                text-align: left;
                font-family: "Roboto";
                width: 70%;
                margin-top:50px;
                margin-bottom:50px;

                
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
            table{
                border-collapse: collapse;
                border: 3px solid #115278 ;
                border-radius:20px;
                font:roboto;
                font-weight:600;
                font-size:18px;
            }
            td{
                text-align:center;
                min-width:150px;
                height:40px;
                border: 3px solid #115278;
                max-width:180px;
                word-wrap: break-word;
            }
            tr{
                border: 3px solid #115278 ;
            }
            input[type="submit"]{
                padding:5px 30px;
                background-color: #115278;
                
                border:none;
                border-radius:13px;
                color:white;
                font-weight:600;
                font-size:15px;
                transition:0.5s;
            }
            input[type="submit"]:hover{
               color:#404040;
               background-color:#21c1b9;

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
                <a href="contact.html">CONTACT US</a>
            </div>
            <div id="right-header">
                <a href="login.php">APPOINTMENTS</a>
            </div>
        </header>
        <div id="blank"></div>
        <div id="lower">
            <div id="box">
                <table border="1" id="table">
                    <tr><td>USER ID</td><td>USER TYPE</td><td>NAME</td><td>USERNAME</td><td>EMAIL</td> <td>EDIT</td><td>DELETE</td></tr>
                    <?php 
                        $db = new mysqli("localhost","root","","dental");
                        if ($db->connect_error) {
                            die("Connection failed: " . $conn->connect_error);
                        }
                        $stmt=$db->query("SELECT * FROM users");
                        while($row=$stmt->fetch_assoc()){
                            $user_id=$row['user_id'];
                            $user_type=$row['user_type'];
                            $user_name= $row['user_name'];
                            $username=$row['username'];
                            $email=$row['email'];
                            echo "<tr class='$user_type'><td>$user_id</td><td>$user_type</td><td>$user_name</td><td>$username</td><td>$email</td>
                            <td><form action='useredit.php' method='POST'><input type='hidden' value='$user_id' name='link'><input type='submit' value='EDIT'></form></td>
                            <td><form action='php/deleteuser.php' method='POST'><input type='hidden' value='$user_id' name='link'><input type='submit' value='DELETE'></form></td></tr>";
                        }
                    ?>

                </table>
            </div>
        </div>
    </body>
</html>