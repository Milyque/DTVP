<?php 
include('main-header.php');
include('name-bar.php');
include('session.php');
?>

<div class="container">
	<?php 

		$query = mysqli_query($con, "select * from user where comp_reg = '$id_sess'");
		$row = mysqli_fetch_array($query);

	 ?>
	<form action="" method="post" class="sub-email">
		<table style="width:100%; text-align: left;">
			<tr><h3 style="color:darkorange; text-align: center;">EDIT PROFILE</h3></tr>
		<tr><td>Company Name</td><td><input class="input" type="text" name="comp_name" required value="<?php echo $row['comp_name']; ?>"></td><td>
		<tr><td>Email</td><td><input class="input" type="email" name="email" required value="<?php echo $row['email']; ?>"></td><td>
		<tr><td>Password</td><td><input class="input" type="password" name="pwd" required value="<?php echo $row['pass']; ?>"></td><td>
		<tr><td>Confirm Password</td><td><input class="input" type="password" name="cpwd" required value="<?php echo $row['cpass']; ?>"></td><td><br>
		</table>
		<input class="btn" type="submit" name="edit" value="  EDIT  ">
	</form>
</div>
<?php include('footer.php'); ?>
<?php
include('dbcon.php');
	// $user = $_GET['email'];

	if(isset($_POST['edit'])){

	  $fn = $_POST['comp_name'];
	  $email = $_POST['email'];
	  $pwd = $_POST['pwd'];
	  $cpwd = $_POST['cpwd'];

	  if (strlen($pwd)>=8 && $pwd===$cpwd) {
	  	if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
		  	 $update = mysqli_query($con, "update user set comp_name='$fn',email='$email',pass='$pwd',cpass='$cpwd' where comp_reg='$id_sess'" );

		      if ($update) {
		        echo "<script>alert('updated Successfully'); window.open('profile.php','_self')</script>";
		      }else{
		        echo "<script>alert('updation Failed'); window.open('profile.php','_self')</script>";
		      }
		}else{
			echo "<script>alert('Wrong email Format'); window.open('profile.php','_self')</script>";
		}
	  }else{
	  		echo "<script>alert('Password must be atleast 8 characters and match the confirm password field'); window.open('profile.php','_self')</script>";
	  }

	}

	?>