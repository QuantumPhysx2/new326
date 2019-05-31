<?php
// Setting up an array of all our pages in a variable
$pages = array(
	"index.php" => "index",
	"login.php" => "login",
	"profile.php" => "profile",
	"register.php" => "register",
	"welcome.php" => "welcome"
);
// Use this variable and call function 'basename()' to detect when the page retrieves a page with corresponding Key Value pair
/*
echo (basename($_SERVER["PHP_SELF"]) == "/index.php" ? "active" : "");
basename() = returns trailing name of component path
We then use a Ternary Statement to measure set an If/Else statement
*/
?>
<meta charset="utf-8">
<meta name="author" content="PC Buy Here">
<meta name="description" content="PC Buy Here">
<meta name="keywords" content="Products">
<meta name="theme-color" content="#222">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="assets/css/style.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="icon" href="assets/images/page-icon.ico">