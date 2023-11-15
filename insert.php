<?php
include 'conn.php';
if(isset($_POST['student']))
{
	$Roll_Number=$_POST['Roll_Number'];
	$t_First_Name=$_POST['t_First_Name'];
	$Last_Name=$_POST['Last_Name'];
	$Student_MONO=$_POST['Student_MONO'];
	$Student_Year=$_POST['Student_Year'];
	$Student_Branch=$_POST['Student_Branch'];
	$Section=$_POST['Section'];
	$HorDS=$_POST['HorDS'];
	$Check_in=$_POST['Check_in'];
	$Check_out=$_POST['Check_out'];
	$q4 = " INSERT INTO `student` (`Roll_Number`, `First_Name`, `Last_Name`, `Student_MONO`, `Student_Year`, `Student_Branch`, `Section`,`HorDS`,`Check_in`,`Check_out`)VALUES ($Roll_Number,'$t_First_Name',$Last_Name,'$Student_MONO',$Student_Year,$Student_Branch,$Section,$HorDS,$Check_in,$Check_out) ";
	$query = mysqli_query($conn,$q4);

	$nq="UPDATE student set Roll_Number=(SELECT Roll_Number from student where Student_Year=$Student_Year)where Student_Year=$Student_Year";
	$query1 = mysqli_query($conn,$nq);
	header('location:admin_pan.php');
}





if(isset($_POST['add_student'])){

	$Roll_Number=$_POST['Roll_Number'];
	$First_Name=$_POST['trnr_First_Name'];
	$Last_Name=$_POST['Last_Name'];
	$Student_Year=$_POST['Student_Year'];
	$q2 = " INSERT INTO `student` VALUES ($Roll_Number,'$First_Name',$Last_Name,$Student_Year)";
	$query = mysqli_query($conn,$q2);
	header('location:Trainer.php');

}





?>
