<?php 
	include('main-header.php'); 
	include('name-bar.php');
?>


<?php 

include('dbcon.php');
	// $b_id = $_GET['b_id'];

    $vehicle = mysqli_query($con, "select * from branding order by b_id desc");
    $num_rows = mysqli_num_rows($vehicle);

	 if ($num_rows>0) {
        while ($row = mysqli_fetch_assoc($vehicle)) {
            $reg = $row['comp_reg'];
            $plate = $row['plate_no'];
            $date = $row['date'];
            $endDate = date("Y-m-d", strtotime(date("Y-m-d", strtotime($date)). " 365 day"));
            $date = date("Y-m-d");
            $duration = strtotime($endDate) - strtotime($date);
            $dur_day = floor($duration/(3600*24));
            $dur_day = ($dur_day < 1) ? "0" : $dur_day;
        }
    }

 ?>

 <?php 

include('dbcon.php');

    $select = mysqli_query($con, "select comp_name from user where comp_reg = '$id_sess'");
    if (mysqli_num_rows($vehicle)>0) {
    	while ($r = mysqli_fetch_assoc($select)) {
    		$name = $r['comp_name'];
    	}
    }


 ?>
<div class="container" id="div-id-name" style="text-align: center;">
	<table class="table">
		<tr><th>Description</th><th>Values</th><th>Description</th><th>Values</th></tr>
		<tr><td>&nbsp;&nbsp;Company Name</td><td class="values">&nbsp;&nbsp;<?php echo $name; ?></td><td>&nbsp;&nbsp;Company Reg No.</td><td class="values">&nbsp;&nbsp;<?php echo $reg; ?></td></tr>
		<tr><td>&nbsp;&nbsp;Vehicle reg No</td><td class="values">&nbsp;&nbsp;<?php echo $plate; ?></td></tr>
		<tr><td>&nbsp;&nbsp;Type of Permit</td><td class="values">&nbsp;&nbsp;Branding Permit</td><td>&nbsp;&nbsp;County Paid For</td><td></td></tr>
		<tr><td>&nbsp;&nbsp;Date of renewal</td><td class="values">&nbsp;&nbsp;<?php echo $date; ?></td><td>&nbsp;&nbsp;Duration</td><td class="values">&nbsp;&nbsp;1 year</td></tr>
		<tr><td>&nbsp;&nbsp;Date of Expiry</td><td class="values">&nbsp;&nbsp;<?php echo $endDate; ?></td></tr>
	</table>
	
</div>
<center><a href="#" id="print" onclick="javascript:printlayer('div-id-name')" style="text-decoration:none;background:blue;color:white;padding:10px;">Print Receipt</a></center>

<script type="text/javascript">
	function printlayer(layer){
		var generator = window.open(",name,");
		var layetext = document.getElementById(layer);
		generator.document.write(layetext.innerHTML.replace("Print Me"));

		generator.document.close();
		generator.print();
		generator.close();
	}
</script>


<style type="text/css">
	.table{
		width:70%;
		border: 1px solid black;
		border-collapse: collapse;
	}
	.table tr th{
		padding: 10px;
		background: green;
		color: white;
	}
	.table tr td{
		padding:10px;
		border-bottom: 1px solid black;
		border-left: 1px solid black;
		border-top: 1px solid black;
	}
	.values{
		text-transform: uppercase;
		color: blue;
	}
</style>