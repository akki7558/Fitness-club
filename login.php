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

if(isset($_POST['btnlogin'])){
  extract($_POST);
  $q=mysqli_query($con,"select * from tbluser where email='$txtemail' and upass='$txtpass'");
  if(mysqli_num_rows($q)>0){
       $_SESSION['email']=$txtemail;
    $q1=mysqli_query($con,"select * from tbluser where email='".$_SESSION['email']."'");
    $r1=mysqli_fetch_array($q1);
    $_SESSION['fname']=$r1['firstname'];
 $_SESSION['uid']=$r1['uid'];
  $_SESSION['lname']=$r1['lastname'];
 $_SESSION['uphone']=$r1['phone'];
   ?>
   <script type="text/javascript">
     window.location.href="welcome.php";
   </script>
   <?php

  }
  else{
   ?>
   <script type="text/javascript">
     alert("Invalid Credentials");
   </script>
   <?php
  }

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
          Email
        </td>
        <td>
          <input type="text" class="form-control" required name="txtemail">
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
     
      <Tr>
        <tD colspan=2 align=center>
          <input type="submit" class="btn btn-success btn-rounded" name="btnlogin" value="Login">


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