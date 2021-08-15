<?php
  $fname="";
    $lname="";
    $full_name="";
    $password="";
    $email="";
    $dob="";
    $age="";
    $tp_no="";
  $con = mysqli_connect("	sql206.epizy.com","	epiz_28914808","9I31NenbTVu","epiz_28914808_resevastion_system_db");
  // if(!$con){
  //   die("Can't connect Database");
  // }
  // else{
  //   echo "Success!";
  // }
  if(isset($_POST["submit"])){
    //echo "Success!";
    $fname=$_POST["firstname"];
    $lname=$_POST["lastname"];
    $full_name=$_POST["Fullname"];
    $password=$_POST["Password"];
    $email=$_POST['Email'];
    $dob=$_POST['bday'];
    $age=$_POST['age'];
    $tp_no=$_POST['tp_nom'];
    $query = "INSERT INTO register VALUES('$fname','$lname','$full_name','$dob','$age','$email','$password','$tp_no');";
    $result=mysqli_query($con,$query);
    if($result){
      echo "Register Success";
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
    <title>Register</title>
  </head>
  <body>
    <a href="index.php"><button type="submit" name="submit" class="btn btn-primary">Home</button></a>
    <h1>Sign Up</h1>
  <div class="container">
    <div class="login-box">
      <div class="form-group">
    <h2>Patient</h2>
    <form action="register.php" method="post" onsubmit="return vallpass()">
      <div class="form-group">
        <label>First Name:</label>
        <input type="text" name="firstname" class="form-control" required>
      </div>
      <div class="form-group">
        <label>last name:</label>
        <input type="text" name="lastname" class="form-control" required>
      </div>
      <div class="form-group">
        <label>Full Name:</label>
        <input type="text" name="Fullname" class="form-control" required>
      </div>
	  <div class="form-group">
        <label>Birthday:</label>
        <input type="date" name="bday" class="form-control" required>
      </div>
	  <div class="form-group">
        <label>Age:</label>
        <input type="text" name="age" class="form-control" required>
      </div>
      <div class="form-group">
          <label>Phone No:</label>
          <input type="text" name="tp_nom" class="form-control" required>
        </div>
	  <div class="form-group">
        <label>Email:</label>
        <input type="Email" name="Email" class="form-control" required>
      </div>
	  <div class="form-group">
        <label>Password:</label>
        <input type="password" onkeyup="trigger()" id="input" name="Password" class="form-control" required value="">
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


<!-- <div class="login-box">
  <div class="form-group">
<h2>Docter</h2>
<form action="register.php" method="post" onsubmit="return vallpass()">
  <div class="form-group">
    <label>Full Name:</label>
    <input type="text" name="Fullname" class="form-control" required>
  </div>
<div class="form-group">
    <label>Birthday:</label>
    <input type="date" name="bday" class="form-control" required>
  </div>
<div class="form-group">
    <label>Register No:</label>
    <input type="text" name="age" class="form-control" required>
  </div>
  <div class="form-group">
      <label>Phone No:</label>
      <input type="text" name="age" class="form-control" required>
    </div>
    <div class="form-group">
        <label>NIC:</label>
        <input type="text" name="age" class="form-control" required>
      </div>
<div class="form-group">
    <label>Email:</label>
    <input type="Email" name="Email" class="form-control" required>
  </div>
<div class="form-group">
    <label>Password:</label>
    <input type="password" onkeyup="trigger()" id="input" name="Password" class="form-control" required value="">
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
</div> -->


<script  src="supscript.js"></script>
  </body>
</html>
