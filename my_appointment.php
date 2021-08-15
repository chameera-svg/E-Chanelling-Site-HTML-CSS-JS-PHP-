<?php
	require('user_auth.php');
	$con = mysqli_connect("localhost:3308","root","","resevastion_system_db");
	$email=$_SESSION['email'];
	$que="SELECT doctor_name from reservation WHERE email='$email';";
	$r=mysqli_fetch_assoc(mysqli_query($con,$que));
	$doc=$r["doctor_name"];
	if(isset($_POST["remove"])){
		$q="DELETE from reservation WHERE email='$email' AND doctor_name='$doc';";
		$result=mysqli_query($con,$q);
		if($result){
			echo "<script>alert('removed success')</script>";
		}
		else{
			echo "<script>alert('removed Unsuccess')</script>";
		}
	}
  ?>

<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" href="css/bootstrap.css">
		<link rel="stylesheet" href="css/bootstrap-responsive.css">
	   	<link href="css/bootstrap.min.css" rel="stylesheet">
	    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" >
	    <link href='https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css' rel='stylesheet'>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link href='css/my appointment.css' rel='stylesheet'>

		<title>My Appointment</title>



	</head>

	<body>

		<h1>My Appointment</h1>







		<table style="width:100%">

				<tr>

					<th>Doctor Name</th>
					<th>Date</th>
					<th>Time</th>
					<th>Status</th>
					<th>Action</th>
				</tr>

				<?php

					$query="SELECT doctor_name,adate,atime,status from reservation WHERE email='$email';";
					$result=mysqli_query($con,$query);
					while($row = mysqli_fetch_assoc($result))
						{
				?>
							<tr>
								<td><?php echo $row['doctor_name']; ?></td>
								<td><?php echo $row['adate']; ?></td>
								<td><?php echo $row['atime']; ?></td>
								<td><?php echo $row['status']; ?></td>
								<td><form action="my_appointment.php" method="post">
									<input type="submit" name="remove" value="Remove">
								</form></td>
							</tr>
					<?php
						}
					?>
		</table>
		<div class="foo">
	    <footer>Copyright @ 2021 Ratnapura,Sri lanka Inc. All Right Reserved.</footer></div>
</body>
</html>
