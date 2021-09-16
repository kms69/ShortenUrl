<?php

use App\short\Shortner;
use App\short\LongUrl;


require 'vendor/autoload.php';



$shortener = new Shortner();
$codetourl= new LongUrl();

// Long URL
$url = 'https://www.w3schools.com/';
$code = 'qQj3Kn';


// Prefix of the short URL
$shortURL_Prefix = 'https://xyz.com/'; // with URL rewrite
$shortURL_Prefix = 'https://xyz.com/?c='; // without URL rewrite

try {
    // Get short code of the URL
    $shortCode = $shortener->urlToShortCode($url);
//   $longurl = $codetourl->shortCodeToUrl($code);


    // Create short URL
    $shortURL = $shortURL_Prefix . $shortCode;

    // Display short URL
    echo 'Short URL: ' . $shortURL;
//   echo ' URL: ' . $longurl;
} catch (Exception $e) {
    // Display error
    echo $e->getMessage();

}