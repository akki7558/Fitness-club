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
  mysqli_query($con,"INSERT INTO `tbluser`(`firstname`, `lastname`, `email`, `upass`, `gender`, `phone`, `pfitness`, `typefood`, `rate`, `height`, `weight`) VALUES ('$txtfname','$txtlname','$txtemail','$txtpass','$rbgender','$txtphone','$cmbfitness','$type','$cmbfitness','$txtheight','$txtweight')");
  ?>
  <script type="text/javascript">
    alert("Registration Successfull");
    window.location.href="login.php";
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
          First Name
        </td>
        <td>
          <input type="text" class="form-control" required name="txtfname">
        </td>
      </tr>
      <tr>
        <td>
          Last Name
        </td>
        <td>
          <input type="text" class="form-control" required name="txtlname">
        </td>
      </tr>
      <tr>
        <td>
          Email
        </td>
        <td>
          <input type="email" class="form-control" required name="txtemail">
        </td>
      </tr>
      <tr>
        <td>
          Password
        </td>
        <td>
          <input type="password" class="form-control" required name="txtpass">
        </td>
      </tr>
       <tr>
        <td>
          Gender
        </td>
        <td>
          <input type="radio" name="rbgender" value="Male">Male
          <input type="radio" name="rbgender" value="Female">Female
        </td>
      </tr>
       <tr>
        <td>
          Present Fitness
        </td>
        <td>
          <select name="cmbfitness">
            <option value="Lose weight">Lose Weight</option>
            <option value="Build muscle">Build muscle</option>
            <option value="Maintain fitness">Maintain fitness</option>
            <option value="Improve flexibility">Improve flexibility</option>
        </td>
      </tr>
      <tr>
        <td>
          Type of Food
        </td>
        <td>
          <select name="type">
            <option value="Veg">Veg</option>
            <option value="Non Veg">Non Veg</option>
        </td>
      </tr>
<tr>
        <td>
          Current Fitness
        </td>
        <td>
          <select name="cmbfitness">
            <option value="Beginner">Beginner</option>
            <option value="Intermediate">Intermediate</option>
            <option value="Pro">Pro</option>
          </select>
        </td>
      </tr>
      <tr>
        <td>
          Height
        </td>
        <td>
          <input type="text" class="form-control" required name="txtheight">
        </td>
      </tr>
      <tr>
        <td>
          Weight
        </td>
        <td>
          <input type="text" class="form-control" required name="txtweight">
        </td>
      </tr>
       <tr>
        <td>
          Phone
        </td>
        <td>
          <input type="text" pattern="\d{10}" class="form-control" required name="txtphone">
        </td>
      </tr>
      <Tr>
        <tD colspan=2 align=center>
          <input type="submit" class="btn btn-success btn-rounded" name="btnsave" value="Register">


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