<?php
session_start();
if (!isset($_SESSION['user_type']) || $_SESSION['user_type'] != 'admin') {
    header("Location: login.php");
    exit();
} 
$mysqli = new mysqli('localhost', 'root', '', 'dental');
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}
$doctorID = $_SESSION['user_id'];          
$startDate = $_POST['start_date'];       
$endDate = $_POST['end_date'];           
$startTime = $_POST['start_time'];        
$endTime = $_POST['end_time'];            
$intervalMinutes = $_POST['time_interval']; 
$intervalSeconds = $intervalMinutes * 60;
$currentDate = strtotime($startDate);
$endDate = strtotime($endDate);
$_SESSION['success']=0;
$_SESSION['fail']=0;
while ($currentDate <= $endDate) {
    $currentStartTime = strtotime($startTime);
    $currentEndTime = strtotime($endTime);
    $EndTimeCompare = date('H:i:s', $currentEndTime);
    while ($currentStartTime < $currentEndTime) {
        $slotStartTime = date('H:i:s', $currentStartTime);
        $slotEndTime = date('H:i:s', $currentStartTime + $intervalSeconds);
        $checkSql = "SELECT COUNT(*) AS count FROM AppointmentSlots WHERE DoctorID = ? AND AppointmentDate = ? 
                    AND ((StartTime < ? AND EndTime > ?) OR(StartTime >= ? AND EndTime <= ?) )";
        $stmt = $mysqli->prepare($checkSql);
        $appointmentDate = date('Y-m-d', $currentDate);
        $stmt->bind_param("isssss", 
            $doctorID, 
            $appointmentDate, 
            $slotEndTime, 
            $slotStartTime,
            $slotStartTime, 
            $slotEndTime,  
        );
        $stmt->execute();
        $stmt->bind_result($slotExists);
        $stmt->fetch(); 
        $stmt->close();
        if ($slotExists == 0 && $EndTimeCompare>=$slotEndTime) {
            $insertSql = "INSERT INTO AppointmentSlots (DoctorID, AppointmentDate, StartTime, EndTime, IsBooked) 
                          VALUES (?, ?, ?, ?, FALSE)";
            $stmt = $mysqli->prepare($insertSql);
            $stmt->bind_param("isss", $doctorID, $appointmentDate, $slotStartTime, $slotEndTime);
            $stmt->execute();
            $stmt->close();
            $_SESSION['success']+=1;
        }
        else{
            $_SESSION['fail']+=1;
        }
        $currentStartTime += $intervalSeconds;
    }
    $currentDate = strtotime("+1 day", $currentDate);
}
$_SESSION['sched_success']=true;
header("Location: ../appointments.php");
exit();
?>
