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
<?php

if(isset($_POST['btnsave'])){
  extract($_POST);
  mysqli_query($con,"INSERT INTO `tbladdress`(`aname`,`uid`) VALUES ('$txtaddress','".$_SESSION['uid']."')");
  ?>
  <script type="text/javascript">
    alert("Address Added Successfull");
    window.location.href="address.php";
  </script>
  <?php
}
?>
<div class="row">
  <div class="col-md-3">
  </div>
  <div class="col-md-6">
    <form method="post">
    <table class="table">
      <tr>
        <td>
          Address
        </td>
        <td>
        <textarea name="txtaddress" class="form-control"></textarea>
        </td>
      </tr>
      
      <Tr>
        <tD colspan=2 align=center>
          <input type="submit" class="btn btn-success btn-rounded" name="btnsave" value="Add Address">


        </tD>
      </Tr>
    </table>
  </form>
  </div>
  <div class="col-md-3">
  </div>
<?php include 'footer.php';?>
</body>
</html>