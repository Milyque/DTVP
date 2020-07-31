<!-- 
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
            <label style="color: dodgerblue; padding-bottom: 10px;">DTVP Login F -->orm</label><br><br>
            <?php
                <!-- include('dbcon.php');

                if (isset($_POST['sub-email'])) {
                 $email = $_POST['email'];

                $select_email = mysqli_query($con, "SELECT * FROM user WHERE email='$email'");
                $check_email_num = mysqli_num_rows($select_email);

                if($check_email_num == 1){
                 while($row = mysqli_fetch_array($select_email)){
                 $email = $row['email'];
                  echo "<label>".$row['email']."</label>";
                 }
                }} -->

            ?>
           <!--  <input class="input" type="password" name="pwd" placeholder="Enter your password"><br>
            
            <button ><a href="" class="btn" style="background: dodgerblue;"><- back</a></button>
            <input class="btn" type="submit" name="sub-pass" value="NEXT"><br><br>

            <p>Don't have an account?&nbsp;<a href="signup.php">Create account</a></p>
        </form>
    </section>

</body>
</html> -->

<?php
<!-- session_start();
include('dbcon.php');

 if (isset($_POST['sub-pass'])) {
        $pwd = $_POST['pwd'];
        $email= $_POST['email'];

         $select_pass = mysqli_query($con, "SELECT * FROM user WHERE email='$email' AND pass='$pwd'");
         $num = mysqli_num_rows($select_email);
         if ($num == 1) {

$_SESSION['email'] = $email;
             echo "<script> alert('Login successful');  window.open('home.php','_self')</script>";
         }else{
             echo "<script> alert('wrong password'); window.open('login2.php','_self')</script>";
         }
    } -->
?>
