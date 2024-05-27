<?php 
date_default_timezone_set('Asia/Manila');
session_start();
if(!isset($_SESSION['valids']))
    header("Location: ./");



include(".././config.php");
$newTimeOut = date("Y-m-d H:i:s");
$studentId = $_GET['id']; 
$s_id = $_GET['s_id']; 
$query = "UPDATE sessions SET time_in = '$newTimeOut' WHERE student_id = '$studentId' AND session_id = '$s_id'";
$result = $con->query($query);
if (!$result) {
    $errorMessage = "Error: " . $con->error;
}

if (!$result) {
    $errorMessage = "Error: " . $con->error;
} 

header("Location: ./view_admin.php");
?>