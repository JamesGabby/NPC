<form method = 'POST' action = 'npc.php'>

Enter your appointment number: 
<input type = "number" name = 'npc_sql'>
<input type = 'submit' value = 'Search'>

</form>

<?php
$con = mysqli_connect("localhost", "root", "", "npc");
    if (!$con) {
        die ("Failed");
    }
    //echo "<br>Connected to database.";
    
	
    $a = $_POST['npc_sql'];

    $sql = "SELECT appointment_no, app_date, doctor_last_name FROM appointments WHERE appointment_no = '$a'";
    $result = $con->query($sql);
    
	
    if ($result->num_rows > 0) { 
        while($row = $result->fetch_assoc()) {  
            echo ("Appointment number ".$row["appointment_no"]." with Dr. ".$row["doctor_last_name"].
                  " is due for ".$row["app_date"]."."."<br>"); 
        } 
    }
    else {
        echo "The appointment $a does not exist."; 
    } 
?>