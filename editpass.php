<?php
session_start();
include("config.php");
$db = "adp";
$website = $_GET["sentwebsite"];
$email = $_GET["sentemail"];
$_SESSION["website"] = $website;
$_SESSION["email"] = $email;

?>
<html>

<head>
    <title>Edit</title>
    <link rel="stylesheet" href="header.css">
    <link rel="stylesheet" href="main.css">
    <style>
        .container {
            padding-top: 80px;
        }

        .show {
            margin-left: -63px;
            font-style: normal;
            font-size: 10px;
            cursor: pointer;
            font-weight: bold;
        }

        .btn {
            margin-left: 0px;
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
        <span class="head" style="text-align: center;">Passman</span>
    </div>
    <div class="main">
        <div class="container">
            <form action="update.php" method="POST">
                <h3 class="info" style="margin-top: -30px;">Enter New Password</h3><br><br>
                <span class="info" style="text-align:left;">Website: <b><?php echo $website ?></b></span><br><br>
                <span class="info" style="text-align:left;">Email: <b><?php echo $email ?></b></span><br><br><br>
                <input type="password" placeholder="New password" name="newpassword" id="pw" required><i class="show" id="togglePassword"></i><br>
                <center>
                    <table>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                    </table>
                </center>
                <br>
                <div id="strength"></div>
                <br>
                <button type="submit" class="btn">Save</button>
            </form>

        </div>
    </div>
    <script src="pwstrength.js"></script>
</body>

</html>