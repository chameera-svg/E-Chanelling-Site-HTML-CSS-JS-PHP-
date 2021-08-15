<?php
  require('doc_auth.php');
  $con = mysqli_connect("localhost:3308","root","","resevastion_system_db");

  if(isset($_POST["submit"])){
    $new_pw =$_POST['passwor'];
    $reg_no=$_SESSION['reg_no'];
    $pw=$_SESSION['password'];
    $query="UPDATE doctor SET password='$new_pw'  WHERE password='$pw' AND reg_no='$reg_no'";
    $result=mysqli_query($con,$query);
    if($result){
      $_SESSION['password']=$new_pw;
      header("Location: doc_profile.php");
    }
    else{
      echo "can't update";
    }
  }
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <link rel="stylesheet" type="text/css" href="css/login.css">
    <link rel="stylesheet" type="text/css" href=https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css>
    <link href='https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css' rel='stylesheet'>
    <meta charset="utf-8">
    <title>Reset Password</title>
  </head>
  <body>
     <div class="login-box">
      <div class="col-md-5">
    <div class="box">
    <h2><b>Change Your Password</b></h2>
  </div>
    <form action="reset_password.php" method="post" align="center">
      <div class="box">
        <label><h4>New Password</h4></label>
        <input type="password" name="passwor" class="form-control" placeholder="Enter your new password"required>
      </div>
      <div class="box">
        <label><h4> confirm password</h4></label>
        <input type="password" name="con_password" class="form-control" placeholder="Enter your confirm password" id="password-field"required>
      </div>
      <br>
        <button type="submit" class="btn btn-primary" name="submit">
        OK
    </button>

    </form>
  </div>
  </div>

   <div class="foo">
    <footer>Copyright @ 2021 Ratnapura,Sri lanka Inc. All Right Reserved.</footer>
    </div>
  </body>
</html>
