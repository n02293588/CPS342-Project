<html>
<head>
<title>(5) Displaying the Motion Sensor Data</title>
<style>
    body {
        width: 35em;
        margin: 0 auto;
        font-family: Tahoma, Verdana, Arial, sans-serif;
    }
</style>
<img src="/imgs/setup.jpg">
<br>

<strong>(5) Displaying the Motion Sensor Data</strong>
</head>

<p>The next step was simple now. I needed two different webpages, one which would just display the information in the database in human-readable form, and one page to embed that one in a fram with a button to refresh the page. I looked online for some HTML help, notably <a href="http://w3schools.org/">w3schools.org</a>, and produced this code:
<br>
<pre>
	&lt;html&gt;
	&lt;head&gt;
	&lt;title&gt;CPS342-Embedded Linux Project Page&lt;/title&gt;
	&lt;style&gt;
	    body {
	        width: 35em;
	        margin: 0 auto;
	        font-family: Tahoma, Verdana, Arial, sans-serif;
	    }
	&lt;/style&gt;
	&lt;/head&gt;

	&lt;body&gt;
	&lt;br&gt;
	&lt;br&gt;
	&lt;iframe src="/proj/sensordat.php" width=560px height=360px name="data"i&gt;
	  &lt;p&gt;Your browser does not support iframes.&lt;/p&gt;
	&lt;/iframe&gt;
	&lt;br&gt;
	&lt;br&gt;
	&lt;div align="center"&gt;
	&lt;input type="button" value="Refresh" onclick="data.location.href='/proj/sensordat.php'"&gt; 
	&lt;br&gt;
	&lt;br&gt;
	&lt;a href="/index.html"&gt;Return Home&lt;/a&gt;
	&lt;br&gt;
	&lt;/div&gt;


	&lt;/body&gt;
	&lt;/html&gt;
</pre>

This produced this webpage:
<br>
<br>
<img src="/imgs/datapage.jpg">
<br>
<br>

Now that the project functions as it has to, there are a few things I could do to improve the project.
<br>
<ul>
<li>Use CSS/HTML/JavaScript to make the webpage look better.</li>
<li>More efficient Python programming / Database handling. I may want to have the RPi.GPIO actions be written into a file, and when the Refreh button is clicked it will add that to the database and display it on the other page. I could also add a Clear button on that page to clear the database.</li>
</ul></p>

<div align="left">
<a href="/doc/RPiGPIO.php">Previous</a>
</div>

<div align="center">
<a href="/docs.html">Back to Documents</a>
</div>
