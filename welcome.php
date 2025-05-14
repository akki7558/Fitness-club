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
<form method="post">
	<table class="table">
		<tr>
      <Td>
        Choose Category
      </Td>
      <td>
        <select class="form-control" name="cmbcategory">
          <option>--Select--</option>
         <?php
          $q=mysqli_query($con,"select * from tblcategory");
          while ($r=mysqli_fetch_array($q)) {
           echo "<option value=".$r['cid'].">".$r['cname']."</option>";
          }
          ?>
        </select>
      </td>
   
    	<td>
    		<input type="submit" name="btnsearchbycat" value="Search" class="btn btn-primary">
    	</td>
    
		<td>
			<input type="text" placeholder="Search by Name..." name="txtsearch" class="form-control">
		</td>
		
			<tD>
				<input type="submit" name="btnsearch" value="Search" class="btn btn-primary">
			</tD>
		</Tr>
	</table>
</form>
<!-- Carousel wrapper -->
<div class="row">

<?php
if(isset($_POST['btnsearchbycat'])){
	extract($_POST);
	$q=mysqli_query($con,"select * from tblpackage where cid = '".$cmbcategory."'");
}
else if(isset($_POST['btnsearch'])){
	extract($_POST);
	$q=mysqli_query($con,"select * from tblpackage where pname like '%".$txtsearch."%'");
}
else{
$q=mysqli_query($con,"select * from tblpackage");
}
while ($r=mysqli_fetch_array($q)) {
?>
	<div class="col-md-4">
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
		<a href="viewdetails.php?id=<?php echo $r['pid'];?>">View Details</a>
	</td>
</tr>
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