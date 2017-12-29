<?php
include "connection.php";

session_start();

$username = $_SESSION["username"];
$date1 = $_SESSION["date1"];
$date2 = $_SESSION["date2"];

$d1 = date_parse($date1);
$d2 = date_parse($date2);

$qur = "SELECT * FROM ".$username." where time BETWEEN STR_TO_DATE('".$date1."','%Y-%m-%d %H:%i:%s') AND STR_TO_DATE('".$date2."','%Y-%m-%d %H:%i:%s');";

$res = mysql_query($qur);

$IT = 0;
$SE = 0;
$BAE = 0;
$NONE = 0;
$YOUTUBE = 0;
$FACEBOOK = 0;
$SHOPPING = 0;
$BLOG = 0; 
$OTHERS = 0;

while($row = mysql_fetch_array($res))
{
	$IT += $row[1];
	$SE += $row[2];
	$BAE += $row[3];
	$NONE += $row[4];
	$YOUTUBE += $row[5];
	$FACEBOOK += $row[6];
	$SHOPPING += $row[9];
	$BLOG += $row[14];
	$OTHERS += $row[7]+$row[8]+$row[10]+$row[11]+$row[12]+$row[13];

	for($i = 15 ; $i < 75 ; $i++)
	{
		$OTHERS += $row[$i];

	}
} 

$row1[] = ["hits" => $IT,"category" =>"Information Techology"];
$row1[] = ["hits" => $SE,"category" => "Search Engines"];
$row1[] = ["hits" => $BAE,"category" => "Business And Economy"];
$row1[] = ["hits" => $NONE,"category" => "None"];
$row1[] = ["hits" => $YOUTUBE,"category" => "YouTube"];
$row1[] = ["hits" => $FACEBOOK,"category" => "Facebook"];
$row1[] = ["hits" => $SHOPPING,"category" => "Shopping"];
$row1[] = ["hits" => $BLOG,"category" => "Blog"];

$row1[]= ["hits" => $OTHERS,"category" => "Others"];

echo json_encode($row1);


?>