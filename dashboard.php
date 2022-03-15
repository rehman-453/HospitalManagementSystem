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
    <title>Personal Information</title>
    <?php include('head.php'); ?>
</head>
<body>
    <div id="wrapper">
        <!-- Navigation -->
        <?php include('sidebar.php'); ?>

        <!-- Page Content -->
        <div id="page-wrapper" style="min-height: 574px;">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Personal Information</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>

                <div class="row"> 
                    <table style="width:100%" border="1" class="table table-striped">
                        <tr>
                            <th class="bg-primary" width="20%">Name:</th>
                            <td><?php echo $name;?></td>
                        </tr>
                        <tr>
                            <th class="bg-primary" width="20%">Email:</th>
                            <td><?php echo $email;?></td>
                        </tr>
                        
                        <tr>
                            <th class="bg-primary" width="20%">Contact:</th>
                            <td><?php echo $phone;?></td>
                        </tr>
                        <tr>
                            <th class="bg-primary" width="20%">Date Of Birth:</th>
                            <td><?php  echo strftime('%d-%b-%Y', $date_of_birth); ?></td>
                        </tr>
                        <tr>
                            <th class="bg-primary" width="20%">Country:</th>
                            <td><?php  echo $country; ?></td>
                        </tr>
                        <tr>
                            <th class="bg-primary" width="20%">City:</th>
                            <td><?php  echo $city; ?></td>
                        </tr>
                        <tr>
                            <th class="bg-primary" width="20%">Gender:</th>
                            <td><?php  echo $gender; ?></td>
                        </tr>
                        <tr>
                            <th class="bg-primary" width="20%">Registration Date:</th>
                            <td><?php  echo strftime('%d-%b-%Y', $register_date); ?></td>
                        </tr>
                        <tr>
                            <th class="bg-primary" width="20%">MR Number:</th>
                            <td><?php  echo $MR_number; ?></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>


        <?php include('footer.php'); ?>
    </div>
</body>


</html>