<?php
require_once('config.php'); 
if(isset($_GET['status']) && isset($_GET['id'])){
    $id     = $_GET['id'];
    $status = $_GET['status'];

    $conn   = mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME);
  
    $query  = " UPDATE `product_details` SET   `status` = '$status' WHERE `id` ='$id'";
    $result = mysqli_query($conn, $query);
      if($result){
  	    header("Location:index.php");
  	    exit();
      }
}     else {
	       header("Location:index.php");
	       exit();
      }
  

?>