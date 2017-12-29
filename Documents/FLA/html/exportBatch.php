 <?php
include "connection.php";
session_start();
$array_batch = $_SESSION["array_batch"];

 if(isset($_POST["Export"])){
         
      header('Content-Type: text/csv; charset=utf-8');  
      header('Content-Disposition: attachment; filename=batch.csv');  
      $output = fopen("php://output", "w");  
      fputcsv($output, array('Username', 'InformationTechnology', 'SearchEngine','BAE','None','Youtube','Facebook','Shopping','Blog','Others'));   

      foreach ($array_batch as $fields) {
       fputcsv($output, $fields);
      }
      fclose($output);
 }
 ?>  