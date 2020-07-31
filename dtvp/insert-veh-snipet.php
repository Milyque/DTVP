<?php include('header.php') ?>
<section class="main">
    
        <form class="add-veh" action="" method="POST">
            <h2 style="color: black;">VEHICLE REGISTRATION FORM</h2>
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
            <a href="trading.php" class="btn" style="background-color: red; color: white; text-decoration: none; border:none;">Back</a>
            <input class="btn" type="submit" name="reg-veh" value="Proceed to Payment">

        </form>
    </section>

<?php
include('dbcon.php');

if (isset($_POST['reg-veh'])) {

        $vehno = mysqli_real_escape_string($con, $_POST['veh-no']);
        $counties = mysqli_real_escape_string($con, $_POST['counties']);

        // header('Location: mpesa-php/index.php');
        
        $add = mysqli_query($con, "insert into vehicle_reg(plate_no, county, comp_reg, date) values('$vehno','$counties','$comp_reg',Now())");
        if($add){
            echo "<script> alert('added successfully') window.open('trading.php','_self') </script>";
        }else{
            // header('Location: ');
            echo "error";
        }
    }
?>