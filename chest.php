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
        
        <th>Equipment_name</th>
        <th>Muscle_Name</th>
       
       
        <!--<th>HorDS</th>
        <th>Check_in</th>
        <th>Check_out</th>-->
        
    </tr>
</thead>
<?php
          
          $q= "SELECT Equipment_name,Muscle_Name
from musclegroup  WHERE Muscle_Name = 'CHEST';                                                                             ";
$q_not_working = "SELECT * FROM musclegroup WHERE Muscle_Name = 'CHEST'";
$query_not_working = mysqli_query($conn, $q_not_working);
$not_working_rows = mysqli_fetch_all($query_not_working, MYSQLI_ASSOC);

          $query = mysqli_query($conn,$q);
          while($res = mysqli_fetch_array($query)){
            echo "<tbody>
            <tr >
                
    
                  
                  <td> $res[Equipment_name]   </td>
                  <td> $res[Muscle_Name]   </td>
                  
                  


              </tr>
              </tbody>";
            }
            ?>
</table>
