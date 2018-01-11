<?php

include('con.php');
$uname = $_GET['uname'];
 $sql = "UPDATE cust_detail SET role=1 WHERE uname = '".$uname . "'";

$query = mysqli_query($con,$sql);
echo "welcome admin";


?>
