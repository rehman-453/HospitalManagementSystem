<?php 
    session_start();
    include('database_connectivity.php');
    if (!isset($_SESSION['doc_id'])) 
    {
        header("Location: logout.php");
    } 


?>

<!DOCTYPE html>
<html>
<head>
    <title>History</title>
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
                        <h1 class="page-header"> Patient History</h1>
                    </div>
                    
                </div>
                
                <div class="row">
                    <table style="width:100%" border="1" class="table table-striped"  >
                        <tr>
                            <th class="bg-primary" width="5%">S.No.</th>
                            <th class="bg-primary" >Patient</th>
                            <th class="bg-primary">Report</th>
                            <th class="bg-primary" width="15%" style="text-align: center;">Date</th>
                            <th class="bg-primary" width="15%" style="text-align: center;">Action</th>
                        </tr>

                        <?php
                            $query = "SELECT p.`name`, r.`file_name`,r.`upload_date` ,r.`report_file_path`
                                        FROM tbl_patient_report AS r
                                        INNER JOIN tbl_patient AS p ON p.`patient_id` = r.`patient_id`";
                            
                            $result = $conn->query($query);
                            $count = 1;

                            while ($row = $result->fetch_assoc()) 
                            {
                                ?>
                                <tr>
                                    <td style="text-align: center;"><b><?=$count?></b></td>
                                    <td><?=$row['name']?></td>
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
