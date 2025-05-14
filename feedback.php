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
if(isset($_POST['btnaddfeed'])){
  extract($_POST);
  mysqli_query($con,"INSERT INTO `tblfeedback`(`fname`,uid) VALUES ('$txtfeedback','".$_SESSION['uid']."')");
  ?>
  <script type="text/javascript">
    alert("Record Added Successfully");
  </script>
  <?php
}
?>
<div class="row">
  <div class="col-md-8">
<form method="post">
  <table class="table">
    <Tr>
      <TD>
       Feedback
      </TD>
      <td>
        <textarea name="txtfeedback" class="form-control"></textarea>
      </td>
    </Tr>
    <tr>
      <td colspan="2" align="center">
        <input type="submit" name="btnaddfeed" value="Add Feedback" class="btn btn-success">
      </td>
    </tr>
  </table>
</form>
</div>
</div>
<?php include 'footer.php';?>
</body>
</html>



   