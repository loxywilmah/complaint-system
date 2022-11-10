<?php
 require_once('connection.php');
?>
<?php
  if(isset($_POST['createaccount'])){
    if($_POST['firstname'] != "" && $_POST['Email'] != "" && $_POST['password'] != ""){
    $PASSWORD = md5($_POST['password']);
    $CONFIRMPASSWORD = md5($_POST['confirmpassword']);
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
  }else{
    echo "<script>alert('Fill in all details');</script>";
 }
 

  }
  
?>
<?php 
     // login button 
         session_start();
        if(isset($_POST['logintoaccount'])){
             
            if($_POST['username'] != "" && $_POST['userpassword'] != ""){
            $newUserName = $_POST['username'];
            $NewPassword = md5($_POST['userpassword']);


            $query = "SELECT USERNAME,PRIVILEGE from logintbl WHERE USERNAME='$newUserName' AND PASSWORD='$NewPassword'"; 
                $result = $conn->query($query);
                if ($result->num_rows > 0) {
              // output data of each row
              if($row = $result->fetch_assoc()) {

                $_SESSION['username'] = $row["USERNAME"];
               $_SESSION['privillage'] = $row['PRIVILEGE'];
                
   
                if($_SESSION['privillage'] == "User"){
                header("Refresh:1; url=dashboard.php");

               }
               if($_SESSION['privillage'] == "Admin"){
                //header("Location:dashboardadmin.php");

               }
               if($_SESSION['privillage'] == "none"){
                echo '<script>alert ("Your account was Disable")</script>';

               }
              }
            } else {
              echo "<script>alert('Incorrect login details');</script>";
            }


                }else{
           echo "<script>alert('Fill in all you login details');</script>";
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
     <form action="index.php" method="POST" name="formlogin" id="form2">
        <center><img src="assets/klblogo.png" alt="logo" width="150px" >
        <br>
        <input type="" placeholder="Username/email" name="username" class="myinput"><br>
        <input type="password" placeholder="password" name="userpassword" class="myinput" id="password1"><br><br>
        <input type="checkbox" name=""  id="btnshowpassword1" onclick="showpassword();">Show password<br><br>
        <input type="submit" name="logintoaccount" class="Loginbutton" value="Log in now"><br></center><br><br>
      </form>
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
        <input type="password" placeholder="Enter password" name="password" class="myinput" name="" id="password2"><br>
        <input type="password" placeholder="Confirm password" name="confirmpassword" class="myinput" name="" id="password3"><br><br>
        <input type="checkbox" name="" onclick="showpassword2();">Show password</center><br>
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
    <script type="text/javascript">
    function showpassword() {
  var x = document.getElementById("password1");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
   function showpassword2() {
  var pass = document.getElementById("password2");
  var pass2 = document.getElementById("password3");
  if (pass.type === "password") {
    pass.type = "text";
    pass2.type = "text";
  } else {
    pass.type = "password";
    pass2.type = "password";
  }
}
</script>
</body>
</html>