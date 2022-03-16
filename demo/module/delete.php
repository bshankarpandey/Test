<?php
require_once('config.php');
if(isset($_GET['id'])){
	$id = $_GET['id'];

  $conn = mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME);
  $query ="DELETE FROM `product_details` WHERE `id`='$id'";
  $result = mysqli_query($conn,$query);
  if ($result) {
  	header("Location:index.php");
  }
}

?>
