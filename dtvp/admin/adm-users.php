<style type="text/css">
	table{
		width: 80%;
	}
	tr th{
		background-color: green;
		color: white;
		padding: 10px;
	}
	tr td{
		padding: 10px;
		text-align: center;
	}
	.dtl{
		background-color: red;
		color: white;
		border-radius: 10px;
		padding: 5px;
		border: 1px solid red;
	}
	.dtl:hover{
		background-color: white;
		color: red;
	}
</style>

<?php 
	include('adm-header.php');
?>
<div class="container">
	<div class="sidebar">
		<h2>Navigation Bar</h2>
		<li><a class="a" href="adm-home.php">Home</a></li>
		<li><a class="a hightlight" href="adm-users.php">View Users</a></li>
		<li><a class="a" href="adm-veh.php">View Vehicles</a></li>
		<li><a class="a" href="adm-about.php">About</a></li>
		<li><a class="a" href="adm-logout.php">LogOut</a></li>
	</div>
<?php
	$user = mysqli_query($con, "select * from user");
	$user_no = mysqli_num_rows($user);
	?>
	<div class="main" style="background-color: #eee; border-radius: 10px;">
		<table border="1">
			<tr>
				<th>Company Name</th>
				<th>Registration Number</th>
				<th>Company Email</th>
				<th>CheckList</th>
				<th>Actions</th>
			</tr>
	<?php
	if ($user_no > 0) {
		while ($row = mysqli_fetch_assoc($user)) {
		?>
			<tr>
				<form action="" method="post">
					<td><?php echo $row['comp_name'] ?></td>
					<td><?php echo $row['comp_reg'] ?></td>
					<td><?php echo $row['email'] ?></td>
					<td><input type="checkbox" name="check" value="<?php echo $row['userID'] ?>" required></td>
					<td><input type="submit" name="dtl" value="Delete" class="dtl"></td>
				</form>
			</tr>
		<?php
		}
	}
?>
		</table>
	</div>
</div>

<?php include('adm-footer.php'); ?>

<?php 

	if (isset($_POST['dtl'])) {
		$key = $_POST['check'];

		$select = mysqli_query($con, "select * from user where userID = $key");
		$selected_no = mysqli_num_rows($select);
		if ($selected_no > 0) {
			$delete_query = mysqli_query($con, "delete from user where userID = $key");
			if ($delete_query) {
				echo "<script>alert('Checked rows have been deleted successfully'); window.open('adm-users.php','_self')</script>";
			}
		}
	}

?>
