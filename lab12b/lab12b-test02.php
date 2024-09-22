<?php

include('includes/lab12b-test01.inc.php');

// Function to output a single day forecast
function outputDayForecast($day, $forecast) {
    echo "<div>";
    echo "<h3>{$day}</h3>";
    echo "<p><i class='wi wi-day-{$forecast[1]}'></i></p>";
    echo "<p>{$forecast[0]}</p>";
    echo "</div>";
}

// Function to output a single city box
function outputCityBox($city, $data) {
    echo "<article class='box'>"; 
    echo "<h1>{$city}</h1>";
    
    // Current weather
    echo "<div class='weather'>";
    echo "<img src='images/{$city}.jpg' />";
    echo "<div>";
    echo "<h2>{$data[0]}</h2>";
    echo "<p>" . ucfirst($data[1]) . "</p>";                
    echo "</div>";
    echo "</div>";
    
    // 5-day forecast
    echo "<section>";
    foreach ($data[2] as $day => $forecast) {
        outputDayForecast($day, $forecast);
    }
    echo "</section>";
    
    echo "</article>";
}

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>  
    <title>Lab 12b</title>   
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,400i,700,800" rel="stylesheet">   
    <link rel="stylesheet" href="css/weather-icons.min.css">
    <link rel="stylesheet" href="css/lab12b-test01.css">
</head>
<body>
<main class="grid-container">

    <?php
    // Loop through the weather data and output city boxes
    foreach ($weatherData as $city => $data) {
        outputCityBox($city, $data);
    }
    ?>

</main>   
</body>
</html>
