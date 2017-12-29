<?php
include "connection.php";
$qur = "SELECT hits,domain FROM nonecat order by hits Desc limit 10";

$res = mysql_query($qur);
$count = mysql_num_rows($res);

$row1 = [];
while($row = mysql_fetch_array($res))
	{
		
		$row1[] = ["hits" => $row['hits'],"domain" => $row['domain']];
	}
	echo json_encode($row1);
?>