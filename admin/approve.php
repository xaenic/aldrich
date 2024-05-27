<?php 
date_default_timezone_set('Asia/Manila');
session_start();
if(!isset($_SESSION['valids']))
    header("Location: ./");
include(".././config.php");

$studentId = $_GET['id']; 
$query = "UPDATE bookings SET status = 'Approved' WHERE id = $studentId";
$result = $con->query($query);


$query = "SELECT * FROM bookings WHERE id = '$studentId'";
    $result = mysqli_query($con, $query);
    if($result && mysqli_num_rows($result) > 0)
    {
        $student = mysqli_fetch_assoc($result);
        $id = $student['student_id'];
        $laboratory = $student['laboratory'];
        $purpose = $student['purpose'];
        $query = "INSERT INTO sessions (student_id,laboratory,purpose,time_in) VALUES('$id','$laboratory','$purpose',null)";
        $result = $con->query($query);
            if (!$result) {
                    $errorMessage = "Error: " . $con->error;
            }
        echo "gg";
    }
if (!$result) {
    $errorMessage = "Error: " . $con->error;
}
if (!$result) {
    $errorMessage = "Error: " . $$on->error;
} 

header("Location: ./reservations.php");
?>


