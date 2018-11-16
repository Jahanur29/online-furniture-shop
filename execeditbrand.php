<?php
	include('db.php');
	$brandId = $_POST['brandId'];
	$title=$_POST['title'];
	mysql_query("UPDATE brands SET title='$title' WHERE id='$brandId'");
	header("location: brand.php");
?>