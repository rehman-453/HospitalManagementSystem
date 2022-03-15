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
                        <h1 class="page-header">Appointment List</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>

                <div class="row">
                    <table style="width:100%" border="1" class="table table-striped"  >
                        <tr>
                            <th class="bg-primary" width="5%">S.No.</th>
                            <th class="bg-primary" >Patient</th>
                            <th class="bg-primary">Day</th>
                            <th class="bg-primary" width="15%" style="text-align: center;">Date</th>
                        </tr>

                        <?php
                            $query = "SELECT p.`name`, a.`appointment_day`,a.`appointment_date`
                                FROM tbl_appointment AS a
                                INNER JOIN tbl_patient AS p ON p.`patient_id`=a.`patient_id`
                                WHERE doc_id = '" . $_SESSION['doc_id'] . "' AND a.`appointment_status` = 'Approved'";
                            
                            $result = $conn->query($query);
                            $count = 1;

                            while ($row = $result->fetch_assoc()) 
                            {
                                ?>
                                <tr>
                                    <td style="text-align: center;"><b><?=$count?></b></td>
                                    <td><?=$row['name']?></td>
                                    <td><?=$row['appointment_day']?></td>
                                    <td style="text-align: center;"><?=strftime('%d-%b-%Y', $row['appointment_date'])?></td>
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


</html>