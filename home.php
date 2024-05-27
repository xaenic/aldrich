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
            <a  href="./announcement.php" class="p-4 text-white bg-sky-500 rounded-md ">View Announcements</a>
                 <a  href="./reservation.php" class="p-4 text-white bg-blue-500 rounded-md ">Make Reservation</a>
            <a  href="./report.php" class="p-3 text-white bg-green-500 rounded-md ">Submit A Report</a>
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
            <div class=" mt-8 bg-white rounded-lg shadow-lg p-8  w-full">
        <h2 class="text-2xl font-semibold mb-4 text-center">LABORATORY RULES AND REGULATIONS</h2>
        <ol class="list-decimal pl-6">
            <li class="mb-2">Maintain silence, proper decorum, and discipline inside the laboratory. Mobile phones, walkmans and other personal pieces of equipment must be switched off.</li>
            <li class="mb-2">Games are not allowed inside the lab. This includes computer-related games, card games and other games that may disturb the operation of the lab.</li>
            <li class="mb-2">Surfing the Internet is allowed only with the permission of the instructor. Downloading and installing of software are strictly prohibited.</li>
            <li class="mb-2">Getting access to other websites not related to the course (especially pornographic and illicit sites) is strictly prohibited.</li>
            <li class="mb-2">Deleting computer files and changing the set-up of the computer is a major offense.</li>
            <li class="mb-2">Observe computer time usage carefully. A fifteen-minute allowance is given for each use. Otherwise, the unit will be given to those who wish to “sit-in”.</li>
            <li class="mb-2">Observe proper decorum while inside the laboratory:
                <ol class="list-disc pl-6">
                    <li>Do not get inside the lab unless the instructor is present.</li>
                    <li>All bags, knapsacks, and the likes must be deposited at the counter.</li>
                    <li>Follow the seating arrangement of your instructor.</li>
                    <li>At the end of class, all software programs must be closed.</li>
                    <li>Return all chairs to their proper places after using.</li>
                </ol>
            </li>
            <li class="mb-2">Chewing gum, eating, drinking, smoking, and other forms of vandalism are prohibited inside the lab.</li>
            <li class="mb-2">Anyone causing a continual disturbance will be asked to leave the lab. Acts or gestures offensive to the members of the community, including public display of physical intimacy, are not tolerated.</li>
            <li class="mb-2">Persons exhibiting hostile or threatening behavior such as yelling, swearing, or Disregarding requests made by lab personnel will be asked to leave the lab.</li>
            <div class="bg-slate-200 p-6 rounded-lg shadow-md">
            <h2 class="text-lg font-semibold mb-4">DISCIPLINARY ACTION</h2>
            <p class="mb-2"><strong>First Offense:</strong> The Head or the Dean or OIC recommends to the Guidance Center for a suspension from classes for each offender.</p>
            <p class="mb-2"><strong>Second and Subsequent Offenses:</strong> A recommendation for a heavier sanction will be endorsed to the Guidance Center.</p>
        </div>
        </ol>
    </div>
       </div>

    </main>
</body>
</html>