<?php
$con = mysql_connect("localhost", "root", "");
if (!$con)
	{
		die('Could not connect: ' . mysql_error());
	}

mysql_select_db("homework", $con);

$sql = "DELETE FROM homework_table WHERE P_Id='$_GET[P_Id]'";
mysql_query($sql);
mysql_close($con);
header("Location: http://localhost/homework");
?>