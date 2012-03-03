<?php
$con = mysql_connect("localhost", "root", "");
if (!$con)
	{
		die('Could not connect: ' . mysql_error());
	}

mysql_select_db("homework", $con);

$sql = "INSERT INTO homework_table (Subject, Description, Due, Completed) VALUES ('$_GET[subject]', '$_GET[desc]', '$_GET[due]', false)";
if (!mysql_query($sql,$con))
  {
	die('Error: ' . mysql_error());
  }
 mysql_close($con);
 header("Location: http://localhost/homework");
?>