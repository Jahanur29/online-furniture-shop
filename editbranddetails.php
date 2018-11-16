<style type="text/css">
<!--
.ed{
border-style:solid;
border-width:thin;
border-color:#00CCFF;
padding:5px;
margin-bottom: 4px;
}
#button1{
text-align:center;
font-family:Arial, Helvetica, sans-serif;
border-style:solid;
border-width:thin;
border-color:#00CCFF;
padding:5px;
background-color:#00CCFF;
height: 34px;
}
-->
</style>
<?php
	include('db.php');
	$id=$_GET['id'];
	$result = mysql_query("SELECT * FROM brands where id='$id'");
		while($row = mysql_fetch_array($result))
			{
				$title=$row['title'];
			}
?>
<form action="execeditbrand.php" method="post">
	<input type="hidden" name="brandId" value="<?php echo $id=$_GET['id'] ?>">
	Title:<br><input type="text" name="title" value="<?php echo $title ?>" class="ed"><br>
	<input type="submit" value="Update" id="button1">
</form>