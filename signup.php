<!DOCTYPE html5>
<html>

<form action="view.php" method="post">
  
    <label><b>Username</b></label>
    <input type="text" placeholder="Enter Username" name="uname" required><br>

    <label><b>Email</b></label>
    <input type="text" placeholder="Enter Email" name="email" required><br>

    <label><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="psw" required><br>

    <button type="submit" name="submit">Signup</button>
  
</form>
 </html>



<?php
include('con.php');
if(isset($_POST['submit']))
{
	$uname=$_POST['uname'];
	$email=$_POST['email'];
	$psw=$_POST['psw'];
	

$sql = "INSERT INTO signup (uname, email,psw)
VALUES ('$uname','$email','$psw')";


if (mysqli_query($con, $sql)) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($con);
    
}




}

?>


