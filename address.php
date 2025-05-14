<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
	<?php include 'head.php';?>
</head>
<body>
<?php include 'header.php';?>
<?php include 'menu.php';?>
<!-- Carousel wrapper -->
<a href="addaddress.php">Add Address</a>
<div class="row">

<?php
$q=mysqli_query($con,"select * from tbladdress");
while ($r=mysqli_fetch_array($q)) {
	?>
	<div class="col-md-8">
		<table class="table">
			<Tr>
				<td>Address
				</td>
				<td>
	<?php
	echo $r['aname'];
	?>
</td>
<td>
	<a href="bill.php?id=<?php echo $r['aid'];?>">Select</a>
	</td>
</Tr>

</table>
	</div>
	<?php
}
?>
</div>
<!-- Carousel wrapper -->
<?php include 'footer.php';?>
</body>
</html>