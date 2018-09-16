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

	$querystring = "create table battleship_grid( id int not null auto_increment, name varchar(100) not null, ";

	$letters = array("A", "B", "C", "D", "E", "F", "G", "H", "I", "J");
	foreach ($letters as $letter)
	{
		for ($i = 1; $i < 21; $i++)
		{
			$querystring = $querystring . $letter . $i . " smallint, ";
			$querystring = $querystring . $letter . $i . "_c varchar(7), ";
		}	
	}

	$querystring = $querystring . " primary key ( id ));";

	echo $querystring;
	
	$result = mysql_query($querystring);

	mysql_close($con);
?>

</body>
</html>

