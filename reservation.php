<?php 
   session_start();
   include("config.php");
   if(!isset($_SESSION['valid'])){
    header("Location: index.php");
   }
$exist = null;
   $id = $_SESSION['id'];
$select = "SELECT * FROM student WHERE id = '$id'";
$result = $con->query($select);
$user = $result->fetch_assoc();
$sessions = $user['sessions'];
$history = [];
$id = $_SESSION['id'];
$select = "SELECT * FROM bookings WHERE student_id = $id ORDER BY date_created desc";
$result = $con->query($select);
$exist = null;
$message="";
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $history[] = $row;
    }
}
    $query = "SELECT * FROM bookings WHERE student_id = '$id'  AND status = 'Pending'";
    $s_result = $con->query($query);
    if($s_result->num_rows > 0)
    {
    $exist = $s_result->fetch_assoc();
    }
   $message = "";
   if($_SERVER['REQUEST_METHOD'] == 'POST') {
        $purpose = $_POST['purpose'];
            $laboratory = $_POST['laboratory'];
            $date = $_POST['date'];
            if($date == "" || $laboratory == "" || $date == ""){
                $message = '<span class="text-red-500 font-medium mt-5">Fill All Fields</span>';
            }else {
                $dateObject = DateTime::createFromFormat('F j, Y', $date);
                $date  = $dateObject->format('Y-m-d');
                if($exist == null) {
                $check = "SELECT * FROM student WHERE id = '$id' AND sessions > 0";
                    $r_check = $con->query($check);
                    if($r_check->num_rows > 0){
                        $query = "INSERT INTO bookings (student_id,laboratory,purpose,reservation_date) VALUES('$id','$laboratory','$purpose','$date')";
                        $result = $con->query($query);
                        if (!$result) {
                                $message = "Error: " . $con->error;
                        }else {
                            $exist ="hah"; 
                            header('Location: ./reservation.php');
                            $message = '<span class="self-center px-3 p-2 mt-5 text-xs font-semibold   bg-green-500 text-white rounded-md">Booking has been submitted.</span>';
                        }
                        
                    }else {
                        $message = '<span class="self-center px-3 p-2 mt-5 text-xs font-semibold   bg-red-500 text-white rounded-md">No Sessions Available</span>';
                    }   
                }
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
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">

<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

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
                   <?php if($exist == null) : ?>
                <p class="text-center text-xl font-medium">Make a Reservation</p> 
                <?php echo $message;?>

             
                <form action="" method="post" class="bg-white border p-10 rounded-md">
          
           <div class="self-start flex flex-col gap-2 w-full mt-5">
          <label class="">Purpose of SitIn</label>
                    <div class="flex items-center p-2 border rounded-md gap-2">
                      <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 1024 1024"><path fill="currentColor" d="M880 112H144c-17.7 0-32 14.3-32 32v736c0 17.7 14.3 32 32 32h736c17.7 0 32-14.3 32-32V144c0-17.7-14.3-32-32-32M513.1 518.1l-192 161c-5.2 4.4-13.1.7-13.1-6.1v-62.7c0-2.3 1.1-4.6 2.9-6.1L420.7 512l-109.8-92.2a7.63 7.63 0 0 1-2.9-6.1V351c0-6.8 7.9-10.5 13.1-6.1l192 160.9c3.9 3.2 3.9 9.1 0 12.3M716 673c0 4.4-3.4 8-7.5 8h-185c-4.1 0-7.5-3.6-7.5-8v-48c0-4.4 3.4-8 7.5-8h185c4.1 0 7.5 3.6 7.5 8z"/></svg>
                      <select name="purpose" class="w-full">
                                  <option value="Java">Java</option>
                                  <option value="Python">Python</option>
                                  <option value="C">C</option>
                                  <option value="C++">C++</option>
                                  <option value="C#">C#</option>
                                  <option value="Others">Others</option>
                              </select>
                    </div>
                            
                    
                    
                </div>
                <div class="flex flex-col gap-2 w-full mt-5">
                    <label class="">Laboratory</label>
                    <div class="flex items-center p-2 border rounded-md gap-2">

                   <svg xmlns="http://www.w3.org/2000/svg" width="1.25em" height="1em" viewBox="0 0 640 512"><path fill="currentColor" d="M384 96v224H64V96zM64 32C28.7 32 0 60.7 0 96v224c0 35.3 28.7 64 64 64h117.3l-10.7 32H96c-17.7 0-32 14.3-32 32s14.3 32 32 32h256c17.7 0 32-14.3 32-32s-14.3-32-32-32h-74.7l-10.7-32H384c35.3 0 64-28.7 64-64V96c0-35.3-28.7-64-64-64zm464 0c-26.5 0-48 21.5-48 48v352c0 26.5 21.5 48 48 48h64c26.5 0 48-21.5 48-48V80c0-26.5-21.5-48-48-48zm16 64h32c8.8 0 16 7.2 16 16s-7.2 16-16 16h-32c-8.8 0-16-7.2-16-16s7.2-16 16-16m-16 80c0-8.8 7.2-16 16-16h32c8.8 0 16 7.2 16 16s-7.2 16-16 16h-32c-8.8 0-16-7.2-16-16m32 160a32 32 0 1 1 0 64a32 32 0 1 1 0-64"/></svg>
                    <select name="laboratory" class="w-full">
                        <option value="Lab 524">Lab 524</option>
                        <option value="Lab 526">Lab 526</option>
                        <option value="Lab 528">Lab 528</option>
                        <option value="Lab 542">Lab 542</option>
                        <option value="Lab 543">Lab 543</option>
                    </select>
                    </div>
                    
                </div>
              <div class="flex flex-col gap-2 w-full mt-5">
                    <label class="text-gray-700">Select Date</label>

                        <div class="border rounded-md">
                            <input type="text" name="date" id="datetimepicker" placeholder="From Date" class="outline-none px-3 p-3 rounded-md form-input w-full">
                        </div>
                </div>
                <div class="bg-green-500 px-3 p-2 text-white text-center mt-3 rounded-md"> 
                  <button class="w-full">Reserve</button>
                </div>
         </form>
         <?php else :?>
   <p class="text-center text-xl font-medium">You have pending reservation</p> 
            <?php endif;?>

             <h1 class="mt-5 text-xl font-bold mb-5">Booking History</h1>
         <table id="oktable" class=" mb-10 w-full text-sm text-left rtl:text-right text-white rounded-lg overflow-hidden">
                <thead class="text-xs bg-gradient-to-l t to-green-500 from-sky-400 uppercase rounded-md">
                    <tr>
                       
                        <th class="border px-4 py-4 font-medium border-none  text-center">BOOKING ID</th>
                        <th class="border px-4 py-4 font-medium border-none  text-center">PURPOSE</th>
                        <th class="border px-4 py-4 font-medium border-none  text-center">LABORATORY</th>
                        <th class="border px-4 py-4 font-medium border-none  text-center">RESERVATION DATE</th>
                        <th class="border px-4 py-4 font-medium border-none  text-center">STATUS</th>
                    </tr>
                </thead>
                <tbody id="tbody" class="relative">
                    

                <?php 

            foreach ($history as $student) {
                $status = $student['status'];
                if($student['status'] == 'Pending') {
                    $status  = '<span class="mr-5"></span> <a class="bg-rose-600 p-3 rounded-md" href="./cancel.php?id='.$student['id'].'">Cancel Booking</a>';
                }
                   echo '<tr class="odd:bg-green-500 bg-sky-700">
                                <td class="border px-4 py-4 border-none text-center text-xs md:text-sm text-white">'.$student['id'].'</td>
                              
                                <td class="border px-4 py-4 border-none text-center text-xs md:text-sm text-white">'.$student['purpose'].'</td>
                                <td class="border px-4 py-4 border-none text-center text-xs md:text-sm text-white">'.$student['laboratory'].'</td>
                                <td class="border px-4 py-4 border-none text-center text-xs md:text-sm text-white">'.date('F j, Y', strtotime($student['reservation_date'])).'</td>
                                <td class="border px-4 py-4 border-none text-center text-xs md:text-sm text-white">'.$status.'</td></tr>
                                ';
                }
            ?>

                </tbody>

            </table>
            </div>
        
          </div>
          

           
       </div>

    </main>
             <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

             <script>
                $(document).ready(function() {
  
    flatpickr('#datetimepicker', {
                dateFormat: "F j, Y",
                onChange: function(selectedDates, dateStr, instance) {
                    const selectedDate = formatDate(dateStr);
                    let data = "";
                    students.forEach(student => {
                        const studentDate = student.time_in.split(' ')[0];
                        const time_in = new Date(student.time_in).toLocaleString('en-US', { month: 'long', day: '2-digit', year: 'numeric', hour: '2-digit', minute: '2-digit', second: '2-digit' });
                         const time_out = new Date(student.time_in).toLocaleString('en-US', { month: 'long', day: '2-digit', year: 'numeric', hour: '2-digit', minute: '2-digit', second: '2-digit' });
                        if(selectedDate == studentDate) {
                            const statusElement = student.time_out !== null 
                            ? `<span href="#" class="text-white bg-green-500 px-3 p-2 rounded-md">Finished</span>` 
                            : `<a href="./timeout.php?id=${student['id']}&s_id=${student['session_id']}" class="text-white bg-red-500 px-3 p-2 rounded-md">Logout</a>`;
                            data += studentRow(student,statusElement,time_in,time_out);
                        }
                       
                    })
                   if(data != "")
                   $("#tbody").html(data)
                   else 
                    $("#tbody").html('<span class="text-xl font-semibold text-purple-700 text-center w-full">No records found</span>')
                }
            
            });

})
             </script>
</body>
</html>