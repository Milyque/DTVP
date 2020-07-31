<?php include('dbcon.php'); ?>

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
                <li><a href="login.php">Log in</a></li>
            </ul>
        </nav>
    </header>

    <section class="container">
        <form method="POST" action="" class="sub-email">
            <label style="color: dodgerblue; padding-bottom: 10px;">DTVP SIGN UP FORM</label><br><br>
            <input class="input" type="text" name="cn" placeholder="Company Name"><br>
            <input class="input" type="text" name="reg-no" placeholder="Registration Number"><br>
            <input class="input" type="email" name="email" placeholder="Company E-mail"><br>
            <input class="input" type="password" id="pass" name="pwd" placeholder="Enter your password" style="width: 63%;"><i data-for="pass" class="showHide-pwd"><img src="images/eye.png" height=30 width=30></i>
            <input class="input" type="password" name="cpwd" placeholder="Confirm password"><br>
            <input class="btn" type="submit" name="reg" value="SIGN UP"><br><br>

            <p>Have an account?&nbsp;<a href="login.php">Log in</a></p>
        </form>
    </section>

    <script type="text/javascript" src="js/show-hide-pwd.js"></script>

    <?php include('footer.php'); ?>

</body>
</html>

<?php

    if(isset($_POST['reg'])){

     $cn = $_POST['cn'];
     $regno = $_POST['reg-no'];
     $email = $_POST['email'];
     $pwd = $_POST['pwd'];
     $cpwd = $_POST['cpwd'];

     if(filter_var($email, FILTER_VALIDATE_EMAIL)){
        if(strlen($pwd) >= 8){
            if($pwd===$cpwd){
                if(preg_match("/^[a-zA-Z]*$/", $cn)){

                $check_email = mysqli_query($con, "select * from user where email='$email'");
                $num_row = mysqli_num_rows($check_email);

                if($num_row == 0){
                    $insert = mysqli_query($con, "insert into user(comp_name, comp_reg, email, pass, cpass) values('$cn','$regno','$email','$pwd','$cpwd')");
                     if($insert){
                        echo "<script> alert('registration successful'); window.open('login.php','_self')</script>";
                     }else{
                        echo "<script> alert('registration failed'); window.open('signup.php','_self')</script>";
                        }
                }else{ echo "<script> alert('Email Already Registered'); window.open('signup.php','_self')</script>";}
            }else{echo "<script> alert('Company name field should only contain letters'); window.open('signup.php','_self')</script>";}
        }else{echo "<script> alert('password do not match Confirm password'); window.open('signup.php','_self')</script>";}
    }else{echo "<script> alert('password must be alteast 8 characters'); window.open('signup.php','_self')</script>";}
 }else{echo "<script> alert('email format is not correct'); window.open('signup.php','_self')</script>";}

    }

 ?>

