<?php
function connectDB(){
  $mydb="
  (DESCRIPTION =
    (ADDRESS = (PROTOCOL = TCP)(HOST = localhost)(PORT = 1521))
    (CONNECT_DATA =
      (SERVER = DEDICATED)
      (SERVICE_NAME = XE)
    )
  )";

  $conn_username = "LIBRARY";
  $conn_password = "admin";

  $opt = [
      PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
      PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_NUM,
  ];

  try{
      $conn = new PDO("oci:dbname=".$mydb, $conn_username, $conn_password, $opt);  
      
  }catch(PDOException $e){
      echo ($e->getMessage());
  }
  return $conn;
}


//connect.php file code end
?>