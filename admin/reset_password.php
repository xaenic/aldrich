<?php 
date_default_timezone_set('Asia/Manila');
session_start();
if(!isset($_SESSION['valids']))
    header("Location: ./");

include(".././config.php");

$studentId = $_GET['id']; 
$k = $_GET['sid']; 
$query = "UPDATE student SET password = '123456' WHERE id = '$studentId'";
$result = $con->query($query);
if (!$result) {
    $errorMessage = "Error: " . $con->error;
}
if (!$result) {
    $errorMessage = "Error: " . $con->error;
} 

$_SESSION['msg'] =  '<span class="text-xl font-bold text-green-500">Password has been reset to 123456.</span>';
header('Location: ./search_admin.php?search=' . $k);
?>
