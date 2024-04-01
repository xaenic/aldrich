
<?php 

session_start();

if(!isset($_SESSION['valids']))
    header("Location: ./");
include(".././config.php");
$student = null;
$error= null;
if(isset($_GET['search']))
{
    $idno = $_GET['search'];
     $results = $con->query("SELECT * FROM student WHERE idno ='$idno'");

     if($results->num_rows > 0){
      $student = $results->fetch_assoc();
     }
}
$ok = false;
if($student != null) {
    $atay = $student['id'];
    $ok = $con->query("SELECT * FROM sessions WHERE student_id = '$atay'  AND time_out IS NULL");
}

if(isset($_POST['id'])){

    

    $id = $_POST['id'];
    $laboratory = $_POST['laboratory'];
    $purpose = $_POST['purpose'];

    $results = $con->query("SELECT * FROM sessions WHERE student_id = '$id'  AND time_out IS NULL");
    if($results->num_rows <= 0)
    {

    if($student['sessions'] > 0) {
       $query = "INSERT INTO sessions (student_id,laboratory,purpose) VALUES('$id','$laboratory','$purpose')";
    $result = $con->query($query);
    if (!$result) {
            $errorMessage = "Error: " . $con->error;
            return;
    }
        header('Location: ./view_admin.php');
    }else {
      $error ="No available sessions";
    }
   
    }
}

?>



<!doctype html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
<div class="min-h-screen flex  bg-gray-50 text-gray-800">
  <div class="fixed flex flex-col top-0 left-0 w-64 bg-white h-full border-r">
    <div class="flex items-center justify-center h-14 border-b">
      <div>CCS SitIn</div>
    </div>
    <div class="overflow-y-auto overflow-x-hidden flex-grow">
      <ul class="flex flex-col py-4 space-y-1">
        <li class="px-5">
          <div class="flex flex-row items-center h-8">
            <div class="text-sm font-light tracking-wide text-gray-500">Menu</div>
          </div>
        </li>
        <li>
          <a href="home_admin.php" class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-gray-50 text-gray-600 hover:text-gray-800 border-l-4 border-transparent hover:border-indigo-500 pr-6">
            <span class="inline-flex justify-center items-center ml-4">
              <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path></svg>
            </span>
            <span class="ml-2 text-sm tracking-wide truncate">Dashboard</span>
          </a>
        </li>
        <li>
          <a href="search_admin.php" class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-gray-50 text-gray-600 hover:text-gray-800 border-l-4 border-transparent hover:border-indigo-500 pr-6">
            <span class="inline-flex justify-center items-center ml-4">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24"><path fill="currentColor" d="M15.5 14h-.79l-.28-.27A6.471 6.471 0 0 0 16 9.5A6.5 6.5 0 1 0 9.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49 19zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5S14 7.01 14 9.5S11.99 14 9.5 14"/></svg>
            </span>
            <span class="ml-2 text-sm tracking-wide truncate">Search</span>
          </a>
        </li>
        <li>
          <a href="view_admin.php" class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-gray-50 text-gray-600 hover:text-gray-800 border-l-4 border-transparent hover:border-indigo-500 pr-6">
            <span class="inline-flex justify-center items-center ml-4">
              <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"></path></svg>
            </span>
            <span class="ml-2 text-sm tracking-wide truncate">View SitIn</span>
          </a>
        </li>
        <li>
          <a href="report_admin.php" class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-gray-50 text-gray-600 hover:text-gray-800 border-l-4 border-transparent hover:border-indigo-500 pr-6">
            <span class="inline-flex justify-center items-center ml-4">
              <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z"></path></svg>
            </span>
            <span class="ml-2 text-sm tracking-wide truncate">Generate Reports</span>
          </a>
        </li>
        <li>
          <a href="logout.php" class="mt-96 relative flex flex-row items-center h-11 focus:outline-none hover:bg-gray-50 text-gray-600 hover:text-gray-800 border-l-4 border-transparent hover:border-indigo-500 pr-6">
            <span class="inline-flex justify-center items-center ml-4">
              <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg>
            </span>
            <span class="ml-2 text-sm tracking-wide truncate">Logout</span>
          </a>
        </li>
      </ul>
    </div>
  </div>
  <div class="flex-1 p-4 lg:ml-64  lg:pt-5">
    <h1>Search a student </h1>

    <div class="flex">
      <form method="get" class="flex items-center justify-between focus-within:shadow-lg bg-white overflow-hidden rounded-md px-3 p-2 shadow-sm mt-5 gap-3">
            <svg xmlns="http://www.w3.org/2000/svg" class="text-slate-600 h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
            </svg>
            
          <input type="text" placeholder="Search" name="search" class="outline-none"/>
      </form> 
    </div>

    <div class="bg-white flex justify-center mt-5 min-h-[690px] rounded-md shadow-lg ">
         <div class="mt-10">

         <?php if($student != null && isset($_GET['search'])) { ?>
          <form action="" method="post" class="bg-white border p-10 rounded-md">
            <div class="text-center uppercase">
              <?php echo $student['fname']; echo" "; echo $student['lname'];?>
            </div>
            <div class="text-green-500 text-center text-sm">
              <?php echo $student['sessions'];?> sessions available
            </div>
             <div class="text-red-500 text-center text-sm">
              <?php echo $error?>
            </div>
            <div class="flex items-center justify-between border bg-white overflow-hidden rounded-md px-3 p-2  mt-5 gap-3">
                 <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 256 256"><path fill="currentColor" d="m226.53 56.41l-96-32a8 8 0 0 0-5.06 0l-96 32A8 8 0 0 0 24 64v80a8 8 0 0 0 16 0V75.1l33.59 11.19a64 64 0 0 0 20.65 88.05c-18 7.06-33.56 19.83-44.94 37.29a8 8 0 1 0 13.4 8.74C77.77 197.25 101.57 184 128 184s50.23 13.25 65.3 36.37a8 8 0 0 0 13.4-8.74c-11.38-17.46-27-30.23-44.94-37.29a64 64 0 0 0 20.65-88l44.12-14.7a8 8 0 0 0 0-15.18ZM176 120a48 48 0 1 1-86.65-28.45l36.12 12a8 8 0 0 0 5.06 0l36.12-12A47.89 47.89 0 0 1 176 120"/></svg>
                <input type="text" disabled value="<?php echo $student['idno']?>" name="idno" class="outline-none"/>
            </div> 
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
                 <div class="flex justify-between mt-5 gap-5">

                  <input type="hidden" value="<?php echo $student['id'];?>" name="id"/>
                  <div class="flex items-center gap-2 cusor-pointer px-3 p-2 border rounded-md">
                   <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24"><g fill="none"><path stroke="currentColor" stroke-linecap="round" stroke-width="2" d="M3 9v6c0 2.828 0 4.243.879 5.121C4.757 21 6.172 21 9 21h6c2.828 0 4.243 0 5.121-.879C21 19.243 21 17.828 21 15V9c0-2.828 0-4.243-.879-5.121C19.243 3 17.828 3 15 3H9"/><path fill="currentColor" d="M15 15v1h1v-1zM7.707 6.293a1 1 0 0 0-1.414 1.414zM14 8v7h2V8zm1 6H8v2h7zm.707.293l-8-8l-1.414 1.414l8 8z"/></g></svg>


                    <?php if($ok && $ok->num_rows > 0){?>

                        <p>Already Occupying</p>
                      <?php } else {?>
                     <input type="submit" value="Sit In" class="font-semibold "/>

                     <?php }?>
                  </div>
                    <div class="flex items-center gap-2 cusor-pointer px-3 p-2 border rounded-md">
                      <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24"><path fill="currentColor" d="M7 21q-.825 0-1.412-.587T5 19V6H4V4h5V3h6v1h5v2h-1v13q0 .825-.587 1.413T17 21zm2-4h2V8H9zm4 0h2V8h-2z"/></svg>
                        <a href="./delete.php?id=<?php echo $student['id'];?>" class="font-semibold">Delete</a>
                    </div>
                   
                </div>
         </form>
         <?php } else if(isset($_GET['search']) && $student == null) {?>


          <h1>NO STUDENT FOUND</h1>

          <?php }?>
         </div>

    </div>
  </div>  
</div>
</body>
</html>