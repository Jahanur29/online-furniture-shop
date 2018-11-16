<?php
include('db.php');

$title=$_POST['title'];
			


$update=mysql_query("INSERT INTO brands (title) VALUES ('$title')");
header("location: brand.php");
exit();


?>
