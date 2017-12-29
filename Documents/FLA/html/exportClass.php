 <?php
include "connection.php";
session_start();
$array_class = $_SESSION["array_class"];

 if(isset($_POST["Export"])){
         
      header('Content-Type: text/csv; charset=utf-8');  
      header('Content-Disposition: attachment; filename=class.csv');  
      $output = fopen("php://output", "w");  
      fputcsv($output, array('Username', 'InformationTechnology', 'SearchEngine','BAE','None','Youtube','Facebook','Shopping','Blog','Others'));   

      foreach ($array_class as $fields) {
       fputcsv($output, $fields);
      }
      fclose($output);
 }
 ?>  