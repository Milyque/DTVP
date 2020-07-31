<div class="namebar">
	<?php
	include('dbcon.php');
	    $pic_query = mysqli_query($con, "select * from user where comp_reg = '$id_sess'");
	    $row = mysqli_fetch_array($pic_query);
	    echo "<p style='color: black;'>".$row['comp_name']." company - (".$_SESSION['comp_reg'].")</p>"; 
	?>
</div>

<style type="text/css">
	.namebar{
		background-color: skyblue;
		width: 99.8%;
		padding: 1px;
		font-size: 120%;
		text-align: center;
	}
</style>