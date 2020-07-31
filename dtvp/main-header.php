<?php 
session_start();
    include('dbcon.php');
    include('session.php');
 ?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="css/login.css">
    <link rel="stylesheet" type="text/css" href="css/mainstyle.css">
    <title>Login to DTVP </title>
</head>
<body>

    <header>
        <div class="logo">
            <h3><span class="circle">DT</span>VP</h3>
        </div>
        <nav>
            <ul>
                <li><a href="home.php">Home</a></li>
                <li><a href="about.php">About</a></li>
                <?php
                    $query = mysqli_query($con, "select * from user where comp_reg = '$id_sess'");
                    $row = mysqli_fetch_array($query); 
                    $user = $row['comp_reg'];
                    echo "<li><a href='profile.php?comp_reg=$user'>My Profile</a></li>";  
                ?>
                <li><a href="logout.php">Log out</a></li>
            </ul>
        </nav>
    </header>
<!-- <?php include('dbcon.php'); ?> -->