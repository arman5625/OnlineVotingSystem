<?php
	include 'includes/session.php';

	if(isset($_POST['add'])){
		$firstname = $_POST['firstname'];
		$lastname = $_POST['lastname'];
		$F_name = $_POST['F_name'];
		
		$filename = $_FILES['photo']['name'];
		$voter = $_POST['voters_id'];
		if(!empty($filename)){
			move_uploaded_file($_FILES['photo']['tmp_name'], '../images/'.$filename);	
		}
		//generate voters id
		#$set = '123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		#$voter = substr(str_shuffle($set), 0, 15);

		$sql = "INSERT INTO voters (voters_id, F_name, firstname, lastname, photo) VALUES ('$voter','$F_name', '$firstname', '$lastname', '$filename')";
		if($conn->query($sql)){
			$_SESSION['success'] = 'Voter added successfully';
		}
		else{
			$_SESSION['error'] = $conn->error;
		}

	}
	else{
		$_SESSION['error'] = 'Fill up add form first';
	}

	header('location: voters.php');
?>