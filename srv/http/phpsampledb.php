<html>
<!--
	This web page is a small walkthrough of me learning PHP and MySQL. I posted a link to the tutorial I found that I have been following. The first PHP script connects to a sample DB 'PHPsampleDB' with a few entries of name, email, and account number. It then prints it as raw data, which isn't very appealing for humans to read. Looking further online and having to combine what I found from multiple different tutorials, I was able to put it into a table.

-->
<head>
<style>
body {
        width: 35em;
        margin: 0 auto;
        font-family: Tahoma, Verdana, Arial, sans-serif;
    }
</style>
<?php
echo '<title>PHP Test Database</title>';
?>
</head>
<body>
<br>
<p>Below is a program which displays a sample database. I used a tutorial from <a href="http://www.techotopia.com/index.php/PHP_Essentials">Techotopia</a> to help me understand how PHP and MySQL interact with each other.</p>

<?php
	#Connects to the MySQL Server
        $dbhandle = mysql_connect('localhost', 'root', 'n02293588');

        if ($dbhandle == false)
        {
                 die  ("Unable to connect to MySQL Database<br>");
        }

	#Selects a database if there is a connection to the server
        $db = mysql_select_db('PHPsampleDB');

        if ($db == false)
        {
                 die  ("Unable to Select MySQL Database<br>");
        }

        $dbquery = 'SELECT * FROM customer';

        $dbresult = mysql_query ($dbquery, $dbhandle);

        if ($dbresult == false)
        {
                die  ("Unable to to perform query<br>");
        }

	#Prints the data in the database
	#Array => xxx [name] => yyy [email] => zzz [account]
        while ($dbrow = mysql_fetch_array($dbresult, MYSQL_ASSOC))
        {
                print_r($dbrow);
                echo '<br>';
        }

        mysql_close($dbhandle);
?>

<br>
<!--
	The tiny HTML written here sets up a table that the data can be put into.
-->
<p>This table below was an attempt at showing the database in a table format</p>

<table border ='1'>
<tr>
<th>Name</th>
<th>E-Mail</th>
<th>Account Number</th>
</tr>

<?php
	$dbhandle = mysql_connect('localhost', 'root', 'n02293588');

        if ($dbhandle == false)
        {
                 die  ("Unable to connect to MySQL Database<br>");
        }

        $db = mysql_select_db('PHPsampleDB');

        if ($db == false)
        {
                 die  ("Unable to Select MySQL Database<br>");
        }

        $dbquery = 'SELECT * FROM customer';

        $dbresult = mysql_query ($dbquery, $dbhandle);

        if ($dbresult == false)
        {
                die  ("Unable to to perform query<br>");
        }
	#Displays the data inside the HTML table made above
	#by using embedded HTML in the PHP script
	while ($row = mysql_fetch_assoc($dbresult)) {
		echo "<tr>";
		echo "<td>{$row['name']}</td>";
		echo "<td>{$row['email']}</td>";
		echo "<td>{$row['account']}</td>";
		echo "</tr>";
	}

	mysql_free_result($dbresult);
?>

<!-- This little bit here is supposed to be on the bottom of the page, but for
	whatever reason it is appearing above the table. -->
<p>Return <a href="/index.html">home</a>.</p>
</body>
</html>
