<?php 
   require_once('connection.php');

 ?>
 <?php
//initialize the session
if (!isset($_SESSION)) {
  session_start();
}

if ($_SESSION['username']) {
  // code...
 $currentUser =  $_SESSION['username'];

}else{
    header("Location:index.php");
}

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/dashboard.css">
    <title>Dashboard</title>
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
        <a href="#"><?php echo $currentUser;?></a> &nbsp; &nbsp;
        <a href="logout.php">Logout</a> &nbsp; &nbsp;
       </div> 
      </div>
    
</div>
<hr>
 <!--end of header-->
 <!-- start of body -->
<div class="centre-card">
   <center><hr3><label> Kindly submit your complaints</label><br></hr3></center><br>
   <center>
    <select class="myinput">
        <option>option one</option>
        <option>option two</option>
    </select></center><br>
    <textarea placeholder="Enter your complaint here" class="textarea"></textarea><br><br>
   <center>
    <input type="submit" name="" value="Post Complaint" class="postcomplaintbutton"></center>
</div>

<!-- end of body -->
    <div class="footer">
     <center><p>Kenya Literature Bureau Complaint system. klb.co.ke &copy; 2022</p></center>
    </div>
</body>
</html>