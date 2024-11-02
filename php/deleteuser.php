    <?php
        session_start();
        if (!isset($_SESSION['user_type'])) {
            if(!($_SESSION['user_type']=='admin' )){
                header("Location: login.php");
                exit();
            }
        }  
        $user_id = $_POST['link'];
        $db = new mysqli("localhost","root","","dental");
        if ($db->connect_error) {
            die("Connection failed: " . $db->connect_error);
        }   
        $stmt=$db->query("SELECT * FROM users WHERE user_id='$user_id'")->fetch_assoc();
        $user_type=$stmt['user_type'];
        if($user_type=="doctor"){
            $db->query("DELETE FROM locations where user_id='$user_id'");
            $db->query("DELETE FROM appointmentslots where DoctorID='$user_id'");
        }
        $query="UPDATE appointmentslots SET IsBooked=0,PatientID=NULL,ConsultType=NULL,Comments=NULL WHERE PatientID=$user_id";
        $db->query($query);
        $query="DELETE FROM users WHERE user_id='$user_id'";
        $db->query($query);
        $_SESSION['delete_user'] = true;
        header("Location: ../appointments.php");
        exit();
    ?>