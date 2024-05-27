<?php 
   session_start();

   include("config.php");
   if(!isset($_SESSION['valid'])){
    header("Location: index.php");
   }
   $announcements = [];
    $id = $_SESSION['id'];
    $select = "SELECT * FROM announcement ORDER BY date_created desc";
    $result = $con->query($select);


    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $announcements[] = $row;
        }
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
       
        
          <h1 class="mt-10 text-center text-xl font-bold">Announcements</h1>
        <div class="grid grid-cols-2 mt-10 gap-4 mb-10">
            <?php foreach($announcements as $ann): ?>
      <div class="h-56 overflow-y-auto bg-white border shadow-lg p-3 rounded-lg">
        <div class="pb-2 border-b flex justify-between items-center">

        <div class="flex items-center gap-3">
         <div class="flex flex-col">
            <span class="font-medium text-sm">Announcement</span>
            <span class="text-sm capitalize"><?php echo $ann['name'];?></span>
          </div>
        </div>
        <div class="flex flex-col">
         
          <span class="text-sm"><?php echo $formatted_date = date('F j, Y g:i A', strtotime($ann['date_created']));?></span>
        </div>
        </div>
        <div class="mt-3">
          <h1 class="font-bold mb-2"><?php echo $ann['title'];?></h1>
          <p class="text-sm"><?php echo $ann['content'];?></p>
        </div>
      </div>
    <?php endforeach;?>
        </div>
        </div>


    </main>
</body>
</html>