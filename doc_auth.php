<?php 
	session_start();
	if(!isset($_SESSION['reg_no'])){
		header("Location: doctor_login.php");
		exit();
	}
 ?>