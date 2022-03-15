<?php

session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Registration</title>
    <?php include('head.php'); ?>
</head>

<body>
    <div id="wrapper">
        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="home.php">Wellcome for Registration </a>

            </div>

            <!-- /.navbar-header -->
            <ul class="nav navbar-top-links navbar-right in">
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false">
                        <i class="fa fa-envelope fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-messages">
                        <li>
                            <a href="#">
                                <div>
                                    <strong>John Smith</strong>
                                    <span class="pull-right text-muted">
                                        <em>Yesterday</em>
                                    </span>
                                </div>
                                <div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eleifend...</div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <strong>John Smith</strong>
                                    <span class="pull-right text-muted">
                                        <em>Yesterday</em>
                                    </span>
                                </div>
                                <div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eleifend...</div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <strong>John Smith</strong>
                                    <span class="pull-right text-muted">
                                        <em>Yesterday</em>
                                    </span>
                                </div>
                                <div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eleifend...</div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a class="text-center" href="#">
                                <strong>Read All Messages</strong>
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </li>
                    </ul>

                    <!-- /.dropdown-messages -->
                </li>

                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false">
                        <i class="fa fa-tasks fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-tasks">
                        <li>
                            <a href="#">
                                <div>
                                    <p>
                                        <strong>Task 1</strong>
                                        <span class="pull-right text-muted">40% Complete</span>
                                    </p>
                                    <div class="progress progress-striped active">
                                        <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
                                            <span class="sr-only">40% Complete (success)</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <p>
                                        <strong>Task 2</strong>
                                        <span class="pull-right text-muted">20% Complete</span>
                                    </p>
                                    <div class="progress progress-striped active">
                                        <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 20%">
                                            <span class="sr-only">20% Complete</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <p>
                                        <strong>Task 3</strong>
                                        <span class="pull-right text-muted">60% Complete</span>
                                    </p>
                                    <div class="progress progress-striped active">
                                        <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%">
                                            <span class="sr-only">60% Complete (warning)</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <p>
                                        <strong>Task 4</strong>
                                        <span class="pull-right text-muted">80% Complete</span>
                                    </p>
                                    <div class="progress progress-striped active">
                                        <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%">
                                            <span class="sr-only">80% Complete (danger)</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a class="text-center" href="#">
                                <strong>See All Tasks</strong>
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </li>
                    </ul>

                    <!-- /.dropdown-tasks -->
                </li>

                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false">
                        <i class="fa fa-bell fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-alerts">
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-comment fa-fw"></i> New Comment
                                    <span class="pull-right text-muted small">4 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-twitter fa-fw"></i> 3 New Followers
                                    <span class="pull-right text-muted small">12 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-envelope fa-fw"></i> Message Sent
                                    <span class="pull-right text-muted small">4 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-tasks fa-fw"></i> New Task
                                    <span class="pull-right text-muted small">4 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-upload fa-fw"></i> Server Rebooted
                                    <span class="pull-right text-muted small">4 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a class="text-center" href="#">
                                <strong>See All Alerts</strong>
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </li>
                    </ul>

                    <!-- /.dropdown-alerts -->
                </li>

                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false">
                        <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user in">
                        <li><a href="" class="active"><i class="fa fa-user fa-fw"></i> User Profile</a>
                        </li>
                        <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="index.php" class="active"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar in" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav in" id="side-menu">
                        <li class="sidebar-search">
                            <div class="input-group custom-search-form">
                                <input type="text" class="form-control" placeholder="Search...">
                                <span class="input-group-btn">
                                    <button class="btn btn-default" type="button">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </span>
                            </div>
                            <!-- /input-group -->
                        </li>

                        <!-- <li>
                            <a href="view.php"><i class="fa fa-user fa-fw"></i>View Students</a>
                        </li>
                        <li>
                            <a href="courseView.php"><i class="fa fa-table fa-fw"></i> Courses</a>
                        </li>
                        <li>
                            <a href="registration.php"><i class="fa fa-edit fa-fw"></i> Add Students</a>
                        </li>
                        <li>
                            <a href="courseRegistration.php"><i class="fa fa-edit fa-fw"></i> Course Registration</a>
                        </li> -->



                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

        <!-- Page Content -->
        <div id="page-wrapper" style="min-height: 574px;">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header" style="text-align: center;">Patient Registration</h1>
                    </div>
                    <!-- /.col-lg-12 -->

                    <!-- Registration Form start -->

                    <form method="post" action="operation.php" enctype="multipart/form-data">
                        <div class="row">
                            <div class="form-group col-md-6">
                                <b>Full Name</b>
                                <input class="form-control" placeholder="Name axb" name="full_name" type="text" autofocus="" required="student_name" value="">
                            </div>

                            <div class="form-group col-md-6">
                                <b>E-mail</b>
                                <input class="form-control" placeholder="E-mail" name="email" type="email" autofocus="" required="student_email" value="">
                            </div>

                            <div class="form-group col-md-6">
                                <b>Contact No.</b>
                                <input class="form-control" placeholder="03xxxxxxxxx" name="contact_no" type="number" autofocus="" required="student_email" value="">
                            </div>

                            <div class="form-group col-md-6">
                                <b>Date Of Birth</b>
                                <input class="form-control" name="birthday" type="date" autofocus="" required="birthday" value="">
                            </div>

                            <div class="form-group col-md-6">
                                <label>Country</label>
                                <select name="country" class="form-control">
                                    <option value="">--Select Country--</option>
                                    <option values="Pakistan">Pakistan</option>
                                    <option values="Australia">Australia</option>
                                    <option values="Italy">Italy</option>
                                    <option values="Turkey">Turkey</option>
                                    <option values="Germany">Germany</option>
                                </select>
                            </div>

                             <div class="form-group col-md-6">
                                <label>City</label>
                                <select name="city" class="form-control">
                                    <option value="">--Select City--</option>
                                    <option values="Karachi">Karachi</option>
                                    <option values="Lahore">Lahore</option>
                                    <option values="Islamabad">Islamabad</option>
                                    <option values="Multan">Multan</option>
                                    <option value="Hyderabad">Hyderabad</option>
                                    <option value="Sydney">Sydney</option>
                                    <option value="Melbourne">Melbourne</option>
                                    <option value="Cairns">Cairns</option>
                                    <option value="Busselton">Busselton</option>
                                    <option value="Albany">Albany</option>
                                    <option value="Rome">Rome</option>
                                    <option value="Milan">Milan</option>
                                    <option value="Bologna">Bologna</option>
                                    <option value="Florence">Florence</option>
                                    <option value="Verona">Verona</option>
                                    <option value="Istanbul">Istanbul</option>
                                    <option value="Ankara">Ankara</option>
                                    <option value="Adana">Adana</option>
                                    <option value="Mersin">Mersin</option>
                                    <option value="Erzurum">Erzurum</option>
                                    <option value="Berlin">Berlin</option>
                                    <option value="Munich">Munich</option>
                                    <option value="Dortmund">Dortmund</option>
                                    <option value="Bremen">Bremen</option>
                                    <option value="Bonn">Bonn</option>
                                </select>
                            </div>

                            <div class="form-group col-md-12">
                                <h5 style="color: red;display: none;" id="pwd_message">password not matched</h5>


                                <!-- <label style="color: red" style="display: none;">password not matched</label> -->
                            </div>

                            <div class="form-group col-md-6">
                                <label>Password</label>
                                <input class="form-control" id="pwd" name="password" type="password" autofocus="" required="birthday" value="">
                            </div>

                            <div class="form-group col-md-6">
                                <label>Confirm Password</label>
                                <input class="form-control" id="cpwd" name="cnfrm_password" type="password" autofocus="" required="birthday" value="">
                            </div>

                            <div class="form-group col-md-12">
                                <label>Gender</label>
                                <div class="radio">
                                    <label>
                                        <input name="gender" type="radio" value="male">Male
                                    </label>
                                    <label>
                                        <input name="gender" type="radio" value="female">Female
                                    </label>
                                    <label>
                                        <input name="gender" type="radio" value="other">Other
                                    </label>
                                </div>
                            </div>
                        </div>
                            <hr>
                        <div class="col-md-12 text-center">
                            <input type="submit" name="btn_register" value="Submit" class="btn btn-lg btn-success ">
                        </div>
                    </form>

                    <!-- Registration Form end -->

                </div>
            </div>
        </div>
    </div>
    <?php include('footer.php'); ?>

    <script type="text/javascript">
        $('#cpwd').change(function(){
            var password = $('#pwd').val();
            var confirm_password = $('#cpwd').val();
            if (password != confirm_password)
            {
                $('#pwd_message').show();
                $(':input[type="submit"]').prop('disabled', true);
            }
            else
            {
                $('#pwd_message').hide();
                $(':input[type="submit"]').prop('disabled', false);
            }
        })
    </script>



</body>
</html>