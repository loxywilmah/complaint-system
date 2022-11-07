<?php
 require_once('connection.php');
?>
<?php
  if(isset($_POST['createaccount'])){
    $PASSWORD = $_POST['password'];
    $CONFIRMPASSWORD = $_POST['confirmpassword'];
    $PRIVILEGE = "User";
    if ($PASSWORD == $CONFIRMPASSWORD) {
        # code...
           //echo("clicked");
    //code to insert data to the database/ register user...
    $FNAME = $_POST['firstname'];
    $LNAME = $_POST['lastname'];
    $EMAIL = $_POST['Email'];
    
    $sql = "INSERT INTO registrationtbl (FIRSTNAME, LASTNAME, EMAIL, STATUS ) VALUES ('{$FNAME}', '{$LNAME}', '{$EMAIL}', 1)";

if ($conn->query($sql) === TRUE) {
  echo "Account created successfully";

 $sqllogin = "INSERT INTO logintbl (USERNAME, PASSWORD, PRIVILEGE) VALUES ('{$EMAIL}', '{$PASSWORD}', '{$PRIVILEGE}')";

  if ($conn->query($sqllogin) === TRUE) {
    echo "Account created successfully";
  } else {
    echo "Error: " . $sqllogin . "<br>" . $conn->error;
  }
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}
    }else{
        echo "password do not match";
    }

 

  }
  
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/index.css">
    <title>Document</title>
</head>
<body>
 <!--start of header-->   
 <div class="myheader">
     <div class="logoholder"><img src="assets/klblogo.png" alt="logo" width="150px" ></div>
      <div class="headerdetails">
       <div class="webstitename">
        <center><h3>Kenya Literature Bureau</h3></center>
       </div> 
       <div class="navbar">
        <a href="#">Register</a> &nbsp; &nbsp;
        <a href="#">Log In</a> &nbsp; &nbsp;
       </div> 
      </div>
    
</div>
<hr>
 <!--end of header-->
 <!-- start of body -->
 <div>
    <div class="form-holder"></div>
     <div class="centre-card" id="loginform" > 
        <center><img src="assets/klblogo.png" alt="logo" width="150px" >
        <br>
        <input type="" placeholder="Username/email" name="" class="myinput"><br>
        <input type="password" placeholder="password" name="" class="myinput"><br><br>
        <input type="checkbox" name="">Show password<br><br>
        <input type="submit" name="" class="Loginbutton" value="Log in now"><br></center><br><br>
        <button class="createaccountbutton" id="callsregistration">Create new account</button><br><br>
        <button class="forgotpasswordbutton" id="callsregistration">Forgot password</button><br><br>


    </div>
     <div class="centre-card" id="registrationform">
        <form action="index.php" method="POST" name="formcreation" id="form1">
        <center><img src="assets/klblogo.png" alt="logo" width="150px" >
        <br>
        <input type="" placeholder="First name" name="firstname" class="myinput" name="">
        <input type="" placeholder="Other name" name="lastname" class="myinput"name="">
        <input type="" placeholder="Email" name="Email" class="myinput"name="">
        <input type="password" placeholder="Enter password" name="password" class="myinput" name="">
        <input type="password" placeholder="Confirm password" name="confirmpassword" class="myinput" name=""><br><br>
        <input type="checkbox" name="">Show password</center><br>
        <input name="createaccount" type="submit" class="createaccountbutton" value="Create account"><br><br>
        </form>
        <input type="submit"  class="Loginbutton" id="calllogin" value="Log In instead"><br><br>

     </div>
 </div>   
<!-- end of body -->
    <div class="footer">
     <center><p>Kenya Literature Bureau Complaint system. klb.co.ke &copy; 2022</p></center>
    </div>
    <script type="text/javascript" src="javascript/index.js"></script>
</body>
</html>