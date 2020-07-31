<?php 
	include('adm-header.php');
?>
<body>
<section class="container" style="min-height: 400px;">
	<div class="sidebar">
		<h2>Navigation Bar</h2>
		<li><a class="a hightlight" href="adm-home.php">Home</a></li>
		<li><a class="a" href="adm-users.php">View Users</a></li>
		<li><a class="a" href="adm-veh.php">View Vehicles</a></li>
		<li><a class="a" href="adm-about.php">About</a></li>
		<li><a class="a" href="adm-logout.php">LogOut</a></li>
	</div>
	<div class="main" style="background-color: #eeefff; border-radius: 10px; top: 20px;">
		<div class="pane-contain">
			<a href="adm-users.php" class="pane" style="background-color: skyblue;">
				<img src="../images/car1.jpg" class="img">
				<?php 
					$user = mysqli_query($con, "select * from user");
					$NoUser = mysqli_num_rows($user);
					echo "<p>(".$NoUser.") Users Registered</p>";
				?>
			</a>
		</div>
		<div class="pane-contain">
			<a href="adm-veh.php" class="pane" style="background-color: lightgreen;">
				<img src="../images/7.jpg" class="img">
				<?php 
					$user = mysqli_query($con, "select * from vehicle_reg");
					$NoUser = mysqli_num_rows($user);
					echo "<p>(".$NoUser.") Registered Vehicle</p>";
				?>
			</a>
		</div>
		<div class="pane-contain">
			<a href="adm-logout.php" class="pane" style="background-color: pink;">
				<img src="../images/31.jpg" class="img">
				<p>LogOut</p>
			</a>
		</div>
	</div>

</section>

<?php include('adm-footer.php'); ?>
</body>