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
        <th>Equipment_id</th>
        
        
       
        <!--<th>HorDS</th>
        <th>Check_in</th>
        <th>Check_out</th>-->
        
    </tr>
</thead>
<?php
          
          $q= "SELECT Roll_Number,Equipment_id
               from equipmentused                                                              ";


          $query = mysqli_query($conn,$q);
          while($res = mysqli_fetch_array($query)){
            echo "<tbody>
            <tr >
                
    
                  <td> $res[Roll_Number]  </td>
                  <td> $res[Equipment_id]   </td>
              
                  
                  


              </tr>
              </tbody>";
              
   
            }
            ?>
            <a class="btn btn-outline-primary" href="admin_pan.php">Back to Admins</a>
</table>
