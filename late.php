
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
        <th>Roll_Number</th>
        <th>First_Name</th>
        <th>Last_Name</th>
        <th>Check_in</th>
        <th>Check_out</th>
        <th>Duration</th>
       
        <!--<th>HorDS</th>
        <th>Check_in</th>
        <th>Check_out</th>-->
        
    </tr>
</thead>
<?php
          
          $q= "SELECT
          Roll_Number,
          First_Name,
          Last_Name,
          Check_in,
          Check_out,
          TIMEDIFF(Check_out, Check_in) AS Duration
      FROM
          student
      WHERE
          TIMEDIFF(Check_out, Check_in) > '01:30:00'; ";


          $query = mysqli_query($conn,$q);
          while($res = mysqli_fetch_array($query)){
            echo "<tbody>
            <tr >
                
    
                  <td> $res[Roll_Number]  </td>
                  <td> $res[First_Name]   </td>
                  <td> $res[Last_Name]   </td>
                  <td> $res[Check_in]  </td>
                  <td> $res[Check_out]   </td>
                  <td>$res[Duration]</td>
                  


              </tr>
              </tbody>";
            }
            ?>
            <a class="btn btn-outline-primary" href="admin_pan.php">Back to Admins</a>
</table>
