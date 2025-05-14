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

<table class="table">
			<Tr>
				<td>Package Name
				</td>
				<td>Package Price
				</td>
				
				<Td>
					Month
				</Td>
<?php
$q=mysqli_query($con,"select * from tblpackage,tblcart where tblpackage.pid=tblcart.pid and paid=1 and tblcart.uid=".$_SESSION['uid']);
while ($r=mysqli_fetch_array($q)) {
	?>

		<tr>
				<td>
	<?php
	echo $r['pname'];
	?>
</td>

	<td>
		<?php
		$total+=$r['pdprice'];
	echo $r['pdprice'];
	?>
	</td>
	<td>
			<?php
	echo $r['pmonth'];
	?>
	</td>
	
</tr>
	<?php
}
?>
<Tr>
	<td>
		Total
	</td>
	<td>
		<?php echo $total;?>
	</td>
</Tr>
</table>

<!-- Carousel wrapper -->
<?php include 'footer.php';?>
</body>
</html>