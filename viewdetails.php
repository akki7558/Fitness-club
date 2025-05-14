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
<div class="row">

<?php
$q=mysqli_query($con,"select * from tblpackage where pid=".$_GET['id']);
$r=mysqli_fetch_array($q);
	?>
	<div class="col-md-4">
		<form method="post">
		<table class="table">
				<tR>
				<td align="center" colspan="2">
					<img src="admin/<?php echo $r['pimage'];?>" height=200px width=200px>
				</td>
			</tR>
			<Tr>
				<td>Package Name
				</td>
				<td>
	<?php
	echo $r['pname'];
	?>
</td>
</Tr>
<tr>
<td>
	Package Price
	</td>
	<td><strike>
		<?php
	echo $r['pprice'];
	?></strike>
	</td>
</Tr>
<tr>
<td>
	Package Discount Price
	</td>
	<td>
		<?php
	echo $r['pdprice'];
	?>
	</td>
</Tr>
<tr>
<td>
	Package Description
	</td>
	<td>
		<?php
	echo $r['pdesc'];
	?>
	</td>
</Tr>
<tr>
<td>
	Package Video
	</td>
	<td>
		<?php
	echo $r['pvideo'];
	?>
	</td>
</Tr>

<tr>
	<td colspan="2" align="center">
		<input type="submit" name="btnaddcart" value="Add2Cart" class="btn btn-success">
	</td>
</tr>

</table>
</form>
	</div>

</div>
<?php
if(isset($_POST["btnaddcart"])){
	extract($_POST);
	$ddate=date('Y-m-d');
	$ttime=date('H:i:s');
	mysqli_query($con,"INSERT INTO `tblcart`( `uid`, `pid`, `ddate`, `ttime`, `status`,`paid`) VALUES ('".$_SESSION['uid']."','".$_GET['id']."','$ddate','$ttime','Order Placed','0')");
	?>
	<script type="text/javascript">
		alert("Added to Cart");
	</script>
	<?php
	
}
?>
<!-- Carousel wrapper -->
<?php include 'footer.php';?>
</body>
</html>