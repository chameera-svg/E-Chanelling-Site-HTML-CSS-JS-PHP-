<?php
	require('doc_auth.php');
	$con = mysqli_connect("localhost:3308","root","","resevastion_system_db");
	$name=$_SESSION['name'];
	//$que="SELECT full_name from reservation WHERE doctor_name='$name';";
	//$res=mysqli_query($con,$que);
	//$r = mysqli_fetch_assoc($res);
	//$fname=$r["full_name"];
	$fname="";
	$adate="";
	$atime="";
	if(isset($_POST["approve"])){
		$adate=$_POST['adate'];
		$atime=$_POST['atime'];
		$fname=$_POST['fname'];
		echo "$fname,$adate,$atime";
		$query="UPDATE reservation SET status='Approved..' WHERE full_name='$fname' AND adate='$adate' AND atime='$atime';";
		$rs=mysqli_query($con,$query);
		if($rs){
			//echo "<script>alert('Approved Sucess');</script>";

			//header("Location: doc_profile.php");
		}
		else{
			echo "<script>alert('Approved UnSucess');</script>";
		}


	}
	elseif(isset($_POST["cansel"])){
		$adate=$_POST['adate'];
		$atime=$_POST['atime'];
		$fname=$_POST['fname'];
		$query="UPDATE reservation SET status='Rejected..' WHERE full_name='$fname'AND adate='$adate' AND atime='$atime';";
		$rs=mysqli_query($con,$query);
		if($rs){
			echo "<script>alert('Cansel Sucess');</script>";
			
			//header("Location: doc_profile.php");
		}
		else{
			echo "<script>alert('Cansel UnSucess');</script>";
		}
	}
 ?>

<!DOCTYPE html>
<html>
<head><link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="css/bootstrap-responsive.css">
   <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" >
    <link href='https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css' rel='stylesheet'>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="view appointment.css">
	<title>View Appointment</title>
</head>
<body>

	<h1>View Appointment</h1>

	<table style="width: 100%" border="1">
		<tr>
		
			<th>Patient Name</th>
			<th>Date</th>
			<th>Time</th>
			<th>Action</th>
		
	</tr>

		<?php
					
					$query="SELECT full_name,adate,atime,status from reservation WHERE doctor_name='$name';";
					$result=mysqli_query($con,$query);
					while($row = mysqli_fetch_assoc($result))
						{
				?>
							<tr><form action="view_appointment_Dr.php" method="post">
								<td><input type="text" name="fname" value="<?php echo $row['full_name']; ?>" readonly="readonly"></td>
								<td><input type="text" name="adate" value="<?php echo $row['adate']; ?>" readonly="readonly"></td>
								<td><input type="text" name="atime" value="<?php echo $row['atime']; ?>" readonly="readonly"></td>
								<td>
									<input type="submit" name="approve" value="approve">
									<input type="submit" name="cansel" value="cansel"></td>
								<td><p name="act" ><?php echo $row['status']; ?></p></td>	
								</form>
									
								
								
							</tr>
					<?php 
						}
					?>	

	</table>

</body>
</html>