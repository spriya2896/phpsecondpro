
<?php
session_start();
?>
<html>
    <head>
    <script src="jquery-3.2.1.min.js"></script>
    <script src="ajax.js"></script>
            <style>
                table{

                    border-style:solid;

                    border-width:2px;

                    border-color:black;

                }

            </style>

        </head>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <?php
       $uname = $_SESSION['uname'];
       include('con.php');
     $select = "SELECT * FROM cust_detail where uname = '$uname' ";
    $query = mysqli_query($con, $select);
    $result = mysqli_fetch_array($query);
  
    if ($result['role'] == 1) {
        if (isset($_POST['phone']) && is_numeric($_POST['phone'])) {
           $select = "SELECT * FROM cust_detail WHERE contactno = '" . $_POST['phone'] . "'";
        }
        else{
            $select = "SELECT * FROM cust_detail";
        }
        ?><form method="post"> 
        <label><b>Enter Contact NO</b></label>
            <input name="phone" type ="text" id="phone">
            <button  id="search">Search</button><br><br>
        </form><?php
    }
    ?>

  
  <table class="w3-table-all">
        <thead>
            <tr>
                <th class="w3-grey">Id</th>
                <th class="w3-grey">Username</th>
                <th class="w3-grey"> Email </th>
                <th class="w3-grey"> Password </th>
                <th class="w3-grey"> Address </th>
                <th class="w3-grey">secondary Address </th>
                <th class="w3-grey"> Pin </th>
                <th class="w3-grey"> Contact NO </th>
                <th class="w3-orange">EDIT</th>
                <?php
                if ($result['role'] == 1) {
                    ?>
                    <th class="w3-blue">Delete</th>
                    <th class="w3-green">Make Admin</th>
                    <th class="w3-red">Remove Admin</th>
   
            </thead>
        </tr>
        <tbody class="response">
            <?php
            $query = mysqli_query($con, $select);
            
            while ($result = mysqli_fetch_array($query)) {
                ?>  
                <tr>
                <?php
               $e.=     "<td>".$result['id']."</td>
                        <td>".$result['uname']."</td>
                        <td>".$result['email']."</td>
                        <td>".$result['psw']."</td>
                        <td>".$result['address']."</td>

                        <td>".$result['secadd']."</td>
                        <td>".$result['pin']."</td>
                        <td>".$result['contactno']."</td>
                        <td class='w3-orange'><a href='edits.php?uname='".$result['uname'].">Edit</a></td>
                        <td class='w3-blue'><a href='deletes.php?uname='".$result['uname'].">Delete</a></td>
                        <td class='w3-green'><a href='makeadmin.php?uname='".$result['uname'].">MakeAdmin</a>
                        </td>
                    <td class='w3-red'><a href='removeadmin.php?uname='".$result['uname'].">RemoveAdmin</a>
                     
                   </td>
                    </tr>";

                     if($_POST['phone'])
                     {
                        echo $e;        
                    }
                 echo $e;
                    }
                       }
        else {
                    ?>                
                

                

               
            </thead>
            </tr>
            <?php
            $select = "SELECT * FROM cust_detail WHERE uname='$uname'";
            $query = mysqli_query($con, $select);
            while ($result = mysqli_fetch_array($query)) {
                ?>  
                <tr>
                        <td><?php echo $result['id']; ?></td>
                       <td><?php echo $result['uname']; ?></td>
                        <td><?php echo $result['email']; ?></td>
                        <td><?php echo $result['psw']; ?></td>
                        <td><?php echo $result['address']; ?></td>
                        <td><?php echo $result['secadd']; ?></td>
                        <td><?php echo $result['pin']; ?></td>
                        <td><?php echo $result['contactno']; ?></td>
                        <td class="w3-orange"><a href="edits.php?uname=<?php echo $result['uname']; ?>" >Edit</a></td>


                </tr>

                <?php
            }
        }
        ?>
    </tbody>
</table>
</div>


</body>
</thead>
</html>


