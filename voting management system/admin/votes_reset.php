<?php
	include 'includes/session.php';
	include '../includes/session.php';

	$sql = "DELETE FROM votes";
	if($conn->query($sql)){
		$_SESSION['success'] = "Votes reset successfully";
		$stat= mysqli_query($conn," UPDATE voters SET status=0 WHERE id='".$voter['id']."'");
                   if($stat){
					$sql = "SELECT * FROM voters WHERE id = '".$_SESSION['voter']."'";
					$query = $conn->query($sql);
					$voter = $query->fetch_assoc();
					   
					   }
                   
	}
	else{
		$_SESSION['error'] = "Something went wrong in reseting";
	}

	header('location: votes.php');

?>