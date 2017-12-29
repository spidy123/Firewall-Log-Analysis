<?php
include "connection.php";

session_start();

$class = $_SESSION["class2"];
$date1 = $_SESSION["date1"];
$date2 = $_SESSION["date2"];

$d1 = date_parse($date1);
$d2 = date_parse($date2);

$qur_student = "SELECT * FROM student where class = '".$class."';";
$res_student = mysql_query($qur_student);

//echo "fff:".$qur_student;

//$qur = "SELECT * FROM ".$username." where time BETWEEN STR_TO_DATE('".$date1."','%Y-%m-%d %H:%i:%s') AND STR_TO_DATE('".$date2."','%Y-%m-%d %H:%i:%s');";

//$res = mysql_query($qur);

$IT = 0;
$SE = 0;
$BAE = 0;
$NONE = 0;
$YOUTUBE = 0;
$FACEBOOK = 0;
$SHOPPING = 0;
$BLOG = 0; 
$OTHERS = 0;

while($row_student = mysql_fetch_array($res_student))
{
	$qur_user = "SELECT * FROM ".$row_student['userid']." where time BETWEEN STR_TO_DATE('".$date1."','%Y-%m-%d %H:%i:%s') AND STR_TO_DATE('".$date2."','%Y-%m-%d %H:%i:%s');";
	$res_user = mysql_query($qur_user);

	while($row_user = mysql_fetch_array($res_user))
	{
		$IT += $row_user[1];
		$SE += $row_user[2];
		$BAE += $row_user[3];
		$NONE += $row_user[4];
		$YOUTUBE += $row_user[5];
		$FACEBOOK += $row_user[6];
		$SHOPPING += $row_user[9];
		$BLOG += $row_user[14];
		$OTHERS += $row_user[7]+$row_user[8]+$row_user[10]+$row_user[11]+$row_user[12]+$row_user[13];

		for($i = 15 ; $i < 75 ; $i++)
		{
			$OTHERS += $row_user[$i];
		}
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