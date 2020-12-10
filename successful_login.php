<html>
<head>
    <title>User</title>
</head>

<body>
<?php
session_start();
include_once('databaseConnect.php');
_header();

//Connect to the database
$databaseConnector = new DatabaseConnector();
$conn=$databaseConnector->connect();

_container();

echo '<h3>WELCOME</h3>';
echo '<b>Your username is:</b> ' . $_SESSION['user_name'] . '<br><b>Your password is:</b> ' . $_SESSION['user_pswd'];

_closeHTML();

function _header(){
    print <<<HERE
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="index_style.css">
	<title>Sign-In Page</title>
</head>
<body>

<div class="header" style="background-color:black; color:white; font-size: 12px;" >
  <h1>FREE STANDARD SHIPPING ON ORDERS OF $29+  <b style="background-color: red; padding: 5px">CODE: FREEBLK29</b>
  </h1>
</div>

<div class="header">
  <h1> <b>S H E I N</b> </h1>
</div>

<div class="topnav">
    <a class="active" href="#women">WOMEN</a>
    <a href="#curve_plus">CURVE + PLUS</a>
    <a href="#men">MEN</a>
    <a href="#kids">KIDS</a>
    <a href="#beauty">BEAUTY</a>
    <a href="Comments/comment_section.html">REVIEWS</a>
    <a style="float: right" href="sign_out.php">Sign-out</a>

</div>
HERE;
}//end header function

function _container(){
    print <<<HERE
<div id="w3-container w3-blue">
HERE;
}

function _closeHTML(){
    print <<<HERE
</div>
</body>
</html>
HERE;
}

?>

</body>
</html>