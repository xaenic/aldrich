<?php 
   session_start();
   include("config.php");
   if(!isset($_SESSION['valid'])){
    header("Location: index.php");
   }

   $id = $_SESSION['id'];

   $message = "";
   if($_SERVER['REQUEST_METHOD'] == 'POST') {

        $feedback = $_POST['feedback'];
        if($feedback == "")
            $message = '<span class="text-red-600 font-medium">Your feedback is required.</span>';
        else {
            $query = "INSERT INTO feedback (student_id,content) VALUES('$id','$feedback')";
            $result = $con->query($query);
            $message = '<span class="text-green-600 font-medium">Submitted Successfully!</span>';
        }
   }
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
                <p class="text-center text-xl font-medium">Write A Report / Feedback</p> 
                <?php echo $message;?>
                <form action="" method="post"class="w-full border p-5 rounded-md">
                    <span>Your Feedback</span>
                        <div class="mt-3 w-full bg-slate-200 text-black rounded-md px-3 p-2 text-sm">
                            <textarea id="feedback" name="feedback" rows="5" cols="140" class="bg-transparent outline-none"></textarea>
                        </div>
                    <div class="mt-2 flex justify-end">
                        <button class="p-3 text-white bg-gray-700 rounded-md">Submit Report</button>
                    </div>
                </form>
            </div>
        
          </div>
          

           
       </div>

    </main>
</body>
</html>