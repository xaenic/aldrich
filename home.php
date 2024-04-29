<?php 
   session_start();

   include("config.php");
   if(!isset($_SESSION['valid'])){
    header("Location: index.php");
   }

   $id = $_SESSION['id'];
   $students= [];
   $query = "SELECT * FROM sessions INNER JOIN student ON student.id = sessions.student_id WHERE student.id = '$id' AND time_out IS NOT NULL ORDER BY time_out ASC";
   $result = $con->query($query);
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $students[] = $row;
        }
    }
    $results = $con->query("SELECT * FROM student WHERE id ='$id'");
    if($results->num_rows > 0){
        $row = $results->fetch_assoc(); 
        $fname = $row['fname'];
        $lname = $row['lname'];
        $name= "$fname $lname";
        $sessions = $row['sessions'];
    }
$con->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
     <script src="https://cdn.tailwindcss.com"></script>
    <title>Home</title>
</head>
<body>
    <div class="nav">
        <div class="logo">
            <p><a href="home.php">Logo</a> </p>
        </div>

        <div class="right-links">

            <?php 
            echo "<a href='edit.php'>Change Profile</a>";
            ?>

            <a href="logout.php" class="bg-purple-600 text-white cursor-pointer rounded-md "> Log Out </a>

        </div>
    </div>
    <main>

       <div class="main-box top">
          <div class="top">
            <div class="box">
                <p>Hello <b><?php echo $_SESSION['fname'] ?></b>, Welcome</p>
            </div>
            <div class="box">
                <p>Your email is <b><?php echo $_SESSION['valid'] ?></b>.</p>
            </div>
          </div>
          <div class="bottom">
            <div class="box">
                <p>You have <b><?php echo $sessions; ?> sessions available</b>.</p> 
            </div>
          </div>
          <h1 class="mt-10 text-center text-xl font-medium">Your Session History</h1>
           <table class="mt-5 w-full text-sm text-left rtl:text-right text-white rounded-lg overflow-hidden">
                <thead class="text-xs text-black bg-white uppercase rounded-md">
                    <tr>
                       
                        <th class="border px-4 py-4 font-medium border-none  text-center">SESSION ID</th>
                        <th class="border px-4 py-4 font-medium border-none  text-center">PURPOSE</th>
                        <th class="border px-4 py-4 font-medium border-none  text-center">LABORATORY</th>
                        <th class="border px-4 py-4 font-medium border-none  text-center">TIME IN</th>
                        <th class="border px-4 py-4 font-medium border-none  text-center">TIME OUT</th>
                     
                    </tr>
                </thead>
                <tbody id="tbody" class="relative">
                    

                <?php 

            foreach ($students as $student) {
                   echo '<tr class="bg-white text-black">
                               
                                <td class="border px-4 py-4 border-none text-center text-xs md:text-sm text-black">'.$student['session_id'].'</td>
                                 <td class="border px-4 py-4 border-none text-center text-xs md:text-sm text-black">'.$student['purpose'].'</td>
                                <td class="border px-4 py-4 border-none text-center text-xs md:text-sm text-black">'.$student['laboratory'].'</td>
                              

                                <td class="border px-4 py-4 border-none text-center text-xs md:text-sm text-black">'.$student['time_in'].'</td>
                                <td class="border px-4 py-4 border-none text-center text-xs md:text-sm text-black">'.$student['time_out'].'</td>
                                </tr>';
                }
            ?>

                </tbody>

            </table>
       </div>

    </main>
</body>
</html>