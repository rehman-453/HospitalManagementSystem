<?php
    session_start();

    include('database_connectivity.php');
    if (!isset($_SESSION['user_id'])) 
    {
        header("Location: logout.php");
    }
?>
<!DOCTYPE html>
<html>
<head>
    <title>Appointments</title>
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
                        <h1 class="page-header">Appointments</h1>
                    </div>
                </div>

                

                

                <div class="row">
                    <?php 
                        if (isset($_SESSION['cancel_msg'])) {
                            ?>
                            <div class="alert alert-danger">
                                <p><?=$_SESSION['cancel_msg']?></p>
                            </div>
                            <?php 
                        }
                        unset($_SESSION['cancel_msg']);
                        // var_dump($_SESSION);
                    ?>
                	<h3 style="text-align: center;">Cancel Appointments</h3>
                
                    <table style="width:100%" border="1" class="table table-striped"  >
                        <tr>
                            <th style="text-align: center;" class="bg-primary" width="5%">S.No.</th>
                            <th class="bg-primary">Doctor</th>
                            <th class="bg-primary" style="text-align: center;">Doctor Category</th>
                            <th style="text-align: center;" class="bg-primary">Fees</th>                           
                            <th class="bg-primary" style="text-align: center;">Day</th>
                            <th class="bg-primary" style="text-align: center;">Date</th>
                            <th class="bg-primary" style="text-align: center;">Time</th>
                            <th class="bg-primary" style="text-align: center;">Status</th>
                           
                        </tr>

                        <?php
                        	$sql = "SELECT * FROM tbl_appointment WHERE patient_id = '".$_SESSION['user_id']."' AND appointment_status = 'Canceled'";

                        	$result = $conn->query($sql);

                        	$i = 1;
                        	while ($row = $result->fetch_assoc()) 
                        	{
                        		?>
                        		<tr>
	                        		<td style="text-align: center;"><b><?=$i?></b></td>
	                        		<td><?=$row['doctor_name']?></td>
	                        		<td style="text-align: center;"><?=$row['doc_category']?></td>
	                        		<td style="text-align: center;" width="8%">Rs.<?=$row['fees']?></td>
	                        		<td style="text-align: center;"><?=$row['appointment_day']?></td>
	                        		<td style="text-align: center;"><?=strftime('%d-%b-%Y', $row['appointment_date'])?></td>
	                        		<td style="text-align: center;"><?=$row['appointment_time']?></td>
	                        		<td style="text-align: center;">
	                        			<a  href="#" class="btn btn-sm btn-danger fa fa-ban" > <?=$row['appointment_status']?></a>
	                        		</td>
	                        	</tr>
                        		<?php
                        		$i++; 
                        	}
                        ?>
                    </table>
                    <!-- </div> -->
                </div>
            </div>
        </div>
        <?php include('footer.php'); ?>
    </div>
</body>


</html>