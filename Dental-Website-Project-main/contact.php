<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css">
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
    <script src="javascript/scrollfunction.js"></script>
    <title>Radiant Smiles Dental | Contact Us</title>
    <style>
        html{height: 100%;
                min-height: 1080x;
                padding:0;
                border:0;
                min-width: 1850px;
            }
            body{background-color: white;
                font-family:Verdana, Arial, sans-serif;
                height:100%;
                margin:0 ;
                overflow:hidden;
            }
            p{
                border:0;
                margin:0;
            }
            header{
                background-color: #21c1b9;
                height:15%;
                width: 100%;
                border: 0;
                position:fixed;
                min-width: 1050px;
                min-height:138px;
                z-index: 100;
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
                font-family: "Roboto", sans-serif;
                font-weight: 600;
                color: white;
                padding: 20px 15px;
                border-radius: 12px;
                text-decoration: none;
            }
            #mid-header a:hover{
                font-size: 23px;
                font-family: "Roboto", sans-serif;
                font-weight: 600;
                background-color: white;
                padding: 20px 15px;
                border-radius: 12px;
                box-shadow: 2px 3px 3px #404040;
                color:#404040;
            }
            #right-header a{
                font-size: 23px;
                font-family: "Roboto", sans-serif;
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
                font-size: 23px;
                font-family: "Roboto", sans-serif;
                font-weight: 550;
                color: #21c1b9;
                text-decoration: none;
                text-align: center;
                margin: auto;
                background-color: white;
                padding: 20px 15px;
                border-radius: 12px;
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

            /* ====== ANIMATIONS ===== */
            @keyframes fadeIn {
                0% {
                    opacity: 0;
                }
                100% {
                    opacity: 1;
                }
            }
            @keyframes slideIn {
                0% {
                    transform: translateY(100%);
                    opacity: 0;
                }
                100% {
                    transform: translateY(0);
                    opacity: 1;
                }
            }

            #page1{
                height:100%;
                width:100%;
                /* background-color: rgb(238, 255, 235); */
                background-image: url(images/contact_wallpaper.jpg);
                background-size: cover;
                background-position: center;
                background-repeat: no-repeat;
                min-height:900px;
            }
            #page1-maintext {
                padding-top: 12.5%;
                text-align: center;
            }
            #page1-maintext h1 {
                font-size: 92px;
                font-weight: 700;
                font-style: normal;
                color: #115278;
                font-style: italic;
                font-family: "Roboto", system-ui;
                animation: fadeIn ease 1s;
                animation-iteration-count: 1;
                animation-fill-mode: forwards;
            }
            #page1-maintext h2 {
                font-size: 35px;
                color: black;
                text-align: center;
                padding: 0 10%;
                animation: slideIn ease 1s;
                animation-iteration-count: 1;
                animation-fill-mode: forwards;
                animation-delay: 0.5s;
                opacity: 0;
            }
            #page1-contact-details {
                justify-content: center;
                display: flex;
                font-size: 20px;
                animation: slideIn 1s ease;
                animation-iteration-count: 1;
                animation-fill-mode: forwards;
                animation-delay: 1s;
                opacity: 0;
            }
            #page1-contact-details1 {
                padding: 0 20px 0 0;
                font-family: "Roboto", system-ui;
            }
            #page1-contact-details2 {
                padding: 0 0 0 0;
                font-family: "Roboto", system-ui;
            }
            #page1-button-wrapper {
                justify-self: center;
                margin-top: 30px;
                animation: fadeIn ease 1s;
                animation-iteration-count: 1;
                animation-fill-mode: forwards;
                animation-delay: 2s;
                opacity: 0;
            }
            #page1-button-wrapper button {
                font-size: 23px;
                font-family: "Roboto", sans-serif;
                font-weight: 550;
                color: white;
                text-decoration: none;
                text-align: center;
                margin: auto;
                background-color: #115278;
                padding: 20px 15px;
                border-radius: 12px;
                transition: 0.3s ease;
            }
            #page1-button-wrapper button:hover {
                transition: 0.3s ease;
                font-size: 23px;
                font-family: "Roboto", sans-serif;
                font-weight: 550;
                color: #404040;
                text-decoration: none;
                text-align: center;
                margin: auto;
                background-color: #21c1b9;
                padding: 20px 15px;
                border-radius: 12px;
            }

            #page2 {
                height:85%;
                width:100%;
                background-color: #eeffeb;
                min-height:700px;
            }
            #page2-container {
                width: 100%;
                height: 100%;
                align-items: center;
                align-content: center;
            }
            #page2-contact-form {
                width: 30%;
                margin-right: auto;
                margin-left: auto;
                
                border-radius: 20px;
                background-color: #21c1b9;
                box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;
            }
            #page2-contact-form form {
                background-color: white;
                padding: 0 0 10% 0;
                border-radius: 20px;
                justify-items: center;
                border: 1px #404040 solid;
            }
            #page2-form-title {
                padding: 25px 0;
            }
            #page2-form-title p {
                font-family: Roboto, sans-serif;
                font-size: 40px;
                font-style: normal;
            }
            .page2-form-wrapper {
                display: flex;
                justify-content: space-between;
                width: 100%;
            }
            #page2-first-name {
                margin-left: 10%;
                margin-bottom: 20px;
            }
            #page2-last-name {
                margin-right: 10%;
                margin-bottom: 20px;
            }
            #page2-email {
                margin-left: 10%;
                margin-bottom: 20px;
            }
            #page2-phone {
                margin-right: 10%;
                margin-bottom: 20px;
            }
            #page2-text-input {
                margin-bottom: 15px;
            }
            #page2-submit {
                width: 70%;
            }
            #submit {
                width: 100%;
                font-size: 18px;
                font-family: Roboto, sans-serif;
                font-weight: 550;
                color: white;
                background-color: #115278;
                text-align: center;
                padding: 10px 60px;
                border: 0;
                border-radius: 12px;
                transition: 0.3s ease;
            }
            #submit:hover {
                color: #404040;
                background-color: #21c1b9;
                transition: 0.3s ease;
            }
            .asterisk {
                color: red;
            }
            .userinput {
                font-size: 16px;
                padding: 5px;
                background-color: rgb(240, 240, 240);
                border: none;
                border-radius: 5px;
            }

            #page3 {
                height:85%;
                width:100%;
                background-color: white;
                min-height:700px;
            }
            #page3-text {
                font-family: Roboto, sans-serif;
                font-style: italic;
                color: #115278;
                padding-top: 1%;
                text-align: center;
            }
            #page3-text h1 {
                font-size: 80px;
            }
            #page3-map {
                width: 900px;
                height: 470px;
                margin-top: 60px;
                margin-left: auto;
                margin-right: auto;

                border-width: 1px 1px 1px 1px;
                border-style: solid;
                border-color: #404040;
                border-radius: 40px;
                position: relative;
                overflow: hidden;

                /* border: 1px solid black;
                text-align: center;
                margin: 0 15%;
                height: 55%;
                z-index: 0;
                position: relative; */
            }
            #page3-map iframe {
                position: absolute;
                top: -50px;
                left: -4px;
            }

            #page4 {
                height:85%;
                width:100%;
                background-color: rgb(238, 255, 235);
                min-height:700px;
                display: flex;
                align-items: center;
                justify-content: center;
            }
            .page4-boxes {
                background-color: rgb(250, 250, 250);
                box-shadow: 
                rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;
                transition: 0.3s ease;
            }
            .page4-boxes:hover {
                transition: 0.3s ease;
                scale: 1.05;
                box-shadow: 
                rgba(50, 50, 93, 0.25) 0px 50px 100px -20px, 
                rgba(0, 0, 0, 0.3) 0px 30px 60px -30px;
            }
            #page4-left {
                border: #404040 1px solid;
                border-radius: 10%;
                height: max-content;
                margin-right: 10%;
                padding: 10px 20px 40px 20px;
            }
            #page4-left h1 {
                font-family: Roboto, sans-serif;
                font-size: 45px;
                color: #115278;
                font-weight: 550;
            }
            #page4-right {
                border: #404040 1px solid;
                border-radius: 10%;
                height: max-content;
                padding: 10px 20px 40px 20px;
            }
            #page4-right h1 {
                font-family: Roboto, sans-serif;
                font-size: 45px;
                color: #115278;
                font-weight: 550;
            }

            .details {
                display: flex;
                align-items: center;
            }
            .booknow-button-wrapper {
                text-align: center;
            }
            .booknow-button {
                font-size: 23px;
                font-family: roboto;
                font-weight: 550;
                color: white;
                background-color: #115278;
                text-align: center;
                margin: auto;
                padding: 20px 15px;
                border: 0;
                border-radius: 12px;
                margin-top: 25px;
                transition: background-color 0.3s ease;
            }
            .booknow-button-link {
                text-decoration: none;
                color: inherit;
            }
            .booknow-button:hover {
                color: #404040;
                background-color: #21c1b9;
            }
    </style>
</head>
<body>
    <header>
        <div id="left-header">
            <a href="index.html"><img src="images/logo.png" height = 85%></a>
        </div>
        <div id="mid-header">
            <a href="services.html" style="margin-left:2%">OUR SERVICES</a> <!-- Style Overwrite -->
            <a href="about.html">ABOUT US</a>
            <a href="contact.php">CONTACT US</a>
        </div>
        <div id="right-header">
            <a href="login.php">APPOINTMENTS</a>
        </div>
    </header>

    <div id="page1">
        <div id="page1-maintext">
            <h1>Contact Radiant Smiles Dental</h1>
            <h2>Have questions? Your concerns matter to us. Reach out, and we'll ensure all your questions are addressed promptly.</h2>
        </div>
        <div id="page1-contact-details">
            <div id="page1-contact-details1" class="details">
                <img src="images/email-1-svgrepo-com.svg" alt="email-icon" height="30px">
                <span>&nbsp;contact@radiantsmilesdental.com.sg</span>
            </div>
            <div id="page1-contact-details2" class="details">
                <img src="images/phone-svgrepo-com.svg" alt="phone-icon" height="20px">
                <span>&nbsp;+65 6000 1111</span>
            </div>
        </div>
        <div id="page1-button-wrapper">
            <button onclick="scrollToSection()">
                <p>CONTACT US</p>
            </button>
        </div>
    </div>

    <div id="page2">
        <div id="page2-container">
            <div id="page2-contact-form">
                <form action="" method="post" onsubmit="validateForm()">
                    <div id="page2-form-title">
                        <p>Get in Touch</p>
                    </div>
                    <div class="page2-form-wrapper">
                        <div id="page2-first-name">
                            <label for="first-name"><span class="asterisk">*</span>First Name:</label><br>
                            <input 
                            type="text" 
                            name="first-name" 
                            id="first-name"
                            class="userinput"
                            size="20"
                            placeholder="Required"
                            pattern="^[a-zA-Z][a-zA-Z ]*$"
                            required
                            >
                        </div>
                        <div id="page2-last-name">
                            <label for="last-name"><span class="asterisk">*</span>Last Name:</label><br>
                            <input 
                            type="text" 
                            name="last-name" 
                            id="last-name"
                            class="userinput"
                            size="20"
                            placeholder="Required"
                            pattern="^[a-zA-Z][a-zA-Z ]*$"
                            required
                            >
                        </div>
                    </div>
                    <div class="page2-form-wrapper">
                        <div id="page2-email">
                            <label for="email"><span class="asterisk">*</span>Email Address:</label><br>
                            <input 
                            type="email" 
                            name="email" 
                            id="email"
                            class="userinput"
                            size="20"
                            placeholder="Required"
                            pattern="^[\w-]+@[\w]+(\.[\w]+){1,3}$"
                            required
                            >
                        </div>
                        <div id="page2-phone">
                            <label for="phone">Phone Number:</label><br>
                            <input 
                            type="tel" 
                            name="phone" 
                            id="phone"
                            class="userinput"
                            size="20"
                            pattern="[0-9]{4}[0-9]{4}"
                            placeholder="e.g. 95554444"
                            >
                        </div>
                    </div>
                    <div id="page2-text-input">
                        <label for="message"><span class="asterisk">*</span>How can we help you?</label><br>
                        <textarea 
                        name="message"
                        id="message"
                        class="userinput"
                        rows="5"
                        cols="48"
                        placeholder="Type in your statement here..."
                        required
                        ></textarea>
                    </div>
                    <div id="page2-submit">
                        <button type="submit" id="submit">SEND</button>
                    </div>
                </form>
                <?php
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    $firstName = $_POST['first-name'];
                    $lastName = $_POST['last-name'];
                    $email = $_POST['email'];
                    $phone = $_POST['phone'];
                    $message = $_POST['message'];

                    $to = 'f32ee@localhost';
                    $subject = 'Contact Form Submission from '.$firstName.' '.$lastName;
                    $message = "Name: $firstName $lastName\n".
                                "Phone: $phone\n".
                                "Message:\n$message";

                    $headers = 'From: '.$email."\r\n".'Reply-To: f32ee@localhost'."\r\n".'X-Mailer: PHP/'.phpversion();
                    
                    if (mail($to, $subject, $message, $headers, '-ff32ee@localhost')) {
                        echo "<script>
                        alert('Message successfully sent!');
                        </script>";
                    }
                    else {
                        echo "<script>
                        alert('Failed to send email.');
                        </script>";
                    }
                }
                
                
                ?>
            </div>
        </div>
    </div>

    <div id="page3">
        <div id="page3-text">
            <h1>Our Clinic Locations in Singapore</h1>
        </div>
        <div id="page3-map">
            <iframe src="https://www.google.com/maps/d/u/0/embed?mid=11xwnkbjIFIxmA_Jyb0E97JPBredro7g&ehbc=2E312F&noprof=1&z=13" width="910" height="532"></iframe>
        </div>
    </div>

    <div id="page4">
        <div id="page4-left" class="page4-boxes">
            <h1>Jurong East</h1>
            <h2>50 Jurong Gateway Rd <br>
                Jem #02-07 <br>
                Singapore 608549
            </h2>
            <div class="clinic-contact-details">
                <div class="details">
                    <img src="images/phone-calling-svgrepo-com.png" alt="phone" height="40px">
                    <span>&nbsp;&nbsp;(+65) 6823 5148</span>
                </div>
                <div class="details">
                    <img src="images/whatsapp-svgrepo-com.png" alt="whatsapp" height="40px">
                    <span>&nbsp;&nbsp;(+65) 9898 2342</span>
                </div>
                <div class="details">
                    <img src="images/email-1-svgrepo-com.png" alt="email" height="40px">
                    <span>&nbsp;&nbsp;jurong@radiantsmilesdental.com.sg</span>
                </div>
                <div class="details">
                    <img src="images/calendar-svgrepo-com (1).png" alt="calendar" height="40px">
                    <span>&nbsp;&nbsp;Mon-Sun, 9:00 am-9:00 pm</span>
                </div>
                <div class="booknow-button-wrapper">
                    <button class="booknow-button"><a href="login.php" class="booknow-button-link">BOOK NOW</a></button>
                </div>
            </div>
        </div>
        <div id="page4-right" class="page4-boxes">
            <h1>Bishan</h1>
            <h2>9 Bishan Pl <br>
                Junction 8 #02-65 <br>
                Singapore 579837 
            </h2>
            <div class="clinic-contact-details">
                <div class="details">
                    <img src="images/phone-calling-svgrepo-com.png" alt="phone" height="40px">
                    <span>&nbsp;&nbsp;(+65) 6823 5200</span>
                </div>
                <div class="details">
                    <img src="images/whatsapp-svgrepo-com.png" alt="whatsapp" height="40px">
                    <span>&nbsp;&nbsp;(+65) 9898 2400</span>
                </div>
                <div class="details">
                    <img src="images/email-1-svgrepo-com.png" alt="email" height="40px">
                    <span>&nbsp;&nbsp;bishan@radiantsmilesdental.com.sg</span>
                </div>
                <div class="details">
                    <img src="images/calendar-svgrepo-com (1).png" alt="calendar" height="40px">
                    <span>&nbsp;&nbsp;Mon-Sun, 9:00 am-9:00 pm</span>
                </div>
                <div class="booknow-button-wrapper">
                    <button class="booknow-button"><a href="login.php" class="booknow-button-link">BOOK NOW</a></button>
                </div>
            </div>
        </div>
    </div>

    <script>        
        // button scroll
        function scrollToSection() {
            const scrollAmount = window.innerHeight * 0.85;
            const scrollTo = window.scrollY + scrollAmount;

            window.scrollTo({
                top: scrollTo,
                behavior: 'smooth'
            });
        }
    </script>
</body>
</html>
