<?php

include('con.php');
$uname = $_GET['uname'];

 $delete = "DELETE FROM cust_detail WHERE uname = '".$uname . "'";

$query = mysqli_query($con,$delete);

header('location:view.php');


?>
