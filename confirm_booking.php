<?php
    session_start();
    if (!isset($_SESSION['user_type'])) {
        if(!($_SESSION['user_type']=='patient')){
            header("Location: login.php");
            exit();
        }
    }   
?>
<?php 
    $SlotID = $_POST["time"];
    $PatientID = $_SESSION["user_id"];
    $ctype = $_POST["ctype"];
    $comments = $_POST["comment"];
    echo $SlotID.$PatientID.$ctype.$comments;
    $db = new mysqli("localhost","root","","dental");
    if ($db->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $stmt=$db->query("SELECT * FROM  appointmentslots WHERE SlotID=$SlotID")->fetch_assoc();
    if ($stmt['IsBooked']==0){
        $db->query("UPDATE appointmentslots SET IsBooked=1,PatientID=$PatientID,ConsultType='$ctype',Comments='$comments' WHERE SlotID=$SlotID");
    }
    
?>