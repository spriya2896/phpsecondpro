<?php

include('con.php');
$uname =$_GET['uname'];

$select = "SELECT * FROM cust_detail  WHERE uname='$uname'";
$run  = mysqli_query($con,$select);
$row = mysqli_fetch_array($run);
?>

<!DOCTYPE html5>
<html>
<head>
<style type="text/css">
 input[type=text], select, text{
    width: 25%;
    padding: 12px;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
    margin-top: 6px;
    margin-bottom: 16px;
    resize: vertical;
}
.password{
    width: 25%;
    padding: 12px;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
    margin-top: 6px;
    margin-bottom: 16px;
    resize: vertical;
}

input[type=submit] {
    background-color: #4CAF50;
    color: white;
    padding: 12px 20px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}
button {
    background-color: #4CAF50;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    cursor: pointer;
    width: 25%;
}
input[type=submit]:hover {
    background-color: #45a049;
}   
</style>
</head>

<form action="view.php" method="post">
  
    <label><b>Username</b></label><br>
    <input type="text" name="uname" value="<?php echo $row['uname'];?>"><br>


    <label><b>Email</b></label><br>
    <input type="text" name="email" value="<?php echo $row['email'];?>"><br>

 
    <label><b>Password</b></label><br>
    <input type="password" class="password" name="psw" value="<?php echo $row['psw'];?>"><br>


    <label><b>Address</b></label><br>
    <input type="text"  name="address" value="<?php echo $row['address'];?>"><br>


    <label><b>PIN</b></label><br>
    <input type="text"  name="pin" value="<?php echo $row['pin'];?>"><br>


    <label><b>Contact no</b></label><br>
    <input type="text"  name="contactno" value="<?php echo $row['contactno'];?>"><br>

    <button type="submit" name="submit">Signup</button>
  
  
</form>
 </html>



