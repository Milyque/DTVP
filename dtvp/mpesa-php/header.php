<?php 
session_start();
    include('../dbcon.php');
    include('../session.php');
 ?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="../css/login.css">
    <link rel="stylesheet" type="text/css" href="../css/mainstyle.css">
    <title>Login to DTVP </title>
</head>
<body>

    <header>
        <div class="logo">
            <h3><span class="circle">DT</span>VP</h3>
        </div>
        <nav>
            <ul>
                <li><a href="../home.php">Home</a></li>
                <li><a href="../about.php">About</a></li>
                <li><a href="../profile.php">My Profile</a></li>
                <li><a href="../logout.php">Log out</a></li>
            </ul>
        </nav>
    </header>