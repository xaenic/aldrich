<?php 
date_default_timezone_set('Asia/Manila');
session_start();
   include("config.php");


$studentId = $_GET['id']; 
$query = "UPDATE bookings SET status = 'Cancelled' WHERE id = '$studentId'";
$result = $con->query($query);
if (!$result) {
    $errorMessage = "Error: " . $con->error;
}
if (!$result) {
    $errorMessage = "Error: " . $con->error;
} 

echo '<span class="text-xl font-bold text-green-500">Booking has been cancelled.</span>';

header('Location: ./reservation.php');
?>


