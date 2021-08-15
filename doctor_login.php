<?php
    session_start();
    $password="";
    $reg_no="";

  $con = mysqli_connect("localhost:3308","root","","resevastion_system_db");
  // if(!$con){
  //   die("Can't connect Database");
  // }
  // else{
  //   echo "Success!";
  // }
  if(isset($_POST["submit"])){
    //echo "Success!";

    $password=$_POST["password"];
    $reg_no=$_POST['reg_no'];
    $_SESSION['reg_no']=$reg_no;
    $_SESSION['password']=$password;


    $query = "SELECT * FROM doctor WHERE reg_no='$reg_no' AND password='$password';";

    $result=mysqli_query($con,$query);
    $row=mysqli_num_rows($result);
    if($row==1){
      header("Location: doc_profile.php");
    }
    else{
      echo "Can't log in";
    }
  }
  // else{
  //   echo "can't";
  // }


?><!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <link rel="stylesheet" type="text/css" href="css/login.css">
    <link rel="stylesheet" type="text/css" href=https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css>
    <link href='https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css' rel='stylesheet'>
    <meta charset="utf-8">
    <title>Doctor Login</title>
  </head>
  <body>
    <a href="index.php"><button type="submit" name="submit" class="btn btn-primary">Home</button></a>
      <h1>Sign In</h1>
    <div class="container">
     <div class="login-box">
      <div class="col-md-5">
    <div class="box">
    <h2><b> Doctor </b></h2>
  </div>
    <form action="doctor_login.php" method="post" align="center">
      <div class="box">
        <label>Register No:</label>
        <input type="text" name="reg_no" class="form-control" placeholder="Enter your username"required>
      </div>
      <div class="box">
        <label>Password:</label>
        <input type="password" name="password" class="form-control" placeholder="Enter your password" id="password-field"required>
      </div>
      <br>
        <button type="submit" class="btn btn-primary" name="submit">Login</button>
      <div class="box">
       <!-- <p>Not a user?<a href="register.php">Register Here</a></p> -->
     </div>
    </form>
  </div>
  </div>
 <!--  <div class="login-box">
   <div class="col-md-5">
 <div class="box">
 <h2><b> Docter</b></h2>
</div>
 <form action="Login.php" method="post" align="center">
   <div class="box">
     <label>Email:</label>
     <input type="text" name="emai" class="form-control" placeholder="Enter your username"required>
   </div>
   <div class="box">
     <label>Password:</label>
     <input type="password" name="password" class="form-control" placeholder="Enter your password" id="password-field"required>
   </div>
   <br>
     <button type="submit" class="btn btn-primary" name="submit">Login</button>
   <div class="box">
    <p>Not a user?<a href="register.php">Register Here</a></p>
  </div>
 </form>
</div>
</div>
</div> -->
  </body>
</html>
