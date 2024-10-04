<?php
// Include the external file that contains the generateBox() function
include 'lab12a-test02.inc.php';


?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>  
    <title>Lab 12a</title>   
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,400i,700,800" rel="stylesheet">    
    <link rel="stylesheet" href="css/lab12a-test02.css">
</head>
<body>
<main class="container">
    <div class="grid-container">
        <?php
            // Use the generateBox() function to create the boxes dynamically
            generateBox("Starter", 1); // Starter box with 1 user
            generateBox("Developer", 3); // Developer box with 3 users
            generateBox("Professional", 10); // Professional box with 10 users (with 10% discount)
            generateBox("Enterprise", 50); // Enterprise box with 50 users (with 20% discount)
        ?>
    </div>
</main>   
</body>
</html>
