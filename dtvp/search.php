
<?php
include('main-header.php');
include('name-bar.php');
echo '<br>
	<a href="trading.php" style="text-decoration:none;background:red;color:white;padding:10px;margin:10px;">Back</a>
	<center><form action="search.php" method="post">
	    Search by: <input type="text" name="in" placeholder="Comp reg, plate no or county">
	    <input type="submit" name="search" value="search">
	</form></center>'
	;

if (isset($_POST['search'])) {
    $in = $_POST['in'];

    $search_query = mysqli_query($con, "select * from vehicle_reg where comp_reg like '%$in%' or county like '%$in%' or plate_no like '%$in%'");
	$query_rows = mysqli_num_rows($search_query);

	echo "(".$query_rows.") Results were found <br><br>";

	if ($query_rows > 0) {
		while ($row = mysqli_fetch_assoc($search_query)) {
			$date = $row['date'];
            $v_id = $row['v_id'];
            $endDate = date("Y-m-d", strtotime(date("Y-m-d", strtotime($date)). " 7 day"));
            $date = date("Y-m-d");
            $duration = strtotime($endDate) - strtotime($date);
            $dur_day = floor($duration/(3600*24));
            $dur_day = ($dur_day < 1) ? "0" : $dur_day;

			echo "<div style='margin-bottom: 10px; background:#ccc; padding:10px; width:20%; display:inline-grid; text-align:center; margin-right:20px; box-shadow: 0px 0px 15px rgba(0, 0 , 0, 0.6); border-radius:10px;'>
				<table border=1 style='border-collapse: collapse; width: 90%;'>
					<tr><td>Company Reg No</td><td>".$row['comp_reg']."</td></tr>
					<tr><td>Vehicle Reg no</td><td>".$row['plate_no']."</td></tr>
					<tr><td>County Permited</td><td>".$row['county']."</td></tr>
					<tr><td>Date Renewed</td><td>".$row['date']."</td></tr>
					<tr><td style=''>(".$dur_day.") Days to expire</td>";
						if(date("Y-m-d") < $endDate){
                        echo "<td style='color:dodgerblue; padding:5px; font-weight:bold;'>Active</td>";
                        }
                        else{
                        echo "
                         <td><a class='btn2' style='margin: 10px;' href='mpesaRenew/index.php?v_id=$v_id'>Renew</a></td>
                        ";}echo"
					</tr>
              	</table>
       			 </div>";
		}
	}else{
		echo "<h1>No search result was found</h1>";
	}
}


?>