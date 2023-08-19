<?php
	include 'includes/session.php';

	if(isset($_GET['return'])){
		$return = $_GET['return'];
		
	}
	else{
		$return = 'home.php';
	}

	if(isset($_POST['save'])){
		$curr_password = $_POST['curr_password'];
		$username = $_POST['username'];
		$password = $_POST['password'];
		$firstname = $_POST['firstname'];
		$lastname = $_POST['lastname'];
        $address=$_POST['address'];
		$photo = $_FILES['photo']['name'];
		if(password_verify($curr_password, $voter['password'])){
			if(!empty($photo)){
				move_uploaded_file($_FILES['photo']['tmp_name'], 'images/'.$photo);
				$filename = $photo;	
			}
			else{
				$filename = $voter['photo'];
			}

			if($password == $voter['password']){
				$password = $voter['password'];
			}
			else{
				$password = password_hash($password, PASSWORD_DEFAULT);
			}

			$sql = "UPDATE voters SET voters_id = '$username', password = '$password', firstname = '$firstname', lastname = '$lastname', photo = '$filename',address='$address' WHERE id = '".$voter['id']."'";
			if($conn->query($sql)){
				$_SESSION['success'] = 'voter profile updated successfully';
			}
			else{
				$_SESSION['error'] = $conn->error;
			}
			
		}
		else{
			$_SESSION['error'] = 'Incorrect password';
		}
	}
	else{
		$_SESSION['error'] = 'Fill up required details first';
	}

	header('location:'.$return);

?>