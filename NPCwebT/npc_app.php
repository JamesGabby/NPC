<!DOCTYPE html>
<html>
<link rel="stylesheet" type="text/css" href="npc_stylesheet.css">
<title>W3.CSS Template</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
body,h1 {font-family: "Montserrat", sans-serif}
img {margin-bottom: -7px}
.w3-row-padding img {margin-bottom: 12px}
</style>
<body>
<!-- Sidebar -->
<nav class="w3-sidebar w3-black w3-animate-top w3-xxlarge" style="display:none;padding-top:150px" id="mySidebar">
<a href="">
  <a href="javascript:void(0)" onclick="w3_close()" class="w3-button w3-black w3-xxlarge w3-padding w3-display-topright" style="padding:6px 24px">
    <i class="fa fa-remove"></i>
  </a>
  <div class="w3-bar-block w3-center">
    <a href="about.html" class="w3-bar-item w3-button w3-text-grey w3-hover-black">About</a>
    <a href="#" class="w3-bar-item w3-button w3-text-grey w3-hover-black">Appointments</a>
    <a href="faqs.html" class="w3-bar-item w3-button w3-text-grey w3-hover-black">FAQs</a>
    <a href="contact.html" class="w3-bar-item w3-button w3-text-grey w3-hover-black">Contact</a>
  </div>
</nav>

<!-- !PAGE CONTENT! -->
<div class="w3-content" style="max-width:1500px">

<!-- Header -->
<div class="w3-opacity">
<a href="npc_home.html"><img src="pics\npc.png" alt="NPC logo" width="10%"></img></a> 
<span class="w3-button w3-xxlarge w3-white w3-right" onclick="w3_open()"><i class="fa fa-bars"></i></span> 
<div class="w3-clear" <a href=""></div>
<header class="w3-center w3-margin-bottom">
  <h1><b>APPOINTMENTS</b></h1>
  <p><b>Check your appointment below.</b></p>
  <p class="w3-padding-16"><button class="w3-button w3-black" onclick="myFunction()">A passion for pet health.</button></p>
</header>
</div>

<form method = 'POST' action = 'npc_app.php' style = "text-align:center; padding-top:5%">
 
<input type = "number" name = 'npc_sql'>
<input type = 'submit' value = 'Search'>

</form>

<h1 class = "w3-text-grey" style = "text-align:center;padding-top:5%;font-size:20px">
<?php 
$con = mysqli_connect("localhost", "root", "", "npc");
    if (!$con) {
        die ("Failed");
    }
    //echo "<br>Connected to database.";
    
	error_reporting(error_reporting() & ~E_NOTICE);
    $a = $_POST['npc_sql'];
	
	//NOTE valid numbers are from 4446 to 4467
    $sql = "SELECT appointment_no, app_date, doctor_last_name FROM appointments WHERE appointment_no = '$a'";
    $result = $con->query($sql);
    
	
    if ($result->num_rows > 0) { 
        while($row = $result->fetch_assoc()) {  
            echo ("Appointment number <b>".$row["appointment_no"]."</b> with <b>Dr. ".$row["doctor_last_name"].
                  "</b> is due for <b>".$row["app_date"]."</b>."."<br>"); 
        } 
    }
	
    else {
        echo "Please enter your appointment number."; 
	}
?>
</h1>
<!-- End Page Content -->
</div>

<!-- Footer -->
<footer class="w3-container w3-padding-64 w3-light-grey w3-center w3-opacity w3-xlarge" style="margin-top:128px"> 
  <i class="fa fa-facebook-official w3-hover-opacity"></i>
  <i class="fa fa-instagram w3-hover-opacity"></i>
  <i class="fa fa-snapchat w3-hover-opacity"></i>
  <i class="fa fa-pinterest-p w3-hover-opacity"></i>
  <i class="fa fa-twitter w3-hover-opacity"></i>
  <i class="fa fa-linkedin w3-hover-opacity"></i>
  <p class="w3-medium">Made by James Gabbitus</p>
</footer>

<script>
// Toggle grid padding
function myFunction() {
  var x = document.getElementById("myGrid");
  if (x.className === "w3-row") {
    x.className = "w3-row-padding";
  } else { 
    x.className = x.className.replace("w3-row-padding", "w3-row");
  }
}

// Open and close sidebar
function w3_open() {
  document.getElementById("mySidebar").style.width = "100%";
  document.getElementById("mySidebar").style.display = "block";
}

function w3_close() {
  document.getElementById("mySidebar").style.display = "none";
}
</script>
</body>
</html>
