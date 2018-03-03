<?php
	$name = $_REQUEST["name"];
	$roll = $_REQUEST["roll"];
	$reg = $_REQUEST["reg"];
	$libid = $_REQUEST["libid"];
	$mess = $_REQUEST["mess"];
	$cgpa = $_REQUEST["cgpa"];
	$depart = $_REQUEST["depart"];
	$con = mysqli_connect('localhost','root','17579','project_id',3306) or die("Server can't connect try again");
	mysqli_select_db($con,'project_id') or die("Database not found!!");
	$s = "insert into students(name,regNo,rollNo,department,libID,messChoice,currentCGPA) values('$name','$reg','$roll','$depart','$libid','$mess','$cgpa')";
	$result = mysqli_query($con,$s) or die(mysqli_error($con));
	if($result >0)
	echo "successfully entered";
	
?>
