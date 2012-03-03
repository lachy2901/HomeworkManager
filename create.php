<html>
<head>
	<title>Create Assignment</title>
	<link rel = "SHORTCUT ICON" href = "http://localhost/homework/images/favicon.ico">
	<link rel="stylesheet" type="text/css" href="style-create.css" />
</head>
<body>
	<br /><br />
	<div class = "prettyform" >
	<h1>Create Assignment</h1>
	<form action = "create_assignment.php" method = "get" >
		<table><tr>
		<td><label>Subject: </label></td><td><select name = "subject">
			<option value = "Maths">Maths</option>
			<option value = "English">English</option>
			<option value = "Japanese">Japanese</option>
			<option value = "Humanities">Humanities</option>
			<option value = "Science">Science</option>
			<option value = "CL">CL</option>
			<option value = "Music">Music</option>
		</select></td></tr>
		<tr><td><label>Description: </label></td><td><input type = "text" name = "desc" /></td></tr>
		<tr><td><label>Due: </label></td><td><input type = "text" name = "due" /></td></tr></table>
		<input type = "submit" value = "Create" />
	</form>
	</div>
</body>
</html>