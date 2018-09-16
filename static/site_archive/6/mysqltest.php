<html>
<body>

<h1>MYSQL TEST</h1>

<?php
	$con = mysql_connect('localhost', 'root', 'whadup');
	mysql_select_db('webserv');
	if (!$con)
	{
		die('Could not connect: ' . mysql_error());
	}

	echo 'Connected successfully';

	$result = mysql_query("select * from test");

	while($row = mysql_fetch_assoc($result))
	{
		echo ("<p>" . $row['t_name'] . "</p>");
		echo ("<p>" . $row['t_age'] . "</p>");
	}	

	mysql_close($con);
?>

</body>
</html>

