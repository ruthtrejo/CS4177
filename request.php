<?php
session_start();

require_once "databaseConnect.php";
//Connect to the localhost database
$databaseConnector = new DatabaseConnector();
$conn = $databaseConnector->connect();

$_SESSION['logged_in'] = false;
$_SESSION['login-error'] = 0;

if ( !empty($_POST) ){
    if( isset($_POST['submit']) ){
        //Store Clients credentials and prevent SQL Injections
        $input_username = $_POST['uname'];
        $input_password = $_POST['pswd'];

        //Select the username if found in database
        $result = mysqli_query($conn, "SELECT * FROM users WHERE username='$input_username' AND password='$input_password'");

        $count = mysqli_num_rows($result);
        $row = $result -> fetch_array(MYSQLI_ASSOC);

        //VERIFY PASSWORD FROM USER
        if( $count == 1 ){
            /* Create sessions to send throughout the page*/
            header("Location: successful_login.php");

        } else{
            header("Location: comment_section.html");
        }
    }
}