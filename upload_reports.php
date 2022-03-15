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
    <title>Reports</title>
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
                        <h1 class="page-header"> Reports</h1>
                    </div>
                    <div class="panel-body">
                    	<form method="post" action="operation.php" enctype="multipart/form-data">
                    		<div class="form-group col-md-3">
                                <label>Upload Report</label>
                                <input type="file" name="file" required="file"><br>
                                
                            </div>
                            <div class="form-group col-md-4">
                            	<br>
                            	<button type="submit" name="btn_upload_report" value="Search" class="btn btn-primary">
			              			<i class="fa fa-upload mr-2"></i>  Upload
			              		</button>
                            </div>

                        </form>
                    </div>
                </div>
                
                <div class="row">
                    <table style="width:100%" border="1" class="table table-striped"  >
                        <tr>
                            <th class="bg-primary" width="5%">S.No.</th>
                            <th class="bg-primary">Report</th>
                            <th class="bg-primary" width="15%" style="text-align: center;">Date</th>
                            <th class="bg-primary" width="15%" style="text-align: center;">Action</th>
                        </tr>

                        <?php
                        	$query = "SELECT * FROM tbl_patient_report where patient_id = '".$_SESSION['user_id']."'";
                        	
                        	$result = $conn->query($query);
						    $count = 1;

						    while ($row = $result->fetch_assoc()) 
						    {
						    	?>
						    	<tr>
						    		<td style="text-align: center;"><b><?=$count?></b></td>
						    		<td><?=$row['file_name']?></td>
						    		<td style="text-align: center;"><?=strftime('%d-%b-%Y', $row['upload_date'])?></td>
						    		<td style="text-align: center;">
						    			<a href="<?=$row["report_file_path"]?>" class="btn fa fa-download btn-info btn-sm"> Download</a>
						    		</td>
						    	</tr>
						    	<?
						    	$count++;
						    }
                        ?>
                        
                    </table>


                </div>


            </div>
        </div>
        <?php include('footer.php'); ?>
    </div>
</body>
