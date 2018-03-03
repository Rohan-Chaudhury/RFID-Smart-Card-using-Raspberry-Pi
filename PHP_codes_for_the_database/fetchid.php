<?php
	$reg = $_REQUEST['reg'];
	$uid = mt_rand(11111,99999);
	$con = mysqli_connect('localhost','root','17579','project_id',3306) or die("Server can't cnnect");
	mysqli_select_db($con,'project_id');
	$s = "insert into reg_uid(UID,regNo) values($uid,$reg)";
	$result = mysqli_query($con,$s) or die(mysqli_error($con));
	if($result > 0)
	{
		$myObj = new \stdclass();
		$myObj->uid = $uid;
		$myJSON = json_encode($myObj);
		echo $myJSON;
	}
?>
