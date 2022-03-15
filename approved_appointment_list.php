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
                        if (isset($_SESSION['confirm_msg'])) {
                            ?>
                            <div class="alert alert-success">
                                <p><?=$_SESSION['confirm_msg']?></p>
                            </div>
                            <?php 
                        }
                        unset($_SESSION['confirm_msg']);
                        // var_dump($_SESSION);
                    ?>
                    <!-- <div class="col-sm-12"> -->
                    <h3 style="text-align: center;">Approved Appointments</h3>
                
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
                            <th class="bg-primary" style="text-align: center;">Action</th>
                           
                        </tr>

                        <?php
                            $sql = "SELECT * FROM tbl_appointment WHERE patient_id = '".$_SESSION['user_id']."' AND appointment_status = 'Approved'";

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
                                        <a  href="#" class="btn btn-sm btn-success fa fa-thumbs-o-up" > 
                                            <?=$row['appointment_status']?>
                                        </a>
                                    </td>
                                    <td style="text-align: center;">
                                        <a  href="feedback.php?app_id=<?=$row["appointment_id"]?>" class="btn btn-sm btn-info fa fa-commenting" > 
                                            Feedback
                                        </a>
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