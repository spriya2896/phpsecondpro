<?php
session_start();
?>

<!DOCTYPE html5>
<html>
<head>
<style type="text/css">
  input[type=text], input[type=password] {
    width: 25%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    box-sizing: border-box;
}

button {
    background-color: #4CAF50;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    cursor: pointer;
    width: 30.5%;

}

button:hover {
    opacity: 0.8;
}

</style>
</head>


<form action="" method="post">
    
    <label><b>Username</b></label>
    <input type="text" placeholder="Enter Username" name="uname" ><br>


    <label><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="psw" ><br>



    <button type="submit" name="submit1">Login</button><br>
    <label><b>Click here to Enter new Customer Details</b></label><br>
    <button type="submit" name="submit">Signup</button>
    <br>





  
</form>
</html>
<?php
include('con.php');

if(isset($_POST['submit']))
{
   header('location:cust_detail.php');
}    

if(isset($_POST['submit1']))
{
    
     $uname=$_POST['uname'];
        $psw=$_POST['psw'];
$_SESSION['uname'] = $uname;
$ret=mysqli_query( $con, "SELECT * FROM users WHERE uname='$uname' AND psw='$psw' ") or die("Could not execute query: " .mysqli_error($con));
        $row = mysqli_fetch_assoc($ret);


       if($row == false)
       {

        echo "Invalid username and password";
       }

else{

    echo "valid username and password";
    header('location:view.php');
}
}

?>


