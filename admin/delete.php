<?php



session_start();
if(!isset($_SESSION['valids']))
    header("Location: ./");

include(".././config.php");
if(isset($_GET['id'])){


    $id  = $_GET['id'];
    


    $query = "DELETE FROM sessions WHERE student_id = '$id'";
    $result = $con->query($query);

    // Check if the deletion was successful
    if (!$result) {
        $errorMessage = "Error: " . $con->error;
        // Handle the error here, e.g., display an error message
        return;
    }
    $query = "DELETE FROM student WHERE id = '$id'";
    $result = $con->query($query);
    // Check if the deletion was successful
    if (!$result) {
        $errorMessage = "Error: " . $con->error;
        // Handle the error here, e.g., display an error message
        return;
    }

    header("Location: ./view_admin.php");
}

?>