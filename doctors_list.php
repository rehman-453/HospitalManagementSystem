<?php
    session_start();

    include('database_connectivity.php');
    if (!isset($_SESSION['user_id'])) 
    {
        header("Location: logout.php");
    }
    $query = "SELECT doc_category FROM tbl_doctors GROUP BY doc_category";
    $result = $conn->query($query);

    $i = 0;
    $doctors_cat_list = array();

    while ($row = $result->fetch_assoc()) {
        $doctors_cat_list[$i] = $row['doc_category'];
        $i++;
    }
?>
<!DOCTYPE html>
<html>
<head>
    <title>Doctors List</title>
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
                        <h1 class="page-header">Doctors List</h1>
                    </div>

                    <form method="post" action="doctors_list.php" enctype="multipart/form-data">
                        <div class="row">
                        	<div class="form-group col-md-3">
                                <label>Doctors Category</label>
                                <select name="doctor_category" class="form-control">
                                    <option value="">--Select Category--</option>
                                    <?php
                                        foreach($doctors_cat_list as $doctor) 
                                        {
                                            ?>
                                            <option values="<?=$doctor?>"> <?=$doctor?> </option>
                                            <?php
                                        }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group col-md-3">
                                <label>Doctor's Name</label>
                                <input class="form-control" placeholder="Doctor's Name" name="doctor_name" type="text" autofocus >
                            </div>
                            <div class="form-group col-md-2">
                            	<br>
                            	<button type="submit" name="btn_search_doctor" value="Search" class="btn btn-info">
			              			<i class="fa fa-search mr-3"></i>  Search
			              		</button>
                            </div>
                        </div>
                    </form>
                    <!-- /.col-lg-12 -->
                </div>

                <div class="row">
                    <table style="width:100%" border="1" class="table table-striped"  >
                        <tr>
                            <th style="text-align: center;" class="bg-primary" width="5%">S.No.</th>
                            <th class="bg-primary">Name</th>
                            <th class="bg-primary">Category</th>
                            <th style="text-align: center;" class="bg-primary">Days</th>
                            <th style="text-align: center;" class="bg-primary">Timing</th>
                            <th style="text-align: center;" class="bg-primary">Fees</th>
                            <th style="text-align: center;" class="bg-primary">Appointment</th>
                        </tr>

                        <?php
                        	$sql = "SELECT * FROM tbl_doctors ORDER BY doc_category";

                        	if (isset($_POST['btn_search_doctor'])) 
						    {
						    	if ($_POST['doctor_category']) 
								{
									$sql = "SELECT * FROM tbl_doctors WHERE doc_category = '".$_POST['doctor_category']."'";
								}
						    	if ($_POST['doctor_name']) 
								{
									$sql = "SELECT * FROM tbl_doctors WHERE doctor_name LIKE '%".$_POST['doctor_name']."%'";
								}
						    	if ($_POST['doctor_name'] && $_POST['doctor_category']) 
								{
									$sql = "SELECT * FROM tbl_doctors WHERE doctor_name LIKE '%".$_POST['doctor_name']."%' AND doc_category = '".$_POST['doctor_category']."'";
								}
							}
						    $result = $conn->query($sql);

                        	$i = 1;
                        	while ($row = $result->fetch_assoc()) 
                        	{
                        		?>
                        		<tr>
	                        		<td style="text-align: center;"><b><?=$i?></b></td>
	                        		<td><?=$row['doctor_name']?></td>
	                        		<td ><?=$row['doc_category']?></td>
	                        		<td style="text-align: center;" width="19%"><?=$row['days']?></td>
	                        		<td style="text-align: center;" width="16%"><?=$row['timing']?></td>
	                        		<td style="text-align: center;" width="8%">Rs.<?=$row['fees']?></td>
	                        		<td style="text-align: center;" width="11%">
	                        			<a  href="" class="btn btn-sm btn-info fa fa-check" data-toggle="modal" data-target="#docID<?=$row['doc_id']?>"> Book</a>

	                        			<div class="modal fade" id="docID<?=$row['doc_id']?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	                        				<div class="modal-dialog" role="document">
	                        					<div class="modal-content">
	                        						<form method="post" action="operation.php">
	                        							<input type="hidden"  name="patient_id" value="<?=$_SESSION['user_id']?>" class="form-control" readonly>
                                                        <input type="hidden"  name="doc_id" value="<?=$row['doc_id']?>" class="form-control" readonly>
	                        							<input type="hidden"  name="doc_category" value="<?=$row['doc_category']?>" class="form-control" readonly>
	                        							<input type="hidden"  name="fees" value="<?=$row['fees']?>" class="form-control" readonly>
		                        						<div class="modal-header">
		                        							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
		                        								<span aria-hidden="true">&times;</span>
		                        							</button>
		                        							<h4 class="modal-title" id="myModalLabel">Are you sure you want to Book Appointment!</h4>
		                        						</div>

		                        						<div class="modal-body">
		                        							<div class="row">
                        										<?php $days = explode(',', $row['days']); ?>
                        										<div class="col-md-1 form-group"></div>

                        										<div class="col-md-5 form-group">
                        											<label >Day</label>
                        											<select name="appointment_day" class="form-control" required="">
                        												<option value="">--Select Day--</option>
                        												<?php
                        													foreach($days as $d)
                        													{
                        														?>
                        														<option value="<?=$d?>"><?=$d?></option>
                        														<?php
                        													}
                        												?>
                        											</select>
                        										</div>

                        										<div class="col-md-5 form-group">
                        											<label>Date</label>
                        											<input type="date" name="appointment_date" class="form-control" required="">
                        										</div>
                        										<div class="col-md-1 form-group"></div>
                        									</div>
                        									<div class="row">
                        										<div class="col-md-1 form-group"></div>
                        										<div class="col-md-5 form-group">
                        											<label>Timing</label>
                        											<input type="text" name="appointment_time" class="form-control" value="<?=$row['timing']?>" readonly="">
                        										</div>
                        										<div class="col-md-5 form-group">

                        											<label>Doctor</label>
                        											<input type="text" name="doctor_name" class="form-control" value="<?=$row['doctor_name']?>" readonly="">
                        										</div>
                        										<div class="col-md-1 form-group"></div>
                        									</div>
                        									<hr>
                        									<div class="text-center">
	                        									<button type="button" class="btn btn-warning" data-dismiss="modal" >Close</button>
	                        									<input type="submit" name="btn_book_appointment" value="Confirm" class="btn btn-success">
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