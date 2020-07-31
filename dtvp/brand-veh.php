<?php 
    include('main-header.php') ;
    include('name-bar.php');
?>

    <section class="main">
    
        <form class="add-veh" action="" method="POST">
            <h2 style="color: black;">VEHICLE BRANDING FORM</h2>
            <input class="inputs" type="text" name="veh-no" placeholder="Vehicle Reg No" required><br><br>

            <label>Select the county(s) to pay for (<i style="font-size: 13px; color: dodgerblue;">Hold the CTL key down to add additional selections</i>) <br>
                <select name="counties" multiple="multiple" class="inputs" required>
                    <option value="Nairobi" selected="selected">Nairobi</option>
                    <option value="Kisumu">Kisumu</option>
                    <option value="Nakuru">Nakuru</option>
                    <option value="Mombasa">Mombasa</option>
                    <option value="Kakamega">Kakamega</option>
                </select><br>
            </label><br>
            <input class="inputs" type="text" name="t_id" placeholder="Enter transcation id" required><br><br>
            <a href="branding.php" class="btn" style="background-color: red; color: white; text-decoration: none; border:none;">Back</a>
            <input class="btn" type="submit" name="reg-veh" value="SUBMIT">

        </form>
    </section>

<br><br><br>
<?php include('footer.php') ?>

</body>
</html>
 
<?php 



    if (isset($_POST['reg-veh'])) {

        $vehno = mysqli_real_escape_string($con, $_POST['veh-no']);
        $counties = mysqli_real_escape_string($con, $_POST['counties']);


        // $query = mysqli_query($con, "select * from user where comp_reg = '$id_sess'");
        // $row = mysqli_fetch_array($query); 
        // $comp_reg = $row['comp_reg'];

        // header('Location: mpesa-php/index.php');
        $t_id = $_POST['transcation_id'];

        $select_id  = mysqli_query($conn, "select * from mpesa_payments where TransID='$t_id'");
        $nRows = mysqli_num_rows($select_id);
        if ($nRows==1) {
        
            $add = mysqli_query($con, "insert into branding(plate_no, county, comp_reg, date) values('$vehno','$counties','$comp_reg',Now())");
            if($add){
                echo "<script> alert('added successfully'); window.open('branding-report.php?b_id=$b_id','_self') </script>";
            }else{
                // header('Location: ');
                echo "<script> alert('Failed to Update'); window.open('brand-veh3.php','_self') </script>";
            }
        }else{
            echo "<script>alert('Wrong Transcation Id. Check and try again!!'); window.open('brand-veh.php','_self')</script>";
        }
    }

?>
