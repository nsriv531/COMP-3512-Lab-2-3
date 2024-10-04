<?php
// Enable error reporting to catch any hidden issues
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Check if the file parameter is set and valid
$fileIndex = isset($_GET['file']) && is_numeric($_GET['file']) ? (int)$_GET['file'] : 0;
$imagePath = "images/art/{$fileIndex}.jpg";

// Debug: Check if the image path is correct (comment this out after testing)
// echo $imagePath;

// Check if the image exists
if (!file_exists($imagePath)) {
    die("Error: Image file not found at $imagePath");
}

// Load the image
$image = imagecreatefromjpeg($imagePath);
if (!$image) {
    die("Error: Could not load image.");
}

// Check if the texts and font sizes are set
$memeText1 = isset($_GET['text1']) ? $_GET['text1'] : '';
$memeSize1 = isset($_GET['size1']) && is_numeric($_GET['size1']) ? (int)$_GET['size1'] : 24;

$memeText2 = isset($_GET['text2']) ? $_GET['text2'] : '';
$memeSize2 = isset($_GET['size2']) && is_numeric($_GET['size2']) ? (int)$_GET['size2'] : 24;

// Check if the width parameter is set and resize the image
$width = isset($_GET['width']) && is_numeric($_GET['width']) ? (int)$_GET['width'] : null;
if ($width) {
    $image = imagescale($image, $width, $width);  // Keeping the height the same as width
}

// Set text color and font file (ensure the font file path is correct)
$black = imagecolorallocate($image, 0, 0, 0);
$font = 'font/Lato-Heavy.ttf'; // Make sure you have a valid .ttf font file here

// Add the first meme text
if (!empty($memeText1)) {
    imagettftext($image, $memeSize1, 0, 20, 50, $black, $font, $memeText1); // Position: 20px from left, 50px from top
}

// Add the second meme text
if (!empty($memeText2)) {
    imagettftext($image, $memeSize2, 0, 20, imagesy($image) - 50, $black, $font, $memeText2); // Bottom of the image
}

// Output the image to the browser
header('Content-Type: image/jpeg');
imagejpeg($image);
imagedestroy($image);
?>
