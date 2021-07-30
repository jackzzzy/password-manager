<?php
session_start();
include("config.php");
if(isset($_POST["save"])){
$website = $_POST["website"];
$email = $_POST["email"];
}
$pwd = $_POST["pwd"];
if(!$pwd){
    echo "<script>
    alert('Please enter the password');
    window.location.href='home.html';
    </script>";
}

if(isset($_POST["saverand"])){
    $website = $_POST["website"];
    $email = $_POST["email"];
}

$conn = mysqli_connect($server,$user,$pass);
    if(!$conn){
        echo "NO CONNECTION";
    }
    
$createdb = "CREATE DATABASE adp";
mysqli_query($conn, $createdb);

mysqli_close($conn);

$db = "adp";
$conn = mysqli_connect($server,$user,$pass,$db);
    if(!$conn){
        echo "NO CONNECTION";
    }
$createtable = "CREATE TABLE data(
    id INT(3) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    website VARCHAR(50) NOT NULL,
    email VARCHAR(50) NOT NULL,
    pwd VARCHAR(20))";

mysqli_query($conn, $createtable);
mysqli_close($conn);

if($pwd){
$db = "adp";
$conn = mysqli_connect($server,$user,$pass,$db);
    if(!$conn){
        echo "NO CONNECTION";
    }

$insert = "INSERT INTO data (website,email,pwd) VALUE ('$website','$email','$pwd')";
}
mysqli_query($conn, $insert);

mysqli_close($conn);
?>
<html>
    <head>
    <link rel="stylesheet" href="header.css">
    <link rel="stylesheet" href="main.css">
        <title>Save</title>
        <style>
            .container{
                margin-top: 200px;
            }
        </style>
    </head>
    <body>
        <div class="sidebar">
            <a href="home.html">Home</a>
            <a href="page2.html">Password Generator</a>
            <a href="displaytable.php">View/Edit</a>
            <a href="checkstrength.html">Check Strength</a>
            <a href="about.html" >About</a>
        </div>
        <div class="header">
            <span class="head" style="text-align: center;">Secure Passy</span>
        </div>
        <div class="main">
            <div class="container">
                <h3>Password Saved Successfully</h3>
            </div>
        </div>
    </body>
</html>
<?php 
header("Refresh:3; url=home.html");?>
