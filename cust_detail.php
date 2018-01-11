<!DOCTYPE html5>
<html>
    <head>
        <script src="jquery-3.2.1.js"></script>
        <script>
            $(document).ready(function () {

                $(".second").hide();

                $("#chk").click(function () {
                    $(".second").toggle();
                });
            });
        </script>
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

    <form action="" method="post">
        <h3>Enter Your Information</h3>

        <label><b>Username</b></label><br>
        <input type="text" name="uname" required><br>


        <label><b>Email</b></label><br>
        <input type="text" name="email" required><br>


        <label><b>Password</b></label><br><br>
        <input type="password"  name="psw" class="password"><br>


        <label><b>Address</b></label><br>
        <input type="text"  name="address" ><br>

        <input type="checkbox" name="secadd" id="chk">
        <label><b>Click here to add Second Address</b></label><br>


        <div class="second">
            <label><b>Second Address</b></label><br>
            <input type="text"  name="address2" ><br>
        </div>

        <label><b>PIN</b></label><br>
        <input type="text"  name="pin" required><br>


        <label><b>Contact no</b></label><br>
        <input type="text"  name="contactno" required><br>
        <button type="submit" name="submit">Signup</button>

    </form>
</html>



<?php
include('con.php');
if (isset($_POST['submit'])) {
    $id = $_POST['id'];

    $uname = filter_var($_POST['uname'], FILTER_SANITIZE_STRING);


    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    if (!filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
       // echo "E-mail:" . $email;
    } else {
        echo("$email is not a valid email address");
    }

    $psw = $_POST['psw'];

    $address = filter_var($_POST['address'], FILTER_SANITIZE_STRING);
    $secadd = filter_var($_POST['secadd'], FILTER_SANITIZE_STRING);


    $pin = $_POST['pin'];
    if (!filter_var($pin, FILTER_VALIDATE_INT) === false) {
      //  echo("Integer is valid");
    } else {
       // echo("Integer is not valid");
    }
    $contactno = $_POST['contactno'];
    if (!filter_var($contactno, FILTER_VALIDATE_INT) === false) {
       // echo("Integer is valid");
    } else {
       // echo("Integer is not valid");
    }
    $sql = "INSERT INTO users (uname, psw) VALUES ('$uname', '$psw')";
    if (mysqli_query($con, $sql)) {
        $last_id = $con->insert_id;
        echo $last_id . "<br>";
        var_dump($_POST['secadd']);
        if (is_null($_POST['secadd'])) {
            $sql = "INSERT INTO cust_detail (id, email, address, secadd, pin, contactno)
VALUES ('$last_id' , '$email','$address', '$address', '$pin','$contactno')";
        } else {
            $sql = "INSERT INTO cust_detail (id,email, address, secadd, pin, contactno)
VALUES ('$last_id,'$email','$address', '$secadd', '$pin','$contactno')";
        }
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($con);
    }
    echo $sql . "<br>";
    $query = mysqli_query($con, $sql);
    //var_dump($query);
   header('location:view.php');
}
?>


