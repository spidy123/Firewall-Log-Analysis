<?php
include "connection.php";

$qur = "SELECT hits,gateway FROM uniquegat order by hits Desc limit 5";
$res = mysql_query($qur);

$qur_other = "SELECT SUM(hits) as total FROM uniquegat;";
$res_other = mysql_query($qur_other);
$row_other = mysql_fetch_array($res_other);
$total_sum = $row_other['total'];

$count = mysql_num_rows($res);
$top_sum = 0;

$row1 = [];

while($row = mysql_fetch_array($res))
	{
		
		$row1[] = ["hits" => $row['hits'],"gateway" => $row['gateway']];
		$top_sum += $row['hits'];
	}
	$other_sum = $total_sum - $top_sum;
	$row1[] = ["hits" => $other_sum,"gateway" => "Other"];

	echo json_encode($row1);
?>