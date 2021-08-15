<?php

  require('user_auth.php');
  $e=$_SESSION['email'];
  $full_name="";
  $gender="";
  $phone_no="";
  $dob="";
  $doctor="";
  $Email="";
  $adate="";
  $atime="";
  $con = mysqli_connect("localhost:3308","root","","resevastion_system_db");

  if (isset($_POST["submit"])){
    //echo "hello";
    $full_name=$_POST["fullname"];
    $gender=$_POST["gender"];
    $phone_no=$_POST["pno"];
    $dob=$_POST["bday"];
    $doctor=$_POST["doc"];
    $Email=$_POST["Email"];
    $adate=$_POST["adate"];
    $atime=$_POST["Time"];
    $status="Pending..";
    //echo "$full_name";

    $query = "INSERT INTO reservation VALUES('$full_name','$gender','$phone_no','$dob','$doctor','$Email','$adate','$atime','$status');";

    $result=mysqli_query($con,$query);
    if($result){
      echo "Register Success";
      header("Location: client.php");
    }
    else{
      echo "Can't register";
      echo "$full_name,$gender,$phone_no,$dob,$doctor,$Email,$adate,$atime,$status";
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
	<link rel="stylesheet" type="text/css" href="css/reservation.css">

	<title>Reservation Form</title>
</head>

<body>
	<div class="Reservation-box">
      <div class="form-group">
        <h2>Reservation your Doctor</h2>
      </div>
    <form action="reservation.php" method="post">
      <div class="form-group">
        <label>Full Name</label><br>
        <input type="text" name="fullname" class="form-control" required>
      </div>
      <br>

      <div class="form-group">
        <label>Gender</label>

        <div>
          <input type="radio" name="gender" value="Male">Male</div>

        <div>
          <input type="radio" name="gender" value="Female">female</div>
        <br>



        <div class="form-group">
          <label>Phone NO</label><br>
          <input type="Phone" name="pno" class="form-control" required>
        </div>
      </div>
      <br>

      <div class="form-group">
        <label>Birthday</label><br>
        <input type="date" name="bday" class="form-control" required>
      </div>
      <br>

      <div class="form-group">
      	<label>Select Your Doctor</label><br>
      	<select class="option" name="doc">
          <?php
            $q="SELECT full_name from doctor;";
            $r=mysqli_query($con,$q);
            while($row = mysqli_fetch_assoc($r))
              {
           ?>
      		  <option value="<?php echo $row['full_name']; ?>"><?php echo $row['full_name']; ?></option>

        <?php
          }
         ?>
         </select>
      </div>
      <br>
      <div class="form-group">
        <label>Email</label><br>
        <input type="text" name="Email" class="form-control" value="<?php echo $e; ?>" readonly="readonly" required>
      </div>
      <br>

      <div class="form-group">
        <label>Appointment Date</label><br>
        <input type="date" name="adate" class="form-control" required>
      </div>
      <br>

      <div class="form-group">
        <label>Time</label><br>
        <input type="Time" name="Time" class="form-control" required>
      </div>
      <br>

      <div class="btn">
      <button type="submit" class="btn btn-primary" name="submit">Submit</button>
      <button type="button" name="btn1" >Cancel</button>
       </div>
    </form>
  </div>

<div class="foo">
    <footer>Copyright @ 2021 Ratnapura,Sri lanka Inc. All Right Reserved.</footer>
</div>
</body>
</html>
