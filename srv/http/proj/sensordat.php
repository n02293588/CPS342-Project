<html>

<head>
<title>Sensor Data Display</title>

<style>
    body {
        width: 35em;
        margin: 0 auto;
        font-family: Tahoma, Verdana, Arial, sans-serif;
    }
</style>

</head>

<body>

<?php

#	ini_set('display_errors',1);
#	error_reporting(E_ALL);

	$dbhandle = mysql_connect('localhost', 'root', 'n02293588');

	if ($dbhandle == false)
	{
		die ("Unable to connect to MySQL DB.<br>");
	}

	$db = mysql_select_db('sensordb');
	
	if ($db == false)
	{
		die ("Unable to Select MySQL Database.<br>");
	}

	$dbquery = 'SELECT * FROM sensordat2';

	$dbresult = mysql_query($dbquery, $dbhandle);

	if ($dbresult == false)
	{
		die ("Unable to perform query.<br>");
	}

#	while($dbrow = mysql_fetch_array($dbresult, MYSQL_ASSOC))
#	{
#		print_r($dbrow);
#		echo '<br>';
#	}

	while ($row = mysql_fetch_assoc($dbresult))
	{
		echo "[";
		echo "{$row['dt']}";
		echo "]: The motion sensor was triggered.<br>";
#		case ({$row['senstype']}) {
#			case "m":
#				echo "The motion sensor was triggered.<br>";
#				break;
		}
	

	mysql_close($dbhandle);

?>
</body>
</html>
