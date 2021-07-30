<?php
session_start();
include("config.php");
$db = "adp";

$website = $_GET["sentwebsite"];

$conn = mysqli_connect($server, $user, $pass, $db);
if (!$conn) {
  echo "NO CONNECTION";
}

$delete = "DELETE FROM data WHERE website='$website'";
$res = mysqli_query($conn, $delete);
?>

<html>

<head>
  <title>Update</title>
  <link rel="stylesheet" href="styles2.css" />
  <link rel="stylesheet" href="header.css" />
  <link rel="stylesheet" href="main.css" />
  <title>Password Generator</title>
  <style>
    .container {
      margin-top: 200px;
    }
  </style>
</head>

<body>
  <div class="sidebar">
    <a href="home.html">Home</a>
    <a href="page2.html">Random Password</a>
    <a href="search.html">View/Edit</a>
    <a href="checkstrength.html">Check Strength</a>
    <a href="about.html" >About</a>
  </div>
  <div class="header">
    <span class="head" style="text-align: center;">Passman</span>
  </div>
  <div class="main">
    <div class="container">
      <h3>Password Deleted Successfully</h3>
    </div>
  </div>
</body>

</html>
<?php
header("Refresh:3; url=home.html"); ?>