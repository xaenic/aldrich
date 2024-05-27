<?php


session_start();
if(!isset($_SESSION['valids']))
    header("Location: ./");
include(".././config.php");


  $announcements = [];
    $select = "SELECT * FROM announcement ORDER BY date_created desc";
    $result = $con->query($select);


    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $announcements[] = $row;
        }
    }


if($_SERVER['REQUEST_METHOD'] == 'POST'){

$content = $_POST['content'];
$title= $_POST['title'];
$name = 'admin';
 $query = "INSERT INTO announcement (name,title,content) VALUES('$name' , '$title','$content')";
$result = $con->query($query);

header("Location: ./announcement.php");

}
$con->close();

?>

<!doctype html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
  <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
  
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
          <a href="announcement.php" class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-gray-50 text-gray-600 hover:text-gray-800 border-l-4 border-transparent hover:border-indigo-500 pr-6">
            <span class="inline-flex justify-center items-center ml-4">
              <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"></path></svg>
            </span>
            <span class="ml-2 text-sm tracking-wide truncate">Announcements</span>
          </a>
        </li>
           <li>
          <a href="reports.php" class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-gray-50 text-gray-600 hover:text-gray-800 border-l-4 border-transparent hover:border-indigo-500 pr-6">
            <span class="inline-flex justify-center items-center ml-4">
              <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24"><path fill="currentColor" d="M12 17q.425 0 .713-.288T13 16t-.288-.712T12 15t-.712.288T11 16t.288.713T12 17m-1-4h2V7h-2zm-2.75 8L3 15.75v-7.5L8.25 3h7.5L21 8.25v7.5L15.75 21z"/></svg>
            </span>
            <span class="ml-2 text-sm tracking-wide truncate">Reports / Feedback</span>
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
    <h1 class="text-xl">Announcements</h1>
    <div class="">
          <div class="mt-2">
                <p class="text-center text-xl font-medium mb-10">Post an Announcement</p> 
                
                <form action="" method="post"class="w-full border p-5 rounded-md">
                     <span>Title</span>
                        <div class="mt-3 w-full bg-slate-200 text-black rounded-md px-3 p-2 text-sm">
                          <input type="text" name="title" placeholder="Announcement Title" class="w-full bg-transparent p-1 outline-none" />
                        </div>
                    <span>Message</span>
                        <div class="mt-3 w-full bg-slate-200 text-black rounded-md px-3 p-2 text-sm">
                            <textarea id="feedback" name="content" rows="5" cols="140" class="bg-transparent outline-none"></textarea>
                        </div>
                    <div class="mt-2 flex justify-end">
                        <button class="p-3 text-white bg-gray-700 rounded-md">Post Announcement</button>
                    </div>
                </form>
            </div>
        </div>
     <table class="mt-5 w-full text-sm text-left rtl:text-right text-white rounded-lg overflow-hidden">
                <thead class="text-xs bg-gradient-to-r from-green-400 to-blue-500 uppercase rounded-md">
                    <tr>
                 
                        <th class="border px-4 py-4 font-medium border-none  text-center">Title</th>
                        <th class="border px-4 py-4 font-medium border-none  text-center">Content</th>
                        <th class="border px-4 py-4 font-medium border-none  text-center">DATE POSTED</th>
                    </tr>
                </thead>
                <tbody id="tbody" class="relative">
                    

                <?php 

            foreach ($announcements as $student) {
                   echo '<tr class="odd:bg-blue-400 bg-blue-700">
                                <td class="border px-4 py-4 border-none text-center text-xs md:text-sm text-white">'.$student['title'].'</td>
                                <td class="border px-4 py-4 border-none text-center text-xs md:text-sm text-white">'.$student['content'].'</td>
                                <td class="border px-4 py-4 border-none text-center text-xs md:text-sm text-white">'.$student['date_created'].'</td>
                               
                               </tr>';
                }
            ?>

                </tbody>

            </table>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script>

       
        
    </script>
</body>
</html>