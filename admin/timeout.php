<?php 
date_default_timezone_set('Asia/Manila');
session_start();
if(!isset($_SESSION['valids']))
    header("Location: ./");


include(".././config.php");
$newTimeOut = date("Y-m-d H:i:s");
$studentId = $_GET['id']; 
$s_id = $_GET['s_id']; 
$query = "UPDATE sessions SET time_out = '$newTimeOut' WHERE student_id = '$studentId' AND session_id = '$s_id'";
$result = $con->query($query);
if (!$result) {
    $errorMessage = "Error: " . $con->error;
}
$student = null;
$query = "SELECT * FROM student WHERE id = '$studentId' LIMIT 1";
$result = mysqli_query($con, $query);
if($result && mysqli_num_rows($result) > 0)
{
    $student = mysqli_fetch_assoc($result);
}
$newSession = $student['sessions'] - 1;
$query = "UPDATE student SET sessions = '$newSession' WHERE id = '$studentId'";
$result = $con->query($query);

if (!$result) {
    $errorMessage = "Error: " . $con->error;
} 

header("Location: ./view_admin.php");
?>