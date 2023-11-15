<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$db_name="gym";

// Create connection
$conn = mysqli_connect($servername, $username, $password,$db_name);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
//echo "Connected successfully";
mysqli_select_db($conn,'gym');

?>
<table class="table table-striped table-hover table-bordered" border="1" cellspacing="2" width="60%">

<thead>
    <tr>
        <th>Employee_id</th>
        <th>Employee_name</th>
        <th>Employee_MONO</th>
        <th>Employee_Email</th>
        <th>Position</th>
        <th>Time_Slot</th>
        
       
        <!--<th>HorDS</th>
        <th>Check_in</th>
        <th>Check_out</th>-->
        
    </tr>
</thead>
<?php
          
          $q= "SELECT Employee_Name,Employee_name,Employee_MONO,Employee_Email,Position,Time_Slot
               from employee                                                              ";


          $query = mysqli_query($conn,$q);
          while($res = mysqli_fetch_array($query)){
            echo "<tbody>
            <tr >
                
    
                  <td> $res[Employee_Name]  </td>
                  <td> $res[Employee_name]   </td>
                  <td> $res[Employee_MONO]   </td>
                  <td> $res[Employee_Email]  </td>
                  <td> $res[Position]  </td>
                  <td> $res[Time_Slot]  </td>
                  
                  


              </tr>
              </tbody>";
              
   
            }
            ?>
            <a class="btn btn-outline-primary" href="admin_pan.php">Back to Admins</a>
</table>
