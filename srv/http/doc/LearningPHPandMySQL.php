<html>
<head><title>(2) Learning PHP and MySQL</title>
<style>
    body {
        width: 35em;
        margin: 0 auto;
        font-family: Tahoma, Verdana, Arial, sans-serif;
    }
</style>
</head>
<head><strong>Learning PHP and MySQL</strong></head>

<body>
<p>After configuring the LEMP server and making some changes to the way nginx works (for example, I moved the index.html page from /usr/share/nginx/html/ to /srv/http/ to keep everything together) and the index.html file (I added some links, shown below in the image.)
</p>
<img src="/imgs/indexhtml1.jpg" alt="index.html changes">

<br>Anyway, I decided to finally start picking up PHP and MySQL. I found a great guide over at <a href="http://www.techotopia.com/index.php/PHP_Essentials">Techotopia</a>. I followed through the sample PHP code and got up to the point where they start using MySQL. The first thing to do here is to create a database. The user account was done back at <a href="/doc/InstallingLemp.php">(1) Installing a LEMP Server on RPi</a>. Begin by typing in:
<br>
<pre>	sudo mysql -u <username> -p</pre>
It will then ask for a password, the one that was made earlier. After doing so, the following commands are typed in:
<br>
<pre>	mysql> CREATE DATABASE PHPsampleDB;
	Query OK, 1 row affected (0.00 sec)

	mysql> USE PHPsampleDB;
	Database changed

	mysql> CREATE TABLE customer (name VARCHAR(30), email VARCHAR(30),
	    -> account VARCHAR(20));
	Query OK, 0 rows affected (0.01 sec)</pre>

Now, you want to put some data into this database. For this, you do as follows:
<br>
<pre>	mysql> INSERT INTO customer VALUES ('Gregory House', 'greg@nospam.com', '12345678');
	Query OK, 1 row affected (0.00 sec)

	mysql> INSERT INTO customer VALUES ('Robert Chase', 'greg@nospam.net', '87654321');
	Query OK, 1 row affected (0.00 sec)

	mysql> INSERT INTO customer VALUES ('Lisa Cuddy', 'greg@nospam.net', '24688642');
	Query OK, 1 row affected (0.00 sec)</pre>

Typing in SELECT * FROM customers will give you this output:
<br>
<pre>	mysql> SELECT * FROM customer;
	+---------------+-----------------+----------+
	| name          | email           | account  |
	+---------------+-----------------+----------+
	| Gregory House | greg@nospam.com | 12345678 |
	| Robert Chase  | greg@nospam.net | 87654321 |
	| Lisa Cuddy    | greg@nospam.net | 24688642 |
	+---------------+-----------------+----------+
	3 rows in set (0.00 sec)</pre>
Great! Now you have your database, it's time to connect to a database and print out the Array. This script below only prints out the data as it appears in MySQL, so it is not that aesthetically pleasing. We will get to tables after this.
<br>
<pre>	&lt;?php

	        $dbhandle = mysql_connect('localhost', 'phptest', '3579php');
	
	        if ($dbhandle == false)
	        {
	                 die  ("Unable to connect to MySQL Database&lt;br&gt;");
	        }
	
	        $db = mysql_select_db('PHPsampleDB');
	
	        if ($db == false)
	        {
	                 die  ("Unable to Select MySQL Database&lt;br&lt;");
	        }
	
	        $dbquery = 'SELECT * FROM customer';
	
	        $dbresult = mysql_query ($dbquery, $dbhandle);
	
	        if ($dbresult == false)
	        {
	                die  ("Unable to to perform query&lt;br&gt;");
	        }
	
	        while ($dbrow = mysql_fetch_array($dbresult, MYSQL_ASSOC))
	        {
	                print_r($dbrow);
	                echo '&lt;br&gt;';
	        }

	        mysql_close($dbhandle);
	?&gt;
</pre>

I added spaces around the br tags so they would not execute. At this point in my project, I ran into an error. At first, all that was being displayed was a blank screen. When I checked the source, the only thing visible was the html code I had at the start. To fix this, I had done some searching online, and I finally found that I had to edit <br>
<pre>	/etc/php/php.ini</pre>
And go down until I found an area of code that listed different php extensions. I had to find <br>
<pre>	excetnsion=mysql.so</pre>
And make sure that it was uncommented. With that, I produced this on the sample DB page I was working on:
<br>
<pre>	Array ( [name] => Gregory House [email] => greg@nospam.com [account] => 12345678 )
	Array ( [name] => Robert Chase [email] => greg@nospam.net [account] => 87654321 )
	Array ( [name] => Lisa Cuddy [email] => greg@nospam.net [account] => 24688642 ) 
</pre>
I then decided that I wanted to put it into a table for easier reading. After reading online again through a few different tutorials, I added HTML before the PHP script to create a table with a border, and changed the code inside the while loop to enter the data in the table. The HTML code before the php script is:<br>
<pre>	&lt;table border ='1'&gt;
	&lt;tr&gt;
	&lt;th&gt;Name&lt;/th&gt;
	&lt;th&gt;E-Mail&lt;/th&gt;
	&lt;th&gt;Account Number&lt;/th&gt;
	&lt;/tr&gt;
</pre>
While the php in the while loop was appended to:<br>
<pre>	echo "&lt;tr&gt;";
        echo "&lt;td&gt;{$row['name']}&lt;/td&gt;";
        echo "&lt;td&gt;{$row['email']}&lt;/td&gt;";
        echo "&lt;td&gt;{$row['account']}&lt;/td&gt;";
        echo "&lt;/tr&gt;";
</pre>

And with that, I produced a webpage that looks like the image below:<br>
<img src="/imgs/samplephp1.jpg" alt="Sample DB test page">
<br>
<br>
<br>
</p>
<div align="left">
	<a href="/doc/InstallingLEMP.php">Previous</a>
</div>
<br>
<br>
<div align="center">
	<a href="/docs.html">Back to Documents</a>
</div>
<br>


</body>
</html>
