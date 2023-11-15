<?php
$servername = "localhost";
$username = "root";
$password = "";

// Create connection
$conn = mysqli_connect($servername, $username, $password);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Select the database
mysqli_select_db($conn, 'gym');

// Fetch data from Inventory table where Equipment_Condition is 'NOT WORKING'


// Close the connection

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome Admin to the Gym</title>
    <link rel="stylesheet" type="text/css" href="./css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Poppins&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f8f9fa;
            color: #495057;
            margin: 0;
            padding: 0;
        }

        h1 {
            color: #007bff;
        }

        .container {
            margin-top: 20px;
        }

        .list-group {
            margin-bottom: 20px;
        }

        .list-group-item {
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 0;
        }

        .list-group-item:hover {
            background-color: #0056b3;
        }

        .btn-outline-primary {
            color: #007bff;
            border-color: #007bff;
        }

        .btn-outline-primary:hover {
            color: #fff;
            background-color: #007bff;
            border-color: #007bff;
        }

        .table {
            margin-top: 20px;
        }

        .modal-content {
            background-color: #f8f9fa;
        }

        .modal-header {
            background-color: #007bff;
            color: #fff;
        }

        .modal-body {
            padding: 20px;
        }

        .modal-footer {
            background-color: #f8f9fa;
        }

        .not-working {
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <h1 class="text-center display-3 mb-5 ">Welcome Admin</h1>
 
       
         <div class="container mt-2">
            
      <div class="row">
         <div class="col-lg-4">
          <div class="list-group">
                    <a href="notworking.php" class="list-group-item list-group-item-action">Not-Working</a>
                    <a href="employeework.php" class="list-group-item list-group-item-action">Employee Details</a>
                    <a href="equipmentused.php" class="list-group-item list-group-item-action">Equipments in Use</a>
                    <a href="musclegroup.html" class="list-group-item list-group-item-action">Muscle Groups</a>
                    <a href="late.php" class="list-group-item list-group-item-action">Late</a>
                  <br>

            </div>
              <a class="btn btn-outline-primary" href="logout.php">Logout</a>
            </div>
        <div class="col-lg-8">
               <h3 class="text-center display-5 mb-3">Trainee Details</h3>   
              
<!--Table-->
<table class="table table-striped table-hover table-bordered" border="1" cellspacing="2" width="60%">

    <thead>
        <tr>
            <th>Roll_Number</th>
            <th>First_Name</th>
            <th>Last_Name</th>
            <th>Student_MONO</th>
            <th>Student_Year</th>
            <th>Student_Branch</th>
            <th>Section</th>
            <th>HorDS</th>
            <th>Check_in</th>
            <th>Check_out</th>
            
        </tr>
    </thead>

<?php
          
          $q= "SELECT Roll_Number,First_Name,Last_Name,Student_MONO,Student_Year,Student_Branch,Section,HorDS,Check_in,Check_out
from student                                                                                      ";


          $query = mysqli_query($conn,$q);
          while($res = mysqli_fetch_array($query)){
            echo "<tbody>
            <tr >
                
    
                  <td> $res[Roll_Number]  </td>
                  <td> $res[First_Name]   </td>
                  <td> $res[Last_Name]   </td>
                  <td> $res[Student_MONO]  </td>
                  <td> $res[Student_Year]   </td>
                  <td> $res[Student_Branch]  </td>
                  <td> $res[Section]   </td>
                  <td> $res[HorDS]</td>
                  <td> $res[Check_in]</td>
                  <td> $res[Check_out]</td>


              </tr>
              </tbody>";
            }


  /*
      <tbody>
          <tr >
              

              <td><?php echo $res['Roll_Number'];  ?> </td>
              <td><?php echo $res['First_Name'];  ?> </td>
              <td><?php echo $res['Last_Name'];  ?> </td>
              <td><?php echo $res['Student_MONO'];  ?> </td>
              <td><?php echo $res['Student_Year'];  ?> </td>
              <td><?php echo $res['Student_Branch'];  ?> </td>
              <td><?php echo $res['Section'];  ?> </td>
              <td>
                <button type="submit" class="btn btn-danger">
                  <a data-toggle="tooltip" title="<?php echo $res['Joined_on'];  ?>" href="delete.php?idt=<?php echo $res['T_id']; ?>" class="text-white">
                  Remove
                </a>
              </button> 
            </td>
        </tr>
    </tbody>
    
*/
?>
</table>


<!-- Button to Open the Modal -->
  <button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal">
    Add Trainee
  </button>

  <!-- The Modal -->
  <div class="modal fade" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">New Register </h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
                        <form action="insert.php" method="POST" accept-charset="utf-8">
                         <div class="form-group">
                            <label>
                              Roll_Number
                            </label>
                            <input type="text" name="t_id" value="" class="form-control">
                        </div>
                    <div class="form-group">
                            <label>First_Name</label>
                            <input type="text" name="t_name" value="" class="form-control">
                    </div>
   
                       <div class="form-group">
                            <label>Student_MONO</label>
                            <input type="text" name="phone" pattern="[0-9]{10}" value="" class="form-control">
                    </div>
                    <div class="form-group">
                            <label>HprDS</label>
                            <select class="form-control" name="HorDS" >


                                <option value="H">H</option>
                                <option value="Ds">DS</option>
                                
                            </select> 
                    </div>
                        
                      <div class="form-group">
                            <label>Student_Branch</label>
                            <input type="text" name="batch_id" value="" class="form-control">
                    </div>

 
                    <button type="submit" class="btn btn-info" name="regg">Register</button>
                   
               </form>  
       
    </div>
  </div>
  
  <script>
$(document).ready(function(){
  $('[data-toggle="tooltip"]').tooltip();   
});
</script>
                 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
                  <script src="./js/bootstrap.min.js"></script>
                 <script src="./js/jquery.3.4.1.js"></script>
                 
                  
</body>
</html>
            