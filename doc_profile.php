<?php
  require('doc_auth.php');
  $reg_no=$_SESSION['reg_no'];
  $full_name="";
  $dob="";
  $nic="";
  $email="";
  $tp_no="";
  $password="";
  $con = mysqli_connect("localhost:3308","root","","resevastion_system_db");
  $query = "SELECT * FROM doctor WHERE reg_no='$reg_no'";
  $result=mysqli_query($con,$query);
  $row=mysqli_fetch_assoc($result);
  $full_name=$row['full_name'];
  $dob=$row['dob'];
  $nic=$row['nic'];
  $email=$row['email'];
  $tp_no=$row['tp_no'];
  $password=$_SESSION['password'];
  $_SESSION['name']=$full_name;
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <link href='css/doc.css' rel='stylesheet'>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <meta charset="utf-8">
    <title>Doctor profile</title>
  </head>
  <body>
    <div class="container register">
                <div class="row">
                    <div class="col-md-3 register-left">
                      <div class="container">
    <div class="picture-container">
        <div class="picture">
            <img src="css/" class="picture-src" id="wizardPicturePreview" title="">
            <input type="file" id="wizard-picture" class="">
        </div>
         <h6 class="">Choose Picture</h6>
       </div>
   </div>
                        <h3>Profile Picture</h3>
                        <a href="Sameera_Dental_Clinic.html"><input type="submit"  name="" value="Log Out"/></a><br/>
                    </div>
                    <div class="col-md-9 register-right">
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                <h3 class="register-heading">My Profile</h3>
                                    <a href="Sameera_Dental_Clinic.php"><input type="submit" class="btnRegister2" name="" value="Edit Profile"/></a>
                                <div class="row register-form">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="text" name="full_name" class="form-control" placeholder="Full Name *" value="<?php echo $full_name; ?>" />
                                        </div>
                                        <div class="form-group">
                                            <input type="text" name="reg_no" class="form-control" placeholder="Register No*" value="<?php echo $reg_no; ?>" />
                                        </div>


                                        <div class="form-group">
                                            <input type="text" name="dob" class="form-control"  placeholder=" Date Of Birth *" value="<?php echo $dob; ?>" />
                                        </div>
                                        <div class="form-group">
                                            <input type="text" name="nic" class="form-control"  placeholder=" NIC *" value="<?php echo $nic; ?>" />
                                        </div>
                                        <div class="form-group">
                                            <div class="maxl">
                                                <label class="radio inline">
                                                    <input type="radio" name="gender" value="male" checked>
                                                    <span> Male </span>
                                                </label>
                                                <label class="radio inline">
                                                    <input type="radio" name="gender" value="female">
                                                    <span>Female </span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="email" name="emai" class="form-control" placeholder="Your Email *" value="<?php echo $email; ?>" />
                                        </div>
                                        <div class="form-group">
                                            <input type="text" name="tp_no" minlength="10" maxlength="10" name="txtEmpPhone" class="form-control" placeholder="Your Phone NO *" value="<?php echo $tp_no; ?>" />
                                        </div>
                                        <div class="form-group">
                                            <input type="text" name="password" class="form-control"  placeholder=" Password *" value="<?php echo $password; ?>" />
                                        </div>
                                        <a href="reset_password.php">
                                          <input type="submit"  class="btnRegister" name="" value="Reset Password"/></a>

                                        <input type="submit" class="btnRegister"  value="Submit"/>
                                        <a href="view_appointment_Dr.php">

                                          <input type="submit"  class="btnRegister" name="" value="View Appoinment"/></a>

                                          <a href="create_appointment.php">

                                          <input type="submit"  class="btnRegister" name="" value="New Appoinment"/></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <script>
              $(document).ready(function(){
                  $("#wizard-picture").change(function(){
                      readURL(this);
                  });
              });
              function readURL(input) {
                  if (input.files && input.files[0]) {
                      var reader = new FileReader();

                      reader.onload = function (e) {
                          $('#wizardPicturePreview').attr('src', e.target.result).fadeIn('slow');
                      }
                      reader.readAsDataURL(input.files[0]);
                  }
              }

              </script>

              <div class="foo">
    <footer>Copyright @ 2021 Ratnapura,Sri lanka Inc. All Right Reserved.</footer>
    </div>
  </body>
</html>
