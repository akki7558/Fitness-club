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
<h1><center>BMI Check</center></h1>
<?php
if (isset($_POST['btnsubmit'])) { 
    $mass = $_POST['mass'];
    $height = $_POST['height'];

        $bmi = $mass/($height*$height);

   
    if ($bmi <= 18.5) {
        $output = "UNDERWEIGHT";

        } else if ($bmi > 18.5 AND $bmi<=24.9 ) {
        $output = "NORMAL WEIGHT";

        } else if ($bmi > 24.9 AND $bmi<=29.9) {
        $output = "OVERWEIGHT";

        } else if ($bmi > 30.0) {
        $output = "OBESE";
    }
    echo "Your BMI value is  " . $bmi . "  and you are : "; 
    echo "$output";
}
?>
<div class="row">
	<div class="col-md-6">
<form method="post">
	<table class="table">
		<Tr>
			<Td>
				Mass
			</Td>
			<Td>
				<input type="text" name="mass" class="form-control" required>
			</Td>
		</Tr>
		<Tr>
			<Td>
				Height
			</Td>
			<Td>
				<input type="text" name="height" class="form-control" required>
			</Td>
		</Tr>
		<Tr>
			<Td>
				<input type="submit" name="btnsubmit" value="Submit">
			</Td>
		</Tr>

	</table>
</form>
</div>
</div>
<h1>Diet</h1>
<?php
$q=mysqli_query($con,"select * from tbluser where uid=".$_SESSION['uid']);
while ($r=mysqli_fetch_array($q)) {
	echo $r['food'];
}

?>
<?php include 'footer.php';?>
</body>
</html>