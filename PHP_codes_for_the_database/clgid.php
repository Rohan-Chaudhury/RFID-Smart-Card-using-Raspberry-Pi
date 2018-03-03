<?php
	$id = $_REQUEST['id'];
	$con = mysqli_connect('localhost','root','17579','project_id',3306) or die("Server can't connect try again");
	mysqli_select_db($con,'project_id') or die("Database not found!!");
	$s = "select * from reg_uid,students where reg_uid.regNo=students.regNo and reg_uid.UID=$id";
	$result = mysqli_query($con,$s) or die(mysqli_error($con));
	if($row = mysqli_fetch_assoc($result))
             {
		
			$myObj = new \stdclass();
			$myObj->name = $row['name'];
			$myObj->roll = $row['rollNo'];
			$myObj->lib = $row['libID'];
			$myObj->reg = $row['regNo'];
			$myObj->Depart = $row['department'];
			$myObj->mess = $row['messChoice'];
		
			$myJSON = json_encode($myObj);
			echo $myJSON;
		}
	
?>
