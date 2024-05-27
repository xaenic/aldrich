<?php


session_start();
if(!isset($_SESSION['valids']))
    header("Location: ./");
include(".././config.php");


$students= [];
$query = "SELECT * FROM sessions  WHERE time_out IS NOT NULL ORDER BY time_out asc";
$result = $con->query($query);
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $students[] = $row;
    }
}
$con->close();
$records_json = json_encode($students);
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
    <h1 class="text-xl my-10">Sit In Records Analytics</h1>
    <div class="">
          
        <div class="container flex flex-col items-center justify-center">
        <div class="flex justify-center w-full">
             <div class="chart-container 1">
            <canvas id="purposeChart"></canvas>
        </div>
        <div class="chart-container 2">
            <canvas id="laboratoryChart"></canvas>
        </div>
        </div>
       
    </div>
        </div>
   
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
 <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script>
    var records_json = <?php echo $records_json; ?>;

var purposeChart;
var laboratoryChart;

flatpickr('#datetimepicker', {
    dateFormat: "F j, Y",
    onChange: function(selectedDates, dateStr, instance) {
        const selectedDate = formatDate(dateStr);
        let filteredRecords = [];
        let old = records_json;
        records_json.forEach(student => {
              console.log(selectedDate)
            const studentDate = student.time_in.split(' ')[0];
          
            if (selectedDate === studentDate) {
                 console.log('yes')
                filteredRecords.push(student);
            }
        });
        
        // Log filtered records to ensure they are being updated correctly
        chartt(filteredRecords);

    }
});

function formatDate(dateString) {
    const date = new Date(dateString);
    const year = date.getFullYear();
    const month = String(date.getMonth() + 1).padStart(2, '0');
    const day = String(date.getDate()).padStart(2, '0');
    const formattedDate = `${year}-${month}-${day}`;
    return formattedDate;
}

function chartt(records_json) {
    var purposes = {};
    records_json.forEach(function(record) {
        var key = record.purpose;
        if (!purposes[key]) {
            purposes[key] = 0;
        }
        purposes[key]++;
    });

    var purposeLabels = Object.keys(purposes);
    var purposeCounts = Object.values(purposes);

    var laboratories = {};
    records_json.forEach(function(record) {
        var key = record.laboratory;
        if (!laboratories[key]) {
            laboratories[key] = 0;
        }
        laboratories[key]++;
    });

    var laboratoryLabels = Object.keys(laboratories);
    var laboratoryCounts = Object.values(laboratories);

    // Log chart data to ensure it's being calculated correctly
    console.log("Purpose Labels: ", purposeLabels);
    console.log("Purpose Counts: ", purposeCounts);
    console.log("Laboratory Labels: ", laboratoryLabels);
    console.log("Laboratory Counts: ", laboratoryCounts);

    // Destroy existing charts if they exist
    if (purposeChart) {
        purposeChart.destroy();
    }
    if (laboratoryChart) {
        laboratoryChart.destroy();
    }

    // Define new set of colors for the charts
    var purposeBackgroundColors = ['#FF6384', '#36A2EB', '#FFCE56'];
    var laboratoryBackgroundColors = ['#4BC0C0', '#FF6384', '#9966FF'];

    // Create new purpose chart
    var ctxPurpose = document.getElementById('purposeChart').getContext('2d');
    purposeChart = new Chart(ctxPurpose, {
        type: 'pie',
        data: {
            labels: purposeLabels,
            datasets: [{
                data: purposeCounts,
                backgroundColor: purposeBackgroundColors,
                borderColor: ['rgba(255, 99, 132, 1)', 'rgba(54, 162, 235, 1)', 'rgba(255, 206, 86, 1)'],
                borderWidth: 1
            }]
        },
        options: {}
    });

    // Create new laboratory chart
    var ctxLaboratory = document.getElementById('laboratoryChart').getContext('2d');
    laboratoryChart = new Chart(ctxLaboratory, {
        type: 'pie',
        data: {
            labels: laboratoryLabels,
            datasets: [{
                data: laboratoryCounts,
                backgroundColor: laboratoryBackgroundColors,
                borderColor: ['rgba(255, 99, 132, 1)', 'rgba(54, 162, 235, 1)', 'rgba(255, 206, 86, 1)'],
                borderWidth: 1
            }]
        },
        options: {}
    });
}


// Initial call to display charts with initial data
chartt(records_json);

    </script>
</body>
</html>