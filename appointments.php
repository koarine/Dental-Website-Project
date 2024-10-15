<?php
    session_start();
    if (!isset($_SESSION['user_type'])) {
        if(!($_SESSION['user_type']=='patient' || $_SESSION['user_type']=='doctor' )){
            header("Location: login.php");
            exit();
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
    <script src="javascript/scrollfunction.js"></script>
    <head>
        <title>Radiant Smiles Dental | Home</title>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
        <style>
            html{
                height:100%;
                min-height: 1080x;
                padding:0;
                border:0;
                min-width: 1850px;
                scroll-behavior: smooth;
                overflow: hidden;
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
            }
            #page a{
                font-size: 23px;
                font-weight: 550;
                color: white;
                text-decoration: none;
                text-align: center;
                background-color: #21c1b9;
                
                padding: 35px 180px;
                border-radius: 12px;
                box-shadow: rgba(0, 0, 0, 0.15) 0px 3px 3px 0px;
                margin-top:200px;
            }
            #page a:hover{
                color: #404040;
                
            }
            #wb{
                font-size:60px;
                font-weight:600;
                color:#404040;
                padding-top:200px;
                
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
                    <p id="wb">Welcome Back, <?php echo $_SESSION['user_name']; ?></p>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
        <?php
            if($_SESSION['user_type']=='patient'){
                echo'
                    <a href="" id="logout" class="">VIEW APPOINTMENTS</a>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <a href="" style ="padding: 35px 157px;" id="logout">BOOK NEW APPOINTMENT</a>
                </div>
                ';
            }
            else{
                echo'
                    <a href="" class="" style="padding: 35px 210px;">VIEW SCHEDULE</a>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <a href="" style ="padding: 35px 218px;" >SET SCHEDULE</a>
                </div>
                ';
            }
            exit();
        ?>
    </body>
</html>
