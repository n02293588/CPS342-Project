<html>
<head>
<title>(1) Installing a LEMP Server on RPi</title>
<strong>Installing a LEMP Server on RPi</strong>
<style>
    body {
        width: 35em;
        margin: 0 auto;
        font-family: Tahoma, Verdana, Arial, sans-serif;
    }
</style>
</head>

<body>
<p>The first step in this project, I thought, would be successfully installing a LEMP server. Luckily for me, digitalocean.com provided a <a href="https://www.digitalocean.com/community/articles/how-to-install-lemp-nginx-mysql-php-stack-on-arch-linux">great tutorial</a>.</p>

<p>To start, I installed the packages I would need for this: PHP (php-fpm), MySQL (mariadb), nginx. I also installed links and git for internet access and access to git. I did this by using:
<br>
<pre>	pacman -S <packagename></pre>
<br>
Next, I installed and setup MySQL by running:
<br>
<pre>	sudo systemctl start mysqld && mysql_secure_installation</pre>
<br>
After going through the prompted steps, I started up nginx with:
<br>
<pre>	sudo systemctl start nginx</pre><br>
<br>
Using the same process, I started php, but where "nginx" is, I replaced it with "php-fpm."
<br>
The next step was to edit the nginx configuration file to be prepared for PHP use.
<br>
<pre>	sudo vim /etc/nginx/nginx.conf</pre><br>
<br>
Scrolling down a bit, a block of code is commented out should be uncommented and edited to look like this:
<br>
<pre>	location ~ \.php$ {<br>
	      fastcgi_pass   unix:/var/run/php-fpm/php-fpm.sock;
	      fastcgi_index  index.php;
	      root   /srv/http;
	      include        fastcgi.conf;
	 }</pre>
<br>
A PHP info page was created next in /srv/http/ to show that PHP was indeed active and the webserver is ready to parse php scripts.
<br>
<pre>	sudo vim /srv/http/info.php<br></pre>
<br>
Finally, I restarted the three daemons and enabled them to boot on startup.
<br>
<pre>	sudo systemctl restart nginx mysqld php-fpm
	sudo systemctl enable mysqld php-pm<br></pre></p>

<p>Thus concludes the installation of the LEMP server</p>
<br>
<div align="right">
	<a href="/doc/LearningPHPandMySQL.php">Next</a>
</div>
<br>
<div align = "center">
	<a href="/docs.html">Back to Documents</a>
</div>
<br>
<br>
</body>
</html>
