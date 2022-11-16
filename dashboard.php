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
 <div class="dash-infor">
    <div class="infor-card">
        <div class="lb-div" style="background: dodgerblue;">All complains</div><br>
        <div class="lb-div" style="background: tomato;">Pending</div><br>
        <div class="lb-div" style="background:  mediumseagreen;">Closed</div>
     </div>
     <div class="infor-card"> 
        <center>
         <div class="rate-holder">
            <br>
             0.0%
         </div>
         </center>
         <center><label style="color: mediumseagreen; font-weight:bold; font-size: 18px;">Our solve rate</label> </center>
     </div>
</div>

<!-- your complaints -->

<div>
    <center><h1>Your submission</h1></center>

<table id="" class="complaint-table">
  <tr>
    <th>Serial</th>
    <th>Category</th>
    <th>Date</th>
    <th>Status</th>
    <th>Action</th>
  </tr>
  <tr>
    <td>1</td>
    <td>category</td>
    <td>1/12/2022</td>
    <td>Recieved</td>
    <td><button class="view-btn">View</button> </td>
  </tr>
  <tr>
     <td>2</td>
    <td>category</td>
    <td>1/22/2022</td>
    <td>Recieved</td>
    <td><button class="view-btn">View</button> </td>
  </tr>
  
 
</table>
    </div>
   

<br><br><br> 

<!-- end of body -->
    <div class="footer">
     <center><p>Kenya Literature Bureau Complaint system. klb.co.ke &copy; 2022</p></center>
    </div>
</body>
</html>