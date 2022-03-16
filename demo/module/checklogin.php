<?php

require_once('config.php');
if($_SESSION['ADMIN_LOGGED']!= "ADMIN"){
	header("location:login.php");
}

?>