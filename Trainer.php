<?php
$servername = "localhost";
$username = "root";
$password = "";

// Create connection
$conn = mysqli_connect($servername, $username, $password);


//echo "Connected successfully";
mysqli_select_db($conn,'gym');




?>

<!DOCTYPE html>
    <html lang="en">
            <head>
    <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Students</title>
      <link rel="stylesheet" type="text/css" href="./css/bootstrap.min.css">
            <link href="https://fonts.googleapis.com/css?family=Poppins&display=swap" rel="stylesheet">
      <style>
        *{
        font-family: 'Poppins', sans-serif;
        }

        
      </style>
        </head>
     <body>
         <div class="container">
            <h1 class="text-center display-3 mb-5">Welcome Admin</h1>
      <div class="row">
         <div class="col-lg-4">
          <div class="list-group">
                    <a href="admin_pan.php" class="list-group-item list-group-item-action ">Admin</a>
                    <a href="Student.php" class="list-group-item list-group-item-action active">Students</a>
                    <a href="Packages.php" class="list-group-item list-group-item-action">Packages</a>
                    <a href="Batch.php" class="list-group-item list-group-item-action">Batch</a>
                    <a href="Bill.php" class="list-group-item list-group-item-action">Bill</a>
                    <br>
            </div>
            <a class="btn btn-outline-primary" href="logout.php">Logout</a>
            </div>
        <div class="col-lg-8">
               <h3 class="text-center display-5">Student Details</h3>   
               
<!--Table-->
<table class="table table-striped table-hover table-bordered">

    <thead>
        <tr>
            <th>Roll_Number</th>
            <th>First_Name</th>
            <th>Last_Name</th>
            <th>Student_MONO</th>
            <th>Delete</th>

            
        </tr>
    </thead>
       <?php
          include 'conn.php';
          $q= "select * from student ";


          $query = mysqli_query($conn,$q);
          while($res = mysqli_fetch_array($query)){

          ?>
      <tbody>
        <tr>
            <td> <?php echo $res['Roll_Number'];  ?> </td>
            <td><?php echo $res['First_Name'];  ?> </td>
            <td><?php echo $res['Phone'];  ?> </td>
            
            <td><button type="submit" class="btn btn-danger"><a href="delete.php?idtr=<?php echo $res['Roll_Number']; ?>" class="text-white"> Delete</a></button> </td>

        </tr>
    </tbody>
    <?php
      }
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
          <h4 class="modal-title">New Student </h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
                        <form action="insert.php" method="post" accept-charset="utf-8">
                    <div class="form-group">
                            <label>Roll_Number</label>
                            <input type="text" name="Roll_Number" value="" class="form-control">
                    </div>
                    <div class="form-group">
                            <label>Name</label>
                            <input type="text" name="First_Name" value="" class="form-control">
                    </div>

                      <div class="form-group">
                            <label>Phone</label>
                            <input type="text" name="phone" value="" pattern="[0-9]{10}" class="form-control">
                    </div>
                           <div class="form-group">
                            <label>Pkg_id</label>
                            <select class="form-control" name="pkg_id" >
                                    <?php
                                        $qp="select * from package ";
                                      $queryp = mysqli_query($conn,$qp);
                                   while($res2 = mysqli_fetch_array($queryp)) { ?>

                         <option value="<?php echo $res2[0];?>"><?php echo $res2[1];?></option>

                              <?php 
                            }
                              ?>

                                
                            </select> 
                    </div>

                    <button type="submit" class="btn btn-info" name="add_Student">Register</button>
                   
               </form>  
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
        
      </div>
    </div>
  </div>
  
</div>
   
        </div>
     

                 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
                  <script src="./js/bootstrap.min.js"></script>
                 <script src="./js/jquery.3.4.1.js"></script>
                 
                  
            </body>
            </html>