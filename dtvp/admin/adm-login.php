
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="../css/login.css">
    <title>Login to DTVP </title>
</head>
<body>

    <header>
        <div class="logo">
            <h3><span class="circle">DT</span>VP</h3>
        </div>
        <nav>
            <ul>
                <!-- <li><a href="adm-about.php">About</a></li> -->
            </ul>
        </nav>
    </header>

    <section class="container">
        <form method="POST" action="" class="sub-email">
            <label style="color: dodgerblue; padding-bottom: 10px;">DTVP Admin Login Form</label><br><br><br>
            <input class="input" type="text" name="username" placeholder="Enter Username"><br>
            <input class="input" type="password" id="pass" name="pwd" placeholder="Enter password" style="width: 63%;"><i data-for="pass" class="showHide-pwd"><img src="../images/eye.png" height=30 width=30></i><br>
            <input class="btn"  type="submit" name="sub-log" value="Log In"><br><br>
            <!-- <p>don't remember your password?&nbsp;<a href="password-recovery">forgot password</a></p> -->
        </form>
    </section>
    <script type="text/javascript" src="../js/show-hide-pwd.js"></script>


<?php include('adm-footer.php'); ?>
</body>
</html>


<?php

include('../dbcon.php');

    if (isset($_POST['sub-log'])) {
        $username = $_POST['username'];
        $pwd = $_POST['pwd'];

         $select_pass = mysqli_query($con, "SELECT * FROM admin WHERE username='$username' AND password='$pwd'");
         $num = mysqli_num_rows($select_pass);
         if ($num == 1) {
             session_start();
             $_SESSION['username'] = $username;
             echo "<script> alert('Login successful');  window.open('adm-home.php','_self')</script>";
         }else{
             echo "<script> alert('wrong Registration number or password'); window.open('adm-login.php','_self')</script>";
         }
    }
   
    
?>

