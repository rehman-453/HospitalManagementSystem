<?php
	session_start();

	include('database_connectivity.php');
    if (!isset($_SESSION['user_id'])) 
    {
        header("Location: logout.php");
    }
    $query = "SELECT * FROM tbl_patient where patient_id = '".$_SESSION['user_id']."'";
    $result = $conn->query($query);

    while ($row = $result->fetch_assoc()) {
        $name = $row['name'];
        $email = $row['email'];
        $phone = $row['phone'];
        $date_of_birth = $row['date_of_birth'];
        $date_of_birth = strftime('%Y-%m-%d', $date_of_birth);
        $country = $row['country'];
        $city = $row['city'];
        $register_date = $row['created_on'];
        $MR_number = $row['patient_id'];
        $gender = $row['gender'];
    }
?>

<!DOCTYPE html>
<html>
<head>
    <title>Update Information</title>

    <?php include('head.php'); ?>
</head>
<body>
    <div id="wrapper">
    	<?php include('sidebar.php'); ?>

    	<div id="page-wrapper" style="min-height: 574px;">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Update Information</h1>
                    </div>


                    <form method="post" action="operation.php" enctype="multipart/form-data">
                        <div class="row">
                            <div class="form-group col-md-6">
                                <b>Full Name</b>
                                <input class="form-control" placeholder="Name axb" name="full_name" type="text" autofocus="" required="full_name" value="<?=$name?>">
                            </div>

                            <div class="form-group col-md-6">
                                <b>E-mail</b>
                                <input class="form-control" placeholder="E-mail" name="email" type="email" autofocus="" required="email" value="<?=$email?>">
                            </div>

                            <div class="form-group col-md-6">
                                <b>Contact No.</b>
                                <input class="form-control" placeholder="03xxxxxxxxx" name="contact_no" type="number" autofocus="" required="contact_no" value="<?=$phone?>">
                            </div>

                            <div class="form-group col-md-6">
                                <b>Date Of Birth</b>
                                <input class="form-control" name="birthday" type="date" autofocus="" required="birthday" value="<?=$date_of_birth?>">
                            </div>

                            <div class="form-group col-md-6">
                                <label>Country</label>
                                <?php
                                    $country_list = array('Pakistan','Australia','Italy','Turkey','Germany');
                                ?>
                                <select name="country" class="form-control">
                                    <option value="">--Select Country--</option>
                                    <?php
                                        foreach($country_list as $c) 
                                        {
                                            ?>
                                            <option values="<?=$c?>" <?php if($c==$country){echo "selected";}?>>
                                                <?=$c?>
                                            </option>
                                            <?php
                                        }
                                    ?>
                                </select>
                            </div>

                            <div class="form-group col-md-6">
                                <label>City</label>
                                <?php
                                    $city_list = array(
                                        'Karachi','Lahore','Islamabad','Multan','Hyderabad',
                                        'Sydney','Melbourne','Cairns','Busselton','Albany',
                                        'Rome','Milan','Bologna','Florence','Verona',
                                        'Istanbul','Ankara','Adana','Mersin','Erzurum',
                                        'Berlin','Munich','Dortmund','Bremen','Bonn'
                                    );
                                ?>
                                <select name="city" class="form-control">
                                    <option value="">--Select City--</option>
                                    <?php
                                        foreach($city_list as $cl)
                                        {
                                            ?>
                                            <option value="<?=$cl?>" <?php if($cl==$city){echo "selected";}?>><?=$cl?></option>
                                            <?php
                                        }
                                    ?>
                                </select>
                            </div>

                            <div class="form-group col-md-12">
                                <label>Gender</label>
                                <div class="radio">
                                    <label>
                                        <input name="gender" type="radio" value="male"
                                        <?php 
                                            if($gender == 'male')
                                            { 
                                                echo 'checked';
                                            }
                                            ?>
                                        >Male
                                    </label>
                                    <label>
                                        <input name="gender" type="radio" value="female"
                                        <?php 
                                            if($gender == 'female')
                                            { 
                                                echo 'checked';
                                            }
                                        ?>
                                        >Female
                                    </label>
                                    <label>
                                        <input name="gender" type="radio" value="other"
                                        <?php 
                                            if($gender == 'other')
                                            { 
                                                echo 'checked';
                                            }
                                        ?>
                                        >Other
                                    </label>
                                </div> 
                            </div>
                        </div>
                            <hr>
                        <div class="col-md-12 text-center">
                            <input type="submit" name="btn_update" value="Update" class="btn btn-lg btn-success ">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php include('footer.php'); ?>
</body>


</html>
