<form action="" method="post">
<button type="submit" name="admin">Admin Login</button>
<button type="submit" name="user">User Login</button>
</form>

<?php
if(isset($_POST['admin']))
{
	header('location:login.php');
}
?>