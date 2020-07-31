
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="css/login.css">
    <title>Login to DTVP </title>
</head>
<body>

    <header>
        <div class="logo">
            <h3><span class="circle">DT</span>VP</h3>
        </div>
        <nav>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="about.php">About</a></li>
                <li><a href="signup.php">Sign Up</a></li>
            </ul>
        </nav>
    </header>

    <section class="container">
        <form method="POST" action="" class="sub-email">
            <label style="color: dodgerblue; padding-bottom: 10px;">DTVP Login Form</label><br><br>
            <input class="input" type="text" name="comp_reg" placeholder="Company Regristration number"><br>
            <input class="input" type="password" id="pass" name="pwd" placeholder="Enter your password" style="width: 63%;"><i data-for="pass" class="showHide-pwd"><img src="images/eye.png" height=30 width=30></i><br>
            <input class="btn"  type="submit" name="sub-log" value="Log In"><br><br>

            <p>Don't have an account?&nbsp;<a href="signup.php">Create account</a></p>
            <!-- <p>don't remember your password?&nbsp;<a href="password-recovery">forgot password</a></p> -->
        </form>
    </section>
    <script type="text/javascript" src="js/show-hide-pwd.js"></script>

    <?php include('footer.php'); ?>

</body>
</html>


<?php
include('dbcon.php');

    if (isset($_POST['sub-log'])) {
        $comp_reg = $_POST['comp_reg'];
        $pwd = $_POST['pwd'];

         $select_pass = mysqli_query($con, "SELECT * FROM user WHERE comp_reg='$comp_reg' AND pass='$pwd'");
         $num = mysqli_num_rows($select_pass);
         if ($num == 1) {
             session_start();
             $_SESSION['comp_reg'] = $comp_reg;
              echo "<script> alert('Login successful');  window.open('home.php','_self')</script>";
         }else{
             echo "<script> alert('wrong Registration number or password'); window.open('login.php','_self')</script>";
         }
    }
   
    
?>