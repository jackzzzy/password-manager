<?php
session_start();
$db = "adp";
include("config.php");

$conn = mysqli_connect($server, $user, $pass, $db);
if (!$conn) {
  echo "NO CONNECTION";
}

$sql = "SELECT * FROM data";

$result = mysqli_query($conn, $sql);
if(!$result){
    echo "<script>
    alert('No entries yet');
    window.location.href='home.html';
    </script>";
}
$websites = mysqli_fetch_all($result, MYSQLI_ASSOC);
if(!$websites){
    echo "<script>
    alert('No entries yet');
    window.location.href='home.html';
    </script>";
}
?>

<html lang="en">

<head>
    <title>View/Edit</title>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="header.css">
    <link rel="stylesheet" href="main.css">
    <link rel="stylesheet" href="table.css">
    <style>
        .tablebox{
            position: static;
            margin-left: 150px;
            margin-top: 30px;
            max-width: 900px;
            padding: 100px;
            background-color: transparent;
            border-radius: 40px;
            padding-bottom: 50px;
            padding-top: 10px;
            padding-left: 40px;
            
        }
        .newbtn{
        background-color: white;
        color: #892CDC;
        padding: 10px 20px;
        border: none;
        width: 100%;
        cursor: pointer;
        border-radius: 10px;
        outline: none;
    }
    .newbtn:hover{
        background-color: #892CDC;
        color: white;
    }
    </style>
  <title>Document</title>
</head>

<body>
    <div class="sidebar">
            <a href="home.html">Home</a>
            <a href="page2.html">Password Generator</a>
            <a href="displaytable.php" class="active">View/Edit</a>
            <a href="checkstrength.html">Check Strength</a>
            <a href="about.html" >About</a>
        </div>
        <div class="header">
            <span class="head" style="text-align: center;">Passman</span>
        </div>
        <div class="main">
            <div class="tablebox">
            <table class="styled-table">
            <thead>
            <tr>
            <th>Website</th>
            <th>Email</th>
            <th>Password</th>
            <th>Edit</th>
            <th>Delete</th>
            </tr>
            <thead>

            <?php foreach ($websites as $website) : ?>
            <tbody>
            <tr>
                <td><?php echo $website["website"]; ?></td>
                <td><?php echo $website["email"]; ?></td>
                <td><?php echo $website["pwd"]; ?></td>
                <td><button class="newbtn" onclick="location.href='editpass.php?sentwebsite=<?php echo $website['website']?>&sentemail=<?php echo $website['email']; ?>'">Edit</button></td>
                <td><button class="newbtn" onclick="location.href='delete.php?sentwebsite=<?php echo $website['website']?>&sentemail=<?php echo $website['email']; ?>'">Delete</button></td>
            </tr>
            </tbody>
            <?php endforeach; ?>

        </table>
            </div>
        </div>

</body>

</html>
