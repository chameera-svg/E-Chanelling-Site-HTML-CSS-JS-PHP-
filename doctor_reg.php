<?php
    $full_name="";
    $dob="";
    $reg_no="";
    $tp_no="";
    $nic="";
    $email="";
    $password="";

  $con = mysqli_connect("localhost:3308","root","","resevastion_system_db");
  // if(!$con){
  //   die("Can't connect Database");
  // }
  // else{
  //   echo "Success!";
  // }
  if(isset($_POST["submit"])){
    //echo "Success!";
    $full_name=$_POST["fullname"];
    $password=$_POST["password"];
    $reg_no=$_POST["reg_no"];
    $nic=$_POST["nic"];
    $tp_no=$_POST["tp_no"];
    $email=$_POST['email'];
    $dob=$_POST['bday'];

    $query = "INSERT INTO doctor VALUES('$full_name','$dob','$reg_no','$nic','$tp_no','$email','$password');";
    $result=mysqli_query($con,$query);
    if($result){
      echo "Register Success";
      header("Location: Admin.php");
    }
    else{
      "Can't register";
    }
  }
  // else{
  //   echo "can't";
  // }


?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <link rel="stylesheet" type="text/css" href="css/register.css">
    <link rel="stylesheet" type="text/css" href=https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css>
    <meta charset="utf-8">
    <title>Docator Registration</title>
  </head>
  <body>
    <a href="index.php"><button type="submit" name="submit" class="btn btn-primary">Home</button></a>
    <h1>Sign Up</h1>

<div class="login-box">
  <div class="form-group">
<h2>Docter</h2>
<form action="doctor_reg.php" method="post" onsubmit="return vallpass()">
  <div class="form-group">
    <label>Full Name:</label>
    <input type="text" name="fullname" class="form-control" required>
  </div>
<div class="form-group">
    <label>Birthday:</label>
    <input type="date" name="bday" class="form-control" required>
  </div>
<div class="form-group">
    <label>Register No:</label>
    <input type="text" name="reg_no" class="form-control" required>
  </div>
  <div class="form-group">
      <label>Phone No:</label>
      <input type="text" name="tp_no" class="form-control" required>
    </div>
    <div class="form-group">
        <label>NIC:</label>
        <input type="text" name="nic" class="form-control" required>
      </div>
<div class="form-group">
    <label>Email:</label>
    <input type="email" name="email" class="form-control" required>
  </div>
<div class="form-group">
    <label>Password:</label>
    <input type="password" onkeyup="trigger()" id="input" name="password" class="form-control" required value="">
  </div>


  <div class="indicator">
   <span class="weak"></span>
   <span class="medium"></span>
   <span class="strong"></span>
</div>
<div class="text" id="t"></div>
<br>
<span id="message" style="color: red;"></span>
<div class="form-group">
    <label>Confirm Password:</label>
    <input type="password" id="copass" name="con password" name="C_Password" class="form-control" required value="">
  </div>
  <span id="messages" style="color: red;"></span>

  <div>
    <p>
      <span>
        <input type="checkbox">
      </span>
      I agree to the terms and privancy <a href="terms.html">learn more</a>
    </p>
  </div>

    <button type="submit" name="submit" class="btn btn-primary">Sumbit</button>
    <p>Already a user?<a href="login.php">login Here</a></p>
</form>
</div>
</div>
</div>


<script  src="supscript.js"></script>
  </body>
</html>
