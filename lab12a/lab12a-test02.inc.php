<?php

define("USD_TO_EURO", 0.87);
define("USD_TO_POUND", 0.76);

function USToEuro($USamount) {
    // Convert to Euro, round up, and return the result
    return ceil($USamount * USD_TO_EURO);
}

function USToPound($USamount) {
    // Convert to Pound, round up, and return the result
    return ceil($USamount * USD_TO_POUND);
}

// Define constants for the exchange rates
function generateBox($name, $numUsers) {
    // Base price per user in USD
    $pricePerUser = 10;
    
    // Base storage and email accounts calculation
    $storagePerUser = 5;  // GB per user
    $emailsPerUser = 2;   // Email accounts per user
    
    // Apply discount based on the number of users
    if ($numUsers == 10) {
        $discount = 0.10; // 10% discount
    } elseif ($numUsers == 50) {
        $discount = 0.20; // 20% discount
    } else {
        $discount = 0; // No discount
    }
    
    // Calculate total cost after discount
    $costUSD = $numUsers * $pricePerUser * (1 - $discount);
    
    // Calculate total storage and email accounts
    $totalStorage = $numUsers * $storagePerUser;
    $totalEmails = $numUsers * $emailsPerUser;

    // Convert costs to Euros and Pounds
    $costEuro = USToEuro($costUSD);
    $costPound = USToPound($costUSD);

    // Generate the HTML markup for the box
    echo "
    <div class='box'>
        <header>{$name}</header>
        <div>
            <p><span>{$numUsers}</span> users</p>
            <p><span>{$totalStorage}</span> GB storage</p>
            <p><span>{$totalEmails}</span> email accounts</p>
        </div>
        <footer>\${$costUSD} • €{$costEuro} • £{$costPound}</footer>
    </div>";
}
?>
