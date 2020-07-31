<?php 
    include('main-header.php') ;
    include('name-bar.php');
?>

<style type="text/css">
	.back{
		background-color:red; border: none; color:white;text-decoration:none; float:right;
		padding: 5px 10px; float: left; margin-left: 20px;
	}
</style>

<?php 

 $q = mysqli_query($con, "select * from vehicle_reg");
 $no_q = mysqli_fetch_assoc($q);
 $v_id = $no_q['v_id'];


	$query = mysqli_query($con, "select * from vehicle_reg where v_id='$v_id' order by v_id desc");
	$num_rows = mysqli_num_rows($query);

	if ($num_rows > 0) {
		while ($row = mysqli_fetch_assoc($query)) {
			// $v_id = $row['v_id'];
			
			echo "<div class='product' >
				
					<table style='width:40%; border-collapse:collapse;'>
					<form action='' method='post'>
						<tr><td style='width:50%;'><span style='color:dodgerblue;'>Vehicle Registration Number </td><td style='text-transform:uppercase;'>".$row['plate_no']."</span></td></tr>
						<tr><td><span style='color:dodgerblue;'> Counties permitted </td><td> ".$row['county']."</span></td></tr>
						<tr><td><span style='color:dodgerblue;'> Company Registration Number</td><td>".$row['comp_reg']."</span></td></tr>
						<tr><td><span style='color:dodgerblue;'> Enter the transcation ID</span></td><td><input type='text' name='transcation_id' required></td></tr>
						<tr><td style=''><a href='home.php' class='back'>Back</a></td>
								<td>
									<input type='checkbox' name='checkbox' value='".$row['v_id']."' required>
									<input type='submit' name='renew' value='Renew'>
								</td>
						</tr>
					</form>
					</table>
				
				 </div>";
		}
	}
?>




<?php include('footer.php'); ?>

<?php 
	include('dbcon.php');
	include('mpesaRenew/dbconnect.php');

	// $v_id = $_GET['v_id'];
	if (isset($_POST['renew'])) {
		$checkbox = $_POST['checkbox'];
		$t_id = $_POST['transcation_id'];

		$select_id  = mysqli_query($conn, "select TransID from mpesa_payments where TransID='$t_id'");
		$nRows = mysqli_num_rows($select_id);
		if ($nRows==1) {
			$update = mysqli_query($con, "update vehicle_reg set date = Now() where v_id = '$checkbox'");
			if ($update) {
				echo "<script>alert('license renewed for 1 day'); window.open('renew-report.php?v_id=$v_id','_self')</script>";
			}else{
				echo "<script>alert('Failed to renew'); window.open('renew-trading.php','_self')</script>";
			}
		}else{
			echo "<script>alert('Wrong Transcation Id. Check and try again!!'); window.open('renew-trading.php','_self')</script>";
		}
	}

?>