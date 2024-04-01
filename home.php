<?php 
   session_start();

   include("config.php");
   if(!isset($_SESSION['valid'])){
    header("Location: index.php");
   }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Home</title>
</head>
<body>
    <div class="nav">
        <div class="logo">
            <p><a href="home.php">Logo</a> </p>
        </div>

        <div class="right-links">

            <?php 
            
            $idno = $_SESSION['idno'];
            $query = mysqli_query($con,"SELECT*FROM student WHERE idno=$idno");

            while($result = mysqli_fetch_assoc($query)){
                $res_fname = $result['fname'];
                $res_email = $result['email'];
                $res_age = $result['age'];
                $res_idnno = $result['idno'];
                   $sessions = $result['sessions'];
            }
            //edit.php?Id=$res_id
            echo "<a href='edit.php'>Change Profile</a>";
            ?>

            <a href="logout.php"> <button class="btn">Log Out</button> </a>

        </div>
    </div>
    <main>

       <div class="main-box top">
          <div class="top">
            <div class="box">
                <p>Hello <b><?php echo $res_fname ?></b>, Welcome</p>
            </div>
            <div class="box">
                <p>Your email is <b><?php echo $res_email ?></b>.</p>
            </div>
          </div>
          <div class="bottom">
            <div class="box">
                <p>You have <b><?php echo $sessions; ?> sessions available</b>.</p> 
            </div>
          </div>
       </div>

    </main>
</body>
</html>