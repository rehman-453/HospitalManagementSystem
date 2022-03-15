<?php
	session_start();

	include('database_connectivity.php');

	/*Sign in*/
	if (isset($_POST['btn_patient_signin'])) 
	{
		$sql = "SELECT * FROM tbl_patient WHERE email = '" . $_POST['email_address'] . "' and password = '" . $_POST['patient_password'] . "' and patient_id = '" . $_POST['patient_id'] . "'";

		$result = $conn->query($sql);
		if ($result->num_rows > 0) 
		{
			while ($row = $result->fetch_assoc()) 
			{
				$_SESSION['user_id'] = $row['patient_id'];
				$_SESSION['user_name'] = $row['name'];
			}
			header("Location: dashboard.php");
		} 
		else 
		{
			echo "<h1>ERROR</h1>";
			echo "Incorrect email_address or password or MR Number";
			?>
			<br>
			<br>
			<a href="index.php">Try Again</a>
			<?php
		}
	}

	/*Doctor Signin*/
	if (isset($_POST['btn_doctor_signin'])) 
	{
		$sql = "SELECT * FROM tbl_doctors WHERE doc_email = '" . $_POST['email_address'] . "' AND doc_password = '" . $_POST['doc_password'] . "'";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) 
		{
			while ($row = $result->fetch_assoc()) 
			{
				$_SESSION['doc_id'] = $row['doc_id'];
				$_SESSION['doctor_name'] = $row['doctor_name'];
			}
			header("Location: doc_dashboard.php");
		} 
		else 
		{
			echo "<h1>ERROR</h1>";
			echo "Incorrect email_address or password";
			?>
			<br>
			<br>
			<a href="doc_login.php">Try Again</a>
			<?php
		}
	}

	/*Register*/
	if (isset($_POST['btn_register'])) 
	{
		// echo $_POST['full_name'];die;
		$data = array(
			'name' 				=> $_POST['full_name'],
			'email' 			=> $_POST['email'],
			'phone' 			=> $_POST['contact_no'],
			'date_of_birthday' 	=> strtotime($_POST['birthday']),
			'country' 			=> $_POST['country'],
			'city' 				=> $_POST['city'],
			'password' 			=> $_POST['password'],
			'cnfrm_password'	=> $_POST['cnfrm_password'],
			'gender' 			=> $_POST['gender'],
		);

		// var_dump($data);die();
		$query = "
				INSERT INTO tbl_patient(name, email, phone, date_of_birth, country, city, password, gender, created_on, updated_on)
			    VALUES ('" . $data['name'] . "', '" . $data['email'] . "', '" . $data['phone'] . "', '" . $data['date_of_birthday'] . "', '" . $data['country'] . "', '" . $data['city'] . "', '" . $data['password'] . "', '" . $data['gender'] . "', '" . time() . "', 0)";
		if ($conn->query($query) === TRUE) 
		{
			$sql = "SELECT * FROM tbl_patient WHERE email = '".$data['email']."'";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) 
            {
                while($row = $result->fetch_assoc())
                {
                	$_SESSION['user_id'] = $row['patient_id'];
                	$_SESSION['user_name'] = $row['name'];
                }
                
            }

			header("Location: dashboard.php");
		} 
		else 
		{
			echo "Error: " . $query . "<br>" . $conn->error;
		}
	}

	/*Update*/
	if (isset($_POST['btn_update'])) 
	{
		$data = array(
			'name' 				=> $_POST['full_name'],
			'email' 			=> $_POST['email'],
			'phone' 			=> $_POST['contact_no'],
			'date_of_birthday' 	=> strtotime($_POST['birthday']),
			'country' 			=> $_POST['country'],
			'city' 				=> $_POST['city'],
			'gender' 			=> $_POST['gender'],
		);

		$sql = "UPDATE tbl_patient 
                    SET 
                    name 			='".$_POST['full_name']."',
                    email 			='".$_POST['email']."',
                    phone 			='".$_POST['contact_no']."',
                    date_of_birth 	='".strtotime($_POST['birthday'])."',
                    country 		='".$_POST['country']."',
                    city 			='".$_POST['city']."',
                    gender 			='".$_POST['gender']."',
                    updated_on		='".time()."' 

                WHERE patient_id = '".$_SESSION['user_id']."'";
        if ($conn ->query($sql) === TRUE)
        {
        	header("Location: dashboard.php"); 
        }       
        else
        {
            echo "<b>Error:</b> ". $sql ."<br>". $conn->error;
        }
        // echo $sql;
	}

	/*File Upload*/
	if (isset($_POST['btn_upload_report'])) 
	{
		$file_name = $_FILES['file']['name'];
        $file_type = $_FILES['file']['type'];
        $file_size = $_FILES['file']['size'];  

        $file_name_break = explode('.', $file_name);
        $file_name = $file_name_break[0];
        $file_extension = $file_name_break[1];

        $path = 'D:\E6540\\Project\Hospital System\files\Reports';


        $dirs = explode('/',$path);

        foreach($dirs as $dir)
        {
            if(!is_dir($path))
            {
                mkdir($path);
            }
        }
        $path = $path .'/'. time().'_'.$file_name.'.'.$file_extension;
        
        move_uploaded_file($_FILES['file']['tmp_name'],$path);
        $path = '\files/Reports' .'/'. time().'_'.$file_name.'.'.$file_extension;
        
        $sql = "INSERT INTO tbl_patient_report (patient_id, report_file_path, file_name, upload_date)
        		VALUES ('".$_SESSION['user_id']."','".$path."','".$file_name."','".time()."')";

        if ($conn->query($sql) === TRUE) 
		{
			header("Location: upload_reports.php");
		} 
		else 
		{
			echo "Error: " . $query . "<br>" . $conn->error;
		}
	}

	/*Appointment Booking*/
	if (isset($_POST['btn_book_appointment'])) 
	{
		$patient_id			= 	$_POST['patient_id'];
		$doctor_name 		= 	$_POST['doctor_name'];
		$doc_id 			= 	$_POST['doc_id'];
		$doc_category 		= 	$_POST['doc_category'];
		$appointment_day	= 	$_POST['appointment_day'];
		$appointment_time	=	$_POST['appointment_time'];
		$appointment_date	=	strtotime($_POST['appointment_date']);
		$created_on			=	time();
		$fees 				=	$_POST['fees'];

		$query = "
				INSERT INTO tbl_appointment(patient_id, doc_id, doctor_name, doc_category, appointment_day, appointment_time, appointment_date, created_on, fees)
			    VALUES ('" . $patient_id . "', '" . $doc_id . "', '" . $doctor_name . "', '" . $doc_category . "', '" . $appointment_day. "', '" . $appointment_time. "', '" . $appointment_date. "', '" . $created_on. "', '" . $fees. "')";

		// echo $query;die();

		if ($conn->query($query) === TRUE) 
		{
			header("Location: pending_appointment_list.php");
		} 
		else 
		{
			echo "Error: " . $query . "<br>" . $conn->error;
		}
	}

	/*Payment*/
	if (isset($_POST['btn_payment_yes'])) 
	{
		$appointment_id = $_POST['appointment_id'];
		$sql = "UPDATE tbl_appointment 
                    SET 
                    appointment_status	=	'Approved',
                    payment_status		=	'Paid'
                WHERE appointment_id = '".$appointment_id."'";
        if ($conn ->query($sql) === TRUE)
        {
        	header("Location: approved_appointment_list.php"); 
        }       
        else
        {
            echo "<b>Error:</b> ". $sql ."<br>". $conn->error;
        }
	}

	/*Cancel Appointment*/
	if (isset($_POST['btn_payment_no'])) 
	{
		$appointment_id = $_POST['appointment_id'];
		$sql = "UPDATE tbl_appointment 
                    SET 
                    appointment_status	=	'Canceled'
                WHERE appointment_id = '".$appointment_id."'";
        if ($conn ->query($sql) === TRUE)
        {
        	header("Location: cancel_appointment_list.php"); 
        }       
        else
        {
            echo "<b>Error:</b> ". $sql ."<br>". $conn->error;
        }
	}

	/*Feedback*/
	if (isset($_POST['btn_feedback']))
	{
		$appointment_id = $_POST['appointment_id'];
		$feedback 		= $_POST['feedback'];

		$query = "INSERT INTO tbl_feedback(patient_id, appointment_id, feedback, created_on)
					VALUES('".$_SESSION['user_id']."','".$appointment_id."','".$feedback."','".time()."')";
		if ($conn->query($query) === TRUE) 
		{
			header("Location: feedback.php");
		} 
		else 
		{
			echo "Error: " . $query . "<br>" . $conn->error;
		}
	}

	/*Feedback*/
	if (isset($_POST['btn_complain']))
	{
		$complain 		= $_POST['complain'];

		$query = "INSERT INTO tbl_complain(patient_id, complain, created_on)
					VALUES('".$_SESSION['user_id']."','".$complain."','".time()."')";
					
		if ($conn->query($query) === TRUE) 
		{
			header("Location: complain.php");
		} 
		else 
		{
			echo "Error: " . $query . "<br>" . $conn->error;
		}
	}



	$conn->close();

?>