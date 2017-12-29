<?php
$servername = "10.10.13.201";
$username = "harsh";
$password = "kadam";
$dbname = "firewall";
// Create connection
$conn = mysql_connect($servername, $username, $password);
mysql_select_db($dbname,$conn);

?>