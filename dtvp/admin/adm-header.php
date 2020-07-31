<?php 
session_start();
    include('../dbcon.php');
    include('adm-session.php');
 ?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="../css/login.css">
    <link rel="stylesheet" type="text/css" href="../css/mainstyle.css">
    <link rel="stylesheet" type="text/css" href="../css/adm-style.css">
    <title>Login to DTVP </title>
</head>
<body>

    <header>
        <div class="logo">
            <h3><span class="circle">DT</span>VP</h3>
        </div>
        <nav>
            <ul>
                <li><a href="adm-home.php">Home</a></li>
                <li><a href="adm-about.php">About</a></li>
                <li><a href="adm-logout.php">Log out</a></li>
            </ul>
        </nav>
    </header>