<?php
$mysql_hostname = "localhost"; // hostname localhost
$mysql_username = "root";       //username for the host
$mysql_password = "";            //password for the username
$mysql_db = "simple_login";       //database to be used for the process

$db = mysqli_connect($mysql_hostname,$mysql_username,$mysql_password) or die("could not connect to database"); // check the connection availability for the database
mysqli_select_db($db,$mysql_db) or die("could not select database"); // check the availability of the database in the DBMS
echo "Connected";





?>