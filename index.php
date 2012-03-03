<html>
<head>
	<title>Homework Manager</title>
	<link rel = "SHORTCUT ICON" href = "http://localhost/homework/images/favicon.ico">
	<link rel="stylesheet" type="text/css" href="style-main.css" />
</head>
<body>
	<div class = "header" >
	<h1>Homework Manager&nbsp;</h1>
	<a href = "create.php" ><img src = "images/create.png" ></a>&nbsp;
	</div>
	<br />
	<?php
	$date = "";
	$con = mysql_connect("localhost", "root", "");
	if (!$con)
		{
		die('Could not connect: ' . mysql_error());
		}

	mysql_select_db("homework", $con);
	
	$sql = "SELECT * FROM homework_table WHERE Completed=false ORDER BY Due";
	
	$result = mysql_query($sql);
	
	$tomorrow = mktime(0, 0, 0, date("m"), date("d")+1, date("y"));
	
	while($row = mysql_fetch_array($result))
		{
		if($row['Completed'] == true)
			{
			break;
			}
		
		if($row['Due'] != $date)
			{
			if($date != "")
				{
				echo "</div><br />";
				}
				
			if($row['Due'] < Date("Y-m-d"))
				{
				echo "<div class = \"overdue\" >";
				}
			elseif($row['Due'] == Date("Y-m-d"))
				{
				echo "<div class = \"today\" >";
				}
			elseif($row['Due'] == Date("Y-m-d", $tomorrow))
				{
				echo "<div class = \"soon\" >";
				}
			else
				{
				echo "<div class = \"dategroup\" >";
				}
			echo "<h3 class = \"date\" >$row[Due]</h3>";
			$date = $row['Due'];
			}

		echo "<b>Subject: </b>$row[Subject]<br />";
		echo "<b>Assignment: </b>$row[Description]<br />";
		echo "<a href = \"http://localhost/homework/delete_assignment.php?P_Id=$row[P_Id]\"><img src = \"images/delete.png\" /></a>";
		echo "<a href = \"http://localhost/homework/complete_assignment.php?P_Id=$row[P_Id]\"><img src = \"images/completed.gif\" /></a><br /><br />";
		}
		
	$sql2 = "SELECT * FROM homework_table WHERE Completed=1 ORDER BY Due";
	
	$result2 = mysql_query($sql2);
	
	echo "</div>";
	echo "<br />";
	echo "<div class = \"completed\" >";
	echo "<h3 class = \"date\" >Completed</h3>";
	while($row2 = mysql_fetch_array($result2))
		{
			echo "<b>Subject: </b>$row2[Subject]<br />";
			echo "<b>Assignment: </b>$row2[Description]<br />";
			echo "<a href = \"http://localhost/homework/delete_assignment.php?P_Id=$row2[P_Id]\"><img src = \"images/delete.png\" /></a>";
			echo "<a href = \"http://localhost/homework/uncomplete_assignment.php?P_Id=$row2[P_Id]\"><img src = \"images/uncompleted.png\" /></a><br /><br />";
		}
	echo "</div>";
	echo "<br />";
	mysql_close($con);
	?>
</body>
</html>