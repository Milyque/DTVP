<?php 
    include('main-header.php') ;
    include('name-bar.php');
?>

<!-- <h1 style="font-size:40px;">Renew and pay for those transporter vehicle at the comfort of your own liking </h1> -->

<style type="text/css">
.btn2{
    background: brown;
    color: white;
    border: 1px solid brown;
    padding: 5px;
    text-decoration: none;
    border-radius: 7px;
    margin-top: 20px;
}
.btn2:hover{
    background: white;
    color: brown;

}

tr:hover{
    background-color: #ccc;
}
tr td{
    padding: 10px;
}
</style>

<body>
    <section class="main">  
    <p style="color: black;">YOUR TRADING PERMITS TABLE: 
    <span style="font-synthesis: unset; color: red;">(If no vehicle is on list proceed to add)</span>&nbsp;
    <a href="mpesa-php/index.php" class="btn">ADD VEHICLE</a>
    <form action="search.php" method="post">
        Search by: <input type="text" name="in" placeholder="Comp reg, plate no or county">
        <input type="submit" name="search" value="search">
    </form>
    </p> 

    <?php 
             ?>

    <?php 
        include('dbcon.php');

        $vehicle = mysqli_query($con, "select * from vehicle_reg order by v_id desc");
        $num_rows = mysqli_num_rows($vehicle);

        // $reg = mysqli_query($con, "select * from vehicle_reg");
        // $reg_row = mysqli_fetch_assoc($reg);
        // $comp_reg = $reg_row['comp_reg'];
        
            echo "
                <table style='width:90%; border-bottom:2px solid black;'>
                <tr style='background-color:green; color:white;'>
                    <th>Reg</th>
                    <th>Vehicle reg.no</th>
                    <th>Counties paid for</th>
                    <th>Date Renewed</th>
                    <th>Expiry Date</th>
                    <th>Expiry due (days)</th>
                    <th>Status</th>
                </tr>
                ";
        if ($num_rows>0) {
            while ($row = mysqli_fetch_assoc($vehicle)) {
                $reg = $row['comp_reg'];
                $v_id = $row['v_id'];
                $date = $row['date'];
                $endDate = date("Y-m-d", strtotime(date("Y-m-d", strtotime($date)). " 365 days"));
                $date = date("Y-m-d");
                $duration = strtotime($endDate) - strtotime($date);
                $dur_day = floor($duration/(3600*24));
                $dur_day = ($dur_day < 1) ? "0" : $dur_day;
                echo "
                    <tr style='padding:10px;'>
                        <td style='text-transform:uppercase;'>".$reg."</td>
                        <td style='text-transform:uppercase;'>".$row['plate_no']."</td>
                        <td style='text-transform:capitalize;'>".$row['county']."</td>
                        <td style='color:dodgerblue;'>".$row['date']." </td>
                        <td style='text-transform:capitalize; color:red;'>".$endDate."</td>
                        <td style=''>".$dur_day."</td>";
                        if(date("Y-m-d") < $endDate){
                        echo "<td style='color:dodgerblue; padding:5px; font-weight:bold;'>Active</td>";
                        }
                        else{
                        echo "
                         <td><a class='btn2' style='margin: 10px;' href='mpesaRenew/index.php'>Renew</a></td>
                        ";}
                        echo "
                    </tr>
                ";
            }
           
        } echo "</table>";
    ?>
    <!-- <td><a class='btn2' style='margin: 10px;' href='renew-trading.php?v_id=$v_id'>Renew</a></td> -->
    <br>
    <a href="home.php" class="btn" style="background-color: red; border: none; color: white;">GO BACK</a> 
    <a href="mpesa-php/index.php" class="btn">ADD VEHICLE</a>
    <br><br>

    </section>
    <?php include('footer.php') ?>
          
    </html>
