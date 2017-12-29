 <?php
include "connection.php";
session_start();
$array_student = $_SESSION["array_student"];

 if(isset($_POST["Export"])){
         
      header('Content-Type: text/csv; charset=utf-8');  
      header('Content-Disposition: attachment; filename=student.csv');  
      $output = fopen("php://output", "w");  
      fputcsv($output, array('Timestamp', 'InformationTechnology', 'SearchEngine','BAE','None','Youtube','Facebook','Shopping','Blog','Others'));   

      foreach ($array_student as $fields) {
       fputcsv($output, $fields);
      }
      fclose($output);
 }
 ?>  