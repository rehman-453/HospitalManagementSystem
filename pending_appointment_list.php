<?php
    session_start();

    include('database_connectivity.php');
    if (!isset($_SESSION['user_id'])) 
    {
        header("Location: logout.php");
    }

    $msg = '';


    if (isset($_POST['btn_payment_yes'])) 
    {
        // echo "yes";
        $appointment_id = $_POST['appointment_id'];
        $sql = "UPDATE tbl_appointment 
                    SET 
                    appointment_status  =   'Approved',
                    payment_status      =   'Paid'
                WHERE appointment_id = '".$appointment_id."'";
        if ($conn ->query($sql) === TRUE)
        {
            $_SESSION['confirm_msg'] = 'Appoint Confirmed Successfully';
            header("Location: approved_appointment_list.php"); 
        }       
        else
        {
            echo "<b>Error:</b> ". $sql ."<br>". $conn->error;
        }
    }
    if (isset($_POST['btn_payment_no'])) 
    {
        $appointment_id = $_POST['appointment_id'];
        $sql = "UPDATE tbl_appointment 
                    SET 
                    appointment_status  =   'Canceled'
                WHERE appointment_id = '".$appointment_id."'";
        if ($conn ->query($sql) === TRUE)
        {
            $_SESSION['cancel_msg'] = 'Appoint Cancelled';
            header("Location: cancel_appointment_list.php"); 
        }       
        else
        {
            echo "<b>Error:</b> ". $sql ."<br>". $conn->error;
        }
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
                    
                    
                	<h3 style="text-align: center;">Pending Appointments</h3>
                
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
                            <th class="bg-primary" style="text-align: center;">Payment</th>
                            <th class="bg-primary" style="text-align: center;">Action</th>
                        </tr>

                        <?php
                        	$sql = "SELECT * FROM tbl_appointment WHERE patient_id = '".$_SESSION['user_id']."' AND appointment_status = 'Pending'";

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
	                        			<a  href="#" class="btn btn-sm btn-warning " ><i class="fa fa-spinner fa-spin"></i> <?=$row['appointment_status']?></a>
	                        		</td>
	                        		<td style="text-align: center;">
	                        			<a  href="#" class="btn btn-sm btn-danger " > <i class="fa fa-exclamation-triangle"></i> <?=$row['payment_status']?></a>
	                        		</td>
	                        		<td style="text-align: center;">
	                        			<a  href="#" class="btn btn-sm btn-success " data-toggle="modal" data-target="#appointmentID<?=$row['appointment_id']?>"><i class="fa fa-hand-o-right"></i> Pay</a>

	                        			<div class="modal fade" id="appointmentID<?=$row['appointment_id']?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	                        				<div class="modal-dialog" role="document">
	                        					<div class="modal-content">
                                                    <!-- <form method="post" action="operation.php"> -->
	                        						<form method="post" action="pending_appointment_list.php">
	                        							<input type="hidden"  name="appointment_id" value="<?=$row['appointment_id']?>" class="form-control" readonly>
	                        							
		                        						<div class="modal-header">
		                        							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
		                        								<span aria-hidden="true">&times;</span>
		                        							</button>
		                        							<h4 class="modal-title" id="myModalLabel">Are you sure you want to Pay!</h4>
		                        						</div>

		                        						<div class="modal-body">
		                        							<div class="row">
                        										<div class="col-md-2 form-group"></div>
                        										<div class="col-md-3 form-group">
                        											<label>Fees</label>
                        											<input type="text"  name="fees" value="Rs.<?=$row['fees']?>" class="form-control" readonly>
                        										</div>
                        										<div class="col-md-2 form-group">
                        											<label>Day</label>
                        											<input type="text"  name="day" value="<?=$row['appointment_day']?>" class="form-control" readonly>
                        										</div>
                        										<div class="col-md-3 form-group">
                        											<label>Date</label>
                        											<input type="text"  name="date" value="<?=strftime('%d-%b-%Y', $row['appointment_date'])?>" class="form-control" readonly>
                        										</div>
                        										<div class="col-md-2 form-group"></div>
                        									</div>
                                                            <div class="row">
                                                                <div class="col-md-1 form-group"></div>
                                                                <div class="col-md-4 form-group">
                                                                    <label>Card No</label>
                                                                    <input type="text"  name="card_no" placeholder="0000-0000-0000-0000" class="form-control" >
                                                                </div>
                                                                <div class="col-md-3 form-group">
                                                                    <label>Card Expiry</label>
                                                                    <input type="text"  name="card_expiry" placeholder="05/24" class="form-control" >
                                                                </div>
                                                                <div class="col-md-3 form-group">
                                                                    <label>OTP</label>
                                                                    <input type="password"  name="OTP" placeholder="****" class="form-control" >
                                                                </div>
                                                            </div>
                        									<hr>
                        									<div class="text-center">
	                        									<button type="button" class="btn btn-warning" data-dismiss="modal" >
                                                                    <i class="fa fa-times"></i> Close
                                                                </button>

                                                                <button class="btn btn-primary " name="btn_payment_yes"> 
                                                                    <i class="fa fa-money"></i> Yes
                                                                </button>

                                                                <button class="btn btn-danger " name="btn_payment_no"> 
                                                                    <i class="fa fa-ban"></i> Cancel Appointment
                                                                </button>
	                        								</div>
                        								</div>
                        							</form>
                        						</div>
	                        				</div>
	                        			</div>
	                        		</td>
	                        	</tr>
                        		<?php
                        		$i++; 
                        	}
                        ?>
                    </table>
                </div>
            </div>
        </div>
        <?php include('footer.php'); ?>
    </div>
</body>


</html>