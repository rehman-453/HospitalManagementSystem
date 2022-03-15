<?php
    session_start();

    include('database_connectivity.php');
    if (!isset($_SESSION['user_id'])) 
    {
        header("Location: logout.php");
    }

    if (!empty($_GET['app_id'])) {
        $appointment_id = $_GET['app_id'];
    }

    

    if (!empty($_GET['app_id'])) 
    {
        $appointment_id = $_GET['app_id'];
    }
    else
    {
        $appointment_id = 0;
    }
?>
<!DOCTYPE html>
<html>
<head>
    <title>Feedback</title>
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
                        <h1 class="page-header">Feedback Form</h1>
                    </div>
                </div>

                <div class="row">
                    <form method="post" action="operation.php" enctype="multipart/form-data">
                        <input type="hidden"  name="appointment_id" value="<?=$appointment_id?>" class="form-control" readonly>
                        <div class="form-group col-md-6">
                            
                            <textarea name="feedback" class="form-control" rows="5" placeholder="Type your feedback..."></textarea>
                        </div>
                        <div class="form-group col-md-6">
                            <br>
                            <br>
                            <br>
                            <br>
                            <button class="btn btn-success " name="btn_feedback"> 
                                <i class="fa fa-plus-square"></i> Submit
                            </button>
                        </div>
                    </form>
                </div>

                <hr>

                <div class="row">
                    <table style="width:100%" border="1" class="table table-striped"  >
                        <tr>
                            <th style="text-align: center;" class="bg-primary" width="5%">S.No.</th>
                            <th class="bg-primary">Feedback</th>
                            <th class="bg-primary" style="text-align: center;">Date</th>
                        </tr>

                        <?php
                            $sql = "SELECT * FROM tbl_feedback WHERE patient_id = '".$_SESSION['user_id']."' ORDER BY feedback_id DESC";

                            $result = $conn->query($sql);

                            $i = 1;
                            while ($row = $result->fetch_assoc()) 
                            {
                                ?>
                                <tr>
                                    <td style="text-align: center;"><b><?=$i?></b></td>
                                    <td><?=$row['feedback']?></td>
                                    <td style="text-align: center;" width="15%"><?=strftime('%d-%b-%Y', $row['created_on'])?></td>
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