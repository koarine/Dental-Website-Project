<?php
session_start();
// Database connection details
$host = 'localhost';
$dbname = 'dental';
$username = 'root';
$password = '';

// Connect to MySQL database using MySQLi
$mysqli = new mysqli($host, $username, $password, $dbname);

// Check the connection
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

// User input parameters (retrieved from a form)
$doctorID = $_SESSION['user_id'];          // Doctor ID
$startDate = $_POST['start_date'];        // Start date (e.g., '2024-10-15')
$endDate = $_POST['end_date'];            // End date (e.g., '2024-10-30')
$startTime = $_POST['start_time'];        // Start time (e.g., '09:00:00')
$endTime = $_POST['end_time'];            // End time (e.g., '17:00:00')
$intervalMinutes = $_POST['time_interval']; // Interval in minutes (e.g., 30)

// Convert input times to seconds for easier calculations
$intervalSeconds = $intervalMinutes * 60;

// Date variables for looping
$currentDate = strtotime($startDate);
$endDate = strtotime($endDate);

// Generate slots for each day within the date range
while ($currentDate <= $endDate) {
    $currentStartTime = strtotime($startTime);
    $currentEndTime = strtotime($endTime);
    $EndTimeCompare = date('H:i:s', $currentEndTime);

    // Loop through the time range for each day
    while ($currentStartTime < $currentEndTime) {
        $slotStartTime = date('H:i:s', $currentStartTime);
        $slotEndTime = date('H:i:s', $currentStartTime + $intervalSeconds);

        // Check if this new slot overlaps with any existing slots for the doctor on the same date
        $checkSql = "SELECT COUNT(*) AS count FROM AppointmentSlots 
                     WHERE DoctorID = ? 
                     AND AppointmentDate = ? 
                     AND (
                         (StartTime < ? AND EndTime > ?) OR
                         (StartTime >= ? AND EndTime <= ?) 
                     )";
        $stmt = $mysqli->prepare($checkSql);
        $appointmentDate = date('Y-m-d', $currentDate);
        $stmt->bind_param("isssss", 
            $doctorID, 
            $appointmentDate, 
            $slotEndTime,  // Existing slot starts before or overlaps the new slot's end
            $slotStartTime, // Existing slot ends after or overlaps the new slot's start
            $slotStartTime, // New slot completely overlaps an existing slot
            $slotEndTime,    // New slot completely overlaps an existing slot
            
        );
        $stmt->execute();
        $stmt->bind_result($slotExists);
        $stmt->fetch();
        $stmt->close();

        // If no overlapping slots exist, insert the new slot
        if ($slotExists == 0 && $EndTimeCompare>=$slotEndTime) {
            $insertSql = "INSERT INTO AppointmentSlots (DoctorID, AppointmentDate, StartTime, EndTime, IsBooked) 
                          VALUES (?, ?, ?, ?, FALSE)";
            $stmt = $mysqli->prepare($insertSql);
            $stmt->bind_param("isss", $doctorID, $appointmentDate, $slotStartTime, $slotEndTime);
            $stmt->execute();
            $stmt->close();
        }

        // Increment start time by the interval for the next slot
        $currentStartTime += $intervalSeconds;
    }

    // Move to the next day
    $currentDate = strtotime("+1 day", $currentDate);
}

echo "Appointment slots generated successfully!";

// Close the database connection
$mysqli->close();
?>
